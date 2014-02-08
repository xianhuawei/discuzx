<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

global $_G;

require_once dirname(__FILE__).'/function/function_baidu.php';
if(!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}

$loglist = C::t('#baidusubmit#baidusubmit_urlstat')->getall();

foreach ($loglist as $key => $val) {
    $loglist[$key]['ctime'] = date('Y-m-d', $val['ctime']);
}

include template('baidusubmit:submitlog');
