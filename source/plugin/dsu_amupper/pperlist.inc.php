<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
//入库数据的预处理
if($_G['uid']){
	$limit = 20;
	if($_GET['order'] == 'cons'){
		$order = 'cons';
		$url = "plugin.php?id=dsu_amupper:pperlist&order=cons";
	}else{
		$order = 'addup';
		$url = "plugin.php?id=dsu_amupper:pperlist";
	}
	$p_var = $_G['cache']['plugin']['dsu_amupper'];
	if($p_var['listradio']==1){showmessage('undefined_action');}
	$padminid = $_G['cache']['plugin']['dsu_amupper']['adminid'];
	$today = dgmdate($_G['timestamp']);
	$yesterday = dgmdate($_G['timestamp']-86400,d);
	$ggprint=array();
	$num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_dsuamupper')." WHERE uname<>''");
	$page = max(1, intval($_GET['page']));
	$start_limit = ($page - 1) * $limit;
	$multipage = multi($num, $limit, $page, $url);

	$sql="SELECT * FROM ".DB::table('plugin_dsuamupper')." ORDER BY ".$order." DESC , lasttime ASC LIMIT ".$start_limit." ,".$limit;
	$querygg=DB::query($sql);
	$amtopid=$start_limit;

	$ammuid=array();$ammlist=array();$i = $start_limit + 1;
	while ($value=DB::fetch($querygg)){
		$ammlist['uid'] = $value['uid'];
		$ammlist['lasttime'] = dgmdate($value['lasttime']);
		$ammlist['cons'] = $value['cons'];
		$ammlist['addup'] = $value['addup'];
		$ammlist['username'] = $value['uname'];
		if(!$value['uname']){$uidarray = getuserbyuid($value['uid']);$ammlist['username'] = $uidarray['username'];}
		$ammlist['usernamec'] = cutstr($ammlist['username'],8);
		$ammlist['index'] = $i;
		$ggprint[$i]=$ammlist;
		$i++;
	}
	$cdb_pper['uid'] = intval($_G['uid']);
	$query = DB::fetch_first("SELECT * FROM ".DB::table("plugin_dsuamupper")." WHERE uid = '{$cdb_pper['uid']}'");
	if($query){
		$myindex = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_dsuamupper')." WHERE addup > '{$query['addup']}' OR (addup = '{$query['addup']}' AND lasttime <= '{$query['lasttime']}')");
		$mycons = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_dsuamupper')." WHERE cons > '{$query['cons']}' OR (cons = '{$query['cons']}' AND lasttime <= '{$query['lasttime']}')");
		$mypospage['cons'] = ceil($mycons / $limit);
		$mypospage['addup'] = ceil($myindex / $limit);
	}
}else{
	showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));
}

include template('dsu_amupper:list');