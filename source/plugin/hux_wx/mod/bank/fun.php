<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
function hux_count_days($date){
	$a_dt=getdate(TIMESTAMP);
	$b_dt=getdate($date);
	$a_new=mktime(0,0,0,$a_dt['mon'],$a_dt['mday'],$a_dt['year']);
	$b_new=mktime(0,0,0,$b_dt['mon'],$b_dt['mday'],$b_dt['year']);
	return round(($a_new-$b_new)/86400);
}
?>