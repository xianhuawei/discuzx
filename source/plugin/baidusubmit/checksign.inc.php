<?php
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$checksign = $_GET['checksign'];
if (!$checksign || strlen($checksign) !== 32 ){
    exit();
}
$data = baidu_get_plugin_setting('checksign', true);
if ($data && $data['svalue'] == $checksign && time()-$data['stime'] < 30) {
    echo $data['svalue'];
}
