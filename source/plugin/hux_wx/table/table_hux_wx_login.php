<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_wx_login extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_wx_login';
		$this->_pk    = 'id';
		$this->_pre_cache_key = 'hux_wx_login_';
		parent::__construct();
	}
	
	public function fetch_by_id($id,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE id=%d $orders", array($this->_table, $id));
	}
	
	public function delete_by_dateline() {
		$dateline = TIMESTAMP - 600;
		return DB::query("DELETE FROM %t WHERE dateline<%d", array($this->_table, $dateline));
	}

}

?>