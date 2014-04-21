/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables

	$Id: lang_js.js by Valery Votintsev, codersclub.org

*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering:
var emaildomains = [
		'wp.pl',
		'onet.pl',
		'interia.pl',
		'o2.pl',
		'gmail.com',
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
	'cut_manually'		: 'Ustawienia Twojej przeglądarki nie pozwalają na automatyczne wykonanie operacji cięcia. Użyj skrótu klawiszowego (Ctrl X), aby zakończyć tę operację.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'Ustawienia Twojej przeglądarki nie pozwalają na automatyczne wykonanie operacji kopiowania. Użyj skrótu klawiszowego (Ctrl C), aby zakończyć tę operację.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'Ustawienia Twojej przeglądarki nie pozwalają na automatyczne wykonanie operacji wklejania. Użyj skrótu klawiszowego (Ctrl V), aby zakończyć tę operację.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'Can not find the Graffiti initialization data',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Obsługa tylko dla IE 5.01 lub wyższej',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Edit Raw Text',//'编辑源码',
	'plain_text_warn'	: 'Konwersja do trybu tekstowego spowoduje utratę formatowania!\nCzy na pewno chcesz kontynuować?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'Twoja przeglądarka nie wspiera żądanej funkcji. Proszę zaktualizować przeglądarkę.',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'Wskazówki',//'小提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'Ta operacja przynosi efekt tylko w trybie WYSIWYG.',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Testing other cloud platform interface',//'云平台其他接口测试',
	'int_roaming_test'	: 'Testing other Roaming interface',//'漫游其他接口测试',
	'int_qq_test'		: 'Testing QQ Internet interface',//'QQ互联接口测试',
	'server_busy'		: 'The server is busy, please try again later',//'服务器繁忙，请稍后再试',
	'tested_ok'		: 'The test is successful, time used: ',//'测试成功，耗时 ',
	'seconds'		: ' s.',//' 秒',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Wybierz co najmniej jeden temat, aby załączyć treść do artykułów.',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Wybierz co najmniej jeden obiekt, aby załączyć treść do artykułów.',//'请至少推送一条信息到列表区域',
	'loading'		: 'Wczytywanie...',//'加载中...',
	'push5reached'		: 'Push Post number has reached five, in the right to cancel a number and try again.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Click on the left',//'点击左侧',
	'push_to_list'		: 'Will push the information to the list',//'将信息推送到列表',
	'wait_image_upload'	: 'Wysyłanie obrazka, proszę czekać...',//'图片上传中，请稍后...',





//---------------------------
//upload/static/js/autoloadpage.js
	'loading_content_wait'	: 'Wczytywanie zawartości, proszę czekać...',//'正在加载, 请稍后...',

//---------------------------
//upload/static/js/at.js
//	'enter_username'	: 'Proszę wybrać nazwę użytkownika',//'请输用户名',

//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Wczytywanie ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Poprzedni miesiąc',//'上一月',
	'next_month'	: 'Następny miesiąc',//'下一月',
	'select_year'	: 'Wybierz rok',//'点击选择年份',
	'select_month'	: 'Wybierz miesiąc',//'点击选择月份',
	'wday0'		: 'Ni',//'日',
	'wday1'		: 'Po',//'一',
	'wday2'		: 'Wt',//'二',
	'wday3'		: 'Śr',//'三',
	'wday4'		: 'Czw',//'四',
	'wday5'		: 'Pt',//'五',
	'wday6'		: 'So',//'六',
	'month'		: 'Miesiąc',//'月',
	'today'		: 'Dziś',//'今天',
	'hours'		: 'Godzin',//'点',
	'minutes'	: 'Minut',//'分',
	'halfhour'	: 'Pół godziny',//'半小时',
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'Otwórz w nowym oknie',//'在新窗口打开',
	'actual_size'		: 'Aktualny rozmiar',//'实际大小',
	'close'			: 'Zamknij',//'关闭',
	'wheel_zoom'		: 'Użycie kółka myszki pozwala powiększyć/zmniejszyć rozmiary przeglądanego obrazka',//'鼠标滚轮缩放图片',
	'reminder'		: 'Powiadomienie',//'提示信息',
	'submit'		: 'Wyślij',//'确定',
	'cancel'		: 'Anuluj',//'取消',
	'wait_please'		: 'Wczytywanie ...',//'请稍候...',
	'int_error'		: 'Napotkano problemy. Nie można wyświetlić treści.',//'内部错误，无法显示此内容',
	'flash_required'	: 'Zawartość wymaga wtyczki Adobe Flash Player',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Pobierz Flash Player',//'下载 Flash Player',
	'day1'			: '1 dzień',//'一天',
	'week1'			: '1 tydzień',//'一周',
	'days7'			: '7 dni',//'7 天',
	'days14'		: '14 dni',//'14 天',
	'month1'		: '1 miesiąc',//'一个月',
	'month3'		: '3 miesiące',//'三个月',
	'month6'		: '6 miesięcy',//'半年',
	'year1'			: '1 rok',//'一年',
	'custom'		: 'Zdefiniuj',//'自定义',
	'permanent'		: 'Permanent',//'永久',
	'show_all_expr'		: 'Wszystkie',//'显示所有表情',
	'page_prev'		: 'Następna strona',//'上页',
	'page_next'		: 'Poprzednia strona',//'下页',
	'copy2clipboard'	: 'Kliknij tutaj, aby skopiować link do schowka',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Wprowadź szukane wyrażenia',//'请输入搜索内容',
	'refresh_q&a'		: 'Odśwież Q&A',//'刷新验证问答',
	'refresh_code'		: 'Odśwież kod',//'刷新验证码',
	'code_invalid'		: 'Wprowadzono błędny kod zabezpieczający. Spróbuj ponownie.',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'Wprowadzono błędną odpowiedź. Spróbuj ponownie.',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'Kod został skopiowany do schowka',//'代码已复制到剪贴板',
	'enter_link_url'	: 'Adres URL',//'请输入链接地址',
	'enter_link_text'	: 'Tekst maskujący',//'请输入链接文字',
	'enter_image_url'	: 'Adres URL obrazka',//'请输入图片地址',
	'width_optional'	: 'Szerokość (opcjonalne)',//'宽(可选)',
	'height_optional'	: 'Wysokość (opcjonalne)',//'高(可选)',
	'narrow_screen'		: 'Wąski ekran',//'切换到窄版',
	'wide_screen'		: 'Szeroki ekran',//'切换到宽版',
	'logging_wait'		: 'Loguję, momencik...',//'登录中，请稍后...',
	'notices_no'		: '[Brak]',//'【　　　】',
	'notices_yes'		: '[Nowe]',//'【新提醒】',
	'sec_after_win_closed'	: ' sek. do zamknięcia powiadomienia.',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' sek. do zamknięcia powiadomienia.',//' 秒后页面跳转',
	'jump_now'		: 'Skocz teraz',//'立即跳转',
	'error_message'		: 'Komunikat błędu',//'错误信息',
	'ctrl_d_favorites'	: 'Wciśnij Ctrl + D, aby dodać do ulubionych.',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'Dla przeglądarek innych niż IE, należy ustawić ręcznie.',//'非 IE 浏览器请手动将本站设为首页',
	'blind_enable'		: 'Włącz technologię dla niewidomych',//'开启盲人体验',//tc:'開啟盲人體驗',
	'blind_disable'		: 'Wyłącz technologię dla niewidomych',//'关闭盲人体验',//tc:'關閉盲人體驗',

//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Edytuj',//'编辑',
	'warn_not_saved'	: 'Informacje uległy zmianie. Jeśli zdecydujesz się wyjść, wszystkie zmiany zostaną utracone.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'Jeśli zdecydujesz się wyjść, wszystkie dane zostaną utracone. Czy jesteś pewien?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'Proszę wybrać obrazek',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Kopiowanie nie zostało ukończone. Proszę wybrać "Zezwól na dostęp".',//'复制失败，请选择“允许访问”',
	'prev'			: 'Nast.',//'上一张',
	'next'			: 'Poprz.',//'下一张',

//--------------------------------
//static/js/editor.js

	'restore_size_edit'	: 'Przywróć rozmiar edytora',//'恢复编辑器大小',
	'full_screen_edit'	: 'Pełnoekranowy edytor',//'全屏方式编辑',
	'current_length'	: 'Wykorzystano',//'当前长度',
	'bytes'			: 'bajtów',//'字节',
	'system_limit'		: 'Limit systemu',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'Licznik znaków',//'字数检查',
	'data_restored'		: 'Treść została przywrócona',//'数据已恢复',
	'data_saved'		: 'Treść została zapisana',//'数据已保存',
	'clear_all_sure'	: 'Czy na pewno chcesz wyczyścić całą zawartość?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'Ukryta zawartość',//'请输入要隐藏的信息内容',
	'free_content'		: 'Treść zostanie zaprezentowana w specjalnym bloku, który pozwoli wyróżnić umieszczoną zawartość',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'Pokaż zawartość, kiedy użytkownik odpowie w temacie.',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Pokaż zawartość, kiedy użytkownik ma na koncie więcej niż',//'只有当浏览者积分高于',
	'when_show'		: 'punktów',//'时才显示',
	'table_rows'		: 'Wierszy',//'表格行数',
	'table_columns'		: 'Kolumn',//'表格列数',
	'table_width'		: 'Szerokość tabeli',//'表格宽度: ',
	'bg_color'		: 'Tło',//'背景颜色',
	'table_intro0'		: 'Krótki poradnik',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=color]&quot; Ustala kolor wiersza<br />&quot;[td=Width]&quot; Ustala rozmiar komórki<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Ustala kolor, rozmiary kolumn i wierszy <br /><br /> Prosty przykład tabeli: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />Nazwa:|Discuz!<br />Wersja:|X2.5<br />[/table] <br /><br />',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Użyj &quot;|&quot; by oddzielić komórki. Jeśli znak &quot;|&quot; stanowi którąś z danych, zamień go na &quot;\\|&quot;, wiersze oddzielaj &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'Wprowadź adres URL do pliku muzycznego',//'请输入音乐文件地址',
	'video_url'		: 'Wprowadź adres URL do pliku wideo',//'请输入视频地址',
	'auto_play'		: 'Autoplay?',//'是否自动播放',
	'flash_url'		: 'Wprowadź adres URL do pliku flash',//'请输入 Flash 文件地址',
	'enter_please'		: 'Please enter the',//'请输入第',
	'nth_parameter'		: '-th parameter',//' 个参数',
	'font'			: 'Czcionka',//'字体',
	'full_screen'		: 'Pełny ekran',//'全屏',
	'restore_size'		: 'Przywróć rozmiar',//'恢复',
	'general'		: 'Tryb ogólny',//'常用',
	'simple'		: 'Tryb rozszerzony',//'高级',
	'bad_browser'		: 'Twoja przeglądarka nie obsługuje tej funkcji',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'Kliknij tutaj, aby włączyć autozapis postów',//'点击开启自动保存',
	'autosave_enable'	: 'Włącz autozapis',//'开启自动保存',
	'autosave_disable'	: 'Wyłącz autozapis',//'点击关闭自动保存',
	'autosave_enabled'	: 'Autozapis został wł.',//'数据自动保存已开启',
	'autosave_disabled'	: 'Autozapis został wył.',//'数据自动保存已关闭',
	'data_saved_at'		: 'Zapisano o',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: 'sek. do autozapisu.',//'秒后保存',
	'insert_quote'		: 'Wprowadź cytat',//'请输入要插入的引用',
	'insert_code'		: 'Wprowadź kod',//'请输入要插入的代码',
	'enter_item_list'	: 'Enter the item list.\r\nLeave blank, or click Cancel.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
	'width'			: 'Szerokość',//'宽',
	'height'		: 'Wysokość',//'高',
	'audio_support'		: 'Wspierane formaty: wma, mp3, ra, rm, i inne.<br />Przykład: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'Wsparcie dla Youku, Potatoes, 56, 6, Cool video i innych serwisów.<br />Wspierane formaty: wmv avi rmvb mov swf flv.<br /> Przykład: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'Wspierane formaty: swf flv <br /> Przykład: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'Wklej zawartość programu Word',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'Użyj skrótu wklejania (Ctrl + V), aby uzupełnić powyższe pole.',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
	'show_tips'		: 'Pokaż wskazówki',//'友情提示',
	'expire_days'		: 'Valid for (days)',//'有效天数',
	'expire_days_invalid'	: 'Distance from the posting date is greater than the number of days when the label automatically expire',//'距离发帖日期大于这个天数时标签自动失效',
	'download_remote'	: 'Downloading remote attachment, please wait ...',//'正在下载远程附件，请稍等……',
	'create_post_directory'	: 'Create post directory',//'创建帖子目录',
	'page_number'		: 'Numer strony',//'页码',
	'jump_to_page'		: 'Skocz do wybranej strony',//'跳转到指定的页',
	'jump_to_page_comment'	: 'Użyj [page], aby dodać nową stronę',//'用 [page] 对当前帖子分页后的页码',
	'jump_to_post'		: 'Skocz do wybrantego posta',//'跳转到指定的帖子',
	'jump_tip_pid'		: 'Post TID and PID',//'帖子的 TID 和 PID',
	'add_indent'		: 'Add the first line indent',//'添加行首缩进',
	'enter_post_password'	: 'Please enter the post password',//'请输入帖子密码',
	'begin_flash_img'	: 'Wprowadź adres URL animacji flash lub obrazka',//'请输入开头动画 Flash 或 图片 地址',
	'begin_click_url'	: 'Przekierowanie linku',//'点击链接地址',
	'begin_stay_seconds'	: 'Czas wyświetlania (sek.)',//'停留秒数',
	'begin_disappearance'	: 'Efekt po załadowaniu',//'载入、消失的效果',
	'none'			: 'Brak',//'无',
	'begin_fade'		: 'Zanikanie',//'淡入淡出',
	'begin_explosive'	: 'Ekspozja',//'展开闭合',
	'begin_info'		: 'Wspierane formaty: swf flv jpg gif png<br/>Zakres szerokości: 400~1024, zakres wysokości: 300~640<br/>Przykład: http://server/flash.swf',//'支持 swf flv jpg gif png 网址<br />宽高范围: 宽400~1024 高300~640<br />示例: http://server/flash.swf',
	
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'Czy aby na pewno chcesz usunąć ten temat z listy gorących??',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'Są tutaj ',//'有',
	'new_reply_exists'	: 'Pojawiły się nowe odpowiedzi w tematach. Kliknij tutaj, aby wyświetlić nową zawartość.',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Szukaj w Internecie',//'网页搜索',
	'search_site'	: 'Szukaj na stronie',//'站内搜索',
	'search'	: 'Szukaj',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Wybierz temat do moderacji',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Internal Server Error',//'内部服务器错误',
	'upload_ok'		: 'Wysyłanie zakończone sukcesem',//'上传成功',
	'ext_not_supported'	: 'Rozszerzenie tego pliku nie jest wspierane.',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'Przepraszamy, nie obsługujemy takich rozszerzeń.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'Nieprawidłowy format obrazka',//'图片附件不合法',
	'can_not_save_attach'	: 'Załącznik nie został zapisany',//'附件文件无法保存',
	'invalid_file'		: 'No legitimate file was uploaded',//'没有合法的文件被上传',
	'illegal_operation'	: 'Nieprawidłowa operacja',//'非法操作',
	'enter_content'		: 'Proszę uzupełnić pole tytuł lub treść',//'请完成标题或内容栏',
	'select_category'	: 'Proszę wybrać kategorię tematu.',//'请选择主题对应的分类',
	'select_category_info'	: 'Proszę wybrać odpowiednią kategorię.',//'请选择主题对应的分类信息',
	'title_long'		: 'Nazwa tematu nie może przekraczać 255 znaków.',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'Długość wypowiedzi nie spełnia określonych wymagań.\n\n',//'您的帖子长度不符合要求。\n\n',
	'ignore_pending_attach'	: 'Wygląda na to, że niektóre załączniki nie zostały dodane do tematu. Zignorować?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'Trwa wysyłanie załączników, proszę czekać. Po wysłaniu wszystkich plików, temat zostanie opublikowany automatycznie.',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
	'no_data_recover'	: 'Nie odnaleziono treści, które mogłoby zostać przywrócone!',//'没有可以恢复的数据！',
	'content_overwrite'	: 'Ostrzeżenie:\nAktualna zawartość zostanie nadpisana na poprzednią!\nCzy jesteś pewien, aby przywrócić dane?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'Wysyłanie zostało zakończone!',//'附件上传完成！',
	'successfull'		: 'Sukces:',//'成功',
	'failed'		: 'Niepowodzenie:',//'失败',
	'ones'			: 'ones',//'个',
	'uploading'		: 'Wysyłanie...',//'上传中...',
	'select_image_files'	: 'Proszę wybrać pliki graficzne',//'请选择图片文件',
	'delete'		: 'Usuń',//'删除',
	'contains'		: 'liczy ',//'包含',
	'img_attached_num'	: 'załączonych obrazków',//'个图片附件',
	'files attached_num'	: 'załączonych plików',//'个附件',
	'images'		: 'obrazków',//'图片',
	'attachments'		: 'plików',//'附件',
//	'upload_failed'		: 'Wysyłanie nie powiodło się.',//'上传失败',

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
	'delete_post_sure'	: 'Czy na pewno chcesz usunąć ten post?',//'确定要删除该帖子吗？',
	'feed_add_confirm'	: 'Because of you have set read permission or sell the post, do you confirm also the broadcast to your listeners to see?',//'由于您设置了阅读权限或出售帖，您确认还转播给您的听众看吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'Czy na pewno chcesz oznaczyć ten post jako "najlepsza odpowiedź"?',//'您确认要把该回复选为“最佳答案”吗？',
	'premoderated'		: 'Replies to this category must be audited. Your post wll be displayed after the verification',//'本版回帖需要审核，您的帖子将在通过审核后显示',
	'credit_confirm1'	: 'Download costs ',//'下载需要消耗',
	'credit_confirm2'	: ' points, are you sure to download?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'Thread address was copied to the clipboard',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'Click to enlarge',//'点击放大',
	'notify_on_reply'	: 'Subskrybuj temat',//'接收回复通知',
	'notify_on_reply_cancel'	: 'Usuń subskrypcję',//'取消回复通知',
	'share_connection_failed'	: 'Connection to share failed, please try again later',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Please bind your QQ account',//'请先绑定QQ账号',
	'quote_by'		: 'Quote by .*? in .*? code',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'		: 'Copy code',//'复制代码',
	'download_pocket_forum'	: 'Download Pocket Forum',//'下载掌上论坛',
	'pocket_forum_android'	: 'If Andriod version, Scan thw QR-code can be downloaded directly to the phone',//'Andriod版本，扫描二维码可以直接下载到手机',
	'pocket_forum_android_alt'	: 'Suitable for Android-based smartphones like Samsung/HTC/etc',//'适用于装有安卓系统的三星/HTC/小米等手机',
	'pocket_forum_ios'	: 'If iPhone used, Scan thw QR-code can be downloaded directly to the phone',//'iPhone版本，扫描二维码可以直接下载到手机',
	'pocket_forum_ios_alt'	: 'Suitable for Apple mobile phone',//'适用于苹果手机',

//--------------------------------
//static/js/handlers.js
	'file_selected_exceed'	: 'Wybrano zbyt wiele plików.',//'您选择的文件个数超过限制。',
	'upload_number_exceed'	: 'Nie możesz dodać więcej plików.',//'您已达到上传文件的上限了。',
	'can_choose_more'	: 'Możesz dodać ',//'您还可以选择 ',
	'files'			: ' pliki więcej.',//' 个文件',
	'file_is_large'		: 'Plik jest za duży.',//'文件太大.',
	'file_is_empty'		: 'Nie możesz dodawać pustych plików.',//'不能上传零字节文件.',
	'file_type_disabled'	: 'Upload of such type files is disabled.',//'禁止上传该类型的文件.',
	'unhandled_error'	: 'Unhandled Error',//'',
	'upload_progress'	: 'Dodane ',//'正在上传',
	'upload_cancelled'	: 'Anulowane',//'取消上传',
	'file_description'	: 'Opis pliku',//'图片描述',
	'image_upload_failed'	: 'Wystapił błąd podczas wysyłania.',//'图片上传失败',
	'upload_failed'		: 'Wysyłanie zakończone niepowodzeniem.',//'上传失败',
	'upload_completed'	: 'Wysyłanie zakończone sukcesem.',//'上传完成.',
	'upload_error'		: 'Błąd wysyłania: ',//'',
	'config_error'		: 'Błąd konfiguracji',//'',
	'server_error'		: 'Błąd (IO) serwera',//'',
	'security_error'	: 'Błąd bezpieczeństwa',//'',
	'upload_limit_exceed'	: 'Upload limit exceeded.',//'',
	'file_not_found'	: 'Plik nie istnieje.',//'',
	'validation_failed'	: 'Weryfikacja nie powiodła się. Wysyłanie zostało pominięte.',//'',
	'upload_stopped'	: 'Zatrzymano',//'',

//--------------------------------
//static/js/home.js
	'day'			: 'Dzień',//'日',
	'category_empty'	: 'Nazwa kategorii nie może być pusta!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Zamknij',//'关闭',
//	'wait_please'		: 'Wczytywanie ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Długość tytułu (zalecany przedział 1~80 znaków) nie spełnia wymagań.',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Pokaż oryginalny obrazek w nowym oknie',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: 'Czy na pewno chcesz kontynuować?',//'您确定要执行本操作吗？',
	'select_item'		: 'Please choose the item to operate with',//'请选择要操作的对象',
	'image_url_invalid'	: 'Błędny adres URL dla obrazka',//'图片地址不正确',
	'audio_url_invalid'	: 'Błędny adres URL dla audio. To pole nie może być puste.',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'Zwiń',//'收起',
	'expand'		: 'Rozwiń',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'Możesz wybrać do',//'最多只允许选择',
	'users'			: 'użytkowników',//'个用户',
	'allready_exists'	: 'już istnieje.',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'Od teraz jesteście znajomymi. Możesz ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'wysłać wiadomość',//'给TA留言',
	'or'			: 'lub',//'或者',
	'send_greeting'		: 'zaczepić znajomego. ',//'打个招呼',
	'reply'			: 'Odpowiedz',//'回复',
	'comment'		: 'Komentarz',//'评论',
	'close_list'		: 'Zamknij liste',//'收起列表',
	'more_feeds'		: 'Więcej aktywności',//'更多动态',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Przepraszamy, rozszerzenie obrazka podanego obrazka nie jest wspierane.',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'Click here to insert into the content at current cursor position',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'Wprowadź',//'插入',
	'image_description'	: 'Opis obrazka',//'图片描述',
	'uploading_wait'	: 'Wysyłanie, proszę czekać.',//'上传中，请等待',
	'retry'			: 'Ponów',//'重试',

//---------------------------
//static/js/makehtml.js
	'generate'	: 'Generuj ',//'生成',
	'generate_ok'	: ' wygenerowano prawidłowo',//'生成成功',
	'generate_error'	: ' wystąpił błąd podczas generowania.',//'生成失败',
	'generate_start'	: 'Rozpoczęcie generowania ',//'开始生成 ',
	'generate_click_continue'	: 'Jeśli Twoja przeglądarka nie odpowiada, kliknij tutaj, aby kontynuować...',//'如果您的浏览器没有反应，请点击继续...',
	'generate_completed'	: ' generowanie zakończone.',//' 生成完成',
	'generate_total'	: 'Przewidziany czas ',//'本次共需要生成 ',
	'generate_files'	: ' plików wygenerowano prawidłowo.',//' 文件，成功生成 ',
	'generate_first'	: 'wygenerowano na początku ',//'正在生成第 ',
	'generate_percent'	: 'wykonano ',//'已经完成 ',

//---------------------------
//static/js/mobile/common.js
	'first'		: 'Pierwsza ',//'第 ',
	'page'		: 'strona',//'页',
	'pages'		: ' strony',//'页',
	'prev_page'	: 'Poprzednia',//'上一页',
	'next_page'	: 'Następna',//'下一页',

	'click_to_reload'	: 'Kliknij tutaj, aby przeładować',//'点击重新加载',
	'loading_now'		: 'Wczytywanie...',//'正在加载...',
	'geo_timeout'		: 'Nie można otrzymać lokalizacji. Proszę spróbować raz jeszcze.',//'获取位置超时，请重试',
	'geo_error'		: 'Nie można otrzymać aktualnej lokalizacji.',//'无法检测到您的当前位置',
	'geo_permission'	: 'Proszę zezwolić na dostęp lokalizujący Twoje aktualne położenie.',//'请允许能够正常访问您的当前位置',
	'unknown_error'		: 'Wystąpił nieznany błąd.',//'发生未知错误',
	'touch_down_refresh'	: 'Dotknij dół, aby odświeżyć.',//'下拉可以刷新',
	'touch_up_refresh'	: 'Dotknij górę, aby odświeżyć.',//'松开可以刷新',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'Czy na pewno chcesz usunąć następujące dane?',//'您确定要删除该数据吗？',
	'ignore_sure'		: 'Czy na pewno chcesz zignorować następujące dane?',//'您确定要屏蔽该数据吗？',
	'to'			: 'do',//'到',

	'choose_block'		: 'Wybierz blok',//'选择模块',
	'blocks_found1'		: 'Found',//'找到',
	'blocks_found2'		: 'corresponding blocks',//'个相应的模块',
	'blocks_not_found'	: 'No corresponding blocks',//'没有相应的模块',
	'select_block'		: 'Proszę wybrać blok!',//'请选择一个模块！',
	'show_settings'		: 'Pokaż ustawienia',//'展开设置项',
	'hide_settings'		: 'Ukryj ustawienia',//'收起设置项',
	'block_name_empty'	: 'Nazwa bloku nie może być pusta',//'模块标识不能为空',
	'block_convert_sure'	: 'Are you sure you want to convert the block from type',//'你确定要转换模块的类型从',
	'back'			: 'Powrót',//'返回',
	'settings_expand'	: 'Pokaż ustawienia',//'展开设置项',
	'settings_hide'		: 'Ukryj ustawienia',//'收起设置项',
	'custom_content_error'	: 'Custom content error! HTML code: ',//'自定义内容错误，',
	'html_error'		: 'Kod HTML: ',//'HTML代码：',
	'tags_not_match'	: ' - Tags does not match',//' 标签不匹配',
	'entered'		: 'Have entered ',//'已输入 ',
	'exceed'		: 'Exceed ',//'超出 ',
	'title_length_bad'	: 'Tytuł jest zbyt długi',//'标题长度不正确',
	'summary_length_bad'	: 'Streszczenie jest zbyt długie',//'简介长度不正确',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Wybierz styl',//'选择样式',
	'style'			: 'Styl',//'样式',
	'style1'		: 'Styl 1',//'样式1',
	'style2'		: 'Styl 2',//'样式2',
	'style3'		: 'Styl 3',//'样式3',
	'style4'		: 'Styl 4',//'样式4',
	'style5'		: 'Styl 5',//'样式5',
	'style6'		: 'Styl 6',//'样式6',
	'style7'		: 'Styl 7',//'样式7',
	'no_border'		: 'Bez obramowania',//'无边框框架',
	'no_border_no_margin'	: 'Bez obramowania i marginesów',//'无边框且无边距',

	'title'			: 'Tytuł',//'标题',
	'attribute'		: 'Atrybuty',//'属性',
	'data'			: 'Zawartość',//'数据',
	'update'		: 'Aktualizacja',//'更新',
	'export'		: 'Eksport',//'导出',
	'repeat'		: 'Powtórz',//'平铺',
	'no_repeat'		: 'Nie powtarzaj',//'不平铺',
	'repeat_x'		: 'Powtórz poziomo',//'横向平铺',
	'repeat_y'		: 'Powtórz pionowo',//'纵向平铺',
	'no_style'		: 'Brak stylu',//'无样式',
	'solid_line'		: 'Linia ciągła',//'实线',
	'dotted_line'		: 'Linia wykropkowana',//'点线',
	'dashed_line'		: 'Linia przerywana',//'虚线',
	'link'			: 'Link',//'链接',
	'border'		: 'Obramowanie',//'边框',
	'size'			: 'Rozmiar',//'大小',
	'color'			: 'Kolor',//'颜色',
	'separate_config'	: 'Separate Config',//'分别设置',
	'right'			: 'Prawo',//'右',
	'bottom'		: 'Dół',//'下',
	'top'			: 'Góra',//'上',
	'left'			: 'Lewo',//'左',
	'margin'		: 'Margines',//'外边距',
	'padding'		: 'Padding',//'内边距',
	'bg_image'		: 'Tło obrazkowe',//'背景图片',
	'class'			: 'Designated Class',//'指定class',
	'block'			: 'Blok',//'模块',
	'frame'			: 'Okno',//'框架',
	'onclick'		: 'onClick',//'点击',
	'onmouseover'		: 'onMouseover',//'滑过',
	'switch_type'		: 'Zmień typ',//'切换类型',
	'image'			: 'Obrazek',//'图片',
	'position'		: 'Pozycja',//'位置',
	'align_left'		: 'Do lewej',//'居左',
	'align_right'		: 'Do prawej',//'居右',
	'offset'		: 'Offset',//'偏移量',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: 'Dodaj nowy tytuł',//'添加新标题',
	'delete_this_sure'	: 'Czy na pewno chcesz to usunąć? Wszelkie dane zostaną utracone.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'Wczytywanie zawartości...',//'正在加载内容...',
	'modified_import'	: 'You have made some modifications, please import it after you save it, otherwise the imported data won\'t include modification of this time.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'Łącznie ',//'共',
	'blocks'		: 'bloków',//'个模块',
	'updating_the'		: 'aktualizacja #',//'正在更新第',
	'done'			: 'postęp',//'已完成',
	'start_updating'	: 'Rozpoczęcie aktualizacji...',//'开始更新...',
	'update_block_data'	: 'Aktualizacja danych',//'更新模块数据',
	'clear_diy_sure'	: 'Are you sure to clear the current page DIY data? It can not be restored if you clear it.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'Uwaga: Nie wykryto żadnych okienek, proszę dodać jakieś.',//'提示：未找到框架，请先添加框架。',
	'apply_all_pages'	: 'Zastosuj do wszystkich stron tego typu.',//'应用于此类全部页面',
	'apply_current_page'	: 'Apply to current page',//'只应用于本页面',
	'save_temp_sure'	: 'Czy na pewno chcesz zapisać dane tymczasowe?<br />Kliknij "Wyślij", aby zapisać dane tymczasowe. Kliknij "Anuluj", aby usunąć dane tymczasowe.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'Zapisz dane tymczasowe',//'保留暂存数据',
	'revert_last_saved'	: 'Are you sure you want to revert to previous version of saved results?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'Continue to DIY with temporary data?',//'是否继续暂存数据的DIY？',
	'update_completed'	: 'Aktualizacja została zakończona.',//'已更新完成。',
	'tab_label'		: 'Tab Label',//'tab标签',
	'temp_action'		: 'Kliknij "Kontynuuj", aby wczytać dane tymczasowe do stylu.<br />Kliknij "Usuń", aby usunąć dane tymczasowe.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'Kontynuuj',//'继续',
	'block_no_rights'	: 'Przepraszamy, nie masz uprawnień, aby dodawać lub usuwać dane bloków.',//'抱歉，您没有权限添加或编辑模块',

//--------------------------------
//static/js/portal_diy_data.js
	'data_manage'		: 'Direct management of the block data',//'可直接管理模块数据',
	'quit'			: 'Wyjście',//'退出',
//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'I come from Tencent microblogging an open platform',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",


//--------------------------------
//static/js/register.js

	'username_invalid'	: 'Nazwa użytkownika zawiera niedozwolone znaki',//'用户名包含敏感字符',
	'username_short'	: 'Min. 2 znaki',//'用户名小于 3 个字符',
	'username_long'		: 'Maks. 15 znaków',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'Podane hasła nie pasują do siebie',//'两次输入的密码不一致',
	'email_invalid'		: 'Pole Email zawiera niedozwolone znaki',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'Przepisano błędny kod z obrazka',//'邀请码包含敏感字符',
	'password_fill'		: 'Proszę uzupełnić pole hasło',//'请填写密码',
	'password_again'	: 'Proszę uzupełnić pole potwierdzające hasło',//'请再次输入密码',
	'email_fill'		: 'Proszę uzupełnić pole Email',//'请输入邮箱地址',
	'length_min'		: ', minimalna długość',//', 最小长度为 '
	'chars'			: ' znaków',//' 个字符',
	'password_strength'	: 'Siła hasła: ',//'密码强度:',
	'pw_weak'		: 'Krótkie',//'弱',
	'pw_middle'		: 'W miarę',//'中',
	'pw_strong'		: 'Silne',//'强',
	'pass_short'		: 'Hasło jest za krótkie! Nie może zawierać mniej niż ',//'密码太短，不得少于 ',
	'digital'		: 'cyfr',//'数字',
	'lowercase'		: 'małych liter',//'小写字母',
	'capitals'		: 'wielkich liter',//'大写字母',
	'specials'		: 'znaków specjalnych',//'特殊符号',
	'pw_weak_info'		: 'Pole hasło musi składać się z ',//'密码太弱，密码中必须包含 ',
	'leave_blank_old_pass'	: 'Jeśli nie chcesz zmieniać hasła, pozostaw to pole puste.',//'如不需要更改密码，此处请留空',

//--------------------------------
//static/js/seditor.js
	'enter_username'	: 'Wprowadź nazwę użytkownika',//'请输用户名',
	'at_friend'		: '@użytkownik zostanie poinformowany',//'@朋友账号，就能提醒他来看帖子',

//--------------------------------
//static/js/smilies.js

//--------------------------------
//static/js/space_diy.js

	'save_js'		: 'javascript zapisany',//'javascript脚本保存后显示',
	'settings'		: 'Ustawienia',//'设置',

//---------------------------
//static/js/swfupload.js

	'attach_file'		: 'Załącznik',

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Proszę wybrać',//'请选择',
	'required_fill'		: 'Wymagane pola nie zostały uzupełnione',//'必填项目没有填写',
	'select_next_level'	: 'Proszę wybrać następny poziom',//'请选择下一级',
	'numeric_invalid'	: 'Wartość liczbowa jest nieprawidłowa',//'数字填写不正确',
	'email_invalid'		: 'Adres E-mail jest nieprawidłowy',//'邮件地址不正确',
	'text_too_long'		: 'Wartość tego pola jest zbyt długa',//'填写项目长度过长',
	'value_is_greater'	: 'Value is greater than the maximum',//'大于设置最大值',
	'value_is_less'		: 'Value is less than minimum',//'小于设置最小值',
	'enter_valid_url'	: 'Please enter correct URL address beginning with http://',//'请正确填写以http://开头的URL地址',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Przepraszamy, ten typ pliku nie jest wspierany',//'对不起，不支持上传此类文件',
	'wait_upload'		: 'Proszę czekać, trwa wysyłanie...',//'等待上传...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'You are currently using Up-to-date version of Discuz! program. Please refer to the following tips to make timely upgrades.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'Add to common operations',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: 'Mapy Google',//'google图',
	'map_insert'		: 'Wprowadź lokalizację dzięki usłudze Google map',//'插入google地图',
	'map_insert_tips'	: 'Insert Google Maps by address searching (temporarily supported only single label!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: 'The map center is changed!',//'地图中心已经改变！',
	'map_wrong_address'	: 'Błędny adres! Nie odnaleziono szukanej pozycji.',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: '' // This key MUST BE THE LAST!

};
