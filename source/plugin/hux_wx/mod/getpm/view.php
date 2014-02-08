<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/getpm/lang/lang.'.currentlang().'.php';
$user = C::t('#hux_wx#hux_uc_members')->fetch_by_uid($_GET['touid'],'username');
include template('index', 'hux_wx_getpm', './source/plugin/hux_wx/mod/getpm/template');
?>