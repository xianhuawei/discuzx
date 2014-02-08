<?php
/**
 *	超级活动
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT . './source/plugin/xj_event/include/func.php';
$tid = intval($_GET['tid']);

//权限验证
$thread = DB::fetch_first("SELECT authorid FROM ".DB::table('forum_thread')." A,".DB::table('xj_event')." B WHERE A.tid='$tid' and A.tid = B.tid");
if($_G['groupid']>1 && $_G['uid']!=$thread['authorid']){
	showmessage('quickclear_noperm');
}




$listcount = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_eventapply')." WHERE tid='$tid' and verify=1");
$perpage = 10; //每页数
$page = $_GET['page']?$_GET['page']:1;
if(@ceil($listcount/$perpage) < $page) {
	$page = 1;
}
$start_limit = ($page - 1) * $perpage;
$multipage = mymulti($listcount,$perpage,$page,"plugin.php?id=xj_event:event_accessmanage&tid=$tid",0,10,false,true,false,'accesslist_display');
$multipage = str_replace('class="pg"','class="jlpg"',$multipage);

$query = DB::query("SELECT * FROM ".DB::table('xj_eventapply')." A,".DB::table('common_member')." B WHERE A.uid = B.uid and A.tid = '$tid' and A.verify=1 ORDER BY A.verify,A.dateline LIMIT $start_limit,$perpage");
$accesslist = array();
while($value = DB::fetch($query)){
	$value['dateline'] = date('Y-m-d H:i:s',$value['dateline']);
	$value['sharenum'] = DB::result_first("SELECT count(*) FROM ".DB::table('xj_eventthread')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid and A.eid=".$value['eid']." and B.authorid=".$value['uid']);
	$accesslist[] = $value;
}

include template('xj_event:access_manage');

?>