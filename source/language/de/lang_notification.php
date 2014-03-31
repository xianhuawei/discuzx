<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2011-08-12) by Coldcut - http://www.cybertipps.com
 */

$lang = array
(

	'type_wall'		=> 'Pinwand',
	'type_piccomment'	=> 'Foto Kommentare',
	'type_blogcomment'	=> 'Blog Kommentare',
	'type_clickblog'	=> 'Melden Position',
	'type_clickarticle'	=> 'Artikel-Position',
	'type_clickpic'		=> 'Bildlage',
	'type_sharecomment'	=> 'Kommentare teilen',
	'type_doing'		=> 'Shouts',
	'type_friend'		=> 'Freunde',
	'type_credit'		=> 'Punkte',
	'type_bbs'		=> 'Forum',
	'type_system'		=> 'System',
	'type_thread'		=> 'Thema',
	'type_task'		=> 'Task',
	'type_group'		=> 'Gruppen',

	'mail_to_user'		=> 'Eine neue Mitteilung',
	'showcredit'		=> '{actor} hat dir {credit} Credits als Geschenk gesendet zur Erh&ouml;ung deines Rankings auf die <a href="misc.php?mod=ranklist&type=member" target="_blank">Auktions-Liste</a>.',
	'share_space'		=> '{actor} teilt den Space',
	'share_blog'		=> '{actor} teilte den Blog <a href="{url}" target="_blank">{subject}</a>',
	'share_album'		=> '{actor} teilte das Album <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic'		=> '{actor} teilte aus dem Album {albumname} das <a href="{url}" target="_blank"> Bild</a>',
	'share_thread'		=> '{actor} teilte das Thema <a href="{url}" target="_blank">{subject}</a>',
	'share_article'		=> '{actor} teilte den Artikel <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note'	=> 'Requisiten <a href="{url}" target="_blank">{name}</a>',
	'friend_add'		=> '{actor} hat einen Freund hinzugef&uuml;gt',
	'friend_request'	=> '{actor} hat einen Freund eine Anfrage gesendet {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Anwendung genehmigen</a>',//'{actor} ???????{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">????</a>',
	'doing_reply'		=> '{actor} antwortete auf den <a href="{url}" target="_blank">Shout</a>',
	'wall_reply'		=> '{actor} antwortete auf die <a href="{url}" target="_blank">Pinwand</a>',
	'pic_comment_reply'	=> '{actor} antwortete auf deinen <a href="{url}" target="_blank">Foto-Kommentar</a>',
	'blog_comment_reply'	=> '{actor} antwortete auf deinen <a href="{url}" target="_blank">Blog</a>',
	'share_comment_reply'	=> '{actor} antwortete auf dein <a href="{url}" target="_blank">Share</a>',
	'wall'			=> '{actor} hat auf deiner Pinwand eine <a href="{url}&fchannel=nwall" target="_blank">Nachricht</a> hinterlassen',
	'pic_comment'		=> '{actor} kommentierte dein <a href="{url}" target="_blank">Foto</a>',
	'blog_comment'		=> '{actor} kommentierte <a href="{url}" target="_blank">{subject}</a>',
	'share_comment'		=> '{actor} kommentierte dein <a href="{url}" target="_blank">Share</a>',
	'click_blog'		=> '{actor} hat <a href="{url}" target="_blank">{subject}</a> bewertet.',
	'click_pic'		=> '{actor} hat dein <a href="{url}" target="_blank">Bild</a> bewertet.',
	'click_article'		=> '{actor} hat deinen <a href="{url}" target="_blank">Artikel</a> bewertet.',
	'show_out'		=> '{actor} besuchte deine Startseite, Diagramm, das die letzte im Wettbewerb Ranking Punkte wurden durch verbraucht',
	'puse_article'		=> 'Gl&uuml;ckwunsch! Dein Artikel <a href="{url}" target="_blank">{subject}</a> wurde gepusht. <a href="{newurl}" target="_blank">Klicke hier</a> um ihn anzusehen.',

	'myinvite_request'	=> 'Eine neue Anwendung Nachricht <a href="home.php?mod=space&do=notice&view=userapp">Hier entsteht eine neue Anwendung Informationsseite damit zusammenhängenden Vorgängen</a>',//'???????<a href="home.php?mod=space&do=notice&view=userapp">????????????????</a>',


	'group_member_join'		=> '{actor} wollen Ihre Gruppe beizutreten, bitte moderate es in <a href="{url}" target="_blank">Gruppe CP</a>',
	'group_member_invite'		=> 'ladt Sie der Gruppe beitreten <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, <a href="{url}" target="_blank">Klicken Sie um sich jetzt anzumelden</a>',
'group_member_check'		=> 'You request to join the group <a href="{url}" target="_blank">{groupname}</a> was approved, please <a href="{url}" target="_blank">Click to visit</a>',//'你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
'group_member_check_failed'	=> 'Your group <a href="{url}" target="_blank">{groupname}</a> did not pass the verification',//'你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',

'reason_moderate'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_merge'		=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_delete_post'	=> 'Your post in <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was deleted by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_delete_comment'	=> 'Your comment in <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> was deleted by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_ban_post'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

//	'reason_warn_post'	=> '您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction}<br />
//连续 {warningexpiration} 天内累计 {warninglimit} 次警告，您将被自动禁止发言 {warningexpiration} 天。<br />
//截止至目前，您已被警告 {authorwarnings} 次，请注意！<div class="quote"><blockquote>{reason}</blockquote></div>',
'reason_warn_post'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor}.<br />
				If you were warned {warninglimit} times in {warningexpiration} days, you will be disabled to post {warningexpiration} days automatically.<br />
				Currently, you have been warned {authorwarnings} times!
				<div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_move'			=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was moved to <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_copy'			=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was copied as <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_remove_reward'		=> 'Your reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was removed by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stamp_update'		=> 'To your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was added a stamp {stamp} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stamp_delete'		=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was removed stamp by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stamplist_update'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> by {actor} added the icon {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stamplist_delete'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> by {actor} revoked the icon <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stickreply'		=> 'Your reply to the thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was sticked to top by {actor}. <div class="quote"><blockquote>{reason}</blockquote></div>',

'reason_stickdeletereply'	=> 'Your reply in thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was unsticked by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

'modthreads_delete'	=> 'Your thread {threadsubject} was not approved, it has been deleted! <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

'modthreads_validate'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> was approved! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Click to view it;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'modreplies_delete'	=> 'Your reply was not approved, it has been deleted! <p class="summary">Content: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

'modreplies_validate'	=> 'Your reply was approved! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Click to view it</a> <p class="summary">Content: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

'transfer'		=> 'You have received {credit} points from {actor} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">Click to view it</a>
			<p class="summary">{actor} said: <span>{transfermessage}</span></p>',

'addfunds'		=> 'Your request to recharge points successfully completed, Corresponding amount of points have been credited to your points account
        		&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Click to view &rsaquo;</a>.
			<p class="summary">Order number: <span>{orderid}</span></p>
        		<p class="summary">Payment: <span>{price} USD</span></p>
        		<p class="summary">Incoming points: <span>{value}</span></p>',
//	'addfunds'	=> '您提交的积分充值请求已完成，相应数额的积分已存入您的积分账户 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看 &rsaquo;</a>
//<p class="summary">订单号：<span>{orderid}</span></p><p class="summary">支出：<span>人民币 {price} 元</span></p><p class="summary">收入：<span>{value}</span></p>',

'rate_reason'		=> 'Your post in thread <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> was rated {ratescore} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

'rate_removereason'	=> '{actor} removed rating {ratescore} from your thread <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> bought your product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, the other has been paid, waiting for your delivery  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'trade_buyer_confirm'	=> 'You buy the product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a>  has shipped, waiting for your confirmation  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'trade_fefund_success'	=> 'Products <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> has a refund successfully, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

'trade_success'		=> 'Products <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> has been saled successfully, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

'trade_order_update_sellerid'	=> 'Seller <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> modified the product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure that &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">view it</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'trade_order_update_buyerid'	=> 'Buyer <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> modified the order <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure that &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">View it</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'eccredit'		=> 'With your transaction (actor) has been made evaluation to you &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Comment it</a>',//'与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

'activity_notice'	=> '{actor} applied to join your event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, please &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'activity_apply'	=> 'The event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> organizer "{actor}" has approved your join to this event &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'activity_replenish'	=> 'Event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, initiated by {actor}, inform you that you need to improve the event registration information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'activity_delete'	=> 'The event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> organizer "{actor}" has refused your join to this event &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">View it</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'activity_cancel'	=> '{actor} canceled your participation in <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> event. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">View &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

'activity_notification'	=> 'The event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> initiator {actor} sent a new information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看活动 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

'reward_question'	=> 'Your reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was set a best answer by {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">view it</a>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'reward_bestanswer'	=> 'Your reply in reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was set as the best answer by author {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'你的回复被的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'reward_bestanswer_moderator'	=> 'Your reply to the reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was selected as the best answer &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

'comment_add'		=> '{actor} commented your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">View &rsaquo;</a>',

'reppost_noticeauthor'	=> '{actor} replied your post in thread <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">View</a>',

'task_reward_credit'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get bonus {creditbonus} points. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">View my points &rsaquo;</a></p>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

'task_reward_magic'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get {bonus} magic <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

'task_reward_medal'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and awarded the medal <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a>. Valid for: {bonus} days.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

'task_reward_medal_forever'	=> 'Congratulations on completing your tasks: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, Get medal <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> Permanent',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

'task_reward_invite'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>. The <a href="home.php?mod=spacecp&ac=invite" target="_blank">Invitation code {rewardtext}</a> is valid for {bonus} days.',

'task_reward_group'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get the user group {rewardtext}. Valid for: {bonus} days. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">View my permissions</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

'user_usergroup'	=> 'Your user group upgraded to {usergroup}. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">View my permissions</a>',//'你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

'grouplevel_update'	=> 'Congratulation! Your group {groupname} level is upgraded to {newlevel}.',//'恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

'thread_invite'		=> '{actor} invite you to {invitename} the <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
'invite_friend'		=> 'Congratulation! You have invited and added by {actor} as friend successfully.',//'恭喜你成功邀请到 {actor} 并成为你的好友',

'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Back to say hello</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Ignore</a>',//'<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">回打招呼</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">忽略</a>',

'profile_verify_error'		=> '{verify} data review is denied, the following fields need to fill in:<br/>{profile}<br/>the reason for rejection: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
'profile_verify_pass'		=> 'Congratulations, you fill in the {verify} data reviewed by the',//'恭喜你，你填写的{verify}资料审核通过了',
'profile_verify_pass_refusal'	=> 'Sorry, you fill in the {verify} data reviewed was rejected',//'很遗憾，你填写的{verify}资料审核被拒绝了',
'member_ban_speak'			=> 'You have been prohibited to speak {user}, duration: {day}(0: on behalf of the permanent gag), banned to post reason: {reason}',//'你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',

'member_moderate_invalidate'		=> 'Your account was rejected by administrator, please <a href="home.php?mod=spacecp&ac=profile">resubmit your registration info</a>.<br />Administrator remark: <b>{remark}</b>',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
'member_moderate_validate'		=> 'Your account has been approved.<br />Administrator remark: <b>{remark}</b>',//'你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
'member_moderate_invalidate_no_remark'	=> 'Your account was rejected by administrator, please <a href="home.php?mod=spacecp&ac=profile">resubmit your registration info</a>.',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。',
'member_moderate_validate_no_remark'	=> 'Your account has been approved.',//'你的账号已经通过审核。',
'manage_verifythread'		=> 'New pending threads. <a href="admin.php?action=moderate&operation=threads&dateline=all">Verify now</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',
'manage_verifypost'		=> 'New pending replies. <a href="admin.php?action=moderate&operation=replies&dateline=all">Verify now</a>',//'有新的待审核回帖。<a href="admin.php?action=moderate&operation=replies&dateline=all">现在进行审核</a>',
'manage_verifyuser'		=> 'New pending members. <a href="admin.php?action=moderate&operation=members">Verify now</a>',//'有新的待审核会员。<a href="admin.php?action=moderate&operation=members">现在进行审核</a>',
'manage_verifyblog'		=> 'New pending blogs. <a href="admin.php?action=moderate&operation=blogs">Verify now</a>',//'有新的待审核日志。<a href="admin.php?action=moderate&operation=blogs">现在进行审核</a>',
'manage_verifydoing'		=> 'New pending doings. <a href="admin.php?action=moderate&operation=doings">Very now</a>',//'有新的待审核记录。<a href="admin.php?action=moderate&operation=doings">现在进行审核</a>',
'manage_verifypic'		=> 'New pending images. <a href="admin.php?action=moderate&operation=pictures">Verify now</a>',//'有新的待审核图片。<a href="admin.php?action=moderate&operation=pictures">现在进行审核</a>',
'manage_verifyshare'		=> 'New pending shares. <a href="admin.php?action=moderate&operation=shares">Verify now</a>',//'有新的待审核分享。<a href="admin.php?action=moderate&operation=shares">现在进行审核</a>',
'manage_verifycommontes'	=> 'New pending comments/replies. <a href="admin.php?action=moderate&operation=comments">Verify now</a>',//'有新的待审核留言/评论。<a href="admin.php?action=moderate&operation=comments">现在进行审核</a>',
'manage_verifyrecycle'		=> 'New pending Recycle Bin threads. <a href="admin.php?action=recyclebin">Verify now</a>',//'回收站有新的待处理主题。<a href="admin.php?action=recyclebin">现在处理</a>',
'manage_verifyrecyclepost'	=> 'New pending Recycle Bin posts. <a href="admin.php?action=recyclebinpost">Verify now</a>',//'回帖回收站有新的待处理回帖。<a href="admin.php?action=recyclebinpost">现在处理</a>',
'manage_verifyarticle'		=> 'New pending articles. <a href="admin.php?action=moderate&operation=articles">Verify now</a>',//'有新的待审核文章。<a href="admin.php?action=moderate&operation=articles">现在进行审核</a>',
'manage_verifymedal'		=> 'New pending medals. <a href="admin.php?action=medals&operation=mod">Verify now</a>',//'有新的待审核勋章申请。<a href="admin.php?action=medals&operation=mod">现在进行审核</a>',
'manage_verifyacommont'		=> 'New pending article comments. <a href="admin.php?action=moderate&operation=articlecomments">Verify now</a>',//'有新的待审核文章评论。<a href="admin.php?action=moderate&operation=articlecomments">现在进行审核</a>',
'manage_verifytopiccommont'	=> 'New pending topic comments. <a href="admin.php?action=moderate&operation=topiccomments">Verify now</a>',//'有新的待审核专题评论。<a href="admin.php?action=moderate&operation=topiccomments">现在进行审核</a>',
'manage_verify_field'		=> 'New pending fields {verifyname}. <a href="admin.php?action=verify&operation=verify&do={doid}">Verify now</a>',//'有新的待处理{verifyname}。<a href="admin.php?action=verify&operation=verify&do={doid}">现在处理</a>',
'system_notice'			=> '{subject}<p class="summary">{message}</p>',
'system_adv_expiration'		=> 'The following ads on your site will be expired in {day} days. Please deal with:<br />{advs}',//'您站点的以下广告将于 {day} 天后到期，请及时处理：<br />{advs}',
'report_change_credits'		=> '{actor} has deal with your report, your points {creditchange}',//'{actor} 处理了你的举报，你的 {creditchange}',
'new_report'			=> 'new report pending, <a href="admin.php?action=report" target="_blank">Click here to enter the background processing</a>.',//'有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
'new_post_report'		=> 'New pending report, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Click here to enter the administration panel</a>.',//'有新的举报等待处理，<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">点此进入管理面版</a>。',
//	'magics_receive'	=> '您收到 {actor} 送给您的道具 {magicname}
//<p class="summary">{actor} 说：<span>{msg}</span></p>
//<p class="mbn"><a href="home.php?mod=magic" target="_blank">回赠道具</a><span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">查看我的道具箱</a></p>',
'magics_receive'		=> 'You have received the magic {magicname} from {actor}.
				<p class="summary">{actor} said: <span>{msg}</span></p>
				<p class="mbn"><a href="home.php?mod=magic" target="_blank">Return the gift back!</a>
				<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">View my magics</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
'terms_of_services'		=> 'This is Rules.\nMust read!',

);

