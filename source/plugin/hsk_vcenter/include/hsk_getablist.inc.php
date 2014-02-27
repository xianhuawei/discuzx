<?php


if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$key		= dhtmlspecialchars($_GET['key']);
$keys		= stripslashes(stripslashes($key));
//重新处理KEYS
$newkeys	= explode(',', $keys);
foreach($newkeys as $val){
	$keylen = strlen($val)-2;
}

$key		= addslashes($keys);
$search		= dhtmlspecialchars($_GET['search']);
$fid		= intval($_GET['fid']);
$inmyweb	= intval($_GET['inmyweb']) ? 1 : 0;
$close		= intval($_GET['close']);

$key_sql	= $keys && $inmyweb ? "and (right(a.flashid, $keylen) not in ($keys))" : null;
$fid_sql	= $fid ? "and a.fid='$fid'" : null;

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


$searchsql	= $search ? "and a.vsubject LIKE '%$search%'" : NULL;
$closesql = !$close ? 'and a.abtotal>=0 and s.istv=1' : null;

$mypage = $page ? 0 : 1;
$page = max(1, intval($page));
$ppp = 8;

$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." a LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=a.fid where a.subid=0 $closesql and a.sup=0 $key_sql $searchsql $fid_sql");
$thesumx = DB::result($query, 0);
//dexit($thesumx);
$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=getablist&fid='.$fid.'&key='.$keys.'&search='.$search.'&inmyweb='.$inmyweb.'&close='.$close, 0, 3);

$query = DB::query("SELECT a.id, a.vsubject, a.purl, a.vsum, a.abtotal, a.updateline, a.flashid, a.dateline, a.tvurl, s.sort, s.sid, a.absubject, a.remote FROM ".DB::table('vgallerys')." a LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=a.fid WHERE a.subid=0 $closesql and a.sup=0 $key_sql $searchsql $fid_sql ORDER BY a.updateline desc LIMIT ".(($page-1)*$ppp).", $ppp");
while($datarow = DB::fetch($query)){
	$datarow['updateline'] = gmdate("Y-m-d H:i", $datarow['updateline'] + $timeoffset * 3600);
	$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + $timeoffset * 3600);
	$datarow['keys'] = substr($datarow['flashid'], -1);
	$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
	$datarow['absubject'] = $datarow['absubject'] ? "_".$datarow['absubject'] : null;
	$datalist[] = $datarow;
}

//print_r($datalist);dexit();

include template("ajax_getablist", 'Kannol', PTEM);

?>