<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS pre_plugin_dsuamupper;
CREATE TABLE  pre_plugin_dsuamupper (
`uid` int UNSIGNED NOT NULL ,
`uname` CHAR( 15 ) NOT NULL ,
`addup` INT UNSIGNED NOT NULL ,
`cons` INT UNSIGNED NOT NULL ,
`lasttime` INT( 10 ) UNSIGNED NOT NULL ,
`time` INT( 10 ) UNSIGNED NOT NULL ,
`allow` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`uid`)
) ENGINE=INNODB;

DROP TABLE IF EXISTS pre_plugin_dsuamupperc;
CREATE TABLE  pre_plugin_dsuamupperc (
`id` INT UNSIGNED NOT NULL ,
`days` MEDIUMINT( 8 ) UNSIGNED NOT NULL ,
`usergid` SMALLINT( 6 ) UNSIGNED NOT NULL ,
`extcredits` TINYINT( 3 ) UNSIGNED NOT NULL ,
`reward` MEDIUMINT( 8 ) UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=INNODB;

EOF;

if(file_exists(DISCUZ_ROOT.'./data/plugindata/dsu_amupper.lang.php')) {	
	unlink(DISCUZ_ROOT.'./data/plugindata/dsu_amupper.lang.php');
} 


$amuppertable = DB::table('plugin_dsuamupper');

$query = DB::query("SHOW TABLES LIKE '$amuppertable'");
runquery($sql);


$finish = TRUE;
?>