<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function getRand($proArr) {
	$result = '';      //概率数组的总概率精度
	$proSum = array_sum($proArr);      //概率数组循环
	foreach ($proArr as $key => $proCur) {
		$randNum = mt_rand(1, $proSum);
		if ($randNum <= $proCur) {
			$result = $key;
			break;
		} else {
			$proSum -= $proCur;
		}
	}
	//$numberweight = 0;
	//$tempdata = array();
	//foreach ($proArr as $one) {
	//  $numberweight += $one['v'];
	//  for ($i = 0; $i < $one['v']; $i ++) {
	//    $tempdata[] = $one;
	//  }
	//}
	//$use = mt_rand(0, $numberweight-1);
	//$one = $tempdata[$use];
	//$result = $one['id'];
	unset ($proArr);
	return $result;
} 

function hux_count_days($date){
	$a_dt=getdate(TIMESTAMP);
	$b_dt=getdate($date);
	$a_new=mktime(0,0,0,$a_dt['mon'],$a_dt['mday'],$a_dt['year']);
	$b_new=mktime(0,0,0,$b_dt['mon'],$b_dt['mday'],$b_dt['year']);
	return round(($a_new-$b_new)/86400);
}

?>