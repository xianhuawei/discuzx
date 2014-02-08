<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/pic/lang/lang.'.currentlang().'.php';
if ($binded) {
	$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($binded['uid'],'groupid');
	if (in_array($user_cm['groupid'],$postgp)) {
		$string = lang('plugin/hux_wx','noop');
	} else {
		$wxpic = explode('||',$keyword);
		C::t('#hux_wx#hux_wx_pic')->insert(array('id'=>$wxpic[1],'openid'=>$openid,'picurl'=>$wxpic[0],'dateline'=>TIMESTAMP));
		$cmd = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('pic','appcmd');
		$string = str_replace('{zhiling}',$cmd['appcmd'],$piclang['opsus']);
	}
} else {
	$string = lang('plugin/hux_wx','tobind');
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
C::t('#hux_wx#hux_wx_pic')->delete_by_dateline(172800);
$contentStr = $string;
?>