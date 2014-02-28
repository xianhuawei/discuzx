<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: member_connect.php 34242 2013-11-21 08:35:08Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('NOROBOT', TRUE);

if(!$_G['setting']['connect']['allow']) {
	showmessage('qqconnect:qqconnect_closed');
}

if($_GET['action'] == 'login') { // debug 已有账号，绑定我的账号走此分支

	$ctl_obj = new logging_ctl();
	$_G['setting']['seccodestatus'] = 0;

	$ctl_obj->connect_guest = $connect_guest;

	$ctl_obj->extrafile = libfile('member/connect_logging', 'module');
	$ctl_obj->template = 'member/login';
	$ctl_obj->on_login();

} else { // debug 完善我的资料，即添加个新的论坛账号走此分支

	// debug 检查用户绑定次数
	$_G['qc']['connect_auth_hash'] = $_GET['con_auth_hash'];
	if(!$_G['qc']['connect_auth_hash']) {
		$_G['qc']['connect_auth_hash'] = $_G['cookie']['con_auth_hash'];
	}

	$conopenid = authcode($_G['qc']['connect_auth_hash']);

	$ctl_obj = new register_ctl();
	$ctl_obj->setting = $_G['setting'];

	// debug 论坛是否允许QQ号注册（后台有设置）
	if($_G['setting']['regconnect']) {
		$ctl_obj->setting['regstatus'] = $ctl_obj->setting['regstatus'] ? $ctl_obj->setting['regstatus'] : 1;
	}

	// debug 论坛已经关闭注册
	$_G['setting']['regclosed'] = $_G['setting']['regconnect'] && !$_G['setting']['regstatus'];

	// debug 黑名单
	loadcache('connect_blacklist');
	if(in_array($conopenid, $_G['cache']['connect_blacklist'])) {
		showmessage('qqconnect:connect_uin_in_blacklist', $referer, array('changeqqurl' => $_G['connect']['discuz_change_qq_url']));
	}

	// debug 一个QQ号创建论坛账号的最大个数
	$_G['qc']['uinlimit'] = $_G['setting']['connect']['register_uinlimit'] && C::t('#qqconnect#connect_memberbindlog')->count_uid_by_openid_type($conopenid, '1') >= $_G['setting']['connect']['register_uinlimit'];
	if($_G['qc']['uinlimit']) {
		$_G['setting']['regconnect'] = false;
	}
	if(!$_G['setting']['regconnect']) {
		$ctl_obj->showregisterform = 0;
		$ctl_obj->setting['sitemessage']['register'] = array();
	}

	if($_G['qc']['uinlimit']) {
		$ctl_obj->showregisterform = 0;
		$ctl_obj->setting['sitemessage']['register'] = array();
		$ctl_obj->setting['regconnect'] = false;
	}

	// debug QQ注册时忽略注册验证
	if($_G['setting']['connect']['register_regverify']) {
		$ctl_obj->setting['regverify'] = 0;
	}
	// debug 验证码和验证问答
	$_G['setting']['seccodestatus'] = 0;
	$_G['setting']['secqaa']['status'] = 0;

	// debug 忽略邮件注册
	$ctl_obj->setting['sendregisterurl'] = false;
	
	// debug QQ互联游客
	$ctl_obj->connect_guest = $connect_guest;

	loadcache(array('fields_connect_register', 'profilesetting'));
	foreach($_G['cache']['fields_connect_register'] as $field => $data) {
		unset($_G['cache']['fields_register'][$field]);
	}
	$_G['cache']['profilesetting']['gender']['unchangeable'] = 0;
	$_G['cache']['profilesetting']['birthyear']['unchangeable'] = 0;
	$_G['cache']['profilesetting']['birthmonth']['unchangeable'] = 0;
	$_G['cache']['profilesetting']['birthday']['unchangeable'] = 0;
	$_G['cache']['fields_register'] = array_merge($_G['cache']['fields_connect_register'], $_G['cache']['fields_register']);

	// debug 论坛邀请注册
	if($_G['setting']['connect']['register_invite']) {
		$ctl_obj->setting['regstatus'] = 1;
	}

	// debug QQ注册用户不忽略验证码
	if(!$_G['setting']['connect']['register_regverify']) {
		$ctl_obj->setting['seccodestatus'] = $_G['setting']['seccodestatus'];
		$ctl_obj->setting['secqaa']['status'] = $_G['setting']['secqaa']['status'];
	}

	// debug QC注册用户忽略密码，用随机密码填充
	$ctl_obj->setting['ignorepassword'] = 1;
	$ctl_obj->setting['checkuinlimit'] = 1;
	// debug QQ注册忽略密码强度判断
	$ctl_obj->setting['strongpw'] = 0;
	$ctl_obj->setting['pwlength'] = 0;

	if($_GET['ac'] == 'bind') {
		$ctl_obj->setting['reglinkname'] = lang('plugin/qqconnect', 'connect_register_bind');
	} else {
		$ctl_obj->setting['reglinkname'] = lang('plugin/qqconnect', 'connect_register_profile');
	}

	// debug 类似钩子的嵌入点
	$ctl_obj->extrafile = libfile('member/connect_register', 'module');
	$ctl_obj->template = 'member/register';
	$ctl_obj->on_register();

}

?>