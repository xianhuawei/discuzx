<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!$_G['uid']) {
	showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
$tid = intval($_GET['tid']);
//获取活动组织人的ID
$item = DB::fetch_first("SELECT authorid,subject FROM ".DB::table('forum_thread')." WHERE tid = '$tid'");
$event_uid = $item['authorid'];
$event_title = $item['subject'];

if($_GET['action']=='cannel'){
	$items = DB::fetch_first("SELECT userfield,setting,use_extcredits_num,use_extcredits FROM ".DB::table('xj_event')." WHERE tid = '$tid'");
	DB::query("DELETE FROM ".DB::table('xj_eventapply')." WHERE tid = '$tid' and uid = ".$_G['uid']);
	//积分操作
	if($items['use_extcredits_num']>0){
		updatemembercount($_G['uid'],array($items['use_extcredits']=>$items['use_extcredits_num']));
	}
	showmessage(lang('plugin/xj_event', 'cgqxbm'));
}


$member = DB::fetch_first("SELECT extcredits1,extcredits2,extcredits3,extcredits4,extcredits5,extcredits6,extcredits7,extcredits8 FROM ".DB::table('common_member_count')." WHERE uid = ".$_G['uid']);
$items = DB::fetch_first("SELECT userfield,setting,use_extcredits_num,use_extcredits FROM ".DB::table('xj_event')." WHERE tid = '$tid'");

//判断积分够不够
if($member['extcredits'.$items['use_extcredits']]<$items['use_extcredits_num']){
	showmessage($_G['setting']['extcredits'][$items['use_extcredits']]['title'].lang('plugin/xj_event', 'bgwfcj'));
}




$userfield = unserialize($items['userfield']);
$setting = unserialize($items['setting']);
foreach($_POST as $key => $value) {
	if(empty($value) && $key != 'message') {
		showmessage('activity_exile_field');
	}
}



$dateline = $_G['timestamp'];
$eid = intval($_GET['eid']);
$uid = $_G['uid'];
$realname = addslashes($_GET['realname']);
$mobile = addslashes($_GET['mobile']);
$qq = addslashes($_GET['qq']);
$bmmessage = addslashes($_GET['message']);
$applynumber = intval($_GET['applynumber']);

$ufielddata = array();
$selectuserfield = unserialize($items['userfield']);
$sysuserfield = unserialize($_G['setting']['activityfield']);
foreach($sysuserfield as $key => $value){
	if(in_array($key,$selectuserfield)){
		if(is_array($_GET[$key])){
			$ufielddata[$key] = implode(',',$_GET[$key]);
		}elseif($key=='birthday'){
			$ufielddata[$key] = $_GET['birthyear'].'-'.$_GET['birthmonth'].'-'.$_GET['birthday'];
		}else{
			$ufielddata[$key] = $_GET[$key];
		}
	}
}
$ufielddata = serialize($ufielddata);


DB::query("INSERT INTO ".DB::table('xj_eventapply')." 
		(tid, eid, uid, realname, mobile, qq, bmmessage, dateline, applynumber, ufielddata) 
		VALUES 
		('$tid', '$eid', '$uid', '$realname', '$mobile', '$qq', '$bmmessage', '$dateline', '$applynumber', '$ufielddata')");
$num = DB::result_first("SELECT count(*) FROM ".DB::table('xj_event_member_info')." WHERE uid = '$uid'");
if($num==0){
	DB::query("INSERT INTO ".DB::table('xj_event_member_info')." (uid) VALUES ('$uid')");
}
//积分操作
if($items['use_extcredits_num']>0){
	updatemembercount($_G['uid'],array($items['use_extcredits']=>-$items['use_extcredits_num']));
}

if($setting['noverify']==1){
	if($setting['eventpay']){
		showmessage('报名资料提交成功！现在转入支付页面。', "plugin.php?id=xj_event:event_pay&tid=$tid", array(), array('showdialog' => 1, 'showmsg' => true, 'locationtime' => true, 'alert' => 'right'));
	}else{	
		DB::query("update ".DB::table('xj_eventapply')." set verify=1 where tid='$tid'"); //自动审核
		notification_add($event_uid, 'system',$_G['username'].' '.lang('plugin/xj_event', 'bmcjlnd').' <a href="forum.php?mod=viewthread&tid='.$tid.'" target="_blank">'.$event_title.'</a> '.lang('plugin/xj_event', 'hdxtyzdsh'),array(),0);
		showmessage(lang('plugin/xj_event', 'gxnbmcg'), "forum.php?mod=viewthread&tid=$tid", array(), array('showdialog' => 1, 'showmsg' => true, 'locationtime' => true, 'alert' => 'right'));
	}
}else{
	notification_add($event_uid, 'system',$_G['username'].' '.lang('plugin/xj_event', 'bmcjlnd').' <a href="forum.php?mod=viewthread&tid='.$tid.'" target="_blank">'.$event_title.'</a> '.lang('plugin/xj_event', 'hdqsh'),array(),0);
	showmessage(lang('plugin/xj_event', 'bmxxtjcgqddsh'), "forum.php?mod=viewthread&tid=$tid", array(), array('showdialog' => 1, 'showmsg' => true, 'locationtime' => true, 'alert' => 'right'));
}


?>