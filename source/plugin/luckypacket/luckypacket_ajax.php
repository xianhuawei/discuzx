<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if($_GET['action'] == 'get' && submitcheck('getsubmit', 1)) {
	$packetid = intval($_GET['packetid']);

	$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($packetid);
	$gender = C::t('#luckypacket#common_member_profile_for_plugin')->fetch_field_value_by_uid($_G['uid'], 'gender');

	// 绾㈠寘链镙告垨链紑鍚?
	if($packet['status'] != PACKEY_STATUS_OPEN || $packet['ispass'] != 1) {
		showmessage('luckypacket:pakcet_get_invalid');
	}

	// 绂佹镊凡棰呜嚜宸茬孩鍖?
	if($packet['pspecial'] == PACKET_TYPE_PERSON && $packet['originatorid'] == $_G['uid']) {
		showmessage('luckypacket:pakcet_self_invalid');
	}

	$packet = array_merge($packet, (array)unserialize($packet['settings']));
	$packet['usergroups'] = unserialize($packet['usergroups']);
	unset($packet['settings']);
	// 链紑濮?
	if($packet['starttimefrom'] > 0 && $packet['starttimefrom'] > TIMESTAMP) {
		showmessage('luckypacket:pakcet_not_start');
	}

	// 宸茬粨鏉?
	if($packet['starttimeto'] > 0 && $packet['starttimeto'] < TIMESTAMP) {
		showmessage('luckypacket:pakcet_end_already');
	}

	// 绾㈠寘琚瀹屼简
	if($packet['total_num'] > 0 && $packet['inum'] >= $packet['total_num']) {
		showmessage('luckypacket:packet_total_max_failed', dreferer());
	}

	// 鐢ㄦ埛缁勯檺鍒?
	if($packet['usergroups'] !== array(0) && !in_array($_G['member']['groupid'], $packet['usergroups'])) {
		showmessage('luckypacket:usergroup_get_invalid');
	}

	// 鍚勭闄愬埗鍒ゆ柇
	$post = getuserprofile('posts');
	$varReplace = array(
		'$packet[regDay]' => $packet['reg_day'],
		'$packet[postNum]' => $packet['postnum'],
		'$packet[credit]' => $packet['credit'],
		'$packet[gender]' => $packet['gender'] == 0 ? lang('plugin/luckypacket', 'gender_both') : ($packet['gender'] == 1 ? lang('plugin/luckypacket', 'gender_male') : lang('plugin/luckypacket', 'gender_female')),
		'$regDay' => floor((TIMESTAMP - $_G['member']['regdate'])/86400),
		'$post' => $post,
		'$credits' => $_G['member']['credits'],
		'$gender' => $gender == 0 ? lang('plugin/luckypacket', 'gender_secret') : ($gender == 1 ? lang('plugin/luckypacket', 'gender_male') : lang('plugin/luckypacket', 'gender_female')),
	);

	if(((TIMESTAMP - $packet['reg_day']*86400) < $_G['member']['regdate']) || ($packet['postnum'] > $post) || ($packet['credit'] > $_G['member']['credits']) || ($packet['gender'] > 0 && $gender != $packet['gender'])) {
		showmessage('luckypacket:packet_permforum_nopermission', '', $varReplace);
	}

	// 锲炲笘绾㈠寘鍜岀浜虹孩鍖呭垽鏂槸鍚﹀洖甯?
	if($packet['pspecial'] == PACKET_TYPE_REPLY || $packet['pspecial'] == PACKET_TYPE_PERSON) {
		$ptable = getposttablebytid($packet['rtid']);
		$isreply = C::t('forum_post')->fetch_pid_by_tid_authorid($packet['rtid'], $_G['uid']);
		if(!$isreply) {
			showmessage('luckypacket:nopost_nodraw', '', array('$replyurl' => $packet['rtid']));
		}
	}
	// 闅忔満链艰缮鏄浐瀹氩€?
	$creditdata = $packet['issuetype'] == 1 ? $packet['certainnum'] : randomPacket($packet['packetminnum'], $packet['packetmaxnum']);
	$creditdata = ($_G['adminid'] > 0 && $_G['adminid'] <= 3) ? ($packet['modnum_multiply']+1) * $creditdata : $creditdata;
	$dataarr = array('extcredits'.$packet['issuecredit'] => $creditdata);

	if($packet['pspecial'] != PACKET_TYPE_DAILY) {
		$today = '';
	}

	// 宸查杩囨暟閲?
	$personnum = C::t('#luckypacket#common_plugin_luckypacketlog')->count_by_packetid_uid($packetid, $_G['uid'], $today);
	if($personnum >= $packet['num_pp']) {
		showmessage('luckypacket:packet_get_max_failed', dreferer());
	} else {
		if(strtolower(CHARSET) != 'utf-8') {
			$getmsg = diconv(lang('plugin/luckypacket', 'packet_get_succeed'), CHARSET, 'utf-8');
		}
		if($packet['pspecial'] == PACKET_TYPE_PERSON && $packet['originatorid']) {
			$originator = C::t('common_member_count')->fetch($packet['originatorid']);
			// 绉垎绛栫暐涓嬮檺
			if($originator['extcredits'.$packet['issuecredit']]-abs($creditdata) < $_G['setting']['creditspolicy']['lowerlimit'][$packet['issuecredit']]) {
				showmessage('luckypacket:credits_policy_lowerlimit');
				exit;
			}
			$dataarr1 = array('extcredits'.$packet['issuecredit'] => '-'.abs($creditdata));
			updatemembercount($packet['originatorid'], $dataarr1, 1);
		}
		updatemembercount($_G['uid'], $dataarr, 1, '', 0, $getmsg);
		C::t('#luckypacket#common_plugin_luckypacket')->increase($packetid, array('inum' => 1, 'tnum' => 1));
		$data = array(
			'uid' => $_G['uid'],
			'packetid' => $packetid,
			'issuetype' => $packet['issuetype'],
			'dateline' => TIMESTAMP,
			'opip' => $_G['clientip'],
			'extcredit' => $packet['issuecredit'],
			'creditnum' => $creditdata,
		);
		C::t('#luckypacket#common_plugin_luckypacketlog')->insert($data);

		showmessage('luckypacket:packet_get_succeed_msg', dreferer(), array('$credit' => $creditdata, '$credittitle' => $_G['setting']['extcredits'][$packet['issuecredit']]['title']));
	}
	dexit();
} elseif($_GET['action'] == 'checkval') {
	$rtid = isset($_GET['rtid']) ? intval($_GET['rtid']) : 0;
	$existpost = C::t('forum_thread')->fetch_by_tid_displayorder($rtid, 0);
	if(!$existpost || $existpost['closed'] != 0) {
		showmessage('bad_rtid', '', array(), array('msgtype' => 3));
	} else {
		showmessage('luckypacket:thread_title', '', array('$existpost' => $existpost['subject'], '$tid' => $rtid), array('msgtype' => 3));
	}
} elseif($_GET['action'] == 'moderate' && $packetAdmin) {
	$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
	$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($pid);
	if($packet['packetid'] && $packet['ispass'] != 1 && $packet['status'] != PACKEY_STATUS_DELETE) {
		$modpacket = C::t('#luckypacket#common_plugin_luckypacket')->update($pid, array('ispass' => '1'));
		if(!$modpacket) {
			showmessage('bad_mod', '', array(), array('msgtype' => 3));
		}
	} else {
		showmessage('bad_mod', '', array(), array('msgtype' => 3));
	}
	showmessage('luckypacket:moderate_pass', '', array(), array('msgtype' => 3));
} elseif($_GET['action'] == 'del' && $packetAdmin) {
	$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
	$packet = C::t('#luckypacket#common_plugin_luckypacket')->fetch($pid);
	if($packet['packetid'] && $packet['status'] != PACKEY_STATUS_DELETE) {
		$modpacket = C::t('#luckypacket#common_plugin_luckypacket')->update($pid, array('status' => PACKEY_STATUS_DELETE));
		if(!$modpacket) {
			showmessage('bad_mod', '', array(), array('msgtype' => 3));
		}
	} else {
		showmessage('bad_mod', '', array(), array('msgtype' => 3));
	}
	showmessage('luckypacket:del_succeed', '', array(), array('msgtype' => 3));
} elseif($_GET['action'] == 'reset' && $packetAdmin) {
} else {
	showmessage('bad_mod', '', array(), array('msgtype' => 3));
}

dexit();


function randomPacket($min = 0, $max = 100) {

	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	$num = mt_rand($min, $max);

	return $num;
}
?>