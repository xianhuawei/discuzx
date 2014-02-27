<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$search_hot	= explode("\n", $getvar['search_hot']);
$skey = intval($_GET['skey']);
$srchtxt = trim(dhtmlspecialchars($_GET['srchtxt']));
if(strlen($srchtxt)<2){
	showmessage(lang('plugin/hsk_vcenter', 'search_small'));
}

//搜索时间
if($adminid !=1 ){
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_searchtime.cache.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/_searchtime.cache.php';
		$searchtime = $getvar['searchtime'];
		$cktime = ($_bfsearchtime + $searchtime) - $timestamp;
		if($cktime>0){
			//未到下一次搜索时间
			showmessage(lang('plugin/hsk_vcenter', 'searchtimeck', array('cktime'=>$cktime)));
		}else{
			//可以搜索，写入缓存
			$fbtimestr = "\$_bfsearchtime = $timestamp;\n";
			hsk_tocache("searchtime.cache", $fbtimestr, '_', './data/hskcenter/');
		}
	}else{
		//第一次搜索，写入缓存
		$fbtimestr = "\$_bfsearchtime = $timestamp;\n";
		hsk_tocache("searchtime.cache", $fbtimestr, '_', './data/hskcenter/');
	}
}

$types = in_array($types, array(0,1,2,3)) ? $types : 1;
$seotitle = lang('plugin/hsk_vcenter', 'search');

if($types == 1){
	//按播放次数排序
	$types_sql = 'm.views desc';
}elseif($types == 2){
	//按分数
	$types_sql = 'm.valuate desc ';
}elseif($types == 3){
	//按分数
	$types_sql = 'm.chk_up desc';
}else{
	//按发布时间排序
	$types = 0;
	$types_sql = 'm.id desc';
}


//处理高度使图片平均
if($_maxwidth != 116){
	//针对非116PX的截图进行计算
	$x = $_maxwidth/116;
	$_maxheight = floor($_maxheight/$x);
}

$sort_height = $_maxheight;

$skey = in_array($skey, array(1,2,3,4,5)) ? $skey : 1;
$skeym = array(1=>'vsubject', 2=>'vsubject', 3=>'vsubject', 4=>'actor', 5=>'tag');
$skeym = $skeym[$skey];

if($skey == 1){
	$sqljia = ' and m.album=0';
}elseif($skey == 2){
	$sqljia = ' and m.album in(1,2)';
}elseif($skey == 3){
	$sqljia = ' and s.istv=1';
	$sqljib = " or m.actor LIKE '%$srchtxt%'";
}else{
	$sqljia = ' and m.album in(0,1,3)';
}

$page = max(1, intval($page));
$ppp = $skey == 3 ? 10 : 30;

//先取得页面
$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=m.fid where (m.$skeym LIKE '%$srchtxt%'$sqljib) and m.audit=1 and m.abtotal>=0$sqljia");
$maxpage = DB::result($query, 0);
$countmax = $maxpage;

//如果只选择一级目录，那么SQL语句又不一样
$query = DB::query("SELECT m.id, m.fid, m.album, m.sidstr, m.vsubject, m.vprice, m.purl, m.uid, m.views, m.polls, m.valuate, m.director as directorid, m.actor, d.name as director, m.timelong, p.username, m.remote, m.dateline, m.chk_up, m.vsum, m.abtotal, e.evaluate_r, m.vinfo, m.years, m.address, m.language FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p ON p.uid=m.uid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=m.id LEFT JOIN ".DB::table('vgallery_actor')." d ON d.aid=m.director LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=m.fid WHERE (m.$skeym LIKE '%$srchtxt%'$sqljib) and m.audit=1 and m.abtotal>=0$sqljia ORDER BY $types_sql limit ".(($page-1)*$ppp).", $ppp");

while($datarow = DB::fetch($query)){
	//处理标题
	$ms = strpos($datarow['vsubject'], $srchtxt);
	$m1 = floor(strlen($srchtxt)/2);
	$m2 = $ms-$m1-9;
	if($m2>0 && $skey != 3){
		$mm = cutstr($datarow['vsubject'], $m2, '');
		$mm = '..'.str_replace($mm, '', $datarow['vsubject']);

	}
	$datarow['vsubjectc'] = cutstr($mm ? $mm : $datarow['vsubject'], ($skey==3 ? 80 : 18), '..');
	$datarow['vsubjectc'] = str_replace($srchtxt, '<font color=red>'.$srchtxt.'</font>', $datarow['vsubjectc']);
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

	//如果详情模式开启，要进行判断演员并生成新数据
	if($datarow['actor'] && $skey == 3){
		$sidarray = explode("\t", $datarow['actor']);
		$i=0;
		$datarow['list_actor'] = null;
		foreach($sidarray as $val){
			$sidnewarray = explode(',', $val);
			if($sidnewarray[0]){
				$datarow['list_actor'] .= '<a href="'.sendurl('actor', 's', $sidnewarray[0]).'">'.$sidnewarray[1].'</a> ';
			}
		}
		//处理分类
		$sidarray = explode("\t", $datarow['sidstr']);
		$i=0;
		$datarow['list_sort'] = null;
		foreach($sidarray as $val){
			$sidnewarray = explode(',', $val);
			if($sidnewarray[0]){
				$datarow['list_sort'] .= '<a href="'.sendurl('list','s',$sidnewarray[0],$t,$m,$s,1).'">'.$sidnewarray[1].'</a> ';
			}
		}

	}

	$datalist[] = $datarow;
}

//连接地址处理
$pageurl = "&mod=search&skey=$skey&srchtxt=$srchtxt";
$multipage = multi($maxpage, $ppp, $page, PDIR.$pageurl."&types=$types");


//影视处理
if(in_array($skey, array(1,4,5))){
	//如果只选择一级目录，那么SQL语句又不一样
	$query = DB::query("SELECT m.id, m.fid, m.album, m.sidstr, m.vsubject, m.vprice, m.purl, m.uid, m.views, m.polls, m.valuate, m.director as directorid, m.actor, d.name as director, m.timelong, m.remote, m.dateline, m.chk_up, m.vsum, m.abtotal, e.evaluate_r, m.vinfo, m.years, m.address, m.language FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=m.id LEFT JOIN ".DB::table('vgallery_actor')." d ON d.aid=m.director LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=m.fid WHERE m.$skeym LIKE '%$srchtxt%' and m.audit=1 and m.abtotal>=0 and s.istv=1 and m.subid=0 ORDER BY $types_sql limit 2");

	while($datarow = DB::fetch($query)){
		//处理标题
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 80, '..');
		$datarow['vsubjectc'] = str_replace($srchtxt, '<font color=red>'.$srchtxt.'</font>', $datarow['vsubjectc']);
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
		$datarow['vinfo'] = str_replace(chr(13).chr(10), "", $datarow['vinfo']);
		$datarow['vinfo'] = cutstr(dhtmlspecialchars($datarow['vinfo']), 80, '..');

		//如果详情模式开启，要进行判断演员并生成新数据
		if($datarow['actor']){
			$sidarray = explode("\t", $datarow['actor']);
			$i=0;
			$datarow['list_actor'] = null;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0]){
					$datarow['list_actor'] .= '<a href="'.sendurl('actor', 's', $sidnewarray[0]).'">'.$sidnewarray[1].'</a> ';
				}
			}
			//处理分类
			$sidarray = explode("\t", $datarow['sidstr']);
			$i=0;
			$datarow['list_sort'] = null;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0]){
					$datarow['list_sort'] .= '<a href="'.sendurl('list','s',$sidnewarray[0],$t,$m,$s,1).'">'.$sidnewarray[1].'</a> ';
				}
			}

		}
		$searchtv[] = $datarow;
		$searchintvlist = 1;
	}
}

//筛选语言、地区、年代
if($searchintvlist || $skey==3){
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
	}

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
	}

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
	}
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

include template("gallery_search", "Kannol", PTEM);

?>