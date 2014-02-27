<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

if(!$isevaluate && $adminid != 1)
	showmessage(lang('plugin/hsk_vcenter', 'closereply'));
$revid = intval($_GET['revid']);
if(!$revid)
	showmessage(lang('plugin/hsk_vcenter', 'onerror'));

$message = $_GET['message'];

if(submitcheck('replysubmit')) {
	if(!$discuz_uid)
		showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
	$message_box = strlen(preg_replace('/\s*\[quote\][\n\r]*(.+?)[\n\r]*\[\/quote\]\s*/is', '', $message));
	if($message == '' || ($message && $message_box == 0)) {
		showmessage(lang('plugin/hsk_vcenter', 'noreplystr'));
	}
	if(strlen($message) > 300 || $message_box < 6)	showmessage(lang('plugin/hsk_vcenter', 'noreplystr'));

	require_once libfile('function/post');
	if(checkflood()) {
		showmessage('post_flood_ctrl');
	}
	//
}else{
	showmessage(lang('plugin/hsk_vcenter', 'onerror'));
}

//检查ID 调入相关参数
$query = DB::query("SELECT v.fid, v.tid, v.uid, v.sup, t.subject, ab.id as abid, ab.tid as abtid, v.abtotal FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('forum_thread')." t ON t.tid=v.tid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup WHERE v.audit='1' and v.id='$revid'");
if(!$datarow = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindreply'));
}
$tid = $datarow['tid'] ? $datarow['tid'] : $datarow['abtid'];
$push_uid		= $datarow['uid'];
$pollid = $datarow['abtotal'] == -1 ? $datarow['abid'] : $revid;

if($tid){
	$query = DB::query("SELECT tid from ".DB::table("forum_thread")." WHERE tid='$tid'");
	if(!$datasearch = DB::fetch($query)){
		$tid = 0;
	}
}

if($tid && $datarow['fid']){
	foreach($_SORT as $datarow2){
		if($datarow['fid'] == $datarow2['sid']){
			$bandfid = $datarow2['band'];
			if($datarow2['type'] == 'sub')	$fupfid = $datarow2['fup'];
			if($datarow2['regroup']){
				$tmpstr = (array)unserialize($datarow2['regroup']);
				$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
				if(!$relemiss && $adminid != 1){
					unset($datarow);
					showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
				}
			}
		}
	}
}else{
	$tid = 0;
}

if(!$bandfid)$tid = 0;
//以上是判断是要生成到论坛，条件分别是	视频有TID值，视频有FID值、视频所属的FID有绑定论坛FID，此些条件。

//直接写入到POST表里
if($tid){
	require_once libfile('function/post');
	require_once libfile('function/forum');
	$bbcodeoff = checkbbcodes($message, !empty($_GET['bbcodeoff']));
	$smileyoff = checksmilies($message, !empty($_GET['smileyoff']));
	$parseurloff = !empty($_GET['parseurloff']);
	$htmlon = $_G['group']['allowhtml'] && !empty($_GET['htmlon']) ? 1 : 0;
	$usesig = !empty($_GET['usesig']) ? 1 : ($_G['uid'] && $_G['group']['maxsigsize'] ? 1 : 0);

	$pinvisible = !$isauditv || $adminid==1 || $groupon_3 ? "0" : "-2";
	$message = preg_replace('/\[attachimg\](\d+)\[\/attachimg\]/is', '[attach]\1[/attach]', $message);

	$pid = insertpost(array(
		'fid' => $bandfid,
		'tid' => $tid,
		'first' => '0',
		'author' => $discuz_user,
		'authorid' => $discuz_uid,
		'subject' => '',
		'dateline' => $timestamp,
		'message' => $message,
		'useip' => $clientip,
		'invisible' => $pinvisible,
		'anonymous' => 0,
		'usesig' => $usesig,
		'htmlon' => $htmlon,
		'bbcodeoff' => $bbcodeoff,
		'smileyoff' => 0,
		'parseurloff' => $parseurloff,
		'attachment' => '0',
		'status' => (defined('IN_MOBILE') ? 8 : 0),
	));

	$lastpostsql = "lastpost='$timestamp',";
	DB::query("UPDATE ".DB::table('forum_thread')." SET lastposter='$discuz_user', $lastpostsql replies=replies+1 WHERE tid='$tid'", 'UNBUFFERED');
	updatepostcredits('+', $discuz_uid, 'reply', $bandfid);

	$lastpost = "$tid\t".addslashes($datarow['subject'])."\t$timestamp\t$discuz_user";
	DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', posts=posts+1, todayposts=todayposts+1 WHERE fid='$bandfid'", 'UNBUFFERED');
	DB::query("UPDATE ".DB::table('vgallerys')." SET polls=polls+1, replyuid='$discuz_uid' WHERE id='$pollid'");

	//是否有上极版块，如果有，更新上级版块
	if($fupfid){
		DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost' WHERE fid='$fupfid'", 'UNBUFFERED');
	}

}else{
	$auditsql = !$isauditv || $adminid==1 ? "1" : "0";
	DB::query("INSERT INTO ".DB::table('vgallery_poll')." (vid, uid, dateline, audit, post)
				VALUES ('$pollid', '$discuz_uid', '$timestamp', '$auditsql', '$message')");
	DB::query("UPDATE ".DB::table('vgallerys')." SET polls=polls+1, replyuid='$discuz_uid' WHERE id='$pollid'");
}

//通知提醒。

if($push_uid != $discuz_uid){
	if($tid){
		$tidpage = lang('plugin/hsk_vcenter', 'sendtomsg1').'<a href="forum.php?mod=redirect&goto=findpost&pid='.$pid.'&ptid='.$tid.'" target="_blank" class="lit">'.lang('plugin/hsk_vcenter', 'sendtomsg2').'</a>';
	}else{
		$tidpage = null;
		$tid = $revid;
	}

	$message = '<a href="home.php?mod=space&uid='.$discuz_uid.'" target="_blank">'.$discuz_user.'</a> '.lang('plugin/hsk_vcenter', 'sendtomsg3').' <a href="'.sendurl('pushshow', 0, $revid).'" target="_blank">'.$datarow['subject'].'</a>'.$tidpage;
	notification_add($push_uid, 'post', $message, array(
		'from_id' => $tid,
		'from_idtype' => 'post',
	));
}

showmessage(lang('plugin/hsk_vcenter', 'sendtomsg4'), '', array(), array('showmsg' => 0, 'locationtime' => true));

?>