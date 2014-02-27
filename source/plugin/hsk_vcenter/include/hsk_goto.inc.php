<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$goto = trim(dhtmlspecialchars($_GET['goto']));
if($goto){
	header("location: plugin.php?id=hsk_vcenter:".$goto);
}

?>