<?php
/**
 *	[超级活动(xj_event.upgrade)] (C)2012-2099 Powered by 逍遥设计.
 *	Version: 1.1
 *	Date: 2012-11-5 08:25
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$plugin_xj_event = DB::table('xj_event');
$plugin_xj_eventthread = DB::table('xj_eventthread');
$plugin_xj_eventapply = DB::table('xj_eventapply');
$plugin_xj_eventpay_log = DB::table('xj_eventpay_log');


if($_GET['fromversion']=='1.1' or $_GET['fromversion']=='1.2' or $_GET['fromversion']=='1.3'){
$sql = <<<EOF
ALTER TABLE $plugin_xj_eventthread ADD `sort` SMALLINT(1) NOT NULL;
EOF;
runquery($sql);
}


if($_GET['fromversion']<'1.4'){
$sql = <<<EOF
ALTER TABLE $plugin_xj_eventapply ADD `ufielddata` TEXT NOT NULL;
EOF;
runquery($sql);

	$query = DB::query("SELECT * FROM ".DB::table('xj_eventapply')." WHERE ufielddata =''");
	while($value = DB::fetch($query)){
		$ufielddata = array();
		$ufielddata['realname'] = $value['realname'];
		$ufielddata['mobile'] = $value['mobile'];
		$ufielddata['qq'] = $value['qq'];
		$ufielddata = serialize($ufielddata);
		DB::query("UPDATE ".DB::table('xj_eventapply')." SET ufielddata = '$ufielddata' WHERE applyid = ".$value['applyid']);
	}
	

}

if($_GET['fromversion']<'1.8'){
$sql = <<<EOF
ALTER TABLE $plugin_xj_event ADD `activitybegin` int(10) NOT NULL;
EOF;
runquery($sql);
$query = DB::query("SELECT * FROM ".DB::table('xj_event'));
while($value = DB::fetch($query)){
	$setting = unserialize($value['setting']);
	if(!$setting['eventzy_enable']){
		$setting['eventzy_enable']=1;
		$setting['eventzy_name']=lang('plugin/xj_event', 'zuoye');
		$setting['eventzy_fid']=0;
		$settingstr = serialize($setting);
		DB::query("UPDATE ".DB::table('xj_event')." SET setting = '$settingstr' WHERE eid = ".$value['eid']);
	}
}
}
if($_GET['fromversion']<'2.0'){
$sql = <<<EOF
ALTER TABLE $plugin_xj_event CHANGE `use_cost` `use_cost` DECIMAL( 9, 2 ) NOT NULL;
ALTER TABLE $plugin_xj_eventapply ADD `pay_state` smallint(1) NOT NULL;

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
}



if($_G['charset']!='gbk'){
	rename('source/plugin/xj_event/event_thread.class.php', 'source/plugin/xj_event/event_thread.class_gbk.php');
	rename('source/plugin/xj_event/event_thread.class_utf8.php', 'source/plugin/xj_event/event_thread.class.php');
}




cpmsg('founder_upgrade_complete', 'action=plugins', 'succeed');
/*
if($_GET['fromversion']=='1.1' or $_GET['fromversion']=='1.2' or $_GET['fromversion']=='1.3'){
	$sql = <<<EOF
	ALTER TABLE $plugin_xj_eventthread ADD `sort` SMALLINT(1) NOT NULL;
	EOF;
	runquery($sql);
}
if($_GET['fromversion']=='1.1' or $_GET['fromversion']=='1.2' or $_GET['fromversion']=='1.3' or $_GET['fromversion']==1.34){
	$sql = <<<EOF
	ALTER TABLE $plugin_xj_eventapply ADD `ufielddata` TEXT NOT NULL 
	EOF;
	runquery($sql);
	
	$query = DB::query("SELECT * FROM ".DB::table('xj_eventapply')." WHERE ufielddata =''");
	while($value = DB::fetch($query)){
		$ufielddata = array();
		$ufielddata['realname'] = $value['realname'];
		$ufielddata['mobile'] = $value['mobile'];
		$ufielddata['qq'] = $value['qq'];
		$ufielddata = serialize($ufielddata);
		DB::query("UPDATE ".DB::table('xj_eventapply')." SET ufielddata = '$ufielddata' WHERE applyid = ".$value['applyid']);
	}
	cpmsg('tasks_installed', 'action=tasks&operation=type', 'succeed');
}
*/


?>