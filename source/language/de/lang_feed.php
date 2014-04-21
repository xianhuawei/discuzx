<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2011-08-12) by Coldcut - http://www.cybertipps.com
 */

$lang = array
(

	'feed_blog_password'	=> '{actor} ver&ouml;ffentlicht einen neuen verschl&uuml;sselten Login {subject}',
	'feed_blog_title'	=> '{actor} ver&ouml;ffentlichte eine neue Protokolldatei',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} hat das Album aktualisiert',
	'feed_album_body'	=> '<b>{album}</b><br />gemeinsam {picnum} Bilder',
	'feed_pic_title'	=> '{actor} hat ein neues Bild hochgeladen',
	'feed_pic_body'		=> '{title}',



	'feed_poll'		=> '{actor} erstellte eine neue Umfrage',

	'feed_comment_space'	=> '{actor} hat {touser} eine Nachricht hinterlassen.',
	'feed_comment_image'	=> '{actor} hat {touser} einen Bild-Kommentar abgegeben',
	'feed_comment_blog'	=> '{actor} hat {touser} einen Kommentar auf {blog} geschrieben',
	'feed_comment_poll'	=> '{actor} hat {touser} f&uuml;r die {poll} abgestimmt',
	'feed_comment_event'	=> '{actor} beim {touser} Organisation Aktivit&auml;ten {event} beworben.',
	'feed_comment_share'	=> '{actor} hat {touser} zu {share} kommentiert',

	'feed_showcredit'	=> '{actor} sendete {fusername} {credit} Credits um ein besseres Ranking zu bekommen, auf die <a href="misc.php?mod=ranklist&type=member" target="_blank">Credit Ranking</a> Bitte.',
	'feed_showcredit_self'	=> '{actor} erh&ouml;t {credit} Credits um das Ranking auf das <a href="misc.php?mod=ranklist&type=member" target="_blank">Credit Ranking</a> zu erh&ouml;hen.',
	'feed_doing_title'	=> '{actor}: {message}',
	'feed_friend_title'	=> '{actor} und {touser} sind nun Freunde',



	'feed_click_blog'	=> '{actor} sendete &quot;{click}&quot; an {touser} um am {subject} teilzunehmen',
	'feed_click_thread'	=> '{actor} sendete &quot;{click}&quot; an {touser} um am Thema {subject} teilzunehmen',
	'feed_click_pic'	=> '{actor} sendete &quot;{click}&quot; an {touser} um an den Bildern teilzunhemen',
	'feed_click_article'	=> '{actor} sendete &quot;{click}&quot; an {touser} um am Artikel {subject} teilzunehmen',


	'feed_task'		=> '{actor} teilt die Aktivit&auml;t {task}',
	'feed_task_credit'	=> '{actor} teilt die Aktivit&auml;t {task} und erhielt {credit} Credits',

	'feed_profile_update_base'	=> '{actor} hat grundlegende Informationen aktualisiert',
	'feed_profile_update_contact'	=> '{actor} hat Kontakte aktualisiert',
	'feed_profile_update_edu'	=> '{actor} hat die Ausbildung aktualisiert',
	'feed_profile_update_work'	=> '{actor} aktualisierte Informationen &uuml;ber die Arbeit',
	'feed_profile_update_info'	=> '{actor} aktualisierte Informationen &uuml;ber Hobbys und Interessen',
	'feed_profile_update_bbs'	=> '{actor} aktualisierte Informationen &uuml;ber das BBS',
	'feed_profile_update_verify'	=> '{actor} hat die Authentifizierungsinformationen aktualisiert',

	'feed_add_attachsize'		=> '{actor} spent {credit} points to enlarge the upload space on {size}. Now more images may be uploaded. (<a href="home.php?mod=spacecp&ac=credit&op=addsize">I want this too!</a>)',//'{actor} 用 {credit} 个积分兑换了 {size} 附件空间，可以上传更多的图片啦(<a href="home.php?mod=spacecp&ac=credit&op=addsize">我也来兑换</a>)',

	'feed_invite'		=> '{actor} hat {username} eingeladen um Freunde zu werden',

	'magicuse_thunder_announce_title'	=> '<strong>{username} ausgestellt als “Sound of Thunder”</strong>',
	'magicuse_thunder_announce_body'	=> 'Hallo, ich bin Online<br /><a href="home.php?mod=space&uid={uid}" target="_blank">Willkommen auf meiner Homepage</a>',


	'feed_thread_title' =>			'{actor} hat ein neues Thema erstellt',
	'feed_thread_message' =>		'<b>{subject}</b><br />{message}',

	'feed_reply_title' =>			'{actor} {author} hat eine Antwort zum Thema {subject} erstellt.',
	'feed_reply_title_anonymous' =>		'{actor} antwortete zum Thema {subject}',
	'feed_reply_message' =>			'',

	'feed_thread_poll_title' =>		'{actor} hat eine neue Umfrage erstellt',
	'feed_thread_poll_message' =>		'<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title' =>		'{actor} hat an der Umfrage {subject} abgestimmt.',
	'feed_thread_votepoll_message' =>	'',

	'feed_thread_goods_title' =>		'{actor} hat ein neues Handelsthema erstellt',
	'feed_thread_goods_message_1' =>	'<b>{itemname}</b><br />Verkaufspreis {itemprice} Pro zus&auml;tzliche {itemcredit}{creditunit}',
	'feed_thread_goods_message_2' =>	'<b>{itemname}</b><br />Verkaufspreis {itemprice} Euro',
	'feed_thread_goods_message_3' =>	'<b>{itemname}</b><br />Verkaufspreis {itemcredit}{creditunit}',

	'feed_thread_reward_title' =>		'{actor} hat einen neuen Reward erstellt',
	'feed_thread_reward_message' =>		'<b>{subject}</b><br />Belohnung {rewardprice}{extcredits}',

	'feed_reply_reward_title' =>		'{actor} hat eine Antwort zum Reward {subject} erstellt.',
	'feed_reply_reward_message' =>		'',

	'feed_thread_activity_title' =>		'{actor} hat ein neues Event erstellt',
	'feed_thread_activity_message' =>	'<b>{subject}</b><br />Startzeit: {starttimefrom}<br />Veranstaltungsort: {activityplace}<br />{message}',

	'feed_reply_activity_title' =>		'{actor} Antwort zum Event {subject} erstellt.',
	'feed_reply_activity_message' =>	'',

	'feed_thread_debate_title' =>		'{actor} neue Debatte erstellt.',
	'feed_thread_debate_message' =>		'<b>{subject}</b><br />Square: {affirmpoint}<br />Nein-Stimmen: {negapoint}<br />{message}',

	'feed_thread_debatevote_title_1' =>	'{actor} hat an der {subject} Debatte teilgenommen.',
	'feed_thread_debatevote_title_2' =>	'{actor} hat in der Opposition {subject} Debatte teilgenommen.',
	'feed_thread_debatevote_title_3' =>	'{actor} hat an der neutralen {subject} Debatte teilgenommen.',
	'feed_thread_debatevote_message_1' =>	'',
	'feed_thread_debatevote_message_2' =>	'',
	'feed_thread_debatevote_message_3' =>	'',

);

