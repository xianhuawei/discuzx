<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$tid = intval($_GET['tid']);
$items = DB::fetch_first("SELECT setting FROM ".DB::table('xj_event')." WHERE tid='$tid'");
$setting = unserialize($items['setting']);
$fieldname = $_GET['fieldname'];
if($_GET['action']=='show'){
	$setting['hidefield'][$fieldname] = 0;
}
if($_GET['action']=='hide'){
	$setting['hidefield'][$fieldname] = 1;
}

$setting = serialize($setting);
DB::query("UPDATE ".DB::table('xj_event')." SET setting = '$setting' WHERE tid='$tid'");

?>