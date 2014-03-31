/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables
    Traduction par André13 discuz-fr.fr -28.déc.2011- modeur Bertrand
	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru

*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering: // Domaines de messagerie proposés pour inscription:
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
	'Black'			: 'Noir',//'黑色', // 'Black'
	'Sienna'		: 'Terre de Sienne',//'赭色', // 'Sienna'
	'DarkOliveGreen'	: 'Olive verte foncé',//'暗橄榄绿色', //  'Dark Olive Green'
	'DarkGreen'		: 'Vert Foncé',//'暗绿色', // 'Dark Green'
	'DarkSlateBlue'		: 'Gris foncé Bleu',//'暗灰蓝色', // 'Dark Gray Blue'
	'Navy'			: 'Marine',//'海军色', // 'Navy'
	'Indigo'		: 'Bleu indigo',//'靛青色', // 'Indigo'
	'DarkSlateGray'		: 'Vert Foncé',//'墨绿色', //  'Dark Green'
	'DarkRed'		: 'Rouge Foncé',//'暗红色', // 'Dark Red'
	'DarkOrange'		: 'Orange Foncé',//'暗桔黄色', // 'Dark Orange'
	'Olive'			: 'Olive',//'橄榄色', // 'Olive'
	'Green'			: 'Vert',//'绿色', // 'Green'
	'Teal'			: 'Sarcelle',//'水鸭色', // 'Teal'
	'Blue'			: 'Bleu',//'蓝色', // 'Blue'
	'SlateGray'		: 'Calcaires',//'灰石色', //  'Limestone'
	'DimGray'		: 'Gris Foncé',//'暗灰色', // 'Dark Gray'
	'Red'			: 'Rouge',//'红色', // 'Red'
	'SandyBrown'		: 'Sable Marron',//'沙褐色', // 'Brown Sand'
	'YellowGreen'		: 'Jaune Vert',//'黄绿色', // 'Yellow Green'
	'SeaGreen'		: 'Mer Verte',//'海绿色', // 'Sea Green'
	'MediumTurquoise'	: 'Vert émeraude',//'间绿宝石', // 'Green emerald'
	'RoyalBlue'		: 'Bleu royal',//'皇家蓝', // 'Royal Blue'
	'Purple'		: 'Violet',//'紫色', // 'Purple'
	'Gray'			: 'Gris',//'灰色', // 'Gray'
	'Magenta'		: 'Rouge Pourpre',//'红紫色', // 'Red Purple'
	'Orange'		: 'Orange',//'橙色', // 'Orange'
	'Yellow'		: 'Jaune',//'黄色', //  'Yellow'
	'Lime'			: 'Orange Acide',//'酸橙色', // 'Acid Orange'
	'Cyan'			: 'Bleu Vert',//'青色', // 'Blue Green'
	'DeepSkyBlue'		: 'Ciel bleu profond',//'深天蓝色', // 'Deep Sky Blue'
	'DarkOrchid'		: 'Violet Foncé',//'暗紫色', // 'Dark Purple'
	'Silver'		: 'Argent',//'银色', // 'Silver'
	'Pink'			: 'Rose',//'粉色', // 'Pink'
	'Wheat'			: 'Jaune Clair',//'浅黄色', // 'Light Yellow'
	'LemonChiffon'		: 'Soie Citron',//'柠檬绸色', // 'Lemon Silk'
	'PaleGreen'		: 'Cang vert',//'苍绿色', // 'Cang Green'
	'PaleTurquoise'		: 'Cang joyau vert',//'苍宝石绿', //  'Cang gem Green'
	'LightBlue'		: 'Bleu vif',//'亮蓝色', //  'Bright blue'
	'Plum'			: 'Couleur Prune',//'洋李色', // 'Plum color'
	'White'			: 'Blanc' //'白色' // 'White'
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
	'restore_last_saved'	: 'Etes-vous sûr de vouloir restaurer la dernière sauvegarde?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'Vos paramètres de sécurité du navigateur ne permet pas l\'éditeur d\'exécuter automatiquement l\'opération de découpage. Utilisez le raccourci clavier (Ctrl X) pour terminer cette opération.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'Vos paramètres de sécurité du navigateur ne permet pas l\'éditeur d\'exécuter automatiquement l\'opération de copie. Utilisez le raccourci clavier (Ctrl C) pour terminer cette opération.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'Vos paramètres de sécurité du navigateur ne permet pas l\'éditeur d\'exécuter automatiquement l\'opération de collage. Utilisez le raccourci clavier (Ctrl + V) pour terminer cette opération.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'Impossible de trouver des données d\'initialisation Graffiti',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Pris en charge uniquement dans IE 5.01 ou version ultérieure',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Modifier le texte brut',//'编辑源码', // 'Edit Raw Text'
	'plain_text_warn'	: 'Conversion en texte clair perdra un peu de formatage!\nEtes-vous sûr de vouloir continuer?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？', // 'Converting to the plain text will lose some formatting!\nAre you sure you want to continue?'
	'browser_update'	: 'Votre navigateur ne supporte pas cette fonction, Svp. mettre à jour votre version du navigateur',//'你的浏览器不支持此功能，请升级浏览器版本', // 'Your browser does not support this feature, please upgrade your browser version'
	'tips'			: 'Conseils',//'小提示', // 'Tips'
//	'show_tips'		: 'Show Tips',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'Cette opération est effective uniquement pour le mode WYSIWYG',//'本操作只在多媒体编辑模式下才有效', // 'This operation is effective only for WYSIWYG mode'

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Test autres interfaces de la plateforme de nuages',//'云平台其他接口测试', // 'Testing other cloud platform interface'
	'int_roaming_test'	: 'Test autres interfaces itinérants',//'漫游其他接口测试', // 'Testing other Roaming interface'
	'int_qq_test'		: 'Test QQ Interface Internet',//'QQ互联接口测试', //  'Testing QQ Internet interface'

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Choisissez au moins un sujet pour pousser aux articles',//'请至少推送一条头条主题和一条列表主题', // 'Select at least one topic for push to Articles'
	'select_item_to_push'	: 'Choisissez au moins un article pour le pousser aux articles',//'请至少推送一条信息到列表区域', // 'Select at least one item for push to Articles'
	'loading'		: 'Chargement...',//'加载中...', // 'Loading...'
	'push5reached'		: 'Appuyez au post plus de cinq fois et a atteint un certains nombres de fois, dans le droit de résilier un nombres et essayez à nouveau.',//'推送帖子已达到5条，请在右侧取消一些再重试。', // 'Push Post number has reached five, in the right to cancel a number and try again.' // Appuyez le Post est a atteint 5 fois, dans le droit de supprimer certains et essayez à nouveau.
	'click_left'		: 'Cliquez à gauche',//'点击左侧', // 'Click on the left'
	'push_to_list'		: 'Va pousser les informations vers la liste',//'将信息推送到列表', // 'Will push the information to the list'
	'wait_image_upload'	: 'Téléchargement Image, Svp. attendre...',//'图片上传中，请稍后...', //  'Upload image, please wait...'






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Mois Préc.',//'上一月', // 'Prev Month'
	'next_month'	: 'Mois Suiv.',//'下一月', // 'Next Month'
	'select_year'	: 'Choisir Année',//'点击选择年份', // 'Select Year'
	'select_month'	: 'Choisir Mois',//'点击选择月份', //  'Select Month'
	'wday0'		: 'Di',//'日', //  'Su'
	'wday1'		: 'Lu',//'一', // 'Mo'
	'wday2'		: 'Ma',//'二', // 'Tu'
	'wday3'		: 'Me',//'三', // 'We'
	'wday4'		: 'Je',//'四', // 'Th'
	'wday5'		: 'Ve',//'五', // 'Fr'
	'wday6'		: 'Sa',//'六', // 'Sa'
	'month'		: 'Mois',//'月', // 'Month'
	'today'		: 'Aujourd\'hui',//'今天', // 'Today'
	'hours'		: 'Heures',//'点', // 'Hours'
	'minutes'	: 'Minutes',//'分', // 'Minutes'
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'Ovrir dans un New Fenêtre',//'在新窗口打开', // 'Open in new window'
	'actual_size'		: 'Taille Actuelle',//'实际大小', // 'Actual Size'
	'close'			: 'Fermer',//'关闭', // 'Close'
	'wheel_zoom'		: 'Utilisez la molette de la souris pour Zoomer/Dézoomer l\'image',//'鼠标滚轮缩放图片', // 'Use mouse wheel to zoom in/out the image'
	'reminder'		: 'Rappel',//'提示信息', // 'Reminder'
	'submit'		: 'Envoyer',//'确定', // 'Submit'
//	'submit'		: 'Submit',//'提交',
	'cancel'		: 'Annuler',//'取消', // 'Cancel'
//	'cancel'		: 'Cancel',//'取消',
	'wait_please'		: 'Chargement ...',//'请稍候...',
	'int_error'		: 'Erreur interne, ne peut pas afficher ce contenu',//'内部错误，无法显示此内容', // 'Internal Error, can not display this content'
	'flash_required'	: 'Ce contenu requiert Adobe Flash Player 9.0.124 ou ultérieure',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本', // 'This content requires Adobe Flash Player 9.0.124 or later'
	'flash_download'	: 'Télécharger Flash Player',//'下载 Flash Player', // 'Download Flash Player'
	'day1'			: '1 Jour',//'一天', // '1 Day'
	'week1'			: '1 Semaine',//'一周', // '1 Week'
	'days7'			: '7 Jours',//'7 天', // '7 Days'
	'days14'		: '14 Jours',//'14 天', // '14 Days'
	'month1'		: '1 Mois',//'一个月', // '1 Month'
	'month3'		: '3 Mois',//'三个月', // '3 Months'
	'month6'		: '6 Mois',//'半年', // '6 Months'
	'year1'			: '1 Année',//'一年', // '1 Year'
	'custom'		: 'Personnalisé',//'自定义', //  'Custom'
	'permanent'		: 'Permanent',//'永久', // 'Permanent'
	'show_all_expr'		: 'Voir tous les Smileys',//'显示所有表情', // 'Show all smiles'
	'page_prev'		: 'Page Préc.',//'上页', // 'Prev Page'
	'page_next'		: 'Page Suiv.',//'下页', // 'Next Page'
	'copy2clipboard'	: 'Copiez au presse papier',//'点此复制到剪贴板', // 'Copy to clipboard'
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Entrez les mots recherchés',//'请输入搜索内容', //  'Enter search words'
	'refresh_q&a'		: 'Actualiser Q&R',//'刷新验证问答', //  'Refresh Q&A'
	'refresh_code'		: 'Actualiser Code',//'刷新验证码', // 'Refresh Code'
	'code_invalid'		: 'Code de sécurité incorrect, Svp. essayez de nouveau',//'验证码错误，请重新填写', //  'Wrong security code, please try again'
	'q&a_invalid'		: 'Mauvaise réponse, Svp. essayez de nouveau',//'验证问答错误，请重新填写', // 'Wrong answer, please try again'
	'code_clipboard'	: 'Le code a été copié dans le presse papier',//'代码已复制到剪贴板', // 'The code was copied to clipboard'
	'enter_link_url'	: 'Entrez le lien URL',//'请输入链接地址', // 'Enter the link URL'
	'enter_link_text'	: 'Entrez le lien Texte',//'请输入链接文字', //  'Enter the link text'
	'enter_image_url'	: 'Entrez URL image',//'请输入图片地址', // 'Enter the image URL'
	'width_optional'	: 'Largeur (optionnel)',//'宽(可选)', // 'Width (optional)'
	'height_optional'	: 'Hauteur (optionnel)',//'高(可选)', // 'Height (optional)'
	'narrow_screen'		: 'Petit Ecran',//'切换到窄版', //  'Narrow screen'
	'wide_screen'		: 'Grand Ecran',//'切换到宽版', // 'Wide screen'
	'logging_wait'		: 'Connexion en cours,Svp. Merci de patienter...',//'登录中，请稍后...', // 'Logging in, please wait...'
	'notices_no'		: '[　　　]',//'【　　　】',
	'notices_yes'		: '[Nouveau]',//'【新提醒】',
	'sec_after_win_closed'	: ' secondes avant que la fenêtre ne se ferme',//' 秒后窗口关闭', // ' seconds before the window closed'
	'sec_after_page_jump'	: ' secondes avant que la page ne se redirige',//' 秒后页面跳转', // ' seconds before the page redirect'
	'jump_now'		: 'Sauter dessuite',//'立即跳转', // 'Jump Now'
	'error_message'		: 'Message Erreur',//'错误信息', // 'Error Message'
	'ctrl_d_favorites'	: 'Pressez Ctrl + D touches pour ajouter aux favoris',//'请按 Ctrl+D 键添加到收藏夹', // 'Press Ctrl + D keys for add to Favorites'
	'non_ie_manually'	: 'Pour les non-IE navigateur Svp. Accueil réglée manuellement',//'非 IE 浏览器请手动将本站设为首页', // 'For non-IE browser please set Homepage manually'
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Modifier',//'编辑', // 'Edit'
	'warn_not_saved'	: 'Vous avez modifié les données. Si vous quittez, toutes les modifications seront perdues.',//'您的数据已经修改,退出将无法保存您的修改。', // 'You have modified the data. If you exit, all the changes will be lost.'
	'confirm_exit'		: 'Toutes les modifications seront perdues si vous quittez. Etes-vous sûr de vouloir quitter maintenant?',//'退出将不会保存您刚才的设置。是否确认退出？', // 'All the changes will be lost if you exit. Are you sure you want to exit now?'
	'select_image_upload'	: 'Choisissez une image à télécharger',//'请选择您要上传的图片', // 'Select an image to upload'

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Copie échoué, Svp. choisissez "Autoriser Accès"',//'复制失败，请选择“允许访问”', // 'Copy failed, please select "Allow access"'
//	'permanent'		: 'Permanent',//'永久',
//	'open_new_win'		: 'Open in new window',//'在新窗口打开',
//	'actual_size'		: 'Actual Size',//'实际大小',
//	'close'			: 'Close',//'关闭',
//	'wheel_zoom'		: 'Use mouse wheel to zoom in/out the image',//'鼠标滚轮缩放图片',
//	'reminder'		: 'Reminder',//'提示信息',
	'prev'			: 'Préc.',//'上一张', // 'Prev.'
	'next'			: 'Suiv.',//'下一张', // 'Next'

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'Reprise Taille Editeur',//'恢复编辑器大小', // 'Resume editor size'
	'full_screen_edit'	: 'Editeur en plein écran',//'全屏方式编辑', // 'Full Screen Editor'
	'current_length'	: 'Longueur Actuelle',//'当前长度', // 'Current Length'
	'bytes'			: 'octets',//'字节', // 'bytes'
	'system_limit'		: 'Limite Système',//'系统限制', // 'System limit'
	'up_to'			: '~',//'到', // '~'
	'check_length'		: 'Comptez longueur',//'字数检查', // 'Length Count'
	'data_restored'		: 'Données ont été Restaurées',//'数据已恢复', // 'The Data was restored'
	'data_saved'		: 'Données Sauvées',//'数据已保存', // 'Data saved'
	'clear_all_sure'	: 'Etes-vous sûr de vouloir effacer tout le contenu?',//'您确认要清除所有内容吗？', //  'Are you sure to clear all the contents?'
	'hide_content'		: 'Cacher le contenu',//'请输入要隐藏的信息内容',
	'free_content'		: 'Si vous ne fixer pas un prix au post, les informations saisies peuvent être vus gratuitement avant de pouvoir acheter le contenu,',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容', // If you did not set a post price, the entered information can be seen free of charge before purchasing the content
	'when_thread_replied'	: 'Voir que si l\'utilisateur Répond au Sujet ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Voir que lorsque l\'utilisateur à des points qui sont supérieure ',//'只有当浏览者积分高于', //  'Show only when the user points is more than '
	'when_show'		: 'Si montrer',//'时才显示', // 'When to show'
	'table_rows'		: 'Lignes du Tableau',//'表格行数', // 'Table Rows'
	'table_columns'		: 'Colonnes du Tableau',//'表格列数', // 'Table Columns'
	'table_width'		: 'Largeur du Tableau: ',//'表格宽度: ', //  'Table Width: '
	'bg_color'		: 'Couleur de Fond',//'背景颜色', // 'Background Color'
	'table_intro0'		: 'Conseils rapides tableau d\'écriture',//'快速书写表格提示', // 'Quick write table tips'
	'table_intro1'		: '&quot;[tr=color]&quot; Définir la couleur de fond de la ligne<br />&quot;[td=Width]&quot; Définir la largeur des colonnes<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Définir la Ligne/Portée Colonne et Largeur<br /><br />Exemple de Tableau écrit Rapidement : ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：', // '&quot;[tr=color]&quot; Define the row background color<br />&quot;[td=Width]&quot; Define the column width<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Define the Row/Column Span and Width<br /><br />Fast writing table example: '
	'table_intro2'		: '[table]<br />Nom:|Discuz!<br />Version:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Utilisez &quot;|&quot; pour séparer les lignes, s\'il y a des &quot;|&quot; caractères dans les données, le remplacer par &quot;\\|&quot;, rangées séparées avec &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。', // 'Use &quot;|&quot; to separate rows, if there is the &quot;|&quot; character in the data, replace it with &quot;\\|&quot;, separate rows with &quot;\\n&quot;.'
	'audio_url'		: 'URL entrée de fichier de musique',//'请输入音乐文件地址', // 'Input URL of music file'
	'video_url'		: 'URL Entrée de fichier vidéo',//'请输入视频地址', // 'Input URL of video file'
	'auto_play'		: 'Lecture Automatique?',//'是否自动播放', // 'Autoplay?'
	'flash_url'		: 'Svp. URL entrée du fichier Flash ',//'请输入 Flash 文件地址', // 'Please input URL of Flash file '
	'enter_please'		: 'Svp. entrez la',//'请输入第', // 'Please enter the'
	'nth_parameter'		: '-th paramètre',//' 个参数', // '-th parameter'
	'font'			: 'Font',//'字体', // 'Font'
	'full_screen'		: 'Plein écran',//'全屏', // 'Full Screen'
	'restore_size'		: 'Restaurer la taille',//'恢复', // 'Restore size'
	'general'		: 'Mode Général',//'常用', // 'General Mode'
	'simple'		: 'Mode Avancé',//'高级', // 'Advanced Mode'
	'bad_browser'		: 'Votre navigateur ne supporte pas cette fonction',//'你的浏览器不支持此功能', // 'Your browser does not support this feature'
	'click_autosave_enable'	: 'Cliquez ici pour activer la sauvegarde automatique',//'点击开启自动保存', // 'Click here for enable the auto-saving'
	'autosave_enable'	: 'Activer la sauvegarde automatique',//'开启自动保存', // 'Enable the auto-saving'
	'autosave_disable'	: 'Désactiver la sauvegarde automatique',//'点击关闭自动保存', // 'Disable the auto-saving'
	'autosave_enabled'	: 'Les Données de sauvegarde automatique Activé',//'数据自动保存已开启', // 'Data auto-saving enabled'
	'autosave_disabled'	: 'Les Données de sauvegarde automatique Désactivé',//'数据自动保存已关闭', // 'Data auto-saving disabled'
	'data_saved_at'		: 'Les données enregistrées en',//'数据已于', // 'Data saved at'
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存', // 
	'sec_before_saving'	: 's avant que la sauvegarde automatique',//'秒后保存', // 
	'insert_quote'		: 'Insérez la Citation',//'请输入要插入的引用', // 
	'insert_code'		: 'Insérez le Code',//'请输入要插入的代码', // 'Insert the Code'
//	'enter_image_url'	: 'Enter the image URL',//'请输入图片地址', // 
//	'width_optional'	: 'Width (optional)',//'宽(可选)', // 
//	'height_optional'	: 'Height (optional)',//'高(可选)', // 
	'enter_item_list'	: 'Entrez la liste des articles.\r\nLaissez vide, ou cliquez sur Annuler.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.', //    ....... // Leave blank, or click Cancel
//	'enter_link_url'	: 'Enter the link URL',//'请输入链接地址', // 
//	'enter_link_text'	: 'Enter the link text',//'请输入链接文字', // 
//	'insert_quote'		: 'Insert the Quote',//'请输入要插入的引用', // 
	'width'			: 'Largeur',//'宽', //  'Width'
	'height'		: 'Hauteur',//'高', // 'Height'
	'audio_support'		: 'Pris en charge wma, mp3, ra, rm, et autres formats de musique<br />Exemple: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma', // 
	'video_support'		: 'Pris en charge pour Youku, potatoes, 56, 6, vidéo cool et des stations d\'autres vidéos en <br /> soutien wmv avi rmvb mov swf flv formats vidéo <br /> Exemple: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv', // 'Supported for Youku, potatoes, 56, 6, cool video and other video stations at <br /> support wmv avi rmvb mov swf flv video formats <br /> Example: http://server/movie.wmv'
	'flash_support'		: 'Pris en charge Flash formats: swf flv <br /> Example: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf', // 'Supported Flash formats: swf flv <br /> Example: http://server/flash.swf'
	'paste_from_word'	: 'Coller un contenu à partir de Word',//'从 Word 粘贴内容', //  'Paste a content from Word'
	'paste_word_tip'	: 'Svp. utiliser le raccourci (Ctrl + V) pour coller le contenu du document Word',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上', // 'Please use shortcut (Ctrl + V) to paste the content from Word document'
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: 'Etes-vous sûr de vouloir supprimer ce fil de discussions HOTs?',//'您确认要把此主题从热点主题中移除么？', // 'Are you sure you want to remove this thread from hot threads?'
	'there_are'		: 'Il y a ',//'有', // 'There are '
//	'new_reply_exists'	: ' new replies in the thread, click to view',//'条存在新回复的主题，点击查看', // 
	'new_reply_exists'	: 'Le sujet a de Nouvelles réponses, cliquez sur Afficher',//'有新回复的主题，点击查看', // 'The thread has new replies, click on View'
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Recherche sur le Net',//'网页搜索', //  'Search in the Net'
	'search_site'	: 'Recherche sur le Site',//'站内搜索', // 'Search in the site'
	'search'	: 'RechercheR',//'搜索', // 'search'

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Choisir le fil du sujet à modéré',//'请选择需要操作的帖子', //  'Choose the thread to moderate'

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Erreur Interne du Serveur',//'内部服务器错误', // 'Internal Server Error'
	'upload_ok'		: 'Transféré avec Succès',//'上传成功', // 'Uploaded Successfully'
	'ext_not_supported'	: 'Cette extension de fichier n\'est pas supporté',//'不支持此类扩展名', // 'This file extension is not supported'
	'sorry_ext_not_supported'	: 'Désolé, l\'extension du fichier n\'est pas pris en charge.',//'对不起，不支持上传此类扩展名的附件。', // 
	'illegal_image_type'	: 'Type Image Illégale',//'图片附件不合法', // 'Illegal image type'
	'can_not_save_attach'	: 'Impossible de sauvegarder le fichier en Pièce jointe',//'附件文件无法保存', // 'Can not save Attachment file'
	'invalid_file'		: 'Aucun fichier légitime a été téléchargé',//'没有合法的文件被上传', // 'No legitimate file was uploaded'
	'illegal_operation'	: 'Opération Illégale',//'非法操作', // 'Illegal Operation'
//	'current_length'	: 'Current Length',//'当前长度', // 
//	'bytes'			: 'bytes',//'字节', // 
//	'system_limit'		: 'System limit',//'系统限制', // 
//	'up_to'			: 'to',//'到', // 
//	'bytes'			: 'bytes',//'字节', // 
//	'check_length'		: 'Word Count',//'字数检查', // 
	'enter_content'		: 'Entrez le titre ou le contenu',//'请完成标题或内容栏', // 'Enter the title or content'
	'select_category'	: 'Choisissez une catégorie correspondante pour le Sujet',//'请选择主题对应的分类', // 'Select a corresponding category for the thread'
	'select_category_info'	: 'Choisissez une catégorie correspondant à l\'information sur le sujet',//'请选择主题对应的分类信息', // 'Select a corresponding category for the thread information'
	'title_long'		: 'Titre en longueur dépasse la limite de 255 caractères',//'您的标题超过 80 个字符的限制', // 'Title length exceeds the limit of 255 characters'
	'content_long'		: 'La longueur du contenu ne répond pas aux exigences.\n\n',//'您的帖子长度不符合要求。\n\n', //  'The content length does not meet the requirements.\n\n'
//	'bytes'			: 'bytes',//'字节', // 
//	'system_limit'		: 'System limit',//'系统限制', // 
//	'up_to'			: 'to',//'到', // 
	'ignore_pending_attach'	: 'Il y a des pièces jointes en attente, vous êtes sûr de vouloir ignorer?',//'您有等待上传的附件，确认不上传这些附件吗？', // 'There are pending attachments, are you sure to ignore it?'
	'still_uploading'	: 'Certaines pièces jointes sont toujours en téléchargements, Svp. patienter. Le sujet sera publié automatiquement après que les fichiers ont étés téléchargés...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...', // 'Some attachments are still uploading, please wait. The thread will be published automaticly after the files was uploaded...'
//	'q&a_invalid'			: 'Wrong answer, please try again',//'验证问答错误，请重新填写', // 
//	'code_invalid'			: 'Wrong security code, please try again',//'验证码错误，请重新填写', // 
	'no_data_recover'	: 'Aucune donnée ne peut être récupéré!',//'没有可以恢复的数据！', // 'No data can be recoverd!' - 'No data can be recovered!'
	'content_overwrite'	: 'Attention:\nContenu actuel sera remplacé par les données enregistrées!\nEtes-vous sûr de restaurer les données?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？', // 'Warning:\nCurrent content will be overwritten with the saved data!\nAre you sure to restore the data?'
	'upload_finished'	: 'Le téléchargement est terminé!',//'附件上传完成！', // 'Uploading is finished!'
	'successfull'		: 'Réussie:',//'成功', //  'Successfull:'
	'failed'		: 'échec:',//'失败', //  'Failed:'
	'ones'			: 'celles',//'个', // 'ones'
	'uploading'		: 'Chargement...',//'上传中...', // 'Uploading...'
	'select_image_files'	: 'Choisissez les fichiers images',//'请选择图片文件', //  'Select image files'
	'delete'		: 'Supprimer',//'删除', // 'Delete'
//	'cancel'		: 'Cancel',//'取消', // 
	'contains'		: 'Contient ',//'包含', // 'Contains ' 
	'img_attached_num'	: 'images joints',//'个图片附件', // 'images attached'
	'files attached_num'	: 'fichiers joints',//'个附件', // 'files attached'
	'images'		: 'Images',//'图片', // 'Images'
	'attachments'		: 'pièces jointes',//'附件', // 'attachments'
	'upload_failed'		: 'Echec lors du transfert',//'上传失败', // 'Upload Failed'

	'attach_big'		: 'Taille des pièces jointes dépasses la limite autorisée',//'服务器限制无法上传那么大的附件', // 'Attachment size exceeds the allowed limit'
	'attach_group_big'	: 'Vous avez des pièces jointe du groupe d\'utilisateurs dont la taille totale dépasse la limite autorisée',//'用户组限制无法上传那么大的附件', //  'You user group total attachment size exceeds allowed limit'
	'attach_type_big'	: 'Ce type de fichier joint la taille totale dépasse la limite autorisée',//'文件类型限制无法上传那么大的附件', // 'This file type total attachment size exceeds allowed limit'
	'attach_daily_big'	: 'Taille des pièces jointes totale quotidienne dépasse la limite autorisée',//'本日已无法上传更多的附件', // 'Daily total attachment size exceeds allowed limit'
	'validating_q&a'	: 'Validation des Q & R, Svp.veuillez patienter, merci',//'验证问答校验中，请稍后', // 'Validating the Q & A, please wait'
	'validating_code'	: 'Validation du code, Svp.veuillez patienter, merci',//'验证码校验中，请稍后', // 'Validating the code, please wait'
	'attach_type_disabled'	: 'Ce type de pièce jointe est désactivé',//'附件类型被禁止', //  'This attachment type is disabled'
	'attach_max'		: 'Ne dépassant pas',//'不能超过', //  'Not larger than'
	'vote_max_reached'	: 'A atteint le nombre maximum de votes: ',//'已达到最大投票数', //  'Reached the maximum number of votes: '
	'no_remote_attach'	: 'Désolé, aucune pièce jointe distant ou liée',//'抱歉，暂无远程附件', // 'Sorry, no remote attachment'
	'delete_post_sure'	: 'Sûr que vous voulez supprimer ce message?',//'确定要删除该帖子吗？', // 'Sure you want to delete this post?'
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: 'Etes-vous sûr de vouloir définir ce poste en tant que "Meilleure Réponse"?',//'您确认要把该回复选为“最佳答案”吗？', //  'Are you sure you want to define this post as the "Best Answer"?'
//	'title_long'		: 'Title length exceeds the limit of 255 characters',//'您的标题超过 255 个字符的限制', // 
//	'content_long'		: 'The content length does not meet the requirements.\n\nCurrent Length '//'您的帖子长度不符合要求。\n\n当前长度', // 
//	'bytes'			: 'bytes',//'字节', // 
//	'system_limit'		: 'System limit',//'系统限制', // 
//	'up_to'			: 'to',//'到',
	'premoderated'		: 'Les réponses à cette catégorie doivent être vérifiés. Votre message sera affiché après la vérification',//'本版回帖需要审核，您的帖子将在通过审核后显示', //  'Replies to this category must be audited. Your post will be displayed after the verification'
//	'credit_confirm1'	: 'This costs ',//'下载积分将', // 
	'credit_confirm1'	: 'Coûts du téléchargement ',//'下载需要消耗', // 'Download costs '
	'credit_confirm2'	: ' points, êtes-vous sûr de télécharger?',//'，您是否要下载？', //  ' points, are you sure to download?'
	'thread_to_clipboard'	: 'Sujet du fil de discussion a été copié dans le presse-papiers',//'帖子地址已经复制到剪贴板', //  'Thread address was copied to the clipboard'
	'click_to_enlarge'	: 'Cliquez pour agrandir',//'点击放大', // 'Click to enlarge'
	'notify_on_reply'	: 'Recevoir une notification réponse',//'接收回复通知', // 'Receive reply notification'
	'notify_on_reply_cancel'	: 'Annuler la notification réponse',//'取消回复通知', // 'Cancel reply notification'
	'share_connection_failed'	: 'Connexion à part échoué, Svp. réessayer plus tard',//'分享服务连接失败，请稍后再试', // 'Connection to share failed, please try again later'
	'qq_bind'		: 'Svp. lier votre compte QQ',//'请先绑定QQ账号', // 'Please bind your QQ account'
	'quote_by'		: 'Citation par .*? dans .*? code',//'本帖最后由 .*? 于 .*? 编辑', // 'Quote by .*? in .*? code'
	'copy_code'		: 'Copiez le code',//'复制代码', // 'Copy code'

//--------------------------------
//static/js/home.js
	'day'			: 'Jour',//'日', //  'Day'
	'category_empty'	: 'Nom de la catégorie ne peut pas être vide!',//'分类名不能为空！', // 'Category name can not be empty!'

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Close',//'关闭',
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Longueur du titre (devrait être de 1 ~ 80 caractères) ne répond pas au condition',//'标题长度(1~80字符)不符合要求', //  'Title length (should be 1~80 characters) does not meet the requirement'

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Afficher cette image originale dans une New fenêtre',//'点击图片，在新窗口显示原始尺寸', // 'Show original image in a new window'
	'continue_sure'		: 'Etes-vous sûr de procéder?',//'您确定要执行本操作吗？', // 'Are you sure to proceed?'
	'select_item'		: 'Svp. choisir l\'élément pour fonctionner avec',//'请选择要操作的对象', //  'Please choose the item to operate with'
	'image_url_invalid'	: 'Incorrecte image URL',//'图片地址不正确', // 'Incorrect image URL'
	'audio_url_invalid'	: 'Incorrecte URL audio, ne peut pas être vide',//'音乐地址错误，不能为空', // 'Incorrect audio URL, can not be empty'

//!!!!! MayBe wrap this names!!
	'collapse'		: 'Réduire',//'收起', // 'Collapse'
	'expand'		: 'Développer',//'展开', // 'Expand'

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'Vous pouvez choisir jusqu\'à',//'最多只允许选择', // 'You can select up to'
	'users'			: 'utilisateurs',//'个用户', //  'users'
	'allready_exists'	: 'Existe déjà',//'已经存在', //  'Already exists'

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'Vous êtes maintenant des amis, vous pouvez ',//'你们现在是好友了，接下来，您还可以：', // 'You are friends now, you can '
	'leave_message'		: 'Laisser un message',//'给TA留言', //  'Leave a message'
	'or'			: 'ou',//'或者', // 'or'
	'send_greeting'		: 'Envoyer voeux',//'打个招呼', // 'send greeting'
//	'collapse'			: 'Réduire',//'收起', //  'Collapse'
	'reply'			: 'Répondre',//'回复', // 'Reply'
	'comment'		: 'Comment.',//'评论', // 'Comment'
	'close_list'		: 'Fermer la Liste',//'收起列表', //  'Close the List'
	'more_feeds'		: 'Plus de flux',//'更多动态', // 'More Feeds'
//	'day'			: 'Day',//'日', 

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Désolé, l\'image avec une telle extension n\'est pas pris en charge',//'对不起，不支持上传此类扩展名的图片', //  'Sorry, image with such extension does not supported'
	'insert_to_content'	: 'Cliquez ici pour l\'insérer dans le contenu à la position actuelle du curseur',//'点击这里插入内容中当前光标的位置', // 'Click here to insert into the content at current cursor position'
	'insert'		: 'Insérer',//'插入', // 'Insert'
//	'delete'		: 'Delete',//'删除', // 
	'image_description'	: 'Description Image',//'图片描述', // 'Image Description'
//	'upload_ok'		: 'Uploaded Successfully',//'上传成功', // 
//	'upload_failed'		: 'Upload Failed',//'上传失败', // 
	'uploading_wait'	: 'Chargement, Svp. attendre',//'上传中，请等待', // 'Uploading, Please wait'
	'retry'			: 'Réessayer',//'重试', //  'Retry'

//--------------------------------
//static/js/portal.js

	'delete_sure'		: 'Etes-vous sûr de vouloir supprimer ces données?',//'您确定要删除该数据吗？', // 'Are you sure to delete this data?'
	'ignore_sure'		: 'Etes-vous sûr d\'ignorer ces données?',//'您确定要屏蔽该数据吗？', // 'Are you sure to ignore this data?'
	'to'			: 'à',//'到', // 'to'

	'choose_block'		: 'Choisissez un Bloc',//'选择模块', // 'Choose block'
	'blocks_found1'		: 'Trouvé',//'找到', // 'Found'
	'blocks_found2'		: 'Blocs Correspondants',//'个相应的模块', // 'corresponding blocks'
	'blocks_not_found'	: 'Pas de blocs correspondants',//'没有相应的模块', //'No corresponding blocks' 
	'select_block'		: 'Svp. choisissez un bloc!',//'请选择一个模块！', // 'Please select a block!'
	'show_settings'		: 'Voir les paramètres',//'展开设置项', // 'Show settings'
	'hide_settings'		: 'Cacher les paramètres',//'收起设置项', // 'Hide settings'
	'block_name_empty'	: 'Nom du bloc ne peut pas être vide',//'模块标识不能为空', // 'Block name can not be empty'
	'block_convert_sure'	: 'Etes-vous sûr que vous voulez convertir le bloc de type',//'你确定要转换模块的类型从', //  'Are you sure you want to convert the block from type'
	'back'			: 'Retour',//'返回', // 'Back' 
	'settings_expand'	: 'Développer Paramètre',//'展开设置项', // 'Expand setting'
	'settings_hide'		: 'Cacher Paramètre',//'收起设置项', // 'Hide setting'
	'custom_content_error'	: 'Erreur de contenu personnalisé! Le code HTML: ',//'自定义内容错误，', // 'Custom content error! HTML code: '
	'html_error'		: 'HTML code: ',//'HTML代码：', // 'HTML code: '
	'tags_not_match'	: ' - Mots clés ou Tags ne correspondent pas',//' 标签不匹配', // ' - Tags does not match'

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Choisir un style',//'选择样式', // 'Choose a Style'
	'style'			: 'Style',//'样式',
	'style1'		: 'Style1',//'样式1',
	'style2'		: 'Style2',//'样式2',
	'style3'		: 'Style3',//'样式3',
	'style4'		: 'Style4',//'样式4',
	'style5'		: 'Style5',//'样式5',
	'style6'		: 'Style6',//'样式6',
	'style7'		: 'Style7',//'样式7',
	'no_border'		: 'Aucun bord du Cadre',//'无边框框架',
	'no_border_no_margin'	: 'Aucun bord, Aucune marge',//'无边框且无边距',

//	'choose_style'		: 'Choose a Style',//'选择样式',
	'title'			: 'Titre',//'标题', // 'Title'
//	'delete'		: 'Delete',//'删除',
	'attribute'		: 'Attribut',//'属性', // Attribute
	'data'			: 'Donnée',//'数据', // 'data'
	'update'		: 'Mise à jour',//'更新', // 'Update'
	'export'		: 'Exporter',//'导出', // 'Export'
	'repeat'		: 'Répéter',//'平铺', // 'Repeat'
	'no_repeat'		: 'Pas de répétition',//'不平铺', //  'No repeat'
	'repeat_x'		: 'Répéter Horizontal',//'横向平铺', // 'Repeat Horizontal'
	'repeat_y'		: 'Répéter Vertical',//'纵向平铺', // 'Repeat Vertical'
	'no_style'		: 'Aucun style',//'无样式', // 'No style'
	'solid_line'		: 'Solid Line',//'实线', // 'Solid Line'
	'dotted_line'		: 'Ligne en pointillé',//'点线', // 'Dotted Line'
	'dashed_line'		: 'Ligne pointillée',//'虚线', // 'Dased Line'
//	'font'			: 'Font',//'字体',
	'link'			: 'Lien',//'链接', //  'Link'
	'border'		: 'Bord',//'边框', // 'Border'
	'size'			: 'Taille',//'大小', // 'Size'
	'color'			: 'Couleur',//'颜色', //  'Color'
	'separate_config'	: 'Config. séparés',//'分别设置', // 'Separate Config'
	'right'			: 'Droit',//'右', // 'Right'
	'bottom'		: 'Dessous',//'下', // 'Bottom'
	'top'			: 'Top',//'上', // 'Top'
	'left'			: 'Gauche',//'左', // 'Left'
	'margin'		: 'Marge',//'外边距', //  'Margin'
	'padding'		: 'Remplissage',//'内边距', // 'Padding'
//	'background_color'	: 'Background Color',//'背景颜色',
	'bg_image'		: 'Image de Fond',//'背景图片', // 'Background Image'
	'class'			: 'Désignation des Catégories',//'指定class', // 'Designated Class'
	'block'			: 'Bloc',//'模块', // 'Block'
	'frame'			: 'Cadre',//'框架', // 'Frame'
//	'edit'			: 'Edit',//'编辑',
//	'style'			: 'Style',//'样式',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
//	'tile'			: 'Tile',//'平铺',
//	'no_tile'		: 'No tile',//'不平铺',
//	'tile_hor'		: 'Horizontal Tile',//'横向平铺',
//	'tile_ver'		; 'Vertical Tile',//'纵向平铺',
	'onclick'		: 'SurClic',//'点击', // 'onClick'
	'onmouseover'		: 'SurvolSouris',//'滑过', //  'onMouseover'
	'switch_type'		: 'Type de Commutateur',//'切换类型', // 'Switch Type'
//	'title'			: 'Title',//'标题', // 'Title'
//	'link'			: 'Link',//'链接', // 'Link'
	'image'			: 'Image',//'图片',  // 'Image'
	'position'		: 'Position',//'位置', // 'Position'
	'align_left'		: 'Aligné à gauche',//'居左', // 'Left Align'
	'align_right'		: 'Aligné à droite',//'居右',  // 'Right Align'
	'offset'		: 'décalage',//'偏移量', // 'Offset'
//	'font'			: 'Font',//'字体',
//	'size'			: 'Size',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: 'Ajout. New Titre',//'添加新标题', // 'Add New Title'
//	'edit'			: 'Edit',//'编辑',
//	'title'			: 'Title',//'标题',
//	'close'			: 'Close',//'关闭',
//	'submit'		: 'Submit',//'确定',
//	'cancel'		: 'Cancel',//'取消',
	'delete_this_sure'	: 'Etes-vous sûr de le supprimer? Il ne peut pas être restauré si vous le supprimez.',//'您确实要删除吗,删除以后将不可恢复', // 'Are you sure to delete it? It can not be restored if you delete it.'
	'loading_content'	: 'Chargement du contenu...',//'正在加载内容...',  // 'Loading content...'
	'modified_import'	: 'Vous avez fait quelques modifications, Svp. à l\'importation après l\'avoir enregistré, sinon les données importées ne seront  pas inclus dans la modification cette fois-ci..',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。', // 'You have made some modifications, please import it after you save it, otherwise the imported data won\'t include modification of this time.'
	'total'			: 'Total ',//'共',  // 'Total '
	'blocks'		: 'blocs',//'个模块', // 'blocks'
	'updating_the'		: 'actualisation #',//'正在更新第', // 'updating #'
//	'ones'			: 'ones',//'个',
	'done'			: 'fini',//'已完成', // 'done'
	'start_updating'	: 'Démarrer la mise à jour...',//'开始更新...',  // 'Start Updating...'
	'update_block_data'	: 'Mise à Jour des Blocs de Données',//'更新模块数据', // 'Updating block data'
	'clear_diy_sure'	: 'Etes-vous sûr de vouloir effacer la page de données en cours de BRICO DIY? Il ne peut pas être restauré si vous décidé de le nettoyé.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复', // 'Are you sure to clear the current page DIY data? It can not be restored if you clear it.'
	'frame_not_found'	: 'Attention: Frame ou Cadre non trouvé, Svp. ajouter la frame.',//'提示：未找到框架，请先添加框架。', // 'Warning: Frame not found, please add frame.'
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'Appliquer à tous les pages de ce type',//'应用于此类全部页面',  // 'Apply to all this type pages'
	'apply_current_page'	: 'Appliquer à la page Actuelle',//'只应用于本页面', // 'Apply to current page'
	'save_temp_sure'	: 'Sauvegarder les Données Temporaires?<br />Cliquez sur Envoyer pour enregistrer les données temporaires, cliquez sur Annuler pour effacer les données temporaires.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。', // 'Save temporary data?<br />Click submit to save the temporary data, click cancel to delete the temporary data.'
	'save_temp'		: 'Enregistrer les Données Temporaires',//'保留暂存数据',  // 'Save the temporary data'
	'revert_last_saved'	: 'Etes-vous sûr de vouloir revenir à la version précédente des résultats enregistrés?',//'您确定要恢复到上一版本保存的结果吗？', // 'Are you sure you want to revert to previous version of saved results?'
	'continue_temp_sure'	: 'Continuer le DIY BRICO avec des données temporaires?',//'是否继续暂存数据的DIY？',  // 'Continue to DIY with temporary data?'
//	'warn_not_saved'	: 'You have modified the data. If you exit, all the changes will be lost.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'La Mise à Jour est Terminée.',//'已更新完成。',  // 'Updating is completed.'
	'tab_label'		: 'Tab Etiquettes',//'tab标签',  // 'Tab Label'
	'temp_action'		: 'Cliquez sur le bouton "Continuer" pour charger les données temporaires dans le style actuel,<br />Cliquez sur le bouton "Supprimer"  pour supprimer des données temporaires.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。', // 'Click the "Continue" button to load the temporary data into current style,<br />Click the "Delete" button for delete temporary data.'
	'continue'		: 'Continue',//'继续',  // 'Continue'

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'Je viens de microblogging Tencent une plateforme ouverte',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0", // 'I come from Tencent microblogging an open platform'

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'Nom Utilisateur Contient des Caractères Invalides',//'用户名包含敏感字符', // 'User name contains invalid characters'
	'username_short'	: 'Nom Utilisateur est Infèrieure a 2 Caractères',//'用户名小于 3 个字符', // 'User name is shorter than 3 characters'
	'username_long'		: 'Nom Utilisateur est Plus Long que 15 Caractères',//'用户名超过 15 个字符',  // 'User name is longer than 15 characters'
	'passwords_not_equal'	: 'Les 2 Mots de Passe ne Correspondent Pas',//'两次输入的密码不一致',  // 'Two passwords does not match'
	'email_invalid'		: 'E-mail Contient des Caractères Invalides',//'Email 包含敏感字符', // 'Email contains invalid characters'
	'invite_code_invalid'	: 'Code Invitation Contient des Caractères Invalides',//'邀请码包含敏感字符', // 'Invitation code contains invalid characters'
	'password_fill'		: 'Svp. Remplir le Mot de Passe',//'请填写密码',  // 'Please fill the password'
	'password_again'	: 'Svp. Entrez le Mot de Passe',//'请再次输入密码',  // 'Please enter the password again'
	'email_fill'		: 'Svp. entrez une adresse E-mail',//'请输入邮箱地址',  // 'Please enter email address'

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Choisissez Svp.',//'请选择',  // 'Select please'
	'required_fill'		: 'Les champs obligatoires ne sont pas remplis',//'必填项目没有填写', // 'Required fields not filled'
	'select_next_level'	: 'Svp. Choisir le prochain niveau',//'请选择下一级', // 'Please select the next level'
	'numeric_invalid'	: 'La valeur numérique est invalide',//'数字填写不正确',  // 'Numeric value is invalid'
	'email_invalid'		: 'Adresse E-mail est invalide',//'邮件地址不正确',  // 'E-mail address is invalid'
	'text_too_long'		: 'Valeur du champ est trop long',//'填写项目长度过长',  // 'Field value is too long'
	'value_is_greater'	: 'Value is greater than the maximum',//'大于设置最大值', // 'Value is greater than the maximum'
	'value_is_less'		: 'La valeur est inférieure au minimum',//'小于设置最小值', // 'Value is less than minimum'
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Supprimer',//'删除',  // 'Delete'
//	'attribute'		: 'Attributs',//'属性', // 'Attribute'
	'save_js'		: 'Enregistrer le javascript après son Affichage',//'javascript脚本保存后显示', // 'Save the javascript after the show'
	'settings'		: 'Réglages',//'设置', // 'Settings'

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Désolé, ce type de fichier n\'est pas supporté',//'对不起，不支持上传此类文件', // 'Sorry, this file type is unsupported'
//	'uploading'		: 'Uploading...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'Vous utilisez actuellement Up-to-date de la version de Discuz! programme. Svp. consulter les conseils suivants pour apporter des améliorations en temps opportun.', // 'You are currently using Up-to-date version of Discuz! program. Please refer to the following tips to make timely upgrades.'

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'Ajouter à des opérations courantes',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;', // 'Add to common operations'

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: 'Cartes de Google',//'google图',
	'map_insert'		: 'Insérez la carte Google',//'插入google地图',
	'map_insert_tips'	: 'Insérer Google Maps en cherchant l\'adresse (temporaire ne supporte que une étiquette simple!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: 'Le centre de la carte est changée!',//'地图中心已经改变！',
	'map_wrong_address'	: 'Mauvaise adresse! Adresse actuelle n\'a pas été trouvé',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: ''

};
