<?php

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

//0非登录(游客可访问）、1登录、2登录+回帖、3登录+积分、4登录+用户等级
function baidu_get_attachment_authority(array $attach)
{
    if ($attach['price']) return 3;
    if ($attach['readperm']>0 && $attach['readperm'] != 7) return 4;
    return 0;
}

function baidu_get_attachment_by_pids(array $pids, $tid)
{
    if (empty($pids)) return array();

    $alist = C::t('forum_attachment_n')->fetch_all_by_id("tid:{$tid}", 'pid', $pids);
    if (empty($alist)) return array();

    $amlist = C::t('forum_attachment')->fetch_all_by_id('pid', $pids);
    foreach ($amlist as $row) {
        $alist[$row['aid']] = array_merge($alist[$row['aid']], $row);
    }
    $ret = array();
    foreach ($alist as $x) {
        $ret[$x['pid']][] = $x;
    }
    return $ret;
}

function baidu_get_plugin_setting($skey, $time=false, $real=false)
{
    static $setting = array();
    if (empty($setting) || $real) {
        $setting = C::t('#baidusubmit#baidusubmit_setting')->fetch_all();
    }
    if (!isset($setting[$skey])) return $time ? array() : null;
    return $time ? $setting[$skey] : $setting[$skey]['svalue'];
}

function baidu_get_plugin_config($key=null)
{
    static $config = array();
    if (empty($config)) {
        $config = require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config.php');
    }
    return empty($key) ? $config : @$config[$key];
}


function baidu_send_data($schema, $type)
{
   $site = baidu_get_plugin_setting('siteurl');
    if (!$site) {
        global $_G;
        $site = $_G['siteurl'];
    }
    //$site = baidu_get_site_from_url($site);

    $token = baidu_get_plugin_setting('pingtoken');
    if (!$token) {
        return;
    }

    $pingurl = baidu_get_plugin_config('zzpingurl');

    $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset>';
    $url = '';
    if ($type === 1) {  //新增或更新
        $xml .= $schema->toSitemapXml();
        $xml .= '</urlset>';
        $url .= $pingurl . '?site='.urlencode($site).'&resource_name=sitemap&method=add';
    }
    if ($type === 2) {  //删除
        $xml .= $schema->toDeleteXml();
        $xml .= '</urlset>';
        $url .= $pingurl . '?site='.urlencode($site).'&resource_name=sitemap&method=del';
    }
    $sign = md5($site.$xml.$token);
    $url .= '&sign='.$sign;

    $_st = time();
    $result = baidu_http_send($url, 1024, $xml, $cookie='', baidu_senddata_timeout());
    baidu_senddata_timeout(time() - $_st);
    if (0 === strlen(trim($result))) {
        baidu_senddata_error(false);
    }

    if (baidu_get_plugin_setting('pinglog')) {
        baidu_senddata_log($xml);
        baidu_senddata_log($result."\n");
    }
}

function baidu_get_logfile()
{
    $logdir = baidu_get_plugin_setting('pinglogdir');
    if (!$logdir) {
        $logdir = DISCUZ_ROOT.'./data/log/';
    }
    if (!is_dir($logdir) || !is_writable($logdir)) return false;
    return rtrim($logdir, '/\\').DIRECTORY_SEPARATOR.'./baidusubmit.php';
}

function baidu_senddata_log($msg)
{
    $logfile = baidu_get_logfile();
    if (!$logfile) return false;
    $maxfilesize = pow(1024, 2) * 5; //5M
    $_time = date('[Y-m-d H:i:s] ') . "\n";
    if (!file_exists($logfile) || filesize($logfile) > $maxfilesize) {
        file_put_contents($logfile, '<?php exit; ?>'."\n");
    }
    file_put_contents($logfile, $_time.$msg."\n", FILE_APPEND);
}

function baidu_content_filter($post, $forum, array &$images=array())
{
    require_once libfile('function/discuzcode');
    $data = trim($post['message']);
    if (false !== stripos($data, '[hide]')) {
        $data = preg_replace('/\[hide\]([^(\[\/hide\])]*)+\[\/hide\]/i', '', $data); //过滤掉hide中的内容
    }
    $attach = array();
    if (false !== stripos($data, '[attach]')) {
        preg_match_all('/\[attach\](\d+)\[\/attach\]/i', $data, $attach);
        $data = preg_replace('/\[attach\]\d+\[\/attach\]/i', '', $data); //过滤掉附件
        if (isset($attach[1])) {
            $images = array_merge($images, $attach[1]);
        }
    }
    $image1 = $image2 = array();
    if (false !== stripos($data, '[img')) {
        preg_match_all('/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies', $data, $image1);
        preg_match_all('/\[img=\d{1,4}[x|\,]\d{1,4}\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies', $data, $image2);
        if (isset($image1[1])) {
            $images = array_merge($images, $image1[1]);
        }
        if (isset($image2[1])) {
            $images = array_merge($images, $image2[1]);
        }
    }
    $data = discuzcode($data, $post['smileyoff'], $post['bbcodeoff'], $post['htmlon'] & 1,
            $forum['allowsmilies'], $forum['allowbbcode'],
            $forum['allowimgcode'], $forum['allowhtml'], $forum['jammer']);
    $data = strip_tags($data);
    return $data;
}

function baidu_get_site_from_url($url)
{
    $url = trim($url);
    $pos = 0;
    if (0 == strncasecmp('http://', $url, 7)) {
        $pos = 7;
    }
    if (($end = strpos($url, '/', $pos)) > 0) {
        return substr($url, $pos, $end-$pos);
    }
    return substr($url, $pos);
}

function baidu_date_format($time)
{
    date_default_timezone_set('Asia/Shanghai');
    return date('Y-m-d',$time).'T'.date('H:i:s',$time);
}

function baidu_gen_thread_url($tid, $page, $prevpage, $fid='')
{
    global $_G;
    //是否启用伪静态
    if (is_array($_G['setting']['rewritestatus']) && in_array('forum_viewthread', $_G['setting']['rewritestatus'])) {
        $rule = $_G['setting']['rewriterule']['forum_viewthread'];
        if (!$fid && false!==strpos($rule, '{fid}')) {
            $thread = get_thread_by_tid($tid);
            $fid = $thread['fid'];
        }
        $url = $_G['siteurl'] . str_replace(
                array('{tid}', '{page}', '{prevpage}', '{fid}'),
                array($tid, $page, $prevpage, $fid),
                $rule );
    } else {
        $url = $_G['siteurl'] . 'forum.php?mod=viewthread&tid=' . $tid;
    }
    return $url;
}

function baidu_get_forum($fid)
{
    $f = C::t('forum_forum')->fetch_all_by_fid((array)$fid);
    $ff = C::t('forum_forumfield')->fetch_all_by_fid((array)$fid);
    return array_merge($f[$fid], $ff[$fid]);
}

function baidu_get_forum_list()
{
    $forumlist = C::t('forum_forum')->fetch_all_fids(true);
    if (empty($forumlist)) return array();
    $fids = array();
    foreach ($forumlist as $x) {
        $fids[] = $x['fid'];
    }
    $ff = C::t('forum_forumfield')->fetch_all_by_fid($fids);
    $ret = array();
    foreach ($forumlist as $x) {
        $ret[$x['fid']] = array_merge($x, $ff[$x['fid']]);
    }
    return $ret;
}


function baidu_get_sitemap($type, $start, $end=0)
{
    return C::t('#baidusubmit#baidusubmit_sitemap')->get_by_start($type, $start, $end);
}

function baidu_header_status($status)
{
   // 'cgi', 'cgi-fcgi'
   header('Status: '.$status, TRUE);
   header($_SERVER['SERVER_PROTOCOL'].' '.$status);
}

function baidu_strip_invalid_xml($value)
{
    $ret = '';
    if (empty($value)) {
        return $ret;
    }

    $length = strlen($value);
    for ($i=0; $i < $length; $i++) {
        $current = ord($value[$i]);
        if ($current == 0x9 || $current == 0xA || $current == 0xD ||
        ($current >= 0x20 && $current <= 0xD7FF) ||
        ($current >= 0xE000 && $current <= 0xFFFD) ||
        ($current >= 0x10000 && $current <= 0x10FFFF)) {
            $ret .= chr($current);
        } else {
            $ret .= ' ';
        }
    }
    return $ret;
}

function baidu_print_sitemap_index_header()
{
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
    echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', "\n";
}

function baidu_print_sitemap_index_footer()
{
    echo '</sitemapindex>';
}

function baidu_print_sitemap_list($sitemap_arr, $site, $suffix='')
{
    if (!is_array($sitemap_arr)) return;
    if (isset($_GET['debug'])) {
        foreach($sitemap_arr as $sitemap) {
            echo '<sitemap>';
            echo '<loc><![CDATA[', $site, 'plugin.php?id=baidusubmit:', $sitemap['url'], $suffix, ']]></loc>';
            echo '<debug>';
            echo '<itemCount><![CDATA[', $sitemap['item_count'], ']]></itemCount>';
            echo '<fileSize><![CDATA[', $sitemap['file_size'], ']]></fileSize>';
            echo '<lostTime><![CDATA[', $sitemap['lost_time'], ']]></lostTime>';
            echo '<end><![CDATA[', $sitemap['end'], ']]></end>';
            echo '</debug>';
            echo '</sitemap>', "\n";
        }
    } else {
        foreach($sitemap_arr as $sitemap) {
            echo '<sitemap><loc><![CDATA[', $site, 'plugin.php?id=baidusubmit:', $sitemap['url'], $suffix, ']]></loc></sitemap>', "\n";
        }
    }
}

function baidu_senddata_timeout($timeout = -1)
{
    $time = time();
    $timelen = 600; //10分钟
    $skey = 'sendtimeout';
    $mintimeout = 1;
    $maxtimeout = 15;
    //为了实时性，现取
    $row = baidu_get_plugin_setting($skey, true, true);
    //取时间
    if ($timeout < 0) {
        if (empty($row)) return $maxtimeout;
        if ($time - $row['stime'] < $timelen*2) { //若10分钟内有超时，则20分钟内都返回1
            return $row['svalue'] >= 3  ?  $mintimeout  :  $maxtimeout;
        }
        return $maxtimeout;
    }
    //设置时间
    else if ($timeout >= 5) { //超过5秒算超时
        if ($time - $row['stime'] < $timelen) { //10分钟内
            C::t('#baidusubmit#baidusubmit_setting')->update($skey, 1, false, true);
        } else {
            C::t('#baidusubmit#baidusubmit_setting')->update($skey, 1, true, false);
        }
    }
}

function baidu_senddata_error($isget=true)
{
    $time = time();
    $timelen = 600; //10分钟
    $skey = 'senderror';
    //为了实时性，现取
    $row = baidu_get_plugin_setting($skey, true, true);
    //取
    if ($isget) {
        if (empty($row)) return false;
        if ($time - $row['stime'] < $timelen*2) { //若10分钟内有错误，则20分钟内都有效
            return $row['svalue'] >= 3  ?  true  :  false;
        }
        return false;
    }

    //设置
    else if (!$isget) {
        if ($time - $row['stime'] < $timelen) { //10分钟内
            C::t('#baidusubmit#baidusubmit_setting')->update($skey, 1, false, true);
        } else {
            C::t('#baidusubmit#baidusubmit_setting')->update($skey, 1, true, false);
        }
    }
}

function baidu_gen_sitemap_passwd()
{
    return substr(md5(mt_rand(10000000, 99999999).microtime()), 0, 16);
}

function baidu_submit_sitemap_index($action, $type, $site, $sppasswd, $sign)
{
    $zzaction = '';
    if (0 == strncasecmp('del', $action, 3)) {
        $zzaction = '/discuz/deleteSitemap';
    } else if (0 == strncasecmp('add', $action, 3)) {
        $zzaction = '/discuz/saveSitemap';
    } else {
        return false;
    }

    $script = '';
    $stype = '';
    if (1 == $type) {
        $script = 'indexall';
        $stype = 'all';
    } else if (2 == $type) {
        $script = 'indexinc';
        $stype = 'inc';
    } else {
        return false;
    }

    $indexurl = "{$site}plugin.php?id=baidusubmit:{$script}&p={$sppasswd}";
    $zzsite = baidu_get_plugin_config('zzplatform');
    $submiturl = $zzsite.$zzaction.'?site='.urlencode($site).'&indexurl='.urlencode($indexurl).'&sign='.urlencode($sign).'&type='.$stype;

    $ret = baidu_http_send($submiturl);

    return array(
        'json' => $ret,
        'url'  => $submiturl,
    );
}

function baidu_encode_url($url)
{
    $hexchars = '0123456789ABCDEF';
    $i = 0;
    $ret = '';
    while (isset($url[$i])) {
        $c = $url[$i];
        $j = ord($c);
        if ($c == ' ') {
            $ret .= '%20';
        }
        else if ($j > 127) {
            $ret .= '%' . $hexchars[$j>>4] . $hexchars[$j&15];
        }
        else {
            $ret .= $c;
        }
        $i++;
    }
    return $ret;
}

function baidu_update_url_stat($num)
{
    $time = strtotime('today');
    C::t('#baidusubmit#baidusubmit_urlstat')->update($time, intval($num));
    C::t('#baidusubmit#baidusubmit_urlstat')->delete($time-86400*7);
}

function baidu_http_send($url, $limit=0, $post='', $cookie='', $timeout=15)
{
    $return = '';
    $matches = parse_url($url);
    $scheme = $matches['scheme'];
    $host = $matches['host'];
    $path = $matches['path'] ? $matches['path'].(@$matches['query'] ? '?'.$matches['query'] : '') : '/';
    $port = !empty($matches['port']) ? $matches['port'] : 80;

    if (function_exists('curl_init') && function_exists('curl_exec')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $scheme.'://'.$host.':'.$port.$path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            $content = is_array($port) ? http_build_query($post) : $post;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        }
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $data = curl_exec($ch);
        $status = curl_getinfo($ch);
        $errno = curl_errno($ch);
        curl_close($ch);
        if ($errno || $status['http_code'] != 200) {
            return;
        } else {
            return !$limit ? $data : substr($data, 0, $limit);
        }
    }

    if ($post) {
        $content = is_array($port) ? http_build_query($post) : $post;
        $out = "POST $path HTTP/1.0\r\n";
        $header = "Accept: */*\r\n";
        $header .= "Accept-Language: zh-cn\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "User-Agent: ".@$_SERVER['HTTP_USER_AGENT']."\r\n";
        $header .= "Host: $host:$port\r\n";
        $header .= 'Content-Length: '.strlen($content)."\r\n";
        $header .= "Connection: Close\r\n";
        $header .= "Cache-Control: no-cache\r\n";
        $header .= "Cookie: $cookie\r\n\r\n";
        $out .= $header.$content;
    } else {
        $out = "GET $path HTTP/1.0\r\n";
        $header = "Accept: */*\r\n";
        $header .= "Accept-Language: zh-cn\r\n";
        $header .= "User-Agent: ".@$_SERVER['HTTP_USER_AGENT']."\r\n";
        $header .= "Host: $host:$port\r\n";
        $header .= "Connection: Close\r\n";
        $header .= "Cookie: $cookie\r\n\r\n";
        $out .= $header;
    }

    $fpflag = 0;
    $fp = false;
    if (function_exists('fsocketopen')) {
        $fp = fsocketopen($host, $port, $errno, $errstr, $timeout);
    }
    if (!$fp) {
        $context = stream_context_create(array(
            'http' => array(
                'method' => $post ? 'POST' : 'GET',
                'header' => $header,
                'content' => $content,
                'timeout' => $timeout,
            ),
        ));
        $fp = @fopen($scheme.'://'.$host.':'.$port.$path, 'b', false, $context);
        $fpflag = 1;
    }

    if (!$fp) {
        return '';
    } else {
        stream_set_blocking($fp, true);
        stream_set_timeout($fp, $timeout);
        @fwrite($fp, $out);
        $status = stream_get_meta_data($fp);
        if (!$status['timed_out']) {
            while (!feof($fp) && !$fpflag) {
                if (($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {
                    break;
                }
            }
            if ($limit) {
                $return = stream_get_contents($fp, $limit);
            } else {
                $return = stream_get_contents($fp);
            }
        }
        @fclose($fp);
        return $return;
    }
}

function baidu_table_exists($table)
{
    return (bool)DB::result_first("SHOW TABLES LIKE '%t'", array($table));
}