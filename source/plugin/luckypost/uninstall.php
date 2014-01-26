<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(!submitcheck('submit', 1)) {

	cpmsg($installlang['delete_data_confirm'], 'action=plugins&operation=pluginuninstall&dir='.$_GET['dir'].'&installtype='.$_GET['installtype'].'&submit=yes', 'form', array('pluginname' => $plugin['name'], 'toversion' => $plugin['version']), '<br /><label><input type="checkbox" name="deleteDate" value="1" class="checkbox" />'.$installlang['delete_data_confirm_content'].'</label>', TRUE, ADMINSCRIPT.'?action=plugins&operation=pluginuninstall&dir='.$_GET['dir'].'&installtype='.$_GET['installtype'].'&submit=yes');

} else {

	if ($_POST['deleteDate']) {
		$plugintable = DB::table('common_plugin_luckypost');
		$pluginlogtable = DB::table('common_plugin_luckypostlog');
		$collectiontable = DB::table('common_plugin_luckypost_collection');
		$collectionlogtable = DB::table('common_plugin_luckypost_collectionlog');

	$sql = <<<EOF
DROP TABLE IF EXISTS {$plugintable};
DROP TABLE IF EXISTS {$pluginlogtable};
DROP TABLE IF EXISTS {$collectiontable};
DROP TABLE IF EXISTS {$collectionlogtable};

EOF;
		runquery($sql);
	}
}

$finish = true;
