<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_namepost.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'namepost_name'			=> 'Continue Anonimous Post',//'照妖镜',
	'namepost_desc'			=> 'You can specify an anonymous post to stay still anonymous',//'可以查看一次匿名用户的真实身份。',
	'namepost_forum'		=> 'Target forums',//'允许使用本道具的版块',
	'namepost_num'			=> 'Has a number: {magicnum}',//'拥有个数: {magicnum}',
	'namepost_info'			=> 'For specify the stay anonymous post, please enter the post ID',//'指定要显身的帖子，请输入帖子的 ID',
	'namepost_info_nonexistence'	=> 'Specify the stay anonymous post',//'参数错误，不能在此使用本道具。',
	'namepost_succeed'		=> 'Anonymous user is <a title="{username}" href="space.php?uid={uid}" target="_blank"><b>{username}</b></a>',//'匿名的用户是 <a title="{username}" href="space.php?uid={uid}" target="_blank"><b>{username}</b></a>',
	'namepost_info_noperm'		=> 'Using this magic for this forum is disabled',//'对不起，主题所在版块不允许使用本道具',
	'namepost_info_user_noperm'	=> 'You have no permission to use magic',//'对不起，您不能对此人使用本道具',
	'magic_namepost_succeed'	=> 'The user is anonymous',//'匿名的用户是',
);

