<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_common_member_count extends discuz_table_archive
{
	public function __construct() {

		$this->_table = 'common_member_count';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_count_';

		parent::__construct();
	}
	
	public function result_by_uid($uid,$value) {
		return DB::result_first("SELECT $value FROM %t WHERE uid=%d", array($this->_table, $uid));
	}

}

?>