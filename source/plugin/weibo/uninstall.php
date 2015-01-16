<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS `pre_plugin_weibo`;
DROP TABLE IF EXISTS `pre_plugin_weibo_sync`;
EOF;

runquery($sql);

$finish = TRUE;