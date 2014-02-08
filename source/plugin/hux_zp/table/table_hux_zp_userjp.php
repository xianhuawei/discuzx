<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_zp_userjp extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_zp_userjp';
		$this->_pk    = 'id';
		$this->_pre_cache_key = 'hux_zp_userjp_';
		parent::__construct();
	}
	
	public function fetch_by_uid($uid,$field='*',$orders='') {
		return DB::fetch_first("SELECT $field FROM %t WHERE uid=%d $orders", array($this->_table, $uid));
	}
	
	public function fetch_all_by_show($show,$limit) {
		return DB::fetch_all("SELECT * FROM %t WHERE jpshow=%d ORDER BY dateline DESC LIMIT 0,$limit", array($this->_table, $show));
	}
	
	public function fetch_all_by_search($condition='',$orders='',$type=0,$start=0,$limit=0) {
		if ($type == 1) {
			$result = DB::fetch_all("SELECT * FROM %t WHERE 1%i $orders LIMIT $start,$limit",array($this->_table,$condition));
		} else {
			$n = DB::query("SELECT * FROM ".DB::table($this->_table)." WHERE 1$condition $orders");
			$result = DB::num_rows($n);
		}
		return $result;
	}
	
	public function delete_by_state($state) {
		return DB::query("DELETE FROM %t WHERE state=%d", array($this->_table, $state));
	}

}

?>