<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/unbind/lang/lang.'.currentlang().'.php';
$unbind_qd = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('qd');
if ($unbind_qd) {
	$appconfigs_qd = explode('||',$unbind_qd['configs']);
	foreach($appconfigs_qd as $value){ 
		$appconfigss_qd = explode(':',$value);
		$appconfig_qd[$appconfigss_qd[0]] = $appconfigss_qd[1];
	}	
	updatemembercount($binded['uid'] , array($paymoney => -$appconfig_qd['qdmoney']));
}
$unbind_bd = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('bind');
if ($unbind_bd) {
	$appconfigs_bd = explode('||',$unbind_bd['configs']);
	foreach($appconfigs_bd as $value){ 
		$appconfigss_bd = explode(':',$value);
		$appconfig_bd[$appconfigss_bd[0]] = $appconfigss_bd[1];
	}
	if ($appconfig_bd['verify'] && $appconfig_bd['verify'] != '0') {
		$vid = C::t('common_member_verify')->count_by_uid($binded['uid']);
		if ($vid > 0) {
			C::t('common_member_verify')->update($binded['uid'],array($appconfig_bd['verify']=>0));
		}
	}
}
C::t('#hux_wx#hux_wx')->delete($openid);
C::t('#hux_wx#hux_wx_action')->delete($openid);
$string = $unbindlang['unbind'];
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>