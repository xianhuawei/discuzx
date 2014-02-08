<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/bind/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>'.$bindlang['verify'].'</th><th></th></tr>';
echo '<tr><td><select name="verify" style="width:220px;">';
$selecteda = $appconfig['verify'] == '0' ? 'selected' : '';
$selectedb = $appconfig['verify'] == 'verify1' ? 'selected' : '';
$selectedc = $appconfig['verify'] == 'verify2' ? 'selected' : '';
$selectedd = $appconfig['verify'] == 'verify3' ? 'selected' : '';
$selectede = $appconfig['verify'] == 'verify4' ? 'selected' : '';
$selectedf = $appconfig['verify'] == 'verify5' ? 'selected' : '';
$selectedg = $appconfig['verify'] == 'verify6' ? 'selected' : '';
$selectedh = $appconfig['verify'] == 'verify7' ? 'selected' : '';
echo '<option value="0" '.$selecteda.'>'.$bindlang['close'].'</option>';
echo '<option value="verify1" '.$selectedb.'>verify1</option>';
echo '<option value="verify2" '.$selectedc.'>verify2</option>';
echo '<option value="verify3" '.$selectedd.'>verify3</option>';
echo '<option value="verify4" '.$selectede.'>verify4</option>';
echo '<option value="verify5" '.$selectedf.'>verify5</option>';
echo '<option value="verify6" '.$selectedg.'>verify6</option>';
echo '<option value="verify7" '.$selectedh.'>verify7</option>';
echo '</select></td><td>'.$bindlang['verifymsg'].'</td></tr>';

?>