<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_feed.php 19827 2011-01-19 07:07:40Z monkey $
 */

$lang = array
(

	'feed_blog_password' => '{actor} đã đăng nhật ký có bảo mật {subject}',
	'feed_blog_title' => '{actor} đã đăng nhật ký mới',
	'feed_blog_body' => '<b>{subject}</b><br />{summary}',
	'feed_album_title' => '{actor} đã cập nhập album',
	'feed_album_body' => '<b>{album}</b><br /> Tất cả có {picnum} bức hình',
	'feed_pic_title' => '{actor} upload hình ảnh mới',
	'feed_pic_body' => '{title}',



	'feed_poll' => '{actor} đã đăng bầu chọn mới',

	'feed_comment_space' => '{actor} đã lưu lời nhắn ở {touser} ',
	'feed_comment_image' => '{actor} đã bình luận hình ảnh {touser}',
	'feed_comment_blog' => '{actor} đã bình luận {touser} blog {blog}',
	'feed_comment_poll' => '{actor} đã bình luận {touser} bầu chọn {poll}',
	'feed_comment_event' => '{actor} đã nhận xét {touser} hoạt động nhóm {event} ',
	'feed_comment_share' => '{actor} đã bình luận {touser} chia sẻ {share}',

	'feed_showcredit' => '{actor} đã tặng cho {fusername} điểm {credit} , giúp họ lên hạng ở <a href="home.php?mod=space&do=top" target="_blank">bảng xếp hạng</a>',
	'feed_showcredit_self' => '{actor} đã trả {credit} điểm, để nâng thứ hạng của mình trên <a href="home.php?mod=space&do=top" target="_blank">bảng xếp hạng</a>',
	'feed_doing_title' => '{actor}：{message}',
	'feed_friend_title' => '{actor} và {touser} đã trở thành bạn bè',



	'feed_click_blog' => '{actor} đã tặng 1 "{click}" cho bài viết {subject} của {touser}',
	'feed_click_thread' => '{actor} đã tặng 1 "{click}" cho  bài viết {subject} của {touser}',
	'feed_click_pic' => '{actor} đã tặng 1 "{click}" cho hình ảnh của {touser} ',
	'feed_click_article' => '{actor} đã tăng 1 "{click}" cho tác phẩm {subject} của {touser}',


	'feed_task' => '{actor} đã hoàn thành nhiệm vụ {task}',
	'feed_task_credit' => '{actor} hoàn thành nhiệm vụ {task},  nhận được {credit} điểm thưởng',

	'feed_profile_update_base' => '{actor} đã cập nhập thông tin cá nhân',
	'feed_profile_update_contact' => '{actor} đã cập nhập thông tin liên hệ',
	'feed_profile_update_edu' => '{actor} đã cập nhập tình độ học vấn',
	'feed_profile_update_work' => '{actor} đã cập nhập thông tin công việc',
	'feed_profile_update_info' => '{actor} đã cập nhập sở thích cá nhân',
	'feed_profile_update_bbs' => '{actor} đã cập nhập thông tin tên diễn đàn',
	'feed_profile_update_verify' => '{actor} đã cập nhập thông tin xác nhận',

	'feed_add_attachsize' => '{actor} dùng {credit} điểm để đổi {size} dung lượng file đính kèm, có thể upload nhiều hình ảnh hơn.(<a href="home.php?mod=spacecp&ac=credit&op=addsize"> click vào đây để đổi</a>)',

	'feed_invite' => '{actor} đã gửi lời mời, và đã kết bạn với {username}',

	'magicuse_thunder_announce_title' => '<strong>{username} gửi "tán thành"</strong>',
	'magicuse_thunder_announce_body' => 'Chào cả nhà, tôi đang online nè !<br /><a href="home.php?mod=space&uid={uid}" target="_blank"> Rất vui khi bạn ghé thăm blog của tôi</a>',


	'feed_thread_title' =>			'{actor} đã đăng chủ đề mới',
	'feed_thread_message' =>		'<b>{subject}</b><br />{message}',

	'feed_reply_title' =>			'{actor} đã trả lời chủ đề {subject} của {author} ',
	'feed_reply_title_anonymous' =>		'{actor} đã trả lời chủ đề {subject}',
	'feed_reply_message' =>			'',

	'feed_thread_poll_title' =>		'{actor} đã gửi bình chọn mới',
	'feed_thread_poll_message' =>		'<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title' =>		'{actor} đã bỏ phiếu chủ đề {subject}',
	'feed_thread_votepoll_message' =>	'',

	'feed_thread_goods_title' =>		'{actor} đã đăng sản phẩm mới',
	'feed_thread_goods_message_1' =>	'<b>{itemname}</b><br />Price {itemprice} USD and {itemcredit}{creditunit}',
	'feed_thread_goods_message_2' =>	'<b>{itemname}</b><br />Price {itemprice} USD',
	'feed_thread_goods_message_3' =>	'<b>{itemname}</b><br />Price {itemcredit}{creditunit}',

	'feed_thread_reward_title' =>		'{actor} đã gửi khen thưởng mới',
	'feed_thread_reward_message' =>		'<b>{subject}</b><br />khen thưởng {rewardprice}{extcredits}',

	'feed_reply_reward_title' =>		'{actor} replied a reward about {subject}',
	'feed_reply_reward_message' =>		'',

	'feed_thread_activity_title' =>		'{actor} đã đăng hoạt động mới',
	'feed_thread_activity_message' =>	'<b>{subject}</b><br />thời gian bắt đầu：{starttimefrom}<br /> địa điểm：{activityplace}<br />{message}',

	'feed_reply_activity_title' =>		'{actor} đã ghi danh tham gia hoạt động {subject}',
	'feed_reply_activity_message' =>	'',

	'feed_thread_debate_title' =>		'{actor} đã gửi biện luận',
	'feed_thread_debate_message' =>		'<b>{subject}</b><br />đồng tình：{affirmpoint}<br />phản đối：{negapoint}<br />{message}',

	'feed_thread_debatevote_title_1' =>	'{actor} đã tham gia đồng tình với biện luận của {subject}',
	'feed_thread_debatevote_title_2' =>	'{actor} đã tham gia phản đối với biện luận của {subject}',
	'feed_thread_debatevote_title_3' =>	'{actor} đã tham gia trung lập với biện luận của {subject}',
	'feed_thread_debatevote_message_1' =>	'',
	'feed_thread_debatevote_message_2' =>	'',
	'feed_thread_debatevote_message_3' =>	'',

);

