<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sys_limit.php 205 2013-05-29 08:16:16Z qingrongfu $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

$hasRedis = extension_loaded('redis');
if(!$_G['cache']['plugin']['discuz_security']['islimit'] || !$hasRedis) {
	cpmsg(lang('plugin/discuz_security', 'sys_limit_check'));
}

$oparray = array('allban','allsession','history');
$op = in_array($_GET['op'], $oparray) ? $_GET['op'] : 'allban';
$limiturl = DS_URL.'&cp=sys_limit&op='.$op;

$r = new Redis();
$r->pconnect($_G['cache']['plugin']['discuz_security']['limitRedisHost'], $_G['cache']['plugin']['discuz_security']['limitRedisPort']);
$r->auth($_G['cache']['plugin']['discuz_security']['limitRedisPass']);

if($op == 'allban') {
	adminlog('LIMIT');
	if(empty($_GET['unban']) && empty($_GET['white']) && empty($_GET['black']) && empty($_GET['unwhite'])) {
		showtableheader(lang('plugin/discuz_security', 'sys_limit_black'), 'nobottom');
		echo '<tr><td>ip</td><td>'.$csslang['sys_limit_operation'].'</td></tr>';
		
		$ips = $r->sMembers('ip.black');
		foreach($ips as $ip) {
			echo '<tr><td>'.$ip.'</td><td><a href="'.$limiturl.'&unban=1&ip='.$ip.'">'.$csslang['sys_limit_remove'].'</a> &nbsp</td></tr>';
		}
		showtablefooter();
		
		showtableheader($csslang['sys_limit_white'], 'nobottom');
		echo '<tr><td>ip</td><td>'.$csslang['sys_limit_operation'].'</td></tr>';
		$ips = $r->sMembers('ip.white');
		foreach($ips as $ip) {
			echo '<tr><td>'.$ip.'</td><td><a href="'.$limiturl.'&unwhite=1&ip='.$ip.'">'.$csslang['sys_limit_remove'].'</a> &nbsp</td></tr>';
		}
		showtablefooter();
		
		$ips = $r->zRange('banIP', 0, -1, true);
		$ipsCount = count($ips);
		showtableheader($csslang['sys_limit_ban_now'].$ipsCount, 'nobottom');
		echo '<tr><td>'.$csslang['sys_limit_ipaddress'].'</td><td>'.$csslang['sys_limit_banned_num'].'</td><td>'.$csslang['sys_limit_first_banned'].'</td><td>'.$csslang['sys_limit_last_banned'].'</td><td>'.$csslang['sys_limit_remove'].'</td></tr>';
		foreach($ips as $ip => $score) {
			$firstTime = date(DATE_RFC822, $r->hGet('banTime', 'first.'.$ip));
			$lastTime = $r->hGet('banTime', 'last.'.$ip) ? date(DATE_RFC822, $r->hGet('banTime', 'last.'.$ip)) : 'NULL';
			echo "<tr><td>$ip</td><td>$score</td><td>$firstTime</td><td>$lastTime</td><td>";
			echo $limiturl."&unban=1&ip=$ip\">".$csslang['.sys_limit_unban']."</a> &nbsp";
			echo $limiturl."&white=1&ip=$ip\">".$csslang['sys_limit_addwhite']."</a>";
			echo $limiturl."&black=1&ip=$ip\">".$csslang['sys_limit_addblack']."</a>";
			echo '</td></tr>';
		}
		showtablefooter();
	}
	if($_GET['unban'] == 1) {
		$unbanIp = $_GET['ip'];
		$firstTime = $r->hGet('banTime', 'first.'.$unbanIp);
		$lastTime = $r->hGet('banTime', 'last.'.$unbanIp);
		$r->lPush('unBanIpLog', $unbanIp.'::'.date($csslang['sys_limit_dateformat'], $firstTime).'::'.date($csslang['sys_limit_dateformat'], $lastTime));
		$r->zDelete('banIP', $unbanIp); 
		$r->hDel('banTime', 'first.'.$unbanIp);
		$r->hDel('banTime', 'last.'.$unbanIp);
		$r->sRem('ip.black', $unbanIp);
		cpmsg($csslang['sys_limit_remove_succeed']);
	}
	if($_GET['white'] == 1) {
		$whiteIp = $_GET['ip'];
		$firstTime = $r->hGet('banTime', 'first.'.$whiteIp);
		$lastTime = $r->hGet('banTime', 'last.'.$whiteIp);
		$r->lPush('unBanIpLog', $whiteIp.'::'.date($csslang['sys_limit_dateformat'], $firstTime).'::'.date($csslang['sys_limit_dateformat'], $lastTime));
		$r->zDelete('banIP', $whiteIp); 
		$r->hDel('banTime', 'first.'.$whiteIp);
		$r->hDel('banTime', 'last.'.$whiteIp);
		$r->sRem('ip.black', $whiteIp);
	}
	if($_GET['black'] == 1) {
		$blackIp = $_GET['ip'];
		$r->sAdd('ip.black', $blackIp);
	}
	if($_GET['unwhite'] == 1) {
		$whiteIp = $_GET['ip'];
		$r->sRem('ip.white', $whiteIp);
		cpmsg($csslang['sys_limit_remove_succeed']);
	}
} elseif($op == 'allsession') {
	adminlog('LIMIT');
	$today=date('Ymd');
	echo '<strong>'.$csslang['sys_limit_todayip'].'</strong>';
	echo $r->zSize('dayIpCount:'.$today),'<br>';
	$allSess = $r->keys('sid:*');
	$allSessCount = count($allSess);
	showtableheader($csslang['sys_limit_activity_now'].$allSessCount, 'nobottom');
	echo '<tr><td>'.$csslang['sys_limit_ipaddress'].'</td><td>'.$csslang['sys_limit_session_num'].'</td><td>'.$csslang['sys_limit_session_low'].'</td></tr>';
	
	foreach($allSess as $_sess) {
		$_ip = explode(':', $_sess);
		$ip = $_ip[1];
		$sessCount = $r->zSize('sid:'.$ip);
		$lowScoreSessCount=$r->zCount('sid:'.$ip, 0, 1);
		echo "<tr><td>$ip</td><td>$sessCount</td><td>$lowScoreSessCount</td></tr>";
	}
	showtablefooter();
} elseif($op == 'history') {
	adminlog('LIMIT');
	$thisPage = (int) $_GET['page'];
	$num = $r->lsize('unBanIpLog');
	$perPage = 20;
	echo multi($num, $perPage, $thisPage, $url);

	$thisPage == 1 ? $start = 1 : $start = $thisPage * $perPage;
	$stop = $start + $perPage - 1;

	$allHis = $r->lRange('unBanIpLog', $start, $stop);
	showtableheader($csslang['sys_limit_banlog'], 'nobottom');
	echo '<tr><td>'.$csslang['sys_limit_ipaddress'].'</td><td>'.$csslang['sys_limit_first_banned'].'</td><td>'.$csslang['sys_limit_last_banned'].'</td></tr>';
	foreach($allHis as $_his) {
		$_row = explode('::', $_his);
		$ip = $_row[0];
		$firstTime = $_row[1];
		$lastTime = $_row[2];
		echo "<tr><td>$ip</td><td>$firstTime</td><td>$lastTime</td></tr>";
	}
	showtablefooter();
}

?>
