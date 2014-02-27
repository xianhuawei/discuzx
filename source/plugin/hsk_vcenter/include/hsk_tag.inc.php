<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

if(!$tag_radio)		showmessage(lang('plugin/hsk_vcenter', 'tagisclose'));

$types = intval($_GET['types'])<0 || intval($_GET['types'])>3 ? 0 : intval($_GET['types']);
$s = intval($_GET['s']) == 1 ? 1 : 0;
if($types == 1){
	$thegosql1 = "and m.album=1";
}elseif($types == 2){
	$thegosql1 = "and m.album=2";
}elseif($types == 3){
	$thegosql1 = "and m.album=3";
}else{
	$thegosql1 = null;
}

$page = max(1, intval($page));
$ppp = 20;

//先取得页面
$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_tags')." t LEFT JOIN ".DB::table('vgallerys')." m ON m.id=t.itemid where t.tagid='$vid' and t.idtype='HSKTAG' and m.audit='1' $thegosql1");
$maxpage = DB::result($query, 0);
if($maxpage == 0){showmessage(lang('plugin/hsk_vcenter', 'nofindtag'));}
$countmax = $maxpage;

$query = DB::query("SELECT t.tagid, t.tagname, m.id, m.vsubject, m.vprice, m.purl, m.uid, m.views, m.polls, m.valuate, m.timelong, p.username, m.remote, m.dateline, m.album FROM ".DB::table('vgallery_tags')." t LEFT JOIN ".DB::table('vgallerys')." m ON m.id=t.itemid LEFT JOIN ".DB::table('common_member')." p ON p.uid=m.uid WHERE t.tagid='$vid' and t.idtype='HSKTAG' and m.audit='1' $thegosql1 ORDER BY m.id limit ".(($page-1)*$ppp).", $ppp");

while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] = cutstr($datarow['vsubject'], $s ? 50 : 16, '');
	$datarow['vsubjectc'] = str_replace($datarow['tagname'], '<font color="red">'.$datarow['tagname'].'</font>', $datarow['vsubjectc']);
	$datarow['timelong'] = checkthetime($datarow['timelong']);
	$picurl = $datarow['remote'] ?  $_G['setting']['ftp']['attachurl'] : null;
	$datarow['purl'] = $picurl.$datarow['purl'];
	$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
	$datarow['isalbum'] = $datarow['album'] ? 'dlist' : 'show';
	$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
	if(!$intagname)$intagname = $datarow['tagname'];
	$datalist[] = $datarow;
}

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_tagid_hot.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_tagid_hot.cache.php';
}

//最新视频
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newlist.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newlist.cache.php';
}

//最新专辑
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newablist.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newablist.cache.php';
}

//最新剧集
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newabtotal.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newabtotal.cache.php';
}

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($intagname);
$navname = lang('plugin/hsk_vcenter', 'tag');
$navtitle = $intagname." - ".lang('plugin/hsk_vcenter', 'tag')." - $navtitle";

include template("gallery_taglist".$isleftr, "Kannol", PTEM);

?>