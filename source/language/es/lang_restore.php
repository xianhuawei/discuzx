<?php

/**
 *      $Id: lang_restore.php by Valery Votintsev at sources.ru
 *
 *      Translated to Spanish by Willy Kuan, discuzhispano.com
 */

$lang = array(

//---------------------------
//utility/restore.php

	'restore_title'		=> 'Herramienta de recuperación de datos Discuz!',//'Discuz! 数据恢复工具',
	'restore_questions'	=> 'Para alguna pregunta sobre recuperación, porfavor, visita soporte ',//'恢复当中有任何问题请访问技术支持站点',
	'browser_jump'		=> 'El navegador automáticamente salto de página, sin intervención humana. A menos que hace mucho tiempo cuando su navegador no soporta frames, por favor haga clic aquí',//'浏览器会自动跳转页面，无需人工干预。除非当您的浏览器长时间没有自动跳转时，请点击这里',
	'ok'			=> 'Aceptar',//'确定',
	'cancel'		=> 'Cancelar',//'取消',
	'filename'		=> 'Nombre del Archivo',//'文件名称',

	'director'		=> 'Directorio',//'所在目录',
	'version'		=> 'Verción',//'版本',
	'time'			=> 'Tiempo de respaldo',//'备份时间',
	'type'			=> 'Tipo',//'类型',
	'size'			=> 'Tamaño',//'尺寸',
	'db_method'		=> 'Método',//'方式',
	'db_volume'		=> 'Número de volumenes',//'卷数',
	'import'		=> 'Importar',//'导入',
	'different_dbcharset_tablepre'	=> 'Importar los datos de la copia de seguridad pero los valores del archivo de configuracion son diferente: {diff}. Estas seguro q quieres continuar con la ejecucion del programa?',//'检测到导入的备份数据与配置文件的{diff} 不同，您还要继续运行此程序吗？',
	'db_import_tips'	=> 'El proceso de restauración de la copia de seguridad está en proceso y remplazará todos los datos existentes, asegurate de cerrar el foro antes de iniciar la restauración.<br />Puedes ver las copias de seguridad en la sección de Administración, en los detalles de la copia de seguridad, puedes borrar las copias antiguas e importar los necesarios.<br /><span class="red">El proceso de restauración de datos a una nueva página se va a completar exitosamente, asegurate de eliminar el archivo restore.php</span><br />',//'本功能在恢复备份数据的同时，将全部覆盖原有数据，请确定恢复前已将论坛关闭，恢复全部完成后可以将论坛重新开放。<br />您可以通过数据备份管理功能查看站点的备份文件的详细信息，删除过期的备份,并导入需要的备份。<br /><span class="red">恢复数据的整个过程会在一个新页面完成，您成功恢复数据后请务必及时删除restore.php文件。</span><br />',
	'db_export_discuz'	=> 'Discuz! Datos (Without UCenter)',//'Discuz! 数据(不含UCenter)',
	'db_export_discuz_uc'	=> 'Discuz! y UCenter Data',//'Discuz! 和 UCenter 数据',
	'db_multivol'		=> 'Multi-volumen',//'多卷',
	'db_import_unzip'	=> 'Descomprimir',//'解压缩',
	'db_export_zip'		=> 'Comprimir Copia de respaldo',//'压缩备份',
	'db_zip'		=> 'ZIP',
	'db_shell'		=> 'Soporte',
	'unknown'		=> 'Desconocido',//'未知',
	'backup_file_unexist'	=> 'El archivo de la copia de seguridad no existe.',//'备份文件不存在',
	'connect_error'		=> 'Fracaso la conección a la base de datos, por favor, revise el archivo config/config_global.php y config/config_ucenter.php verifíque si existe y éste este correctamente configurado',//'连接数据库失败，请您查看数据库配置文件config/config_global.php和config/config_ucenter.php是否存在以及配置是否正确',
	'dbcharsetdiff'		=> ' Lenguaje de los carácteres de la Base de Datos ($_config[\'db\'][\'1\'][\'dbcharset\'])',//' 数据库字符集($_config[\'db\'][\'1\'][\'dbcharset\'])',
	'tableprediff'		=> 'Prefijo de las tablas ($_config[\'db\'][\'1\'][\'tablepre\'])',//' 表前缀($_config[\'db\'][\'1\'][\'tablepre\'])',
	'database_import_multivol_succeed'	=> 'La copia de seguridad de Multi-Volumen fue importado a la Base de datos con exito.<br />Por favor actualize el caché en segundo plano<br /><span class="red">Elimine tan pronto sea posible el archivo restore.php para no dañar los datos</span>',//'分卷数据成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>',
	'database_import_file_illegal'		=> 'El archivo de datos no existe, puede ser ocasionado porque el servidor no permite la subida de archivos o el tamaño del archivo excede el límite',//'数据文件不存在：可能服务器不允许上传文件或文件大小超过限制',
	'database_import_multivol_prompt'	=> 'Los datos fueron importados a la Base de Datos exitosamente, necesitas que automáticamente se importen los datos a otros volumenes en esta copia?',//'分卷数据第一卷成功导入数据库，您需要自动导入本次备份的其他分卷吗？',
	'database_import_succeed'		=> 'Los datos en la Base de Datos del sitio han sido exitoso<br />Porfavor actualize el caché<br /><span class="red">Remueva tan pronto como sea posible los archivos restore.php para así no impactar con el Data</span>',//'数据已成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>',
	'database_import_format_illegal'	=> 'El archivo es un formato non-Discuz!, no puede ser importado',//'数据文件非 Discuz! 格式，无法导入',
	'database_import_unzip'			=> '{info}<br />Se termino de extraer el archivo de copia de seguridad. ¿Quieres que automáticamente se importe la copia de seguridad?. Despues de importar los archivos extraídos, serán eliminados',//'{info}<br />备份文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除',
	'database_import_multivol_unzip'	=> '{info}<br />Se terminó de descomprimir la copia de seguridad del sub-volumen. Necesitas que automáticamente se extraigan los otros sub-volumenes?',//'{info}<br />备份文件解压缩完毕，您需要自动解压缩其他的分卷文件吗？',
	'database_import_multivol_unzip_redirect'	=> 'El archivo # {multivol} ha sido correctamente extraído, el programa continuará automaticamente',//'数据文件 #{multivol} 解压缩成功，程序将自动继续',
	'database_import_confirm'		=> 'Los datos del actual archivo importado Discuz!, la versión es incompatible y puede causar un fallo',//'导入和当前 Discuz! 版本不一致的数据极有可能产生无法解决的故障，您确定继续吗？',
	'database_import_confirm_sql'		=> '¿Está seguro que desea importar la copia de seguridad?',//'您确定导入该备份吗？',
	'database_import_confirm_zip'		=> '¿Está seguro que desea descomprimir la copia de seguridad?',//'您确定解压该备份吗？',
	'database_import_multivol_confirm'	=> 'Se terminó de extraer el archivo de copia de seguridad. ¿Quieres que automáticamente se importe la copia de seguridad?. Después de importar, los archivos extraídos serán eliminados.',//'所有分卷文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除',
	'database_import_multivol_redirect'	=> 'El archivo # {volume} ha sido correctamente extraído, el programa continuará automaticamente',//'数据文件 #{volume} 成功导入，程序将自动继续',
	'error_quit_msg'			=> 'Resolver el problema anterior, antes de continuar con la recuperación de datos',//'必须解决以上问题，才能继续恢复数据',
	'restored_error'			=> 'La función para recuperar datos está bloqueada. Si quieres usarla, anda al servidor y elimina el archivo ./data/restore.lock',//'恢复数据功能锁定，已经恢复过了，如果您确定要恢复数据，请到服务器上删除./data/restore.lock',

);