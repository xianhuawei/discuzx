<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_groupattachment.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'groupattachment_name' => 'Danh sách đính kèm',
	'groupattachment_desc' => 'Hiện thị danh sách đính kèm',
	'groupattachment_fids' => 'Thiết lặp  nhóm',
	'groupattachment_fids_comment' => 'Thiết lập hiện thị ở nhiều diễn đàn.Bạn hãy nhấm giữ phím CTRL để chọn các diễn đàn',
	'groupattachment_tids' => 'Chủ đề',
	'groupattachment_tids_comment' => 'Thiết lập id chủ đề cụ thể mà bạn muốn hiển thị, sử dụng "," tách tids',
	'groupattachment_gtids' => 'Danh mục nhóm',
	'groupattachment_gtids_comment' => 'Thiết lập danh mục của nhóm, nhấm giữ phím CTRL để chọn các nhóm',
	'groupattachment_startrow' => 'Hàng đầu tiên',
	'groupattachment_startrow_comment' => 'Nếu bạn cần phải thiết lập hàng đầu, vui lòng nhập một số, 0 là hàng đầu tiên.',//'如需设定起始的数据行数，请输入具体数值，0 为从第一行开始，以此类推',
	'groupattachment_items' => 'Các hàng còn lại.',
	'groupattachment_items_comment' => 'Thiết lập số lượng hàng mà bạn muốn hiển thị, nó phải số nguyên lớn hơn 0.',
	'groupattachment_titlelength' => 'Tiêu đề nhóm',
	'groupattachment_titlelength_comment' => 'Thiết lập độ dài tối đa của tiêu đề.',//'设置当附件名称/帖子标题显示的最大长度',
	'groupattachment_summarylength' => 'Mô tả nhóm',
	'groupattachment_summarylength_comment' => 'Thiết lập độ dài tối đa của mô tả.',//'设置附件介绍/帖子内容显示的最大长度',
	'groupattachment_maxwidth' => 'Chiều rộng tối đa hình ảnh, px',
	'groupattachment_maxwidth_comment' => 'Thiết lập kích thước hình ảnh tối đa để thu nhỏ chiều rộng này tự động, thiết lập 0 để vô hiệu hóa zoom ảnh',//'设置是否自动缩小或放大图片的尺寸到本设定的宽度，0 为不自动缩放',
	'groupattachment_maxheight' => 'Chiều cao tối đa hình ảnh, px',
	'groupattachment_maxheight_comment' => 'Thiết lập hình ảnh tự động phóng to đến độ cao này, đặt 0 để vô hiệu hoá tính năng zoom ảnh',//'设置是否自动缩小或放大图片的尺寸到本设定的高度，0 为不自动缩放',
	'groupattachment_threadmethod' => 'Xâu file đính kèm',
	'groupattachment_threadmethod_comment' => 'Chọn "Yes" thì file đính kèm sẽ hiện dưới chủ đề, một chủ đề sẽ hiển thị một tập tin đính kèm; "no" Thì mỗi chủ đề sẽ hiện nhiều đính kèm',//'选择“是”将按照主题方式调用附件，一个主题显示一个附件；选择“否”将按照附件方式调用',
	'groupattachment_digest' => 'Lọc phân loại',
	'groupattachment_digest_comment' => 'Chọn chủ đề: để có tính năng lọc chủ đề. Lưu ý: Tất cả hoặc không cho vô hiệu hoá tính năng lọc',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'groupattachment_digest_0' => 'Tổng quát',
	'groupattachment_digest_1' => 'Loại I',
	'groupattachment_digest_2' => 'Loại II',
	'groupattachment_digest_3' => 'Loại III',
	'groupattachment_special' => 'Chọn lọc đặc biệt',
	'groupattachment_special_comment' => 'Chọn chủ đề cần lọc đặc biệt. Lưu ý: Tất cả hoặc không cho vô hiệu hoá tính năng lọc',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'groupattachment_special_1' => 'Thăm dò',
	'groupattachment_special_2' => 'thị trường',
	'groupattachment_special_3' => 'Giải thưởng',
	'groupattachment_special_4' => 'Sự kiện',
	'groupattachment_special_5' => 'Tranh luận',
	'groupattachment_special_0' => 'Tổng quát',
	'groupattachment_special_reward' => 'Chọn lọc phần thưởng',//'悬赏主题过滤',
	'groupattachment_special_reward_comment' => 'Chọn loại khen thưởng',//'设置特定类型的悬赏主题',
	'groupattachment_special_reward_0' => 'Tất cả',
	'groupattachment_special_reward_1' => 'Cuối cùng',
	'groupattachment_special_reward_2' => 'Sôi nổi',
	'groupattachment_dateline' => 'Thời gian upload',
	'groupattachment_dateline_nolimit' => 'Không giới hạn',
	'groupattachment_dateline_hour' => 'Theo giờ',
	'groupattachment_dateline_day' => 'Theo ngày',
	'groupattachment_dateline_week' => 'Theo tuần',
	'groupattachment_dateline_month' => 'Theo tháng',
	'groupattachment_gviewperm' => 'Thiết lập nhóm cho phép xem',
	'groupattachment_gviewperm_nolimit' => 'Không giới hạn',
	'groupattachment_gviewperm_only_member' => 'Chỉ thành viên',
	'groupattachment_gviewperm_all_member' => 'Tất cả',
	'groupattachment_highlight' => 'Đánh dấu những từ được tìm thấy',
);

?>