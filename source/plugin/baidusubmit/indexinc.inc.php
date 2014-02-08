<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

if (empty($_GET['p']) || $_GET['p'] != ($sppasswd = baidu_get_plugin_setting('sppasswd'))) {
    baidu_header_status(404);
    return 1;
}

$config = baidu_get_plugin_config();

baidu_print_sitemap_index_header();

$today = strtotime(date('Y-m-d'));
$removeTime = $today - $config['HistoryDayCount'] * 24 * 3600;  //几天前时间
C::t('#baidusubmit#baidusubmit_sitemap')->delete_history($removeTime);  //删除过期数据

$lastTime = C::t('#baidusubmit#baidusubmit_sitemap')->get_max_end(2);  //sitemap表中最后时间
if (empty($lastTime)) {
    $lastTime = $today;
}
if ($today >= $lastTime) {
    $url = 'sitemapinc&start='.$today;
    C::t('#baidusubmit#baidusubmit_sitemap')->add($url, 2, $today, $today+86399);
}

$sitemaps = C::t('#baidusubmit#baidusubmit_sitemap')->get_sitemap_list(2);

$site = baidu_get_plugin_setting('siteurl');
if (count($sitemaps) > 0) {   //返回增量sitemap的索引文件
    baidu_print_sitemap_list($sitemaps, $site, "&p=$sppasswd");
}

baidu_print_sitemap_index_footer();