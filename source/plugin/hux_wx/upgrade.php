<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
ALTER TABLE `pre_hux_wx_config` ADD `state` TINYINT( 1 ) NOT NULL DEFAULT '0' ;
EOF;

$sql_q = C::t('#hux_wx#hux_wx_config')->check_by_field('state');
if (!$sql_q) {
	runquery($sql);
}

$finish = TRUE;

?>