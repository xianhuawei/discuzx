<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

$vid = intval($_GET['vid']);
$types = intval($_GET['types']);
$types = !$vid && !$types ? 1 : $types;

$isadminsql = $adminid == 1 ? null : "and uid='$discuz_uid'";
$query = DB::query("SELECT fid, sid, sid2, sid3, sid4, sidstr, album, vsubject, id, uid FROM ".DB::table('vgallerys')." WHERE id='$vid'$isadminsql");
if(!$datarow = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}

$abid = $datarow['id'];
$absubject = $datarow['vsubject'];

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


if(!submitcheck('reportsubmit')) {

	//视频管理
	$isadminsql = $adminid == 1 ? "and v.uid='$datarow[uid]'" : "and vuid='$discuz_uid'";
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.audit=1 and v.album=0 and v.sup=0 $isadminsql $searchsql $fid_sql");
	$thesumx = DB::result($query, 0);
	$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=topicadmin&action=join&vid='.$vid.$_types.$_fid.$_search);

	$query = DB::query("SELECT v.*, s.sort, s.sid, e.*, u.shares, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.audit=1 and v.album=0 and v.sup=0 $isadminsql $searchsql $fid_sql ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

	while($datarow = DB::fetch($query)){
		$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
		$datarow['timelong'] = checkthetime($datarow['timelong']);
		$datarow['dateline1'] = gmdate("Y-m-d", $datarow['dateline'] + 3600 * $timeoffset);
		$datarow['dateline2'] = gmdate("H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datalist[] = $datarow;
	}

	list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo(lang('plugin/hsk_vcenter', 'topic_join'));
	$navname = lang('plugin/hsk_vcenter', 'topic_join');
	$navtitle = $navname." - $navtitle";

	include template("topicadmin_join", 'Kannol', PTEM);
}else{//提交后

	$deletes = $_GET['deletes'];

	//检查一下权限
	$deletesql = implode(",", $deletes);
	if($deletesql){
		$query = DB::query("SELECT id, views FROM ".DB::table('vgallerys')." WHERE id in($deletesql)$isadminsql");
		while($datarow1 = DB::fetch($query)){
			$views = $views+$datarow1['views'];
			$deleteids[] = $datarow1['id'];
		}
		$deletes = $deleteids;
	}
	$deletes = array_unique($deletes);
	$deletesql = implode(",", $deletes);
	$i = count($deletes);
	if(empty($deletes)) showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

	DB::query("UPDATE ".DB::table('vgallerys')." SET sup='$abid' where id in($deletesql)");
	DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum+$i, views=views+$views where id='$abid'");

	if($datarow['album'] == 3){
		$tmp_ablist	= $getvar['tmp_ablist'];
		update_ablist($vid);
		DB::query("UPDATE ".DB::table('vgallerys')." SET abtotal='-1' where id in($deletesql)");
	}

	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=topicadmin&action=join&vid='.$vid.$_types.$_fid.$_search);
}


?>