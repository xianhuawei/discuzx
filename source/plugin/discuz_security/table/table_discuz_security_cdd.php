<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_cdd.php 224 2013-06-21 02:52:00Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_discuz_security_cdd extends discuz_table {
	public function __construct() {
		$this->_table = 'discuz_security_cdd';
		$this->_pk    = 'id';
		$this->_pre_cache_key = 'discuz_security_cdd_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 86400;
		parent::__construct();
	}
	
	public function count_status($status) {
		return DB::result_first("SELECT count(id) FROM %t WHERE scaned='%d'", array($this->_table, $status));
	}
	
	public function fetch_one($status) {
		return DB::fetch_first("SELECT id, path FROM %t WHERE scaned='%d' LIMIT 1", array($this->_table, $status));
	}
	
	public function update_status($id, $status) {
		DB::update($this->_table, array('scaned' => $status), "id=$id");
	}
	
	public function delete_scaned() {
		DB::query("DELETE FROM %t WHERE scaned='%d'", array($this->_table, 1));
	}
}
?>