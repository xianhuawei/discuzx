<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if ($binded) {
	$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($binded['uid'],'groupid');
	if (in_array($user_cm['groupid'],$gp)) {
		C::t('#hux_wx#hux_wx_action')->insert(array('openid'=>$openid,'action'=>'0','type'=>$keyword));
		$string = lang('plugin/hux_wx','touid');
	} else {
		$string = lang('plugin/hux_wx','adminzhiling');
	}
} else {
	$string = lang('plugin/hux_wx','tobind');
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>