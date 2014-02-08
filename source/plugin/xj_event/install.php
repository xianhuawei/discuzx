<?php
/**
 *	[超级活动(xj_event.install)] (C)2012-2099 Powered by 逍遥设计.
 *	Version: 1.0
 *	Date: 2012-10-21 20:13
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$plugin_xj_event = DB::table('xj_event');
$plugin_xj_eventapply = DB::table('xj_eventapply');
$plugin_xj_eventthread = DB::table('xj_eventthread');
$plugin_xj_event_member_info = DB::table('xj_event_member_info');
$plugin_xj_event_vote_log = DB::table('xj_event_vote_log');
$plugin_xj_eventpay_log = DB::table('xj_eventpay_log');



$sql = <<<EOF
CREATE TABLE IF NOT EXISTS $plugin_xj_event (
  `eid` mediumint(8) NOT NULL auto_increment,
  `tid` mediumint(8) NOT NULL,
  `postclass` tinyint(1) NOT NULL COMMENT '线上/线下',
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `endtime` int(10) NOT NULL COMMENT '结束时间',
  `offlineclass` smallint(2) NOT NULL COMMENT '线下活动类型',
  `onlineclass` smallint(2) NOT NULL COMMENT '线上活动类型',
  `citys` varchar(20) NOT NULL COMMENT '活动地区',
  `event_address` varchar(150) NOT NULL COMMENT '活动地点',
  `event_number` mediumint(6) NOT NULL,
  `event_number_man` mediumint(6) NOT NULL,
  `event_number_woman` mediumint(6) NOT NULL,
  `event_number_max` smallint(4) NOT NULL COMMENT '每ID最多报名人数',
  `use_extcredits_num` smallint(4) NOT NULL COMMENT '消耗积分数',
  `use_extcredits` tinyint(1) NOT NULL COMMENT '消耗积分类型',
  `use_cost` DECIMAL(9,2) NOT NULL COMMENT '每人费用',
  `activitybegin` int(10) NOT NULL COMMENT '报名开始时间',
  `activityexpiration` int(10) NOT NULL COMMENT '报名截止时间',
  `userfield` text NOT NULL COMMENT '报名填写项目',
  `activityaid` mediumint(8) NOT NULL,
  `activityaid_url` varchar(200) NOT NULL COMMENT '活动封面',
  `verify` tinyint(1) NOT NULL COMMENT '审核/认证',
  `setting` text NOT NULL,
  PRIMARY KEY  (`eid`),
  KEY `eid` (`eid`),
  KEY `tid` (`tid`),
  KEY `postclass` (`postclass`),
  KEY `offlineclass` (`offlineclass`,`onlineclass`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS $plugin_xj_eventapply (
  `applyid` mediumint(8) NOT NULL auto_increment,
  `eid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `applynumber` smallint(3) NOT NULL COMMENT '报名人数',
  `bmmessage` varchar(200) NOT NULL,
  `dateline` int(10) NOT NULL,
  `verify` tinyint(1) NOT NULL COMMENT '审核状态',
  `pay_state` smallint(1) NOT NULL,
  `pj` tinyint(1) NOT NULL COMMENT '评价',
  `ufielddata` text NOT NULL,
  PRIMARY KEY  (`applyid`),
  KEY `applyid` (`applyid`,`tid`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=22 ;

CREATE TABLE IF NOT EXISTS $plugin_xj_eventthread (
  `eid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `fid` mediumint(8) NOT NULL,
  `sort` smallint(1) NOT NULL COMMENT '类型',
  `coverurl` varchar(200) NOT NULL COMMENT '封面',
  `votes` mediumint(6) NOT NULL,
  KEY `eid` (`eid`,`tid`,`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

CREATE TABLE IF NOT EXISTS $plugin_xj_event_member_info (
  `uid` mediumint(8) NOT NULL,
  `good` mediumint(8) NOT NULL,
  `common` mediumint(8) NOT NULL,
  `bad` mediumint(8) NOT NULL,
  `plane` mediumint(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
CREATE TABLE IF NOT EXISTS $plugin_xj_event_vote_log (
  `vid` int(10) NOT NULL auto_increment,
  `eid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `ip` varchar(23) NOT NULL,
  `votetime` int(10) NOT NULL,
  PRIMARY KEY  (`vid`),
  KEY `eid` (`eid`),
  KEY `tid` (`tid`),
  KEY `uid` (`uid`),
  KEY `votetime` (`votetime`),
  KEY `vid` (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;
CREATE TABLE IF NOT EXISTS $plugin_xj_eventpay_log (
  `applyid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `tradeno` varchar(32) NOT NULL,
  `paytype` varchar(12) NOT NULL,
  `paystate` smallint(1) NOT NULL COMMENT '1等待买家支付2已付款3交易完成',
  `trade_status` varchar(50) NOT NULL COMMENT '支付平台的订单状态',
  `subject` varchar(100) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `buyer_email` varchar(60) NOT NULL COMMENT '买家支付宝帐号',
  `total_fee` decimal(9,2) NOT NULL COMMENT '交易总额',
  `create_time` int(10) NOT NULL,
  `pay_time` int(10) NOT NULL,
  `notify_time` int(10) NOT NULL,
  KEY `applyid` (`applyid`,`uid`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
EOF;

runquery($sql);

if($_G['charset']!='gbk'){
	rename('source/plugin/xj_event/event_thread.class.php', 'source/plugin/xj_event/event_thread.class_gbk.php');
	rename('source/plugin/xj_event/event_thread.class_utf8.php', 'source/plugin/xj_event/event_thread.class.php');
}

$finish = true;
?>