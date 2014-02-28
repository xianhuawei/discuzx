<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_diy_data.php 27827 2012-02-15 07:03:43Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_diy_data extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_diy_data';
		$this->_pk    = '';

		parent::__construct();
	}

	/**
	 * 获取单条DIY数据记录
	 * @param string $targettplname 模板名称
	 * @param string $tpldirectory 模板所在目录
	 * @return array
	 */
	public function fetch($targettplname, $tpldirectory) {
		return !empty($targettplname) ? DB::fetch_first('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('targettplname', $targettplname).' AND '.DB::field('tpldirectory', $tpldirectory)) : array();
	}

	/**
	 * 删除指定DIY数据
	 * @param string $targettplname 模板名称
	 * @param string $tpldirectory 模板所在目录
	 * @return bool
	 */
	public function delete($targettplname, $tpldirectory = null) {
		foreach($this->fetch_all($targettplname, $tpldirectory) as $value) {
			$file = ($value['tpldirectory'] ? $value['tpldirectory'].'/' : '').$value['targettplname'];
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'.htm');
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'.htm.bak');
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'_diy_preview.htm');
		}
		return DB::delete($this->_table, DB::field('targettplname', $targettplname).($tpldirectory !== null ? ' AND '.DB::field('tpldirectory', $tpldirectory) : ''));
	}

	/**
	 * 更新指定DIY数据
	 * @param string $targettplname 模板名称
	 * @param string $tpldirectory 模板所在目录
	 * @param array $data 更新数据
	 * @return bool
	 */
	public function update($targettplname, $tpldirectory, $data) {
		if(!empty($targettplname) && !empty($data) && is_array($data)) {
			return DB::update($this->_table, $data, DB::field('targettplname', $targettplname).' AND '.DB::field('tpldirectory', $tpldirectory));
		}
		return false;
	}

	/**
	 * 获取多条DIY数据记录
	 * @param string $targettplname 模板名称
	 * @param string $tpldirectory 模板所在目录
	 * @return array
	 */
	public function fetch_all($targettplname, $tpldirectory = null) {
		return !empty($targettplname) ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('targettplname', $targettplname).($tpldirectory !== null ? ' AND '.DB::field('tpldirectory', $tpldirectory) : '')) : array();
	}

	/**
	 * 仅供后台管理使用函数
	 * @param string $wheresql 外层处理$wheresql安全
	 * @return int
	 */
	public function count_by_where($wheresql) {
		$wheresql = $wheresql ? ' WHERE '.$wheresql : '';
		return DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).$wheresql);
	}

	/**
	 * 仅供后台管理使用函数
	 * @param string $wheresql 外层处理$wheresql安全
	 * @param string $ordersql 外层处理$ordersql安全
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_where($wheresql, $ordersql, $start, $limit) {
		$wheresql = $wheresql ? ' WHERE '.$wheresql : '';
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).$wheresql.' '.$ordersql.DB::limit($start, $limit), null, $this->_pk ? $this->_pk : '');
	}
}

?>