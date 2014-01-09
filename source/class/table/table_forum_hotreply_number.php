
<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_hotreply_number extends discuz_table {

	public function __construct() {
		$this->_table = 'forum_hotreply_number';
		$this->_pk = 'pid';
		$this->_pre_cache_key = 'forum_hotreply_number_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 86400;
		
		parent::__construct();
	}

	public function fetch_all_by_pids($pids) {
		return parent::fetch_all($pids);
		//return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('pid', $pids), array($this->_table), 'pid');
	}

	public function fetch_all_by_tid_total($tid, $limit = 5) {
		//加缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_tid_total_'.$tid.'_'.$limit;
		if($this->_allowmem){
			$result = memory('get',$cache_key);
			if( $result !== false){
				return $result;
			}
		}
		
		$result = DB::fetch_all('SELECT * FROM %t WHERE tid=%d ORDER BY total DESC LIMIT %d', array($this->_table, $tid, $limit), 'pid');
		memory('set',$cache_key,$result);
		return $result;
	}

	public function fetch_by_pid($pid) {
		return parent::fetch($pid);
		//return DB::fetch_first('SELECT * FROM %t WHERE pid=%d', array($this->_table, $pid));
	}

	public function update_num($pid, $typeid) {
		$typename = $typeid == 1 ? 'support' : 'against';
		return DB::query('UPDATE %t SET '.$typename.'='.$typename.'+1, total=total+1 WHERE pid=%d', array($this->_table, $pid));
	}

	public function delete_by_tid($tid) {
		if(empty($tid)) {
			return false;
		}
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_tid_total_'.$tid.'_10';
		memory('rm',$cache_key);
		
		return DB::query('DELETE FROM %t WHERE tid IN (%n)', array($this->_table, $tid));
	}

	public function delete_by_pid($pids) {
		if(empty($pids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('pid', $pids), array($this->_table));
	}
}
?>