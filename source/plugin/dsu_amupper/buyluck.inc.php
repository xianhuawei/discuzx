<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if($_GET['formhash'] != FORMHASH) {
	showmessage('undefined_action');
}
$thisvars = $_G['cache']['plugin']['dsu_amupper'];

if($_G['uid'] && $thisvars['luck']>0){
	$memberext = getuserprofile('extcredits'.$thisvars['ptjf']);
	if($memberext < $thisvars['luck']){showmessage('dsu_amupper:costno');}
	$puid = DB::fetch_first('SELECT * FROM %t WHERE %i', array('plugin_dsuamupper', DB::field('uid', $_G['uid'])));
	updatemembercount($_G['uid'], array("extcredits{$thisvars['ptjf']}" => $thisvars['luck']*-1), true,'',0);
	if(mt_rand(0,100) < $thisvars['luckok']){
		$puid['cons_new'] = min($puid['cons'] + mt_rand(1,$thisvars['luckmax']) , $puid['addup']);
		$addcons = $puid['cons_new'] - $puid['cons'];
		$intosql = array(
			'uid'=>$puid['uid'],
			'uname'=>dhtmlspecialchars("'".$puid['uname']."'"),
			'addup'=>$puid['addup'],
			'cons'=>intval($puid['cons_new']),
			'lasttime'=>$puid['lasttime'],
			'time'=>$puid['time'],
			'allow'=>$puid['allow'],
		);
		DB::query('REPLACE INTO '.DB::table('plugin_dsuamupper').'(uid, uname, addup, cons, lasttime, time, allow) VALUES ('.implode(',', $intosql).')');
		showmessage('dsu_amupper:luckok', '', array('addcons'=>$addcons), array('showmsg' => true,'alert' => 'right', 'closetime' =>3));
	}else{
		showmessage('dsu_amupper:luckno', '', array('addcons'=>$addcons, 'title'=>$_G['setting']['extcredits'][$p_var['ptjf']]['title']), array('showmsg' => true,'alert' => 'right', 'closetime' =>3));
	}
}else{
	showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));
}

?>