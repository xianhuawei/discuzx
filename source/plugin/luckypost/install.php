<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

CREATE TABLE IF NOT EXISTS pre_common_plugin_luckypost (
  `lid` int(10) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `anonymous` tinyint(1) NOT NULL default '0',
  `tid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `extcredit` tinyint(1) NOT NULL default '0',
  `credits` int(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `eventid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lid`),
  KEY `pid` (`tid`, `pid`),
  KEY uid (uid)
) TYPE=MyISAM;

CREATE TABLE IF NOT EXISTS pre_common_plugin_luckypostlog (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `goodtimes` int(10) unsigned NOT NULL,
  `badtimes` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`)
) TYPE=MyISAM;


CREATE TABLE IF NOT EXISTS pre_common_plugin_luckypost_collection (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `groups` text NOT NULL,
  `character` text NOT NULL,
  `totalnum` int(10) unsigned NOT NULL DEFAULT '0',
  `completenum` int(10) unsigned NOT NULL DEFAULT '0',
  `numpremember` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `close` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) TYPE=MyISAM;

CREATE TABLE IF NOT EXISTS pre_common_plugin_luckypost_collectionlog (
  `cid` int(10) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `collection` text NOT NULL,
  `status` smallint(6) unsigned NOT NULL DEFAULT '0',
  `completenum` int(10) unsigned NOT NULL,
  KEY uid (`cid`, `uid`)
) TYPE=MyISAM;

EOF;

runquery($sql);
if(!is_file(DISCUZ_ROOT.'./data/attachment/common/luckpost.png')) {
	copy('./source/plugin/luckypost/template/luckpost.png', DISCUZ_ROOT.'./data/attachment/common/luckpost.png');
}
$finish = TRUE;

