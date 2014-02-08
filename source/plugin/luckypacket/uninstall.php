<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(!submitcheck('submit', 1)) {

	cpmsg($installlang['delete_data_confirm'], 'action=plugins&operation=pluginuninstall&dir='.$_GET['dir'].'&installtype='.$_GET['installtype'].'&submit=yes', 'form', array('pluginname' => $plugin['name'], 'toversion' => $plugin['version']), '<br /><label><input type="checkbox" name="deleteDate" value="1" class="checkbox" />'.$installlang['delete_data_confirm_content'].'</label>', TRUE, ADMINSCRIPT.'?action=plugins&operation=pluginuninstall&dir='.$_GET['dir'].'&installtype='.$_GET['installtype'].'&submit=yes');

} else {

	if ($_POST['deleteDate']) {

		$sql = <<<EOF
DROP TABLE IF EXISTS pre_plugin_luckypacket;
DROP TABLE IF EXISTS pre_plugin_luckypacketlog;

EOF;
		runquery($sql);
	}
}

$finish = true;

