<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class discuz_redis {
	public static $db;

	public static function init($config) {
		if($config['server'] && $config['port']) {
			self::$db = new db_driver_redis();
			self::$db->init($config);
		}
		self::$db->connect();
	}
	
	public static function zrevrange($set, $start, $limit) {
		return self::$db->zrevrange($set, $start, $start + $limit -1);
	}
	
	public static function insert_zsets($member, $sets) {
		foreach($sets as $set=>$value) {
			self::insert_zset($set, $value, $member);
		}
	}
	
	public static function insert_zset($set, $value, $member) {
		self::$db->zadd($set, $value, $member);
	}
	
	public static function delete_zsets($member, $sets) {
		foreach($sets as $s) {
			self::delete_zset($s, $member);
		}
	}
	
	public static function delete_zset($set, $member) {
		self::$db->zrem($set, $member);
	}
	
	public static function iszmember($set, $member) {
		$score = self::$db->zscore($set, $member);
		if($score) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function smembers($set) {
		return self::$db->smembers($set);
	}
	
	public static function zincr($set, $value, $member) {
		self::$db->zincr($set, $value, $member);
	}
	
	public static function zcard($set) {
		return self::$db->zcard($set);
	}
}