<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_GET['echostr']) {
    define('APPTYPEID', 127);
    define('CURSCRIPT', 'plugin');
    define('DISABLEXSSCHECK', true); 
    define('DISCUZROOT', substr(dirname(__FILE__), 0, -25));
    chdir(DISCUZROOT);
    
    $_GET['id'] = 'hux_weixin';
    
    require './source/class/class_core.php';

    $discuz = C::app();
    $cachelist = array('plugin', 'diytemplatename');

    $discuz->cachelist = $cachelist;
    $discuz->init();

    define('CURMODULE', 'hux_weixin');
    
    $_G['siteurl'] = substr($_G['siteurl'], 0, -26);
    $_G['siteroot'] = substr($_G['siteroot'], 0, -26);
    
 $wxsetting = $_G['cache']['plugin']['hux_weixin'];
define("TOKEN", $wxsetting['token']);
include DISCUZ_ROOT.'./source/plugin/hux_weixin/weixin.php';
$wechatObj = new wechatCallbackapi();
//if ($wxsetting['yz']) {
	$wechatObj->valid();
//} else {
//	$wechatObj->responseMsg();
//}
} else {
    echo 'Access Denied';
}
?>