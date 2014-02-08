<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$wxsetting = $_G['cache']['plugin']['hux_weixin'];
$zllist = "<br>".str_replace("\n","<br>",lang('plugin/hux_weixin','list'))."<br>help:".lang('plugin/hux_weixin','help');
include template('hux_weixin:index');
?>