<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_warning.php 27800 2012-02-15 02:13:57Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_warning extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_warning';
		$this->_pk    = 'wid';

		parent::__construct();
	}

	/**
	 * 获取指定用户警告帖子数,为空时获取警告帖子总数
	 * @param string|array $authors
	 * @return int 
	 */
	public function count_by_author($authors = null) {
		return DB::result_first('SELECT COUNT(*) FROM %t '.($authors ? 'WHERE '.DB::field('author', $authors) : ''), array($this->_table));
	}

	/**
	 * 获取指定用户大于某时间的警告帖子数
	 * @param int $authorid
	 * @param int $dateline 为空时，时间不限制
	 * @return int 
	 */
	public function count_by_authorid_dateline($authorid, $dateline = null) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE authorid=%d '.($dateline ? ' AND '.DB::field('dateline', dintval($dateline), '>=') : ''), array($this->_table, $authorid));
	}

	/**
	 * 获取指定用户警告帖子列表，为空时获取所有警告帖子
	 * @param string|array $authors
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条数据
	 * @return array 
	 */
	public function fetch_all_by_author($authors, $start, $limit) {
		return DB::fetch_all('SELECT * FROM %t '.($authors ? 'WHERE '.DB::field('author', $authors) : '').' ORDER BY wid DESC '.DB::limit($start, $limit), array($this->_table));
	}

	/**
	 * 获取指定用户id的警告帖子列表
	 * @param int $authorid
	 * @return array 
	 */
	public function fetch_all_by_authorid($authorid) {
		return DB::fetch_all('SELECT * FROM %t WHERE authorid=%d', array($this->_table, $authorid));
	}

	/**
	 * 删除指定帖子的警告记录
	 * @param int|array $pids
	 * @return bool 
	 */
	public function delete_by_pid($pids) {
		if(empty($pids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('pid', $pids), array($this->_table), false, true);
	}

}

?>