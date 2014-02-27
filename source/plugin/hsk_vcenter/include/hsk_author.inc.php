<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	dexit('Access Denied');
}

//专辑信息获取
$uid = intval($_GET['uid']);
$action = dhtmlspecialchars($_GET['action']);

$query = DB::query("SELECT m.*, u.username FROM ".DB::table('vgallery_member')." m LEFT JOIN ".DB::table('common_member')." u ON u.uid=m.mid WHERE m.mid='$uid'");
if(!$abvalue = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

//生成作者数据
$author['uid'] = $abvalue['mid'];
$author['username'] = $abvalue['username'];
$author['myshare'] = $abvalue['shares'];
$author['myablist'] = $abvalue['ablists'];
$author['myhots'] = $abvalue['hots'];

//处理高度使图片平均
if($_maxwidth != 116){
	//针对非116PX的截图进行计算
	$x = $_maxwidth/116;
	$_maxheight = floor($_maxheight/$x);
}

//先取得页面

$page = max(1, intval($page));
$ppp = 25;
$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where uid='$uid' and audit='1' and abtotal>=0");
$maxpage = DB::result($query, 0);
$countmax = $maxpage;

$query = DB::query("SELECT id, vsubject, vprice, purl, uid, vsum, abtotal, views, polls, valuate, timelong, remote, dateline, album FROM ".DB::table('vgallerys')." WHERE uid='$uid' and audit='1' and abtotal>=0 ORDER BY id desc limit ".(($page-1)*$ppp).", $ppp");

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
$mtpage = sendurl('author',0, $uid);
//dexit($mtpage);
$multipage = multi($maxpage, $ppp, $page, $mtpage);
if($hp){
	$multipage = preg_replace("/1.html\?page=(\d+)/ies", "\\1"."\.html", $multipage);		//.html1html
	$multipage = str_replace("html", ".html", $multipage);
}

//播客达人
$bokehot = 0;
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php';
	$bokehot = 1;
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php';
}

$navname = $abvalue['username']." 's ".lang('plugin/hsk_vcenter', 'thevod');
list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($navname);
$navtitle = $navname." - $navtitle";

include template("gallery_author", "Kannol", PTEM);

?>