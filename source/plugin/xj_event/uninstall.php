<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$plugin_xj_event = DB::table('xj_event');
$plugin_xj_eventapply = DB::table('xj_eventapply');
$plugin_xj_eventthread = DB::table('xj_eventthread');
$plugin_xj_event_member_info = DB::table('xj_event_member_info');
$plugin_xj_event_vote_log = DB::table('xj_event_vote_log');



$sql = <<<EOF
DROP TABLE IF EXISTS $plugin_xj_event;
DROP TABLE IF EXISTS $plugin_xj_eventapply;
DROP TABLE IF EXISTS $plugin_xj_eventthread;
DROP TABLE IF EXISTS $plugin_xj_event_member_info;
DROP TABLE IF EXISTS $plugin_xj_event_vote_log;
EOF;

runquery($sql);
$finish = true;
?>