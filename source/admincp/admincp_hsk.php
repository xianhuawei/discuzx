<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();

if(!$_G['inajax']) echo '
<style type="text/css">
._topvar	{color: green;		background: url(\'static/image/admincp/cloud/right.gif\') 0 50% no-repeat;	padding: 3px 0 3px 20px; }
._newvar	{color: red;		background: url(\'static/image/admincp/cloud/appnew.png\') 0 50% no-repeat;	padding: 3px 0 3px 20px; }
._error		{color: red;		background: url(\'static/image/admincp/cloud/wrong.gif\') 0 50% no-repeat;	padding: 3px 0 3px 20px; }
._close		{color: blue;		background: url(\'static/image/common/icon_manage.gif\') 0 50% no-repeat;	padding: 3px 0 3px 20px; }
._vipvar	{color: #ff006c;	background: url(\'static/image/common/access_allow.gif\') 0 50% no-repeat;	padding: 3px 0 3px 20px; }
._freevar	{color: green;		background: url(\'static/image/common/oshr.png\') 0 50% no-repeat;			padding: 3px 0 3px 20px; }
._loading	{color: #ff7800;	background: url(\'static/image/common/loading.gif\') 0 50% no-repeat;		padding: 3px 0 3px 20px; }
</style>
';

if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_config.inc.php')){
	require_once DISCUZ_ROOT.'./data/hskcenter/hsk_config.inc.php';
}else{
	cpmsg('hsk_hskconfig_error', '', 'error');
}
if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_ddzzinfo.inc.php')){
	require_once DISCUZ_ROOT.'./data/hskcenter/hsk_ddzzinfo.inc.php';
}

require_once DISCUZ_ROOT.'./source/admincp/hsk/function.func.php';
//得到此插件在系统中的ID
if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_pluginid.inc.php')){
	require_once DISCUZ_ROOT.'./data/hskcenter/hsk_pluginid.inc.php';
}else{
	madepluginid();
}

if(in_array($operation, $hsk_inarray) && file_exists($modfile = libfile("hsk/{$operation}", 'admincp'))) {
	include $modfile;
}else{
	cpmsg('hsk_hskcenter_error', '', 'error');
}

?>