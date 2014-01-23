<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_optimizer.php 31754 2012-10-08 02:29:22Z zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'optimizer_dbbackup_advice'	=> 'Backup was not made for 3 months, it is recommended to backup your data immediately.',//'三个月没有进行数据备份了,建议立即备份数据',
	'optimizer_dbbackup_lastback'	=> 'The last data backup was made at ',//'上次数据备份于',
	'optimizer_dbbackup_clean_safe'	=> 'Database backup file not detected, No security problems',//'没有检测到数据库备份文件，无安全问题',
	'optimizer_dbbackup_clean_delete'	=> 'Detected {filecount} backup files, (Directory: ./data/backup_xxx),<br>Please copy the backup to a safe location as soon as possible, and then delete these files!',//'检测到 {filecount} 个数据备份文件(目录: ./data/backup_xxx)，<br>请尽快手工复制到安全位置备份，然后删除这些文件',
	'optimizer_filecheck_advice'		=> 'You did not verified the file checksum more than 3 months, it is recommended to verify it right now.',//'三个月没有进行文件校验了,建议立即进行校验',
	'optimizer_filecheck_lastcheck'		=> 'Last file checksum',//'上次文件校验于',
	'optimizer_log_clean'			=> 'have {count} log records, can clean up for optimisation',//'有 {count} 个日志表可以清理优化',
	'optimizer_log_not_found'		=> 'No log records found to be clean up',//'未发现可清理的日志表',
	'optimizer_patch_have'			=> 'You have {patchnum} patches, please update as soon as possible',//'您有 {patchnum} 个，请尽快更新',
	'optimizer_patch_check_safe'		=> 'Detect security',//'检测安全',
	'optimizer_plugin_new_plugin'		=> 'You have {newversion} plugin updates available',//'您有 {newversion} 款应用有可用更新',
	'optimizer_plugin_no_upgrade'		=> 'Do not need to apply the update',//'不需要应用更新',
	'optimizer_post_need_split'		=> 'Post table and sub-tables have {count} rows to be optimized',//'帖子表及分表有 {count} 个需要优化',
	'optimizer_post_not_need'		=> 'Optimization is not required',//'不需要优化',
	'optimizer_seo_advice'			=> 'We recommend to improve the SEO settings',//'建议您完善SEO设置',
	'optimizer_seo_no_need'			=> 'Discovered SEO settings are perfect',//'发现已经完善了seo设置',
	'optimizer_setting_cache_index'		=> 'Cache Forum Home',//'缓存论坛首页',
	'optimizer_setting_cache_index_desc'	=> 'Enabling of this feature can reduce the server loading',//'开启此功能可减轻服务器负载',
	'optimizer_setting_cache_optimize_desc'	=> 'Set the cache time to 900 seconds',//'设置缓存时间为900秒',
	'optimizer_setting_cache_post'		=> 'Cache Posts',//'缓存帖子',
	'optimizer_setting_cache_post_desc'	=> 'Enabling of this feature can reduce the server loading',//'开启此功能可减轻服务器负载',
	'optimizer_setting_cache_post_optimize_desc'	=> 'Set the cache time to 900 seconds',//'设置缓存时间为900秒',
	'optimizer_setting_optimizeviews'		=> 'Optimize the updated thread views',//'优化更新主题浏览量',
	'optimizer_setting_optimizeviews_desc'		=> 'Enabling of this common feature can reduce the time of generating the Update Topic Page Views, and so reduce the server loading',//'开启此共功能可减轻更新主题浏览量时产生的服务器负载',
	'optimizer_setting_optimizeviews_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
	'optimizer_setting_delayviewcount'		=> 'Attachment downloads delay update',//'附件下载量延迟更新',
	'optimizer_setting_delayviewcount_desc'		=> 'Delayed update of attachment views can significantly reduce the server loading when a large attachment required',//'延迟更新附件的浏览量，可明显降低访问量很大的站点的服务器负担',
	'optimizer_setting_delayviewcount_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
	'optimizer_setting_preventrefresh'		=> 'Prevent recount of views when page refreshed',//'查看数开启防刷新',
	'optimizer_setting_preventrefresh_desc'		=> 'Anti-refresh feature can significantly reduce the server loading',//'开启防刷新，可明显降低服务器压力',
	'optimizer_setting_preventrefresh_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
	'optimizer_setting_nocacheheaders'		=> 'Disable the browser caching',//'禁止浏览器缓冲',
	'optimizer_setting_nocacheheaders_desc'		=> 'Can be used to solve some people problems with a page refresh in some browsers. This feature significantly increases the server loading.',//'可用于解决极个别浏览器内容刷新不正常的问题，本功能会加重服务器负担',
	'optimizer_setting_nocacheheaders_optimize_desc'	=> 'Disable this feature',//'关闭此功能',
	'optimizer_setting_jspath'			=> 'JS file cache',//'JS 文件缓存',
	'optimizer_setting_jspath_desc'			=> 'If javascript cache directory enabled, then the will compress all the javascripts files and put it to this directory for increase the file read speed.',//'当脚本为缓存目录时，系统会将默认目录中的 *.js 文件进行压缩然后保存到缓存目录以提高读取速度',
	'optimizer_setting_jspath_optimize_desc'	=> 'Modify js path to the cache directory',//'修改js路径到缓存目录',
	'optimizer_setting_lazyload'			=> 'Image load delay',//'图片延时加载',
	'optimizer_setting_lazyload_desc'		=> 'Load an image only if it is visible in the browser window. This feature can significantly reduce the server loading.',//'页面中的图片在浏览器的当前窗口时再加载，可明显降低访问量很大的站点的服务器负担',
	'optimizer_setting_lazyload_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
	'optimizer_setting_sessionclose'		=> 'Disable the session mechanism',//'关闭session机制',
	'optimizer_setting_sessionclose_desc'		=> 'Closing the session mechanism can significantly reduce the server loading. Recommended to use this feature if the number of online users is greater than 20000.<br>Note: If the users online and total users statistics are not calculated, the users statistics will be unavailable at the Forum home page.',//'关闭session机制以后，可明显降低站点的服务器负担，建议在线用户数超过2万时开启本功能<br>注意：游客数和用户的在线时长将不再进行统计，论坛首页和版块列表页面的在线用户列表功能将不可用',
	'optimizer_setting_sessionclose_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
	'optimizer_setting_need_optimizer'		=> 'Have {count} settings can be optimized',//'有 {count} 个设置项可以优化',
	'optimizer_setting_no_need'			=> 'Setting items do not require of optimization',//'设置项无需优化',
	'optimizer_thread_need_optimizer'		=> 'Need to optimize your thread table',//'需要优化您的主题表了',
	'optimizer_thread_no_need'			=> 'No need to optimize',//'不需要优化',
	'optimizer_upgrade_need_optimizer'		=> 'There are new versions, Update to the latest version',//'有新版本，及时更新到最新版本',
	'optimizer_upgrade_no_need'			=> 'Is the latest version',//'已经是最新版',
	'optimizer_setting_rewriteguest'		=> 'Rewrite only for guests',//'Rewrite仅针对游客',
	'optimizer_setting_rewriteguest_desc'		=> 'If enable this feature, the URL Rewrite feature will be used only for guests and search engines. This feature will reduce the server loading.',//'开启此项，则 Rewrite功能只对游客和搜索引擎有效，可减轻服务器负担',
	'optimizer_setting_rewriteguest_optimize_desc'	=> 'Turn on this feature',//'开启此功能',
);
