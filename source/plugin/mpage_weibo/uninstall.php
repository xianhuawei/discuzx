<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS `pre_mpage_weibo`;
DROP TABLE IF EXISTS `pre_mpage_weibo_sync`;
EOF;

runquery($sql);

$finish = TRUE;