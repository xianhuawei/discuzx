<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_banip.php 198 2013-05-29 02:44:43Z lucashen $
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_discuz_security_banip extends discuz_table {

	public function __construct() {
		$this->_table = 'plugin_discuz_security_banip';
		$this->_pk = 'ip';
		parent::__construct();
	}

	public function update_by_ip() {
		global $_G;
		$data = array(
				'ip' => $_G['clientip'],
				'count' => 1,
				'lastupdate' => TIMESTAMP,
			);
		if(!DB::insert($this->_table, daddslashes($data), false, false, true)) {
			return DB::query("UPDATE ".DB::table($this->_table)." SET count = count + 1, lastupdate = '".TIMESTAMP."' WHERE ip = '{$_G['clientip']}'");
		}
		return true;
	}

	public function fetch_range($start, $perPage = '50', $orderBy = '') {
		$orderSql = !$orderBy ? '' : " ORDER BY $orderBy DESC ";
		$limitSql = DB::limit($start, $perPage);
		$return = DB::fetch_all("SELECT * FROM %t %i %i", array($this->_table, $orderSql, $limitSql));
		return $return;
	}

	public function fetch_count() {
		return DB::result_first("SELECT COUNT(*) FROM %t", array($this->_table));
	}

	public function truncate() {
		return DB::query("TRUNCATE ".DB::table($this->_table));
	}

	public function delete_by_ip($ip) {
		$ip = daddslashes($ip);
		if(empty($ip)) return false;
		if(is_array($ip)) {
			$ip = implode("','", $ip);
		}
		$ip = "'".$ip."'";
		return DB::delete($this->_table, "ip IN ($ip)");
	}

	public function sum_by_ip($ip = '') {
		$where = '1';
		if($ip != '') {
			$where = "ip IN (".dimplode($ip).")";
		}
		return DB::result_first("SELECT SUM(count) FROM %t WHERE %i", array($this->_table, $where));
	}
}
