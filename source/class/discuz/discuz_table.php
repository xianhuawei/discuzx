<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_table.php 30321 2012-05-22 09:09:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


class discuz_table extends discuz_base
{

	public $data = array();

	public $methods = array();
	/**
	 * @var string 表名
	 */
	protected $_table;
	/**
	 * @var string 当前表的主键字段名
	 */
	protected $_pk;
	/**
	 * @var string 缓存主键名前缀
	 */
	protected $_pre_cache_key;
	/**
	 * @var string 缓存时间
	 */
	protected $_cache_ttl;
	/**
	 * @var string 是否允许缓存
	 */
	protected $_allowmem;

	public function __construct($para = array()) {
		if(!empty($para)) {
			$this->_table = $para['table'];
			$this->_pk = $para['pk'];
		}
		
		//如果 $this->_table 和 $this->_pk 不为空 则统一加上缓存
		if(!isset($this->_pre_cache_key) && !empty($this->_table) && !empty($this->_pk)){
			$this->_pre_cache_key = $this->_table.'_';
			if($ttl = getglobal('setting/memory/'.$this->_table) == null){
				$this->_cache_ttl = 86400;//默认缓存一天
			}
		}
		
		if(isset($this->_pre_cache_key) && (($ttl = getglobal('setting/memory/'.$this->_table)) !== null || ($ttl = $this->_cache_ttl) !== null) && memory('check')) {
			$this->_cache_ttl = $ttl;
			$this->_allowmem = true;
		}
		$this->_init_extend();
		parent::__construct();
	}

	/**
	 * 返回当前表的表名
	 * @return string
	 */
	public function getTable() {
		return $this->_table;
	}

	/**
	 * 设置当前表的表名
	 * @param string $name 表名
	 * @return true
	 */
	public function setTable($name) {
		return $this->_table = $name;
	}

	/**
	 * 返回当前表的总记录数
	 * @return int
	 */
	public function count() {
		$count = (int) DB::result_first("SELECT count(*) FROM ".DB::table($this->_table));
		return $count;
	}

	/**
	 * 依据主键更新记录
	 * @param string|int $val 主键值
	 * @param array $data 更新的字段和值的list
	 * @param boolean $unbuffered 迅速返回
	 * @param boolan $low_priority 延迟更新
	 * @return boolean
	 */
	public function update($val, $data, $unbuffered = false, $low_priority = false) {
		if(isset($val) && !empty($data) && is_array($data)) {
			$this->checkpk();
			$ret = DB::update($this->_table, $data, DB::field($this->_pk, $val), $unbuffered, $low_priority);
			foreach((array)$val as $id) {
				$this->update_cache($id, $data);
			}
			return $ret;
		}
		return !$unbuffered ? 0 : false;
	}

	/**
	 * 依据主键删除某条记录
	 * @param string|int $val 主键值
	 * @return boolean
	 */
	public function delete($val, $unbuffered = false) {
		$ret = false;
		if(isset($val)) {
			$this->checkpk();
			$ret = DB::delete($this->_table, DB::field($this->_pk, $val), null, $unbuffered);
			$this->clear_cache($val);
		}
		return $ret;
	}

	public function truncate() {
		DB::query("TRUNCATE ".DB::table($this->_table));
	}

	/**
	 * 插入一条数据
	 * @param array $data
	 * @param boolean $return_insert_id 是否返回插入的id
	 * @param boolean $replace 是否是replace
	 * @param boolean $silent 是否屏蔽错误
	 * @return int|boolean 是否成功或者返回id
	 */
	public function insert($data, $return_insert_id = false, $replace = false, $silent = false) {
		return DB::insert($this->_table, $data, $return_insert_id, $replace, $silent);
	}

	/**
	 * 检查当前表是否设置了主键
	 * 如果没有， 则中断程序执行
	 */
	public function checkpk() {
		if(!$this->_pk) {
			throw new DbException('Table '.$this->_table.' has not PRIMARY KEY defined');
		}
	}

	/**
	 * 依据主键值， 取得一条记录
	 * <code>
	 * Exp:  C::t('common_member')->fetch('1')
	 * Like: SELECT * from pre_common_member where uid=1
	 * </code>
	 * @param string|int $id 键值
	 * @param bool $force_from_db 强制使用数据库
	 * @return array
	 */
	public function fetch($id, $force_from_db = false){
		$data = array();
		if(!empty($id)) {
			if($force_from_db || ($data = $this->fetch_cache($id)) === false) {
				$data = DB::fetch_first('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field($this->_pk, $id));
				if(!empty($data)) $this->store_cache($id, $data);
			}
		}
		return $data;
	}

	/**
	 * 依据多个主键值， 返回一组数据
	 * <code>
	 * Exp:     C::t('common_member')->fetch_all(array(1,2,3,4), true);
	 * like:    select * from pre_common_member where uid in(1,2,3,4)
	 * return:  array(
	 *              1=>array('uid'=>1, 'username'=>'admin'),
	 *              2=>array(...
	 *              3=>array(...
	 *              4=>array(...
	 *          )
	 *
	 * </code>
	 * @param array $ids 主键值的数组
	 * @param bool $force_from_db 强制使用数据库
	 * @return array
	 */
	public function fetch_all($ids, $force_from_db = false) {
		$data = array();
		if(!empty($ids)) {
			if($force_from_db || ($data = $this->fetch_cache($ids)) === false || count($ids) != count($data)) {
				if(is_array($data) && !empty($data)) {
					$ids = array_diff($ids, array_keys($data));
				}
				if($data === false) $data =array();
				if(!empty($ids)) {
					$result = DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field($this->_pk, $ids));
					foreach ($result as $value){
						$data[$value[$this->_pk]] = $value;
						$this->store_cache($value[$this->_pk], $value);
					}
					
					//如果都为空 则把缓存也设置为空
					if(empty($result)){
						foreach ($ids as $id){
							$this->store_cache($id, array());
						}
					}
				}
			}
		}
		return $data;
	}

	/**
	 * 取得表的字段结构数据
	 * @return array 当没有权限时返回false
	 */
	public function fetch_all_field(){
		$data = false;
		$query = DB::query('SHOW FIELDS FROM '.DB::table($this->_table), '', 'SILENT');
		if($query) {
			$data = array();
			while($value = DB::fetch($query)) {
				$data[$value['Field']] = $value;
			}
		}
		return $data;
	}

	/**
	 * 获取指定范围的数据, 不带参数返回所有数据
	 * @param int $start 开始
	 * @param int $limit 条数
	 * @param string $sort 是否根据主键排序：ASC|DESC
	 * @return array
	 */
	public function range($start = 0, $limit = 0, $sort = '') {
		if($sort) {
			$this->checkpk();
		}
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).($sort ? ' ORDER BY '.DB::order($this->_pk, $sort) : '').DB::limit($start, $limit), null, $this->_pk ? $this->_pk : '');
	}

	/**
	 * 优化表数据
	 */
	public function optimize() {
		DB::query('OPTIMIZE TABLE '.DB::table($this->_table), 'SILENT');
	}

	/**
	 * 获取指定KEY的缓存数据
	 * @param string|array $ids 缓存KEY，多个KEY使用数组
	 * @param string $pre_cache_key 缓存KEY前缀
	 * @return miexd
	 */
	public function fetch_cache($ids, $pre_cache_key = null) {
		$data = false;
		if($this->_allowmem) {
			if($pre_cache_key === null)	$pre_cache_key = $this->_pre_cache_key;
			$data = memory('get', $ids, $pre_cache_key);
		}
		return $data;
	}

	/**
	 * 缓存一个变量到缓存中，如果 KEY已经在则会被覆盖为新值
	 * @param string $id 缓存KEY
	 * @param miexd $data 缓存数据
	 * @param int $cache_ttl 缓存生命周期
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function store_cache($id, $data, $cache_ttl = null, $pre_cache_key = null) {
		$ret = false;
		if($this->_allowmem) {
			if($pre_cache_key === null)	$pre_cache_key = $this->_pre_cache_key;
			if($cache_ttl === null)	$cache_ttl = $this->_cache_ttl;
			$ret = memory('set', $id, $data, $cache_ttl, $pre_cache_key);
		}
		return $ret;
	}

	/**
	 * 清除指定KEY的缓存
	 * @param string|array $ids 一个或多个缓存KEY
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function clear_cache($ids, $pre_cache_key = null) {
		$ret = false;
		if($this->_allowmem) {
			if($pre_cache_key === null)	$pre_cache_key = $this->_pre_cache_key;
			$ret = memory('rm', $ids, $pre_cache_key);
		}
		return $ret;
	}

	/**
	 * 更新一个已经存在的KEY,只更新修改的字段
	 * @param string $id 缓存KEY
	 * @param miexd $data 要修改的数据
	 * @param int $cache_ttl 缓存生命周期
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function update_cache($id, $data, $cache_ttl = null, $pre_cache_key = null) {
		$ret = false;
		if($this->_allowmem) {
			if($pre_cache_key === null)	$pre_cache_key = $this->_pre_cache_key;
			if($cache_ttl === null)	$cache_ttl = $this->_cache_ttl;
			if(($_data = memory('get', $id, $pre_cache_key)) !== false) {
				$ret = $this->store_cache($id, array_merge($_data, $data), $cache_ttl, $pre_cache_key);
			}
		}
		return $ret;
	}

	/**
	 * 批量更新缓存，只更新已经存在KEY的指定修改的字段
	 * @param array $ids 缓存KEYS
	 * @param miexd $data 要修改的数据
	 * @param int $cache_ttl 缓存生命周期
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function update_batch_cache($ids, $data, $cache_ttl = null, $pre_cache_key = null) {
		$ret = false;
		if($this->_allowmem) {
			if($pre_cache_key === null)	$pre_cache_key = $this->_pre_cache_key;
			if($cache_ttl === null)	$cache_ttl = $this->_cache_ttl;
			if(($_data = memory('get', $ids, $pre_cache_key)) !== false) {
				foreach($_data as $id => $value) {
					$ret = $this->store_cache($id, array_merge($value, $data), $cache_ttl, $pre_cache_key);
				}
			}
		}
		return $ret;
	}

	/**
	 * 重置已经存在的KEY的值
	 * @param array $ids 缓存KEY，包含未缓存的KEY，但未缓存的KEY会被过滤到，不做处理
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function reset_cache($ids, $pre_cache_key = null) {
		$ret = false;
		if($this->_allowmem) {
			$keys = array();
			if(($cache_data = $this->fetch_cache($ids, $pre_cache_key)) !== false) {
				$keys = array_intersect(array_keys($cache_data), $ids);
				unset($cache_data);
			}
			if(!empty($keys)) {
				$this->fetch_all($keys, true);
				$ret = true;
			}
		}
		return $ret;
	}

	/**
	 * 累加缓存数据中某字段的值
	 * @param array $ids 缓存KEY，包含未缓存的KEY，但未缓存的KEY会被过滤到，不做处理
	 * @param array $data 累加缓存数据的值，数组的KEY为累加的字段，VALUE为累加的值
	 * @param int $cache_ttl 缓存生命周期
	 * @param string $pre_cache_key 缓存KEY前缀
	 */
	public function increase_cache($ids, $data, $cache_ttl = null, $pre_cache_key = null) {
		if($this->_allowmem) {
			if(($cache_data = $this->fetch_cache($ids, $pre_cache_key)) !== false) {
				foreach($cache_data as $id => $one) {
					foreach($data as $key => $value) {
						//做个小兼容当更新类似view=view+1的同时更新了post=1之类的操作
						if(is_array($value)) {
							$one[$key] = $value[0];
						} else {
							$one[$key] = $one[$key] + ($value);
						}
					}
					$this->store_cache($id, $one, $cache_ttl, $pre_cache_key);
				}
			}
		}
	}

	/**
	 * 返回当前 table 类的表名
	 * @return string
	 */
	public function __toString() {
		return $this->_table;
	}

	protected function _init_extend() {
	}

	public function attach_before_method($name, $fn) {
		$this->methods[$name][0][] = $fn;
	}

	public function attach_after_method($name, $fn) {
		$this->methods[$name][1][] = $fn;
	}
}

?>