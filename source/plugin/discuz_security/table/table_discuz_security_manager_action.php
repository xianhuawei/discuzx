<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_manager_action.php 209 2013-05-29 09:31:39Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_discuz_security_manager_action extends discuz_table
{
	public function __construct() {
		$this->_table = 'discuz_security_manager_action';
		$this->_pk    = 'uid';
		parent::__construct();
	}
	public function insert($uid, $username, $action, $dateline, $recdateline) {
		if(($uid = dintval($uid))) {
			$username = daddslashes($username);
			$action = daddslashes($action);
			$dateline = intval($dateline);
			$recdateline = intval($recdateline);
			$base = array(
				'uid' => $uid,
				'username' => (string)$username,
				'action' => (string)$action,
				'dateline' => (string)$dateline,
				'recdateline' => (string)$recdateline,
			);
			parent::insert($base, false, true);
		}
	}

	public function fetch($start, $limit, $orderby) {
		$start = intval($start);
		$limit = intval($limit);
		$orderby = daddslashes($orderby);
		$ordersql = !$orderby ? '' : " ORDER BY $orderby DESC ";
		$limitsql = DB::limit($start, $limit);
		$return = DB::fetch_all("SELECT * FROM %t group by username %i %i", array($this->_table, $ordersql, $limitsql));
		return $return;
	}

	public function count_per_hour_manager($uid, $type) {
		$uid = intval($uid);
		$type = daddslashes($type);
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE dateline>%d AND action=%d AND uid=%s', array($this->_table, TIMESTAMP - 3600, getuseraction($type), $uid));
	}

	/**
	 * 版主操作日志
	 */
	public function useractionlog($uid, $action, $dateline, $recdateline) {
		$uid = intval($uid);
		$action = addslashes($action);
		$dateline = intval($dateline);
		$recdateline = intval($recdateline) ? intval($recdateline) : 0;
		if(empty($uid)) {
			return false;
		}
		
		$action = $action ?  $this->getuseraction($action) : '';
		$result = DB::fetch_first("SELECT username FROM " . DB::table('common_member') . " WHERE uid = '$uid'");
		$maxdatelineisnull = C::t('#discuz_security#discuz_security_manager_action')->fetch_latesttime($uid);
		if(is_null($maxdatelineisnull['recdateline'])){
			$recdateline = TIMESTAMP;
		}
		C::t('#discuz_security#discuz_security_manager_action')->insert($uid, $result['username'], $action, $dateline, $recdateline);
		return true;
	}

	public function fetch_latesttime($uid) {
		$uid = intval($uid);
		$return = DB::fetch_first("SELECT max(recdateline) as recdateline FROM %t WHERE uid=%d LIMIT 1", array($this->_table, $uid));
		return $return;
	}

	/**
	 * 得到用户操作的代码或代表字符，参数为数字返回字符串，参数为字符串返回数字
	 * @param string/int $var
	 * @return int/string 注意：如果失败返回false，请使用===判断，因为代码0代表tid
	 */
	public function getuseraction($var) {
		$value = false;
		//操作代码
		$ops = array('edit','delete');
		if(is_numeric($var)) {
			$value = isset($ops[$var]) ? $ops[$var] : false;
		} else {
			$value = array_search($var, $ops);
		}
		return $value;
	}

	public function count() {
		return DB::result_first("SELECT COUNT(*) FROM %t WHERE recdateline!=0 group by username", array($this->_table));
	}

	public function delete_by_uid($uid) {
		if(is_array($uid)) {
			$uid = implode("','", $uid);
		} else {
			$uid = intval($uid);
		}
		$uid = "'".$uid."'";
		$return = DB::delete($this->_table, "uid IN ($uid)");
		return $return;
	}

}

?>