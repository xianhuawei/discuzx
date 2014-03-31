<?php

/**+++
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Khalid Nahhal, http://www.ar-discuz.com
 *      Modified by Valery Votintsev at sources.ru
 */

$lang = array
(

	'type_wall'		=> 'رسالة حائط',//'留言',
	'type_piccomment'	=> 'تعلق صورة',//'图片评论',
	'type_blogcomment'	=> 'تعليق مدونة',//'日志评论',
	'type_clickblog'	=> 'موقع المدونة',//'日志表态',
	'type_clickarticle'	=> 'موقع مقالة',//'文章表态',
	'type_clickpic'		=> 'موقع صورة',//'图片表态',
	'type_sharecomment'	=> 'تعليق منشور',//'分享评论',
	'type_doing'		=> 'افعال',//'记录',
	'type_friend'		=> 'أصدقاء',//'好友',
	'type_credit'		=> 'نقاط',//'积分',
	'type_bbs'		=> 'المنتدى',//'论坛',
	'type_system'		=> 'النظام',//'系统',
	'type_thread'		=> 'مواضيع',//'主题',
	'type_task'		=> 'مهمام',//'任务',
	'type_group'		=> 'مجموعات اجتماعية',//'群组',

	'mail_to_user'		=> 'ملاحظة جديدة',//'有新的通知',
	'showcredit'		=> '{actor} اعطى لك {credit} نقطة لتحسين وضعك في  <a href="home.php?mod=space&do=top" target="_blank">الترتيب</a>.',//'{actor} 赠送给你 {credit} 个竞价积分，帮助提升在 <a href="home.php?mod=space&do=top" target="_blank">竞价排行榜</a> 中的名次',
	'share_space'		=> '{actor} قام بنشر ملفك الشخصي.',//'{actor} 分享了你的空间',
	'share_blog'		=> '{actor} قام بنشر مدونتك <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_album'		=> '{actor} قام بنشر ألبومك <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic'		=> '{actor} قام بنشر ألبومك <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 {albumname} 中的 <a href="{url}" target="_blank"> 图片</a>',
	'share_thread'		=> '{actor} قام بمنشر موضوعك  <a href="{url}" target="_blank">{subject}</a>.',//'{actor} 分享了你的帖子 <a href="{url}" target="_blank">{subject}</a>',
	'share_article'		=> '{actor} قام بنشر مقالتك <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的文章 <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note'	=> ' يقدم لك دعامة <a href="{url}" target="_blank">{name}</a>.',//'送给你一个道具 <a href="{url}" target="_blank">{name}</a>',
	'friend_add'		=> '{actor} وانت اصبحتما أصدقاء.',//'{actor} 和你成为了好友',
	'friend_request'	=> '{actor} يطلب منك قبول طلب الصداقة بينك وبينه : {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">موافق</a>',//'{actor} 请求加您为好友{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">批准申请</a>',
	'doing_reply'		=> '{actor} رد على  <a href="{url}" target="_blank">مقولتك</a>.',//'{actor} 在 <a href="{url}" target="_blank">记录</a> 中对你进行了回复',
	'wall_reply'		=> '{actor} رد على  <a href="{url}" target="_blank">رسالة الحائط الخاصة بك</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">留言</a>',
	'pic_comment_reply'	=> '{actor} رد على  <a href="{url}" target="_blank">تعليقك على صورة</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">图片评论</a>',
	'blog_comment_reply'	=> '{actor} رد على  <a href="{url}" target="_blank">تعليقك على مدونة </a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">日志评论</a>',
	'share_comment_reply'	=> '{actor} رد على  <a href="{url}" target="_blank">تعليقك على منشور</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">分享评论</a>',
	'wall'			=> '{actor} قام بترك  <a href="{url}&fchannel=nwall" target="_blank">رسالة </a> في حائط الرسائل الخاص بك.',//'{actor} 在留言板上给你 <a href="{url}&fchannel=nwall" target="_blank">留言</a>',
	'pic_comment'		=> '{actor} قام بالتعليق على  <a href="{url}" target="_blank">صورتك</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">图片</a>',
	'blog_comment'		=> '{actor} قام بالتعليق على مدونتك <a href="{url}" target="_blank">{subject}</a>',//'{actor} 评论了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_comment'		=> '{actor} قام بالتعليق على  <a href="{url}" target="_blank">منشورك</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">分享</a>',
	'click_blog'		=> '{actor} قام بتقييم مدونتك <a href="{url}" target="_blank">{subject}</a> وقام بالتعليق',//'{actor} 对你的日志 <a href="{url}" target="_blank">{subject}</a> 做了表态',
	'click_pic'		=> '{actor} قام بتقييم على مدونتك <a href="{url}" target="_blank">{subject}</a>',//'{actor} 对你的 <a href="{url}" target="_blank">图片</a> 做了表态',
	'click_article'		=> '{actor} قام بتقييم  <a href="{url}" target="_blank">مقالتك</a>',//'{actor} 对你的 <a href="{url}" target="_blank">文章</a> 做了表态',
	'show_out'		=> '{actor} قما بزيارة ملفك الشخصي, وظهر ترتيبك النهائي',//'{actor} 访问了你的主页后，你在竞价排名榜中最后一个积分也被消费掉了',
	'puse_article'		=> 'تهانينا، مقالتك <a href="{url}" target="_blank">{subject}</a> تم نشرها في المجلة, <a href="{newurl}" target="_blank">إضغط هنا لعرضها</a>',//'恭喜你，你的<a href="{url}" target="_blank">{subject}</a>已被推送到门户， <a href="{newurl}" target="_blank">点击查看</a>',

	'myinvite_request'	=> 'رسالة تطبيق جديدة <a href="home.php?mod=space&do=notice&view=userapp">إضغط هنا لرؤية التفاصيل</a>',//'有新的应用消息<a href="home.php?mod=space&do=notice&view=userapp">点此进入应用消息页面进行相关操作</a>',


	'group_member_join'	=> '{actor} يريد الانضمام إلى مجموعتك, الرجاء اخذ الإجراء المناسب  <a href="{url}" target="_blank">من لوحة إدارة المجموعة</a>',//'{actor} 加入你的群组需要审核，请到群组 <a href="{url}" target="_blank">管理后台</a> 进行审核',
	'group_member_invite'	=> '{actor} قام بدعوتك للإنضمام إلى مجموعة  <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, <a href="{url}" target="_blank">إضغط هنا للإنضمام الآن</a>',//'{actor} 邀请你加入 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组，<a href="{url}" target="_blank">点此马上加入</a>',
	'group_member_check'	=> 'طلبك في الانضمام إلى  <a href="{url}" target="_blank">{groupname}</a> تم قبوله, please <a href="{url}" target="_blank">إضغط هنا لزيارة المجموعة</a>',//'你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
	'group_member_check_failed'	=> 'مجموعتك  <a href="{url}" target="_blank">{groupname}</a> لم تجتاز التحقق',//'你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',

	'reason_moderate'	=> 'موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> لقد تم  {modaction} بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> 'موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> لقد تم  {modaction} بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> 'مشاركتك في  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم حذفها بواسطة  {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> 'تعليقك في  <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> تم حذفه بواسطة  {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> 'موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> لقد تم  {modaction} بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post'	=> 'موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> لقد تم  {modaction} بواسطة {actor}.<br />
				اذا تم تحذيره  {warninglimit} مرات في  {warningexpiration} أيام/يوم, سوف تكون لا تستطيع المشاركة لمدة  {warningexpiration} يوم تلقائيا.<br />
				حالياً, تم تحذيرك  {authorwarnings} مرات!
				<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'		=> 'موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم نقله إلى  <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'		=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم نسخه في  <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'	=> 'طلبك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم ازالته بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'	=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم إضافة له ختم  {stamp} بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'	=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم حذف الختم منه بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> بواسطة {actor} تم إضافة له ايقونة  {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> بواسطة {actor} تم ازالة الايقونة <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> 'ردك في موضوع  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم تثبيته في الاعلى بواسطة {actor}. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> 'ردك في موضوع  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم ازالة تثبيته بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'	=> 'موضوعك {threadsubject} لم يتم الموافقة عليه, تم حذفه! <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate'	=> 'موضوعك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> تم الموافقة عليه! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">إضغط هنا لرؤيته;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete'	=> 'لم يتم الموافقة على ردك, لقد تم حذفه! <p class="summary">المحتوى: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'	=> 'تم الموافقة على ردك! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">إضغط هنا لرؤيته</a> <p class="summary">المحتوى: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'		=> 'لقد استقبلت {credit} نقطة من  {actor} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">إضغط هنا للمشاهدة</a>
				<p class="summary">{actor} يقول: <span>{transfermessage}</span></p>',

	'addfunds'		=> 'طلبك لاعادة تعبئة النقاط تم بنجاح, وتم إضافة مبلغ مماثل إلى نقاطك
				&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">إضغط هنا لعرض  &rsaquo;</a>.
				<p class="summary">رقم الطلبية: <span>{orderid}</span></p>
				<p class="summary">الدفع: <span>{price} وحدة </span></p>
				<p class="summary">النقاط الواردة : <span>{value}</span></p>',

	'rate_reason'		=> 'مشاركتك في موضوع  <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> تم تقييمها  {ratescore} بواسطة {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason'	=> '{actor} ازال تقييمه  {ratescore} من الموضوع <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> قام بشراء موضوعك  <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, ولقد تم الدفع من اخرين , في انتظار التسليم   &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">إضغط هنا للعرض</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm'	=> 'لقد اشترتيت هذا المنتج <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a>  تم شحنها, في انتظار الموافقة   &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">إضغط هنا للعرض</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success'	=> 'المنتجات <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> تم استردادها بنجاح, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">قيمها</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success'		=> 'المنتجات  <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> تم بيعها بنجاح, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">قيمها</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid'	=> 'بائع  <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> قام بتعديل المنتج <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> المعاملات , تأكد من ذلك  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">عرض</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid'	=> 'المشتري  <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> قام بتعديل الطلب  <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> المعاملات, تأكد من ذلك &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">عرض</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit'		=> 'With your transaction (actor) has been made evaluation to you &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Comment it</a>',//'与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

	'activity_notice'	=> '{actor} قما بالانضمام إلى  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, الرجاء  &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرضها</a>',//'{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'activity_apply'	=> 'الفعالية  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> التي بدأها "{actor}" قام بالموافقة على إشتراكك بها  &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرضها</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> 'الفعالية  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, التي بدأها {actor}, ابلغك إلى تحسين معلومات  تسجيل الفعالية . &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرض &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> 'الفعالية  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> منظمها "{actor}" قام برفض إنضمامك للفعالية  &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">عرضها</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> '{actor} قام بالغاء إشتراكك في  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> . &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">عرض &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> 'الفعالية  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> المبادر  {actor} ارسل معلومات جديدة. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرض الفعالية &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> 'موضوع طلبك <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم إختيار افضل إجابة له  بواسطة {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرضها</a>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer'	=> 'ردك في موضوع طلب  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم اختياره كأفضل إجابة بواسطة الكاتب وهو  {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرضها</a>',//'你的回复被的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> 'ردفك في موضوع الطلب  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> تم اختياره كأفضل إجابة &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرض &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add'		=> '{actor} علق على موضوعك  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">عرض &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor} رد على موضوعك <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">عرض</a>',

	'task_reward_credit'	=> 'تهانينا! لقد اكملت مهمتك: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, وحصلت على  {creditbonus} نقطة . &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">إضغط هنا لعرض نقاطي &rsaquo;</a></p>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

	'task_reward_magic'	=> 'مبروك! اكملت المهمة: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, وحصلت على  {bonus} magic <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

	'task_reward_medal'	=> 'تهانينا! لقد اكملت مهمتك: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, وحصلت على وسام <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a>. وصالح حتى : {bonus} يوم.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

	'task_reward_medal_forever'	=> 'تهانينا لإكمال مهامك بنجاح: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, الحصول على وسام <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> Permanent',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

	'task_reward_invite'	=> 'تهانينا! لقد اكملت مهمتك : <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>.  <a href="home.php?mod=spacecp&ac=invite" target="_blank"> وحصلت على رمز دعوة  {rewardtext}</a> وصالح حتى  {bonus} يوم.',

	'task_reward_group'	=> 'تهانينا! لقد اكملت مهمتك : <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>,ووصلت إلى مجموعة  {rewardtext}. صالح حتى : {bonus} يوم. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">عرض صلاحياتي</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'user_usergroup'	=> 'تم ترقية مجموعة الأعضاء الخاصة بك إلى  {usergroup}. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">عرض صلاحياتي</a>',//'你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'grouplevel_update'	=> 'تهانينا! مجموعتك {groupname} تم ترقية مستواها إلى  {newlevel}.',//'恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

	'thread_invite'		=> '{actor} قام بدعوتك إلى  {invitename}  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">عرض</a>',//'{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'invite_friend'		=> 'تهانينا! لقد تم دعوتك من طرف  {actor} واصبحتما أصدقاء.',//'恭喜你成功邀请到 {actor} 并成为你的好友',

	'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">القي تحية</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">تجاهل</a>',

	'profile_verify_error'		=> '{verify} من البيانات تم رفضه, يجب ملئ الحقول التالية:<br/>{profile}<br/>سبب الرفض: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass'		=> 'تهانينا، البيانات التي ادخلت  {verify} تم معاينتها بنجاح بواسطة ',//'恭喜你，你填写的{verify}资料审核通过了',
	'profile_verify_pass_refusal'	=> 'للاسف, تم رفض البيانات المقدمة  ({verify})  ',//'很遗憾，你填写的{verify}资料审核被拒绝了',
	'member_ban_speak'		=> 'قد يحق لك التحدث {user}, المدة : {day}(0: نيابة عن هفوة دائمة), حظر من المشاركة بسبب: {reason}',//'你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',

	'member_moderate_invalidate'		=> 'تم رفض حسابك من قبل المدير , الرجاء  <a href="home.php?mod=spacecp&ac=profile">إعادة تقديم معلومات التسجيل مرة أخرى </a>.<br />ملاحظة المدير: <b>{remark}</b>',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_validate'		=> 'تم الموافقة على حسابك .<br />ملاحظة المدير : <b>{remark}</b>',//'你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark'	=> 'تم رفض حسابك من قبل المدير , الرجاء  <a href="home.php?mod=spacecp&ac=profile">إعادة تقديم معلومات التسجيل مرة أخرى </a>.',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。',
	'member_moderate_validate_no_remark'	=> 'تم الموافقة على حسابك .',//'你的账号已经通过审核。',
	'manage_verifythread'		=> 'موضوع جديد في الإنتظار, <a href="admin.php?action=moderate&operation=threads&dateline=all"> معاينة الآن </a>',
	'manage_verifypost'		=> 'ردود في الإنتظار,<a href="admin.php?action=moderate&operation=replies&dateline=all"> معاينة </a>',
	'manage_verifyuser'		=> 'أعضاء جدد في الإنتظار,<a href="admin.php?action=moderate&operation=members"> معاينة </a>',
	'manage_verifyblog'		=> 'مدونة جديدة في الإنتظار,<a href="admin.php?action=moderate&operation=blogs"> معاينة </a>',
	'manage_verifydoing'		=> 'فعل جديد في الإنتظار,<a href="admin.php?action=moderate&operation=doings"> معاينة </a>',
	'manage_verifypic'		=> 'صورة جديدة في الإنتظار, <a href="admin.php?action=moderate&operation=pictures"> معاينة </a>',
	'manage_verifyshare'		=> 'منشور جديد في الإنتظار,<a href="admin.php?action=moderate&operation=shares"> معاينة </a>',
	'manage_verifycommontes'	=> 'تعليق جديد في الإنتظار.<a href="admin.php?action=moderate&operation=comments"> معاينة </a>',
	'manage_verifyrecycle'		=> 'موضوع جديد في سلة المهملات بالانتظار,<a href="admin.php?action=recyclebin"> الاتفاق الآن</a>',
	'manage_verifyrecyclepost'	=> 'رد في سلة الردود المهملة بالانتظار.<a href="admin.php?action=recyclebinpost"> الاتفاق الآن</a>',
	'manage_verifyarticle'		=> 'مقالة جديدة بالانتظار,<a href="admin.php?action=moderate&operation=articles"> معاينة </a>',
	'manage_verifymedal'		=> 'وسام في الإنتظار,<a href="admin.php?action=medals&operation=mod"> معاينة </a>',
	'manage_verifyacommont'		=> 'تعليق مقالة في الإنتظار,<a href="admin.php?action=moderate&operation=articlecomments"> معاينة </a>',
	'manage_verifytopiccommont'	=> 'تعليق موضوع بالانتظار,<a href="admin.php?action=moderate&operation=topiccomments"> معاينة </a>',//'有新的待审核专题评论。<a href="admin.php?action=moderate&operation=topiccomments">现在进行审核</a>',
	'manage_verify_field'		=> ' {verifyname} جديد في الإنتظار ,<a href="admin.php?action=verify&operation=verify&do={doid}"> الاتفاق الآن</a>',//'有新的待处理{verifyname}。<a href="admin.php?action=verify&operation=verify&do={doid}">现在处理</a>',
	'system_notice'			=> '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration'		=> 'الإعلان التالي سوف ينتهي خلال {day} يوم. الرجاء الاتفاق مع:<br />{advs}',
	'report_change_credits'		=> '{actor} تعامل مع تقريرا خاص بك, نقاطك {creditchange}',
	'new_report'			=> 'هناك تقرير جديد, <a href="admin.php?action=report" target="_blank">إضغط هنا</a> لدخول لوحة تحكم الإدارة.',
	'new_post_report'		=> 'تقرير جديد في الإنتظار ,<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank"> الإدارة</a>.',
	'magics_receive'		=> 'لقد استقبلت من {actor} دعامة  {magicname}
					<p class="summary">{actor} يقول: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">رجوع</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">عرض الدعائم الخاصة بي</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
//'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
//'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
//'terms_of_services'		=> 'This is Rules.\nMust read!',

);

