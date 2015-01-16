<?php
/**
 *	[Bug反馈(bug_feedback.uninstall)] (C)2015-2099 Powered by xianhuawei.
 *	Version: 1.0
 *	Date: 2015-1-13 16:13
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS pre_common_category`;
DROP TABLE IF EXISTS pre_common_basedata`;
DROP TABLE IF EXISTS pre_feedback_bug`;
DROP TABLE IF EXISTS pre_feedback_proposal`;
DROP TABLE IF EXISTS pre_feedback_status`;

EOF;

runquery($sql);
$finish = true;
?>