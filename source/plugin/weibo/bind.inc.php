<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$_G['uid']) {
	showmessage('not_loggedin', NULL, array(), array('login' => 1));
}

if(submitcheck("bindsubmit")) {
	C::t('#weibo#weibo')->update($_G['uid'], array(
		'thread' => $_GET['thread'],
		'reply' => $_GET['reply'],
		'follow' => $_GET['follow'],
		'blog' => $_GET['blog'],
		'doing' => $_GET['doing'],
		'share' => $_GET['share'],
		'article' => $_GET['article'],
	));

	showmessage('weibo:sync_succeed', 'home.php?mod=spacecp&ac=plugin&id=weibo:bind');
}

if(submitcheck("unbindsubmit")) {
	C::t('#weibo#weibo')->delete($_G['uid']);

	showmessage('weibo:unbind_succeed', 'home.php?mod=spacecp&ac=plugin&id=weibo:bind');
}

$bind = C::t('#weibo#weibo')->fetch($_G['uid']);
$bind['dateline'] = dgmdate($bind['dateline']);

?>