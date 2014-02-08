<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
define('NOROBOT', TRUE);
dheader('Content-Type: application/javascript');

$cvars = $_G['cache']['plugin']['torrent_info'];
if(function_exists('curl_multi_init') && $cvars['announce']) {
	$str = $_G['gp_str'] ? $_G['gp_str'] : $_G['gp_amp;str'];
	if(!empty($str) && isset($str)) {
		$cvars = $_G['cache']['plugin']['torrent_info'];
		$cvars['safe_key'] = isset($cvars['safe_key']{0}) ? md5($cvars['safe_key']) : NULL;

		$str = authcode($str, 'DECODE', $cvars['safe_key']);
		if(!empty($str) && isset($str)) {
			$str = json_decode($str, TRUE);
			include DISCUZ_ROOT.'./source/plugin/torrent_info/class_torrent.php';
			$getTorrent = new Torrent();
			$data = array_shift($getTorrent->scrape($str[1], $str[0], $str[2]));
			if(is_array($data)) {
				echo 'bt_callback(1, '.json_encode($data).')';
			} elseif(stripos($data, 'timeout')>0) {
				echo 'bt_callback(2, '.$str[2].')';
			} elseif(stripos($data, 'failed')>0) {
				preg_match('/\d+/', $data, $arr);
				echo 'bt_callback(3, '.$arr[0].')';
			} else {
				echo 'bt_callback(4)';
			}
		}
	}
} else {
	echo 'bt_callback(0)';
}
?>