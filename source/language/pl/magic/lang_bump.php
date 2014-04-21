<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_bump.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'bump_name'			=> 'Wstrząs',//'提升卡',
	'bump_forum'			=> 'Fora',//'允许使用本道具的版块',
	'bump_desc'			=> 'Wstrząśnij tematem, co spowoduje jego odświeżenie i awans na pierwszą stronę listy tematów.',//'可以提升某个主题',
	'bump_info'			=> 'Aby wstrząsnąć tematem, wprowadź jego Id',//'提升指定的主题，请输入主题的 ID',
	'bump_info_nonexistence'	=> 'Wprowadź Id tematu',//'请指定要提升的主题',
	'bump_succeed'			=> 'Temat został wstrząśnięty prawidłowo.',//'你操作的主题已提升',
	'bump_info_noperm'		=> 'Magia na tym forum została wyłączona.',//'对不起，主题所在版块不允许使用本道具',

	'bump_notification'		=> '{actor} rzucił zaklęcie &quot;{magicname}&quot; na Twój temat &quot;{subject}&quot;. <a href="forum.php?mod=viewthread&tid={tid}">Pokaż</a>',//'你的主题 {subject} 被 {actor} 使用了{magicname}，<a href="forum.php?mod=viewthread&tid={tid}">快去看看吧！</a>',
);

