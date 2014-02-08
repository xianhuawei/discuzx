<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$tid = intval($_GET['tid']);
showmessage(lang('plugin/xj_event', 'buy'), 'forum.php?mod=viewthread&tid='.$tid);
?>