<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_portal_category.php 27876 2012-02-16 04:28:02Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_portal_category extends discuz_table
{
	public function __construct() {

		$this->_table = 'portal_category';
		$this->_pk    = 'catid';

		parent::__construct();
	}

	public function fetch_all_numkey($numkey) {
		$allow_numkey = array('portal', 'articles', 'num');
		if(!in_array($numkey, $allow_numkey)) {
			return null;
		}
		return DB::fetch_all("SELECT catid, $numkey FROM %t", array($this->_table), $this->_pk);
	}

	/**
	 * 累加数据的值
	 * @param array $uids 会员ID
	 * @param array $data 要累加的字段和累加值
	 */
	public function increase($catids, $data) {
		$catids = array_map('intval', (array)$catids);
		$sql = array();
		$allowkey = array('articles');
		foreach($data as $key => $value) {
			if(($value = intval($value)) && in_array($key, $allowkey)) {
				$sql[] = "`$key`=`$key`+'$value'";
			}
		}
		if(!empty($sql)){
			DB::query("UPDATE ".DB::table($this->_table)." SET ".implode(',', $sql)." WHERE catid IN (".dimplode($catids).")", 'UNBUFFERED');
		}
	}

	/**
	 * 获取指定范围的数据, 不带参数返回所有数据
	 * @param int $start 开始
	 * @param int $limit 条数
	 * @param string $sort 是否根据主键排序：ASC|DESC
	 * @return array
	 */
	public function range($start = 0, $limit = 0) {
		$data = array();
		$query = DB::query('SELECT * FROM '.DB::table($this->_table).' ORDER BY displayorder,catid'.DB::limit($start, $limit));
		while($value = DB::fetch($query)) {
			$value['catname'] = dhtmlspecialchars($value['catname']);
			$data[$value['catid']] = $value;
		}
		return $data;
	}
}

?>