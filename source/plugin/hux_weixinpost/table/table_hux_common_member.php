<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_common_member extends discuz_table_archive
{
	public function __construct() {

		$this->_table = 'common_member';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_';

		parent::__construct();
	}

	public function fetch_by_uid($uid,$field='*',$orders='') {
		return DB::fetch_first("SELECT $field FROM %t WHERE uid=%d $orders", array($this->_table, $uid));
	}
}

?>