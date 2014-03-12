<?php
/*
 *      $Id: 2013/10/8 15:02:06 discuz_database_ext.php Luca Shin $
 */

class discuz_database_ext extends discuz_database {
	public static $_ext_table = array('common_member_grouppm', 'forum_threaddisablepos', 'common_process', 'common_visit', 'common_session', 'forum_postposition');
	public static function count_all($table) {
        $linkId = 1;
        if(!empty(self::$db->config['map']) && !empty(self::$db->config['map'][$table])) {
            $linkId = self::$db->config['map'][$table];
        }
        $dbname = self::$db->config[$linkId]['dbname'];
        $table = self::$db->table_name($table);

        self::$db->select_db('information_schema');
        $count = self::$db->result(mysql_query("SELECT TABLE_ROWS FROM `TABLES` WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table'", self::$db->curlink));
        self::$db->select_db($dbname);
        return $count;
	}

	public static function result_first($sql, $arg = array(), $silent = false) {
		if(preg_match("/^select\s+count\(\*\)\s+/i", $sql)) {
			$sql_a = preg_match("/%[a-zA-Z]+/i", $sql) ? self::format($sql, $arg) : $sql;
			if(preg_match("/(where\s+1\s*)+$/i", $sql_a) || !preg_match("/where/i", $sql_a)) {
				preg_match("/FROM\s+[`]?(\w+)[`]?/i", $sql_a, $match);
				global $_G;
				$table = str_replace($_G['config']['db'][1]['tablepre'], '', $match[1]);
				if(!in_array($table, self::$_ext_table)) {
					return self::count_all($table);
				}
			}
		}
		$res = self::query($sql, $arg, $silent, false);
		$ret = self::$db->result($res, 0);
		self::$db->free_result($res);
		return $ret;
	}
}
