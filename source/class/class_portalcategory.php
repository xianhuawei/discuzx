<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_portalcategory.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class portal_category {

	function portal_category() {}

	function &instance() {
		static $object;
		if(empty($object)) {
			$object = new portal_category();
		}
		return $object;
	}

	/**
	 * 手工添加指定频道权限
	 * @param array $catid 频道ID
	 * @param array $users 用户权限数组
	 */
	function add_users_perm($catid, $users) {
		$sqlarr = $uids = array();
		$catid = intval($catid);
		if(!empty($catid) && !empty($users)) {
			$catids = $this->get_subcatids_by_catid($catid);
			$this->_add_users_cats($users, $catids);
			foreach($users as $v) {
				$uids[$v['uid']] = $v['uid'];
			}
			$this->_update_member_allowadmincp($uids);
		}
	}

	/**
	 * 更新用户表中allowadmincp的状态
	 * @param array $uids 用户IDs
	 */
	function _update_member_allowadmincp($uids) {
		if(!empty($uids)) {
			$userperms = array();
			$userperms = C::t('portal_category_permission')->fetch_permission_by_uid($uids);
			foreach(C::t('common_member')->fetch_all($uids, false, 0) as $uid => $v) {
				$v['allowadmincp'] = setstatus(3, empty($userperms[$v['uid']]['allowpublish']) ? 0 : 1, $v['allowadmincp']);
				$v['allowadmincp'] = setstatus(2, empty($userperms[$v['uid']]['allowmanage']) ? 0 : 1, $v['allowadmincp']);
				C::t('common_member')->update($uid, array('allowadmincp'=>$v['allowadmincp']));
			}
		}
	}

	/**
	 * 删除指定频道手工添加的指定用户的权限
	 * @param array $catid 频道ID
	 * @param array $uids 用户IDs
	 */
	function delete_users_perm($catid, $uids) {

		$uids = !is_array($uids) ? array($uids) : $uids;
		$uids = array_map('intval', $uids);
		$uids = array_filter($uids);
		//删除本页面手工添加的权限
		if($uids) {
			C::t('portal_category_permission')->delete_by_catid_uid_inheritedcatid($catid, $uids, 0);
			//删除所有子级从该级继承的权限
			$this->delete_inherited_perm_by_catid($catid, $catid, $uids);
			$this->_update_member_allowadmincp($uids);
		}
	}

	/**
	 * 删除指定频道继承的权限
	 * @param int $catid 要删除权限的频道ID
	 * @param int $upid 继承频道ID
	 * @param int $uid 指定的用户ID,可以是多个UID数组
	 */
	function delete_inherited_perm_by_catid($catid, $upid = 0, $uid = 0) {
		if(!is_array($catid)) {
			$catids = $this->get_subcatids_by_catid($catid);
		}
		if($catids) {
			$uids = is_array($uid) ? $uid : array($uid);
			foreach($uids as $uid_) {
				$uid_ = intval($uid_);
				C::t('portal_category_permission')->delete_by_catid_uid_inheritedcatid($catids, $uid_, $upid ? $upid : true);
				if($uid_) {
					$this->_update_member_allowadmincp(array($uid_));
				}
			}
		}
	}

	/**
	 * 重新生成指定频道的所有继承权限,同时更新所有子级频道
	 * @param int $catid 频道ID
	 */
	function remake_inherited_perm($catid) {
		loadcache('portalcategory');
		$portalcategory = getglobal('cache/portalcategory');
		$catid = intval($catid);
		$upid = !empty($portalcategory[$catid]) ? $portalcategory[$catid]['upid'] : 0;
		if($upid) {
			$catids = $this->get_subcatids_by_catid($catid);
			$users = $this->get_perms_by_catid($upid);
			$this->_add_users_cats($users, $catids, $upid);
		}
	}

	/**
	 * 得到指定频道的权限列表
	 * @param int $catid 频道ID
	 * @param int $uid 用户ID
	 * @return array
	 */
	function get_perms_by_catid($catid, $uid = 0) {
		$perms = array();
		$catid = intval($catid);
		$uid = intval($uid);
		if($catid) {
			$perms = C::t('portal_category_permission')->fetch_all_by_catid($catid, $uid);
		}
		return $perms;
	}


	/**
	 * 批量添加多人和多频道的权限
	 * @param array $users 用户权限数组，一个用户一条记录
	 * @param array $catids 频道ID
	 * @param string $upid 继承上级频道ID，为空时则$catids数组的第一个值为其它值的上级频道ID
	 */
	function _add_users_cats($users, $catids, $upid = 0) {
		C::t('portal_category_permission')->insert_batch($users, $catids, $upid);
	}

	/**
	 * 删除继承自指定频道和指定用户的所有频道权限
	 * @param int $catid 继承自的频道ID
	 * @param array $uids 指定的用户ID
	 */
	function delete_perm_by_inheritedcatid($catid, $uids = array()) {
		if($uids && !is_array($uids)) $uids = array($uids);
		if($catid) {
			C::t('portal_category_permission')->delete_by_catid_uid_inheritedcatid(false, $uids, $catid);
			if($uids) {
				$this->_update_member_allowadmincp($uids);
			}
		}
	}

	/**
	 * 删除指定频道id的所有权限
	 * @param int $catid
	 */
	function delete_allperm_by_catid($catid) {
		if($catid) {
			C::t('portal_category_permission')->delete_by_catid_uid_inheritedcatid($catid);
			C::t('portal_category_permission')->delete_by_catid_uid_inheritedcatid(false, false, $catid);
		}
	}
	/**
	 * 得到所有继承指定频道权限的catids,包括自己
	 * @param array $catid 继承自的频道ID
	 * @return array 所得到的频道ID
	 */
	function get_subcatids_by_catid($catid) {
		loadcache('portalcategory');
		$portalcategory = getglobal('cache/portalcategory');
		$catids = array();
		$catids[$catid] = $catid;
		if(isset($portalcategory[$catid]) && !empty($portalcategory[$catid]['children'])) {
			$children = array(); //所有子级
			foreach($portalcategory[$catid]['children'] as $cid) {
				if(!$portalcategory[$cid]['notinheritedarticle']) {
					$catids[$cid] = $cid; //一级子级
					if(!empty($portalcategory[$cid]['children'])) {
						$children = array_merge($children, $portalcategory[$cid]['children']);
					}
				}
			}
			//二级子级
			if(!empty($children)) {
				foreach($children as $cid) {
					if(!$portalcategory[$cid]['notinheritedarticle']) {
						$catids[$cid] = $cid;
					}
				}
			}
		}
		return $catids;
	}
}
?>