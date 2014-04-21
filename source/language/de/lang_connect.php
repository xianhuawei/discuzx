<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_connect.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2011-08-12) by Coldcut - http://www.cybertipps.com
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'feed_sync_success'		=> 'Feeds erfolgreich synchronisiert',//'同步发 Feed 成功',
	'deletethread_sync_success'	=> 'Themensynchronisation erfolgreich gel&ouml;scht',//'删除主题同步成功',
	'deletethread_sync_failed'	=> 'L&ouml;schen der Themensynchronisation fehlgeschlagen',//'删除主题同步失败',
	'server_busy'			=> 'Sorry! Zur Zeit gibt es Netzwerkprobleme! Bitte versuche es sp&auml;ter noch einmal.',//'抱歉，当前存在网络问题或服务器繁忙，请您稍候再试。谢谢。',
	'share_token_outofdate'		=> 'For your account security, Please use QQ account to log in again for upgrade your account security mechanisms<br/><br/>Click <a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt="QQ login" /></a>, the page will redirected',//'为了您的账号安全，请使用QQ帐号重新登录，将为您升级帐号安全机制<br/><br/>点击<a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt=QQ登录 /></a>页面将发生跳转',
	'share_success'			=> 'Erfolgreich geteilt',//'分享成功',
	'broadcast_success'		=> 'Broadcast-Erfolg',//'转播成功',

	'qzone_title'			=> 'Titel',//'标题',
	'qzone_reason'			=> 'Grund',//'理由',
	'qzone_picture'			=> 'Bild',//'图片',
	'qzone_shareto'			=> 'QQ Raum teilen',//'分享到QQ空间',
	'qzone_to_friend'		=> 'An einen Freund senden',//'分享给好友',
	'qzone_reason_default'		=> 'Grund oder Details eingeben',//'可以在这里输入分享原因或详细内容',
	'qzone_subject_is_empty'	=> 'Teilen Titel darf nicht leer sein',//'分享标题不能为空',
	'qzone_subject_is_long'		=> 'Die L&auml;nge des Titels &uuml;berschreitet das Limit',//'分享标题超过了长度限制',
	'qzone_reason_is_long'		=> 'The Sharing reason exceeds the length limit',//'分享理由超过了长度限制',
	'qzone_share_same_url'		=> 'The post is allready shared, Not need to repeat sharing',//'该帖子您已经分享过，不需要重复分享',

	'weibo_title'			=> 'Dinge zu tun, und etwas sagen',//'分享到我的微博，顺便说点什么吧',
	'weibo_input'			=> 'Wort Eingabe <strong id=checklen></strong> Zeichen',//'还能输入<strong id=checklen></strong>字',
	'weibo_select_picture'		=> 'Bitte w&auml;hle ein Bild',//'请选择分享图片',
	'weibo_share'			=> 'Teilen',//'转播',
	'weibo_share_to'		=> 'Broadcast an Tencent Microblogging',//'转播到腾讯微博',
	'weibo_reason_is_long'		=> 'Microblogging Inhalts-L&auml;nge &uuml;berschreitet das Limit',//'微博内容超过了长度限制',
	'weibo_same_content'		=> 'The post is allready broadcasted, not need to repeat broadcasting',//'该帖子您已经转播过，不需要重复转播',
	'weibo_account_not_signup'	=> 'Sorry, dein Konto wurde f&uuml;r Microblogging nicht ge&ouml;ffnet. <a href=http://t.qq.com/reg/index.php target=_blank>Klicke hier</a> um es zu &ouml;ffnen.',//'抱歉，您还未开通微博账号，无法分享内容，<a href=http://t.qq.com/reg/index.php target=_blank>点击这里马上开通</a>。',
	'user_unauthorized'		=> 'Leider bist du nicht berechtigt, das Raum-Thema bei QQ, Tencent Tencent Microblogging mit Freunden zu teilen.',//'抱歉，您未授权分享主题到QQ空间、腾讯微博和腾讯朋友。',

	'connect_errlog_server_no_response'		=> 'Server antwortet nicht',//'服务器无响应',
	'connect_errlog_access_token_incomplete'	=> 'Schnittstelle AccessToken hat unvollst&auml;ndige Daten zur&uuml;ckgegeben',//'接口返回的AccessToken数据不完整',
	'connect_errlog_request_token_not_authorized'	=> 'TmpToken hat unberechtigte oder unvollst&auml;ndige Benutzer-Daten zur&uuml;ckgegeben',//'用户TmpToken未授权或返回的数据不完整',
	'connect_errlog_sig_incorrect'			=> 'Fehlerhafte URL Signatur',//'URL签名不正确',

	'connect_tthread_broadcast'	=> 'Broadcast to microblog',//'转播微博',
	'connect_tthread_message'	=> '<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">From {nick} at Tencent microblog</a>',//'<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">来自 {nick} 的腾讯微博</a>',
	'connect_tthread_comment'	=> 'Microblog Comments',//'微博评论',
);

