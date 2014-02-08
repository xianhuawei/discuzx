<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/pic/lang/lang.'.currentlang().'.php';
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$piclang['appcmdtxt'] = diconv($piclang['appcmdtxt'],CHARSET,'utf-8');
	$piclang['picmsg'] = diconv($piclang['picmsg'],CHARSET,'utf-8');
}
$msgtype = 'news';
$string = array(
	'items' => array(array(
			'title' => $piclang['appcmdtxt'],
			'description' => $piclang['picmsg'],
			'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/pic/images/pic.jpg',
			'url' => $_G['siteurl'].'plugin.php?id=hux_wx:hux_wx&mod=pic&ac=show&mobile=2',
	))
);

$contentStr = $string;
?>