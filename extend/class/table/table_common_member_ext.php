<?php

/*
 *      $Id: 2013/6/24 13:04:17 table_common_member_ext.php Luca Shin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member_ext extends table_common_member
{

	public function split($splitnum, $iscron = false) {
		loadcache('membersplitdata');
		@set_time_limit(0);
		discuz_database_safecheck::setconfigstatus(0);
		$dateline = TIMESTAMP - 7776000;//60*60*24*90
		$temptablename = DB::table('common_member_temp___');
		if(!DB::fetch_first("SHOW TABLES LIKE '$temptablename'")) {
			DB::query("CREATE TABLE $temptablename (`uid` int(10) NOT NULL DEFAULT 0,PRIMARY KEY (`uid`)) ENGINE=MYISAM;");
		}
		$splitnum = max(1, intval($splitnum));
        //if(!DB::result_first('SELECT COUNT(*) FROM '.$temptablename)) {
        if(!DB::fetch_first('SELECT * FROM '.$temptablename.' LIMIT 1')) {
			DB::query('INSERT INTO '.$temptablename.' (`uid`) SELECT ms.uid AS uid FROM %t mc, %t ms WHERE mc.posts<5 AND ms.lastvisit<%d AND mc.uid=ms.uid ORDER BY ms.lastvisit LIMIT %d', array('common_member_count', 'common_member_status', $dateline, $splitnum));
		}

        //if(DB::result_first('SELECT COUNT(*) FROM '.$temptablename)) {
        if(DB::fetch_first('SELECT * FROM '.$temptablename.' LIMIT 1')) {
			if(!$iscron && getglobal('setting/memberspliting') === null) {
				$this->switch_keys('disable');
			}
			$uidlist = DB::fetch_all('SELECT uid FROM '.$temptablename, null, 'uid');
			$uids = dimplode(array_keys($uidlist));
			$movesql = 'REPLACE INTO %t SELECT * FROM %t WHERE uid IN ('.$uids.')';
			$deletesql = 'DELETE FROM %t WHERE uid IN ('.$uids.')';
			if(DB::query($movesql, array('common_member_archive', 'common_member'), false, true)) {
				DB::query($deletesql, array('common_member'), false, true);
			}
			if(DB::query($movesql, array('common_member_profile_archive', 'common_member_profile'), false, true)) {
				DB::query($deletesql, array('common_member_profile'), false, true);
			}
			if(DB::query($movesql, array('common_member_field_forum_archive', 'common_member_field_forum'), false, true)) {
				DB::query($deletesql, array('common_member_field_forum'), false, true);
			}
			if(DB::query($movesql, array('common_member_field_home_archive', 'common_member_field_home'), false, true)) {
				DB::query($deletesql, array('common_member_field_home'), false, true);
			}
			if(DB::query($movesql, array('common_member_status_archive', 'common_member_status'), false, true)) {
				DB::query($deletesql, array('common_member_status'), false, true);
			}
			if(DB::query($movesql, array('common_member_count_archive', 'common_member_count'), false, true)) {
				DB::query($deletesql, array('common_member_count'), false, true);
			}

			DB::query('DROP TABLE '.$temptablename);
			$membersplitdata = getglobal('cache/membersplitdata');
			$zombiecount = $membersplitdata['zombiecount'] - $splitnum;
			if($zombiecount < 0) {
				$zombiecount = 0;
			}
			savecache('membersplitdata', array('membercount' => $membersplitdata['membercount'], 'zombiecount' => $zombiecount, 'dateline' => TIMESTAMP));
			C::t('common_setting')->delete('memberspliting');
			return true;
		} else {
			DB::query('DROP TABLE '.$temptablename);
			if(!$iscron) {
				$this->switch_keys('enable');
				C::t('common_member_profile')->optimize();
				C::t('common_member_field_forum')->optimize();
				C::t('common_member_field_home')->optimize();
			}
			return false;
		}
	}
}
