<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/weibo/config.php';
require_once DISCUZ_ROOT.'./source/plugin/weibo/saetv2.ex.class.php';

class plugin_weibo {
	
	function plugin_weibo() {
		global $_G;

		$this->weibo_uid = $_G['cache']['plugin']['weibo']['weibo_uid'];
		$this->weibo_position = $_G['cache']['plugin']['weibo']['weibo_position'];
	}

	function global_login_extra(){
		global $_G;

		include template('weibo:global_login_extra');
		return $return;
	}

	function global_usernav_extra1(){
		global $_G;

		if($_G['uid'] && !$bind = C::t('#weibo#weibo')->fetch($_G['uid'])) {
			include template('weibo:global_usernav_extra1');
			return $return;
		}
	}

	function global_cpnav_extra1() {
		global $_G;

		if($this->weibo_uid && $this->weibo_position == 2) {
			return '<iframe src="http://widget.weibo.com/relationship/followbutton.php?btn=light&amp;style=2&amp;uid='.$this->weibo_uid.'&amp;width=136&amp;height=24&amp;language=zh_cn" width="136" height="24" frameborder="0" scrolling="no" marginheight="0" class="z" style="margin-left: 4px;"></iframe>';
		}
	}

	function global_cpnav_extra2() {
		global $_G;

		if($this->weibo_uid && $this->weibo_position == 3) {
			return '<iframe src="http://widget.weibo.com/relationship/followbutton.php?btn=light&amp;style=2&amp;uid='.$this->weibo_uid.'&amp;width=136&amp;height=24&amp;language=zh_cn" width="136" height="24" frameborder="0" scrolling="no" marginheight="0" class="z"></iframe>';
		}
	}

	function global_nav_extra() {
		global $_G;

		if($this->weibo_uid && $this->weibo_position == 5) {
			return '<iframe src="http://widget.weibo.com/relationship/followbutton.php?btn=light&amp;style=2&amp;uid='.$this->weibo_uid.'&amp;width=136&amp;height=24&amp;language=zh_cn" width="136" height="24" frameborder="0" scrolling="no" marginheight="0" class="y" style="margin-top: 5px;"></iframe>';
		}
	}

}

class plugin_weibo_forum extends plugin_weibo {

	function index_status_extra() {
		global $_G;

		if($this->weibo_uid && $this->weibo_position == 1) {
			return '<style type="text/css">#connectlike { width: 135px; }</style><iframe src="http://widget.weibo.com/relationship/followbutton.php?btn=light&amp;style=2&amp;uid='.$this->weibo_uid.'&amp;width=136&amp;height=24&amp;language=zh_cn" width="136" height="24" frameborder="0" scrolling="no" marginheight="0" allowtransparency="true" style="padding-top: 4px;"></iframe>';
		}
	}

	function index_nav_extra() {
		global $_G;

		if($this->weibo_uid && $this->weibo_position == 4) {
			return '<iframe src="http://widget.weibo.com/relationship/followbutton.php?btn=light&amp;style=2&amp;uid='.$this->weibo_uid.'&amp;width=136&amp;height=24&amp;language=zh_cn" width="136" height="24" frameborder="0" scrolling="no" marginheight="0" class="z"></iframe>';
		}
	}

}

class plugin_weibo_member extends plugin_weibo {

	function logging_top() {
		global $_G;

		if($_G['cookie']['weibo_token']) {
			include template('weibo:logging_top');
			return $return;
		}
	}

	function register_top() {
		global $_G;

		if($_G['cookie']['weibo_token']) {
			$referer = rawurlencode($_GET['referer']);
			include template('weibo:register_top');
			return $return;
		}
	}

	function register_logging_method(){
		global $_G;

		include template('weibo:logging_method');
		return $return;
	}

	function logging_method(){
		global $_G;

		include template('weibo:logging_method');
		return $return;
	}

	function register() {
		global $_G;

		$_G['setting']['reglinkname'] = lang('plugin/weibo', 'register_profile');
	}

	function register_message($param) {
		global $_G;

		if($param['param'][0] == 'register_succeed' && $_G['cookie']['weibo_token']) {
			$token = dunserialize($_G['cookie']['weibo_token']);

			C::t('#weibo#weibo')->insert(array(
				'uid' => $param['param'][2]['uid'],
				'username' => $param['param'][2]['username'],
				'sina_uid' => $token['uid'],
				'sina_username' => $token['username'],
				'token' => $token['access_token'],
				'remind_in' => $token['remind_in'],
				'expires_in' => $token['expires_in'],
				'thread' => 1,
				'reply' => 1,
				'follow' => 1,
				'blog' => 1,
				'doing' => 1,
				'share' => 1,
				'article' => 1,
				'dateline' => $_G['timestamp'],
				'update' => $_G['timestamp'],
			));
		}
	}

	function logging_message($param) {
		global $_G;

		if($param['param'][0] == 'location_login_succeed' && $_G['cookie']['weibo_token']) {
			$token = dunserialize($_G['cookie']['weibo_token']);

			if($bind = C::t('#weibo#weibo')->fetch($_G['uid'])) {
				return;
			}

			C::t('#weibo#weibo')->insert(array(
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'sina_uid' => $token['uid'],
				'sina_username' => $token['username'],
				'token' => $token['access_token'],
				'remind_in' => $token['remind_in'],
				'expires_in' => $token['expires_in'],
				'thread' => 1,
				'reply' => 1,
				'follow' => 1,
				'blog' => 1,
				'doing' => 1,
				'share' => 1,
				'article' => 1,
				'dateline' => $_G['timestamp'],
				'update' => $_G['timestamp'],
			));
		}
	}

}

?>