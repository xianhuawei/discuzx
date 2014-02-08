<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/qd/lang/lang.'.currentlang().'.php';
if ($binded) {
	$user_cm = C::t('#hux_wx#hux_common_member')->fetch_by_uid($binded['uid'],'groupid');
	if (in_array($user_cm['groupid'],$postgp)) {
		$string = lang('plugin/hux_wx','noop');
	} else {
		if (hux_count_days($binded['qdtime']) > 0) {
			if (hux_count_days($binded['qdtime']) > 1) {
				$qdnum = 1;
			} else {
				$qdnum = intval($binded['qdnum'] + 1);
			}
			C::t('#hux_wx#hux_wx')->update($openid,array('qdnum'=>$qdnum,'qdtime'=>TIMESTAMP));
			updatemembercount($binded['uid'] , array($paymoney => $appconfig['qdmoney']));
			$qd_arr = array();
			$qd_arr = explode('[n]', $appconfig['qdlv']); 
			$qiandaolv = array();
			foreach ($qd_arr as $key => $value){
				$qiandaolv[$key] = explode("|", $value);
			}
			foreach ($qiandaolv as $v) {
				if ($qdnum >= $v[0]) {
					$vv[] = $v;
				}             							
			}
			$maxarr = $vv[count($vv)-1];
			if ($maxarr[2] > 0) {
				$paymoneyb = 'extcredits'.$appconfig['lxqdmoney'];
				$paymoneynameb = $_G['setting']['extcredits'][$appconfig['lxqdmoney']]['title'];
				updatemembercount($binded['uid'] , array($paymoneyb => intval($maxarr[2])));
				$lxstr = $qdlang['qdlvnum'].intval($maxarr[2]).$paymoneynameb;
			} else {
				$lxstr = '';
			}
			$string = $qdlang['qdsus'].$appconfig['qdmoney'].$paymoneyname.$lxstr;
			$string = str_replace('{days}',$qdnum,$string);
		} else {
			$string = $qdlang['qderr'];
		}
	}
} else {
	$string = lang('plugin/hux_wx','tobind');
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;

function hux_count_days($date){
	$a_dt=getdate(TIMESTAMP);
	$b_dt=getdate($date);
	$a_new=mktime(0,0,0,$a_dt['mon'],$a_dt['mday'],$a_dt['year']);
	$b_new=mktime(0,0,0,$b_dt['mon'],$b_dt['mday'],$b_dt['year']);
	return round(($a_new-$b_new)/86400);
}
?>