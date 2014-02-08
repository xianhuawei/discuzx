<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$tid = intval($_GET['tid']);
$perpage = 30; //每页数

if($_GET['action']=='nopass'){   //没通过审核的报名者

	$listcount = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_eventapply')." WHERE tid='$tid' and verify=0");
	$page = $_GET['page']?$_GET['page']:1;
	if(@ceil($listcount/$perpage) < $page) {
		$page = 1;
	}
	$start_limit = ($page - 1) * $perpage;
	$multipage = multi($listcount,$perpage,$page,"plugin.php?id=xj_event:event_userlist&tid=$tid",0,10,false,true);
	$multipage = str_replace('class="pg"','class="jlpg"',$multipage);
	
	$query = DB::query("SELECT A.uid,A.applynumber,B.username FROM ".DB::table('plugin_xj_eventapply')." A,".DB::table('common_member')." B WHERE A.uid = B.uid and A.tid = '$tid' and A.verify=0 ORDER BY A.dateline LIMIT $start_limit,$perpage");
	$joinlist = array();
	while($value = DB::fetch($query)){
		//$value['avatar'] = avatar($value['uid'], 'middle');
		$value['avatar'] = '<img src="'.avatar($value[uid], 'middle', true, false, true).'?random='.random(2).'" onerror="this.onerror=null;this.src=\''.$_G['setting']['ucenterurl'].'/images/noavatar_middle.gif\'" />';
		$joinlist[] = $value;
	}

}elseif($_GET['action']=='noattend'){   //报名通过后没有参加活动的

	$listcount = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_eventapply')." WHERE tid='$tid' and pj=4");
	$page = $_GET['page']?$_GET['page']:1;
	if(@ceil($listcount/$perpage) < $page) {
		$page = 1;
	}
	$start_limit = ($page - 1) * $perpage;
	$multipage = multi($listcount,$perpage,$page,"plugin.php?id=xj_event:event_userlist&tid=$tid",0,10,false,true);
	$multipage = str_replace('class="pg"','class="jlpg"',$multipage);
	
	$query = DB::query("SELECT A.uid,A.applynumber,B.username FROM ".DB::table('plugin_xj_eventapply')." A,".DB::table('common_member')." B WHERE A.uid = B.uid and A.tid = '$tid' and A.pj=4 ORDER BY A.dateline LIMIT $start_limit,$perpage");
	$joinlist = array();
	while($value = DB::fetch($query)){
		//$value['avatar'] = avatar($value['uid'], 'middle');
		$value['avatar'] = '<img src="'.avatar($value[uid], 'middle', true, false, true).'?random='.random(2).'" onerror="this.onerror=null;this.src=\''.$_G['setting']['ucenterurl'].'/images/noavatar_middle.gif\'" />';
		$joinlist[] = $value;
	}

}else{     //通过审核的报名用户
	$listcount = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_eventapply')." WHERE tid='$tid' and verify=1");
	$page = $_GET['page']?$_GET['page']:1;
	if(@ceil($listcount/$perpage) < $page) {
		$page = 1;
	}
	$start_limit = ($page - 1) * $perpage;
	$multipage = multi($listcount,$perpage,$page,"plugin.php?id=xj_event:event_userlist&tid=$tid",0,10,false,true);
	$multipage = str_replace('class="pg"','class="jlpg"',$multipage);
	
	$query = DB::query("SELECT A.uid,A.applynumber,B.username FROM ".DB::table('plugin_xj_eventapply')." A,".DB::table('common_member')." B WHERE A.uid = B.uid and A.tid = '$tid' and A.verify=1 ORDER BY A.dateline LIMIT $start_limit,$perpage");
	$joinlist = array();
	while($value = DB::fetch($query)){
		//$value['avatar'] = avatar($value['uid'], 'middle');
		$value['avatar'] = '<img src="'.avatar($value[uid], 'middle', true, false, true).'?random='.random(2).'" onerror="this.onerror=null;this.src=\''.$_G['setting']['ucenterurl'].'/images/noavatar_middle.gif\'" />';
		$joinlist[] = $value;
	}
}


include template('xj_event:userlist');

?>