<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: misc.php 32082 2012-11-07 08:00:31Z zhengqingpeng $
 */

// 定义应用 ID
define('APPTYPEID', 100);
define('CURSCRIPT', 'misc');

//====================================
// 基础文件引入， 其他程序引导文件可能不需要
// class_forum.php 和 function_forum.php
// 请根据实际需要确定是否引入
//====================================

require './source/class/class_core.php';

$discuz = C::app();

//本程序禁止robot访问
$discuz->reject_robot();
//====================================
//模块定义以及模块缓存定义
//====================================
$modarray = array('seccode', 'secqaa', 'initsys', 'invite', 'faq', 'report',
				'swfupload', 'manyou', 'stat', 'ranklist', 'buyinvitecode',
				'tag', 'diyhelp', 'mobile', 'patch', 'getatuser', 'imgcropper',
				'userstatus', 'signin');

$modcachelist = array(
	'ranklist' => array('forums', 'diytemplatename'),
);

// 判断 $mod 的合法性
$mod = getgpc('mod');
$mod = (empty($mod) || !in_array($mod, $modarray)) ? 'error' : $mod;

if(in_array($mod, array('seccode', 'secqaa', 'initsys', 'faq', 'swfupload', 'mobile'))) {
	define('ALLOWGUEST', 1);
}

$cachelist = array();
if(isset($modcachelist[$mod])) {
	$cachelist = $modcachelist[$mod];
}

//====================================
// 加载核心处理
//====================================
$discuz->cachelist = $cachelist;

//====================================
// Core 核心定制
//====================================
switch ($mod) {
	case 'secqaa':
	case 'manyou':
	case 'userstatus':
	case 'seccode':
		$discuz->init_cron = false;
		$discuz->init_session = false;
		break;
	case 'updatecache':
		$discuz->init_cron = false;
		$discuz->init_session = false;
	default:
		break;
}

$discuz->init();

//=======================
//加载 mod
//===================================
define('CURMODULE', $mod);
runhooks();

require DISCUZ_ROOT.'./source/module/misc/misc_'.$mod.'.php';

?>