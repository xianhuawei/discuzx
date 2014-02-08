<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/roll/lang/lang.'.currentlang().'.php';
$mycash = C::t('#hux_wx#hux_common_member_count')->result_by_uid($binded['uid'],$paymoney);
$keyword = intval($keyword);
$moneymax = intval($appconfig['moneymax']);
if ($keyword > $mycash) {
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = lang('plugin/hux_wx','moneyno');
} elseif ($keyword < 1 || $keyword > $moneymax) {
	$string = $rolllang['moneyerr'].$moneymax.$paymoneyname;
} else {
	$roll_a_a = mt_rand(1,6);
	$roll_a_b = mt_rand(1,6);
	$roll_a_c = mt_rand(1,6);
	$roll_b_a = mt_rand(1,6);
	$roll_b_b = mt_rand(1,6);
	$roll_b_c = mt_rand(1,6);
	$roll_a = $roll_a_a + $roll_a_b + $roll_a_c;
	$roll_b = $roll_b_a + $roll_b_b + $roll_b_c;
	if ($roll_a > $roll_b) {
		updatemembercount($binded['uid'] , array($paymoney => -$keyword));
		$jieguo = $rolllang['rollerr'].$keyword.$paymoneyname;
	} elseif ($roll_a < $roll_b) {
		updatemembercount($binded['uid'] , array($paymoney => $keyword));
		$jieguo = $rolllang['rollsus'].$keyword.$paymoneyname;
	} else {
		$jieguo = $rolllang['rollping'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = $rolllang['roll'].$jieguo;
	$string = str_replace(array('{rolla}','{rollb}'),array($roll_a_a.'+'.$roll_a_b.'+'.$roll_a_c.'='.$roll_a,$roll_b_a.'+'.$roll_b_b.'+'.$roll_b_c.'='.$roll_b),$string);
}

if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>