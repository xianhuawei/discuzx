<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_hsk_vcenter{
	
}

class plugin_hsk_vcenter_forum extends plugin_hsk_vcenter{
	
	function post_top_output(){
		global $_G;
		$theopen = $_G['cache']['plugin']['hsk_vcenter']['forumlocation'];
		$action = $_GET['action'];
		if($theopen && $action == "newthread"){

			if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
				@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
				//历遍
				foreach($_SORT as $val){
					if(!$val['sup']){//所有一级分类
						if($_G['fid'] == $val['band'])
							header("location: plugin.php?id=hsk_vcenter:hsk_vcenter&mod=release");
					}
				}
			}
		}
	}
}

?>