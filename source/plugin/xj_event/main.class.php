<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_xj_event {
	//TODO - Insert your code here

	function forumdisplay_filter_extra(){
		return '<span class="pipe">|</span><a href="plugin.php?id=xj_event:event_list&fid='.$_GET['fid'].'" class="xi2">'.lang('plugin/xj_event', 'huodong').'</a>';
	}
	
	function deletethread($a){
		global $_G;
		if($a['step']=='delete'){
			$deltid = implode(',',$a['param'][0]);
			DB::query("DELETE FROM ".DB::table('plugin_xj_event')." WHERE tid in(".$deltid.")");
			DB::query("DELETE FROM ".DB::table('plugin_xj_eventthread')." WHERE tid in(".$deltid.")");
		}
		return;
	}
	
	function forumdisplay_thread_subject_output(){
		global $_G,$threadlist;
		$nowtime = time();
		$return = array();
		$items = array();
		foreach($threadlist as $key=>$value){
			$et = DB::fetch_first("SELECT * FROM ".DB::table('plugin_xj_eventthread')." WHERE tid=".$value['tid']);
			if($et){
				if($et['sort']==1){
					$items[$key] = '['.lang('plugin/xj_event', 'hdhg').']';
				}else{
					$items[$key] = '<img src="source/plugin/xj_event/images/zy.png" alt="event_zy" title="'.lang('plugin/xj_event', 'hdzy').'" align="absmiddle" />';
				}
			}
			$event = DB::fetch_first("SELECT * FROM ".DB::table('plugin_xj_event')." WHERE tid=".$value['tid']);
			if($event){
				if($event['starttime']>$nowtime){
					$items[$key] = '<img src="source/plugin/xj_event/images/hd_ico2.png" align="absmiddle">';
				}
				if($event['endtime']<$nowtime){
					$items[$key] = '<img src="source/plugin/xj_event/images/hd_ico3.png" align="absmiddle">';
				}
				if($nowtime>$event['starttime'] && $nowtime<$event['endtime']){
					$items[$key] = '<img src="source/plugin/xj_event/images/hd_ico1.png" align="absmiddle">';
				}
			
				$setting = unserialize($event['setting']);
				$applys = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_eventapply')." WHERE tid=".$value['tid']);
				$items[$key] = $items[$key].' <a href="forum.php?mod=viewthread&tid='.$value['tid'].'&menu=3" class="xi2">'.lang('plugin/xj_event', 'baomin').'(<b>'.$applys.'</b>)</a>';
				if($setting['eventzy_enable']){
					$threads = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_event')." A,".DB::table('plugin_xj_eventthread')." B WHERE A.tid=".$value['tid']." and A.eid=B.eid");
					$items[$key] = $items[$key].' <a href="forum.php?mod=viewthread&tid='.$value['tid'].'&menu=2" class="xi2">'.$setting['eventzy_name'].'(<b>'.$threads.'</b>)</a>';
				}
			}
		}
		$return = $items;
		return $return;
	}
	

}

class plugin_xj_event_forum extends plugin_xj_event{


	//主题列表页输出
	function forumdisplay_xj_event_output($a) {
		global $_G;
		//print_r($_G['forum_threadlist'][1]);
		foreach($_G['forum_threadlist'] as $key=>$value){
			$num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_xj_event')." WHERE tid=".$value['tid']);
			if($num>0){
				$_G['forum_threadlist'][$key]['special'] = 4;
			}
		}
	}
}

?>