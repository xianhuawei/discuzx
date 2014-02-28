<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: space_index.php 31354 2012-08-16 03:03:08Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//如果是站长，点击名称直接到个人空间
//noteX 当为手机版式强制跳转至个人空间资料页(IN_MOBILE)
if(($_G['adminid'] == 1 && $_G['setting']['allowquickviewprofile'] && $_GET['view'] != 'admin' && $_GET['diy'] != 'yes') || defined('IN_MOBILE')) {
	dheader("Location:home.php?mod=space&uid=$space[uid]&do=profile");
}

//模块处理功能
require_once libfile('function/space');

space_merge($space, 'field_home');
$userdiy = getuserdiydata($space);

if ($_GET['op'] == 'getmusiclist') {
	//得到音乐播放列表
	if(empty($space['uid'])) {
		exit();
	}
	$reauthcode = substr(md5($_G['authkey'].$space['uid']), 6, 16);
	if($reauthcode == $_GET['hash']) {
		space_merge($space,'field_home');
		$userdiy = getuserdiydata($space);
		$musicmsgs = $userdiy['parameters']['music'];
		$outxml = '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
		$outxml .= '<playlist version="1">'."\n";
		$outxml .= '<mp3config>'."\n";
		$showmod = 'big' == $musicmsgs['config']['showmod'] ? 'true' : 'false';
		$outxml .= '<showdisplay>'.$showmod.'</showdisplay>'."\n";
		$outxml .= '<autostart>'.$musicmsgs['config']['autorun'].'</autostart>'."\n";
		$outxml .= '<showplaylist>true</showplaylist>'."\n";
		$outxml .= '<shuffle>'.$musicmsgs['config']['shuffle'].'</shuffle>'."\n";
		$outxml .= '<repeat>all</repeat>'."\n";
		$outxml .= '<volume>100</volume>';
		$outxml .= '<linktarget>_top</linktarget> '."\n";
		$outxml .= '<backcolor>0x'.substr($musicmsgs['config']['crontabcolor'], -6).'</backcolor> '."\n";
		$outxml .= '<frontcolor>0x'.substr($musicmsgs['config']['buttoncolor'], -6).'</frontcolor>'."\n";
		$outxml .= '<lightcolor>0x'.substr($musicmsgs['config']['fontcolor'], -6).'</lightcolor>'."\n";
		$outxml .= '<jpgfile>'.$musicmsgs['config']['crontabbj'].'</jpgfile>'."\n";
		$outxml .= '<callback></callback> '."\n";
		$outxml .= '</mp3config>'."\n";
		$outxml .= '<trackList>'."\n";
		foreach ($musicmsgs['mp3list'] as $value){
			$outxml .= '<track><annotation>'.$value['mp3name'].'</annotation><location>'.$value['mp3url'].'</location><image>'.$value['cdbj'].'</image></track>'."\n";
		}
		$outxml .= '</trackList></playlist>';
		$outxml = diconv($outxml, CHARSET, 'UTF-8');
		obclean();
		@header("Expires: -1");
		@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
		@header("Pragma: no-cache");
		@header("Content-type: application/xml; charset=utf-8");
		echo $outxml;
	}
	exit();

}else{

	//更新空间访问数 spaceviewnum
	if(!$_G['setting']['preventrefresh'] || $_G['uid'] && !$space['self'] && $_G['cookie']['viewid'] != 'uid_'.$space['uid']) {
		member_count_update($space['uid'], array('views' => 1));
		$viewuids[$space['uid']] = $space['uid'];
		dsetcookie('viewid', 'uid_'.$space['uid']);
	}

	//最近访客记录
	if(!$space['self'] && $_G['uid'] && $_GET['additional'] != 'removevlog') {
		$visitor = C::t('home_visitor')->fetch_by_uid_vuid($space['uid'], $_G['uid']);
		$is_anonymous = empty($_G['cookie']['anonymous_visit_'.$_G['uid'].'_'.$space['uid']]) ? 0 : 1;
		if(empty($visitor['dateline'])) {
			$setarr = array(
				'uid' => $space['uid'],
				'vuid' => $_G['uid'],
				'vusername' => $is_anonymous ? '' : $_G['username'],
				'dateline' => $_G['timestamp']
			);
			C::t('home_visitor')->insert($setarr, false, true);
			show_credit();//竞价排名
		} else {
			if($_G['timestamp'] - $visitor['dateline'] >= 300) {
				C::t('home_visitor')->update_by_uid_vuid($space['uid'], $_G['uid'], array('dateline'=>$_G['timestamp'], 'vusername'=>$is_anonymous ? '' : $_G['username']));
			}
			if($_G['timestamp'] - $visitor['dateline'] >= 3600) {
				show_credit();//1小时后竞价排名
			}
		}
		//奖励访客
		updatecreditbyaction('visit', 0, array(), $space['uid']);
	}
	if($_GET['additional'] == 'removevlog') {
		C::t('home_visitor')->delete_by_uid_vuid($space['uid'], $_G['uid']);
	}

	//隐私检查
	if($do != 'profile' && !ckprivacy($do, 'view')) {
		$_G['privacy'] = 1;
		require_once libfile('space/profile', 'include');
		include template('home/space_privacy');
		exit();
	}

	//布局宽度
	$widths = getlayout($userdiy['currentlayout']);
	//取得左边
	$leftlist = formatdata($userdiy, 'left', $space);
	//取得中间
	$centerlist = formatdata($userdiy, 'center', $space);
	//取得右边
	$rightlist = formatdata($userdiy, 'right', $space);

	dsetcookie('home_diymode', 1);
}

$navtitle = !empty($space['spacename']) ? $space['spacename'] : lang('space', 'sb_space', array('who' => $space['username']));
$metakeywords = lang('space', 'sb_space', array('who' => $space['username']));
$metadescription = lang('space', 'sb_space', array('who' => $space['username']));
$space['medals'] = getuserprofile('medals');
if($space['medals']) {
	loadcache('medals');
	foreach($space['medals'] = explode("\t", $space['medals']) as $key => $medalid) {
		list($medalid, $medalexpiration) = explode("|", $medalid);
		if(isset($_G['cache']['medals'][$medalid]) && (!$medalexpiration || $medalexpiration > TIMESTAMP)) {
			$space['medals'][$key] = $_G['cache']['medals'][$medalid];
		} else {
			unset($space['medals'][$key]);
		}
	}
}
include_once(template('home/space_index'));

//取得不同位置的数据
function formatdata($data, $position, $space) {
	$list = array();
	foreach ((array)$data['block']['frame`frame1']['column`frame1_'.$position] as $blockname => $blockdata) {
		if (strpos($blockname, 'block`') === false || empty($blockdata) || !isset($blockdata['attr']['name'])) continue;
		$name = $blockdata['attr']['name'];
		if(check_ban_block($name, $space)) {
			$list[$name] = getblockhtml($name, $data['parameters'][$name]);
		}
	}
	return $list;
}

//竞价排名
function show_credit() {
	global $_G, $space;

	$showinfo = C::t('home_show')->fetch($space['uid']);
	if($showinfo['credit'] > 0) {
		$showinfo['unitprice'] = intval($showinfo['unitprice']);
		if($showinfo['credit'] <= $showinfo['unitprice']) {
			//下榜通知
			notification_add($space['uid'], 'show', 'show_out');
			C::t('home_show')->delete($space['uid']);
		} else {
			C::t('home_show')->update_credit_by_uid($space['uid'], -$showinfo['unitprice']);
		}
	}
}
?>