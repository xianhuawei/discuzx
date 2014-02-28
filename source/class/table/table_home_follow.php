<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_home_follow.php 28321 2012-02-28 03:03:51Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_home_follow extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_follow';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'home_follow_';
		//$this->_cache_ttl = 86400;	//note 缓存一天 //在setting/memory中设置

		parent::__construct();
	}

	/**
	 *
	 * 根据uids获取我关注的用户
	 * @param integer $uid:关注者uid
	 * @param integer $status: 0.正常(包括特殊关注); 1.特殊关注; -1.不能再关注此人
	 * @param integer $start: 从$start开始取值
	 * @param integer $limit: 获取的记录数
	 * @return 返回关注用户列表
	 */
	public function fetch_all_following_by_uid($uid, $status = 0, $start = 0, $limit = 0) {
		$data = array();
		$wherearr = array();
		//缓存正常关注的用户0和1的用户
		$force = !$start && !$limit && !$status ? false : true;
		if((!$force && ($data = $this->fetch_cache($uid)) === false) || $force) {
			$parameter = array($this->_table, $uid);
			$wherearr[] = 'uid=%d';
			if($status) {
				$wherearr[] = "status=%d";
			} else {
				$wherearr[] = "status!=%d";
				$status = -1;
			}
			$parameter[] = $status;
			$wheresql = !empty($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
			$data = DB::fetch_all("SELECT * FROM %t $wheresql ORDER BY dateline DESC ".DB::limit($start, $limit), $parameter, 'followuid');
			if(!$force) {
				$this->store_cache($uid, $data, $this->_cache_ttl);
			}
		}
		return $data;
	}

	/**
	 *
	 * 根据uids获取关注我的用户
	 * @param integer $uids:被关注者uid
	 * @param integer $start: 从$start开始取值
	 * @param integer $limit: 获取的记录数
	 * @return 返回被关注的用户列表
	 */
	public function fetch_all_follower_by_uid($uids, $start = 0, $limit = 0) {
		$uids = dintval($uids, true);
		if($uids) {
			$parameter = array($this->_table, $uids);
			$fsql = is_array($uids) && $uids ? 'followuid IN(%n)' : 'followuid=%d';
			return DB::fetch_all("SELECT * FROM %t WHERE $fsql ORDER BY dateline DESC ".DB::limit($start, $limit), $parameter, 'uid');
		}
		return array();
	}

	public function fetch_all_by_uid_followuid($uid, $followuids) {
		$followuids = dintval($followuids, true);
		if($followuids) {
			return DB::fetch_all("SELECT * FROM %t WHERE uid=%d AND followuid IN(%n)", array($this->_table, $uid, $followuids), 'followuid');
		}
		return array();
	}
	public function fetch_status_by_uid_followuid($uid, $followuid) {
		return DB::fetch_all('SELECT * FROM %t WHERE (uid=%d AND followuid=%d) OR (uid=%d AND followuid=%d)', array($this->_table, $uid, $followuid, $followuid, $uid), 'uid');
	}

	public function fetch_all_by_uid_fusername($uid, $users) {
		if(empty($uid) || empty($users)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE uid=%d AND fusername IN(%n)', array($this->_table, $uid, $users));
	}

	public function fetch_all_by_uid_username($uid, $username = '', $start = 0, $limit = 0) {
		$parameter = array($this->_table, $uid);
		$wherearr = array('uid=%d');
		if(!empty($username)) {
			$parameter[] = $username.'%';
			$wherearr[] = "fusername LIKE %s";
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::fetch_all("SELECT * FROM %t $wheresql ORDER BY dateline DESC ".DB::limit($start, $limit), $parameter);
	}

	/**
	 *
	 * 获取关注数或被关注数
	 * @param integer $uid: 被统计的uid
	 * @param integer $type: 统计类型: 0:$uid关注的用户;1:关注$uid的用户
	 * @param integer $dateline: 统计从某一时间段开始的关注数
	 * @return 返回统计的数据
	 */
	public function count_follow_user($uid, $type = 0, $dateline = 0) {
		$count = 0;
		$parameter = array($this->_table, $uid);
		$wherearr = array();
		$field = $type ? 'followuid' : 'uid';
		$wherearr[] = "$field=%d";
		$parameter[] = $uid;

		if($dateline) {
			$wherearr[] = "dateline >%d";
			$parameter[] = $dateline;
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$count = DB::result_first("SELECT COUNT(*) FROM %t $wheresql", $parameter);
		return $count;
	}

	public function count_by_uid_username($uid, $username = '') {
		$parameter = array($this->_table, $uid);
		$wherearr = array('uid=%d');
		if(!empty($username)) {
			$parameter[] = $username.'%';
			$wherearr[] = "fusername LIKE %s";
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$count = DB::result_first("SELECT COUNT(*) FROM %t $wheresql", $parameter);
		return $count;
	}

	/**
	 * 插入一条数据
	 * @param array $data
	 * @param boolean $return_insert_id 是否返回插入的id
	 * @param boolean $replace 是否是replace
	 * @param boolean $silent 是否屏蔽错误
	 * @return int|boolean 是否成功或者返回id
	 */
	public function insert($data, $return_insert_id = false, $replace = false, $silent = false) {
		if($data && is_array($data)) {
			//清除当前人的缓存数据
			$this->clear_cache($data['uid']);
			return DB::insert($this->_table, $data, $return_insert_id, $replace, $silent);
		}
		return 0;
	}

	/**
	 *
	 * 根据$uid和$followuid获取一条关注记录
	 * @param integer $uid: 关注人uid
	 * @param integer $followuid: 被关注人uid
	 * @return 返回一条关注记录
	 */
	public function fetch_by_uid_followuid($uid, $followuid) {
		return DB::fetch_first("SELECT * FROM %t WHERE uid=%d AND followuid=%d", array($this->_table, $uid, $followuid));
	}
	public function update_by_uid_followuid($uid, $followuid, $data) {
		$uid = dintval($uid, true);
		$followuid = dintval($followuid, true);
		if(!empty($data) && is_array($data) && $uid && $followuid) {
			//清除当前人的缓存数据
			$this->clear_cache($uid);
			return DB::update($this->_table, $data, DB::field('uid', $uid).' AND '.DB::field('followuid', $followuid));
		}
		return 0;
	}

	/**
	 *
	 * 根据uid和followuid删除用户信息
	 * @param integer $uid: 关注人uid
	 * @param integer $followuid: 被关注人uid
	 * @return true or false
	 */
	public function delete_by_uid_followuid($uid, $followuid) {
		//清除当前人的缓存数据
		$this->clear_cache($uid);
		return DB::query('DELETE FROM %t WHERE uid=%d AND followuid=%d', array($this->_table, $uid, $followuid));
	}
}

?>
