<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_discuz_security_banip.php 136 2013-05-13 09:13:53Z lucashen $
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member_status_child extends table_common_member_status {

	public function result_lastpost() {
		global $_G;
		return DB::result_first("SELECT lastpost FROM %t WHERE uid = %d", array($this->_table, $_G['uid']));
	}

}
