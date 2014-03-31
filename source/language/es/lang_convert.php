<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *      Convert Language File
 *      $Id: lang_convert.php by Valery Votintsev at sources.ru
 *	Translated to Spanish by razor007, discuzhispano.com
 */
$lang = array(

	'config_dbhost'		=> 'Servidor de la base de datos',//'数据库服务器',
	'config_dbuser'		=> 'Nombre de usuario de la base de datos',//'数据库用户名',
	'config_dbpw'		=> 'Contraseña de la base de datos',//'数据库密码',
	'config_dbname'		=> 'Nombre de la base de datos',//'数据库',
	'config_tablepre'	=> 'Prefijo de la tabla',//'数据表前缀',
	'config_dbcharset'	=> 'Base de datos formato de los caracteres (opcional)',//'数据表字符集 (可选)',
	'config_pconnect'	=> 'Conexion persistente',//'持久连接',

	'config_type_source'	=> 'Ajustes de la fuente de base de datos (La versión original de la base de datos)',//'数据源服务器设置 (原始版本的数据库)',
	'config_type_target'	=> 'La configuración de destino de base de datos (instalado correctamente Discuz! Base de datos de X)',//'目标服务器设置 (已正确安装 Discuz! X 的数据库)',
	'config_type_ucenter'	=> ' Configuración del servidor para UCenter (instalado correctamente UCenter en la base de datos)',//'UCenter 服务器设置 (已正确安装 UCenter 的数据库)',

	'config_type_target_comment'	=> 'Nota: La base de datos de destino será reemplazado o actualizado los datos, ya que estos contienen la información importante, por favor haga una copia de seguridad antes',//'注意：目标数据库的数据将会被替换或者更新,如当中含有重要内容,请先备份',
	'config_write_error'	=> 'datos/directorio no se puede escribir, por favor asegúrese de que este directorio tiene permisos de escritura, establecer los permisos de 777',//'转换程序的 data/ 目录不可写,请确保此目录的可写权限,设置 777 属性',

	'config_save'		=> 'Guardar la configuración del servidor',//'保存服务器设置',
	'config_usergroup'	=> 'Configuración de el usuario del grupo',//'用户组配置',
	'config_from_usergroup'	=> 'Fuente grupo de usuarios',//'来源用户组',
	'config_target_usergroup'	=> 'Dirigido a un grupo de usuarios',//'目标用户组',
	'config_extcredits'	=> 'Configuración extendida de puntos ',//'积分配置',
	'config_credit'		=> 'puntos',//'积分',
	'config_from_credit'	=> 'Origen de los puntos ',//'来源积分',
	'config_target_credit'	=> 'De destino de los puntos ',//'目标积分',
	'config_experience'	=> 'Valor de la experiencia',//'经验值',
	'config_convert_forum'	=> 'Conversión de datos de la configuración del foro',//'数据转换配置',
	'config_from_data'	=> 'Datos de origen',//'源数据',
	'config_target_forum'	=> 'Objetivo Foro',//'目标版块',
	'config_poll'		=> 'Encuestas',//'投票',
	'config_event'		=> 'Eventos',//'活动',
	'config_auto_create'	=> 'Creado-automatico',//'自动创建',
	'config_convert'	=> 'Guardar la configuración de la conviercion',//'保存转换配置',

	'submit'		=> 'Enviar',//'提  交',

	'message_return'	=> 'Volver atras',//'返回上一步',
	'message_stop'		=> 'Alto',//'停止运行',
	'message_not_enabled_extcredit'	=> 'En el nuevo sistema debe estar abierto al menos características puntos, de lo contrario el siguiente paso no se puede convertir',//'新系统中至少应开启一个积分,否则无法进行下一步转换',

	'ok'			=> '&nbsp;&nbsp;OK&nbsp;&nbsp;',//'&nbsp;确&nbsp;&nbsp;定&nbsp;',
	'cancel'		=> '&nbsp;Cancel&nbsp;',//'&nbsp;取&nbsp;消&nbsp;',
	'return'		=> 'Volver',//'请返回',
	'tips'			=> 'Sugerencias',//'技巧提示',
	'tips_pconnect'		=> 'Nota: Si la base de datos de origen y la base de datos de destino se colocan en el mismo servidor, configurar esta opción a 0, de lo contrario establecido en 1',//'注意：如果源数据库与目标数据库在同一服务器，该项必须设置为0，否则设置为1',

	'mysql_config_error'	=> 'La configuración de MySQL no puede estar vacío',//'配置不能为空',
	'mysql_connect_error'	=> 'La conexión con MySQL fallo',//'连接失败',

	'config_success'	=> 'Servidor configurado correctamente, y ahora ve al siguiente paso',//'服务器配置成功,现在进行下一步',

	'setting_tips'		=> 'Modificar la configuración de la conversión puede causar una baja eficiencia de la conversión o no llega a completar la conversión, por tanto, tenga cuidado al modificar',//'修改转换程序设置可能导致您的转换效率降低或者无法正常完成转换,所以请您务必小心修改',

	'mysql_connect_error_1'	=> 'Error conexión a bases de datos, comprobar si la cuenta de base de datos y la contraseña son correctos.',//'数据库连接错误,请检查数据库密码和帐号是否正确',
	'mysql_connect_error_2'	=> 'Las tablas de datos ha fallado. Puede ser, no tiene correctamente cumplimentados el prefijo "cuadro", o no se ha instalado la versión más reciente del programa',//'数据表检查错误,您可能没有正确填写 “数据表前缀”或者您尚未安装该版本的程序',

//---------------------------
	'invalid_request'	=> 'Petición no permitida',//'非法请求',

//---------------------------
//convert/include/do_config.inc.php

	'config_delete'			=> 'Si no puede mostrar la configuración del programa, elimine los datos del fichero/config.inc.php',//'如果无法显示设置项目,请删除文件 data/config.inc.php',

//---------------------------
//convert/include/do_convert.inc.php

	'select_convert_process'	=> 'Por favor, seleccione primero el proceso de conversión',//'请首先选择转换程序',
	'update_start_time'	=> 'Actualizar la hora de inicio:',//'升级开始时间：',
	'elapsed_time'		=> 'Procedimiento de actualización se ha llevado a cabo',//'升级程序已经执行了',
	'days'			=> 'Dias',//'天',
	'hours'			=> 'Horas',//'小时',
	'minutes'		=> 'Minutos',//'分',
	'seconds'		=> 'Segundos',//'秒',
	'progress'		=> 'Conversión en progreso',//'目前正在执行转换程序',
	'progress_intro1'	=> 'El proceso de conversión debe redirigir varias veces, no cierre su navegador!',//'转换过程中需要多次跳转,请勿关闭浏览器.',
	'progress_intro2'	=> 'Si el programa se interrumpe o necesidad de iniciar de nuevo el programa actual, por favor haga clic en',//'如果程序中断或者需要重新开始当前程序,请点击',
	'restart'		=> 'Reiniciar',//'重新开始',
	'process_finished'	=> 'Proceso de conversión es terminado, ahora salta al siguiente proceso',//'转换程序 执行完毕, 现在跳转到下一个程序',
	'process_not_found'	=> 'Transferencia de datos interrumpido! Proceso de conversión no se puede encontrar: ',//'数据转换中断! 无法找到转换程序 ',
	'process_all_finished'	=> 'Todos los procesos de conversión han sido terminados',//'转换程序全部运行完毕',

//---------------------------
//convert/include/do_finish.inc.php

	'conversion_completed'	=> 'Usted ha completado con éxito la conversión de datos!',//'您已经顺利的完成了数据转换!',
	'start_time'		=> 'La actualización en momento el momento del inicio',//'本次升级开始时间',
	'end_time'		=> 'La actualización final de los tiempos',//'本次升级结束时间',
	'execution_time'	=> 'Tiempo de total de la actualización',//'升级累计执行时间',
	'update_more'		=> 'En circunstancias normales, puede que también tenga que siga las instrucciones para actualizar, así que la vuelta al funcionamiento normal de su nuevo programa',//'通常情况下,您可能还需要按照以下提示继续进行升级,从而使您的新程序正常运行',
	'read_me'		=> 'Por último, lea las instrucciones (readme)',//'最后的说明(readme)',

//---------------------------
//convert/include/do_select.inc.php

	'you_selected'		=> 'Tu has selecionado',//'您选择了',
	'process_number'	=> 'los procesos de conversión, la conversión de inicio siguiente',//'个转换程序,下面开始转换',
	'process_intro'		=> 'Por lo general, todos los datos que usted necesita para llevar a cabo la siguiente tabla de conversión, a menos que esté en el curso de una perturbación inesperada o con necesidades especiales, elegir sólo si es necesario',//'通常情况下,您需要执行下面所有数据表的转换,除非您在执行过程中出现了意外的中断或者有特殊需求,才进行必要的选择',
	'process_configure'	=> 'Configurar el proceso de conversión',//'配置转换过程',
	'select_all'		=> 'Selecionar todos',//'全选',
	'run_before_convert'	=> 'Ejecutar programas antes de la conversión',//'转换之前运行的程序',
	'table_convert'		=> 'Tabla proceso de conversión',//'数据表转换程序',
	'other_convert'		=> 'Otro proceso de conversión',//'其他辅助转换程序',
	'start_conversion'	=> 'Inicar la conversion',//'开始转换',

//---------------------------
//convert/include/do_setting.inc.php

	'edit_file'		=> 'Editar el archivo',//'编辑配置文件',
	'r/o'			=> ' Leerlo solamente ',//' 只读 ',
	'settings_saved_ok'	=> 'Los ajustes han sido actualizados y se guardaron correctamente',//'设置已经更新完毕并成功保存',
	'file_is_ro'		=> 'El archivo de configuración está modo de sólo lectura, no puede guardar, por favor vuelve',//'该设置文件为只读文件,无法保存,请返回',
	'settings_not_changed'	=> 'No se realizó ningún cambio de configuración',//'您没有改变任何设置',

//---------------------------
//convert/include/do_source.inc.php

	'update_permissions'	=> 'Para iniciar la conversión, asegúrese de que el programa directorio de datos y los archivos bajo el directorio tiene permisos de escritura, o el programa no puede guardar configuraciones convierte',//'在开始转换之前,请确保本程序目录下的 data 目录为可写权限,否则无法存储转换设置',
	'update_forum_too'	=> 'Si no hay Discuz! Y UChome también necesitará actualizar, asegúrese de actualizar Discuz! Foro',//'如果有Discuz!和UChome同时需要升级,请务必先升级Discuz!论坛',
	'update_choose_process'	=> 'Por favor elija correctamente el proceso de conversión, o puede causar no se pueden convertir con éxito',//'请正确选择转换程序,否则可能造成无法转换成功',
	'update_more_space'	=> 'El proceso de conversión no destruye los datos originales, por lo que la conversión requiere 2 veces más espacio que el dato original espacio',//'本转换程序不会破坏原始数据,所以转换需要2倍于原始数据空间',
	'source_version'	=> 'Versión original',//'原始版本',
	'target_version'	=> 'Objetivo de la versión',//'目标版本',
	'introduction'		=> 'Introducción',//'简介',
	'description'		=> 'Descripción',//'说明',
	'settings'		=> 'Opciones',//'设置',
	'view_readme'		=> 'Mirar el readme',//'查看',
	'change'		=> 'Cambiar',//'修改',
	'start'			=> 'Iniciar',//'开始',

//---------------------------
//convert/include/global.func.php

	'jan'	=> ' Enero ',//'一月',
	'feb'	=> ' Febrero ',//'二月',
	'mar'	=> ' Marzo ',//'三月',
	'apr'	=> ' Abril ',//'四月',
	'may'	=> ' Mayo ',//'五月',
	'jun'	=> ' Junio ',//'六月',
	'jul'	=> ' Julio ',//'七月',
	'aug'	=> ' Agosto ',//'八月',
	'sep'	=> ' Septiembre ',//'九月',
	'oct'	=> ' Octubre ',//'十月',
	'nov'	=> ' Nobiembre ',//'十一月',
	'dec'	=> ' Diciembre ',//'十二月',
	'am'	=> ' Am ',//'上午',
	'pm'	=> ' Pm ',//'下午',

	'prompt'		=> 'Pronta',//'系统提示',
	'dzx_update'		=> 'Discuz!X Actualizacion de productos/Conversión',//'Discuz! X 系列产品升级转换',
	'dzx_update_wizard'	=> 'Discuz!X Actualizacion de productos/Asistente de conversión',//'Discuz! X 系列产品升级/转换 向导',
	'step1'		=> '1. Seleccione el tipo de conversión',//'1.选择产品转换程序',
	'step2'		=> '2. Instalación en el Servidor',//'2.设置服务器信息',
	'step3'		=> '3. Iniciar la conversion',//'3.配置转换过程',
	'step4'		=> '4. Realizar la conversión de los datos',//'4.执行数据转换',
	'step5'		=> '5. Conversión completada',//'5.转换完成',

//---------------------------
//convert/source/d7.2_x1.0/pollvoter.php++

	'continue_convert_table '	=> 'Continuar para convertir la tabla de datos',//'继续转换数据表 ',
	'was_converted'			=> '.Conversor total: ',//', 已转换 ',
	'records'			=> 'archivos',//'条记录',


//---------------------------
//convert/source/d7.2_x1.0/table/access.php

	'from'	=> ' de ',//' 从 ',
	'to'	=> ' a ',//' 至 ',
	'lines'	=> ' líneas.',//' 行',

//---------------------------
//convert/source/d7.2_x1.0/threadtype.php++

	'convert_thread_type'	=> 'Convertir el tipo de tema en una tabla',//'继续转换主题分类数据表',

//---------------------------
//convert/source/d7.2_x1.5/table/activityapplies.php

	'contacts'	=> ' Contactos: ',//' 联系方式:',

//---------------------------
//convert/source/d7.2_x2.0/table/moderators.php

	'converted'	=> ', Convertido ',//'，已转换',
	'records'	=> ' Archivos.',//'条记录。',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_event.php++

	'uchome_data'	=> 'Informacion de UCHome ',//'UCHome数据',
	'uchome_events'	=> 'Eventos de UCHome ',//'UCHome活动',
	'uchome_events_convert'	=> 'Convertir el contenido de UCenter en eventos',//'从 UCenter Home 转移过来的活动内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_group.php++

	'group_home'	=> 'Inicio del grupo',//'空间群组',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_magic.php++

	'user_magic'	=> ' Magia del usuario',//'用户道具',
	'magic_records'	=> 'Obtener los registros de la magia',//'道具收入记录',
	'magic_use_records'	=> 'Usar los registros de la magia',//'道具使用记录',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_poll.php++

	'uchome_polls'	=> 'Datos de la encuesta de UCHome',//'UCHome投票数据',
	'uchome_polls_convert'	=> 'Convertir el contenido de la encuesta UCenter Home',//'从 UCenter Home 转移过来的投票内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_space.php++

	'space_home_error'	=> 'Error: espacio vacío de los puntos. Configurar el espacio correspondiente para puntos',//'发生错误,请配置积分对应关系信息',
);