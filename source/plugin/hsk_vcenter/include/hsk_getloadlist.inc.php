<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}
$action = dhtmlspecialchars($_GET['action']);
$fid = intval($_GET['fid']);
$query = DB::query("SELECT m.sup, m.tag, ab.tag as ab_tag FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id='$vid'");
if(!$datarow = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
$thesup = $datarow['sup'];

if($vid && $action == 'tag'){

	//有TAG，生成TAG数组
	$sidarray = array();
	$sidarray = $datarow['tag'] ? explode("\t", $datarow['tag']) : explode("\t", $datarow['ab_tag']);
	$supsql = $datarow['sup'] ? "and v.id<>'$thesup'" : null;
	$i=0;
	foreach($sidarray as $val){
		$sidnewarray = explode(',', $val);
		if($sidnewarray[0]){
			$taglistarray[] = $sidnewarray[0];
			$tagstrlist[] = $sidnewarray;
			$i++;
		}
	}
	$intagarray = implode(',', $taglistarray);
	$intagarray = $intagarray ? $intagarray : 0;

	$query = DB::query("SELECT t.tagid, v.id, v.vsubject, v.purl, v.remote, v.views, v.chk_up FROM ".DB::table('vgallery_tags')." t LEFT JOIN ".DB::table('vgallerys')." v ON v.id=t.itemid WHERE t.tagid in($intagarray) and v.audit=1 and t.idtype='HSKTAG' and v.id<>'$vid' and v.subid=0 and v.abtotal>=0 $supsql GROUP BY t.itemid ORDER BY t.itemid desc limit 0, 7");
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 12, '');
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datalist[] = $datarow;
	}

}elseif($vid && $action == 'sort' && $fid){

	$query = DB::query("SELECT id, vsubject, purl, remote, views, chk_up FROM ".DB::table('vgallerys')." WHERE audit=1 and id<>'$vid' and subid=0 and id<>'$thesup' and abtotal>=0 and fid='$fid' ORDER BY views desc limit 0, 7");
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 12, '');
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datalist[] = $datarow;
	}

}elseif($vid && $action == 'top'){

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php';
		if($timestamp - $rand_cache_time > 10800){
			$docache = 1;
		}elseif(!$_RANDLIST){
			$docache = 1;
		}
	}else{
		$notfile = 1;
	}
	
	if($docache || $notfile){
		$query = DB::query("SELECT id, vsubject, purl, remote, views, chk_up FROM ".DB::table('vgallerys')." WHERE audit=1 and subid=0 and abtotal>=0 ORDER BY rand() LIMIT 100;");
		while($datarow = DB::fetch($query)){
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 12, '');
			$randrows[] = $datarow;
		}
		$timeinfo = "\$rand_cache_time = $_G[timestamp];\n";
		hsk_tocache("randlist.cache", $timeinfo.hsk_getcachevars(array('_RANDLIST' => $randrows)), '_', './data/hskcenter/cache/');
		$_RANDLIST = $randrows;
	}

	//开始抓7个随机的
	shuffle($_RANDLIST);

	for($i=0; $i<7; $i++){
		$datalist[] = $_RANDLIST[$i];
	}

}elseif($vid && $action == 'deleplay'){
	foreach($dvlist as $key=>$val){
		if($val['id'] == $vid){
			unset($dvlist[$key]);
		}
	}
	$dvlistnewinc = serialize($dvlist);
	dsetcookie('vgallery_list', $dvlistnewinc, 31536000);
	dexit();
}


include template("ajax_getloadlist", 'Kannol', PTEM);
?>