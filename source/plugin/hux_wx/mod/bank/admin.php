<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/bank/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>'.$banklang['outmax'].'</th><th></th></tr>';
echo '<tr><td><input name="outmax" type="text" value="'.$appconfig['outmax'].'" size="40" /></td><td></td></tr>';
echo '<tr class="header"><th>'.$banklang['hqfeilv'].'</th><th></th></tr>';
echo '<tr><td><input name="hqfeilv" type="text" value="'.$appconfig['hqfeilv'].'" size="40" /></td><td></td></tr>';

?>