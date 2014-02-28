<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_memberrecommend.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_memberrecommend extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_memberrecommend';
		$this->_pk    = 'id';

		parent::__construct();
	}
	
	/**
	 * 
	 * 根据推荐者Uid、Tid获取单条记录
	 * @param int $uid:用户UID
	 * @param int $tid:主题ID
	 * @return 返回一条推荐记录
	 */
	public function fetch_by_recommenduid_tid($uid, $tid) {
		return DB::fetch_first('SELECT * FROM %t WHERE recommenduid=%d AND tid=%d', array($this->_table, $uid, $tid));
	}

	public function count_by_recommenduid_dateline($uid, $dateline) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE recommenduid=%d AND dateline>%d',array($this->_table, $uid, $dateline));
	}

}

?>