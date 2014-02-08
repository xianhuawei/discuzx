<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/tool/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>Appkey</th><th></th></tr>';
echo '<tr><td><input name="appkey" type="text" value="'.$appconfig['appkey'].'" size="40" /></td><td>'.$toollang['appidmsg'].'</td></tr>';
echo '<tr class="header"><th>Secret</th><th></th></tr>';
echo '<tr><td><input name="appsk" type="text" value="'.$appconfig['appsk'].'" size="40" /></td><td></td></tr>';

?>