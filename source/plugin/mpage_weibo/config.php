<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define("WB_AKEY" , $_G['cache']['plugin']['mpage_weibo']['app_key']);
define("WB_SKEY" , $_G['cache']['plugin']['mpage_weibo']['app_secret']);
define("WB_CALLBACK_URL" , $_G['siteurl'].'plugin.php?id=mpage_weibo:callback');

?>