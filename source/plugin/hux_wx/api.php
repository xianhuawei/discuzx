<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_GET['echostr']) {
    define('APPTYPEID', 127);
    define('CURSCRIPT', 'plugin');
    define('DISABLEXSSCHECK', true); 
    define('DISCUZROOT', substr(dirname(__FILE__), 0, -21));
    chdir(DISCUZROOT);
    
    $_GET['id'] = 'hux_wx';
    
    require './source/class/class_core.php';

    $discuz = C::app();
    $cachelist = array('plugin', 'diytemplatename');

    $discuz->cachelist = $cachelist;
    $discuz->init();

    define('CURMODULE', 'hux_wx');
	
	$_G['siteurl'] = substr($_G['siteurl'], 0, -21);
    
    $wxsetting = $_G['cache']['plugin']['hux_wx'];
	$paymoney = 'extcredits'.$wxsetting['money'];
	$paymoneyname = $_G['setting']['extcredits'][$wxsetting['money']]['title'];
	define("TOKEN", $wxsetting['token']);
	include DISCUZ_ROOT.'./source/plugin/hux_wx/weixin.php';
	$wechatObj = new wechatCallbackapi();
	$wechatObj->valid();
} else {
    echo 'Access Denied';
}
?>