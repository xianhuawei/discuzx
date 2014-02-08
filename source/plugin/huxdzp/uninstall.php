<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE pre_plugin_zhuanpan_jx;
DROP TABLE pre_plugin_zhuanpan_userjp;

EOF;

runquery($sql);

$finish = TRUE;

?>