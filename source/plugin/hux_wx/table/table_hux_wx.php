<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_wx extends discuz_table
{

	public function __construct() {

		$this->_table = 'hux_wx';
		$this->_pk    = 'openid';
		$this->_pre_cache_key = 'hux_wx_';
		parent::__construct();
	}
	
	public function fetch_by_openid($openid,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE openid=%s $orders", array($this->_table, $openid));
	}
	
	public function fetch_by_uid($uid,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE uid=%d $orders", array($this->_table, $uid));
	}
	
	public function fetch_all_by_search($condition,$orders='',$type=0,$start=0,$limit=0) {
		if ($type == 1) {
			$result = DB::fetch_all("SELECT * FROM %t WHERE 1%i $orders LIMIT $start,$limit",array($this->_table,$condition));
		} else {
			$n = DB::query("SELECT * FROM ".DB::table($this->_table)." WHERE 1$condition $orders");
			$result = DB::num_rows($n);
		}
		return $result;
	}

}

?>