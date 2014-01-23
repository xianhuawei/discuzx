<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_jack.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'jack_name'		=> 'Jack',//'千斤顶',
	'jack_desc'		=> 'Thread from the top can be a period of time, re-use may be extended from the top post by the time',//'可以将主题顶起一段时间，重复使用可延长帖子被顶起的时间',
	'jack_expiration'	=> 'Duration',//'时长',
	'jack_expiration_comment'	=> 'Set the thread can be long from the top, default is 1 hour',//'设置主题可以被顶起多长时间，默认 1 小时',
	'jack_forum'		=> 'Allow use of jack for the Forum',//'允许使用本道具的版块',
	'jack_info'		=> '<p class="mtn xw0 mbn">Top the specified thread for <span class="xi1 xw1 xs2">{expiration}</span> hours.</p><p class="mtn xw0 mbn">You now have <span class="xi1 xw1 xs2">{magicnum}</span> jacks can be used.</p>',//'<p class="mtn xw0 mbn">顶起指定的主题<span class="xi1 xw1 xs2"> {expiration} </span> 小时。</p> <p class="mtn xw0 mbn">你现在有<span class="xi1 xw1 xs2"> {magicnum} </span>个千斤顶可以使用。</p>',
	'jack_num'		=> 'Use this number:',//'本次使用数量:',
	'jack_num_not_enough'	=> 'Insufficient number or do not fill in the number of props to use.',//'道具数量不足或没有填写使用数量。',
	'jack_info_nonexistence'	=> 'Please specify the thread for top',//'请指定要顶起的主题',
	'jack_succeed'		=> 'The thread successfully jacked to the top',//'千斤顶成功将主题顶起',
	'jack_info_noperm'	=> 'Sorry, not allowed to use Jack magic in this forum',//'对不起，主题所在版块不允许使用本道具',

	'jack_notification'	=> '{actor} used the &quot;{magicname}&quot; for the thread &quot;{subject}&quot;, <a href="forum.php?mod=viewthread&tid={tid}">Go to see it!</a>',//'你的主题 {subject} 被 {actor} 使用了{magicname}，<a href="forum.php?mod=viewthread&tid={tid}">快去看看吧！</a>',
);
