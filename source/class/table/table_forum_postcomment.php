<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_postcomment.php 32456 2013-01-21 05:18:56Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_postcomment extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_postcomment';
		$this->_pk    = 'id';

		parent::__construct();
	}

	/**
	 * 获取用户的点评数量
	 * @param int $authorid
	 * @return int
	 */
	public function count_by_authorid($authorid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE authorid=%d', array($this->_table, $authorid));
	}

	/**
	 * 获取一个帖子的点评数量
	 * @param int $pid
	 * @param int $authorid
	 * @param int $score
	 * @return int
	 */
	public function count_by_pid($pid, $authorid = null, $score = null) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE pid=%d '.($authorid ? ' AND '.DB::field('authorid', $authorid) : null).($score ? ' AND '.DB::field('score', $score) : null), array($this->_table, $pid, $authorid, $score));
	}

	public function count_by_tid($tid, $authorid = null, $score = null) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d '.($authorid ? ' AND '.DB::field('authorid', $authorid) : null).($score ? ' AND '.DB::field('score', $score) : null), array($this->_table, $tid, $authorid, $score));
	}
	/**
	 * 根据条件搜索点评数
	 * @param int|array $tid
	 * @param int|array $pid
	 * @param int|array $authorid
	 * @param int $starttime
	 * @param int $endtime
	 * @param string $ip
	 * @param string $message
	 * @return int
	 */

	public function count_by_search($tid = null, $pid = null, $authorid = null, $starttime = null, $endtime = null, $ip = null, $message = null) {
		$sql = '';
		$tid && $sql .= ' AND '.DB::field('tid', $tid);
		$pid && $sql .= ' AND '.DB::field('pid', $pid);
		$authorid && $sql .= ' AND '.DB::field('authorid', $authorid);
		$starttime && $sql .= ' AND '.DB::field('dateline', $starttime, '>=');
		$endtime && $sql .= ' AND '.DB::field('dateline', $endtime, '<');
		$ip && $sql .= ' AND '.DB::field('useip', str_replace('*', '%', $ip), 'like');
		if($message) {
			$sqlmessage = '';
			$or = '';
			$message = explode(',', str_replace(' ', '', $message));

			for($i = 0; $i < count($message); $i++) {
				if(preg_match("/\{(\d+)\}/", $message[$i])) {
					$message[$i] = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($message[$i], '/'));
					$sqlmessage .= " $or comment REGEXP '".$message[$i]."'";
				} else {
					$sqlmessage .= " $or ".DB::field('comment', '%'.$message[$i].'%', 'like');
				}
				$or = 'OR';
			}
			$sql .= " AND ($sqlmessage)";
		}
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE authorid>-1 %i', array($this->_table, $sql));
	}

	/**
	 * 根据条件搜索点评内容
	 * @param int|array $tid
	 * @param int|array $pid
	 * @param int|array $authorid
	 * @param int $starttime
	 * @param int $endtime
	 * @param string $ip
	 * @param string $message
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_search($tid = null, $pid = null, $authorid = null, $starttime = null, $endtime = null, $ip = null, $message = null, $start = null, $limit = null) {
		$sql = '';
		$tid && $sql .= ' AND '.DB::field('tid', $tid);
		$pid && $sql .= ' AND '.DB::field('pid', $pid);
		$authorid && $sql .= ' AND '.DB::field('authorid', $authorid);
		$starttime && $sql .= ' AND '.DB::field('dateline', $starttime, '>=');
		$endtime && $sql .= ' AND '.DB::field('dateline', $endtime, '<');
		$ip && $sql .= ' AND '.DB::field('useip', str_replace('*', '%', $ip), 'like');
		if($message) {
			$sqlmessage = '';
			$or = '';
			$message = explode(',', str_replace(' ', '', $message));

			for($i = 0; $i < count($message); $i++) {
				if(preg_match("/\{(\d+)\}/", $message[$i])) {
					$message[$i] = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($message[$i], '/'));
					$sqlmessage .= " $or comment REGEXP '".$message[$i]."'";
				} else {
					$sqlmessage .= " $or ".DB::field('comment', '%'.$message[$i].'%', 'like');
				}
				$or = 'OR';
			}
			$sql .= " AND ($sqlmessage)";
		}
		return DB::fetch_all('SELECT * FROM %t WHERE authorid>-1 %i ORDER BY dateline DESC '.DB::limit($start, $limit), array($this->_table, $sql));
	}

	/**
	 * 根据用户id获取点评信息
	 * @param int $authorid
	 * @param int $start
	 * @param int $limit
	 * @return array
	 */
	public function fetch_all_by_authorid($authorid, $start, $limit) {
		return DB::fetch_all('SELECT * FROM %t WHERE authorid=%d ORDER BY dateline DESC '.DB::limit($start, $limit), array($this->_table, $authorid));
	}

	/**
	 * 根据pid获取点评信息 ，是否能做缓存？
	 * @param int|array $pids
	 * @return array
	 */
	public function fetch_all_by_pid($pids) {
		if(empty($pids)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('pid', $pids).' ORDER BY dateline DESC', array($this->_table));
	}

	/**
	 * 根据pid,score获取点评信息，可获取包含点评观点的信息
	 * @param int $pid
	 * @param int $score
	 * @return array
	 */
	public function fetch_all_by_pid_score($pid, $score) {
		return DB::fetch_all('SELECT * FROM %t WHERE pid=%d AND score=%d', array($this->_table, $pid, $score));
	}

	/**
	 * 获取帖子的点评观点
	 * @param int $pid
	 * @return array
	 */
	public function fetch_standpoint_by_pid($pid) {
		return DB::fetch_first('SELECT * FROM %t WHERE pid=%d AND authorid=-1', array($this->_table, $pid));
	}

	/**
	 * 更新帖子的点评信息
	 * @param int|array $pids
	 * @param array $data
	 * @param bool $unbuffered
	 * @param bool $low_priority
	 * @param int|array $authorid
	 * @return bool
	 */
	public function update_by_pid($pids, $data, $unbuffered = false, $low_priority = false, $authorid = null) {
		if(empty($data)) {
			return false;
		}
		$where = array();
		$where[] = DB::field('pid', $pids);
		$authorid !== null && $where[] = DB::field('authorid', $authorid);
		return DB::update($this->_table, $data, implode(' AND ', $where), $unbuffered, $low_priority);
	}

	/**
	 * 删除用户发表的点评信息
	 * @param int|array $authorids
	 * @param bool $unbuffered
	 * @param bool $rpid 是否删除楼层回复产生的点评信息
	 * @return bool
	 */
	public function delete_by_authorid($authorids, $unbuffered = false, $rpid = false) {
		if(empty($authorids)) {
			return false;
		}
		$where = array();
		$where[] = DB::field('authorid', $authorids);
		$rpid && $where[] = DB::field('rpid', 0, '>');
		return DB::delete($this->_table, implode(' AND ', $where), null, $unbuffered);
	}

	/**
	 * 删除主题的点评信息
	 * @param int|array $tids
	 * @param bool $unbuffered
	 * @param int|array $authorids
	 * @return bool
	 */
	public function delete_by_tid($tids, $unbuffered = false, $authorids = null) {
		$where = array();
		$where[] = DB::field('tid', $tids);
		$authorids !== null && !(is_array($authorids) && empty($authorids)) && $where[] = DB::field('authorid', $authorids);
		return DB::delete($this->_table, implode(' AND ', $where), null, $unbuffered);
	}

	/**
	 * 删除帖子的点评信息
	 * @param int|array $pids
	 * @param bool $unbuffered
	 * @param int|array $authorid
	 * @return bool
	 */
	public function delete_by_pid($pids, $unbuffered = false, $authorid = null) {
		$where = array();
		$where[] = DB::field('pid', $pids);
		$authorid !== null && !(is_array($authorid) && empty($authorid)) && $where[] = DB::field('authorid', $authorid);
		return DB::delete($this->_table, implode(' AND ', $where), null, $unbuffered);
	}

	/**
	 * 删除楼层回复产生的点评信息
	 * @param int|array $rpids 回复的帖子id
	 * @param bool $unbuffered
	 * @return bool
	 */
	public function delete_by_rpid($rpids, $unbuffered = false) {
		if(empty($rpids)) {
			return false;
		}
		return DB::delete($this->_table, DB::field('rpid', $rpids), null, $unbuffered);
	}
	public function fetch_postcomment_by_pid($pids, $postcache, $commentcount, $totalcomment, $commentnumber) {
		$query = DB::query("SELECT * FROM ".DB::table('forum_postcomment')." WHERE pid IN (".dimplode($pids).') ORDER BY dateline DESC');
		$commentcount = $comments = array();
		while($comment = DB::fetch($query)) {
			if($comment['authorid'] > '-1') {
				$commentcount[$comment['pid']]++;
			}
			if(count($comments[$comment['pid']]) < $commentnumber && $comment['authorid'] > '-1') {
				$comment['avatar'] = avatar($comment['authorid'], 'small');
				$comment['comment'] = str_replace(array('[b]', '[/b]', '[/color]'), array('<b>', '</b>', '</font>'), preg_replace("/\[color=([#\w]+?)\]/i", "<font color=\"\\1\">", $comment['comment']));
				$comments[$comment['pid']][] = $comment;
			}
			if($comment['authorid'] == '-1') {
				$cic = 0;
				$totalcomment[$comment['pid']] = preg_replace('/<i>([\.\d]+)<\/i>/e', "'<i class=\"cmstarv\" style=\"background-position:20px -'.(intval(\\1) * 16).'px\">'.sprintf('%1.1f', \\1).'</i>'.(\$cic++ % 2 ? '<br />' : '');", $comment['comment']);
			}
			$postcache[$comment['pid']]['comment']['count'] = $commentcount[$comment['pid']];
			$postcache[$comment['pid']]['comment']['data'] = $comments[$comment['pid']];
			$postcache[$comment['pid']]['comment']['totalcomment'] = $totalcomment[$comment['pid']];
		}
		return array($comments, $postcache, $commentcount, $totalcomment);
	}

}

?>