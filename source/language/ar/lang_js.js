/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables for English

	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru

	Translated by Khalid Nahhal, http://www.ar-discuz.com

*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering:
var emaildomains = [
		'aol.com',
		'gmail.com',
		'hotmail.com',
		'qq.com',
		'yahoo.com'
		];

//--------------------------------
//static/js/common.js

var colortexts = {
	'Black'			: 'أسود',//'黑色',
	'Sienna'		: 'رصاصي',//'赭色',
	'DarkOliveGreen'	: 'أخضر زيتي غامق',//'暗橄榄绿色',
	'DarkGreen'		: 'اخضر غامق',//'暗绿色',
	'DarkSlateBlue'		: 'ازرق رمادي غامق',//'暗灰蓝色',
	'Navy'			: 'سماوي',//'海军色',
	'Indigo'		: 'نيلي',//'靛青色',
	'DarkSlateGray'		: 'اخضر غامق',//'墨绿色',
	'DarkRed'		: 'احمر غامق',//'暗红色',
	'DarkOrange'		: 'برتقالي غامق',//'暗桔黄色',
	'Olive'			: 'زيتي',//'橄榄色',
	'Green'			: 'اخضر',//'绿色',
	'Teal'			: 'Teal',//'水鸭色',
	'Blue'			: 'ازرق',//'蓝色',
	'SlateGray'		: 'كلسي',//'灰石色',
	'DimGray'		: 'رمادي غامق',//'暗灰色',
	'Red'			: 'احمر',//'红色',
	'SandyBrown'		: 'رملي',//'沙褐色',
	'YellowGreen'		: 'اخضر مصفر',//'黄绿色',
	'SeaGreen'		: 'اخضر بحري',//'海绿色',
	'MediumTurquoise'	: 'زمردي',//'间绿宝石',
	'RoyalBlue'		: 'الأزرق الملكي',//'皇家蓝',
	'Purple'		: 'أرجواني',//'紫色',
	'Gray'			: 'رمادي',//'灰色',
	'Magenta'		: 'ارجواني احمر',//'红紫色',
	'Orange'		: 'برتقالي',//'橙色',
	'Yellow'		: 'اصفر',//'黄色',
	'Lime'			: 'برتقالي حمضي',//'酸橙色',
	'Cyan'			: 'اخضر مزرق',//'青色',
	'DeepSkyBlue'		: 'سماوي عميق',//'深天蓝色',
	'DarkOrchid'		: 'ارجواني غامق',//'暗紫色',
	'Silver'		: 'فضي',//'银色',
	'Pink'			: 'زهري',//'粉色',
	'Wheat'			: 'اصفر فاقع',//'浅黄色',
	'LemonChiffon'		: 'ليموني',//'柠檬绸色',
	'PaleGreen'		: 'أخضر شاحب',//'苍绿色',
	'PaleTurquoise'		: 'Cang gem Green',//'苍宝石绿',
	'LightBlue'		: 'ازرق مشرق',//'亮蓝色',
	'Plum'			: 'لون البرقوق',//'洋李色',
	'White'			: 'ابيض' //'白色'
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
	'restore_last_saved'	: 'هل أنت مستعد لإستعادة آخر حفظ?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'المتصفح الخاص بك لا يدعم هذه الخاصية. استخدم اختصار (Ctrl X) لإتمام العملية.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'المتصفح الخاص بك لا يدعم هذه الخاصية. استخدم اختصار (Ctrl C) لإتمام العملية.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'المتصفح الخاص بك لا يدعم هذه الخاصية. استخدم اختصار (Ctrl V) لإتمام العملية.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'لا يمكن العثور على بيانات Graffiti initialization ',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'يدعم  IE 5.01 أو أعلى ',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'تعديل نصي',//'编辑源码',
	'plain_text_warn'	: 'ربما خلال التحويل إلى الوضع النصي يتم فقدان بعض التنسيق!\n هل أنت متأكد من المواصلة?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'المتصفح الخاص بك لا يدعم هذه الخاصية, قم بتحديث متصفحك',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'نصائح',//'小提示',
//	'tips'			: 'نصائح',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'هذه الخاصية تستعمل فقط في الوضع المتقدم ',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js // NOT IMPPORTANT FOR ARABIC VER //BY KN
	'int_cloud_test'	: 'Testing other cloud platform interface',//'云平台其他接口测试',
	'int_roaming_test'	: 'Testing other Roaming interface',//'漫游其他接口测试',
	'int_qq_test'		: 'Testing QQ Internet interface',//'QQ互联接口测试',

//---------------------------
//static/image/admincp/cloud/qqgroup.js // NOT IMPPORTANT FOR ARABIC VER //BY KN
	'select_topic_to_push'	: 'Select at least one topic for push to Articles',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Select at least one item for push to Articles',//'请至少推送一条信息到列表区域',
	'loading'		: 'Loading...',//'加载中...',
	'push5reached'		: 'Push Post number has reached five, in the right to cancel a number and try again.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Click on the left',//'点击左侧',
	'push_to_list'		: 'Will push the information to the list',//'将信息推送到列表',
	'wait_image_upload'	: 'Upload image, please wait...',//'图片上传中，请稍后...',






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'جاري التحميل ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'الشهر الماضي',//'上一月',
	'next_month'	: 'الشهر التالي',//'下一月',
	'select_year'	: 'حدد السنة',//'点击选择年份',
	'select_month'	: 'حدد الشهر',//'点击选择月份',
	'wday0'		: 'احد',//'日',
	'wday1'		: 'اثنين',//'一',
	'wday2'		: 'ثلاثاء',//'二',
	'wday3'		: 'اربعاء',//'三',
	'wday4'		: 'خميس',//'四',
	'wday5'		: 'جمعة',//'五',
	'wday6'		: 'سبت',//'六',
	'month'		: 'شهر',//'月',
	'today'		: 'اليوم',//'今天',
	'hours'		: 'ساعات',//'点',
	'minutes'	: 'دقائق',//'分',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'فتح في نافذة جديدة',//'在新窗口打开',
	'actual_size'		: 'الحجم الفعلي',//'实际大小',
	'close'			: 'إغلاق',//'关闭',
	'wheel_zoom'		: 'استخدم عجلة الفأرة للتقريب أو التبعيد',//'鼠标滚轮缩放图片',
	'reminder'		: 'تذكير',//'提示信息',
	'submit'		: 'موافق',//'确定',
//	'submit'		: 'موافق',//'提交',
	'cancel'		: 'إلغاء',//'取消',
//	'cancel'		: 'إلغاء',//'取消',
	'wait_please'		: 'جاري التحميل ...',//'请稍候...',
	'int_error'		: 'خطأ داخلي, لا يمكن عرض المحتوى',//'内部错误，无法显示此内容',
	'flash_required'	: 'هذا المحتوى يطلب  Adobe Flash Player 9.0.124 أو أحدث',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'تحميل Flash Player',//'下载 Flash Player',
	'day1'			: '1 يوم',//'一天',
	'week1'			: '1 اسبوع',//'一周',
	'days7'			: '7 أيام',//'7 天',
	'days14'		: '14 أيام',//'14 天',
	'month1'		: '1 شهر',//'一个月',
	'month3'		: '3 أشهر',//'三个月',
	'month6'		: '6 أشهر',//'半年',
	'year1'			: '1 سنة',//'一年',
	'custom'		: 'مخصص',//'自定义',
	'permanent'		: 'دائم',//'永久',
	'show_all_expr'		: 'إظهار كافة الابتسامات',//'显示所有表情',
	'page_prev'		: 'الصفحة السابقة',//'上页',
	'page_next'		: 'الصفحة التالية',//'下页',
	'copy2clipboard'	: 'نسخ للحافظة',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'بحث كلمات دلالية',//'请输入搜索内容',
	'refresh_q&a'		: 'تحديث س&ج',//'刷新验证问答',
	'refresh_code'		: 'تحديث رمز الأمان',//'刷新验证码',
	'code_invalid'		: 'خطأ في رمز الأمان, حاول مرة أخرى',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'إجابة السؤال خاطئة , حاول مرة أخرى',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'تم النسخ للحافظة',//'代码已复制到剪贴板',
	'enter_link_url'	: 'ادخل الوصلة',//'请输入链接地址',
	'enter_link_text'	: 'ادخل النص المرتبط',//'请输入链接文字',
	'enter_image_url'	: 'ادخل وصلة الصورة',//'请输入图片地址',
	'width_optional'	: 'العرض (اخياري)',//'宽(可选)',
	'height_optional'	: 'الطول (اخياري)',//'高(可选)',
	'narrow_screen'		: 'شاشة ضيقة',//'切换到窄版',
	'wide_screen'		: 'شاشة عريضة',//'切换到宽版',
	'logging_wait'		: 'تسجيل الدخول, الرجاء الإنتظار...',//'登录中，请稍后...',
	'notices_no'		: '[　　　]',//'【　　　】',
	'notices_yes'		: '[جديد]',//'【新提醒】',
	'sec_after_win_closed'	: ' ثانية متبقية ليتم اغلاق الرسالة',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' ثانية متبقية ليتم تحويلك للصفحة المطلوبة',//' 秒后页面跳转',
	'jump_now'		: 'الإنتقال فوراً',//'立即跳转',
	'error_message'		: 'رسالة خطأ',//'错误信息',
	'ctrl_d_favorites'	: 'إضغط على زري  Ctrl + D للوضع بالمفضلة',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'اذا كنت لا تستعمل متصفح IE قم بإدارج الصفحة يدوياً كرئيسية ',//'非 IE 浏览器请手动将本站设为首页',
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'تعديل',//'编辑',
	'warn_not_saved'	: 'لقد قمت بالتعديل. اذا قمت بالاغلاق, سيتم فقدان كافة التغيرات.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'سيتم فقدان كافة التغييرات عند الاغلاق. هل أنت متأكد من الإغلاق?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'حدد صورة للرفع',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'فشل النسخ, الرجاء حدد "السماح بالوصول"',//'复制失败，请选择“允许访问”',
//	'permanent'		: 'دائم',//'永久',
//	'open_new_win'		: 'فتح في نافذة جديدة',//'在新窗口打开',
//	'actual_size'		: 'الحجم الفعلي',//'实际大小',
//	'close'			: 'اغلاق',//'关闭',
//	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
//	'reminder'		: 'تذكير',//'提示信息',
	'prev'			: 'السابق.',//'上一张',
	'next'			: 'التالي',//'下一张',

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'استئناف حجم المحرر',//'恢复编辑器大小',
	'full_screen_edit'	: 'شاشة كاملة',//'全屏方式编辑',
	'current_length'	: 'الطول الحالي',//'当前长度',
	'bytes'			: 'حروف',//'字节',
	'system_limit'		: 'حد النظام',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'إحصاء الطول',//'字数检查',
	'data_restored'		: 'تمت استعادة البيانات',//'数据已恢复',
	'data_saved'		: 'البيانات حفظت',//'数据已保存',
	'clear_all_sure'	: 'هل أنت متأكد من مسح جميع البيانات?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'إخفاء المحتوى',//'请输入要隐藏的信息内容',
	'free_content'		: 'اذا لم تدخل سعر المشاركة, ستعرض مجاناً,',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'إظهار عندما يرد العضو على هذا الموضوع ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'إظهار عندما تكون نقاط العضو أكثر من  ',//'只有当浏览者积分高于',
	'when_show'		: 'عندما تظهر',//'时才显示',
	'table_rows'		: 'صفوف الجدول',//'表格行数',
	'table_columns'		: 'اعمدة الجدول',//'表格列数',
	'table_width'		: 'عرض الجدول: ',//'表格宽度: ',
	'bg_color'		: 'لون الخلفية',//'背景颜色',
	'table_intro0'		: 'ملاحظات بسيطة',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=color]&quot; Define the row background color<br />&quot;[td=Width]&quot; Define the column width<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Define the Row/Column Span and Width<br /><br />Fast writing table example: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />الإسم:|Discuz!<br />الإصدار:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'استخدم &quot;|&quot; للفصل بين الصفوف, اذا وجد &quot;|&quot; في البيانات, سيتم استبداله ب &quot;\\|&quot;, separate rows with &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'ادخل وصلة ملف الصوت',//'请输入音乐文件地址',
	'video_url'		: 'ادخل وصلة ملف الفيديو',//'请输入视频地址',
	'auto_play'		: 'تشغيل تلقائي?',//'是否自动播放',
	'flash_url'		: 'ادخل وصلة ملف فلاش ',//'请输入 Flash 文件地址',
	'enter_please'		: 'الرجاء ادخل الـ',//'请输入第',
	'nth_parameter'		: '-th parameter',//' 个参数',
	'font'			: 'الخط',//'字体',
	'full_screen'		: 'شاشة كاملة',//'全屏',
	'restore_size'		: 'استعادة الحجم',//'恢复',
	'general'		: 'وضع عادي',//'常用',
	'simple'		: 'وضع متقدم',//'高级',
	'bad_browser'		: 'متصفحك لا يدعم هذه الخاصية',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'إضغط هنا لتفعيل الحفظ التلقائي',//'点击开启自动保存',
	'autosave_enable'	: 'تفعيل الحفظ التلقائي',//'开启自动保存',
	'autosave_disable'	: 'تعطيل الحفظ التلقائي',//'点击关闭自动保存',
	'autosave_enabled'	: 'الحفظ التلقائي مفعل',//'数据自动保存已开启',
	'autosave_disabled'	: 'الحفظ التلقائي معطل',//'数据自动保存已关闭',
	'data_saved_at'		: ' البيانات حفظت في ',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: ' ثانية قبل الحفظ',//'秒后保存',
	'insert_quote'		: 'ادراج اقتباس',//'请输入要插入的引用',
	'insert_code'		: 'ادارج كود',//'请输入要插入的代码',
//	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址',
//	'width_optional'	: 'Width (optional)',//'宽(可选)',
//	'height_optional'	: 'Height (optional)',//'高(可选)',
	'enter_item_list'	: 'ادخل قائمة العناصر.\r\nاتركها فارغة, أو إضغط زر إلغاء.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
//	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址',
//	'enter_link_text'	: 'Enter the link text',//'请输入链接文字',
//	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用',
	'width'			: 'العرض',//'宽',
	'height'		: 'الطول',//'高',
	'audio_support'		: 'يدعم wma, mp3, ra, rm, وصيغ أخرى<br />مثل: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'يدعم Youku, potatoes, 56, 6, cool video مواقع أخرى و <br /> يدعم الصيغ wmv avi rmvb mov swf flv  <br /> مثال: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'يدعم swf flv <br /> مثال: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'لصق محتوى وورد ',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'استخدم زري (Ctrl + V) للصق من ملفات وورد',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'هل أنت متأكد من انك تريد حذف هذا الموضوع من المواضيع النشطة?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'يوجد ',//'有',
//	'new_reply_exists'	: ' new replies in the thread, click to view',//'条存在新回复的主题，点击查看',
	'new_reply_exists'	: 'الموضوع يحتوي على ردود جديدة, إضغط للعرض',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'بحث في الانترنت',//'网页搜索',
	'search_site'	: 'بحث في الموقع',//'站内搜索',
	'search'	: 'بحث',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'حدد موضوع للاشراف عليه',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'خطأ داخلي',//'内部服务器错误',
	'upload_ok'		: 'تم الرفع بنجاح',//'上传成功',
	'ext_not_supported'	: 'هذا النوع من الملفات غير مدعوم',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'عذراً, الملف غير مدعوم.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'نوع صورة غير صالح',//'图片附件不合法',
	'can_not_save_attach'	: 'لا يمكن حفظ ملف المرفق',//'附件文件无法保存',
	'invalid_file'		: 'ملف غير صالح',//'没有合法的文件被上传',
	'illegal_operation'	: 'عملية غير صالحة',//'非法操作',
//	'current_length'	: 'الطول الحالي',//'当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'إلى',//'到',
//	'bytes'			: 'حروف',//'字节',
//	'check_length'		: 'تعداد الكلمات',//'字数检查',
	'enter_content'		: 'ادخل المحتوى أو العنوان',//'请完成标题或内容栏',
	'select_category'	: 'حدد فئة الموضوع',//'请选择主题对应的分类',
	'select_category_info'	: 'حدد فئة لمعلومات الموضوع',//'请选择主题对应的分类信息',
	'title_long'		: 'طول العنوان يزيد عن 255 حرف',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'طول المحتوى لا يتطابق مع المطلوب.\n\n',//'您的帖子长度不符合要求。\n\n',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'ignore_pending_attach'	: 'هناك مرفقات قيد الإنتظار, هل تريد تجاهلهم?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'هناك بعض المرفقات قيد الرفع, الرجاء الإنتظار. سيتم نشر الموضوع تلقائي بعد إنتهاء الرفع...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
//	'q&a_invalid'			: 'Wrong answer, please try again',//'验证问答错误，请重新填写',
//	'code_invalid'			: 'Wrong security code, please try again',//'验证码错误，请重新填写',
	'no_data_recover'	: 'لا يوجحد بيانات ليتم استعادتها!',//'没有可以恢复的数据！',
	'content_overwrite'	: 'المجحتوى الحالي سيتم استبداله, هل أنت متأكد من استعادة البيانات?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'تم الإنتهاء من الرفع!',//'附件上传完成！',
	'successfull'		: 'نجح:',//'成功',
	'failed'		: 'فشل:',//'失败',
	'ones'			: 'وحدة',//'个',
	'uploading'		: 'جاري الرفع...',//'上传中...',
	'select_image_files'	: 'حدد ملفات الصور',//'请选择图片文件',
	'delete'		: 'حذف',//'删除',
//	'cancel'		: 'Cancel',//'取消',
	'contains'		: 'يحتوي ',//'包含',
	'img_attached_num'	: ' صورة مرفقة ',//'个图片附件',
	'files attached_num'	: ' ملفات تم ارفاقها',//'个附件',
	'images'		: 'الصور',//'图片',
	'attachments'		: 'المرفقات',//'附件',
	'upload_failed'		: 'فشل الرفع',//'上传失败',

	'attach_big'		: 'حجم المرفقات تجاوز الحد الاقصى',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: 'مجموعتك تجاوزت الحد الاقصى من المرفقات',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: 'لقد تجاوزت الحد الاقصى من حجم الملفات من هذا النوع',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: 'لقد تجاوز عدد المرفقات يومياًً الحد الاقصى',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'التحقق من  س & ج, الرجاء الإنتظار',//'验证问答校验中，请稍后',
	'validating_code'	: 'التأكد من الرمز, يرجى الإنتظار',//'验证码校验中，请稍后',
	'attach_type_disabled'	: 'هذا النوع مرفوض',//'附件类型被禁止',
	'attach_max'		: 'ليس اكبر من ',//'不能超过',
	'vote_max_reached'	: 'وصل للحد الاقصى من المصوتين: ',//'已达到最大投票数',
	'no_remote_attach'	: 'عذراً, لا يمكن الارفاق بوصلة',//'抱歉，暂无远程附件',
	'delete_post_sure'	: 'هل أنت متأكد من انك تريد حذف المشاركة?',//'确定要删除该帖子吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'هل أنت متأكد أنك تريد تعريف هذه المشاركة بوصفها "أفضل إجابة"?',//'您确认要把该回复选为“最佳答案”吗？',
//	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 255 个字符的限制',
//	'content_long'		: 'The content length does not meet the requirements.\n\nCurrent Length '//'您的帖子长度不符合要求。\n\n当前长度',
//	'bytes'			: 'حروف',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'إلى',//'到',
	'premoderated'		: 'الردود لهذا القسم يجب أن يتم التحقق منها. لن يتم إظهار مشاركتك الا بعد مراجعتها',//'本版回帖需要审核，您的帖子将在通过审核后显示',
//	'credit_confirm1'	: 'This costs ',//'下载积分将',
	'credit_confirm1'	: 'التحميل يكلف ',//'下载需要消耗',
	'credit_confirm2'	: ' نقطة, هل أنت متأكد من التحميل?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'تم نسخ عنوان الموضوع للحافظة',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'انقر للتكبير',//'点击放大',
	'notify_on_reply'	: 'استقبال تنبيه الرد',//'接收回复通知',
	'notify_on_reply_cancel'	: 'إلغاء استقبال التنبيه',//'取消回复通知',
	'share_connection_failed'	: 'فشل الاتصال للمشاركة, حاول مرة أخرى لاحقاً',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Please bind your QQ account',//'请先绑定QQ账号',// not im (arabic)
	'quote_by'	: 'اقتُبِس بواسطة  .*? في .*? ',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'	: 'نسخ الكود',//'复制代码',

//--------------------------------
//static/js/home.js
	'day'			: 'يوم',//'日',
	'category_empty'	: 'إسم القسم لا يمكن تركه فارغاً!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'اغلاق',//'关闭',
//	'wait_please'		: 'جاري التحميل ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'طول العنوان (يجب أن يكون من   1~80 حرف) ليس كالمطلوب',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'إظهار الصورة الاصلية في نافذة جديدة',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: 'هل أنت متأكد من المضي قدما?',//'您确定要执行本操作吗？',
	'select_item'		: 'الرجاء إختيار عنصر لإجراء العملية',//'请选择要操作的对象',
	'image_url_invalid'	: 'وصلة صورة خاطئة',//'图片地址不正确',
	'audio_url_invalid'	: 'وصلة صوت خاطئة, لا يمكن تركها فارغة',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'توسيع',//'收起',
	'expand'		: 'تقليص',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'يمكنك تحديد إلى ما يصل ',//'最多只允许选择',
	'users'			: 'أعضاء',//'个用户',
	'allready_exists'	: 'موجود مسبقاًً',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'انتما أصدقاء الآن, تستطيع  ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'اترك رسالة',//'给TA留言',
	'or'			: 'أو',//'或者',
	'send_greeting'		: 'ارسل تحية',//'打个招呼',
//	'collapse'			: 'Collapse',//'收起',
	'reply'			: 'رد',//'回复',
	'comment'		: 'تعليق',//'评论',
	'close_list'		: 'اغلاق القائمة',//'收起列表',
	'more_feeds'		: 'المزيد من الأخبار',//'更多动态',
//	'day'			: 'Day',//'日',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'عذراً, الصورة غير مدعومة',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'إضغط هنا للإدارة مكان مؤشر الفأرة',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'ادراج',//'插入',
//	'delete'		: 'حذف',//'删除',
	'image_description'	: 'وصف الصورة',//'图片描述',
//	'upload_ok'		: 'نجح الرفع',//'上传成功',
//	'upload_failed'		: 'فشل الرفع',//'上传失败',
	'uploading_wait'	: 'جاري الرفع, الرجاء الإنتظار',//'上传中，请等待',
	'retry'			: 'إعادة المحاولة',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'هل أنت متأكد من انك تريد حذف هذه البيانات?',//'您确定要删除该数据吗？',
	'ignore_sure'		: 'هل أنت متأكد من تجاهل هذه البيانات?',//'您确定要屏蔽该数据吗？',
	'to'			: 'إلى',//'到',

	'choose_block'		: 'إختيار كتلة',//'选择模块',
	'blocks_found1'		: 'وجد',//'找到',
	'blocks_found2'		: ' كتل مطابقة ',//'个相应的模块',
	'blocks_not_found'	: 'لا يوجد',//'没有相应的模块',
	'select_block'		: 'قم بتحديد الكتلة!',//'请选择一个模块！',
	'show_settings'		: 'إظهار الإعدادات',//'展开设置项',
	'hide_settings'		: 'إخفاء الإعدادات',//'收起设置项',
	'block_name_empty'	: 'لا يمكن ترك إسم الكتلة فارغ',//'模块标识不能为空',
	'block_convert_sure'	: 'هل أنت متأكد من ذلك',//'你确定要转换模块的类型从',
	'back'			: 'رجوع',//'返回',
	'settings_expand'	: 'توسيع الإعدادات',//'展开设置项',
	'settings_hide'		: 'إخفاء الإعدادات',//'收起设置项',
	'custom_content_error'	: 'محتوى مخصص غير صالح!كود  HTML : ',//'自定义内容错误，',
	'html_error'		: ' كود HTML : ',//'HTML代码：',
	'tags_not_match'	: ' - الكلمات الدلالية غير متطابقة',//' 标签不匹配',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'قم بإختيار ستايل',//'选择样式',
	'style'			: 'ستايل',//'样式',
	'style1'		: 'ستايل1',//'样式1',
	'style2'		: 'ستايل2',//'样式2',
	'style3'		: 'ستايل 3',//'样式3',
	'style4'		: 'ستايل 4',//'样式4',
	'style5'		: 'ستايل 5',//'样式5',
	'style6'		: 'ستايل 6',//'样式6',
	'style7'		: 'ستايل 7',//'样式7',
	'no_border'		: 'بدون حدود',//'无边框框架',
	'no_border_no_margin'	: 'بدون حدود, بدون هامش',//'无边框且无边距',

//	'choose_style'		: 'تحديد ستايل',//'选择样式',
	'title'			: 'العنوان',//'标题',
//	'delete'		: 'حذف',//'删除',
	'attribute'		: 'السمة',//'属性',
	'data'			: 'بيانات',//'数据',
	'update'		: 'تحديث',//'更新',
	'export'		: 'تصدير',//'导出',
	'repeat'		: 'تكرار',//'平铺',
	'no_repeat'		: 'بدون تكرار',//'不平铺',
	'repeat_x'		: 'تكرار افقياً',//'横向平铺',
	'repeat_y'		: 'تكرار عمودياً',//'纵向平铺',
	'no_style'		: 'بدون ستايل',//'无样式',
	'solid_line'		: 'خط متصل',//'实线',
	'dotted_line'		: 'خط نقطي',//'点线',
	'dashed_line'		: 'خط متقطع',//'虚线',
//	'font'			: 'الخط',//'字体',
	'link'			: 'وصلة',//'链接',
	'border'		: 'الحدود',//'边框',
	'size'			: 'الحجم',//'大小',
	'color'			: 'اللون',//'颜色',
	'separate_config'	: 'Separate Config',//'分别设置',
	'right'			: 'يسار',//'右',
	'bottom'		: 'أسفل',//'下',
	'top'			: 'أعلى',//'上',
	'left'			: 'يمين',//'左',
	'margin'		: 'هامش',//'外边距',
	'padding'		: 'المل ء',//'内边距',
//	'background_color'	: 'Background Color',//'背景颜色',
	'bg_image'		: 'صورة الخلفية',//'背景图片',
	'class'			: 'الطبقة المحددة',//'指定class',
	'block'			: 'الكتلة',//'模块',
	'frame'			: 'إطار',//'框架',
//	'edit'			: 'تعديل',//'编辑',
//	'style'			: 'ستايل',//'样式',
//	'close'			: 'اغلاق',//'关闭',
//	'submit'		: 'موافق',//'确定',
//	'cancel'		: 'إلغاء',//'取消',
//	'tile'			: 'Tile',//'平铺',
//	'no_tile'		: 'No tile',//'不平铺',
//	'tile_hor'		: 'Horizontal Tile',//'横向平铺',
//	'tile_ver'		; 'Vertical Tile',//'纵向平铺',
	'onclick'		: 'عند الضغط',//'点击',
	'onmouseover'		: 'عند المرور بالماوس',//'滑过',
	'switch_type'		: 'نوع التبديل',//'切换类型',
//	'title'			: 'العنوان',//'标题',
//	'link'			: 'وصلة',//'链接',
	'image'			: 'صورة',//'图片',
	'position'		: 'الموقع',//'位置',
	'align_left'		: 'إلى اليمين',//'居左',
	'align_right'		: 'إلى اليسار',//'居右',
	'offset'		: 'الازاحة',//'偏移量',
//	'font'			: 'الخط',//'字体',
//	'size'			: 'الحجم',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'اللون',//'色',
	'add_new_title'		: 'إضافة عنوان جديد',//'添加新标题',
//	'edit'			: 'Edit',//'编辑',
//	'title'			: 'Title',//'标题',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
	'delete_this_sure'	: 'هل أنت متأكد من الحذف? لا يمكنك التراجع.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'تحميل المحتوى...',//'正在加载内容...',
	'modified_import'	: 'لقد قمت بعمل بعض التغييرات, الرجاء الاستيراد بعد الحفظ.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'الإجمالي ',//'共',
	'blocks'		: ' كتلة ',//'个模块',
	'updating_the'		: 'تحديث #',//'正在更新第',
//	'ones'			: 'ones',//'个',
	'done'			: 'تم ',//'已完成',
	'start_updating'	: 'بدء التحديث...',//'开始更新...',
	'update_block_data'	: 'تحديث بيانات الكتل',//'更新模块数据',
	'clear_diy_sure'	: 'هل أنت متأكد من أنك تريد حذف كافة الكتل الموجودة في هذه الصفحة بواسطة DIY ? لا يمكن التراجع على هذا القرار.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'تحذير: لا يوجد اطار, قم بإضافة اطار.',//'提示：未找到框架，请先添加框架。',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'تطبيق على كل الصفحات',//'应用于此类全部页面',
	'apply_current_page'	: 'تطبيق فقط على هذه الصفحة',//'只应用于本页面',
	'save_temp_sure'	: 'حفظ البيانات المؤقتة?<br /> إضغط موافق للحفظ, إضغط على إلغاء لحذف البيانات المؤقتة ',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'حفظ البيانات المؤقتة',//'保留暂存数据',
	'revert_last_saved'	: 'هل أنت متأكد أنك تريد العودة إلى الإصدار السابق من حفظ النتائج?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'مواصلة إلى  DIY مع البيانات المؤقتة?',//'是否继续暂存数据的DIY？',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'تم التحديث البيانات بنجاح.',//'已更新完成。',
	'tab_label'		: 'علامة التبويب',//'tab标签',
	'temp_action'		: 'إضغط على "استمرار" لجلب المعلومات الحالية للاستايل الحالي,<br />إضغط على زر  "حذف" لحذف البيانات المؤقتة.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'مواصلة',//'继续',

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'لقد جئت من المدونات الصغيرة تينسنت منصة مفتوحة',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'إسم المستخدم يحتوي على حروف ممنوعة',//'用户名包含敏感字符',
	'username_short'	: 'إسم المستخدم أقل من 2 حروف',//'用户名小于 3 个字符',
	'username_long'		: 'إسم المستخدم اكبر من 15 حرف',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'كلمتا المرور غير متطابقتين',//'两次输入的密码不一致',
	'email_invalid'		: 'البريد يحتوي على أحرف ممنوعة',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'رمز الدعوة يحتوي على احرف ممنوعة',//'邀请码包含敏感字符',
	'password_fill'		: 'اكتب كلمة المرور',//'请填写密码',
	'password_again'	: 'اعد كلمة المرور',//'请再次输入密码',
	'email_fill'		: 'الرجاء ادخل البريد',//'请输入邮箱地址',

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'الرجاء حدد',//'请选择',
	'required_fill'		: 'الحقول المطلوبة غير مكتملة',//'必填项目没有填写',
	'select_next_level'	: 'حدد المستوى التالي',//'请选择下一级',
	'numeric_invalid'	: 'القيمة العددية خاطئة',//'数字填写不正确',
	'email_invalid'		: 'البريد خاطئ',//'邮件地址不正确',
	'text_too_long'		: 'قيمة الحقل كبيرة جداً',//'填写项目长度过长',
	'value_is_greater'	: 'القيمة اكبر من المطلوب',//'大于设置最大值',
	'value_is_less'		: 'القيمة أقل من المطلوب',//'小于设置最小值',
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Delete',//'删除',
//	'attribute'		: 'Attribute',//'属性',
	'save_js'		: 'حفظ بيانات الجافا بعد المشاهدة',//'javascript脚本保存后显示',
	'settings'		: 'الإعدادات',//'设置',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'عذراً, نوع الملف غير صالح',//'对不起，不支持上传此类文件',
//	'uploading'		: 'Uploading...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'أنت تستعمل أعلى اصدارات ديسكاز حالياًً. يرجى الرجوع إلى النصائح التالية لإجراء ترقيات في الوقت المناسب.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'إضافة إلى العمليات الشائعة',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

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
