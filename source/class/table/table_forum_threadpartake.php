<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_threadpartake.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_threadpartake extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_threadpartake';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 * 根据参与时间删除主题参与者的记录
	 * @param int $dateline
	 * @return bool 
	 */
	public function delete($dateline) {
		return DB::query('DELETE FROM %t WHERE dateline<%d', array($this->_table, $dateline), false, true);
	}

	/**
	 * 根据主键查询主题参与者记录
	 * @param int $tid 参与主题id
	 * @param int $uid 参与人id
	 * @return array 
	 */
	public function fetch($tid, $uid) {
		return DB::fetch_first('SELECT * FROM %t WHERE tid=%d AND uid=%d', array($this->_table, $tid, $uid));
	}

}

?>