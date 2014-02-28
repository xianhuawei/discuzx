<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_typeoption.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_typeoption extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_typeoption';
		$this->_pk    = 'optionid';

		parent::__construct();
	}

	/**
	 * 通过分类信息上级项查询
	 * @param int $classid
	 * @param int $start 分页开始数
	 * @param int $limit 取多少条
	 * @return array 
	 */
	public function fetch_all_by_classid($classid, $start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t WHERE classid=%d ORDER BY displayorder '.DB::limit($start, $limit), array($this->_table, $classid));
	}

	/**
	 * 根据分类信息标识查询
	 * @param string $identifier
	 * @param int $start
	 * @param int $limit
	 * @param int $not_optionid 去掉的分类信息项
	 * @return array 
	 */
	public function fetch_all_by_identifier($identifier, $start = 0, $limit = 0, $not_optionid = null) {
		return DB::fetch_all('SELECT * FROM %t WHERE identifier=%s '.($not_optionid ? ' AND '.DB::field('optionid', $not_optionid, '<>').' ' : '').DB::limit($start, $limit), array($this->_table, $identifier));
	}

}

?>