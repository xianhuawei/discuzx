<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_member_grouppm.php 31733 2012-09-26 02:07:47Z zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member_grouppm extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_grouppm';
		$this->_pk    = '';

		parent::__construct();
	}

	/**
	 * 删除某一消息
	 * @param int $gpmid 消息ID
	 * @return bool
	 */
	public function delete_by_gpmid($gpmid) {
		return ($gpmid = dintval($gpmid))? DB::delete('common_member_grouppm', 'gpmid='.$gpmid) : false;
	}

	/**
	 * 统计某一消息的已读或未读用户数
	 * @param int $gpmid 消息ID
	 * @param int $type 类型 0：未读，1：已读
	 * @return int
	 */
	public function count_by_gpmid($gpmid, $type) {
		return $gpmid ? DB::result_first('SELECT COUNT(*) FROM %t WHERE gpmid=%d AND dateline'.($type ? '>' : '=').'0', array($this->_table, $gpmid)) : 0;
	}

	public function fetch($uid, $gpmid) {
		return $uid && $gpmid ? DB::fetch_first('SELECT * FROM %t WHERE uid=%d AND gpmid=%d', array($this->_table, $uid, $gpmid)) : '';
	}

	/**
	 *
	 * 获取消息数据
	 * @param int $gpmid 消息ID
	 * @param int $type 类型 0：未读，1：已读
	 * @param int $start 开始偏移量
	 * @param int $limit 数据条数
	 * @return bool
	 */
	public function fetch_all_by_gpmid($gpmid, $type, $start = 0, $limit = 0) {
		return $gpmid ? DB::fetch_all('SELECT * FROM %t WHERE gpmid=%d AND dateline'.($type ? '>' : '=').'0'.DB::limit($start, $limit), array($this->_table, $gpmid), 'uid') : array();
	}

	/**
	 *
	 * 获取消息数据
	 * @param int $uid 会员ID
	 * @param int $type 类型 0：未读，1：未读和已读
	 * @return array
	 */
	public function fetch_all_by_uid($uid, $type) {
		return $uid ? DB::fetch_all('SELECT * FROM %t WHERE uid=%d AND `status`'.($type ? '>=' : '=').'0', array($this->_table, $uid), 'gpmid') : array();
	}

	/**
	 * 更新数据
	 * @param int|array $uid 会员ID
	 * @param int|array $gpmid 消息ID
	 * @param array $data 更新的数据
	 * @return bool
	 */
	public function update($uid, $gpmid, $data) {
		return ($uid = dintval($uid)) && ($gpmid = dintval($gpmid, true)) && $data && is_array($data) ? DB::update($this->_table, $data, DB::field('gpmid', $gpmid).' AND '.DB::field('uid', $uid)) : false;
	}

	/**
	 * 把消息的状态从未读更新为已读
	 * @param int|array $uid 会员ID
	 * @param int|array $gpmid 消息ID
	 * @return bool
	 */
	public function update_to_read_by_unread($uid, $gpmid) {
		return ($uid = dintval($uid)) && ($gpmid = dintval($gpmid, true)) ? DB::update($this->_table, array('status' => 1), DB::field('gpmid', $gpmid).' AND '.DB::field('uid', $uid).' AND status=0') : false;
	}
}

?>