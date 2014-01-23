<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_close.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'close_name'			=> 'Silent card',//'沉默卡',
	'close_desc'			=> 'Disable replies in a thread',//'可以将主题关闭，禁止回复',
	'close_expiration'		=> 'Close for period',//'关闭有效期',
	'close_expiration_comment'	=> 'Set the time when a thread will be closed for reply, the default is 24 hours',//'设置主题可以被关闭多长时间，默认 24 小时',
	'close_forum'			=> 'Allowed forums',//'允许使用本道具的版块',
	'close_info'			=> 'For close specified thread for {expiration} hours, enter the thread ID',//'关闭指定的主题 {expiration} 小时，请输入主题的 ID',
	'close_info_nonexistence'	=> 'Enter the thread ID to close',//'请指定要关闭的主题',
	'close_succeed'			=> 'Specified thread was closed successfully,',//'你操作的主题已关闭',
	'close_info_noperm'		=> 'Using this magic for this forum is disabled',//'对不起，主题所在版块不允许使用本道具',
	'close_info_user_noperm'	=> 'You have no permission to use magic',//'对不起，您不能对此人使用本道具',

	'close_notification'		=> '{actor} used a magic &quot;{magicname}&quot; for your thread &quot;{subject}&quot;, <a href="forum.php?mod=viewthread&tid={tid}">view</a>',//'你的主题 {subject} 被 {actor} 使用了{magicname}，<a href="forum.php?mod=viewthread&tid={tid}">快去看看吧！</a>',
);

