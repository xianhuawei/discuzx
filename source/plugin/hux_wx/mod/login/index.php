<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/lang/lang.'.currentlang().'.php';
C::t('#hux_wx#hux_wx_login')->delete_by_dateline();
$keywords = substr($keyword,1);
if ($keywords && $keywords != '0') {
	if ($binded) {
		$user = C::t('#hux_wx#hux_wx_login')->fetch_by_id($keywords,'uid');
		if (!$user) {
			$string = $loginlang['yzerr'];
		} else {
			C::t('#hux_wx#hux_wx_login')->update($keywords,array('uid'=>$binded['uid']));
			$string = $loginlang['yzsus'];
		}
	} else {
		$string = lang('plugin/hux_wx','tobind');
	}
	if (CHARSET != 'utf-8' && !$wxsetting['code']) {
		$string = diconv($string,CHARSET,'utf-8');
	}
	$contentStr = $string;
}
?>