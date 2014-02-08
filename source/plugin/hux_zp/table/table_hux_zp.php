<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_zp extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_zp';
		$this->_pk    = 'id';
		$this->_pre_cache_key = 'hux_zp_';
		parent::__construct();
	}
	
	public function fetch_all() {
		return DB::fetch_all("SELECT * FROM %t ORDER BY id ASC", array($this->_table));
	}

}

?>