<?php
/*
 *      $Id: 2013/8/30 16:20:06 table_forum_post_ext.php Luca Shin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_post_ext extends table_forum_post
{
	private static $_tableid_tablename = array();
	private $_pre_cache_keyd = '';

	public function __construct() {

		$this->_table = 'forum_post';
		$this->_pk    = 'pid';
		$this->_pre_cache_keyd = 'indb';
		$this->_cache_ttl = 86400;

		parent::__construct();
	}

	public static function get_tablename($tableid, $primary = 0) {
		list($type, $tid) = explode(':', $tableid);
		if(!isset(self::$_tableid_tablename[$tableid])) {
			if($type == 'tid') {
				self::$_tableid_tablename[$tableid] = self::getposttablebytid($tid, $primary);
			} else {
				self::$_tableid_tablename[$tableid] = self::getposttable($type);
			}
		}
		return self::$_tableid_tablename[$tableid];
	}

	public function insert($tableid, $data, $return_insert_id = false, $replace = false, $silent = false) {
		if(memory('check')) {
			if($data['first'] == 1) {
				$this->store_cache($data['tid'], 1, $this->_cache_ttl, $this->_pre_cache_keyd.'tp_');
				$data['position'] = 1;
				return DB::insert(self::get_tablename($tableid), $data, $return_insert_id, $replace, $silent);
			} else {
				$failed = false;
				for($i = 0;$i < 3;$i ++) {
					if($failed == true || !($maxposition = $this->fetch_cache($data['tid'], $this->_pre_cache_keyd.'tp_'))) {
						$maxposition = self::fetch_maxposition_by_tid($tableid, $data['tid']);
					}
					$this->store_cache($data['tid'], $maxposition + 1, $this->_cache_ttl, $this->_pre_cache_keyd.'tp_');
					$data['position'] = $maxposition + 1;
					if($return = DB::insert(self::get_tablename($tableid), $data, $return_insert_id, $replace, true)) {
						return $return;
					}
					$i == 1 && $failed = true;
				}
				showmessage('System is busy, please try again later.');
			}
		}

		$i = 0;
		while(1) {
			if($rt = DB::insert(self::get_tablename($tableid), $data, $return_insert_id, $replace, true)) {
				break;
			}
			$i ++;
			if($i == 3) showmessage('System is busy, please try again later.');
		}
		$maxposition = self::fetch_maxposition_by_tid($tableid, $data['tid']);
		self::update($tableid, $data['pid'], array('position'=>$maxposition + 1));
		return $rt;
	}

}
