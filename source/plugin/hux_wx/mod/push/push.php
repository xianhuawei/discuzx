<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/push/lang/lang.'.currentlang().'.php';

if ($huxaction['action'] == '0') {
	loaducenter();
	$user = uc_get_user(addslashes($keyword));
	if (!$user) {
		C::t('#hux_wx#hux_wx_action')->delete($openid);
		$string = lang('plugin/hux_wx','nouid');
	} else {
		C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$keyword));
		$string = $pushlang['inputbody'];
	}
} else {
	notification_add($huxaction['action'],'system',$keyword,0,1);
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = $pushlang['pushsus'];
}

if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>