<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$types = intval($_GET['types']);
if(!$vid)showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
if($types<=0 || $types > 3){
	//不正确的值，默认或是不修改
	$types = $_G['cookie']['hdstyle'] ? intval($_G['cookie']['hdstyle']) : 2;
}

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache"); 

dsetcookie('hdstyle', $types, 31536000);
$locationurl = sendurl('show','v',$vid);
header("location: $locationurl");
exit();

?>