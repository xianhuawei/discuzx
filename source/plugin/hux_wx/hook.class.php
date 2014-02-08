<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_hux_wx {

	function  global_login_extra(){ 
		global $_G;
		$applogin = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('login','appid');
		if ($applogin) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/hook.php';
		} else {
			$return = '';
		}
		return $return;
	}
	
	function global_login_text(){
		global $_G;
		$applogin = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('login','appid');
		if ($applogin) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/hook_t.php';
		} else {
			$return = '';
		}
		return $return;
	}

}

class plugin_hux_wx_member extends plugin_hux_wx {

	function register_logging_method() {
		global $_G;
		$applogin = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('login','appid');
		if ($applogin) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/hook_m.php';
		} else {
			$return = '';
		}
		return $return;
	}
	
	function logging_method() {
		global $_G;
		$applogin = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('login','appid');
		if ($applogin) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/hook_m.php';
		} else {
			$return = '';
		}
		return $return;
	}

}

?>