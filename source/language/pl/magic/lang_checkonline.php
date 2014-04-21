<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_checkonline.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'checkonline_name'		=> 'Radar',//'雷达卡',
	'checkonline_desc'		=> 'Sprawdza status online wybranego użytkownika',//'查看某个用户是否在线',
	'checkonline_targetuser'	=> 'Wprowadź nazwę użytkownika, aby móc zobaczyć jego status online.',//'您要查看谁是否在线',
	'checkonline_info_nonexistence'	=> 'Wprowadź nazwę użytkownika.',//'请输入用户名',
	'checkonline_hidden_message'	=> '{username} jest ukryty. Ostatnia aktywność miała miejsce {time}',//'{username} 当前隐身，最后活动时间是 {time}',
	'checkonline_online_message'	=> '(username) jest online. Ostatnia aktywność miała miejsce {time}',//'{username} 当前在线，最后活动时间是 {time}',
	'checkonline_offline_message'	=> '(username) jest offline.',//'{username} 当前离线',
	'checkonline_info_noperm'	=> 'Nie masz uprawnień do przeglądania adresów IP użytkowników.',//'对不起，你无权查看此人的 IP',

	'checkonline_notification'	=> 'Ktoś z użytkowników forum użył magii &quot;{magicname}&quot;, aby móc sprawdzić Twój status online.',//'有人使用了{magicname}检查你是否在线',
);

