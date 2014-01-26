<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: content_seccode.inc.php 165 2013-05-14 02:54:54Z vinsonbwang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

global $_G;
if(submitcheck('seccode_submit', 0, 1)) {
	$url = 'forum.php?mod=viewthread&tid='.$_GET['url_tid'];
	C::t('#discuz_security#discuz_security_manager_action')->useractionlog($_G['uid'], '', TIMESTAMP, TIMESTAMP);
	showmessage(lang('plugin/discuz_security', 'content_success'), $url);
} else {
	include template('discuz_security:content_seccode');
}

?>