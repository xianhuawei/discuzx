/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables for Vietnamese

	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru
	Vietnamese by Discuz.vn
*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering:
var emaildomains = [
		'aol.com',
		'gmail.com',
		'hotmail.com',
		'msn.com',
		'yahoo.com'
		];

//--------------------------------
//static/js/common.js

var colortexts = {
	'Black'			: 'Màu đen',//'黑色',
	'Sienna'		: 'Màu đất',//'赭色',
	'DarkOliveGreen'	: 'Xanh',//'暗橄榄绿色',
	'DarkGreen'		: 'Xanh đậm',//'暗绿色',
	'DarkSlateBlue'		: 'Xám xanh',//'暗灰蓝色',
	'Navy'			: 'Hải quân',//'海军色',
	'Indigo'		: 'Màu Chàm',//'靛青色',
	'DarkSlateGray'		: 'Xanh đậm',//'墨绿色',
	'DarkRed'		: 'Đỏ Đậm',//'暗红色',
	'DarkOrange'		: 'Cam Đậm',//'暗桔黄色',
	'Olive'			: 'Mầu Quả Oliu',//'橄榄色',
	'Green'			: 'Xanh',//'绿色',
	'Teal'			: 'tối màu lục lam',//'水鸭色',
	'Blue'			: 'Xanh trời',//'蓝色',
	'SlateGray'		: 'Đá vôi',//'灰石色',
	'DimGray'		: 'Xám',//'暗灰色',
	'Red'			: 'Đỏ',//'红色',
	'SandyBrown'		: 'Nâu',//'沙褐色',
	'YellowGreen'		: 'Vàng xanh',//'黄绿色',
	'SeaGreen'		: 'Xanh Biển',//'海绿色',
	'MediumTurquoise'	: 'Xanh ngọc lục bảo',//'间绿宝石',
	'RoyalBlue'		: 'Xanh dương',//'皇家蓝',
	'Purple'		: 'Màu tía',//'紫色',
	'Gray'			: 'Ghi',//'灰色',
	'Magenta'		: 'Sắc đỏ sậm',//'红紫色',
	'Orange'		: 'Cam',//'橙色',
	'Yellow'		: 'Vàng',//'黄色',
	'Lime'			: 'Vôi',//'酸橙色',
	'Cyan'			: 'Xanh',//'青色',
	'DeepSkyBlue'		: 'Sâu xanh da trời',//'深天蓝色',
	'DarkOrchid'		: '-Lan tối',//'暗紫色',
	'Silver'		: 'Bạc',//'银色',
	'Pink'			: 'Màu hồng',//'粉色',
	'Wheat'			: 'Lúa mì',//'浅黄色',
	'LemonChiffon'		: 'Chanh-tơ',//'柠檬绸色',
	'PaleGreen'		: 'Nhạt màu xanh lá cây',//'苍绿色',
	'PaleTurquoise'		: 'Nhạt màu ngọc lam',//'苍宝石绿',
	'LightBlue'		: 'Ánh sáng xanh',//'亮蓝色',
	'Plum'			: 'Mận',//'洋李色',
	'White'			: 'Trắng' //'白色'
};

/*
',',	//'，',
'.',	//'。',
':',	//'点',
'!',	//'！'
'&laquo;',//'《',
'&raquo;',//'》',
*/


//--------------------------------

var lng = {

//---------------------------
//static/image/editor/editor_base.js
// USED in /source/module/home/home_editor.php
// MOVE TO:
//static/js/editor_base.js
	'restore_last_saved'	: 'Bạn có chắc khôi phục lần lưu cuối?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'Trình duyệt của bạn không hỗ trợ, vui lòng nhấn CTR + X để thực hiện.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'Trình duyệt của bạn không hỗ trợ, vui lòng nhấn CTR + C để thực hiện',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'Trình duyệt của bạn không hỗ trợ, vui lòng nhấn CTR + V để thực hiện',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'Không tìm thấy dữ liệu khởi tạo Graffiti',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Chỉ hỗ trợ IE 5.0.1 trở lên',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Chỉnh sửa thô',//'编辑源码',
	'plain_text_warn'	: 'Chuyển thành chỉ chữ sẽ mất các định dạng!\nBạn có chắc chắn tiếp tục?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'Trình duyệt của bạn không hỗ trợ tính năng này. Hãy cập nhật phiên bản mới!',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'Trợ giúp',//'小提示',
//	'show_tips'		: 'Show Tips',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'Hành động này chỉ hiệu quả khi dùng chế độ trù phú',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Thử tính năng điện toán đám mây',//'云平台其他接口测试',
	'int_roaming_test'	: 'Testing other Roaming interface',//'漫游其他接口测试',
	'int_qq_test'		: 'Testing QQ Internet interface',//'QQ互联接口测试',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Chọn một chủ đề để đưa ra trang chủ',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Chọn một bài viết để đưa ra trang chủ',//'请至少推送一条信息到列表区域',
	'loading'		: 'Đang tải...',//'加载中...',
	'push5reached'		: 'Bạn đã đẩy 5 chủ đề và không thể đẩy thêm nữa.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Ấn vào bên trái',//'点击左侧',
	'push_to_list'		: 'Đưa thông tin vào danh sách',//'将信息推送到列表',
	'wait_image_upload'	: 'Đang tải ảnh, hãy chờ...',//'图片上传中，请稍后...',






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Tháng trước',//'上一月',
	'next_month'	: 'Tháng sau',//'下一月',
	'select_year'	: 'Chọn năm',//'点击选择年份',
	'select_month'	: 'Chọn tháng',//'点击选择月份',
	'wday0'		: 'CN',//'日',
	'wday1'		: 'T2',//'一',
	'wday2'		: 'T3',//'二',
	'wday3'		: 'T4',//'三',
	'wday4'		: 'T5',//'四',
	'wday5'		: 'T6',//'五',
	'wday6'		: 'T7',//'六',
	'month'		: 'Tháng',//'月',
	'today'		: 'Hôm nay',//'今天',
	'hours'		: 'Giờ',//'点',
	'minutes'	: 'Phút',//'分',
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'Mở cửa sổ mới',//'在新窗口打开',
	'actual_size'		: 'Kích thước thực',//'实际大小',
	'close'			: 'Đóng',//'关闭',
	'wheel_zoom'		: 'Dùng con lăn để phóng to hoặc thu nhỏ ảnh',//'鼠标滚轮缩放图片',
	'reminder'		: 'Nhắc nhở',//'提示信息',
	'submit'		: 'OK',//'确定',
//	'submit'		: 'Submit',//'提交',
	'cancel'		: 'Hủy',//'取消',
//	'cancel'		: 'Cancel',//'取消',
	'wait_please'		: 'Đang tải ...',//'请稍候...',
	'int_error'		: 'Lỗi nội bộ không hiển thị được nội dung này',//'内部错误，无法显示此内容',
	'flash_required'	: 'Yêu cầu phải cài Adobe Flash Player 9.0.124 hoặc mới hơn',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Tải Flash Player',//'下载 Flash Player',
	'day1'			: '1 ngày',//'一天',
	'week1'			: '1 tuần',//'一周',
	'days7'			: '7 ngày',//'7 天',
	'days14'		: '14 ngày',//'14 天',
	'month1'		: '1 tháng',//'一个月',
	'month3'		: '3 tháng',//'三个月',
	'month6'		: '6 tháng',//'半年',
	'year1'			: '1 năm',//'一年',
	'custom'		: 'Tùy chọn',//'自定义',
	'permanent'		: 'vĩnh viễn',//'永久',
	'show_all_expr'		: 'Tất cả hình vui',//'显示所有表情',
	'page_prev'		: 'Trang trước',//'上页',
	'page_next'		: 'Trang sau',//'下页',
	'copy2clipboard'	: 'Sao chép vào clipboard',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Nhập nội dung tìm kiếm',//'请输入搜索内容',
	'refresh_q&a'		: 'Là mới Q&A',//'刷新验证问答',
	'refresh_code'		: 'Làm mới mã',//'刷新验证码',
	'code_invalid'		: 'Sai mã bảo mật, hãy điền lại',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'Câu trả lời sai, hãy điền lại',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'Đoạn mã đã được lưu vào clipboard',//'代码已复制到剪贴板',
	'enter_link_url'	: 'Điền URL',//'请输入链接地址',
	'enter_link_text'	: 'Điền link chữ',//'请输入链接文字',
	'enter_image_url'	: 'Điền link ảnh',//'请输入图片地址',
	'width_optional'	: 'Rộng (tùy chọn)',//'宽(可选)',
	'height_optional'	: 'Cao (tùy chọn)',//'高(可选)',
	'narrow_screen'		: 'Màn hẹp',//'切换到窄版',
	'wide_screen'		: 'Màn rộng',//'切换到宽版',
	'logging_wait'		: 'Đang đăng nhập, hãy chờ...',//'登录中，请稍后...',
	'notices_no'		: '[^_^]',//'【　　　】',
	'notices_yes'		: '[Nhắc nhở]',//'【新提醒】',
	'sec_after_win_closed'	: ' giây trước khi đóng cửa sổ',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' giây trước khi chuyển trang',//' 秒后页面跳转',
	'jump_now'		: 'Chuyển ngay',//'立即跳转',
	'error_message'		: 'Tin nhắn lỗi',//'错误信息',
	'ctrl_d_favorites'	: 'Ấn Ctrl + D để đặt bookmark',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'Không dùng IE thì hãy đặt trang chủ thủ công',//'非 IE 浏览器请手动将本站设为首页',
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Chỉnh',//'编辑',
	'warn_not_saved'	: 'Bạn đã chỉnh sửa dữ liệu. Nếu thoát mọi dữ liệu thay đổi sẽ bị mất.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'Tất cả thay đổi sẽ bị mất nếu bạn thoát. Bạn có chắc muốn thoát?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'Chọn ảnh để upload',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Không copy được, hãy "Đồng ý truy cập"',//'复制失败，请选择“允许访问”',
//	'permanent'		: 'Permanent',//'永久',
//	'open_new_win'		: 'Open in new window',//'在新窗口打开',
//	'actual_size'		: 'Actual Size',//'实际大小',
//	'close'			: 'Đóng',//'关闭',
//	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
//	'reminder'		: 'Reminder',//'提示信息',
	'prev'			: 'Trước.',//'上一张',
	'next'			: 'Sau',//'下一张',

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'Khôi phục kích thước khung soạn thảo',//'恢复编辑器大小',
	'full_screen_edit'	: 'Soạn thảo toàn màn hình',//'全屏方式编辑',
	'current_length'	: 'Độ dài hiện tại',//'当前长度',
	'bytes'			: 'kí tự',//'字节',
	'system_limit'		: 'Giới hạn hệ thống',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'Kiểm tra độ dài',//'字数检查',
	'data_restored'		: 'Dữ liệu đã được khôi phục',//'数据已恢复',
	'data_saved'		: 'Dữ liệu đã được lưu',//'数据已保存',
	'clear_all_sure'	: 'Bạn có chắc xóa hết?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'Nội dung ẩn',//'请输入要隐藏的信息内容',
	'free_content'		: 'Nếu bạn không điền giá bài viết nội dung có thể được xem miễn phí trước khi mua.',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'Chỉ xem khi có thành viên trả lời bài viết ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Chỉ xem khi thành viên có số điểm hơn ',//'只有当浏览者积分高于',
	'when_show'		: 'Chỉ',//'时才显示',
	'table_rows'		: 'Hàng',//'表格行数',
	'table_columns'		: 'Cột',//'表格列数',
	'table_width'		: 'Bảng rộng: ',//'表格宽度: ',
	'bg_color'		: 'Màu nền',//'背景颜色',
	'table_intro0'		: 'Cách tạo bảng nhanh',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=mã mầu]&quot; Màu nền<br />&quot;[td=Độ rộng]&quot; Độ rộng cột<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Độ dài rộng của hàng và cột<br /><br />Ví dụ: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />Tên:|Discuz!<br />Phiên bản:|X2<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Sử dụng &quot;|&quot; để ngắt hàng, nếu có kí tự &quot;|&quot; trong dữ liệu, thay thế bằng &quot;\\|&quot;, ngắt cột thì dùng kí tự &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'Điền link nhạc',//'请输入音乐文件地址',
	'video_url'		: 'Điền link video',//'请输入视频地址',
	'auto_play'		: 'Tự chạy?',//'是否自动播放',
	'flash_url'		: 'Điền link flash ',//'请输入 Flash 文件地址',
	'enter_please'		: 'Hãy điền',//'请输入第',
	'nth_parameter'		: '-lần thứ tham số',//' 个参数',
	'font'			: 'Tên thánh',//'字体',
	'full_screen'		: 'Toàn màn hình',//'全屏',
	'restore_size'		: 'Khôi phục kích thước',//'恢复',
	'general'		: 'Cơ Bản',//'常用',
	'simple'		: 'Nâng Cao',//'高级',
	'bad_browser'		: 'Trình duyệt của bạn không hỗ trợ tính năng này',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'Bấm vào đây để bật chế độ tự lưu',//'点击开启自动保存',
	'autosave_enable'	: 'Bật chế độ tự lưu',//'开启自动保存',
	'autosave_disable'	: 'Tắt chế độ tự lưu',//'点击关闭自动保存',
	'autosave_enabled'	: 'Bật chế độ tự lưu',//'数据自动保存已开启',
	'autosave_disabled'	: 'Tắt chế độ tự lưu',//'数据自动保存已关闭',
	'data_saved_at'		: 'Lưu lúc ',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: 's trước khi lưu tự động',//'秒后保存',
	'insert_quote'		: 'Điền vào trích dẫn',//'请输入要插入的引用',
	'insert_code'		: 'Điền vào code',//'请输入要插入的代码',
//	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址',
//	'width_optional'	: 'Width (optional)',//'宽(可选)',
//	'height_optional'	: 'Height (optional)',//'高(可选)',
	'enter_item_list'	: 'Nhập danh sách item.\r\nĐể trống hoặc nhấp vào Huỷ.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
//	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址',
//	'enter_link_text'	: 'Enter the link text',//'请输入链接文字',
//	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用',
	'width'			: 'Rộng',//'宽',
	'height'		: 'Cao',//'高',
	'audio_support'		: 'Hỗ trợ định dạng wma, mp3, ra, rm, ...<br />Ví dụ: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'Hỗ trợ youtube, vimeo và một số mạng video khác <br /> hỗ trợ wmv avi rmvb mov swf flv <br /> Ví dụ: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'Hỗ trợ Flash: swf flv <br /> Ví dụ: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'Paste từ file Word',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'Hãy sử dụng (Ctrl + V) để dán nội dung từ file Word',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'Bạn có chắc xóa độ nóng của chủ đền này?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'Có ',//'有',
//	'new_reply_exists'	: ' new replies in the thread, click to view',//'条存在新回复的主题，点击查看',
	'new_reply_exists'	: 'Chủ đề có trả ời mới, bấm để Xem',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Tìm trên mạng',//'网页搜索',
	'search_site'	: 'Tìm trong trang',//'站内搜索',
	'search'	: 'Tìm kiếm',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Chọn chủ đề để sửa đổi',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Lỗi nội bộ',//'内部服务器错误',
	'upload_ok'		: 'Upload thành công',//'上传成功',
	'ext_not_supported'	: 'Định dạng này không hỗ trợ',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'Xin lỗi, định dạng này không hỗ trợ.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'Định dạng ảnh không hợp lệ',//'图片附件不合法',
	'can_not_save_attach'	: 'Không lưu được file Đính kèm',//'附件文件无法保存',
	'invalid_file'		: 'Không có file được tải lên',//'没有合法的文件被上传',
	'illegal_operation'	: 'Hoạt động không hợp lệ',//'非法操作',
//	'current_length'	: 'Current Length',//'当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
//	'bytes'			: 'bytes',//'字节',
//	'check_length'		: 'Word Count',//'字数检查',
	'enter_content'		: 'Nhập tiêu đề hoặc nội dung',//'请完成标题或内容栏',
	'select_category'	: 'Chọn một thể loại tương ứng cho chủ đề',//'请选择主题对应的分类',
	'select_category_info'	: 'Chọn một thể loại tương ứng cho các thông tin chủ đề',//'请选择主题对应的分类信息',
	'title_long'		: 'Tiêu đề chiều dài vượt quá giới hạn 255 ký tự',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'Chiều dài nội dung không đáp ứng được yêu cầu.\n\n',//'您的帖子长度不符合要求。\n\n',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'ignore_pending_attach'	: 'Có tập tin đính kèm đang chờ giải quyết, bạn có chắc bỏ qua nó?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'Một số file đính kèm được tải lên, xin vui lòng chờ đợi. Chủ đề sẽ được công bố tự động sau khi các tập tin đã được tải lên ...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
//	'q&a_invalid'			: 'Wrong answer, please try again',//'验证问答错误，请重新填写',
//	'code_invalid'			: 'Wrong security code, please try again',//'验证码错误，请重新填写',
	'no_data_recover'	: 'Không có dữ liệu có thể được phục hồi',//'没有可以恢复的数据！',
	'content_overwrite'	: 'Chủ đề nội dung hiện tại sẽ được ghi đè bởi hoạt động này, bạn có chắc để khôi phục lại dữ liệu?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'Tải lên xong!',//'附件上传完成！',
	'successfull'		: 'Thành công:',//'成功',
	'failed'		: 'Lỗi:',//'失败',
	'ones'			: 'một',//'个',
	'uploading'		: 'Đang tải...',//'上传中...',
	'select_image_files'	: 'Chọn file ảnh',//'请选择图片文件',
	'delete'		: 'Xóa',//'删除',
//	'cancel'		: 'Cancel',//'取消',
	'contains'		: 'Chứa ',//'包含',
	'img_attached_num'	: 'Hình ảnh đính kèm',//'个图片附件',
	'files attached_num'	: 'File đính kèm',//'个附件',
	'images'		: 'Ảnh',//'图片',
	'attachments'		: 'Đính kèm',//'附件',
	'upload_failed'		: 'Tải lên lỗi',//'上传失败',

	'attach_big'		: 'Kích cỡ file đính kèm lớn hơn cho phép',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: 'Ttổng kích thước file đính kèm vượt quá giới hạn cho phép nhóm người sử dụng.',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: 'Tổng kích thước loại tập tin đính kèm vượt quá giới hạn cho phép',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: 'Tổng kích thước file đính kèm hàng ngày vượt quá giới hạn cho phép',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'Đang kiểm tra câu hỏi bảo mật, hãy chờ',//'验证问答校验中，请稍后',
	'validating_code'	: 'Đang kiểm tra mã bảo mật, hãy chờ',//'验证码校验中，请稍后',
	'attach_type_disabled'	: 'Loại đính kèm này bị vô hiệu',//'附件类型被禁止',
	'attach_max'		: 'Không lớn hơn',//'不能超过',
	'vote_max_reached'	: 'Đạt số phiếu tối đa: ',//'已达到最大投票数',
	'no_remote_attach'	: 'Xin lỗi, không có file đính kèm từ xa',//'抱歉，暂无远程附件',
	'delete_post_sure'	: 'Bạn có chắc xóa bài này?',//'确定要删除该帖子吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'Bạn có chắc đây là "Câu trả lời tốt nhất"?',//'您确认要把该回复选为“最佳答案”吗？',
//	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 255 个字符的限制',
//	'content_long'		: 'The content length does not meet the requirements.\n\nCurrent Length '//'您的帖子长度不符合要求。\n\n当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'premoderated'		: 'Trả lời cần được kiểm tra. Bài viết của bạn sẽ được hiển thị sau khi xác minh',//'本版回帖需要审核，您的帖子将在通过审核后显示',
//	'credit_confirm1'	: 'This costs ',//'下载积分将',
	'credit_confirm1'	: 'Giá để tải ',//'下载需要消耗',
	'credit_confirm2'	: ' điểm, bạn có chắc tải nó?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'Địa chỉ bài viết đã được sao chép vào clipboard',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'Xem ảnh lớn',//'点击放大',
	'notify_on_reply'	: 'Nhận nhắc nhở có trả lời',//'接收回复通知',
	'notify_on_reply_cancel'	: 'Không nhắc nhở có trả lời',//'取消回复通知',
	'share_connection_failed'	: 'Lỗi kết nối để chia sẻ, hãy thử lại sau',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Xin vui lòng liên kết tài khoản QQ của bạn',//'请先绑定QQ账号',
	'quote_by'	: 'Trích dẫn bởi .*? trong đoạn mã .*?',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'	: 'Copy mã',//'复制代码',

//--------------------------------
//static/js/home.js
	'day'			: 'Ngày',//'日',
	'category_empty'	: 'Tên chuyên mục không thể để trống!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Close',//'关闭',
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Độ dài tiêu đề (cho phép 1~80 kí tự) không hợp lệ',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Xem ảnh gốc ở cửa sổ mới',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: 'Bạn có chắc tiếp tục?',//'您确定要执行本操作吗？',
	'select_item'		: 'Xin vui lòng chọn mục',//'请选择要操作的对象',
	'image_url_invalid'	: 'URL ảnh không đúng',//'图片地址不正确',
	'audio_url_invalid'	: 'URL âm thanh không chính xác, không thể để trống',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'ThuGọn',//'收起',
	'expand'		: 'MởRộng',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'Bạn có thể chọn đến',//'最多只允许选择',
	'users'			: 'Thành viên',//'个用户',
	'allready_exists'	: 'Đã tồn tại',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'Giờ đã là bạn của nhau, bạn có thể ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'Gửi tin nhắn',//'给TA留言',
	'or'			: 'hoặc',//'或者',
	'send_greeting'		: 'gửi chào hỏi',//'打个招呼',
//	'collapse'			: 'Collapse',//'收起',
	'reply'			: 'Trả lời',//'回复',
	'comment'		: 'Nhận xét',//'评论',
	'close_list'		: 'Đóng danh sách',//'收起列表',
	'more_feeds'		: 'Xem thêm',//'更多动态',
//	'day'			: 'Day',//'日',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Xin lỗi, hình ảnh với phần mở rộng như vậy không được hỗ trợ',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'Click vào đây để chèn vào nội dung ở vị trí con trỏ hiện tại',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'Chèn',//'插入',
//	'delete'		: 'Delete',//'删除',
	'image_description'	: 'Hình ảnh mô tả',//'图片描述',
//	'upload_ok'		: 'Uploaded Successfully',//'上传成功',
//	'upload_failed'		: 'Upload Failed',//'上传失败',
	'uploading_wait'	: 'Tải lên, vui lòng chờ...',//'上传中，请等待',
	'retry'			: 'Thử lại',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'Bạn có chắc muốn xóa dữ liệu?',//'您确定要删除该数据吗？',
	'ignore_sure'		: 'Bạn có chắc bỏ qua dữ liệu?',//'您确定要屏蔽该数据吗？',
	'to'			: 'đến',//'到',

	'choose_block'		: 'Chọn khối',//'选择模块',
	'blocks_found1'		: 'được tìm thấy',//'找到',
	'blocks_found2'		: 'Tương ứng với khối',//'个相应的模块',
	'blocks_not_found'	: 'Không có tương ứng với khối',//'没有相应的模块',
	'select_block'		: 'Hãy chọn một khối!',//'请选择一个模块！',
	'show_settings'		: 'Hiện thiết lập',//'展开设置项',
	'hide_settings'		: 'Ẩn thiết lập',//'收起设置项',
	'block_name_empty'	: 'Tên khối không thể để trống',//'模块标识不能为空',
	'block_convert_sure'	: 'Bạn có chắc chắn bạn muốn chuyển đổi khối từ loại',//'你确定要转换模块的类型从',
	'back'			: 'Trở lại',//'返回',
	'settings_expand'	: 'Mở rộng thiết lập',//'展开设置项',
	'settings_hide'		: 'Ẩn thiết lập',//'收起设置项',
	'custom_content_error'	: 'Tuỳ chỉnh nội dung lỗi!HTML code: ',//'自定义内容错误，',
	'html_error'		: 'Mã HTML: ',//'HTML代码：',
	'tags_not_match'	: ' - Tags không phù hợp',//' 标签不匹配',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Chọn phong cách',//'选择样式',
	'style'			: 'Phong cách',//'样式',
	'style1'		: 'Phong cách1',//'样式1',
	'style2'		: 'Phong cách2',//'样式2',
	'style3'		: 'Phong cách3',//'样式3',
	'style4'		: 'Phong cách4',//'样式4',
	'style5'		: 'Phong cách5',//'样式5',
	'style6'		: 'Phong cách6',//'样式6',
	'style7'		: 'Phong cách7',//'样式7',
	'no_border'		: 'Không có viền',//'无边框框架',
	'no_border_no_margin'	: 'Không viền và lề',//'无边框且无边距',

//	'choose_style'		: 'Choose a Style',//'选择样式',
	'title'			: 'Tiêu đề',//'标题',
//	'delete'		: 'Delete',//'删除',
	'attribute'		: 'Thuộc tính',//'属性',
	'data'			: 'Dữ liệu',//'数据',
	'update'		: 'Cập nhật',//'更新',
	'export'		: 'Xuất',//'导出',
	'repeat'		: 'Lặp',//'平铺',
	'no_repeat'		: 'Không lặp',//'不平铺',
	'repeat_x'		: 'Lặp ngang',//'横向平铺',
	'repeat_y'		: 'Lặp dọc',//'纵向平铺',
	'no_style'		: 'Không style',//'无样式',
	'solid_line'		: 'Nét thẳng',//'实线',
	'dotted_line'		: 'Nét chấm chấm',//'点线',
	'dashed_line'		: 'Nét đứt',//'虚线',
//	'font'			: 'Font',//'字体',
	'link'			: 'Liên kết',//'链接',
	'border'		: 'Viền',//'边框',
	'size'			: 'Kích thước',//'大小',
	'color'			: 'Màu',//'颜色',
	'separate_config'	: 'Thiết lập ngăn',//'分别设置',
	'right'			: 'Phải',//'右',
	'bottom'		: 'Dưới',//'下',
	'top'			: 'Trên',//'上',
	'left'			: 'Trái',//'左',
	'margin'		: 'Lợi nhuận',//'外边距',
	'padding'		: 'Sự lót vào',//'内边距',
//	'background_color'	: 'Background Color',//'背景颜色',
	'bg_image'		: 'Ảnh nền',//'背景图片',
	'class'			: 'Mẫu mã phong cách lớp',//'指定class',
	'block'			: 'Khối',//'模块',
	'frame'			: 'Khung',//'框架',
//	'edit'			: 'Edit',//'编辑',
//	'style'			: 'Style',//'样式',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
//	'tile'			: 'Tile',//'平铺',
//	'no_tile'		: 'No tile',//'不平铺',
//	'tile_hor'		: 'Horizontal Tile',//'横向平铺',
//	'tile_ver'		; 'Vertical Tile',//'纵向平铺',
	'onclick'		: 'onClick',//'点击',
	'onmouseover'		: 'onMouseover',//'滑过',
	'switch_type'		: 'Chuyển đổi loại',//'切换类型',
//	'title'			: 'Title',//'标题',
//	'link'			: 'Link',//'链接',
	'image'			: 'Ảnh',//'图片',
	'position'		: 'Vị trí',//'位置',
	'align_left'		: 'Căn trái',//'居左',
	'align_right'		: 'Căn phải',//'居右',
	'offset'		: 'Bù đắp',//'偏移量',
//	'font'			: 'Font',//'字体',
//	'size'			: 'Size',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: 'Thêm tiêu đề mới',//'添加新标题',
//	'edit'			: 'Edit',//'编辑',
//	'title'			: 'Title',//'标题',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
	'delete_this_sure'	: 'Bạn có chắc xóa nó? Nó không thể phục hồi nếu bạn xóa nó.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'Tải nội dung...',//'正在加载内容...',
	'modified_import'	: 'Bạn đã thực hiện một số sửa đổi, xin vui lòng nhập nó sau khi bạn lưu nó, nếu không thì dữ liệu nhập khẩu sẽ không bao gồm sửa đổi, bổ sung thời gian này.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'Tổng cộng ',//'共',
	'blocks'		: 'khối',//'个模块',
	'updating_the'		: 'cập nhật #',//'正在更新第',
//	'ones'			: 'ones',//'个',
	'done'			: 'xong',//'已完成',
	'start_updating'	: 'Bắt đầu cập nhật ...',//'开始更新...',
	'update_block_data'	: 'Cập nhật các khối dữ liệu',//'更新模块数据',
	'clear_diy_sure'	: 'Bạn có chắc chắn để xóa dữ liệu trang hiện tại DIY? Nó không thể được phục hồi.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'Cảnh báo: Khung hình không tìm thấy, xin vui lòng thêm khung.',//'提示：未找到框架，请先添加框架。',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'Áp dụng cho tất cả các loại trang',//'应用于此类全部页面',
	'apply_current_page'	: 'Áp dụng cho trang hiện tại',//'只应用于本页面',
	'save_temp_sure'	: 'Lưu dữ liệu tạm thời?<br />Nhấp vào trình lưu dữ liệu tạm thời, nhấp vào hủy bỏ để xóa các dữ liệu tạm thời.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'Lưu dữ liệu tạm thời',//'保留暂存数据',
	'revert_last_saved'	: 'Bạn chắc chắn rằng bạn muốn quay trở lại phiên bản trước đó kết quả đã lưu?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'Tiếp tục DIY với các dữ liệu tạm thời?',//'是否继续暂存数据的DIY？',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'Tải lên hoàn tất.',//'已更新完成。',
	'tab_label'		: 'Tab nhãn',//'tab标签',
	'temp_action'		: 'Click vào nút "Tiếp tục" để tải các dữ liệu tạm thời vào phong cách hiện tại,<br />Click vào nút "Delete" để xóa dữ liệu tạm thời.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'Tiếp tục',//'继续',

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'Tôi đến từ microblogging Tencent một nền tảng mở',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'Tên người dùng chứa các ký tự không hợp lệ',//'用户名包含敏感字符',
	'username_short'	: 'Tên người dùng không được ngắn hơn 2 ký tự',//'用户名小于 3 个字符',
	'username_long'		: 'Tên người dùng dài hơn 15 ký tự',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'Hai mật khẩu không giống nhau',//'两次输入的密码不一致',
	'email_invalid'		: 'Email chứa các ký tự không hợp lệ',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'Mã mời chứa các ký tự không hợp lệ',//'邀请码包含敏感字符',
	'password_fill'		: 'Xin vui lòng điền mật khẩu',//'请填写密码',
	'password_again'	: 'Xin vui lòng nhập lại mật khẩu',//'请再次输入密码',
	'email_fill'		: 'Xin vui lòng nhập địa chỉ email',//'请输入邮箱地址',

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Hãy chọn',//'请选择',
	'required_fill'		: 'Bắt buộc điền',//'必填项目没有填写',
	'select_next_level'	: 'Xin vui lòng lựa chọn cấp độ tiếp theo',//'请选择下一级',
	'numeric_invalid'	: 'Giá trị số không hợp lệ',//'数字填写不正确',
	'email_invalid'		: 'Địa chỉ E-mail không hợp lệ',//'邮件地址不正确',
	'text_too_long'		: 'Giá trị trường quá dài',//'填写项目长度过长',
	'value_is_greater'	: 'Giá trị lớn hơn mức tối đa',//'大于设置最大值',
	'value_is_less'		: 'Giá trị thấp hơn tối thiểu',//'小于设置最小值',
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Delete',//'删除',
//	'attribute'		: 'Attribute',//'属性',
	'save_js'		: 'Lưu javascript sau khi hiển thị',//'javascript脚本保存后显示',
	'settings'		: 'Tùy chọn',//'设置',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Xin lỗi, loại file này không hỗ trợ.',//'对不起，不支持上传此类文件',
//	'uploading'		: 'Uploading...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'Bạn hiện đang sử dụng phiên bản Discuz cũ!. Xin vui lòng tham khảo các mẹo sau đây để nâng cấp bản mới.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'Thêm vào hoạt động phổ biến',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: 'Google Maps',//'google图',
	'map_insert'		: 'Insert Google Map',//'插入google地图',
	'map_insert_tips'	: 'Insert Google Maps by address searching (temporarily supported only single label!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: 'The map center is changed!',//'地图中心已经改变！',
	'map_wrong_address'	: 'Wrong address! Current address was not found',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: ''

};
