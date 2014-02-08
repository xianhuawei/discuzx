<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

if (empty($_GET['p']) || $_GET['p'] != baidu_get_plugin_setting('sppasswd')) {
    baidu_header_status(404);
    return 1;
}

header('Content-type: text/txt');
$siteurl = baidu_get_plugin_setting('siteurl');
$filename = str_replace(array(':', '/', '.'), '_', substr($siteurl, strpos($siteurl, '//')+2)).'_discuz_log.txt';
header('Content-Disposition: attachment;filename=' . $filename);
header('Pragma: public');
$logfile = baidu_get_logfile();
if (!$logfile || !file_exists($logfile)) {
    echo 'log is not exists.';
    return 1;
}
echo file_get_contents($logfile);