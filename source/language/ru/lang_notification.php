<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 */

$lang = array
(

	'type_wall'		=> 'Стена',
	'type_piccomment'	=> 'Комментарии к изображению',
	'type_blogcomment'	=> 'Комментарии к блогу',
	'type_clickblog'	=> 'Рейтинг блога',
	'type_clickarticle'	=> 'Рейтинг статьи статью',
	'type_clickpic'		=> 'Рейтинг изображения',
	'type_sharecomment'	=> 'Комментарии к закладкам',
	'type_doing'		=> 'Настроение',
	'type_friend'		=> 'Друзья',
	'type_credit'		=> 'Баллы',
	'type_bbs'		=> 'Форум',
	'type_system'		=> 'Система',
	'type_thread'		=> 'Темы',
	'type_task'		=> 'Задачи',
	'type_group'		=> 'Сообщества',

	'mail_to_user'		=> 'Новое уведомление',
	'showcredit'		=> '{actor} сделал ставку {credit} баллов для Вашего повышения в <a href="misc.php?mod=ranklist&type=member" target="_blank">Топ-листе</a> ',
	'share_space'		=> '{actor} добавил в закладки Вашу персональную страницу',
	'share_blog'		=> '{actor} добавил в закладки Ваш блог <a href="{url}" target="_blank">{subject}</a>',
	'share_album'		=> '{actor} добавил в закладки Ваш альбом <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic'		=> '{actor} добавил в закладки Ваше изображение из альбома <a href="{url}" target="_blank">{albumname}</a>',
	'share_thread'		=> '{actor} добавил в закладки Вашу тему <a href="{url}" target="_blank">{subject}</a>',
	'share_article'		=> '{actor} добавил в закладки Вашу статью <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note'	=> ' подарил Вам артефакт <a href="{url}" target="_blank">{name}</a>',
	'friend_add'		=> '{actor} и Вы стали друзьями',
	'friend_request'	=> '{actor} просит Вас добавить его в друзья: {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Добавить</a>',
	'doing_reply'		=> '{actor} ответил на Ваше <a href="{url}" target="_blank">настроение</a>',
	'wall_reply'		=> '{actor} оставил сообщение на <a href="{url}" target="_blank">Вашей стене</a>',
	'pic_comment_reply'	=> '{actor} ответил на Ваш <a href="{url}" target="_blank">комментарий к изображению</a>',
	'blog_comment_reply'	=> '{actor} ответил на Ваш <a href="{url}" target="_blank">комментарий к блогу</a>',
	'share_comment_reply'	=> '{actor} ответил на Ваш <a href="{url}" target="_blank">комментарий к закладке</a>',
	'wall'			=> '{actor} оставил <a href="{url}" target="_blank">сообщение</a> на Вашей стене.',
	'pic_comment'		=> '{actor} прокомментировал Ваше <a href="{url}" target="_blank">изображение</a>',
	'blog_comment'		=> '{actor} прокомментировал Ваш блог <a href="{url}" target="_blank">{subject}</a>',
	'share_comment'		=> '{actor} прокомментировал Вашу <a href="{url}" target="_blank">закладку</a>',
	'click_blog'		=> '{actor} оценил Ваш блог <a href="{url}" target="_blank">{subject}</a>',
	'click_pic'		=> '{actor} оценил Ваше <a href="{url}" target="_blank">изображение</a>',
	'click_article'		=> '{actor} оценил Вашу статью <a href="{url}" target="_blank">{subject}</a>',//'{actor} оценил Вашу <a href="{url}" target="_blank">статью</a>',
	'show_out'		=> '{actor} посетил Вашу персональную страницу. За посещение начислен бонус.',
	'puse_article'		=> 'Поздравляем, Ваша статья <a href="{url}" target="_blank">{subject}</a> добавлена! <a href="{newurl}" target="_blank">Открыть</a>',

	'myinvite_request'	=> 'Новые сообщения в приложениях <a href="home.php?mod=space&do=notice&view=userapp" target="_blank">Перейти</a>',


	'group_member_join'		=> '{actor} хочет стать участником сообщества <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>. <a href="{url}" target="_blank">Просмотр</a>',
	'group_member_invite'		=> '{actor} пригласил Вас присоединиться к сообществу <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>. <a href="{url}" target="_blank">Присоединиться</a>',
	'group_member_check'		=> 'Ваша заявка на вступление в сообщество <a href="{url}" target="_blank">{groupname}</a> одобрена. <a href="{url}" target="_blank">Посетить</a>',
	'group_member_check_failed'	=> 'Ваша заявка на вступление в сообщество <a href="{url}" target="_blank">{groupname}</a> отклонена',

	'reason_moderate'	=> 'Ваша тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была {modaction}. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> 'Ваш тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была {modaction}. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> 'Ваш пост в теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> было удалено. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> 'Ваш комментарий к <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> был удален. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> 'Ваше пост <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был заблокирован. Модератор: {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post'	=> 'Ваш пост в <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был {modaction}! Модератор: {actor}.<br />
				При получении {warninglimit} предупреждений, в течение {warningexpiration} дней, Вам будет автоматически запрещено отправлять сообщения в течение {warningexpiration} дней.<br />
				Количество Ваших предупреждений: {authorwarnings}.
				<div class="quote"><blockquote>{reason}</blockquote></div>',
//	'reason_warn_post' => '您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction}<br />
//连续 {warningexpiration} 天内累计 {warninglimit} 次警告，您将被自动禁止发言 {warningexpiration} 天。<br />
//截止至目前，您已被警告 {authorwarnings} 次，请注意！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'			=> 'Тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была перемещена в <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a>. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'			=> 'Тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была скопирована в <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a>. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'		=> 'Наградная тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была удалена. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'		=> 'В теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был добавлен штамп {stamp}. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'		=> 'В теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был снят штамп. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> 'В теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была добавлена иконка {stamp}. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> 'В теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> была удалена иконка. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> 'Ваш ответ в теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был прикреплён. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> 'Ваш ответ в теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> был откреплён. Модератор: {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'		=> 'Ваша тема {threadsubject} не прошла модерацию и была удалена! <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate'		=> 'Ваша тема <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> проверена и опубликована! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete'		=> 'Ответ не прошел модерацию и был удален! <p class="summary">Текст: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'		=> 'Ваш ответ был проверен и опубликован! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a> <p class="summary">Текст: <span>{post}</span></p><div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'			=> 'Вы получили {credit} баллов от {actor}. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">Открыть &rsaquo;</a>
					<p class="summary">{actor} сообщил: <span>{transfermessage}</span></p>',

	'addfunds'			=> 'Ваш запрос на пополнение успешно выполнен! Соответствующая сумма зачислена на Ваш счет.
					&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Открыть &rsaquo;</a>
					<p class="summary">Номер заказа: <span>{orderid}</span></p>
					<p class="summary">Оплата: <span>{price} руб.</span></p>
					<p class="summary">Зачислено баллов: <span>{value}</span></p>',
//	'addfunds' => '您提交的积分充值请求已完成，相应数额的积分已存入您的积分账户 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看 &rsaquo;</a>
//<p class="summary">订单号：<span>{orderid}</span></p><p class="summary">支出：<span>人民币 {price} 元</span></p><p class="summary">收入：<span>{value}</span></p>',

	'rate_reason'		=> '{actor} добавил Вам рейтинг: {ratescore} за Ваш пост <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a>. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason'	=> '{actor} снял рейтинг {ratescore} за Ваш пост в теме <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a>. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> купил Ваш товар <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, и ожидает его доставки. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'trade_buyer_confirm'	=> 'Вы купили товар <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>. Продавец <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> ожидает от Вас подтверждения о получении. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'trade_fefund_success'	=> 'Товар <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> был успешно возвращён. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Дать оценку &rsaquo;</a>',

	'trade_success'		=> 'Товар <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> успешно продан. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Дать оценку &rsaquo;</a>',

	'trade_order_update_sellerid'	=> 'Продавец <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> изменил товар <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>. Убедитесь, что условия продажи Вас устраивают! &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'trade_order_update_buyerid'	=> 'Покупатель <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> изменил заказ: <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>. Проверьте заказ. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'eccredit'		=> '{actor} оценил Вашу сделку &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Посмотреть &rsaquo;</a>',

	'activity_notice'	=> '{actor} подал заявку на участие в мероприятии <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'activity_apply'	=> '{actor} одобрил Ваше участие в мероприятии <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> '{actor} преложил Вам подробнее заполнить заявку на участие в мероприятии <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> '{actor} отклонил Вашу заявку на участие в мероприятии <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> '{actor} отменил мероприятие <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> '{actor} отправил новое уведомление о мероприятие <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> '{actor} присвоил статус "Лучший ответ" одному из ответов в Вашей теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'reward_bestanswer'	=> '{actor} присвоил статус "Лучший ответ" Вашему ответу в теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> 'Вы получили бонус за лучший ответ в теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'comment_add'		=> '{actor} ответил в Вашей теме <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor} ответил на Ваш пост в теме <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a>. &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">Открыть</a>',

	'task_reward_credit'	=> 'Поздравляем! Вы выполнили задачу: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, и получили бонус: {creditbonus}. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Показать баланс &rsaquo;</a></p>',

	'task_reward_magic'	=> 'Поздравляем! Вы выполнили задачу: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, и получили артефакт: {bonus}. <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a>',

	'task_reward_medal'	=> 'Поздравляем! Вы выполнили задачу: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, и получили медаль: <a href="home.php?mod=medal" target="_blank">{rewardtext}</a>. <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> сроком на: {bonus} дн.',

	'task_reward_medal_forever'	=> 'Поздравляем! Вы выполнили задачу: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, и получили медаль: <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> навсегда!',

	'task_reward_invite'	=> 'Поздравляем! Вы выполненили задачу: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>. Вы получили код приглашения: <a href="home.php?mod=spacecp&ac=invite" target="_blank">Код приглашения {rewardtext}</a> действителен в течение {bonus} дн.',

	'task_reward_group'	=> 'Поздравляем Вас с выполненной задачей: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>. Получено награждение группы: {rewardtext} на {bonus} дн. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">Посмотреть &rsaquo;</a>',

	'user_usergroup'	=> 'Уровень Вашей группы повышен до {usergroup}. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">Посмотреть права &rsaquo;</a>',

	'grouplevel_update'	=> 'Поздравляем! Уровень Вашей группы {groupname} был повышен до: {newlevel}',

	'thread_invite'		=> '{actor} приглашает Вас {invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Открыть &rsaquo;</a>',
	'invite_friend'		=> 'Поздравляем! Ваше приглашение завершено, и {actor} стал Вашим другом',

	'poke_request'		=> 'Привет от <a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}</span>. &nbsp; <a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Отправить привет</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Игнорировать</a>',

	'profile_verify_error'		=> 'Ваши данные: {verify} не прошли модерацию, Вам необходимо заполнить следующие поля:<br/>{profile}<br/>Причина отказа: {reason}',
	'profile_verify_pass'		=> 'Поздравляем! Ваши данные: {verify} успешно прошли модерацию.',
	'profile_verify_pass_refusal'	=> 'Извините, но Ваши данные: {verify} были отклонены.',
	'member_ban_speak'		=> '{user}, Вы переведены в режим Read-Only и не можете отправлять сообщения в течение {day} дн. ("0" означает пожизненный R/O). Причина: {reason}',

	'member_moderate_invalidate'	=> 'Ваша учетная запись была отклонена администратором. <a href="home.php?mod=spacecp&ac=profile" target="_blank">Заполните заново Ваши данные для регистрации</a><br />Сообщение администратора: <b>{remark}</b>',
	'member_moderate_validate'	=> 'Поздравляем! Ваша учетная запись была одобрена.<br />Сообщение администратора: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark'	=> 'Ваша учетная запись была отклонена администратором. <a href="home.php?mod=spacecp&ac=profile" target="_blank">Заполните заново Ваши данные для регистрации</a>',
	'member_moderate_validate_no_remark'	=> 'Ваша учетная запись была одобрена!',
	'manage_verifythread'		=> 'Ожидают новые темы <a href="admin.php?action=moderate&operation=threads&dateline=all" target="_blank">Перейти</a>',
	'manage_verifypost'		=> 'Одидают новые ответы <a href="admin.php?action=moderate&operation=replies&dateline=all" target="_blank">Перейти</a>',
	'manage_verifyuser'		=> 'Ожидают новые пользователи <a href="admin.php?action=moderate&operation=members" target="_blank">Перейти</a>',
	'manage_verifyblog'		=> 'Ожидают новые блоги <a href="admin.php?action=moderate&operation=blogs" target="_blank">Перейти</a>',
	'manage_verifydoing'		=> 'Ожидают новые настроения <a href="admin.php?action=moderate&operation=doings" target="_blank">Перейти</a>',
	'manage_verifypic'		=> 'Ожидают новые изображения <a href="admin.php?action=moderate&operation=pictures" target="_blank">Перейти</a>',
	'manage_verifyshare'		=> 'Ожидают новые закладки <a href="admin.php?action=moderate&operation=shares" target="_blank">Перейти</a>',
	'manage_verifycommontes'	=> 'Ожидают новые комментарии/ответы <a href="admin.php?action=moderate&operation=comments" target="_blank">Перейти</a>',
	'manage_verifyrecycle'		=> 'Новые темы в корзине <a href="admin.php?action=recyclebin" target="_blank">Перейти</a>',
	'manage_verifyrecyclepost'	=> 'Новые ответы в корзине <a href="admin.php?action=recyclebinpost" target="_blank">Перейти</a>',
	'manage_verifyarticle'		=> 'Ожидают новые статьи <a href="admin.php?action=moderate&operation=articles" target="_blank">Перейти</a>',
	'manage_verifymedal'		=> 'Ожидают новые медали <a href="admin.php?action=medals&operation=mod" target="_blank">Перейти</a>',
	'manage_verifyacommont'		=> 'Ожидают новые комментарии к статьям <a href="admin.php?action=moderate&operation=articlecomments" target="_blank">Перейти</a>',
	'manage_verifytopiccommont'	=> 'Ожидают новые комментарии к топикам <a href="admin.php?action=moderate&operation=topiccomments" target="_blank">Перейти</a>',
	'manage_verify_field'		=> 'Ожидают новые поля {verifyname} <a href="admin.php?action=verify&operation=verify&do={doid}" target="_blank">Обработать</a>',
	'system_notice'			=> '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration'		=> 'Срок действия следующих рекламных объявлений истекает через {day} дн.<br />{advs}',
	'report_change_credits'		=> '{actor} проверил Вашу жалобу, Вам добавлено баллов {creditchange}',
	'new_report'			=> 'Ождают новые жалобы, <a href="admin.php?action=report" target="_blank">Посмотреть</a>?',
	'new_post_report'		=> 'Ожидание новые жалобы на посты, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Посмотреть</a>',
//	'magics_receive' => '您收到 {actor} 送给您的道具 {magicname}
//<p class="summary">{actor} 说：<span>{msg}</span></p>
//<p class="mbn"><a href="home.php?mod=magic" target="_blank">回赠道具</a><span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">查看我的道具箱</a></p>',
	'magics_receive'		=> '{actor} подарил Вам артефакт {magicname}
					<p class="summary">Сообщение: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">Вернуть подарок</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">Мои артефакты</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
//'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
//'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
//'terms_of_services'		=> 'This is Rules.\nMust read!',

);

