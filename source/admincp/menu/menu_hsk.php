<?php

if(!defined('IN_DISCUZ')) exit('Access Denied');

$topmenu['hsk'] = 'hsk_center';

loadcache('adminmenu');
$plugin_menu = $_G['cache']['adminmenu'];

$menu['hsk'] = array(
	array('hsk_center',		'hsk_center'),
	array('hsk_types',		'hsk_types'),
	array('baisc_setting',	'hsk_goplugin'),
	array('hsk_getlist',	'block_jscall'),
	array('hsk_indexset',	'hsk_indexset'),
	array('hsk_adset',		'hsk_adset'),
	array('hsk_player',		'hsk_player'),

);
?>