<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/caipiao/lang/lang.'.currentlang().'.php';
$r = file_get_contents('http://www.lecai.com/api/hao123/new_lottery_all.php');
$r = str_replace(array('Hao.caiPiaoInit(',',-1);'),'',$r);
$r = json_decode($r,true);
$data = $r['caipiao'];
$msgtype = 'news';
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$caipiaolang['appcmdtxt'] = diconv($caipiaolang['appcmdtxt'],CHARSET,'utf-8');
	$caipiaolang['cpqi'] = diconv($caipiaolang['cpqi'],CHARSET,'utf-8');
}
$cids = array('1','2','3','4','7','9','50','51','52');
$stringa = array(
	array(
		'title' => $caipiaolang['appcmdtxt'],
		'description' => '',
		'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/caipiao/images/cp.jpg',
		'url' => 'http://www.hux.cc',
	)
);
foreach ($cids as $v) {
	foreach ($data[$v]['detail'] as $vv) {
		$cpnum[$v] .= $vv." ";
	}
	if (CHARSET != 'utf-8' && $wxsetting['code']) {
		$data[$v]['name'] = diconv($data[$v]['name'],'utf-8');
	}
	$stringb[] = array(
		'title' => $data[$v]['name']." (".dgmdate($data[$v]['open'],'Y-m-d').")\n[".$caipiaolang['cpqi']."]".$data[$v]['phase']."\n".$cpnum[$v],
		'description' => '',
		'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/caipiao/images/'.$v.'.png',
		'url' => 'http://www.hux.cc',
	);
}
$strings = array_merge($stringa,$stringb);
$string = array(
	'items' => $strings,
);

$contentStr = $string;
?>