/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables for English

	$Id: static/js/lang_js.js by Valery Votintsev, vot at sources.ru
	Translated to Spanish by jhoxi, discuzhispano.com

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
	'Black'			: 'Negro',//'黑色',
	'Sienna'		: 'Sienna',//'赭色',
	'DarkOliveGreen'	: 'Oscuro Verde Oliva',//'暗橄榄绿色',
	'DarkGreen'		: 'Verde oscuro',//'暗绿色',
	'DarkSlateBlue'		: 'Azul Oscuro Gris',//'暗灰蓝色',
	'Navy'			: 'Navy',//'海军色',
	'Indigo'		: 'Índigo',//'靛青色',
	'DarkSlateGray'		: 'Verde oscuro',//'墨绿色',
	'DarkRed'		: 'Rojo Oscuro',//'暗红色',
	'DarkOrange'		: 'Naranja oscuro',//'暗桔黄色',
	'Olive'			: 'oliva',//'橄榄色',
	'Green'			: 'verde',//'绿色',
	'Teal'			: 'Teal',//'水鸭色',
	'Blue'			: 'Azul',//'蓝色',
	'SlateGray'		: 'Caliza',//'灰石色',
	'DimGray'		: 'Gris oscuro',//'暗灰色',
	'Red'			: 'Rojo',//'红色',
	'SandyBrown'		: 'Marrón arena',//'沙褐色',
	'YellowGreen'		: 'Amarillo Verde',//'黄绿色',
	'SeaGreen'		: 'Verde mar',//'海绿色',
	'MediumTurquoise'	: 'Verde esmeralda',//'间绿宝石',
	'RoyalBlue'		: 'Azul real',//'皇家蓝',
	'Purple'		: 'Púrpura',//'紫色',
	'Gray'			: 'Gris',//'灰色',
	'Magenta'		: 'Rojo Purpura',//'红紫色',
	'Orange'		: 'Naranja',//'橙色',
	'Yellow'		: 'Amarillo',//'黄色',
	'Lime'			: 'Naranja áspero',//'酸橙色',
	'Cyan'			: 'Azul Verde',//'青色',
	'DeepSkyBlue'		: 'Azul fondo de cielo',//'深天蓝色',
	'DarkOrchid'		: 'Púrpura oscuro',//'暗紫色',
	'Silver'		: 'Plata',//'银色',
	'Pink'			: 'Rosa',//'粉色',
	'Wheat'			: 'Luz amarilla',//'浅黄色',
	'LemonChiffon'		: 'limón de Seda',//'柠檬绸色',
	'PaleGreen'		: 'Verde Cang',//'苍绿色',
	'PaleTurquoise'		: 'Gema verde Cang',//'苍宝石绿',
	'LightBlue'		: 'Azul brillante',//'亮蓝色',
	'Plum'			: 'Color ciruela',//'洋李色',
	'White'			: 'Color blanco' //'白色'
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
	'restore_last_saved'	: '¿Estás seguro de que desea restaurar a la última vez?',//'您确定要恢复上次保存?',
	'cut_manually'		: 'La configuración de seguridad de este navegador no permite la ejecución automática de la operación de cortar. Utilice el método abreviado de teclado (Ctrl X) para completar esta operación.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: 'La configuración de seguridad de este navegador no permite la ejecución automática de la operación de copiar. Utilice el método abreviado de teclado (Ctrl C) para completar esta operación.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: 'La configuración de seguridad de este navegador no permite la ejecución automática de la operación de pegar. Utilice el método abreviado de teclado (Ctrl V) para completar esta operación.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: 'No se puede encontrar los datos de inicialización de Graffiti',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'Sólo se admite el Internet Explorer 5.01 o posterior',//'只支持IE 5.01以上版本',
	'edit_raw'		: 'Editar texto en bruto',//'编辑源码',
	'plain_text_warn'	: 'Convertir el texto sin formato perderás el formato!\n¿Seguro que desea continuar?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: 'Su navegador no soporta esta característica, por favor, actualice la versión del navegador',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: 'Tips',//'小提示',
//	'show_tips'		: 'Mostrar Tips',//'友情提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: 'Esta operación es efectiva solamente para modo WYSIWYG',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: 'Prueba otra interfaz plataforma en la nube',//'云平台其他接口测试',
	'int_roaming_test'	: 'Prueba otra interfaz roaming',//'漫游其他接口测试',
	'int_qq_test'		: 'Prueba de interfaz QQ en Internet',//'QQ互联接口测试',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: 'Seleccione al menos un tema para empujar los artículos',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: 'Seleccione al menos un elemento para empujar los artículos',//'请至少推送一条信息到列表区域',
	'loading'		: 'Cargando...',//'加载中...',
	'push5reached'		: 'Presione el número Post ha llegado a cinco, en el derecho de cancelar un número y vuelva a intentarlo.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: 'Haga clic a la izquierda',//'点击左侧',
	'push_to_list'		: 'Se empuja la información a la lista',//'将信息推送到列表',
	'wait_image_upload'	: 'Sube la imagen, por favor espere...',//'图片上传中，请稍后...',






//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Cargando ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: 'Anterior Mes',//'上一月',
	'next_month'	: 'Siguiente Mes',//'下一月',
	'select_year'	: 'Seleccione Año',//'点击选择年份',
	'select_month'	: 'Seleccione Mes',//'点击选择月份',
	'wday0'		: 'Do',//'日',
	'wday1'		: 'Lu',//'一',
	'wday2'		: 'Ma',//'二',
	'wday3'		: 'Mi',//'三',
	'wday4'		: 'Ju',//'四',
	'wday5'		: 'Vi',//'五',
	'wday6'		: 'Sa',//'六',
	'month'		: 'Mes',//'月',
	'today'		: 'Hoy',//'今天',
	'hours'		: 'Horas',//'点',
	'minutes'	: 'Minutos',//'分',
	'ok'		: 'Enviar',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: 'Abrir en nueva ventana',//'在新窗口打开',
	'actual_size'		: 'Tamaño real',//'实际大小',
	'close'			: 'Cerrar',//'关闭',
	'wheel_zoom'		: 'Utilice la rueda del ratón para acercar/alejar la imagen',//'鼠标滚轮缩放图片',
	'reminder'		: 'Recordar',//'提示信息',
	'submit'		: 'Enviar',//'确定',
//	'submit'		: 'Enviar',//'提交',
	'cancel'		: 'Cancelar',//'取消',
//	'cancel'		: 'Cancelar',//'取消',
	'wait_please'		: 'Cargando ...',//'请稍候...',
	'int_error'		: 'Error interno, no puede mostrar este contenido',//'内部错误，无法显示此内容',
	'flash_required'	: 'Este contenido requiere Adobe Flash Player 9.0.124 o posterior',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Descargar Flash Player',//'下载 Flash Player',
	'day1'			: '1 Día',//'一天',
	'week1'			: '1 Semana',//'一周',
	'days7'			: '7 Días',//'7 天',
	'days14'		: '14 Días',//'14 天',
	'month1'		: '1 Mes',//'一个月',
	'month3'		: '3 Meses',//'三个月',
	'month6'		: '6 Meses',//'半年',
	'year1'			: '1 Año',//'一年',
	'custom'		: 'Costumbre',//'自定义',
	'permanent'		: 'Permanente',//'永久',
	'show_all_expr'		: 'Mostrar todas los smiles',//'显示所有表情',
	'page_prev'		: 'Página anterior',//'上页',
	'page_next'		: 'Siguiente página',//'下页',
	'copy2clipboard'	: 'Copiar al portapapeles',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: 'Introduzca las palabras de búsqueda',//'请输入搜索内容',
	'refresh_q&a'		: 'Actualizar Q&A',//'刷新验证问答',
	'refresh_code'		: 'Actualizar Código',//'刷新验证码',
	'code_invalid'		: 'Código de seguridad incorrecto, por favor, inténtelo de nuevo',//'验证码错误，请重新填写',
	'q&a_invalid'		: 'Respuesta incorrecta, por favor, inténtalo de nuevo',//'验证问答错误，请重新填写',
	'code_clipboard'	: 'El código fue copiado al portapapeles',//'代码已复制到剪贴板',
	'enter_link_url'	: 'Introduce la URL del enlace',//'请输入链接地址',
	'enter_link_text'	: 'Introduzca el texto del enlace',//'请输入链接文字',
	'enter_image_url'	: 'Introduce la URL de la imagen',//'请输入图片地址',
	'width_optional'	: 'Ancho (Opcional)',//'宽(可选)',
	'height_optional'	: 'Altura (Opcional)',//'高(可选)',
	'narrow_screen'		: 'Pantalla reducida',//'切换到窄版',
	'wide_screen'		: 'Pantalla amplia',//'切换到宽版',
	'logging_wait'		: 'Iniciando sesión, por favor espere...',//'登录中，请稍后...',
	'notices_no'		: '[　　　]',//'【　　　】',
	'notices_yes'		: '[Nuevo]',//'【新提醒】',
	'sec_after_win_closed'	: ' Segundos antes de la ventana cerrada',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' segundos antes de redirigir a la página',//' 秒后页面跳转',
	'jump_now'		: 'Ir ahora',//'立即跳转',
	'error_message'		: 'Mensaje de error',//'错误信息',
	'ctrl_d_favorites'	: 'Presione Ctrl + D claves para añadir a favoritos',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: 'Para los no-IE navegador, por favor configurar manualmente Página de inicio',//'非 IE 浏览器请手动将本站设为首页',
//--------------------------------
//static/js/common_diy.js

	'edit'			: 'Editar',//'编辑',
	'warn_not_saved'	: 'Se han modificado los datos. Si sale, todos los cambios se perderán.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: 'Todos los cambios se perderán si sale. ¿Seguro que desea salir ahora?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: 'Seleccione una imagen para subir',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: 'Copia fallada, por favor seleccione "Permitir el acceso"',//'复制失败，请选择“允许访问”',
//	'permanent'		: 'Permanente',//'永久',
//	'open_new_win'		: 'Abre en nueva ventana',//'在新窗口打开',
//	'actual_size'		: 'Tamaño real',//'实际大小',
//	'close'			: 'Cerrar',//'关闭',
//	'wheel_zoom'		: 'Utilice la rueda del ratón para acercar/alejar la imagen',//'鼠标滚轮缩放图片',
//	'reminder'		: 'Recordar',//'提示信息',
	'prev'			: 'Anterior.',//'上一张',
	'next'			: 'Siguiente',//'下一张',

//--------------------------------
//static/js/editor.js
//static/js/seditor.js

	'restore_size_edit'	: 'Reanudar el tamaño del editor',//'恢复编辑器大小',
	'full_screen_edit'	: 'Editor de pantalla completa',//'全屏方式编辑',
	'current_length'	: 'Longitud actual',//'当前长度',
	'bytes'			: 'bytes',//'字节',
	'system_limit'		: 'Límite del sistema',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: 'Contar largo',//'字数检查',
	'data_restored'		: 'Los datos se restaura',//'数据已恢复',
	'data_saved'		: 'Datos guardados',//'数据已保存',
	'clear_all_sure'	: '¿Está seguro de borrar todos los contenidos?',//'您确认要清除所有内容吗？',
	'hide_content'		: 'Ocultar el contenido',//'请输入要隐藏的信息内容',
	'free_content'		: 'Si usted no ha establecido un precio de correos, la información introducida se puede ver de forma gratuita antes de comprar el contenido,',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: 'Mostrar sólo cuando el usuario contesta a este tema ',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: 'Muestra sólo cuando los puntos de usuario es más que ',//'只有当浏览者积分高于',
	'when_show'		: 'Cuando para mostrar',//'时才显示',
	'table_rows'		: 'Filas de tabla',//'表格行数',
	'table_columns'		: 'Columnas de tabla',//'表格列数',
	'table_width'		: 'Ancho de tabla: ',//'表格宽度: ',
	'bg_color'		: 'Color de fondo',//'背景颜色',
	'table_intro0'		: 'Consejos rápidos para escribir la tabla',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=color]&quot; Definir la fila del color de fondo<br />&quot;[td=Width]&quot; Definir el ancho de columna<br />&quot;[td=Column_Span,Row_Span,Width]&quot; Definir el tamaño de fila/columna y el ancho<br /><br />Escritura rápido ejemplo de la tabla: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />Nombre:|Discuz!<br />Versión:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: 'Utilizar &quot;|&quot; para separar las filas, si existe el &quot;|&quot; carácter en los datos, cámbiela por &quot;\\|&quot;, filas separadas con &quot;\\n&quot;.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: 'Entrada URL del archivo de música',//'请输入音乐文件地址',
	'video_url'		: 'Entrada URL del archivo de vídeo',//'请输入视频地址',
	'auto_play'		: 'Reproducción automática?',//'是否自动播放',
	'flash_url'		: 'Por favor, URL de entrada de archivo de Flash ',//'请输入 Flash 文件地址',
	'enter_please'		: 'Por favor introduce el',//'请输入第',
	'nth_parameter'		: '-th parámetro',//' 个参数',
	'font'			: 'Fuente',//'字体',
	'full_screen'		: 'Pantalla completa',//'全屏',
	'restore_size'		: 'Restaurar tamaño',//'恢复',
	'general'		: 'Modo general',//'常用',
	'simple'		: 'Modo avanzado',//'高级',
	'bad_browser'		: 'Su navegador no soporta esta característica',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: 'Haga clic aquí para permitir el auto-guardado',//'点击开启自动保存',
	'autosave_enable'	: 'Habilitar el auto-guardado',//'开启自动保存',
	'autosave_disable'	: 'Deshabilitar el auto-guardado',//'点击关闭自动保存',
	'autosave_enabled'	: 'Datos del auto-guardado activado',//'数据自动保存已开启',
	'autosave_disabled'	: 'Datos del auto-guardado desactivado',//'数据自动保存已关闭',
	'data_saved_at'		: 'Datos guardados en',//'数据已于',
	'saved_time'		: '',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: ' antes de copia de seguridad automática',//'秒后保存',
	'insert_quote'		: 'Inserte citar',//'请输入要插入的引用',
	'insert_code'		: 'Inserte el Código',//'请输入要插入的代码',
//	'enter_image_url'	: 'Introduce la URL de la imagen',//'请输入图片地址',
//	'width_optional'	: 'Ancho (opcional)',//'宽(可选)',
//	'height_optional'	: 'Altura (opcional)',//'高(可选)',
	'enter_item_list'	: 'Introduzca la lista de elementos.\r\nDejar en blanco, o haga clic en Cancelar.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
//	'enter_link_url'	: 'Introduce la URL del enlace',//'请输入链接地址',
//	'enter_link_text'	: 'Introduzca el enlace del texto',//'请输入链接文字',
//	'insert_quote'		: 'Inserte citar',//'请输入要插入的引用',
	'width'			: 'Ancho',//'宽',
	'height'		: 'Altura',//'高',
	'audio_support'		: 'Soporta wma, mp3, ra, rm, y otros formatos de música<br />Ejemplo: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: 'Soportado por Youku, potatoes, 56, 6, cool video y otras estaciones de video en <br /> soporta wmv avi rmvb mov swf flv formatos de vídeo <br /> Ejemplo: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: 'Soporta formatos de Flash: swf flv <br /> Ejemplo: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: 'Pegar un contenido de Word',//'从 Word 粘贴内容',
	'paste_word_tip'	: 'Por favor, use acceso directo (Ctrl + V) para pegar el contenido del documento de Word',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: '¿Está seguro que desea eliminar este tema de temas Hot?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: 'Hay ',//'有',
//	'new_reply_exists'	: ' nuevas respuestas en el tema, haga clic para ver',//'条存在新回复的主题，点击查看',
	'new_reply_exists'	: 'El tema tiene respuestas nuevas, haga clic en Ver',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: 'Buscar en la Red',//'网页搜索',
	'search_site'	: 'Buscar en el sitio',//'站内搜索',
	'search'	: 'Buscar',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: 'Elija el tema a moderar',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: 'Error interno del servidor',//'内部服务器错误',
	'upload_ok'		: 'Subido con éxito',//'上传成功',
	'ext_not_supported'	: 'Esta extensión de archivo no es compatible',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: 'Lo sentimos, esta extensión de archivo no es soportado.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: 'Tipo de imagen ilegal',//'图片附件不合法',
	'can_not_save_attach'	: 'No se puede guardar el archivo adjunto',//'附件文件无法保存',
	'invalid_file'		: 'No existe el fichero legítimo se ha subido',//'没有合法的文件被上传',
	'illegal_operation'	: 'Operación ilegal',//'非法操作',
//	'current_length'	: 'Longitud actual',//'当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'Límite del sistema',//'系统限制',
//	'up_to'			: 'a',//'到',
//	'bytes'			: 'bytes',//'字节',
//	'check_length'		: 'Contar palabras',//'字数检查',
	'enter_content'		: 'Escriba el título o el contenido',//'请完成标题或内容栏',
	'select_category'	: 'Seleccione una categoría correspondiente al tema',//'请选择主题对应的分类',
	'select_category_info'	: 'Seleccione una categoría correspondiente a la información del tema',//'请选择主题对应的分类信息',
	'title_long'		: 'Longitud del título supera el límite de 255 caracteres',//'您的标题超过 80 个字符的限制',
	'content_long'		: 'La longitud del contenido no cumple con los requisitos.\n\n',//'您的帖子长度不符合要求。\n\n',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'Límite del sistema',//'系统限制',
//	'up_to'			: 'a',//'到',
	'ignore_pending_attach'	: 'No están pendientes de archivos adjuntos, ¿está usted seguro de no hacer caso?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: 'Algunos archivos adjuntos se siguen cargando, espere por favor. El tema se publicará automaticamente después de que los archivos se ha subido...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
//	'q&a_invalid'			: 'Respuesta incorrecta, por favor, inténtalo de nuevo',//'验证问答错误，请重新填写',
//	'code_invalid'			: 'Código de seguridad incorrecto, por favor, inténtelo de nuevo',//'验证码错误，请重新填写',
	'no_data_recover'	: 'No hay datos se pueden recuperar!',//'没有可以恢复的数据！',
	'content_overwrite'	: 'Advertencia:\nEl contenido actual se sobrescribe con los datos guardados!\n¿Estás seguro de que restaurar los datos?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: 'Carga terminada!',//'附件上传完成！',
	'successfull'		: 'Exitoso:',//'成功',
	'failed'		: 'Fracasada:',//'失败',
	'ones'			: 'los',//'个',
	'uploading'		: 'Carga...',//'上传中...',
	'select_image_files'	: 'Seleccione los archivos de imagen',//'请选择图片文件',
	'delete'		: 'Borrar',//'删除',
//	'cancel'		: 'Cancelar',//'取消',
	'contains'		: 'Contiene ',//'包含',
	'img_attached_num'	: 'imágenes adjuntas',//'个图片附件',
	'files attached_num'	: 'Archivos adjuntos',//'个附件',
	'images'		: 'Imágenes',//'图片',
	'attachments'		: 'Archivos adjuntos',//'附件',
	'upload_failed'		: 'Error al cargar',//'上传失败',

	'attach_big'		: 'Tamaño de archivo adjunto excede el límite permitido',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: 'Es el tamaño de grupo de usuarios total apego excede el límite permitido',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: 'Este tamaño de tipo de archivo adjunto total excede el límite permitido',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: 'Tamaño de archivo adjunto diaria total excede el límite permitido',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'Validación de la Q & A, por favor espere',//'验证问答校验中，请稍后',
	'validating_code'	: 'Validar el código, por favor espere',//'验证码校验中，请稍后',
	'attach_type_disabled'	: 'Este tipo de archivo adjunto está desactivado',//'附件类型被禁止',
	'attach_max'		: 'No más grande que',//'不能超过',
	'vote_max_reached'	: 'Alcanzado el número máximo de votos: ',//'已达到最大投票数',
	'no_remote_attach'	: 'Lo sentimos, no hay apego a distancia',//'抱歉，暂无远程附件',
	'delete_post_sure'	: 'Seguro que quieres eliminar este mensaje?',//'确定要删除该帖子吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: '¿Está seguro que desea definir este post como la "La mejor respuesta"?',//'您确认要把该回复选为“最佳答案”吗？',
//	'title_long'		: 'Título longitud supera el límite de 255 caracteres',//'您的标题超过 255 个字符的限制',
//	'content_long'		: 'La longitud del contenido no cumple con los requisitos.\n\nLongitud actual '//'您的帖子长度不符合要求。\n\n当前长度',
//	'bytes'			: 'bytes',//'字节',
//	'system_limit'		: 'Límite del sistema',//'系统限制',
//	'up_to'			: 'a',//'到',
	'premoderated'		: 'Las respuestas a esta categoría deben ser auditados. Tu entrada se mostrará después de la verificación',//'本版回帖需要审核，您的帖子将在通过审核后显示',
//	'credit_confirm1'	: 'Esto cuesta ',//'下载积分将',
	'credit_confirm1'	: 'Descargar los costos ',//'下载需要消耗',
	'credit_confirm2'	: ' puntos, está seguro de descarga?',//'，您是否要下载？',
	'thread_to_clipboard'	: 'Dirección del tema se ha copiado en el portapapeles',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: 'Haga Click para agrandar',//'点击放大',
	'notify_on_reply'	: 'Recibir notificaciones de respuestas',//'接收回复通知',
	'notify_on_reply_cancel'	: 'Cancelar la notificación de respuestas',//'取消回复通知',
	'share_connection_failed'	: 'La conexión a compartir fallada, por favor inténtelo más tarde',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: 'Por favor, enlazar su cuenta QQ',//'请先绑定QQ账号',
	'quote_by'	: 'Cita por .*? in .*? código',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'	: 'Copia código',//'复制代码',

//--------------------------------
//static/js/home.js
	'day'			: 'Día',//'日',
	'category_empty'	: 'Nombre de la categoría no puede estar vacío!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Cerrar',//'关闭',
//	'wait_please'		: 'Cargando ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: 'Longitud del título (debe ser de 1~80 caracteres) no cumple con el requisito',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: 'Mostrar imagen original en una nueva ventana',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: '¿Está seguro de continuar?',//'您确定要执行本操作吗？',
	'select_item'		: 'Por favor, seleccione la opción de operar con',//'请选择要操作的对象',
	'image_url_invalid'	: 'URL incorrecta de la imagen',//'图片地址不正确',
	'audio_url_invalid'	: 'URL de audio incorrecto, no puede estar vacío',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: 'Colapsar',//'收起',
	'expand'		: 'Expandir',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: 'Puede seleccionar un máximo de',//'最多只允许选择',
	'users'			: 'usuarios',//'个用户',
	'allready_exists'	: 'Ya existe',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: 'Son amigos ahora, se puede ',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: 'Deja un mensaje',//'给TA留言',
	'or'			: 'o',//'或者',
	'send_greeting'		: 'enviar saludos',//'打个招呼',
//	'collapse'			: 'Colapsar',//'收起',
	'reply'			: 'Responder',//'回复',
	'comment'		: 'Comentario',//'评论',
	'close_list'		: 'Cerrar la lista',//'收起列表',
	'more_feeds'		: 'Más RSS',//'更多动态',
//	'day'			: 'Día',//'日',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: 'Lo sentimos, la imagen con dicha extensión no es soportado',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: 'Haz clic aquí para insertar en el contenido en la posición actual del cursor',//'点击这里插入内容中当前光标的位置',
	'insert'		: 'Insertar',//'插入',
//	'delete'		: 'Borrar',//'删除',
	'image_description'	: 'Descripción de la imagen',//'图片描述',
//	'upload_ok'		: 'Subido con éxito',//'上传成功',
//	'upload_failed'		: 'Error en la carga',//'上传失败',
	'uploading_wait'	: 'Subiendo, por favor espere',//'上传中，请等待',
	'retry'			: 'Reintentar',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: '¿Está seguro de borrar estos datos?',//'您确定要删除该数据吗？',
	'ignore_sure'		: '¿Estás seguro de ignorar estos datos?',//'您确定要屏蔽该数据吗？',
	'to'			: 'a',//'到',

	'choose_block'		: 'Elija bloque',//'选择模块',
	'blocks_found1'		: 'Encontrado',//'找到',
	'blocks_found2'		: 'bloques correspondientes',//'个相应的模块',
	'blocks_not_found'	: 'No hay bloques correspondientes',//'没有相应的模块',
	'select_block'		: 'Por favor, seleccione un bloque!',//'请选择一个模块！',
	'show_settings'		: 'Mostrar configuración',//'展开设置项',
	'hide_settings'		: 'Ocultar configuración',//'收起设置项',
	'block_name_empty'	: 'Nombre del bloque no puede estar vacío',//'模块标识不能为空',
	'block_convert_sure'	: '¿Estás seguro de que desea convertir el bloque de tipo',//'你确定要转换模块的类型从',
	'back'			: 'Atras',//'返回',
	'settings_expand'	: 'Expandir configuración',//'展开设置项',
	'settings_hide'		: 'Ocultar configuración',//'收起设置项',
	'custom_content_error'	: 'Error de contenido personalizado! Código HTML: ',//'自定义内容错误，',
	'html_error'		: 'Código HTML: ',//'HTML代码：',
	'tags_not_match'	: ' - Las etiquetas no coinciden',//' 标签不匹配',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: 'Elija un estilo',//'选择样式',
	'style'			: 'Estilo',//'样式',
	'style1'		: 'Estilo1',//'样式1',
	'style2'		: 'Estilo2',//'样式2',
	'style3'		: 'Estilo3',//'样式3',
	'style4'		: 'Estilo4',//'样式4',
	'style5'		: 'Estilo5',//'样式5',
	'style6'		: 'Estilo6',//'样式6',
	'style7'		: 'Estilo7',//'样式7',
	'no_border'		: 'No borde del marco',//'无边框框架',
	'no_border_no_margin'	: 'No borde, sin margen',//'无边框且无边距',

//	'choose_style'		: 'Elija un estilo',//'选择样式',
	'title'			: 'Título',//'标题',
//	'delete'		: 'Borrar',//'删除',
	'attribute'		: 'Atributo',//'属性',
	'data'			: 'Datos',//'数据',
	'update'		: 'Actualizar',//'更新',
	'export'		: 'Exportar',//'导出',
	'repeat'		: 'Repetir',//'平铺',
	'no_repeat'		: 'No repetir',//'不平铺',
	'repeat_x'		: 'Repita horizontal',//'横向平铺',
	'repeat_y'		: 'Repita vertical',//'纵向平铺',
	'no_style'		: 'Sin estilo',//'无样式',
	'solid_line'		: 'Línea sólida',//'实线',
	'dotted_line'		: 'Línea de puntos',//'点线',
	'dashed_line'		: 'Línea de puntos',//'虚线',
//	'font'			: 'Fuente',//'字体',
	'link'			: 'Enlace',//'链接',
	'border'		: 'Bordear',//'边框',
	'size'			: 'Tamaño',//'大小',
	'color'			: 'Color',//'颜色',
	'separate_config'	: 'Configuración independiente',//'分别设置',
	'right'			: 'Derecho',//'右',
	'bottom'		: 'Fondo',//'下',
	'top'			: 'Top',//'上',
	'left'			: 'Izquierda',//'左',
	'margin'		: 'Margen',//'外边距',
	'padding'		: 'Relleno',//'内边距',
//	'background_color'	: 'Color de fondo',//'背景颜色',
	'bg_image'		: 'Imagen de fondo',//'背景图片',
	'class'			: 'Clase designada',//'指定class',
	'block'			: 'Bloque',//'模块',
	'frame'			: 'Marco',//'框架',
//	'edit'			: 'Editar',//'编辑',
//	'style'			: 'Estilo',//'样式',
//	'close'			: 'Cerrar',//'关闭',
//	'submit'		: 'Enviar',//'确定',
//	'cancel'		: 'Cancelar',//'取消',
//	'tile'			: 'Título',//'平铺',
//	'no_tile'		: 'Los mosaicos',//'不平铺',
//	'tile_hor'		: 'Mosaico horizontal',//'横向平铺',
//	'tile_ver'		; 'Mosaico vertical',//'纵向平铺',
	'onclick'		: 'onClic',//'点击',
	'onmouseover'		: 'onMouseover',//'滑过',
	'switch_type'		: 'Cambiar tipo',//'切换类型',
//	'title'			: 'Título',//'标题',
//	'link'			: 'Enlace',//'链接',
	'image'			: 'Imagen',//'图片',
	'position'		: 'Posición',//'位置',
	'align_left'		: 'Alinear a la izquierda',//'居左',
	'align_right'		: 'Alinear a la derecha',//'居右',
	'offset'		: 'Compensar',//'偏移量',
//	'font'			: 'Fuente',//'字体',
//	'size'			: 'Tamaño',//'大小',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Color',//'色',
	'add_new_title'		: 'Agregar nuevo título',//'添加新标题',
//	'edit'			: 'Editar',//'编辑',
//	'title'			: 'Título',//'标题',
//	'close'			: 'Cerrar',//'关闭',
//	'submit'		: 'Enviar',//'确定',
//	'cancel'		: 'Cancelar',//'取消',
	'delete_this_sure'	: '¿Está seguro de borrar? No se pueden restaurar si lo elimina.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: 'Cargando contenido...',//'正在加载内容...',
	'modified_import'	: 'Usted ha hecho algunas modificaciones, por favor importarlo después de guardarlo, de lo contrario los datos importados ganado\'t incluyen la modificación de este tiempo.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: 'Total ',//'共',
	'blocks'		: 'bloques',//'个模块',
	'updating_the'		: 'actualización #',//'正在更新第',
//	'ones'			: 'los',//'个',
	'done'			: 'hecho',//'已完成',
	'start_updating'	: 'iniciando la actualización...',//'开始更新...',
	'update_block_data'	: 'Actualización de datos del bloque',//'更新模块数据',
	'clear_diy_sure'	: '¿Está seguro de borrar la página actual datos DIY? No se pueden restaurar luego de borrar.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: 'Advertencia: El marco no se encuentra, por favor agregar el marco.',//'提示：未找到框架，请先添加框架。',
//	'warn_not_saved'	: 'Se han modificado los datos. Si sale, todos los cambios se perderán.',//'您的数据已经修改,退出将无法保存您的修改。',
	'apply_all_pages'	: 'Aplicar a todas las páginas de este tipo',//'应用于此类全部页面',
	'apply_current_page'	: 'Aplicar a la página actual',//'只应用于本页面',
	'save_temp_sure'	: 'Guardar los datos temporales?<br />Haga clic en Enviar para guardar los datos temporales, haga clic en Cancelar para eliminar los datos temporales.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: 'Guardar los datos temporales',//'保留暂存数据',
	'revert_last_saved'	: '¿Seguro que quiere volver a la versión anterior de los resultados guardados?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: 'Continuar DIY con datos temporales?',//'是否继续暂存数据的DIY？',
//	'warn_not_saved'	: 'Se han modificado los datos. Si sale, todos los cambios se perderán.',//'您的数据已经修改,退出将无法保存您的修改。',
	'update_completed'	: 'La actualización se ha completado.',//'已更新完成。',
	'tab_label'		: 'Ficha Etiqueta',//'tab标签',
	'temp_action'		: 'Haga clic en "Continuar" para cargar los datos temporales del estilo actual,<br />Haga clic en "Borrar" para eliminar los datos temporales.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: 'Continuar',//'继续',

//--------------------------------
//static/js/qshare.js
	'from_tencent'		: 'Yo vengo de microblogging Tencent una plataforma abierta',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: 'Nombre de usuario contiene caracteres inválidos',//'用户名包含敏感字符',
	'username_short'	: 'Nombre de usuario es menor de 2 caracteres',//'用户名小于 3 个字符',
	'username_long'		: 'Nombre de usuario es mayor de 15 caracteres',//'用户名超过 15 个字符',
	'passwords_not_equal'	: 'Las dos contraseñas no coinciden',//'两次输入的密码不一致',
	'email_invalid'		: 'E-mail contiene caracteres inválidos',//'Email 包含敏感字符',
	'invite_code_invalid'	: 'Código de invitación contiene caracteres inválidos',//'邀请码包含敏感字符',
	'password_fill'		: 'Por favor, rellene la contraseña',//'请填写密码',
	'password_again'	: 'Por favor, introduzca la contraseña de nuevo',//'请再次输入密码',
	'email_fill'		: 'Por favor, introduzca la dirección de correo electrónico',//'请输入邮箱地址',

//--------------------------------
//static/js/smilies.js

//---------------------------
//static/js/threadsort.js

	'select_please'		: 'Por favor seleccione',//'请选择',
	'required_fill'		: 'No ha rellenado los campos obligatorios',//'必填项目没有填写',
	'select_next_level'	: 'Por favor, seleccione el siguiente nivel',//'请选择下一级',
	'numeric_invalid'	: 'Valor numérico inválido',//'数字填写不正确',
	'email_invalid'		: 'Dirección de correo electrónico no es válida',//'邮件地址不正确',
	'text_too_long'		: 'El valor del campo es demasiado largo',//'填写项目长度过长',
	'value_is_greater'	: 'El valor es mayor de lo máximo',//'大于设置最大值',
	'value_is_less'		: 'El valor es inferior de lo mínimo',//'小于设置最小值',
//--------------------------------
//static/js/space_diy.js

//	'delete'		: 'Borrar',//'删除',
//	'attribute'		: 'Atributo',//'属性',
	'save_js'		: 'Guarde el Javascript después de mostrar',//'javascript脚本保存后显示',
	'settings'		: 'Configuración',//'设置',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: 'Lo sentimos, este tipo de archivo no es compatible',//'对不起，不支持上传此类文件',
//	'uploading'		: 'Cargando...',//'上传中...',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: 'En este momento está usando hasta al día la versión de Discuz! programa. Por favor, consulte los siguientes consejos para realizar las actualizaciones oportunas.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: 'Añadir a las operaciones más comunes',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: 'Google Maps',//'google图',
	'map_insert'		: 'Insertar Google Map',//'插入google地图',
	'map_insert_tips'	: 'Insertar Google Maps por la dirección de la búsqueda (admite sólo temporalmente sola etiqueta!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: 'El centro del mapa se cambia!',//'地图中心已经改变！',
	'map_wrong_address'	: 'Dirección equivocada! Dirección actual no se ha encontrado',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: ''

};
