<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$wxsetting = $_G['cache']['plugin']['hux_wx'];
$_G['disabledwidthauto'] = 1;
$navtitle = $wxsetting['pluginname'];
include template('hux_wx:index');
?>