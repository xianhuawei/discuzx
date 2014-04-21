<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 * *		Translate by DCV team - http://www.discuz.vn

 *      $Id: lang_highlight.php 17773 2010-11-01 09:29:31Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'highlight_name' => 'Thẻ đổi màu',
	'highlight_desc' => 'Dùng để đổi màu tiêu đề chủ đề, blog được đánh dấu',
	'highlight_expiration' => 'Thời gian đổi màu',
	'highlight_expiration_comment' => 'Thiết lập thời gian hiệu quả, mặc định 24 giờ',
	'highlight_forum' => 'Cho phép sử dụng các đạo cụ của Diễn đàn',
	'highlight_info_tid' => 'Làm nổi bật tiêu đề của chủ đề, còn {expiration} h hết hạn',
	'highlight_info_blogid' => 'có thể đánh dấu các bản ghi hoặc tiêu đề bài thay đổi màu',
	'highlight_color' => 'Màu sắc',
	'highlight_info_nonexistence_tid' => 'Hãy xác định chủ đề cần đổi màu tiêu đề',
	'highlight_info_nonexistence_blogid' => 'Hãy xác định blog cần đổi màu tiêu đề',
	'highlight_succeed_tid' => 'Chủ đề của bạn đã được làm nổi bật',
	'highlight_succeed_blogid' => 'Blog của bạn đã được làm nổi bật',
	'highlight_info_noperm' => 'Có lỗi, không được phép sử dụng đạo cụ ở đây',
	'highlight_info_notype' => 'Lỗi tham số, không chỉ định loại hoạt động',

	'highlight_notification' => 'Chủ đề {subject} của bạn được {actor} dùng {magicname} <a href="forum.php?mod=viewthread&tid={tid}">Xem</a>',
	'highlight_notification_blogid' => 'Blog {subject} của bạn được {actor} dùng {magicname} <a href="home.php?mod=space&do=blog&id={blogid}">Xem</a>',
);

?>