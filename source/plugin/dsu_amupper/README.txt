#签到的表结构的具体字段的含义

CREATE TABLE `pre_plugin_dsuamupper` (
  `uid` int(10) unsigned NOT NULL, # 用户id
  `uname` char(15) NOT NULL,	#用户名
  `addup` int(10) unsigned NOT NULL, #累计签到次数
  `cons` int(10) unsigned NOT NULL, #连续签到的次数
  `lasttime` int(10) unsigned NOT NULL, #最后签到的时间戳
  `time` int(10) unsigned NOT NULL, #最后签到时间的年月日表示
  `allow` int(10) unsigned NOT NULL, #最后签到的发出的帖子id
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB;

#这是签到配置扩展表 配置特殊奖励等等
CREATE TABLE `pre_plugin_dsuamupperc` (
  `id` int(10) unsigned NOT NULL, #主键id
  `days` mediumint(8) unsigned NOT NULL,#连续签到多少天的话
  `usergid` smallint(6) unsigned NOT NULL,
  `extcredits` tinyint(3) unsigned NOT NULL,#奖励的字段
  `reward` mediumint(8) unsigned NOT NULL, #上面的条件都适合的话 奖励多少个
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;