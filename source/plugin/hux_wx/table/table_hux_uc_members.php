<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_uc_members extends discuz_table
{

	public function __construct() {

		loaducenter();
		$this->_table = UC_DBTABLEPRE.'members';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = UC_DBTABLEPRE.'members_';
		parent::__construct();
	}
	
	public function fetch_by_uid($uid,$field='*',$orders='') {
		return DB::fetch_first("SELECT $field FROM ".$this->_table." WHERE uid=%d $orders", array($uid));
		//return DB::fetch_first("SELECT $field FROM %t WHERE uid=%d $orders", array($this->_table,$uid));
	}

}

?>