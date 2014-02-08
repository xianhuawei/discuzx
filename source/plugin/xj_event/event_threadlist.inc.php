<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$eid = intval($_GET['eid']);
$fid = intval($_GET['fid']);


include template('xj_event:threadlist');

?>