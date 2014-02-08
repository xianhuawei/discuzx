<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_wx_action extends discuz_table
{

	public function __construct() {

		$this->_table = 'plugin_hux_wx_action';
		$this->_pk    = 'openid';
		parent::__construct();
	}
	
	public function fetch_by_openid($openid,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE openid=%s", array($this->_table, $openid));
	}

}

?>