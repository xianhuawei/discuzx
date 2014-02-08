<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('PACKET_TYPE_NORMAL', 0);
define('PACKET_TYPE_DAILY', 1);
define('PACKET_TYPE_REPLY', 2);
define('PACKET_TYPE_PERSON', 3);
define('PACKEY_STATUS_OPEN', 1);
define('PACKEY_STATUS_CLOSE', 2);
define('PACKEY_STATUS_DELETE', 4);
define('PACKEY_PASS', 1);
define('PACKEY_MOD', 0);

// 重置每日红包
resetDailyPacket();

// 登录
if(!$_G['uid']) {
	showmessage('to_login', '', '', array('login' => 1));
}

// 插件后台设置
$packetSetting = $_G['cache']['plugin']['luckypacket'];

// 红包管理权限
$adminids = explode(',', $packetSetting['adminids']);
$packetAdmin = in_array($_G['uid'], $adminids) ? true : false;

// 插件关闭
if($packetSetting['isclose'] && !$packetAdmin) {
	showmessage('luckypacket:closed', 'index.php');
}

$sgroup = array();
$modarray = array('admin', 'ajax', 'list');
$mod = !in_array($_GET['module'], $modarray) ? 'list' : $_GET['module'];
$welcome = $packetSetting['welcome'];
// 自助红包申请判断
$sgroup = (array)unserialize($packetSetting['sgroup']);
$selfPacket = in_array('', $sgroup) ? TRUE : (in_array($_G['member']['groupid'], $sgroup) ? TRUE : FALSE);

// title
$navtitle = lang('plugin/luckypacket', 'pluginTitle').' - ';
$packetVersion = lang('plugin/luckypacket', 'packet_ver');
// 当天,再认真考虑一下
$today = strtotime(dgmdate($_G['timestamp'], 'Y-m-d'));

require_once libfile('luckypacket/'.$mod, 'plugin');

include template('luckypacket:main');

function resetDailyPacket() {
	global $_G;
	$lastTime = $_G['setting']['luckpacket_reset_time'];
	$today = strtotime(dgmdate($_G['timestamp'], 'Y-m-d'));
	if(!$lastTime || $lastTime < $today) {
		// 更新重置时间
		C::t('common_setting')->update('luckpacket_reset_time', $_G['timestamp']);
		if(!function_exists('updatecache')) {
			require_once libfile('function/cache');
		}
		updatecache('setting');
		$data = array(
			'inum' => 0,
		);
		if(C::t('#luckypacket#common_plugin_luckypacket')->update_by_pspecial(PACKET_TYPE_DAILY, $data) === false) {
			// 更新失败回滚重置的时间
			C::t('common_setting')->update('luckpacket_reset_time', $_G['timestamp'] - 86400);
			updatecache('setting');
		}
	}
}