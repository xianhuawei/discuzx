<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
 *      Translated to Spanish by jhoxi, discuzhispano.com
 */

define('UC_VERNAME', 'Versión Internacional');

$lang = array(
	'SC_GBK'		=> 'Simplified Chinese GBK encoding',//'简体中文版',
	'TC_BIG5'		=> 'Traditional Chinese BIG5 encoding',//'繁体中文版',
	'SC_UTF8'		=> 'Simplified Chinese UTF8 encoding',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditional Chinese UTF8 encoding',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',
	'ES_UTF8'		=> 'Español UTF-8',

	'title_install'		=> SOFT_NAME.' asistente de instalación',//SOFT_NAME.' 安装向导',
	'agreement_yes'		=> 'Estoy de acuerdo',//'我同意',
	'agreement_no'		=> 'No estoy de acuerdo',//'我不同意',
	'notset'		=> 'No se establece',//'不限制',//????? No limits, Not limited

	'message_title'		=> 'Recordar',//'提示信息',
	'error_message'		=> 'Mensaje de error',//'错误信息',
	'message_return'	=> 'Volver',//'返回',
	'return'		=> 'Volver',//'返回',
	'install_wizard'	=> 'Asistente de configuración',//'安装向导',
	'config_nonexistence'	=> 'Archivo de configuración no existe',//'配置文件不存在',
	'nodir'			=> 'El directorio no existe',//'目录不存在',
	'redirect'		=> 'Navegador redireccionará automáticamente a la página, sin la intervención humana.<br>A menos que su navegador no soporta frames, por favor haga clic aquí',//'浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'auto_redirect'		=> 'Navegador redireccionará automáticamente a la página, sin la intervención humana.',//'浏览器会自动跳转页面，无需人工干预',
	'database_errno_2003'	=> 'No se puede conectar a la base de datos, comprobar si la base de datos se ejecuta y la dirección del servidor de base de datos sea correcta.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> 'No se puede crear una nueva base de datos, por favor, compruebe el nombre de base de datos sea correcta.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> 'No se puede conectar a la base de datos, compruebe el nombre de usuario de base de datos y la contraseña sean correctos.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064'	=> 'Error de sintaxis SQL',//'SQL 语法错误',

	'dbpriv_createtable'	=> 'No hay premisos para CREAR TABLA, no puede continuar la instalación.',//'没有CREATE TABLE权限，无法继续安装',
	'dbpriv_insert'		=> 'No hay permisos para INSERTAR, no puede continuar con la instalación.',//'没有INSERT权限，无法继续安装',
	'dbpriv_select'		=> 'No hay privilegios para SELECCIONAR, no se puede continuar con la instalación.',//'没有SELECT权限，无法继续安装',
	'dbpriv_update'		=> 'No hay permisos para ACTUALIZAR, no puede continuar con la instalación.',//'没有UPDATE权限，无法继续安装',
	'dbpriv_delete'		=> 'No hay permisos para BORRAR, no se puede continuar la instalación.',//'没有DELETE权限，无法继续安装',
	'dbpriv_droptable'	=> 'No hay permisos DEJAR TABLA para instalar.',//'没有DROP TABLE权限，无法安装',

	'db_not_null'		=> 'Base de datos UCenter ya está instalado, continúe con la instalación borrará los datos antiguos.',//'数据库中已经安装过 UCenter, 继续安装会清空原有数据。',
	'db_drop_table_confirm'	=> 'Para continuar con la instalación que se requiere para borrar todos los datos antiguos, está seguro de que desea continuar?',//'继续安装会清空全部原有数据，您确定要继续吗?',

	'writeable'		=> 'Escribir',//'可写',
	'unwriteable'		=> 'NO escribir',//'不可写',
	'old_step'		=> 'Anterior',//'上一步',
	'new_step'		=> 'Siguiente',//'下一步',

	'database_errno_2003'	=> 'No se puede conectar a la base de datos, comprobar si la base de datos se ejecuta y la dirección del servidor de base de datos es correcto.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> 'No se puede crear una nueva base de datos, por favor, compruebe el nombre de base de datos sea correcta.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> 'No se puede conectar a la base de datos, compruebe el nombre de usuario de base de datos y la contraseña sean correctos.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_connect_error'	=> 'Base de datos error de conexión.',//'数据库连接错误',

	'step_title_1'		=> 'Compruebe el entorno',//'检查安装环境',
	'step_title_2'		=> 'Establecer el entorno',//'设置运行环境',
	'step_title_3'		=> 'Crear base de datos',//'创建数据库',
	'step_title_4'		=> 'Instalar',//'安装',
	'step_env_check_title'	=> 'Iniciar la instalación',//'开始安装',
	'step_env_check_desc'	=> 'Compruebe el entorno y los archivos/directorios permisos',//'环境以及文件目录权限检查',
	'step_db_init_title'	=> 'Instalación de base de datos',//'安装数据库',
	'step_db_init_desc'	=> 'Inicio de la instalación de DB',//'正在执行数据库安装',

	'step1_file'		=> 'Lista de archivos',//'目录文件',
	'step1_need_status'	=> 'Necesario',//'所需状态',
	'step1_status'		=> 'Estado',//'当前状态',
	'not_continue'		=> 'Por favor, trate de reparar las posiciones marcadas con una cruz roja',//'请将以上红叉部分修正再试',

	'tips_dbinfo'		=> 'Configuración de la información de base de datos',//'填写数据库信息',
	'tips_dbinfo_comment'	=> '',//'',
	'tips_admininfo'	=> 'Configuración de la información del administrador',//'填写管理员信息',
	'step_ext_info_title'	=> 'Instalado correctamente.',//'安装成功。',
	'step_ext_info_comment'	=> 'Haga clic aquí para introducir un nombre',//'点击进入登陆',

	'ext_info_succ'		=> 'Instalado con éxito.',//'安装成功。',
	'install_submit'	=> 'Aceptar',//'提交',
	'install_locked'	=> 'Instale el bloqueo se ha instalado.<br><br>Si usted seguro de que quiere volver a instalar, vaya al servidor y eliminar el archivo<br />'.str_replace(ROOT_PATH, '', $lockfile),//'安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Debe resolver los problemas anteriores, para continuar con la instalación.',//'您必须解决以上问题，安装才可以继续',

	'step_app_reg_title'	=> 'Configuración de entorno',//'设置运行环境',
	'step_app_reg_desc'	=> 'Compruebe el entorno del servidor, y establecer UCenter',//'检测服务器环境以及设置 UCenter',
	'tips_ucenter'		=> 'Por favor, complete la información para UCenter',//'请填写 UCenter 相关信息',
	'tips_ucenter_comment'	=> 'UCenter es el Comsenz inc. programa básico de servicios. Discuz! Board y otras aplicaciones Comsenz confían en este programa. Si ya ha instalado UCenter, por favor rellene el siguiente formulario. De lo contrario, por favor vaya a <a href="http://www.discuz.com/" target="blank">Comsenz Products</a> to download and install UCenter, and then continue.',//'UCenter 是 Comsenz 公司产品的核心服务程序，Discuz! Board 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。',

	'advice_mysql_connect'		=> 'Por favor, revise el módulo de mysql se ha cargado correctamente.',//'请检查 mysql 模块是否正确加载',
	'advice_fsockopen'		=> 'Esta función requiere la <b>allow_url_fopen</b> opción de ser <b>On</b> en php.ini. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_gethostbyname'		=> 'Configuración de PHP no está permitido el <b>gethostbyname</b> función. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> 'Esta función requiere la <b>allow_url_fopen</b> opción de <b>On</b> en php.ini. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml_parser_create'	=> 'Esta función requiere el apoyo para PHP XML. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',

	'ucurl'				=> 'UCenter URL',//'UCenter 的 URL',
	'ucpw'				=> 'UCenter contraseña de administrador',//'UCenter 创始人密码',
	'ucip'				=> 'UCenter dirección IP',//'UCenter 的IP地址',
	'ucenter_ucip_invalid'		=> 'Formato no válido, por favor, introduzca la dirección IP correcta',//'格式错误，请填写正确的 IP 地址',
	'ucip_comment'			=> 'En la mayoría de los casos, puede dejar el campo vacío',//'绝大多数情况下您可以不填',

	'tips_siteinfo'			=> 'Por favor, rellene la información del sitio',//'请填写站点信息',
	'sitename'			=> 'Nombre del sitio',//'站点名称',
	'siteurl'			=> 'URL del sitio',//'站点 URL',

	'forceinstall'			=> 'Instalación obligatoria',//'强制安装',
	'dbinfo_forceinstall_invalid'	=> 'Prefijo actual de la tabla de base de datos ya está siendo utilizado por la misma tabla de datos! Puede modificar el "Tabla de prefijo del nombre" para evitar la eliminación de los datos antiguos, u optar por la fuerza la instalación obligatoria. Instalación obligatoria se eliminarán todos los datos antiguos, y estos datos antiguos no se puede restaurar.',//'当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复',

	'click_to_back'			=> 'Haga clic para Volver',//'点击返回上一步',
	'adminemail'			=> 'E-Mail Administrativa',//'系统信箱 Email',
	'adminemail_comment'		=> 'Se utiliza para enviar informes de errores',//'用于发送程序错误报告',
	'dbhost_comment'		=> 'Servidor de base de datos de la dirección de host, por lo general es: localhost',//'数据库服务器地址, 一般为 localhost',
	'tablepre_comment'		=> 'Para el uso de múltiples aplicaciones con la misma base de datos, por favor, modifique el prefijo tabla',//'同一数据库运行多个论坛时，请修改前缀',
	'forceinstall_check_label'	=> 'Quiero borrar todos los datos, e iniciar la instalación obligatoria!',//'我要删除数据，强制安装 !!!',

	'uc_url_empty'			=> 'Usted tiene que llenar en la URL UCenter',//'您没有填写 UCenter 的 URL，请返回填写',
	'uc_url_invalid'		=> 'Formato UCenter URL no es válida',//'URL 格式错误',
	'uc_url_unreachable'		=> 'Dirección URL UCenter es inalcanzable, por favor revise',//'UCenter 的 URL 地址可能填写错误，请检查',
	'uc_ip_invalid'			=> 'No se puede resolver el nombre de dominio, por favor, introduzca la dirección IP del sitio',//'无法解析该域名，请填写站点的 IP',
	'uc_admin_invalid'		=> 'UCenter administrador contraseña no válida, por favor vuelve a llenar',//'UCenter 创始人密码错误，请重新填写',
	'uc_data_invalid'		=> 'UCenter error de comunicación. Compruebe la dirección URL UCenter sea correcta',//'通信失败，请检查 UCenter 的URL 地址是否正确 ',
	'uc_dbcharset_incorrect'	=> 'Base de datos UCenter conjunto de caracteres es incompatible con el conjunto de aplicaciones de caracteres actual',//'UCenter 数据库字符集与当前应用字符集不一致',
	'uc_api_add_app_error'		=> 'Sumado a error de aplicación UCenter',//'向 UCenter 添加应用错误',
	'uc_dns_error'			=> 'UCenter DNS de resolución de errores. Por favor regrese y complete la dirección IP UCenter',//'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址',

	'ucenter_ucurl_invalid'		=> 'URL UCenter formato vacío o incorrecto, por favor revise',//'UCenter 的URL为空，或者格式错误，请检查',
	'ucenter_ucpw_invalid'		=> 'UCenter contraseña del administrador está en blanco, o los errores de formato, por favor revise',//'UCenter 的创始人密码为空，或者格式错误，请检查',
	'siteinfo_siteurl_invalid'	=> 'La URL del sitio está en blanco, o los errores de formato, por favor revise',//'站点URL为空，或者格式错误，请检查',
	'siteinfo_sitename_invalid'	=> 'El nombre del sitio es el formato vacío o incorrecto, por favor revise',//'站点名称为空，或者格式错误，请检查',
	'dbinfo_dbhost_invalid'		=> 'Servidor de base de datos está vacía, o mal formato, por favor revise',//'数据库服务器为空，或者格式错误，请检查',
	'dbinfo_dbname_invalid'		=> 'Nombre de la base de datos está vacía, o mal formato, por favor revise',//'数据库名为空，或者格式错误，请检查',
	'dbinfo_dbuser_invalid'		=> 'Nombre de usuario de base de datos está en blanco, o un error de formato, por favor revise',//'数据库用户名为空，或者格式错误，请检查',
	'dbinfo_dbpw_invalid'		=> 'Contraseña de la base de datos está en blanco, o un error de formato, por favor revise',//'数据库密码为空，或者格式错误，请检查',
	'dbinfo_adminemail_invalid'	=> 'El sistema del sitio dirección de correo electrónico está vacío, o error de formato, por favor revise',//'系统邮箱为空，或者格式错误，请检查',
	'dbinfo_tablepre_invalid'	=> 'Prefijo de la tabla está en blanco, o un error de formato, por favor revise',//'数据表前缀为空，或者格式错误，请检查',
	'admininfo_username_invalid'	=> 'Nombre de usuario administrador está en blanco, o un error de formato, por favor revise',//'管理员用户名为空，或者格式错误，请检查',
	'admininfo_email_invalid'	=> 'Email del administrador está en blanco, o un error de formato, por favor revise',//'管理员Email为空，或者格式错误，请检查',
	'admininfo_password_invalid'	=> 'Contraseña de administrador está en blanco, por favor, rellene',//'管理员密码为空，请填写',
	'admininfo_password2_invalid'	=> 'Las contraseñas no son iguales, por favor revise',//'两次密码不一致，请检查',

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> Nuevo Discuz! X instalación (incluyendo UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 全新安装 Discuz! X (含 UCenter Server)</label>',
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Instalar Discuz! X sólo (especificar de forma manual la instalada UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> 仅安装 Discuz! X (手工指定已经安装的 UCenter Server)</label>',

	'username'			=> 'Nombre de usuario de Administrador',//'管理员账号',
	'email'				=> 'Administrador Email',//'管理员 Email',
	'password'			=> 'Contraseña de administrador',//'管理员密码',
	'password_comment'		=> 'Contraseña de administrador no puede estar vacío',//'管理员密码不能为空',
	'password2'			=> 'Repita su contraseña',//'重复密码',

	'admininfo_invalid'		=> 'Información del administrador no está completa, compruebe el nombre de usuario de administrador, contraseña, email',//'管理员信息不完整，请检查管理员账号，密码，邮箱',
	'dbname_invalid'		=> 'Nombre de la base de datos está vacía, por favor, escriba el nombre de base de datos',//'数据库名为空，请填写数据库名称',
	'tablepre_invalid'		=> 'Prefijo de la tabla está en blanco o un error de formato, por favor consulte',//'数据表前缀为空，或者格式错误，请检查',
	'admin_username_invalid'	=> 'Nombre de usuario ilegal! Longitud de nombre de usuario no debe ser mayor de 15 caracteres en español, y no puede contener caracteres especiales, como las letras o números chinos',//'非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字',
	'admin_password_invalid'	=> 'Contraseña y las discrepancias anteriormente, por favor vuelve a entrar',//'密码和上面不一致，请重新输入',
	'admin_email_invalid'		=> 'La dirección email utilizada es válida o el formato no es válido, por favor, cambie a otra dirección',//'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址',
	'admin_invalid'			=> 'Usted no completó la información del administrador completa, por favor, rellene cuidadosamente en cada punto',//'您的信息管理员信息没有填写完整，请仔细填写每个项目',
	'admin_exist_password_error'	=> 'Este usuario ya existe. Si desea establecer este usuario como administrador, por favor ingrese la contraseña correcta para el usuario, o cambiar el nombre del administrador',//'该用户已经存在，如果您要设置此用户为论坛的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字',

	'tagtemplates_subject'		=> 'Título',//'标题',
	'tagtemplates_uid'		=> 'Usuario ID',//'用户 ID',
	'tagtemplates_username'		=> 'Publicado por',//'发帖者',
	'tagtemplates_dateline'		=> 'Fecha',//'日期',
	'tagtemplates_url'		=> 'URL de plantillas',//'主题地址',

	'uc_version_incorrect'		=> 'Su versión del servidor UCenter es antiguo. Por favor, actualice el servicio UCenter Español a la última versión. dirección de descarga: http://www.discuzhispano.com/.',//'您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。',
	'config_unwriteable'		=> 'Asistente de instalación no puede escribir en el fichero de configuración. permitir que el config.inc.php permisos de escritura (666 o 777)',//'安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)',

	'install_in_processed'		=> 'Instalación ...',//'正在安装...',
	'install_succeed'		=> 'Instalado correctamente! Haga clic aquí para entrar en su Discuz! X2',//'安装成功，点击进入',
	'install_cloud'			=> 'Una vez instalado, Bienvenidos a la apertura Discuz! plataforma de nube<br>Discuz! Plataforma en la nube dedicada a ayudar a propietarios de sitios web para aumentar su tráfico de sitios web, mejorar la capacidad de los operadores de sitios Web, e incrementar los ingresos un sitio web.<br>Discuz! Plataforma en la nube en la actualidad ofrece un servicio gratuito QQ Internet, Análisis de Tencent, Nube de búsqueda, QQ Grupo de la Comunidad,Roaming,SOSO emoticon servicios.Discuz! Plataforma en la nube seguirá ofreciendo más servicios de calidad para el proyecto.<br>Antes de abrir la Plataforma Discuz! debe asegurarse de que su sitio web (Discuz!, UCHome o SupeSite) ha sido actualizado para Discuz! X2.',//'安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。',
	'to_install_cloud'		=> 'Abrir Panel-Admin',//'到后台开通',
	'to_index'			=> 'No abrir temporalmente',//'暂不开通',

	'init_credits_karma'	=> 'Reputación',//'威望',//!!! The same in install_var.php
	'init_credits_money'	=> 'Puntos',//'金钱',//!!! The same in install_var.php

	'init_postno0'		=> '#1',//'楼主',//!!! The same in install_var.php 
	'init_postno1'		=> '#2',//'沙发',    //!!! The same in install_var.php
	'init_postno2'		=> '#3',//'板凳',   //!!! The same in install_var.php
	'init_postno3'		=> '#4',//'地板',   //!!! The same in install_var.php

	'init_support'		=> 'Digg',//'支持',   //!!! The same in install_var.php
	'init_opposition'	=> 'Ocultar',//'反对',//!!! The same in install_var.php

	'init_group_0'	=> 'Miembro',//'会员',
	'init_group_1'	=> 'Administrador',//'管理员',
	'init_group_2'	=> 'Super Moderador',//'超级版主',
	'init_group_3'	=> 'Moderador',//'版主',
	'init_group_4'	=> 'I/O Miembro',//'禁止发言',
	'init_group_5'	=> 'Baneado',//'禁止访问',
	'init_group_6'	=> 'IP Baneado',//'禁止 IP',
	'init_group_7'	=> 'Invitado',//'游客',
	'init_group_8'	=> 'Espere a la verificación',//'等待验证会员',
	'init_group_9'	=> 'Novato',//'乞丐',
	'init_group_10'	=> 'Menor',//'新手上路',
	'init_group_11'	=> 'Miembro',//'注册会员',
	'init_group_12'	=> 'Miembro medio',//'中级会员',
	'init_group_13'	=> 'Miembro mayor',//'高级会员',
	'init_group_14'	=> 'Miembro de Oro',//'金牌会员',
	'init_group_15'	=> 'Veterano',//'论坛元老',

	'init_rank_1'	=> 'Principiante',//'新生入学',
	'init_rank_2'	=> 'Aprendiz',//'小试牛刀',
	'init_rank_3'	=> 'Interno',//'实习记者',
	'init_rank_4'	=> 'Escritor independiente',//'自由撰稿人',
	'init_rank_5'	=> 'Escritor distinguido',//'特聘作家',

	'init_cron_1'	=> 'hoy vacías\'s número de post',//'清空今日发帖数',
	'init_cron_2'	=> 'Vacíos de este mes\'s tiempo en línea',//'清空本月在线时间',
	'init_cron_3'	=> 'Datos diarios de limpieza',//'每日数据清理',
	'init_cron_4'	=> 'Estadísticas de cumpleaños y suscripciones por e-mail',//'生日统计与邮件祝福',
	'init_cron_5'	=> 'Notificaciones Tema respuesta',//'主题回复通知',
	'init_cron_6'	=> 'Boletín diario de limpieza',//'每日公告清理',
	'init_cron_7'	=> 'Limitado en el tiempo la operación de limpieza',//'限时操作清理',
	'init_cron_8'	=> 'Promoción de la limpieza de los mensajes',//'论坛推广清理',
	'init_cron_9'	=> 'Tema mensual de limpieza',//'每月主题清理',
	'init_cron_10'	=> 'Actualización diaria Espacio X-usuarios',//'每日 X-Space更新用户',
	'init_cron_11'	=> 'Actualización del tema semanal',//'每周主题更新',

	'init_bbcode_1'	=> 'Por lo que el contenido de desplazamiento horizontal, el efecto es similar a las etiquetas HTML marquesina, Nota: Este efecto sólo es válida en Internet Explorer.',//'使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。',
	'init_bbcode_2'	=> 'Incorporado animaciones Flash',//'嵌入 Flash 动画',
	'init_bbcode_3'	=> 'Muestran el estado de QQ en línea, haga clic en este icono y charlar con los él/ella',//'显示 QQ 在线状态，点这个图标可以和他（她）聊天',
	'init_bbcode_4'	=> 'Sobrescrito',//'上标',
	'init_bbcode_5'	=> 'Subíndice',//'下标',
	'init_bbcode_6'	=> 'Windows Integrado Media Audio',//'嵌入 Windows media 音频',
	'init_bbcode_7'	=> 'Windows Integrado archivos de audio o de vídeo',//'嵌入 Windows media 音频或视频',

	'init_qihoo_searchboxtxt'		=> 'Palabras clave de entrada para la búsqueda rápida en este foro',//'输入关键词,快速搜索本论坛',
	'init_threadsticky'			=> 'Pegar objeto: Global top, Categoría Top, Este foro top',//'全局置顶,分类置顶,本版置顶',

	'init_default_style'			=> 'Estilo por defecto',//'默认风格',
	'init_default_forum'			=> 'Foro por defecto',//'默认版块',
	'init_default_template'			=> 'Plantilla por defecto',//'默认模板套系',
	'init_default_template_copyright'	=> 'Sing Imagination (Beijing) Technology Co., Ltd.',//'康盛创想（北京）科技有限公司',

	'init_dataformat'	=> 'A-m-d',//'Y-n-j',
	'init_modreasons'	=> 'Publicidad/SPAM\r\nMalicioso/Piratería\r\nContenido ilegal\r\nOfftopic\r\nPost repetidos\r\n\r\nEstoy de acuerdo\r\nExcelente artículo\r\nContenido original',//'广告/SPAM\r\n恶意灌水\r\n违规内容\r\n文不对题\r\n重复发帖\r\n\r\n我很赞同\r\n精品文章\r\n原创内容',
	'init_userreasons'	=> 'Poderoso!\r\nÚtil\r\nMuy bueno\r\nLo mejor!\r\nInteresante',
	'init_link'		=> 'Discuz! Foro Oficial',//'Discuz! 官方论坛',
	'init_link_note'	=> 'Para proporcionar la última Discuz! Noticias de productos, descargas de software y el intercambio técnico',//'提供最新 Discuz! 产品新闻、软件下载与技术交流',

	'init_promotion_task'	=> 'Sitio Web labor de promoción',//'网站推广任务',
	'init_gift_task'	=> 'Regalo de tareas de inicio',//'红包类任务',
	'init_avatar_task'	=> 'Avatar de Trabajo',//'头像类任务',

	'license'	=> '<div class="license"><h1>Acuerdo de licencia</h1>

<p>Derechos de autor (c) 2001-2010, Hong Sing Imagination (Beijing) Technology Co., Ltd. Todos los derechos reservados.</p>

<p>Gracias por elegir Discuz! foro. Esperamos que nuestro producto será capaz de ofrecerle una solución rápida, foro de la comunidad eficiente y potente.</p>

<p>Discuz! Español nombre completo Discuz! Board, Nombre y apellidos chinos Discuz! Foro, en lo sucesivo, Discuz!.</p>

<p>Sing Imagination (Beijing) Technology Co., Ltd. para el Discuz! los desarrolladores de productos, y tendrán Discuz! producto de Derechos de Autor (China Nacional de Derecho de la Administración del Derecho de Autor Registro No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. sitio web http://www.comsenz.com, Discuz! Dirección del sitio web oficial es http://www.discuz.com, Discuz! Sitio en el foro oficial http://www.discuz.net.</p>

<p>Discuz! los derechos de autor ha sido registrada en La gente\'s República de China Nacional de Derecho de la Administración, la ley de copyright y por tratados internacionales. Usuario: si los individuos u organizaciones, la utilidad o no, el uso de (incluidos los fines de estudio e investigación), están obligados a leer atentamente el presente acuerdo, entender, aceptar y cumplir con todos los términos de este acuerdo sólo después de empezar a usar el programa Discuz!.</p>

<p>Esta Licencia se aplica y se aplica solamente tiene Discuz! X versión, Hong Sing Imagination (Beijing) Technology Co., Ltd. tiene el poder de interpretación definitiva del contrato de licencia.</p>

<h3>I. Licencia de derechos de acuerdo</h3>
<ol>
<li>Usted puede cumplir cabalmente con el acuerdo de licencia de usuario final, basado en el software utilizado en este uso no comercial, sin tener que pagar los honorarios de licencias de software de derechos de autor.</Li>
<li>Acuerdo que puede dentro de las restricciones y limitaciones modificar Discuz! código fuente (si existe) o la interfaz de estilos para adaptarse a sus requisitos del sitio.</Li>
<li>Usted tiene que utilizar este software para crear el foro toda la información de miembros, artículos e información relacionados con la propiedad, y es independiente del compromiso y las obligaciones legales relacionadas con el contenido del artículo.</Li>
<li>Una licencia comercial, usted puede usar este software para aplicaciones comerciales, mientras que según el tipo de licencia adquirida para determinar el período de soporte técnico, soporte técnico, la forma de apoyo técnico y de contenido, desde el momento de la compra, dentro del período de soporte técnico tienen una manera de conseguir a través de las áreas especificadas designados de servicios de soporte técnico. Los usuarios de negocios autorizados tienen el poder de reflexionar y comentar, las observaciones pertinentes serán la consideración primordial, pero no necesariamente ser aceptada promesa o garantía.</Li>
</ol>

<h3>II. Acuerdo de las restricciones y limitaciones</h3>
<ol>
<li>Licencia comercial no ha existido antes, no puede utilizar este software con fines comerciales (incluyendo pero no limitado a los sitios de negocios, operaciones comerciales, con fines comerciales o sitio web de beneficios). Compra de licencia comercial, por favor visite http://www.discuz.com instrucciones de referencia, llame al 8610-51657885 para más detalles.</Li>
<li>No puede asociarse con el software o la licencia de negocios para el alquiler, venta, hipoteca o conceder sublicencias.</Li>
<li>En cualquier caso, que no importa lo utiliza, ya sea modificado o jardinería, hasta qué punto los cambios, sólo tiene que utilizar Discuz! la totalidad o cualquier parte, sin el permiso escrito del Foro de pie de página del Departamento de Discuz! nombre y Sing Imagination (Beijing) Technology Co., Ltd. sitio web afiliado (http://www.comsenz.com, http://www.discuz.com o http://www.discuz.net) El enlace debe ser conservado, no la supresión o modificación.</Li>
<li>Prohibido Discuz! la totalidad o parte de la base para el desarrollo de cualquier versión derivada, versión modificada o versión de terceros para la redistribución.</Li>
<li>Si usted no cumplió con los términos de este Acuerdo, la licencia se dará por terminado, los derechos de licencia se recuperará, y asumir la responsabilidad legal correspondiente.</Li>
</ol>

<h3>III. Garantía limitada y exención de responsabilidad</h3>
<ol>
<li>El software y los documentos que acompañan, como no proporcionar ninguna garantía expresa o implícita, ni la garantía en forma de la indemnización prevista.</li>
<li>El uso del usuario voluntario de este software, usted debe entender los riesgos de usar este software, los servicios técnicos en el no comprar productos que antes, no promete ofrecer todo tipo de apoyo técnico, el uso de garantías, ni responsable de cualquier uso de este software relacionados con la responsabilidad que se derive problemas.</li>
<li>Hong Sing Compañía no utilizar el software para construir un sitio web o foro publicar o responsable de la información, usted asume la responsabilidad.</li>
<li>Hong Sing Compañía proporciona software y servicios de manera oportuna, la seguridad, la precisión no está garantizada, debido a fuerza mayor, Hong Sing factores fuera del control de la empresa (incluyendo ataques de hackers, la potencia de frenado, etc.) causado por el software y los servicios de suspensión o terminación, y dar a sus pérdidas, usted se compromete a cantar la renuncia de responsabilidad corporativa de todos los derechos.</li>
<li>Hong Sing Compañía específicamente llamar su atención Hong Sing Compañía con el fin de proteger el desarrollo de negocios y el ajuste de la autonomía, Hong Sing Compañía tiene en cualquier momento con o sin previo aviso a modificar el contenido del servicio, suspender o cancelar parte o la totalidad de los derechos de software y servicios, los cambios se publicarán en las páginas relevantes de los sitios más, incluso sin previo aviso. Hong Sing Compañía de modificar o suspender el ejercicio, la terminación de algunos o todos de los derechos de software y servicios resultantes de la pérdida, sin Hong Sing Compañía a usted o a cualquier tercero.
</li>
</ol>


<p>Hong Sing productos de la licencia de usuario final acuerdo de licencia de negocios, y servicios técnicos a los datos facilitados por la Hong Sing exclusivo. Sing la empresa tiene sin previo aviso, modificar el contrato de licencia y la lista de servicios de precio justo para el acuerdo de modificación o lista de precios por el cambio de la fecha del nuevo usuario autorizado a entrar en vigor.</p>
<p>Una vez que comience la instalación Hong Sing productos, Se considerará que entender y aceptar los términos de este Acuerdo, los términos en el goce de los derechos reconocidos en el mismo tiempo, las limitaciones y restricciones pertinentes. Acuerdo de licencia fuera del alcance de los actos sería una violación directa de este contrato de licencia y constituye una infracción, tenemos el derecho de suspender la autorización, se ordenó detener el daño, y retener el poder de investigar las responsabilidades correspondientes.</p>
<p>La interpretación de los términos del contrato de licencia, la validez y la solución de controversias, aplicables a la población del continente\'s República de la ley.</p>
<p>Entre Hong Sing si usted y cualquier disputa o controversia, primero debe ser resuelta a través de consultas amistosas, la consulta falla, usted está de acuerdo en someter la controversia o polémica Sing Popular del distrito de la gente\'s Corte de las competencias. Hong Sing Compañía tiene el derecho de interpretar los términos anteriores y discreción.</p>
</div>',

	'uc_installed'		=> 'Ha instalado el UCenter. Si necesita volver a instalar, eliminar el data/install.lock archivo',//'您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件',
	'i_agree'		=> 'He leído y estoy de acuerdo con todos los elementos de las Condiciones',//'我已仔细阅读，并同意上述条款中的所有内容',
	'supportted'		=> 'Soportado',//'支持',
	'unsupportted'		=> 'No Soportado',//'不支持',
	'max_size'		=> 'Soportado/Max tamaño',//'支持/最大尺寸',
	'project'		=> 'Proyecto',//'项目',
	'ucenter_required'	=> 'Necesario',//'Discuz! 所需配置',
	'ucenter_best'		=> 'Recomendados',//'Discuz! 最佳',
	'curr_server'		=> 'Servidor actual',//'当前服务器',
	'env_check'		=> 'Compruebe el entorno',//'环境检查',
	'os'			=> 'Sistema operativo',//'操作系统',
	'php'			=> 'Versión PHP',//'PHP 版本',
	'attachmentupload'	=> 'Subir adjunto',//'附件上传',
	'unlimit'		=> 'Sin límite',//'不限制',
	'version'		=> 'Versión',//'版本',
	'gdversion'		=> 'GD Biblioteca',//'GD 库',
	'allow'			=> 'Permitir',//'允许',
	'unix'			=> 'Unix-like',//'类Unix',
	'diskspace'		=> 'Espacio en disco',//'磁盘空间',
	'priv_check'		=> 'Busque en el directorio/archivo permisos',//'目录、文件权限检查',
	'func_depend'		=> 'Comprobación de las dependencias función',//'函数依赖性检查',
	'func_name'		=> 'Nombre de la función',//'函数名称',
	'check_result'		=> 'Compruebe el resultado',//'检查结果',
	'suggestion'		=> 'Recomendación',//'建议',
	'advice_mysql'		=> 'Por favor, consulte el módulo de mysql se ha cargado correctamente',//'请检查 mysql 模块是否正确加载',
	'advice_fopen'		=> 'Esta función requiere la <b>allow_url_fopen</b> opción de ser <b>On</b> en php.ini. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> 'Esta función requiere la <b>allow_url_fopen</b> opción de ser <b>On</b> en php.ini. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml'			=> 'Esta función requiere el apoyo para PHP XML. Por favor, póngase en contacto con el administrador del servidor para resolver este problema.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',
	'none'				=> 'Ninguno',//'无',

	'dbhost'		=> 'Servidor de la DB',//'数据库服务器',
	'dbuser'		=> 'Nombre de usuario de la DB',//'数据库用户名',
	'dbpw'			=> 'Contraseña de la DB',//'数据库密码',
	'dbname'		=> 'Nombre de la DB',//'数据库名',
	'tablepre'		=> 'Tabla de prefijos',//'数据表前缀',

	'ucfounderpw'		=> 'UCenter contraseña de admin',//'创始人密码',
	'ucfounderpw2'		=> 'Repita UCenter contraseña de admin',//'重复创始人密码',

	'init_log'		=> 'Inicializar registro',//'初始化记录',
	'clear_dir'		=> 'Limpiar directorio',//'清空目录',
	'select_db'		=> 'Seleccione la base de datos',//'选择数据库',
	'create_table'		=> 'Crear tabla',//'建立数据表',
	'succeed'		=> 'Éxito',//'成功 ',

	'testdata'			=> 'Agregar regiones de datos',//'附加数据',
	'testdata_check_label'		=> 'Instalar otros datos regionales (countries/regions/cities)',//'Install demo page templates (4)',
	'portalstatus'			=> 'Estado del Portal',
	'portalstatus_check_label'	=> '',
	'groupstatus'			=> 'Estado de Grupo',
	'groupstatus_check_label'	=> '',
	'homestatus'			=> 'Estado de Inicio',
	'homestatus_check_label'	=> '',
	'install_data'			=> 'Datos instalados con éxito',//'正在安装数据',
	'install_test_data'		=> 'Instalación de los datos regionales',//'正在安装附加数据',

	'method_undefined'		=> 'Método indefinido',//'未定义方法',
	'database_nonexistence'		=> 'Objeto de base de datos no existe',//'数据库操作对象不存在',
	'skip_current'			=> 'Saltar este paso',//'跳过本步',
	'topic'				=> 'Tema',//'专题',
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> 'Bienvenido a la Instalación de Discuz! X',
	'select_language'		=> '<b>Seleccione el idioma de instalación</b>:',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Agregar datos de regiones',//'Add location data',
//vot	'regiondata_check_label'	=> 'Instalar otros datos regionales (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Instalación de los datos regionales',//'Install regional data',

//---------------------------------------------------------------



);

$msglang = array(
	'config_nonexistence'	=> 'Su config.inc.php archivo no existe. No se puede continuar con la instalación, utilice el FTP para subir el archivo y vuelva a intentarlo.',//'您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
);

?>