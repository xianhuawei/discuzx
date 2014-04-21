<?php

/**
 *      $Id: lang_restore.php by Valery Votintsev at sources.ru
 */

$lang = array(

//---------------------------
//utility/restore.php

	'restore_title'		=> 'Восстановление данных Discuz!',
	'restore_questions'	=> 'Если у Вас есть вопросы по восстановлению, обратитесь за помощь. на сайт поддержки',
	'browser_jump'		=> 'Ваш браузер будет автоматически перезагружать страницу без Вашего участия. Если Ваш браузер не поддерживает фреймы, кликните по данной ссылке',
	'ok'			=> 'OK',
	'cancel'		=> 'Отмена',
	'filename'		=> 'Имя файла',

	'director'		=> 'Папка',
	'version'		=> 'Версия',
	'time'			=> 'Дата бэкапа',
	'type'			=> 'Тип',
	'size'			=> 'Размер',
	'db_method'		=> 'Метод',
	'db_volume'		=> 'Кол-во томов',
	'import'		=> 'Импорт',
	'different_dbcharset_tablepre'	=> 'Найдены отличия между текущей конфигурацией и сохранённой копией: {diff}. Вы уверены, что хотите продолжить восстановление?',
	'db_import_tips'	=> 'This feature is in restoring backup data at the same time, will be fully covered by existing data, make sure the recovery before the forum shut down, restored after completion re-opening the forum.<br />You can view the site data backup management Details of the backup files, delete outdated backup, and import the necessary backup.<br /><span class="red">The entire process of restoring data to a new page will be completed successfully recover your data, please be sure to promptly remove restore.php file.</span><br />',//'本功能在恢复备份数据的同时，将全部覆盖原有数据，请确定恢复前已将论坛关闭，恢复全部完成后可以将论坛重新开放。<br />您可以通过数据备份管理功能查看站点的备份文件的详细信息，删除过期的备份,并导入需要的备份。<br /><span class="red">恢复数据的整个过程会在一个新页面完成，您成功恢复数据后请务必及时删除restore.php文件。</span><br />',
	'db_export_discuz'	=> 'Только данные Discuz! (без UCenter)',
	'db_export_discuz_uc'	=> 'Discuz! плюс UCenter',
	'db_multivol'		=> 'Многотомный',
	'db_import_unzip'	=> 'Разархивация',
	'db_export_zip'		=> 'Архивация',
	'db_zip'		=> 'ZIP',
	'db_shell'		=> 'Shell',
	'unknown'		=> 'Неизвестно',
	'backup_file_unexist'	=> 'Файл бэкапа не найден.',
	'connect_error'		=> 'Ошибка соединения с БД, проверьте параметры конфигурации в config/config_global.php и config/config_ucenter.php.',
	'dbcharsetdiff'		=> ' Кодировка БД: ($_config[\'db\'][\'1\'][\'dbcharset\'])',
	'tableprediff'		=> 'Префикс таблиц: ($_config[\'db\'][\'1\'][\'tablepre\'])',
	'database_import_multivol_succeed'	=> 'Многотомный бэкап успешно импортирован.<br />Обновите Кэш в Админ-Центре!<br /><span class="red">Немедленно удалите эту программу restore.php с Вашего сайта во избежание несанкционированого доступа!</span>',
	'database_import_file_illegal'		=> 'Файл данных не найден. Либо сервер не разрешает загрузку файлов, либо размер файла превышает установленный лимит.',
	'database_import_multivol_prompt'	=> 'Том данных успешно импортирован. Продолжить автоматический импорт остальных томов?',
	'database_import_succeed'		=> 'Импорт успешно завершён.<br />Обновите Кэш в Админ-Центре!<br /><span class="red">Немедленно удалите эту программу restore.php с Вашего сайта во избежание несанкционированого доступа!</span>',
	'database_import_format_illegal'	=> 'Формат файла несовместим с форматом Discuz!, импорт невозможен!',
	'database_import_unzip'			=> '{info}<br />Файл бэкапа успешно разархивирован. Продолжить автоматический импорт? По завершении импорта все временные файлы будут автоматически удалены.',
	'database_import_multivol_unzip'	=> '{info}<br />Том бэкапа успешно разархивирован. Продолжить автоматическое разархивирование остальных томов?',
	'database_import_multivol_unzip_redirect'	=> 'Том # {multivol} успешно разархивирован, продолжаем дальше...',
	'database_import_confirm'		=> 'Текущая версия Discuz! несовместима с версией в бэкапе. Импорт может привести к неработоспособности сайта!',
	'database_import_confirm_sql'		=> 'Вы уверены, что хотите импортировать этот бэкап?',
	'database_import_confirm_zip'		=> 'Вы уверены, что хотите разархивировать бэкап?',
	'database_import_multivol_confirm'	=> 'Разархивирование многотомного архива успешно завершено. Продолжить автоматический импорт? Ао завершении импорта все временные файлы будут автоматически удалены.',
	'database_import_multivol_redirect'	=> 'Том # {volume} успешно импортирован. Продолжаем дальше...',
	'error_quit_msg'			=> 'Прежде, чем приступить к восстановлению данных, устраните указанные проблемы!',
	'restored_error'			=> 'Восстановление заблокировано. Если Вы уверены, что хотите восстановить данные, удалите файл блокировки: ./data/restore.lock',

);
