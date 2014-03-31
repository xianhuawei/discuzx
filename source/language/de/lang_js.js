/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	German Javascript Language variables

	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru
        German Discuz!X Translation (2010-09-20) by Coldcut - http://www.cybertipps.com
*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering:
var emaildomains = [
		'aol.com',
		'gmail.com',
		'hotmail.com',
		'yahoo.com'
		];

//--------------------------------
//static/js/common.js

var colortexts = {
	'Black'			: 'Schwarz',//'Black',//'黑色',
	'Sienna'		: 'Ocker',//'Sienna',//'赭色',
	'DarkOliveGreen'	: 'Dunkelolivgrün',//'Dark Olive Green',//'暗橄榄绿色',
	'DarkGreen'		: 'Dunkelgrün',//'Dark Green',//'暗绿色',
	'DarkSlateBlue'		: 'Graunblau',//'Dark Gray Blue',//'暗灰蓝色',
	'Navy'			: 'Marineblau',//'Navy',//'海军色',
	'Indigo'		: 'Indigo',//'靛青色',
	'DarkSlateGray'		: 'Dunkelblaugrau',//'Dark Green',//'墨绿色',
	'DarkRed'		: 'Dunkelrot',//'Dark Red',//'暗红色',
	'DarkOrange'		: 'Dunkel Orange',//'Dark Orange',//'暗桔黄色',
	'Olive'			: 'Oliv',//'橄榄色',
	'Green'			: 'Grün',//'Green',//'绿色',
	'Teal'			: 'Teal',//'水鸭色',
	'Blue'			: 'Blau',//'Blue',//'蓝色',
	'SlateGray'		: 'Kalkstein',//'Limestone',//'灰石色',
	'DimGray'		: 'Dunkelgrau',//'Dark Gray',//'暗灰色',
	'Red'			: 'Rot',//'Red',//'红色',
	'SandyBrown'		: 'Browner Sand',//'Brown Sand',//'沙褐色',
	'YellowGreen'		: 'Gelbgrün',//'Yellow Green',//'黄绿色',
	'SeaGreen'		: 'Seegrün',//'Sea Green',//'海绿色',
	'MediumTurquoise'	: 'Smaragdgrün',//'Green emerald',//'间绿宝石',
	'RoyalBlue'		: 'Königsblau',//'Royal Blue',//'皇家蓝',
	'Purple'		: 'Violet',//'Purple',//'紫色',
	'Gray'			: 'Grau',//'Gray',//'灰色',
	'Magenta'		: 'Rot-violett',//'Red Purple',//'红紫色',
	'Orange'		: 'Orange',//'Orange',//'橙色',
	'Yellow'		: 'Gelb',//'Yellow',//'黄色',
	'Lime'			: 'Limone',//'Acid Orange',//'酸橙色',
	'Cyan'			: 'Blaugrün',//'Blue Green',//'青色',
	'DeepSkyBlue'		: 'Tiefblau',//'Deep Sky Blue',//'深天蓝色',
	'DarkOrchid'		: 'Orchidee',//'Dark Purple',//'暗紫色',
	'Silver'		: 'Silber',//'Silver',//'银色',
	'Pink'			: 'Pink',//'Pink',//'粉色',
	'Wheat'			: 'Hellgelb',//'Light Yellow',//'浅黄色',
	'LemonChiffon'		: 'Zitronengelb',//'Lemon Silk',//'柠檬绸色',
	'PaleGreen'		: 'Cang-grün',//'Cang Green',//'苍绿色',
	'PaleTurquoise'		: 'Türkis',//'Cang gem Green',//'苍宝石绿',
	'LightBlue'		: 'Hellblau',//'Bright blue',//'亮蓝色',
	'Plum'			: 'Zwetschkenblau',//'Plum color',//'洋李色',
	'White'			: 'Weiß',//'White' //'白色'
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
	'restore_last_saved'	: 'Bist du sicher das du es wiederherstellen möchtest?',//'Are you sure you want to restore to last saved?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'Die Sicherheitseinstellungen deines Browsers erlauben keine automatische Cut Funktion . Verwende die Tastenkombination (Ctrl X) um dies Auszuführen.',//'Your browser security settings does not permit the editor to automatically execute the Cutting operation. Use the keyboard shortcut (Ctrl X) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'Die Sicherheitseinstellungen deines Browsers erlauben keine automatische Copy Funktion. Verwende die Tastenkombination (Ctrl C) um dies Auszuführen.',//'Your browser security settings does not permit the editor to automatically execute the Copy operation. Use the keyboard shortcut (Ctrl C) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'Die Sicherheitseinstellungen deines Browsers erlauben keine automatische Paste Funktion. Verwende die Tastenkombination (Ctrl V) um dies Auszuführen.',//'Your browser security settings does not permit the editor to automatically execute the Paste operation. Use the keyboard shortcut (Ctrl V) to complete this operation.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'Kann keine Graffiti Initialisations Daten finden',//'Can not find the Graffiti initialization data',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Unterstützt nur IE 5.01 oder Neuer',//'Supported only in IE 5.01 or later',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Raw Text bearbeiten',//'Edit Raw Text',//'编辑源码',
	'plain_text_warn'	: 'Bei der Umstellung auf den Normaltext gehen einige Formatierungen verloren!\nBist du sicher das du fortfahren möchtest?',//'Converting to the plain text will lose some formatting!\nAre you sure you want to continue?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'Dein Browser unterstützt diese Funktion nicht, bitte aktualisiere deine Browser Version',//'Your browser does not support this feature, please upgrade your browser version',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'Tipps',//'Tips',//'小提示',
//	'show_tips'		: 'Freundlich Tipps',//'Show Tips',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'Dieser Vorgang ist nur im WYSIWYG-Modus wirksam',//'This operation is effective only for WYSIWYG mode',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Andere Cloud Platform Interfacees testen',//'云平台其他接口测试',
	'int_roaming_test'	: 'Ander Roaming Interfaces testen',//'漫游其他接口测试',
	'int_qq_test'		: 'QQ Internet Interface testen',//'QQ互联接口测试',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Wähle mindestens ein Thema um den Artikel zu Pushen',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Wähle mindestens ein Element um den Artikel zu Pushen',//'请至少推送一条信息到列表区域',
	'loading'		: 'Loading...',//'加载中...',
	'push5reached'		: 'Push Beitrag hat fünf erreicht, versuche die Nummer zu storniereen und versuche es erneut.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Klicke auf der linken Seite',//'点击左侧',
	'push_to_list'		: 'Die Information wird auf die Liste gepusht',//'将信息推送到列表',
	'wait_image_upload'	: 'Bild hochladen, bitte warten...',//'图片上传中，请稍后...',






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Vorheriges Monat',//'上一月',
	'next_month'	: 'Nächstes Monat',//'下一月',
	'select_year'	: 'Auswahl Jahr',//'点击选择年份',
	'select_month'	: 'Auswahl Monath',//'点击选择月份',
	'wday0'		: 'So',//'日',
	'wday1'		: 'Mo',//'一',
	'wday2'		: 'Di',//'二',
	'wday3'		: 'Mi',//'三',
	'wday4'		: 'Do',//'四',
	'wday5'		: 'Fr',//'五',
	'wday6'		: 'Sa',//'六',
	'month'		: 'Monat',//'月',
	'today'		: 'Heute',//'今天',
	'hours'		: 'Stunden',//'点',
	'minutes'	: 'Minuten',//'分',
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'In neuem Fenster öffnen',//'在新窗口打开',
	'actual_size'		: 'Aktuelle Grösse',//'实际大小',
	'close'			: 'Schließen',//'关闭',
	'wheel_zoom'		: 'Benutze das Mausrad um das Bild zu Zoomen',//'鼠标滚轮缩放图片',
	'reminder'		: 'Erinnerung',//'提示信息',
	'submit'		: 'Speichern',//'确定',
//	'submit'		: 'Submit',//'提交',
	'cancel'		: 'Abbrechen',//'取消',
//	'cancel'		: 'Cancel',//'取消',
	'wait_please'		: 'Loading ...',//'请稍候...',
	'int_error'		: 'Interner Fehler, kann diesen Inhalt nicht darstellen',//'内部错误，无法显示此内容',
	'flash_required'	: 'Dieser Inhalt benötigt Adobe Flash Player 9.0.124 oder Neuer',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Download Flash Player',//'下载 Flash Player',
	'day1'			: '1 Tag',//'一天',
	'week1'			: '1 Woche',//'一周',
	'days7'			: '7 Tage',//'7 天',
	'days14'		: '14 Tage',//'14 天',
	'month1'		: '1 Monat',//'一个月',
	'month3'		: '3 Monate',//'三个月',
	'month6'		: '6 Monate',//'半年',
	'year1'			: '1 Jahr',//'一年',
	'custom'		: 'Custom',//'自定义',
	'permanent'		: 'Permanent',//'永久',
	'show_all_expr'		: 'Alle Smiles zeigen',//'显示所有表情',
	'page_prev'		: 'Vorherige Seite',//'上页',
	'page_next'		: 'Nächste Seite',//'下页',
	'copy2clipboard'	: 'In die Zwischenablage kopieren',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Suche Inhalt',//'请输入搜索内容',
	'refresh_q&a'		: 'Aktualisiere Q&A',//'刷新验证问答',
	'refresh_code'		: 'Aktualisiere Code',//'刷新验证码',
	'code_invalid'		: 'Falscher Sicherheitscode, bitte nochmal versuchen',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'Falsche Antwort, bitte nochmal versuchen',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'Der Code wurde in die Zwischenablage kopiert',//'代码已复制到剪贴板',
	'enter_link_url'	: 'Link URL eingeben',//'请输入链接地址',
	'enter_link_text'	: 'Link Text eingeben',//'请输入链接文字',
	'enter_image_url'	: 'Bild URL eingeben',//'请输入图片地址',
	'width_optional'	: 'Weite (optional)',//'宽(可选)',
	'height_optional'	: 'Höhe (optional)',//'高(可选)',
	'narrow_screen'		: 'Schmales Bild',//'切换到窄版',
	'wide_screen'		: 'Weites Bild',//'切换到宽版',
	'logging_wait'		: 'Logging, bitte warten...',//'登录中，请稍后...',
	'notices_no'		: '[    ]',//'【　　　】',
	'notices_yes'		: '[Neu]',//'【新提醒】',
	'sec_after_win_closed'	: ' Sekunden bevor das Fenster geschlossen wird',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' Sekunden bevor die Seite weitergeleitet wird',//' 秒后页面跳转',
	'jump_now'		: 'Gehe jetzt',//'立即跳转',
	'error_message'		: 'Fehler Meldung',//'错误信息',
	'ctrl_d_favorites'	: 'Drücke die Tasten Ctrl + D um zu den Favoriten hinzuzufügen',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'Für Nicht-IE Browser bitte Homepage manuell hinzufügen',//'非 IE 浏览器请手动将本站设为首页',
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Bearbeiten',//'编辑',
	'warn_not_saved'	: 'Du hast die Daten modifiziert. Die Daten gehen verloren wenn du jetzt beendest.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'Alle Daten gehen verloren wenn du beendest. Bist du sicher das du beenden möchtest?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'Wähle ein Foto zum hochladen',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Kopieren fehlgeschlagen, bitte wähle "Zugriff erlauben"',//'复制失败，请选择“允许访问”',
//	'permanent'		: 'Permanent',//'永久',
//	'open_new_win'		: 'Open in new window',//'在新窗口打开',
//	'actual_size'		: 'Actual Size',//'实际大小',
//	'close'			: 'Close',//'关闭',
//	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
//	'reminder'		: 'Reminder',//'提示信息',
	'prev'			: 'Zurück',//'上一张',
	'next'			: 'Weiter',//'下一张',

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'Wiederaufnahme der Editor Größe',//'恢复编辑器大小',
	'full_screen_edit'	: 'Full Screen Editor',//'全屏方式编辑',
	'current_length'	: 'Derzeitige Länge',//'当前长度',
	'bytes'			: 'Bytes',//'字节',
	'system_limit'		: 'System limit',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'Länge',//'字数检查',
	'data_restored'		: 'Daten wurden wiederhergestellt',//'数据已恢复',
	'data_saved'		: 'Daten gespeichert',//'数据已保存',
	'clear_all_sure'	: 'Bist du sicher das du den Inhalt bereinigen möchtest?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'Inhalt verstecken',//'请输入要隐藏的信息内容',
	'free_content'		: 'Wenn du nicht einen Beitrags Preis festgelegt hast, können die eingegebenen Informationen kostenlos vor dem Kauf der Inhalte angesehen werden, ',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'Nur anzeigen wenn der Benutzer auf das Thema antwortet ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Nur anzeigen wenn die Benutzerpunkte höher sind als ',//'只有当浏览者积分高于',
	'when_show'		: 'Wann zeigen',//'时才显示',
	'table_rows'		: 'Tabellenzeilen',//'表格行数',
	'table_columns'		: 'Tabellenspalten',//'表格列数',
	'table_width'		: 'Tabellenweite: ',//'表格宽度: ',
	'bg_color'		: 'Hintergrund Farbe',//'背景颜色',
	'table_intro0'		: 'Tabellentipps schreiben',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=color]&quot; Definieren Sie die Zeile Hintergrundfarbe<br />&quot;[td=Width]&quot; Definieren Sie die Spaltenbreite<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Definieren Sie die Zeile / Spalte Spannweite und Breite<br /><br />Schneller Schreibtisch Beispiel: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />Name:|Discuz!<br />Version:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Verwende &quot;|&quot; auf separaten Zeilen, wenn es ein &quot;|&quot; Zeichen in den Daten ist, ersetze es mit &quot;\\|&quot;, separate Zeilen mit &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'URL der Musikdatei eingeben',//'请输入音乐文件地址',
	'video_url'		: 'URL der Videodatei eingeben',//'请输入视频地址',
	'auto_play'		: 'Autoplay?',//'是否自动播放',
	'flash_url'		: 'Bitte die URL der Flashdatei eingeben ',//'请输入 Flash 文件地址',
	'enter_please'		: 'Bitte eingeben ',//'请输入第',
	'nth_parameter'		: '-th Parameter',//' 个参数',
	'font'			: 'Schriftart',//'字体',
	'full_screen'		: 'Vollansicht',//'全屏',
	'restore_size'		: 'Grösse wiederherstellen',//'恢复',
	'general'		: 'Genereller Modus',//'常用',
	'simple'		: 'Erweiterter Modus',//'高级',
	'bad_browser'		: 'Dein Browser unterstützt dieses Feature nicht',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'Für die automatische Speicherung hier klicken',//'点击开启自动保存',
	'autosave_enable'	: 'Automatische Speicherung aktivieren',//'开启自动保存',
	'autosave_disable'	: 'Automatische Speicherung deaktivieren',//'点击关闭自动保存',
	'autosave_enabled'	: 'Datenspeicherung aktiviert',//'数据自动保存已开启',
	'autosave_disabled'	: 'Datenspeicherung deaktiviert',//'数据自动保存已关闭',
	'data_saved_at'		: 'Daten wurden gespeichert in ',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: 'S. vor automatischer Speicherung',//'秒后保存',
	'insert_quote'		: 'Zitat eingeben',//'请输入要插入的引用',
	'insert_code'		: 'Code eingeben',//'请输入要插入的代码',
//	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址',
//	'width_optional'	: 'Width (optional)',//'宽(可选)',
//	'height_optional'	: 'Height (optional)',//'高(可选)',
	'enter_item_list'	: 'Artikelliste eingeben.\r\nLeer lassen oder abbrechen.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
//	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址',
//	'enter_link_text'	: 'Enter the link text',//'请输入链接文字',
//	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用',
	'width'			: 'Weite',//'宽',
	'height'		: 'Höhe',//'高',
	'audio_support'		: 'Unterstützt wma, mp3, ra, rm, und andere Musik Formate<br />Beispiel: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'Unterstützt für Youku, Potatoes, 56, 6, CoolVideo und andere Video Stationen und <br /> Support wmv avi rmvb mov swf flv Video Formate <br /> Beispiel: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'Unterstützte Flash Format: swf flv <br /> Beispiel: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'Inhalt von Word einfügen',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'Tasenkombination (Ctrl + V) verwenden um den Inhalt aus Word einzufügen',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'Bist du sicher das du dieses Thema aus den heissen Themen entfernen möchtest?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'Es sind ',//'有',
//	'new_reply_exists'	: ' new replies in the thread, click to view',//'条存在新回复的主题，点击查看',
	'new_reply_exists'	: 'Das Thema hat neue Antworten, klicke um sie anzusehen',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Suche im Netz',//'网页搜索',
	'search_site'	: 'Suche auf der Seite',//'站内搜索',
	'search'	: 'Suche',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Wähle ein Thema zum moderieren',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Interner Server Fehler',//'内部服务器错误',
	'upload_ok'		: 'Erfolgreich hochgeladen',//'上传成功',
	'ext_not_supported'	: 'Diese Dateiendung wird nicht unterstützt',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'Sorry, diese Dateiendung wird nicht unterstützt.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'Illegal Bild Typ',//'图片附件不合法',
	'can_not_save_attach'	: 'Anhang kann nicht gespeichert werden',//'附件文件无法保存',
	'invalid_file'		: 'Keine berechtigte Date wurde hochgeladen',//'没有合法的文件被上传',
	'illegal_operation'	: 'Illegale Operation',//'非法操作',
//	'current_length'	: 'Current Length',//'当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
//	'bytes'			: 'bytes',//'字节',
//	'check_length'		: 'Word Count',//'字数检查',
	'enter_content'		: 'Titel oder Inhalt eingeben',//'请完成标题或内容栏',
	'select_category'	: 'Wähle eine entsprechende Kategorie für das Thema',//'请选择主题对应的分类',
	'select_category_info'	: 'Wähle eine entsprechende Kategorie für die Themen-Information',//'请选择主题对应的分类信息',
	'title_long'		: 'Title Länge überschreitet die Grenze von 255 Zeichen',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'Inhalt Länge entspricht nicht den Anforderungen.\n\n',//'您的帖子长度不符合要求。\n\n',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'ignore_pending_attach'	: 'Es sind noch ausständige Anhänge vorhanden. Bist du sicher das du sie ignorieren möchtest?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'Einige Anhänge werden noch hochgeladen, Bitte warte. Das Thema wird automatisch erstellt sobald alle Anhänge hochgeladen wurden...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
//	'q&a_invalid'			: 'Wrong answer, please try again',//'验证问答错误，请重新填写',
//	'code_invalid'			: 'Wrong security code, please try again',//'验证码错误，请重新填写',
	'no_data_recover'	: 'Es können keine Daten wiederhergstellt werden!',//'没有可以恢复的数据！',
	'content_overwrite'	: 'Warnung:\nAktuelle Inhalte werden mit den gespeicherten Daten überschrieben!\nBist du sicher das du die Daten wiederherstellen möchtest?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'Hochladen beendet!',//'附件上传完成！',
	'successfull'		: 'Erfolgreich:',//'成功',
	'failed'		: 'Fehlgeschlagen:',//'失败',
	'ones'			: 'Diejenigen',//'个',
	'uploading'		: 'Uploading...',//'上传中...',
	'select_image_files'	: 'Bilddateien auswählen',//'请选择图片文件',
	'delete'		: 'Löschen',//'删除',
//	'cancel'		: 'Cancel',//'取消',
	'contains'		: 'Beinhaltet ',//'包含',
	'img_attached_num'	: 'Bilder angehängt',//'个图片附件',
	'files attached_num'	: 'Dateien angehängt',//'个附件',
	'images'		: 'Bilder',//'图片',
	'attachments'		: 'Anhänge',//'附件',
	'upload_failed'		: 'Hochladen fehlgeschlagen',//'上传失败',

	'attach_big'		: 'Anlagengröße überschreitet das zulässige Limit',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: 'Die Nutzergruppe Größe von Dateianhängen überschreitet die zulässige Grenze',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: 'Dieser Dateityp überschreitet die zulässige Grenze der Grössen von Dateianhängen',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: 'Die täglich Größe von Dateianhängen überschreitet die zulässige Grenze',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'Überprüfung der Q & A, bitte warten',//'验证问答校验中，请稍后',
	'validating_code'	: 'Überprüfung des Codes, bitte warten',//'验证码校验中，请稍后',
	'attach_type_disabled'	: 'Dieser Anhangtyp ist deaktiviert',//'附件类型被禁止',
	'attach_max'		: 'Nicht grösser als',//'不能超过',
	'vote_max_reached'	: 'Maximale Anzahl an Votes erreicht: ',//'已达到最大投票数',
	'no_remote_attach'	: 'Sorry, kein Fernanhang erlaubt',//'抱歉，暂无远程附件',
	'delete_post_sure'	: 'Bist du sicher das du diesen Beitrag löschen möchtest?',//'确定要删除该帖子吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'Bist du sicher das du diesen Beitrag als "Beste Antwort" definieren möchstest?',//'您确认要把该回复选为“最佳答案”吗？',
//	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 255 个字符的限制',
//	'content_long'		: 'The content length does not meet the requirements.\n\nCurrent Length '//'您的帖子长度不符合要求。\n\n当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'System limit',//'系统限制',
//	'up_to'			: 'to',//'到',
	'premoderated'		: 'Antworten auf diese Kategorie müssen geprüft werden. Dein Beitrag wird nach der Überprüfung angezeigt werden',//'本版回帖需要审核，您的帖子将在通过审核后显示',
//	'credit_confirm1'	: 'This costs ',//'下载积分将',
	'credit_confirm1'	: 'Download Kosten ',//'下载需要消耗',
	'credit_confirm2'	: ' Punkte, möchtest du downloaden?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'Themen Adresse wurde in die Zwischenablage kopiert',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'Zum Vergrössern anklicken',//'点击放大',
	'notify_on_reply'	: 'Antwort Benachrichtigungen erhalten',//'接收回复通知',
	'notify_on_reply_cancel'	: 'Benachrichtigungsantworten abbrechen',//'取消回复通知',
	'share_connection_failed'	: 'Teilen fehlgeschlagen, bitte später nochmal versuchen',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Bitte binde deinen QQ Account',//'请先绑定QQ账号',
	'quote_by'		: 'Zitat von .*? in .*? Code',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'		: 'Code kopieren',//'复制代码',

//--------------------------------
//static/js/home.js
	'day'			: 'Tag',//'日',
	'category_empty'	: 'Kategorie Name darf nicht leer sein!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Close',//'关闭',
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Titel Länge (sollte 1~80 Zeichen haben) erfüllt nicht die Anforderungen',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Original Bild in neuem Fenster anzeigen',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: 'Bist du sciher das du fortfahren möchtest?',//'您确定要执行本操作吗？',
	'select_item'		: 'Bitte wähle ein Element aus',//'请选择要操作的对象',
	'image_url_invalid'	: 'Falsche Bild URL',//'图片地址不正确',
	'audio_url_invalid'	: 'Falsche Audio URL, darf nicht leer sein',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'Zusammenziehen',//'收起',
	'expand'		: 'Erweitert',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'Du kannst auswählen bis zu',//'最多只允许选择',
	'users'			: 'Benutzer',//'个用户',
	'allready_exists'	: 'Existiert bereits',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'Ihr seid nun Freunde und könnt ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'Hinterlasse eine Nachricht',//'给TA留言',
	'or'			: 'oder',//'或者',
	'send_greeting'		: 'sende Grüsse',//'打个招呼',
//	'collapse'			: 'Collapse',//'收起',
	'reply'			: 'Antwort',//'回复',
	'comment'		: 'Kommentar',//'评论',
	'close_list'		: 'Liste schließen',//'收起列表',
	'more_feeds'		: 'Mehr Feeds',//'更多动态',
//	'day'			: 'Day',//'日',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Sorry, Bilder mit einer solchen Erweiterung werden nicht unterstützt',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'Klicke hier, um den Inhalt auf der aktuellen Cursor-Position einzufügen',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'Eingeben',//'插入',
//	'delete'		: 'Delete',//'删除',
	'image_description'	: 'Bild Beschreibung',//'图片描述',
//	'upload_ok'		: 'Uploaded Successfully',//'上传成功',
//	'upload_failed'		: 'Upload Failed',//'上传失败',
	'uploading_wait'	: 'Uploading, Bitte warten',//'上传中，请等待',
	'retry'			: 'Wiederholen',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'Bist du sicher das du diese Daten löschen möchtest?',//'您确定要删除该数据吗？',
	'ignore_sure'		: 'Bist du sicher das du diese Daten ignorieren möchtest?',//'您确定要屏蔽该数据吗？',
	'to'			: 'to',//'到',

	'choose_block'		: 'Wähle Block',//'选择模块',
	'blocks_found1'		: 'Gefunden',//'找到',
	'blocks_found2'		: 'Entsprechende Blöcke',//'个相应的模块',
	'blocks_not_found'	: 'Keine entsprechenden Blöcke',//'没有相应的模块',
	'select_block'		: 'Bitte Block auswählen!',//'请选择一个模块！',
	'show_settings'		: 'Einstellung zeigen',//'展开设置项',
	'hide_settings'		: 'Einstellung verstecken',//'收起设置项',
	'block_name_empty'	: 'Block Name darf nicht leer sein',//'模块标识不能为空',
	'block_convert_sure'	: 'Bist du sicher das du diesen Block zuu diesem Typ konvertieren möchtest',//'你确定要转换模块的类型从',
	'back'			: 'Zurück',//'返回',
	'settings_expand'	: 'Einstellung erweitern',//'展开设置项',
	'settings_hide'		: 'Einstellung verstecken',//'收起设置项',
	'custom_content_error'	: 'Inhalt Fehler! HTML Code: ',//'自定义内容错误，',
	'html_error'		: 'HTML Code: ',//'HTML代码：',
	'tags_not_match'	: ' - Tags stimmen nicht überein',//' 标签不匹配',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Wähle ein Style',//'选择样式',
	'style'			: 'Style',//'样式',
	'style1'		: 'Style1',//'样式1',
	'style2'		: 'Style2',//'样式2',
	'style3'		: 'Style3',//'样式3',
	'style4'		: 'Style4',//'样式4',
	'style5'		: 'Style5',//'样式5',
	'style6'		: 'Style6',//'样式6',
	'style7'		: 'Style7',//'样式7',
	'no_border'		: 'Kein Rahmen Frame',//'无边框框架',
	'no_border_no_margin'	: 'Keine Rahmen, kein Rand',//'无边框且无边距',

//	'choose_style'		: 'Choose a Style',//'选择样式',
	'title'			: 'Titel',//'标题',
//	'delete'		: 'Delete',//'删除',
	'attribute'		: 'Attribute',//'属性',
	'data'			: 'Daten',//'数据',
	'update'		: 'Update',//'更新',
	'export'		: 'Export',//'导出',
	'repeat'		: 'Wiederholen',//'平铺',
	'no_repeat'		: 'Keine Wiederholung',//'不平铺',
	'repeat_x'		: 'Horizontale wiederholen',//'横向平铺',
	'repeat_y'		: 'Vertikale wiederholen',//'纵向平铺',
	'no_style'		: 'Kein Style',//'无样式',
	'solid_line'		: 'Durchgehende Linie',//'实线',
	'dotted_line'		: 'Gepunktete Linie',//'点线',
	'dashed_line'		: 'Gestrichelte Linie',//'虚线',
//	'font'			: 'Font',//'字体',
	'link'			: 'Link',//'链接',
	'border'		: 'Rahmen',//'边框',
	'size'			: 'Grösse',//'大小',
	'color'			: 'Farbe',//'颜色',
	'separate_config'	: 'Separate Konfiguration',//'分别设置',
	'right'			: 'Rechts',//'右',
	'bottom'		: 'Unten',//'下',
	'top'			: 'Top',//'上',
	'left'			: 'Links',//'左',
	'margin'		: 'Grenze',//'外边距',
	'padding'		: 'Padding',//'内边距',
//	'background_color'	: 'Background Color',//'背景颜色',
	'bg_image'		: 'Hintergrund Bild',//'背景图片',
	'class'			: 'Bezeichnete Klasse',//'指定class',
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
	'switch_type'		: 'Schalter des Typs',//'切换类型',
//	'title'			: 'Title',//'标题',
//	'link'			: 'Link',//'链接',
	'image'			: 'Bild',//'图片',
	'position'		: 'Position',//'位置',
	'align_left'		: 'Linksbündig',//'居左',
	'align_right'		: 'Rechtsbündig',//'居右',
	'offset'		: 'Offset',//'偏移量',
//	'font'			: 'Font',//'字体',
//	'size'			: 'Size',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: 'Neuen Titel hinzufügen',//'添加新标题',
//	'edit'			: 'Edit',//'编辑',
//	'title'			: 'Title',//'标题',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
	'delete_this_sure'	: 'Bist du sicher das du es löschen möchtest? Es kann nicht mehr wiederhergestellt werden.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'Inhalt ladet...',//'正在加载内容...',
	'modified_import'	: 'Du hast einige Modifikationen vorgenommen, bitte importiere sie nachdem sie gespeichert sind, ansonsten erhalten die importierten Daten keine Änderung.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'Insgesammt ',//'共',
	'blocks'		: 'Blöcke',//'个模块',
	'updating_the'		: 'updating #',//'正在更新第',
//	'ones'			: 'ones',//'个',
	'done'			: 'Fertig',//'已完成',
	'start_updating'	: 'Start Updating...',//'开始更新...',
	'update_block_data'	: 'Blockdaten updaten',//'更新模块数据',
	'clear_diy_sure'	: 'Bist du sicher das du die DIY Daten bereinigen möchtest? Es kann nicht mehr wiederhergestellt werden.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'Warnung: Frame wurde nicht gefunden. Bitte Frame hinzufügen.',//'提示：未找到框架，请先添加框架。',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'Auf allen Seiten anwenden',//'应用于此类全部页面',
	'apply_current_page'	: 'Auf dieser Seite anwenden',//'只应用于本页面',
	'save_temp_sure'	: 'Temporäre Daten speichern?<br />Klicke auf Speichern um die Daten zu speichern, klicke auf Abbrechen um die temporären Daten zu löschen.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'Temporäre Daten speichern',//'保留暂存数据',
	'revert_last_saved'	: 'Bist du sicher das du die zuvor erstellten Ergebnisse speichern möchtest?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'Fortsetzen mit DIY mit den temporären Daten?',//'是否继续暂存数据的DIY？',
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'Updating ist Komplett.',//'已更新完成。',
	'tab_label'		: 'Tab Label',//'tab标签',
	'temp_action'		: 'Klick auf den "Fortsetzen" Button um die temporären Daten zu übernehmen,<br />Klicke den "Löschen" Button um die temporären Daten zu löschen.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'Fortsetzen',//'继续',

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'Ich komme aus der Tencent Microblogging offenen Plattform',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'Benutzername enthält ungültige Zeichen',//'用户名包含敏感字符',
	'username_short'	: 'Benutzername ist kürzer als 2 Zeichen',//'用户名小于 3 个字符',
	'username_long'		: 'Benutzername ist länger als 15 Zeichen',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'Die beiden Passworte stimmen nicht überein',//'两次输入的密码不一致',
	'email_invalid'		: 'E-Mail enthält ungültige Zeichen',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'Einladungs-Code enthält ungültige Zeichen',//'邀请码包含敏感字符',
	'password_fill'		: 'Bitte Passwort eingeben',//'请填写密码',
	'password_again'	: 'Bitte Passwort nochmal eingeben',//'请再次输入密码',
	'email_fill'		: 'Bitte E-Mail Adresse eingeben',//'请输入邮箱地址',

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Bitte auswählen',//'请选择',
	'required_fill'		: 'Benötigte Felder wurden nicht ausgefüllt',//'必填项目没有填写',
	'select_next_level'	: 'Nächsten Level auswählen',//'请选择下一级',
	'numeric_invalid'	: 'Numerischer Wert ist ungültig',//'数字填写不正确',
	'email_invalid'		: 'E-mail Adresse ist ungültig',//'邮件地址不正确',
	'text_too_long'		: 'Feldwert ist zu lang',//'填写项目长度过长',
	'value_is_greater'	: 'Wert ist größer als das erlaubte Maximum',//'大于设置最大值',
	'value_is_less'		: 'Wert ist kleiner als das erlaubte Minimum',//'小于设置最小值',
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Delete',//'删除',
//	'attribute'		: 'Attribute',//'属性',
	'save_js'		: 'Nach der Ansicht Javascript speichern',//'javascript脚本保存后显示',
	'settings'		: 'Einstellungen',//'设置',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Sorry, dieser Dateityp wird nicht unterstützt',//'对不起，不支持上传此类文件',
//	'uploading'		: 'Uploading...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'Du verwendest zur Zeit die Up-to-date Version von Discuz!. Bitte beachte die folgenden Tipps, um rechtzeitig Upgrades machen.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'In gemeinsame Operationen hinzufügen',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: 'Google Maps',//'google图',
	'map_insert'		: 'Google Map eingeben',//'插入google地图',
	'map_insert_tips'	: 'Google Maps für Adressen Suche (vorübergehend nur Einzellne unterstützt!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: 'Das Maps Center wurde geändert!',//'地图中心已经改变！',
	'map_wrong_address'	: 'Falsche Adresse! Adresse wurde nicht gefunden',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: ''

};
