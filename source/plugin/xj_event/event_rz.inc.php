<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$tid = intval($_GET['tid']);
if($_GET['action']=='confirm'){
	DB::query("UPDATE ".DB::table('xj_event')." SET verify=1 WHERE tid='$tid'");
	showmessage(lang('plugin/xj_event', 'hdrzcg'), "forum.php?mod=viewthread&tid=$tid", array(), array('showdialog' => true, 'locationtime' => true));
}elseif($_GET['action']=='cancel'){
	DB::query("UPDATE ".DB::table('xj_event')." SET verify=0 WHERE tid='$tid'");
	showmessage(lang('plugin/xj_event', 'hdyqxrz'), "forum.php?mod=viewthread&tid=$tid", array(), array('showdialog' => true, 'locationtime' => true));
}


?>