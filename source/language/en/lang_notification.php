<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'type_wall'		=> 'Wall message',//'留言',
	'type_piccomment'	=> 'Image comment',//'图片评论',
	'type_blogcomment'	=> 'Blog comment',//'日志评论',
	'type_clickblog'	=> 'Blog positioning',//'日志表态',
	'type_clickarticle'	=> 'Article positioning',//'文章表态',
	'type_clickpic'		=> 'Image positioning',//'图片表态',
	'type_sharecomment'	=> 'Share comment',//'分享评论',
	'type_doing'		=> 'Doings',//'记录',
	'type_friend'		=> 'Friends',//'好友',
	'type_credit'		=> 'Money',//'积分',
	'type_bbs'		=> 'Forum',//'论坛',
	'type_system'		=> 'System',//'系统',
	'type_thread'		=> 'Threads',//'主题',
	'type_task'		=> 'Tasks',//'任务',
	'type_group'		=> 'Groups',//'群组',

	'mail_to_user'		=> 'New notification',//'有新的通知',
	'showcredit'		=> '{actor} giving you a bid {credit} points to improve your position in the <a href="home.php?mod=space&do=top" target="_blank">Top List</a>.',//'{actor} 赠送给你 {credit} 个竞价积分，帮助提升在 <a href="home.php?mod=space&do=top" target="_blank">竞价排行榜</a> 中的名次',
	'share_space'		=> '{actor} shared your space.',//'{actor} 分享了你的空间',
	'share_blog'		=> '{actor} shared your blog <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_album'		=> '{actor} shared your album <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic'		=> '{actor} shared your image from album <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 {albumname} 中的 <a href="{url}" target="_blank"> 图片</a>',
	'share_thread'		=> '{actor} shared your thread <a href="{url}" target="_blank">{subject}</a>.',//'{actor} 分享了你的帖子 <a href="{url}" target="_blank">{subject}</a>',
	'share_article'		=> '{actor} shared your article <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的文章 <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note'	=> ' presented to you a magic <a href="{url}" target="_blank">{name}</a>.',//'送给你一个道具 <a href="{url}" target="_blank">{name}</a>',
	'friend_add'		=> '{actor} and you become friends.',//'{actor} 和你成为了好友',
	'friend_request'	=> '{actor} requested you to add as a friend: {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Approve the request</a>',//'{actor} 请求加您为好友{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">批准申请</a>',
	'doing_reply'		=> '{actor} replied to your <a href="{url}" target="_blank">Twit</a>.',//'{actor} 在 <a href="{url}" target="_blank">记录</a> 中对你进行了回复',
	'wall_reply'		=> '{actor} replied to your <a href="{url}" target="_blank">Wall message</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">留言</a>',
	'pic_comment_reply'	=> '{actor} replied to your <a href="{url}" target="_blank">image comment</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">图片评论</a>',
	'blog_comment_reply'	=> '{actor} replied to your <a href="{url}" target="_blank">blog comment</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">日志评论</a>',
	'share_comment_reply'	=> '{actor} replied to your <a href="{url}" target="_blank">share comment</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">分享评论</a>',
	'wall'			=> '{actor} left a <a href="{url}&fchannel=nwall" target="_blank">message</a> on your Wall.',//'{actor} 在留言板上给你 <a href="{url}&fchannel=nwall" target="_blank">留言</a>',
	'pic_comment'		=> '{actor} commented your <a href="{url}" target="_blank">image</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">图片</a>',
	'blog_comment'		=> '{actor} commented your blog <a href="{url}" target="_blank">{subject}</a>',//'{actor} 评论了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_comment'		=> '{actor} commented your <a href="{url}" target="_blank">share</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">分享</a>',
	'click_blog'		=> '{actor} ratedon your blog <a href="{url}" target="_blank">{subject}</a> made a statement',//'{actor} 对你的日志 <a href="{url}" target="_blank">{subject}</a> 做了表态',
	'click_pic'		=> '{actor} rated your <a href="{url}" target="_blank">image</a>',//'{actor} 对你的 <a href="{url}" target="_blank">图片</a> 做了表态',
	'click_article'		=> '{actor} rated your <a href="{url}" target="_blank">article</a>',//'{actor} 对你的 <a href="{url}" target="_blank">文章</a> 做了表态',
	'show_out'		=> '{actor} visited your home page, this showed your final bid point also consumed',//'{actor} 访问了你的主页后，你在竞价排名榜中最后一个积分也被消费掉了',
	'puse_article'		=> 'Congratulations, your article <a href="{url}" target="_blank">{subject}</a> has been pushed to portal, <a href="{newurl}" target="_blank">click here to view</a>',//'恭喜你，你的<a href="{url}" target="_blank">{subject}</a>已被推送到门户， <a href="{newurl}" target="_blank">点击查看</a>',

	'myinvite_request'	=> 'New application message <a href="home.php?mod=space&do=notice&view=userapp">Click here to enter the application info page and related operations</a>',//'有新的应用消息<a href="home.php?mod=space&do=notice&view=userapp">点此进入应用消息页面进行相关操作</a>',


	'group_member_join'	=> '{actor} want to join your group <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, please moderate him in the <a href="{url}" target="_blank">Group CP</a>',//'{actor} 加入你的群组需要审核，请到群组 <a href="{url}" target="_blank">管理后台</a> 进行审核',
	'group_member_invite'	=> '{actor} invite you to join the group <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, <a href="{url}" target="_blank">Click here to join now</a>',//'{actor} 邀请你加入 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组，<a href="{url}" target="_blank">点此马上加入</a>',
	'group_member_check'	=> 'You request to join the group <a href="{url}" target="_blank">{groupname}</a> was approved, please <a href="{url}" target="_blank">Click to visit</a>',//'你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
	'group_member_check_failed'	=> 'Your group <a href="{url}" target="_blank">{groupname}</a> did not pass the verification',//'你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',
	'group_mod_check'		=> 'The group you have created "<a href="{url}" target="_blank">{groupname}</a>" was approved, please <a href="{url}" target="_blank">Click here to visit</a>',//'您的创建的群组 <a href="{url}" target="_blank">{groupname}</a> 审核通过了，请 <a href="{url}" target="_blank">点击这里访问</a>',

	'reason_moderate'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> 'Your post in <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was deleted by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> 'Your comment in <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> was deleted by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

//	'reason_warn_post' => '您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction}<br />
//连续 {warningexpiration} 天内累计 {warninglimit} 次警告，您将被自动禁止发言 {warningexpiration} 天。<br />
//截止至目前，您已被警告 {authorwarnings} 次，请注意！<div class="quote"><blockquote>{reason}</blockquote></div>',
	'reason_warn_post'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor}.<br />
				If you were warned {warninglimit} times in {warningexpiration} days, you will be disabled to post {warningexpiration} days automatically.<br />
				Currently, you have been warned {authorwarnings} times!
				<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'		=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was moved to <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'		=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was copied as <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'	=> 'Your reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was removed by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'	=> 'To your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was added a stamp {stamp} by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was removed stamp by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> by {actor} added the icon {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> by {actor} revoked the icon <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> 'Your reply to the thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was sticked to top by {actor}. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> 'Your reply in thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was unsticked by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_quickclear'	=> 'Your {cleartype} was removed by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'您的{cleartype} 被 {actor} 清除 <div class="quote"><blockquote>{reason}</blockquote></div>',

/*!*/	'reason_live_update'	=> '{actor} added a live broadcast to your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, <div class="quote"><blockquote>{reason}</blockquote></div>',//'您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置为直播贴 <div class="quote"><blockquote>{reason}</blockquote></div>',
/*!*/	'reason_live_cancle'	=> '{actor} removed a live broadcast to your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, <div class="quote"><blockquote>{reason}</blockquote></div>',//'您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 取消直播 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'	=> 'Your thread {threadsubject} was not approved, it has been deleted! <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete_reason' => 'Published by you thread {threadsubject} was not approved, and now has been deleted! <div class="quote"><blockquote>{reason}</blockquote></div>',//'您发表的主题 {threadsubject} 未通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',
	'modthreads_validate'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> was approved! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Click to view it &rsaquo;</a>',//'你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'modreplies_delete'	=> 'Your reply was not approved, it has been deleted! <p class="summary">Content: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'	=> 'Your reply was approved! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Click to view it</a> <p class="summary">Content: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'		=> '{actor} sent you {credit} points. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">View</a>
				<p class="summary">{actor} said: <span>{transfermessage}</span></p>',

//	'addfunds' => '您提交的积分充值请求已完成，相应数额的积分已存入您的积分账户 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看 &rsaquo;</a>
//<p class="summary">订单号：<span>{orderid}</span></p><p class="summary">支出：<span>人民币 {price} 元</span></p><p class="summary">收入：<span>{value}</span></p>',
	'addfunds'		=> 'Your request to recharge points successfully completed, Corresponding amount of points have been added to your points account.
				&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Click to view &rsaquo;</a>.
				<p class="summary">Order number: <span>{orderid}</span></p>
				<p class="summary">Payment: <span>{price} USD</span></p>
				<p class="summary">Incoming points: <span>{value}</span></p>',

	'rate_reason'		=> '{actor} have rated [{ratescore}] your post in the thread <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a>. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'recommend_note_post'	=> 'Congratulations, Your post <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was recommended',//'恭喜，您的帖子 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被编辑采用',

	'rate_removereason'	=> '{actor} removed rating {ratescore} from your thread <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> has bought your product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, the other side has been paid, waiting for your delivery. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm'	=> 'The product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>  you have bought,  was shipped by the seller <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a>, now waiting for your confirmation. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success'	=> 'The product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> have been refunded successfully. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success'		=> 'The product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> have been saled successfully. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid'	=> 'Seller <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> modified the product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, make sure to view it. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">view it</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid'	=> 'Buyer <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> modified the order <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure to view it. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">View it</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit'		=> '(actor) have rated you transaction &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Comment it</a>',//'与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

	'activity_notice'	=> '{actor} want to join your event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, please <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'activity_apply'	=> 'Organizer "{actor}" has approved your join to the event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> '{actor} initiated the event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, and inform you that you need to improve the event registration information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> 'The event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> organizer "{actor}" has refused your join to this event &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">View it</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> '{actor} canceled your participation in <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> event. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">View &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> 'The event <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> initiator {actor} sent a new information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看活动 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> 'Your reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was set a best answer by {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">view it</a>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer'	=> 'Your reply in reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was set as the best answer by author {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'你的回复被的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> 'Your reply to the reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was selected as the best answer &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add'		=> '{actor} commented your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">View &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor} replied your post in the thread <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a>. &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">View</a>',

	'task_reward_credit'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get bonus {creditbonus} points. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">View my points &rsaquo;</a></p>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

	'task_reward_magic'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get {bonus} magic <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

	'task_reward_medal'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and awarded the medal <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a>. Valid for: {bonus} days.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

	'task_reward_medal_forever'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, Get medal <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> Permanent',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

	'task_reward_invite'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>. The <a href="home.php?mod=spacecp&ac=invite" target="_blank">Invitation code {rewardtext}</a> is valid for {bonus} days.',

	'task_reward_group'	=> 'Congratulation! You have completed the task: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, and get the user group {rewardtext}. Valid for: {bonus} days. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">View my permissions</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'user_usergroup'	=> 'Your user group upgraded to {usergroup}. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">View my permissions</a>',//'你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'grouplevel_update'	=> 'Congratulation! Your group {groupname} level is upgraded to {newlevel}.',//'恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

	'thread_invite'		=> '{actor} invite {invitename} to the <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View it</a>',//'{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'blog_invite'		=> '{actor} invited you to view the blog <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a>, &nbsp; <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank" class="lit">View &rsaquo;</a>',//'{actor} 邀请您查看日志 <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a> &nbsp; <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'article_invite'	=> '{actor} invited you to view the article <a href="portal.php?mod=view&aid={aid}" target="_blank">{subject}</a>, &nbsp; <a href="portal.php?mod=view&aid={aid}" target="_blank" class="lit">View &rsaquo;</a>',//'{actor} 邀请您查看文章 <a href="portal.php?mod=view&aid={aid}" target="_blank">{subject}</a> &nbsp; <a href="portal.php?mod=view&aid={aid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'invite_friend'		=> 'Congratulation! You have invited and successfully added as a friend by {actor}.',//'恭喜你成功邀请到 {actor} 并成为你的好友',

	'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a> sent a greeting: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Reply the greeting</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Ignore</a>',//'<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">回打招呼</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">忽略</a>',

	'profile_verify_error'		=> '{verify} data verification was rejected. The following fields need to be filled in:<br/>{profile}<br/>The reject reason: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass'		=> 'Congratulations, your {verify} data was verified by ',//'恭喜你，你填写的{verify}资料审核通过了',
	'profile_verify_pass_refusal'	=> 'Sorry, your {verify} data was rejected',//'很遗憾，你填写的{verify}资料审核被拒绝了',
	'member_ban_speak'		=> 'You have been prohibited to speak (R/O) by {user} for the period of {day} days (0 means permanently). R/O reason: {reason}',//'你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',
	'member_ban_visit'		=> 'You have been banned by {user} for the period of {day} days (0 means the permanent ban). Ban reason: {reason}',//'您已被 {user} 禁止访问，期限：{day}天(0：代表永久禁止访问)，禁止访问理由：{reason}',
	'member_ban_status'		=> 'You have been banned by {user}, Ban reason: {reason}',//'您已被 {user} 锁定，禁止访问理由：{reason}',
	'member_follow'			=> 'There are {count} new feeds from people you follow. <a href="home.php?mod=follow">Click to view</a>',//'您关注的人已有{count}条新动态。<a href="home.php?mod=follow">Click to view</a>',
	'member_follow_add'		=> '{actor} have followed to you. <a href="home.php?mod=follow&do=follower">Click to view</a>',//'{actor} 收听了你。<a href="home.php?mod=follow&do=follower">Click to view</a>',

	'member_moderate_invalidate'	=> 'Your account was rejected by administrator, please <a href="home.php?mod=spacecp&ac=profile">resubmit your registration info</a>.<br />Administrator remark: <b>{remark}</b>',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_validate'	=> 'Your account has been approved.<br />Administrator remark: <b>{remark}</b>',//'你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
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
	'report_change_credits'		=> '{actor} has deal with your report, your points bonus {creditchange}',//'{actor} 处理了你的举报，你的 {creditchange}',
	'at_message'			=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> in the thread <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> mentioned of your name <div class="quote"><blockquote>{message}</blockquote></div><a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">View now</a>.',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 在主题 <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> 中提到了你<div class="quote"><blockquote>{message}</blockquote></div><a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">现在去看看</a>。',
	'new_report'			=> 'new report pending, <a href="admin.php?action=report" target="_blank">Click here to manage it</a>.',//'有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
	'new_post_report'		=> 'New pending report, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Click here to enter the administration panel</a>.',//'有新的举报等待处理，<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">点此进入管理面版</a>。',
	'magics_receive'		=> '{actor} sent the magic {magicname} to you .
					<p class="summary">{actor} said: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">Return the gift back!</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">View my magics</a></p>',
	'invite_collection'		=> '{actor} invite you to join the collecton <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> work team.<br /><a href="forum.php?mod=collection&action=edit&op=acceptinvite&ctid={ctid}&dateline={dateline}">Accept the invitation</a>',//'{actor} 邀请您参与维护淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>。<br /> <a href="forum.php?mod=collection&action=edit&op=acceptinvite&ctid={ctid}&dateline={dateline}">接受邀请</a>',
	'collection_removed'		=> 'Your participation in the collection <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> work team was canceled by {actor}.',//'您参与维护的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 已被 {actor} 关闭。',
	'exit_collection'		=> 'You have successfully exited from the collection <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> work team',//'您已经退出维护淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>。',
	'collection_becommented'	=> 'Your collection <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> received new comment.',//'您的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 收到了新评论。',
	'collection_befollowed'		=> 'Your collection <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> new user subscribed!',//'您的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 有新用户订阅了！',
	'collection_becollected'	=> 'Congratulations, your thread <a href="forum.php?mod=viewthread&tid={tid}">{threadname}</a> was added to collection <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> !',//'恭喜您的主题 <a href="forum.php?mod=viewthread&tid={tid}">{threadname}</a> 被淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 收录了！',

	'pmreportcontent'		=> '{pmreportcontent}',

);

