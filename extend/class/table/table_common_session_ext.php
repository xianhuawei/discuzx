<?php
/*
 *      $Id: 2013/9/12 11:18:12 table_common_session_ext.php Luca Shin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_session_ext extends table_common_session
{
	public $rds = null;

	public function __construct() {
		global $_G;
		$this->rds = new Redis();
		$this->rds->pconnect($_G['config']['memory']['redis']['server'], $_G['config']['memory']['redis']['port']);

		$this->_table = 'common_session';
		$this->_pk    = 'sid';
		parent::__construct();
	}

	public function _rdskey($sid, $uid = 0, $fid = 0, $invisible = 0, $ip = '') {
		if(empty($sid)) return '';
		$uid = $uid == 0 ? '' : $uid;
		return "sR:s_$sid:u_$uid:f_$fid:i_$invisible:p_$ip";
	}

	public function _rdskey_gnr($var) {
		return $this->_rdskey($var['sid'], $var['uid'], $var['fid'], $var['invisible'], "{$var['ip1']}.{$var['ip2']}.{$var['ip3']}.{$var['ip4']}");
	}

	public function _rdscput($key, $value, $sec = 600) {
		$value = serialize($value);
		return $this->rds->setex($key, $sec, $value);
	}

	public function _rdscget($key) {
		$rt = $this->rds->get($key);
		$rt = unserialize($rt);
		if(empty($rt)) return false;
		return $rt;
	}

	public function insert($data, $return_insert_id = false, $replace = false, $silent = false) {
		$key = $this->_rdskey_gnr($data);
		return $this->rds->hMset($key, $data);
	}

	public function fetch($sid, $ip = false, $uid = false) {
		if(empty($sid)) {
			return array();
		}

		$key = $this->rds->keys("sR:s_$sid*");
		if(empty($key)) return array();

		$session = $this->rds->hGetAll($key[0]);
		if($session && $ip !== false && $ip != "{$session['ip1']}.{$session['ip2']}.{$session['ip3']}.{$session['ip4']}") {
			$session = array();
		}
		if($session && $uid !== false && $uid != $session['uid']) {
			$session = array();
		}
		return $session;
	}

	public function fetch_member($ismember = 0, $invisible = 0, $start = 0, $limit = 0) {
		$keyu = $keyi = '';
		$return = array();//按lastactivity来
		if($ismember === 1) {
			$keyu = 'u_[1-9]*:';
		} elseif($ismember === 2) {
			$keyu = 'u_:';
		}
		if($invisible === 1) {
			$keyi = 'i_1:';
		} elseif($invisible === 2) {
			$keyi = 'i_0:';
		}

		$keyc = "sRc:fm:$ismember:$invisible:$start:$limit";
		if(($return = $this->_rdscget($keyc)) !== false) return $return;

		$key = $this->rds->keys("sR:*$keyu*$keyi*");
		if(empty($key) || !is_array($key)) return array();
		
		$key = $this->limit($key, $start, $limit);
		foreach($key as $v) {
			$return[] = $this->rds->hGetAll($v);
		}
		$this->_rdscput($keyc, $return);
		return $return;
	}

	public function count_invisible($type = 1) {
		return (int)$this->rds->hGet('sR:status', "c_i_t$type");
	}

	public function count($type = 0) {
		return (int)$this->rds->hGet('sR:status', "c_t$type");
	}

	public function delete_by_session($session, $onlinehold, $guestspan) {//
		if(!empty($session) && is_array($session)) {
			//$onlinehold = time() - $onlinehold;
			//$guestspan = time() - $guestspan;
			
			$key = $this->rds->keys("sR:s_{$session['sid']}*");
			!empty($key) && $this->rds->delete($key);
			//$key1 = $this->rds->keys("sR:*u_:*{$session['ip1']}.{$session['ip2']}.{$session['ip3']}.{$session['ip4']}");
			//if(!empty($key1) && is_array($key1)) {
			//	foreach($key1 as $k=>&$v) {
			//		if($this->rds->hget($v, 'lastactivity') <= $guestspan) unset($key1[$k]);
			//	}
			//	!empty($key1) && $this->rds->delete($key1);
			//	
			//}
			if($session['uid'] != 0) $key2 = $this->rds->keys("sR:*u_{$session['uid']}*");
			!empty($key2) && $this->rds->delete($key2);
		}
	}

	public function fetch_by_uid($uid) {
		if(empty($uid)) return false;
		$key = $this->rds->keys("sR:*u_$uid*");
		if(empty($key)) return false;
		return $this->rds->hGetAll($key[0]);
	}

	public function limit($array, $start = 0, $limit = 0) {
		$return = array();
		if(empty($array) || !is_array($array)) return $return;
		return $limit == 0 && $start == 0 ? $array : ($limit == 0 ?  array_slice($array, 0, $start) : array_slice($array, $start, $limit));
	}

	public function fetch_all_by_uid($uids, $start = 0, $limit = 0) {
		$data = $keysa = array();

		$uidsc = md5(implode(':', $uids));
		$keyc = "sRc:fabu:$uidsc:$start:$limit";
		if(($data = $this->_rdscget($keyc)) !== false) return $data;
		
		$keys = $this->rds->keys("sR:s_*u_[1-9]*");
		if(empty($keys) || !is_array($keys)) return $data;
		foreach($keys as $v) {
			preg_match('/sR.+:u_(\d+):/', $v, $match);
			$uid = $match[1];
			if(in_array($uid, $uids)) {
				$keysa[] = $v;
			}
		}
		$keysa = $this->limit($keysa, $start, $limit);
		foreach($keysa as $v) {
			$data[] = $this->rds->hGetAll($v);
		}
		$this->_rdscput($keyc, $data);
		return $data;
	}

	public function update_by_ipban($ip1, $ip2, $ip3, $ip4) {
		$ip1 = intval($ip1);
		$ip2 = intval($ip2);
		$ip3 = intval($ip3);
		$ip4 = intval($ip4);
		
		$keys = $this->rds->keys("sR:s_*:p_*-1*");
		if(!empty($keys) && is_array($keys)) {
			foreach($keys as $v) {
				$this->rds->hSet($v, 'groupid', 6);
			}
		} 
		$keys = $this->rds->keys("sR:s_*:p_$ip1.$ip2.$ip3.$ip4");
		if(!empty($keys) && is_array($keys)) {
			foreach($keys as $v) {
				$this->rds->hSet($v, 'groupid', 6);
			}
		}
		return true;	
	}

	public function update_max_rows($max_rows) {
		return true;
	}

	public function clear() {
		return $this->rds->flushAll();
	}

	public function count_by_fid($fid) {
		$rt = unserialize($this->rds->hGet('sR:status', "c_b_f"));
		return (int)$rt[$fid];
	}

	public function fetch_all_by_fid($fid, $limit = 12) {
		$return = array();
		$keys = $this->rds->keys("sR:s_*u_[1-9]*:f_$fid:i_0*");
		if(empty($keys) || !is_array($keys)) return array();
		
		$keys = $this->limit($keys, 0, $limit);
		foreach($keys as $v) {
			$return[] = $this->rds->hGetAll($v);
		}
		return $return;
	}

	public function update_by_uid($uid, $data){
		$oldkey = $this->rds->keys("sR:*u_$uid*");
		if(empty($oldkey) || !is_array($oldkey)) return 0;

		$newkey = $this->_rdskey_gnr($data);
		if($oldkey[0] !=  $newkey) $this->rds->rename($oldkey[0], $newkey);
		return $this->rds->hMset($newkey, $data);
	}

	public function update($var, $data) {//目前只考虑var为sid的情况
		$oldkey = $this->rds->keys("sR:s_$var*");
		if(empty($oldkey) || !is_array($oldkey)) return 0;

		$newkey = $this->_rdskey_gnr($data);
		if($oldkey[0] !=  $newkey) $this->rds->rename($oldkey[0], $newkey);
		return $this->rds->hMset($newkey, $data);
	}

	public function count_by_ip($ip) {
		if(empty($ip)) return false;
		$key = $this->rds->keys("sR:*:p_$ip*");
		if(empty($key)) return 0;
		return count($key);
	}

	public function fetch_all_by_ip($ip, $start = 0, $limit = 0) {
		if(empty($ip)) return false;
		$ip = explode('.', $ip);
		$key = $this->rds->keys("sR:*:p_{$ip[0]}.{$ip[1]}.{$ip[2]}*");
		if(empty($key)) return array();
	
		$return = array();	
		$key = $this->limit($key, $start, $limit);
		foreach($key as $v) {
			$return[] = $this->rds->hGetAll($v);
		}
		return $return;
	}
}

?>
