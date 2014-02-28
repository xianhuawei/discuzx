<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_typevar.php 28071 2012-02-22 04:06:45Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_typevar extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_typevar';
		$this->_pk    = '';

		parent::__construct();
	}

	/**
	 * 获取指定类型的分类信息项数量
	 * @param int $search
	 * @return bool
	 */
	public function count_by_search($search) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE search>%d', array($this->_table, $search));
	}

	/**
	 * 获取指定搜索类型和分类信息项类型的分类信息对应项
	 * @param int $search
	 * @param string|array $optiontypes
	 * @return array
	 */
	public function fetch_all_by_search_optiontype($search, $optiontypes) {
		if(empty($optiontypes)) {
			return array();
		}
		return DB::fetch_all('SELECT p.*, v.* FROM %t v LEFT JOIN %t p ON p.optionid=v.optionid WHERE search=%d OR p.'.DB::field('type', $optiontypes),
				array($this->_table, 'forum_typeoption', $search));
	}

	/**
	 * 获取指定分类信息的分类信息项
	 * @param int $sortid
	 * @param string $order 指定排序
	 * @return array
	 */
	public function fetch_all_by_sortid($sortid, $order = '') {
		//note 由于sortid,optionid是唯一索引，索引根据sortid查询，optionid不会重复
		return DB::fetch_all('SELECT * FROM %t WHERE sortid=%d '.($order ? 'ORDER BY '.DB::order('displayorder', $order) : ''), array($this->_table, $sortid), 'optionid');
	}

	/**
	 * 根据主键更新
	 * @param int $sortid
	 * @param int $optionid
	 * @param array $data
	 * @param bool $unbuffered
	 * @param bool $low_priority
	 * @return bool
	 */
	public function update($sortid, $optionid, $data, $unbuffered = false, $low_priority = false) {
		if(empty($data)) {
			return false;
		}
		return DB::update($this->_table, $data, array('sortid' => $sortid, 'optionid' => $optionid), $unbuffered, $low_priority);
	}

	/**
	 * 根据search类型更新
	 * @param int $search
	 * @param array $data
	 * @param bool $unbuffered
	 * @param bool $low_priority
	 * @return bool
	 */
	public function update_by_search($search, $data, $unbuffered = false, $low_priority = false) {
		if(empty($data)) {
			return false;
		}
		return DB::update($this->_table, $data, array('search' => $search), $unbuffered, $low_priority);
	}

	/**
	 * 根据主键删除
	 * @param int|array $sortids
	 * @param int|array $optionids
	 * @return bool
	 */
	public function delete($sortids = null, $optionids = null) {
		$where = array();
		$sortids && $where[] = DB::field('sortid', $sortids);
		$optionids && $where[] = DB::field('optionid', $optionids);
		if($where) {
			return DB::query('DELETE FROM %t WHERE '.implode(' AND ', $where), array($this->_table));
		} else {
			return false;
		}
	}
}

?>