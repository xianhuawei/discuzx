<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_baidusubmit
{
    function __construct()
    {
        define('__BDS_ROOT__', dirname(__FILE__).DIRECTORY_SEPARATOR);
        require_once(__BDS_ROOT__.'./function/function_baidu.php');
        require_once(__BDS_ROOT__.'./class_schema.php');
    }

    function common()
    {
        //error_reporting(E_ALL & ~E_NOTICE);
        //ini_set('display_errors', 0);
        //ini_set('error_log', 1);
    }

    function deletethread($value)
    {
        //if (!empty($_GET['inajax'])) return;
        if (!baidu_get_plugin_setting('openping')) return;
        if (baidu_senddata_error()) return;
        $tidlist = $value['param'][0];

        $tidstr = join('_', $tidlist);
        if (defined("_bds_wew_{$tidstr}")) return;
        define("_bds_wew_{$tidstr}", true);

        if (!empty($tidlist)) {
            foreach ($tidlist as $tid) {
                $schema = new BaiduThreadSchema();
                $url = baidu_gen_thread_url($tid, 1, 1);
                $schema->setThreadUrl($url);
                baidu_send_data($schema, 2);
            }
        }
    }

    function __destruct()
    {
        //flush();  //个别web配置下会出错

        if (!empty($_GET['inajax'])) return;
        if (empty($_GET['action']) || 'newthread' !== $_GET['action']) return;
        if ('yes' !== $_GET['topicsubmit']) return;
        if ($_POST['formhash'] != FORMHASH) return;

        global $tid;
        if (empty($tid)) return;

        if (defined("_bds_w9x_{$tid}")) return;
        define("_bds_w9x_{$tid}", true);

        if (!baidu_get_plugin_setting('openping')) return;
        if (baidu_senddata_error()) return;

        //发新帖
        $thread = get_thread_by_tid($tid);
        if ($thread) {
            $url = baidu_gen_thread_url($tid, 1, 1, $thread['fid']);
            $schema = new BaiduThreadSchema();
            $schema->setThreadUrl($url);
            baidu_send_data($schema, 1);
        }
    }
 }

