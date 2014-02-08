<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/my/lang/lang.'.currentlang().'.php';
if ($binded) {
	$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($binded['uid'],'username,groupid');
	$username = $user_cm['username'];
	$mycash = C::t('#hux_wx#hux_common_member_count')->result_by_uid($binded['uid'],$paymoney);
	$gp = unserialize($wxsetting['gp']);
	if (in_array($user_cm['groupid'],$gp)) {
		$shenfen = lang('plugin/hux_wx','guanli');
	} else {
		$shenfen = lang('plugin/hux_wx','member');
	}
	$unbind_qd = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('qd');
	if ($unbind_qd) {
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/qd/lang/lang.'.currentlang().'.php';
		$appconfigs_qd = explode('||',$unbind_qd['configs']);
		foreach($appconfigs_qd as $value){ 
			$appconfigss_qd = explode(':',$value);
			$appconfig_qd[$appconfigss_qd[0]] = $appconfigss_qd[1];
		}
		$qd_arr = array();
		$qd_arr = explode('[n]', $appconfig_qd['qdlv']);
		$qiandaolv = array();
		foreach ($qd_arr as $key => $value){
			$qiandaolv[$key] = explode("|", $value);
		}
		foreach ($qiandaolv as $v) {
			if ($binded['qdnum'] >= $v[0]) {
				$vv[] = $v;
			}             							
		}
		$maxarr = $vv[count($vv)-1];
		$qd_string = "\n".$qdlang['qdlv'].":".$maxarr[1]."\n".$qdlang['qdday'].":".$binded['qdnum'];
	} else {
		$qd_string = '';
	}
	loaducenter();
	$string = $username."\nUID:".$binded['uid']."\n".lang('plugin/hux_wx','jifen').":".$mycash.$paymoneyname."\n".$mylang['shenfen'].":".$shenfen."\n".$mylang['pm'].":".str_replace('{num}',uc_pm_checknew($binded['uid']),$mylang['pmnum']).$qd_string;
} else {
	$string = lang('plugin/hux_wx','tobind');
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>