<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

CREATE TABLE IF NOT EXISTS `pre_hux_kami` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kami` text NOT NULL,
  `kid` int(11) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

DROP TABLE IF EXISTS `pre_hux_zp`;
CREATE TABLE IF NOT EXISTS `pre_hux_zp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `jfnum` varchar(200) NOT NULL DEFAULT '0',
  `gailv` int(11) unsigned NOT NULL DEFAULT '0',
  `num` int(11) unsigned NOT NULL DEFAULT '0',
  `jpshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

INSERT INTO `pre_hux_zp` (`id`, `name`, `type`, `jfnum`, `gailv`, `num`, `jpshow`) VALUES
(1, 'NO1', 0, '0', 1, 1, 1),
(2, 'NO2', 0, '0', 20, 1, 1),
(3, 'NO3', 0, '0', 500, 10, 1),
(4, 'NO4', 0, '0', 2000, 50, 1),
(5, 'NO5', 0, '0', 7000, 100, 1),
(6, 'NO6', 0, '0', 30000, 200, 1),
(7, 'NO7', 0, '0', 80000, 500, 1);

CREATE TABLE IF NOT EXISTS `pre_hux_zp_user` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `playnum` int(11) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM ;

CREATE TABLE IF NOT EXISTS `pre_hux_zp_userjp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `jfnum` int(11) unsigned NOT NULL DEFAULT '0',
  `jpshow` tinyint(1) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

EOF;

runquery($sql);

$finish = TRUE;
?>