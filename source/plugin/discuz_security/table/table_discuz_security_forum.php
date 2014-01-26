<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_forum.php 209 2013-05-29 09:31:39Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_discuz_security_forum extends discuz_table
{
	public function __construct() {

		$this->_table = 'discuz_security_forum';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'discuz_security_forum_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 86400;
		parent::__construct();
	}

	public function insert($uid, $username, $ip) {
		if(($uid = dintval($uid))) {
			$username = daddslashes($username);
			$ip = daddslashes($ip);
			$base = array(
				'uid' => $uid,
				'username' => (string)$username,
				'dateline' => TIMESTAMP,
				'lastip' => (string)$ip,
			);
			parent::insert($base, false, true);
		}
	}

	public function update($uid, $username, $ip) {
		$uid = intval($uid);
		$username = daddslashes($username);
		$ip = daddslashes($ip);
		DB::query('UPDATE %t SET uid=%d, username=%s, dateline=%d, lastip=%s WHERE username=%s', array($this->_table, $uid, $username, TIMESTAMP, $ip, $username));
	}

	public function fetch($start, $limit, $orderby) {
		$start = intval($start);
		$limit = intval($limit);
		$orderby = daddslashes($orderby);
		$ordersql = !$orderby ? '' : " ORDER BY $orderby DESC ";
		$limitsql = DB::limit($start, $limit);
		$return = DB::fetch_all("SELECT * FROM %t %i %i", array($this->_table, $ordersql, $limitsql));
		return $return;
	}

	public function delete_by_uid($uid) {
		if(is_array($uid)) {
			$uid = implode("','", $uid);
		} else {
			$uid = "'".$uid."'";
		}
		
		$return = DB::delete($this->_table, "uid IN ($uid)");
		return $return;
	}

	public function count() {
		return DB::result_first("SELECT COUNT(*) FROM %t", array($this->_table));
	}

}

?>