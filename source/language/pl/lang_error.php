<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_error.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'System Message'		=> 'Podstawowe ustawienia',//'站点信息',

	'config_notfound'		=> 'Konfiguracyjny plik &quot;config_global.php&quot; nie istnieje lub jest niedostępny.',//'配置文件 "config_global.php" 未找到或者无法访问， 请确认您已经正确安装了程序',
	'template_notfound'		=> 'Szablin pliku &quot;$tplfile&quot; nie istnieje lub jest niedostępny.',//'模版文件未找到或者无法访问',
	'directory_notfound'		=> 'Katalog &quot;$dir&quot; nie istnieje lub jest niedostępny.',//'目录未找到或者无法访问',
	'request_tainting'		=> 'Twoje żądanie zawiera niedozwolone znaki. System przerwał operację.',//'您当前的访问请求当中含有非法字符，已经被系统拒绝',
	'db_help_link'			=> 'Kliknij tutaj, aby uzyskać pomoc',//'点击这里寻求帮助',
	'db_error_message'		=> 'Komunikat błędu',//'错误信息',
	'db_error_sql'			=> '<b>SQL</b>: $sql<br />',//'<b>SQL</b>: $sql<br />',
	'db_error_backtrace'		=> '<b>Backtrace</b>: $backtrace<br />',
	'db_error_no'			=> 'Błąd',//'错误代码',
	'db_notfound_config'		=> 'Konfiguracyjny plik &quot;config_global.php&quot; nie istnieje lub jest niedostępny.',//'配置文件 "config_global.php" 未找到或者无法访问。',
	'db_notconnect'			=> 'Brak połączenia z bazą danych',//'无法连接到数据库服务器',
	'db_security_error'		=> 'Błąd bezpieczeństwa',//'查询语句安全威胁',
	'db_query_sql'			=> 'Zapytanie SQL',//'查询语句',
	'db_query_error'		=> 'Błąd zapytania',//'查询语句错误',
	'db_config_db_not_found'	=> 'Database configuration error, please double-check the &quot;config_global.php&quot; file.',//'数据库配置错误，请仔细检查 config_global.php 文件',
	'system_init_ok'		=> 'Site system initialization completed, please <a href="index.php">Click here</a> to enter.',//'网站系统初始化完成，请<a href="index.php">点击这里</a>进入',
	'backtrace'			=> 'operational info',//'运行信息',
	'error_end_message'		=> '<a href="http://{host}">{host}</a> has detailed records of this error message, which brings you access. We have apologize for the inconvenience.',//'<a href="http://{host}">{host}</a> 已经将此出错信息详细记录, 由此给您带来的访问不便我们深感歉意',
	'mobile_error_end_message'	=> '<a href="http://{host}">{host}</a> Error. Sorry for inconvenience.',//'<a href="http://{host}">{host}</a> 此错误给您带来的不便我们深感歉意',

	'file_upload_error_-101'	=> 'Przesyłanie nie powiodło się! Plik nie istnieje lub jest nieprawidłowy. Proszę kliknąć wstecz.',//'上传失败！上传文件不存在或不合法，请返回。',
	'file_upload_error_-102'	=> 'Przesyłanie nie powiodło się! Plik nie jest obrazkiem. Proszę kliknąć wstecz.',//'上传失败！非图片类型文件，请返回。',
	'file_upload_error_-103'	=> 'Przesyłanie nie powiodło się! Nie można zapisać pliku. Proszę kliknąć wstecz.',//'上传失败！无法写入文件或写入失败，请返回。',
	'file_upload_error_-104'	=> 'Przesyłanie nie powiodło się! Nierozpoznany format pliku obrazu. Proszę kliknąć wstecz.',//'上传失败！无法识别的图像文件格式，请返回。',
);

