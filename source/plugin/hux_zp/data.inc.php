<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$zpsetting = $_G['cache']['plugin']['hux_zp'];
$paymoney = "extcredits".$zpsetting['money'];
$mycash = getuserprofile($paymoney);
$user = C::t('#hux_zp#hux_zp_user')->fetch_by_uid($_G['uid']);
if ($_G['uid'] && $_GET['formhash'] == formhash() && $user && $mycash >= $zpsetting['moneynum'] && $zpsetting['open']){
include DISCUZ_ROOT.'./source/plugin/hux_zp/hux_zp.fun.php';
$query = C::t('#hux_zp#hux_zp')->fetch_all();
foreach ($query as $v) {
	$prize_list[] = $v;
}

$prize_arr = array(
     '0' => array('id'=>1,'min'=>1,'max'=>29,'prize'=>$prize_list[0]['name'],'v'=>1),
     '1' => array('id'=>2,'min'=>302,'max'=>328,'prize'=>$prize_list[1]['name'],'v'=>2),
     '2' => array('id'=>3,'min'=>242,'max'=>268,'prize'=>$prize_list[2]['name'],'v'=>5),
     '3' => array('id'=>4,'min'=>182,'max'=>208,'prize'=>$prize_list[3]['name'],'v'=>7),
     '4' => array('id'=>5,'min'=>122,'max'=>148,'prize'=>$prize_list[4]['name'],'v'=>10),
     '5' => array('id'=>6,'min'=>62,'max'=>88,'prize'=>$prize_list[5]['name'],'v'=>25),
     '6' => array('id'=>7,'min'=>array(32,92,152,212,272,332), 'max'=>array(58,118,178,238,298,358),'prize'=>$prize_list[6]['name'],'v'=>50)
); 

foreach ($prize_arr as $key => $val) {
     $arr[$val['id']] = $val['v'];
	 //$arr[] = $val;
}
$rid = getRand($arr); //根据概率获取奖项id
$res = $prize_arr[$rid-1]; //中奖项
$min = $res['min'];
$max = $res['max'];
if($res['id']==7){ //七等奖
     $i = mt_rand(0,5);
     $result['angle'] = mt_rand($min[$i],$max[$i]);
}else{
     $result['angle'] = mt_rand($min,$max); //随机生成一个角度
}
$result['prize'] = $res['prize'];
updatemembercount($_G['uid'] , array($paymoney => -$zpsetting['moneynum']));
C::t('#hux_zp#hux_zp_userjp')->insert(array('uid'=>$_G['uid'],'name'=>$res['prize'],'type'=>0,'state'=>0,'jfnum'=>0,'jpshow'=>1,'dateline'=>TIMESTAMP));
if (CHARSET != 'utf-8') {
	$result['prize'] = diconv($result['prize'],CHARSET,'utf-8');
}
echo json_encode($result); 
}
?>