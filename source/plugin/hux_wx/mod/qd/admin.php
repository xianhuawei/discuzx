<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/qd/lang/lang.'.currentlang().'.php';
$jlmoneynamea = $_G['setting']['extcredits'][1]['title'];
$jlmoneynameb = $_G['setting']['extcredits'][2]['title'];
$jlmoneynamec = $_G['setting']['extcredits'][3]['title'];
$jlmoneynamed = $_G['setting']['extcredits'][4]['title'];
$jlmoneynamee = $_G['setting']['extcredits'][5]['title'];
$jlmoneynamef = $_G['setting']['extcredits'][6]['title'];
$jlmoneynameg = $_G['setting']['extcredits'][7]['title'];
$jlmoneynameh = $_G['setting']['extcredits'][8]['title'];
echo '<tr class="header"><th>'.$qdlang['qdmoney'].'</th><th></th></tr>';
echo '<tr><td><input name="qdmoney" type="text" value="'.$appconfig['qdmoney'].'" size="40" /></td><td></td></tr>';
echo '<tr class="header"><th>'.$qdlang['qdlvnumtitle'].'</th><th></th></tr>';
echo '<tr><td><select name="lxqdmoney" style="width:220px;">';
if ($jlmoneynamea) {
	$selecteda = $appconfig['lxqdmoney'] == '1' ? 'selected' : '';
	echo '<option value="1" '.$selecteda.'>'.$jlmoneynamea.'</option>';
}
if ($jlmoneynameb) {
	$selectedb = $appconfig['lxqdmoney'] == '2' ? 'selected' : '';
	echo '<option value="2" '.$selectedb.'>'.$jlmoneynameb.'</option>';
}
if ($jlmoneynamec) {
	$selectedc = $appconfig['lxqdmoney'] == '3' ? 'selected' : '';
	echo '<option value="3" '.$selectedc.'>'.$jlmoneynamec.'</option>';
}
if ($jlmoneynamed) {
	$selectedd = $appconfig['lxqdmoney'] == '4' ? 'selected' : '';
	echo '<option value="4" '.$selectedd.'>'.$jlmoneynamed.'</option>';
}
if ($jlmoneynamee) {
	$selectede = $appconfig['lxqdmoney'] == '5' ? 'selected' : '';
	echo '<option value="5" '.$selectede.'>'.$jlmoneynamee.'</option>';
}
if ($jlmoneynamef) {
	$selectedf = $appconfig['lxqdmoney'] == '6' ? 'selected' : '';
	echo '<option value="6" '.$selectedf.'>'.$jlmoneynamef.'</option>';
}
if ($jlmoneynameg) {
	$selectedg = $appconfig['lxqdmoney'] == '7' ? 'selected' : '';
	echo '<option value="7" '.$selectedg.'>'.$jlmoneynameg.'</option>';
}
if ($jlmoneynameh) {
	$selectedh = $appconfig['lxqdmoney'] == '8' ? 'selected' : '';
	echo '<option value="8" '.$selectedh.'>'.$jlmoneynameh.'</option>';
}
echo '</select></td><td>'.$qdlang['qdlvnummsg'].'</td></tr>';
echo '<tr class="header"><th>'.$qdlang['qdlvtitle'].'</th><th></th></tr>';
echo '<tr><td><textarea name="qdlv" cols="30" rows="10">'.str_replace("[n]","\n",$appconfig['qdlv']).'</textarea></td><td>'.$qdlang['qdlvmsg'].'</td></tr>';

?>