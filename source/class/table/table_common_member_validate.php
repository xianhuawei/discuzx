<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_member_validate.php 27848 2012-02-15 09:07:27Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member_validate extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_validate';
		$this->_pk    = 'uid';

		parent::__construct();
	}

	/**
	 * 获取审核会员
	 * @param int $submittimes 提交的次数
	 * @param int $regdate 几天前注册
	 * @param int $moddate 几天前审核
	 * @param string $regip 注册IP
	 * @return array
	 */
	public function fetch_all_validate_uid($submittimes = '', $regdate = '', $moddate = '', $regip = '') {
		$sql = 'm.groupid=8';
		$sql .= $submittimes ? ' AND v.submittimes>'.intval($submittimes) : '';
		$sql .= $regdate ? ' AND m.regdate<'.(TIMESTAMP - intval($regdate) * 86400) : '';
		$sql .= $moddate ? ' AND v.moddate<'.(TIMESTAMP - intval($moddate) * 86400) : '';
		$sql .= ($regip = stripsearchkey(addslashes((string)$regip))) ? " AND m.regip LIKE '".$regip."%'" : '';
		return DB::fetch_all("SELECT v.uid FROM ".DB::table('common_member_validate')." v, ".DB::table('common_member')." m
			WHERE $sql AND m.uid=v.uid", null, 'uid');
	}

	/**
	 * 获取待审核的数据
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_invalidate($start, $limit) {
		return DB::fetch_all('SELECT mvi.field, v.message, v.submittimes, v.submitdate, v.moddate, v.admin, v.remark, v.uid as vuid
			FROM '.DB::table('common_member_validate').' v
			LEFT JOIN '.DB::table('common_member_verify_info').' mvi ON mvi.uid=v.uid AND mvi.verifytype=0
			WHERE v.status=0 ORDER BY v.submitdate DESC '.DB::limit($start, $limit), '', 'vuid');
	}

	/**
	 * 统计待审核的数据个数
	 * @param int $status
	 * @return int
	 */
	public function count_by_status($status) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE status=%d', array($this->_table, $status));
	}

	public function fetch_all_status_by_count() {
		$count = array();
		$query = DB::query("SELECT status, COUNT(*) AS count FROM ".DB::table('common_member_validate')." GROUP BY status");
		while($num = DB::fetch($query)) {
			$count[$num['status']] = $num['count'];
		}
		return $count;
	}

	public function fetch_all_by_status($status, $start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t WHERE status=%d  ORDER BY submitdate DESC'.DB::limit($start, $limit), array($this->_table, $status), $this->_pk);
	}
}

?>