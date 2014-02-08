<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/roll/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>'.$rolllang['moneymax'].'</th><th></th></tr>';
echo '<tr><td><input name="moneymax" type="text" value="'.$appconfig['moneymax'].'" size="40" /></td><td></td></tr>';

?>