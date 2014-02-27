<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

$page = max(1, intval($page));
$ppp = 20;

	
//视频管理
$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_report')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid where f.uid='$discuz_uid'");
$thesumx = DB::result($query, 0);
$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=my&action=favorites'.$_types.$_fid.$_search);

$query = DB::query("SELECT f.dateline as ftime, f.message, f.onsend, v.*, m.username, ab.id as abid, ab.vsubject as ab_subject, ab.purl as ab_purl, ab.remote as ab_remote FROM ".DB::table('vgallery_report')." f LEFT JOIN ".DB::table('vgallerys')." v ON v.id=f.vid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE f.uid='$discuz_uid' ORDER BY f.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

while($datarow = DB::fetch($query)){
	$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
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
include template("my_report_list", 'Kannol', PTEM);


?>