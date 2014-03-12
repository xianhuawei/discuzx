<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id$
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_thread_ext extends table_forum_thread
{
	private $_posttableid = array();
	private $_urlparam = array();
	private $_thread_order = array();

	public function __construct() {
		//hack redis 6
		$this->_thread_order = array('dateline', 'replies', 'lastpost', 'views');
		parent::__construct();
	}

	public function delete_by_tid($tids, $unbuffered = false, $tableid = 0, $limit = 0) {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::delete_by_tid($tids, $unbuffered, $tableid, $limit);
		}
		$tids = dintval($tids, true);
		if($tids) {
			$this->clear_cache($tids);
			//删除帖子处理
			foreach($tids as $t) {
				$fid = $this->fetch_fid_redis($t);
				$sets = array($fid.'-lastpost', $fid.'-dateline', $fid.'-replies', $fid.'-views');
				DR::delete_zsets($t, $sets);
			}
			//
			return DB::delete($this->get_table_name($tableid), DB::field('tid', $tids), $limit, $unbuffered);
		}
		return !$unbuffered ? 0 : false;
	}
	
	public function fetch_all_search($conditions, $tableid = 0, $start = 0, $limit = 0, $order = '', $sort = 'DESC', $forceindex='') {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::fetch_all_search($conditions, $tableid, $start, $limit, $order, $sort, $forceindex) ;
		}
		$ordersql = '';
		if(!empty($order)) {
			$ordersql =  " ORDER BY $order $sort ";
		}
		$data = array();
		$tlkey = !empty($conditions['inforum']) && !is_array($conditions['inforum']) ? $conditions['inforum'] : '';
		$firstpage = false;
		$defult = count($conditions) < 5 ? true : false;
		if(count($conditions) < 5) {
			foreach(array_keys($conditions) as $key) {
				if(!in_array($key, array('inforum', 'sticky', 'displayorder', 'intids'))) {
					$defult = false;
					break;
				}
			}
		}
		if(!defined('IN_MOBILE') && $defult && $conditions['sticky'] == 4 && $start == 0 && $limit && strtolower(preg_replace("/\s?/ies", '', $order)) == 'displayorderdesc,lastpostdesc' && empty($sort)) {
			foreach($conditions['displayorder'] as $id) {
				if($id < 2) {
					$firstpage = true;
					if($id < 0) {
						$firstpage = false;
						break;
					}
				}
			}
			if($firstpage && !empty($tlkey) && ($ttl = getglobal('setting/memory/forum_thread_forumdisplay')) !== null && ($data = $this->fetch_cache($tlkey, 'forumdisplay_')) !== false) {
				$delusers = $this->fetch_cache('deleteuids', '');
				if(!empty($delusers)) {
					foreach($data as $tid => $value) {
						if(isset($delusers[$value['authorid']])) {
							$data = array();
						}
					}
				}
				if($data) {
					return $data;
				}
			}
		}

		//hack redis 7
		$tids = $this->fetch_tids_redis($conditions, $order, $start, $limit);
		if($tids) {
			$data = DB::fetch_all("SELECT * FROM ".DB::table($this->get_table_name($tableid))." WHERE tid IN ($tids) ORDER BY FIELD(tid, $tids)");
		} else {
			$data = DB::fetch_all("SELECT * FROM ".DB::table($this->get_table_name($tableid))." $forceindex".$this->search_condition($conditions)." $ordersql ".DB::limit($start, $limit));
		}
		//hack redis 7 end
		if($firstpage && !empty($tlkey) && ($ttl = getglobal('setting/memory/forum_thread_forumdisplay')) !== null) {
			$this->store_cache($tlkey, $data, $ttl, 'forumdisplay_');
		}
		return $data;
	}

	public function update($tid, $data, $unbuffered = false, $low_priority = false, $tableid = 0, $realdata = false) {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::update($tid, $data, $unbuffered, $low_priority, $tableid, $realdata);
		}
		$tid = dintval($tid, true);
		if($data && is_array($data) && $tid) {
			if(!$realdata) {
				//hack redis 10
				$this->update_thread_sets($tid, $data);
				//hack redis 10 end
				$num = DB::update($this->get_table_name($tableid), $data, DB::field('tid', $tid), $unbuffered, $low_priority);
				$this->update_batch_cache((array)$tid, $data);
			} else {
				$num = DB::query('UPDATE '.DB::table($this->get_table_name($tableid))." SET ".implode(',', $data)." WHERE ".DB::field('tid', $tid), 'UNBUFFERED');
				$this->clear_cache($tid);
			}
			return $num;
		}
		return !$unbuffered ? 0 : false;
	}

	public function increase($tids, $fieldarr, $low_priority = false, $tableid = 0, $getsetarr = false) {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::increase($tids, $fieldarr, $low_priority, $tableid, $getsetarr);
		}
		$tids = dintval((array)$tids, true);
		$sql = array();
		$num = 0;
		$allowkey = array('views', 'replies', 'recommends', 'recommend_add', 'recommend_sub', 'favtimes', 'sharetimes', 'moderated', 'heats', 'lastposter', 'lastpost');
		//hack redis 11
		$this->update_thread_sets($tids, $fieldarr);
		//hack redis 11 end
		foreach($fieldarr as $key => $value) {
			if(in_array($key, $allowkey)) {
				if(is_array($value)) {
					$sql[] = DB::field($key, $value[0]);
				} else {
					$value = dintval($value);
					$sql[] = "`$key`=`$key`+'$value'";
				}
			} else {
				unset($fieldarr[$key]);
			}
		}
		if($getsetarr) {
			return $sql;
		}
		if(!empty($sql)){
			$cmd = "UPDATE " . ($low_priority ? 'LOW_PRIORITY ' : '');
			$num = DB::query($cmd.DB::table($this->get_table_name($tableid))." SET ".implode(',', $sql)." WHERE tid IN (".dimplode($tids).")", 'UNBUFFERED');
			$this->increase_cache($tids, $fieldarr);
		}
		return $num;
	}

	public function insert($data, $return_insert_id = false, $replace = false, $silent = false) {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::insert($data, $return_insert_id, $replace, $silent);
		}
		if($data && is_array($data)) {
			$this->clear_cache($data['fid'], 'forumdisplay_');
			//hack redis 9
			if(DISCUZ_REDIS) {
				$return_insert_id = true;
			} 
			$tid = DB::insert($this->_table, $data, $return_insert_id, $replace, $silent);
			$this->insert_thread_sets($tid, $data['fid'], $data['lastpost'], $date['dateline'], 0, 0);
			//hack redis 9 end
			return $tid;
		}
		return 0;
	}
	
	//hack redis 8
	private function fetch_tids_redis($conditions, $order, $start, $limit) {
		if(getglobal('config/extend/discuz_redis/on') == 0){
			return parent::fetch_tids_redis($conditions, $order, $start, $limit);
		}
		if(!DISCUZ_REDIS) {
			return false;
		}
		if($conditions['inforum'] != '' && $contitions['inforum'] != 'all') {
			$orderKey = '';
			$orderArray = explode(',', $order);
			foreach($orderArray as $o) {
				$oArray = explode(' ', trim($o));
				if(in_array(trim($oArray[0]), $this->_thread_order)) {
					$orderKey = trim($oArray[0]);
				}
			}
			if(empty($orderKey)) {
				$orderKey = 'lastpost';
			}
			
			$fid = $conditions['inforum'];
			
			$tops = DR::zrevrange($fid.'-top', $start, $limit);
			$topnum = count($tops);
			$limit = $limit - $topnum;
			if($limit > 0) {
				$tids = DR::zrevrange($fid.'-'.$orderKey, $start, $limit);
				$tids = array_merge($tops, $tids);
				//为出错做兼容。有操作会把字符串Array放入到集合中。目前看是放到了fid-top集合中
				$newtids = array();
				foreach($tids as $t) {
					if(is_numeric($t)) {
						$newtids[] = $t;
					} else {
						runlog('discuz-redis', $fid.'|'.$orderKey.'|'.$start.'|'.$limit);
					}
				}
				return implode(',', $newtids);
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	private function get_order($fid, $lastpost, $dateline, $views, $replies) {
		$sets = array(
			$fid.'-lastpost' => $lastpost,
			$fid.'-dateline' => $dateline,
			$fid.'-views'	=> $views,
			$fid.'-replies' => $replies
		);
		return $sets;
	}
	
	private function insert_thread_sets($tid, $fid, $lastpost, $dateline, $views, $replies ) {
		if(!DISCUZ_REDIS) {
			return false;
		}
		DR::insert_zsets($tid, $this->get_order($fid, $lastpost, $dateline, $views, $replies));
	}
	
	private function update_thread_sets($tids, $data, $tableid = 0) {
		if(!DISCUZ_REDIS || !is_array($tids)) {
			return false;
		}
		foreach($data as $key=>$value) {
			if($key == 'displayorder') {
				if($value != 0 ) {
					foreach($tids as $t) {
						$fid = $this->fetch_fid_redis($t);
						$sets = array($fid.'-lastpost', $fid.'-dateline', $fid.'-replies', $fid.'-views');
						DR::delete_zsets($t, $sets);
						if($value == 1) {
							DR::insert_zset($fid.'-top', 1, $t);
						}
					}
				} elseif($value == 0) {
					$threads = DB::fetch_all('SELECT tid, fid, views, lastpost, dateline, replies FROM '.DB::table($this->get_table_name($tableid))." WHERE tid IN (".implode(',', $tids).")");
					foreach($threads as $t) {
						$this->insert_thread_sets($t['tid'], $t['fid'], $t['lastpost'], $t['dateline'], $t['views'], $t['replies']);
						if(DR::iszmember($t['fid'].'-top', $t['tid'])) {
							DR::delete_zset($t['fid'].'-top', $t['tid']);
						}
					}
				}
			} elseif ($key == 'lastpost') {
				foreach($tids as $t) {
					$fid = $this->fetch_fid_redis($t);
					DR::insert_zset($fid.'-lastpost', $value[0], $t);
				}
			} elseif($key == 'replies' || $key == 'views') {
				foreach($tids as $t) {
					$fid = $this->fetch_fid_redis($t);
					DR::zincr($fid.'-'.$key, $value, $t);
				}
			} elseif($key == 'fid') {
				//更改主题的fid的处理
				foreach($tids as $t) {
					$fid = $this->fetch_fid_redis($t);
					$sets = array($fid.'-lastpost', $fid.'-dateline', $fid.'-replies', $fid.'-views');
					DR::delete_zsets($t, $sets);
					$t = DB::fetch_first('SELECT tid, fid, views, lastpost, dateline, replies, displayorder FROM '.DB::table($this->get_table_name($tableid))." WHERE tid='$t'");
					$this->insert_thread_sets($t['tid'], $value, $t['lastpost'], $t['dateline'], $t['views'], $t['replies']);
					if($t['displayorder'] == 1) { //对移动主题后一级置顶的处理
						DR::delete_zset($t['fid'].'-top', $t['tid']);
						DR::insert_zset($value.'-top', 1, $t);
					}
				}
			}
		}
	}
	
	private function fetch_fid_redis($tid) {
		if(!DISCUZ_REDIS) {
			return false;
		}
		$forums = DR::smembers('forums');
		foreach($forums as $f) {
			if(DR::iszmember($f.'-lastpost', $tid)) {
				return $f;
			}
		}
		return 0;
	}
	//hack redis 8 end
}

?>
