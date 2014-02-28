<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: member.php 24411 2011-09-19 05:09:03Z monkey $
 */

// 定义应用 ID
define('APPTYPEID', 0);
define('CURSCRIPT', 'member');

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
$modarray = array('activate', 'clearcookies', 'emailverify', 'getpasswd',
	'groupexpiry', 'logging', 'lostpasswd',
	'register', 'regverify', 'switchstatus');

// 判断 $mod 的合法性

$mod = !in_array($discuz->var['mod'], $modarray) && (!preg_match('/^\w+$/', $discuz->var['mod']) || !file_exists(DISCUZ_ROOT.'./source/module/member/member_'.$discuz->var['mod'].'.php')) ? 'register' : $discuz->var['mod'];

//定义当前模块常量
define('CURMODULE', $mod);

//====================================
// 加载核心处理,各程序入口文件代码相同
//====================================
$discuz->init();
if($mod == 'register' && $discuz->var['mod'] != $_G['setting']['regname']) {
	showmessage('undefined_action');
}

//====================================
// 以下内容由各个模块根据需要自行撰写程序运行环境
//====================================

require libfile('function/member');
require libfile('class/member');
runhooks();

//===================================
//加载 mod
//===================================

require DISCUZ_ROOT.'./source/module/member/member_'.$mod.'.php';

?>