<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/cp/lang/lang.'.currentlang().'.php';
$r = file_get_contents('http://www.lecai.com/api/hao123/new_lottery_all.php');
$r = str_replace(array('Hao.caiPiaoInit(',',-1);'),'',$r);
$r = json_decode($r,true);
$data = $r['caipiao'][$keyword];
if ($data) {
	foreach ($data['detail'] as $v) {
		$cpnum .= $v." ";
	}
	if (CHARSET != 'utf-8') {
		$data['name'] = diconv($data['name'],'utf-8');
		$data['fn'] = diconv($data['fn'],'utf-8');
	}
	$string = $data['name']."\n".$cplang['cpqi'].':'.$data['phase']."\n".$cplang['cptime'].':'.dgmdate($data['open'],'Y-m-d')."\n".$cplang['cpsale'].':'.$data['bonus']."\n".$cplang['cpinfo'].':'.$data['fn']."\n".$cplang['cpnum'].':'.$cpnum;
} else {
	$string = $cplang['cperr'];
}
C::t('#hux_wx#hux_wx_action')->delete($openid);
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>