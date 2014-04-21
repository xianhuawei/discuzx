<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_connect.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'feed_sync_success'		=> 'Feed Synchronized successfully',//'同步发 Feed 成功',
	'deletethread_sync_success'	=> 'Delete thread synchronized successfully',//'删除主题同步成功',
	'deletethread_sync_failed'	=> 'Delete thread synchronization failed',//'删除主题同步失败',
	'server_busy'			=> 'Sorry, there are network problems or server busy for now, please try again later. Thank you.',//'抱歉，当前存在网络问题或服务器繁忙，请您稍候再试。谢谢。',
	'share_token_outofdate'		=> 'For your account security, Please use QQ account to log in again for upgrade your account security mechanisms<br/><br/>Click <a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt="QQ login" /></a>, the page will redirected',//'为了您的账号安全，请使用QQ帐号重新登录，将为您升级帐号安全机制<br/><br/>点击<a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt=QQ登录 /></a>页面将发生跳转',
	'share_success'			=> 'Shared successfully',//'分享成功',
	'broadcast_success'		=> 'Broadcasted successfully',//'转播成功',

	'qzone_title'			=> 'Title',//'标题',
	'qzone_reason'			=> 'Reason',//'理由',
	'qzone_picture'			=> 'Image',//'图片',
	'qzone_shareto'			=> 'Share to QQ space',//'分享到QQ空间',
	'qzone_to_friend'		=> 'Share to friends',//'分享给好友',
	'qzone_reason_default'		=> 'You can enter the reason or details to share',//'可以在这里输入分享原因或详细内容',
	'qzone_subject_is_empty'	=> 'The Sharing title can not be empty',//'分享标题不能为空',
	'qzone_subject_is_long'		=> 'The Sharing title exceeds the length limit',//'分享标题超过了长度限制',
	'qzone_reason_is_long'		=> 'The Sharing reason exceeds the length limit',//'分享理由超过了长度限制',
	'qzone_share_same_url'		=> 'The post is allready shared, Not need to repeat sharing',//'该帖子您已经分享过，不需要重复分享',

	'weibo_title'			=> 'To share my microblogging, by the way say something',//'分享到我的微博，顺便说点什么吧',
	'weibo_input'			=> 'You can enter <strong id=checklen></strong> characters',//'还能输入<strong id=checklen></strong>字',
	'weibo_select_picture'		=> 'Please choose an image to share',//'请选择分享图片',
	'weibo_share'			=> 'Share',//'转播',
	'weibo_share_to'		=> 'Share to Tencent microblogging',//'转播到腾讯微博',
	'weibo_reason_is_long'		=> 'Microblogging content exceeds the length limit',//'微博内容超过了长度限制',
	'weibo_same_content'		=> 'The post is allready broadcasted, not need to repeat broadcasting',//'该帖子您已经转播过，不需要重复转播',
	'weibo_account_not_signup'	=> 'Sorry, you have not open your microblogging account, can not share the content, <a href=http://t.qq.com/reg/index.php target=_blank style=color:#336699>Click here to open now</a>.',//'抱歉，您还未开通微博账号，无法分享内容，<a href=http://t.qq.com/reg/index.php target=_blank style=color:#336699>点击这里马上开通</a>',
	'user_unauthorized'		=> 'Sorry, you are not authorized to share the space post to the QQ, Tencent friends and Tencent microblog. Click <a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt="QQ Login"/></a> for authorize now',//'抱歉，您未授权分享主题到QQ空间、腾讯微博和腾讯朋友，点击<a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt=QQ登录 /></a>，马上完善授权',

	'connect_errlog_server_no_response'		=> 'Server not responding',//'服务器无响应',
	'connect_errlog_access_token_incomplete'	=> 'Interface AccessToken returned incomplete data',//'接口返回的AccessToken数据不完整',
	'connect_errlog_request_token_not_authorized'	=> 'User TmpToken is unauthorized or return incomplete data',//'用户TmpToken未授权或返回的数据不完整',
	'connect_errlog_sig_incorrect'			=> 'URL signature incorrect',//'URL签名不正确',

	'connect_tthread_broadcast'	=> 'Broadcast to microblog',//'转播微博',
	'connect_tthread_message'	=> '<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">From {nick} at Tencent microblog</a>',//'<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">来自 {nick} 的腾讯微博</a>',
	'connect_tthread_comment'	=> 'Microblog Comments',//'微博评论',
);

