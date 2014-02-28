<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: group.php 31307 2012-08-10 02:10:56Z zhengqingpeng $
 */

//定义应用 ID
define('APPTYPEID', 3);
define('CURSCRIPT', 'group');

//====================================
// 基础文件引入， 其他程序引导文件可能不需要
// class_forum.php 和 function_forum.php
// 请根据实际需要确定是否引入
//====================================

require './source/class/class_core.php';

$discuz = C::app();

$cachelist = array('grouptype', 'groupindex', 'diytemplatenamegroup');
//====================================
// 加载核心处理,各程序入口文件代码相同
//====================================
$discuz->cachelist = $cachelist;
$discuz->init();

$_G['disabledwidthauto'] = 0;

$modarray = array('index', 'my', 'attentiongroup');
// 判断 $mod 的合法性
$mod = !in_array($_G['mod'], $modarray) ? 'index' : $_G['mod'];

//并定义常量
define('CURMODULE', $mod);

runhooks();

$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['group']);

//=======================
//加载 mod
//===================================
require DISCUZ_ROOT.'./source/module/group/group_'.$mod.'.php';
?>