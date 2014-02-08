<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_wx_config extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_wx_config';
		$this->_pk    = 'id';
		$this->_pre_cache_key = 'hux_wx_config_';
		parent::__construct();
	}

	public function fetch_by_appcmd($appcmd,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE appcmd=%s", array($this->_table, $appcmd));
	}
	
	public function fetch_by_appid($appid,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE appid=%s", array($this->_table, $appid));
	}
	
	public function fetch_all_by_admincmd($admincmd,$field='*',$order='',$state=999) {
		if ($state == 1 || $state == 0) {
			$wherestate = "AND state=".intval($state);
		} else {
			$wherestate = "";
		}
		return DB::fetch_all("SELECT $field FROM %t WHERE admincmd=%d $wherestate $order", array($this->_table, $admincmd));
	}
	
	public function fetch_all($field='*',$order='') {
		return DB::fetch_all("SELECT $field FROM %t $order", array($this->_table));
	}
	
	public function delete_by_appid($appid) {
		return DB::query("DELETE FROM %t WHERE appid=%s", array($this->_table, $appid));
	}
	
	public function update_appver_by_appid($appid,$value) {
		return DB::query("UPDATE %t SET appver=%s WHERE appid=%s", array($this->_table, $value, $appid));
	}
	
	public function check_by_field($field) {
		$query = DB::query("Describe %t $field", array($this->_table));
		return DB::fetch($query);
	}

}

?>