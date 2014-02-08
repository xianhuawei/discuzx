<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$wxsetting = $_G['cache']['plugin']['hux_weixin'];
define("TOKEN", $wxsetting['token']);
include DISCUZ_ROOT.'./source/plugin/hux_weixin/weixin.php';
$wechatObj = new wechatCallbackapi();
//if ($wxsetting['yz']) {
	$wechatObj->valid();
//} else {
//	$wechatObj->responseMsg();
//}
?>