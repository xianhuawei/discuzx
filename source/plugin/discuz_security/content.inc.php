<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: content.inc.php 155 2013-05-14 02:05:19Z vinsonbwang $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require_once(DISCUZ_ROOT.'./source/plugin/discuz_security/common.inc.php');
require_once (DS_ROOT.'./function/function_content.php');
loadcache('plugin');
showcssmenus($csslang['content_title'], array(
    array(array('menu' => $csslang['content_global'], 'submenu' => array(
                array($csslang['content_global'], PARAM_URL.'&cp=content_global'),
          ))),
    array(array('menu' => $csslang['content_banzhu'], 'submenu' => array(
                array($csslang['content_banzhu'], PARAM_URL.'&cp=content_manager'),
                
          ))),
));

$cparray = array('content_global', 'content_manager', 'content_mobile');
$cp = !in_array($_GET['cp'], $cparray) ? 'content_global' : $_GET['cp'];
require_once DS_ROOT.'./module/content/'.$cp.'.inc.php';

?>