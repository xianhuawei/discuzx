<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_security_mobile.class.php 166 2013-05-14 03:16:17Z vinsonbwang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class mobileplugin_discuz_security {

	public function common() {
		global $_G;
		//allowmobile,mobileseccode
		//全局用户监控
		$usernum = C::t('common_member_action_log')->count_per_hour($_G['uid'], "thread");
		if($_G['setting']['maxthreadsperhour']) {

		} else {
			if($usernum >= $_G['cache']['plugin']['discuz_security']['maxthread']) {
				$this->write_content_check_log($_G['uid'], $_G['clientip']);
				$_G['setting']['seccodestatus']  = $_G['setting']['mobile']['mobileseccode'] = pow(2,11) - 1;
			}
		}		
	}

	public function write_content_check_log($uid, $ip) {
		global $_G;
		$uid = intval($uid);
		if(empty($uid) || empty($ip)) {
			showmessage("no uid");
		}
		
		if ($result = DB::fetch_first("SELECT uid FROM " . DB::table('discuz_security_forum') . " WHERE username = '$_G[username]'")) {
			//echo 111;exit;
			C::t('#discuz_security#discuz_security_forum')->update($uid, $_G['username'], $ip);
		} else {
			//echo $_G['username'];exit;
			C::t('#discuz_security#discuz_security_forum')->insert($uid, $_G['username'], $ip);
		}
	}
}


?>