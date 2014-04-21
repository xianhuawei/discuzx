<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_highlight.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'highlight_name'		=> 'Thread highlighter card',//'主题变色卡',
	'highlight_desc'		=> 'Highlight a thread by changing a color',//'可以将帖子或日志的标题高亮，变更颜色',
	'highlight_expiration'		=> 'Highlight period',//'高亮有效期',
	'highlight_expiration_comment'	=> 'Set how to long the thread will be highlighted, the default is 24 hours',//'设置标题可以被高亮多长时间，默认 24 小时。作用于日志时无有效期。',
	'highlight_forum'		=> 'Target forums',//'允许使用本道具的版块',
	'highlight_info_tid'		=> 'Highlight title expiration: {expiration} hours',//'高亮主题的标题 {expiration} 小时',
	'highlight_info_blogid'		=> 'You can highlight the log or the post title, change the color',//'可以将日志或帖子的标题高亮，变更颜色',
	'highlight_color'		=> 'Color',//'颜色',
	'highlight_info_nonexistence_tid'	=> 'Specify the thread to highlight',//'请指定要高亮的帖子',
	'highlight_info_nonexistence_blogid'	=> 'Please specify the blog to highlight',//'请指定要高亮的日志',
	'highlight_succeed_tid'		=> 'The thread highlighted successfully',//'您操作的帖子已高亮',
	'highlight_succeed_blogid'	=> 'You have been highlighted the blog',//'您操作的日志已高亮',
	'highlight_info_noperm'		=> 'Magia na tym forum została wyłączona.',//'对不起，主题所在版块不允许使用本道具',
	'highlight_info_notype'		=> 'Parameter error, operation type is not specified.',//'参数错误，没有指定操作类型。',

	'highlight_notification'	=> '{actor} used a magic &quot;{magicname}&quot; for your thread &quot;{subject}&quot;, <a href="forum.php?mod=viewthread&tid={tid}">view</a>',//'你的主题 {subject} 被 {actor} 使用了{magicname}，<a href="forum.php?mod=viewthread&tid={tid}">快去看看吧！</a>',
	'highlight_notification_blogid'	=> 'User {actor} was used a magic {magicname} at your blog {subject}, <a href="home.php?mod=space&do=blog&id={blogid}">Go to see it!</a>',//'你的日志 {subject} 被 {actor} 使用了{magicname}，<a href="home.php?mod=space&do=blog&id={blogid}">快去看看吧！</a>',
);

