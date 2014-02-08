<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/sns/lang/lang.'.currentlang().'.php';
echo '<tr class="header"><th>'.$snslang['url'].'</th><th></th></tr>';
echo '<tr><td><input name="url" type="text" value="'.$appconfig['url'].'" size="40" /></td><td></td></tr>';
echo '<tr class="header"><th>'.$snslang['welcome'].'</th><th></th></tr>';
echo '<tr><td><input name="welcome" type="text" value="'.$appconfig['welcome'].'" size="40" /></td><td></td></tr>';

?>