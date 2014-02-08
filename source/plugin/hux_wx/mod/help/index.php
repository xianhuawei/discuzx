<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/help/lang/lang.'.currentlang().'.php';
$string = str_replace('{cc}',$wxsetting['cc'],$helplang['list']);
$app_query = C::t('#hux_wx#hux_wx_config')->fetch_all_by_admincmd(0,'appcmd,appcmdtxt','ORDER BY paixu ASC',0);
foreach ($app_query as $v) {
		$string .= $v['appcmd'].":".$v['appcmdtxt']."\n";
}
$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($binded['uid'],'groupid');
if (in_array($user_cm['groupid'],$gp)) {
	$string .= $helplang['adminlist'];
	$app_admin_query = C::t('#hux_wx#hux_wx_config')->fetch_all_by_admincmd(1,'appcmd,appcmdtxt','ORDER BY paixu ASC',0);
	foreach ($app_admin_query as $v) {
		$string .= $v['appcmd'].":".$v['appcmdtxt']."\n";
	}
}

if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>