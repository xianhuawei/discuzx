<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

if (empty($_GET['p']) || $_GET['p'] != ($sppasswd = baidu_get_plugin_setting('sppasswd'))) {
    baidu_header_status(404);
    return 1;
}

$urlsuffix = "&p=$sppasswd";

$sitemapMaxTid = (int)C::t('#baidusubmit#baidusubmit_sitemap')->get_max_end(1); //sitemap表中最大tid
$maxTid = C::t('forum_thread')->fetch_max_tid();  //论坛数据中最大tid

$count = $maxTid - $sitemapMaxTid;

$config = baidu_get_plugin_config();

//新数据够生成一个sitemap时，生成新的sitemap
if (!$sitemapMaxTid || $count >= $config['sitemapItemCount']) {
    $sitemapCount = ceil($count/$config['sitemapItemCount']);
    $next_tid = $sitemapMaxTid + 1;
    for ($i = 0; $i < $sitemapCount; $i++) {
        $start_tid = $next_tid + $i*$config['sitemapItemCount'];
        $end_tid = $start_tid + $config['sitemapItemCount'] - 1;
        $url = 'sitemapall&start='.$start_tid;
        C::t('#baidusubmit#baidusubmit_sitemap')->add($url, 1, $start_tid, $end_tid);
    }
}

function bs_index_update_last_crawl($offset = 0)
{
    $offset = intval($offset);
    if ($offset < 0) return;
    if (0 == $offset || $offset != baidu_get_plugin_setting('lastcrawl')) {
        C::t('#baidusubmit#baidusubmit_setting')->update('lastcrawl', $offset, true, false);
    }
}

baidu_print_sitemap_index_header();

$site = baidu_get_plugin_setting('siteurl');
$sitemapCount = C::t('#baidusubmit#baidusubmit_sitemap')->get_sitemap_count(1);
$sitemapUrlCount = $config['sitemapUrlCount'] > 0 ? intval($config['sitemapUrlCount']) : 50000;

//全取出来
if ($sitemapCount <= $sitemapUrlCount) {
    $sitemaplist = C::t('#baidusubmit#baidusubmit_sitemap')->get_sitemap_list(1, 0, $sitemapCount);
    if (count($sitemaplist) > 0) {
        baidu_print_sitemap_list($sitemaplist, $site, $urlsuffix);
    }
    baidu_print_sitemap_index_footer();
    bs_index_update_last_crawl();
    return 1;
}


//分段取
$lastcrawl = baidu_get_plugin_setting('lastcrawl', true);
$time = time();

$pasttime = $time - $lastcrawl['stime'];
if ($pasttime < $config['sitemapStepTime']) { //没到一个时段则按上次的偏移量
    $offset = intval($lastcrawl['svalue']);
} else {
    $step = $config['sitemapStepLength'];
    if ($step > $sitemapUrlCount) {
        $step = $sitemapUrlCount;
    }
    $offset = $lastcrawl['svalue'] + $step * intval($pasttime / $config['sitemapStepTime']);
}

if ($offset > $sitemapCount) {
    $offset = 0;
}
$sitemaplist = C::t('#baidusubmit#baidusubmit_sitemap')->get_sitemap_list(1, $offset, $sitemapUrlCount);

if (count($sitemaplist) > 0) {
    baidu_print_sitemap_list($sitemaplist, $site, $urlsuffix);
}

//如果溢出了
$overflow = $offset + $sitemapUrlCount - $sitemapCount;
if ($overflow > 0) {
    $sitemaplist = C::t('#baidusubmit#baidusubmit_sitemap')->get_sitemap_list(1, 0, $overflow);
    if (count($sitemaplist) > 0) {
        baidu_print_sitemap_list($sitemaplist, $site, $urlsuffix);
    }
}

baidu_print_sitemap_index_footer();

bs_index_update_last_crawl($offset);

