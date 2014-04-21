<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_core.php 34155 2013-10-25 00:54:00Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('DISCUZ_CORE_FUNCTION', true);

/**
 * urlencode
 *
 * @param string $url
 */
function durlencode($url) {
	static $fix = array('%21', '%2A','%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
	static $replacements = array('!', '*', ';', ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
	return str_replace($fix, $replacements, urlencode($url));
}

/**
 * 系统错误处理
 * @param <type> $message 错误信息
 * @param <type> $show 是否显示信息
 * @param <type> $save 是否存入日志
 * @param <type> $halt 是否中断访问
 */
function system_error($message, $show = true, $save = true, $halt = true) {
	discuz_error::system_error($message, $show, $save, $halt);
}

/**
 * 更新 session
 * @global <type> $_G
 * @staticvar boolean $updated
 * @return boolean
 */
function updatesession() {
	return C::app()->session->updatesession();
}

/**
 * 设置全局 $_G 中的变量
 * @global <array> $_G
 * @param <string> $key 键
 * @param <string> $value 值
 * @return true
 *
 * @example
 * setglobal('test', 1); // $_G['test'] = 1;
 * setglobal('config/test/abc') = 2; //$_G['config']['test']['abc'] = 2;
 *
 */
function setglobal($key , $value, $group = null) {
	global $_G;
	$key = explode('/', $group === null ? $key : $group.'/'.$key);
	$p = &$_G;
	foreach ($key as $k) {
		if(!isset($p[$k]) || !is_array($p[$k])) {
			$p[$k] = array();
		}
		$p = &$p[$k];
	}
	$p = $value;
	return true;
}

/**
 * 获取全局变量 $_G 当中的某个数值
 * @example
 * $v = getglobal('test'); // $v = $_G['test']
 * $v = getglobal('test/hello/ok');  // $v = $_G['test']['hello']['ok']
 *
 * @global  $_G
 * @param string $key
 *
 * @return type
 */
function getglobal($key, $group = null) {
	global $_G;
	$key = explode('/', $group === null ? $key : $group.'/'.$key);
	$v = &$_G;
	foreach ($key as $k) {
		if (!isset($v[$k])) {
			return null;
		}
		$v = &$v[$k];
	}
	return $v;
}

/**
 * 取出 get, post, cookie 当中的某个变量
 *
 * @param string $k  key 值
 * @param string $type 类型
 * @return mix
 */
function getgpc($k, $type='GP') {
	$type = strtoupper($type);
	switch($type) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		default:
			if(isset($_GET[$k])) {
				$var = &$_GET;
			} else {
				$var = &$_POST;
			}
			break;
	}

	return isset($var[$k]) ? $var[$k] : NULL;

}

/**
 * 根据uid 获取用户基本数据
 * @staticvar array $users 存放已经获取的用户的信息,避免重复查库
 * @param <int> $uid
 * @param int $fetch_archive 0：只查询主表，1：查询主表和存档表，2只查询存档表
 * @return <array>
 */
function getuserbyuid($uid, $fetch_archive = 0) {
	static $users = array();
	if(empty($users[$uid])) {
		$users[$uid] = C::t('common_member'.($fetch_archive === 2 ? '_archive' : ''))->fetch($uid);
		if($fetch_archive === 1 && empty($users[$uid])) {
			$users[$uid] = C::t('common_member_archive')->fetch($uid);
		}
	}
	if(!isset($users[$uid]['self']) && $uid == getglobal('uid') && getglobal('uid')) {
		$users[$uid]['self'] = 1;
	}
	return $users[$uid];
}

/**
* 获取当前用户的扩展资料
* @param $field 字段
*/
function getuserprofile($field) {
	global $_G;
	if(isset($_G['member'][$field])) {
		return $_G['member'][$field];
	}
	static $tablefields = array(
		'count'		=> array('extcredits1','extcredits2','extcredits3','extcredits4','extcredits5','extcredits6','extcredits7','extcredits8','friends','posts','threads','digestposts','doings','blogs','albums','sharings','attachsize','views','oltime','todayattachs','todayattachsize', 'follower', 'following', 'newfollower', 'blacklist'),
		'status'	=> array('regip','lastip','lastvisit','lastactivity','lastpost','lastsendmail','invisible','buyercredit','sellercredit','favtimes','sharetimes','profileprogress'),
		'field_forum'	=> array('publishfeed','customshow','customstatus','medals','sightml','groupterms','authstr','groups','attentiongroup'),
		'field_home'	=> array('videophoto','spacename','spacedescription','domain','addsize','addfriend','menunum','theme','spacecss','blockposition','recentnote','spacenote','privacy','feedfriend','acceptemail','magicgift','stickblogs'),
		'profile'	=> array('realname','gender','birthyear','birthmonth','birthday','constellation','zodiac','telephone','mobile','idcardtype','idcard','address','zipcode','nationality','birthprovince','birthcity','resideprovince','residecity','residedist','residecommunity','residesuite','graduateschool','company','education','occupation','position','revenue','affectivestatus','lookingfor','bloodtype','height','weight','alipay','icq','qq','yahoo','msn','taobao','site','bio','interest','field1','field2','field3','field4','field5','field6','field7','field8'),
		'verify'	=> array('verify1', 'verify2', 'verify3', 'verify4', 'verify5', 'verify6', 'verify7'),
	);
	$profiletable = '';
	foreach($tablefields as $table => $fields) {
		if(in_array($field, $fields)) {
			$profiletable = $table;
			break;
		}
	}
	if($profiletable) {

		if(is_array($_G['member']) && $_G['member']['uid']) {
			space_merge($_G['member'], $profiletable);
		} else {
			foreach($tablefields[$profiletable] as $k) {
				$_G['member'][$k] = '';
			}
		}
		return $_G['member'][$field];
	}
	return null;
}

/**
 * 对字符串或者输入进行 addslashes 操作
 * @param <mix> $string
 * @param <int> $force
 * @return <mix>
 */
function daddslashes($string, $force = 1) {
	if(is_array($string)) {
		$keys = array_keys($string);
		foreach($keys as $key) {
			$val = $string[$key];
			unset($string[$key]);
			$string[addslashes($key)] = daddslashes($val, $force);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}

/**
 * 对字符串进行加密和解密
 * @param <string> $string
 * @param <string> $operation  DECODE 解密 | ENCODE  加密
 * @param <string> $key 当为空的时候,取全局密钥
 * @param <int> $expiry 有效期,单位秒
 * @return <string>
 */
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key != '' ? $key : getglobal('authkey'));
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}

function fsocketopen($hostname, $port = 80, &$errno, &$errstr, $timeout = 15) {
	$fp = '';
	if(function_exists('fsockopen')) {
		$fp = @fsockopen($hostname, $port, $errno, $errstr, $timeout);
	} elseif(function_exists('pfsockopen')) {
		$fp = @pfsockopen($hostname, $port, $errno, $errstr, $timeout);
	} elseif(function_exists('stream_socket_client')) {
		$fp = @stream_socket_client($hostname.':'.$port, $errno, $errstr, $timeout);
	}
	return $fp;
}

/**
 * 远程文件文件请求兼容函数
 */
function dfsockopen($url, $limit = 0, $post = '', $cookie = '', $bysocket = FALSE, $ip = '', $timeout = 15, $block = TRUE, $encodetype  = 'URLENCODE', $allowcurl = TRUE, $position = 0, $files = array()) {
	require_once libfile('function/filesock');
	return _dfsockopen($url, $limit, $post, $cookie, $bysocket, $ip, $timeout, $block, $encodetype, $allowcurl, $position, $files);
}

/**
* HTML转义字符
* @param $string - 字符串
* @param $flags 参见手册 htmlspecialchars
* @return 返回转义好的字符串
*/
function dhtmlspecialchars($string, $flags = null) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val, $flags);
		}
	} else {
		if($flags === null) {
			$string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
			if(strpos($string, '&amp;#') !== false) {
				$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
			}
		} else {
			if(PHP_VERSION < '5.4.0') {
				$string = htmlspecialchars($string, $flags);
			} else {
				if(strtolower(CHARSET) == 'utf-8') {
					$charset = 'UTF-8';
				} else {
					$charset = 'ISO-8859-1';
				}
				$string = htmlspecialchars($string, $flags, $charset);
			}
		}
	}
	return $string;
}

/**
 * 退出程序 同 exit 的区别, 对输出数据会进行 重新加工和处理
 * 通常情况下,我们建议使用本函数终止程序, 除非有特别需求
 * @param <type> $message
 */
function dexit($message = '') {
	echo $message;
	output();
	exit();
}

/**
 * 同 php header函数, 针对 location 跳转做了特殊处理
 * @param <type> $string
 * @param <type> $replace
 * @param <type> $http_response_code
 */
function dheader($string, $replace = true, $http_response_code = 0) {
	//noteX 手机header跳转的统一修改(IN_MOBILE)
	$islocation = substr(strtolower(trim($string)), 0, 8) == 'location';
	if(defined('IN_MOBILE') && strpos($string, 'mobile') === false && $islocation) {
		if (strpos($string, '?') === false) {
			$string = $string.'?mobile='.IN_MOBILE;
		} else {
			if(strpos($string, '#') === false) {
				$string = $string.'&mobile='.IN_MOBILE;
			} else {
				$str_arr = explode('#', $string);
				$str_arr[0] = $str_arr[0].'&mobile='.IN_MOBILE;
				$string = implode('#', $str_arr);
			}
		}
	}
	$string = str_replace(array("\r", "\n"), array('', ''), $string);
	if(empty($http_response_code) || PHP_VERSION < '4.3' ) {
		@header($string, $replace);
	} else {
		@header($string, $replace, $http_response_code);
	}
	if($islocation) {
		exit();
	}
}

/**
* 设置cookie
* @param $var - 变量名
* @param $value - 变量值
* @param $life - 生命期
* @param $prefix - 前缀
*/
function dsetcookie($var, $value = '', $life = 0, $prefix = 1, $httponly = false) {

	global $_G;

	$config = $_G['config']['cookie'];

	$_G['cookie'][$var] = $value;
	$var = ($prefix ? $config['cookiepre'] : '').$var;
	$_COOKIE[$var] = $value;

	if($value == '' || $life < 0) {
		$value = '';
		$life = -1;
	}

	/*手机浏览器设置cookie，强制取消HttpOnly(IN_MOBILE)*/
	if(defined('IN_MOBILE')) {
		$httponly = false;
	}

	$life = $life > 0 ? getglobal('timestamp') + $life : ($life < 0 ? getglobal('timestamp') - 31536000 : 0);
	$path = $httponly && PHP_VERSION < '5.2.0' ? $config['cookiepath'].'; HttpOnly' : $config['cookiepath'];

	$secure = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	if(PHP_VERSION < '5.2.0') {
		setcookie($var, $value, $life, $path, $config['cookiedomain'], $secure);
	} else {
		setcookie($var, $value, $life, $path, $config['cookiedomain'], $secure, $httponly);
	}
}

/**
 * 获取cookie
 */
function getcookie($key) {
	global $_G;
	return isset($_G['cookie'][$key]) ? $_G['cookie'][$key] : '';
}

/**
 * 获取文件扩展名
 */
function fileext($filename) {
	return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
}

//note 规则待调整
function formhash($specialadd = '') {
	global $_G;
	$hashadd = defined('IN_ADMINCP') ? 'Only For Discuz! Admin Control Panel' : '';
	return substr(md5(substr($_G['timestamp'], 0, -7).$_G['username'].$_G['uid'].$_G['authkey'].$hashadd.$specialadd), 8, 8);
}

function checkrobot($useragent = '') {
	static $kw_spiders = array('bot', 'crawl', 'spider' ,'slurp', 'sohu-search', 'lycos', 'robozilla');
	static $kw_browsers = array('msie', 'netscape', 'opera', 'konqueror', 'mozilla');

	$useragent = strtolower(empty($useragent) ? $_SERVER['HTTP_USER_AGENT'] : $useragent);
	if(strpos($useragent, 'http://') === false && dstrpos($useragent, $kw_browsers)) return false;
	if(dstrpos($useragent, $kw_spiders)) return true;
	return false;
}
/**
* 检查是否是以手机浏览器进入(IN_MOBILE)
*/
function checkmobile() {
	global $_G;
	$mobile = array();
	static $touchbrowser_list =array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
				'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
				'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
				'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
				'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
				'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
				'benq', 'haier', '^lct', '320x320', '240x320', '176x220');
	static $mobilebrowser_list =array('windows phone');
	static $wmlbrowser_list = array('cect', 'compal', 'ctl', 'lg', 'nec', 'tcl', 'alcatel', 'ericsson', 'bird', 'daxian', 'dbtel', 'eastcom',
			'pantech', 'dopod', 'philips', 'haier', 'konka', 'kejian', 'lenovo', 'benq', 'mot', 'soutec', 'nokia', 'sagem', 'sgh',
			'sed', 'capitel', 'panasonic', 'sonyericsson', 'sharp', 'amoi', 'panda', 'zte');

	$pad_list = array('pad', 'gt-p1000');

	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

	//note 判断是否为pad浏览器
	if(dstrpos($useragent, $pad_list)) {
		return false;
	}
	//note 获取手机浏览器
	if(($v = dstrpos($useragent, $mobilebrowser_list, true))) {
		$_G['mobile'] = $v;
		return '1';
	}
	if(($v = dstrpos($useragent, $touchbrowser_list, true))){
		$_G['mobile'] = $v;
		return '2';
	}
	if(($v = dstrpos($useragent, $wmlbrowser_list))) {
		$_G['mobile'] = $v;
		return '3'; //wml版
	}
	$brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
	if(dstrpos($useragent, $brower)) return false;

	$_G['mobile'] = 'unknown';
	if(isset($_G['mobiletpl'][$_GET['mobile']])) {
		return true;
	} else {
		return false;
	}
}

/**
 * 字符串方式实现 preg_match("/(s1|s2|s3)/", $string, $match)
 * @param string $string 源字符串
 * @param array $arr 要查找的字符串 如array('s1', 's2', 's3')
 * @param bool $returnvalue 是否返回找到的值
 * @return bool
 */
function dstrpos($string, &$arr, $returnvalue = false) {
	if(empty($string)) return false;
	foreach((array)$arr as $v) {
		if(strpos($string, $v) !== false) {
			$return = $returnvalue ? $v : true;
			return $return;
		}
	}
	return false;
}

/**
* 检查邮箱是否有效
* @param $email 要检查的邮箱
* @param 返回结果
*/
function isemail($email) {
	return strlen($email) > 6 && strlen($email) <= 32 && preg_match("/^([A-Za-z0-9\-_.+]+)@([A-Za-z0-9\-]+[.][A-Za-z0-9\-.]+)$/", $email);
}

/**
* 问题答案加密
* @param $questionid - 问题
* @param $answer - 答案
* @return 返回加密的字串
*/
function quescrypt($questionid, $answer) {
	return $questionid > 0 && $answer != '' ? substr(md5($answer.md5($questionid)), 16, 8) : '';
}

/**
* 产生随机码
* @param $length - 要多长
* @param $numberic - 数字还是字符串
* @return 返回字符串
*/
function random($length, $numeric = 0) {
	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	if($numeric) {
		$hash = '';
	} else {
		$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
		$length--;
	}
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed{mt_rand(0, $max)};
	}
	return $hash;
}

/**
 * 判断一个字符串是否在另一个字符串中存在
 *
 * @param string 原始字串 $string
 * @param string 查找 $find
 * @return boolean
 */
function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}

/**
 * 获取头像
 *
 * @param int $uid 需要获取的用户UID值
 * @param string $size 获取尺寸 'small', 'middle', 'big'
 * @param boolean $returnsrc 是否直接返回图片src
 * @param boolean $real 是否返回真实图片
 * @param boolean $static 是否返回真实路径
 * @param string $ucenterurl 强制uc路径
 */
function avatar($uid, $size = 'middle', $returnsrc = FALSE, $real = FALSE, $static = FALSE, $ucenterurl = '') {
	global $_G;
	if($_G['setting']['plugins']['func'][HOOKTYPE]['avatar']) {
		$_G['hookavatar'] = '';
		$param = func_get_args();
		hookscript('avatar', 'global', 'funcs', array('param' => $param), 'avatar');
		if($_G['hookavatar']) {
			return $_G['hookavatar'];
		}
	}
	static $staticavatar;
	if($staticavatar === null) {
		$staticavatar = $_G['setting']['avatarmethod'];
	}

	$ucenterurl = empty($ucenterurl) ? $_G['setting']['ucenterurl'] : $ucenterurl;
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
	$uid = abs(intval($uid));
	if(!$staticavatar && !$static) {
		return $returnsrc ? $ucenterurl.'/avatar.php?uid='.$uid.'&size='.$size.($real ? '&type=real' : '') : '<img src="'.$ucenterurl.'/avatar.php?uid='.$uid.'&size='.$size.($real ? '&type=real' : '').'" />';
	} else {
		$uid = sprintf("%09d", $uid);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$file = $ucenterurl.'/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).($real ? '_real' : '').'_avatar_'.$size.'.jpg';
		return $returnsrc ? $file : '<img src="'.$file.'" onerror="this.onerror=null;this.src=\''.$ucenterurl.'/images/noavatar_'.$size.'.gif\'" />';
	}
}

/**
* 加载语言
* 语言文件统一为 $lang = array();
* @param $file - 语言文件，可包含路径如 forum/xxx home/xxx
* @param $langvar - 语言文字索引
* @param $vars - 变量替换数组
* @return 语言文字
*/
function lang($file, $langvar = null, $vars = array(), $default = null) {
	global $_G;
	$fileinput = $file;
	list($path, $file) = explode('/', $file);
	if(!$file) {
		$file = $path;
		$path = '';
	}
	if(strpos($file, ':') !== false) {
		$path = 'plugin';
		list($file) = explode(':', $file);
	}

	if($path != 'plugin') {
		$key = $path == '' ? $file : $path.'_'.$file;
		if(!isset($_G['lang'][$key])) {
			include DISCUZ_ROOT.'./source/language/'.($path == '' ? '' : $path.'/').'lang_'.$file.'.php';
			$_G['lang'][$key] = $lang;
		}
		//noteX 合并手机语言包(IN_MOBILE)
		if(defined('IN_MOBILE') && !defined('TPL_DEFAULT')) {
			include DISCUZ_ROOT.'./source/language/mobile/lang_template.php';
			$_G['lang'][$key] = array_merge($_G['lang'][$key], $lang);
		}
		if($file != 'error' && !isset($_G['cache']['pluginlanguage_system'])) {
			loadcache('pluginlanguage_system');
		}
		if(!isset($_G['hooklang'][$fileinput])) {
			if(isset($_G['cache']['pluginlanguage_system'][$fileinput]) && is_array($_G['cache']['pluginlanguage_system'][$fileinput])) {
				$_G['lang'][$key] = array_merge($_G['lang'][$key], $_G['cache']['pluginlanguage_system'][$fileinput]);
			}
			$_G['hooklang'][$fileinput] = true;
		}
		$returnvalue = &$_G['lang'];
	} else {
		if(empty($_G['config']['plugindeveloper'])) {
			loadcache('pluginlanguage_script');
		} elseif(!isset($_G['cache']['pluginlanguage_script'][$file]) && preg_match("/^[a-z]+[a-z0-9_]*$/i", $file)) {
			if(@include(DISCUZ_ROOT.'./data/plugindata/'.$file.'.lang.php')) {
				$_G['cache']['pluginlanguage_script'][$file] = $scriptlang[$file];
			} else {
				loadcache('pluginlanguage_script');
			}
		}
		$returnvalue = & $_G['cache']['pluginlanguage_script'];
		$key = &$file;
	}
	$return = $langvar !== null ? (isset($returnvalue[$key][$langvar]) ? $returnvalue[$key][$langvar] : null) : $returnvalue[$key];
	$return = $return === null ? ($default !== null ? $default : $langvar) : $return;
	$searchs = $replaces = array();
	if($vars && is_array($vars)) {
		foreach($vars as $k => $v) {
			$searchs[] = '{'.$k.'}';
			$replaces[] = $v;
		}
	}
	if(is_string($return) && strpos($return, '{_G/') !== false) {
		preg_match_all('/\{_G\/(.+?)\}/', $return, $gvar);
		foreach($gvar[0] as $k => $v) {
			$searchs[] = $v;
			$replaces[] = getglobal($gvar[1][$k]);
		}
	}
	$return = str_replace($searchs, $replaces, $return);
	return $return;
}

/**
* 检查模板源文件是否更新
* 当编译文件不存时强制重新编译
* 当 tplrefresh = 1 时检查文件
* 当 tplrefresh > 1 时，则根据 tplrefresh 取余，无余时则检查更新
*
*/
function checktplrefresh($maintpl, $subtpl, $timecompare, $templateid, $cachefile, $tpldir, $file) {
	static $tplrefresh, $timestamp, $targettplname;
	if($tplrefresh === null) {
		$tplrefresh = getglobal('config/output/tplrefresh');
		$timestamp = getglobal('timestamp');
	}

	if(empty($timecompare) || $tplrefresh == 1 || ($tplrefresh > 1 && !($timestamp % $tplrefresh))) {
		if(empty($timecompare) || @filemtime(DISCUZ_ROOT.$subtpl) > $timecompare) {
			require_once DISCUZ_ROOT.'/source/class/class_template.php';
			$template = new template();
			$template->parse_template($maintpl, $templateid, $tpldir, $file, $cachefile);
			//更新页面和模块的关联
			if($targettplname === null) {
				$targettplname = getglobal('style/tplfile');
				if(!empty($targettplname)) {
					include_once libfile('function/block');
					$targettplname = strtr($targettplname, ':', '_');
					update_template_block($targettplname, getglobal('style/tpldirectory'), $template->blocks);
				}
				$targettplname = true;
			}
			return TRUE;
		}
	}
	return FALSE;
}

/**
* 解析模板
* @return 返回域名
*/
function template($file, $templateid = 0, $tpldir = '', $gettplfile = 0, $primaltpl='') {
	global $_G;

	static $_init_style = false;
	if($_init_style === false) {
		C::app()->_init_style();
		$_init_style = true;
	}
	$oldfile = $file; //原模板
	if(strpos($file, ':') !== false) {
		$clonefile = '';
		list($templateid, $file, $clonefile) = explode(':', $file);
		$oldfile = $file;
		$file = empty($clonefile) ? $file : $file.'_'.$clonefile;
		if($templateid == 'diy') {
			$indiy = false; //是否存在DIY
			$_G['style']['tpldirectory'] = $tpldir ? $tpldir : (defined('TPLDIR') ? TPLDIR : ''); //模板文件所在的目录，DIY保存时使用
			$_G['style']['prefile'] = ''; //非预览环境标记预览文件是否存在
			$diypath = DISCUZ_ROOT.'./data/diy/'.$_G['style']['tpldirectory'].'/'; //DIY模板文件目录
			$preend = '_diy_preview'; //预览文件后缀
			$_GET['preview'] = !empty($_GET['preview']) ? $_GET['preview'] : ''; //是否预览
			$curtplname = $oldfile;//当前模板名
			$basescript = $_G['mod'] == 'viewthread' && !empty($_G['thread']) ? 'forum' : $_G['basescript']; //帖子查看页归到froum中
			if(isset($_G['cache']['diytemplatename'.$basescript])) {
				$diytemplatename = &$_G['cache']['diytemplatename'.$basescript];//当前应用的DIY文件缓存
			} else {
				if(!isset($_G['cache']['diytemplatename'])) {
					loadcache('diytemplatename');
				}
				$diytemplatename = &$_G['cache']['diytemplatename'];//所有DIY文件缓存
			}
			$tplsavemod = 0; //公共DIY页面标记
			//独立DIY页面 || 分区或版块没有指定模板 && 公共DIY页面
			if(isset($diytemplatename[$file]) && file_exists($diypath.$file.'.htm') && ($tplsavemod = 1) || empty($_G['forum']['styleid']) && ($file = $primaltpl ? $primaltpl : $oldfile) && isset($diytemplatename[$file]) && file_exists($diypath.$file.'.htm')) {
				$tpldir = 'data/diy/'.$_G['style']['tpldirectory'].'/'; //文件目录
				!$gettplfile && $_G['style']['tplsavemod'] = $tplsavemod; //独立DIY页面标记：1，公共DIY页面标记：0
				$curtplname = $file; //当前模板名
				if(isset($_GET['diy']) && $_GET['diy'] == 'yes' || isset($_GET['diy']) && $_GET['preview'] == 'yes') { //DIY模式或预览模式下做以下判断
					$flag = file_exists($diypath.$file.$preend.'.htm'); //预览文件是否存在
					if($_GET['preview'] == 'yes') { //预览环境
						$file .= $flag ? $preend : ''; //使用预览模板文件
					} else {
						$_G['style']['prefile'] = $flag ? 1 : ''; //非预览环境标记预览文件是否存在
					}
				}
				$indiy = true;
			} else {
				$file = $primaltpl ? $primaltpl : $oldfile; //无DIY页面则使用原模板
			}
			//根据模板自动刷新开关$tplrefresh 更新DIY模板
			$tplrefresh = $_G['config']['output']['tplrefresh'];
			//在有DIY生成模板文件时 && 自动刷新开启 && DIY生成模板文件修改时间 < 原模板修改修改
			if($indiy && ($tplrefresh ==1 || ($tplrefresh > 1 && !($_G['timestamp'] % $tplrefresh))) && filemtime($diypath.$file.'.htm') < filemtime(DISCUZ_ROOT.$_G['style']['tpldirectory'].'/'.($primaltpl ? $primaltpl : $oldfile).'.htm')) {
				//原模板更改则更新DIY模板，如果更新失败则删除DIY模板
				if (!updatediytemplate($file, $_G['style']['tpldirectory'])) {
					unlink($diypath.$file.'.htm');
					$tpldir = '';
				}
			}

			//保存当前模板名
			if (!$gettplfile && empty($_G['style']['tplfile'])) {
				$_G['style']['tplfile'] = empty($clonefile) ? $curtplname : $oldfile.':'.$clonefile;
			}

			//是否显示继续DIY
			$_G['style']['prefile'] = !empty($_GET['preview']) && $_GET['preview'] == 'yes' ? '' : $_G['style']['prefile'];

		} else {
			$tpldir = './source/plugin/'.$templateid.'/template';
		}
	}

	$file .= !empty($_G['inajax']) && ($file == 'common/header' || $file == 'common/footer') ? '_ajax' : '';
	$tpldir = $tpldir ? $tpldir : (defined('TPLDIR') ? TPLDIR : '');
	$templateid = $templateid ? $templateid : (defined('TEMPLATEID') ? TEMPLATEID : '');
	$filebak = $file;

	//noteX 将页面模板加一层Mobile目录，用以定位手机模板页面(IN_MOBILE)
	if(defined('IN_MOBILE') && !defined('TPL_DEFAULT') && strpos($file, $_G['mobiletpl'][IN_MOBILE].'/') === false || (isset($_G['forcemobilemessage']) && $_G['forcemobilemessage'])) {
		if(IN_MOBILE == 2) {
			$oldfile .= !empty($_G['inajax']) && ($oldfile == 'common/header' || $oldfile == 'common/footer') ? '_ajax' : '';
		}
		$file = $_G['mobiletpl'][IN_MOBILE].'/'.$oldfile;
	}

	//确保$tpldir有值
	if(!$tpldir) {
		$tpldir = './template/default';
	}
	$tplfile = $tpldir.'/'.$file.'.htm';

	$file == 'common/header' && defined('CURMODULE') && CURMODULE && $file = 'common/header_'.$_G['basescript'].'_'.CURMODULE;

	//noteX 手机模板的判断(IN_MOBILE)
	if(defined('IN_MOBILE') && !defined('TPL_DEFAULT')) {
		//首先判断是否是DIY模板，如果是就删除可能存在的forumdisplay_1中的数字
		if(strpos($tpldir, 'plugin')) {
			if(!file_exists(DISCUZ_ROOT.$tpldir.'/'.$file.'.htm') && !file_exists(DISCUZ_ROOT.$tpldir.'/'.$file.'.php')) {
				discuz_error::template_error('template_notfound', $tpldir.'/'.$file.'.htm');
			} else {
				$mobiletplfile = $tpldir.'/'.$file.'.htm';
			}
		}
		!$mobiletplfile && $mobiletplfile = $file.'.htm';
		if(strpos($tpldir, 'plugin') && (file_exists(DISCUZ_ROOT.$mobiletplfile) || file_exists(substr(DISCUZ_ROOT.$mobiletplfile, 0, -4).'.php'))) {
			$tplfile = $mobiletplfile;
		} elseif(!file_exists(DISCUZ_ROOT.TPLDIR.'/'.$mobiletplfile) && !file_exists(substr(DISCUZ_ROOT.TPLDIR.'/'.$mobiletplfile, 0, -4).'.php')) {
			$mobiletplfile = './template/default/'.$mobiletplfile;
			if(!file_exists(DISCUZ_ROOT.$mobiletplfile) && !$_G['forcemobilemessage']) {
				$tplfile = str_replace($_G['mobiletpl'][IN_MOBILE].'/', '', $tplfile);
				$file = str_replace($_G['mobiletpl'][IN_MOBILE].'/', '', $file);
				define('TPL_DEFAULT', true);
			} else {
				$tplfile = $mobiletplfile;
			}
		} else {
			$tplfile = TPLDIR.'/'.$mobiletplfile;
		}
	}

	$cachefile = './data/template/'.(defined('STYLEID') ? STYLEID.'_' : '_').$templateid.'_'.str_replace('/', '_', $file).'.tpl.php';
	//非系统模板目录 && $tplfile模板文件不存在 && .php后缀的模板文件不存在 && //当前模板目录+原模板文件不存在
	if($templateid != 1 && !file_exists(DISCUZ_ROOT.$tplfile) && !file_exists(substr(DISCUZ_ROOT.$tplfile, 0, -4).'.php')
			&& !file_exists(DISCUZ_ROOT.($tplfile = $tpldir.$filebak.'.htm'))) {
		$tplfile = './template/default/'.$filebak.'.htm';
	}

	if($gettplfile) {
		return $tplfile;
	}
	checktplrefresh($tplfile, $tplfile, @filemtime(DISCUZ_ROOT.$cachefile), $templateid, $cachefile, $tpldir, $file);
	return DISCUZ_ROOT.$cachefile;
}

/**
 * 数据签名
 * @param string $str 源数据
 * @param int $length 返回值的长度，8-32位之间
 * @return string
 */
function dsign($str, $length = 16){
	return substr(md5($str.getglobal('config/security/authkey')), 0, ($length ? max(8, $length) : 16));
}

/**
 * 对某id进行个性化md5
 */
function modauthkey($id) {
	return md5(getglobal('username').getglobal('uid').getglobal('authkey').substr(TIMESTAMP, 0, -7).$id);
}

/**
 * 获得当前应用页面选中的导航id
 */
function getcurrentnav() {
	global $_G;
	if(!empty($_G['mnid'])) {
		return $_G['mnid'];
	}
	$mnid = '';
	$_G['basefilename'] = $_G['basefilename'] == $_G['basescript'] ? $_G['basefilename'] : $_G['basescript'].'.php';
	if(isset($_G['setting']['navmns'][$_G['basefilename']])) {
		if($_G['basefilename'] == 'home.php' && $_GET['mod'] == 'space' && (empty($_GET['do']) || in_array($_GET['do'], array('follow', 'view')))) {
			$_GET['mod'] = 'follow';
		}
		foreach($_G['setting']['navmns'][$_G['basefilename']] as $navmn) {
			if($navmn[0] == array_intersect_assoc($navmn[0], $_GET) || ($navmn[0]['mod'] == 'space' && $_GET['mod'] == 'spacecp' && ($navmn[0]['do'] == $_GET['ac'] || $navmn[0]['do'] == 'album' && $_GET['ac'] == 'upload'))) {
				$mnid = $navmn[1];
			}
		}

	}
	if(!$mnid && isset($_G['setting']['navdms'])) {
		foreach($_G['setting']['navdms'] as $navdm => $navid) {
			if(strpos(strtolower($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']), $navdm) !== false && strpos(strtolower($_SERVER['HTTP_HOST']), $navdm) === false) {
				$mnid = $navid;
				break;
			}
		}
	}
	if(!$mnid && isset($_G['setting']['navmn'][$_G['basefilename']])) {
		$mnid = $_G['setting']['navmn'][$_G['basefilename']];
	}
	return $mnid;
}

//读取UC库
function loaducenter() {
	require_once DISCUZ_ROOT.'./config/config_ucenter.php';
	require_once DISCUZ_ROOT.'./uc_client/client.php';
}

/**
* 读取缓存
* @param $cachenames - 缓存名称数组或字串
*/
function loadcache($cachenames, $force = false) {
	global $_G;
	static $loadedcache = array();
	$cachenames = is_array($cachenames) ? $cachenames : array($cachenames);
	$caches = array();
	foreach ($cachenames as $k) {
		if(!isset($loadedcache[$k]) || $force) {
			$caches[] = $k;
			$loadedcache[$k] = true;
		}
	}

	if(!empty($caches)) {
		$cachedata = C::t('common_syscache')->fetch_all($caches);
		foreach($cachedata as $cname => $data) {
			if($cname == 'setting') {
				$_G['setting'] = $data;
			} elseif($cname == 'usergroup_'.$_G['groupid']) {
				$_G['cache'][$cname] = $_G['group'] = $data;
			} elseif($cname == 'style_default') {
				$_G['cache'][$cname] = $_G['style'] = $data;
			} elseif($cname == 'grouplevels') {
				$_G['grouplevels'] = $data;
			} else {
				$_G['cache'][$cname] = $data;
			}
		}
	}
	return true;
}

/**
* 格式化时间
* @param $timestamp - 时间戳
* @param $format - dt=日期时间 d=日期 t=时间 u=个性化 其他=自定义
* @param $timeoffset - 时区
* @return string
*/
function dgmdate($timestamp, $format = 'dt', $timeoffset = '9999', $uformat = '') {
	global $_G;
	$format == 'u' && !$_G['setting']['dateconvert'] && $format = 'dt';
	static $dformat, $tformat, $dtformat, $offset, $lang;
	if($dformat === null) {
		$dformat = getglobal('setting/dateformat');
		$tformat = getglobal('setting/timeformat');
		$dtformat = $dformat.' '.$tformat;
		$offset = getglobal('member/timeoffset');
		$sysoffset = getglobal('setting/timeoffset');
		$offset = $offset == 9999 ? ($sysoffset ? $sysoffset : 0) : $offset;
		$lang = lang('core', 'date');
	}
	$timeoffset = $timeoffset == 9999 ? $offset : $timeoffset;
	$timestamp += $timeoffset * 3600;
	$format = empty($format) || $format == 'dt' ? $dtformat : ($format == 'd' ? $dformat : ($format == 't' ? $tformat : $format));
	if($format == 'u') {
		$todaytimestamp = TIMESTAMP - (TIMESTAMP + $timeoffset * 3600) % 86400 + $timeoffset * 3600;
		$s = gmdate(!$uformat ? $dtformat : $uformat, $timestamp);
		$time = TIMESTAMP + $timeoffset * 3600 - $timestamp;
		if($timestamp >= $todaytimestamp) {
			if($time > 3600) {
				$return = intval($time / 3600).'&nbsp;'.$lang['hour'].$lang['before'];
			} elseif($time > 1800) {
				$return = $lang['half'].$lang['hour'].$lang['before'];
			} elseif($time > 60) {
				$return = intval($time / 60).'&nbsp;'.$lang['min'].$lang['before'];
			} elseif($time > 0) {
				$return = $time.'&nbsp;'.$lang['sec'].$lang['before'];
			} elseif($time == 0) {
				$return = $lang['now'];
			} else {
				$return = $s;
			}
			if($time >=0 && !defined('IN_MOBILE')) {
				$return = '<span title="'.$s.'">'.$return.'</span>';
			}
		} elseif(($days = intval(($todaytimestamp - $timestamp) / 86400)) >= 0 && $days < 7) {
			if($days == 0) {
				$return = $lang['yday'].'&nbsp;'.gmdate($tformat, $timestamp);
			} elseif($days == 1) {
				$return = $lang['byday'].'&nbsp;'.gmdate($tformat, $timestamp);
			} else {
				$return = ($days + 1).'&nbsp;'.$lang['day'].$lang['before'];
			}
			if(!defined('IN_MOBILE')) {
				$return = '<span title="'.$s.'">'.$return.'</span>';
			}
		} else {
			$return = $s;
		}
		return $return;
	} else {
		return gmdate($format, $timestamp);
	}
}

/**
	得到时间戳
*/
function dmktime($date) {
	if(strpos($date, '-')) {
		$time = explode('-', $date);
		return mktime(0, 0, 0, $time[1], $time[2], $time[0]);
	}
	return 0;
}

/**
 *	个性化数字
 */
function dnumber($number) {
	return abs($number) > 10000 ? '<span title="'.$number.'">'.intval($number / 10000).lang('core', '10k').'</span>' : $number;
}

/**
* 更新缓存
* @param $cachename - 缓存名称
* @param $data - 缓存数据
*/
function savecache($cachename, $data) {
	C::t('common_syscache')->insert($cachename, $data);
}

/**
* 更新缓存 savecache的别名
* @param $cachename - 缓存名称
* @param $data - 缓存数据
*/
function save_syscache($cachename, $data) {
	savecache($cachename, $data);
}

/**
* Portal模块
* @param $parameter - 参数集合
*/
function block_get($parameter) {
	include_once libfile('function/block');
	block_get_batch($parameter);
}

/**
* Portal 模块显示
*
* @param $parameter - 参数集合
*/
function block_display($bid) {
	include_once libfile('function/block');
	block_display_batch($bid);
}

//连接字符
function dimplode($array) {
	if(!empty($array)) {
		$array = array_map('addslashes', $array);
		return "'".implode("','", is_array($array) ? $array : array($array))."'";
	} else {
		return 0;
	}
}

/**
* 返回库文件的全路径
*
* @param string $libname 库文件分类及名称
* @param string $folder 模块目录'module','include','class'
* @return string
*
* @example require DISCUZ_ROOT.'./source/function/function_cache.php'
* @example 我们可以利用此函数简写为：require libfile('function/cache');
*
*/
function libfile($libname, $folder = '') {
	$libpath = '/source/'.$folder;
	if(strstr($libname, '/')) {
		list($pre, $name) = explode('/', $libname);
		$path = "{$libpath}/{$pre}/{$pre}_{$name}";
	} else {
		$path = "{$libpath}/{$libname}";
	}
	return preg_match('/^[\w\d\/_]+$/i', $path) ? realpath(DISCUZ_ROOT.$path.'.php') : false;
}

/**
 * 针对uft-8进行特殊处理的strlen
 * @param string $str
 * @return int
 */
function dstrlen($str) {
	if(strtolower(CHARSET) != 'utf-8') {
		return strlen($str);
	}
	$count = 0;
	for($i = 0; $i < strlen($str); $i++){
		$value = ord($str[$i]);
		if($value > 127) {
			$count++;
			if($value >= 192 && $value <= 223) $i++;
			elseif($value >= 224 && $value <= 239) $i = $i + 2;
			elseif($value >= 240 && $value <= 247) $i = $i + 3;
	    	}
    		$count++;
	}
	return $count;
}

/**
* 根据中文裁减字符串
* @param $string - 字符串
* @param $length - 长度
* @param $doc - 缩略后缀
* @return 返回带省略号被裁减好的字符串
*/
function cutstr($string, $length, $dot = ' ...') {
	if(strlen($string) <= $length) {
		return $string;
	}

	$pre = chr(1);
	$end = chr(1);
	//保护特殊字符串
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), $string);

	$strcut = '';
	if(strtolower(CHARSET) == 'utf-8') {

		$n = $tn = $noc = 0;
		while($n < strlen($string)) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if($noc >= $length) {
				break;
			}

		}
		if($noc > $length) {
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	} else {
		$_length = $length - 1;
		for($i = 0; $i < $length; $i++) {
			if(ord($string[$i]) <= 127) {
				$strcut .= $string[$i];
			} else if($i < $_length) {
				$strcut .= $string[$i].$string[++$i];
			}
		}
	}

	//还原特殊字符串
	$strcut = str_replace(array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	//修复出现特殊字符串截段的问题
	$pos = strrpos($strcut, chr(1));
	if($pos !== false) {
		$strcut = substr($strcut,0,$pos);
	}
	return $strcut.$dot;
}

//去掉slassh
function dstripslashes($string) {
	if(empty($string)) return $string;
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dstripslashes($val);
		}
	} else {
		$string = stripslashes($string);
	}
	return $string;
}

/**
* 论坛 aid url 生成
*/
function aidencode($aid, $type = 0, $tid = 0) {
	global $_G;
	$s = !$type ? $aid.'|'.substr(md5($aid.md5($_G['config']['security']['authkey']).TIMESTAMP.$_G['uid']), 0, 8).'|'.TIMESTAMP.'|'.$_G['uid'].'|'.$tid : $aid.'|'.md5($aid.md5($_G['config']['security']['authkey']).TIMESTAMP).'|'.TIMESTAMP;
	return rawurlencode(base64_encode($s));
}

/**
 * 返回论坛缩放附件图片的地址 url
 */
function getforumimg($aid, $nocache = 0, $w = 140, $h = 140, $type = '') {
	global $_G;
	$key = dsign($aid.'|'.$w.'|'.$h);
	return 'forum.php?mod=image&aid='.$aid.'&size='.$w.'x'.$h.'&key='.rawurlencode($key).($nocache ? '&nocache=yes' : '').($type ? '&type='.$type : '');
}

/**
 * 获取rewrite字符串
 * @param string $type 需要获取的rewite
 * @param boolean $returntype true:直接返回href, false:返回a标签
 * @param string $host 可选网站域名
 * @return string
 */
function rewriteoutput($type, $returntype, $host) {
	global $_G;
	$fextra = '';
	if($type == 'forum_forumdisplay') {
		list(,,, $fid, $page, $extra) = func_get_args();
		$r = array(
			'{fid}' => empty($_G['setting']['forumkeys'][$fid]) ? $fid : $_G['setting']['forumkeys'][$fid],
			'{page}' => $page ? $page : 1,
		);
	} elseif($type == 'forum_viewthread') {
		list(,,, $tid, $page, $prevpage, $extra) = func_get_args();
		$r = array(
			'{tid}' => $tid,
			'{page}' => $page ? $page : 1,
			'{prevpage}' => $prevpage && !IS_ROBOT ? $prevpage : 1,
		);
	} elseif($type == 'home_space') {
		list(,,, $uid, $username, $extra) = func_get_args();
		$_G['setting']['rewritecompatible'] && $username = rawurlencode($username);
		$r = array(
			'{user}' => $uid ? 'uid' : 'username',
			'{value}' => $uid ? $uid : $username,
		);
	} elseif($type == 'home_blog') {
		list(,,, $uid, $blogid, $extra) = func_get_args();
		$r = array(
			'{uid}' => $uid,
			'{blogid}' => $blogid,
		);
	} elseif($type == 'group_group') {
		list(,,, $fid, $page, $extra) = func_get_args();
		$r = array(
			'{fid}' => $fid,
			'{page}' => $page ? $page : 1,
		);
	} elseif($type == 'portal_topic') {
		list(,,, $name, $extra) = func_get_args();
		$r = array(
			'{name}' => $name,
		);
	} elseif($type == 'portal_article') {
		list(,,, $id, $page, $extra) = func_get_args();
		$r = array(
			'{id}' => $id,
			'{page}' => $page ? $page : 1,
		);
	} elseif($type == 'forum_archiver') {
		list(,, $action, $value, $page, $extra) = func_get_args();
		$host = '';
		$r = array(
			'{action}' => $action,
			'{value}' => $value,
		);
		if($page) {
			$fextra = '?page='.$page;
		}
	} elseif($type == 'plugin') {
		list(,, $pluginid, $module,, $param, $extra) = func_get_args();
		$host = '';
		$r = array(
			'{pluginid}' => $pluginid,
			'{module}' => $module,
		);
		if($param) {
			$fextra = '?'.$param;
		}
	}
	$href = str_replace(array_keys($r), $r, $_G['setting']['rewriterule'][$type]).$fextra;
	if(!$returntype) {
		return '<a href="'.$host.$href.'"'.(!empty($extra) ? stripslashes($extra) : '').'>';
	} else {
		return $host.$href;
	}
}

/**
* 手机模式下替换所有链接为mobile=yes形式
* @param $file - 正则匹配到的文件字符串
* @param $file - 要被替换的字符串
* @$replace 替换后字符串
*/
function mobilereplace($file, $replace) {
	return helper_mobile::mobilereplace($file, $replace);
}

/**
* 手机的output函数
*/
function mobileoutput() {
	helper_mobile::mobileoutput();
}

/**
* 系统输出
* @return 返回内容
*/
function output() {

	global $_G;


	if(defined('DISCUZ_OUTPUTED')) {
		return;
	} else {
		define('DISCUZ_OUTPUTED', 1);
	}

	// 更新模块
	if(!empty($_G['blockupdate'])) {
		block_updatecache($_G['blockupdate']['bid']);
	}

	//noteX 手机模式下重新制作页面输出(IN_MOBILE)
	if(defined('IN_MOBILE')) {
		mobileoutput();
	}
	if(!defined('IN_MOBILE') && !defined('IN_ARCHIVER')) {
		$tipsService = Cloud::loadClass('Service_DiscuzTips');
		$tipsService->show();
	}
	$havedomain = implode('', $_G['setting']['domain']['app']);
	if($_G['setting']['rewritestatus'] || !empty($havedomain)) {
		$content = ob_get_contents();
		$content = output_replace($content);


		ob_end_clean();
		$_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();

		echo $content;
	}

	if(isset($_G['makehtml'])) {
		helper_makehtml::make_html();
	}

	if($_G['setting']['ftp']['connid']) {
		@ftp_close($_G['setting']['ftp']['connid']);
	}
	$_G['setting']['ftp'] = array();

	//debug Module:HTML_CACHE 如果定义了缓存常量，则此处将缓冲区的内容写入文件。如果为 index 缓存，则直接写入 data/index.cache ，如果为 viewthread 缓存，则根据md5(tid,等参数)取前三位为目录加上$tid_$page，做文件名。
	//debug $threadcacheinfo, $indexcachefile 为全局变量
	if(defined('CACHE_FILE') && CACHE_FILE && !defined('CACHE_FORBIDDEN') && !defined('IN_MOBILE') && !checkmobile()) {
		if(diskfreespace(DISCUZ_ROOT.'./'.$_G['setting']['cachethreaddir']) > 1000000) {
			if($fp = @fopen(CACHE_FILE, 'w')) {
				flock($fp, LOCK_EX);
				fwrite($fp, empty($content) ? ob_get_contents() : $content);
			}
			@fclose($fp);
			chmod(CACHE_FILE, 0777);
		}
	}

	if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG && @include(libfile('function/debug'))) {
		function_exists('debugmessage') && debugmessage();
	}
}

function output_replace($content) {
	global $_G;
	if(defined('IN_MODCP') || defined('IN_ADMINCP')) return $content;
	if(!empty($_G['setting']['output']['str']['search'])) {
		if(empty($_G['setting']['domain']['app']['default'])) {
			$_G['setting']['output']['str']['replace'] = str_replace('{CURHOST}', $_G['siteurl'], $_G['setting']['output']['str']['replace']);
		}
		$content = str_replace($_G['setting']['output']['str']['search'], $_G['setting']['output']['str']['replace'], $content);
	}
	if(!empty($_G['setting']['output']['preg']['search']) && (empty($_G['setting']['rewriteguest']) || empty($_G['uid']))) {
		if(empty($_G['setting']['domain']['app']['default'])) {
			$_G['setting']['output']['preg']['search'] = str_replace('\{CURHOST\}', preg_quote($_G['siteurl'], '/'), $_G['setting']['output']['preg']['search']);
			$_G['setting']['output']['preg']['replace'] = str_replace('{CURHOST}', $_G['siteurl'], $_G['setting']['output']['preg']['replace']);
		}

		$content = preg_replace($_G['setting']['output']['preg']['search'], $_G['setting']['output']['preg']['replace'], $content);
	}

	return $content;
}

/**
 * ajax footer使用输出页面内容
 */
function output_ajax() {
	global $_G;
	$s = ob_get_contents();
	ob_end_clean();
	$s = preg_replace("/([\\x01-\\x08\\x0b-\\x0c\\x0e-\\x1f])+/", ' ', $s);
	$s = str_replace(array(chr(0), ']]>'), array(' ', ']]&gt;'), $s);
	if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG && @include(libfile('function/debug'))) {
		function_exists('debugmessage') && $s .= debugmessage(1);
	}
	$havedomain = implode('', $_G['setting']['domain']['app']);
	if($_G['setting']['rewritestatus'] || !empty($havedomain)) {
        $s = output_replace($s);
	}
	return $s;
}


/**
 * 运行钩子
 */
function runhooks($scriptextra = '') {
	if(!defined('HOOKTYPE')) {
		define('HOOKTYPE', !defined('IN_MOBILE') ? 'hookscript' : 'hookscriptmobile');
	}
	if(defined('CURMODULE')) {
		global $_G;
		if($_G['setting']['plugins']['func'][HOOKTYPE]['common']) {
			hookscript('common', 'global', 'funcs', array(), 'common');
		}
		hookscript(CURMODULE, $_G['basescript'], 'funcs', array(), '', $scriptextra);
	}
}

/**
 * 执行插件脚本
 */
function hookscript($script, $hscript, $type = 'funcs', $param = array(), $func = '', $scriptextra = '') {
	global $_G;
	static $pluginclasses;
	if($hscript == 'home') {
		if($script == 'space') {
			$scriptextra = !$scriptextra ? $_GET['do'] : $scriptextra;
			$script = 'space'.(!empty($scriptextra) ? '_'.$scriptextra : '');
		} elseif($script == 'spacecp') {
			$scriptextra = !$scriptextra ? $_GET['ac'] : $scriptextra;
			$script .= !empty($scriptextra) ? '_'.$scriptextra : '';
		}
	}
	if(!isset($_G['setting'][HOOKTYPE][$hscript][$script][$type])) {
		return;
	}
	if(!isset($_G['cache']['plugin'])) {
		loadcache('plugin');
	}
	foreach((array)$_G['setting'][HOOKTYPE][$hscript][$script]['module'] as $identifier => $include) {
		if($_G['pluginrunlist'] && !in_array($identifier, $_G['pluginrunlist'])) {
			continue;
		}
		$hooksadminid[$identifier] = !$_G['setting'][HOOKTYPE][$hscript][$script]['adminid'][$identifier] || ($_G['setting'][HOOKTYPE][$hscript][$script]['adminid'][$identifier] && $_G['adminid'] > 0 && $_G['setting']['hookscript'][$hscript][$script]['adminid'][$identifier] >= $_G['adminid']);
		if($hooksadminid[$identifier]) {
			@include_once DISCUZ_ROOT.'./source/plugin/'.$include.'.class.php';
		}
	}
	if(@is_array($_G['setting'][HOOKTYPE][$hscript][$script][$type])) {
		$_G['inhookscript'] = true;
		$funcs = !$func ? $_G['setting'][HOOKTYPE][$hscript][$script][$type] : array($func => $_G['setting'][HOOKTYPE][$hscript][$script][$type][$func]);
		foreach($funcs as $hookkey => $hookfuncs) {
			foreach($hookfuncs as $hookfunc) {
				if($hooksadminid[$hookfunc[0]]) {
					$classkey = (HOOKTYPE != 'hookscriptmobile' ? '' : 'mobile').'plugin_'.($hookfunc[0].($hscript != 'global' ? '_'.$hscript : ''));
					if(!class_exists($classkey, false)) {
						continue;
					}
					if(!isset($pluginclasses[$classkey])) {
						$pluginclasses[$classkey] = new $classkey;
					}
					if(!method_exists($pluginclasses[$classkey], $hookfunc[1])) {
						continue;
					}
					$return = $pluginclasses[$classkey]->$hookfunc[1]($param);

					if(substr($hookkey, -7) == '_extend' && !empty($_G['setting']['pluginhooks'][$hookkey])) {
						continue;
					}

					if(is_array($return)) {
						if(!isset($_G['setting']['pluginhooks'][$hookkey]) || is_array($_G['setting']['pluginhooks'][$hookkey])) {
							foreach($return as $k => $v) {
								$_G['setting']['pluginhooks'][$hookkey][$k] .= $v;
							}
						} else {
							foreach($return as $k => $v) {
								$_G['setting']['pluginhooks'][$hookkey][$k] = $v;
							}
						}
					} else {
						if(!is_array($_G['setting']['pluginhooks'][$hookkey])) {
							$_G['setting']['pluginhooks'][$hookkey] .= $return;
						} else {
							foreach($_G['setting']['pluginhooks'][$hookkey] as $k => $v) {
								$_G['setting']['pluginhooks'][$hookkey][$k] .= $return;
							}
						}
					}
				}
			}
		}
	}
	$_G['inhookscript'] = false;
}

function hookscriptoutput($tplfile) {
	global $_G;
	if(!empty($_G['hookscriptoutput'])) {
		return;
	}
	hookscript('global', 'global');
	if(defined('CURMODULE')) {
		$param = array('template' => $tplfile, 'message' => $_G['hookscriptmessage'], 'values' => $_G['hookscriptvalues']);
		hookscript(CURMODULE, $_G['basescript'], 'outputfuncs', $param);
	}
	$_G['hookscriptoutput'] = true;
}

/**
 * 获取插件模块
 */
function pluginmodule($pluginid, $type) {
	global $_G;
	//note 过滤插件ID
	$pluginid = $pluginid ? preg_replace("/[^A-Za-z0-9_:]/", '', $pluginid) : '';
	if(!isset($_G['cache']['plugin'])) {
		loadcache('plugin');
	}
	list($identifier, $module) = explode(':', $pluginid);
	if(!is_array($_G['setting']['plugins'][$type]) || !array_key_exists($pluginid, $_G['setting']['plugins'][$type])) {
		showmessage('plugin_nonexistence');
	}
	if(!empty($_G['setting']['plugins'][$type][$pluginid]['url'])) {
		dheader('location: '.$_G['setting']['plugins'][$type][$pluginid]['url']);
	}
	$directory = $_G['setting']['plugins'][$type][$pluginid]['directory'];
	if(empty($identifier) || !preg_match("/^[a-z]+[a-z0-9_]*\/$/i", $directory) || !preg_match("/^[a-z0-9_\-]+$/i", $module)) {
		showmessage('undefined_action');
	}
	if(@!file_exists(DISCUZ_ROOT.($modfile = './source/plugin/'.$directory.$module.'.inc.php'))) {
		showmessage('plugin_module_nonexistence', '', array('mod' => $modfile));
	}
	return DISCUZ_ROOT.$modfile;
}
/**
 * 执行积分规则
 * @param String $action:  规则action名称
 * @param Integer $uid: 操作用户
 * @param array $extrasql: common_member_count的额外操作字段数组格式为 array('extcredits1' => '1')
 * @param String $needle: 防重字符串
 * @param Integer $coef: 积分放大倍数
 * @param Integer $update: 是否执行更新操作
 * @param Integer $fid: 版块ID
 * @return 返回积分策略
 */
function updatecreditbyaction($action, $uid = 0, $extrasql = array(), $needle = '', $coef = 1, $update = 1, $fid = 0) {

	$credit = credit::instance();
	if($extrasql) {
		$credit->extrasql = $extrasql;
	}
	return $credit->execrule($action, $uid, $needle, $coef, $update, $fid);
}

/**
* 检查积分下限
* @param string $action: 策略动作Action或者需要检测的操作积分值使如extcredits1积分进行减1操作检测array('extcredits1' => -1)
* @param Integer $uid: 用户UID
* @param Integer $coef: 积分放大倍数/负数为减分操作
* @param Integer $returnonly: 只要返回结果，不用中断程序运行
*/
function checklowerlimit($action, $uid = 0, $coef = 1, $fid = 0, $returnonly = 0) {
	require_once libfile('function/credit');
	return _checklowerlimit($action, $uid, $coef, $fid, $returnonly);
}

/**
 * 批量执行某一条策略规则
 * @param String $action:  规则action名称
 * @param Integer $uids: 操作用户可以为单个uid或uid数组
 * @param array $extrasql: common_member_count的额外操作字段数组格式为 array('extcredits1' => '1')
 * @param Integer $coef: 积分放大倍数，当为负数时为反转操作
 * @param Integer $fid: 版块ID
 */
function batchupdatecredit($action, $uids = 0, $extrasql = array(), $coef = 1, $fid = 0) {

	$credit = & credit::instance();
	if($extrasql) {
		$credit->extrasql = $extrasql;
	}
	return $credit->updatecreditbyrule($action, $uids, $coef, $fid);
}

/**
 * 添加积分
 * @param Integer $uids: 用户uid或者uid数组
 * @param String $dataarr: member count相关操作数组，例: array('threads' => 1, 'doings' => -1)
 * @param Boolean $checkgroup: 是否检查用户组 true or false
 * @param String $operation: 操作类型
 * @param Integer $relatedid:
 * @param String $ruletxt: 积分规则文本
 */

function updatemembercount($uids, $dataarr = array(), $checkgroup = true, $operation = '', $relatedid = 0, $ruletxt = '', $customtitle = '', $custommemo = '') {
	if(!empty($uids) && (is_array($dataarr) && $dataarr)) {
		require_once libfile('function/credit');
		return _updatemembercount($uids, $dataarr, $checkgroup, $operation, $relatedid, $ruletxt, $customtitle, $custommemo);
	}
	return true;
}

/**
 * 校验用户组
 * @param $uid
 */
function checkusergroup($uid = 0) {
	$credit = & credit::instance();
	$credit->checkusergroup($uid);
}

function checkformulasyntax($formula, $operators, $tokens) {
	$var = implode('|', $tokens);
	$operator = implode('', $operators);

	$operator = str_replace(
		array('+', '-', '*', '/', '(', ')', '{', '}', '\''),
		array('\+', '\-', '\*', '\/', '\(', '\)', '\{', '\}', '\\\''),
		$operator
	);

	if(!empty($formula)) {
		if(!preg_match("/^([$operator\.\d\(\)]|(($var)([$operator\(\)]|$)+))+$/", $formula) || !is_null(eval(preg_replace("/($var)/", "\$\\1", $formula).';'))){
			return false;
		}
	}
	return true;
}

//检验积分公式语法
function checkformulacredits($formula) {
	return checkformulasyntax(
		$formula,
		array('+', '-', '*', '/', ' '),
		array('extcredits[1-8]', 'digestposts', 'posts', 'threads', 'oltime', 'friends', 'doings', 'polls', 'blogs', 'albums', 'sharings')
	);
}

//临时调试通用
function debug($var = null, $vardump = false) {
	echo '<pre>';
	$vardump = empty($var) ? true : $vardump;
	if($vardump) {
		var_dump($var);
	} else {
		print_r($var);
	}
	exit();
}

/**
* 调试信息
*/
function debuginfo() {
	global $_G;
	if(getglobal('setting/debug')) {
		$db = & DB::object();
		$_G['debuginfo'] = array(
		    'time' => number_format((microtime(true) - $_G['starttime']), 6),
		    'queries' => $db->querynum,
		    'memory' => ucwords(C::memory()->type)
		    );
		if($db->slaveid) {
			$_G['debuginfo']['queries'] = 'Total '.$db->querynum.', Slave '.$db->slavequery;
		}
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * 随机取出一个站长推荐的条目
 * @param $module 当前模块
 * @return array
*/
function getfocus_rand($module) {
	global $_G;

	if(empty($_G['setting']['focus']) || !array_key_exists($module, $_G['setting']['focus']) || !empty($_G['cookie']['nofocus_'.$module]) || !$_G['setting']['focus'][$module]) {
		return null;
	}
	loadcache('focus');
	if(empty($_G['cache']['focus']['data']) || !is_array($_G['cache']['focus']['data'])) {
		return null;
	}
	$focusid = $_G['setting']['focus'][$module][array_rand($_G['setting']['focus'][$module])];
	return $focusid;
}

/**
 * 检查验证码正确性
 * @param $value 验证码变量值
 */
function check_seccode($value, $idhash, $fromjs = 0, $modid = '') {
	return helper_seccheck::check_seccode($value, $idhash, $fromjs, $modid);
}

/**
 * 检查验证问答正确性
 * @param $value 验证问答变量值
 */
function check_secqaa($value, $idhash) {
	return helper_seccheck::check_secqaa($value, $idhash);
}

function seccheck($rule, $param = array()) {
	return helper_seccheck::seccheck($rule, $param);
}

function make_seccode($seccode = '') {
	return helper_seccheck::make_seccode($seccode);
}

function make_secqaa() {
	return helper_seccheck::make_secqaa();
}
/**
 * 获取广告
 */
function adshow($parameter) {
	global $_G;
	if($_G['inajax'] || $_G['group']['closead']) {
		return;
	}
	if(isset($_G['config']['plugindeveloper']) && $_G['config']['plugindeveloper'] == 2) {
		return '<hook>[ad '.$parameter.']</hook>';
	}
	$params = explode('/', $parameter);
	$customid = 0;
	$customc = explode('_', $params[0]);
	if($customc[0] == 'custom') {
		$params[0] = $customc[0];
		$customid = $customc[1];
	}
	$adcontent = null;
	if(empty($_G['setting']['advtype']) || !in_array($params[0], $_G['setting']['advtype'])) {
		$adcontent = '';
	}
	if($adcontent === null) {
		loadcache('advs');
		$adids = array();
		$evalcode = &$_G['cache']['advs']['evalcode'][$params[0]];
		$parameters = &$_G['cache']['advs']['parameters'][$params[0]];
		$codes = &$_G['cache']['advs']['code'][$_G['basescript']][$params[0]];
		if(!empty($codes)) {
			foreach($codes as $adid => $code) {
				$parameter = &$parameters[$adid];
				$checked = true;
				@eval($evalcode['check']);
				if($checked) {
					$adids[] = $adid;
				}
			}
			if(!empty($adids)) {
				$adcode = $extra = '';
				@eval($evalcode['create']);
				if(empty($notag)) {
					$adcontent = '<div'.($params[1] != '' ? ' class="'.$params[1].'"' : '').$extra.'>'.$adcode.'</div>';
				} else {
					$adcontent = $adcode;
				}
			}
		}
	}
	$adfunc = 'ad_'.$params[0];
	$_G['setting']['pluginhooks'][$adfunc] = null;
	hookscript('ad', 'global', 'funcs', array('params' => $params, 'content' => $adcontent), $adfunc);
	if(!$_G['setting']['hookscript']['global']['ad']['funcs'][$adfunc]) {
		hookscript('ad', $_G['basescript'], 'funcs', array('params' => $params, 'content' => $adcontent), $adfunc);
	}
	return $_G['setting']['pluginhooks'][$adfunc] === null ? $adcontent : $_G['setting']['pluginhooks'][$adfunc];
}

/**
 * 显示提示信息
 * @param $message - 提示信息，可中文也可以是 lang_message.php 中的数组 key 值
 * @param $url_forward - 提示后跳转的 url
 * @param $values - 提示信息中可替换的变量值 array(key => value ...) 形式
 * @param $extraparam - 扩展参数 array(key => value ...) 形式
 *	跳转控制
		header		header跳转
		location	location JS 跳转，限于 msgtype = 2、3
		timeout		定时跳转
		refreshtime	自定义跳转时间
		closetime	自定义关闭时间，限于 msgtype = 2，值为 true 时为默认
		locationtime	自定义跳转时间，限于 msgtype = 2，值为 true 时为默认
	内容控制
		alert		alert 图标样式 right/info/error
		return		显示请返回
		redirectmsg	下载时用的提示信息，当跳转时显示的信息样式
 					0:如果您的浏览器没有自动跳转，请点击此链接
 					1:如果 n 秒后下载仍未开始，请点击此链接
		msgtype		信息样式
 					1:非 Ajax
 					2:Ajax 弹出框
 					3:Ajax 只显示信息文本
		showmsg		显示信息文本
		showdialog	关闭原弹出框显示 showDialog 信息，限于 msgtype = 2
		login		未登录时显示登录链接
		extrajs		扩展 js
		striptags	过滤 HTML 标记
	Ajax 控制
		handle		执行 js 回调函数
		showid		控制显示的对象 ID
 */
function showmessage($message, $url_forward = '', $values = array(), $extraparam = array(), $custom = 0) {
	require_once libfile('function/message');
	return dshowmessage($message, $url_forward, $values, $extraparam, $custom);
}

/**
* 检查是否正确提交了表单
* @param $var 需要检查的变量
* @param $allowget 是否允许GET方式
* @param $seccodecheck 验证码检测是否开启
* @return 返回是否正确提交了表单
*/
function submitcheck($var, $allowget = 0, $seccodecheck = 0, $secqaacheck = 0) {
	if(!getgpc($var)) {
		return FALSE;
	} else {
		return helper_form::submitcheck($var, $allowget, $seccodecheck, $secqaacheck);
	}
}

/**
* 分页
* @param $num - 总数
* @param $perpage - 每页数
* @param $curpage - 当前页
* @param $mpurl - 跳转的路径
* @param $maxpages - 允许显示的最大页数
* @param $page - 最多显示多少页码
* @param $autogoto - 最后一页，自动跳转
* @param $simple - 是否简洁模式（简洁模式不显示上一页、下一页和页码跳转）
* @return 返回分页代码
*/
function multi($num, $perpage, $curpage, $mpurl, $maxpages = 0, $page = 10, $autogoto = FALSE, $simple = FALSE, $jsfunc = FALSE) {
	return $num > $perpage ? helper_page::multi($num, $perpage, $curpage, $mpurl, $maxpages, $page, $autogoto, $simple, $jsfunc) : '';
}

/**
* 只有上一页下一页的分页（无需知道数据总数）
* @param $num - 本次所取数据条数
* @param $perpage - 每页数
* @param $curpage - 当前页
* @param $mpurl - 跳转的路径
* @return 返回分页代码
*/
function simplepage($num, $perpage, $curpage, $mpurl) {
	return helper_page::simplepage($num, $perpage, $curpage, $mpurl);
}

/**
 * 词语过滤
 * @param $message - 词语过滤文本
 * @return 成功返回原始文本，否则提示错误或被替换
 */
function censor($message, $modword = NULL, $return = FALSE) {
	return helper_form::censor($message, $modword, $return);
}

/**
	词语过滤，检测是否含有需要审核的词
*/
function censormod($message) {
	return getglobal('group/ignorecensor') || !$message ? false :helper_form::censormod($message);
}

//获取用户附属表信息，累加到第一个变量$values
function space_merge(&$values, $tablename, $isarchive = false) {
	global $_G;

	$uid = empty($values['uid'])?$_G['uid']:$values['uid'];//默认当前用户
	$var = "member_{$uid}_{$tablename}";
	if($uid) {
		if(!isset($_G[$var])) {
			$ext = $isarchive ? '_archive' : '';
			if(($_G[$var] = C::t('common_member_'.$tablename.$ext)->fetch($uid)) !== false) {
				if($tablename == 'field_home') {
					//隐私设置
					$_G['setting']['privacy'] = empty($_G['setting']['privacy']) ? array() : (is_array($_G['setting']['privacy']) ? $_G['setting']['privacy'] : dunserialize($_G['setting']['privacy']));
					$_G[$var]['privacy'] = empty($_G[$var]['privacy'])? array() : is_array($_G[$var]['privacy']) ? $_G[$var]['privacy'] : dunserialize($_G[$var]['privacy']);
					foreach (array('feed','view','profile') as $pkey) {
						if(empty($_G[$var]['privacy'][$pkey]) && !isset($_G[$var]['privacy'][$pkey])) {
							$_G[$var]['privacy'][$pkey] = isset($_G['setting']['privacy'][$pkey]) ? $_G['setting']['privacy'][$pkey] : array();//取站点默认设置
						}
					}
					//邮件提醒
					$_G[$var]['acceptemail'] = empty($_G[$var]['acceptemail'])? array() : dunserialize($_G[$var]['acceptemail']);
					if(empty($_G[$var]['acceptemail'])) {
						$_G[$var]['acceptemail'] = empty($_G['setting']['acceptemail'])?array():dunserialize($_G['setting']['acceptemail']);
					}
				}
			} else {
				C::t('common_member_'.$tablename.$ext)->insert(array('uid'=>$uid));
				$_G[$var] = array();
			}
		}
		$values = array_merge($values, $_G[$var]);
	}
}

/*
 * 运行log记录
 */
function runlog($file, $message, $halt=0) {
	helper_log::runlog($file, $message, $halt);
}

/*
 * 处理搜索关键字
 */
function stripsearchkey($string) {
	$string = trim($string);
	$string = str_replace('*', '%', addcslashes($string, '%_'));
	return $string;
}

/*
 * 递归创建目录
 */
function dmkdir($dir, $mode = 0777, $makeindex = TRUE){
	if(!is_dir($dir)) {
		dmkdir(dirname($dir), $mode, $makeindex);
		@mkdir($dir, $mode);
		if(!empty($makeindex)) {
			@touch($dir.'/index.html'); @chmod($dir.'/index.html', 0777);
		}
	}
	return true;
}

/**
* 刷新重定向
*/
function dreferer($default = '') {
	global $_G;

	$default = empty($default) && $_ENV['curapp'] ? $_ENV['curapp'].'.php' : '';
	$_G['referer'] = !empty($_GET['referer']) ? $_GET['referer'] : $_SERVER['HTTP_REFERER'];
	$_G['referer'] = substr($_G['referer'], -1) == '?' ? substr($_G['referer'], 0, -1) : $_G['referer'];

	if(strpos($_G['referer'], 'member.php?mod=logging')) {
		$_G['referer'] = $default;
	}

	$reurl = parse_url($_G['referer']);
	/**
	 * 判断host是否相同，不同时做进一步的校验
	 * 当解析到的host与HTTP_HOST，相同的，不管是不是加www均给予放行
	 */
	if(!empty($reurl['host']) && !in_array($reurl['host'], array($_SERVER['HTTP_HOST'], 'www.'.$_SERVER['HTTP_HOST'])) && !in_array($_SERVER['HTTP_HOST'], array($reurl['host'], 'www.'.$reurl['host']))) {
		//校验是否在应用域名或版块域名配置中
		if(!in_array($reurl['host'], $_G['setting']['domain']['app']) && !isset($_G['setting']['domain']['list'][$reurl['host']])) {
			$domainroot = substr($reurl['host'], strpos($reurl['host'], '.')+1);
			//是否为子域名，如果不为子域名则跳到index.php
			if(empty($_G['setting']['domain']['root']) || (is_array($_G['setting']['domain']['root']) && !in_array($domainroot, $_G['setting']['domain']['root']))) {
				$_G['referer'] = $_G['setting']['domain']['defaultindex'] ? $_G['setting']['domain']['defaultindex'] : 'index.php';
			}
		}
	} elseif(empty($reurl['host'])) {
		$_G['referer'] = $_G['siteurl'].'./'.$_G['referer'];
	}

	$_G['referer'] = durlencode($_G['referer']);
	return$_G['referer'];
}

/**
 * 远程FTP使用
 */
function ftpcmd($cmd, $arg1 = '') {
	static $ftp;
	$ftpon = getglobal('setting/ftp/on');
	if(!$ftpon) {
		return $cmd == 'error' ? -101 : 0;
	} elseif($ftp == null) {
		$ftp = & discuz_ftp::instance();
	}
	if(!$ftp->enabled) {
		return $ftp->error();
	} elseif($ftp->enabled && !$ftp->connectid) {
		$ftp->connect();
	}
	switch ($cmd) {
		case 'upload' : return $ftp->upload(getglobal('setting/attachdir').'/'.$arg1, $arg1); break;
		case 'delete' : return $ftp->ftp_delete($arg1); break;
		case 'close'  : return $ftp->ftp_close(); break;
		case 'error'  : return $ftp->error(); break;
		case 'object' : return $ftp; break;
		default       : return false;
	}

}

/**
 * 编码转换
 * @param <string> $str 要转码的字符
 * @param <string> $in_charset 输入字符集
 * @param <string> $out_charset 输出字符集(默认当前)
 * @param <boolean> $ForceTable 强制使用码表(默认不强制)
 *
 */
function diconv($str, $in_charset, $out_charset = CHARSET, $ForceTable = FALSE) {
	global $_G;

	$in_charset = strtoupper($in_charset);
	$out_charset = strtoupper($out_charset);

	if(empty($str) || $in_charset == $out_charset) {
		return $str;
	}

	$out = '';

	if(!$ForceTable) {
		if(function_exists('iconv')) {
			$out = iconv($in_charset, $out_charset.'//IGNORE', $str);
		} elseif(function_exists('mb_convert_encoding')) {
			$out = mb_convert_encoding($str, $out_charset, $in_charset);
		}
	}

	if($out == '') {
		$chinese = new Chinese($in_charset, $out_charset, true);
		$out = $chinese->Convert($str);
	}

	return $out;
}

function widthauto() {
	global $_G;
	if($_G['disabledwidthauto']) {
		return 0;
	}
	if(!empty($_G['widthauto'])) {
		return $_G['widthauto'] > 0 ? 1 : 0;
	}
	if($_G['setting']['switchwidthauto'] && !empty($_G['cookie']['widthauto'])) {
		return $_G['cookie']['widthauto'] > 0 ? 1 : 0;
	} else {
		return $_G['setting']['allowwidthauto'] ? 0 : 1;
	}
}
/**
 * 重建数组
 * @param <string> $array 需要反转的数组
 * @return array 原数组与的反转后的数组
 */
function renum($array) {
	$newnums = $nums = array();
	foreach ($array as $id => $num) {
		$newnums[$num][] = $id;
		$nums[$num] = $num;
	}
	return array($nums, $newnums);
}

/**
* 字节格式化单位
* @param $filesize - 大小(字节)
* @return 返回格式化后的文本
*/
function sizecount($size) {
	if($size >= 1073741824) {
		$size = round($size / 1073741824 * 100) / 100 . ' GB';
	} elseif($size >= 1048576) {
		$size = round($size / 1048576 * 100) / 100 . ' MB';
	} elseif($size >= 1024) {
		$size = round($size / 1024 * 100) / 100 . ' KB';
	} else {
		$size = intval($size) . ' Bytes';
	}
	return $size;
}

function swapclass($class1, $class2 = '') {
	static $swapc = null;
	$swapc = isset($swapc) && $swapc != $class1 ? $class1 : $class2;
	return $swapc;
}

/**
 * 写入运行日志
 */
function writelog($file, $log) {
	helper_log::writelog($file, $log);
}

/**
 * 取得某标志位的数值 （0|1）
 *
 * @param 数值 $status
 * @param 位置 $position
 * @return 0 | 1
 */
function getstatus($status, $position) {
	$t = $status & pow(2, $position - 1) ? 1 : 0;
	return $t;
}

/**
 * 设置某一bit位的数值 0 or 1
 *
 * @param int $position  1-16
 * @param int $value  0|1
 * @param 原始数值 $baseon  0x0000-0xffff
 * @return int
 */
function setstatus($position, $value, $baseon = null) {
	$t = pow(2, $position - 1);
	if($value) {
		$t = $baseon | $t;
	} elseif ($baseon !== null) {
		$t = $baseon & ~$t;
	} else {
		$t = ~$t;
	}
	return $t & 0xFFFF;
}

/**
 * 通知
 * @param Integer $touid: 通知给谁
 * @param String $type: 通知类型
 * @param String $note: 语言key
 * @param Array $notevars: 语言变量对应的值
 * @param Integer $system: 是否为系统通知 0:非系统通知; 1:系统通知
 */
function notification_add($touid, $type, $note, $notevars = array(), $system = 0) {
	return helper_notification::notification_add($touid, $type, $note, $notevars, $system);
}

/**
* 发送管理通知
* @param $type - 通知类型
*/
function manage_addnotify($type, $from_num = 0, $langvar = array()) {
	helper_notification::manage_addnotify($type, $from_num, $langvar);
}

/**
* 发送短消息（兼容提醒）
* @param $toid - 接收方id
* @param $subject - 标题
* @param $message - 内容
* @param $fromid - 发送方id
*/
function sendpm($toid, $subject, $message, $fromid = '', $replypmid = 0, $isusername = 0, $type = 0) {
	return helper_pm::sendpm($toid, $subject, $message, $fromid, $replypmid, $isusername, $type);
}

//获得用户组图标
function g_icon($groupid, $return = 0) {
	global $_G;
	if(empty($_G['cache']['usergroups'][$groupid]['icon'])) {
		$s =  '';
	} else {
		if(substr($_G['cache']['usergroups'][$groupid]['icon'], 0, 5) == 'http:') {
			$s = '<img src="'.$_G['cache']['usergroups'][$groupid]['icon'].'" alt="" class="vm" />';
		} else {
			$s = '<img src="'.$_G['setting']['attachurl'].'common/'.$_G['cache']['usergroups'][$groupid]['icon'].'" alt="" class="vm" />';
		}
	}
	if($return) {
		return $s;
	} else {
		echo $s;
	}
}
//从数据库中更新DIY模板文件
function updatediytemplate($targettplname = '', $tpldirectory = '') {
	$r = false;
	$alldata = !empty($targettplname) ? array( C::t('common_diy_data')->fetch($targettplname, $tpldirectory)) : C::t('common_diy_data')->range();
	require_once libfile('function/portalcp');
	foreach($alldata as $value) {
		$r = save_diy_data($value['tpldirectory'], $value['primaltplname'], $value['targettplname'], dunserialize($value['diycontent']));
	}
	return $r;
}

//获得用户唯一串
function space_key($uid, $appid=0) {
	global $_G;
	return substr(md5($_G['setting']['siteuniqueid'].'|'.$uid.(empty($appid)?'':'|'.$appid)), 8, 16);
}


//note post分表相关函数
/**
 *
 * 通过tid得到相应的单一post表名或post表集合
 * @param <mix> $tids: 允许传进单个tid，也可以是tid集合
 * @param $primary: 是否只查主题表 0:遍历所有表;1:只查主表
 * @return 当传进来的是单一的tid将直接返回表名，否则返回表集合的二维数组例:array('forum_post' => array(tids),'forum_post_1' => array(tids))
 * @TODO tid传进来的是字符串的，返回单个表名，传进来的是数组的，不管是不是一个数组，返回的还是数组，保证进出值对应
 */
function getposttablebytid($tids, $primary = 0) {
	return table_forum_post::getposttablebytid($tids, $primary);
}

/**
 * 获取论坛帖子表名
 * @param <int> $tableid: 分表ID，默认为：fourm_post表
 * @param <boolean> $prefix: 是否默认带有表前缀
 * @return forum_post or forum_post_*
 */
function getposttable($tableid = 0, $prefix = false) {
	return table_forum_post::getposttable($tableid, $prefix);
}

/**
 * 内存读写接口函数
 * <code>
 * memory('get', 'keyname') === false;//缓存中没有这个keyname时结果为true
 * </code>
 *  * @param 命令 $cmd (set|get|rm|check|inc|dec)
 * @param 键值 $key
 * @param 数据 $value 当$cmd=get|rm时，$value即为$prefix；当$cmd=inc|dec时，$value为$step，默认为1
 * @param 有效期 $ttl
 * @param 键值的前缀 $prefix
 * @return mix
 *
 * @example set : 写入内存 $ret = memory('set', 'test', 'ok')
 * @example get : 读取内存 $data = memory('get', 'test')
 * @example rm : 删除内存  $ret = memory('rm', 'test')
 * @example check : 检查内存功能是否可用 $allow = memory('check')
 */
function memory($cmd, $key='', $value='', $ttl = 0, $prefix = '') {
	if($cmd == 'check') {
		return  C::memory()->enable ? C::memory()->type : '';
	} elseif(C::memory()->enable && in_array($cmd, array('set', 'get', 'rm', 'inc', 'dec'))) {
		if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG) {
			if(is_array($key)) {
				foreach($key as $k) {
					C::memory()->debug[$cmd][] = ($cmd == 'get' || $cmd == 'rm' ? $value : '').$prefix.$k;
				}
			} else {
				C::memory()->debug[$cmd][] = ($cmd == 'get' || $cmd == 'rm' ? $value : '').$prefix.$key;
			}
		}
		switch ($cmd) {
			case 'set': return C::memory()->set($key, $value, $ttl, $prefix); break;
			case 'get': return C::memory()->get($key, $value); break;
			case 'rm': return C::memory()->rm($key, $value); break;
			case 'inc': return C::memory()->inc($key, $value ? $value : 1); break;
			case 'dec': return C::memory()->dec($key, $value ? $value : -1); break;
		}
	}
	return null;
}

/**
* ip允许访问
* @param $ip 要检查的ip地址
* @param - $accesslist 允许访问的ip地址
* @param 返回结果
*/
function ipaccess($ip, $accesslist) {
	return preg_match("/^(".str_replace(array("\r\n", ' '), array('|', ''), preg_quote($accesslist, '/')).")/", $ip);
}

/**
* ip限制访问
* @param $ip 要检查的ip地址
* @param - $accesslist 允许访问的ip地址
* @param 返回结果
*/
function ipbanned($onlineip) {
	global $_G;

	if($_G['setting']['ipaccess'] && !ipaccess($onlineip, $_G['setting']['ipaccess'])) {
		return TRUE;
	}

	loadcache('ipbanned');
	if(empty($_G['cache']['ipbanned'])) {
		return FALSE;
	} else {
		if($_G['cache']['ipbanned']['expiration'] < TIMESTAMP) {
			require_once libfile('function/cache');
			updatecache('ipbanned');
		}
		return preg_match("/^(".$_G['cache']['ipbanned']['regexp'].")$/", $onlineip);
	}
}

//获得统计数
function getcount($tablename, $condition) {
	if(empty($condition)) {
		$where = '1';
	} elseif(is_array($condition)) {
		$where = DB::implode_field_value($condition, ' AND ');
	} else {
		$where = $condition;
	}
	$ret = intval(DB::result_first("SELECT COUNT(*) AS num FROM ".DB::table($tablename)." WHERE $where"));
	return $ret;
}

/**
 * 系统级消息
 */
function sysmessage($message) {
	helper_sysmessage::show($message);
}

/**
* 论坛权限
* @param $permstr - 权限信息
* @param $groupid - 只判断用户组
* @return 0 无权限 > 0 有权限
*/
function forumperm($permstr, $groupid = 0) {
	global $_G;

	$groupidarray = array($_G['groupid']);
	if($groupid) {
		return preg_match("/(^|\t)(".$groupid.")(\t|$)/", $permstr);
	}
	foreach(explode("\t", $_G['member']['extgroupids']) as $extgroupid) {
		if($extgroupid = intval(trim($extgroupid))) {
			$groupidarray[] = $extgroupid;
		}
	}
	if($_G['setting']['verify']['enabled']) {
		getuserprofile('verify1');
		foreach($_G['setting']['verify'] as $vid => $verify) {
			if($verify['available'] && $_G['member']['verify'.$vid] == 1) {
				$groupidarray[] = 'v'.$vid;
			}
		}
	}
	return preg_match("/(^|\t)(".implode('|', $groupidarray).")(\t|$)/", $permstr);
}

//检查权限
function checkperm($perm) {
	global $_G;
	return defined('IN_ADMINCP') ? true : (empty($_G['group'][$perm])?'':$_G['group'][$perm]);
}

/**
* 时间段设置检测
* @param $periods - 那种时间段 $settings[$periods]  $settings['postbanperiods'] $settings['postmodperiods']
* @param $showmessage - 是否提示信息
* @return 返回检查结果
*/
function periodscheck($periods, $showmessage = 1) {
	global $_G;
	if(($periods == 'postmodperiods' || $periods == 'postbanperiods') && ($_G['setting']['postignorearea'] || $_G['setting']['postignoreip'])) {
		if($_G['setting']['postignoreip']) {
			foreach(explode("\n", $_G['setting']['postignoreip']) as $ctrlip) {
				if(preg_match("/^(".preg_quote(($ctrlip = trim($ctrlip)), '/').")/", $_G['clientip'])) {
					return false;
					break;
				}
			}
		}
		if($_G['setting']['postignorearea']) {
			$location = $whitearea = '';
			require_once libfile('function/misc');
			$location = trim(convertip($_G['clientip'], "./"));
			if($location) {
				$whitearea = preg_quote(trim($_G['setting']['postignorearea']), '/');
				$whitearea = str_replace(array("\\*"), array('.*'), $whitearea);
				$whitearea = '.*'.$whitearea.'.*';
				$whitearea = '/^('.str_replace(array("\r\n", ' '), array('.*|.*', ''), $whitearea).')$/i';
				if(@preg_match($whitearea, $location)) {
					return false;
				}
			}
		}
	}
	if(!$_G['group']['disableperiodctrl'] && $_G['setting'][$periods]) {
		$now = dgmdate(TIMESTAMP, 'G.i', $_G['setting']['timeoffset']);
		foreach(explode("\r\n", str_replace(':', '.', $_G['setting'][$periods])) as $period) {
			list($periodbegin, $periodend) = explode('-', $period);
			if(($periodbegin > $periodend && ($now >= $periodbegin || $now < $periodend)) || ($periodbegin < $periodend && $now >= $periodbegin && $now < $periodend)) {
				$banperiods = str_replace("\r\n", ', ', $_G['setting'][$periods]);
				if($showmessage) {
					showmessage('period_nopermission', NULL, array('banperiods' => $banperiods), array('login' => 1));
				} else {
					return TRUE;
				}
			}
		}
	}
	return FALSE;
}

//新用户发言
function cknewuser($return=0) {
	global $_G;

	$result = true;

	if(!$_G['uid']) return true;

	//不受防灌水限制
	if(checkperm('disablepostctrl')) {
		return $result;
	}
	$ckuser = $_G['member'];

	//见习时间
	if($_G['setting']['newbiespan'] && $_G['timestamp']-$ckuser['regdate']<$_G['setting']['newbiespan']*60) {
		if(empty($return)) showmessage('no_privilege_newbiespan', '', array('newbiespan' => $_G['setting']['newbiespan']), array());
		$result = false;
	}
	//需要上传头像
	if($_G['setting']['need_avatar'] && empty($ckuser['avatarstatus'])) {
		if(empty($return)) showmessage('no_privilege_avatar', '', array(), array());
		$result = false;
	}
	//强制新用户激活邮箱
	if($_G['setting']['need_email'] && empty($ckuser['emailstatus'])) {
		if(empty($return)) showmessage('no_privilege_email', '', array(), array());
		$result = false;
	}
	//强制新用户好友个数
	if($_G['setting']['need_friendnum']) {
		space_merge($ckuser, 'count');
		if($ckuser['friends'] < $_G['setting']['need_friendnum']) {
			if(empty($return)) showmessage('no_privilege_friendnum', '', array('friendnum' => $_G['setting']['need_friendnum']), array());
			$result = false;
		}
	}
	return $result;
}

function manyoulog($logtype, $uids, $action, $fid = '') {
	helper_manyou::manyoulog($logtype, $uids, $action, $fid);
}

/**
 * 用户操作日志
 * @param int $uid 用户ID
 * @param string $action 操作类型 tid=thread pid=post blogid=blog picid=picture doid=doing sid=share aid=article uid_cid/blogid_cid/sid_cid/picid_cid/aid_cid/topicid_cid=comment
 * @return bool
 */
function useractionlog($uid, $action) {
	return helper_log::useractionlog($uid, $action);
}

/**
 * 得到用户操作的代码或代表字符，参数为数字返回字符串，参数为字符串返回数字
 * @param string/int $var
 * @return int/string 注意：如果失败返回false，请使用===判断，因为代码0代表tid
 */
function getuseraction($var) {
	return helper_log::getuseraction($var);
}

/**
 * 获取我的中心中展示的应用
 */
function getuserapp($panel = 0) {
	return helper_manyou::getuserapp($panel);
}

/**
 * 获取manyou应用本地图标路径
 * @param <type> $appid
 */
function getmyappiconpath($appid, $iconstatus=0) {
	return helper_manyou::getmyappiconpath($appid, $iconstatus);
}

//获取超时时间
function getexpiration() {
	global $_G;
	$date = getdate($_G['timestamp']);
	return mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']) + 86400;
}

function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val{strlen($val)-1});
    switch($last) {
        case 'g': $val *= 1024;
        case 'm': $val *= 1024;
        case 'k': $val *= 1024;
    }
    return $val;
}

function iswhitelist($host) {
	global $_G;
	static $iswhitelist = array();

	if(isset($iswhitelist[$host])) {
		return $iswhitelist[$host];
	}
	$hostlen = strlen($host);
	$iswhitelist[$host] = false;
	if(!$_G['cache']['domainwhitelist']) {
		loadcache('domainwhitelist');
	}
	if(is_array($_G['cache']['domainwhitelist'])) foreach($_G['cache']['domainwhitelist'] as $val) {
		$domainlen = strlen($val);
		if($domainlen > $hostlen) {
			continue;
		}
		if(substr($host, -$domainlen) == $val) {
			$iswhitelist[$host] = true;
			break;
		}
	}
	if($iswhitelist[$host] == false) {
		$iswhitelist[$host] = $host == $_SERVER['HTTP_HOST'];
	}
	return $iswhitelist[$host];
}

/**
 * 通过 AID 获取附件表名
 * @param <int> $aid
 */
function getattachtablebyaid($aid) {
	$attach = C::t('forum_attachment')->fetch($aid);
	$tableid = $attach['tableid'];
	return 'forum_attachment_'.($tableid >= 0 && $tableid < 10 ? intval($tableid) : 'unused');
}

/**
 * 返回指定 TID 所对应的附件表编号
 * @param <int> $tid
 */
function getattachtableid($tid) {
	$tid = (string)$tid;
	return intval($tid{strlen($tid)-1});
}

/**
 * 通过 TID 获取附件表名
 * @param <int> $tid
 */
function getattachtablebytid($tid) {
	return 'forum_attachment_'.getattachtableid($tid);
}

/**
 * 通过 PID 获取附件表名
 * @param <int> $pid
 */
function getattachtablebypid($pid) {
	$tableid = DB::result_first("SELECT tableid FROM ".DB::table('forum_attachment')." WHERE pid='$pid' LIMIT 1");
	return 'forum_attachment_'.($tableid >= 0 && $tableid < 10 ? intval($tableid) : 'unused');
}

/**
 * 添加一个新的附件索引记录，并返回新附件 ID
 * @param <int> $uid
 */
function getattachnewaid($uid = 0) {
	global $_G;
	$uid = !$uid ? $_G['uid'] : $uid;
	return C::t('forum_attachment')->insert(array('tid' => 0, 'pid' => 0, 'uid' => $uid, 'tableid' => 127), true);
}

/**
 * 获取 SEO设置
 * @param string $page 调用哪个页面的
 * @param array $data 可替换数据
 * @return array('seotitle', 'seodescription', 'seokeywords')
 */
function get_seosetting($page, $data = array(), $defset = array()) {
	return helper_seo::get_seosetting($page, $data, $defset);
}

/**
 *
 * 生成缩略图文件名
 * @param String $fileStr: 原文件名,允许附带路径
 * @param String $extend: 新文件名后缀
 * @param Boolean $holdOldExt: 是否保留原扩展名
 * @return 返加新的后缀文件名
 */
function getimgthumbname($fileStr, $extend='.thumb.jpg', $holdOldExt=true) {
	if(empty($fileStr)) {
		return '';
	}
	//去掉原扩展名
	if(!$holdOldExt) {
		$fileStr = substr($fileStr, 0, strrpos($fileStr, '.'));
	}
	$extend = strstr($extend, '.') ? $extend : '.'.$extend;
	return $fileStr.$extend;
}

/**
 * 更新数据的审核状态
 * @param <string> $idtype 数据类型 tid=thread pid=post blogid=blog picid=picture doid=doing sid=share aid=article uid_cid/blogid_cid/sid_cid/picid_cid/aid_cid/topicid_cid=comment
 * @param <array/int> $ids ID 数组、ID 值
 * @param <int> $status 状态 0=加入审核(默认) 1=忽略审核 2=审核通过
 */
function updatemoderate($idtype, $ids, $status = 0) {
	helper_form::updatemoderate($idtype, $ids, $status);
}

/**
 * 显示漫游应用公告
 */
function userappprompt() {
	global $_G;

	if($_G['setting']['my_app_status'] && $_G['setting']['my_openappprompt'] && empty($_G['cookie']['userappprompt'])) {
		$sid = $_G['setting']['my_siteid'];
		$ts = $_G['timestamp'];
		$key = md5($sid.$ts.$_G['setting']['my_sitekey']);
		$uchId = $_G['uid'] ? $_G['uid'] : 0;
		echo '<script type="text/javascript" src="http://notice.uchome.manyou.com/notice/userNotice?sId='.$sid.'&ts='.$ts.'&key='.$key.'&uchId='.$uchId.'" charset="UTF-8"></script>';
	}
}

/**
 * 安全的 intval， 可以支持 int(10) unsigned
 * 支持最大整数 0xFFFFFFFF 4294967295
 * @param mixed $int string|int|array
 * @return mixed
 */
function dintval($int, $allowarray = false) {
	$ret = intval($int);
	if($int == $ret || !$allowarray && is_array($int)) return $ret;
	if($allowarray && is_array($int)) {
		foreach($int as &$v) {
			$v = dintval($v, true);
		}
		return $int;
	} elseif($int <= 0xffffffff) {
		$l = strlen($int);
		$m = substr($int, 0, 1) == '-' ? 1 : 0;
		if(($l - $m) === strspn($int,'0987654321', $m)) {
			return $int;
		}
	}
	return $ret;
}


function makeSearchSignUrl() {
	return getglobal('setting/my_search_data/status') ? helper_manyou::makeSearchSignUrl() : array();
}

/**
 * 获取批定类型的关联连接
 *
 * @param string $extent 内容所需关联链接范围　article, forum, group, blog
 * @return string 有效的关联链接
 */
function get_related_link($extent) {
	return helper_seo::get_related_link($extent);
}

/**
 * 在给定内容中加入关联连接
 *
 * @param string $content 需要加入关联链接的内容
 * @param string $extent 内容所需关联链接范围　article, forum, group, blog
 * @return string 变更后的内容
 */
function parse_related_link($content, $extent) {
	return helper_seo::parse_related_link($content, $extent);
}

function check_diy_perm($topic = array(), $flag = '') {
	static $ret;
	if(!isset($ret)) {
		global $_G;
		$common = !empty($_G['style']['tplfile']) || $_GET['inajax'];
		$blockallow = getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 5) || getstatus($_G['member']['allowadmincp'], 6);
		$ret['data'] = $common && $blockallow;
		$ret['layout'] = $common && ($_G['group']['allowdiy'] || (
				CURMODULE === 'topic' && ($_G['group']['allowmanagetopic'] || $_G['group']['allowaddtopic'] && $topic && $topic['uid'] == $_G['uid'])
				));
	}
	return empty($flag) ? $ret['data'] || $ret['layout'] : $ret[$flag];
}

function strhash($string, $operation = 'DECODE', $key = '') {
	$key = md5($key != '' ? $key : getglobal('authkey'));
	if($operation == 'DECODE') {
		$hashcode = gzuncompress(base64_decode(($string)));
		$string = substr($hashcode, 0, -16);
		$hash = substr($hashcode, -16);
		unset($hashcode);
	}

	$vkey = substr(md5($string.substr($key, 0, 16)), 4, 8).substr(md5($string.substr($key, 16, 16)), 18, 8);

	if($operation == 'DECODE') {
		return $hash == $vkey ? $string : '';
	}

	return base64_encode(gzcompress($string.$vkey));
}

function fixurl($url) {
	static $fix = array( '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
	static $replacements = array( ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
	return str_replace($fix, $replacements, urlencode($url));
}

function dunserialize($data) {
	if(($ret = unserialize($data)) === false) {
		$ret = unserialize(stripslashes($data));
	}
	return $ret;
}

function browserversion($type) {
	static $return = array();
	static $types = array('ie' => 'msie', 'firefox' => '', 'chrome' => '', 'opera' => '', 'safari' => '', 'mozilla' => '', 'webkit' => '', 'maxthon' => '', 'qq' => 'qqbrowser');
	if(!$return) {
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$other = 1;
		foreach($types as $i => $v) {
			$v = $v ? $v : $i;
			if(strpos($useragent, $v) !== false) {
				preg_match('/'.$v.'(\/|\s)([\d\.]+)/i', $useragent, $matches);
				$ver = $matches[2];
				$other = $ver !== 0 && $v != 'mozilla' ? 0 : $other;
			} else {
				$ver = 0;
			}
			$return[$i] = $ver;
		}
		$return['other'] = $other;
	}
	return $return[$type];
}

function currentlang() {
	$charset = strtoupper(CHARSET);
	if($charset == 'GBK') {
		return 'SC_GBK';
	} elseif($charset == 'BIG5') {
		return 'TC_BIG5';
	} elseif($charset == 'UTF-8') {
		global $_G;
		if($_G['config']['output']['language'] == 'zh_cn') {
			return 'SC_UTF8';
		} elseif ($_G['config']['output']['language'] == 'zh_tw') {
			return 'TC_UTF8';
		}
	} else {
		return '';
	}
}

//Detect User Preferred Language from Browser
function detect_language() {
	global $_G;

	$default = strtolower($_G['config']['output']['language']);
	
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {

		$langs = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

		//start going through each one
		foreach ($langs as $value){
			// zh-tw/zh-hk patch by ken
			$value = strtolower($value);
			if(($value=='zh-tw')||($value=='zh-hk')){
				$choice = 'tc';
			} else {
				$choice = substr($value,0,2);
				if($choice=='zh') $choice = 'zh-cn';
			}
			if(isset($_G['config']['languages'][$choice])){
				return $choice;
			}
		}
	} 
	return $default;
}
/*
 * 尽量不要在此文件中添加全局函数
 * 请在source/class/helper/目录下创建相应的静态函数集类文件
 * 类的静态方法可以在产品中所有地方使用，使用方法类似：helper_form::submitcheck()
 *
 */

?>