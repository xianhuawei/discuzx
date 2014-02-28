<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_block_permission.php 27846 2012-02-15 09:04:33Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_block_permission extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_block_permission';
		$this->_pk    = '';

		parent::__construct();
	}

	/**
	 * 依据主键值， 取得一条记录
	 * @param int $bid 模块ID
	 * @param int $uid 会员ID
	 * @return array
	 */
	public function fetch($bid, $uid){
		return ($bid = dintval($bid)) && ($uid = dintval($uid)) ? DB::fetch_first('SELECT * FROM %t WHERE bid=%d AND uid=%d', array($this->_table, $bid, $uid)) : array();
	}

	/**
	 * 依据模块ID， 返回一组数据
	 * @param int|array $bid 主键值的数组
	 * @param int|array $uid 会员ID
	 * @return array
	 */
	public function fetch_all_by_bid($bid, $uid = 0) {
		return ($bid = dintval($bid, true)) ? DB::fetch_all('SELECT * FROM %t WHERE bid=%d'.($uid ? ' AND '.DB::field('uid', $uid) : '').' ORDER BY inheritedtplname', array($this->_table, $bid), 'uid') : array();
	}


	/**
	 * 获取指定会员的数据
	 * @param array $uids 指定会员
	 * @param bool $flag 是否是承继的权限，true为所有，false为非承继权限
	 * @param string $sort 排序
	 * @param int $start 开始条数
	 * @param int $limit 数据量
	 * @return array
	 */
	public function fetch_all_by_uid($uids, $flag = true, $sort = 'ASC', $start = 0, $limit = 0) {
		$wherearr = array();
		$sort = $sort === 'ASC' ? 'ASC' : 'DESC';
		if(($uids = dintval($uids))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if(!$flag) {
			$wherearr[] = 'inheritedtplname = \'\'';
		}
		$where = $wherearr ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).$where.' ORDER BY uid '.$sort.', inheritedtplname'.DB::limit($start, $limit), NULL, ($uids && !is_array($uids)) ? 'bid' : '');
	}

	/**
	 * 权限统计数据
	 * @param array $uids 指定会员
	 * @param bool $flag 是否是承继的权限，true为所有，false为非承继权限
	 */
	public function count_by_uids($uids, $flag) {
		$wherearr = array();
		if(($uids = dintval($uids, true))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if(!$flag) {
			$wherearr[] = 'inheritedtplname = \'\'';
		}
		$where = $wherearr ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).$where);
	}

	/**
	 * 获取指定会员的权限值
	 * @param int|array $uids 会员ID
	 * @return array
	 */
	public function fetch_permission_by_uid($uids) {
		return ($uids = dintval($uids, true)) ? DB::fetch_all('SELECT uid, sum(allowmanage) as allowmanage, sum(allowrecommend) as allowrecommend, sum(needverify) as needverify FROM '.DB::table($this->_table)." WHERE ".DB::field('uid', $uids)." GROUP BY uid", null, 'uid') : array();
	}

	/**
	 * 删除权限列表数据
	 * @param string|array $bid 模块ID
	 * @param int|array $uids 会员ID
	 * @param string|bool $inheritedtplname 页面标识,有字符串值表示页面标识,''表示所有非继承,TRUE所有继承权限,FALSE表示不限
	 * @return type
	 */
	public function delete_by_bid_uid_inheritedtplname($bid = false, $uids = false, $inheritedtplname = false) {
		$wherearr = array();
		if(($bid = dintval($bid, true))) {
			$wherearr[] = DB::field('bid', $bid);
		}
		if(($uids = dintval($uids, true))) {
			$wherearr[] = DB::field('uid', $uids);
		}
		if($inheritedtplname === true) {
			$wherearr[] = "inheritedtplname!=''";
		} elseif($inheritedtplname !== false && is_string($inheritedtplname)) {
			$wherearr[] = DB::field('inheritedtplname', $inheritedtplname);
		}
		return $wherearr ? DB::delete($this->_table, implode(' AND ', $wherearr)) : false;
	}


	/**
	 * 批量添加多人和多模块的权限
	 * @param array $users 用户权限数组，一个用户一条记录
	 * @param array $bids 模块ID
	 * @param string $tplname 继承自的模板名称
	 */
	public function insert_batch($users, $bids, $tplname = '') {
		$blockperms = array();
		if(!empty($users) && $bids = dintval($bids, true)){

			$uids = $notinherit = array();
			foreach($users as &$user) {
				if(($user['uid'] = dintval($user['uid']))) {
					$uids[] = $user['uid'];
				}
			}
			if(!empty($uids)) {
				//过滤掉手工添加的模块权限
				foreach($this->fetch_all_by_uid($uids, false) as $value) {
					if(in_array($value['bid'], $bids)) {
						$notinherit[$value['bid']][$value['uid']] = true;
					}
				}
			}
			foreach($users as $user) {
				if($user['uid']) {
					//用户权限中的继承优先
					$tplname = !empty($user['inheritedtplname']) ? $user['inheritedtplname'] : $tplname;
					foreach ($bids as $bid) {
						if(empty($notinherit[$bid][$user['uid']])) {
							$blockperms[] = "('$bid','$user[uid]','$user[allowmanage]','$user[allowrecommend]','$user[needverify]','$tplname')";
						}
					}
				}
			}
			//将用户和所有模块关联批量添加到模块权限表中，只添加替换继承的数据
			if($blockperms) {
				DB::query('REPLACE INTO '.DB::table($this->_table).' (bid,uid,allowmanage,allowrecommend,needverify,inheritedtplname) VALUES '.implode(',', $blockperms));
				return $uids;
			} else {
				return FALSE;
			}
		}
		return false;
	}

	/**
	 * 手工添加指定模块权限
	 * @param array $bid 模块ID
	 * @param array $users 用户权限数组
	 */
	public function insert_by_bid($bid, $users) {
		$sqlarr = $uids = array();
		$bid = intval($bid);
		if(!empty($bid) && !empty($users)) {
			foreach ($users as $v) {
				if(($v['uid'] = dintval($v['uid']))) {
					$sqlarr[] = "('$bid','$v[uid]','$v[allowmanage]','$v[allowrecommend]','$v[needverify]','')";
					$uids[] = $v['uid'];
				}
			}
			if(!empty($sqlarr)) {
				DB::query('REPLACE INTO '.DB::table($this->_table).' (bid,uid,allowmanage,allowrecommend,needverify,inheritedtplname) VALUES '.implode(',', $sqlarr));
			}
		}
		return $uids;
	}
}

?>