<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_error.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'System Message'		=> 'Site Base Settings',//'站点信息',

	'config_notfound'		=> 'Configuration file &quot;config_global.php&quot; not found or unaccessible.',//'配置文件 "config_global.php" 未找到或者无法访问， 请确认您已经正确安装了程序',
	'template_notfound'		=> 'Template file &quot;$tplfile&quot; not found or unaccessible.',//'模版文件未找到或者无法访问',
	'directory_notfound'		=> 'Directory &quot;$dir&quot; not found or unaccessible.',//'目录未找到或者无法访问',
	'request_tainting'		=> 'Your current request contains illegal characters, and has been rejected by the system.',//'您当前的访问请求当中含有非法字符，已经被系统拒绝',
	'db_help_link'			=> 'Click here for help',//'点击这里寻求帮助',
	'db_error_message'		=> 'Error Message',//'错误信息',
	'db_error_sql'			=> '<b>SQL</b>: $sql<br />',//'<b>SQL</b>: $sql<br />',
	'db_error_backtrace'		=> '<b>Backtrace</b>: $backtrace<br />',
	'db_error_no'			=> 'Error code',//'错误代码',
	'db_notfound_config'		=> 'Configuration file &quot;config_global.php&quot; not found or unaccessible.',//'配置文件 "config_global.php" 未找到或者无法访问。',
	'db_notconnect'			=> 'Unable to connect to database server',//'无法连接到数据库服务器',
	'db_security_error'		=> 'Query security error',//'查询语句安全威胁',
	'db_query_sql'			=> 'SQL query',//'查询语句',
	'db_query_error'		=> 'Query error',//'查询语句错误',
	'db_config_db_not_found'	=> 'Database configuration error, please double-check the &quot;config_global.php&quot; file.',//'数据库配置错误，请仔细检查 config_global.php 文件',
	'system_init_ok'		=> 'Site system initialization completed, please <a href="index.php">Click here</a> to enter.',//'网站系统初始化完成，请<a href="index.php">点击这里</a>进入',
	'backtrace'			=> 'operational info',//'运行信息',
	'error_end_message'		=> '<a href="http://{host}">{host}</a> has detailed records of this error message, which brings you access. We have apologize for the inconvenience.',//'<a href="http://{host}">{host}</a> 已经将此出错信息详细记录, 由此给您带来的访问不便我们深感歉意',
	'mobile_error_end_message'	=> '<a href="http://{host}">{host}</a> Error. Sorry for inconvenience.',//'<a href="http://{host}">{host}</a> 此错误给您带来的不便我们深感歉意',

	'file_upload_error_-101'	=> 'Upload failed! Upload file does not exist or is invalid. Please return.',//'上传失败！上传文件不存在或不合法，请返回。',
	'file_upload_error_-102'	=> 'Upload failed! Non-image file type, please return.',//'上传失败！非图片类型文件，请返回。',
	'file_upload_error_-103'	=> 'Upload failed! Can not write to file or write fails, return.',//'上传失败！无法写入文件或写入失败，请返回。',
	'file_upload_error_-104'	=> 'Upload failed! Unrecognized image file format, please return.',//'上传失败！无法识别的图像文件格式，请返回。',
);

