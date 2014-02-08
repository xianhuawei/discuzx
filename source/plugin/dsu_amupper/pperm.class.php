<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
//这个注释掉
class mobileplugin_dsu_amupper {
	
	var $vars = array();
	var $_table = array();
	var $_time = 0;

	function mobileplugin_dsu_amupper(){
		global $_G;	
		if($_G['uid']){
			$this->vars = $_G['cache']['plugin']['dsu_amupper'];
			$this->vars['offset'] = $_G['setting']['timeoffset'];
			$this->vars['gids'] = (array)unserialize($this->vars['gids']);
			$this->vars['today'] = dgmdate($_G['timestamp'],'Ymd',$this->vars['offset']);
			$this->vars['uid'] = C::t('#dsu_amupper#plugin_dsuamupper')->fetch($_G['uid']);
		}
		
	}

	function global_header_mobile(){
//		global $_G;
//		$return = '';
//		if($this->vars['ms'] > 1 && in_array($_G['groupid'],$this->vars['gids']) && $this->_time){
//			$return = '<a href="plugin.php?id=dsu_amupper&ppersubmit=true&formhash='.FORMHASH.'">'.lang('plugin/dsu_amupper','sb').'</a>';
//			if($this->vars['qz']==3){
//				$return = lang('plugin/dsu_amupper','nopper2',array('url'=>'plugin.php?id=dsu_amupper&ppersubmit=true&formhash='.FORMHASH));
//			}
//		}elseif($this->vars['ms'] > 1 && in_array($_G['groupid'],$this->vars['gids']) && $this->_time > -1){
//			$return = lang('plugin/dsu_amupper','wb');
//		}
//
//		$amu_pper = str_replace("\n<span class=\"pipe\">|</span>","",$return);
//		$amu_pper = str_replace("pper_a","pper_aa",$amu_pper);
//		$amu_pper = str_replace("pper_b","pper_bb",$amu_pper);
//
//		return $return;
	}


	function _istoday($time){
		global $_G;	
		$time = empty($time) ? 0 : $time ;
		$today = dgmdate($_G['timestamp'],'Ymd',$this->vars['offset']);
		$lastday = dgmdate($time,'Ymd',$this->vars['offset']);
		$days = $lastday - $today;
		return $days;
	}

}

class mobileplugin_dsu_amupper_forum extends mobileplugin_dsu_amupper {
	function post_top_mobile(){
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
?>