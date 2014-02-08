<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

ALTER TABLE `pre_hux_wx` DROP `qdnum` ;
ALTER TABLE `pre_hux_wx` DROP `qdtime` ;

EOF;

runquery($sql);

$finish = TRUE;

?>