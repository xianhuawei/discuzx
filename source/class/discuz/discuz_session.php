<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_session.php 33707 2013-08-06 08:22:12Z andyzheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class discuz_session {

	public $sid = null;
	public $var;
	public $isnew = false;
	private $newguest = array('sid' => 0, 'ip1' => 0, 'ip2' => 0, 'ip3' => 0, 'ip4' => 0,
		'uid' => 0, 'username' => '', 'groupid' => 7, 'invisible' => 0, 'action' => 0,
		'lastactivity' => 0, 'fid' => 0, 'tid' => 0, 'lastolupdate' => 0);

	private $old =  array('sid' =>  '', 'ip' =>  '', 'uid' =>  0);

	private $table;
	private $old_var;

	public function __construct($sid = '', $ip = '', $uid = 0) {
		$this->old = array('sid' =>  $sid, 'ip' =>  $ip, 'uid' =>  $uid);
		$this->var = $this->newguest;

		$this->table = C::t('common_session');

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
		$this->old = array('sid' =>  $sid, 'ip' =>  $ip, 'uid' =>  $uid);
		$session = array();
		if($sid) {
			$session = $this->table->fetch($sid, $ip, $uid);
		}

		if(empty($session) || $session['uid'] != $uid) {
			$session = $this->create($ip, $uid);
		}

		$this->var = $session;
		$this->old_var	= $session;	// 原来的session
		$this->sid = $session['sid'];
	}

	public function create($ip, $uid) {

		$this->isnew = true;
		$this->var = $this->newguest;
		$this->set('sid', random(6));
		$this->set('uid', $uid);
		$this->set('ip', $ip);
		$uid && $this->set('invisible', getuserprofile('invisible'));
		$this->set('lastactivity', time());
		$this->sid = $this->var['sid'];

		return $this->var;
	}

	public function delete() {

		return $this->table->delete_by_session($this->var, getglobal('setting/onlinehold'), 60);

	}

	public function update() {
		if($this->sid !== null) {

			if($this->isnew) {
				$this->delete();
				$this->table->insert($this->var, false, false, true);
			} else {
				$is_update 	= false;
				//session不变时 不更新 
				foreach($this->var as $key=>$val){
					if($this->old_var[$key]!=$val){
						if($val==0 || $val=='' || $val==null){
							if( !($this->old_var[$key]==0 || $this->old_var[$key]=='' || $this->old_var[$key]==null) ){
								$is_update 	= true;
							}
						}else if($key=='lastactivity' || $key=='lastolupdate'){
							if( $val>$this->old_var[$key] && $val-20>$this->old_var[$key] ){
								$is_update 	= true;
							}else if($val<$this->old_var[$key] && $val+20<$this->old_var[$key] ){
								$is_update 	= true;
							}
						}else{
							$is_update 	= true;
						}
					}
				}
				if($is_update){
					$this->table->update($this->var['sid'], $this->var);
				}
			}
			setglobal('sessoin', $this->var);
			dsetcookie('sid', $this->sid, 86400);
		}
	}

	/**
	 * 取在线用户数量
	 *
	 * @param int $type 0=全部 1=会员 2=游客
	 */
	public function count($type = 0) {
		return $this->table->count($type);
	}

	/**
	 * 在线数据
	 * @param int $ismember 是否为会员 0所有 1仅会员 2仅游客
	 * @param int $invisible 是否过滤隐身 0所有 1仅隐身 2仅非隐身
	 * @param int $start 开始条数
	 * @param int $limit 数据条数
	 * @return array 在线数据
	 */
	public function fetch_member($ismember = 0, $invisible = 0, $start = 0, $limit = 0) {
		return $this->table->fetch_member($ismember, $invisible, $start, $limit);
	}

	/**
	 * 统计在线可见用户数
	 */
	public function count_invisible($type = 1) {
		return $this->table->count_invisible($type);
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
		return $this->table->update_by_ipban($ip1, $ip2, $ip3, $ip4);
	}

	/**
	 * 更改表的最大值
	 * @param int $max_rows 最大值
	 * @return bool
	 */
	public function update_max_rows($max_rows) {
		return $this->table->update_max_rows($max_rows);
	}

	/**
	 * 清空表数据
	 * @return bool
	 */
	public function clear() {
		return $this->table->clear();
	}

	/**
	 * 根据fid 统计
	 * @param int $fid
	 * @return int
	 */
	public function count_by_fid($fid) {
		return $this->table->count_by_fid($fid);
	}

	/**
	 * 根据fid获取数据
	 * @param int $fid
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_fid($fid, $limit) {
		$data = array();
		if(!($fid = dintval($fid))) {
			return $data;
		}
		$onlinelist = getglobal('cache/onlinelist');
		foreach($this->table->fetch_all_by_fid($fid, $limit) as $online) {
			if($online['uid']) {
				$online['icon'] = isset($onlinelist[$online['groupid']]) ? $onlinelist[$online['groupid']] : $onlinelist[0];
			} else {
				$online['icon'] = $onlinelist[7];
				$online['username'] = $onlinelist['guest'];
			}
			$online['lastactivity'] = dgmdate($online['lastactivity'], 't');
			$data[] = $online;
		}
		return $data;
	}

	/**
	 * 根据会员ID获取session信息
	 * @param int $uid 会员ID
	 * @return mixed
	 */
	public function fetch_by_uid($uid) {
		return $this->table->fetch_by_uid($uid);
	}

	/**
	 * 根据批量会员ID获取session信息
	 * @param array $uids
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_uid($uids, $start = 0, $limit = 0) {
		return $this->table->fetch_all_by_uid($uids, $start, $limit);
	}

	/**
	 * 根据UID更新session信息
	 * @param int $uid
	 * @param array $data
	 * @return bool
	 */
	public function update_by_uid($uid, $data) {
		return $this->table->update_by_uid($uid, $data);
	}

	/**
	 * 根据IP统计数据
	 * @param string $ip
	 * @return int
	 */
	public function count_by_ip($ip) {
		return $this->table->count_by_ip($ip);
	}

	/**
	 * 根据IP获取数据
	 * @param string $ip
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_ip($ip, $start = 0, $limit = 0) {
		return $this->table->fetch_all_by_ip($ip, $start, $limit);
	}

	public static function updatesession() {
		static $updated = false;
		if(!$updated) {
			global $_G;
			if($_G['uid']) {
				if($_G['cookie']['ulastactivity']) {
					$ulastactivity = authcode($_G['cookie']['ulastactivity'], 'DECODE');
				} else {
					$ulastactivity = getuserprofile('lastactivity');
					dsetcookie('ulastactivity', authcode($ulastactivity, 'ENCODE'), 31536000);
				}
			}
			//note 更新在线时间
			$oltimespan = $_G['setting']['oltimespan'];
			$lastolupdate = C::app()->session->var['lastolupdate'];
			if($_G['uid'] && $oltimespan && TIMESTAMP - ($lastolupdate ? $lastolupdate : $ulastactivity) > $oltimespan * 60) {
				$isinsert = false; //是否进行数据库insert操作
				if(C::app()->session->isnew) { //当是新session时，使用数据库中的值进行逻辑比较,因为使用cookie的ulastactivity值判断会产生漏洞
					$oldata = C::t('common_onlinetime')->fetch($_G['uid']); //从数据库中取值，仅在新session时进行此查询
					if(empty($oldata)) {
						$isinsert = true; //需要进行数据库插入操作
					} else if(TIMESTAMP - $oldata['lastupdate'] > $oltimespan * 60) { //使用数据库中的值进行逻辑比较
						C::t('common_onlinetime')->update_onlinetime($_G['uid'], $oltimespan, $oltimespan, TIMESTAMP); //更新在线时间
					}
				} else { //非新session时，不进行上面的查询操作，减少一个查询
					$isinsert = !C::t('common_onlinetime')->update_onlinetime($_G['uid'], $oltimespan, $oltimespan, TIMESTAMP); //更新在线时间
				}
				//进行数据库insert操作
				if($isinsert) {
					C::t('common_onlinetime')->insert(array(
						'uid' => $_G['uid'],
						'thismonth' => $oltimespan,
						'total' => $oltimespan,
						'lastupdate' => TIMESTAMP,
					));
				}
				C::app()->session->set('lastolupdate', TIMESTAMP);
			}
			foreach(C::app()->session->var as $k => $v) {
				if(isset($_G['member'][$k]) && $k != 'lastactivity') {
					C::app()->session->set($k, $_G['member'][$k]);
				}
			}

			foreach($_G['action'] as $k => $v) {
				C::app()->session->set($k, $v);
			}
			
			C::app()->session->update();

			if($_G['uid'] && TIMESTAMP - $ulastactivity > 21600) {
				if($oltimespan && TIMESTAMP - $ulastactivity > 43200) {
					$onlinetime = C::t('common_onlinetime')->fetch($_G['uid']);
					C::t('common_member_count')->update($_G['uid'], array('oltime' => round(intval($onlinetime['total']) / 60)));
				}
				dsetcookie('ulastactivity', authcode(TIMESTAMP, 'ENCODE'), 31536000);
				C::t('common_member_status')->update($_G['uid'], array('lastip' => $_G['clientip'], 'port' => $_G['remoteport'], 'lastactivity' => TIMESTAMP, 'lastvisit' => TIMESTAMP));
			}
			$updated = true;
		}
		return $updated;
	}
}

?>