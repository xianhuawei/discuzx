<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_open.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'open_name'			=> 'Open Thread Card',//'喧嚣卡',
	'open_desc'			=> 'Set the thread open to replies',//'可以将主题开启，可以回复',
	'open_forum'			=> 'Target forums',//'允许使用本道具的版块',
	'open_info'			=> 'For open specified thread, enter the thread ID',//'开放指定的主题，请输入主题的 ID',
	'open_info_nonexistence'	=> 'Enter the thread ID for opening',//'请指定要开放的主题',
	'open_succeed'			=> 'The thread was opened successfully',//'您操作的主题已开放回复',
	'open_info_noperm'		=> 'Using this magic for this forum is disabled',//'对不起，主题所在版块不允许使用本道具',
	'open_info_user_noperm'		=> 'You have no permission to use magic',//'对不起，您不能对此人使用本道具',

	'open_notification'		=> '{actor} used a magic &quot;{magicname}&quot; for your thread &quot;{subject}&quot;, <a href="forum.php?mod=viewthread&tid={tid}">view</a>',//'你的主题 {subject} 被 {actor} 使用了{magicname}，<a href="forum.php?mod=viewthread&tid={tid}">快去看看吧！</a>',
);

