<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_plugin_banklist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bankname` varchar(20) NOT NULL DEFAULT '',
  `banklogo` varchar(255) NOT NULL DEFAULT '',
  `creator` varchar(15) NOT NULL DEFAULT '',
  `opentime` int(10) unsigned NOT NULL DEFAULT '0',
  `bankstatus` tinyint(1) NOT NULL DEFAULT '0',
  `bankadmin` varchar(200) NOT NULL DEFAULT '',
  `investment` int(10) unsigned NOT NULL DEFAULT '0',
  `bankroll` int(10) NOT NULL DEFAULT '0',
  `deposit` int(10) NOT NULL DEFAULT '0',
  `usernum` int(10) unsigned NOT NULL DEFAULT '0',
  `notice` text NOT NULL,
  `opencost` int(10) NOT NULL DEFAULT '0',
  `currentrate` text NOT NULL,
  `fixedrate` varchar(10) NOT NULL DEFAULT '',
  `lendingrate` varchar(10) NOT NULL DEFAULT '',
  `changetax` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `pre_plugin_banklog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `bankid` int(10) unsigned NOT NULL DEFAULT '0',
  `issystem` tinyint(1) NOT NULL DEFAULT '0',
  `opnum` int(10) NOT NULL DEFAULT '0',
  `remark` text,
  `otheruser` varchar(15) NOT NULL DEFAULT '',
  `optime` int(10) unsigned NOT NULL DEFAULT '0',
  `opip` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ubank` (`bankid`,`uid`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `pre_plugin_bankoperation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `bankid` int(10) unsigned NOT NULL DEFAULT '0',
  `optype` tinyint(1) NOT NULL DEFAULT '0',
  `opstatus` tinyint(1) NOT NULL DEFAULT '0',
  `opnum` int(10) unsigned NOT NULL DEFAULT '0',
  `extchar` char(32) NOT NULL DEFAULT '',
  `begintime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ubank` (`bankid`,`uid`)
) ENGINE=MyISAM;
EOF;

runquery($sql);

$finish = TRUE;
?>
