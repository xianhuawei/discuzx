<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if($_GET['formhash'] != FORMHASH) {
	showmessage('undefined_action');
}

$padminid = $_G['cache']['plugin']['dsu_amupper']['adminid'];

if($_G['uid'] == $padminid && $padminid){
	$_GET['uid'] = intval($_GET['uid']);
	if(empty($_GET['uid'])){
		include template('dsu_amupper:padmin');
	}else{
		$puid = C::t('#dsu_amupper#plugin_dsuamupper')->fetch($_G['uid']);
		$_GET['cons'] = intval($_GET['cons']);
		if($_GET['ppersubmit'] && $puid && $_GET['cons']){
			$into = array(
				'uid'=>intval($puid['uid']),
				'uname'=>dhtmlspecialchars("'".addslashes($puid['uname'])."'"),
				'addup'=>intval($puid['addup']),
				'cons'=>intval($_GET['cons']),
				'lasttime'=>intval($puid['lasttime']),
				'time'=>intval($puid['time']),
				'allow'=>intval($puid['allow']),
			);
			C::t('#dsu_amupper#plugin_dsuamupper')->insert($into,0,1);
			showmessage('dsu_amupper:postok', '', array(), array('showmsg' => true,'alert' => 'right', 'closetime' =>3));
		}
		include template('dsu_amupper:padmin');
	}
}else{
	showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));
}

?>