<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}


$cache_array = array();
for($i=0; $i<=13; $i++){
	$cache_array[$i]['key'] = $i;
	$cache_array[$i]['val'] = lang('plugin/hsk_vcenter', "m_cache_$i");
}

if(!submitcheck('reportsubmit')) {

	//没有任何数据
	include template("manage_cache", 'Kannol', PTEM);

}else{
	
	$seleid = dhtmlspecialchars($_GET['seleid']);

	//视频数量统计
	if($seleid[0]){
		total_fun();
	}

	//视频类别数据
	if($seleid[1]){
		hsk_stylewrite();
	}

	//一级类别最新数据
	if($seleid[2]){
		foreach($_SORT as $val){
			if(!$val['sup']){//重新生成所有一级分类
				hsk_fidupdate($val['sid']);
			}
		}
	}

	//二级类别最新数据
	if($seleid[3]){
		foreach($_SORT as $val){
			if($val['sup']){//重新生成所有一级分类
				hsk_sidupdate($val['sid']);
			}
		}
	}

	//全局最新视频
	if($seleid[4]){
		hsk_newvod();
	}

	//全局最新专辑
	if($seleid[5]){
		hsk_newablist();
	}

	//全局最新剧集
	if($seleid[6]){
		hsk_newabtotal();
	}

	//最新同步追剧
	if($seleid[7]){
		hsk_newab_update();
	}

	//热点聚焦数据
	if($seleid[8]){
		mark_album_cache();
	}

	//推荐视频数据
	if($seleid[9]){
		mark_top_cache();
	}

	//顶的最多的数据
	if($seleid[10]){
		hsk_dingvod();
	}

	//热门标签数据
	if($seleid[11]){
		hsk_taghot();
	}

	//热门播客数据
	if($seleid[12]){
		hsk_hotuser();
	}

	//最新演员
	if($seleid[13]){
		hsk_newactor();
	}

	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=cache');
}

?>