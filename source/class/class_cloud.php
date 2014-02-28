<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_cloud.php 34000 2013-09-17 08:52:48Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class Cloud {

	static private $_loaded = array();

	/**
	 * loadClass
	 * 单例方式载入 Cloud Service
	 *
	 * @param string $className Cloud类名(可以省略Cloud_)
     * @param array $params 构造函数参数
	 * @return object
	 */
	public static function loadClass($className, $params = null) {

		if (strpos($className, 'Cloud_') !== 0) {
			$className = 'Cloud_' . $className;
		}

		self::loadFile($className);

		$instance = call_user_func_array(array($className, 'getInstance'), (array)$params);

		return $instance;
	}

	public static function loadFile($className) {

		$items = explode('_', $className);
		if ($items[0] == 'Cloud') {
			unset($items[0]); // 第一级Cloud_不需要
		}

		$loadKey = implode('_', $items);
		if (isset(self::$_loaded[$loadKey])) {
			return true;
		}

		$file = DISCUZ_ROOT . '/source/plugin/manyou/' . implode('/', $items) . '.php';

		if (!is_file($file)) {
			throw new Cloud_Exception('Cloud file not exists!', 50001);
		}

		include $file;
		self::$_loaded[$loadKey] = true;

		return true;
	}

}

class Cloud_Exception extends Exception {

	public function __construct($message, $code = 0) {
		if ($message instanceof Exception) {
			parent::__construct($message->getMessage(), intval($message->getCode()));
		} else {
			parent::__construct($message, intval($code));
		}
	}

}
?>