<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/lang/lang.'.currentlang().'.php';
if (submitcheck('weixinsubmit')) {
	$dreferer = rawurldecode($_GET['referer']);
	$authid = intval($_GET['authid']);
	$user = C::t('#hux_wx#hux_wx_login')->fetch_by_id($authid,'uid');
	if ($user) {
		if ($user['uid'] != 0) {
			C::t('#hux_wx#hux_wx_login')->delete($authid);
			hux_wx_do_login($user['uid'],$dreferer);
		} else {
			showmessage($loginlang['loginerr'],$dreferer);
		}
	} else {
		showmessage($loginlang['loginerr'],$dreferer);
	}
} else {
	C::t('#hux_wx#hux_wx_login')->delete_by_dateline();
	$authid = mt_rand(100000,999999);
	$dreferer = rawurlencode(dreferer());
	C::t('#hux_wx#hux_wx_login')->insert(array('id'=>$authid,'dateline'=>TIMESTAMP));
	include template('index', 'hux_wx_login', './source/plugin/hux_wx/mod/login/template');
}

function hux_wx_do_login($uid,$dreferer) {	
	$uid = intval($uid);
	$member = getuserbyuid($uid);
	if(isset($member['_inarchive'])) {
		C::t('common_member_archive')->move_to_master($member['uid']);
	}
	require_once libfile('function/member');
	$cookietime = 1296000;
	setloginstatus($member, $cookietime);
	$params['mod'] = 'login';
	loadcache('usergroups');
	$param = array('username' => $member['username'], 'usergroup' => $_G['cache']['usergroups'][$member['groupid']]['grouptitle']);
	C::t('common_member_status')->update($member['uid'], array('lastip'=>$_G['clientip'], 'lastvisit'=>TIMESTAMP, 'lastactivity' => TIMESTAMP));
	$ucsynlogin = '';
	if($_G['setting']['allowsynlogin']) {
		loaducenter();
		$ucsynlogin = uc_user_synlogin($uid);
	}
	showmessage('login_succeed',$dreferer, $param, array('extrajs' => $ucsynlogin,'alert' => 'right'));
	return true;
}	
?>