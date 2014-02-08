<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_member_profile_for_plugin extends table_common_member_profile {
	private $_fields;

	public function __construct() {

		$this->_table = 'common_member_profile';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_profile_';
		//$this->_cache_ttl = 0; //在setting/memory中设置
		$this->_fields = array('uid', 'realname', 'gender', 'birthyear', 'birthmonth', 'birthday', 'constellation',
				'zodiac', 'telephone', 'mobile', 'idcardtype', 'idcard', 'address', 'zipcode', 'nationality', 'birthprovince', 'birthcity', 'birthdist',
				'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity', 'residesuite', 'graduateschool', 'education', 'company',
				'occupation', 'position', 'revenue', 'affectivestatus', 'lookingfor', 'bloodtype', 'height', 'weight', 'alipay', 'icq', 'qq',
				'yahoo', 'msn', 'taobao', 'site', 'bio', 'interest', 'field1', 'field2', 'field3', 'field4', 'field5', 'field6', 'field7', 'field8');

		parent::__construct();
	}

	public function fetch_field_value_by_uid($uid, $field) {
		return in_array($field, $this->_fields, true) ? DB::result_first("SELECT %i FROM %t WHERE uid=%d", array($field, $this->_table, $uid)) : array();
	}
}
