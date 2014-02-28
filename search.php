<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: search.php 26313 2011-12-08 09:12:56Z yangli $
 */

// 定义应用 ID
define('APPTYPEID', 0);
define('CURSCRIPT', 'search');

//====================================
// 基础文件引入， 其他程序引导文件可能不需要
// class_forum.php 和 function_forum.php
// 请根据实际需要确定是否引入
//====================================
require './source/class/class_core.php';

$discuz = C::app();

//====================================
//模块定义以及模块缓存定义
//====================================
$modarray = array('my', 'user', 'curforum', 'newthread');

//依据 CURMODULE 或者 $mod 设定需要加载的缓存
$cachelist = $slist = array();
$mod = '';
//====================================
// 加载核心处理,各程序入口文件代码相同
//====================================
$discuz->cachelist = $cachelist;
$discuz->init();

// 判断 $mod 的合法性
if(in_array($discuz->var['mod'], $modarray) || !empty($_G['setting']['search'][$discuz->var['mod']]['status'])) {
	$mod = $discuz->var['mod'];
} else {
	foreach($_G['setting']['search'] as $mod => $value) {
		if(!empty($value['status'])) {
			break;
		}
	}
}
if(empty($mod)) {
	showmessage('search_closed');
}
//定义当前模块常量
define('CURMODULE', $mod);

//====================================
// 以下内容由各个模块根据需要自行撰写程序运行环境
//====================================

runhooks();

require_once libfile('function/search');

//===================================
//加载 mod
//===================================

$navtitle = lang('core', 'title_search');

if($mod == 'curforum') {
	$mod = 'forum';
	$_GET['srchfid'] = array($_GET['srhfid']);
} elseif($mod == 'forum') {
	$_GET['srhfid'] = 0;
}

require DISCUZ_ROOT.'./source/module/search/search_'.$mod.'.php';

?>