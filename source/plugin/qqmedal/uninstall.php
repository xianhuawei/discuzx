<?php

/**
 * $Id: uninstall.inc.php 2012-03-15 10:42:10Z liudongdong $
 */

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