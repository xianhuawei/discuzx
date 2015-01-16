<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_post.php 30080 2012-05-09 08:19:20Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_post extends discuz_table
{
	private static $_tableid_tablename = array();

	public function __construct() {

		$this->_table = 'forum_post';
		$this->_pk    = 'pid';

		parent::__construct();
	}

	/**
	 * 根据主题id获取所在分表表名
	 * @param int $tableid 分表id or tid:主题id
	 * @param int $primary 是否是主表forum_post
	 * @return string
	 */
	public static function get_tablename($tableid, $primary = 0) {
		list($type, $tid) = explode(':', $tableid);
		if(!isset(self::$_tableid_tablename[$tableid])) {
			if($type == 'tid') {
				self::$_tableid_tablename[$tableid] = self::getposttablebytid($tid, $primary);
			} else {
				self::$_tableid_tablename[$tableid] = self::getposttable($type);
			}
		}
		return self::$_tableid_tablename[$tableid];
	}

	/**
	 * 取得一个主题包括回复中所有的参与人总数，调用了1次
	 * @param int $tid 主题id
	 * @return int 返回人数
	 */
	public function count_author_by_tid($tid) {
		return DB::result_first('SELECT count(DISTINCT authorid) FROM %t WHERE tid=%d', array(self::get_tablename('tid:'.$tid), $tid));
	}

	/**
	 * 获取一个主题在某个时间段的帖子数量
	 * @param string $tableid 所在分表id
	 * @param int $tid 主题id
	 * @param int $dateline 小于此时间戳的时间
	 * @return int
	 */
	public function count_by_tid_dateline($tableid, $tid, $dateline) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d AND invisible=0 AND dateline<=%d',
				array(self::get_tablename($tableid), $tid, $dateline));
	}

	public function fetch_maxposition_by_tid($tableid, $tid) {
		return DB::result_first('SELECT position FROM %t WHERE tid=%d ORDER BY position DESC LIMIT 1',
				array(self::get_tablename($tableid), $tid));
	}
	/**
	 * 按position方式，获取某一页回复
	 * @param string $tableid 所在分表id
	 * @param int $tid 主题id
	 * @param int $start, $end, $maxposition 开始，结束的position值，最大楼层（取缓存需要） 1楼到10楼显示时，$start=1,$end=11
	 * @param int $ordertype 是否倒序看帖
	 * @return array()
	 */
	public function fetch_all_by_tid_range_position($tableid, $tid, $start, $end, $maxposition, $ordertype = 0) {
		$storeflag = false;
		if($this->_allowmem) {
			if($ordertype != 1 && $start == 1 && $maxposition > ($end - $start)) {
				$data = $this->fetch_cache($tid, $this->_pre_cache_key.'tid_');
				if($data && count($data) == ($end - $start)) {
					$delauthorid = $this->fetch_cache('delauthorid');
					$updatefid = $this->fetch_cache('updatefid');
					$delpid = $this->fetch_cache('delpid');
					foreach($data as $k => $post) {
						if(in_array($post['pid'], $delpid) || $post['invisible'] < 0 || in_array($post['authorid'], $delauthorid)) {
							$data[$k]['invisible'] = 0;
							$data[$k]['authorid'] = 0;
							$data[$k]['useip'] = '';
							$data[$k]['dateline'] = 0;
							$data[$k]['pid'] = 0;
							$data[$k]['message'] = lang('forum/misc', 'post_deleted');
						}
						if(isset($updatefid[$post['fid']]) && $updatefid[$post['fid']]['dateline'] > $post['dateline']) {
							$data[$k]['fid'] = $updatefid[$post['fid']]['fid'];
						}
					}
					return $data;
				}
				$storeflag = true;
			}
		}
		$data = DB::fetch_all('SELECT * FROM %t WHERE tid=%d AND position>=%d AND position<%d ORDER BY position'.($ordertype == 1 ? ' DESC' : ''), array(self::get_tablename($tableid), $tid, $start, $end), 'pid');
		if($storeflag) {
			$this->store_cache($tid, $data, $this->_cache_ttl, $this->_pre_cache_key.'tid_');
		}
		return $data;
	}
	public function fetch_all_by_tid_position($tableid, $tid, $position) {
		return DB::fetch_all('SELECT * FROM %t WHERE tid=%d AND '.DB::field('position', $position), array(self::get_tablename($tableid), $tid));
	}
	/**
	 * 获取某个用户在主题及回复中的数量
	 * @param int $tid 所在主题id
	 * @param int $authorid 帖子作者id
	 * @return int
	 */
	public function count_by_tid_invisible_authorid($tid, $authorid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d AND invisible=0 AND authorid=%d',
				array(self::get_tablename('tid:'.$tid), $tid, $authorid));
	}

	/**
	 * 获取主题中可见帖子数量
	 * @param int $tid 主题id
	 * @return int
	 */
	public function count_visiblepost_by_tid($tid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d AND invisible=0', array(self::get_tablename('tid:'.$tid), $tid));
	}

	/**
	 * 获取主题中小于某个帖子的帖子数,调用了1次
	 * @param int $tid 主题id
	 * @param int $pid 帖子id
	 * @return int
	 */
	public function count_by_tid_pid($tid, $pid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d AND pid<%d', array(self::get_tablename('tid:'.$tid), $tid, $pid));
	}

	/**
	 * 获取一个主题中某个用户的回帖数
	 * @param int $tid 主题id,同时作为查询分表参数
	 * @param int $authorid 用户id
	 * @return int 回帖数
	 */
	public function count_by_tid_authorid($tid, $authorid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d AND first=0 AND authorid=%d', array(self::get_tablename('tid:'.$tid), $tid, $authorid));
	}

	/**
	 * 获取用户的发帖数，用于后台更新帖子数
	 * @param string $tableid 分表id
	 * @param int $authorid 用户id
	 * @return int 用户发帖数
	 */
	public function count_by_authorid($tableid, $authorid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE authorid=%d AND invisible=0', array(self::get_tablename($tableid), $authorid));
	}

	/**
	 * 获取群组/版块 每个用户回复数
	 * @param string $tableid 分表id
	 * @param int $fid 版块id
	 * @return array 用户及其回复数
	 */
	public function count_group_authorid_by_fid($tableid, $fid) {
		return DB::fetch_all('SELECT COUNT(*) as num, authorid FROM %t WHERE fid=%d AND first=0 GROUP BY authorid', array(self::get_tablename($tableid), $fid));
	}

	/**
	 * 获取总的主题数或回复数
	 * @param string $tableid 分表id
	 * @param int $first 1主题 0回复
	 * @return int
	 */
	public function count_by_first($tableid, $first) {
		return DB::result_first('SELECT count(*) FROM %t WHERE %i', array(self::get_tablename($tableid), DB::field('first', $first)));
	}

	/**
	 * 通过invisible统计帖子数
	 * @param string $tableid 分表id
	 * @param int $invisible invisible值
	 * @return int
	 */
	public function count_by_invisible($tableid, $invisible) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE %i', array(self::get_tablename($tableid), DB::field('invisible', $invisible)));
	}

	/**
	 * 获取帖子总数
	 * @param string $tableid 分表id
	 * @return int
	 */
	public function count_table($tableid) {
		return DB::result_first('SELECT COUNT(*) FROM %t', array(self::get_tablename($tableid)));
	}

	/**
	 * 通过fid invisible获取帖子数
	 * @param string $tableid 分表id
	 * @param int $fid 版块id
	 * @param int $invisible 帖子可见状态
	 * @return int
	 */
	public function count_by_fid_invisible($tableid, $fid, $invisible) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE fid=%d AND invisible=%d', array(self::get_tablename($tableid), $fid, $invisible));
	}

	public function count_by_dateline($tableid, $dateline) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE dateline>=%d AND invisible=0', array(self::get_tablename($tableid), $dateline));
	}

	/**
	 * 重写fetch方法，根据pid返回帖子信息 tableid表示该帖子在哪一个分表中
	 * @param string $tableid 分表id or tid:主题id
	 * @param int $pid 帖子id
	 * @param bool $outmsg 是否返回message内容,默认返回
	 * @return array 返回帖子信息
	 */
	public function fetch($tableid, $pid, $outmsg = true) {
		$post = DB::fetch_first('SELECT * FROM %t WHERE pid=%d', array(self::get_tablename($tableid), $pid));
		if(!$outmsg) {
			unset($post['message']);
		}
		return $post;
	}

	/**
	 * 获取主题下的指定的某一条帖子
	 * @param string $tableid 所在的分表id
	 * @param int $tid 主题id
	 * @param int $start 指定的开始位置
	 * @return array
	 */
	public function fetch_visiblepost_by_tid($tableid, $tid, $start = 0, $order = 0) {
		return DB::fetch_first('SELECT * FROM %t WHERE tid=%d AND invisible=0 ORDER BY dateline '. ($order ? 'DESC' : '').' '. DB::limit($start, 1),
				array(self::get_tablename($tableid), $tid));
	}

	/**
	 * 获取主题贴
	 * @param int $tid 主题id,同时作为查询分表参数
	 * @param int $invisible 是否可见参数
	 * @return array
	 */
	public function fetch_threadpost_by_tid_invisible($tid, $invisible = null) {
		return DB::fetch_first('SELECT * FROM %t WHERE tid=%d AND first=1'.($invisible !== null ? ' AND '.DB::field('invisible', $invisible) : ''),
				array(self::get_tablename('tid:'.$tid), $tid));
	}

	/**
	 * 判断用户是否参与了该主题
	 * @param int $tid 主题id,同时作为查询分表参数
	 * @param int $authorid 用户id
	 * @return int
	 */
	public function fetch_pid_by_tid_authorid($tid, $authorid) {
		return DB::result_first('SELECT pid FROM %t WHERE tid=%d AND authorid=%d LIMIT 1', array(self::get_tablename('tid:'.$tid), $tid, $authorid));
	}

	/**
	 * 判断游客是否参与了该主题
	 * @param int $tid 主题id,同时作为查询分表参数
	 * @param string $clientip ip地址
	 * @return int
	 */
	public function fetch_pid_by_tid_clientip($tid, $clientip) {
		return DB::result_first('SELECT pid FROM %t WHERE tid=%d AND authorid=0 AND useip=%s LIMIT 1', array(self::get_tablename('tid:'.$tid), $tid, $clientip));
	}

	/**
	 * 判断主题是否有附件,调用了1次
	 * @param int $tid 主题id,同时作为分表参数
	 * @return int
	 */
	public function fetch_attachment_by_tid($tid) {
		return DB::result_first('SELECT attachment FROM %t WHERE tid=%d AND invisible=0 AND attachment>0 LIMIT 1', array(self::get_tablename('tid:'.$tid), $tid));
	}

	/**
	 * 获取分表的最大pid
	 * @param string $tableid 分表id
	 * @return int
	 */
	public function fetch_maxid($tableid) {
		return DB::result_first('SELECT MAX(pid) FROM %t', array(self::get_tablename($tableid)));
	}

	public function fetch_posts($tableid) {
		return DB::fetch_first('SELECT COUNT(*) AS posts, (MAX(dateline)-MIN(dateline))/86400 AS runtime FROM %t', array(self::get_tablename($tableid)));
	}

	/**
	 * 根据pid 和其它条件返回指定字段的内容，不安全的，慎用
	 * @param string $tableid
	 * @param int $pid
	 * @param string $addcondiction 额外条件
	 * @param string $fields 字段
	 * @return array
	 */
	public function fetch_by_pid_condition($tableid, $pid, $addcondiction = '', $fields = '*') {
		return DB::fetch_first('SELECT %i FROM %t WHERE pid=%d %i LIMIT 1',
			array($fields, self::get_tablename($tableid), $pid, $addcondiction));
	}


	/**
	 * 根据多个帖子id获取帖子信息
	 * @param string $tableid 分表id or tid:所在主题的tid
	 * @param array $pids 帖子id数组
	 * @param bool $outmsg 是否返回message内容，默认返回
	 * @return array 返回多条帖子信息
	 */
	public function fetch_all($tableid, $pids, $outmsg = true) {
		$postlist = array();
		if($pids) {
			
			$query = DB::query('SELECT * FROM %t WHERE %i', array(self::get_tablename($tableid), DB::field($this->_pk, $pids)));
			while($post = DB::fetch($query)) {
				if(!$outmsg) {
					unset($post['message']);
				}
				$postlist[$post[$this->_pk]] = $post;
				
			}
		}
		return $postlist;
	}

	/**
	 * 获取商品帖子页面数据，调用了1次
	 * @param int $tid 所在主题id
	 * @param int $visibleflag 是否仅查看可见帖子
	 * @param int $authorid 是否仅查看某个人的帖子
	 * @param array $pids 去掉商品的帖子的id数组
	 * @param int $forum_pagebydesc 分页二分法，是否为倒序首页 决定排序
	 * @param int $ordertype 排序类别
	 * @param int $start 开始点
	 * @param int $limit 取多少条数据
	 * @return array
	 */
	public function fetch_all_tradepost_viewthread_by_tid($tid, $visibleallflag, $authorid, $pids, $forum_pagebydesc, $ordertype, $start, $limit) {
		if(empty($pids)) {
			return array();
		}
		$data = array();
		$parameter = $this->handle_viewthread_parameter($visibleallflag, $authorid, $forum_pagebydesc, $ordertype);
		$query = DB::query('SELECT * FROM %t WHERE tid=%d'.
				($parameter['invisible'] ? ' AND '.$parameter['invisible'] : '').($parameter['authorid'] ? ' AND '.$parameter['authorid'] : '').
				' AND pid NOT IN ('.dimplode($pids).')'.
				' '.$parameter['orderby'].
				' '.DB::limit($start, $limit),
				array(self::get_tablename('tid:'.$tid), $tid));
		while($post = DB::fetch($query)) {
			$data[$post['pid']] = $post;
		}
		return $data;
	}

	/**
	 * 获取辩论帖页面数据，调用了1次
	 * @param int $tid 所在主题id
	 * @param int $visibleflag 是否仅查看可见帖子
	 * @param int $authorid 是否仅查看某个人的帖子
	 * @param int $stand 支持观点
	 * @param int $forum_pagebydesc 分页二分法，是否为倒序首页 决定排序
	 * @param int $ordertype 排序类别
	 * @param int $start 开始点
	 * @param int $limit 取多少条数据
	 * @return array
	 */
	public function fetch_all_debatepost_viewthread_by_tid($tid, $visibleallflag, $authorid, $stand, $forum_pagebydesc, $ordertype, $start, $limit) {
		$data = array();
		$parameter = $this->handle_viewthread_parameter($visibleallflag, $authorid, $forum_pagebydesc, $ordertype, 'p.');
		$query = DB::query("SELECT dp.*, p.* FROM %t p LEFT JOIN %t dp ON p.pid=dp.pid WHERE p.tid=%d".
				($parameter['invisible'] ? ' AND '.$parameter['invisible'] : '').($parameter['authorid'] ? ' AND '.$parameter['authorid'] : '').
				(isset($stand) ? ($stand ? ' AND (dp.stand='.intval($stand).' OR p.first=1)' : ' AND (dp.stand=0 OR dp.stand IS NULL OR p.first=1)') : '').
				' '.$parameter['orderby'].
				' '.DB::limit($start, $limit),
				array(self::get_tablename('tid:'.$tid), 'forum_debatepost', $tid));
		while($post = DB::fetch($query)) {
			$data[$post['pid']] = $post;
		}
		return $data;
	}

	/**
	 * 获取普通帖页面数据
	 * @param string $tableid 分表id
	 * @param int $tid 所在主题id
	 * @param int $visibleflag 是否仅查看可见帖子
	 * @param int $authorid 是否仅查看某个人的帖子
	 * @param int $forum_pagebydesc 分页二分法，是否为倒序首页 决定排序
	 * @param int $ordertype 排序类别
	 * @param int $count 主题帖子总数
	 * @param int $start 开始点
	 * @param int $limit 取多少条数据
	 * @return array
	 */
	public function fetch_all_common_viewthread_by_tid($tid, $visibleallflag, $authorid, $forum_pagebydesc, $ordertype, $count, $start, $limit) {
		$data = array();
		$storeflag = false;
		if($this->_allowmem) {
			if($ordertype != 1 && !$forum_pagebydesc && !$start && $count > $limit) {
				$data = $this->fetch_cache($tid, $this->_pre_cache_key.'tid_');
				if($data && count($data) == $limit) {
					$delauthorid = $this->fetch_cache('delauthorid');
					$updatefid = $this->fetch_cache('updatefid');
					$delpid = $this->fetch_cache('delpid');
					foreach($data as $k => $post) {
						if(in_array($post['pid'], $delpid) || $post['invisible'] < 0 || in_array($post['authorid'], $delauthorid)) {
							$data[$k]['invisible'] = 0;
							$data[$k]['authorid'] = 0;
							$data[$k]['useip'] = '';
							$data[$k]['dateline'] = 0;
							$data[$k]['pid'] = 0;
							$data[$k]['message'] =lang('forum/misc', 'post_deleted');
						}
						if(isset($updatefid[$post['fid']]) && $updatefid[$post['fid']]['dateline'] > $post['dateline']) {
							$data[$k]['fid'] = $updatefid[$post['fid']]['fid'];
						}
					}
					return $data;
				}
				$storeflag = true;
			}
		}
		$parameter = $this->handle_viewthread_parameter($visibleallflag, $authorid, $forum_pagebydesc, $ordertype);
		$query = DB::query('SELECT * FROM %t WHERE tid=%d'.
				($parameter['invisible'] ? ' AND '.$parameter['invisible'] : '').($parameter['authorid'] ? ' AND '.$parameter['authorid'] : '').
				' '.$parameter['orderby'].
				' '.DB::limit($start, $limit),
				array(self::get_tablename('tid:'.$tid), $tid));
		while($post = DB::fetch($query)) {
			$data[$post['pid']] = $post;
		}
		if($storeflag) {
			$this->store_cache($tid, $data, $this->_cache_ttl, $this->_pre_cache_key.'tid_');
		}
		return $data;
	}

	private function handle_viewthread_parameter($visibleallflag, $authorid, $forum_pagebydesc, $ordertype, $alias = '') {
		$return = array();
		if(!$visibleallflag) {
			$return['invisible'] = $alias.DB::field('invisible', 0);
		}
		if($authorid) {
			$return['authorid'] = $alias.DB::field('authorid', $authorid);
		}
		//修改成pid排序,dateline跟pid是同一个顺序,order by主键效率高 避免 filesort
		if($forum_pagebydesc) {
			if($ordertype != 1) {
				$return['orderby'] = 'ORDER BY '.$alias.'pid DESC';
			} else {
				$return['orderby'] = 'ORDER BY '.$alias.'pid ASC';
			}
		} else {
			if($ordertype != 1) {
				$return['orderby'] = 'ORDER BY '.$alias.'pid';
			} else {
				$return['orderby'] = 'ORDER BY '.$alias.'pid DESC';
			}
		}
		return $return;
	}

	/**
	 *
	 * 根据用户Uid获取用户的回复
	 * @param string $tableid:分表ID
	 * @param int $authorid: 用户Uid
	 * @param int $start: 开始记录数
	 * @param int $limit: 获取多少条
	 * @param int $invisible: 是否通过审核
	 * @param int $fid: 单个版块或多个版块
	 */
	public function fetch_all_by_authorid($tableid, $authorid, $outmsg = true, $order = '', $start = 0, $limit = 0, $first = null, $invisible = null, $fid = null, $filterfid = null) {
		$postlist = $sql = array();
		if($first !== null && $invisible !== null) {
			if($first == 1) {
				$sql[] = DB::field('invisible', $invisible);
				$sql[] = DB::field('first', 1);
			} else {
				$sql[] = DB::field('invisible', $invisible);
				$sql[] = DB::field('first', 0);
			}
		} elseif($invisible !== null) {
			$sql[] = DB::field('invisible', $invisible);
		} elseif($first !== null) {
			$sql[] = DB::field('first', $first);
		}
		if($fid !== null) {
			$sql[] = DB::field('fid', $fid);
		}
		if($filterfid !== null) {
			$filterfid = dintval($filterfid, true);
			$sql[] = DB::field('fid', $filterfid, is_array($filterfid) ? 'notin' : '<>');
		}
		$query = DB::query('SELECT * FROM %t WHERE '.DB::field('authorid', $authorid).' %i '.($order ? 'ORDER BY dateline '.$order : '').' '.DB::limit($start, $limit),
				array(self::get_tablename($tableid), ($sql ? 'AND '.implode(' AND ', $sql) : '')));
		while($post = DB::fetch($query)) {
			if(!$outmsg) {
				unset($post['message']);
			}
			$postlist[$post[$this->_pk]] = $post;
		}
		return $postlist;
	}

	/**
	 * 通过 first 获取帖子id列表, 调用了1次
	 * @param string $tableid 分表id
	 * @param int $first 1 or 0
	 * @param int $start 分页起始位置
	 * @param int $limit 取多少条
	 * @return array
	 */
	public function fetch_all_tid_by_first($tableid, $first, $start = 0, $limit = 0) {
		return DB::fetch_all('SELECT tid FROM %t WHERE first=%d '.DB::limit($start, $limit), array(self::get_tablename($tableid), $first));
	}

	/**
	 * 获取多个主题的帖子信息,多处调用，但有瓶颈，返回数据量可能很大
	 * @param string $tableid 分表id
	 * @param int|array $tids 主题id数组
	 * @param bool $outmsg 是否返回message信息，默认返回
	 * @param string $order dateline的排序方式，为空则不加order by
	 * @param int $start 分页开始数
	 * @param int $limit 取多少条数据
	 * @return array
	 */
	public function fetch_all_by_tid($tableid, $tids, $outmsg = true, $order = '', $start = 0, $limit = 0, $first = null, $invisible = null, $authorid = null, $fid = null) {
		$postlist = $sql = array();
		if($first !== null && $invisible !== null) {
			if($first == 1) {
				$sql[] = DB::field('first', 1);
				$sql[] = DB::field('invisible', $invisible);
			} else {
				$sql[] = DB::field('invisible', $invisible);
				$sql[] = DB::field('first', 0);
			}
		} elseif($first !== null) {
			$sql[] = DB::field('first', $first);
		} elseif($invisible !== null) {
			$sql[] = DB::field('invisible', $invisible);
		}
		if($authorid !== null) {
			$sql[] = DB::field('authorid', $authorid);
		}
		if($fid !== null) {
			$sql[] = DB::field('fid', $fid);
		}
		$query = DB::query('SELECT * FROM %t WHERE '.DB::field('tid', $tids).' %i '.($order ? 'ORDER BY dateline '.$order : '').' '.DB::limit($start, $limit),
				array(self::get_tablename($tableid), ($sql ? 'AND '.implode(' AND ', $sql) : '')));
		while($post = DB::fetch($query)) {
			if(!$outmsg) {
				unset($post['message']);
			}
			$postlist[$post[$this->_pk]] = $post;
		}
		return $postlist;
	}

	/**
	 * 获取一个主题中大于pid的帖子id,调用了1次
	 * @param int $tid 主题id,同时用于分表参数
	 * @param int $lastpid 大于的pid
	 * @param int $round 取多少个
	 * @return array
	 */
	public function fetch_all_pid_by_tid_lastpid($tid, $lastpid, $round) {
		return DB::fetch_all("SELECT pid FROM %t WHERE tid=%d AND pid>%d ORDER BY pid ASC %i",
				array(self::get_tablename('tid:'.$tid), $tid, $lastpid, DB::limit(0, $round)));
	}

	/**
	 * 通过fid invisible获取帖子信息,调用了1次
	 * @param string $tableid 分表id
	 * @param int $fid 版块id
	 * @param int $invisible invisible值
	 * @param int $start 分页开始位置
	 * @param int $limit 取多少条
	 * @return array
	 */
	public function fetch_all_by_fid($tableid, $fid, $outmsg = true, $order = '', $start = 0, $limit = 0, $first = null, $invisible = null) {
		$postlist = $sql = array();
		if($first !== null && $invisible !== null) {
			if($first == 1) {
				$sql[] = DB::field('first', 1);
				$sql[] = DB::field('invisible', $invisible);
			} else {
				$sql[] = DB::field('invisible', $invisible);
				$sql[] = DB::field('first', 0);
			}
		} elseif($first !== null) {
			$sql[] = DB::field('first', $first);
		} elseif($invisible !== null) {
			$sql[] = DB::field('invisible', $invisible);
		}
		$query = DB::query('SELECT * FROM %t WHERE '.DB::field('fid', $fid).' %i '.($order ? 'ORDER BY dateline '.$order : '').' '.DB::limit($start, $limit),
				array(self::get_tablename($tableid), ($sql ? 'AND '.implode(' AND ', $sql) : '')));
		while($post = DB::fetch($query)) {
			if(!$outmsg) {
				unset($post['message']);
			}
			$postlist[$post[$this->_pk]] = $post;
		}
		return $postlist;
	}

	/**
	 * 获取帖子信息，与fetch_all不同，可以分页，调用了1次
	 * @param string $tableid 分表id
	 * @param int|array $pids 帖子id数组
	 * @param int $start 分页开始位置
	 * @param int $limit 取多少条数据
	 * @return array
	 */
	public function fetch_all_by_pid($tableid, $pids, $outmsg = true, $order = '', $start = 0, $limit = 0, $fid = null, $invisible = null) {
		$postlist = $sql = array();
		if($fid !== null) {
			$sql[] = DB::field('fid', $fid);
		}
		if($invisible !== null) {
			$sql[] = DB::field('invisible', $invisible);
		}
		$query = DB::query('SELECT * FROM %t WHERE '.DB::field('pid', $pids).' %i '.($order ? 'ORDER BY dateline '.$order : '').' '.DB::limit($start, $limit),
				array(self::get_tablename($tableid), ($sql ? 'AND '.implode(' AND ', $sql) : '')));
		while($post = DB::fetch($query)) {
			if(!$outmsg) {
				unset($post['message']);
			}
			$postlist[$post[$this->_pk]] = $post;
		}
		return $postlist;
	}

	/**
	 * 通过tid stand 获取辩论帖信息
	 * @param int $tid 主题id,同时作为分表参数
	 * @param int $stand 正方反方
	 * @param int $start 分页开始位置
	 * @param int $limit 取多少条
	 * @return array
	 */
	public function fetch_all_debatepost_by_tid_stand($tid, $stand, $start, $limit) {
		return DB::fetch_all('
			SELECT author, authorid
			FROM %t p, %t dp
			WHERE p.tid=%d AND p.anonymous=0 AND p.invisible=0 AND dp.stand=%d AND p.pid=dp.pid
			ORDER BY p.dateline DESC %i',
			array(self::get_tablename('tid:'.$tid), 'forum_debatepost', $tid, $stand, DB::limit($start, $limit)));
	}

	/**
	 * 获取一个主题中，每个用户发的一个帖子数据,调用了1次
	 * @param string $tableid 分表id
	 * @param int $tid 主题id
	 * @return array
	 */
	public function fetch_all_visiblepost_by_tid_groupby_authorid($tableid, $tid) {
		return DB::fetch_all('SELECT pid, tid, authorid, subject, dateline FROM %t WHERE tid=%d AND invisible=0 GROUP BY authorid ORDER BY dateline',
				array(self::get_tablename($tableid), $tid));
	}

	public function fetch_all_pid_by_invisible_dateline($tableid, $invisible, $dateline, $start, $limit) {
		return DB::fetch_all('SELECT pid FROM %t WHERE invisible=%d AND dateline<%d %i', array(self::get_tablename($tableid), $invisible, $dateline, DB::limit($start, $limit)));
	}

	// 统计用户发帖数前几名
	public function fetch_all_top_post_author($tableid, $timelimit, $num) {
		return DB::fetch_all('SELECT DISTINCT(author) AS username, authorid AS uid, COUNT(pid) AS posts
			FROM %t
			WHERE dateline>=%d AND invisible=0 AND authorid>0
			GROUP BY author
			ORDER BY posts DESC %i',
			array(self::get_tablename($tableid), $timelimit, DB::limit(0, $num)));
	}

	public function fetch_all_author_posts_by_dateline($tableid, $authorid, $dateline) {
		return DB::fetch_all('SELECT authorid, COUNT(*) AS posts FROM %t
			WHERE dateline>=%d AND %i AND invisible=0 GROUP BY authorid', array(self::get_tablename($tableid), $dateline, DB::field('authorid', $authorid)));
	}

	/**
	 * 重写update方法，post表更新，必须带分表的id，为0或空则默认forum_post表
	 * @param string $tableid 分表id
	 * @param int|array $pid 帖子id
	 * @param array $data 更新的数据field-value
	 * @param bool $unbuffered 迅速返回？
	 * @param bool $low_priority 延迟更新？
	 * @return bool
	 */
	public function update($tableid, $pid, $data, $unbuffered = false, $low_priority = false, $first = null, $invisible = null, $fid = null, $status = null) {
		$where = array();
		$where[] = DB::field('pid', $pid);
		if($first !== null) {
			$where[] = DB::field('first', $first);
		}
		if($invisible !== null) {
			$where[] = DB::field('invisible', $invisible);
		}
		if($status !== null) {
			$where[] = DB::field('status', $status);
		}
		if($fid !== null) {
			$where[] = DB::field('fid', $fid);
		}
		$return = DB::update(self::get_tablename($tableid), $data, implode(' AND ', $where), $unbuffered, $low_priority);
		if($return && $this->_allowmem) {
			$this->update_cache($tableid, $pid, 'pid', $data, array('invisible' => $invisible, 'first' => $first, 'fid' => $fid, 'status' => $status));
		}
		return $return;
	}

	/**
	 * 根据tid更新主题中所有帖子数据,包括主题帖
	 * @param string $tableid 分表id
	 * @param int $tid 主题id
	 * @param array $data 更新的数据field-value
	 * @param bool $unbuffered 迅速返回？
	 * @param bool $low_priority 延迟更新？
	 * @return bool
	 */
	public function update_by_tid($tableid, $tid, $data, $unbuffered = false, $low_priority = false, $first = null, $invisible = null, $status = null) {
		$where = array();
		$where[] = DB::field('tid', $tid);
		if($first !== null) {
			$where[] = DB::field('first', $first);
		}
		if($invisible !== null) {
			$where[] = DB::field('invisible', $invisible);
		}
		if($status !== null) {
			$where[] = DB::field('status', $status);
		}
		$return = DB::update(self::get_tablename($tableid), $data, implode(' AND ', $where), $unbuffered, $low_priority);
		if($return && $this->_allowmem) {
			$this->update_cache(0, $tid, 'tid', $data, array('first' => $first, 'invisible' => $invisible, 'status' => $status));
		}
		return $return;
	}
	/**
	 * 根据fid更新成新的fid
	 *
	 * @param string $tableid 分表id
	 * @param int $fid	板块id
	 * @param int $newfid	新的板块id
	 */
	public function update_fid_by_fid($tableid, $fid, $newfid, $unbuffered = false, $low_priority = false) {
		$where = array();
		$where[] = DB::field('fid', $fid);
		$return = DB::update(self::get_tablename($tableid), array('fid' => $newfid), implode(' AND ', $where), $unbuffered, $low_priority);
		if($return && $this->_allowmem) {
			$updatefid = $this->fetch_cache('updatefid');
			$updatefid[$fid] = array('fid' => $newfid, 'dateline' => TIMESTAMP);
			$this->store_cache('updatefid', $updatefid);
		}
		return $return;
	}

	public function update_cache($tableid, $id, $idtype, $data, $condition = array(), $glue = 'merge') {
		// 更新缓存时，invisible更新为0,且在第一页时，不会显示，更新为负数时，也显示已被设置为不可见。缓存到期后，会重新自动生成，数据才能正常显示
		// tid修改时，就和键值不对应了
		if(!$this->_allowmem) return;

		if($idtype == 'tid') {
			$memorydata = $this->fetch_cache($id, $this->_pre_cache_key.'tid_');
			if(!$memorydata) {
				return;
			}
			if(!is_array($id)) {
				$memorydata = array($id => $memorydata);
				$id = (array)$id;
			}
			foreach($id as $v) {
				if(!$memorydata[$v]) {
					continue;
				}
				foreach($memorydata[$v] as $pid => $post) {
					$updateflag = true;
					if($condition) {
						foreach($condition as $ck => $cv) {
							if($cv !== null && !in_array($post[$ck], (array)$cv)) {
								$updateflag = false;
								break;
							}
						}
					}
					if($updateflag) {
						
						if($glue == 'merge') {
							$memorydata[$v][$pid] = array_merge($post, $data);
						} else {
							foreach($data as $dk => $dv) {
								$memorydata[$v][$pid][$dk] = helper_util::compute($memorydata[$v][$pid][$dk], $dv, $glue);
							}
						}
					}
				}
				$this->store_cache($v, $memorydata[$v], $this->_cache_ttl, $this->_pre_cache_key.'tid_');
			}
		} elseif($idtype == 'pid') {
			$memorytid = array();
			$query = DB::query('SELECT pid, tid FROM %t WHERE '.DB::field('pid', $id), array(self::get_tablename($tableid)));
			while($post = DB::fetch($query)) {
				$memorytid[$post['pid']] = $post['tid'];
			}
			$memorydata = $this->fetch_cache($memorytid, $this->_pre_cache_key.'tid_');
			if(!$memorydata) {
				return;
			}
			if(!is_array($id)) {
				$id = (array)$id;
			}
			foreach($id as $v) {
				if($memorydata[$memorytid[$v]][$v]) {
					$updateflag = true;
					if($condition) {
						foreach($condition as $ck => $cv) {
							if($cv !== null && !in_array($memorydata[$memorytid[$v]][$v][$ck], (array)$cv)) {
								$updateflag = false;
								break;
							}
						}
					}
					if($updateflag) {
						
						if($glue == 'merge') {
							$memorydata[$memorytid[$v]][$v] = array_merge($memorydata[$memorytid[$v]][$v], $data);
						} else {
							foreach($data as $dk => $dv) {
								$memorydata[$memorytid[$v]][$v][$dk] = helper_util::compute($memorydata[$memorytid[$v]][$v][$dk], $dv, $glue);
							}
						}
					}
				}
			}
			foreach($memorydata as $tid => $postlist) {
				$this->store_cache($tid, $postlist, $this->_cache_ttl, $this->_pre_cache_key.'tid_');
			}
		} elseif($idtype == 'fid') {

		}
	}

	/**
	 * 更新主题标签,使用concat函数进行连接
	 * @param int $tid 主题id,同时作为分表参数
	 * @param string $tags 标签
	 * @return bool
	 */
	public function concat_threadtags_by_tid($tid, $tags) {
		$return = DB::query('UPDATE %t SET tags=concat(tags, %s) WHERE tid=%d AND first=1', array(self::get_tablename('tid:'.$tid), $tags, $tid));
		if($return && $this->_allowmem) {
			$this->update_cache(0, $tid, 'tid', array('tags' => $tags), array('first' => 1), '.');
		}
		return $return;
	}


	/**
	 * 增加帖子的评分及评分次数
	 * @param string $tableid 分表id or tid:所在主题id, 用于查询分表
	 * @param int $pid 帖子id
	 * @param int $rate 增加的评分分数
	 * @param int $ratetimes 增加的评分次数
	 * @return bool
	 */
	public function increase_rate_by_pid($tableid, $pid, $rate, $ratetimes) {
		$return = DB::query('UPDATE %t SET rate=rate+\'%d\', ratetimes=ratetimes+\'%d\' WHERE pid=%d',
				array(self::get_tablename($tableid), $rate, $ratetimes, $pid));
		if($return && $this->_allowmem) {
			$this->update_cache($tableid, $pid, 'pid', array('rate' => $rate, 'ratetimes' => $ratetimes), array(), '+');
		}
		return $return;
	}
	/*
	 * 仅合并、分割帖子时使用，临时改变position，防止冲突
	 */
	public function increase_position_by_tid($tableid, $tid, $position) {
		$return = DB::query('UPDATE %t SET position=position+\'%d\' WHERE '.DB::field('tid', $tid),
				array(self::get_tablename($tableid), $position));
		return $return;
	}

	/**
	 * 更新帖子状态
	 * @param string $tableid 分表id
	 * @param int $pid 帖子id
	 * @param int $status 更新的状态值
	 * @param string $glue 连接操作符
	 * @param bool $unbuffered 迅速返回
	 * @return bool
	 */
	public function increase_status_by_pid($tableid, $pid, $status, $glue, $unbuffered = false) {
		$return = DB::query('UPDATE %t SET %i WHERE %i', array(self::get_tablename($tableid), DB::field('status', $status, $glue), DB::field('pid', $pid)), $unbuffered);
		if($return && $this->_allowmem) {
			$this->update_cache($tableid, $pid, 'pid', array('status' => $status), array(), $glue);
		}
		return $return;
	}

	/**
	 * 插入一条数据
	 * @param string $tableid 分表id
	 * @param array $data
	 * @param boolean $return_insert_id 是否返回插入的id
	 * @param boolean $replace 是否是replace
	 * @param boolean $silent 是否屏蔽错误
	 * @return int|boolean 是否成功或者返回id
	 */
	public function insert($tableid, $data, $return_insert_id = false, $replace = false, $silent = false) {
		$maxposition = $this->fetch_maxposition_by_tid($tableid,$data['tid']);
		$data['position'] = $maxposition + 1 ;
		return DB::insert(self::get_tablename($tableid), $data, $return_insert_id, $replace, $silent);
	}

	/**
	 * 删除帖子
	 * @param string $tableid 分表id
	 * @param int|array $pid 帖子id
	 * @param bool $unbuffered 迅速返回
	 * @return bool
	 */
	public function delete($tableid, $pid, $unbuffered = false) {
		$return = DB::delete(self::get_tablename($tableid), DB::field($this->_pk, $pid), 0, $unbuffered);
		if($return && $this->_allowmem) {
			$delpid = $this->fetch_cache('delpid');
			$this->store_cache('delpid', array_merge((array)$pid, (array)$delpid));
		}
		return $return;
	}

	/**
	 * 通过主题id删除帖子
	 * @param string $tableid 分表id
	 * @param int|array $tids 主题id数组
	 * @return bool
	 */
	public function delete_by_tid($tableid, $tids, $unbuffered = false) {
		$return = DB::delete(self::get_tablename($tableid), DB::field('tid', $tids), 0, $unbuffered);
		if($return && $this->_allowmem) {
			$this->clear_cache($tids, $this->_pre_cache_key.'tid_');//pid会自动过期，不需考虑
		}
		return $return;
	}

	/**
	 * 通过用户id删除帖子
	 * @param string $tableid 分表id
	 * @param int|array $authorids 用户id数组
	 * @return bool
	 */
	public function delete_by_authorid($tableid, $authorids, $unbuffered = false) {
		$return = DB::delete(self::get_tablename($tableid), DB::field('authorid', $authorids), 0, $unbuffered);
		if($return && $this->_allowmem) {
			$delauthorid = $this->fetch_cache('delauthorid');
			$this->store_cache('delauthorid', array_merge((array)$authorids, (array)$delauthorid));
		}
		return $return;
	}

	/**
	 * 删除指定fid的帖子
	 * @param int $tableid 分表id
	 * @param int|array $fids 版块id数组
	 * @param bool $unbuffered 迅速返回
	 * @return bool
	 */
	public function delete_by_fid($tableid, $fids, $unbuffered = false) {
		return DB::delete(self::get_tablename($tableid), DB::field('fid', $fids), 0, $unbuffered);
	}

	/**
	 * 获取表结构信息
	 * @return array
	 */
	public function show_table() {
		return DB::fetch_all("SHOW TABLES LIKE '".DB::table('forum_post')."\_%'");
	}

	/**
	 * 获取分表的表结构信息
	 * @param string $tableid 分表id
	 * @return array
	 */
	public function show_table_by_tableid($tableid) {
		return DB::fetch_first('SHOW CREATE TABLE %t', array(self::get_tablename($tableid)));
	}

	/**
	 * 删除一个分表
	 * @param string $tableid 分表id
	 * @return bool
	 */
	public function drop_table($tableid) {
		return ($tableid = dintval($tableid)) ? DB::query('DROP TABLE %t', array(self::get_tablename($tableid))) : false;
	}

	/**
	 * 优化一个分表
	 * @param string $tableid 分表id
	 * @return bool
	 */
	public function optimize_table($tableid) {
		return DB::query('OPTIMIZE TABLE %t', array(self::get_tablename($tableid)), true);
	}

	/**
	 * 根据tid 移动一个分表到另一个分表
	 * @param string $tableid 目标分表id
	 * @param string $fieldstr 移动的字段列表
	 * @param string $fromtable 源分表
	 * @param int $tid 移动帖子的tid
	 * @return bool
	 */
	public function move_table($tableid, $fieldstr, $fromtable, $tid) {
		$tidsql = is_array($tid) ? 'tid IN(%n)' : 'tid=%d';
		return DB::query("INSERT INTO %t ($fieldstr) SELECT $fieldstr FROM $fromtable WHERE $tidsql", array(self::get_tablename($tableid), $tid), true);
	}

	public function count_by_search($tableid, $tid = null, $keywords = null, $invisible =null, $fid = null, $authorid = null, $author = null, $starttime = null, $endtime = null, $useip = null, $first = null) {
		$sql = '';
		$sql .= $tid ? ' AND '.DB::field('tid', $tid) : '';
		$sql .= $authorid !== null ? ' AND '.DB::field('authorid', $authorid) : '';
		$sql .= $invisible !== null ? ' AND '.DB::field('invisible', $invisible) : '';
		$sql .= $first !== null ? ' AND '.DB::field('first', $first) : '';
		$sql .= $fid ? ' AND '.DB::field('fid', $fid) : '';
		$sql .= $author ? ' AND '.DB::field('author', $author) : '';
		$sql .= $starttime ? ' AND '.DB::field('dateline', $starttime, '>=') : '';
		$sql .= $endtime ? ' AND '.DB::field('dateline', $endtime, '<') : '';
		$sql .= $useip ? ' AND '.DB::field('useip', $useip, 'like') : '';
		if(trim($keywords)) {
			$sqlkeywords = $or = '';
			foreach(explode(',', str_replace(' ', '', $keywords)) as $keyword) {
				$keyword = addslashes($keyword);
				$sqlkeywords .= " $or message LIKE '%$keyword%'";
				$or = 'OR';
			}
			$sql .= " AND ($sqlkeywords)";
		}
		if($sql) {
			return DB::result_first('SELECT COUNT(*) FROM %t WHERE 1 %i', array(self::get_tablename($tableid), $sql));
		} else {
			return 0;
		}
	}

	public function fetch_all_by_search($tableid, $tid = null, $keywords = null, $invisible = null, $fid = null, $authorid = null, $author = null, $starttime = null, $endtime = null, $useip = null, $first = null, $start = null, $limit = null) {
		$sql = '';
		$sql .= $tid ? ' AND '.DB::field('tid', $tid) : '';
		$sql .= $authorid ? ' AND '.DB::field('authorid', $authorid) : '';
		$sql .= $invisible !== null ? ' AND '.DB::field('invisible', $invisible) : '';
		$sql .= $first !== null ? ' AND '.DB::field('first', $first) : '';
		$sql .= $fid ? ' AND '.DB::field('fid', $fid) : '';
		$sql .= $author ? ' AND '.DB::field('author', $author) : '';
		$sql .= $starttime ? ' AND '.DB::field('dateline', $starttime, '>=') : '';
		$sql .= $endtime ? ' AND '.DB::field('dateline', $endtime, '<') : '';
		$sql .= $useip ? ' AND '.DB::field('useip', $useip, 'like') : '';
		if(trim($keywords)) {
			$sqlkeywords = $or = '';
			foreach(explode(',', str_replace(' ', '', $keywords)) as $keyword) {
				$keyword = addslashes($keyword);
				$sqlkeywords .= " $or message LIKE '%$keyword%'";
				$or = 'OR';
			}
			$sql .= " AND ($sqlkeywords)";
		}
		if($sql) {
			return DB::fetch_all('SELECT * FROM %t WHERE 1 %i ORDER BY dateline DESC %i', array(self::get_tablename($tableid), $sql, DB::limit($start, $limit)));
		} else {
			return array();
		}
	}

	public function count_prune_by_search($tableid, $isgroup = null, $keywords = null, $message_length = null, $fid = null, $authorid = null, $starttime = null, $endtime = null, $useip = null) {
		$sql = '';
		$sql .= $fid ? ' AND p.'.DB::field('fid', $fid) : '';
		$sql .= $isgroup ? ' AND t.'.DB::field('isgroup', $isgroup) : '';
		$sql .= $authorid !== null ? ' AND p.'.DB::field('authorid', $authorid) : '';
		$sql .= $starttime ? ' AND p.'.DB::field('dateline', $starttime, '>=') : '';
		$sql .= $endtime ? ' AND p.'.DB::field('dateline', $endtime, '<') : '';
		$sql .= $useip ? ' AND p.'.DB::field('useip', $useip, 'like') : '';
		$sql .= $message_length !== null ? ' AND LENGTH(p.message) < '.intval($message_length) : '';
		if(trim($keywords)) {
			$sqlkeywords = '';
			$or = '';
			$keywords = explode(',', str_replace(' ', '', $keywords));
			for($i = 0; $i < count($keywords); $i++) {
				if(preg_match("/\{(\d+)\}/", $keywords[$i])) {
					$keywords[$i] = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($keywords[$i], '/'));
					$sqlkeywords .= " $or p.subject REGEXP '".$keywords[$i]."' OR p.message REGEXP '".$keywords[$i]."'";
				} else {
					$keywords[$i] = addslashes($keywords[$i]);
					$sqlkeywords .= " $or p.subject LIKE '%".$keywords[$i]."%' OR p.message LIKE '%".$keywords[$i]."%'";
				}
				$or = 'OR';
			}
			$sql .= " AND ($sqlkeywords)";
		}
		if($sql) {
			if($isgroup) {
				return DB::result_first('SELECT COUNT(*)
					FROM %t p LEFT JOIN %t t USING(tid)
					WHERE 1 %i', array(self::get_tablename($tableid), 'forum_thread', $sql));
			} else {
				return DB::result_first('SELECT COUNT(*)
					FROM %t p
					WHERE 1 %i', array(self::get_tablename($tableid), $sql));
			}
		} else {
			return 0;
		}
	}

	/**
	 * 根据pid获取最新帖子
	 * @param int $pid: 从哪个pid开始
	 * @param int $start: 开始
	 * @param int $limit: 取多少条
	 * @param int $tableid: 表后缀
	 */
	public function fetch_all_new_post_by_pid($pid, $start = 0, $limit = 0, $tableid = 0, $glue = '>', $sort = 'ASC') {
		return $limit ? DB::fetch_all('SELECT * FROM '.DB::table($this->get_tablename($tableid)).
				' WHERE '.DB::field('pid', $pid, $glue).
				' ORDER BY '.DB::order('pid', $sort).
				DB::limit($start, $limit), $this->_pk) : array();
	}
	public function fetch_all_prune_by_search($tableid, $isgroup = null, $keywords = null, $message_length = null, $fid = null, $authorid = null, $starttime = null, $endtime = null, $useip = null, $outmsg = true, $start = null, $limit = null) {
		$sql = '';
		$sql .= $fid ? ' AND p.'.DB::field('fid', $fid) : '';
		$sql .= $isgroup ? ' AND t.'.DB::field('isgroup', $isgroup) : '';
		$sql .= $authorid !== null ? ' AND p.'.DB::field('authorid', $authorid) : '';
		$sql .= $starttime ? ' AND p.'.DB::field('dateline', $starttime, '>=') : '';
		$sql .= $endtime ? ' AND p.'.DB::field('dateline', $endtime, '<') : '';
		$sql .= $useip ? ' AND p.'.DB::field('useip', $useip, 'like') : '';
		$sql .= $message_length !== null ? ' AND LENGTH(p.message) < '.intval($message_length) : '';
		$postlist = array();
		if(trim($keywords)) {
			$sqlkeywords = '';
			$or = '';
			$keywords = explode(',', str_replace(' ', '', $keywords));
			for($i = 0; $i < count($keywords); $i++) {
				if(preg_match("/\{(\d+)\}/", $keywords[$i])) {
					$keywords[$i] = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($keywords[$i], '/'));
					$sqlkeywords .= " $or p.subject REGEXP '".$keywords[$i]."' OR p.message REGEXP '".$keywords[$i]."'";
				} else {
					$keywords[$i] = addslashes($keywords[$i]);
					$sqlkeywords .= " $or p.subject LIKE '%".$keywords[$i]."%' OR p.message LIKE '%".$keywords[$i]."%'";
				}
				$or = 'OR';
			}
			$sql .= " AND ($sqlkeywords)";
		}
		if($sql) {
			if($isgroup) {
				$query = DB::query('SELECT p.*, t.*
					FROM %t p LEFT JOIN %t t USING(tid)
					WHERE 1 %i %i', array(self::get_tablename($tableid), 'forum_thread', $sql, DB::limit($start, $limit)));
			} else {
				$query = DB::query('SELECT *
					FROM %t p
					WHERE 1 %i %i', array(self::get_tablename($tableid), $sql, DB::limit($start, $limit)));
			}
			while($post = DB::fetch($query)) {
				if(!$outmsg) {
					unset($post['message']);
				}
				$postlist[$post[$this->_pk]] = $post;
			}
		}
		return $postlist;
	}


	// post分表相关函数
	/**
	 *
	 * 通过tid得到相应的单一post表名或post表集合
	 * @param <mix> $tids: 允许传进单个tid，也可以是tid集合
	 * @param $primary: 是否只查主题表 0:遍历所有表;1:只查主表
	 * @return 当传进来的是单一的tid将直接返回表名，否则返回表集合的二维数组例:array('forum_post' => array(tids),'forum_post_1' => array(tids))
	 * @TODO tid传进来的是字符串的，返回单个表名，传进来的是数组的，不管是不是一个数组，返回的还是数组，保证进出值对应
	 */
	public static function getposttablebytid($tids, $primary = 0) {

		$isstring = false;
		if(!is_array($tids)) {
			$thread = getglobal('thread');
			if(!empty($thread) && isset($thread['posttableid']) && $tids == $thread['tid']) {
				return 'forum_post'.(empty($thread['posttableid']) ? '' : '_'.$thread['posttableid']);
			}
			$tids = array(intval($tids));
			$isstring = true;
		}
		// 过滤重复的tid
		$tids = array_unique($tids);
		// 反转数组、便于下面的踢除操作
		$tids = array_flip($tids);
		if(!$primary) {
			loadcache('threadtableids');
			$threadtableids = getglobal('threadtableids', 'cache');
			empty($threadtableids) && $threadtableids = array();
			if(!in_array(0, $threadtableids)) {
				$threadtableids = array_merge(array(0), $threadtableids);
			}
		} else {
			$threadtableids = array(0);
		}
		$tables = array();
		$posttable = '';
		foreach($threadtableids as $tableid) {
			$threadtable = $tableid ? "forum_thread_$tableid" : 'forum_thread';
			$query = DB::query("SELECT tid, posttableid FROM ".DB::table($threadtable)." WHERE tid IN(".dimplode(array_keys($tids)).")");
			while ($value = DB::fetch($query)) {
				$posttable = 'forum_post'.($value['posttableid'] ? "_$value[posttableid]" : '');
				$tables[$posttable][$value['tid']] = $value['tid'];
				unset($tids[$value['tid']]);
			}
			if(!count($tids)) {
				break;
			}
		}
		if(empty($posttable)) {
			$posttable = 'forum_post';
			$tables[$posttable] = array_flip($tids);
		}
		return $isstring ? $posttable : $tables;
	}
	public function show_table_columns($table) {
		$data = array();
		$db = &DB::object();
		if($db->version() > '4.1') {
			$query = $db->query("SHOW FULL COLUMNS FROM ".DB::table($table), 'SILENT');
		} else {
			$query = $db->query("SHOW COLUMNS FROM ".DB::table($table), 'SILENT');
		}
		while($field = @DB::fetch($query)) {
			$data[$field['Field']] = $field;
		}
		return $data;
	}

	/**
	 * 获取论坛帖子表名
	 * @param <int> $tableid: 分表ID，默认为：fourm_post表
	 * @param <boolean> $prefix: 是否默认带有表前缀
	 * @return forum_post or forum_post_*
	 */
	public static function getposttable($tableid = 0, $prefix = false) {
		global $_G;
		$tableid = intval($tableid);
		if($tableid) {
			//可以考虑在此加入验证表名
			loadcache('posttableids');
			$tableid = $_G['cache']['posttableids'] && in_array($tableid, $_G['cache']['posttableids']) ? $tableid : 0;
			$tablename = 'forum_post'.($tableid ? "_$tableid" : '');
		} else {
			$tablename = 'forum_post';
		}
		if($prefix) {
			$tablename = DB::table($tablename);
		}
		return $tablename;
	}

}
?>