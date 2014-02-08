<?php
/**
 *	表态评分
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $_G;
$btpsConfig = array();
$btpsConfig = $_G['cache']['plugin']['she_btps'];
$tid = intval($_GET['tid']);
$pid = intval($_GET['pid']);
$fid = intval($_GET['fid']);
$action = $_GET['action'];
$btps_post = intval($btpsConfig['btps_post']);

if($action == 'btpsajax') {
	$btps_name_a = trim($btpsConfig['btps_name_a']);
	$btps_name_b = trim($btpsConfig['btps_name_b']);
	$btps_name_c = trim($btpsConfig['btps_name_c']);
	$btps_text_a = trim($btpsConfig['btps_text_a']);
	$btps_text_b = trim($btpsConfig['btps_text_b']);
	$btps_text_c = trim($btpsConfig['btps_text_c']);
	$btps_ext_a = intval($btpsConfig['btps_ext_a']);
	$btps_ext_b = intval($btpsConfig['btps_ext_b']);
	$btps_ext_c = intval($btpsConfig['btps_ext_c']);
	$btps_tz = intval($btpsConfig['btps_tz']);
	$btps_pznum = intval($btpsConfig['btps_pznum']);

	$referer = $_G['siteurl'].'forum.php?mod=viewthread&tid='.$tid.'#pid'.$pid;
	$querycache = DB::query("SELECT rate FROM ".DB::table('forum_postcache')." WHERE pid = '$pid'");
	$resultcache = DB::fetch($querycache);
	$resultcache['rate'] = dunserialize($resultcache['rate']);
	$postlist['ratelogextcredits'] = $resultcache['rate']['extcredits'];
	$heights = ($postlist["ratelogextcredits"][$btps_ext_a] + $postlist["ratelogextcredits"][$btps_ext_b] + $postlist["ratelogextcredits"][$btps_ext_c]) / $btps_pznum;
	$height_a = intval(($postlist["ratelogextcredits"][$btps_ext_a] / $heights) + 1);
	$height_b = intval(($postlist["ratelogextcredits"][$btps_ext_b] / $heights) + 1);
	$height_c = intval(($postlist["ratelogextcredits"][$btps_ext_c] / $heights) + 1);
	if($btps_tz) $btps_tz_add = "checked=\"true\" ";
	$postlist_a = intval($postlist['ratelogextcredits'][$btps_ext_a]);
	$postlist_b = intval($postlist['ratelogextcredits'][$btps_ext_b]);
	$postlist_c = intval($postlist['ratelogextcredits'][$btps_ext_c]);
	if($btps_post){
		$she_btps_script_txt =  (($btps_name_a && $btps_ext_a) ? ($btps_name_a."<span class='pipe'>|</span>") : ('')).(($btps_name_b && $btps_ext_b) ? ($btps_name_b."<span class='pipe'>|</span>") : ('')).(($btps_name_c && $btps_ext_c) ? ($btps_name_c."<span class='pipe'>|</span>") : ('')).lang('plugin/she_btps', 'she_btps_script_3');
	}
	include template('she_btps:btps_ajax');

}elseif($action == 'postajax') {
	if($btps_post && $_G['uid']){//开启回帖
		if(!empty($_GET['formhash']) || $_GET['formhash'] == formhash()) {//提交来路正常
			$txts = "btps_text_".$_GET['txts'];
			$btps_text = daddslashes(dhtmlspecialchars(trim($btpsConfig[$txts])));
			$dateline = TIMESTAMP;
			$useip = $_SERVER['REMOTE_ADDR'];
			$query = DB::query('SELECT subject,maxposition FROM '.DB::table('forum_thread')." WHERE tid='$tid'");
			$result = DB::fetch($query);
			$message = cutstr($result['subject'], 30, "...");
			$maxposition = intval($result['maxposition']);
			$lastpost = $tid."\t".$message."\t".$dateline."\t".$_G['username'];
			if($maxposition == 0){
				$maxposition = 2;
			}else{
				$maxposition = 1;
			}
			DB::query("INSERT INTO ".DB::table('forum_post_tableid')." () VALUES ()");//回帖PID
			$newID = MYSQL_INSERT_ID();//获取PID
			DB::query("INSERT INTO ".DB::table('forum_post')." (pid, fid, tid, author, authorid, dateline, message, useip, usesig, bbcodeoff, smileyoff) VALUES ('$newID', '$fid', '$tid', '$_G[username]', '$_G[uid]', '$dateline', '$btps_text', '$useip', '1', '-1', '-1')");//回帖
			DB::query("UPDATE ".DB::table('forum_thread')." SET replies=replies+1,maxposition=maxposition+'$maxposition',lastpost='$dateline',lastposter='$_G[username]' WHERE tid='$tid'");//更新主题
			DB::query("UPDATE ".DB::table('forum_forum')." SET posts=posts+1,todayposts=todayposts+1,lastpost='$lastpost' WHERE fid='$fid'");//更新版块
			$she_btps_script =  lang('plugin/she_btps', 'she_btps_script_1');
		}else{
			$she_btps_script =  lang('message', 'submit_invalid');
		}
	}else{
		$she_btps_script =  lang('plugin/she_btps', 'she_btps_script_2');
	}
	include template('she_btps:btps_ajax');
}
?>