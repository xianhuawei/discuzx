<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_portal_category_permission.php 27846 2012-02-15 09:04:33Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_portal_category_permission extends discuz_table
{
	public function __construct() {

		$this->_table = 'portal_category_permission';
		$this->_pk    = '';

		parent::__construct();
	}

	/**
	 * 依据主键值， 取得一条记录
	 * @param array $catid 频道ID
	 * @param int $uid 会员ID
	 * @return array
	 */
	public function fetch($catid, $uid){
		return ($catid = dintval($catid)) && ($uid = dintval($uid)) ? DB::fetch_first('SELECT * FROM %t WHERE catid=%d AND uid=%d', array($this->_table, $catid, $uid)) : array();
	}

	/**
	 * 依据模块ID， 返回一组数据
	 * @param array $catid 频道ID
	 * @param int $uid 会员ID
	 * @return array
	 */
	public function fetch_all_by_catid($catid, $uid = 0) {
		return ($catid = dintval($catid)) ? DB::fetch_all('SELECT * FROM %t WHERE catid=%d'.($uid ? ' AND '.DB::field('uid', $uid) : ''), array($this->_table, $catid), 'uid') :array();
	}

	/**
	 * 获取指定会员的数据
	 * @param array $uids 指定会员
	 * @param bool $flag 是否是承继的权限，true为所有，false为非承继权限
	 * @param string $sort 排序
	 * @param int $start 开始条数
	 * @param int $limit 数据量
	 * @return array
	 */
	public function fetch_all_by_uid($uids, $flag = true, $sort = 'ASC', $start = 0, $limit = 0) {
		$wherearr = array();
		$sort = $sort === 'ASC' ? 'ASC' : 'DESC';
		if(($uids = dintval($uids, true))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if(!$flag) {
			$wherearr[] = 'inheritedcatid = \'\'';
		}
		$where = $wherearr ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).$where.' ORDER BY uid '.$sort.', inheritedcatid'.DB::limit($start, $limit), NULL, 'catid');
	}

	/**
	 * 权限统计数据
	 * @param array $uids 指定会员
	 * @param bool $flag 是否是承继的权限，true为所有，false为非承继权限
	 */
	public function count_by_uids($uids, $flag) {
		$wherearr = array();
		if(($uids = dintval($uids))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if(!$flag) {
			$wherearr[] = 'inheritedcatid = \'\'';
		}
		$where = $wherearr ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).$where);
	}

	/**
	 * 获取指定会员的权限值
	 * @param int|array $uids 会员ID
	 * @return array
	 */
	public function fetch_permission_by_uid($uids) {
		return ($uids = dintval($uids, true)) ? DB::fetch_all('SELECT uid, sum(allowpublish) as allowpublish, sum(allowmanage) as allowmanage FROM '.DB::table($this->_table)." WHERE uid IN (".dimplode($uids).") GROUP BY uid", null, 'uid') : array();
	}

	/**
	 * 删除权限列表数据
	 * @param int|array $catid 频道ID
	 * @param int|array $uids 会员ID
	 * @param int|bool $inheritedcatid 继承频道的ID,大于0表示频道ID,0表示所有非继承,TRUE所有继承权限,FALSE表示不限
	 * @return type
	 */
	public function delete_by_catid_uid_inheritedcatid($catid = false, $uids = false, $inheritedcatid = false) {
		$wherearr = array();
		if(($catid = dintval($catid, true))) {
			$wherearr[] = DB::field('catid', $catid);
		}
		if(($uids = dintval($uids, true))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if($inheritedcatid === true) {
			$wherearr[] = "inheritedcatid>'0'";
		} elseif($inheritedcatid !== false && ($inheritedcatid = dintval($inheritedcatid, true))) {
			$wherearr[] = DB::field('inheritedcatid', $inheritedcatid);
		}
		return $wherearr ? DB::delete($this->_table, implode(' AND ', $wherearr)) : false;
	}

	/**
	 * 批量添加多人和多频道的权限
	 * @param array $users 用户权限数组，一个用户一条记录
	 * @param array $catids 频道ID
	 * @param string $upid 继承上级频道ID，为空时则$catids数组的第一个值为其它值的上级频道ID
	 */
	public function insert_batch($users, $catids, $upid = 0) {
		$perms = array();
		if(!empty($users) && ($catids = dintval((array)$catids, true))) {
			foreach($users as $user) {
				//用户里的数据优先
				$inheritedcatid = !empty($user['inheritedcatid']) ? $user['inheritedcatid'] : ($upid ? $upid : 0);
				//数组的第一个值是手工添加的
				foreach ($catids as $catid) {
					if($catid) {
						$perms[] = "('$catid','$user[uid]','$user[allowpublish]','$user[allowmanage]','$inheritedcatid')";
						$inheritedcatid = empty($inheritedcatid) ? $catid : $inheritedcatid;
					}
				}
			}
			//将用户和所有模块关联批量添加到模块权限表中，只添加替换继承的数据
			if($perms) {
				DB::query('REPLACE INTO '.DB::table($this->_table).' (catid,uid,allowpublish,allowmanage,inheritedcatid) VALUES '.implode(',', $perms));
			}
		}
	}
}

?>