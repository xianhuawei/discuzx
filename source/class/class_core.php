<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_core.php 33982 2013-09-12 06:36:35Z hypowang $
 */

error_reporting(E_ALL);

define('IN_DISCUZ', true);
define('DISCUZ_ROOT', substr(dirname(__FILE__), 0, -12));
define('DISCUZ_CORE_DEBUG', false);
define('DISCUZ_TABLE_EXTENDABLE', false);

set_exception_handler(array('C', 'handleException'));

if(DISCUZ_CORE_DEBUG) {
	set_error_handler(array('C', 'handleError'));
	register_shutdown_function(array('C', 'handleShutdown'));
}

if(function_exists('spl_autoload_register')) {
	spl_autoload_register(array('C', 'autoload'));
} else {
	function __autoload($class) {
		return C::autoload($class);
	}
}

define('EXTEND', true);
define('EXTEND_NO_CACHE', false);
define('EXTEND_NO_DETECT', true);
C::setconstant();
C::creatapp();

class core
{
	private static $_tables;
	private static $_imports;
	private static $_app;
	private static $_memory;

	/**
	 * 当前 application object
	 * @return discuz_application
	 */
	public static function app() {
		return self::$_app;
	}

	/**
	 * 创建 application
	 *
	 * @return discuz_application
	 */
	public static function creatapp() {
		if(!is_object(self::$_app)) {
			self::$_app = discuz_application::instance();
		}
		return self::$_app;
	}

	/**
	 * 引入 table 对象
	 * @param string $name table名称
	 */
	public static function t($name) {
		return self::_make_obj($name, 'table', DISCUZ_TABLE_EXTENDABLE);
	}

	public static function m($name) {
		$args = array();
		if(func_num_args() > 1) {
			$args = func_get_args();
			unset($args[0]);
		}
		return self::_make_obj($name, 'model', true, $args);
	}

	protected static function _make_obj($name, $type, $extendable = false, $p = array()) {
		$pluginid = null;
		if($name[0] === '#') {
			list(, $pluginid, $name) = explode('#', $name);
		}
		$cname = $type.'_'.$name;
		if(!isset(self::$_tables[$cname])) {
			if(!class_exists($cname, false)) {
				self::import(($pluginid ? 'plugin/'.$pluginid : 'class').'/'.$type.'/'.$name);
			}
			if($extendable) {
				self::$_tables[$cname] = new discuz_container();
				switch (count($p)) {
					case 0:	self::$_tables[$cname]->obj = new $cname();break;
					case 1:	self::$_tables[$cname]->obj = new $cname($p[1]);break;
					case 2:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2]);break;
					case 3:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3]);break;
					case 4:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3], $p[4]);break;
					case 5:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3], $p[4], $p[5]);break;
					default: $ref = new ReflectionClass($cname);self::$_tables[$cname]->obj = $ref->newInstanceArgs($p);unset($ref);break;
				}
			} else {
				self::$_tables[$cname] = new $cname();
			}
		}
		return self::$_tables[$cname];
	}
	/**
	 * 内存读写 object
	 * @return discuz_memory
	 */
	public static function memory() {
		if(!self::$_memory) {
			self::$_memory = new discuz_memory();
			self::$_memory->init(self::app()->config['memory']);
		}
		return self::$_memory;
	}

	/**
	 * 引入系统文件
	 * <code>
	 * <?php
	 * D::import('class/task/avatar');
	 * ?>
	 * </code>
	 * 相当于引入代码
	 * <code>
	 * include './source/class/task/task_avatar.php';
	 * </code>
	 * @param type $name 名称
	 * @param type $folder  特定目录
	 * @param bool $force 是否强制加载, 当强制加载的时候, 如果文件不存在则程序终止运行
	 */
	public static function import($name, $folder = '', $force = true) {
		$key = $folder.$name;
		if(!isset(self::$_imports[$key])) {
			$path = DISCUZ_ROOT.'/source/'.$folder;
			if(strpos($name, '/') !== false) {
				$pre = basename(dirname($name));
				$filename = dirname($name).'/'.$pre.'_'.basename($name).'.php';
			} else {
				$filename = $name.'.php';
			}

			if(is_file($path.'/'.$filename)) {
				self::$_imports[$key] = true;
				$rt = include $path.'/'.$filename;
				return $rt;
			} elseif(!$force) {
				return false;
			} else {
				throw new Exception('Oops! System file lost: '.$filename);
			}
		}
		return true;
	}

	/**
	 * Exception 消息截获
	 * @param Exception $exception
	 */
	public static function handleException($exception) {
		discuz_error::exception_error($exception);
	}


	/**
	 * 记录脚本执行时的错误信息
	 * @param int $errno
	 * @param string $errstr
	 * @param string $errfile
	 * @param int $errline
	 */
	public static function handleError($errno, $errstr, $errfile, $errline) {
		if($errno & DISCUZ_CORE_DEBUG) {
			discuz_error::system_error($errstr, false, true, false);
		}
	}

	/**
	 * 记录脚本执行结束时的错误信息
	 */
	public static function handleShutdown() {
		if(($error = error_get_last()) && $error['type'] & DISCUZ_CORE_DEBUG) {
			discuz_error::system_error($error['message'], false, true, false);
		}
	}

	/**
	 * PHP5 autoload class 支持
	 *
	 * 请注意class目录中文件以及类名的规则
	 * 当使用 class_exists() 检测的时候可以返回 true 或者 false
	 *
	 * @param string $class 类名称
	 * @return boolean
	 *
	 */
	public static function autoload($class) {
		$class = strtolower($class);
		if(strpos($class, '_') !== false) {
			list($folder) = explode('_', $class);
			$file = 'class/'.$folder.'/'.substr($class, strlen($folder) + 1);
		} else {
			$file = 'class/'.$class;
		}

		try {

			self::import($file);
			return true;

		} catch (Exception $exc) {

			//note 以下代码主要是为了保持系统函数 class_exists 正常运行，免得中断执行
			$trace = $exc->getTrace();
			foreach ($trace as $log) {
				if(empty($log['class']) && $log['function'] == 'class_exists') {
					return false;
				}
			}
			discuz_error::exception_error($exc);
		}
	}

	public static function analysisStart($name){
		$key = 'other';
		if($name[0] === '#') {
			list(, $key, $name) = explode('#', $name);
		}
		if(!isset($_ENV['analysis'])) {
			$_ENV['analysis'] = array();
		}
		if(!isset($_ENV['analysis'][$key])) {
			$_ENV['analysis'][$key] = array();
			$_ENV['analysis'][$key]['sum'] = 0;
		}
		$_ENV['analysis'][$key][$name]['start'] = microtime(TRUE);
		$_ENV['analysis'][$key][$name]['start_memory_get_usage'] = memory_get_usage();
		$_ENV['analysis'][$key][$name]['start_memory_get_real_usage'] = memory_get_usage(true);
		$_ENV['analysis'][$key][$name]['start_memory_get_peak_usage'] = memory_get_peak_usage();
		$_ENV['analysis'][$key][$name]['start_memory_get_peak_real_usage'] = memory_get_peak_usage(true);
	}

	public static function analysisStop($name) {
		$key = 'other';
		if($name[0] === '#') {
			list(, $key, $name) = explode('#', $name);
		}
		if(isset($_ENV['analysis'][$key][$name]['start'])) {
			$diff = round((microtime(TRUE) - $_ENV['analysis'][$key][$name]['start']) * 1000, 5);
			$_ENV['analysis'][$key][$name]['time'] = $diff;
			$_ENV['analysis'][$key]['sum'] = $_ENV['analysis'][$key]['sum'] + $diff;
			unset($_ENV['analysis'][$key][$name]['start']);
			$_ENV['analysis'][$key][$name]['stop_memory_get_usage'] = memory_get_usage();
			$_ENV['analysis'][$key][$name]['stop_memory_get_real_usage'] = memory_get_usage(true);
			$_ENV['analysis'][$key][$name]['stop_memory_get_peak_usage'] = memory_get_peak_usage();
			$_ENV['analysis'][$key][$name]['stop_memory_get_peak_real_usage'] = memory_get_peak_usage(true);
		}
		return $_ENV['analysis'][$key][$name];
	}
}

class core_ext extends core 
{
	private static $_tables;
	private static $_imports;

	public static function t($name) {
		return self::_make_obj($name, 'table', DISCUZ_TABLE_EXTENDABLE);
	}

	protected static function _make_obj($name, $type, $extendable = false, $p = array()) {
		$pluginid = null;
		if($name[0] === '#') {
			list(, $pluginid, $name) = explode('#', $name);
		}
		$cname = $type.'_'.$name;

		if($pluginid == null && defined('EXTEND') && EXTEND === true) {
			$name_ext = $name . '_ext';
			if(self::import('class/'.$type.'/'.$name_ext, '', false, true) != false) {
				$cname .= '_ext';
			}
		}

		if(!isset(self::$_tables[$cname])) {
			if(!class_exists($cname, false)) {
				self::import(($pluginid ? 'plugin/'.$pluginid : 'class').'/'.$type.'/'.$name);
			}
			if($extendable) {
				self::$_tables[$cname] = new discuz_container();
				switch (count($p)) {
					case 0:	self::$_tables[$cname]->obj = new $cname();break;
					case 1:	self::$_tables[$cname]->obj = new $cname($p[1]);break;
					case 2:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2]);break;
					case 3:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3]);break;
					case 4:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3], $p[4]);break;
					case 5:	self::$_tables[$cname]->obj = new $cname($p[1], $p[2], $p[3], $p[4], $p[5]);break;
					default: $ref = new ReflectionClass($cname);self::$_tables[$cname]->obj = $ref->newInstanceArgs($p);unset($ref);break;
				}
			} else {
				self::$_tables[$cname] = new $cname();
			}
		}
		return self::$_tables[$cname];
	}

	public static function import($name, $folder = '', $force = true, $ext = false, $exists = false, $getpath = false, $getmts = false) {
		$key = $folder.$name;
		if(!isset(self::$_imports[$key])) {
			$path = DISCUZ_ROOT.'/source/'.$folder;
			if($ext) $path = DISCUZ_ROOT.'/extend/'.$folder;

			if(strpos($name, '/') !== false) {
				$pre = basename(dirname($name));
				$filename = dirname($name).'/'.$pre.'_'.basename($name).'.php';
			} else {
				$filename = $name.'.php';
			}

			if(is_file($path.'/'.$filename)) {
				if($exists == true) return true;//只返回存在与否
				if($getmts == true) return filemtime($path.'/'.$filename);
				self::$_imports[$key] = true;
				if($getpath == true) return $path.'/'.$filename;//只返回路径,而且只要返回路径就肯定载入了类文件
				$rt = include $path.'/'.$filename;
				return $rt;
			} elseif(!$force) {
				return false;
			} else {
				throw new Exception('Oops! System file lost: '.$filename);
			}
		}
		return true;
	}

	public static function autoload($class) {
		$class = strtolower($class);
		if(strpos($class, '_') !== false) {
			list($folder) = explode('_', $class);
			$file = 'class/'.$folder.'/'.substr($class, strlen($folder) + 1);
		} else {
			$file = 'class/'.$class;
		}

		try {

			if(defined('EXTEND') && EXTEND === true && (strpos($class, 'table') === FALSE) && self::import($file . '_ext', '', false, true, true) === true) {
				$mts = defined('EXTEND_NO_DETECT') && EXTEND_NO_DETECT === false ? (string)date('Ymd~Hi~s', self::import($file . '_ext', '', false, true, false, false, true)) : '';
				$cacf = DISCUZ_ROOT.'/data/sysdata/'.$class.'_ext'. $mts .'.php';
				if(defined('EXTEND_NO_CACHE') && EXTEND_NO_CACHE === true || !is_file($cacf)) {
					$class_cont = self::combine_class($class);
					self::put_class($class_cont, $cacf);
				}
				include $cacf;
				return true;
			}
			self::import($file);
			return true;

		} catch (Exception $exc) {

			$trace = $exc->getTrace();
			foreach ($trace as $log) {
				if(empty($log['class']) && $log['function'] == 'class_exists') {
					return false;
				}
			}
			discuz_error::exception_error($exc);
		}
	}

	static function combine_class($class, $parentfullpath = '', $childfullpath = '') {
		if($parentfullpath == '' || $childfullpath == '') {
			$class = strtolower($class);
			if(strpos($class, '_') !== false) {
				list($folder) = explode('_', $class);
				$file = 'class/'.$folder.'/'.substr($class, strlen($folder) + 1);
			} else {
				$file = 'class/'.$class;
			}
			$parentfullpath = $parentfullpath == '' ? self::import($file, '', false, false, false, true) : $parentfullpath;
			$childfullpath = $childfullpath == '' ? self::import($file . '_ext', '', false, true, false, true) : $childfullpath;
		}
		
		$class_ext_cont = file_get_contents($childfullpath);
		preg_match_all('/class[\t ]+(\w+)_ext[\t ]+extends[\t ]+(\w+)/i', $class_ext_cont, $matches);
		$class_ext_cont = preg_replace('/class[\t ]+(\w+)_ext[\t ]+extends[\t ]+(\w+)/i', 'class ${1} extends ${2}_ext', $class_ext_cont);
		$class_ext_list = $matches[2];

		$class_cont = file_get_contents($parentfullpath);
		if(!empty($class_ext_list) && is_array($class_ext_list)) {
			foreach($class_ext_list as $class_v) {
				$class_cont = preg_replace("/class[\t ]+(".$class_v.")/i", 'class ${1}_ext', $class_cont, 1);
				$class_cont = preg_replace("/function[\t ]+(".$class_v.")/i", 'function __construct', $class_cont, 1);
				//TODO 对构造函数的处理，如果文件中存在其他类且有同名方法，会导致错误
			}
		}
		$str_find = array('<?php', '?>');
		$class_cont = str_replace($str_find, '', $class_cont.$class_ext_cont);

		return "<?php\n\n//Created: ".date("M j, Y, G:i")."\n".$class_cont;
	}

	static function put_class($cont, $cacf) {
		if(empty($cont)) return false;
		return file_put_contents($cacf, $cont, LOCK_EX);
	}

	static function setconstant() {
		global $_G;
		if($_G['config']['extend'] && is_array($_G['config']['extend'])) {
			foreach($_G['config']['extend'] as $k => $v) {
				define(strtoupper($k), $v['on']);
			}
		}
	}
}

class C extends core_ext {}
class DB extends discuz_database {}

?>