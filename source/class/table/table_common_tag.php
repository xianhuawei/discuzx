<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_tag.php 32232 2012-12-03 08:57:08Z zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_tag extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_tag';
		$this->_pk    = 'tagid';
		parent::__construct();
	}

	public function fetch_all_by_status($status = NUll, $tagname = '', $startlimit = 0, $count = 0, $returncount = 0, $order = '') {
		if($status === NULL) {
			$statussql = 'status<>3';
		} else {
			$statussql = 'status='.intval($status);
		}
		$data = array($this->_table);
		if($tagname) {
			$namesql = " AND tagname LIKE %s";
			$data[] = '%'.$tagname.'%';
		}
		if($returncount) {
			return DB::result_first("SELECT count(*) FROM %t WHERE $statussql $namesql", $data);
		}
		return DB::fetch_all("SELECT * FROM %t WHERE $statussql $namesql ORDER BY ".DB::order('tagid', $order)." ".DB::limit($startlimit, $count), $data);
	}

	/**
	 * 添加记录
	 * @param string $tagname
	 * @param int $status
	 * @return int tagid
	 */
	public function insert($tagname, $status = 0) {
		$data = array(
			'tagname'=>$tagname,
			'status'=>$status
		);
		return parent::insert($data,true);
//		DB::query('INSERT INTO %t (tagname, status) VALUES (%s, %d)', array($this->_table, $tagname, $status));
//		return DB::insert_id();
	}

	/**
	 * 通过ID获取记录
	 * @param array $ids 主键值
	 * @return array
	 */
	public function get_byids($ids) {
		if(empty($ids)) {
			return array();
		}
		if(!is_array($ids)) {
			$ids = array($ids);
		}
		return parent::fetch_all($ids);
		//return DB::fetch_all('SELECT * FROM %t WHERE tagid IN (%n)', array($this->_table, $ids), 'tagid');
	}
	/**
	 * 通过tagname获取记录
	 * @param string $tagname 主键值
	 * @param string $type 区分uid 和非uid类的tag
	 * @return array
	 */
	public function get_bytagname($tagname, $type) {
		if(empty($tagname)) {
			return array();
		}
		$statussql = $type != 'uid' ? ' AND status<\'3\'' : ' AND status=\'3\'';
		return DB::fetch_first('SELECT * FROM %t WHERE tagname=%s '.$statussql, array($this->_table, $tagname));
	}

	public function fetch_info($tagid, $tagname) {
		if(empty($tagid) && empty($tagname)) {
			return array();
		}
		$addsql = $sqlglue = '';
		if($tagid) {
			$addsql = " tagid=".intval($tagid);
			$sqlglue = ' AND ';
		}
		if($tagname) {
			$addsql .= $sqlglue.' '.DB::field('tagname', $tagname);
		}
		return DB::fetch_first("SELECT tagid,tagname,status FROM ".DB::table('common_tag')." WHERE $addsql");
	}

	/**
	 * 删除记录
	 * @param array $ids 主键值
	 * @return boolean
	 */
	public function delete_byids($ids) {
		if(empty($ids)) {
			return false;
		}
		if(!is_array($ids)) {
			$ids = array($ids);
		}
		return parent::delete($ids);
		//return DB::query('DELETE FROM %t WHERE tagid IN (%n)', array($this->_table, $ids));
	}
}

?>