<?php

$query = DB::query("SELECT pluginid FROM ".DB::table("common_plugin")." WHERE identifier='hsk_vcenter'");
if($datarow = DB::fetch($query)){
	$_plglink = $datarow['pluginid'];
	header("location: admin.php?action=plugins&operation=config&do=$_plglink");
}else{
	cpmsg('hsk_hskcenter_error', '', 'error');
}

?>