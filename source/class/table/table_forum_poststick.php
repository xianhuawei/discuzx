<?php

/**
 *		[Discuz!] (C)2001-2099 Comsenz Inc.
 *		This is NOT a freeware, use is subject to license terms
 *
 *		$Id: table_forum_poststick.php 27806 2012-02-15 03:20:46Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_poststick extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_poststick';
		$this->_pk	  = '';

		parent::__construct();
	}

	public function insert($data, $return_insert_id = false, $replace = false, $silent = false){
		//删除缓存
		$cache_key = $this->_table.'_fetch_all_by_tid'.$data['tid'];
		memory('rm',$cache_key);
		return parent::insert($data, $return_insert_id, $replace, $silent);
	}
	/**
	 * 通过tid获取置顶回帖列表
	 * @param int $tid
	 * @return array
	 */
	public function fetch_all_by_tid($tid) {
		//note 由于主键为tid,pid所以，使用tid查询时，pid不会重复
		$cache_key = $this->_table.'_fetch_all_by_tid'.$tid;
		if(memory('check')){//从缓存中获取
			$result = memory('get',$cache_key);
			if( $result !== false){
				return $result;
			}
		}
		
		$result = DB::fetch_all('SELECT * FROM %t WHERE tid=%d ORDER BY dateline DESC', array($this->_table, $tid), 'pid');
		//缓存
		memory('set',$cache_key,$result,86400);
		
		return  $result;
	}


	/**
	 * 通过pid获取
	 * @param int $pid
	 * @return array
	 */
	public function count_by_pid($pid) {
		return DB::result_first('SELECT count(*) FROM %t WHERE pid=%d ', array($this->_table, $pid));
	}

	/**
	 * 通过pid删除回帖置顶记录
	 * @param int|array $pids
	 * @return bool
	 */
	public function delete_by_pid($pids) {
		if(empty($pids)) {
			return false;
		}
		
		//删除缓存
		//获取tid
		loadcache('posttableids');
		$posttableids = !empty($_G['cache']['posttableids']) ? ($posttableid !== false && in_array($posttableid, $_G['cache']['posttableids']) ? array($posttableid) : $_G['cache']['posttableids']): array('0');
		$thread = array();
		foreach ($posttableids as $tableid){
			if(empty($thread)){
				$thread = C::t('forum_post')->fetch($tableid, $pid);
			}else{
				break;
			}
		}
		$cache_key = $this->_table.'_fetch_all_by_tid'.$thread['tid'];
		memory('rm',$cache_key);
		
		return DB::query('DELETE FROM %t WHERE '.DB::field('pid', $pids), array($this->_table));
	}

	/**
	 * 通过tid删除回帖置顶记录
	 * @param int|array $tids
	 * @return bool
	 */
	public function delete_by_tid($tids) {
		if(empty($tids)) {
			return false;
		}
		
		foreach ($tids as $tid){
			//删除缓存
			$cache_key = $this->_table.'_fetch_all_by_tid'.$tid;
			memory('rm',$cache_key);
		}
		
		return DB::query('DELETE FROM %t WHERE '.DB::field('tid', $tids), array($this->_table));
	}

	/**
	 * 通过主键删除置顶记录
	 * @param int $tid
	 * @param int $pid
	 * @return bool
	 */
	public function delete($tid, $pid) {
		//删除缓存
		$cache_key = $this->_table.'_fetch_all_by_tid'.$tid;
		memory('rm',$cache_key);
		return DB::query('DELETE FROM %t WHERE tid=%d AND pid=%d', array($this->_table, $tid, $pid));
	}

	/**
	 * 统计指定主题的回帖置顶数
	 * @param int $tid
	 * @return int
	 */
	public function count_by_tid($tid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d', array($this->_table, $tid));
	}
}

?>