<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_modwork.php 27800 2012-02-15 02:13:57Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_modwork extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_modwork';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 * 更新管理者管理状态
	 * @param int $count
	 * @param int $posts
	 * @param int $uid
	 * @param string $modaction
	 * @param string $dateline
	 * @return bool
	 */
	public function increase_count_posts_by_uid_modaction_dateline($count, $posts, $uid, $modaction, $dateline) {
		return DB::query('UPDATE %t SET count=count+\'%d\', posts=posts+\'%d\' WHERE uid=%d AND modaction=%s AND dateline=%s',
				array($this->_table, $count, $posts, $uid, $modaction, $dateline));
	}

	/**
	 * 获取指定时间内管理者管理次数
	 * @param string $dateline
	 * @return array
	 */
	public function fetch_all_user_count_by_dateline($dateline) {
		return DB::fetch_all('SELECT uid, SUM(count) AS actioncount FROM %t WHERE dateline>=%s GROUP BY uid', array($this->_table, $dateline));
	}

	/**
	 * 获取指定时间段内指定用户的管理操作信息
	 * @param int $uid
	 * @param string $starttime
	 * @param string $endtime
	 * @return array
	 */
	public function fetch_all_by_uid_dateline($uid, $starttime, $endtime) {
		return DB::fetch_all('SELECT * FROM %t WHERE uid=%d AND dateline>=%s AND dateline<%s', array($this->_table, $uid, $starttime, $endtime));
	}

	/**
	 * 获取指定用户指定时间段内用户管理操作次数和对应帖子数
	 * @param int|array $uids
	 * @param string $starttime
	 * @param string $endtime
	 * @return array
	 */
	public function fetch_all_user_count_posts_by_uid_dateline($uids, $starttime, $endtime) {
		if(empty($uids)) {
			return array();
		}
		return DB::fetch_all('SELECT uid, modaction, SUM(count) AS count, SUM(posts) AS posts
				FROM %t
				WHERE '.DB::field('uid', $uids).' AND dateline>=%s AND dateline<%s GROUP BY uid, modaction',
				array($this->_table, $starttime, $endtime));
	}

	/**
	 * 删除指定时间内的管理者操作信息
	 * @param string $dateline
	 * @return bool
	 */
	public function delete_by_dateline($dateline) {
		return DB::query('DELETE FROM %t WHERE dateline<%s', array($this->_table, $dateline));
	}
}

?>