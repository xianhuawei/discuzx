<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS `pre_plugin_hux_wx`;
CREATE TABLE IF NOT EXISTS `pre_plugin_hux_wx` (
  `openid` varchar(100) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cjpass` varchar(100) NOT NULL,
  PRIMARY KEY (`openid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `pre_plugin_hux_wx_action`;
CREATE TABLE IF NOT EXISTS `pre_plugin_hux_wx_action` (
  `openid` varchar(100) NOT NULL,
  `action` text NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `pre_plugin_hux_wx_config`;
CREATE TABLE IF NOT EXISTS `pre_plugin_hux_wx_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appid` varchar(50) NOT NULL,
  `appcmd` varchar(50) NOT NULL,
  `appcmdtxt` varchar(100) NOT NULL,
  `configs` text NOT NULL,
  `paixu` int(10) NOT NULL DEFAULT '0',
  `admincmd` tinyint(1) NOT NULL DEFAULT '0',
  `appver` varchar(50) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;

DROP TABLE IF EXISTS `pre_plugin_hux_wx_userjp`;
CREATE TABLE IF NOT EXISTS `pre_plugin_hux_wx_userjp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `jfnum` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

EOF;

runquery($sql);

$finish = TRUE;
?>