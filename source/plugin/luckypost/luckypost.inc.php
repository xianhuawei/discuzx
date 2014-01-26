<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$_G['uid']) {
	showmessage('to_login', '', '', array('login' => 1));
}

if(!$_G['cache']['plugin']['luckypost']['isopen']) {
	showmessage('luckypost:luckypost_closed');
}

$acArray = array('list', 'stat');
$action = !in_array($_GET['ac'], $acArray) ? 'list' : $_GET['ac'];

$list = $myfortune_arr = array();

//note 个人际遇统计
$myfortune_arr = C::t('#luckypost#common_plugin_luckypostlog')->fetch($_G['uid']);
$gdtimes = $myfortune_arr['goodtimes'] ? $myfortune_arr['goodtimes'] : 0;
$bdtimes = $myfortune_arr['badtimes'] ? $myfortune_arr['badtimes'] : 0;
$myfortune = lang('plugin/luckypost', 'myfortune', array('$goodtimes' => $gdtimes, '$badtimes' => $bdtimes));

//note 事件列表
if($action == 'list') {

	$events = $rewards = $punishs = array();
	//note 奖励事件
	$rewards = explode("\n", str_replace(array("\r\n", "\r"), "\n", $_G['cache']['plugin']['luckypost']['rewardevent']));
	foreach($rewards as $reward) {
		$events['reward'][] = explode('|', $reward);
	}
	//note 惩罚事件
	$punishs = explode("\n", str_replace(array("\r\n", "\r"), "\n", $_G['cache']['plugin']['luckypost']['punishevent']));
	foreach($punishs as $punish) {
		$events['punish'][] = explode('|', $punish);
	}

    $showMaxPage = 500;
	$pn = 10;
	$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $page = $page >= $showMaxPage ? $showMaxPage : $page;
	$start_limit = ($page-1)*$pn;

	$op = isset($_GET['op']) ? $_GET['op'] : '';
	$page_url = "plugin.php?id=luckypost";
	if($op == 'my') {
		$page_url .= "&op=my";
		$action = 'my';
		$totalnum = C::t('#luckypost#common_plugin_luckypost')->count_by_uid($_G['uid']);
		$allEvent = C::t('#luckypost#common_plugin_luckypost')->range_by_uid($_G['uid'], $start_limit, $pn, 'lid', 'DESC');
	} else {
		$totalnum = C::t('#luckypost#common_plugin_luckypost')->count();
		$allEvent = C::t('#luckypost#common_plugin_luckypost')->range($start_limit, $pn, 'DESC');
	}

	$todaytime = strtotime(dgmdate(TIMESTAMP, 'Ymd'));
	foreach($allEvent as $result) {
		$member = array('username' => lang('plugin/luckypost', 'anonymous'));
		if (!$result['anonymous'] || $action == 'my') {
			$member = getuserbyuid($result['uid']);
		}
		$eventKey = $result['credits'] > 0 ? 'reward' : 'punish';

		$creditId = $creditRangeString = $event ='';
		list($creditId, $creditRangeString, $event) = $events[$eventKey][$result['eventid']];
		$extcredits = $_G['setting']['extcredits'][$creditId]['img'] . $_G['setting']['extcredits'][$creditId]['title'];
		$credits = abs($result['credits']) . ' ' . $_G['setting']['extcredits'][$creditId]['unit'];
		$getmsg = str_replace(array('{username}', '{credit}', '{extcredits}'), array($member['username'], $credits, $extcredits), $event);
		if (!$getmsg) {
			$result['event'] = lang('plugin/luckypost', 'event_deleted');
		} else {
			$result['event'] = $getmsg.lang('plugin/luckypost', 'creditlog', array('$extcredit' => $extcredits, '$credit' =>  $eventKey == 'reward' ? $credits : '-'.$credits));
		}
		$result['username'] = $member['username'];
		$result['istoday'] = $result['dateline'] > $todaytime ? 1 : 0;
		$list[] = $result;
	}

    $totalnum = $totalnum >= $showMaxPage * $pn ? $showMaxPage * $pn : $totalnum;

	$multipage = multi($totalnum, $pn, $page, $page_url);

} elseif($action == 'stat') {

	$gllist = $bllist = $lucklist = array();
	foreach(C::t('#luckypost#common_plugin_luckypostlog')->range(0, 15, 'goodtimes', 'DESC') as $result) {
		$result['times'] = $result['goodtimes'];
		$member = getuserbyuid($result['uid']);
		$result['username'] = $member['username'];
		$gllist[] = $result;
	}

	foreach(C::t('#luckypost#common_plugin_luckypostlog')->range(0, 15, 'badtimes', 'DESC') as $result) {
		$result['times'] = $result['badtimes'];
		$member = getuserbyuid($result['uid']);
		$result['username'] = $member['username'];
		$bllist[] = $result;
	}
	$lucklist[] = $gllist;
	$lucklist[] = $bllist;
}

$opactives = array($action =>' class="a"');
$navtitle = lang('plugin/luckypost', 'luckypost');
include template('luckypost:luckypost');