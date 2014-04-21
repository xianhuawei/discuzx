<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_interthread.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'interthread_name'		=> 'Forum/Group interthread adv',//'论坛/群组 帖间通栏广告',
	'interthread_desc'		=> 'Display the Adv between first and second posts of a thread. In general, it is 468x60 or other size images and Flash.',//'展现方式: 帖间通栏广告显示于主题帖和第一个回帖之间，可使用 468x60 或其他尺寸图片和 Flash 的形式。<br />当前页面有多个帖间通栏广告时，系统会随机选取其中之一显示。价值分析: 由于能够将主题与回帖分开，广告尺寸大而且不影响帖子内容，因此不会招致帖子作者及访问者反感，适合在帖内进行商业宣传或品牌推广。',
	'interthread_fids'		=> 'Target Forums',//'投放版块',
	'interthread_fids_comment'	=> 'Set forums to display the Adv',//'设置广告投放的论坛版块，当广告投放范围中包含“论坛”时有效',
	'interthread_groups'		=> 'Target Groups',//'投放群组分类',
	'interthread_groups_comment'	=> 'Set the groups to show advertising. Take effect only when ads included in the scope of &quot;group&quot;.',//'设置广告投放的群组分类，当广告投放范围中包含“群组”时有效',
	'interthread_pnumber' => '广告显示楼层',
	'interthread_pnumber_comment' => '选项 #1 #2 #3 ... 表示帖子楼层，可以按住 CTRL 多选，默认只投放 1 楼',
);

