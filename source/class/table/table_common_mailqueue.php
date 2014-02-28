<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_mailqueue.php 27806 2012-02-15 03:20:46Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_mailqueue extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_mailqueue';
		$this->_pk    = 'qid';

		parent::__construct();
	}

	/**
	 * 通过cid获取邮件队列列表
	 * @param int|array $cids
	 * @return array 
	 */
	public function fetch_all_by_cid($cids) {
		if(empty($cids)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('cid', $cids), array($this->_table));
	}

	/**
	 * 通过cid删除邮件队列列表
	 * @param int|array $cids
	 * @return bool 
	 */
	public function delete_by_cid($cids) {
		if(empty($cids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('cid', $cids), array($this->_table));
	}
}

?>