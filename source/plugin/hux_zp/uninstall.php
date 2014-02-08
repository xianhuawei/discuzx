<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$_unlang = array(
'uninstall_delsql_3' => '&#21368;&#36733;&#40;&#20445;&#30041;&#25968;&#25454;&#24211;&#41;',
'uninstall_delsql_2' => '&#21368;&#36733;&#40;&#20445;&#30041;&#21345;&#23494;&#25968;&#25454;&#34920;&#41;',
'uninstall_delsql_1' => '&#21368;&#36733;&#40;&#20840;&#37096;&#41;',
'uninstall_type_1' => '&#25554;&#20214;',
'uninstall_type_2' => '&#25552;&#20379;&#20102;',
'uninstall_type_3' => '&#31181;&#21368;&#36733;&#26041;&#24335;&#65292;&#35831;&#36873;&#25321;',
);

if(!isset($_GET['delsql'])){
	echo '<h3>'.cplang('discuz_message').'</h3>';
	$url = ADMINSCRIPT.'?action=plugins&operation=pluginuninstall&dir='.$_GET['dir'].'&installtype='.$_GET['installtype'];
	$xmls = '';
	$xmls .= '&nbsp;<input type="button" class="btn" onclick="location.href=\''.$url.'&delsql=3'.'\'" value="'.$_unlang['uninstall_delsql_3'].'">&nbsp;';
	$xmls .= '&nbsp;<input type="button" class="btn" onclick="location.href=\''.$url.'&delsql=2'.'\'" value="'.$_unlang['uninstall_delsql_2'].'">&nbsp;';
	$xmls .= '&nbsp;<input type="button" class="btn" onclick="location.href=\''.$url.'&delsql=1'.'\'" value="'.$_unlang['uninstall_delsql_1'].'">&nbsp;';
	echo '<div class="infobox"><h4 class="infotitle2">'.$_unlang['uninstall_type_1'].' '.$_GET['dir'].' '.$_unlang['uninstall_type_2'].' 3 '.$_unlang['uninstall_type_3'].'</h4>'.$xmls.'</div>';
	exit();
} elseif($_GET['delsql']=='1'){

$sql = <<<EOF

DROP TABLE pre_hux_zp;
DROP TABLE pre_hux_zp_user;
DROP TABLE pre_hux_zp_userjp;
DROP TABLE pre_hux_kami;

EOF;

runquery($sql);

} elseif($_GET['delsql']=='2'){

$sql = <<<EOF

DROP TABLE pre_hux_zp;
DROP TABLE pre_hux_zp_user;
DROP TABLE pre_hux_zp_userjp;

EOF;

runquery($sql);

}

$finish = TRUE;

?>