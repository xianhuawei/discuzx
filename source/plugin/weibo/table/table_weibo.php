<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_weibo.php 31511 2013-04-30 23:50:05Z mpage $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_weibo extends discuz_table {

	public function __construct() {
		$this->_table = 'plugin_weibo';
		$this->_pk    = 'uid';
		parent::__construct();
	}

	public function fetch_by_sina_uid($sina_uid) {
		return DB::fetch_first("SELECT * FROM %t WHERE sina_uid=%d", array($this->_table, $sina_uid));
	}

	public function count_by_search($username) {
		$wheresql = 'WHERE 1';
		$wheresql .= $username ? ' AND '.DB::field('username', $username, 'like') : '';

		return DB::result_first('SELECT COUNT(*) FROM %t %i', array($this->_table, $wheresql));
	}

	public function fetch_all_by_search($username, $start = 0, $limit = 0, $order = 'dateline', $sort = 'DESC') {
		$ordersql = $order ? " ORDER BY $order $sort " : '';
		$wheresql = 'WHERE 1';
		$wheresql .= $username ? ' AND '.DB::field('username', $username, 'like') : '';

		return DB::fetch_all('SELECT * FROM %t %i %i '.DB::limit($start, $limit), array($this->_table, $wheresql, $ordersql));
	}

}

?>