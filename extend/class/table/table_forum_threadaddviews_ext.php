<?php
/*
 *      $Id: 2013/8/6 13:53:07 table_forum_threadaddviews_ext.php Luca Shin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class table_forum_threadaddviews_ext extends table_forum_threadaddviews {

	public function __construct() {
		$this->_table = 'forum_threadaddviews';
		$this->_pk    = 'tid';
		$this->_pre_cache_key = 'addviews_';
		$this->_cache_ttl = 0;
		parent::__construct();
	}

	public function update_by_tid($tid) {
		if($this->_allowmem) {
			return memory('inc', $this->_pre_cache_key.$tid, '', $this->_cache_ttl);
		}
		return DB::query('UPDATE %t SET `addviews`=`addviews`+1 WHERE tid=%d', array($this->_table, $tid));
	}

	public function fetch_all_order_by_tid($start = 0, $limit = 0) {//
		if($this->_allowmem) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t ORDER BY tid'.DB::limit($start, $limit), array($this->_table), $this->_pk);
	}

	public function fetch($tid) {
		if($this->_allowmem) {
			$ret = array('tid'=>$tid, 'addviews'=>0);
			$n = memory('get', $this->_pre_cache_key.$tid);
			$ret['addviews'] = (int)$n;
			return $ret;
		}
		return parent::fetch($tid);
	}

	public function fetch_all($tids) {
		if($this->_allowmem) {
			$ret = array();
			if(is_array($tids) || array($tids)) {
				$_val = array();
				foreach($tids as $v) {
					$_val[] = $this->_pre_cache_key.$v;
				}
				$n = memory('get', $_val);
				if(is_array($n)) {
					foreach($n as $k=>$v) {
						$ret[str_replace($this->_pre_cache_key, '', $k)] = array('addviews' => $v);
					}
				}
			}
			return $ret;
		}
		return parent::fetch_all($tids);
	}

	public function insert($data, $return_insert_id = false, $replace = false) {
		if($this->_allowmem) {
			return memory('set', $this->_pre_cache_key.$data['tid'], 1, $this->_cache_ttl);
		}
		return parent::insert($data, $return_insert_id, $replace);
	}

	public function update($val, $data) {
		if($this->_allowmem) {
			return memory('set', $this->_pre_cache_key.$val, $data['addviews'], $this->_cache_ttl);
		}
		return parent::update($val, $data);
	}

	public function delete($val) {
		if($this->_allowmem) {
			if(is_array($val) || array($val)) {
				$_val = array();
				foreach($val as $k => $v) {
					$_val[$k] = $this->_pre_cache_key.$v;
				}
			}
			return memory('rm', $_val);
		}
		return parent::delete($val);
	}
}

?>
