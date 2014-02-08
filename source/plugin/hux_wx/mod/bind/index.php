<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

C::t('#hux_wx#hux_wx_action')->insert(array('openid'=>$openid,'action'=>'0','type'=>$keyword));
$string = lang('plugin/hux_wx','uid');
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>