<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

DB::query("UPDATE ".DB::table('common_usergroup_field')." SET `allowmediacode`='1' WHERE groupid>0");
DB::query("UPDATE ".DB::table('forum_forum')." SET `allowmediacode`='1' WHERE fid>0");
cpmsg('media setting succeed', '', 'succeed');

?>