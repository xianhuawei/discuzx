<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install.php 227 2013-06-25 06:56:23Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS cdb_plugin_discuz_security_banip;
CREATE TABLE cdb_plugin_discuz_security_banip (
 `ip` char(15) NOT NULL DEFAULT '',
 `count` smallint(5) unsigned NOT NULL DEFAULT '0',
 `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`ip`)
) TYPE=InnoDB;
DROP TABLE IF EXISTS `cdb_plugin_discuz_security_forum`;
CREATE TABLE `cdb_plugin_discuz_security_forum` (
 `uid` mediumint(8) NOT NULL,
 `username` varchar(15) NOT NULL,
 `dateline` int(10) NOT NULL,
 `lastip` char(15) NOT NULL,
 KEY `id` (`uid`,`username`,`dateline`,`lastip`)
) ENGINE=InnoDB;
DROP TABLE IF EXISTS `cdb_plugin_discuz_security_manager_action`;
CREATE TABLE `cdb_plugin_discuz_security_manager_action` (
 `uid` mediumint(8) NOT NULL,
 `username` varchar(15) NOT NULL,
 `action` char(25) NOT NULL,
 `dateline` int(10) NOT NULL,
 `recdateline` int(10) NOT NULL,
 KEY `uid` (`uid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `cdb_plugin_discuz_security_adminlog`;
CREATE TABLE `cdb_plugin_discuz_security_adminlog` (
 `key` char(10) NOT NULL,
 `value` mediumint(8) unsigned NOT NULL DEFAULT '0',
 `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`key`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `cdb_plugin_discuz_security_cdd`;
CREATE TABLE `cdb_plugin_discuz_security_cdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `scaned` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

EOF;

runquery($sql);

$finish = TRUE;

?>
