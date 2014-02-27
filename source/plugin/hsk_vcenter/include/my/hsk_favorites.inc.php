<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

$uid = intval($_GET['uid']);
$types = intval($_GET['types']);
$types = !$vid && !$types ? 1 : $types;


$search		= dhtmlspecialchars($_GET['searchkey']);
$_search	= $search ? '&searchkey='.$search : null;

$fid		= intval($_GET['fid']);
$pager		= intval($_GET['pager']);

$_fid		= $fid ? '&fid='.$fid : null;
$_types		= $types ? '&types='.$types : null;

foreach($_SORT as $val){
	if(!$val['sup']){//重新生成所有一级分类
		if($val['regroup']){
			$tmpstr = (array)unserialize($val['regroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if($relemiss){
				$newsort[] = $val;
			}
		}else{
			$newsort[] = $val;
		}
	}
}

$searchsql	= $search ? "and v.vsubject LIKE '%$search%'" : NULL;
$fid_sql	= $fid ? "and v.fid='$fid'" : null;
$_searchsql	= $search ? "and vsubject LIKE '%$search%'" : NULL;
$_fid_sql	= $fid ? "and fid='$fid'" : null;


$page = $pager ? 1 : $page;
$page = max(1, intval($page));
$ppp = 20;

if(!$uid){

	if(!submitcheck('reportsubmit')) {
	
		//视频管理
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_favorites')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid where f.uid='$discuz_uid' and v.audit=1 $searchsql $fid_sql");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=my&action=favorites'.$_types.$_fid.$_search);

		$query = DB::query("SELECT f.id as fvid, f.dateline as ftime, v.*, s.sort, s.sid, e.evaluate_r, e.evaluate_c, u.shares, m.username, ab.id as abid, ab.vsubject as ab_subject, ab.purl as ab_purl, ab.remote as ab_remote FROM ".DB::table('vgallery_favorites')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=f.vid LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE f.uid='$discuz_uid' and v.audit=1 $searchsql $fid_sql ORDER BY f.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

		while($datarow = DB::fetch($query)){
			$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
			$datarow['timelong'] = checkthetime($datarow['timelong']);
			$datarow['dateline1'] = gmdate("Y-m-d", $datarow['ftime'] + 3600 * $timeoffset);
			$datarow['dateline2'] = gmdate("H:i:s", $datarow['ftime'] + 3600 * $timeoffset);
			if(!$datarow['purl']){
				$datarow['purl'] = $datarow['ab_purl'];
				$datarow['remote'] = $datarow['ab_remote'];
			}
			if($datarow['abtotal'] == -1){
				//剧集要把专辑名称带上
				$datarow['vsubject'] = '</a><a href="'.sendurl('dlist', 0, $datarow['abid']).'" class="xi1" target="_blank">'.$datarow['ab_subject'].'</a> - <a href="'.sendurl('show', 'v', $datarow['id']).'">'.$datarow['vsubject'];
			}
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$datalist[] = $datarow;
		}
		include template("my_favorites_list", 'Kannol', PTEM);
	}else{//提交后

		$deletes = $_GET['deletes'];
		$deletes = array_unique($deletes);
		$t = count($deletes);

		//检查一下权限
		$deletesql = implode(",", $deletes);
		DB::query("UPDATE ".DB::table('vgallery_member')." SET favsum=favsum-$t WHERE mid='$discuz_uid'");
		if($deletesql){
			DB::query("DELETE FROM ".DB::table('vgallery_favorites')." WHERE id in($deletesql) and uid='$discuz_uid'");
		}
		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=my&action=favorites'.$_types.$_fid.$_search);
	}

}else{
	//看别人收藏的视频

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

	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_favorites')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid where f.uid='$uid' and v.audit=1");
	$thesumx = DB::result($query, 0);
	$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=my&action=favorites'.$_types.$_fid.$_search);

	$query = DB::query("SELECT f.id, v.*, s.sort, s.sid, e.*, u.shares, m.username, ab.id as abid, ab.vsubject as ab_subject, ab.purl as ab_purl, ab.remote as ab_remote FROM ".DB::table('vgallery_favorites')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE f.uid='$uid' and v.audit=1 ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

	while($datarow = DB::fetch($query)){
		if(!$datarow['purl']){
			$datarow['purl'] = $datarow['ab_purl'];
			$datarow['remote'] = $datarow['ab_remote'];
		}
		if($datarow['abtotal'] == '-1'){
			//剧集要把专辑名称带上
			$datarow['vsubject'] = $datarow['ab_subject'].' - '.$datarow['vsubject'];
		}
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 14, '');
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['timelong'] = checkthetime($datarow['timelong']);
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

	$navname = $abvalue['username']." 's ".lang('plugin/hsk_vcenter', 'chk_fav');
	list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($navname);
	$navtitle = $navname." - $navtitle";

	include template("gallery_author", "Kannol", PTEM);
}

?>