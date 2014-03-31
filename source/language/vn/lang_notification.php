<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_notification.php 22303 2011-04-29 02:42:08Z maruitao $
 */

$lang = array
(

	'type_wall' => 'Lời nhắn',
	'type_piccomment' => 'Bình luận ảnh',
	'type_blogcomment' => 'Bình luận nhật ký',
	'type_clickblog' => 'Trạng thái nhật ký',
	'type_clickarticle' => 'Trạng thái tác phẩm',
	'type_clickpic' => 'Trạng thái hình ảnh',
	'type_sharecomment' => 'Chia sẻ bình luận',
	'type_doing' => 'Status',
	'type_friend' => 'Bạn bè',
	'type_credit' => 'Điểm',
	'type_bbs' => 'Diễn đàn',
	'type_system' => 'Hệ thống',
	'type_thread' => 'Chủ đề',
	'type_task' => 'Nhiệm vụ',
	'type_group' => 'Nhóm',

	'mail_to_user' => 'Có thông báo mới',
	'showcredit' => '{actor} tặng bạn {credit} điểm lên hạng, để giúp bạn lên hạng ở <a href="home.php?mod=space&do=top" target="_blank"> bảng xếp hạng</a> thành viên',
	'share_space' => '{actor} đã chia sẻ blog của bạn',
	'share_blog' => '{actor} đã chia sẻ nhật ký của bạn <a href="{url}" target="_blank">{subject}</a>',
	'share_album' => '{actor} đã chia sẻ album của bạn <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic' => '{actor} đã chia sẻ <a href="{url}" target="_blank"> hình ảnh </a> trong album {albumname} ',
	'share_thread' => '{actor} đã chia sẻ bài viết <a href="{url}" target="_blank">{subject}</a> của bạn',
	'share_article' => '{actor} đã chia sẻ tác phẩm <a href="{url}" target="_blank">{subject}</a> của bạn ',
	'magic_present_note' => 'đã tặng cho bạn công cụ <a href="{url}" target="_blank">{name}</a>',
	'friend_add' => '{actor} và bạn đã trở thành bạn bè',
	'friend_request' => '{actor} muốn kết bạn {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Chấp nhận</a>',
	'doing_reply' => '{actor} đã trả lời <a href="{url}" target="_blank">Status</a> của bạn',
	'wall_reply' => '{actor} đã trả lời <a href="{url}" target="_blank"> lời nhắn của bạn</a>',
	'pic_comment_reply' => '{actor} đã trả lời <a href="{url}" target="_blank"> bình luận hình ảnh</a> của bạn',
	'blog_comment_reply' => '{actor} đã trả lời <a href="{url}" target="_blank"> bình luận nhật ký</a> của bạn',
	'share_comment_reply' => '{actor} đã trả lời <a href="{url}" target="_blank"> bình luận chia sẻ </a> của bạn',
	'wall' => '{actor} để lại lời nhắn tại <a href="{url}&fchannel=nwall" target="_blank">Tường</a>của bạn',
	'pic_comment' => '{actor} đã bình luận <a href="{url}" target="_blank"> hình ảnh </a>của bạn',
	'blog_comment' => '{actor} đã bình luận nhật ký của bạn <a href="{url}" target="_blank">{subject}</a>',
	'share_comment' => '{actor} đã bình luận <a href="{url}" target="_blank">chia sẻ</a> của bạn',
	'click_blog' => '{actor} đã biểu cảm với blog <a href="{url}" target="_blank">{subject}</a> của bạn',
	'click_pic' => '{actor} đã biểu cảm với <a href="{url}" target="_blank">hình ảnh</a> của bạn',
	'click_article' => '{actor} đã để biểu cảm với <a href="{url}" target="_blank">tác phẩm </a>của bạn',
	'show_out' => '{actor} đã ghé thăm Blog của bạn làm tăng lượt truy cập và thứ hạng',
	'puse_article' => 'Chúc mừng bạn, chủ đề <a href="{url}" target="_blank">{subject}</a>của bạn đã được đề cử đến portal, <a href="{newurl}" target="_blank">click để xem</a>',

	'myinvite_request' => 'Tin ứng dụng mới<a href="home.php?mod=space&do=notice&view=userapp"> Click vào đây để vào các hoạt động ứng dụng liên quan</a>',


	'group_member_join' => '{actor} muốn gia nhập nhóm - CLB của bạn, hãy <a href="{url}" target="_blank"> vào quản lý</a> để duyệt',
	'group_member_invite' => '{actor} đã mời bạn gia nhập nhóm -CLB <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>,<a href="{url}" target="_blank">click vào đây để gia nhập</a>',
	'group_member_check' => 'Bạn đã được chấp nhận vào nhóm CLB <a href="{url}" target="_blank">{groupname}</a>, hãy <a href="{url}" target="_blank">click vào đây để xem</a>',
	'group_member_check_failed' => 'Bạn đã không được nhóm <a href="{url}" target="_blank">{groupname}</a> thông qua.',

	'reason_moderate' => 'Chủ đề của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge' => 'Chủ đề của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post' => 'Bài viết của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> đã bị {actor} xóa <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment' => 'Trả lời của bạn <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> đã bị {actor} xóa <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post' => 'Bài viết của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post' => 'Chủ đề của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} {modaction}<br />
Vào {warningexpiration} liên tục bạn nhận được {warninglimit} cảnh báo, bạn sẽ bọ cấm đăng bài {warningexpiration} ngày.<br />
Tính đến nay, bạn đã bị cảnh báo {authorwarnings} lần, xin lưu ý !<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} di chuyển tới <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} sao chép tới <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} thu hồi điểm <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} cập nhật {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} xóa <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} thêm biểu tượng {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} hủy bỏ biểu tượng <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} đính lên <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply' => 'Bài viết <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> được {actor} hủy bỏ đính <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete' => 'Chủ đề {threadsubject} không được chấp thuận, đã bị xóa !<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate' => 'Chủ đề <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> đã được phê duyệt! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete' => 'Trả lời của bạn đã không được thông qua, hiện đã bị xóa! <p class="summary">Nội dung:<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate' => 'Trả lời của bạn đã được thông qua và công bố ! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Xem &rsaquo;</a> <p class="summary">Nội dung:<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer' => 'Bạn nhận được từ {actor} số điểm là {credit} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">Xem &rsaquo;</a>
<p class="summary">{actor} Nội dung:<span>{transfermessage}</span></p>',

	'addfunds' => 'Bạn đã nạp điểm thành công, số tiền tương ứng đã được chuyển vào tài khoản của bạn ! &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Xem &rsaquo;</a>
<p class="summary">Số lệnh:<span>{orderid}</span></p><p class="summary">Chi:<span>{price} VNĐ</span></p><p class="summary">Thu nhập:<span>{value}</span></p>',

	'rate_reason' => 'Chủ đề <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> đăng bởi {actor} đánh giá {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason' => '{actor} thu hồi chủ đề <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> số điểm trong bài viết {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send' => '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> mua sản phẩm của bạn <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, thanh toán đã được thực hiện, đang chờ bạn giao hàng &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Xem &rsaquo;</a>',

	'trade_buyer_confirm' => 'Bạn mua <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>,<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> đã được chuyển đi, đang chờ bạn xác nhận &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Xemư &rsaquo;</a>',

	'trade_fefund_success' => 'Hàng hóa <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> đã được trả lại &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">đánh giá &rsaquo;</a>',

	'trade_success' => 'Hàng hóa <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> đã được giao dịch thành công &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">đánh giá &rsaquo;</a>',

	'trade_order_update_sellerid' => 'Người bán <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> sửa đổi <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> đơn giao dịch, vui lòng xác nhận &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">xem &rsaquo;</a>',

	'trade_order_update_buyerid' => 'Người mua <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> sửa đổi sản phẩm <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> đơn giao dịch, vui lòng xác nhận &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">xem &rsaquo;</a>',

	'eccredit' => 'Người giao dịch với bạn {actor} đã được đánh giá dành cho bạn &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">quay lại &rsaquo;</a>',

	'activity_notice' => '{actor} áp dụng để tham gia sự kiện của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, vui lòng xem lại &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">xem &rsaquo;</a>',

	'activity_apply' => 'Hoạt động <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> do {actor} tài trợ đã được phê duyệt để tham gia sự kiện &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish' => 'Sự kiện <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> do {actor} tài trợ thông báo các thông tin cần thiết để hoàn tất &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete' => 'Sự kiện <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> của {actor} từ chối đơn xin tham gia của bạn &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel' => '{actor} thoát khỏi sự kiện <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification' => 'Sự kiện <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> của {actor} gửi tin nhắn tới bạn&nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question' => 'Bạn đã trả lời tại bài <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> của {actor} được nhận phần thưởng cho câu trả lời đúng nhất &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a>',

	'reward_bestanswer' => 'Bạn đã trả lời tại bài <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> của {actor} được nhận phần thưởng cho câu trả lời đúng nhất &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a>',

	'reward_bestanswer_moderator' => 'Chủ đề phần thưởng của bạn <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> Câu trả lời hay nhất được chọn &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a>',

	'comment_add' => '{actor} bình luận trong chủ đề <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> của bạn&nbsp;<a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Xem &rsaquo;</a>',

	'reppost_noticeauthor' => '{actor} trả lời bài viết: <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> của bạn&nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">Xem</a>',

	'task_reward_credit' => 'Chúc mừng hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, phần thưởng {creditbonus} điểm &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Điểm của tôi &rsaquo;</a></p>',

	'task_reward_magic' => 'Chúc mừng hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, phần thưởng <a href="home.php?mod=magic&action=mybox" target="_blank">đạo cụ {rewardtext}</a> {bonus} cái',

	'task_reward_medal' => 'Chúc mừng hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, phần thưởng <a href="forum.php?mod=medal" target="_blank"> là huân chương {rewardtext}</a> trong {bonus} ngày',

	'task_reward_medal_forever' => 'Chúc mừng bạn đã hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, nhận được huy chương <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> vĩnh viễn',

	'task_reward_invite' => 'Chúc mừng hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, phần thưởng <a href="home.php?mod=spacecp&ac=invite" target="_blank">mã mời {rewardtext} cái</a> có hiệu lực {bonus} ngày',

	'task_reward_group' => 'Chúc mừng hoàn thành nhiệm vụ: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, phần thưởng ngày sử dụng trong nhóm {rewardtext} trong {bonus} ngày &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">Xem &rsaquo;</a>',

	'user_usergroup' => 'Bạn đã thăng đến cấp  {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit"> xem quyền hạn &rsaquo;</a>',

	'grouplevel_update' => 'Chúc mừng bạn, nhóm dùng của bạn đã được nâng cấp lên {groupname} {newlevel}',

	'thread_invite' => '{actor} mời bạn {invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Xem &rsaquo;</a>',
	'invite_friend' => 'Chúc mừng bạn đã mời kết bạn thành công với {actor}',

	'poke_request' => '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Quay lại chào hỏi</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Phớt lờ</a>',

	'profile_verify_error' => 'Thông tin {verify} đã bị từ chối, yêu cầu nhập lại: <br/>{profile}<br/> Lý do: {reason}',
	'profile_verify_pass' => 'Chúc mừng bạn! Thông tin {verify} đã được thông qua',
	'profile_verify_pass_refusal' => 'Chia buồn nhé, thông tin {verify} bạn điền bị từ chối',
	'member_ban_speak' => 'Bạn đã bị {user} cấm phát ngôn, thời hạn:{day} ngày(0: cấm vĩnh viễn), lý do: {reason}',

	'member_moderate_invalidate' => 'Tài khoản của bạn đã bị từ chối, vui lòng <a href="home.php?mod=spacecp&ac=profile">gửi lại thông tin đăng ký</a>.<br />BQT: <b>{remark}</b>',
	'member_moderate_validate' => 'Tài khoản của bạn đã được chấp thuận.<br />BQT: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark' => 'Tài khoản của bạn đã bị từ chối, vui lòng <a href="home.php?mod=spacecp&ac=profile">gửi lại thông tin đăng ký</a>.',
	'member_moderate_validate_no_remark' => 'Tài khoản của bạn đã được chấp thuận.',
	'manage_verifythread' => 'Có chủ đề mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=threads&dateline=all">Xem xét ngay</a>',
	'manage_verifypost' => 'Có trả lời mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=replies&dateline=all">Xem xét ngay</a>',
	'manage_verifyuser' => 'Có thành viên mới chờ duyệt. <a href="admin.php?action=moderate&operation=members">Xem xét ngay</a>',
	'manage_verifyblog' => 'Có Blog mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=blogs">Xem xét ngay</a>',
	'manage_verifydoing' => 'Có Hoạt động mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=doings">Xem xét ngay</a>',
	'manage_verifypic' => 'Có hình ảnh mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=pictures">Xem xét ngay</a>',
	'manage_verifyshare' => 'Có chia sẻ mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=shares">Xem xét ngay</a>',
	'manage_verifycommontes' => 'Có Tin nhắn/nhận xét mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=comments">Xem xét ngay</a>',
	'manage_verifyrecycle' => 'Có thùng rác chủ đề đang chờ duyệt. <a href="admin.php?action=recyclebin">Xử lý ngay</a>',
	'manage_verifyrecyclepost' => 'Có thùng rác trả lời đang chờ duyệt. <a href="admin.php?action=recyclebinpost">Xử lý ngay</a>',
	'manage_verifyarticle' => 'Có bài mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=articles">Xem xét ngay</a>',
	'manage_verifymedal' => 'Có ứng dụng huy chương đang chờ duyệt. <a href="admin.php?action=medals&operation=mod">Xem xét ngay</a>',
	'manage_verifyacommont' => 'Có nhận xét bài mới đang chờ duyệt. <a href="admin.php?action=moderate&operation=articlecomments">Xem xét ngay</a>',
	'manage_verifytopiccommont' => 'Có nhận xét chủ đề mới đang chờ duyệt<a href="admin.php?action=moderate&operation=topiccomments">Xem xét ngay</a>',
	'manage_verify_field' => 'Chờ duyệt lĩnh vực {verifyname}.<a href="admin.php?action=verify&operation=verify&do={doid}">Xử lý ngay</a>',
	'system_notice' => '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration' => 'Các quảng cáo trang web của bạn sẽ hết hạn sau {day} ngày, Vui lòng giải quyết ngay<br />{advs}',
	'report_change_credits' => '{actor} đã xử lý báo của bạn, {creditchange} của bạn',
	'new_report' => 'Có báo cáo đang chờ xử lý, <a href="admin.php?action=report" target="_blank">bấm vào đây để xem</a>.',
	'new_post_report' => 'Có báo cáo mới chở xử lý, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Click vào đây để vào quản lý</a>. ',
	'magics_receive' => 'Bạn nhận được công cụ do {actor} tặng cho bạn {magicname}
<p class="summary">{actor} Nội dung: <span>{msg}</span></p>
<p class="mbn"><a href="home.php?mod=magic" target="_blank">Quay lại Shop</a>
<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">Xem nhà kho</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
'terms_of_services'		=> 'This is Rules.\nMust read!',

);

