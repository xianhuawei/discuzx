<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS pre_plugin_zhuanpan_jx;
CREATE TABLE IF NOT EXISTS pre_plugin_zhuanpan_jx (
  `jid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `jorder` int(2) NOT NULL DEFAULT '0',
  `jname` varchar(10) NOT NULL,
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 ;

DROP TABLE IF EXISTS pre_plugin_zhuanpan_userjp;
CREATE TABLE IF NOT EXISTS pre_plugin_zhuanpan_userjp (
  `eid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jxname` varchar(10) NOT NULL,
  `jpstate` tinyint(1) NOT NULL DEFAULT '0',
  `sqstate` tinyint(1) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM ;

INSERT INTO pre_plugin_zhuanpan_jx (`jid`, `jorder`, `jname`) VALUES
(1, 0, 'no1'),
(2, 1, 'no2'),
(3, 2, 'no3'),
(4, 3, 'no4'),
(5, 4, 'no5'),
(6, 5, 'no6'),
(7, 6, 'no7'),
(8, 7, 'no8'),
(9, 8, 'no9'),
(10, 9, 'no10'),
(11, 10, 'no11'),
(12, 11, 'no12');

EOF;

runquery($sql);

$finish = TRUE;
?>