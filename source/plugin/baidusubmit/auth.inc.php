<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

ob_end_clean();

function baidu_show_json($var)
{
    define('FOOTERDISABLED', 1);
    echo json_encode($var);
    exit;
}

$config = baidu_get_plugin_config();

$site = $_POST['siteurl'];
require_once libfile('function/filesock');
$result = baidu_http_send($config['zzplatform'].'/discuz/getCheckSign?site='.urlencode($site));
$data = json_decode($result, true);  //去站长平台获取随机串

if ($data['status'] != 1) {
    baidu_show_json(array(
        'error' => 1,
        'msg' => diconv(lang('plugin/baidusubmit', 'getCheckSigfailed'), CHARSET, 'utf-8'),
    ));
}

C::t('#baidusubmit#baidusubmit_setting')->update('siteurl', $data['siteurl']);
C::t('#baidusubmit#baidusubmit_setting')->update('checksign', $data['checksign']);

//站长平台回调的URL
$siteurl = baidu_get_plugin_setting('siteurl', false, true);
$url = $siteurl.'plugin.php?id=baidusubmit:checksign&checksign='.$data['checksign'];
$sigurl = $config['zzplatform'].'/discuz/auth?checksign='.$data['checksign'].'&url='.urlencode($url).'&site='.urlencode($siteurl);

$authData = baidu_http_send($sigurl);   //去站长平台进行验证
C::t('#baidusubmit#baidusubmit_setting')->remove_key('checksign');
$output = json_decode($authData, true);

if ($output['status'] == 1) {
    //token
    $token = $output['token'];
    C::t('#baidusubmit#baidusubmit_setting')->update('pingtoken', $token);

    //保存下旧密码
    $old_sppasswd = baidu_get_plugin_setting('sppasswd');

    //只有初次安装时才提交sitemap
    if (empty($old_sppasswd)) {
        $sppasswd = baidu_gen_sitemap_passwd();
        C::t('#baidusubmit#baidusubmit_setting')->update('sppasswd', $sppasswd);

        $result = 0;
        $sign = md5($site.$token);
        //提交全量索引
        $allreturnjson = baidu_submit_sitemap_index('add', 1, $siteurl, $sppasswd, $sign);
        $allresult = json_decode($allreturnjson['json'], true);
        if (!isset($allresult['status'])) {
            baidu_show_json(array(
                'error' => 1,
                'msg' => diconv(lang('plugin/baidusubmit', 'authfailed') . "[URL:{$allreturnjson['url']}]", CHARSET, 'utf-8'),
            ));
        }
        $result += (int)$allresult['status'];

        //提交增量索引
        $incresultjson =  baidu_submit_sitemap_index('add', 2, $siteurl, $sppasswd, $sign);
        $incresult = json_decode($incresultjson['json'], true);
        if (!isset($incresult['status'])) {
            baidu_show_json(array(
                'error' => 1,
                'msg' => diconv(lang('plugin/baidusubmit', 'authfailed') . '[URL:' . $incresultjson['url'] . ']', CHARSET, 'utf-8'),
            ));
        }
        $result += (int)$incresult['status'];

        if ($result === 0) {
            //tid节点
            C::t('#baidusubmit#baidusubmit_setting')->update('installmaxtid',  C::t('forum_thread')->fetch_max_tid());
            //删除旧索引文件
            if ($old_sppasswd) {
                baidu_submit_sitemap_index('del', 1, $siteurl, $old_sppasswd, $sign);
                baidu_submit_sitemap_index('del', 2, $siteurl, $old_sppasswd, $sign);
            }
            baidu_show_json(array(
                'error' => 0,
                'msg' => diconv(lang('plugin/baidusubmit', 'authsuccess'), CHARSET, 'utf-8'),
            ));
        } else {
            // delete sppassword
            C::t('#baidusubmit#baidusubmit_setting')->update('sppasswd', '');
            baidu_show_json(array(
                'error' => 1,
                'msg' => diconv(lang('plugin/baidusubmit', 'saveSitemapfailed'), CHARSET, 'utf-8'),
            ));
        }
    }
    else {
        baidu_show_json(array(
            'error' => 0,
            'msg' => diconv(lang('plugin/baidusubmit', 'authsuccess'), CHARSET, 'utf-8'),
        ));
    }
}
elseif ($output['status'] == -1) {
    baidu_show_json(array(
        'error' => 1,
        'msg' => diconv(lang('plugin/baidusubmit', 'authCheckSigfailed'), CHARSET, 'utf-8'),
    ));
}
elseif ($output['status'] == -2) {
    baidu_show_json(array(
        'error' => 1,
        'msg' => diconv(lang('plugin/baidusubmit', 'schemaNotExsit'), CHARSET, 'utf-8'),
    ));
}
elseif ($output['status'] == -3) {
    baidu_show_json(array(
        'error' => 1,
        'msg' => diconv(lang('plugin/baidusubmit', 'linkSitefailed'), CHARSET, 'utf-8'),
    ));
}
else {
    baidu_show_json(array(
        'error' => 1,
        'msg' => diconv(lang('plugin/baidusubmit', 'authfailed'), CHARSET, 'utf-8'),
    ));
}

