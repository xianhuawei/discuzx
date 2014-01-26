<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: common.inc.php 199 2013-05-29 02:46:11Z lucashen $
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

//插件路径
define(DS_ROOT, DISCUZ_ROOT.'/source/plugin/discuz_security/');

//插件后台URL
$pmod = $_GET['pmod'];
$identifier = $_GET['identifier'];
define(PARAM_URL, "plugins&operation=config&do=$do&identifier=$identifier&pmod=$pmod");
define(DS_URL, ADMINSCRIPT."?action=".PARAM_URL);

//包含通用函数
require_once DS_ROOT.'./function/function_common.php';

//语言包数组
$csslang = $scriptlang['discuz_security'];

?>