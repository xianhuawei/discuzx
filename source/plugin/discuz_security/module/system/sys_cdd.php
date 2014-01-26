<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sys_cdd.php 228 2013-06-25 06:57:20Z qingrongfu $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$oparray = array('prescan', 'scan', 'report', 'index');
$op = in_array($_GET['op'], $oparray) ? $_GET['op'] : 'index';

if($op == 'prescan') {
	if(C::t('#discuz_security#discuz_security_cdd')->count_status(0) > 0) {
		cpmsg($csslang['sys_cdd_scan_unend'], 'action='.PARAM_URL, 'error');
	}
	$scanlist = list_dir(DISCUZ_ROOT, array('php'), array(DISCUZ_ROOT.'data'));
	foreach($scanlist as $file) {
		$data = array(
			'path' => $file,
			'scaned' => 0,
		);
		C::t('#discuz_security#discuz_security_cdd')->insert($data);
	}
	cpmsg($csslang['sys_cdd_prescan_end'], 'action='.PARAM_URL, 'succeed');

} elseif($op == 'scan') {
	$unscan = C::t('#discuz_security#discuz_security_cdd')->count_status(0);
	$file = C::t('#discuz_security#discuz_security_cdd')->fetch_one(0);
	if($file) {
		cdd_matchd($file['path']);
		C::t('#discuz_security#discuz_security_cdd')->update_status($file['id'], 1);
		cpmsg($file['path'].$csslang['sys_cdd_scan_redirect'].$unscan, 'action='.PARAM_URL.'&cp=sys_cdd&op=scan', 'loading');
	} else {
		$logdir = DISCUZ_ROOT.'./data/log/';
		$logs = array();
		$message = "<h2>".$csslang['sys_cdd_scan_danger']."</h2>";
		$logs = get_logs($logdir, 'cdd_scan_danger');
		$logs = fmt_logs($logs);
		$logs = today_logs($logs);
		$message .= implode('<br/>', $logs);
		$message .= "<br/><h2>".$csslang['sys_cdd_scan_warning']."</h2>";
		$logs = get_logs($logdir, 'cdd_scan_warning');
		$logs = fmt_logs($logs);
		$logs = today_logs($logs);
		$message .= implode('<br/>', $logs);
		$date = date('Y-m-d H:i:s');
		include libfile('function/mail');
		sendmail('discuzsupport@126.com', "$date CDD Report @".$_G['setting']['bbname'], $message);
		cpmsg($csslang['sys_cdd_scan_end'], 'action='.PARAM_URL, 'succeed');
	}
} elseif($op == 'report') {
	C::t('#discuz_security#discuz_security_cdd')->delete_scaned();

	$logdir = DISCUZ_ROOT.'./data/log/';
	$logs = array();
	$logs = get_logs($logdir, 'cdd_scan_danger');
	$logs = fmt_logs($logs);
	$logs = today_logs($logs);
	
	$wlogs = array();
	$wlogs = get_logs($logdir, 'cdd_scan_warning');
	$wlogs = fmt_logs($wlogs);
	$wlogs = today_logs($wlogs);

	showtableheader();
	showtablerow('class="header"', array('class="td23"','class="td23"','class="td23"','class="td24"','class="td24"','class="td24"', ''), array(
		$csslang['sys_cdd_scan_level'],
		$csslang['sys_cdd_scan_report_time'],
		$csslang['sys_cdd_scan_report_file'],
		$csslang['sys_cdd_scan_report_filemodtime'],
		$csslang['sys_cdd_scan_report_code'],
		$csslang['sys_cdd_scan_report_rule'],
	));
	
	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		showtablerow('', array('class="highlight"', 'class="smallefont"', 'class="smallefont"', 'class="bold"', 'class="smallefont"', 'class="smallefont"'), array(
			$csslang['sys_cdd_scan_danger'],
			$log[1],
			$log[5],
			$log[6],
			$log[7],
			$log[8]
		));
	}
	foreach($wlogs as $logrow) {
		$log = explode("\t", $logrow);
		showtablerow('', array('', 'class="smallefont"', 'class="smallefont"', 'class="bold"', 'class="smallefont"', 'class="smallefont"'), array(
			$csslang['sys_cdd_scan_warning'],
			$log[1],
			$log[5],
			$log[6],
			$log[7],
			$log[8]
		));
	}
	showtablefooter();
}
?>