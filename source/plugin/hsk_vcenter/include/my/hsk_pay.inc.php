<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

$types = intval($_GET['types']);
$types = !$types ? 1 : $types;
$_types		= $types ? '&types='.$types : null;

$page = max(1, intval($page));
$ppp = 20;

if($types == 1){

	//视频管理
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_pay')." where uid='$discuz_uid'");
	$thesumx = DB::result($query, 0);
	$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=my&action=pay'.$_types);

	$query = DB::query("SELECT p.dateline as ftime, p.price, p.money, v.*, s.sort, s.sid, u.shares, m.username FROM ".DB::table('vgallery_pay')." p LEFT JOIN ".DB::table('vgallerys')." v ON v.id=p.vid LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE p.uid='$discuz_uid' ORDER BY p.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

	while($datarow = DB::fetch($query)){
		$datarow['dateline1'] = gmdate("Y-m-d", $datarow['ftime'] + 3600 * $timeoffset);
		$datarow['dateline2'] = gmdate("H:i:s", $datarow['ftime'] + 3600 * $timeoffset);
		$datarow['dateline'] = gmdate("Y-m-d H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
		$payer = $datarow['money'];
		$datarow['money_name'] = $_G['setting']['extcredits'][$payer]['title'];
		$datarow['money_unit'] = $_G['setting']['extcredits'][$payer]['unit'];

		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datalist[] = $datarow;
	}
	include template("my_pay_1", 'Kannol', PTEM);

}elseif($types == 2){

	//视频管理
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." p LEFT JOIN ".DB::table('vgallery_paycount')." c ON c.vid=p.id where p.uid='$discuz_uid' and c.pnum>0");
	$thesumx = DB::result($query, 0);
	$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=my&action=pay'.$_types);

	$query = DB::query("SELECT v.*, s.sort, s.sid, c.*, e.* FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_paycount')." c ON c.vid=v.id WHERE v.uid='$discuz_uid' and c.pnum>0 ORDER BY c.lastday desc LIMIT ".(($page-1)*$ppp).", $ppp");

	while($datarow = DB::fetch($query)){
		$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + 3600 * $timeoffset);
		$datarow['dateline1'] = gmdate("Y-m-d", $datarow['lastday'] + 3600 * $timeoffset);
		$datarow['dateline2'] = gmdate("H:i:s", $datarow['lastday'] + 3600 * $timeoffset);
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datalist[] = $datarow;
	}
	include template("my_pay_2", 'Kannol', PTEM);

}

?>