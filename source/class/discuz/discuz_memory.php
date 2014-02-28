<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_memory.php 31432 2012-08-28 03:04:18Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 * Discuz 内存读写引擎
 * 支持 memcache, eAccelerator, XCache, apc
 *
 * 使用的时候建议直接利用函数 memory()
 */
class discuz_memory extends discuz_base
{
	private $config;
	private $extension = array();
	private $memory;
	private $prefix; //系统内置的键值前缀
	private $userprefix; //用户设置的键值前缀
	public $type;
	public $enable = false;
	public $debug = array();

	/**
	 * 确认当前系统支持的内存读写接口
	 * @return discuz_memory
	 */
	public function __construct() {
		$this->extension['redis'] = extension_loaded('redis');
		$this->extension['memcache'] = extension_loaded('memcache');
        /*
		$this->extension['apc'] = function_exists('apc_cache_info') && @apc_cache_info();
		$this->extension['xcache'] = function_exists('xcache_get');
		$this->extension['eaccelerator'] = function_exists('eaccelerator_get');
		$this->extension['wincache'] = function_exists('wincache_ucache_meminfo') && wincache_ucache_meminfo();
        */
	}

	/**
	 * 依据config当中设置，初始化内存引擎
	 * @param unknown_type $config
	 */
	public function init($config) {
		$this->config = $config;
		$this->prefix = empty($config['prefix']) ? substr(md5($_SERVER['HTTP_HOST']), 0, 6).'_' : $config['prefix'];


		// redis 接口
		if($this->extension['redis'] && !empty($config['redis']['server'])) {
			$this->memory = new memory_driver_redis();
			$this->memory->init($this->config['redis']);
			if(!$this->memory->enable) {
				$this->memory = null;
			}
		}

		// memcache 接口
		if($this->extension['memcache'] && !empty($config['memcache']['server'])) {
			$this->memory = new memory_driver_memcache();
			$this->memory->init($this->config['memcache']);
			if(!$this->memory->enable) {
				$this->memory = null;
			}
		}

		//apc 接口\eaccelerator 接口\xcache 接口
		foreach(array('apc', 'eaccelerator', 'xcache', 'wincache') as $cache) {
			if(!is_object($this->memory) && $this->extension[$cache] && $this->config[$cache]) {
				$class_name = 'memory_driver_'.$cache;
				$this->memory = new $class_name();
				$this->memory->init(null);
			}
		}

		// 当接口正常，引入当前已经缓存的变量数组
		if(is_object($this->memory)) {
			$this->enable = true;
			$this->type = str_replace('memory_driver_', '', get_class($this->memory));
		}

	}

	/**
	 * 读取内存
	 *
	 * @param string|array $key
	 * @return mix
	 */
	public function get($key, $prefix = '') {
		static $getmulti = null;
		$ret = false;
		if($this->enable) {
			if(!isset($getmulti)) $getmulti = method_exists($this->memory, 'getMulti');
			$this->userprefix = $prefix;
			if(is_array($key)) {
				if($getmulti) {
					$ret = $this->memory->getMulti($this->_key($key));
					//格式化数组的KEY，去掉表前缀
					if($ret !== false && !empty($ret)) {
						$_ret = array();
						foreach((array)$ret as $_key => $value) {
							$_ret[$this->_trim_key($_key)] = $value;
						}
						$ret = $_ret;
					}
				} else {
					$ret = array();
					$_ret = false;
					//循环取值
					foreach($key as $id) {
						if(($_ret = $this->memory->get($this->_key($id))) !== false && isset($_ret)) {
							$ret[$id] = $_ret;
						}
					}
				}
				//无值返回false
				if(empty($ret)) $ret = false;
			} else {
				$ret = $this->memory->get($this->_key($key));
				if(!isset($ret)) $ret = false;
			}
		}
		return $ret;
	}

	/**
	 * 写入内存
	 *
	 * @param string $key
	 * @param array_string_number $value
	 * @param int过期时间 $ttl
	 * @return boolean
	 */
	public function set($key, $value, $ttl = 0, $prefix = '') {

		$ret = false;
		if($value === false) $value = '';
		if($this->enable) {
			$this->userprefix = $prefix;
			$ret = $this->memory->set($this->_key($key), $value, $ttl);
		}
		return $ret;
	}

	/**
	 * 删除一个内存单元
	 * @param string|array $key 键值
	 * @return boolean
	 */
	public function rm($key, $prefix = '') {
		$ret = false;
		if($this->enable) {
			$this->userprefix = $prefix;
			$key = $this->_key($key);
			foreach((array)$key as $id) {
				$ret = $this->memory->rm($id);
			}
		}
		return $ret;
	}

	/**
	 * 清除当前使用的所有内存
	 */
	public function clear() {
		$ret = false;
		if($this->enable && method_exists($this->memory, 'clear')) {
			$ret = $this->memory->clear();
		}
		return $ret;
	}

	/**
	 * 增加一个元素的值
	 * @param string $key 要增加的元素的KEY
	 * @param int $step 增加值的大小
	 * @return bool 成功返回新值,失败返回false
	 */
	public function inc($key, $step = 1) {
		static $hasinc = null;
		$ret = false;
		if($this->enable) {
			if(!isset($hasinc)) $hasinc = method_exists($this->memory, 'inc');
			if($hasinc) {
				$ret = $this->memory->inc($this->_key($key), $step);
			} else {
				if(($data = $this->memory->get($key)) !== false) {
					$ret = ($this->memory->set($key, $data + ($step)) !== false ? $this->memory->get($key) : false);
				}
			}
		}
		return $ret;
	}

	/**
	 * 减少一个元素的值
	 * @param string $key 要减少的元素的KEY
	 * @param int $step 减少值的大小
	 * @return bool 成功返回新值,失败返回false
	 */
	public function dec($key, $step = 1) {
		static $hasdec = null;
		$ret = false;
		if($this->enable) {
			if(!isset($hasdec)) $hasdec = method_exists($this->memory, 'dec');
			if($hasdec) {
				$ret = $this->memory->dec($this->_key($key), $step);
			} else {
				if(($data = $this->memory->get($key)) !== false) {
					$ret = ($this->memory->set($key, $data - ($step)) !== false ? $this->memory->get($key) : false);
				}
			}
		}
		return $ret;
	}

	/**
	 * 内部函数 追加键值前缀
	 * @param string|array $str
	 * @return string|array 处理结果
	 */
	private function _key($str) {
		$perfix = $this->prefix.$this->userprefix;
		if(is_array($str)) {
			foreach($str as &$val) {
				$val = $perfix.$val;
			}
		} else {
			$str = $perfix.$str;
		}
		return $str;
	}

	/**
	 * 清除键值前缀
	 * @param string|array $str
	 * @return string|array 处理结果
	 */
	private function _trim_key($str) {
		return substr($str, strlen($this->prefix.$this->userprefix));
	}

	public function getextension() {
		return $this->extension;
	}

	public function getconfig() {
		return $this->config;
	}
}

?>