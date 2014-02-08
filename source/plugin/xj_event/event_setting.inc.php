<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$tid = intval($_GET['tid']);

//权限验证
$thread = DB::fetch_first("SELECT A.authorid,B.setting FROM ".DB::table('forum_thread')." A,".DB::table('xj_event')." B WHERE A.tid='$tid' and A.tid = B.tid");
$setting = unserialize($thread['setting']);
if($_G['groupid']>1 && $_G['uid']!=$thread['authorid']){
	showmessage('quickclear_noperm');
}

if($_GET['action']=='save'){
	showmessage(lang('plugin/xj_event', 'buy'), 'forum.php?mod=viewthread&tid='.$tid);
}



include template('xj_event:event_setting');

?>