<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_setting.php 30476 2012-05-30 07:05:06Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_setting extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_setting';
		$this->_pk    = 'skey';
		//注意：此表不能在此处进行数据缓存，否则会造成循环调用

		parent::__construct();
	}

	/**
	 * 获取setting值
	 * @param string $skey setting KEY
	 * @param bool $auto_unserialize 是否需要反序列化
	 * @return mixed 数据值
	 */
	public function fetch($skey, $auto_unserialize = false) {
		$data = DB::result_first('SELECT svalue FROM '.DB::table($this->_table).' WHERE '.DB::field($this->_pk, $skey));
		return $auto_unserialize ? (array)unserialize($data) : $data;
	}

	/**
	 * 批量获取setting值
	 * @param array $skeys 为空时取所有内容
	 * @param bool $auto_unserialize 是否需要反序列化
	 * @return array
	 */
	public function fetch_all($skeys = array(), $auto_unserialize = false){
		$data = array();
		$where = !empty($skeys) ? ' WHERE '.DB::field($this->_pk, $skeys) : '';
		$query = DB::query('SELECT * FROM '.DB::table($this->_table).$where);
		while($value = DB::fetch($query)) {
			$data[$value['skey']] = $auto_unserialize ? (array)unserialize($value['svalue']) : $value['svalue'];
		}
		return $data;
	}

	/**
	 * 添加或更新
	 * @param string $skey setting KEY
	 * @param mixed $svalue 数据，数据是数组时会自动序列化
	 * @return bool 是否成功
	 */
	public function update($skey, $svalue){
		return DB::insert($this->_table, array($this->_pk => $skey, 'svalue' => is_array($svalue) ? serialize($svalue) : $svalue), false, true);
	}

	/**
	 * 指更新和添加
	 * @param array $array 数组的key为skey值，value值为svalue值
	 * @return bool
	 */
	public function update_batch($array) {
		$settings = array();
		foreach($array as $key => $value) {
			$key = addslashes($key);
			$value = addslashes(is_array($value) ? serialize($value) : $value);
			$settings[] = "('$key', '$value')";
		}
		if($settings) {
			return DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ".implode(',', $settings));
		}
		return false;
	}

	/**
	 * 检查指定skey是否存在
	 * @param string $skey
	 * @return bool
	 */
	public function skey_exists($skey) {
		return DB::result_first('SELECT skey FROM %t WHERE skey=%s LIMIT 1', array($this->_table, $skey)) ? true : false;
	}

	/**
	 * 获取不在指定skey范围内的所有数据
	 * @param string|array $skey 设置key
	 * @return array
	 */
	public function fetch_all_not_key($skey) {
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE skey NOT IN('.dimplode($skey).')');
	}

	public function fetch_all_table_status() {
		return DB::fetch_all('SHOW TABLE STATUS');
	}

	public function get_tablepre() {
		return DB::object()->tablepre;
	}

	/*
	 * 使用 setting 表做计数的时候自+
	 * @param $skey 设置key
	 * @param $data 内容
	 * @returns
	 */
	public function update_count($skey, $num) {
		return DB::query("UPDATE %t SET svalue = svalue + %d WHERE skey = %s", array($this->_table, $num, $skey), false, true);
	}

}

?>