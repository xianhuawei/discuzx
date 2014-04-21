<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_sortlist.php 14454 2010-08-12 01:47:36Z xupeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'sortlist_fids' => 'Diễn đàn',
	'sortlist_fids_comment' => 'Thiết lập hiện thị ở nhiều diễn đàn.Bạn hãy nhấm giữ phím CTRL để chọn các diễn đàn',
	'sortlist_startrow' => 'Hàng đầu tiên',
	'sortlist_startrow_comment' => 'Điền số 0 nếu muốn là hàng đầu tiên.',//'如需设定起始的数据行数，请输入具体数值，0 为从第一行开始，以此类推',
	'sortlist_showitems' => 'Các hàng còn lại.',
	'sortlist_showitems_comment' => 'Thiết lập số lượng hàng mà bạn muốn hiển thị, nó phải số nguyên lớn hơn 0.',//'设置一次显示的主题条目数，请设置为大于 0 的整数',
	'sortlist_titlelength' => 'Tiêu đề',
	'sortlist_titlelength_comment' => 'Thiết lập độ dài tối đa của tiêu đề',//'设置当标题长度超过本设定时，是否将标题自动缩减到本设定中的字节数，0 为不自动缩减',
	'sortlist_fnamelength' => 'Tên tiêu đề diễn đàn',
	'sortlist_fnamelength_comment' => 'Thiết lập độ dài tối đa tiêu đề bao gồm cả tên diễn đàn',//'设置标题长度是否将所在版块名称的长度一同计算在内',
	'sortlist_summarylength' => 'Mô tả',
	'sortlist_summarylength_comment' => 'Thiết lập độ dài của bản mô tả, để 0 sẽ giá trị mặc ​​định (255 ký tự)',//'设置主题简短内容的文字数，0 为使用默认值 255',
	'sortlist_tids' => 'Chủ đề',
	'sortlist_tids_comment' => 'Thiết lập id chủ đề cụ thể mà bạn muốn hiển thị, sử dụng "," ngăn cách nhiều tids',
	'sortlist_keyword' => 'Từ khóa',
	'sortlist_keyword_comment' => 'Thiết lập các từ khóa được sử dụng.<br />Bạn có thể sử dụng ký tự đại diện "*" trong từ khóa.<br />Nếu bạn muốn sử dụng một số từ khóa tại cùng một thời điểm, bạn có thể sử dụng "AND". Ví dụ: win32 AND Unix.<br />Nếu bạn muốn sử dụng chỉ cần một từ khóa, bạn có thể sử dụng "|" hoặc "OR". Ví dụ: win32 OR unix',//'设置标题包含的关键字。注意: 留空为不进行任何过滤<br />关键字中可使用通配符 "*"<br />匹配多个关键字全部，可用空格或 "AND" 连接。如 win32 AND unix<br />匹配多个关键字其中部分，可用 "|" 或 "OR" 连接。如 win32 OR unix',
	'sortlist_typeids' => 'Các loại chủ đề',
	'sortlist_typeids_comment' => 'Thiết lập các loại chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定分类的主题。注意: 全选或全不选均为不进行任何过滤',
	'sortlist_typeids_all' => 'Tất cả các loại chủ đề',
	'sortlist_sortids' => 'Sắp xếp ID',
	'sortlist_sortids_comment' => 'Thiết lập các loại chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定分类信息的主题。注意: 全选或全不选均为不进行任何过滤',
	'sortlist_sortids_all' => 'Tất cả danh mục',
	'sortlist_digest' => 'Lọc phân loại',
	'sortlist_digest_comment' => 'Chọn phạm vi chủ đề cụ thể. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'sortlist_digest_0' => 'Tổng quát',
	'sortlist_digest_1' => 'Loại I',
	'sortlist_digest_2' => 'Loại II',
	'sortlist_digest_3' => 'Loại III',
	'sortlist_stick' => 'Bộ lọc',
	'sortlist_stick_comment' => 'Chọn chủ đề: để có tính năng lọc chủ đề. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'sortlist_stick_0' => 'Tổng quát',
	'sortlist_stick_1' => 'Loại I',
	'sortlist_stick_2' => 'Loại II',
	'sortlist_stick_3' => 'Loại III',
	'sortlist_special' => 'Loại đặc biệt',
	'sortlist_special_comment' => 'Chọn chủ đề cần lọc đặc biệt. Lưu ý: nếu chọn không sẽ vô hiệu hóa tính năng này.',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'sortlist_special_1' => 'Thăm dò',
	'sortlist_special_2' => 'Thị trường',
	'sortlist_special_3' => 'Giải thưởng',
	'sortlist_special_4' => 'Sự kiện',
	'sortlist_special_5' => 'Tranh luận',
	'sortlist_special_0' => 'Tổng quát',
	'sortlist_special_reward' => 'Phần thưởng',
	'sortlist_special_reward_comment' => 'Chọn loại khen thưởng',//'设置特定类型的悬赏主题',
	'sortlist_special_reward_0' => 'Tất cả',//'全部',
	'sortlist_special_reward_1' => 'Cuối cùng',//'已解决',
	'sortlist_special_reward_2' => 'Sôi nổi',//'未解决',
	'sortlist_recommend' => 'Đê xuât chủ đề',
	'sortlist_recommend_comment' => 'Hiển thị chỉ những chủ đề được đề nghị',//'设置是否只显示推荐的主题',
	'sortlist_orderby' => 'Sắp xếp',
	'sortlist_orderby_comment' => 'Thiết lập các chủ đề',//'设置以哪一字段或方式对主题进行排序',
	'sortlist_orderby_lastpost' => 'Bài mới nhất',//'按最后回复时间倒序排序',
	'sortlist_orderby_dateline' => 'Thời gian bắt đầu',//'按发布时间倒序排序',
	'sortlist_orderby_replies' => 'Trả lời',//'按回复数倒序排序',
	'sortlist_orderby_views' => 'Lượt xem',//'按浏览次数倒序排序',
	'sortlist_orderby_heats' => 'Hot',//'按热度倒序排序',
	'sortlist_orderby_recommends' => 'Khuyến cáo',//'按主题评价倒序排序',
	'sortlist_lastpost' => 'Số lần đọc trong thời gian quy định',
	'sortlist_lastpost_nolimit' => 'Không giới hạn',//'不限制',
	'sortlist_lastpost_hour' => 'Đăng giờ cuối',//'一小时内',
	'sortlist_lastpost_day' => 'Đăng cuối ngày',
	'sortlist_lastpost_week' => 'Đăng cuối tuần',//'一周内',
	'sortlist_lastpost_month' => 'Đăng cuối tháng',//'一月内',
	'sortlist_orderby_hours_comment' => 'Thiết lập thời gian cụ thể',//'指定时间内浏览次数倒序排序的时间值',
);

?>