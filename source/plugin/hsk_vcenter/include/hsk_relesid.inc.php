<?php 

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

//showmessage('登录提示', '', array(), array('login' => true));
if(!$discuz_uid)
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));

//是否可以给普通会员发布
if(!$groupon_2 && $adminid!=1)
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));

$relesid_br	= $getvar['relesid_br'];						//每行显示数
$absid = explode('_', dhtmlspecialchars($_GET['sidarr']));
$p = count($absid);

include template("ajax_relesid", 'Kannol', PTEM);
?>