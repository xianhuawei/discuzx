<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	dexit('Access Denied');
}

$t = intval($_GET['t']);
//专辑信息获取
$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, a.name, tc.evaluate_r FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallery_actor')." a ON a.aid=m.director LEFT JOIN ".DB::table('vgallery_evaluate_tc')." tc ON tc.vid=m.id WHERE m.id='$vid'");
if(!$abvalue = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
$picurl = $abvalue['remote'] ?  $_G['setting']['ftp']['attachurl'] : null;
$abvalue['purl'] = $picurl.$abvalue['purl'];
$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
$abvalue['valuate'] = sprintf("%01.1f", $abvalue['valuate']/100);
$absupid = $abvalue['subid'] ? $abvalue['subid'] : $abvalue['id'];
$abvalue['evaluate_r'] = intval($abvalue['evaluate_r']);
$abvalue['vsubjectc'] = cutstr($abvalue['vsubject'], 40, '..');
$abvalue['vinfo'] = dhtmlspecialchars($abvalue['vinfo']);
$abvalue['vinfo'] = str_replace(chr(13).chr(10), "", $abvalue['vinfo']);
$abvalue['vinfoc'] = cutstr($abvalue['vinfo'], 126, '..');

$vod_option	= $getvar['vod_option'];
DB::query("UPDATE ".DB::table('vgallerys')." SET views=views+1 where id='$vid'");

//生成作者数据
$author['uid'] = $abvalue['uid'];
$author['username'] = $abvalue['username'];
$author['myshare'] = $abvalue['shares'];
$author['myablist'] = $abvalue['ablists'];
$author['myhots'] = $abvalue['hots'];

//这个是标签
$sidarray = array();
$sidarray = explode("\t", $abvalue['sidstr']);
$i=0;
foreach($sidarray as $val){
	$sidnewarray = explode(',', $val);
	if($sidnewarray[0]){
		$sidlistarray[$i]['sid'] = $sidnewarray[0];
		$sidlistarray[$i]['sort'] = $sidnewarray[1];
		$i++;
	}
}

$abvalue['dateline'] = gmdate("Y-m-d, H:i", $abvalue['dateline'] + 3600 * $timeoffset);
foreach($_SORT as $datarow2){
	if($datarow2['sid'] == $abvalue['sid']){
		$sort_1_sid = $fid = $datarow2['sup'];
		$sort_2_name = $datarow2['sort'];
		$seotitle = $datarow2['sort'];
	}
}

foreach($_SORT as $datarow2){
	if($sort_1_sid == $datarow2['sid']){
		$sort_height	= $datarow2['rehei'] && $abvalue['album']==0 ? $datarow2['rehei'] : $_maxheight;						//截图高度
		$seotitle = $datarow2['sort'];
		$istv = $datarow2['istv'];
		if($datarow2['sygroup']){
			$tmpstr = (array)unserialize($datarow2['sygroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if(!$relemiss && $adminid != 1){
				showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
			}
		}
	}
}

//处理高度使图片平均
if($_maxwidth != 116 && $abvalue['album']>0){
	//针对非116PX的截图进行计算
	$x = $_maxwidth/116;
	$sort_height = floor($sort_height/$x);
}

if($abvalue['abtotal']<0 || (!$istv && $abvalue['album']<1) || $abvalue['sup']>0){
	$locationurl = sendurl('show',0,$vid);
	header("location: $locationurl");
}

$s = intval($_GET['s']) <= 2 ? intval($_GET['s']) : $istv;				//显示方式

if($abvalue['album']==3){			//剧集默认是从旧到新排序。
	$t = !$t ? 2 : $t;
}else{
	$t = !$t ? 1 : $t;
}

if($t == 1){
	$types_sql = 'id desc';
}else{
	$types_sql = 'id';
}

//dexit($s);

if($abvalue['actor'] && $vod_option){			//剧集又开启演员表
	$sidarray = explode("\t", $abvalue['actor']);
	$i=0;
	foreach($sidarray as $val){
		$sidnewarray = explode(',', $val);
		if($sidnewarray[0]){
			$actorarray[$i]['aid'] = $sidnewarray[0];
			$actorarray[$i]['name'] = $sidnewarray[1];
			$i++;
		}
	}
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
	}

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
	}

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
	}

}
$sid = $abvalue['sid'];

$absum = 0;

$page = max(1, intval($page));

if($abvalue['album']==3){
	$s = $s ? $s : 1;
}else{
	$ss = $istv ? 2 : 0;
	$s = $s ? $s : $ss;
}

if($abvalue['album'] == 3 && $s != 2){
	$ppp = 120;
	$scut = 12;
}elseif($abvalue['album'] != 3 && $s == 1){
	$ppp = 50;
	$scut = 80;
}else{
	$ppp = 25;
	$scut = 12;
}


if($abvalue['album']>0){

	//先取得页面
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where sup='$vid' and audit=1");
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;

	$query = DB::query("SELECT id, vsubject, vprice, purl, uid, views, polls, valuate, timelong, remote, dateline FROM ".DB::table('vgallerys')." WHERE sup='$vid' and audit='1' ORDER BY $types_sql limit ".(($page-1)*$ppp).", $ppp");
}else{
	$query = DB::query("SELECT id, vsubject, vprice, purl, uid, views, polls, valuate, timelong, remote, dateline FROM ".DB::table('vgallerys')." WHERE (subid='$absupid' or id='$absupid') and audit=1 ORDER BY $types_sql limit ".(($page-1)*$ppp).", $ppp");
}

$fidsidpage = null;
$firstvid = $firstvid = 0;
while($datarow = DB::fetch($query)){
	$newtitle = $datarow['album'] == 3 ? str_replace($abvalue['vsubject'], '', $datarow['vsubject']) : $datarow['vsubject'];
	$datarow['vsubjectc'] = cutstr($newtitle, $scut, '');
	$datarow['timelong'] = checkthetime($datarow['timelong']);
	$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
	$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
	$datalist[] = $datarow;
}

//页数处理
$mtpage = sendurl('dlist',0,$vid,0,$t,$s);		//{eval echo sendurl('dlist',0, $datarow[id],0,1);}
//dexit($mtpage);
$multipage = multi($maxpage, $ppp, $page, $mtpage);
if($hp){
	$multipage = preg_replace("/1.html\?page=(\d+)/ies", "\\1"."\.html", $multipage);		//.html1html
	$multipage = str_replace("html", ".html", $multipage);
}

if($abvalue['album']>0 && $abvalue['album']<3){
	//创建者的其它专辑
	if($abvalue['ablists'] > 1){
		//不止一个专辑
		$sqlstr = $abvalue['album'] == 3 ? "and album='3'" : "and album in (1,2)";
		$query = DB::query("SELECT id, vsubject, remote, purl, vsum FROM ".DB::table('vgallerys')." WHERE subid=0 and id<>'$absupid' and album>0 and uid='$abvalue[uid]' and audit=1 and id<>'$abvalue[id]' $sqlstr ORDER BY id desc limit 0, 5");
		while($datarow = DB::fetch($query)){
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 22, '..');
			$otherablist[] = $datarow;
		}
	}
}else{
	//创建者的其它同类视频
	if($abvalue['shares'] > 1 && $abvalue['album']<3){
		$query = DB::query("SELECT id, vsubject, remote, purl, views as vsum FROM ".DB::table('vgallerys')." WHERE subid=0 and id<>'$absupid' and album=0 and uid='$abvalue[uid]' and abtotal>=0 and audit=1 and id<>'$vid' and fid='$abvalue[fid]' ORDER BY id desc limit 0, 5");
		while($datarow = DB::fetch($query)){
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 16, '');
			$otherablist[] = $datarow;
		}
	}
}


if($abvalue['album']>0){
	//关联的专辑
	$query = DB::query("SELECT id, absubject, vsum, abtotal FROM ".DB::table('vgallerys')." WHERE subid='$absupid' or id='$absupid' order by subid, id");
	while($suplist = DB::fetch($query)){
		$suplist['absubject'] = $suplist['absubject'] ? $suplist['absubject'] : lang('plugin/hsk_vcenter', 'otherrus');
		if(!$abvalue['abtotal'])	$abvalue['abtotal'] = $suplist['abtotal'];
		$supdata[] = $suplist;
	}
}

//热门TAG
if($abvalue['tag']){

	//有TAG，生成TAG数组
	$sidarray = array();
	$sidarray = explode("\t", $abvalue['tag']);

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
	
	$query = DB::query("SELECT t.tagid, v.id, v.vsubject FROM ".DB::table('vgallery_tags')." t LEFT JOIN ".DB::table('vgallerys')." v ON v.id=t.itemid WHERE t.tagid in($intagarray) and v.audit=1 and v.subid=0 and v.id<>'$absupid' and v.id<>'$vid' and t.idtype='HSKTAG' GROUP BY t.itemid ORDER BY t.itemid desc limit 0, 10");

	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$taglist[] = $datarow;
	}
}

//最新剧集连载
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php';
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php';
}

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($abvalue['vsubject'].$abvalue['vinfo']);
$navname = lang('plugin/hsk_vcenter', 'thevlist').lang('plugin/hsk_vcenter', 'list');
$navtitle = $abvalue['vsubject']." - ".lang('plugin/hsk_vcenter', 'thevlist')." - $navtitle";

include template("gallery_ablist", "Kannol", PTEM);

?>