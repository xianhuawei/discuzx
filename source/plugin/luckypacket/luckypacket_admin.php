<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!in_array($_GET['op'], array('add', 'edit'))) {
	showmessage('undefined_action');
}

// 闱炵鐞嗗憳
if(!$packetAdmin) {
	// 绂佹闱炶嚜锷╃孩鍖呮搷浣?
	if($_GET['pspecial'] != PACKET_TYPE_PERSON) {
		showmessage('undefined_action');
	} elseif($_GET['pspecial'] == PACKET_TYPE_PERSON && !$selfPacket) {
		showmessage('luckypacket:pakcet_issue_invalid');
	}
}

$packet = array();
$op = $_GET['op'];
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
$ps = isset($_GET['pspecial']) ? intval($_GET['pspecial']) : PACKET_TYPE_NORMAL;
$bad_rtid = lang('plugin/luckypacket', 'bad_rtid');
$operation = lang('plugin/luckypacket', 'add_type_'.$ps);
$packet = '';
if($op == 'edit') {
	$operation = lang('plugin/luckypacket', 'packet_edit');
	$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($pid);
}

// 鐢ㄦ埛缁?
$query = C::t('common_usergroup')->range_orderby_credit();
$grouplist = array();
foreach($query as $group) {
	$group['type'] = $group['type'] == 'special' && $group['radminid'] ? 'specialadmin' : $group['type'];
	$grouplist[lang('plugin/luckypacket', 'usergroups_'.$group['type'])][$group['groupid']] = $group['grouptitle'];
}

if(!submitcheck('submit', 1)) {
	if($op == 'edit') {
		if(!$packet || $packet['status'] == PACKEY_STATUS_DELETE) {
			showmessage('luckypacket:packet_noexist');
		}

		// 闱炵鐞嗗憳绂佹缂栬緫浠栦汉绾㈠寘
		if($packet['originatorid'] != $_G['uid'] && !$packetAdmin) {
			showmessage('luckypacket:packet_edit_nopermission');
		}
		$packet['starttimefrom'] = $packet['starttimefrom'] ? dgmdate($packet['starttimefrom'], 'Y-m-j H:i') : '';
		$packet['starttimeto'] = $packet['starttimeto'] ? dgmdate($packet['starttimeto'], 'Y-m-j H:i') : '';
		$packet = array_merge($packet, (array)unserialize($packet['settings']));
		$packet['usergroups'] = (array)unserialize($packet['usergroups']);
		$packet['total_num'] = $packet['total_num'] > 0 ? $packet['total_num'] : -1;
		unset($packet['settings']);
		$ps = $packet['pspecial'];
	}

} else {

	$setarr = array();
	$newpacketname = dhtmlspecialchars(trim($_GET['packet_name']));
	$newpacketnote = dhtmlspecialchars(trim($_GET['packet_note']));
	$starttimenew = @strtotime($_GET['starttimefrom']);
	$endtimenew = @strtotime($_GET['starttimeto']);
	$issueCredit = intval($_GET['packetnew']['issuecredit']);

	if($newpacketname == '') {
		showmessage('luckypacket:packet_name_isnull');
	}
	if($newpacketnote == '') {
		showmessage('luckypacket:packet_note_isnull');
	}
	if($endtimenew > 0 && $endtimenew < $starttimenew) {
		showmessage('luckypacket:bad_endtime');
	}
	if($_G['setting']['extcredits'][$issueCredit]['title'] == '') {
		showmessage('luckypacket:bad_extcredit');
	}

	foreach($_GET['packetnew'] as $key => &$val) {
		$val = trim($val) == '' ? 0 : trim($val);
		if(!isint($val) || ($key == 'rtid' && $val <= 0) || ($key == 'num_pp' && $val <= 0) || ($key == 'total_num' && $val == 0) || ($key == 'modnum_multiply' && $val < 0) || ((($key == 'certainnum' && $_GET['packetnew']['issuetype'] == 1) || ($key == 'packetmaxnum' && $_GET['packetnew']['issuetype'] == 2)) && $val <= 0)) {
			showmessage('luckypacket:bad_'.$key);
		}
	}
	$max = max($_GET['packetnew']['packetminnum'], $_GET['packetnew']['packetmaxnum']);
	$_GET['packetnew']['packetminnum'] = min($_GET['packetnew']['packetminnum'], $_GET['packetnew']['packetmaxnum']);
	$_GET['packetnew']['packetmaxnum'] = $max;

	if($ps == PACKET_TYPE_REPLY) {
		$rtid = isset($_GET['packetnew']['rtid']) ? $_GET['packetnew']['rtid'] - 0 : 0;
		$existpost = C::t('forum_thread')->fetch_by_tid_displayorder($rtid, 0);
		if(!$existpost || $existpost['closed'] != 0) {
			showmessage('luckypacket:bad_rtid');
		}
	}
	$ispass = ($ps == PACKET_TYPE_PERSON && !$packetAdmin) ? 0 : 1;
	$status = intval($_GET['isopen']) == PACKEY_STATUS_OPEN ? PACKEY_STATUS_OPEN : PACKEY_STATUS_CLOSE;
	$setarr = array(
		'pname' => $newpacketname,
		'description' => $newpacketnote,
		'pspecial' => $ps,
		'starttimefrom' => $starttimenew,
		'starttimeto' => $endtimenew,
		'settings' => serialize($_GET['packetnew']),
		'usergroups' => !isset($_GET['usergroups']) || in_array(0, $_GET['usergroups']) ? serialize(array(0)) : serialize($_GET['usergroups']),
		'displayorder' => intval($_GET['displayorder']),
		'status' => $status,
		'ispass' => $ispass,
	);

	if($op == 'add') {

		$setarr['created'] = TIMESTAMP;
		$setarr['originatorid'] = $_G['uid'];
		$starttimenew = $starttimenew ? $starttimenew : TIMESTAMP;
		$newpacketname .= lang('plugin/luckypacket', 'announce_issue');
		$newpacketnote .= lang('plugin/luckypacket', 'goto_packet');
		if($_GET['isannounce'] && $ps != PACKET_TYPE_PERSON) {
			$data = array(
				'author' => $_G['username'],
				'subject' => $newpacketname,
				'type' => 0,
				'starttime' => $starttimenew,
				'endtime' => $endtimenew,
				'message' => $newpacketnote,
			);
			require_once libfile('function/cache');
			C::t('forum_announcement')->insert($data);
			updatecache(array('announcements', 'announcements_forum'));
		}

		$addresult = C::t('#luckypacket#common_plugin_luckypacket')->insert($setarr, true);
		$jumpAdd = '';
		if(intval($addresult)) {
			if($ps == PACKET_TYPE_PERSON) {
				//$founders = empty($_G['config']['admincp']['founder']) ? array() : explode(',', $_G['config']['admincp']['founder']);
				//$notifyUIds = array_merge($founders, $adminids);
				if($adminids) {
					$notifyUId = $adminids[array_rand($adminids)];
					if($notifyUId) {
						notification_add($notifyUId, 'system', 'luckypacket:packet_need_moderate_content', array('$siteurl' => $_G['siteurl']), 1);
					}

				}
			}
			$jumpAdd = '&pid='.$addresult;
		}

		showmessage('luckypacket:add_succeed', 'plugin.php?id=luckypacket'.$jumpAdd);
	}

	if($op == 'edit') {
		if($packet['originatorid'] != $_G['uid'] && !$packetAdmin) {
			showmessage('luckypacket:packet_edit_nopermission');
		}
		$setarr['pspecial'] = $packet['pspecial'];
		$setarr['updated'] = TIMESTAMP;
		$setarr['lastedit'] = $_G['uid'];
		$result = C::t('#luckypacket#common_plugin_luckypacket')->update($pid, $setarr);
		if($result) {
			showmessage('luckypacket:edit_succeed', 'plugin.php?id=luckypacket');
		} else {
			showmessage('undefined_action');
		}
	}
	dexit();
}

function isint($str) {
	if((string)$str === (string)(int)$str) {
		return true;
	}
	return false;
}
