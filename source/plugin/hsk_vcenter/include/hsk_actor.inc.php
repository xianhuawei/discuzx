<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	dexit('Access Denied');
}

//专辑信息获取
$aid = intval($_GET['aid']);
$action = dhtmlspecialchars($_GET['action']);

$query = DB::query("SELECT * FROM ".DB::table('vgallery_actor')." WHERE aid='$aid'");
if(!$abvalue = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

//生成演员资源
$abvalue['photo'] = getuseimg($abvalue['photo'], 0, MDIR.'/actor_img.gif');
$abvalue['sex']	= lang('plugin/hsk_vcenter', 'actor_sex_'.$abvalue['sex']);
$abvalue['region']	= lang('plugin/hsk_vcenter', 'actor_adds_'.$abvalue['region']);
for($i=0; $i<5; $i++){
	if($abvalue['pcode'][$i]){
		$shu = $abvalue['pcodes'] ? '<span class="pipe">|</span>' : null;
		$abvalue['pcodes'] .= $shu.lang('plugin/hsk_vcenter', 'actor_pcode_'.($i+1));
	}
}

//处理高度使图片平均
if($_maxwidth != 116){
	//针对非116PX的截图进行计算
	$x = $_maxwidth/116;
	$_maxheight = floor($_maxheight/$x);
}

$page = max(1, intval($page));
//判断是否为演员或导演
if($action == 'f'){
	//导演
	//先取得页面
	$ppp = 25;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where director='$aid' and audit='1' and abtotal>=0");
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;

	$query = DB::query("SELECT id, vsubject, vprice, purl, uid, vsum, abtotal, views, polls, valuate, timelong, remote, dateline, album FROM ".DB::table('vgallerys')." WHERE director='$aid' and audit='1' and abtotal>=0 ORDER BY id desc limit ".(($page-1)*$ppp).", $ppp");

	//如果也是演员
	$isdirector = 1;
	if($abvalue['pcode'][1]){
		$isactor = 1;
	}

}else{
	//先取得页面
	$ppp = 20;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_tags')." a LEFT JOIN ".DB::table('vgallerys')." b ON b.id=a.itemid where a.tagid='$aid' and a.idtype='HSKACT' and b.audit='1' and b.abtotal>=0");
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;

	$query = DB::query("SELECT a.*, b.id, b.vsubject, b.vprice, b.purl, b.uid, b.views, b.polls, b.valuate, b.timelong, b.remote, b.dateline, b.vsum, b.abtotal, b.album FROM ".DB::table('vgallery_tags')." a LEFT JOIN ".DB::table('vgallerys')." b ON b.id=a.itemid WHERE a.tagid='$aid' and a.idtype='HSKACT' and b.audit='1' and b.abtotal>=0 ORDER BY b.id desc limit ".(($page-1)*$ppp).", $ppp");

	//如果也是导演
	$isactor = 1;
	if($abvalue['director'] || $abvalue['pcode'][0]){
		$isdirector = 1;
	}
}


while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 14, '');
	$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
	if($istv || $datarow['abtotal'] || $datarow['vsum']){
		if(!$datarow['abtotal'] && !$datarow['vsum']){
			$datarow['timelong'] = checkthetime($datarow['timelong']);
		}elseif($datarow['vsum']>= $datarow['abtotal'] && $datarow['abtotal'] && $datarow['album']==3){
			$datarow['timelong'] = '<a href="'.sendurl('acshow','end',$datarow['id']).'" style="color:#ffffff" title="'.lang('plugin/hsk_vcenter', 'thetv4').'">'.$datarow['abtotal'].lang('plugin/hsk_vcenter', 'thetv1').lang('plugin/hsk_vcenter', 'thetv2').'</a>';
		}elseif($datarow['album']==3){
			$datarow['timelong'] = '<a href="'.sendurl('acshow','end',$datarow['id']).'" style="color:#ffffff" title="'.lang('plugin/hsk_vcenter', 'thetv3').'">'.lang('plugin/hsk_vcenter', 'thetv0').$datarow['vsum'].lang('plugin/hsk_vcenter', 'thetv1').'</a>';
		}else{
			$datarow['timelong'] = $datarow['vsum']." ".lang('plugin/hsk_vcenter', 'thevod');
		}
	}else{
		$datarow['timelong'] = checkthetime($datarow['timelong']);
	}
	$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
	$datalist[] = $datarow;
}

//页数处理
$mtpage = sendurl('actor',$action, $aid);
//dexit($mtpage);
$multipage = multi($maxpage, $ppp, $page, $mtpage);
if($hp){
	$multipage = preg_replace("/1.html\?page=(\d+)/ies", "\\1"."\.html", $multipage);		//.html1html
	$multipage = str_replace("html", ".html", $multipage);
}

//最新剧集连载
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php';
}

//其它演员
if($action == 'f'){
	$a_sql = "and director='1'";
}
$query = DB::query("SELECT * FROM ".DB::table('vgallery_actor')." WHERE aid>$aid $a_sql ORDER BY aid limit 12");
while($datarow = DB::fetch($query)){
	$datarow['namec'] = cutstr($datarow['name'], 8, '');
	$datarow['photo'] = getuseimg($datarow['photo'], 0, './uc_server/images/noavatar_middle.gif');
	$otheractor[] = $datarow;
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php';
}

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($abvalue['name'].", ".$abvalue['alias']);
$navname = $abvalue['name'];
$navtitle = $abvalue['name']." - $navtitle";

include template("gallery_actor", "Kannol", PTEM);

?>