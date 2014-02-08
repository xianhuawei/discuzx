<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_dsu_amupper_base {
	var $vars = array();
	var $_table = array();
	var $_time = 0;

    function __construct() {
		global $_G;
		//C1:不在用户组;C2:未签到;C3:已签到，没有cookies;C4:已签到，有cookies;

		if($_G['uid']){
			$this->vars = $_G['cache']['plugin']['dsu_amupper'];
			$this->vars['offset'] = $_G['setting']['timeoffset'];
			$this->vars['gids'] = (array)unserialize($this->vars['gids']);
			$this->vars['zdqd'] = (array)unserialize($this->vars['zdqd']);
			$this->vars['today'] = dgmdate($_G['timestamp'],'Ymd',$this->vars['offset']);
			$this->_cookise = getcookie('dsu_amupper');
			$this->_cookised = getcookie('dsu_amuppered');
			$this->_time = 0;
			if(!$this->_cookised || !$this->_cookise){
				$this->vars['uid'] = C::t('#dsu_amupper#plugin_dsuamupper')->fetch($_G['uid']);
			}elseif($this->_cookised == $_G['uid']){
				$this->_time = 0;
			}else{
				$this->_time = -1;
			}
		}
    }
}


class plugin_dsu_amupper extends plugin_dsu_amupper_base{
	
	function global_usernav_extra3(){
//		global $_G;
//		if(!in_array($_G['groupid'],$this->vars['gids'])){
//			$this->return_if = -1;
//		}elseif($this->vars['ms'] > 1 && in_array($_G['groupid'],$this->vars['gids']) && $this->_time){
//			if($this->vars['tsms']==1 && !in_array($_G['groupid'],$this->vars['zdqd'])){
//				$this->return_if = 1;
//			}elseif(in_array($_G['groupid'],$this->vars['zdqd'])){
//				$this->return_if = 2;
//			}else{
//				$this->return_if = 3;
//			}
//
//		}elseif($this->vars['ms'] > 1 && in_array($_G['groupid'],$this->vars['gids']) && $this->_time > -1){
//			if($this->vars['ft']){
//				$this->return_if = 4;
//			}else{
//				$this->return_if = 5;
//			}
//
//		}
//		$return_if = $this->return_if;
//		include template('dsu_amupper:pper');
//
//		$amu_pper = str_replace("\n<span class=\"pipe\">|</span>","",$return);
//		$amu_pper = str_replace("pper_a","pper_aa",$amu_pper);
//		$amu_pper = str_replace("pper_b","pper_bb",$amu_pper);
//
//
//		return  $return;
	}

	function global_footer(){
//		global $_G;
//		if(!$this->_cookise){
//			$pper_show['c'] = $this->vars['uid']['cons'];
//			$pper_show['a'] = $this->vars['uid']['addup'];
//			$pper_show['l'] = dgmdate($this->vars['uid']['lasttime'], 'Y-m-d H:i:s', $this->vars['offset']);
//			if($_G['uid'] && $pper_show['a']){
//				include template('dsu_amupper:pper_foot');
//				dsetcookie('dsu_amupper', base64_encode($return), 3600);
//				return  $return;
//			}else{
//				return  '';
//			}
//		}else{
//			return  base64_decode($this->_cookise);
//		}
	}

	function _istoday($time){
		global $_G;
		include_once 'source/plugin/dsu_amupper/config.php';
		$time = empty($time) ? 0 : $time ;
		$today = dgmdate($_G['timestamp'],'Ymd',$this->vars['offset']);
		$yesterday = dgmdate($_G['timestamp']-3600*24,'Ymd',$this->vars['offset']);
		$lastday = dgmdate($time,'Ymd',$this->vars['offset']);
		$days = $lastday - $today;
		if($lastday == $yesterday){$days = -1;}
		if($days == 0 && $pperconfig['max'] && $pperconfig['interval'] && $pperconfig['minreward'] && $pperconfig['maxreward']){
			$time = empty($time) ? 0 : $time ;
			$now = dgmdate($_G['timestamp'],'H',$this->vars['offset']);
			$last = dgmdate($time,'H',$this->vars['offset']);
			$days = $last + 1 > $now  ? 0 : -1;
		}
		return $days;
	}
}

class plugin_dsu_amupper_forum extends plugin_dsu_amupper {
	function post_top(){
//		global $_G;
//		if($this->vars['ms'] > 1 && in_array($_G['groupid'],$this->vars['gids']) && $this->vars['qz']==2 ){
//			if($this->_time){
//				if(!$_G['inajax']){$url = $_SERVER['HTTP_REFERER'];}else{$url = '';}
//				showmessage(lang('plugin/dsu_amupper','nopper',array('url'=>'plugin.php?id=dsu_amupper&ppersubmit=true&nojump=1&formhash='.FORMHASH)),$url ,array(),array('timeout' => 0,'refreshtime' => 0 ,'alert' => 'error','handle' => ''));
//			}
//		}
//		return;
	}
}