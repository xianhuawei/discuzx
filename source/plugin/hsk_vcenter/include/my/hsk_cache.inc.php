<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}


$cache_array = array();
for($i=0; $i<=3; $i++){
	$cache_array[$i]['key'] = $i;
	$cache_array[$i]['val'] = lang('plugin/hsk_vcenter', "my_cache_$i");
}

if(!submitcheck('reportsubmit')) {

	//没有任何数据
	include template("my_cache", 'Kannol', PTEM);

}else{
	
	$seleid = dhtmlspecialchars($_GET['seleid']);

	//视频数量统计
	if($seleid[0]){
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where uid='$discuz_uid' and album=0");
		$maxpage = DB::result($query, 0);
		DB::query("UPDATE ".DB::table('vgallery_member')." SET shares='$maxpage' WHERE mid='$discuz_uid'");
	}

	//专辑数
	if($seleid[1]){
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where uid='$discuz_uid' and album>0");
		$maxpage = DB::result($query, 0);
		DB::query("UPDATE ".DB::table('vgallery_member')." SET ablists='$maxpage' WHERE mid='$discuz_uid'");
	}

	//数点数
	if($seleid[2]){
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_evaluate')." e LEFT JOIN ".DB::table('vgallerys')." v ON v.id=e.vid where e.uid<>'$discuz_uid' and v.uid='$discuz_uid'");
		$maxpage = DB::result($query, 0);
		DB::query("UPDATE ".DB::table('vgallery_member')." SET hots='$maxpage' WHERE mid='$discuz_uid'");
	}

	//收藏数重建
	if($seleid[3]){
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_favorites')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid where f.uid='$discuz_uid' and v.audit=1");
		$maxpage = DB::result($query, 0);
		DB::query("UPDATE ".DB::table('vgallery_member')." SET favsum='$maxpage' WHERE mid='$discuz_uid'");
	}

	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=my&action=cache');
}

?>