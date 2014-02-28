<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_blockpermission.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class block_permission {

	function block_permission() {}

	function &instance() {
		static $object;
		if(empty($object)) {
			$object = new block_permission();
		}
		return $object;
	}

	/**
	 * 手工添加指定模块权限
	 * @param array $bid 模块ID
	 * @param array $users 用户权限数组
	 */
	function add_users_perm($bid, $users) {
		if(($uids = C::t('common_block_permission')->insert_by_bid($bid, $users))) {
			$this->_update_member_allowadmincp($uids);
		}

	}

	/**
	 * 更新用户表中allowadmincp的状态
	 */
	function _update_member_allowadmincp($uids) {
		if(!empty($uids)) {
			$userperms = C::t('common_block_permission')->fetch_permission_by_uid($uids);
			foreach(C::t('common_member')->fetch_all($uids, false, 0) as $uid => $v) {
				$v['allowadmincp'] = setstatus(4, empty($userperms[$uid]['allowmanage']) ? 0 : 1, $v['allowadmincp']);
				if($userperms[$uid]['allowrecommend'] > 0 ) {
					if($userperms[$uid]['allowrecommend'] == $userperms[$uid]['needverify']) {
						$v['allowadmincp'] = setstatus(5, 1, $v['allowadmincp']); //推送数据到模块且需要审核的权限
						$v['allowadmincp'] = setstatus(6, 0, $v['allowadmincp']); //取消 推送数据到模块不需要审核的权限（既管理模块数据权限）
					} else {
						$v['allowadmincp'] = setstatus(5, 0, $v['allowadmincp']); //取消 推送数据到模块且需要审核的权限
						$v['allowadmincp'] = setstatus(6, 1, $v['allowadmincp']); //推送数据到模块不需要审核的权限（既管理模块数据权限）
					}
				} else {
					$v['allowadmincp'] = setstatus(5, 0, $v['allowadmincp']); //取消 推送数据到模块且需要审核的权限
					$v['allowadmincp'] = setstatus(6, 0, $v['allowadmincp']); //取消 推送数据到模块不需要审核的权限（既管理模块数据权限）
				}
				C::t('common_member')->update($uid, array('allowadmincp'=>$v['allowadmincp']));
			}
		}
	}

	/**
	 * 删除指定模块手工添加的用户权限
	 * @param array $bid 模块ID
	 * @param array $users
	 */
	function delete_users_perm($bid, $users) {
		$bid = intval($bid);
		if($bid && $users) {
			C::t('common_block_permission')->delete_by_bid_uid_inheritedtplname($bid, $users, '');
			C::t('common_block_favorite')->delete_by_uid_bid($users, $bid);
			$this->_update_member_allowadmincp($users);
		}
	}

	/**
	 * 删除指定模块继承自指定页面的权限
	 * @param array $bids 要删除权限的模块ID
	 * @param int $uid 指定的用户ID
	 */
	function delete_inherited_perm_by_bid($bids, $inheritedtplname = '', $uid = 0) {
		if(!is_array($bids)) $bids = array($bids);
		if($bids) {
			$uid = intval($uid);
			C::t('common_block_permission')->delete_by_bid_uid_inheritedtplname($bids, $users, empty($inheritedtplname) ? true : $inheritedtplname);
			if($uid) {
				C::t('common_block_favorite')->delete_by_uid_bid($uid, $bids);
				$this->_update_member_allowadmincp(array($uid));
			}
		}
	}

	/**
	 * 重新生成指定模块的所有继承权限
	 * @param int $bid 模块ID
	 */
	function remake_inherited_perm($bid) {
		$bid = intval($bid);
		if($bid) {
			if(($targettplname = C::t('common_template_block')->fetch_targettplname_by_bid($bid))) {
				$tplpermsission = & template_permission::instance();
				$userperm = $tplpermsission->get_users_perm_by_template($targettplname);
				$this->add_users_blocks($userperm, $bid, $targettplname);
			}
		}
	}

	/**
	 * 得到指定模块的权限列表
	 * @param int $bid 模块ID
	 * @return array
	 */
	function get_perms_by_bid($bid, $uid = 0) {
		$perms = array();
		$bid = intval($bid);
		$uid = intval($uid);
		if($bid) {
			$perms = C::t('common_block_permission')->fetch_all_by_bid($bid, $uid);
		}
		return $perms;
	}


	/**
	 * 批量添加多人和多模块的权限
	 * @param array $users 用户权限数组，一个用户一条记录
	 * @param array $bids 模块ID
	 * @param string $tplname 继承自的模板名称
	 */
	function add_users_blocks($users, $bids, $tplname = '') {
		if(($uids = C::t('common_block_permission')->insert_batch($users, $bids, $tplname))) {
			$this->_update_member_allowadmincp($uids);
		}
	}

	/**
	 * 删除继承自指定页面的(指定用户的)所有页面权限
	 * @param string $tplname 继承自的页面名称
	 * @param array $uids 指定的用户ID
	 */
	function delete_perm_by_inheritedtpl($tplname, $uids) {
		if(!empty($uids) && !is_array($uids)) $uids = array($uids);
		if($tplname) {
			C::t('common_block_permission')->delete_by_bid_uid_inheritedtplname(FALSE, $uids, $tplname);
			if($uids) {
				$this->_update_member_allowadmincp($uids);
			}
		}
	}

	/**
	 * 删除继承自指定一个或多个页面的所有模块的权限
	 * @param string $templates 页面名称
	 */
	function delete_perm_by_template($templates) {
		if($templates) {
			C::t('common_block_permission')->delete_by_bid_uid_inheritedtplname(FALSE, FALSE, $templates);
		}
	}
	/**
	 * 所有继承指定页面权限的bids
	 * @param array $tplname
	 * @return array
	 */
	function get_bids_by_template($tplname) {
		return $tplname ? C::t('common_template_block')->fetch_all_bid_by_targettplname_notinherited($tplname, 0) : array();
	}
}

class template_permission {
	function template_permission() {}

	function &instance() {
		static $object;
		if(empty($object)) {
			$object = new template_permission();
		}
		return $object;
	}

	/**
	 * 页面权限添加用户
	 * @param string $tplname 页面模板名称
	 * @param array $users 二维数组，一个用户一条记录
	 */
	function add_users($tplname, $users) {
		//先找到此页面(如果有子页面的话也包括子页面)的所有继承页面权限的所有模块，将用户和所有模块关联批量添加到模块权限表中
		$templates = $this->_get_templates_subs($tplname);  //所有页面
		$this->_add_users_templates($users, $templates); //页面权限表中添加用户

		$blockpermission = & block_permission::instance();
		$bids = $blockpermission->get_bids_by_template($templates); //所有模块的ID
		$blockpermission->add_users_blocks($users, $bids, $tplname); //添加用户和模块的关联
	}

	/**
	 * 页面权限删除用户
	 * @param string $tplname 页面模板名称
	 * @param array $uids 用户ID, 多个用户为数组
	 */
	function delete_users($tplname, $uids) {
		$uids = !is_array($uids) ? array($uids) : $uids;
		$uids = array_map('intval', $uids);
		$uids = array_filter($uids);
		//删除本页面手工添加的权限
		if($uids) {
			C::t('common_template_permission')->delete_by_targettplname_uid_inheritedtplname($tplname, $uids, '');
		}
		//删除所有子级从该级继承的权限
		$this->delete_perm_by_inheritedtpl($tplname, $uids);
	}

	/**
	 * 页面添加模块
	 * @param string $tplname 模板名称
	 * @param array $bids 要添加的模块ID，数组KEY和VALUE都是模块ID
	 */
	function add_blocks($tplname, $bids){
		//根据页面到得所有有权限的人，把所有人和模块关联批量添加到block_permission中
		$users = $this->get_users_perm_by_template($tplname);
		if($users) {
			$blockpermission = & block_permission::instance();
			$blockpermission->add_users_blocks($users, $bids, $tplname);
		}
	}

	/**
	 * 根据模板名称得到所有有相关权限的人
	 * @param string $tplname 模板名称
	 * @return array
	 */
	function get_users_perm_by_template($tplname){
		$perm = array();
		if($tplname) {
			$perm = C::t('common_template_permission')->fetch_all_by_targettplname($tplname);
		}
		return $perm;
	}

	/**
	 * 批量添加多人和多页面的权限
	 * @param array $users 用户权限数组，一个用户一条记录
	 * @param array $templates 页面名称
	 * @param string $uptplname 继承上级页面的名称，为空时则$templates数组的第一个值为其它值的上级页面
	 */
	function _add_users_templates($users, $templates, $uptplname = '') {
		C::t('common_template_permission')->insert_batch($users, $templates, $uptplname);
	}

	/**
	 * 删除指定页面的所有权限，包括所有模块
	 * @param string $tplname 模板名称
	 */
	function delete_allperm_by_tplname($tplname){
		if($tplname) {
			$tplname = is_array($tplname) ? $tplname : array($tplname);
			$blockpermission = & block_permission::instance();
			$blockpermission->delete_perm_by_template($tplname);
			$tplnames = dimplode($tplname);
			C::t('common_template_permission')->delete_by_targettplname_uid_inheritedtplname($tplnames);
			C::t('common_template_permission')->delete_by_targettplname_uid_inheritedtplname(false, false, $tplnames);
		}
	}
	/**
	 * 删除指定页面继承的权限
	 * @param array $templates 要删除权限的页面名称
	 * @param string $inheritedtplname 继承自的页面名称
	 * @param int $uid 指定的用户ID
	 */
	function delete_inherited_perm_by_tplname($templates, $inheritedtplname = '', $uid = 0) {
		if($templates && !is_array($templates)) {
			$templates = $this->_get_templates_subs($templates);
		}
		if($templates) {
			$uid = intval($uid);
			C::t('common_template_permission')->delete_by_targettplname_uid_inheritedtplname($templates, $uid, $inheritedtplname ? $inheritedtplname : true);

			$blockpermission = & block_permission::instance();
			$blocks = $blockpermission->get_bids_by_template($templates);
			$blockpermission->delete_inherited_perm_by_bid($blocks, $inheritedtplname, $uid);
		}
	}

	/**
	 * 删除继承自指定页面的(指定用户的)所有页面权限
	 * @param string $tplname 继承自的页面名称
	 * @param array $uids 指定的用户ID
	 */
	function delete_perm_by_inheritedtpl($tplname, $uids = array()) {
		if($uids && !is_array($uids)) $uids = array($uids);
		if($tplname) {
			C::t('common_template_permission')->delete_by_targettplname_uid_inheritedtplname(false, $uids, $tplname);
			$blockpermission = & block_permission::instance();
			$blockpermission->delete_perm_by_inheritedtpl($tplname, $uids);
		}
	}

	/**
	 * 重新生成指定页面的所有继承权限
	 * @param string $tplname 页面名称
	 * @param string $parenttplname 继承权限页面名称
	 */
	function remake_inherited_perm($tplname, $parenttplname) {
		if($tplname && $parenttplname) {
			//上级页面的所有权限
			$users = $this->get_users_perm_by_template($parenttplname);
			//所有页面，包括子页面
			$templates = $this->_get_templates_subs($tplname);
			//批量添加页面继承上级的用户权限
			$this->_add_users_templates($users, $templates, $parenttplname);

			$blockpermission = & block_permission::instance();
			$bids = $blockpermission->get_bids_by_template($templates); //所有模块的ID
			$blockpermission->add_users_blocks($users, $bids, $parenttplname); //添加用户和模块的关联
		}
	}

	/**
	 * 得到所有子级模板名，包括自己
	 * @param string $tplname 模板名称
	 * @return array
	 */
	function _get_templates_subs($tplname){
		global $_G;
		$tplpre = 'portal/list_';
		$cattpls = array($tplname); //所有上级页面
		if(substr($tplname, 0, 12) == $tplpre){
			loadcache('portalcategory');
			$portalcategory = $_G['cache']['portalcategory'];
			$catid = intval(str_replace($tplpre, '', $tplname));
			//如果是频道有下级且下级继承上级权限,则查找频道的下级权限
			if(isset($portalcategory[$catid]) && !empty($portalcategory[$catid]['children'])) {
				$children = array(); //所有子级
				foreach($portalcategory[$catid]['children'] as $cid) {
					if(!$portalcategory[$cid]['notinheritedblock']) {
						$cattpls[] = $tplpre.$cid; //一级子级
						if(!empty($portalcategory[$cid]['children'])) {
							$children = array_merge($children, $portalcategory[$cid]['children']);
						}
					}
				}
				//二级子级
				if(!empty($children)) {
					foreach($children as $cid) {
						if(!$portalcategory[$cid]['notinheritedblock']) {
							$cattpls[] = $tplpre.$cid;
						}
					}
				}
			}
		}
		return $cattpls;
	}

	/**
	 * 得到所有上级模板名，包括自己
	 * @param string $tplname 模板名称
	 * @return array
	 */
	function _get_templates_ups($tplname){
		global $_G;
		$tplpre = 'portal/list_';
		$cattpls = array($tplname); //所有上级页面
		if(substr($tplname, 0, 12) == $tplpre){
			loadcache('portalcategory');
			$portalcategory = $_G['cache']['portalcategory'];
			$catid = intval(str_replace($tplpre, '', $tplname));
			//如果是频道且继承上级权限,则查找频道的上级权限
			if(isset($portalcategory[$catid]) && !$portalcategory[$catid]['notinheritedblock']) {
				$upid = $portalcategory[$catid]['upid'];
				//循环查找频道的上级权限
				while(!empty($upid)) {
					$cattpls[] = $tplpre.$upid;
					//当前频道继承上级权限则继续循环
					$upid = !$portalcategory[$upid]['notinheritedblock'] ? $portalcategory[$upid]['upid'] : 0;
				}
			}
		}
		return $cattpls;
	}

}

?>