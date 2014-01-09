<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_collectionfollow.php 27781 2012-02-14 07:38:55Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_collectionfollow extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_collectionfollow';
		$this->_pk    = 'ctid';
		$this->_pre_cache_key = 'forum_collectionfollow_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 3600;
		parent::__construct();
	}


	public function fetch_all($ctid, $order = false, $start = 0, $limit = 0) {
		if(!$ctid) {
			return null;
		}
		$sql = DB::field('ctid', $ctid);
		if($order) {
			$sql .= ' ORDER BY '.DB::order('dateline', 'DESC');
		}
		if($limit) {
			$sql .= DB::limit($start, $limit);
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.$sql, array($this->_table));
	}

	public function fetch_all_by_uid($uid) {
		if(!$uid) {
			return null;
		}
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid'.$uid;
		if($this->_allowmem){
			$result = memory('get',$cache_key);
			if($result !== false){
				return $result;
			}
		}
		
		$result = DB::fetch_all('SELECT * FROM %t WHERE %i', array($this->_table, DB::field('uid', $uid)), $this->_pk);
		memory('set',$cache_key,$result);
		
		return $result; 
	}

	public function fetch_by_ctid_uid($ctid, $uid) {
		return DB::fetch_first('SELECT * FROM %t WHERE uid=%d AND ctid=%d', array($this->_table, $uid, $ctid));
	}

	public function delete_by_ctid($ctid) {
		if(!$ctid) {
			return false;
		}
		return DB::delete($this->_table, DB::field('ctid', $ctid));
	}

	public function delete_by_ctid_uid($ctid, $uid) {
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid'.$uid;
		memory('rm',$cache_key);
		
		return DB::query("DELETE FROM %t WHERE uid=%d AND ctid=%d", array($this->_table, $uid, $ctid));
	}

	public function delete_by_uid($uid) {
		if(!$uid) {
			return false;
		}
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid'.$uid;
		memory('rm',$cache_key);
		
		return DB::query("DELETE FROM %t WHERE %i", array($this->_table, DB::field('uid', $uid)));
	}

	public function count_by_ctid_uid($uid, $ctid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d AND ctid=%d', array($this->_table, $uid, $ctid), $this->_pk);
	}

	public function count_by_uid($uid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d', array($this->_table, $uid));
	}

	public function update($ctid, $uid, $data, $unbuffered = false, $low_priority = false) {
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid'.$uid;
		memory('rm',$cache_key);
		
		if(!empty($data) && is_array($data) && $ctid && $uid) {
			return DB::update($this->_table, $data, DB::field('ctid', $ctid).' AND '.DB::field('uid', $uid), $unbuffered, $low_priority);
		}
		return !$unbuffered ? 0 : false;
	}
}

?>