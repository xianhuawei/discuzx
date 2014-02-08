<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'./function/function_baidu.php';

$siteurl = baidu_get_plugin_setting('siteurl');
$sppasswd = baidu_get_plugin_setting('sppasswd');
$token = baidu_get_plugin_setting('pingtoken');

$sign = md5($siteurl.$token);

if ($token && $sppasswd) {
    baidu_submit_sitemap_index('del', 1, $siteurl, $sppasswd, $sign);
    baidu_submit_sitemap_index('del', 2, $siteurl, $sppasswd, $sign);
}

$sql = <<<EOF
DROP TABLE IF EXISTS cdb_baidusubmit_setting;
DROP TABLE IF EXISTS cdb_baidusubmit_sitemap;
DROP TABLE IF EXISTS cdb_baidusubmit_urlstat;
EOF;

if ($sql) {
    runquery($sql);
}

$finish = true;