<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: userapp.php 33017 2013-04-08 07:28:47Z zhengqingpeng $
 */

// 定义应用 ID
define('APPTYPEID', 5);
define('CURSCRIPT', 'userapp');

require_once './source/class/class_core.php';
require_once './source/function/function_home.php';

$discuz = C::app();

//====================================
//模块定义以及模块缓存定义
//====================================
$modarray = array('app', 'manage');
$cachelist = array('userapp','usergroups', 'myapp');

// 判断 $mod 的合法性
$mod = !in_array($discuz->var['mod'], $modarray) ? 'manage' : $discuz->var['mod'];

//兼容处理
$appid = empty($_GET['id']) ? '': intval($_GET['id']);
if($appid) {
	$mod = 'app';
}

//====================================
// 核心处理
//====================================
$discuz->cachelist = $cachelist;
$discuz->init();

//使用应用权限判断
if(empty($_G['uid']) && $mod == 'app') {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		dsetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		dsetcookie('_refer', rawurlencode('userapp.php?mod=app&id='.$appid));
	}
	showmessage('to_login', null, array(), array('showmsg' => true, 'login' => 1));
}

if(empty($_G['setting']['my_app_status'])) {
	showmessage('no_privilege_my_app_status', '', array(), array('return' => true));
}

//验证是否有权限玩应用
if($mod == 'app' && !checkperm('allowmyop')) {
	showmessage('no_privilege_myop', '', array(), array('return' => true));
}
//初始化
$space = $_G['uid']? getuserbyuid($_G['uid']) : array();

define('CURMODULE', 'userapp');
runhooks();

getuserapp();
//===================================
//加载 mod
//===================================

$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['userapp']);
if(!$navtitle) {
	$navtitle = $_G['setting']['navs'][5]['navname'];
} else {
	$nobbname = true;
}

require_once libfile('userapp/'.$mod, 'module');

?>