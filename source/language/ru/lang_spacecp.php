<?php

/**+++
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php by Valery Votintsev at sources.ru
 */

$lang = array(

	'by'			=> ' по ',
	'tab_space'		=> ' ',

	'share'			=> 'Закладки',
	'share_action'		=> 'добавил закладку',

	'pm_comment'		=> 'Ответить на сообщение',
	'pm_thread_about'	=> 'О Вашем постинге в теме &quot;{subject}&quot;',

	'wall_pm_subject'	=> 'Новое сообщение на стене',
	'wall_pm_message'	=> 'Здравствуйте, на Вашей стене оставлено новое сообщение. Для просмотра сообщение перейдите по ссылке: [url=\\1]Новое сообщение на Вашей стене[/url]',
	'reward'		=> 'Награды',
	'reward_info'		=> 'Бонус за голосование: + \\1 баллов',
	'poll_separator'	=> ', ',
	
	'pm_report_content'		=> '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a> Отчет по ЛС: <br><a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a> PM: {message}',
	'message_can_not_send_1'	=> 'Превышен Ваш суточный лимит отправки сообщений!',
	'message_can_not_send_2'	=> 'Вы отправляете сообщения слишком часто!',
	'message_can_not_send_3'	=> 'Вы можете отправлять сообщения только Вашим друзьям.',
	'message_can_not_send_4'	=> 'Извините, в данное время Вы не можете отправлять сообщения.',
	'message_can_not_send_5'	=> 'Вы превысили суточный лимит сообщений для Вашей группы.',
	'message_can_not_send_6'	=> 'Ваше сообщение заблокировано получателем!',
	'message_can_not_send_7'	=> 'Превышен лимит участников группового чата!',
	'message_can_not_send_8'	=> 'Вы не можете отправлять сообщения самому себе!',
	'message_can_not_send_9'	=> 'Получатель отсутствует или блокирует Ваши сообщения',
	'message_can_not_send_10'	=> 'В групповом чате должно быть не менее двух участников',
	'message_can_not_send_11'	=> 'Сеанс не найден',
	'message_can_not_send_12'	=> 'У Вас нет прав на выполнение данной операции',
	'message_can_not_send_13'	=> 'Это НЕ сообщение группового чата',
	'message_can_not_send_14'	=> 'Это НЕ личное сообщение',
	'message_can_not_send_15'	=> 'Неверные данные!',
	'message_can_not_send_onlyfriend'	=> 'Пользователь может получать личные сообщения только от друзей',


	'friend_subject'	=> '<a href="{url}" target="_blank">{username} просит добавить его в друзья</a>',
	'friend_request_note'	=> ', P.S.: {note}',
	'comment_friend'	=> '<a href="\\2" target="_blank">\\1 отправил Вам сообщение</a>',
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 прокомментировал Ваше изображение</a>',
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 прокомментировал Ваш блог</a>',
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 прокомментировал Ваше голосование</a>',
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 прокомментировал Вашу закладку</a>',
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 отправил Вам личное сообщение</a>',
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 передал Вам приветствие</a>',
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 ответил на Вашу тему</a>',
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 прокоментировал ваше мероприятие</a>',

	'friend_pm_reply'	=> '\\1 ответил на Ваше ЛС',
	'comment_friend_reply'	=> '\\1 ответил на Ваше сообщение',
	'blog_comment_reply'	=> '\\1 ответил на Ваш комментарий в блоге',
	'photo_comment_reply'	=> '\\1 ответил на Ваш комментарий к фото',
	'poll_comment_reply'	=> '\\1 ответил на Ваш комментарий в голосовании',
	'share_comment_reply'	=> '\\1 ответил на Ваш комментарий к закладке',
	'event_comment_reply'	=> '\\1 ответил на Ваш комментарий к мероприятию',

	'mail_my'		=> 'Напоминание о взаимодействии с друзьями',
	'mail_system'		=> 'Системные оповещения',

	'invite_subject'	=> '{username} приглашает вас стать его другом на сайте {sitename}',
	'invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Привет! Я, {username}, приглашаю Вас стать моим другом на сайте {sitename}.</h3><br>
				Буду рад увидеть Вас на сайте в роли своего друга.<br>Если у Вас возникнут вопросы, пожалуйста обращайтесь, я буду рад пообщаться с Вами!<br>Ниже приведена ссылка на мою страницу, где Вы сможете узнать обо мне больше.<br>
				<br>
				P.S.:<br>{saymsg}
				<br><br>
				<strong>Для получения кода приглашения перейдите по этой ссылке:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>Если Вы уже зарегистрированы на сайте {sitename}, Вы можете пройти на мою личную страницу:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'app_invite_subject'	=> '{username} приглашает Вас принять участие в игре &quot;{appname}&quot; на сайте {sitename}',
	'app_invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Привет! Я, {username}, приглашаю Вас принять участие в игре &quot;{appname}&quot; на сайте {sitename}</h3><br>
				<br>
				P.S.:<br>
				{saymsg}
				<br><br>
				<strong>Чтобы присоединиться к игре &quot;{appname}&quot;, перейдите по ссылке:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>Если Вы уже зарегистрированы на сайте {sitename}, Вы можете пройти на мою личную страницу:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'person'		=> 'чел.',
	'delete'		=> 'Удалить',

	'space_update'		=> '{actor} обновил свой профиль',

	'active_email_subject'	=> 'Активация Email',
	'active_email_msg'	=> 'Для активации Вашего Email скопируйте нижеприведённую ссылку и вставьте в адресную строку Вашего браузера:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space'		=> 'Закладка на сайт',
	'share_blog'		=> 'Закладка на блог',
	'share_album'		=> 'Закладка на альбом',
	'default_albumname'	=> 'Альбом по умолчанию',
	'share_image'		=> 'Закладка на фото',
	'share_article'		=> 'Закладка на статью',
	'album'			=> 'Альбомы',
	'share_thread'		=> 'добавил в закладки тему',
	'mtag'			=> 'Сообщества',
	'share_mtag'		=> 'Закладка на сообщество',
	'share_mtag_membernum'	=> 'Участников: {membernum}',
	'share_tag'		=> 'Закладка на тег',
	'share_tag_blognum'	=> 'Закладок в блогах: {blognum}',
	'share_link'		=> 'Закладка на ссылку',
	'share_video'		=> 'Закладка на видео',
	'share_music'		=> 'Закладка на аудио',
	'share_flash'		=> 'Закладка на Flash',
	'share_event'		=> 'Закладка на мероприятие',
	'share_poll'		=> 'добавил закладку на опрос \\1',
	'event_time'		=> 'Время проведения',
	'event_location'	=> 'Место порведения',
	'event_creator'		=> 'Создатель',
	'the_default_style'	=> 'Стиль по умолчанию',
	'the_diy_style'		=> 'Пользовательский стиль',

	'thread_edit_trail'		=> '<ins class="modify">[Тема отредактирована: \\1, \\2]</ins>',
	'create_a_new_album'		=> 'создал новый альбом',
	'not_allow_upload'		=> 'У вас нет прав на загрузку изображений',
	'not_allow_upload_extend'	=> 'Изображения типа: {extend} запрещены к загрузке',
	'files_can_not_exceed_size'	=> 'Размер файлов типа {extend} не должен превышать {size}',
	'get_passwd_subject'		=> 'Восстановление пароля по Email',
	'get_passwd_message'		=> 'Вы должны воспользоваться ссылкой для восстановления пароля в течение 3 суток:<br />\\1<br />Если Ваш браузер не может перейти по данной ссылке, скопируйте её и вставьте в адресную строку Вашего браузера, и нажмите клавишу "Enter")<br />На открывшейся странице введите Ваш новый пароль.',
	'file_is_too_big'		=> 'Файл слишком велик',

	'take_part_in_the_voting'		=> '{actor} проголосовал в опросе &quot;<a href="{url}" target="_blank">{subject}</a>&quot; (автор: {touser}), и получил бонус {reward} баллов.',
	'lack_of_access_to_upload_file_size'	=> 'Не удалось определить размер загруженного файла',
	'only_allows_upload_file_types'		=> 'Разрешенные форматы: jpg, jpeg, gif, png',
	'unable_to_create_upload_directory_server'	=> 'Не удаётся создать каталог для загрузки',
	'inadequate_capacity_space'		=> 'Ошибка загрузки. Недостаточно места на диске!',
	'mobile_picture_temporary_failure'	=> 'Ошибка перемещения временных файлов в указанный каталог',
	'ftp_upload_file_size'		=> 'Удаленная загрузка изображений по FTP не удалась',
	'comment'			=> 'Комментарий',
	'upload_a_new_picture'		=> 'загрузил новое изображение',
	'upload_album'			=> 'обновил альбом',
	'the_total_picture'		=> 'Всего \\1 изображений',

	'space_open_subject'	=> 'Откройте вашу личную страницу и позаботьтесь о её наполнении',
	'space_open_message'	=> 'Привет, сегодня я посетил Вашу личную страницу, и с сжалением отметил, что она не заполнена :(. Посмотрите сами: \\1space.php',



	'apply_mtag_manager'	=> 'Хочу(ет) стать модератором сообщества <a href="\\1" target="_blank">\\2</a>. Обоснование: \\3 <br /><a href="\\1" target="_blank">(Вход для управления)</a>',


	'magicunit'		=> 'шт.',
	'magic_note_wall'	=> '{actor} оставил сообщение на Вашей <a href="{url}" target="_blank">Стене</a>',
	'magic_call'		=> 'упомянул Ваше имя в постинге. <a href="{url}" target="_blank">Посмотреть</a>',


	'present_user_magics'	=> 'Вы получили в подарок от администратора артефакт: \\1',
	'has_not_more_doodle'	=> 'У Вас нет граффити',

	'do_stat_login'		=> 'Логины',
	'do_stat_mobilelogin'	=> 'Логины с мобилы',
	'do_stat_connectlogin'	=> 'Логины с QQ',
	'do_stat_register'	=> 'Регистрации',
	'do_stat_invite'	=> 'Инвайты',
	'do_stat_appinvite'	=> 'Приглашения в Приложения',
	'do_stat_add'		=> 'Публикации',
	'do_stat_comment'	=> 'Комментарии',
	'do_stat_space'		=> 'Взаимодействие пользователей',
	'do_stat_doing'		=> 'Настроения',
	'do_stat_blog'		=> 'Блоги',
	'do_stat_activity'	=> 'Мероприятия',
	'do_stat_reward'	=> 'Награды',
	'do_stat_debate'	=> 'Дебаты',
	'do_stat_trade'		=> 'Продажи',
	'do_stat_group'		=> "Сообщества",
	'do_stat_tgroup'	=> 'Сообщества',
	'do_stat_home'		=> 'Space',
	'do_stat_forum'		=> 'Форум',
	'do_stat_groupthread'	=> 'Темы сообществ',
	'do_stat_post'		=> 'Ответы в темах',
	'do_stat_grouppost'	=> 'Групповые ответы',
	'do_stat_pic'		=> 'Изображения',
	'do_stat_poll'		=> 'Опросы',
	'do_stat_event'		=> 'Мероприятия',
	'do_stat_share'		=> 'Закладки',
	'do_stat_thread'	=> 'Темы',
	'do_stat_docomment'	=> 'Комментарии на настроения',
	'do_stat_blogcomment'	=> 'Комментарии к блогам',
	'do_stat_piccomment'	=> 'Комментарии к фото',
	'do_stat_pollcomment'	=> 'Комментарии к опросам',
	'do_stat_pollvote'	=> 'Участие в опросах',
	'do_stat_eventcomment'	=> 'Комментарии к мероприятиям',
	'do_stat_eventjoin'	=> 'Участие в мероприятиях',
	'do_stat_sharecomment'	=> 'Комментарии к закладкам',
//	'do_stat_post'		=> 'Ответы в темах',
	'do_stat_click'		=> 'Рейты',
	'do_stat_wall'		=> 'Стены',
	'do_stat_poke'		=> 'Приветы',
	'do_stat_sendpm'	=> 'Отправка ЛС',
	'do_stat_addfriend'	=> 'Предложения дружбы',
	'do_stat_friend'	=> 'Стали друзьями',
	'do_stat_post_number'	=> 'Количество постов',
	'do_stat_statistic'	=> 'Общая статистика',
	'logs_credit_update_TRC'	=> 'Бонусы за задачи',
	'logs_credit_update_RTC'	=> 'Бонусы за темы',
	'logs_credit_update_RAC'	=> 'Бонусы за лучший ответ',
	'logs_credit_update_MRC'	=> 'Случайный артефакт',
	'logs_credit_update_BMC'	=> 'Покупка магии',
	'logs_credit_update_TFR'	=> 'Передача средств',
	'logs_credit_update_RCV'	=> 'Получение средств',
	'logs_credit_update_CEC'	=> 'Обмен баллов',
	'logs_credit_update_ECU'	=> 'UCenter расходы на обмен',
	'logs_credit_update_SAC'	=> 'Продажа вложений',
	'logs_credit_update_BAC'	=> 'Покупка вложений',
	'logs_credit_update_PRC'	=> 'Добавление рейтинга',
	'logs_credit_update_RSC'	=> 'Добавление комментариев',
	'logs_credit_update_STC'	=> 'Продажа тем',
	'logs_credit_update_BTC'	=> 'Покупка тем',
	'logs_credit_update_AFD'	=> 'Покупка баллов',
	'logs_credit_update_UGP'	=> 'Групповая покупка баллов',
	'logs_credit_update_RPC'	=> 'Бонус за жалобу',
	'logs_credit_update_ACC'	=> 'Участие в мероприятиях',
	'logs_credit_update_RCT'	=> 'Бонус за ответ',
	'logs_credit_update_RCA'	=> 'Бонус за лучший ответ',
	'logs_credit_update_RCB'	=> 'Возврат бонуса за ответ',
	'logs_credit_update_CDC'	=> 'Использование купонов',

	'logs_credit_update_RGC'	=> 'Удаление подарка',
	'logs_credit_update_BGC'	=> 'Возврат подарка',
	'logs_credit_update_AGC'	=> 'Получение подарка',
	'logs_credit_update_RKC'	=> 'Поднятие в Топ',
	'logs_select_operation'		=> 'Выберите тип операции',
	'task_credit'			=> 'Баллы за задачу',
	'special_3_credit'		=> 'Баллы за тему',
	'special_3_best_answer'		=> 'Баллы за лучший ответ',
	'magic_credit'			=> 'Баллы за случайный артефакт',
	'magic_space_gift'		=> 'Получение подарка',
	'magic_space_re_gift'		=> 'Возврат неиспользованного подарка',
	'magic_space_get_gift'		=> 'Подарки за посещение профиля',
	'credit_transfer'		=> 'Передача баллов',
	'credit_transfer_tips'		=> 'Получение баллов',
	'credit_exchange_tips_1'	=> 'Обмен баллов',
	'credit_exchange_to'		=> 'Обмен на ',
	'credit_exchange_center'	=> 'Центр обмена баллов через UCenter',
	'attach_sell'			=> 'Продажа',
	'attach_sell_tips'		=> 'Получены баллы за скачивание вложений',
	'attach_buy'			=> 'Покупки',
	'attach_buy_tips'		=> 'Расход баллов на приложения',
	'grade_credit'			=> 'Приход за рейтинг',
	'grade_credit2'			=> 'Расход за рейтинг',
	'thread_credit'			=> 'Приход за платные темы',
	'thread_credit2'		=> 'Расход на платные темы',
	'buy_credit'			=> 'Пополнение баллов',
	'buy_usergroup'			=> 'Расход доступ к сообществам',
	'report_credit'			=> 'Расход/Приход за жалобы',
	'join'				=> 'Участие',
	'activity_credit'		=> 'Расходы на мероприятия',
	'thread_send'			=> 'Расход на создание тем',
	'replycredit'			=> 'Расход за ответы',
	'add_credit'			=> 'Награды',
	'recovery'			=> 'Восстановление',
	'replycredit_post'		=> 'Награды за ответы',
	'replycredit_thread'		=> 'Баллы за дайджесты',
	'card_credit'			=> 'Баллы за пополнение ч-з купон',
	'ranklist_top'			=> 'Баллы за заявки на ТОП',

	'profile_unchangeable'		=> 'Внимание! Данная информация заполняется только один раз! После сохранения изменение будет невозможно!',
	'profile_is_verifying'		=> 'Данная информация находится на проверке',
	'profile_mypost'		=> 'Мои постинги',
	'profile_need_verifying'	=> 'Данная информация требует проверки модератором',
	'profile_edit'			=> 'Изменить',
	'profile_censor'		=> '(список запрещённых слов)',
	'profile_verify_modify_error'	=> 'Поле &quot;{verify}&quot; было проверено. Изменению не подлежит!',
	'profile_verify_verifying'	=> 'Ваша информация &quot;{verify}&quot; отправлена на проверку. Пожалуйста, дождитесь завершения проверки модератором.',

//'district_level_0'		=> '- Country -',//'-国家-',
	'district_level_1'		=> '- Страна- ',
	'district_level_2'		=> '- Регион -',
	'district_level_3'		=> '- Город -',
	'district_level_4'		=> '- Район/Поселение -',
	'invite_you_to_visit'		=> 'Пользователь {user} приглашает Вас посетить сайт {bbname}',

	'spacecp_message_prompt'	=> '(Поддерживается {msg} код. Максимум 1000 символов)',
	'card_update_doing'		=> ' <a class="xi2" href="###">[Обновить настроение]</a>',
	'email_acitve_message'		=> '<img src="{imgdir}/mail_inactive.png" alt="Не проверено" class="vm" />
					   <span class="xi1">Email ({newemail}) ожидает активации...</span><br />
						Вам было отправлено сообщение с кодом активации. <br />Проверьте свою электронную почту и потвердите активацию данного Email.<br>
						Если Вы не получили письмо с подтверждением, <br />Вы можете изменить Ваш Email и повторно <a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">Отправить запрос на активацию</a>',

);

