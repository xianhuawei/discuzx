<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS pre_hux_wx;
DROP TABLE IF EXISTS pre_hux_wx_action;
DROP TABLE IF EXISTS pre_hux_wx_config;
DROP TABLE IF EXISTS pre_hux_wx_userjp;

EOF;

runquery($sql);

$finish = TRUE;

?>