<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$Plang = $scriptlang['hux_wx'];
if ($_GET['op'] == 'zjdel') {
	if ($_GET['eid']) {
		if ($_GET['formhash'] == formhash()) {
			C::t('#hux_wx#hux_wx_userjp')->delete($_GET['eid']);
		}
	} else {
		if(submitcheck('delsubmit')) {
			C::t('#hux_wx#hux_wx_userjp')->delete_by_state(1);
		}
	}
	cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admin', 'succeed');
} elseif ($_GET['op'] == 'zjupstate') {
	if ($_GET['formhash'] == formhash()) {
		C::t('#hux_wx#hux_wx_userjp')->update($_GET['eid'],array('state'=>1));
		cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admin', 'succeed');
	}
} else {
	$perpage = 20;
	$fnum = C::t('#hux_wx#hux_wx_userjp')->fetch_all_by_search();
	$page = max(1, intval($_GET['page']));
	$start = ($page-1)*$perpage;	
	$fquery = C::t('#hux_wx#hux_wx_userjp')->fetch_all_by_search('',"ORDER BY state ASC,dateline DESC",1,$start,$perpage);
	showformheader('plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admin&op=zjdel&');
	showtableheader();
	echo "<tr class='header'><th>".$Plang['sqren']."</th><th>".$Plang['jpname']."</th><th>".$Plang['jpstate']."</th><th>".$Plang['zjtime']."</th><th>".$Plang['op']."</th></tr>";
	foreach ($fquery as $fresult){
		$member = C::t('#hux_wx#hux_common_member')->fetch_by_uid($fresult['uid']);
		$fresult['username'] = $member['username'];
		$fresult['dateline'] = dgmdate($fresult['dateline']);
		if ($fresult['state'] == 1) {
			$fresult['jpstate'] = $Plang['ffed'];
			$fresult['op'] = "<a href=".ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=hux_wx&pmod=admin&op=zjdel&eid=".$fresult['id']."&formhash=".FORMHASH.">".$Plang['delete']."</a>";
		} else {
			$fresult['jpstate'] = $Plang['ffwei'];
			$fresult['op'] = "<a href=".ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=hux_wx&pmod=admin&op=zjupstate&eid=".$fresult['id']."&formhash=".FORMHASH.">".$Plang['upstate']."</a>";
		}
		echo "<tr><td>".$fresult['username']."</td><td>".$fresult['name']."</td><td>".$fresult['jpstate']."</td><td>".$fresult['dateline']."</td><td>".$fresult['op']."</td></tr>";
	}
	showtablefooter();
	$multi = multi($fnum, $perpage, $page, ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=hux_wx&pmod=admin");	
	showsubmit('delsubmit', $Plang['datadel'], '', '', $multi, false);
}
?>