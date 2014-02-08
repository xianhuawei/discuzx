<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_forum_forum extends discuz_table_archive
{
	public function __construct() {

		$this->_table = 'forum_forum';
		$this->_pk    = 'fid';

		parent::__construct();
	}

	public function update_by_fid($fid,$value) {
		return DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$value', posts=posts+1, todayposts=todayposts+1 WHERE fid='$fid'", 'UNBUFFERED');
	}
	
	public function insert_id() {
		return DB::insert_id();
	}
}

?>