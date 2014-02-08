<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/getpm/lang/lang.'.currentlang().'.php';

loaducenter();
$user = uc_get_user($_GET['touid'],1);
include template('index', 'hux_wx_getpm', './source/plugin/hux_wx/mod/getpm/template');
?>