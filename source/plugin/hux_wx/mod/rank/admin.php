<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/rank/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>'.$ranklang['notfid'].'</th><th></th></tr>';
echo '<tr><td><input name="fid" type="text" value="'.$appconfig['fid'].'" size="40" /></td><td>'.$ranklang['notfidmsg'].'</td></tr>';

?>