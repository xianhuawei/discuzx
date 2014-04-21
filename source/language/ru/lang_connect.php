<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_connect.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'feed_sync_success'		=> 'Лента новостей успешно синхронизирована',
	'deletethread_sync_success'	=> 'Удаление темы успешно синхронизировано',
	'deletethread_sync_failed'	=> 'Ошибка синхронизации удаления темы!',
	'server_busy'			=> 'Облом-с... Сервер занят или ошибка сети. Повторите попытку позже.',
	'share_token_outofdate'		=> 'For your account security, Please use QQ account to log in again for upgrade your account security mechanisms<br/><br/>Click <a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt="QQ login" /></a>, the page will redirected',//'为了您的账号安全，请使用QQ帐号重新登录，将为您升级帐号安全机制<br/><br/>点击<a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt=QQ登录 /></a>页面将发生跳转',
	'share_success'			=> 'Закладка успешно синхронизирована',
	'broadcast_success'		=> 'Синхронизация успешно завершена',

	'qzone_title'			=> 'Заголовок',
	'qzone_reason'			=> 'Описание',
	'qzone_picture'			=> 'Изображение',
	'qzone_shareto'			=> 'Поместить в QQ-закладки',
	'qzone_to_friend'		=> 'Отправить QQ-друзьям',
	'qzone_reason_default'		=> 'Введите описание',
	'qzone_subject_is_empty'	=> 'Описание не должно быть пустым!',
	'qzone_subject_is_long'		=> 'Заголовок слишком длинный!',
	'qzone_reason_is_long'		=> 'Заголовок слишком короткий!',
	'qzone_share_same_url'		=> 'The post is allready shared, Not need to repeat sharing',//'该帖子您已经分享过，不需要重复分享',

	'weibo_title'			=> 'Укажите текст для микроблоггинга',
	'weibo_input'			=> 'Вы можно ввести ещё <strong id=checklen></strong> символов',
	'weibo_select_picture'		=> 'Выберите изображение для закладки',
	'weibo_share'			=> 'В закладки',
	'weibo_share_to'		=> 'Отправить закладку в Tencent микроблог',
	'weibo_reason_is_long'		=> 'Описание слишком длинное!',
	'weibo_same_content'		=> 'The post is allready broadcasted, not need to repeat broadcasting',//'该帖子您已经转播过，不需要重复转播',
	'weibo_account_not_signup'	=> 'Для отправки контента в Tencent Вам нужно <a href=http://t.qq.com/reg/index.php target=_blank>зарегистрировать аккаунт в Tencent</a>',
	'user_unauthorized'		=> 'У Вас нет прав для отправки контента в QQ, Tencent микроблог и Tencent друзья.',

	'connect_errlog_server_no_response'		=> 'Нет ответа от сервера!',
	'connect_errlog_access_token_incomplete'	=> 'Интерфейс AccessToken вернул неполные данные!',
	'connect_errlog_request_token_not_authorized'	=> 'Пользователь TmpToken не авторизован, или переданы неполные данные!',
	'connect_errlog_sig_incorrect'			=> 'Неверная сигнатура URL!',

	'connect_tthread_broadcast'	=> 'Broadcast to microblog',//'转播微博',
	'connect_tthread_message'	=> '<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">From {nick} at Tencent microblog</a>',//'<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">来自 {nick} 的腾讯微博</a>',
	'connect_tthread_comment'	=> 'Microblog Comments',//'微博评论',
);

