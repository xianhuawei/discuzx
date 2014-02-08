<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install.php 199 2013-05-29 02:46:11Z lucashen $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = '';

$sql .= <<<EOF

CREATE TABLE IF NOT EXISTS `cdb_plugin_discuz_security_adminlog` (
 `key` char(10) NOT NULL,
 `value` mediumint(8) unsigned NOT NULL DEFAULT '0',
 `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`key`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `cdb_plugin_discuz_security_cdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `scaned` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

EOF;

runquery($sql);

$finish = true;

