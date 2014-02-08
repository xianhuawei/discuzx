<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/bank/lang/lang.'.currentlang().'.php';
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/bank/fun.php';
$mycash = C::t('#hux_wx#hux_common_member_count')->result_by_uid($binded['uid'],$paymoney);
$outmax = intval($appconfig['outmax']);
$keyword = intval($keyword);
if ($huxaction['action'] == '0') {
	if ($keyword != 1 && $keyword != 2 && $keyword != 3) {
		$string = $banklang['ott'];
	} else {
		if ($keyword == 1) {
			$hqinfo = C::t('#hux_wx#hux_wx')->fetch_by_openid($openid,'banknum,banktime');
			if ($hqinfo['banknum'] == 0) {
				$string = $banklang['nodata'];
			} else {
				$hqmoneydate = hux_count_days($hqinfo['banktime']);
				$hqlixi = intval($hqinfo['banknum'] * $appconfig['hqfeilv'] * $hqmoneydate);
				$string = $banklang['tocun'].":".$hqinfo['banknum'].$paymoneyname."\n".$banklang['tolixi'].":".$hqlixi.$paymoneyname."\n".$banklang['dateline'].":".dgmdate($hqinfo['banktime']);
			}
			C::t('#hux_wx#hux_wx_action')->delete($openid);
		} else {
			C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$keyword));
			$string = str_replace('{outmax}',$appconfig['outmax'],$banklang['inputmsg']);
		}
	}
} elseif ($huxaction['action'] == '2') {
	if ($keyword < 1 || $keyword > intval($appconfig['outmax'])) {
		$string = str_replace('{outmax}',$appconfig['outmax'],$banklang['inputmsg']);
	} else {
		if ($mycash < $keyword) {
			C::t('#hux_wx#hux_wx_action')->delete($openid);
			$string = lang('plugin/hux_wx','moneyno');
		} else {
			updatemembercount($binded['uid'],array($paymoney => -$keyword));
			$moneydate = hux_count_days($binded['banktime']);
			$lixi = intval($binded['banknum'] * $appconfig['hqfeilv'] * $moneydate);
			$savemoney = intval($binded['banknum'] + $keyword + $lixi);
			C::t('#hux_wx#hux_wx')->update($openid,array('banknum'=>$savemoney,'banktime'=>TIMESTAMP));
			C::t('#hux_wx#hux_wx_action')->delete($openid);
			$string = lang('plugin/hux_wx','opsus');
		}
	}
} elseif ($huxaction['action'] == '3') {
	if ($keyword < 1 || $keyword > intval($appconfig['outmax'])) {
		$string = str_replace('{outmax}',$appconfig['outmax'],$banklang['inputmsg']);
	} else {
		$moneydate = hux_count_days($binded['banktime']);
		$lixi = intval($binded['banknum'] * $appconfig['hqfeilv'] * $moneydate);
		$allmoney = intval($binded['banknum'] + $lixi);
		$savemoney = intval($binded['banknum'] + $lixi - $keyword);
		if ($allmoney < $keyword) {
			$string = $banklang['nocunmsg'].':'.$allmoney.$paymoneyname;
		} else {
			updatemembercount($binded['uid'],array($paymoney => $keyword));
			C::t('#hux_wx#hux_wx')->update($openid,array('banknum'=>$savemoney,'banktime'=>TIMESTAMP));
			C::t('#hux_wx#hux_wx_action')->delete($openid);
			$string = lang('plugin/hux_wx','opsus');
		}
	}
}

if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>