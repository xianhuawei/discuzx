<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_houselist.php 6757 2010-03-25 09:01:29Z cnteacher $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'categorylist_fids' => 'Diễn đàn',
	'categorylist_fids_comment' => 'Thiết lập hiện thị ở nhiều diễn đàn.Bạn hãy nhấm giữ phím CTRL để chọn các diễn đàn',
	'categorylist_startrow' => 'Hàng đầu tiên',
	'categorylist_startrow_comment' => 'Điền số 0 nếu muốn là hàng đầu tiên.',
	'categorylist_showitems' => 'Các hàng còn lại',
	'categorylist_showitems_comment' => 'Thiết lập số lượng hàng mà bạn muốn hiển thị, nó phải số nguyên lớn hơn 0.',//'设置一次显示的主题条目数，请设置为大于 0 的整数',
	'categorylist_titlelength' => 'Tiêu đề',
	'categorylist_titlelength_comment' => 'Thiết lập độ dài tối đa của tiêu đề',//'设置当标题长度超过本设定时，是否将标题自动缩减到本设定中的字节数，0 为不自动缩减',
	'categorylist_fnamelength' => 'Tên tiêu đề diễn đàn',
	'categorylist_fnamelength_comment' => 'Thiết lập độ dài tối đa tiêu đề bao gồm cả tên diễn đàn',//'设置标题长度是否将所在版块名称的长度一同计算在内',
	'categorylist_summarylength' => 'Mô tả',
	'categorylist_summarylength_comment' => 'Thiết lập độ dài của bản mô tả, để 0 sẽ giá trị mặc ​​định (255 ký tự)',//'设置主题简短内容的文字数，0 为使用默认值 255',
	'categorylist_tids' => 'Chủ đề',
	'categorylist_tids_comment' => 'Thiết lập id chủ đề cụ thể mà bạn muốn hiển thị, sử dụng "," ngăn cách nhiều tids',
	'categorylist_keyword' => 'Từ khóa',
	'categorylist_keyword_comment' => 'Thiết lập các từ khóa được sử dụng.<br />Bạn có thể sử dụng ký tự đại diện "*" trong từ khóa.<br />Nếu bạn muốn sử dụng một số từ khóa tại cùng một thời điểm, bạn có thể sử dụng "AND". Ví dụ: win32 AND Unix.<br />Nếu bạn muốn sử dụng chỉ cần một từ khóa, bạn có thể sử dụng "|" hoặc "OR". Ví dụ: win32 OR unix',
	'categorylist_sortids' => 'Sắp xếp ID',
	'categorylist_sortids_comment' => 'Chọn loại chủ đề cụ thể.  Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',
	'categorylist_styleids' => 'Id skin',
	'categorylist_styleids_comment' => 'Đặt id mẫu trong admincp',
	'categorylist_styleids_style1' => 'Style1',
	'categorylist_styleids_style2' => 'Style2',
	'categorylist_styleids_style3' => 'Style3',
	'categorylist_styleids_style4' => 'Style4',
	'categorylist_styleids_style5' => 'Style5',
	'categorylist_typeids_all' => 'Tất cả các chủ đề loại',
	'categorylist_categoryids' => 'Thể loại ID',
	'categorylist_categoryids_comment' => 'Thiết lập các phân loại chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定分类信息的主题。注意: 全选或全不选均为不进行任何过滤',
	'categorylist_categoryids_all' => 'Tất cả danh mục',
	'categorylist_digest' => 'Lọc phân loại',
	'categorylist_digest_comment' => 'Chọn chủ đề: để có tính năng lọc chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',
	'categorylist_digest_0' => 'Tổng quát',
	'categorylist_digest_1' => 'Loại I',
	'categorylist_digest_2' => 'Loại II',
	'categorylist_digest_3' => 'Loại III',
	'categorylist_stick' => 'Bộ lọc',
	'categorylist_stick_comment' => 'Chọn chủ đề: để có tính năng lọc chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',
	'categorylist_stick_0' => 'Tổng quát',
	'categorylist_stick_1' => 'Loại I',
	'categorylist_stick_2' => 'Loại II',
	'categorylist_stick_3' => 'Loại III',
	'categorylist_special' => 'Loại đặc biệt',
	'categorylist_special_comment' => 'Chọn chủ đề cần lọc đặc biệt. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',
	'categorylist_special_1' => 'Thăm dò',
	'categorylist_special_2' => 'Thị trường',
	'categorylist_special_3' => 'Giải thưởng',
	'categorylist_special_4' => 'Sự kiện',
	'categorylist_special_5' => 'Tranh luận',
	'categorylist_special_0' => 'Tổng quát',
	'categorylist_special_reward' => 'Phần thưởng',
	'categorylist_special_reward_comment' => 'Chọn loại khen thưởng',//'设置特定类型的悬赏主题',
	'categorylist_special_reward_0' => 'Tất cả',
	'categorylist_special_reward_1' => 'Cuối cùng',
	'categorylist_special_reward_2' => 'Sôi nổi',
	'categorylist_recommend' => 'Đê xuât chủ đề',
	'categorylist_recommend_comment' => 'Hiển thị chỉ những chủ đề được đề nghị',//'设置是否只显示推荐的主题',
	'categorylist_orderby' => 'Sắp xếp',
	'categorylist_orderby_comment' => 'Thiết lập các chủ đề',
	'categorylist_orderby_lastpost' => 'Bài mới nhất',
	'categorylist_orderby_dateline' => 'Thời gian bắt đầu',
	'categorylist_orderby_replies' => 'Trả lời',
	'categorylist_orderby_views' => 'Lượt xem',
	'categorylist_orderby_heats' => 'Hot',
	'categorylist_orderby_recommends' => 'Khuyến cáo',//'按主题评价倒序排序',
	'categorylist_orderby_hourviews' => 'Thời gian cho phép đọc',//'按指定时间内浏览次数倒序排序',
	'categorylist_orderby_todayviews' => 'Xem trong ngày',//'按当天浏览次数倒序排序',
	'categorylist_orderby_weekviews' => 'Xem trong tuần',//'按本周浏览次数倒序排序',
	'categorylist_orderby_monthviews' => 'Xem trong tháng',//'按当月浏览次数倒序排序',
	'categorylist_orderby_hours' => 'Chọn thời gian',
	'categorylist_orderby_hours_comment' => 'Thiết lập thời gian cụ thể',//'指定时间内浏览次数倒序排序的时间值',
);

?>