<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

if($adminid == 1 || $groupon_3){
	$action = dhtmlspecialchars($_GET['action']);
}else{
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
}

$navtitle = lang('plugin/hsk_vcenter', 'managecenter');
$manage_array = array('index', 'ulist', 'plist', 'tvlist', 'album', 'top', 'marger', 'cache', 'polls');
foreach($manage_array as $val){
	$manage_array_str[$val] = lang('plugin/hsk_vcenter', "m_$val");
}

if(!in_array($action, $manage_array)){
	$action = 'index';
}

define('IN_MANAGE', 1);
$navname = $manage_array_str[$action];
$navtitle = $navname." - $navtitle";
require DISCUZ_ROOT.PINC.'/manage/hsk_'.$action.'.inc.php';
exit();

?>