<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/pic/lang/lang.'.currentlang().'.php';
include template('index', 'hux_wx_pic', './source/plugin/hux_wx/mod/pic/template');
?>