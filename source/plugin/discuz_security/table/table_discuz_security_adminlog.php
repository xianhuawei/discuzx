<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_banip.php 136 2013-05-13 09:13:53Z lucashen $
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_discuz_security_adminlog extends discuz_table {

	public function __construct() {
		$this->_table = 'plugin_discuz_security_adminlog';
		$this->_pk = 'key';
		
		parent::__construct();
	}

	public function update_by_action($action, $cum, $type) {
		$cum = intval($cum);
		$data = array(
			'key' => $action,
			'value' => $cum,
			'lastupdate' => TIMESTAMP,
		);
		if(!DB::insert($this->_table, daddslashes($data), false, false, true)) {
			if($type == 'total') {
				return DB::query("UPDATE ".DB::table($this->_table)." SET `value` = `value` + $cum, lastupdate = '".TIMESTAMP."' WHERE `key` = '".daddslashes($action)."'");
			} elseif ($type == 'radio') {
				return DB::query("UPDATE ".DB::table($this->_table)." SET `value` = '$cum', lastupdate = '".TIMESTAMP."' WHERE `key` = '".daddslashes($action)."'");
			}
		}
		return true;
	}
}
