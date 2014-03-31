<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Khalid Nahhal, http://www.ar-discuz.com
 */

$lang = array
(

	'feed_blog_password'	=> '{actor} قام بوضع كلمة مرور لحماية مدونته   {subject}',//'{actor} ???????? {subject}',
	'feed_blog_title'	=> '{actor} قام بنشر مدونة ',//'{actor} ??????',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',//'<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} حدث ألبوم',//'{actor} ?????',
	'feed_album_body'	=> '<b>{album}</b><br /> إجمالي الصور : {picnum}',//'<b>{album}</b><br />? {picnum} ???',
	'feed_pic_title'	=> '{actor} قام برفع صورة جديدة',//'{actor} ??????',
	'feed_pic_body'		=> '{title}',



	'feed_poll'		=> '{actor} قام بانشاء إستطلاع جديد',//'{actor} ??????',

	'feed_comment_space'	=> '{actor} ترك رسالة في حائط  {touser} ',//'{actor} ? {touser} ???????',
	'feed_comment_image'	=> '{actor} علق على صورة  {touser}',//'{actor} ??? {touser} ???',
	'feed_comment_blog'	=> '{actor}  علق على مدونة {blog} ل {touser}',//'{actor} ??? {touser} ??? {blog}',
	'feed_comment_poll'	=> '{actor} علق على  {poll} لـ {touser}',//'{actor} ??? {touser} ??? {poll}',
	'feed_comment_event'	=> '{actor} علق على فعالية  {event} التي بدءت من  {touser}',//'{actor} ? {touser} ????? {event} ????',
	'feed_comment_share'	=> '{actor} علق على  {share} لـ {touser}',//'{actor} ? {touser} ??? {share} ?????',

	'feed_showcredit'	=> '{actor} قدم  {credit} نقطة لـ {fusername} للظهور في  <a href="home.php?mod=space&do=top">أعلى القائمة</a>',//'{actor} ??? {fusername} ???? {credit} ?,???????<a href="home.php?mod=space&do=top" target="_blank">?????</a>????',
	'feed_showcredit_self'	=> '{actor} انفق {credit} نقطة لظهور نفسه <a href="home.php?mod=space&do=top">أعلى القائمة</a>',//'{actor} ?????? {credit} ?,?????<a href="home.php?mod=space&do=top" target="_blank">?????</a>????',
	'feed_doing_title'	=> '{actor} يقول: {message}',//'{actor}:{message}',
	'feed_friend_title'	=> '{actor} و {touser} أصبحا أصدقاء',//'{actor} ? {touser} ?????',



	'feed_click_blog'	=> '{actor} ارسل  &quot;{click}&quot; إلى  مدونة {touser}  ({subject})',//'{actor} ????“{click}”? {touser} ??? {subject}',
	'feed_click_thread'	=> '{actor} ارسل &quot;{click}&quot; إلى موضوع {touser}  ({subject})',//'{actor} ????“{click}”? {touser} ??? {subject}',
	'feed_click_pic'	=> '{actor} ارسل &quot;{click}&quot; إلى صورة  {touser} ',//'{actor} ????“{click}”? {touser} ???',
	'feed_click_article'	=> '{actor} ارسل &quot;{click}&quot; إلى مقالة  {touser}  ({subject}*',//'{actor} ????“{click}”? {touser} ??? {subject}',


	'feed_task'		=> '{actor} اكمل مهمة  {task}',//'{actor} ??????? {task}',
	'feed_task_credit'	=> '{actor} اكمل مهمة {task} وحصل على  {credit} نقطة',//'{actor} ??????? {task},??? {credit} ?????',

	'feed_profile_update_base'	=> '{actor} حدث معلوماته الشخصية',//'{actor} ??????????',
	'feed_profile_update_contact'	=> '{actor} حدث معلومات الاتصال الخاصة به',//'{actor} ??????????',
	'feed_profile_update_edu'	=> '{actor} قام بتحديث معلوماته العلمية',//'{actor} ??????????',
	'feed_profile_update_work'	=> '{actor} قام بتحديث نبذة عمله',//'{actor} ??????????',
	'feed_profile_update_info'	=> '{actor} قام بتحديث معلوماته الشخصية.',//'{actor} ???????????????',
	'feed_profile_update_bbs'	=> '{actor} قام بتحديث معلوماته',//'{actor} ??????????',
	'feed_profile_update_verify'	=> '{actor} قام بتحديث معلومات التحقق',//'{actor} ??????????',

	'feed_add_attachsize'		=> '{actor} انفق {credit} نقطة لتوسيع حجم ملفه الشخصي  ({size}). ويمكنه الآن رفع بيانات أكثر. (<a href="home.php?mod=spacecp&ac=credit&op=addsize">أنا أريد ذلك أيضاً!</a>)',//'{actor} ? {credit} ?????? {size} ????,??????????(<a href="home.php?mod=spacecp&ac=credit&op=addsize">?????</a>)',

	'feed_invite'			=> '{actor} دعا {username}, ولقد اصبحا أصدقاء',//'{actor} ????,? {username} ?????',

	'magicuse_thunder_announce_title'	=> '<strong>{username} issued a &quot;Sound of Thunder&quot;</strong>',//'<strong>{username} ???“????”</strong>',
	'magicuse_thunder_announce_body'	=> 'مرحبا!<br /><a href="home.php?mod=space&uid={uid}">مرحبا بكم في ملفي الشخصي</a>',//'???,????<br /><a href="home.php?mod=space&uid={uid}" target="_blank">????????</a>',


	'feed_thread_title'	=>			'{actor} بدء بموضوع جديد',//'{actor} ??????',
	'feed_thread_message'	=>		'<b>{subject}</b><br />{message}',//'<b>{subject}</b><br />{message}',

	'feed_reply_title'	=>			'{actor} رد على  {subject} لـ {author}',//'{actor} ??? {author} ??? {subject}',
	'feed_reply_title_anonymous'	=>		'مجهول قام بالرد على  {subject} لـ {author}',//'{actor} ????? {subject}',
	'feed_reply_message'	=>			'',

	'feed_thread_poll_title'	=>		'{actor} قام بانشاء إستطلاع',//'{actor} ??????',
	'feed_thread_poll_message'	=>		'<b>{subject}</b><br />{message}',//'<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title'	=>		'{actor} قام بالتصويت في  {subject}',//'{actor} ????? {subject} ???',
	'feed_thread_votepoll_message'	=> '',

	'feed_thread_goods_title'	=>		'{actor} قام بعرض منتج للبيع',//'{actor} ????????',
	'feed_thread_goods_message_1'	=> '<b>{itemname}</b><br />السعر: {itemprice}  لكل اضافية (???) {itemcredit} {creditunit}',//'<b>{itemname}</b><br />?? {itemprice} ? ?? {itemcredit}{creditunit}',
	'feed_thread_goods_message_2'	=> '<b>{itemname}</b><br />السعر: {itemprice} دولار (???)',//'<b>{itemname}</b><br />?? {itemprice} ?',
	'feed_thread_goods_message_3'	=> '<b>{itemname}</b><br />السعر: {itemcredit} {creditunit}',//'<b>{itemname}</b><br />?? {itemcredit}{creditunit}',

	'feed_thread_reward_title'	=>		'{actor} قام بوضع طلب',//'{actor} ??????',
	'feed_thread_reward_message'	=>		'<b>{subject}</b><br /> المكافئة : {rewardprice} {extcredits}',//'<b>{subject}</b><br />?? {rewardprice}{extcredits}',

	'feed_reply_reward_title'	=>		'{actor} قام بالرد على الطلب التالي : {subject}',//'{actor} ????? {subject} ???',
	'feed_reply_reward_message'	=>		'',

	'feed_thread_activity_title'	=>		'{actor} قام بإنشاء فعالية جديدة',//'{actor} ??????',
	'feed_thread_activity_message'	=> '<b>{subject}</b><br /> وقت البدء :{starttimefrom}<br /> الموقع : {activityplace}<br />{message}',//'<b>{subject}</b><br />????:{starttimefrom}<br />????:{activityplace}<br />{message}',

	'feed_reply_activity_title'	=>		'{actor} التحق في أنشطة {subject}',//'{actor} ????? {subject} ???',
	'feed_reply_activity_message'	=> '',

	'feed_thread_debate_title'	=>		'{actor} قما بإنشاء تحدي جديد',//'{actor} ??????',
	'feed_thread_debate_message'	=>		'<b>{subject}</b><br />المنافس: {affirmpoint}<br />الخصم: {negapoint}<br />{message}',//'<b>{subject}</b><br />??:{affirmpoint}<br />??:{negapoint}<br />{message}',

	'feed_thread_debatevote_title_1'	=> '{actor} يساند المنافس في  {subject}',//'{actor} ?????????? {subject} ???',
	'feed_thread_debatevote_title_2'	=> '{actor} ساند الخصم في  {subject}',//'{actor} ?????????? {subject} ???',
	'feed_thread_debatevote_title_3'	=> '{actor} محايد في  {subject}',//'{actor} ?????????? {subject} ???',
	'feed_thread_debatevote_message_1'	=> '',
	'feed_thread_debatevote_message_2'	=> '',
	'feed_thread_debatevote_message_3'	=> '',

);

?>