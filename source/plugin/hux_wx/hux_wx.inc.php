<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$wxsetting = $_G['cache']['plugin']['hux_wx'];
$paymoney = "extcredits".$wxsetting['money'];
$paymoneyname = $_G['setting']['extcredits'][$wxsetting['money']]['title'];
$mycash = C::t('#hux_wx#hux_common_member_count')->result_by_uid($_GET['uid'],$paymoney);
$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($_GET['uid'],'groupid');
$gp = unserialize($wxsetting['gp']);
$postgp = unserialize($wxsetting['postgp']);
$appconfigsql = C::t('#hux_wx#hux_wx_config')->fetch_by_appid($_GET['mod'],'configs');
if ($appconfigsql) {
	$appconfigs = explode('||',$appconfigsql['configs']);
	foreach($appconfigs as $value){ 
		$appconfigss = explode(':',$value);
		$appconfig[$appconfigss[0]] = $appconfigss[1];
	}
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['mod'].'/'.$_GET['ac'].'.php';
?>