<?php
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
$canshu = $_SERVER ["QUERY_STRING"];
if ($canshu == "") {
	die ( "文件不存在" );
} else {
	$wangzhi = "http://pan.baidu.com/share/link?" . $canshu;
	$file = file_get_contents ( $wangzhi );
	$start = strpos ( $file, '<meta content="文件名:' );
	$end = strpos ( $file, '文件大小', $start + 7 );
	$return = substr ( $file, $start + 25, $end - $start - 26 );
	echo urlencode(trim($return));
}

function getonlineip($format = 0) {
	global $_SGLOBAL;
	if (empty ( $_SGLOBAL ['onlineip'] )) {
		if (getenv ( 'HTTP_CLIENT_IP' ) && strcasecmp ( getenv ( 'HTTP_CLIENT_IP' ), 'unknown' )) {
			$onlineip = getenv ( 'HTTP_CLIENT_IP' );
		} elseif (getenv ( 'HTTP_X_FORWARDED_FOR' ) && strcasecmp ( getenv ( 'HTTP_X_FORWARDED_FOR' ), 'unknown' )) {
			$onlineip = getenv ( 'HTTP_X_FORWARDED_FOR' );
		} elseif (getenv ( 'REMOTE_ADDR' ) && strcasecmp ( getenv ( 'REMOTE_ADDR' ), 'unknown' )) {
			$onlineip = getenv ( 'REMOTE_ADDR' );
		} elseif (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], 'unknown' )) {
			$onlineip = $_SERVER ['REMOTE_ADDR'];
		}
		preg_match ( "/[\d\.]{7,15}/", $onlineip, $onlineipmatches );
		$_SGLOBAL ['onlineip'] = $onlineipmatches [0] ? $onlineipmatches [0] : 'unknown';
	}
	if ($format) {
		$ips = explode ( '.', $_SGLOBAL ['onlineip'] );
		for($i = 0; $i < 3; $i ++) {
			$ips [$i] = intval ( $ips [$i] );
		}
		return sprintf ( '%03d%03d%03d', $ips [0], $ips [1], $ips [2] );
	} else {
		return $_SGLOBAL ['onlineip'];
	}
}
