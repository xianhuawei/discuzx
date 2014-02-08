<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

global $_G;
$plugin_xj_event = DB::table('plugin_xj_event');
$sql = <<<EOF
ALTER TABLE $plugin_xj_event ADD `activitybegin` int(10) NOT NULL;
EOF;
echo $sql;

runquery($sql);

?>