<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

ALTER TABLE `pre_hux_wx` DROP `banknum` ;
ALTER TABLE `pre_hux_wx` DROP `banktime` ;

EOF;

runquery($sql);

$finish = TRUE;

?>