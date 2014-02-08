<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS pre_common_plugin_luckypost_collection (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `groups` text NOT NULL,
  `character` text NOT NULL,
  `totalnum` int(10) unsigned NOT NULL DEFAULT '0',
  `completenum` int(10) unsigned NOT NULL DEFAULT '0',
  `numpremember` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `close` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY cid (`cid`)
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

$columnexisted = false;

$query = DB::query("SHOW COLUMNS FROM ".DB::table('common_plugin_luckypost'));
while($temp = DB::fetch($query)) {
	if($temp['Field'] == 'anonymous') {
		$columnexisted = true;
		break;
	}
}
$sql .= !$columnexisted ? "ALTER TABLE ".DB::table('common_plugin_luckypost')." ADD COLUMN `anonymous` tinyint(1) NOT NULL default '0';\n" : '';

$createtable = DB::fetch_first('SHOW CREATE TABLE '.DB::table('common_plugin_luckypost'));
$oldcolumns = C::t('#luckypost#common_plugin_luckypost')->getcolumn($createtable['Create Table']);

if (!$oldcolumns['KEY']['pid']) {
	$sql .= "ALTER TABLE pre_common_plugin_luckypost ADD INDEX `pid` (`tid`, `pid`);\n";
}

if (!$oldcolumns['KEY']['uid']) {
	$sql .= "ALTER TABLE pre_common_plugin_luckypost ADD INDEX `uid` (`uid`);\n";
}

if($sql) {
	runquery($sql);
}
if(!is_file(DISCUZ_ROOT.'./data/attachment/common/luckpost.png')) {
	copy('./source/plugin/luckypost/template/luckpost.png', DISCUZ_ROOT.'./data/attachment/common/luckpost.png');
}
$finish = true;