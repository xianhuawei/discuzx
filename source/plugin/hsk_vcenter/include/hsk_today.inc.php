<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

if($types == 1){
	//按播放次数排序
	$types_sql = 'm.views';
}elseif($types == 2){
	//按分数
	$types_sql = 'm.valuate';
}elseif($types == 3){
	//按分数
	$types_sql = 'm.chk_up';
}else{
	//按发布时间排序
	$types = 0;
	$types_sql = 'm.updateline desc, m.id';
}

$m = intval($_GET['m'])<0 || intval($_GET['m'])>3 ? 0 : intval($_GET['m']);
$s = intval($_GET['s']) == 1 ? 1 : 0;
if($m == 1){
	$thegosql1 = "and album=1";
	$thegosql2 = "and m.album=1";
}elseif($m == 2){
	$thegosql1 = "and album=2";
	$thegosql2 = "and m.album=2";
}elseif($m == 3){
	$thegosql1 = "and album=3";
	$thegosql2 = "and m.album=3";
}else{
	$thegosql1 = "and abtotal>=0";
	$thegosql2 = "and m.abtotal>=0";
}

$absum = 0;
$sid = intval($_GET['sid']);
$fid = intval($_GET['fid']);
$fs = $sid ? 's' : 'f';
$fsid = $sid ? $sid : $fid;

$seotitle = lang('plugin/hsk_vcenter', 'nav_todays');
foreach($_SORT as $datarow){
	if($datarow['sid'] == $sid && $datarow['sup']){
		$fid = $datarow['sup'];		//得到一级目录的ID
		$seotitle = $datarow['sort'];
	}
}

foreach($_SORT as $datarow){
	if($datarow['sid'] == $fid){
		$_maxwidth		= $datarow['rewid'] ? $datarow['rewid'] : $_maxwidth;						//截图宽度
		$_maxheight		= $datarow['rehei'] ? $datarow['rehei'] : $_maxheight;						//截图高度
		$istv			= $datarow['istv'];
		//print_r($datarow);
		if($datarow['sygroup']){
			$tmpstr = (array)unserialize($datarow['sygroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if(!$relemiss && $adminid != 1){
				showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
			}
		}
	}
}

//处理高度使图片平均
if($_maxwidth != 116){
	//针对非116PX的截图进行计算
	$x = $_maxwidth/116;
	$_maxheight = floor($_maxheight/$x);
}

$sort_height = $_maxheight;

$page = max(1, intval($page));
if($s==1 && $istv){
	$ppp = 10;
}elseif($s==1 && !$istv){
	$ppp = 40;
}else{
	$ppp = 30;
}

//先取得页面
$todays = mktime(0,0,0,date("m"),date("d"),date("Y"));

$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1 and updateline>=$todays and abtotal>=0");
$maxpage = DB::result($query, 0);
$countmax = $maxpage;

//全部类别的SQL
$query = DB::query("SELECT m.id, m.fid, m.album, m.vsubject, m.vprice, m.purl, m.uid, m.views, m.polls, m.valuate, m.timelong, p.username, m.remote, m.dateline, m.chk_up, m.vsum, m.abtotal FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p ON p.uid=m.uid WHERE m.audit=1 and m.updateline>=$todays and m.abtotal>=0 ORDER BY $types_sql DESC limit ".(($page-1)*$ppp).", $ppp");
$fidsidpage = null;

$dlistorshow = $istv ? 'dlist' : 'show';
while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] = cutstr($datarow['vsubject'], $s ? 50 : 14, '..');
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
	$datarow['views'] = $datarow['views']++;
	$datarow['isalbum'] = $datarow['album'] ? 'dlist' : 'show';
	$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
	$datarow['evaluate_r'] = intval($datarow['evaluate_r']);
	$datalist[] = $datarow;
}

//页数处理
$mtpage = sendurl('list',$fs,$fsid,$types,$m,$s,0);		//$mods, $fs='null', $fsid=0, $types=0, $m=0, $s=0, $page=1){
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

//最新剧集连载
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newab_update.cache.php';
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php';
}

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($seotitle);
$navname = $seotitle;
$navtitle = $seotitle." - $navtitle";

include template("gallery_list", "Kannol", PTEM);

?>