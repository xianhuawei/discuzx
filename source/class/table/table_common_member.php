<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_member.php 31849 2012-10-17 04:39:16Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member extends discuz_table_archive
{
	public function __construct() {

		$this->_table = 'common_member';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_';

		parent::__construct();
	}

	/**
	 * 更新会员积分
	 * @param int $uid
	 * @param int $credits
	 */
	public function update_credits($uid, $credits) {
		if($uid) {
			$data = array('credits'=>intval($credits));
			DB::update($this->_table, $data, array('uid' => intval($uid)), 'UNBUFFERED');
			$this->update_cache($uid, $data);
		}
	}

	public function update_by_groupid($groupid, $data) {
		$uids = array();
		$groupid = dintval($groupid, true);
		if($groupid && $this->_allowmem) {
			$uids = array_keys($this->fetch_all_by_groupid($groupid));
		}
		if($groupid && !empty($data) && is_array($data)) {
			DB::update($this->_table, $data, DB::field('groupid', $groupid), 'UNBUFFERED');
		}
		if($uids) {
			$this->update_cache($uids, $data);
		}
	}

	/**
	 * 累加指定会员的某统一数据的值
	 * @param array $uids 会员ID
	 * @param array $setarr 要累加的字段和累加值
	 */
	public function increase($uids, $setarr) {
		$uids = dintval((array)$uids, true);
		$sql = array();
		$allowkey = array('credits', 'newpm', 'newprompt');
		foreach($setarr as $key => $value) {
			if(($value = intval($value)) && in_array($key, $allowkey)) {
				$sql[] = "`$key`=`$key`+'$value'";
			}
		}
		if(!empty($sql)){
			DB::query("UPDATE ".DB::table($this->_table)." SET ".implode(',', $sql)." WHERE uid IN (".dimplode($uids).")", 'UNBUFFERED');
			$this->increase_cache($uids, $setarr);
		}
	}

	/**
	 * 根据会员名获取会员数据
	 * @param string $username 会员名
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array
	 */
	public function fetch_by_username($username, $fetch_archive = 0) {
		$user = array();
		if($username) {
			$user = DB::fetch_first('SELECT * FROM %t WHERE username=%s', array($this->_table, $username));
			if(isset($this->membersplit) && $fetch_archive && empty($user)) {
				$user = C::t($this->_table.'_archive')->fetch_by_username($username, 0);
			}
		}
		return $user;
	}

	/**
	 * 根据多个会员名获取会员数据，会员名为返回数组的主键
	 * @param array $usernames 会员名数组
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array 多会员数据数组
	 */
	public function fetch_all_by_username($usernames, $fetch_archive = 1) {
		$users = array();
		if(!empty($usernames)) {
			$users = DB::fetch_all('SELECT * FROM %t WHERE username IN (%n)', array($this->_table, (array)$usernames), 'username');
			if(isset($this->membersplit) && $fetch_archive && count($usernames) !== count($users)) {
				$users += C::t($this->_table.'_archive')->fetch_all_by_username($usernames, 0);
			}
		}
		return $users;
	}

	/**
	 * 根据会员名只获取会员UID
	 * @param string $username 会员名
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return int 会员UID
	 */
	public function fetch_uid_by_username($username, $fetch_archive = 0) {
		$uid = 0;
		if($username) {
			$uid = DB::result_first('SELECT uid FROM %t WHERE username=%s', array($this->_table, $username));
			if(isset($this->membersplit) && $fetch_archive && empty($uid)) {
				$uid = C::t($this->_table.'_archive')->fetch_uid_by_username($username, 0);
			}
		}
		return $uid;
	}

	/**
	 * 根据多个会员名获取会员UID，会员名为返回数组的主键
	 * @param array $usernames 会员名数组
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array 多会员UID数组
	 */
	public function fetch_all_uid_by_username($usernames, $fetch_archive = 1) {
		$uids = array();
		if($usernames) {
			foreach($this->fetch_all_by_username($usernames, $fetch_archive) as $username => $value) {
				$uids[$username] = $value['uid'];
			}
		}
		return $uids;
	}

	/**
	 * 获取指定管理组ID的所有会员
	 * @param int|array $adminids 管理组ID
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array
	 */
	public function fetch_all_by_adminid($adminids, $fetch_archive = 1) {
		$users = array();
		$adminids = dintval((array)$adminids, true);
		if($adminids) {
			$users = DB::fetch_all('SELECT * FROM %t WHERE adminid IN (%n) ORDER BY adminid, uid', array($this->_table, (array)$adminids), $this->_pk);
			if(isset($this->membersplit) && $fetch_archive) {
				$users += C::t($this->_table.'_archive')->fetch_all_by_adminid($adminids, 0);
			}
		}
		return $users;
	}

	/**
	 * 根据多个会员ID获取会员名，会员ID为返回数组的主键
	 * @param array $uids 会员ID数组
	 * @return array 多会员名数组
	 */
	public function fetch_all_username_by_uid($uids) {
		$users = array();
		if(($uids = dintval($uids, true))) {
			foreach($this->fetch_all($uids) as $uid => $value) {
				$users[$uid] = $value['username'];
			}
		}
		return $users;
	}

	/**
	 * 统计指定会员组的个数
	 * @param int $groupid 会员组ID
	 * @return array
	 */
	public function count_by_groupid($groupid) {
		return $groupid ? DB::result_first('SELECT COUNT(*) FROM %t WHERE '.DB::field('groupid', $groupid), array($this->_table)) : 0;
	}

	/**
	 * 根据多个会员ID获取会员名，会员ID为返回数组的主键
	 * @param array $uids 会员ID数组
	 * @return array 多会员名数组
	 */
	public function fetch_all_by_groupid($groupid, $start = 0, $limit = 0) {
		$users = array();
		if(($groupid = dintval($groupid, true))) {
			$users = DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('groupid', $groupid).' '.DB::limit($start, $limit), null, 'uid');
		}
		return $users;
	}

	/**
	 * 获取所有的会员组ID
	 * @return array
	 */
	public function fetch_all_groupid() {
		return DB::fetch_all('SELECT DISTINCT(groupid) FROM '.DB::table($this->_table), null, 'groupid');
	}

	/**
	 * 获取管理权限相关人员的数据
	 * @param int $val 数据值
	 * @param string(=,like,in,+,-,|,&,>,<,<>,<=,>=) $glue 连接符 参考DB::field的$glue
	 * @return array
	 */
	public function fetch_all_by_allowadmincp($val, $glue = '=') {
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('allowadmincp', intval($val), $glue), NULL, 'uid');
	}

	/**
	 * 将管理字段的第一位标记为1
	 * @param array $uids 会员ID
	 * @return bool
	 */
	public function update_admincp_manage($uids) {
		if(($uids = dintval($uids, true))) {
			$data = DB::query('UPDATE '.DB::table($this->_table).' SET allowadmincp=allowadmincp | 1 WHERE uid IN ('.dimplode($uids).')');
			$this->reset_cache($uids);
			return $data;
		}
		return false;
	}

	/**
	 * 将管理字段的第一位标记为0
	 * @param array $uids 会员ID
	 * @return bool
	 */
	public function clean_admincp_manage($uids) {
		if(($uids = dintval($uids, true))) {
			$data = DB::query('UPDATE '.DB::table($this->_table).' SET allowadmincp=allowadmincp & 0xFE WHERE uid IN ('.dimplode($uids).')');
			$this->reset_cache($uids);
			return $data;
		}
		return false;
	}

	/**
	 * 获取指定过期时间的禁言用户
	 * @param int $timestamp 过期时间
	 * @return array
	 */
	public function fetch_all_ban_by_groupexpiry($timestamp) {
		return ($timestamp = intval($timestamp)) ? DB::fetch_all("SELECT uid, groupid, credits FROM ".DB::table($this->_table)." WHERE groupid IN ('4', '5') AND groupexpiry>'0' AND groupexpiry<'$timestamp'", array(), 'uid') : array();
	}

	/**
	 * 统计会员数
	 * @param int $fetch_archive 0：只查询当前表，1：
	 * @return int
	 */
	public function count($fetch_archive = 1) {
		$count = DB::result_first('SELECT COUNT(*) FROM %t', array($this->_table));
		if(isset($this->membersplit) && $fetch_archive) {
			$count += C::t($this->_table.'_archive')->count(0);
		}
		//增加QQ互联临时用户数
		$count += intval(DB::result_first('SELECT COUNT(*) FROM '.DB::table('common_connect_guest'), null, true));
		return $count;
	}

	/**
	 * 获取指定邮箱会员的数据
	 * @param string $email email
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array
	 */
	public function fetch_by_email($email, $fetch_archive = 0) {
		$user = array();
		if($email) {
			$user = DB::fetch_first('SELECT * FROM %t WHERE email=%s', array($this->_table, $email));
			if(isset($this->membersplit) && $fetch_archive && empty($user)) {
				$user = C::t($this->_table.'_archive')->fetch_by_email($email, 0);
			}
		}
		return $user;
	}

	/**
	 * 通过邮箱获取会员数据
	 * @param array $emails 邮箱数组
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return array
	 */
	public function fetch_all_by_email($emails, $fetch_archive = 1) {
		$users = array();
		if(!empty($emails)) {
			$users = DB::fetch_all('SELECT * FROM %t WHERE %i', array($this->_table, DB::field('email', $emails)), 'email');
			if(isset($this->membersplit) && $fetch_archive && count($emails) !== count($users)) {
				$users += C::t($this->_table.'_archive')->fetch_all_by_email($emails, 0);
			}
		}
		return $users;
	}

	/**
	 * 统计指定邮箱的会员数
	 * @param string $email
	 * @param int $fetch_archive 0：只查询当前表，1：查询当前表和存档表
	 * @return int
	 */
	public function count_by_email($email, $fetch_archive = 0) {
		$count = 0;
		if($email) {
			$count = DB::result_first('SELECT COUNT(*) FROM %t WHERE email=%s', array($this->_table, $email));
			if(isset($this->membersplit) && $fetch_archive) {
				$count += C::t($this->_table.'_archive')->count_by_email($email, 0);
			}
		}
		return $count;
	}

	/**
	 * 根据会员名前缀模糊搜索
	 * @param string $username 要搜索的会员名
	 * @param int $start 开始数
	 * @param int $limit 长度
	 * @param string $field 排序字段
	 * @param string $sort 是否排序：ASC|DESC
	 * @return array
	 */
	public function fetch_all_by_like_username($username, $start = 0, $limit = 0) {
		$data = array();
		if($username) {
			$data = DB::fetch_all('SELECT * FROM %t WHERE username LIKE %s'.DB::limit($start, $limit), array($this->_table, stripsearchkey($username).'%'), 'uid');
		}
		return $data;
	}

	/**
	 * 统计模糊搜索会员名的结果数
	 * @param string $username 会员名
	 * @return int 结果数
	 */
	public function count_by_like_username($username) {
		return !empty($username) ? DB::result_first('SELECT COUNT(*) FROM %t WHERE username LIKE %s', array($this->_table, stripsearchkey($username).'%')) : 0;
	}


	/**
	 * 获取站点运行时间
	 * @return int 运行天数
	 */
	public function fetch_runtime() {
		return DB::result_first("SELECT (MAX(regdate)-MIN(regdate))/86400 AS runtime FROM ".DB::table($this->_table));
	}

	/**
	 * 统计管理员的个数
	 * @return int 会员数
	 */
	public function count_admins() {
		return DB::result_first("SELECT COUNT(*) FROM ".DB::table($this->_table)." WHERE adminid<>'0' AND adminid<>'-1'");
	}

	/**
	 * 统计指定注册时间以后的注册会员数
	 * @param int $timestamp 注册时间
	 * @return int 会员数
	 */
	public function count_by_regdate($timestamp) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE regdate>%d', array($this->_table, $timestamp));
	}

	/**
	 * misc_stat.php文件使用，获取会员列表
	 * @param string $username 会员名
	 * @param string $orderby 排序字段
	 * @param string $sort  是否排序：ASC|DESC
	 * @param int $start 开始数
	 * @param int $limit 长度
	 * @return array
	 */
	public function fetch_all_stat_memberlist($username, $orderby = '', $sort = '', $start = 0, $limit =  0) {
		$orderby = in_array($orderby, array('uid','credits','regdate', 'gender','username','posts','lastvisit'), true) ? $orderby : 'uid';
		$sql = '';

		$sql = !empty($username) ? " WHERE username LIKE '".addslashes(stripsearchkey($username))."%'" : '';

		$memberlist = array();
		$query = DB::query("SELECT m.uid, m.username, mp.gender, m.email, m.regdate, ms.lastvisit, mc.posts, m.credits
			FROM ".DB::table($this->_table)." m
			LEFT JOIN ".DB::table('common_member_profile')." mp ON mp.uid=m.uid
			LEFT JOIN ".DB::table('common_member_status')." ms ON ms.uid=m.uid
			LEFT JOIN ".DB::table('common_member_count')." mc ON mc.uid=m.uid
			$sql ORDER BY ".DB::order($orderby, $sort).DB::limit($start, $limit));
		while($member = DB::fetch($query)) {
			$member['usernameenc'] = rawurlencode($member['username']);
			$member['regdate'] = dgmdate($member['regdate']);
			$member['lastvisit'] = dgmdate($member['lastvisit']);
			$memberlist[$member['uid']] = $member;
		}
		return $memberlist;
	}

	/**
	 * 删除没有验证的指定会员ID的数据
	 * @param array $uids 没有验证的会员ID
	 */
	public function delete_no_validate($uids) {
		if(($uids = dintval($uids, true))) {
			$delnum = $this->delete($uids);
			C::t('common_member_field_forum')->delete($uids);
			C::t('common_member_field_home')->delete($uids);
			C::t('common_member_status')->delete($uids);
			C::t('common_member_count')->delete($uids);
			C::t('common_member_profile')->delete($uids);
			C::t('common_member_validate')->delete($uids);
			return $delnum;
		}
		return false;
	}

	/**
	 * 添加新会员
	 * @param int $uid 会员ID
	 * @param string $username 会员名
	 * @param string $email 邮件地址
	 * @param string $ip IP地址
	 * @param int $groupid 用户组ID
	 * @param array $extdata 如： 目前有三个KEY:emailstatus、profile、credits;积分数组：$extdata['credits'] 共9个值，其中$credits[0]为总积分值，$credits[1]为extcredits1积分值，以此类推。
	 * @param int $adminid 管理组ID
	 */
	public function insert($uid, $username, $password, $email, $ip, $groupid, $extdata, $adminid = 0) {
		if(($uid = dintval($uid))) {
			$credits = isset($extdata['credits']) ? $extdata['credits'] : array();
			$profile = isset($extdata['profile']) ? $extdata['profile'] : array();
			$profile['uid'] = $uid;
			$base = array(
				'uid' => $uid,
				'username' => (string)$username,
				'password' => (string)$password,
				'email' => (string)$email,
				'adminid' => intval($adminid),
				'groupid' => intval($groupid),
				'regdate' => TIMESTAMP,
				'emailstatus' => intval($extdata['emailstatus']),
				'credits' => dintval($credits[0]),
				'timeoffset' => 9999
			);
			$status = array(
				'uid' => $uid,
				'regip' => (string)$ip,
				'lastip' => (string)$ip,
				'lastvisit' => TIMESTAMP,
				'lastactivity' => TIMESTAMP,
				'lastpost' => 0,
				'lastsendmail' => 0
			);
			$count = array(
				'uid' => $uid,
				'extcredits1' => dintval($credits[1]),
				'extcredits2' => dintval($credits[2]),
				'extcredits3' => dintval($credits[3]),
				'extcredits4' => dintval($credits[4]),
				'extcredits5' => dintval($credits[5]),
				'extcredits6' => dintval($credits[6]),
				'extcredits7' => dintval($credits[7]),
				'extcredits8' => dintval($credits[8])
			);
			$ext = array('uid' => $uid);
			parent::insert($base, false, true);
			C::t('common_member_status')->insert($status, false, true);
			C::t('common_member_count')->insert($count, false, true);
			C::t('common_member_profile')->insert($profile, false, true);
			C::t('common_member_field_forum')->insert($ext, false, true);
			C::t('common_member_field_home')->insert($ext, false, true);
			manyoulog('user', $uid, 'add');
		}
	}

	/**
	 * 依据主键删除某条记录
	 * @param string|int $val 主键值
	 * @return boolean
	 */
	public function delete($val, $unbuffered = false, $fetch_archive = 0) {
		$ret = false;
		if(($val = dintval($val, true))) {
			$ret = parent::delete($val, $unbuffered, $fetch_archive);
			if($this->_allowmem) { //此处需要判断是否有其它表缓存打开，如主题和回帖
				$data = ($data = memory('get', 'deleteuids')) === false ? array() : $data;
				foreach((array)$val as $uid) {
					$data[$uid] = $uid;
				}
				memory('set', 'deleteuids', $data, 86400*2); //删除的用户缓存2天的时间
			}
		}
		return $ret;
	}

	/**
	 * 统计可优化的用户数
	 * @return int 可优化的用户数
	 */
	public function count_zombie() {
		$dateline = TIMESTAMP - 7776000;//60*60*24*90
		return DB::result_first('SELECT count(*) FROM %t mc, %t ms WHERE mc.posts<5 AND ms.lastvisit<%d AND ms.uid=mc.uid', array('common_member_count', 'common_member_status', $dateline));
	}

	/**
	 * 优化用户表
	 * @param int $splitnum 一次优化处理的用户个数
	 * @return bool true为可继续优化，false为没有可以优化的用户
	 */
	public function split($splitnum, $iscron = false) {
		loadcache('membersplitdata');
		@set_time_limit(0);
		discuz_database_safecheck::setconfigstatus(0);
		$dateline = TIMESTAMP - 7776000;//60*60*24*90
		$temptablename = DB::table('common_member_temp___');
		if(!DB::fetch_first("SHOW TABLES LIKE '$temptablename'")) {
			DB::query("CREATE TABLE $temptablename (`uid` int(10) NOT NULL DEFAULT 0,PRIMARY KEY (`uid`)) ENGINE=InnoDB;");
		}
		$splitnum = max(1, intval($splitnum));
		if(!DB::result_first('SELECT COUNT(*) FROM '.$temptablename)) {
			DB::query('INSERT INTO '.$temptablename.' (`uid`) SELECT ms.uid AS uid FROM %t mc, %t ms WHERE mc.posts<5 AND ms.lastvisit<%d AND mc.uid=ms.uid ORDER BY ms.lastvisit LIMIT %d', array('common_member_count', 'common_member_status', $dateline, $splitnum));
		}

		if(DB::result_first('SELECT COUNT(*) FROM '.$temptablename)) {


			//计划任务时不关闭索引
			if(!$iscron && getglobal('setting/memberspliting') === null) {
				$this->switch_keys('disable');
			}
			$uidlist = DB::fetch_all('SELECT uid FROM '.$temptablename, null, 'uid');
			$uids = dimplode(array_keys($uidlist));
			//用户存档
			$movesql = 'REPLACE INTO %t SELECT * FROM %t WHERE uid IN ('.$uids.')';
			$deletesql = 'DELETE FROM %t WHERE uid IN ('.$uids.')';
			if(DB::query($movesql, array('common_member_archive', 'common_member'), false, true)) {
				DB::query($deletesql, array('common_member'), false, true);
			}
			if(DB::query($movesql, array('common_member_profile_archive', 'common_member_profile'), false, true)) {
				DB::query($deletesql, array('common_member_profile'), false, true);
			}
			if(DB::query($movesql, array('common_member_field_forum_archive', 'common_member_field_forum'), false, true)) {
				DB::query($deletesql, array('common_member_field_forum'), false, true);
			}
			if(DB::query($movesql, array('common_member_field_home_archive', 'common_member_field_home'), false, true)) {
				DB::query($deletesql, array('common_member_field_home'), false, true);
			}
			if(DB::query($movesql, array('common_member_status_archive', 'common_member_status'), false, true)) {
				DB::query($deletesql, array('common_member_status'), false, true);
			}
			if(DB::query($movesql, array('common_member_count_archive', 'common_member_count'), false, true)) {
				DB::query($deletesql, array('common_member_count'), false, true);
			}

			DB::query('DROP TABLE '.$temptablename);
			$membersplitdata = getglobal('cache/membersplitdata');
			$zombiecount = $membersplitdata['zombiecount'] - $splitnum;
			if($zombiecount < 0) {
				$zombiecount = 0;
			}
			savecache('membersplitdata', array('membercount' => $membersplitdata['membercount'], 'zombiecount' => $zombiecount, 'dateline' => TIMESTAMP));
			C::t('common_setting')->delete('memberspliting');
			//可继续优化
			return true;
		} else {
			DB::query('DROP TABLE '.$temptablename);
			if(!$iscron) {
				$this->switch_keys('enable');
				C::t('common_member_profile')->optimize();
				C::t('common_member_field_forum')->optimize();
				C::t('common_member_field_home')->optimize();
			}
			return false;
		}
	}

	public function switch_keys($type) {
		if($type === 'disable') {
			$type = 'DISABLE';
			C::t('common_setting')->update_batch(array('memberspliting'=>1, 'membersplit'=>1));
		} else {
			$type = 'ENABLE';
			C::t('common_setting')->delete('memberspliting');
		}

		require_once libfile('function/cache');
		updatecache('setting');
	}

	/**
	 * 统计总积分大于某值的会员数量
	 * @param int $credits 积分值
	 * @return int
	 */
	public function count_by_credits($credits) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE credits>%d', array($this->_table, $credits));
	}

	/**
	 * 前台用户搜索功能
	 * @param array $wherearr
	 * @param array $fromarr
	 * @param int $start
	 * @param type $limit
	 * @return array
	 */
	public function fetch_all_for_spacecp_search($wherearr, $fromarr, $start = 0, $limit = 100) {
		if(!$start && !$limit) {
			$start = 100;
		}
		if(!$wherearr) {
			$wherearr[] = '1';
		}
		if(!$fromarr) {
			$fromarr[] = DB::table($this->_table);
		}
		return DB::fetch_all("SELECT s.* FROM ".implode(',', $fromarr)." WHERE ".implode(' AND ', $wherearr).DB::limit($start, $limit));
	}

	/**
	 * 仅ranklist使用
	 * @param int $offset
	 * @param int $limit
	 * @param string $orderby
	 * @return array
	 */
	public function fetch_all_girls_for_ranklist($offset = 0, $limit = 20, $orderby = 'ORDER BY s.unitprice DESC, s.credit DESC') {
		$members = array();
		$query = DB::query("SELECT m.uid, m.username, mc.*, mp.gender
			FROM ".DB::table('common_member')." m
			LEFT JOIN ".DB::table('home_show')." s ON s.uid=m.uid
			LEFT JOIN ".DB::table('common_member_profile')." mp ON mp.uid=m.uid
			LEFT JOIN ".DB::table('common_member_count')." mc ON mc.uid=m.uid
			WHERE mp.gender='2'
			ORDER BY $orderby
			LIMIT $offset, $limit");
		while($member = DB::fetch($query)) {
			$member['avatar'] = avatar($member['uid'], 'small');
			$members[] = $member;
		}
		return $members;
	}


	/**
	 * 仅ranklist使用
	 * @param int $num
	 * @param int|string $orderby
	 * @return array
	 */
	public function fetch_all_order_by_credit_for_ranklist($num, $orderby) {
		$data = array();
		if(!($num = intval($num))) {
			return $data;
		}
		if($orderby === 'all') {
			$sql = "SELECT m.uid,m.username,m.videophotostatus,m.groupid,m.credits,field.spacenote FROM ".DB::table('common_member')." m
				LEFT JOIN ".DB::table('common_member_field_home')." field ON field.uid=m.uid
				ORDER BY m.credits DESC LIMIT 0, $num";
		} else {
			$orderby = intval($orderby);
			$orderby = in_array($orderby, array(1, 2, 3, 4, 5, 6, 7, 8)) ? $orderby : 1;
			$sql = "SELECT m.uid,m.username,m.videophotostatus,m.groupid, mc.extcredits$orderby AS extcredits
				FROM ".DB::table('common_member')." m
				LEFT JOIN ".DB::table('common_member_count')." mc ON mc.uid=m.uid WHERE mc.extcredits$orderby>0
				ORDER BY extcredits$orderby DESC LIMIT 0, $num";
		}

		$query = DB::query($sql);
		while($result = DB::fetch($query)) {
			$data[] = $result;
		}

		return $data;

	}

	/**
	 * 仅ranklist使用
	 * @param int $num
	 * @return array
	 */
	public function fetch_all_order_by_friendnum_for_ranklist($num) {

		$num = intval($num);
		$num = $num ? $num : 20;
		$data = $users = $oldorder = array();
		$query = DB::query('SELECT uid, friends FROM '.DB::table('common_member_count').' WHERE friends>0 ORDER BY friends DESC LIMIT '.$num);
		while($user = DB::fetch($query)) {
			$users[$user['uid']] = $user;
			$oldorder[] = $user['uid'];
		}
		$uids = array_keys($users);
		if($uids) {
			$query = DB::query('SELECT m.uid, m.username, m.videophotostatus, m.groupid, field.spacenote
				FROM '.DB::table('common_member')." m
				LEFT JOIN ".DB::table('common_member_field_home')." field ON m.uid=field.uid
				WHERE m.uid IN (".dimplode($uids).")");
			while($value = DB::fetch($query)) {
				$users[$value['uid']] = array_merge($users[$value['uid']], $value);
			}

			//还原顺序
			foreach($oldorder as $uid) {
				$data[] = $users[$uid];
			}

		}
		return $data;

	}

	/**
	 * 获取最大的uid
	 * @return int
	 */
	public function max_uid() {
		return DB::result_first('SELECT MAX(uid) FROM %t', array($this->_table));
	}

	/**
	 * 获取部分用户信息 by uid
	 * @param int $from 起始>uid
	 * @param int $limit 获取的数量
	 * @return array
	 */
	public function range_by_uid($from, $limit) {
		return DB::fetch_all('SELECT * FROM %t WHERE uid >= %d ORDER BY uid LIMIT %d', array($this->_table, $from, $limit), $this->_pk);
	}

	public function update_groupid_by_groupid($source, $target) {
		return DB::query('UPDATE %t SET groupid=%d WHERE adminid <= 0 AND groupid=%d', array($this->_table, $target, $source));
	}
}

?>