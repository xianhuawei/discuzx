<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/sns/lang/lang.'.currentlang().'.php';
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$snslang['title'] = diconv($snslang['title'],CHARSET,'utf-8');
	$appconfig['welcome'] = diconv($appconfig['welcome'],CHARSET,'utf-8');
}
$msgtype = 'news';
$string = array(
	'items' => array(array(
			'title' => $snslang['title'],
			'description' => $appconfig['welcome'],
			'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/sns/images/sns.jpg',
			'url' => 'http://'.str_replace('http://','',$appconfig['url']),
	))
);
$contentStr = $string;
?>