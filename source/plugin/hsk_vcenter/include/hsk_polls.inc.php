<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

//获取页数信息
$page = max(1, intval($page));
$ppp = 10;
//cache_smilies();

if(!$vid)
	showmessage(lang('plugin/hsk_vcenter', 'nofindreply'));

$query = DB::query("SELECT v.id, v.tid, v.pid, t.views, t.replies, v.uid, v.dateline, v.vsubject, v.vinfo, v.vurl, v.vprice, v.sup, v.abtotal FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('forum_thread')." t ON t.tid=v.tid WHERE v.audit='1' and v.id='$vid'");
if(!$datarow = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindreply'));
}

//先取得页面
$tid = $datarow['tid'];
$pid = $datarow['pid'];

if($tid){
	$countmax = $maxpage = $datarow['replies'];
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=polls&vid='.$vid, 0, 8, 0, 'poplepolls');

	$query = DB::query("SELECT p.*, m.username
							FROM ".DB::table('forum_post'). " p
							LEFT JOIN ".DB::table('common_member')." m ON m.uid=p.authorid
							WHERE p.invisible='0' and p.tid='$tid' and p.pid<>'$pid' ORDER BY p.dateline DESC LIMIT ".(($page-1)*$ppp).", $ppp");
}else{

	$vid = $datarow['abtotal'] == -1 ? $datarow['sup'] : $datarow['id'];
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_poll')." where vid='$vid' and audit='1'");
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=polls&vid='.$vid, 0, 8, 0, 'poplepolls');

	$query = DB::query("SELECT p.id as pid, p.vid, p.uid, p.post as message, m.username, p.dateline
							FROM ".DB::table('vgallery_poll'). " p
							LEFT JOIN ".DB::table('common_member')." m ON m.uid=p.uid
							WHERE p.vid='$vid' and p.audit='1' ORDER BY p.id DESC LIMIT ".(($page-1)*$ppp).", $ppp");
}

require_once libfile('function/discuzcode');
while($datarow = DB::fetch($query)){
	$datarow['dbdateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + $timeoffset * 3600);
	$datarow['dateline'] = dgmdate($datarow['dateline'], 'u');
	$datarow['post_quote'] = cutstr(preg_replace('/\s*\[quote\][\n\r]*(.+?)[\n\r]*\[\/quote\]\s*/is', '', $datarow['message']), 80, '...');
	$maxsiliescode = $_G['setting']['maxsmilies'];
	$datarow['post'] = discuzcode($datarow['message'], $datarow['smileyoff'], $datarow['bbcodeoff'], $datarow['htmlon'] & 1);
	$pollvs[] = $datarow;
}

include template("gallery_polls", 'Kannol', PTEM);

?>