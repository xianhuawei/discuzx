<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_admincp_cmenu.php 27806 2012-02-15 03:20:46Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_admincp_cmenu extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_admincp_cmenu';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 * 后台用户的常用菜单总数
	 * @param int $uid 用户id
	 * @return int 
	 */
	public function count_by_uid($uid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d AND sort=1', array($this->_table, $uid));
	}

	/**
	 * 返回一个用户的后台常用菜单列表
	 * @param int $uid 用户id
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条
	 * @return array 
	 */
	public function fetch_all_by_uid($uid, $start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t WHERE uid=%d AND sort=1 ORDER BY displayorder, dateline DESC, clicks DESC '.DB::limit($start, $limit),
				array($this->_table, $uid));
	}

	/**
	 * 根据主键删除一个用户的后台常用菜单
	 * @param int|array $id 主键
	 * @param int $uid
	 * @return bool 
	 */
	public function delete($id, $uid = 0) {
		if(empty($id)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('id', $id).' %i', array($this->_table, ($uid ? ' AND '.DB::field('uid', $uid) : '')));
	}

	/**
	 * 通过uid,sort和url获取该菜单的主键id
	 * @param int $uid
	 * @param int $sort
	 * @param string $url
	 * @return int 
	 */
	public function fetch_id_by_uid_sort_url($uid, $sort, $url) {
		return DB::result_first('SELECT id FROM %t WHERE uid=%d AND sort=%d AND url=%s', array($this->_table, $uid, $sort, $url));
	}

	/**
	 * 更新收藏次数
	 * @param int $id
	 * @return bool 
	 */
	public function increase_clicks($id) {
		return DB::query('UPDATE %t SET clicks=clicks+1 WHERE id=%d', array($this->_table, $id));
	}

}

?>