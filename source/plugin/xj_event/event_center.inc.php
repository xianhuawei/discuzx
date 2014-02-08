<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$nowtime=$_G['timestamp'];
$xxnum = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_event')." WHERE postclass=1");  //线下活动数
$xsnum = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_event')." WHERE postclass=2");  //线上活动数
//获取线上和线下活动分类
$tmp = explode("\n",$_G['cache']['plugin']['xj_event']['event_offline_class']);
$offlineclass = array();
foreach($tmp as $key=>$value){
	$ctmp = array();
	$ctmp = explode("|",$value);
	$ctmp[1] = str_replace("\r",'',$ctmp[1]);
	$ctmp[2] = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_event')." WHERE postclass=1 and offlineclass=".$ctmp[0]);
	$offlineclass[] = $ctmp;
}
$tmp = explode("\n",$_G['cache']['plugin']['xj_event']['event_online_class']);
$onlineclass = array();
foreach($tmp as $key=>$value){
	$ctmp = array();
	$ctmp = explode("|",$value);
	$ctmp[1] = str_replace("\r",'',$ctmp[1]);
	$ctmp[2] = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_event')." WHERE postclass=2 and onlineclass=".$ctmp[0]);
	$onlineclass[] = $ctmp;
}


if($_G['cache']['plugin']['xj_event']['event_centerstyle']==2){
	include template('xj_event:center2');
}else{
	include template('xj_event:center');
}

?>