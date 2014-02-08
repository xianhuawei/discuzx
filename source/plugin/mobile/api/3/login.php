<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: login.php 34236 2013-11-21 01:13:12Z nemohou $
 */
//note 更多more >> login(登录) @ Discuz! X3.x

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

$_GET['mod'] = 'logging';
$_GET['action'] = !empty($_GET['action']) ? $_GET['action'] : 'login';
include_once 'member.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {
		global $_G;
		if($_G['setting']['seccodedata']['rule']['login']['allow'] == 2) {
			$_G['setting']['seccodedata']['rule']['login']['allow'] = 1;
		}
	}

	//note 程序模板输出前运行的代码
	function output() {
		global $_G;
		$variable = array();
		mobile_core::result(mobile_core::variable($variable));
	}

}

?>