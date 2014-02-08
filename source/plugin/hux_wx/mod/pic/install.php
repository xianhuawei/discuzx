<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS `pre_hux_wx_pic`;
CREATE TABLE IF NOT EXISTS `pre_hux_wx_pic` (
  `id` varchar(100) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `picurl` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

EOF;

runquery($sql);

$finish = TRUE;
?>