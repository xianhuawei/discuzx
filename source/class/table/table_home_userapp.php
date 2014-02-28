<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_home_userapp.php 27820 2012-02-15 05:15:59Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_home_userapp extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_userapp';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 *
	 * 根据Uid、AppID获取单条用户应用记录
	 * @param int $uid:用户UID
	 * @param int $appid:应用ID
	 * @return 返回一条userapp记录
	 */
	public function fetch_by_uid_appid($uid, $appid) {
		return DB::fetch_first('SELECT * FROM %t WHERE uid=%d AND appid=%d', array($this->_table, $uid, $appid));
	}

	/**
	 *
	 * 根据Uid获取最大的menuorder
	 * @param int $uid:用户Uid
	 * @return 返回menuorder值
	 */
	public function fetch_max_menuorder_by_uid($uid) {
		return DB::result_first('SELECT MAX(menuorder) FROM %t WHERE uid=%d', array($this->_table, $uid));
	}

	/**
	 * 获取用户应用数
	 * @param int $uid
	 * @return int
	 */
	public function count_by_uid($uid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d', array($this->_table, $uid));
	}

	/**
	 *
	 * 根据Uid、AppID获取用户应用列表
	 * @param int|arrray $uid:允许传一个Uid或者Uid数组
	 * @param int|arrray $appid:应用ID
	 * @param string $order:排序字段
	 * @param string $sort:排序方式可选值DESC, ASC
	 * @param int $start:开始记录
	 * @param int $limit:获取的记录数
	 * @return 返回userapp列表
	 */
	public function fetch_all_by_uid_appid($uid = 0, $appid = 0, $order = null, $sort = 'DESC' , $start = 0, $limit = 0) {
		$parameter = array($this->_table);
		$wherearr = array();
		if($uid) {
			$uid = dintval((array)$uid, true);
			$wherearr[] = 'uid IN(%n)';
			$parameter[] = $uid;
		}
		if($appid) {
			$appid = dintval((array)$appid, true);
			$wherearr[] = 'appid IN(%n)';
			$parameter[] = $appid;
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$sort = in_array($sort, array('DESC', 'ASC')) ? $sort : 'DESC';
		$ordersql = $order !== null ? ' ORDER BY '.DB::order($order, $sort) : '';
		if(!$uid) {
			$limit = $limit ? $limit : 100;
		}
		return DB::fetch_all("SELECT * FROM %t $wheresql $ordersql ".DB::limit($start, $limit), $parameter);
	}

	/**
	 *
	 * 根据Uid、appid更新用户应用记录
	 * @param int|array $uid:用户Uid
	 * @param int|array $appid:应用ID
	 * @param int|array $data:更新的数据
	 * @return 返回受影响的记录数
	 */
	public function update_by_uid_appid($uid = 0, $appid = 0, $data = array()) {
		if($data && is_array($data)) {
			$wherearr = array();
			if($uid) {
				$uid = dintval((array)$uid, true);
				$wherearr[] = DB::field('uid', $uid);
			}
			if($appid) {
				$appid = dintval((array)$appid, true);
				$wherearr[] = DB::field('appid', $appid);
			}
			$wheresql = !empty($wherearr) && is_array($wherearr) ? implode(' AND ', $wherearr) : '';
			return DB::update($this->_table, $data, $wheresql);
		}
		return 0;
	}

	/**
	 *
	 * 根据Uid、appid删除用户应用记录
	 * @param int|array $uid:用户Uid
	 * @param int|array $appid:应用ID
	 * @return 返回受影响的记录数
	 */
	public function delete_by_uid_appid($uid = 0, $appid = 0) {
		$parameter = array($this->_table);
		$wherearr = array();
		if($uid) {
			$uid = dintval((array)$uid, true);
			$wherearr[] = 'uid IN(%n)';
			$parameter[] = $uid;
		}
		if($appid) {
			$appid = dintval((array)$appid, true);
			$wherearr[] = 'appid IN(%n)';
			$parameter[] = $appid;
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::query("DELETE FROM %t $wheresql", $parameter);
	}
	public function delete_by_uid($uids) {
		if(($uids = dintval($uids, true))) {
			return DB::delete($this->_table, DB::field('uid', $uids));
		}
		return 0;
	}

}

?>