<?php

if(!submitcheck('actorsubmit')) {
	
	$ppp = 20;
	$start_limit = ($page - 1) * $ppp;
	$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('vgallery_report'));
	$multipage = multi($count, $ppp, $page, ADMINSCRIPT."?action=hsk&operation=center&do=$do");


	showformheader('hsk&operation=center&do='.$do);
	showtableheader('');
	
	showsubtitle(array('report_asdo', 'hsk_center_4', '', ''));

	$query = DB::query("SELECT r.*, m.id as mvid, m.vsubject, p.username, pp.username as author FROM ".DB::table('vgallery_report')." r LEFT JOIN ".DB::table('vgallerys')." m ON m.id=r.vid LEFT JOIN ".DB::table('common_member')." p ON p.uid=r.uid LEFT JOIN ".DB::table('common_member')." pp ON pp.uid=m.uid ORDER BY r.id desc LIMIT $start_limit, $ppp");
	while($datarow = DB::fetch($query)){
		$datarow['vsubject'] = $datarow['mvid'] ? '<a href="plugin.php?id=hsk_vcenter:hsk_vcenter&mod=view&vid='.$datarow['mvid'].'" target="_blank">'.$datarow['vsubject']."</a>" : "Not find the vod!";
		$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
		$checkeds = $datarow['onsend'] ? 'checked' : null;
		showtablerow('', array('', ''), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$datarow[id]\" $checkeds>",
			"$datarow[username]",
			"$datarow[dateline]",
			"$datarow[author] => $datarow[vsubject]",
		));
	}

	showsubmit('actorsubmit', 'submit', '', '', $multipage, false);

	showtablefooter();	
	showformfooter();

}else{
	//生成新数组
	if($ids = dimplode($_GET['delete'])) {
		DB::query("UPDATE ".DB::table('vgallery_report')." SET onsend='1' WHERE id in($ids)");
	}
	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=center&do='.$do, 'succeed');
}

?>