<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_home_follow_feed.php 28364 2012-02-28 07:31:23Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_home_follow_feed extends discuz_table
{
	private $_ids = array();
	private $_cids = array();
	private $_tids = array();
	private $_archiver_table = 'home_follow_feed_archiver';

	public function __construct() {

		$this->_table = 'home_follow_feed';
		$this->_pk    = 'feedid';
		$this->_pre_cache_key = 'home_follow_feed_';
		$this->_allowmem = memory('check');
		parent::__construct();
	}

	public function fetch_all_by_uid($uids = 0, $archiver = false, $start = 0, $limit = 0) {
		//主页的首页缓存
		if($this->_allowmem && $start == 0 && !empty($uids) && count($uids) == 1 ){
			$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$uids[0].'_'.intval($archiver);
			$result = memory('get',$cache_key);
			if($result !== false){
				return $result;
			}
		}
		$data = array();
		$parameter = array($archiver ? $this->_archiver_table : $this->_table);
		$wherearr = array();
		if(!empty($uids)) {
			$uids = dintval($uids, true);
			$wherearr[] = is_array($uids) && $uids ? 'uid IN(%n)' : 'uid=%d';
			$parameter[] = $uids;
		}
		$wheresql = !empty($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$query = DB::query("SELECT * FROM %t $wheresql ORDER BY dateline DESC ".DB::limit($start, $limit), $parameter);
		while($row = DB::fetch($query)) {
			$data[$row['feedid']] = $row;
			$this->_tids[$row['tid']] = $row['tid'];
		}
		if($this->_allowmem && $start == 0 && !empty($uids) && count($uids) == 1 ){
			memory('set',$cache_key,$data);
		}
		return $data;
	}

	public function fetch_all_by_dateline($dateline, $glue = '>=') {
		$glue = helper_util::check_glue($glue);
		return DB::fetch_all("SELECT * FROM %t WHERE dateline{$glue}%d ORDER BY dateline", array($this->_table, $dateline), $this->_pk);
	}

	public function fetch_by_feedid($feedid, $archiver = false) {
		return DB::fetch_first("SELECT * FROM %t WHERE feedid=%d", array($archiver ? $this->_archiver_table : $this->_table, $feedid));
	}

	public function count_by_uid_tid($uid, $tid, $archiver = false) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d AND tid=%d', array($archiver ? $this->_archiver_table : $this->_table, $uid, $tid));
	}

	public function count_by_uid_dateline($uids = array(), $dateline = 0, $archiver = 0) {
		$count = 0;
		$parameter = array($archiver ? $this->_archiver_table : $this->_table);
		$wherearr = array();
		if(!empty($uids)) {
			$uids = dintval($uids, true);
			$wherearr[] = is_array($uids) && $uids ? 'uid IN(%n)' : 'uid=%d';
			$parameter[] = $uids;
		}
		if($dateline) {
			$wherearr[] = "dateline>%d";
			$parameter[] = $dateline;
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$count = DB::result_first("SELECT COUNT(*) FROM %t $wheresql", $parameter);
		return $count;
	}
	public function insert($data, $return_insert_id = false, $replace = false, $silent = false){
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$data['uid'].'_0';
		memory('rm',$cache_key);
		parent::insert($data, $return_insert_id, $replace, $silent);
	}
	public function insert_archiver($data) {
		if(!empty($data) && is_array($data)) {
			//删除缓存
			$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$data['uid'].'_1';
			memory('rm',$cache_key);
			
			return DB::insert($this->_archiver_table, $data, false, true);
		}
		return 0;
	}

	public function delete_by_feedid($feedid, $archiver = false) {
		$feedid = dintval($feedid, true);
		if($feedid) {
			//删除缓存
			$feed = $this->fetch($feedid);
			$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$feed['uid'].'_'.intval($archiver);
			memory('rm',$cache_key);
			
			return DB::delete($archiver ? $this->_archiver_table : $this->_table, DB::field('feedid', $feedid));
		}
		return 0;
	}

	public function delete_by_uid($uids) {
		$uids = dintval($uids, true);
		$delnum = 0;
		if($uids) {
			//删除缓存
			foreach ($uids as $uid){
				$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$uid.'_0';
				memory('rm',$cache_key);
				$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_'.$uid.'_1';
				memory('rm',$cache_key);
			}
			$delnum = DB::delete($this->_table, DB::field('uid', $uids));
			$delnum += DB::delete($this->_archiver_table, DB::field('uid', $uids));
		}
		return $delnum;
	}

	public function get_ids() {
		return $this->_ids;
	}

	public function get_tids() {
		return $this->_tids;
	}

	public function get_cids() {
		return $this->_cids;
	}

}

?>