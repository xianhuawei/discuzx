<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/cp/lang/lang.'.currentlang().'.php';
$r = file_get_contents('http://www.lecai.com/api/hao123/new_lottery_all.php');
$r = str_replace(array('Hao.caiPiaoInit(',',-1);'),'',$r);
$r = json_decode($r,true);
$data = $r['category']['quanguo'];
foreach ($data as $v) {
	if (CHARSET != 'utf-8') {
		$v[1] = diconv($v[1],'utf-8');
	}
	$strings .= $cplang['cpid'].':'.$v[0]." ".$cplang['cpname'].':'.$v[1]."\n";
}
C::t('#hux_wx#hux_wx_action')->insert(array('openid'=>$openid,'action'=>'0','type'=>$keyword));
$strings .= "\n".$cplang['inputcp'];
$string = $strings;
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>