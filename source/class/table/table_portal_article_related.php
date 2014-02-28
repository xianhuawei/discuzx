<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_portal_article_related.php 27833 2012-02-15 08:04:51Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_portal_article_related extends discuz_table
{
	public function __construct() {

		$this->_table = 'portal_article_related';
		$this->_pk    = 'aid';

		parent::__construct();
	}

	/**
	 * 根据aid或相关aid删除数据
	 * @param int|array $aid 文章ID
	 * @param int|array $raid 相关文章ID
	 */
	public function delete_by_aid_raid($aid, $raid = null) {
		return ($aid = dintval($aid, true)) ? DB::delete($this->_table, DB::field('aid', $aid).($raid = dintval($raid) ? ' OR '.DB::field('raid', $raid) : '')) : false;
	}

	/**
	 * 批量插入指定AID的相关文章
	 * @param int $aid 文章ID
	 * @param array $list 相关文章
	 */
	public function insert_batch($aid, $list) {
		$replaces = array();
		if(($aid = dintval($aid))) {
			$displayorder = 0;
			unset($list[$aid]);
			foreach($list as $value) {
				if(($value['aid'] = dintval($value['aid']))) {
					$replaces[] = "('$aid', '$value[aid]', '$displayorder')";
					$replaces[] = "('$value[aid]', '$aid', '0')";
					$displayorder++;
				}
			}
		}
		if($replaces) {
			DB::query('REPLACE INTO '.DB::table($this->_table).' (aid,raid,displayorder) VALUES '.implode(',', $replaces));
		}
	}

	/**
	 * 获取指定文章ID的相关文章
	 * @param int $aid 文章ID
	 * @return array
	 */
	public function fetch_all_by_aid($aid) {
		return ($aid = dintval($aid)) ? DB::fetch_all('SELECT * FROM %t WHERE aid=%d ORDER BY displayorder', array($this->_table, $aid), 'raid') : array();
	}
}

?>