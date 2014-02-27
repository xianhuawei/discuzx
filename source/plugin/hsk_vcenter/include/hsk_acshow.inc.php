<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$action = dhtmlspecialchars($_GET['action']);
if(!$vid)	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

$query = DB::query("SELECT id, album, sup FROM ".DB::table('vgallerys')." where id='$vid'");
if(!$supstr = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

if($supstr['album'] == 0 && in_array($action, array('first', 'end'))){
	$locationurl = sendurl('show',0,$supstr['id']);
	header("location: $locationurl");
	exit();
}elseif($supstr['album'] > 0 && in_array($action, array('next', 'prev'))){
	$locationurl = sendurl('dlist',0,$supstr['id']);
	header("location: $locationurl");
	exit();
}

//处理来源，判断SQL
if($action == 'first'){//专辑的第一集
	$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, ab.album as ab_album, ab.vsubject as absubject, ab.address as ab_address, ab.years as ab_years, ab.language as ab_language, ab.sidstr as ab_sidstr FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.sup='$vid' and m.audit='1' order by m.id limit 1");
}elseif($action == 'end'){	//专辑的最后一集
	$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, ab.album as ab_album, ab.vsubject as absubject, ab.address as ab_address, ab.years as ab_years, ab.language as ab_language, ab.sidstr as ab_sidstr FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.sup='$vid' and m.audit='1' order by m.id desc limit 1");
}elseif($action == 'next'){	//专辑的下一集
	$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, ab.album as ab_album, ab.vsubject as absubject, ab.address as ab_address, ab.years as ab_years, ab.language as ab_language, ab.sidstr as ab_sidstr FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id>$vid and m.sup='$supstr[sup]' and m.audit='1' order by m.id limit 1");
}elseif($action == 'prev'){
	$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, ab.album as ab_album, ab.vsubject as absubject, ab.address as ab_address, ab.years as ab_years, ab.language as ab_language, ab.sidstr as ab_sidstr FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id<$vid and m.sup='$supstr[sup]' and m.audit='1' order by m.id desc limit 1");

}else{
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}

if(!$viewdata = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

$locationurl = sendurl('show',0,$viewdata['id']);
//dexit($locationurl);
header("location: $locationurl");
exit();

?>