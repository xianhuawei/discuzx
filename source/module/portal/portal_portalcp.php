<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portal_portalcp.php 28492 2012-03-01 10:05:07Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$_G['disabledwidthauto'] = 0;

$ac = in_array($_GET['ac'], array('comment', 'article', 'related', 'block', 'portalblock', 'blockdata', 'topic', 'diy', 'upload', 'category', 'plugin', 'logout'))?$_GET['ac']:'index';

/*
 * allowadmincp 字段备注 (位运算存储 0x00 - FF 总共支持8个标志位，其中)
#B 0000 0001 允许进入后台，显示“管理中心”链接
#B 0000 0010 允许管理文章，显示“门户管理”链接且显示“频道栏目”链接
#B 0000 0100 允许发布文章，显示“门户管理”链接且显示“文章管理”链接
#B 0000 1000 允许管理模块，显示“门户管理”链接且显示 “模块管理”链接
#B 0001 0000 允许推送数据到模块，只显示“推送”链接
 */
$admincp2 = getstatus($_G['member']['allowadmincp'], 2);
$admincp3 = getstatus($_G['member']['allowadmincp'], 3);
$admincp4 = getstatus($_G['member']['allowadmincp'], 4);
$admincp5 = getstatus($_G['member']['allowadmincp'], 5);
$admincp6 = getstatus($_G['member']['allowadmincp'], 6);

//有管理权限的进行登录
if (!$_G['inajax'] && in_array($ac, array('index', 'portalblock', 'blockdata', 'category', 'plugin')) && ($_G['group']['allowdiy'] || $_G['group']['allowmanagearticle'] || $admincp2 || $admincp3 || $admincp4 || $admincp6)) {
	//权限判断
	$modsession = new discuz_panel(PORTALCP_PANEL);
	if(getgpc('login_panel') && getgpc('cppwd') && submitcheck('submit')) {
		$modsession->dologin($_G[uid], getgpc('cppwd'), true);
	}

	if(!$modsession->islogin) {
		include template('portal/portalcp_login');
		dexit();
	}
}

if($ac == 'logout') {
	//退出管理面板
	$modsession = new discuz_panel(PORTALCP_PANEL);
	$modsession->dologout();
	showmessage('modcp_logout_succeed', 'index.php');
}

$navtitle = lang('core', 'title_'.$ac.'_management').' - '.lang('core', 'title_portal_management');

require_once libfile('function/portalcp');
require_once libfile('portalcp/'.$ac, 'include');
?>