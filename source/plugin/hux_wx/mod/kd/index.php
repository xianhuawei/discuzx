<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/kd/lang/lang.'.currentlang().'.php';
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$kdlang['appcmdtxt'] = diconv($kdlang['appcmdtxt'],CHARSET,'utf-8');
	$kdlang['gokd'] = diconv($kdlang['gokd'],CHARSET,'utf-8');
}
$msgtype = 'news';
$string = array(
	'items' => array(array(
			'title' => $kdlang['appcmdtxt'],
			'description' => $kdlang['gokd'],
			'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/kd/images/kd.jpg',
			'url' => 'http://m.kuaidi100.com/index_all.html',
	))
);

$contentStr = $string;
?>