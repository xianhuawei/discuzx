<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$nowtime = $_G['timestamp'];

if(!$_GET['act']){
	$_GET['act']='zz';
}



include template('xj_event:event_my');

?>