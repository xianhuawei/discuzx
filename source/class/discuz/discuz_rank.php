<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_rank.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 * Discuz 排行榜服务
 *
 */
class discuz_rank extends discuz_base
{
	public $name = ''; //排行榜名

	/**
	 * 构造对象
	 * @param string $name 排行榜名
	 */
	public function __construct($name) {
		if($name) {
			$this->name = $name;
		} else {
			throw new Exception('The property "'.get_class($this).'->name" is empty');
		}
	}

	/**
	 * 获取排行榜列表
	 * @param string $order 列表排序方式
	 * @param int $start 开始偏移量
	 * @param int $limit 获取的个数
	 */
	public function fetch_list($order = 'DESC', $start = 0, $limit = 0) {
		return C::t('common_rank')->fetch_list($this->name, $order, $limit);
	}

	/**
	 * 获取元素在排行榜中的排名
	 * @param string $key 元素名
	 */
	public function fetch_rank($key) {
		return C::t('common_rank')->fetch_rank($this->name, $key);
	}

	/**
	 * 在排行榜中设置或添加元素和值
	 * @param string $key 元素名
	 * @param int $value 元素值
	 */
	public function set($key, $value) {
		return C::t('common_rank')->insert($this->name, $key, $value);
	}

	/**
	 * 在排行榜元素$key的值的基础上递增$value值
	 * @param string $key 元素名
	 * @param int $value 递增的值
	 */
	public function inc($key, $value) {
		return C::t('common_rank')->inc($this->name, $key, $value);
	}

	/**
	 * 在排行榜元素$key的值的基础上递减$value值
	 * @param string $key 元素名
	 * @param int $value 递减的值
	 */
	public function dec($key, $value) {
		return C::t('common_rank')->dec($this->name, $key, $value);
	}

	/**
	 * 删除排行榜
	 */
	public function clear() {
		return C::t('common_rank')->delete($this->name);
	}

	/**
	 * 删除排行榜中某一元素
	 * @param string $key 元素名
	 */
	public function rm($key) {
		return $key ? C::t('common_rank')->delete($this->name, $key) : false;
	}

}

?>