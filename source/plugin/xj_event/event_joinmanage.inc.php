<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

include DISCUZ_ROOT . './source/plugin/xj_event/include/func.php';
$tid = intval($_GET['tid']);

//权限限制
$thread = DB::fetch_first("SELECT authorid,userfield,setting FROM ".DB::table('forum_thread')." A,".DB::table('xj_event')." B WHERE A.tid='$tid' and A.tid = B.tid");
$setting = unserialize($thread['setting']);
if($_G['groupid']>1 && $_G['uid']!=$thread['authorid']){
	showmessage('quickclear_noperm');
}




if($_GET['action']=='verify' and $_GET['applyid']){
	$applyids = implode(',',$_GET['applyid']);
	if($_GET['verifyaction']==1){
		showmessage(lang('plugin/xj_event', 'buy'), 'forum.php?mod=viewthread&tid='.$tid);
	}elseif($_GET['verifyaction']==2){
		showmessage(lang('plugin/xj_event', 'buy'), 'forum.php?mod=viewthread&tid='.$tid);
	}elseif($_GET['verifyaction']==3){
		$items = DB::fetch_first("SELECT userfield,setting,use_extcredits_num,use_extcredits FROM ".DB::table('xj_event')." WHERE tid = '$tid'");
		if($items['use_extcredits_num']>0){
			$query = DB::query("SELECT uid FROM ".DB::table('xj_eventapply')." WHERE applyid in($applyids)");
			while($value = DB::fetch($query)){
				updatemembercount($value['uid'],array($items['use_extcredits']=>$items['use_extcredits_num']));
			}
		}
		DB::query("DELETE FROM ".DB::table('xj_eventapply')." WHERE applyid in($applyids)");
	}
}


//活动报名字段
$selectuserfield = unserialize($thread['userfield']);
$sysuserfield = unserialize($_G['setting']['activityfield']);



$listcount = DB::result_first("SELECT COUNT(*) FROM ".DB::table('xj_eventapply')." WHERE tid='$tid'");
$perpage = 10; //每页数
$page = $_GET['page']?$_GET['page']:1;
if(@ceil($listcount/$perpage) < $page) {
	$page = 1;
}
$start_limit = ($page - 1) * $perpage;
$multipage = mymulti($listcount,$perpage,$page,"plugin.php?id=xj_event:event_joinmanage&tid=$tid",0,10,false,true,false,'joinlist_display');
$multipage = str_replace('class="pg"','class="jlpg"',$multipage);

$query = DB::query("SELECT * FROM ".DB::table('xj_eventapply')." A,".DB::table('common_member')." B WHERE A.uid = B.uid and A.tid = '$tid' ORDER BY A.verify,A.dateline DESC LIMIT $start_limit,$perpage");
$joinlist = array();
require_once libfile('function/profile');
loadcache('profilesetting');
$i=1;
while($value = DB::fetch($query)){
	$value['dateline'] = dgmdate($value['dateline'], 'u');//date('Y-m-d H:i:s',$value['dateline']);
	$value['ufielddata'] = unserialize($value['ufielddata']);
	$data = '';
	$ufielddata = array();
	foreach($value['ufielddata'] as $key => $fieldid) {
		$data = profile_show($key, $value['ufielddata']);
		if($_G['cache']['profilesetting'][$key]['formtype'] == 'file') {
			$data = '<a href="'.$data.'" target="_blank" onclick="zoom(this, this.href, 0, 0, 0); return false;">'.lang('forum/misc', 'activity_viewimg').'</a>';
		}
		if($key=='birthday'){
			$ufielddata[$key]['value'] = $fieldid;
		}else{
			$ufielddata[$key]['value'] = $data;
		}
	}
	$value['ufielddata'] = $ufielddata;
	$value['No'] = $i;
	$joinlist[] = $value;
	$i++;
}
include template('xj_event:join_manage');

?>