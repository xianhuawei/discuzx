<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_plugin_luckypostlog extends discuz_table {

	public function __construct() {
		$this->_table = 'common_plugin_luckypostlog';
		$this->_pk = 'uid';
		$this->_pre_cache_key = 'common_plugin_luckypostlog_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 86400;
		
		parent::__construct();
	}


	public function increase($uid, $field) {

		if (in_array($field, array('goodtimes', 'badtimes'))) {
			return DB::query('UPDATE %t SET %i WHERE uid=%d', array($this->_table, DB::field($field, '1', '+'), $uid));
		}

		return false;
	}

	public function range($start = 0, $limit = 0, $orderby = '', $sort = '') {

		$orderby = in_array($orderby, array($this->_pk, 'goodtimes', 'badtimes'), true) ? $orderby : '';

		return DB::fetch_all('SELECT * FROM %t %i %i', array($this->_table, ($orderby ? ' ORDER BY '.DB::order($orderby, $sort) : ''), DB::limit($start, $limit)), $this->_pk);
	}

}
