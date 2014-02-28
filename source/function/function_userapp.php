<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_userapp.php 25756 2011-11-22 02:47:45Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//获取当前环境信息
function _my_env_get($var) {
	global $_G, $space;

	if($var == 'owner') {
		return $space['uid'];
	} elseif($var == 'viewer') {
		return $_G['uid'];
	} elseif($var == 'prefix_url') {
		if(!isset($_G['prefix_url'])) {
			$_G['prefix_url'] = $_G['siteurl'];
		}
		return $_G['prefix_url'];
	} else {
		return '';
	}
}

//获取指定用户的好友的uid列表
function _my_get_friends($uid) {
	global $_G;

	$var = "my_get_friends_$uid";
	if(!isset($_G[$var])) {
		$_G[$var] = array();
		$query = C::t('home_friend')->fetch_all($uid);
		foreach($query as $value) {
			$_G[$var][] = $value['fuid'];
		}
	}
	return $_G[$var];
}

//获取指定用户显示的名字
function _my_get_name($uid) {
	$member = getuserbyuid($uid);
	return $member ? $member['username'] : '';
}

//获取指定用户头像的url
function _my_get_profilepic($uid, $size='small') {
	return UC_API.'/avatar.php?uid='.$uid.'&size='.$size;
}

//判断uid1和uid2是否为好友
function _my_are_friends($uid1, $uid2) {
	global $_G;

	$var = "my_are_friends_{$uid1}_{$uid2}";
	if(!isset($_G[$var])) {
		$_G[$var] = false;
		$query = C::t('home_friend')->fetch_all_by_uid_fuid($uid1, $uid2);
		foreach($query as $value) {
			$_G[$var] = true;
		}
	}
	return $_G[$var];
}

//指定用户是否安装了应用
function _my_user_is_added_app($uid, $appid) {
	global $_G;

	$var = "my_user_is_added_app_{$uid}_{$appid}";
	if(!isset($_G[$var])) {
		$_G[$var] = false;
		if($value = C::t('home_userapp')->fetch_by_uid_appid($uid, $appid)) {
			$_G[$var] = true;
		}
	}
	return $_G[$var];
}

//获取应用在uchome上的访问地址
function _my_get_app_url($appid, $suffix) {
	global $_G;

	if(!isset($_G['prefix_url'])) {
		$_G['prefix_url'] = getsiteurl();
	}
	return $_G['prefix_url']."userapp.php?mod=app&id=$appid";
}

//获取应用显示位置
function _my_get_app_position($appid) {
	global $_G;

	$var = "my_get_app_position_{$appid}";
	if(!isset($_G[$var])) {
		$_G[$var] = 'wide';
		if($value = C::t('common_myapp')->fetch($appid)) {
			if($value['narrow']) $_G[$var] = 'narrow';
		}
	}
	return $_G[$var];
}

?>