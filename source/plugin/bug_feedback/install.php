<?php
/**
 *	[Bug反馈(bug_feedback.install)] (C)2015-2099 Powered by xianhuawei.
 *	Version: 1.0
 *	Date: 2015-1-13 16:13
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_common_category` (                                                            
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '分类表id',                               
  `parentid` bigint(20) NOT NULL DEFAULT '0' COMMENT 'parentid',                               
  `type` varchar(32) NOT NULL COMMENT '业务类型，目前只有反馈分类[FB_CATEGORY]',  
  `name` varchar(20) NOT NULL COMMENT '分类名称',                                          
  `isleaf` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否叶子节点，0不是，1是',      
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '显示顺序，默认倒序',                   
  `pm_name` varchar(50) NOT NULL DEFAULT '',                                                   
  `pm_userid` bigint(20) NOT NULL DEFAULT '0' COMMENT '产品经理userid',                    
  `pm_emaillist` varchar(128) NOT NULL DEFAULT '' COMMENT '允许多个，以逗号分隔',    
  PRIMARY KEY (`id`),                                                                          
  KEY `IDX_PARENTID` (`parentid`),                                                             
  KEY `IDX_ISLEAF` (`isleaf`)                                                                  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4         

CREATE TABLE IF NOT EXISTS `pre_common_basedata` (                         
  `id` bigint(20) NOT NULL AUTO_INCREMENT,                  
  `type` varchar(32) NOT NULL,                              
  `code` varchar(32) NOT NULL,                              
  `value` varchar(32) NOT NULL,                             
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '倒序排',  
  PRIMARY KEY (`id`),                                       
  UNIQUE KEY `IDX_UNIQUE_TYPE_CODE` (`type`,`code`),        
  UNIQUE KEY `UDX_TYPE_CODE` (`type`,`code`),               
  KEY `IDX_TYPE` (`type`)                                   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4                               

CREATE TABLE `pre_feedback_bug` (                                                            
	`tid` bigint(20) NOT NULL COMMENT '主题id',                                             
	`feedback_status` smallint(6) NOT NULL COMMENT 'bug状态',                               
	`model` varchar(32) NOT NULL,                                                             
	`rom_version` smallint(6) NOT NULL COMMENT 'Rom版本（1稳定版，2测试版）',      
	`product_version` varchar(32) NOT NULL COMMENT '版本号',                                 
	`contact` varchar(15) NOT NULL COMMENT '联系方式',                                    
	`probability` smallint(6) NOT NULL COMMENT '复现概率(10，30，50，100)',            
	`description` varchar(1000) NOT NULL DEFAULT '' COMMENT '问题描述',                   
	`steps` varchar(700) NOT NULL DEFAULT '' COMMENT '复现步骤',                          
	`snapshot` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Bug截图,0无附件 1普通附件',  
	`logurl` varchar(256) NOT NULL DEFAULT '',                                                
	`support` smallint(6) NOT NULL DEFAULT '0' COMMENT '支持人数',                        
	PRIMARY KEY (`tid`),                                                                      
	KEY `IDX_STATUS` (`tid`,`feedback_status`,`rom_version`,`product_version`,`model`)          
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4                                             

CREATE TABLE IF NOT EXISTS `pre_feedback_status` (                               
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '表id',        
  `parentid` bigint(20) NOT NULL COMMENT '上级id',              
  `name` varchar(32) NOT NULL COMMENT '名称',                   
  `value` varchar(32) NOT NULL COMMENT 'value值',                
  `stamp` varchar(32) NOT NULL COMMENT '图章对应的code值',       
  `sort` int(10) NOT NULL COMMENT '排序',                       
  `color` varchar(32) NOT NULL COMMENT '标题颜色值',         
  `icoclass` varchar(50) NOT NULL COMMENT '图标class值',       
  PRIMARY KEY (`id`),                                             
  KEY `IDX_FID` (`fid`,`value`)                                   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  

insert  into `pre_common_basedata`(`id`,`type`,`code`,`value`,`sort`) values (10,'PROBABILITY_DATA','10','10',10),(11,'PROBABILITY_DATA','20','20',9),(12,'PROBABILITY_DATA','30','30',8),(13,'PROBABILITY_DATA','40','40',7),(14,'PROBABILITY_DATA','50','50',6),(15,'PROBABILITY_DATA','60','60',5),(16,'PROBABILITY_DATA','70','70',4),(17,'PROBABILITY_DATA','80','80',3),(18,'PROBABILITY_DATA','90','90',2),(19,'PROBABILITY_DATA','100','100',1),(20,'VERSION_DATA','4.0.2A','4.0.2A',6),(21,'VERSION_DATA','4.0.1A','4.0.1A',3),(22,'VERSION_DATA','4.0.1U','4.0.1U',2),(23,'VERSION_DATA','4.0.2U','4.0.2U',5),(24,'VERSION_DATA','4.0.2C','4.0.2C',4),(25,'VERSION_DATA','4.0.1C','4.0.1C',1),(26,'MODEL_DATA','Meizu_MX3','魅族MX3',6),(27,'MODEL_DATA','Meizu_MX2','魅族MX2',5),(28,'MODEL_DATA','Meizu_MX4','魅族MX4',7),(29,'MODEL_DATA','LG_G2','LG G2',4),(30,'MODEL_DATA','SONY_L36h','SONY L36h',3),(31,'MODEL_DATA','Galaxy_S4','Galaxy S4',2),(32,'MODEL_DATA','Nexus_5','Nexus 5',1),(33,'VERSION_DATA','4.0.4A','4.0.4A',13),(34,'VERSION_DATA','4.0.4C','4.0.4C',12),(35,'VERSION_DATA','4.0.4U','4.0.4U',11),(36,'VERSION_DATA','4.0.3A','4.0.3A',10),(37,'VERSION_DATA','4.0.3U','4.0.3U',9),(38,'VERSION_DATA','4.0.3C','4.0.3C',8),(39,'VERSION_DATA','4.0.3Y','4.0.3Y',7),(40,'MODEL_DATA','Meizu_MX4 Pro','魅族MX4 Pro',8);

insert  into `pre_common_category`(`id`,`parentid`,`type`,`name`,`isleaf`,`sort`,`pm_name`,`pm_userid`,`pm_emaillist`) values (1,0,'FB_CATEGORY','通讯',0,10,'',0,''),(2,1,'FB_CATEGORY','通话',1,33,'',0,''),(3,1,'FB_CATEGORY','联系人',1,32,'',0,''),(4,1,'FB_CATEGORY','短信',1,31,'',0,''),(5,0,'FB_CATEGORY','桌面',0,37,'',0,''),(6,5,'FB_CATEGORY','桌面',1,29,'',0,''),(7,5,'FB_CATEGORY','锁屏',1,28,'',0,''),(8,5,'FB_CATEGORY','状态栏',1,27,'',0,''),(9,0,'FB_CATEGORY','多媒体',0,34,'',0,''),(10,9,'FB_CATEGORY','音乐',1,25,'',0,''),(11,9,'FB_CATEGORY','视频',1,24,'',0,''),(12,9,'FB_CATEGORY','阅读',1,23,'',0,''),(13,0,'FB_CATEGORY','相机图库',0,22,'',0,''),(14,13,'FB_CATEGORY','相机',1,21,'',0,''),(15,13,'FB_CATEGORY','图库',1,20,'',0,''),(16,0,'FB_CATEGORY','系统应用',0,19,'',0,''),(17,16,'FB_CATEGORY','浏览器',1,18,'',0,''),(18,16,'FB_CATEGORY','应用商店',1,17,'',0,''),(19,16,'FB_CATEGORY','文件管理',1,16,'',0,''),(20,16,'FB_CATEGORY','电子邮件',1,15,'',0,''),(21,16,'FB_CATEGORY','日历',1,14,'',0,''),(22,16,'FB_CATEGORY','游戏中心',1,13,'',0,''),(23,16,'FB_CATEGORY','输入法',1,12,'',0,''),(24,16,'FB_CATEGORY','下载管理',1,11,'',0,''),(25,16,'FB_CATEGORY','NFC',1,10,'',0,''),(26,0,'FB_CATEGORY','小工具',0,36,'',0,''),(27,26,'FB_CATEGORY','时钟',1,8,'',0,''),(28,26,'FB_CATEGORY','语言助手',1,7,'',0,''),(29,26,'FB_CATEGORY','录音机',1,6,'',0,''),(30,26,'FB_CATEGORY','便签',1,5,'',0,''),(31,26,'FB_CATEGORY','计算器',1,4,'',0,''),(35,0,'FB_CATEGORY','云服务',1,35,'',0,'');


insert  into `pre_feedback_status`(`id`,`parentid`,`name`,`value`,`stamp`,`fid`,`sort`,`color`,`icoclass`) values (1,0,'待处理','20','待处理',7,'#1C7BF0','buglist_classify_pending'),(2,0,'处理中','31','处理中',6,'','buglist_classify_handled'),(3,2,'处理中','50','处理中',5,'#F59812',''),(5,2,'待补充','70','待补充',3,'#8F2A90',''),(6,2,'已收录','80','已收录',2,'#996600',''),(7,0,'已处理','41','已处理',1,'#28C3BE','buglist_classify_solved'),(8,0,'待处理','60','待处理',9,'#1C7BF0','buglist_classify_pending'),(9,0,'处理中','90','处理中',8,'#F59812','buglist_classify_handled'),(10,9,'采纳建议','20','采纳建议',7,'#F44A07',''),(13,9,'评估中','40','评估中',4,'#1C7BF0',''),(14,0,'已处理','70','已处理',3,'','buglist_classify_solved'),(15,14,'已有功能','80','已有功能',2,'#996600',''),(16,14,'已实现','50','已实现',3,'#28C3BE',''),(17,7,'确认解决','40','确认解决',2,'#28C3BE',''),(18,7,'已解答','60','已解答',1,'#EE1B2E',''),(19,14,'已解答','100','已解答',1,'#EE1B2E',''),(20,14,'暂不考虑','30','暂不考虑',4,'#F59812','');
EOF;

runquery($sql);
$finish = true;
?>