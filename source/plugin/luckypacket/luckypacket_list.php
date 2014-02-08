<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

// 领取列表
if($_GET['module'] == 'showlog') {

	$op = isset($_GET['op']) ? $_GET['op'] : '';
	$maxPage = 100;
	$pn = 15;
	$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
	$page = $page > $maxPage ? $maxPage : $page;
	$startLimit = ($page-1)*$pn;
	$pageUrl = 'plugin.php?id=luckypacket&module=showlog';

	$fdateline = isset($_GET['fdateline']) ? intval($_GET['fdateline']) : 0;
	$fdateline = TIMESTAMP > $fdateline ? $fdateline : TIMESTAMP;
	$startTime = $fdateline ? TIMESTAMP - $fdateline : 0;

	$logs = $myLogs = array();
	if($packetAdmin && $op == 'all') {
		$pageUrl = $pageUrl.'&op=all';
		$logs = C::t('#luckypacket#common_plugin_luckypacketlog')->range_by_dateline($startTime, $startLimit, $pn);
		$logNum = C::t('#luckypacket#common_plugin_luckypacketlog')->count_by_uid_dateline('', $startTime);
	} else {
		//$wheresql = " AND uid='{$_G['uid']}'";
		$logs = C::t('#luckypacket#common_plugin_luckypacketlog')->fetch_by_uid($_G['uid'], $startTime, $startLimit, $pn);
		$members = getuserbyuid($_G['uid']);
		$logNum = C::t('#luckypacket#common_plugin_luckypacketlog')->count_by_uid_dateline($_G['uid'], $startTime);
	}

	$pageUrl .= $fdateline ? '&fdateline='.$fdateline : '';

	if($logs) {
		foreach($logs as $result) {
			$members = $op == 'all' ? getuserbyuid($result['uid']) : $members;
			$result['username'] = $members['username'];
			$myLogs[] = $result;
		}
	}

	$multipage = multi($logNum, $pn, $page, $pageUrl, $maxPage);
} elseif($_GET['module'] == 'glog') {
	// 放到ajax里面
	$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
	$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($pid);
	$dateline = $packet['pspecial'] == PACKET_TYPE_DAILY ? $today : '';
	$logList = array();
	// 只取最新的100条
	foreach(C::t('#luckypacket#common_plugin_luckypacketlog')->fetch_by_packetid_dateline($pid, $dateline, 0, 100) as $result) {
		$members = getuserbyuid($result['uid']);
		$result['username'] = $members['username'];
		$logList[] = $result;
	}

	include template('luckypacket:float');
	dexit();
} else {
	$packetList = $packets = array();
	$pn = 5;
	$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
	$startLimit = ($page-1)*$pn;
	$pageUrl = 'plugin.php?id=luckypacket';
	if($pId = intval($_GET['pid'])) {
		$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($pId);
		if($packet['status'] == PACKEY_STATUS_OPEN && (!$packetSetting['hidden']|| $packet['originatorid'] == $_G['uid']|| $packet['ispass'] == PACKEY_PASS || $packetAdmin)) {
			$packets[$pId] = $packet;
		}
	} else {
		$opArray = array('self', 'nor', 'daily', 'reply', 'diy', 'mod');
		if(in_array($_GET['op'], $opArray)) {
			$op = $_GET['op'];
			$pageUrl .= '&op='.$op;
		} else {
			$op = 'list';
		}
		$showAll = !$packetSetting['hidden'] ? true : false;
		$operation = lang('plugin/luckypacket', 'packet_'.$op);
		switch($op) {
			case 'self':
				$packets = C::t('#luckypacket#common_plugin_luckypacket')->fetch_all_allowed($_G['uid'], true, $startLimit, $pn);
				$packetNum =  C::t('#luckypacket#common_plugin_luckypacket')->count_allowed($_G['uid'], true);
				break;
			case 'nor':
			case 'daily':
			case 'reply':
			case 'diy':
				if($op == 'nor') {
					$pspecial = PACKET_TYPE_NORMAL;
				} elseif($op == 'daily') {
					$pspecial = PACKET_TYPE_DAILY;
				} elseif($op == 'reply') {
					$pspecial = PACKET_TYPE_REPLY;
				} elseif($op == 'diy') {
					$pspecial = PACKET_TYPE_PERSON;
				}
				$packets = C::t('#luckypacket#common_plugin_luckypacket')->fetch_all_allowed_by_pspecial($pspecial, $startLimit, $pn, $showAll);
				$packetNum =  C::t('#luckypacket#common_plugin_luckypacket')->count_allowed_by_pspecial($pspecial, $showAll);
				break;
			case 'mod':
				if($packetAdmin) {
					$packets = C::t('#luckypacket#common_plugin_luckypacket')->fetch_all_by_pass(PACKEY_MOD, $startLimit, $pn);
					$packetNum =  C::t('#luckypacket#common_plugin_luckypacket')->count_by_pass(PACKEY_MOD);
				}
				break;
			default:
				$op = 'list';
				if($packetAdmin || !$packetSetting['hidden']) {
					$packets = C::t('#luckypacket#common_plugin_luckypacket')->fetch_all($startLimit, $pn);
					$packetNum =  C::t('#luckypacket#common_plugin_luckypacket')->count_all();
				} else {
					$packets = C::t('#luckypacket#common_plugin_luckypacket')->fetch_all_allowed($_G['uid'], false, $startLimit, $pn);
					$packetNum =  C::t('#luckypacket#common_plugin_luckypacket')->count_allowed($_G['uid'], false);
				}
				break;
		}
	}

	// 用户组
	$query = C::t('common_usergroup')->range_orderby_credit();
	$groupList = array();
	foreach($query as $group) {
		$groupList[$group['groupid']] = $group['grouptitle'];
	}

	if($packets) {
		$uids = array();
		foreach($packets as $result) {
			if($result['pspecial'] == PACKET_TYPE_PERSON && $result['originatorid']) {
				$uids[$result['originatorid']] = $result['originatorid'];
			}
			$result = array_merge($result, (array)unserialize($result['settings']));
			$result['issuecredit'] = $_G['setting']['extcredits'][$result['issuecredit']]['title'];
			$result['remainNum'] = $result['total_num'] > $result['inum'] ? $result['total_num'] - $result['inum'] : 0;
			unset($result['settings']);
			if($usergroups = (array)unserialize($result['usergroups'])) {
				if($usergroups === array(0)) {
					$result['allowedGroup'] = lang('plugin/luckypacket', 'gender_both');
				} else {
					foreach($usergroups as $gId) {
						if($groupList[$gId]) {
							$result['allowedGroup'] .= $com.$groupList[$gId];
							$com = '&nbsp;';
						}
					}
				}
			}
			$packetList[] = $result;
		}

		if($uids) {
			$usernames = C::t('common_member')->fetch_all_username_by_uid($uids);
			foreach($packetList as $k => $v) {
				if($v['pspecial'] == PACKET_TYPE_PERSON && $v['originatorid']) {
					$v['username'] = $usernames[$v['originatorid']];
				}
				$packetList[$k] = $v;
			}
		}
	}

	$multipage = multi($packetNum, $pn, $page, $pageUrl);
	$bad_mod = lang('plugin/luckypacket', 'bad_mod');
	$del_succeed = lang('plugin/luckypacket', 'del_succeed');
	$moderate_pass = lang('plugin/luckypacket', 'moderate_pass');
}

// 排行榜 循环
$rankLists = array();
foreach($_G['setting']['extcredits'] as $key => $val) {
	foreach(C::t('#luckypacket#common_plugin_luckypacketlog')->fetch_sum_by_extcreditid($key) as $result) {
		$member = getuserbyuid($result['uid']);
		$rankLists[$val['title']][$result['uid']]['gn'] = $result['gn'];
		$rankLists[$val['title']][$result['uid']]['username'] = $member['username'];
	}
}

$getnumber = lang('plugin/luckypacket', 'get_num');
foreach(C::t('#luckypacket#common_plugin_luckypacketlog')->fetch_count_group_by_uid() as $result) {
	$member = getuserbyuid($result['uid']);
	$rankLists[$getnumber][$result['uid']]['gn'] = $result['gn'];
	$rankLists[$getnumber][$result['uid']]['username'] = $member['username'];
}
