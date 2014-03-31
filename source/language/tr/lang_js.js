/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables

	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru

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
	'Black'			: 'Black',//'黑色',
	'Sienna'		: 'Sienna',//'赭色',
	'DarkOliveGreen'	: 'Dark Olive Green',//'暗橄榄绿色',
	'DarkGreen'		: 'Dark Green',//'暗绿色',
	'DarkSlateBlue'		: 'Dark Gray Blue',//'暗灰蓝色',
	'Navy'			: 'Navy',//'海军色',
	'Indigo'		: 'Indigo',//'靛青色',
	'DarkSlateGray'		: 'Dark Green',//'墨绿色',
	'DarkRed'		: 'Dark Red',//'暗红色',
	'DarkOrange'		: 'Dark Orange',//'暗桔黄色',
	'Olive'			: 'Olive',//'橄榄色',
	'Green'			: 'Green',//'绿色',
	'Teal'			: 'Teal',//'水鸭色',
	'Blue'			: 'Blue',//'蓝色',
	'SlateGray'		: 'Limestone',//'灰石色',
	'DimGray'		: 'Dark Gray',//'暗灰色',
	'Red'			: 'Red',//'红色',
	'SandyBrown'		: 'Brown Sand',//'沙褐色',
	'YellowGreen'		: 'Yellow Green',//'黄绿色',
	'SeaGreen'		: 'Sea Green',//'海绿色',
	'MediumTurquoise'	: 'Green emerald',//'间绿宝石',
	'RoyalBlue'		: 'Royal Blue',//'皇家蓝',
	'Purple'		: 'Purple',//'紫色',
	'Gray'			: 'Gray',//'灰色',
	'Magenta'		: 'Red Purple',//'红紫色',
	'Orange'		: 'Orange',//'橙色',
	'Yellow'		: 'Yellow',//'黄色',
	'Lime'			: 'Acid Orange',//'酸橙色',
	'Cyan'			: 'Blue Green',//'青色',
	'DeepSkyBlue'		: 'Deep Sky Blue',//'深天蓝色',
	'DarkOrchid'		: 'Dark Purple',//'暗紫色',
	'Silver'		: 'Silver',//'银色',
	'Pink'			: 'Pink',//'粉色',
	'Wheat'			: 'Light Yellow',//'浅黄色',
	'LemonChiffon'		: 'Lemon Silk',//'柠檬绸色',
	'PaleGreen'		: 'Cang Green',//'苍绿色',
	'PaleTurquoise'		: 'Cang gem Green',//'苍宝石绿',
	'LightBlue'		: 'Bright blue',//'亮蓝色',
	'Plum'			: 'Plum color',//'洋李色',
	'White'			: 'White' //'白色'
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
	'restore_last_saved'	: 'Are you sure you want to restore to last saved?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'Your browser security settings does not permit the editor to automatically execute the Cutting operation. Use the keyboard shortcut (Ctrl X) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'Your browser security settings does not permit the editor to automatically execute the Copy operation. Use the keyboard shortcut (Ctrl C) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'Your browser security settings does not permit the editor to automatically execute the Paste operation. Use the keyboard shortcut (Ctrl V) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'Can not find the Graffiti initialization data',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Supported only in IE 5.01 or later',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Edit Raw Text',//'编辑源码',
	'plain_text_warn'	: 'Converting to the plain text will lose some formatting!\nAre you sure you want to continue?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'Your browser does not support this feature, please upgrade your browser version',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'Tips',//'小提示',
//	'show_tips'		: 'Show Tips',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'This operation is effective only for WYSIWYG mode',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Testing other cloud platform interface',//'云平台其他接口测试',
	'int_roaming_test'	: 'Testing other Roaming interface',//'漫游其他接口测试',
	'int_qq_test'		: 'Testing QQ Internet interface',//'QQ互联接口测试',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Select at least one topic for push to Articles',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Select at least one item for push to Articles',//'请至少推送一条信息到列表区域',
	'loading'		: 'Loading...',//'加载中...',
	'push5reached'		: 'Push Post number has reached five, in the right to cancel a number and try again.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Click on the left',//'点击左侧',
	'push_to_list'		: 'Will push the information to the list',//'将信息推送到列表',
	'wait_image_upload'	: 'Upload image, please wait...',//'图片上传中，请稍后...',






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Prev Month',//'上一月',
	'next_month'	: 'Next Month',//'下一月',
	'select_year'	: 'Select Year',//'点击选择年份',
	'select_month'	: 'Select Month',//'点击选择月份',
	'wday0'		: 'Su',//'日',
	'wday1'		: 'Mo',//'一',
	'wday2'		: 'Tu',//'二',
	'wday3'		: 'We',//'三',
	'wday4'		: 'Th',//'四',
	'wday5'		: 'Fr',//'五',
	'wday6'		: 'Sa',//'六',
	'month'		: 'Month',//'月',
	'today'		: 'Today',//'今天',
	'hours'		: 'Hours',//'点',
	'minutes'	: 'Minutes',//'分',
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'Open in new window',//'在新窗口打开',
	'actual_size'		: 'Actual Size',//'实际大小',
	'close'			: 'Close',//'关闭',
	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
	'reminder'		: 'Reminder',//'提示信息',
	'submit'		: 'Submit',//'确定',
//	'submit'		: 'Submit',//'提交',
	'cancel'		: 'Cancel',//'取消',
//	'cancel'		: 'Cancel',//'取消',
	'wait_please'		: 'Loading ...',//'请稍候...',
	'int_error'		: 'Internal Error, can not display this content',//'内部错误，无法显示此内容',
	'flash_required'	: 'This content requires Adobe Flash Player 9.0.124 or later',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Download Flash Player',//'下载 Flash Player',
	'day1'			: '1 Day',//'一天',
	'week1'			: '1 Week',//'一周',
	'days7'			: '7 Days',//'7 天',
	'days14'		: '14 Days',//'14 天',
	'month1'		: '1 Month',//'一个月',
	'month3'		: '3 Months',//'三个月',
	'month6'		: '6 Months',//'半年',
	'year1'			: '1 Year',//'一年',
	'custom'		: 'Custom',//'自定义',
	'permanent'		: 'Permanent',//'永久',
	'show_all_expr'		: 'Show all smiles',//'显示所有表情',
	'page_prev'		: 'Prev Page',//'上页',
	'page_next'		: 'Next Page',//'下页',
	'copy2clipboard'	: 'Copy to clipboard',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Anahtar kelimeler...',//'请输入搜索内容',
	'refresh_q&a'		: 'Refresh Q&A',//'刷新验证问答',
	'refresh_code'		: 'Refresh Code',//'刷新验证码',
	'code_invalid'		: 'Wrong security code, please try again',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'Wrong answer, please try again',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'The code was copied to clipboard',//'代码已复制到剪贴板',
	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址',
	'enter_link_text'	: 'Enter the link text',//'请输入链接文字',
	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址',
	'width_optional'	: 'Width (optional)',//'宽(可选)',
	'height_optional'	: 'Height (optional)',//'高(可选)',
	'narrow_screen'		: 'Narrow screen',//'切换到窄版',
	'wide_screen'		: 'Wide screen',//'切换到宽版',
	'logging_wait'		: 'Logging in, please wait...',//'登录中，请稍后...',
	'notices_no'		: '[　　　]',//'【　　　】',
	'notices_yes'		: '[New]',//'【新提醒】',
	'sec_after_win_closed'	: ' seconds before the window closed',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' seconds before the page redirect',//' 秒后页面跳转',
	'jump_now'		: 'Jump Now',//'立即跳转',
	'error_message'		: 'Error Message',//'错误信息',
	'ctrl_d_favorites'	: 'Press Ctrl + D keys for add to Favorites',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'For non-IE browser please set Homepage manually',//'非 IE 浏览器请手动将本站设为首页',
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Edit',//'编辑',
	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'All the changes will be lost if you exit. Are you sure you want to exit now?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'Select an image to upload',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Copy failed, please select "Allow access"',//'复制失败，请选择“允许访问”',
//	'permanent'		: 'Permanent',//'永久',
//	'open_new_win'		: 'Open in new window',//'在新窗口打开',
//	'actual_size'		: 'Actual Size',//'实际大小',
//	'close'			: 'Close',//'关闭',
//	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
//	'reminder'		: 'Reminder',//'提示信息',
	'prev'			: 'Prev.',//'上一张',
	'next'			: 'Next',//'下一张',

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'Resume editor size',//'恢复编辑器大小',
	'full_screen_edit'	: 'Full Screen Editor',//'全屏方式编辑',
	'current_length'	: 'Current Length',//'当前长度',
	'bytes'			: 'bytes',//'字节',
	'system_limit'		: 'System limit',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'Length Count',//'字数检查',
	'data_restored'		: 'The Data was restored',//'数据已恢复',
	'data_saved'		: 'Data saved',//'数据已保存',
	'clear_all_sure'	: 'Are you sure to clear all the contents?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'Hide content',//'请输入要隐藏的信息内容',
	'free_content'		: 'If you did not set a post price, the entered information can be seen free of charge before purchasing the content,',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'Show only when the user reply to this thread ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Show only when the user points is more than ',//'只有当浏览者积分高于',
	'when_show'		: 'When to show',//'时才显示',
	'table_rows'		: 'Table Rows',//'表格行数',
	'table_columns'		: 'Table Columns',//'表格列数',
	'table_width'		: 'Table Width: ',//'表格宽度: ',
	'bg_color'		: 'Background Color',//'背景颜色',
	'table_intro0'		: 'Quick write table tips',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=color]&quot; Define the row background color<br />&quot;[td=Width]&quot; Define the column width<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Define the Row/Column Span and Width<br /><br />Fast writing table example: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />Name:|Discuz!<br />Version:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Use &quot;|&quot; to separate rows, if there is the &quot;|&quot; character in the data, replace it with &quot;\\|&quot;, separate rows with &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'Input URL of music file',//'请输入音乐文件地址',
	'video_url'		: 'Input URL of video file',//'请输入视频地址',
	'auto_play'		: 'Autoplay?',//'是否自动播放',
	'flash_url'		: 'Please input URL of Flash file ',//'请输入 Flash 文件地址',
	'enter_please'		: 'Please enter the',//'请输入第',
	'nth_parameter'		: '-th parameter',//' 个参数',
	'font'			: 'Font',//'字体',
	'full_screen'		: 'Full Screen',//'全屏',
	'restore_size'		: 'Restore size',//'恢复',
	'general'		: 'General Mode',//'常用',
	'simple'		: 'Advanced Mode',//'高级',
	'bad_browser'		: 'Your browser does not support this feature',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'Click here for enable the auto-saving',//'点击开启自动保存',
	'autosave_enable'	: 'Enable the auto-saving',//'开启自动保存',
	'autosave_disable'	: 'Disable the auto-saving',//'点击关闭自动保存',
	'autosave_enabled'	: 'Data auto-saving enabled',//'数据自动保存已开启',
	'autosave_disabled'	: 'Data auto-saving disabled',//'数据自动保存已关闭',
	'data_saved_at'		: 'Data saved at',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: 's before autosave',//'秒后保存',
	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用',
	'insert_code'		: 'Insert the Code',//'请输入要插入的代码',
//	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址',
//	'width_optional'	: 'Width (optional)',//'宽(可选)',
//	'height_optional'	: 'Height (optional)',//'高(可选)',
	'enter_item_list'	: 'Enter the item list.\r\nLeave blank, or click Cancel.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
//	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址',
//	'enter_link_text'	: 'Enter the link text',//'请输入链接文字',
//	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用',
	'width'			: 'Width',//'宽',
	'height'		: 'Height',//'高',
	'audio_support'		: 'Supported wma, mp3, ra, rm, and other music formats<br />Example: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'Supported for Youku, Potatoes, 56, 6, Cool video and other video services<br />Supported video formats: wmv avi rmvb mov swf flv.<br /> Example: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'Supported Flash formats: swf flv <br /> Example: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'Paste a content from Word',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'Please use shortcut (Ctrl + V) to paste the content from Word document',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'Are you sure you want to remove this thread from hot threads?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'There are ',//'有',
//	'new_reply_exists'	: ' new replies in the thread, click to view',//'条存在新回复的主题，点击查看',
	'new_reply_exists'	: 'The thread has new replies, click on View',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Search in the Net',//'网页搜索',
	'search_site'	: 'Search in the site',//'站内搜索',
	'search'	: 'Search',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Choose the thread to moderate',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Internal Server Error',//'内部服务器错误',
	'upload_ok'		: 'Uploaded Successfully',//'上传成功',
	'ext_not_supported'	: 'This file extension is not supported',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'Sorry, such file extension does not supported.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'Illegal image type',//'图片附件不合法',
	'can_not_save_attach'	: 'Can not save Attachment file',//'附件文件无法保存',
	'invalid_file'		: 'No legitimate file was uploaded',//'没有合法的文件被上传',
	'illegal_operation'	: 'Illegal Operation',//'非法操作',
//	'current_length'	: 'Current Length',//'当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
//	'bytes'			: 'bytes',//'字节',
//	'check_length'		: 'Word Count',//'字数检查',
	'enter_content'		: 'Enter the title or content',//'请完成标题或内容栏',
	'select_category'	: 'Select a corresponding category for the thread',//'请选择主题对应的分类',
	'select_category_info'	: 'Select a corresponding category for the thread information',//'请选择主题对应的分类信息',
	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'The content length does not meet the requirements.\n\n',//'您的帖子长度不符合要求。\n\n',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'ignore_pending_attach'	: 'There are pending attachments, are you sure to ignore it?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'Some attachments are still uploading, please wait. The thread will be published automaticly after the files was uploaded...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
//	'q&a_invalid'			: 'Wrong answer, please try again',//'验证问答错误，请重新填写',
//	'code_invalid'			: 'Wrong security code, please try again',//'验证码错误，请重新填写',
	'no_data_recover'	: 'No data can be recoverd!',//'没有可以恢复的数据！',
	'content_overwrite'	: 'Warning:\nCurrent content will be overwritten with the saved data!\nAre you sure to restore the data?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'Uploading is finished!',//'附件上传完成！',
	'successfull'		: 'Successfull:',//'成功',
	'failed'		: 'Failed:',//'失败',
	'ones'			: 'ones',//'个',
	'uploading'		: 'Uploading...',//'上传中...',
	'select_image_files'	: 'Select image files',//'请选择图片文件',
	'delete'		: 'Delete',//'删除',
//	'cancel'		: 'Cancel',//'取消',
	'contains'		: 'Contains ',//'包含',
	'img_attached_num'	: 'images attached',//'个图片附件',
	'files attached_num'	: 'files attached',//'个附件',
	'images'		: 'Images',//'图片',
	'attachments'		: 'attachments',//'附件',
	'upload_failed'		: 'Upload Failed',//'上传失败',

	'attach_big'		: 'Attachment size exceeds the allowed limit',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: 'You user group total attachment size exceeds allowed limit',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: 'This file type total attachment size exceeds allowed limit',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: 'Daily total attachment size exceeds allowed limit',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'Validating the Q & A, please wait',//'验证问答校验中，请稍后',
	'validating_code'	: 'Validating the code, please wait',//'验证码校验中，请稍后',
	'attach_type_disabled'	: 'This attachment type is disabled',//'附件类型被禁止',
	'attach_max'		: 'Not larger than',//'不能超过',
	'vote_max_reached'	: 'Reached the maximum number of votes: ',//'已达到最大投票数',
	'no_remote_attach'	: 'Sorry, no remote attachment',//'抱歉，暂无远程附件',
	'delete_post_sure'	: 'Sure you want to delete this post?',//'确定要删除该帖子吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'Are you sure you want to define this post as the "Best Answer"?',//'您确认要把该回复选为“最佳答案”吗？',
//	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 255 个字符的限制',
//	'content_long'		: 'The content length does not meet the requirements.\n\nCurrent Length '//'您的帖子长度不符合要求。\n\n当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'premoderated'		: 'Replies to this category must be audited. Your post wll be displayed after the verification',//'本版回帖需要审核，您的帖子将在通过审核后显示',
//	'credit_confirm1'	: 'This costs ',//'下载积分将',
	'credit_confirm1'	: 'Download costs ',//'下载需要消耗',
	'credit_confirm2'	: ' points, are you sure to download?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'Thread address was copied to the clipboard',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'Click to enlarge',//'点击放大',
	'notify_on_reply'	: 'Receive reply notification',//'接收回复通知',
	'notify_on_reply_cancel'	: 'Cancel reply notification',//'取消回复通知',
	'share_connection_failed'	: 'Connection to share failed, please try again later',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Please bind your QQ account',//'请先绑定QQ账号',
	'quote_by'	: 'Quote by .*? in .*? code',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'	: 'Copy code',//'复制代码',

//--------------------------------
//static/js/home.js
	'day'			: 'Day',//'日',
	'category_empty'	: 'Category name can not be empty!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Close',//'关闭',
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Title length (should be 1~80 characters) does not meet the requirement',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Show original image in a new window',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: 'Are you sure to proceed?',//'您确定要执行本操作吗？',
	'select_item'		: 'Please choose the item to operate with',//'请选择要操作的对象',
	'image_url_invalid'	: 'Incorrect image URL',//'图片地址不正确',
	'audio_url_invalid'	: 'Incorrect audio URL, can not be empty',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'Collapse',//'收起',
	'expand'		: 'Expand',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'You can select up to',//'最多只允许选择',
	'users'			: 'users',//'个用户',
	'allready_exists'	: 'Already exists',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'You are friends now, you can ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'Leave a message',//'给TA留言',
	'or'			: 'or',//'或者',
	'send_greeting'		: 'send greeting',//'打个招呼',
//	'collapse'			: 'Collapse',//'收起',
	'reply'			: 'Reply',//'回复',
	'comment'		: 'Comment',//'评论',
	'close_list'		: 'Close the List',//'收起列表',
	'more_feeds'		: 'More Feeds',//'更多动态',
//	'day'			: 'Day',//'日',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Sorry, image with such extension does not supported',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'Click here to insert into the content at current cursor position',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'Insert',//'插入',
//	'delete'		: 'Delete',//'删除',
	'image_description'	: 'Image Description',//'图片描述',
//	'upload_ok'		: 'Uploaded Successfully',//'上传成功',
//	'upload_failed'		: 'Upload Failed',//'上传失败',
	'uploading_wait'	: 'Uploading, Please wait',//'上传中，请等待',
	'retry'			: 'Retry',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'Are you sure to delete this data?',//'您确定要删除该数据吗？',
	'ignore_sure'		: 'Are you sure to ignore this data?',//'您确定要屏蔽该数据吗？',
	'to'			: 'to',//'到',

	'choose_block'		: 'Choose block',//'选择模块',
	'blocks_found1'		: 'Found',//'找到',
	'blocks_found2'		: 'corresponding blocks',//'个相应的模块',
	'blocks_not_found'	: 'No corresponding blocks',//'没有相应的模块',
	'select_block'		: 'Please select a block!',//'请选择一个模块！',
	'show_settings'		: 'Show settings',//'展开设置项',
	'hide_settings'		: 'Hide settings',//'收起设置项',
	'block_name_empty'	: 'Block name can not be empty',//'模块标识不能为空',
	'block_convert_sure'	: 'Are you sure you want to convert the block from type',//'你确定要转换模块的类型从',
	'back'			: 'Back',//'返回',
	'settings_expand'	: 'Expand setting',//'展开设置项',
	'settings_hide'		: 'Hide setting',//'收起设置项',
	'custom_content_error'	: 'Custom content error! HTML code: ',//'自定义内容错误，',
	'html_error'		: 'HTML code: ',//'HTML代码：',
	'tags_not_match'	: ' - Tags does not match',//' 标签不匹配',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Choose a Style',//'选择样式',
	'style'			: 'Style',//'样式',
	'style1'		: 'Style1',//'样式1',
	'style2'		: 'Style2',//'样式2',
	'style3'		: 'Style3',//'样式3',
	'style4'		: 'Style4',//'样式4',
	'style5'		: 'Style5',//'样式5',
	'style6'		: 'Style6',//'样式6',
	'style7'		: 'Style7',//'样式7',
	'no_border'		: 'No border frame',//'无边框框架',
	'no_border_no_margin'	: 'No border, no margin',//'无边框且无边距',

//	'choose_style'		: 'Choose a Style',//'选择样式',
	'title'			: 'Title',//'标题',
//	'delete'		: 'Delete',//'删除',
	'attribute'		: 'Attribute',//'属性',
	'data'			: 'Data',//'数据',
	'update'		: 'Update',//'更新',
	'export'		: 'Export',//'导出',
	'repeat'		: 'Repeat',//'平铺',
	'no_repeat'		: 'No repeat',//'不平铺',
	'repeat_x'		: 'Repeat Horizontal',//'横向平铺',
	'repeat_y'		: 'Repeat Vertical',//'纵向平铺',
	'no_style'		: 'No style',//'无样式',
	'solid_line'		: 'Solid Line',//'实线',
	'dotted_line'		: 'Dotted Line',//'点线',
	'dashed_line'		: 'Dased Line',//'虚线',
//	'font'			: 'Font',//'字体',
	'link'			: 'Link',//'链接',
	'border'		: 'Border',//'边框',
	'size'			: 'Size',//'大小',
	'color'			: 'Color',//'颜色',
	'separate_config'	: 'Separate Config',//'分别设置',
	'right'			: 'Right',//'右',
	'bottom'		: 'Bottom',//'下',
	'top'			: 'Top',//'上',
	'left'			: 'Left',//'左',
	'margin'		: 'Margin',//'外边距',
	'padding'		: 'Padding',//'内边距',
//	'background_color'	: 'Background Color',//'背景颜色',
	'bg_image'		: 'Background Image',//'背景图片',
	'class'			: 'Designated Class',//'指定class',
	'block'			: 'Block',//'模块',
	'frame'			: 'Frame',//'框架',
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
	'switch_type'		: 'Switch Type',//'切换类型',
//	'title'			: 'Title',//'标题',
//	'link'			: 'Link',//'链接',
	'image'			: 'Image',//'图片',
	'position'		: 'Position',//'位置',
	'align_left'		: 'Left Align',//'居左',
	'align_right'		: 'Right Align',//'居右',
	'offset'		: 'Offset',//'偏移量',
//	'font'			: 'Font',//'字体',
//	'size'			: 'Size',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: 'Add New Title',//'添加新标题',
//	'edit'			: 'Edit',//'编辑',
//	'title'			: 'Title',//'标题',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
	'delete_this_sure'	: 'Are you sure to delete it? It can not be restored if you delete it.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'Loading content...',//'正在加载内容...',
	'modified_import'	: 'You have made some modifications, please import it after you save it, otherwise the imported data won\'t include modification of this time.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'Total ',//'共',
	'blocks'		: 'blocks',//'个模块',
	'updating_the'		: 'updating #',//'正在更新第',
//	'ones'			: 'ones',//'个',
	'done'			: 'done',//'已完成',
	'start_updating'	: 'Start Updating...',//'开始更新...',
	'update_block_data'	: 'Updating block data',//'更新模块数据',
	'clear_diy_sure'	: 'Are you sure to clear the current page DIY data? It can not be restored if you clear it.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'Warning: Frame not found, please add frame.',//'提示：未找到框架，请先添加框架。',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'Apply to all this type pages',//'应用于此类全部页面',
	'apply_current_page'	: 'Apply to current page',//'只应用于本页面',
	'save_temp_sure'	: 'Save temporary data?<br />Click submit to save the temporary data, click cancel to delete the temporary data.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'Save the temporary data',//'保留暂存数据',
	'revert_last_saved'	: 'Are you sure you want to revert to previous version of saved results?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'Continue to DIY with temporary data?',//'是否继续暂存数据的DIY？',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'Updating is completed.',//'已更新完成。',
	'tab_label'		: 'Tab Label',//'tab标签',
	'temp_action'		: 'Click the "Continue" button to load the temporary data into current style,<br />Click the "Delete" button for delete temporary data.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'Continue',//'继续',

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'I come from Tencent microblogging an open platform',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'User name contains invalid characters',//'用户名包含敏感字符',
	'username_short'	: 'User name is shorter than 2 characters',//'用户名小于 3 个字符',
	'username_long'		: 'User name is longer than 15 characters',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'Two passwords does not match',//'两次输入的密码不一致',
	'email_invalid'		: 'Email contains invalid characters',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'Invitation code contains invalid characters',//'邀请码包含敏感字符',
	'password_fill'		: 'Please fill the password',//'请填写密码',
	'password_again'	: 'Please enter the password again',//'请再次输入密码',
	'email_fill'		: 'Please enter email address',//'请输入邮箱地址',

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Select please',//'请选择',
	'required_fill'		: 'Required fields not filled',//'必填项目没有填写',
	'select_next_level'	: 'Please select the next level',//'请选择下一级',
	'numeric_invalid'	: 'Numeric value is invalid',//'数字填写不正确',
	'email_invalid'		: 'E-mail address is invalid',//'邮件地址不正确',
	'text_too_long'		: 'Field value is too long',//'填写项目长度过长',
	'value_is_greater'	: 'Value is greater than the maximum',//'大于设置最大值',
	'value_is_less'		: 'Value is less than minimum',//'小于设置最小值',
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Delete',//'删除',
//	'attribute'		: 'Attribute',//'属性',
	'save_js'		: 'Save the javascript after the show',//'javascript脚本保存后显示',
	'settings'		: 'Settings',//'设置',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Sorry, this file type is unsupported',//'对不起，不支持上传此类文件',
//	'uploading'		: 'Uploading...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'You are currently using Up-to-date version of Discuz! program. Please refer to the following tips to make timely upgrades.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'Add to common operations',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

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
