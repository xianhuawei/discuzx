<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

if(empty($_GET['infloat']))
	exit('Access Denied, NO in float!');

$vid = intval($_GET['vid']);
$query = DB::query("SELECT v.*, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.id='$vid' and v.audit='1'");
if(!$viewdata = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}

$query = DB::query("SELECT p.*, u.username FROM ".DB::table('vgallery_pay')." p LEFT JOIN ".DB::table('common_member')." u ON u.uid=p.uid where p.vid='$vid' order by p.id desc");
while($log = DB::fetch($query)) {
	$log['dateline'] = dgmdate($log['dateline'], 'u');
	$log[$extcreditname] = abs($log[$extcreditname]);
	$loglist[] = $log;
}
include template("topicadmin_paylist", 'Kannol', PTEM);

?>