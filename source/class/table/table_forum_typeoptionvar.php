<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_typeoptionvar.php 27800 2012-02-15 02:13:57Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_typeoptionvar extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_typeoptionvar';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 * 获取指定主题的分类信息选项数据
	 * @param int|array $tids
	 * @param int|array $optionids 指定选项
	 * @return array
	 */
	public function fetch_all_by_tid_optionid($tids, $optionids = null) {
		if(empty($tids)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('tid', $tids).($optionids ? ' AND '.DB::field('optionid', $optionids) : ''), array($this->_table));
	}

	/**
	 * 指定条件进行数据查询
	 * @param int|array $sortids
	 * @param int|array $fids
	 * @param int|array $tids
	 * @param int|array $optionids
	 * @return array
	 */
	public function fetch_all_by_search($sortids = null, $fids = null, $tids = null, $optionids = null) {
		$sql = array();
		$sortids && $sql[] = DB::field('sortid', $sortids);
		$fids && $sql[] = DB::field('fid', $fids);
		$tids && $sql[] = DB::field('tid', $tids);
		$optionids && $sql[] = DB::field('optionid', $optionids);
		if($sql) {
			return DB::fetch_all('SELECT * FROM %t WHERE %i', array($this->_table, implode(' AND ', $sql)));
		} else {
			return array();
		}
	}

	/**
	 * 指定主题更新分类信息数据
	 * @param int|array $tid
	 * @param array $data
	 * @param bool $unbuffered
	 * @param bool $low_priority
	 * @param int|array $optionid
	 * @param int|array $sortid
	 * @return bool
	 */
	public function update_by_tid($tid, $data, $unbuffered = false, $low_priority = false, $optionid = null, $sortid = null) {
		if(empty($data)) {
			return false;
		}
		$where = array();
		$where[] = DB::field('tid', $tid);
		if($optionid !== null) {
			$where[] = DB::field('optionid', $optionid);
		}
		if($sortid !== null) {
			$where[] = DB::field('sortid', $sortid);
		}
		return DB::update($this->_table, $data, implode(' AND ', $where), $unbuffered, $low_priority);
	}

	/**
	 *  删除指定分类信息的所有数据
	 * @param int|array $sortids
	 * @return bool
	 */
	public function delete_by_sortid($sortids) {
		if(empty($sortids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('sortid', $sortids), array($this->_table));
	}

	/**
	 * 删除指定主题的分类信息数据
	 * @param int|array $tids
	 * @return bool
	 */
	public function delete_by_tid($tids) {
		if(empty($tids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('tid', $tids), array($this->_table), false, true);
	}

}

?>