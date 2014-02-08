<?php
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

set_time_limit(300);

if (empty($_GET['p']) || $_GET['p'] != baidu_get_plugin_setting('sppasswd')) {
    baidu_header_status(404);
    return 1;
}

$startTime = intval(@$_GET['start']);

$sitemap = baidu_get_sitemap(2, $startTime);
if (empty($sitemap)) {
    baidu_header_status(404);
    return 1;
}
$endTime = $sitemap['end'];

$client_etag = !empty($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false;
if ($client_etag) {
    //获取etag中的时间
    $client_etag_max_time = intval($client_etag); //取整，去掉后面的无效字符
    //起始设成上次的最大值
    if ($client_etag_max_time > $startTime) {
        $startTime = $client_etag_max_time;
    }
    if ($client_etag_max_time > $endTime) { //抓取过的数据再次抓取的时候
        $etag = $client_etag_max_time;
        header('HTTP/1.1 304 Not Modified');
        header('ETag: '.$etag);
        return 1;
    }
}

//清掉钩子
$_G['setting']['plugins']['func'] = array();

$etag = time();
header('ETag: '.$etag);

define('_MAX_THREAD_COUNT_', 5000);
$threadlist = C::t('#baidusubmit#forum_thread_baidu')->get_thread_by_lastpost($startTime, $endTime, _MAX_THREAD_COUNT_);

$indexsplitsitemap = false;
$threadCount = count($threadlist);
if ($threadCount >= _MAX_THREAD_COUNT_) {
    $indexsplitsitemap = true;
}
$itemCount = 0;
$fileSize = 0;
$index = 0;


global $_G;
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?><urlset>';

$sizesplitsitemap = false;
$forumlist = baidu_get_forum_list();
foreach ($threadlist as $tid => $thread) {
    $index++;
    $forum = $forumlist[$thread['fid']];
    if (!in_array($forum['status'], array(1, 3))) {
        continue;
    }
    if ($forum['status'] == 1 && $forum['viewperm']) {
        $_p = explode("\t", $forum['viewperm']);
        //检查游客组
        if (!in_array('7', $_p)) {
            continue;
        }
    }
    if ($forum['status'] == 3 && $forum['gviewperm'] == 0) {
        continue;
    }
    if ($thread['readperm'] > 1) {
        continue;
    }

    $schema = new BaiduThreadSchema();
    $schema->setForumName($forum['name']);
    //是否启用伪静态
    $schema->setThreadUrl(baidu_gen_thread_url($thread['tid'], 1, 1, $forum['fid']));
    $schema->setThreadTitle($thread['subject']);
    $schema->setReplyCount($thread['replies']);
    $schema->setViewCount($thread['views']);
    $schema->setLastReplyTime($thread['lastpost']);

    $postlist = C::t('forum_post')->fetch_all_by_tid($thread['posttableid'], $tid, true, 'ASC', 0, $_G['ppp']);
    //如果没有内容
    if (empty($postlist)) continue;

    $attachpids = array();
    foreach ($postlist as $row) {
        $row['attachment'] > 0 && $attachpids[] = $row['pid'];
    }

    //附件
    $attachlist = empty($attachpids) ? array() : baidu_get_attachment_by_pids($attachpids, $thread['tid']);
    $sequenceNumber = 1;
    foreach ($postlist as $pid => $eachpost) {
        $post = false;
        $images = array(); //附件
        if (1 == $eachpost['first']) {           //主题帖
            $post = new BaiduPostSchema();
            if($thread['price'] > 0 || $eachpost['status'] % 2 == 1) { //主题价格 看相应主题帖需要花金币
                $post->setPostContent('');
                $post->setViewAuthority(lang('plugin/baidusubmit', 'haveperm'));
            } else {
                if (false !== stripos($eachpost['message'], '[/hide]')) {
                    $post->setViewAuthority(lang('plugin/baidusubmit', 'hidecontent'));
                } else {
                    $post->setViewAuthority(lang('plugin/baidusubmit', 'noperm'));
                }
                $content = baidu_content_filter($eachpost, $forum, $images);
                $post->setPostContent($content);
            }
            $post->setIsHost(1);
            $post->setPostSequenceNumber(1);
            $post->setCreatedTime($eachpost['dateline']);
            $schema->addPost($post);
            $sequenceNumber++;
        } else {
            if ($eachpost['status'] % 2 != 1 && intval($thread['status']) != 34) { //status奇数被屏蔽 status34回帖仅作者可见
                $post = new BaiduPostSchema();
                if (false !== stripos($eachpost['message'], '[/hide]')) {
                    $post->setViewAuthority(lang('plugin/baidusubmit', 'hidecontent'));
                } else {
                    $post->setViewAuthority(lang('plugin/baidusubmit', 'noperm'));
                }
                $content = baidu_content_filter($eachpost, $forum, $images);
                $post->setPostContent($content);
                $post->setIsHost(0);
                $post->setCreatedTime($eachpost['dateline']);
                $post->setPostSequenceNumber($sequenceNumber);
                $schema->addPost($post);
                $sequenceNumber++;
            }
        }
        //如果有附件
        if ($post && !empty($attachlist[$pid])) {
            foreach ($attachlist[$pid] as $a) {
                //if (!in_array($a['aid'], $images)) { //images 里有附件
                //    continue;
                //}
                $_obj = new BaiduAttachmentSchema();
                $_obj->setName($a['filename']);
                $_obj->setSize($a['filesize']);
                $_obj->setDownloadCount($a['downloads']);
                $ap = baidu_get_attachment_authority($a);
                if ($ap > 0) {
                    $authority = $ap;
                } else if (empty($forum['getattachperm']) || (($t = explode("\t", $forum['getattachperm'])) && in_array(7, $t))) {
                    $authority = 0;
                } else {
                    $authority = 4;
                }
                if ($ap == 0) {
                    $attachurl = $_G['setting']['attachurl'].'/forum/'.$a['attachment'];
                    $attachurl = str_replace(array('/./', '//'), '/', $attachurl);
                } else {
                    $attachurl = 'forum.php?mod=attachment&aid='.aidencode($a['aid']);
                }
                $_obj->setDownloadAuthority($authority);
                $_obj->setUrl($_G['siteurl'].$attachurl);
                $post->addAttachment($_obj);
            }
        }
        //图片
        if ($post && !empty($images)) {
            foreach ($images as $x) {
                if (intval($x) > 0) continue; //不要附件
                if (0 != strncasecmp($x, 'http://', 7)) continue; //非网络图片不要
                $_obj = new BaiduAttachmentSchema();
                $_obj->setUrl($x);
                $_obj->setDownloadAuthority(0);
                $post->addAttachment($_obj);
            }
        }
    }
    $output = $schema->toXml() . "\n";
    $fileSizeCheck = $fileSize + strlen($output);
    $itemCount += 1;

    if ($fileSizeCheck >= 1024*1024*8) {
        $sizesplitsitemap = true;
        break;
    }

    $fileSize = $fileSizeCheck;

    echo $output;
    flush();
}
echo '</urlset>';

//分裂数据
if ($sizesplitsitemap || ($indexsplitsitemap && $thread['lastpost']<$endTime)) {  //超过sitemap文件限制进行分裂
    $sp = baidu_get_sitemap(2, $startTime, $endTime);
    if ($sp) {
        //计算裂变
        $newStartTime = $thread['lastpost'];
        //裂变步长
        $stepLen = intval(($newStartTime - $startTime - 1) * 0.3);
        $curTime = time();
        //只裂变到当前时间
        $count = ceil(($curTime - $newStartTime) / $stepLen);
        for ($i=0; $i<$count; $i++) {
            $_xstart = $newStartTime + $stepLen * $i;
            $_xend = $_xstart + $stepLen - 1;
            if ($_xend > $curTime) {
                $_xend = $curTime;
            }
            $url = "sitemapinc&start={$_xstart}";
            C::t('#baidusubmit#baidusubmit_sitemap')->add($url, 2, $_xstart, $_xend);
        }
        //把最后一个加上
        $nextTime = $curTime + 1;
        C::t('#baidusubmit#baidusubmit_sitemap')->add("sitemapinc&start={$nextTime}", 2, $nextTime, $endTime);

        $newEndTime = $newStartTime - 1;
        $newUrl = "sitemapinc&start={$startTime}";
        C::t('#baidusubmit#baidusubmit_sitemap')->update_by_sid(
                    $sp['sid'],
                    array('url' => $newUrl, 'start' => $startTime, 'end' => $newEndTime));

        $endTime = $newEndTime;
    }
}


//记录相关数据
$timeLost = intval(1000 * (microtime(true) - $_G['starttime']));

C::t('#baidusubmit#baidusubmit_sitemap')->update_by_sid(
        $sitemap['sid'],
        array('item_count' => $itemCount, 'file_size' => $fileSize, 'lost_time' => $timeLost));

baidu_update_url_stat($itemCount);