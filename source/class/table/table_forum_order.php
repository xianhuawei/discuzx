<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_order.php 29009 2012-03-22 07:37:36Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_order extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_order';
		$this->_pk    = 'orderid';

		parent::__construct();
	}

	/**
	 * 通过条件来统计订单数量
	 * @param int $uid
	 * @param string $status
	 * @param int $orderid
	 * @param string $email
	 * @param string $username 需要关联common_member表
	 * @param string $buyer
	 * @param string $admin
	 * @param int $submit_starttime
	 * @param int $submit_endtime
	 * @param int $confirm_starttime
	 * @param int $confirm_endtime
	 * @return int
	 */
	public function count_by_search($uid = null, $status = null, $orderid = null, $email = null, $username = null, $buyer = null, $admin = null, $submit_starttime = null, $submit_endtime = null, $confirm_starttime = null, $confirm_endtime = null) {
		$sql = '';
		$sql .= $uid !== null ? ' AND o.'.DB::field('uid', dintval($uid)) : '';
		$sql .= $status ? ' AND o.'.DB::field('status', $status) : '';
		$sql .= $orderid ? ' AND o.'.DB::field('orderid', $orderid) : '';
		$sql .= $email ? ' AND o.'.DB::field('email', $email) : '';
		$sql .= $username ? ' AND m.'.DB::field('username', $username) : '';
		$sql .= $buyer ? ' AND o.'.DB::field('buyer', $buyer) : '';
		$sql .= $admin ? ' AND o.'.DB::field('admin', $admin) : '';
		$sql .= $submit_starttime ? ' AND o.'.DB::field('submitdate', $submit_starttime, '>=') : '';
		$sql .= $submit_endtime ? ' AND o.'.DB::field('submitdate', $submit_endtime, '<') : '';
		$sql .= $confirm_starttime ? ' AND o.'.DB::field('confirmdate', $confirm_starttime, '>=') : '';
		$sql .= $confirm_endtime ? ' AND o.'.DB::field('confirmdate', $confirm_endtime, '<') : '';
		return DB::result_first('SELECT COUNT(*) FROM %t o'.(($uid !== 0) ? ', '.DB::table('common_member').' m WHERE o.uid=m.uid' : ' WHERE 1 ').' %i', array($this->_table, $sql));
	}

	/**
	 * 通过条件来查询数据
	 * @param int $uid
	 * @param string $status
	 * @param int $orderid
	 * @param string $email
	 * @param string $username 需要关联common_member表
	 * @param string $buyer
	 * @param string $admin
	 * @param int $submit_starttime
	 * @param int $submit_endtime
	 * @param int $confirm_starttime
	 * @param int $confirm_endtime
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_search($uid = null, $status = null, $orderid = null, $email = null, $username = null, $buyer = null, $admin = null, $submit_starttime = null, $submit_endtime = null, $confirm_starttime = null, $confirm_endtime = null, $start = null, $limit = null) {
		$sql = '';
		$sql .= $uid !== null ? ' AND o.'.DB::field('uid', dintval($uid)) : '';
		$sql .= $status ? ' AND o.'.DB::field('status', $status) : '';
		$sql .= $orderid ? ' AND o.'.DB::field('orderid', $orderid) : '';
		$sql .= $email ? ' AND o.'.DB::field('email', $email) : '';
		$sql .= $username ? ' AND m.'.DB::field('username', $username) : '';
		$sql .= $buyer ? ' AND o.'.DB::field('buyer', $buyer) : '';
		$sql .= $admin ? ' AND o.'.DB::field('admin', $admin) : '';
		$sql .= $submit_starttime ? ' AND o.'.DB::field('submitdate', $submit_starttime, '>=') : '';
		$sql .= $submit_endtime ? ' AND o.'.DB::field('submitdate', $submit_endtime, '<') : '';
		$sql .= $confirm_starttime ? ' AND o.'.DB::field('confirmdate', $confirm_starttime, '>=') : '';
		$sql .= $confirm_endtime ? ' AND o.'.DB::field('confirmdate', $confirm_endtime, '<') : '';
		return DB::fetch_all('SELECT o.*'.(($uid !== 0) ? ', m.username' : '').' FROM %t o'.(($uid !== 0) ? ', '.DB::table('common_member').' m WHERE o.uid=m.uid' : ' WHERE 1 ').' %i ORDER BY o.submitdate DESC '.DB::limit($start, $limit), array($this->_table, $sql));
	}

	/**
	 * 通过主键来查询订单
	 * @param int|array $orderid
	 * @param string $status 订单状态
	 * @return array
	 */
	public function fetch_all($orderid, $status = '') {
		if(empty($orderid)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('orderid', $orderid).' %i', array($this->_table, ($status ? ' AND '.DB::field('status', $status) : '')));
	}

	/**
	 * 删除小于指定时间内的订单
	 * @param int $submitdate
	 * @return bool
	 */
	public function delete_by_submitdate($submitdate) {
		return DB::query('DELETE FROM %t WHERE submitdate<%d', array($this->_table, $submitdate));
	}

	/**
	 * 统计用户指定时间内的订单购买数量和
	 * @param int $uid
	 * @param int $submitdate
	 * @param string|array $status
	 * @return int
	 */
	public function sum_amount_by_uid_submitdate_status($uid, $submitdate, $status) {
		if(empty($status)) {
			return 0;
		}
		return DB::result_first('SELECT SUM(amount) FROM %t WHERE uid=%d AND submitdate>=%d AND '.DB::field('status', $status), array($this->_table, $uid, $submitdate));
	}

}

?>