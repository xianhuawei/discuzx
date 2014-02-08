<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/pm/lang/lang.'.currentlang().'.php';
if ($huxaction['action'] == '0') {
	loaducenter();
	$user = uc_get_user(addslashes($keyword));
	if (!$user) {
		C::t('#hux_wx#hux_wx_action')->delete($openid);
		$string = lang('plugin/hux_wx','nouid');
	} else {
		if ($keyword == $binded['uid']) {
			C::t('#hux_wx#hux_wx_action')->delete($openid);
			$string = $pmlang['notme'];
		} else {
			C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$keyword));
			$string = str_replace('{username}',$user['username'],$pmlang['inputbody']);
		}
	}
} else {
	sendpm($huxaction['action'], $pmlang['title'], $keyword.'[color=Gray]('.$pmlang['title'].')[/color]', $binded['uid']);
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = $pmlang['pmsus'];
}

if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>