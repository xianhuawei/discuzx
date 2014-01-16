<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		帖子索引表 按用户分表
 *      $Id: table_forum_post_author.php
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_post_location extends discuz_table
{
	public function __construct($uid = '') {
		$this->_table = 'forum_post_author'.$this->get_tablename($uid);
		$this->_pk    = 'pid';
		$this->_pre_cache_key = 'forum_post_author_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 0;

		parent::__construct();
	}

	public function get_tablename($uid='', $prefix = false){
		global $_G;
		$uid = intval($uid);
		if($tableid) {
			loadcache('posttableids');
			$tableid =  ($uid !== '' && $uid >0) ? ($uid % count($_G['cache']['posttableids'])) : '';
			$tablename = 'forum_post_author'.($tableid ? "_$tableid" : '');
		} else {
			$tablename = 'forum_post_author';
		}
		
		if($prefix) {
			$tablename = DB::table($tablename);
		}
		return $tablename;
	}
	
}

?>