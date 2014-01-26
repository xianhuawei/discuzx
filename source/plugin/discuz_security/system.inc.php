<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: system.inc.php 223 2013-06-21 02:45:05Z qingrongfu $
 */
 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/discuz_security/common.inc.php';
require_once DS_ROOT.'./function/function_system.php';

loadcache('plugin');

showcssmenus(lang('plugin/discuz_security', 'sys_safe'), array(
    array(array('menu' => $csslang['sys_junior'], 'submenu' => array(
                array( $csslang['sys_plugins'], PARAM_URL.'&cp=sys_plugins'),
                array( $csslang['sys_checkdir'], PARAM_URL.'&cp=sys_checkdir'),
                array( $csslang['sys_fakeip'], PARAM_URL.'&cp=sys_fakeip'),
          ))),
    array(array('menu' => $csslang['sys_limit'], 'submenu' => array(
                array($csslang['sys_limit_banned'], PARAM_URL.'&cp=sys_limit&op=allban'),
                array($csslang['sys_limit_activity'], PARAM_URL.'&cp=sys_limit&op=allsession'),
                array($csslang['sys_limit_history'], PARAM_URL.'&cp=sys_limit&op=history'),
          ))),
    array(array('menu' => $csslang['sys_cdd'], 'submenu' => array(
    			array($csslang['sys_cdd_prescan'], PARAM_URL.'&cp=sys_cdd&op=prescan'),
    			array($csslang['sys_cdd_scan'], PARAM_URL.'&cp=sys_cdd&op=scan'),
    			array($csslang['sys_cdd_scan_report'], PARAM_URL.'&cp=sys_cdd&op=report'),
    ))),
));

$cp =  empty($_GET['cp']) ? null : $_GET['cp'];

if(!$cp) {
    showtableheader();
    showtitle($csslang['sys_plugins']);
    showtablerow('', array(), array($csslang['sys_plugins_tips']));
    showtitle($csslang['sys_limit']);
    showtablerow('', array(), array($csslang['sys_limit_tips']));
    showtitle($csslang['sys_cdd']);
    showtablerow('', array(), array($csslang['sys_cdd_tips']));
    showtablerow('', array(), array($csslang['sys_cdd_tips_1']));
    showtablerow('', array(), array($csslang['sys_cdd_tips_2']));
    showtablerow('', array(), array($csslang['sys_cdd_tips_3']));
    showtablefooter();
} elseif($cp == 'sys_plugins') {
    require_once DS_ROOT.'./module/system/'.$cp.'.php';
} elseif($cp == 'sys_limit') {
    require_once DS_ROOT.'./module/system/'.$cp.'.php';
} elseif($cp == 'sys_checkdir') {
	require_once DS_ROOT.'./module/system/'.$cp.'.php';
} elseif($cp == 'sys_fakeip') {
	require_once DS_ROOT.'./module/system/'.$cp.'.php';
} elseif($cp == 'sys_cdd') {
	require_once DS_ROOT.'./module/system/'.$cp.'.php';
}

?>