<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS pre_plugin_luckypacket;
CREATE TABLE pre_plugin_luckypacket (
  `packetid` int(10) unsigned NOT NULL auto_increment,
  `pname` varchar(20) NOT NULL default '',
  `pspecial` tinyint(3) NOT NULL default '0',
  `description` varchar(255) NOT NULL default '',
  `starttimefrom` int(10) unsigned NOT NULL default '0',
  `starttimeto` int(10) unsigned NOT NULL default '0',
  `settings` text NOT NULL,
  `usergroups` text NOT NULL,
  `displayorder` tinyint(3) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `inum` int(10) unsigned NOT NULL default '0',
  `tnum` int(10) unsigned NOT NULL default '0',
  `originatorid` mediumint(8) unsigned NOT NULL default '0',
  `lastedit` mediumint(8) unsigned NOT NULL default '0',
  `ispass` tinyint(1) NOT NULL default '0',
  `created` int(10) unsigned NOT NULL default '0',
  `updated` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY (`packetid`)
) TYPE=InnoDB;

DROP TABLE IF EXISTS pre_plugin_luckypacketlog;
CREATE TABLE pre_plugin_luckypacketlog (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `packetid` int(10) unsigned NOT NULL default '0',
  `issuetype` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `opip` char(15) NOT NULL default '',
  `extcredit` tinyint(1) unsigned NOT NULL default '0',
  `creditnum` int(10) NOT NULL default '0',
  KEY `uid` (`uid`),
  KEY `packetid` (`packetid`),
  KEY `dateline` (`dateline`)
) TYPE=InnoDB;

INSERT INTO pre_plugin_luckypacket (pname, pspecial, description, starttimefrom, starttimeto, settings, usergroups, displayorder, status, inum, tnum, originatorid, ispass, created) values ('{$installlang['daliy_packet']}', 1, '{$installlang['daliy_packet_sum']}', 0, 0, 'a:12:{s:11:"issuecredit";s:1:"1";s:9:"issuetype";s:1:"2";s:10:"certainnum";i:0;s:12:"packetminnum";s:1:"1";s:12:"packetmaxnum";s:2:"10";s:6:"num_pp";s:1:"1";s:9:"total_num";s:3:"100";s:15:"modnum_multiply";s:1:"1";s:6:"gender";s:1:"0";s:7:"reg_day";s:1:"0";s:7:"postnum";s:1:"0";s:6:"credit";s:1:"0";}', 'a:1:{i:0;i:0;}', 0, 1, 0, 0, 1, 1, '{$_G['timestamp']}');


EOF;
//ALTER TABLE  `pre_plugin_luckypacket` CHANGE  `isopen`  `status` TINYINT( 1 ) NOT NULL DEFAULT  '0'
runquery($sql);
$finish = TRUE;

?>