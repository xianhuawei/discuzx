<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_ec_credit.php 26205 2011-12-05 10:09:32Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/*debug
* 更新用户信用评价缓存
* @param $uid - 用户 uid
* @param $type - 信用评价类型 buyercredit 买家信用 sellercredit 卖家信用
* @信用评价统计数据数组 序列化结果 写入 spacecaches 表
*/
function updatecreditcache($uid, $type, $return = 0) {
	//debug 所有评价
	$all = countcredit($uid, $type);
	//debug 近6个月评价
	$halfyear = countcredit($uid, $type, 180);
	//debug 近1个月评价
	$thismonth = countcredit($uid, $type, 30);
	//debug 近1周评价
	$thisweek = countcredit($uid, $type, 7);
	//debug 6个月以前的评价
	$before = array(
		'good' => $all['good'] - $halfyear['good'],
		'soso' => $all['soso'] - $halfyear['soso'],
		'bad' => $all['bad'] - $halfyear['bad'],
		'total' => $all['total'] - $halfyear['total']
	);

	$data = array('all' => $all, 'before' => $before, 'halfyear' => $halfyear, 'thismonth' => $thismonth, 'thisweek' => $thisweek);

	C::t('forum_spacecache')->insert(array(
		'uid' => $uid,
		'variable' => $type,
		'value' => serialize($data),
		'expiration' => getexpiration(),
	), false, true);
	if($return) {
		return $data;
	}
}

/*debug
* 统计用户信用评价
* @param $uid - 用户 uid
* @param $type - 信用评价类型 buyercredit 买家信用 sellercredit 卖家信用
* @param $days - 统计多少天以来的数据 0 表示所有
* @return 返回数组 信用评价统计数据
*/
function countcredit($uid, $type, $days = 0) {
	$type = $type == 'buyercredit' ? 1 : 0;
	$good = $soso = $bad = 0;
	foreach(C::t('forum_tradecomment')->fetch_all_by_rateeid($uid, $type, $days ? TIMESTAMP - $days * 86400 : 0) as $credit) {
		if($credit['score'] == 1) {
			$good++;
		} elseif($credit['score'] == 0) {
			$soso++;
		} else {
			$bad++;
		}
	}
	return array('good' => $good, 'soso' => $soso, 'bad' => $bad, 'total' => $good + $soso + $bad);
}

/*debug
* 更新用户信用评价
* @param $uid - 用户 uid
* @param $type - 信用评价类型 buyercredit 买家信用 sellercredit 卖家信用
* @param $level - 信用评价级别 good 好评  soso 中评 bad 差评
*/
function updateusercredit($uid, $type, $level) {
	$uid = intval($uid);
	if(!$uid || !in_array($type, array('buyercredit', 'sellercredit')) || !in_array($level, array('good', 'soso', 'bad'))) {
		return;
	}

	if($cache = C::t('forum_spacecache')->fetch($uid, $type)) {
		$expiration = $cache['expiration'];
		$cache = dunserialize($cache['value']);
	} else {
		$init = array('good' => 0, 'soso' => 0, 'bad' => 0, 'total' => 0);
		$cache = array('all' => $init, 'before' => $init, 'halfyear' => $init, 'thismonth' => $init, 'thisweek' => $init);
		$expiration = getexpiration();
	}

	foreach(array('all', 'before', 'halfyear', 'thismonth', 'thisweek') as $key) {
		$cache[$key][$level]++;
		$cache[$key]['total']++;
	}

	C::t('forum_spacecache')->insert(array(
		'uid' => $uid,
		'variable' => $type,
		'value' => serialize($cache),
		'expiration' => $expiration,
	), false, true);

	$score = $level == 'good' ? 1 : ($level == 'soso' ? 0 : -1);
	C::t('common_member_status')->increase($uid, array($type=>$score));
}

?>