<?php 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class db_driver_redis {
	var $config;
	var $link;
	var $enable;
	
	public function init($config) {
		$this->config = $config;
	}
	
	public function connect() {
		$this->link = $this->_dbconnect(
			$this->config['server'],
			$this->config['port'],
			$this->config['auth'],
			$this->config['pconnect'],
			$this->config['db']
		);
	}
	
	private function _dbconnect($host, $port, $auth, $pconnect, $db = 0) {
		if(!empty($host)) {
			try {
				$link= new Redis();
				if($pconnect) {
					$connect = @$link->pconnect($host, $port);
				} else {
					$connect = @$link->connect($host, $port);
				}
			} catch (RedisException $e) {
			}
			$this->enable = $connect ? true : false;
		}
		if($this->enable) {
			return $link;
		} else {
			return null;
		}
	}
	
	public function zrevrange($key, $start, $end) {
		return $this->link->zrevrange($key, $start, $end);
	}
	
	public function zadd($key, $score, $member) {
		return $this->link->zadd($key, $score, $member);
	}
	
	public function zscore($key, $member){
		return $this->link->zScore($key, $member);
	}
	
	public function zrem($key, $member) {
		$this->link->zdelete($key, $member);
	}
	
	public function smembers($key) {
		return $this->link->smembers($key);
	}
	
	public function zincr($key, $score, $member) {
		$this->link->zincrby($key, $score, $member);
	}
	
	public function zcard($key) {
		return $this->link->zcard($key);
	}
}
?>