<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'feed_blog_password'	=> '{actor} published a new password protected blog {subject}',//'{actor} 发表了新加密日志 {subject}',
	'feed_blog_title'	=> '{actor} published a new blog',//'{actor} 发表了新日志',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',//'<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} updated album',//'{actor} 更新了相册',
	'feed_album_body'	=> '<b>{album}</b><br />Total images: {picnum}',//'<b>{album}</b><br />共 {picnum} 张图片',
	'feed_pic_title'	=> '{actor} uploaded new image',//'{actor} 上传了新图片',
	'feed_pic_body'		=> '{title}',



	'feed_poll'		=> '{actor} started new poll',//'{actor} 发起了新投票',

	'feed_comment_space'	=> '{actor} left a message in {touser} wall',//'{actor} 在 {touser} 的留言板留了言',
	'feed_comment_image'	=> '{actor} commented the image of {touser}',//'{actor} 评论了 {touser} 的图片',
	'feed_comment_blog'	=> '{actor} commented the blog {blog} of {touser}',//'{actor} 评论了 {touser} 的日志 {blog}',
	'feed_comment_poll'	=> '{actor} commented the poll {poll} of {touser}',//'{actor} 评论了 {touser} 的投票 {poll}',
	'feed_comment_event'	=> '{actor} commented the event {event} started by {touser}',//'{actor} 在 {touser} 组织的活动 {event} 中留言了',
	'feed_comment_share'	=> '{actor} commented the share {share} of {touser}',//'{actor} 对 {touser} 分享的 {share} 发表了评论',

	'feed_showcredit'	=> '{actor} presented {credit} points to {fusername} for raise in <a href="misc.php?mod=ranklist&type=member">Top List</a>',//'{actor} 赠送给 {fusername} 竞价积分 {credit} 个，帮助好友提升在<a href="misc.php?mod=ranklist&type=member" target="_blank">竞价排行榜</a>中的名次',
	'feed_showcredit_self'	=> '{actor} spent {credit} points to raise himself in <a href="misc.php?mod=ranklist&type=member">Top List</a>',//'{actor} 增加竞价积分 {credit} 个，提升自己在<a href="home.php?mod=space&do=top" target="_blank">竞价排行榜</a>中的名次',
	'feed_doing_title'	=> '{actor} wrote doing: {message}',//'{actor}：{message}',
	'feed_friend_title'	=> '{actor} and {touser} become friends',//'{actor} 和 {touser} 成为了好友',



	'feed_click_blog'	=> '{actor} sent a &quot;{click}&quot; to {touser} blog {subject}',//'{actor} 送了一个“{click}”给 {touser} 的日志 {subject}',
	'feed_click_thread'	=> '{actor} sent a &quot;{click}&quot; to {touser} thread {subject}',//'{actor} 送了一个“{click}”给 {touser} 的话题 {subject}',
	'feed_click_pic'	=> '{actor} sent a &quot;{click}&quot; to {touser} image',//'{actor} 送了一个“{click}”给 {touser} 的图片',
	'feed_click_article'	=> '{actor} sent a &quot;{click}&quot; to {touser} article {subject}',//'{actor} 送了一个“{click}”给 {touser} 的文章 {subject}',


	'feed_task'			=> '{actor} completed the task {task}',//'{actor} 完成了有奖任务 {task}',
	'feed_task_credit'		=> '{actor} completed the task {task} and get bonus {credit} points',//'{actor} 完成了有奖任务 {task}，领取了 {credit} 个奖励积分',

	'feed_profile_update_base'	=> '{actor} updated profile info',//'{actor} 更新了自己的基本资料',
	'feed_profile_update_contact'	=> '{actor} updated contact info',//'{actor} 更新了自己的联系方式',
	'feed_profile_update_edu'	=> '{actor} updated education info',//'{actor} 更新了自己的教育情况',
	'feed_profile_update_work'	=> '{actor} updated work info',//'{actor} 更新了自己的工作信息',
	'feed_profile_update_info'	=> '{actor} updated personal data, hobbies, etc.',//'{actor} 更新了自己的兴趣爱好等个人信息',
	'feed_profile_update_bbs'	=> '{actor} updated personal info',//'{actor} 更新了自己的个人信息',
	'feed_profile_update_verify'	=> '{actor} updated verified personal info',//'{actor} 更新了自己的认证信息',

	'feed_add_attachsize'		=> '{actor} spent {credit} points to enlarge the upload space on {size}. Now more images may be uploaded. (<a href="home.php?mod=spacecp&ac=credit&op=addsize">I want this too!</a>)',//'{actor} 用 {credit} 个积分兑换了 {size} 附件空间，可以上传更多的图片啦(<a href="home.php?mod=spacecp&ac=credit&op=addsize">我也来兑换</a>)',

	'feed_invite'				=> '{actor} invited {username}, and they became friends',//'{actor} 发起邀请，和 {username} 成为了好友',

	'magicuse_thunder_announce_title'	=> '<strong>{username} issued a &quot;Sound of Thunder&quot;</strong>',//'<strong>{username} 发出了“雷鸣之声”</strong>',
	'magicuse_thunder_announce_body'	=> 'Hi everybody!<br /><a href="home.php?mod=space&uid={uid}">Welcome to my home page</a>',//'大家好，我上线啦<br /><a href="home.php?mod=space&uid={uid}" target="_blank">欢迎来我家串个门</a>',


	'feed_thread_title'		=> '{actor} started new thread',//'{actor} 发表了新话题',
	'feed_thread_message'		=> '<b>{subject}</b><br />{message}',//'<b>{subject}</b><br />{message}',

	'feed_reply_title'		=> '{actor} replied the topic {subject} of {author}',//'{actor} 回复了 {author} 的话题 {subject}',
	'feed_reply_title_anonymous'	=> 'Anonymous replied the topic {subject} of {author}',//'{actor} 回复了话题 {subject}',
	'feed_reply_message'		=> '',

	'feed_thread_poll_title'	=> '{actor} started new poll',//'{actor} 发起了新投票',
	'feed_thread_poll_message'	=> '<b>{subject}</b><br />{message}',//'<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title'	=> '{actor} voted in the poll {subject}',//'{actor} 参与了关于 {subject} 的投票',
	'feed_thread_votepoll_message'	=> '',

	'feed_thread_goods_title'	=> '{actor} put a new product for sell',//'{actor} 出售了一个新商品',
	'feed_thread_goods_message_1'	=> '<b>{itemname}</b><br />Price: {itemprice} per additional(???) {itemcredit} {creditunit}',//'<b>{itemname}</b><br />售价 {itemprice} 元 附加 {itemcredit}{creditunit}',
	'feed_thread_goods_message_2'	=> '<b>{itemname}</b><br />Price: {itemprice} USD',//'<b>{itemname}</b><br />售价 {itemprice} 元',
	'feed_thread_goods_message_3'	=> '<b>{itemname}</b><br />Price: {itemcredit} {creditunit}',//'<b>{itemname}</b><br />售价 {itemcredit}{creditunit}',

	'feed_thread_reward_title'	=> '{actor} started a new reward thread',//'{actor} 发起了新悬赏',
	'feed_thread_reward_message'	=> '<b>{subject}</b><br />Reward: {rewardprice} {extcredits}',//'<b>{subject}</b><br />悬赏 {rewardprice}{extcredits}',

	'feed_reply_reward_title'	=> '{actor} replied the reward thread {subject}',//'{actor} 回复了关于 {subject} 的悬赏',
	'feed_reply_reward_message'	=> '',

	'feed_thread_activity_title'	=> '{actor} started new event',//'{actor} 发起了新活动',
	'feed_thread_activity_message'	=> '<b>{subject}</b><br />Start time: {starttimefrom}<br />Location: {activityplace}<br />{message}',//'<b>{subject}</b><br />开始时间：{starttimefrom}<br />活动地点：{activityplace}<br />{message}',

	'feed_reply_activity_title'	=> '{actor} enrolled in the activitiy: {subject}',//'{actor} 报名参加了 {subject} 的活动',
	'feed_reply_activity_message'	=> '',

	'feed_thread_debate_title'	=> '{actor} started new debate',//'{actor} 发起了新辩论',
	'feed_thread_debate_message'	=> '<b>{subject}</b><br />Square: {affirmpoint}<br />Anti-square: {negapoint}<br />{message}',//'<b>{subject}</b><br />正方：{affirmpoint}<br />反方：{negapoint}<br />{message}',

	'feed_thread_debatevote_title_1'	=> '{actor} marked as positively the debate {subject}',//'{actor} 以正方身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_title_2'	=> '{actor} marked as negatively the debate {subject}',//'{actor} 以反方身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_title_3'	=> '{actor} marked as neutral the debate {subject}',//'{actor} 以中立身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_message_1'	=> '',
	'feed_thread_debatevote_message_2'	=> '',
	'feed_thread_debatevote_message_3'	=> '',

);

