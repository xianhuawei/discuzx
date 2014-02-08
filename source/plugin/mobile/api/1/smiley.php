<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: mypm.php 27451 2012-02-01 05:48:47Z monkey $
 */
//note 表情 @ Discuz! X3

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

include_once 'misc.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {
		global $_G;
		loadcache(array('smilies', 'smileytypes'));
		$variable = array();
		foreach($_G['cache']['smilies']['replacearray'] as $id => $img) {
			$variable['smilies'][] = array(
			    'code' => $_G['cache']['smilies']['searcharray'][$id],
			    'image' => $_G['cache']['smileytypes'][$_G['cache']['smilies']['typearray'][$id]]['directory'].'/'.$img
			);
		}
		mobile_core::result(mobile_core::variable($variable));
	}

	//note 程序模板输出前运行的代码
	function output() {
	}

}

?>