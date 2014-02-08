<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_hux_weixin {

	function hux_weixin() {
		global $_G;
		$wxsetting = $_G['cache']['plugin']['hux_weixin'];
		$r = "<a href='javascript:;' onclick=\"showWindow('hux_weixin', 'plugin.php?id=hux_weixin:show','get',0);return false;\">".$wxsetting['pluginname']."</a>";
		return $r;
	}
	
	function global_cpnav_extra1() {
		global $_G;
		$wxsetting = $_G['cache']['plugin']['hux_weixin'];
		$linktype = $wxsetting['show'];
		if ($linktype == '1') {
			return $this->hux_weixin();
		} else {
			return '';
		}
	}

	function global_cpnav_extra2() {
		global $_G;
		$wxsetting = $_G['cache']['plugin']['hux_weixin'];
		$linktype = $wxsetting['show'];
		if ($linktype == '2') {
			return $this->hux_weixin();
		} else {
			return '';
		}
	}

	function global_footerlink() {
		global $_G;
		$wxsetting = $_G['cache']['plugin']['hux_weixin'];
		$linktype = $wxsetting['show'];
		if ($linktype == '4') {
			return $this->hux_weixin();
		} else {
			return '';
		}
	}
	
	function global_nav_extra() {
		global $_G;
		$wxsetting = $_G['cache']['plugin']['hux_weixin'];
		$linktype = $wxsetting['show'];
		if ($linktype == '3') {
			return '<ul><li>'.$this->hux_weixin().'</li></ul>';
		} else {
			return '';
		}
	}
	
}

?>