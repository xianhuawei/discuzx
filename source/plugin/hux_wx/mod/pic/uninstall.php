<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS pre_hux_wx_pic;

EOF;

runquery($sql);

$finish = TRUE;

?>