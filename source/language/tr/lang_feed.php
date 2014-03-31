<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Valery Votintsev at sources.ru
 */

$lang = array
(

	'feed_blog_password'	=> '{actor} {subject} başlıklı yeni şifreli blog yayınladı',
	'feed_blog_title'	=> '{actor} yeni blog yayınladı',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} albüm ekledi.',
	'feed_album_body'	=> '<b>{album}</b><br />Toplam {picnum} resim',
	'feed_pic_title'	=> '{actor} yeni resimler yükledi',
	'feed_pic_body'		=> '{title}',



	'feed_poll'		=> '{actor} yeni anket yayınladı',

	'feed_comment_space'	=> '{actor} {touser}\'n duvarına yeni mesaj ekledi',
	'feed_comment_image'	=> '{actor} {touser}\'n resmine yorum yazdı',
	'feed_comment_blog'	=> '{actor} {touser}\'n {blog} yorum yazdı',
	'feed_comment_poll'	=> '{actor} {touser}\'n {poll} anketine yorum yazdı',
	'feed_comment_event'	=> '{actor} {touser}\'n {event} etkinliğine yorum yazdı',
	'feed_comment_share'	=> '{actor} {touser}\'n {share} paylaşımına yorum yazdı', 

	'feed_showcredit'	=> '{actor} {fusername} için {credit} puan hediye eederek, <a href="misc.php?mod=ranklist&type=member" target="_blank">klasman\'da </a> yer almasını sağladı.',
	'feed_showcredit_self'	=> '{actor} kendisi için {credit} puan harcayarak, <a href="misc.php?mod=ranklist&type=member" target="_blank">klasman</a> listesin\'de yükseldi.',
	'feed_doing_title'	=> '{actor}: {message}',
	'feed_friend_title'	=> '{actor} ve {touser} arkadaş oldular',



	'feed_click_blog'	=> '{actor} {touser}\'n {subject} bloguna bir "{click}" gönderdi.',
	'feed_click_thread'	=> '{actor} {touser}\'n {subject} konusuna bir "{click}" gönderdi.',
	'feed_click_pic'	=> '{actor}  {touser}\'n resmine bir "{click}" gönderdi.',
	'feed_click_article'	=> '{actor} {touser}\'n {subject} haberine bir "{click}" gönderdi.',


	'feed_task'			=> '{actor} {task} görevini tamamladı',
	'feed_task_credit'		=> '{actor} {task} görevini tamamlayarak, {credit} puan aldı',

	'feed_profile_update_base'	=> '{actor} temel profil bilgilerini yeniledi.',
	'feed_profile_update_contact'	=> '{actor} iletişim bilgilerini yeniledi.',
	'feed_profile_update_edu'	=> '{actor} updated education',
	'feed_profile_update_work'	=> '{actor} iş bilgilerini güncelledi.',
	'feed_profile_update_info'	=> '{actor} kişisel bilgilerini yeniledi.',
	'feed_profile_update_bbs'	=> '{actor} forum bilgilerini güncelledi.',
	'feed_profile_update_verify'	=> '{actor} updated their authentication information.',

	'feed_add_attachsize'		=> '{actor} {credit} puan kullanarak {size} extra yükleme alanı aldı.(<a href="home.php?mod=spacecp&ac=credit&op=addsize">Siz\'de alabilirsiniz!</a>)',

	'feed_invite'			=> '{actor} davet göndererek {username} ile arkadaş olmak istiyor',

	'magicuse_thunder_announce_title'	=> '<strong>{username} used "Sound of Thunder"</strong>',
	'magicuse_thunder_announce_body'	=> 'Selam herkeze, şu an site\'de yim.<br /><a href="home.php?mod=space&uid={uid}" target="_blank">Sayfa\'ma hoşgeldiniz!</a>',


	'feed_thread_title'		=> '{actor} yeni konu ekledi.',
	'feed_thread_message'		=> '<b>{subject}</b><br />{message}',

	'feed_reply_title'		=> '{actor} {author}\'n {subject} konusunu cevapladı.',
	'feed_reply_title_anonymous'	=> '{actor} {subject} replied a',
	'feed_reply_message'		=> '',

	'feed_thread_poll_title'	=> '{actor} yeni konu yazdı',
	'feed_thread_poll_message'	=> '<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title'	=> '{actor} {subject} anketine katıldı',
	'feed_thread_votepoll_message'	=> '',

	'feed_thread_goods_title'	=> '{actor} yeni ürünler ekledi',
	'feed_thread_goods_message_1'	=> '<b>{itemname}</b><br />Fiyat {itemprice} € ve {itemcredit}{creditunit}',
	'feed_thread_goods_message_2'	=> '<b>{itemname}</b><br />Fiyat {itemprice} €',
	'feed_thread_goods_message_3'	=> '<b>{itemname}</b><br />Fiyat {itemcredit}{creditunit}',

	'feed_thread_reward_title'	=> '{actor} ödül ekledi',
	'feed_thread_reward_message'	=> '<b>{subject}</b><br />Ödül {rewardprice}{extcredits}',

	'feed_reply_reward_title'	=> '{actor} {subject} konusun\'da ki ödüle cevap yazdı',
	'feed_reply_reward_message'	=> '',

	'feed_thread_activity_title'	=> '{actor} yeni etkinlik ekledi',
	'feed_thread_activity_message'	=> '<b>{subject}</b><br />Tarih: {starttimefrom}<br />Yer: {activityplace}<br />{message}',

	'feed_reply_activity_title'	=> '{actor} {subject} etkinliğine katıldı',
	'feed_reply_activity_message'	=> '',

	'feed_thread_debate_title'	=> '{actor} yeni tartışma ekledi',
	'feed_thread_debate_message'	=> '<b>{subject}</b><br />Taraf: {affirmpoint}<br />Karşıt: {negapoint}<br />{message}',

	'feed_thread_debatevote_title_1'	=> '{actor} {subject} konusun\da ki  tartışma\'ya Taraf oldu',
	'feed_thread_debatevote_title_2'	=> '{actor} {subject} konusun\da ki  tartışma\'ya Karşıt oldu',
	'feed_thread_debatevote_title_3'	=> '{actor} {subject} konusun\da ki  tartışma\'ya Nötr kaldı',
	'feed_thread_debatevote_message_1'	=> '',
	'feed_thread_debatevote_message_2'	=> '',
	'feed_thread_debatevote_message_3'	=> '',

);

