<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_zp_user extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_zp_user';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'hux_zp_user_';
		parent::__construct();
	}
	
	public function fetch_by_uid($uid,$field='*',$orders='') {
		return DB::fetch_first("SELECT $field FROM %t WHERE uid=%d $orders", array($this->_table, $uid));
	}

}

?>