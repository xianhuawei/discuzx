<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_session.php 28051 2012-02-21 10:36:56Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_session extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_session';
		$this->_pk    = 'sid';
		$this->_pre_cache_key = 'common_session_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 120;
		parent::__construct();
	}

	public function fetch($sid, $ip = false, $uid = false) {
		if(empty($sid)) {
			return array();
		}
		$this->checkpk();
		$session = parent::fetch($sid);
		if($session && $ip !== false && $ip != "{$session['ip1']}.{$session['ip2']}.{$session['ip3']}.{$session['ip4']}") {
			$session = array();
		}
		if($session && $uid !== false && $uid != $session['uid']) {
			$session = array();
		}
		return $session;
	}

	/**
	 * 在线数据
	 * @param int $ismember 是否为会员 0所有 1仅会员 2仅游客
	 * @param int $invisible 是否过滤隐身 0所有 1仅隐身 2仅非隐身
	 * @param int $limit 数据条数
	 * @return array 在线数据
	 */
	public function fetch_member($ismember = 0, $invisible = 0, $start = 0, $limit = 0) {
		$sql = array();
		if($ismember === 1) {
			$sql[] = 'uid > 0';
		} elseif($ismember === 2) {
			$sql[] = 'uid = 0';
		}
		if($invisible === 1) {
			$sql[] = 'invisible = 1';
		} elseif($invisible === 2) {
			$sql[] = 'invisible = 0';
		}
		$wheresql = !empty($sql) && is_array($sql) ? ' WHERE '.implode(' AND ', $sql) : '';
		$sql = 'SELECT * FROM %t '.$wheresql.' ORDER BY lastactivity DESC'.DB::limit($start, $limit);
		return DB::fetch_all($sql, array($this->_table), $this->_pk);
	}

	/**
	 * 统计在线可见用户数
	 */
	public function count_invisible($type = 1) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE invisible=%d', array($this->_table, $type));
	}

	/**
	 * 返回在线人数统计
	 * @param 0|1|2 $type  0=全部 1=会员 2=游客
	 * @return int
	 */
	public function count($type = 0) {
		$condition = $type == 1 ? ' WHERE uid>0 ' : ($type == 2 ? ' WHERE uid=0 ' : '');
		return DB::result_first("SELECT count(*) FROM ".DB::table($this->_table).$condition);

	}

	public function delete_by_session($session, $onlinehold, $guestspan) {
		if(!empty($session) && is_array($session)) {
			$onlinehold = time() - $onlinehold;
			$guestspan = time() - $guestspan;
			$session = daddslashes($session);

			//当前用户的sid
			$condition = " sid='{$session[sid]}' ";
			//过期的 session
			$condition .= " OR lastactivity<$onlinehold ";
			//频繁的同一ip游客
			$condition .= " OR (uid='0' AND ip1='{$session['ip1']}' AND ip2='{$session['ip2']}' AND ip3='{$session['ip3']}' AND ip4='{$session['ip4']}' AND lastactivity>$guestspan) ";
			//当前用户的uid
			$condition .= $session['uid'] ? " OR (uid='{$session['uid']}') " : '';
			DB::delete('common_session', $condition);
		}
	}

	/**
	 * 根据会员ID获取session信息
	 * @param int $uid 会员ID
	 * @return mixed
	 */
	public function fetch_by_uid($uid) {
		return !empty($uid) ? DB::fetch_first('SELECT * FROM %t WHERE uid=%d', array($this->_table, $uid)) : false;
	}

	/**
	 * 根据批量会员ID获取session信息
	 * @param array $uids
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_uid($uids, $start = 0, $limit = 0) {
		$data = array();
		if(!empty($uids)) {
			$data = DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('uid', $uids).DB::limit($start, $limit), array($this->_table), null, 'uid');
		}
		return $data;
	}

	/**
	 * 根据IP地址禁止当前正在访问的用户
	 * @param int $ip1 IPv4的第一段
	 * @param int $ip2 IPv4的第二段
	 * @param int $ip3 IPv4的第三段
	 * @param int $ip4 IPv4的第四段
	 * @return bool
	 */
	public function update_by_ipban($ip1, $ip2, $ip3, $ip4) {
		$ip1 = intval($ip1);
		$ip2 = intval($ip2);
		$ip3 = intval($ip3);
		$ip4 = intval($ip4);
		return DB::query('UPDATE '.DB::table('common_session')." SET groupid='6' WHERE ('$ip1'='-1' OR ip1='$ip1') AND ('$ip2'='-1' OR ip2='$ip2') AND ('$ip3'='-1' OR ip3='$ip3') AND ('$ip4'='-1' OR ip4='$ip4')");
	}

	/**
	 * 更改表的最大值
	 * @param int $max_rows 最大值
	 * @return bool
	 */
	public function update_max_rows($max_rows) {
		return DB::query('ALTER TABLE '.DB::table('common_session').' MAX_ROWS='.dintval($max_rows));
	}

	/**
	 * 清空表数据
	 * @return bool
	 */
	public function clear() {
		return DB::query('DELETE FROM '.DB::table('common_session'));
	}

	/**
	 * 根据fid 统计
	 * @param int $fid
	 * @return int
	 */
	public function count_by_fid($fid) {
		return ($fid = dintval($fid)) ? DB::result_first('SELECT COUNT(*) FROM '.DB::table('common_session')." WHERE uid>'0' AND fid='$fid' AND invisible='0'") : 0;
	}

	/**
	 * 根据fid获取数据
	 * @param int $fid
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_fid($fid, $limit = 12) {
		// 取得在线详细信息
		return ($fid = dintval($fid)) ? DB::fetch_all('SELECT uid, groupid, username, invisible, lastactivity FROM '.DB::table('common_session')." WHERE uid>'0' AND fid='$fid' AND invisible='0' ORDER BY lastactivity DESC".DB::limit($limit)) : array();
	}

	/**
	 * 根据UID更新session信息
	 * @param int $uid
	 * @param array $data
	 * @return bool
	 */
	public function update_by_uid($uid, $data){
		if(($uid = dintval($uid)) && !empty($data) && is_array($data)) {
			return DB::update($this->_table, $data, DB::field('uid', $uid));
		}
		return 0;
	}

	/**
	 * 根据IP统计数据
	 * @param string $ip
	 * @return int
	 */
	public function count_by_ip($ip) {
		$count = 0;
		if(!empty($ip) && ($ip = explode('.', $ip)) && count($ip) > 2 ) {
			$count = DB::result_first('SELECT COUNT(*) FROM '.DB::table('common_session')." WHERE ip1='$ip[0]' AND ip2='$ip[1]' AND ip3='$ip[2]'");
		}
		return $count;
	}

	/**
	 * 根据IP获取数据
	 * @param string $ip
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_ip($ip, $start = 0, $limit = 0) {
		$data = array();
		if(!empty($ip) && ($ip = explode('.', $ip)) && count($ip) > 2 ) {
			$data = DB::fetch_all('SELECT * FROM %t WHERE ip1=%d AND ip2=%d AND ip3=%d ORDER BY lastactivity DESC'.DB::limit($start, $limit), array($this->_table, $ip[0], $ip[1], $ip[2]), null);
		}
		return $data;
	}
}

?>