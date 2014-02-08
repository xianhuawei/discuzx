<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
loadcache('plugin');
$wxsetting = $_G['cache']['plugin']['hux_wx'];
//echo '<iframe src="http://huxddz.duapp.com/caidan.php?appid='.$wxsetting['appid'].'&appsk='.$wxsetting['appsk'].'" width="100%" height="680">frame</iframe>';
dheader('location:http://huxddz.duapp.com/caidan.php?appid='.$wxsetting['appid'].'&appsk='.$wxsetting['appsk']);
?>