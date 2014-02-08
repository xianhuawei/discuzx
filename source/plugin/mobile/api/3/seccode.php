<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: seccode.php 27959 2012-02-17 09:52:22Z monkey $
 */
//note secure(验证安全) @ Discuz! X3.x

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

$_GET['idhash'] = $_GET['sechash'];
$_GET['mod'] = 'seccode';
include_once 'misc.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {		
	}

	//note 程序模板输出前运行的代码
	function output() {}

}

?>