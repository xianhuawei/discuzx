<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_database.php 33326 2013-05-28 08:52:45Z kamichen $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class discuz_database {

	/**
	 * @var db_driver_mysql 数据库引擎
	 */
	public static $db;

	/**
	 * @var string 数据库引擎的类名
	 */
	public static $driver;

	public static function init($driver, $config) {
		self::$driver = $driver;
		self::$db = new $driver;
		self::$db->set_config($config);
		self::$db->connect();
	}

	/**
	 * 返回 DB object 指针
	 *
	 * @return db_driver_mysql
	 */
	public static function object() {
		return self::$db;
	}

	/**
	 * 给表名加上前缀(pre_$table)
	 *
	 * @param string $table 原始表名
	 * @return string
	 */
	public static function table($table) {
		return self::$db->table_name($table);
	}

	/**
	 * 删除一条或者多条记录
	 *
	 * @param string $table 原始表名
	 * @param string $condition 条件语句，不需要写WHERE, 可以支持数组
	 * @param int $limit 删除条目数
	 * @param boolean $unbuffered 立即返回？
	 */
	public static function delete($table, $condition, $limit = 0, $unbuffered = true) {
		if (empty($condition)) {
			return false;
		} elseif (is_array($condition)) {
			if (count($condition) == 2 && isset($condition['where']) && isset($condition['arg'])) {
				$where = self::format($condition['where'], $condition['arg']);
			} else {
				$where = self::implode_field_value($condition, ' AND ');
			}
		} else {
			$where = $condition;
		}
		$limit = dintval($limit);
		$sql = "DELETE FROM " . self::table($table) . " WHERE $where " . ($limit > 0 ? "LIMIT $limit" : '');
		return self::query($sql, ($unbuffered ? 'UNBUFFERED' : ''));
	}

	/**
	 * 插入一条记录
	 *
	 * @param string $table 原始表名
	 * @param array $data 数组field->value 对
	 * @param boolen $return_insert_id 返回 InsertID?
	 * @param boolen $replace 是否是REPLACE模式
	 * @param boolen $silent 屏蔽错误？
	 * @return InsertID or Result
	 */
	public static function insert($table, $data, $return_insert_id = false, $replace = false, $silent = false) {

		$sql = self::implode($data);

		$cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';

		$table = self::table($table);
		$silent = $silent ? 'SILENT' : '';

		return self::query("$cmd $table SET $sql", null, $silent, !$return_insert_id);
	}

	/**
	 * 更新一条或者多条数据记录
	 *
	 * @param string $table 原始表名
	 * @param array $data 数据field-value
	 * @param string $condition 条件语句，不需要写WHERE
	 * @param boolean $unbuffered 迅速返回？
	 * @param boolan $low_priority 延迟更新？
	 * @return result
	 */
	public static function update($table, $data, $condition, $unbuffered = false, $low_priority = false) {
		$sql = self::implode($data);
		if(empty($sql)) {
			return false;
		}
		$cmd = "UPDATE " . ($low_priority ? 'LOW_PRIORITY' : '');
		$table = self::table($table);
		$where = '';
		if (empty($condition)) {
			$where = '1';
		} elseif (is_array($condition)) {
			$where = self::implode($condition, ' AND ');
		} else {
			$where = $condition;
		}
		$res = self::query("$cmd $table SET $sql WHERE $where", $unbuffered ? 'UNBUFFERED' : '');
		return $res;
	}

	/**
	 * 返回插入的ID
	 *
	 * @return int
	 */
	public static function insert_id() {
		return self::$db->insert_id();
	}

	/**
	 * 依据查询结果，返回一行数据
	 *
	 * @param resourceID $resourceid
	 * @return array
	 */
	public static function fetch($resourceid, $type = MYSQL_ASSOC) {
		return self::$db->fetch_array($resourceid, $type);
	}

	/**
	 * 依据SQL文，返回一条查询结果
	 * @param string $sql SQL文， 支持%格式化
	 * @param array $arg 格式化参数值, 如果为空， 则不对SQL文处理
	 * @param boolean $silent 是否静默方式运行
	 * @return array
	 */
	public static function fetch_first($sql, $arg = array(), $silent = false) {
		$res = self::query($sql, $arg, $silent, false);
		$ret = self::$db->fetch_array($res);
		self::$db->free_result($res);
		return $ret ? $ret : array();
	}

	/**
	 * 依据SQL文，返回所有查询结果

	 * @param string $sql SQL文， 支持%格式化
	 * @param string $arg 格式化参数值，如果为空， 则不对SQL文处理
	 * @param string $keyfield 使用某个字段值作为返回数组的键值
	 * @param boolean $silent 是否使用静默方式
	 * @return array
	 *
	 * <code>
	 * Exp: fetch_all('SELECT * FROM %t WHERE uid>20', array('common_member'), 'uid');
	 * Ret: array(
	 * 	21=> array('uid'=>21, 'username'=>'admin'),
	 * 	22=> array('uid'=>22, 'username'=>'admin')
	 * 	)
	 *
	 * Exp: fetch_all('SELECT * FROM %t WHERE uid>20', array('common_member'));
	 * Ret: array(
	 * 	0 => array('uid'=>21, 'username'=>'admin'),
	 * 	1 => array('uid'=>22, 'username'=>'admin')
	 * 	)
	 *
	 * </code>
	 */
	public static function fetch_all($sql, $arg = array(), $keyfield = '', $silent=false) {

		$data = array();
		$query = self::query($sql, $arg, $silent, false);
		while ($row = self::$db->fetch_array($query)) {
			if ($keyfield && isset($row[$keyfield])) {
				$data[$row[$keyfield]] = $row;
			} else {
				$data[] = $row;
			}
		}
		self::$db->free_result($query);
		return $data;
	}

	/**
	 * 依据查询结果，返回结果数值
	 *
	 * @param resourceid $resourceid
	 * @return string or int
	 */
	public static function result($resourceid, $row = 0) {
		return self::$db->result($resourceid, $row);
	}

	/**
	 * 返回查询结果的第一行，第一列
	 * @param string $sql SQL 文
	 * @param array $arg  SQL替换参数值，如果为空， 则不对SQL文处理
	 * @param boolean $silent 是否静默方式
	 * @return string
	 */
	public static function result_first($sql, $arg = array(), $silent = false) {
		$res = self::query($sql, $arg, $silent, false);
		$ret = self::$db->result($res, 0);
		self::$db->free_result($res);
		return $ret;
	}

	/**
	 * 执行 Mysql 查询
	 *
	 * <code>
	 * Exp: query('SELECT * FROM %t WHERE uid=%d AND username=%s LIMIT %d', array('common_member', 1, 'admin', 1));
	 * </code>
	 *
	 * @see discuz_database::format
	 *
	 * @param string $sql SQL文， 支持使用 %t,%f,%d, %s 定义参数, 见 db::format
	 * @param array $arg 替换变量， 将 SQL 文中定义的参数替换成具体数值，如果为空， 则不对SQL文处理
	 * @param boolean $silent 是否使用静默方式（当查询进行时，不进行报错）
	 * @param boolean $unbuffered 是否使用 unbuffered 参数
	 * @return resource
	 */
	public static function query($sql, $arg = array(), $silent = false, $unbuffered = false) {
		if (!empty($arg)) {
			/* 用arg中的数值替代 sql 文中的 % 内容 */
			if (is_array($arg)) {
				$sql = self::format($sql, $arg);
				/* 兼容旧代码 */
			} elseif ($arg === 'SILENT') {
				$silent = true;

				/* 兼容旧代码 */
			} elseif ($arg === 'UNBUFFERED') {
				$unbuffered = true;
			}
		}
		self::checkquery($sql);

		$ret = self::$db->query($sql, $silent, $unbuffered);
		if (!$unbuffered && $ret) {
			$cmd = trim(strtoupper(substr($sql, 0, strpos($sql, ' '))));
			if ($cmd === 'SELECT') {

			} elseif ($cmd === 'UPDATE' || $cmd === 'DELETE') {
				$ret = self::$db->affected_rows();
			} elseif ($cmd === 'INSERT') {
				$ret = self::$db->insert_id();
			}
		}
		return $ret;
	}

	/**
	 * 返回select的结果行数
	 *
	 * @param resource $resourceid
	 * @return int
	 */
	public static function num_rows($resourceid) {
		return self::$db->num_rows($resourceid);
	}

	/**
	 * 返回sql语句所影响的记录行数
	 *
	 * @return int
	 */
	public static function affected_rows() {
		return self::$db->affected_rows();
	}

	public static function free_result($query) {
		return self::$db->free_result($query);
	}

	public static function error() {
		return self::$db->error();
	}

	public static function errno() {
		return self::$db->errno();
	}

	public static function checkquery($sql) {
		return discuz_database_safecheck::checkquery($sql);
	}

	/**
	 * 使用单引号包裹字串且进行addslashes处理
	 * <code>
	 * exp: quote("test'test");
	 * out:  'test\\\'test'
	 * </code>
	 * @param string|array $str
	 * @param boolean $noarray 不处理数组
	 * @return mix
	 */
	public static function quote($str, $noarray = false) {

		if (is_string($str))
			return '\'' . addcslashes($str, "\n\r\\'\"\032") . '\'';

		if (is_int($str) or is_float($str))
			return '\'' . $str . '\'';

		if (is_array($str)) {
			if($noarray === false) {
				foreach ($str as &$v) {
					$v = self::quote($v, true);
				}
				return $str;
			} else {
				return '\'\'';
			}
		}

		if (is_bool($str))
			return $str ? '1' : '0';

		return '\'\'';
	}

	/**
	 * 格式化输出字段, 字段名两端使用 ` 包裹
	 * <code>
	 * Exp: quote_field('uid')
	 * Out: `uid`
	 * </code>
	 * @param string|array $field
	 * @return mix
	 */
	public static function quote_field($field) {
		if (is_array($field)) {
			foreach ($field as $k => $v) {
				$field[$k] = self::quote_field($v);
			}
		} else {
			if (strpos($field, '`') !== false)
				$field = str_replace('`', '', $field);
			$field = '`' . $field . '`';
		}
		return $field;
	}

	/**
	 * 格式化输出 LIMIT
	 * <code>
	 * Exp: limit(1)
	 * out: LIMIT 1
	 * Exp: limit(1,5)
	 * out: LIMIT 1,5
	 * Exp: limit(0, 8)
	 * Out: LIMIT 8
	 * </code>
	 * @param int $start 起始点
	 * @param int $limit 条目数
	 * @return string
	 */
	public static function limit($start, $limit = 0) {
		$limit = intval($limit > 0 ? $limit : 0);
		$start = intval($start > 0 ? $start : 0);
		if ($start > 0 && $limit > 0) {
			return " LIMIT $start, $limit";
		} elseif ($limit) {
			return " LIMIT $limit";
		} elseif ($start) {
			return " LIMIT $start";
		} else {
			return '';
		}
	}

	/**
	 * 格式化输出 ORDER
	 * <code>
	 * Exp: order('username', 'desc');
	 * Out: `username` DESC
	 * </code>
	 * @param string $field
	 * @param string $order
	 * @return string
	 */
	public static function order($field, $order = 'ASC') {
		if(empty($field)) {
			return '';
		}
		$order = strtoupper($order) == 'ASC' || empty($order) ? 'ASC' : 'DESC';
		return self::quote_field($field) . ' ' . $order;
	}

	/**
	 * 格式化字段与字段数值, 使用 $glue 定义的字符连接字段名与字段值
	 *
	 * <code>
	 * Exp: field('username', 'admin')
	 * Out: `username`='admin';
	 *
	 * Exp: field('credits', 3, '+')
	 * Out: `credits`=`credits`+3
	 *
	 * Exp: field('uid', array(1,2,3))
	 * Out: `uid` IN('1','2','3')
	 *
	 * @param string $field
	 * @param string|array $val 字段值, 连接符为"in"时,支持数组
	 * @param string(=,like,in,notin,+,-,|,&,>,<,<>,<=,>=) $glue 连接符
	 * @return string
	 */
	public static function field($field, $val, $glue = '=') {

		$field = self::quote_field($field);

		if (is_array($val)) {
			$glue = $glue == 'notin' ? 'notin' : 'in';
		} elseif ($glue == 'in') {
			$glue = '=';
		}

		switch ($glue) {
			case '=':
				return $field . $glue . self::quote($val);
				break;
			case '-':
			case '+':
				return $field . '=' . $field . $glue . self::quote((string) $val);
				break;
			case '|':
			case '&':
			case '^':
				return $field . '=' . $field . $glue . self::quote($val);
				break;
			case '>':
			case '<':
			case '<>':
			case '<=':
			case '>=':
				return $field . $glue . self::quote($val);
				break;

			case 'like':
				return $field . ' LIKE(' . self::quote($val) . ')';
				break;

			case 'in':
			case 'notin':
				$val = $val ? implode(',', self::quote($val)) : '\'\'';
				return $field . ($glue == 'notin' ? ' NOT' : '') . ' IN(' . $val . ')';
				break;

			default:
				throw new DbException('Not allow this glue between field and value: "' . $glue . '"');
		}
	}

	/**
	 * 格式化field字段和value，并组成一个字符串
	 *
	 * @param array $array 格式为 key=>value 数组
	 * @param 分割符 $glue
	 * @return string
	 */
	public static function implode($array, $glue = ',') {
		$sql = $comma = '';
		$glue = ' ' . trim($glue) . ' ';
		foreach ($array as $k => $v) {
			$sql .= $comma . self::quote_field($k) . '=' . self::quote($v);
			$comma = $glue;
		}
		return $sql;
	}

	/**
	 * 准备废弃了, 简写成 DB::implode
	 */
	public static function implode_field_value($array, $glue = ',') {
		return self::implode($array, $glue);
	}

	/**
	 * 格式化输出 SQL 字符串
	 * @param string $sql 支持使用 %t,%f,%d, %s, %i定义参数
	 * @param array $arg 参数替换数组
	 * @return string
	 * <code>
	 * EXP:
	 * 	%t table名字参数， 替换时候自动加上 table的前缀
	 * 	%s 字符串， 替换时候自动使用 '' 进行包裹，并进行 addslashes 处理
	 * 	%d 整数字串， 替换时自动取整
	 * 	%f 浮点字串， 替换时格式化为浮点
	 * 	%i 忽略字串， 替换时不进行任何处理
	 *
	 * ATT:
	 * 	1. 其他未定义的 % 命令，将会自动作为 %s 处理
	 * 	2. 当SQL文中定义的 %参数个数大于传递进入的 $arg 的个数， 则系统报错并终止
	 *
	 * </code>
	 */
	public static function format($sql, $arg) {
		$count = substr_count($sql, '%');
		if (!$count) {
			return $sql;
		} elseif ($count > count($arg)) {
			throw new DbException('SQL string format error! This SQL need "' . $count . '" vars to replace into.', 0, $sql);
		}

		$len = strlen($sql);
		$i = $find = 0;
		$ret = '';
		while ($i <= $len && $find < $count) {
			if ($sql{$i} == '%') {
				$next = $sql{$i + 1};
				if ($next == 't') {
					$ret .= self::table($arg[$find]);
				} elseif ($next == 's') {
					$ret .= self::quote(is_array($arg[$find]) ? serialize($arg[$find]) : (string) $arg[$find]);
				} elseif ($next == 'f') {
					$ret .= sprintf('%F', $arg[$find]);
				} elseif ($next == 'd') {
					$ret .= dintval($arg[$find]);
				} elseif ($next == 'i') {
					$ret .= $arg[$find];
				} elseif ($next == 'n') {
					if (!empty($arg[$find])) {
						$ret .= is_array($arg[$find]) ? implode(',', self::quote($arg[$find])) : self::quote($arg[$find]);
					} else {
						$ret .= '0';
					}
				} else {
					$ret .= self::quote($arg[$find]);
				}
				$i++;
				$find++;
			} else {
				$ret .= $sql{$i};
			}
			$i++;
		}
		if ($i < $len) {
			$ret .= substr($sql, $i);
		}
		return $ret;
	}

}

class discuz_database_safecheck {

	protected static $checkcmd = array('SEL'=>1, 'UPD'=>1, 'INS'=>1, 'REP'=>1, 'DEL'=>1);
	protected static $config;

	/**
	 *
	 * @staticvar string $status
	 * @staticvar array $checkcmd
	 * @param type $sql
	 * @return type
	 */
	public static function checkquery($sql) {
		if (self::$config === null) {
			self::$config = getglobal('config/security/querysafe');
		}
		if (self::$config['status']) {
			$check = 1;
			$cmd = strtoupper(substr(trim($sql), 0, 3));
			if(isset(self::$checkcmd[$cmd])) {
				$check = self::_do_query_safe($sql);
			} elseif(substr($cmd, 0, 2) === '/*') {
				$check = -1;
			}

			if ($check < 1) {
				throw new DbException('It is not safe to do this query', 0, $sql);
			}
		}
		return true;
	}

	private static function _do_query_safe($sql) {
		$sql = str_replace(array('\\\\', '\\\'', '\\"', '\'\''), '', $sql);
		$mark = $clean = '';
		if (strpos($sql, '/') === false && strpos($sql, '#') === false && strpos($sql, '-- ') === false && strpos($sql, '@') === false && strpos($sql, '`') === false) {
			$clean = preg_replace("/'(.+?)'/s", '', $sql);
		} else {
			$len = strlen($sql);
			$mark = $clean = '';
			for ($i = 0; $i < $len; $i++) {
				$str = $sql[$i];
				switch ($str) {
					case '`':
						if(!$mark) {
							$mark = '`';
							$clean .= $str;
						} elseif ($mark == '`') {
							$mark = '';
						}
						break;
					case '\'':
						if (!$mark) {
							$mark = '\'';
							$clean .= $str;
						} elseif ($mark == '\'') {
							$mark = '';
						}
						break;
					case '/':
						if (empty($mark) && $sql[$i + 1] == '*') {
							$mark = '/*';
							$clean .= $mark;
							$i++;
						} elseif ($mark == '/*' && $sql[$i - 1] == '*') {
							$mark = '';
							$clean .= '*';
						}
						break;
					case '#':
						if (empty($mark)) {
							$mark = $str;
							$clean .= $str;
						}
						break;
					case "\n":
						if ($mark == '#' || $mark == '--') {
							$mark = '';
						}
						break;
					case '-':
						if (empty($mark) && substr($sql, $i, 3) == '-- ') {
							$mark = '-- ';
							$clean .= $mark;
						}
						break;

					default:

						break;
				}
				$clean .= $mark ? '' : $str;
			}
		}

		if(strpos($clean, '@') !== false) {
			return '-3';
		}

		$clean = preg_replace("/[^a-z0-9_\-\(\)#\*\/\"]+/is", "", strtolower($clean));

		if (self::$config['afullnote']) {
			$clean = str_replace('/**/', '', $clean);
		}

		if (is_array(self::$config['dfunction'])) {
			foreach (self::$config['dfunction'] as $fun) {
				if (strpos($clean, $fun . '(') !== false)
					return '-1';
			}
		}

		if (is_array(self::$config['daction'])) {
			foreach (self::$config['daction'] as $action) {
				if (strpos($clean, $action) !== false)
					return '-3';
			}
		}

		if (self::$config['dlikehex'] && strpos($clean, 'like0x')) {
			return '-2';
		}

		if (is_array(self::$config['dnote'])) {
			foreach (self::$config['dnote'] as $note) {
				if (strpos($clean, $note) !== false)
					return '-4';
			}
		}

		return 1;
	}

	public static function setconfigstatus($data) {
		self::$config['status'] = $data ? 1 : 0;
	}

}

?>