<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2012-01-23) by Coldcut - http://www.cybertipps.com
 */

$lang = array(

	'by'			=> 'von',
	'tab_space'		=> ' ',

	'share'			=> 'Share',
	'share_action'		=> 'geteilt',

	'pm_comment'		=> 'Auf Kommentar antworten',
	'pm_thread_about'	=> 'Es gibt {subject} Beitr&auml;ge',

	'wall_pm_subject'	=> 'Hi ich hinterlie&szlig; einen Kommentar auf deiner Pinwand',
	'wall_pm_message'	=> 'Ich hinterlie&szlig; eine Nachricht auf deiner Pinwand: [url=\\1]Hier klicken[/url]',
	'reward'		=> 'Belohnung',
	'reward_info'		=> 'An der Abstimmung beteiligen  \\1 Punkte',
	'poll_separator'	=> '" "',

	'pm_report_content'		=> '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a> Report message:<br>from <a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a> short message<br>content: {message}',//'<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a>举报短消息：<br>来自<a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a>的短消息<br>内容：{message}',
	'message_can_not_send_1'	=> 'Failed to send. You have exceeds the 24 hours limit of sent messages',//'发送失败，您当前超出了24小时内两人会话的上限',
	'message_can_not_send_2'	=> 'You have sent a short message twice too fast - please wait',//'两次发送短消息太快，请稍候再发送',
	'message_can_not_send_3'	=> 'Sorry, you can not to send PM to non-friends',//'抱歉，您不能给非好友批量发送短消息',
	'message_can_not_send_4'	=> 'Sorry, currently you can not use the Send Message function',//'抱歉，您目前还不能使用发送短消息功能',
	'message_can_not_send_5'	=> 'You have exceeded the group chat number of messages within 24 hours session',//'您超出了24小时内群聊会话的上限',
	'message_can_not_send_6'	=> 'Recipient have blocked your message',//'对方屏蔽了您的短消息',
	'message_can_not_send_7'	=> 'The group chat maximum number of messages exceeded',//'超过了群聊人数上限',
	'message_can_not_send_8'	=> 'Sorry, you can not send PM to yourself',//'抱歉，您不能给自己发短消息',
	'message_can_not_send_9'	=> 'The message is empty or the recipient blocked your message',//'收件人为空或对方屏蔽了您的短消息',
	'message_can_not_send_10'	=> 'Initiated group chat must have at least two members',//'发起群聊人数不能小于两人',
	'message_can_not_send_11'	=> 'The session does not exist',//'该会话不存在',
	'message_can_not_send_12'	=> 'Sorry, you do not have permission for this operation',//'抱歉，您没有权限操作',
	'message_can_not_send_13'	=> 'This is not a group chat message',//'这不是群聊消息',
	'message_can_not_send_14'	=> 'This is not private message',//'这不是私人消息',
	'message_can_not_send_15'	=> 'Wrong data',//'数据有误',
	'message_can_not_send_onlyfriend'	=> 'The user can receive short message only from friends',//'该用户只接收好友发送的短消息',


	'friend_subject'	=> '<a href="{url}" target="_blank">{username} gab dir eine Freundschaftsanfrage</a>',
	'friend_request_note'	=> ', Postscript: {note}',//'，附言：{note}',
	'comment_friend'	=>'<a href="\\2" target="_blank">\\1 hat einen Kommentar hinterlassen</a>',
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deinem Foto hinterlassen</a>',
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deinem Blog hinterlassen</a>',
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deiner Umfrage hinterlassen</a>',
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deine Shares hinterlassen</a>',
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 hat dir eine Nachricht gesendet</a>',
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 hat dir Gr&uuml;sse gesendet</a>',
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 antwortete auf ein Thema</a>',
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deine Events hinterlassen</a>',

	'friend_pm_reply'	=> '\\1 beantwortete deine Nachricht',
	'comment_friend_reply'	=> '\\1 beantwortete deine Pinwand Nachricht',
	'blog_comment_reply'	=> '\\1 beantwortete deinen Blog Kommentar',
	'photo_comment_reply'	=> '\\1 beantwortete deinen Foto Kommentar',
	'poll_comment_reply'	=> '\\1 beantwortete deinen Umfrage Kommentar',
	'share_comment_reply'	=> '\\1 beantwortete dein Share Kommentar',
	'event_comment_reply'	=> '\\1 beantwortete deinen Event Kommentar',

	'mail_my'		=> 'Interagiere mit deinen Freunden',//'好友与我的互动提醒',
	'mail_system'		=> 'System Warnung',//'系统提醒',

	'invite_subject'	=> '{username} hat dich eingeladen bei {sitename} beizutreten und dein Freund zu werden.',
	'invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi! Ich bin {username}! Ich habe ein Profil bei {sitename} erstellt. Ich hoffe du wirst mein Freund.</h3><br>
				Du kannst vieles über mich erfahren und mit mir in Kontakt treten.<br>
				<br>
				Einladungs PostScript:<br>{saymsg}
				<br><br>
				<strong>Bitte klicke auf den untenstehenden Link um die Einladung anzunehmen:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>Wenn du einen bestehenden Account auf {sitename} hast, klicke bitte auf den folgenden Link um auf meine persönliche Homepage zu kommen:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'app_invite_subject'	=> '{username} hat dich bei {sitename} eingeladen um mit {appname} Spass zu haben.',
	'app_invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi! Ich bin {username} von {sitename} und spiele {appname}. Ich möchte dich einladen um gemeinsam zu spielen.</h3><br>
				<br>
				Einladungs PostScript:<br>
				{saymsg}
				<br><br>
				<strong>Klicke auf den Link darunter um die Einladung zum Spielen von {appname} anzunehmen.</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>Wenn du einen bestehenden Account bei {sitename} hast, klicke bitte den Link um mein Profil zu besuchen:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'person'		=> 'Personen',
	'delete'		=> 'L&ouml;schen',

	'space_update'		=> '{actor} hat den Space aktualisiert',

	'active_email_subject'	=> 'Aktivierungs E-Mail',
	'active_email_msg'	=> 'Bitte kopiere die Url und f&uuml;ge sie in deinen Browser ein, und aktiviere deine E-Mail<br>URL:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space'		=> 'Benutzer teilen',
	'share_blog'		=> 'Blog teilen',
	'share_album'		=> 'Album teilen',
	'default_albumname'	=> 'Standard Album',
	'share_image'		=> 'Bild teilen',
	'share_article'		=> 'Artikel weiterempfehlen',
	'album'			=> 'Album',
	'share_thread'		=> 'Thema teilen',
	'mtag'			=> '{$_G[setting][navs][3][navname]}',
	'share_mtag'		=> 'Gruppe teilen',
	'share_mtag_membernum'	=> 'Insgesammt {membernum} Mitglieder',
	'share_tag'		=> 'Tags teilen',
	'share_tag_blognum'	=> 'Insgesammt {blognum} Blogs',
	'share_link'		=> 'Link teilen',
	'share_video'		=> 'Video teilen',
	'share_music'		=> 'Musik teilen',
	'share_flash'		=> 'Teile Flash',
	'share_event'		=> 'Event teilen',
	'share_poll'		=> 'Freigabe einer \\1 Abstimmung',
	'event_time'		=> 'Event Zeit',
	'event_location'	=> 'Event Location',
	'event_creator'		=> 'Ersteller',
	'the_default_style'	=> 'Standard Stil',
	'the_diy_style'		=> 'Ausgew&auml;hltes Style',

	'thread_edit_trail'	=> '<ins class="modify">[Das Thema von \\1 wurde \\2 bearbeitet]</ins>',
	'create_a_new_album'	=> 'Erstelle ein neues Album',
	'not_allow_upload'	=> 'Upload nicht erlaubt',
	'not_allow_upload_extend'	=> 'Bilder Upload {extend} nicht erlaubt',//'不允许上传{extend}类型的图片',
	'files_can_not_exceed_size'	=> '{extend} Class-Dateien k&ouml;nnen {size} nicht &uuml;berschreiten',//'{extend}类文件不能超过{size}',
	'get_passwd_subject'		=> 'Passwort vergessen, E-Mail',
	'get_passwd_message'		=> 'Klick auf den Link um dein Passwort innerhalb von 3 Tagen zu aktivieren<br />\\1<br />(Kopiere den Link und f&uuml;ge sie in den Browser ein falls die Url nicht anklickbar ist)<br />',
	'file_is_too_big'		=> 'Datei ist zu gro&szlig;',

	'take_part_in_the_voting'		=> '{actor} beteiligt {touser} den {reward} bewerten <a href="{url}" target="_blank">{subject}</a>',
	'lack_of_access_to_upload_file_size'	=> 'Zugriff auf Dateigr&ouml;sse nicht m&ouml;glich',
	'only_allows_upload_file_types'		=> 'Nur jpg, gif, png sind erlaubt',
	'unable_to_create_upload_directory_server'	=> 'kann keinen Verzeichniss Server erstellen',
	'inadequate_capacity_space'		=> 'Dein Speicherplatz ist voll',
	'mobile_picture_temporary_failure'	=> 'Kann tempor&auml;re Fotos nicht verschieben',
	'ftp_upload_file_size'			=> 'Upload fehlgeschlagen',
	'comment'			=> 'Kommentar',
	'upload_a_new_picture'		=> 'hat ein neues Bild hochgeladen',
	'upload_album'			=> 'Album hochgeladen',
	'the_total_picture'		=> 'insgesammt \\1 Fotos',

	'space_open_subject'	=> 'Komm, und mach mehr aus deinem Profil.',
	'space_open_message'	=> 'Hi! Ich habe dein Profil heute angesehen, scheint als ob du es noch nicht benutzt hast \\1space.php',



	'apply_mtag_manager'	=> 'Admin Anwendung f&uuml;r <a href="\\1" target="_blank">\\2</a> Die Gruppen Hauptgr&uuml;nde sind wie folgt:\\3.<a href="\\1" target="_blank">(Hier klicken um in die Verwaltung zu kommen)</a>',


	'magicunit'		=> 'Unit',
	'magic_note_wall'	=> 'Es gibt <a href="{url}" target="_blank">Nachrichten</a> f&uuml;r dich auf der Pinwand.',
	'magic_call'		=> 'Mittelpunkt deines Namen: <a href="{url}" target="_blank">Siehe hier</a>',


	'present_user_magics'	=> 'Du erh&auml;lst ein Geschenk von den Administrator Requisiten:\\1',
	'has_not_more_doodle'	=> 'Du hast noch ein Graffiti-Board',

	'do_stat_login'		=> 'Besuche Benutzer',
	'do_stat_mobilelogin'	=> 'Mobile anmelden',//'手机访问',
	'do_stat_connectlogin'	=> 'QQ anmelden',//'QQ登录访问',
	'do_stat_register'	=> 'Neue registrierte Nutzer',
	'do_stat_invite'	=> 'Freunde eingeladen',
	'do_stat_appinvite'	=> 'Anwendungen eingeladen',
	'do_stat_add'		=> 'Release Information',
	'do_stat_comment'	=> 'Interaktive',
	'do_stat_space'		=> 'User Interactive',
	'do_stat_doing'		=> 'Aufnahme',
	'do_stat_blog'		=> 'Blog',
	'do_stat_activity'	=> 'Aktivit&auml;t',
	'do_stat_reward'	=> 'Belohnung',
	'do_stat_debate'	=> 'Diskusion',
	'do_stat_trade'		=> 'Waren',
	'do_stat_group'		=> "Gruppe {$_G[setting][navs][3][navname]}",
	'do_stat_tgroup'	=> "{$_G[setting][navs][3][navname]}",
	'do_stat_home'		=> "{$_G[setting][navs][4][navname]}",
	'do_stat_forum'		=> "{$_G[setting][navs][2][navname]}",
	'do_stat_groupthread'	=> 'Gruppenthema',
	'do_stat_post'		=> 'Themen Antworten',
	'do_stat_grouppost'	=> 'Gruppen Antworten',
	'do_stat_pic'		=> 'Bild',
	'do_stat_poll'		=> 'Bewerten',
	'do_stat_event'		=> 'Events',
	'do_stat_share'		=> 'Teilen',
	'do_stat_thread'	=> 'Thema',
	'do_stat_docomment'	=> 'Aufnahme Antwort',
	'do_stat_blogcomment'	=> 'Blog-Kommentare',
	'do_stat_piccomment'	=> 'Bild Kommentare',
	'do_stat_pollcomment'	=> 'Umfrage-Kommentare',
	'do_stat_pollvote'	=> 'Umfrage-Abstimmung',
	'do_stat_eventcomment'	=> 'Event-Kommentare',
	'do_stat_eventjoin'	=> 'Teilnahme an Aktivit&auml;ten',
	'do_stat_sharecomment'	=> 'geteilte Kommentare',
//	'do_stat_post'		=> 'Thema Antworten',
	'do_stat_click'		=> 'Position',
	'do_stat_wall'		=> 'Nachricht',
	'do_stat_poke'		=> 'Hallo',
	'do_stat_sendpm'	=> 'PM senden',
	'do_stat_addfriend'	=> 'Freund-Anfrage',
	'do_stat_friend'	=> 'Freunde werden',
	'do_stat_post_number'	=> 'Post count',
	'do_stat_statistic'	=> 'Merge-Statistik',
'logs_credit_update_TRC'	=> 'Task reward',//'任务奖励',
'logs_credit_update_RTC'	=> 'Reward Topic',//'悬赏主题',
'logs_credit_update_RAC'	=> 'Best Reply Award',//'最佳答案',
'logs_credit_update_MRC'	=> 'Magic random get',//'道具随机获取',
'logs_credit_update_BMC'	=> 'Buy magic',//'购买道具',
'logs_credit_update_TFR'	=> 'Transfer return',//'转账转出',
'logs_credit_update_RCV'	=> 'Transfer received',//'转账接收',
'logs_credit_update_CEC'	=> 'Redeem Points',//'积分兑换',
'logs_credit_update_ECU'	=> 'UCenter points Exchange Spending',//'UCenter积分兑换支出',
'logs_credit_update_SAC'	=> 'Sale attachment',//'出售附件',
'logs_credit_update_BAC'	=> 'Buy attachment',//'购买附件',
'logs_credit_update_PRC'	=> 'Post was rated',//'帖子被评分',
'logs_credit_update_RSC'	=> 'Rate Post',//'帖子评分',
'logs_credit_update_STC'	=> 'Sold Topic',//'出售主题',
'logs_credit_update_BTC'	=> 'Buy Topic',//'购买主题',
'logs_credit_update_AFD'	=> 'Buy points',//'购买积分',//?????????
'logs_credit_update_UGP'	=> 'Purchase Group access',//'购买扩展用户组',
'logs_credit_update_RPC'	=> 'Report reward',//'举报奖惩',
'logs_credit_update_ACC'	=> 'Participate in activities',//'参与活动',
'logs_credit_update_RCT'	=> 'Create Replies award',//'回帖奖励',
'logs_credit_update_RCA'	=> 'Replies winning',//'回帖中奖',
'logs_credit_update_RCB'	=> 'Return Replies award',//'返还回帖奖励积分',
'logs_credit_update_CDC'	=> 'Recharge card secret',//'卡密充值',

'logs_credit_update_RGC'	=> 'Remove Gift',//'回收红包',
'logs_credit_update_BGC'	=> 'Return Gift',//'埋下红包',
'logs_credit_update_AGC'	=> 'Receive Gift',//'获得红包',
'logs_credit_update_RKC'	=> 'Bid rank',//'竞价排名',
'logs_select_operation'		=> 'Please select the operation type',//'请选择操作类型',
'task_credit'			=> 'Task reward points',//'任务奖励积分',
'special_3_credit'		=> 'Reward Topic points deduction',//'悬赏主题扣除积分',
'special_3_best_answer'		=> 'Reward points get best answer',//'最佳答案获取悬赏积分',
'magic_credit'			=> 'Magic random get points',//'道具随机获取积分',
'magic_space_gift'		=> 'Own Space Home lay gift',//'在自已空间首页埋下红包',
'magic_space_re_gift'		=> 'Return not run out gift',//'回收还没有用完的红包',
'magic_space_get_gift'		=> 'Access to space to receive gift',//'访问空间领取的红包',
'credit_transfer'		=> 'Transfer points',//'进行积分转帐',
'credit_transfer_tips'		=> 'Income transfers',//'的转账收入',
'credit_exchange_tips_1'	=> 'Perform the points exchange',//'执行积分对兑换操作,将 ',
'credit_exchange_to'		=> 'Converted to',//'兑换成',
'credit_exchange_center'	=> 'UCenter Exchange Points Center',//'通过UCenter兑换积分',
'attach_sell'			=> 'Sell',//'出售',
'attach_sell_tips'		=> 'Get points for attachments',//'的附件获得积分',
'attach_buy'			=> 'Buy',//'购买',
'attach_buy_tips'		=> 'Spent points for attachments',//'的附件支出积分',
'grade_credit'			=> 'Points obtained by Rating',//'被评分获得的积分',
'grade_credit2'			=> 'Posts rating deducted points',//'帖子评分扣除的积分',
'thread_credit'			=> 'Get points for Topic access',//'主题获得积分',
'thread_credit2'		=> 'Spent points for Topic access',//'主题支出积分',
'buy_credit'			=> 'Recharge points',//'对积分充值',
'buy_usergroup'			=> 'Spend points to buy Group access',//'购买扩展用户组支出积分',
'report_credit'			=> 'Report function of rewards and punishments',//'举报功能中的奖惩',
'join'				=> 'Join',//'参与',
'activity_credit'		=> 'Activity points deducted',//'活动扣除积分',
'thread_send'			=> 'Post thread deduct points',//'扣除发表',
'replycredit'			=> 'Reply points',//'散发的积分',
'add_credit'			=> 'Rewards Points',//'奖励积分',
'recovery'			=> 'Recovery',//'回收',
'replycredit_post'		=> 'Replies award',//'回帖奖励',
'replycredit_thread'		=> 'Create thread points',//'散发的帖子',
'card_credit'			=> 'Points obtained by recharge card',//'卡密充值获得的积分',
'ranklist_top'			=> 'Spend points to participate in bid ranking',//'参加竞价排名消费积分',

	'profile_unchangeable'		=> 'Diese Informationen k&ouml;nnen nicht nach Vorlage ge&auml;ndert werden',
	'profile_is_verifying'		=> 'Diese Informationen werden derzeit &uuml;berarbeitet',
	'profile_mypost'		=> 'Mein Inhalt',
	'profile_need_verifying'	=> 'Informationen werden f&uuml;r die &Uuml;berpr&uuml;fung ben&ouml;tigt.',
	'profile_edit'			=> 'Modifizieren',
	'profile_censor'		=> '(Sensible W&ouml;rter)',
	'profile_verify_modify_error'	=> '{verify} Zertifiziert wurden nicht erlaubt &Auml;nderungen',
	'profile_verify_verifying'	=> 'Deine {verify} Information wurde &uuml;bermittelt. Bitte warte auf die Verifikation.',//'您的{verify}信息已提交，请耐心等待核查。',

//'district_level_0'		=> '- Land -',//'-国家-',
	'district_level_1'	=> '- Bundesland -',
	'district_level_2'	=> '- Stadt -',
	'district_level_3'	=> '- Bezirk -',
'district_level_4'	=> '- Township -',
	'invite_you_to_visit'		=> '{user} hat dich zum Besuch auf {bbname} eingeladen',//'{user}邀请您访问{bbname}',

	'spacecp_message_prompt'	=> '(Support {msg} Code, maximal 1000 W&ouml;rter)',
	'card_update_doing'		=> ' <a class="xi2" href="###">[Verbuchungssatz]</a>',
	'email_acitve_message'		=> '<img src="{imgdir}/mail_inactive.png" alt="Nicht Verifiziert" class="vm" />
						<span class="xi1">E-Mail ({newemail}) wartet auf &uuml;berpr&uuml;fung...</span><br />
						Das System hat dir eine E-Mail zur Aktivierung und &Uuml;berpr&uuml;fung gesendet.<br>
						Wenn du keine Benachrichtigung bekommen hast, &auml;ndere deine Mailbox, oder <a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">fordere eine neue an</a>.',

);

