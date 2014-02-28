<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_session_close.php 33707 2013-08-06 08:22:12Z andyzheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class discuz_session_close {

	private $onlinehold; //在线时长
	private $oltimestamp; //标识在线的时间戳

	public $sid = null;
	public $var;
	public $isnew = false;
	protected $newguest = array('sid' => 0, 'ip1' => 0, 'ip2' => 0, 'ip3' => 0, 'ip4' => 0,
		'uid' => 0, 'username' => '', 'groupid' => 7, 'invisible' => 0, 'action' => 0,
		'lastactivity' => 0, 'fid' => 0, 'tid' => 0, 'lastolupdate' => 0);

	protected $table;

	public function __construct($sid = '', $ip = '', $uid = 0) {
		$this->old = array('sid' =>  $sid, 'ip' =>  $ip, 'uid' =>  $uid);
		$this->var = $this->newguest;
		$this->onlinehold = getglobal('setting/onlinehold');
		$this->oltimestamp = TIMESTAMP - $this->onlinehold;

		$this->table = C::t('common_member_status');

		if(!empty($ip)) {
			$this->init($sid, $ip, $uid);
		}
	}

	public function set($key, $value) {
		if(isset($this->newguest[$key])) {
			$this->var[$key] = $value;
		} elseif ($key == 'ip') {
			$ips = explode('.', $value);
			$this->set('ip1', $ips[0]);
			$this->set('ip2', $ips[1]);
			$this->set('ip3', $ips[2]);
			$this->set('ip4', $ips[3]);
		}
	}

	public function get($key) {
		if(isset($this->newguest[$key])) {
			return $this->var[$key];
		} elseif ($key == 'ip') {
			return $this->get('ip1').'.'.$this->get('ip2').'.'.$this->get('ip3').'.'.$this->get('ip4');
		}
	}

	public function init($sid, $ip, $uid) {
		if(($uid = intval($uid)) > 0) {
			$this->var = $this->newguest;
			$this->set('sid', 0);
			$this->set('uid', $uid);
			$this->set('username', getglobal('member/username'));
			$this->set('groupid', getglobal('member/groupid'));
			$this->set('ip', $ip);
			if(($ulastactivity = getglobal('cookie/ulastactivity'))) {
				list($lastactivity, $invisible) = explode('|', $ulastactivity);
				$lastactivity = intval($lastactivity);
				$invisible = intval($invisible);
			}
			if(!$lastactivity) {
				$lastactivity = getuserprofile('lastactivity');
				$invisible = getuserprofile('invisible');
				dsetcookie('ulastactivity', $lastactivity.'|'.$invisible, 31536000);
			}
			if($this->oltimestamp >= $lastactivity) {
				$this->isnew = true;
			}
			$this->set('invisible', $invisible);
			$this->set('lastactivity', $lastactivity);
			$this->sid = 0;
		}
	}

	public function create($ip, $uid) {
		return $this->var;
	}

	public function delete() {
		return true;

	}

	public function update() {
		return true;
	}

	/**
	 * 取在线用户数量
	 *
	 * @param int $type 0=全部 1=会员 2=游客
	 */
	public function count($type = 0) {
		loadcache('onlinecount');
		$onlinecount = getglobal('cache/onlinecount');
		if($onlinecount && $onlinecount['dateline'] > TIMESTAMP - 600) {
			$count = $onlinecount['count'];
		} else {
			$count = $this->table->count_by_lastactivity_invisible($this->oltimestamp);
			savecache('onlinecount', array('count' => $count, 'dateline' => TIMESTAMP));
		}
		if($type == 1) {
			return $count;
		}

		//虚拟游客的倍数
		if(!($multiple = getglobal('setting/onlineguestsmultiple'))) $multiple = 11;
		$add = mt_rand(0, $multiple);
		if($type == 2) {
			return intval($count * $multiple) + $add - $count;
		} else {
			return intval($count * $multiple) + $add;
		}
	}

	/**
	 * 在线数据
	 * @param int $ismember 参数无效，只能是会员
	 * @param int $invisible 是否过滤隐身 0所有 1仅隐身 2仅非隐身
	 * @param int $start 开始条数
	 * @param int $limit 数据条数
	 * @return array 在线数据
	 */
	public function fetch_member($ismember = 0, $invisible = 0, $start = 0, $limit = 0) {
		return $this->table->fetch_all_by_lastactivity_invisible($this->oltimestamp, $invisible, $start, $limit);
	}

	/**
	 * 统计在线可见用户数
	 * @param int $invisible 是否过滤隐身 0所有 1仅隐身 2仅非隐身
	 * @return int 统计值
	 */
	public function count_invisible($type = 1) {
		return $this->table->count_by_lastactivity_invisible($this->oltimestamp, $type);
	}

	/**
	 * 根据IP地址禁止当前正在访问的用户（失效）
	 * @param int $ip1 IPv4的第一段
	 * @param int $ip2 IPv4的第二段
	 * @param int $ip3 IPv4的第三段
	 * @param int $ip4 IPv4的第四段
	 * @return bool
	 */
	public function update_by_ipban($ip1, $ip2, $ip3, $ip4) {
		return false;
	}

	/**
	 * 更改表的最大值（失效）
	 * @param int $max_rows 最大值
	 * @return bool
	 */
	public function update_max_rows($max_rows) {
		return false;
	}

	/**
	 * 清空表数据（失效）
	 * @return bool
	 */
	public function clear() {
		return false;
	}

	/**
	 * 根据fid 统计（失效）
	 * @param int $fid
	 * @return int
	 */
	public function count_by_fid($fid) {
		return 0;
	}

	/**
	 * 根据fid获取数据（失效）
	 * @param int $fid
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_fid($fid, $limit) {
		return array();
	}

	/**
	 * 根据会员ID获取session信息
	 * @param int $uid 会员ID
	 * @return array
	 */
	public function fetch_by_uid($uid) {
		if(($member = $this->table->fetch($uid)) && $member['lastactivity'] >= $this->oltimestamp) {
			return $member;
		}
		return array();
	}

	/**
	 * 根据批量会员ID获取session信息
	 * @param array $uids
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_uid($uids, $start = 0, $limit = 0) {
		return $this->table->fetch_all_onlines($uids, $this->oltimestamp, $start, $limit);
	}

	/**
	 * 根据UID更新session信息
	 * @param int $uid
	 * @param array $data
	 * @return bool
	 */
	public function update_by_uid($uid, $data) {
		return false;
	}

	/**
	 * 根据IP统计数据
	 * @param string $ip
	 * @return int
	 */
	public function count_by_ip($ip) {
		return 0;
	}

	/**
	 * 根据IP获取数据
	 * @param string $ip
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_ip($ip, $start = 0, $limit = 0) {
		return array();
	}

	public function updatesession() {
		static $updated = false;
		if(!$updated && $this->isnew) {
			global $_G;
			C::t('common_member_status')->update($_G['uid'], array('lastip' => $_G['clientip'], 'port' => $_G['remoteport'], 'lastactivity' => TIMESTAMP, 'lastvisit' => TIMESTAMP));
			dsetcookie('ulastactivity', TIMESTAMP.'|'.getuserprofile('invisible'), 31536000);
			$updated = true;
		}
		return $updated;
	}
}

?>