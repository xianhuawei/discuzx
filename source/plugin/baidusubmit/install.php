<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS cdb_plugin_baidusubmit_setting;
CREATE TABLE cdb_plugin_baidusubmit_setting (
    `skey` varchar(255) NOT NULL DEFAULT '',
    `svalue` text NOT NULL,
    `stime` int(10) NOT NULL,
    PRIMARY KEY (`skey`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS cdb_plugin_baidusubmit_sitemap;
CREATE TABLE cdb_plugin_baidusubmit_sitemap (
    `sid` int NOT NULL AUTO_INCREMENT,
    `url` varchar(255) NOT NULL DEFAULT '',
    `type` tinyint NOT NULL,
    `create_time` int(10) NOT NULL DEFAULT 0,
    `start` int DEFAULT 0,
    `end` int DEFAULT 0,
    `item_count` int UNSIGNED DEFAULT 0,
    `file_size` int UNSIGNED DEFAULT 0,
    `lost_time` int UNSIGNED DEFAULT 0,
    PRIMARY KEY (`sid`),
    KEY (`start`),
    KEY (`end`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS cdb_plugin_baidusubmit_urlstat;
CREATE TABLE cdb_plugin_baidusubmit_urlstat (
    `id` int NOT NULL AUTO_INCREMENT,
    `ctime` int(10) NOT NULL DEFAULT 0,
    `urlnum` int(10) NOT NULL DEFAULT 0,
    `urlcount` bigint NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`ctime`)
) ENGINE=InnoDB;
EOF;

runquery($sql);

C::t('#baidusubmit#baidusubmit_setting')->update('sendtimeout', 0);
C::t('#baidusubmit#baidusubmit_setting')->update('senderror', 0);
C::t('#baidusubmit#baidusubmit_setting')->update('pinglog', 1);
C::t('#baidusubmit#baidusubmit_setting')->update('pinglogdir', '');
C::t('#baidusubmit#baidusubmit_setting')->update('sppasswd', '');
C::t('#baidusubmit#baidusubmit_setting')->update('lastcrawl', '');

$finish = TRUE;