<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_spacecache.php 27819 2012-02-15 05:12:23Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_spacecache extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_spacecache';
		$this->_pk    = '';
		
		parent::__construct();
	}

	/**
	 * 重写fetch方法，根据主键查找
	 * @param int $uid
	 * @param string $variable
	 * @return array 
	 */
	public function fetch($uid, $variable) {
		return DB::fetch_first('SELECT * FROM %t WHERE uid=%d AND variable=%s', array($this->_table, $uid, $variable));
	}

	/**
	 * 重写fetch_all，根据主键查找多条数据
	 * @param int|array $uids
	 * @param string|array $variables
	 * @return array 
	 */
	public function fetch_all($uids, $variables) {
		if(empty($uids) || empty($variables)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('uid', $uids).' AND '.DB::field('variable', $variables), array($this->_table));
	}

	/**
	 * 重写delete, 根据主键删除
	 * @param int $uid
	 * @param string $variable
	 * @return bool 
	 */
	public function delete($uid, $variable) {
		return DB::query('DELETE FROM %t WHERE uid=%d AND variable=%s', array($this->_table, $uid, $variable));
	}

}

?>