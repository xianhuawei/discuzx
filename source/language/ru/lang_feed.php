<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Valery Votintsev at sources.ru
 */

$lang = array
(

	'feed_blog_password'	=> '{actor} создал защищённую паролем запись в блоге {subject}',
	'feed_blog_title'	=> '{actor} создал новую запись в блоге',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} обновил свой альбом',
	'feed_album_body'	=> '<b>{album}</b><br />Изображений: {picnum}',
	'feed_pic_title'	=> '{actor} загрузил новое изображение',
	'feed_pic_body'		=> '{title}',



	'feed_poll'		=> '{actor} создал новый опрос',

	'feed_comment_space'	=> '{actor} оставил сообщение на стене для {touser}',
	'feed_comment_image'	=> '{actor} прокомментировал изображение {touser}',
	'feed_comment_blog'	=> '{actor} прокомментировал блог {touser}',
	'feed_comment_poll'	=> '{actor} прокомментировал опрос {poll}, принадлежащий {touser}',
	'feed_comment_event'	=> '{actor} прокомментировал мероприятие {event}, принадлежащее {touser}',
	'feed_comment_share'	=> '{actor} прокомментировал закладку {share}, размещенную {touser}',

	'feed_showcredit'	=> '{actor} сделал ставку: {credit} для поднятия пользователя {fusername} в <a href="misc.php?mod=ranklist&type=member" target="_blank">Топ-Листе</a>',
	'feed_showcredit_self'	=> '{actor} сделал ставку: {credit} для поднятия самого себя в <a href="misc.php?mod=ranklist&type=member" target="_blank">Топ-Листе</a>',
	'feed_doing_title'	=> '{actor} обновил настроение: {message}',
	'feed_friend_title'	=> '{actor} и {touser} стали друзьями',



	'feed_click_blog'	=> '{actor} оценил символом "{click}" блог пользователя {touser}: {subject}',
	'feed_click_thread'	=> '{actor} оценил символом "{click}" тему пользователя {touser}: {subject}',
	'feed_click_pic'	=> '{actor} оценил символом "{click}" изображение пользователя {touser}',
	'feed_click_article'	=> '{actor} оценил символом “{click}” статью пользователя {touser}: {subject}',


	'feed_task'		=> '{actor} выполнил задачу {task}',
	'feed_task_credit'	=> '{actor} выполнил задачу {task} и получил бонус: {credit}',

	'feed_profile_update_base'	=> '{actor} обновил свой профиль',
	'feed_profile_update_contact'	=> '{actor} обновил свои контакты',
	'feed_profile_update_edu'	=> '{actor} обновил информацию об образовании',
	'feed_profile_update_work'	=> '{actor} обновил данные о работе',
	'feed_profile_update_info'	=> '{actor} обновил свои персональные данные',
	'feed_profile_update_bbs'	=> '{actor} обновил личную информацию',
	'feed_profile_update_verify'	=> '{actor} подтвердил подлинность персональных данных',

	'feed_add_attachsize'		=> '{actor} потратил: {credit} для увеличения файлового хранилища на {size}. Теперь можно загрузить больше файлов и фотографий. (<a href="home.php?mod=spacecp&ac=credit&op=addsize">Я тоже так хочу!</a>)',

	'feed_invite'			=> '{actor} успешно пригласил на сайт пользователя {username}, и теперь они стали друзьями',

	'magicuse_thunder_announce_title'	=> '<strong>{username} издал "Клич"</strong>',
	'magicuse_thunder_announce_body'	=> 'Привет всем!<br /><a href="home.php?mod=space&uid={uid}" target="_blank">Прошу посетить мою персональную страницу!</a>',


	'feed_thread_title'		=> '{actor} создал новую тему',
	'feed_thread_message'		=> '<b>{subject}</b><br />{message}',

	'feed_reply_title'		=> '{actor} ответил в теме {subject} автора {author}',
	'feed_reply_title_anonymous'	=> 'Аноним ответил в теме {subject} автора {author}',
	'feed_reply_message'		=> '',

	'feed_thread_poll_title'	=> '{actor} создал новый опрос',
	'feed_thread_poll_message'	=> '<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title'	=> '{actor} проголосовал в опросе {subject}',
	'feed_thread_votepoll_message'	=> '',

	'feed_thread_goods_title'	=> '{actor} выставил на продажу новый товар',
	'feed_thread_goods_message_1'	=> '<b>{itemname}</b><br />Цена: {itemprice}, доп.цена: {itemcredit} {creditunit}',
	'feed_thread_goods_message_2'	=> '<b>{itemname}</b><br />Цена: {itemprice} руб.',
	'feed_thread_goods_message_3'	=> '<b>{itemname}</b><br />Цена: {itemcredit} {creditunit}',

	'feed_thread_reward_title'	=> '{actor} создал новую наградную тему',
	'feed_thread_reward_message'	=> '<b>{subject}</b><br />Вознаграждение: {rewardprice} {extcredits}',

	'feed_reply_reward_title'	=> '{actor} ответил в наградной теме {subject}',
	'feed_reply_reward_message'	=> '',

	'feed_thread_activity_title'	=> '{actor} создал новое мероприятие',
	'feed_thread_activity_message'	=> '<b>{subject}</b><br />Время начала: {starttimefrom}<br />Место проведения: {activityplace}<br />{message}',

	'feed_reply_activity_title'	=> '{actor} присоединился к мероприятию {subject}',
	'feed_reply_activity_message'	=> '',

	'feed_thread_debate_title'	=> '{actor} организовал новые дебаты',
	'feed_thread_debate_message'	=> '<b>{subject}</b><br />За: {affirmpoint}<br />Против: {negapoint}<br />{message}',

	'feed_thread_debatevote_title_1'	=> '{actor} ответил "За" в дебатах {subject}',
	'feed_thread_debatevote_title_2'	=> '{actor} ответил "Против" в дебатах {subject}',
	'feed_thread_debatevote_title_3'	=> '{actor} ответил "Мне пофиг" в дебатах {subject}',
	'feed_thread_debatevote_message_1'	=> '',
	'feed_thread_debatevote_message_2'	=> '',
	'feed_thread_debatevote_message_3'	=> '',

);

