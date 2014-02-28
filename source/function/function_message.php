<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_message.php 32580 2013-02-22 03:40:28Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
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
 		break		函数终止 (为嵌入点而设计)
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
function dshowmessage($message, $url_forward = '', $values = array(), $extraparam = array(), $custom = 0) {
	global $_G, $show_message;
	$_G['messageparam'] = func_get_args();
	if(empty($_G['inhookscript']) && defined('CURMODULE')) {
		hookscript(CURMODULE, $_G['basescript'], 'messagefuncs', array('param' => $_G['messageparam']));
	}
	if($extraparam['break']) {
		return;
	}
	$_G['inshowmessage'] = true;

	//note 初始参数
	$param = array(
		'header'	=> false,
		'timeout'	=> null,
		'refreshtime'	=> null,
		'closetime'	=> null,
		'locationtime'	=> null,
		'alert'		=> null,
		'return'	=> false,
		'redirectmsg'	=> 0,
		'msgtype'	=> 1,
		'showmsg'	=> true,
		'showdialog'	=> false,
		'login'		=> false,
		'handle'	=> false,
		'extrajs'	=> '',
		'striptags'	=> true,
	);

	$navtitle = lang('core', 'title_board_message');

	if($custom) {
		$alerttype = 'alert_info';
		$show_message = $message;
		include template('common/showmessage');
		dexit();
	}

	define('CACHE_FORBIDDEN', TRUE);
	$_G['setting']['msgforward'] = @dunserialize($_G['setting']['msgforward']);
	$handlekey = $leftmsg = '';

	//noteX 强制手机客户端访问不使用ajax(IN_MOBILE)
	//在mobile提交过来的信息对showmessage中的$url_forward添加mobile=yes
	if(defined('IN_MOBILE')) {
		unset($extraparam['showdialog']);
		unset($extraparam['closetime']);
		unset($extraparam['extrajs']);

		if(!$url_forward && dreferer() && IN_MOBILE == 1) {
			$url_forward = $referer = dreferer();
		}
		if(!empty($url_forward) && strpos($url_forward, 'mobile') === false) {
			$url_forward_arr = explode("#", $url_forward);
			if(strpos($url_forward_arr[0], '?') !== false) {
				$url_forward_arr[0] = $url_forward_arr[0].'&mobile='.IN_MOBILE;
			} else {
				$url_forward_arr[0] = $url_forward_arr[0].'?mobile='.IN_MOBILE;
			}
			$url_forward = implode("#", $url_forward_arr);
		}
	}


	if(empty($_G['inajax']) && (!empty($_GET['quickforward']) || $_G['setting']['msgforward']['quick'] && empty($extraparam['clean_msgforward']) && $_G['setting']['msgforward']['messages'] && @in_array($message, $_G['setting']['msgforward']['messages']))) {
		$param['header'] = true;
	}
	$_GET['handlekey'] = !empty($_GET['handlekey']) && preg_match('/^\w+$/', $_GET['handlekey']) ? $_GET['handlekey'] : '';
	if(!empty($_G['inajax'])) {
		$handlekey = $_GET['handlekey'] = !empty($_GET['handlekey']) ? dhtmlspecialchars($_GET['handlekey']) : '';
		$param['handle'] = true;
	}
	if(!empty($_G['inajax'])) {
		$param['msgtype'] = empty($_GET['ajaxmenu']) && (empty($_POST) || !empty($_GET['nopost'])) ? 2 : 3;
	}
	if($url_forward) {
		$param['timeout'] = true;
		if($param['handle'] && !empty($_G['inajax'])) {
			$param['showmsg'] = false;
		}
	}

	//note 函数参数
	foreach($extraparam as $k => $v) {
		$param[$k] = $v;
	}
	if(array_key_exists('set', $extraparam)) {
		$setdata = array('1' => array('msgtype' => 3));
		if($setdata[$extraparam['set']]) {
			foreach($setdata[$extraparam['set']] as $k => $v) {
				$param[$k] = $v;
			}
		}
	}

	$timedefault = intval($param['refreshtime'] === null ? $_G['setting']['msgforward']['refreshtime'] : $param['refreshtime']);
	if($param['timeout'] !== null) {
		$refreshsecond = !empty($timedefault) ? $timedefault : 3;
		$refreshtime = $refreshsecond * 1000;
	} else {
		$refreshtime = $refreshsecond = 0;
	}

	if($param['login'] && $_G['uid'] || $url_forward) {
		$param['login'] = false;
	}

	$param['header'] = $url_forward && $param['header'] ? true : false;

	if($_GET['ajaxdata'] === 'json') {
		$param['header'] = '';
	}

	if($param['header']) {
		header("HTTP/1.1 301 Moved Permanently");
		dheader("location: ".str_replace('&amp;', '&', $url_forward));
	}
	$url_forward_js = addslashes(str_replace('\\', '%27', $url_forward));
	if($param['location'] && !empty($_G['inajax'])) {
		include template('common/header_ajax');
		echo '<script type="text/javascript" reload="1">window.location.href=\''.$url_forward_js.'\';</script>';
		include template('common/footer_ajax');
		dexit();
	}

	$_G['hookscriptmessage'] = $message;
	$_G['hookscriptvalues'] = $values;
	$vars = explode(':', $message);
	if(count($vars) == 2) {
		$show_message = lang('plugin/'.$vars[0], $vars[1], $values);
	} else {
		$show_message = lang('message', $message, $values);
	}

	if(isset($_GET['ajaxdata'])) {
		if($_GET['ajaxdata'] === 'json') {
			helper_output::json(array('message' => $show_message, 'data' => $values));
		} else if($_GET['ajaxdata'] === 'html') {
			helper_output::html($show_message);
		}
	}

	if($_G['connectguest']) {
		$param['login'] = false;
		$param['alert'] = 'info';
		if (defined('IN_MOBILE')) {
			// 过滤掉手机版发帖无权限提示里的登录链接
			if ($message == 'postperm_login_nopermission_mobile') {
				$show_message = lang('plugin/qqconnect', 'connect_register_mobile_bind_error');
			}
			$show_message = str_replace(lang('forum/misc', 'connectguest_message_mobile_search'), lang('forum/misc', 'connectguest_message_mobile_replace'), $show_message);
		} else {
			$show_message = str_replace(lang('forum/misc', 'connectguest_message_search'), lang('forum/misc', 'connectguest_message_replace'), $show_message);
		}
		if ($message == 'group_nopermission') {
			$show_message = lang('plugin/qqconnect', 'connectguest_message_complete_or_bind');
		}
	}
	if($param['msgtype'] == 2 && $param['login']) {
		dheader('location: member.php?mod=logging&action=login&handlekey='.$handlekey.'&infloat=yes&inajax=yes&guestmessage=yes');
	}

	$show_jsmessage = str_replace("'", "\\'", $param['striptags'] ? strip_tags($show_message) : $show_message);

	if((!$param['showmsg'] || $param['showid']) && !defined('IN_MOBILE') ) {
		$show_message = '';
	}

	$allowreturn = !$param['timeout'] && !$url_forward && !$param['login'] || $param['return'] ? true : false;
	if($param['alert'] === null) {
		$alerttype = $url_forward ? (preg_match('/\_(succeed|success)$/', $message) ? 'alert_right' : 'alert_info') : ($allowreturn ? 'alert_error' : 'alert_info');
	} else {
		$alerttype = 'alert_'.$param['alert'];
	}

	$extra = '';
	if($param['showid']) {
		$extra .= 'if($(\''.$param['showid'].'\')) {$(\''.$param['showid'].'\').innerHTML = \''.$show_jsmessage.'\';}';
	}
	if($param['handle']) {
		$valuesjs = $comma = $subjs = '';
		foreach($values as $k => $v) {
			$v = daddslashes($v);
			if(is_array($v)) {
				$subcomma = '';
				foreach ($v as $subk => $subv) {
					$subjs .= $subcomma.'\''.$subk.'\':\''.$subv.'\'';
					$subcomma = ',';
				}
				$valuesjs .= $comma.'\''.$k.'\':{'.$subjs.'}';
			} else {
				$valuesjs .= $comma.'\''.$k.'\':\''.$v.'\'';
			}
			$comma = ',';
		}
		$valuesjs = '{'.$valuesjs.'}';
		if($url_forward) {
			$extra .= 'if(typeof succeedhandle_'.$handlekey.'==\'function\') {succeedhandle_'.$handlekey.'(\''.$url_forward_js.'\', \''.$show_jsmessage.'\', '.$valuesjs.');}';
		} else {
			$extra .= 'if(typeof errorhandle_'.$handlekey.'==\'function\') {errorhandle_'.$handlekey.'(\''.$show_jsmessage.'\', '.$valuesjs.');}';
		}
	}
	if($param['closetime'] !== null) {
		$param['closetime'] = $param['closetime'] === true ? $timedefault : $param['closetime'];
	}
	if($param['locationtime'] !== null) {
		$param['locationtime'] = $param['locationtime'] === true ? $timedefault : $param['locationtime'];
	}
	if($handlekey) {
		if($param['showdialog']) {
			$modes = array('alert_error' => 'alert', 'alert_right' => 'right', 'alert_info' => 'notice');
			$extra .= 'hideWindow(\''.$handlekey.'\');showDialog(\''.$show_jsmessage.'\', \''.$modes[$alerttype].'\', null, '.($param['locationtime'] !== null ? 'function () { window.location.href =\''.$url_forward_js.'\'; }' : 'null').', 0, null, null, null, null, '.($param['closetime'] ? $param['closetime'] : 'null').', '.($param['locationtime'] ? $param['locationtime'] : 'null').');';
			$param['closetime'] = null;
			$st = '';
			if($param['showmsg']) {
				$show_message = '';
			}
		}
		if($param['closetime'] !== null) {
			$extra .= 'setTimeout("hideWindow(\''.$handlekey.'\')", '.($param['closetime'] * 1000).');';
		}
	} else {
		$st = $param['locationtime'] !== null ?'setTimeout("window.location.href =\''.$url_forward_js.'\';", '.($param['locationtime'] * 1000).');' : '';
	}
	if(!$extra && $param['timeout'] && !defined('IN_MOBILE')) {
		$extra .= 'setTimeout("window.location.href =\''.$url_forward_js.'\';", '.$refreshtime.');';
	}
	$show_message .= $extra ? '<script type="text/javascript" reload="1">'.$extra.$st.'</script>' : '';
	$show_message .= $param['extrajs'] ? $param['extrajs'] : '';
	include template('common/showmessage');

	dexit();
}

?>