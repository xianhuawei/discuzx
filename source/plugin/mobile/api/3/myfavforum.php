<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: myfavforum.php 34236 2013-11-21 01:13:12Z nemohou $
 */
//note 帖子thread >> myfavthread(我收藏的帖子) @ Discuz! X3.x

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

$_GET['mod'] = 'space';
$_GET['do'] = 'favorite';
$_GET['type'] = 'forum';
include_once 'home.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {
	}

	//note 程序模板输出前运行的代码
	function output() {
		global $_G;
		$fids = array();
		foreach($GLOBALS['list'] as $_k => $_v) {
			$fids[$_v['id']] = $_k;
		}
		if($fids) {
			$favforumlist = C::t('forum_forum')->fetch_all(array_keys($fids));
			foreach($favforumlist as $_fid => $_v) {
				$GLOBALS['list'][$fids[$_fid]]['threads'] = $_v['threads'];
				$GLOBALS['list'][$fids[$_fid]]['posts'] = $_v['posts'];
				$GLOBALS['list'][$fids[$_fid]]['todayposts'] = $_v['todayposts'];
				$GLOBALS['list'][$fids[$_fid]]['yesterdayposts'] = $_v['yesterdayposts'];					
			}
		}
		$variable = array(
			'list' => array_values($GLOBALS['list']),
			'perpage' => $GLOBALS['perpage'],
			'count' => $GLOBALS['count'],
		);
		mobile_core::result(mobile_core::variable($variable));
	}

}

?>