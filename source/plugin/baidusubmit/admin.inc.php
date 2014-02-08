<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

global $_G;

require_once dirname(__FILE__).'/function/function_baidu.php';

if (!baidu_table_exists('baidusubmit_setting')) {
    cpmsg_error(lang('plugin/baidusubmit', 'tablenotexists'));
}

$url = $_G['siteurl'] . substr($_SERVER['REQUEST_URI'], (int)strrpos($_SERVER['REQUEST_URI'], '/') + 1);

if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
if (isset($_POST['ping'])) {
   C::t('#baidusubmit#baidusubmit_setting')->update('openping', intval((bool)$_POST['openping']));
   cpmsg('setting_update_succeed', $url , 'succeed');
}
else if (isset($_POST['auth'])) {
    include dirname(__FILE__) . '/auth.inc.php';
}
else if (empty($_GET['inajax'])) {
    if (!($siteUrl = baidu_get_plugin_setting('siteurl'))) {
        $siteUrl = $_G['siteurl'];
    }
    $keyExist = baidu_get_plugin_setting('pingtoken') ? true : false;
    $openping = baidu_get_plugin_setting('openping');
    include template('baidusubmit:admin');
}