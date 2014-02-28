<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_mailcron.php 27806 2012-02-15 03:20:46Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_mailcron extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_mailcron';
		$this->_pk    = 'cid';

		parent::__construct();
	}

	/**
	 * 通过touid删除邮件队列，同时会删除common_mailqueue表数据
	 * @param int|array $touids
	 * @return bool 
	 */
	public function delete_by_touid($touids) {
		if(empty($touids)) {
			return false;
		}
		return DB::query('DELETE FROM mc, mq USING %t AS mc, %t AS mq WHERE mc.'.DB::field('touid', $touids).' AND mc.cid=mq.cid',
				array($this->_table, 'common_mailqueue'), false, true);
	}

	/**
	 * 通过email获取计划邮件列表
	 * @param string $email
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条数据
	 * @return array 
	 */
	public function fetch_all_by_email($email, $start, $limit) {
		return DB::fetch_all('SELECT * FROM %t WHERE email=%s '.DB::limit($start, $limit), array($this->_table, $email));
	}

	/**
	 * 通过touid获取计划邮件列表
	 * @param int $touid
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条数据
	 * @return array 
	 */
	public function fetch_all_by_touid($touid, $start, $limit) {
		return DB::fetch_all('SELECT * FROM %t WHERE touid=%d '.DB::limit($start, $limit), array($this->_table, $touid));
	}

	/**
	 * 通过sendtime获取计划邮件列表
	 * @param int $sendtime
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条数据
	 * @return array 
	 */
	public function fetch_all_by_sendtime($sendtime, $start, $limit) {
		return DB::fetch_all('SELECT * FROM %t WHERE sendtime<=%d ORDER BY sendtime '.DB::limit($start, $limit), array($this->_table, $sendtime));
	}
}

?>