<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$sql = <<<EOF

CREATE TABLE IF NOT EXISTS `pre_vgallery_sort` (
  `sid` int(11) unsigned NOT NULL auto_increment,
  `sup` int(11) NOT NULL default '0',
  `band` int(11) NOT NULL default '0',
  `sort` varchar(12) NOT NULL,
  `scolor` mediumint(1) NOT NULL default '0',
  `dps` int(11) NOT NULL default '0',
  `indexcap` int(11) NOT NULL default '0',
  `available` mediumint(1) NOT NULL default '1',
  `sygroup` mediumtext NOT NULL,
  `regroup` mediumtext NOT NULL,
  `sortman` varchar(255) NOT NULL,
  `sortmoney` int(11) NOT NULL,
  `rewid` int(11) NOT NULL default '0',
  `rehei` int(11) NOT NULL default '0',
  `istv` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`sid`),
  KEY `dps` (`dps`),
  KEY `available` (`available`),
  KEY `band` (`band`),
  KEY `istv` (`istv`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallerys` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `fid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL,
  `sid2` int(11) NOT NULL default '0',
  `sid3` int(11) NOT NULL default '0',
  `sid4` int(11) NOT NULL default '0',
  `sidstr` mediumtext NOT NULL,
  `typeid` int(11) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `pid` int(18) NOT NULL default '0',
  `vprice` int(11) NOT NULL default '0',
  `album` mediumint(1) NOT NULL default '0',
  `sup` int(11) NOT NULL default '0',
  `vsum` int(11) NOT NULL default '0',
  `abtotal` int(11) NOT NULL default '0',
  `subid` int(11) NOT NULL default '0',
  `absubject` varchar(40) default NULL,
  `vsubject` varchar(250) NOT NULL,
  `vurl` varchar(250) NOT NULL,
  `tvurl` varchar(250) NOT NULL,
  `flashid` varchar(100) NOT NULL,
  `purl` varchar(250) NOT NULL,
  `address` int(11) NOT NULL default '0',
  `years` int(11) NOT NULL default '0',
  `language` int(11) NOT NULL default '0',
  `director` int(11) NOT NULL default '0',
  `actor` varchar(250) NOT NULL,
  `uid` int(15) NOT NULL,
  `dateline` int(16) NOT NULL,
  `timelong` int(12) NOT NULL,
  `views` int(12) NOT NULL,
  `polls` int(2) NOT NULL,
  `valuate` int(4) NOT NULL,
  `audit` int(1) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `replyuid` varchar(16) NOT NULL,
  `updateline` int(18) NOT NULL,
  `chk_up` int(11) NOT NULL default '0',
  `chk_down` int(11) NOT NULL default '0',
  `vinfo` mediumtext NOT NULL,
  `pgallery` mediumtext NOT NULL,
  `remote` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sid` (`sid`,`uid`,`dateline`,`views`,`polls`,`valuate`,`audit`),
  KEY `updateline` (`updateline`),
  KEY `replyuid` (`replyuid`),
  KEY `sid3` (`sid3`,`sid4`),
  KEY `fid` (`fid`),
  KEY `sid2` (`sid2`),
  KEY `address` (`address`,`years`,`language`,`director`),
  KEY `chk_up` (`chk_up`,`chk_down`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_actor` (
  `aid` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(1) NOT NULL,
  `alias` varchar(60) NOT NULL,
  `sex` mediumint(1) NOT NULL,
  `director` mediumint(1) NOT NULL default '0',
  `region` mediumint(1) NOT NULL,
  `pcode` varchar(30) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `ashot` int(11) NOT NULL default '0',
  PRIMARY KEY  (`aid`),
  KEY `pcode` (`pcode`),
  KEY `firstname` (`firstname`),
  KEY `director` (`director`),
  KEY `ashot` (`ashot`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_ad` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `styleid` mediumint(1) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `displayer` mediumint(1) NOT NULL default '1',
  `clicks` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `displayer` (`displayer`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `pre_vgallery_album` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `vid` int(12) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `spic` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL,
  `displayer` int(11) NOT NULL,
  `byorder` int(11) NOT NULL,
  `remote` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `vid` (`vid`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `pre_vgallery_evaluate` (
  `id` int(16) unsigned NOT NULL auto_increment,
  `vid` int(12) NOT NULL,
  `uid` int(16) NOT NULL,
  `dateline` int(16) NOT NULL,
  `types` varchar(10) NOT NULL,
  `chk_up` mediumint(1) NOT NULL default '0',
  `chk_down` mediumint(1) NOT NULL default '0',
  `polls` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`vid`,`uid`,`types`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_evaluate_tc` (
  `vid` int(12) NOT NULL,
  `evaluate_r` int(11) NOT NULL default '0',
  `evaluate_c` int(15) NOT NULL default '0',
  KEY `id` (`vid`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_favorites` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `vid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dateline` varchar(16) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_indexset` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `subject` varchar(100) NOT NULL,
  `styleid` int(11) NOT NULL,
  `typeid` mediumint(1) NOT NULL,
  `dsp` int(11) NOT NULL,
  `moremsg` mediumtext NOT NULL,
  `value` varchar(200) NOT NULL,
  `getsum` int(11) NOT NULL default '10',
  `getstyle` mediumint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `dsp` (`dsp`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_member` (
  `mid` int(11) NOT NULL,
  `shares` int(11) NOT NULL default '0',
  `ablists` int(11) NOT NULL default '0',
  `favsum` int(11) NOT NULL default '0',
  `hots` int(11) NOT NULL default '0',
  `pushup` int(11) NOT NULL default '0',
  `pushdown` int(11) NOT NULL default '0',
  `dateline` int(15) NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `shares` (`shares`,`hots`,`pushup`,`pushdown`),
  KEY `ablists` (`ablists`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_pay` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `uid` int(12) NOT NULL,
  `vid` int(12) NOT NULL,
  `author` int(12) NOT NULL,
  `money` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `dateline` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_paycount` (
  `vid` int(12) NOT NULL,
  `pnum` int(12) NOT NULL,
  `prices` int(12) NOT NULL,
  `lastday` int(15) NOT NULL default '0',
  PRIMARY KEY  (`vid`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_poll` (
  `id` int(16) unsigned NOT NULL auto_increment,
  `vid` int(12) NOT NULL,
  `uid` int(16) NOT NULL,
  `dateline` int(16) NOT NULL,
  `audit` mediumint(1) NOT NULL,
  `post` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`vid`,`uid`,`audit`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_report` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `vid` int(11) NOT NULL,
  `uid` mediumint(15) NOT NULL,
  `dateline` varchar(16) NOT NULL,
  `onsend` varchar(1) NOT NULL default '0',
  `message` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `vid` (`vid`,`uid`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_tags` (
  `tagid` smallint(6) NOT NULL default '0',
  `tagname` varchar(20) NOT NULL default '',
  `itemid` int(11) NOT NULL default '0',
  `idtype` varchar(255) NOT NULL default '',
  KEY `tagid` (`tagid`,`idtype`),
  KEY `idtype` (`idtype`,`itemid`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pre_vgallery_top5` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `vid` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `dateline` varchar(16) NOT NULL,
  `dps` int(11) NOT NULL,
  `picture` varchar(250) default NULL,
  `remote` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `vid` (`vid`,`dps`)
) ENGINE=InnoDB;

INSERT INTO `pre_vgallery_sort` (`sid`, `sup`, `band`, `sort`, `scolor`, `dps`, `indexcap`, `available`, `sygroup`, `regroup`, `sortman`, `sortmoney`, `rewid`, `rehei`, `istv`) VALUES
(1, 0, 0, '电影', 0, 1, 0, 1, '', '', '', 0, 116, 160, 1),
(2, 0, 0, '电视剧', 0, 2, 0, 1, '', '', '', 0, 116, 160, 1),
(3, 0, 0, '动漫', 0, 3, 0, 1, '', '', '', 0, 116, 160, 1),
(4, 0, 0, '综艺', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(5, 0, 0, 'MV', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(6, 0, 0, '体育', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(7, 0, 0, '汽车', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(8, 0, 0, '视频', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(10, 1, 0, '喜剧', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(11, 1, 0, '动作', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(12, 1, 0, '爱情', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(13, 1, 0, '科幻', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(14, 1, 0, '警匪', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(15, 1, 0, '犯罪', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(16, 1, 0, '惊悚', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(17, 1, 0, '恐怖', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(18, 1, 0, '悬疑', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(19, 1, 0, '武侠', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(20, 1, 0, '动画', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(21, 1, 0, '冒险', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(22, 1, 0, '奇幻', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(23, 1, 0, '神话', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(24, 1, 0, '都市', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(25, 1, 0, '剧情', 0, 16, 0, 1, '', '', '', 0, 0, 0, 0),
(26, 1, 0, '战争', 0, 17, 0, 1, '', '', '', 0, 0, 0, 0),
(27, 1, 0, '历史', 0, 18, 0, 1, '', '', '', 0, 0, 0, 0),
(28, 1, 0, '记录', 0, 19, 0, 1, '', '', '', 0, 0, 0, 0),
(29, 1, 0, '伦理', 0, 20, 0, 1, '', '', '', 0, 0, 0, 0),
(30, 1, 0, '其它', 0, 21, 0, 1, '', '', '', 0, 0, 0, 0),
(31, 2, 0, '商战', 0, 23, 0, 1, '', '', '', 0, 0, 0, 0),
(32, 2, 0, '励志', 0, 24, 0, 1, '', '', '', 0, 0, 0, 0),
(33, 2, 0, '搞笑', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(34, 2, 0, '偶像', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(35, 2, 0, '言情', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(36, 2, 0, '动作', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(37, 2, 0, '古装', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(38, 2, 0, '武侠', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(39, 2, 0, '神话', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(40, 2, 0, '警匪', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(41, 2, 0, '穿越', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(42, 2, 0, '动画', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(43, 2, 0, '冒险', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(44, 2, 0, '战争', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(45, 2, 0, '历史', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(46, 2, 0, '都市', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(47, 2, 0, '农村', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(48, 2, 0, '家庭', 0, 16, 0, 1, '', '', '', 0, 0, 0, 0),
(49, 2, 0, '情景', 0, 17, 0, 1, '', '', '', 0, 0, 0, 0),
(50, 2, 0, '军事', 0, 18, 0, 1, '', '', '', 0, 0, 0, 0),
(51, 2, 0, '剧情', 0, 19, 0, 1, '', '', '', 0, 0, 0, 0),
(52, 2, 0, '悬疑', 0, 20, 0, 1, '', '', '', 0, 0, 0, 0),
(53, 2, 0, '谍战', 0, 21, 0, 1, '', '', '', 0, 0, 0, 0),
(54, 2, 0, '宫廷', 0, 22, 0, 1, '', '', '', 0, 0, 0, 0),
(55, 3, 0, '神话', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(56, 3, 0, '热血', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(57, 3, 0, '机战', 0, 16, 0, 1, '', '', '', 0, 0, 0, 0),
(58, 3, 0, '励志', 0, 17, 0, 1, '', '', '', 0, 0, 0, 0),
(59, 3, 0, '悬疑', 0, 18, 0, 1, '', '', '', 0, 0, 0, 0),
(60, 3, 0, '搞笑', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(61, 3, 0, '美少女', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(62, 3, 0, '格斗', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(63, 3, 0, '经典', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(64, 3, 0, '魔幻', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(65, 3, 0, '推理', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(66, 3, 0, '竞技', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(67, 3, 0, '益智', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(68, 3, 0, '剧情', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(69, 3, 0, '校园', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(70, 3, 0, '亲子', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(71, 3, 0, '童话', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(72, 3, 0, '冒险', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(73, 4, 0, '搞笑', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(74, 4, 0, '脱口秀', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(75, 4, 0, '选秀', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(76, 4, 0, '真人秀', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(77, 4, 0, '游戏', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(78, 4, 0, '访谈', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(79, 4, 0, '纪实', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(80, 4, 0, '少儿', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(81, 4, 0, '时尚', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(82, 4, 0, '晚会', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(83, 4, 0, '理财', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(84, 4, 0, '演唱会', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(85, 4, 0, '曲艺', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(86, 4, 0, '益智', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(87, 4, 0, '音乐', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(88, 4, 0, '杂技', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(89, 4, 0, '法治', 0, 0, 0, 1, '', '', '', 0, 0, 0, 0),
(90, 5, 0, '流行', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(91, 5, 0, '摇滚', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(92, 5, 0, '舞曲', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(93, 5, 0, '电子', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(94, 5, 0, 'R-and-B', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(95, 5, 0, '乡村', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(96, 5, 0, '民族', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(97, 5, 0, '民谣', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(98, 5, 0, '戏曲', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(99, 5, 0, '单曲', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(100, 5, 0, '经典', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(101, 5, 0, '伤感', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(102, 5, 0, '少儿', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(103, 5, 0, '古典', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(104, 5, 0, '翻唱', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(105, 6, 0, '足球', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(106, 6, 0, '篮球', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(107, 6, 0, '聚焦', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(108, 6, 0, '户外', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(109, 6, 0, 'WWE', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(110, 6, 0, 'NBA', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(111, 6, 0, 'CBA', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(112, 6, 0, '田径', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(113, 6, 0, '跑酷', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(114, 6, 0, '格斗', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(115, 6, 0, '意甲', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(116, 6, 0, '英超', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(117, 6, 0, '西甲', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(118, 6, 0, '中超', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(119, 6, 0, '世界杯', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(120, 6, 0, '奥运会', 0, 16, 0, 1, '', '', '', 0, 0, 0, 0),
(121, 6, 0, '体育牛人', 0, 17, 0, 1, '', '', '', 0, 0, 0, 0),
(122, 6, 0, '体坛奇趣', 0, 18, 0, 1, '', '', '', 0, 0, 0, 0),
(123, 6, 0, '大话体育', 0, 19, 0, 1, '', '', '', 0, 0, 0, 0),
(124, 7, 0, '事故', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(125, 7, 0, '车模', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(126, 7, 0, '车展', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(127, 7, 0, '新车', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(128, 7, 0, '试驾', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(129, 7, 0, '花边', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(130, 7, 0, '改装', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(131, 7, 0, '二手', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(132, 7, 0, '学车', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(133, 7, 0, '广告', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(134, 8, 0, '搞笑', 0, 1, 0, 1, '', '', '', 0, 0, 0, 0),
(135, 8, 0, '原创', 0, 2, 0, 1, '', '', '', 0, 0, 0, 0),
(136, 8, 0, '恶搞', 0, 3, 0, 1, '', '', '', 0, 0, 0, 0),
(137, 8, 0, '热点', 0, 4, 0, 1, '', '', '', 0, 0, 0, 0),
(138, 8, 0, '猎奇', 0, 5, 0, 1, '', '', '', 0, 0, 0, 0),
(139, 8, 0, '揭秘', 0, 6, 0, 1, '', '', '', 0, 0, 0, 0),
(140, 8, 0, '美女', 0, 7, 0, 1, '', '', '', 0, 0, 0, 0),
(141, 8, 0, '明星', 0, 8, 0, 1, '', '', '', 0, 0, 0, 0),
(142, 8, 0, '八卦', 0, 9, 0, 1, '', '', '', 0, 0, 0, 0),
(143, 8, 0, '宠物', 0, 10, 0, 1, '', '', '', 0, 0, 0, 0),
(144, 8, 0, '生活', 0, 11, 0, 1, '', '', '', 0, 0, 0, 0),
(145, 8, 0, '相声', 0, 12, 0, 1, '', '', '', 0, 0, 0, 0),
(146, 8, 0, '单口', 0, 13, 0, 1, '', '', '', 0, 0, 0, 0),
(147, 8, 0, '小品', 0, 14, 0, 1, '', '', '', 0, 0, 0, 0),
(148, 8, 0, '游戏', 0, 15, 0, 1, '', '', '', 0, 0, 0, 0),
(149, 8, 0, '财经', 0, 16, 0, 1, '', '', '', 0, 0, 0, 0),
(150, 8, 0, '女性', 0, 17, 0, 1, '', '', '', 0, 0, 0, 0),
(151, 8, 0, '教育', 0, 18, 0, 1, '', '', '', 0, 0, 0, 0),
(152, 8, 0, '法治', 0, 19, 0, 1, '', '', '', 0, 0, 0, 0),
(153, 8, 0, '旅游', 0, 20, 0, 1, '', '', '', 0, 0, 0, 0),
(154, 8, 0, '动画', 0, 21, 0, 1, '', '', '', 0, 0, 0, 0),
(155, 8, 0, '教程', 0, 22, 0, 1, '', '', '', 0, 0, 0, 0),
(156, 8, 0, '其它', 0, 23, 0, 1, '', '', '', 0, 0, 0, 0);

EOF;

DB::query("ALTER TABLE ".DB::table('common_tag')." ADD ashot int (11) NOT NULL DEFAULT '0' AFTER status");

runquery($sql);
$finish = TRUE;
?>