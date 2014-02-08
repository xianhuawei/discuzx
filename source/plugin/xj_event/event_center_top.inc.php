<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$nowtime = time();

if($_GET['action']=='all'){
	if($_GET['choose']=='new'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='today'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.starttime<$nowtime AND A.endtime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='soon'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.starttime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}
}
if($_GET['action']=='official'){
	if($_GET['choose']=='new'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.verify=1 ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='today'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.verify=1 AND A.starttime<$nowtime AND A.endtime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='soon'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.verify=1 AND A.starttime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}
}
if($_GET['action']=='offline'){
	if($_GET['choose']=='new'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=1 ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='today'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=1 AND A.starttime<$nowtime AND A.endtime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='soon'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=1 AND A.starttime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}
}
if($_GET['action']=='online'){
	if($_GET['choose']=='new'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=2 ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='today'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=2 AND A.starttime<$nowtime AND A.endtime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}elseif($_GET['choose']=='soon'){
		$query = DB::query("SELECT * FROM ".DB::table('plugin_xj_event')." A,".DB::table('forum_thread')." B WHERE A.tid=B.tid AND A.postclass=2 AND A.starttime>$nowtime ORDER BY A.eid DESC LIMIT 0,10"); 
	}
}

$toplist = array();
while($value = DB::fetch($query)){
	//获取报名人数
	$value['applynumber'] = DB::result_first("SELECT SUM(applynumber) FROM ".DB::table('plugin_xj_eventapply')." WHERE tid=".$value['tid']." and verify=1");
	$value['applynumber'] = $value['applynumber']?$value['applynumber']:0;
	if($value['activityaid']){
		$value[activityaid_url] = $_G['setting']['attachurl'].'forum/'.$value['activityaid_url'];
	}
	$toplist[] = $value;
}

include template('xj_event:center_top');

?>