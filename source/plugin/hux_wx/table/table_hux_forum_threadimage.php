<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_forum_threadimage.php 31800 2012-10-11 02:43:06Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_hux_forum_threadimage extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_threadimage';
		$this->_pk    = '';

		parent::__construct();
	}

	public function fetch_by_tid($tid,$field='*') {
		return DB::fetch_first("SELECT $field FROM %t WHERE tid=%d", array($this->_table, $tid));
	}

}

?>