<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class task_wz_pf {

	var $version = '1.0';
	var $name = '会员评分任务';
	var $description = '会员完成对任意主题N次评分后获得奖励';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $icon = '';
	var $period = '';
	var $periodtype = 0;
	var $conditions = array(
		'num' => array(
			'title' => '会员需要完成的评分次数',
			'description' => '评分次数.',
			'type' => 'text',
			'value' => '',
			'sort' => 'complete',
		)
	);

	function csc($task = array()) {
		global $_G;
        $applytime=$task['applytime'];
		$num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_ratelog')." WHERE uid='$_G[uid]' and dateline>$applytime");
		$numlimit = DB::result_first("SELECT value FROM ".DB::table('common_taskvar')." WHERE taskid='$task[taskid]' AND variable='num'");

		if($num && $num >= $numlimit) {
			return TRUE;
		} else {
			return array('csc' => $num > 0 && $numlimit ? sprintf("%01.2f", $num / $numlimit * 100) : 0, 'remaintime' => 0);
		}
	}
}
?>