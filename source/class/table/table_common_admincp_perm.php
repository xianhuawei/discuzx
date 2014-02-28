<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_admincp_perm.php 27773 2012-02-14 06:49:55Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_admincp_perm extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_admincp_perm';
		$this->_pk    = 'cpgroupid';

		parent::__construct();
	}

	/**
	 * 根据管理组ID获取权限
	 * @param int $cpgroupid 管理组ID
	 * @return array
	 */
	public function fetch_all_by_cpgroupid($cpgroupid) {
		return $cpgroupid ? DB::fetch_all('SELECT * FROM %t WHERE cpgroupid=%d', array($this->_table, $cpgroupid)) : array();
	}

	/**
	 * 根据管理组ID和权限标识删除数据
	 * @param int $cpgroupid 管理组ID
	 * @param string|array $perm 权限标识
	 */
	public function delete_by_cpgroupid_perm($cpgroupid, $perm = null) {
		return $cpgroupid ? DB::delete($this->_table, DB::field('cpgroupid', $cpgroupid).($perm ? ' AND '.DB::field('perm', $perm) : '')) : false;
	}

	/**
	 * 根据权限标识获取数据
	 * @param string $perm 权限标识
	 * @return array
	 */
	public function fetch_all_by_perm($perm) {
		return $perm ? DB::fetch_all('SELECT * FROM %t WHERE `perm`=%s', array($this->_table, $perm), 'cpgroupid') : array();
	}
}

?>