<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$mid = $_G['setting']['qqmedalid'];

if($mid){
	C::t('forum_medal')->delete($mid);
	C::t('common_setting')->delete('qqmedal');
	
	updatecache(array('setting', 'medals'));
}

$finish = true;

?>