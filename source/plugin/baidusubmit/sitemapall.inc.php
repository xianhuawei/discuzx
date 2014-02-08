<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

set_time_limit(300);

if (empty($_GET['p']) || $_GET['p'] != baidu_get_plugin_setting('sppasswd')) {
    baidu_header_status(404);
    return 1;
}

$start_tid = intval($_GET['start']);

$sitemap = baidu_get_sitemap(1, $start_tid);
if (empty($sitemap)) {
    baidu_header_status(404);
    return 1;
}

$end_tid = $sitemap['end'];

$client_etag = !empty($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false;
if ($client_etag) {
    $client_etag_max_tid = intval($client_etag); //取整，去掉后面的无效字符
    //起始id设成上次的最大值
    if ($client_etag_max_tid > $start_tid) {
        $start_tid = $client_etag_max_tid;
    }
    if ($client_etag_max_tid >= $end_tid) { //抓取过的数据再次抓取的时候
        $etag = $client_etag;
        header('HTTP/1.1 304 Not Modified');
        header('ETag: '.$etag);
        return 1;
    }
}

//清掉钩子
$_G['setting']['plugins']['func'] = array();

//设成最后的值
$etag = $end_tid;
header('ETag: '.$etag);

$threadlist = C::t('#baidusubmit#forum_thread_baidu')->get_thread_by_tidrange($start_tid, $end_tid);
$itemCount = 0;
$fileSize = 0;
$urlnum = 0;
$installmaxtid = baidu_get_plugin_setting('installmaxtid');

global $_G;
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?><urlset>';

$forumlist = baidu_get_forum_list();
foreach ($threadlist as $tid => $thread) {
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
    foreach ($postlist as  $pid => $eachpost) {
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
    $itemCountCheck = $itemCount + 1;

    // split sitemap file
    if ($fileSizeCheck >= 1024*1024*8 || $itemCountCheck > 5000) {
        // 并发问题
        $sp = baidu_get_sitemap(1, $start_tid, $end_tid);
        if ($sp) {
            $new_start_tid = $thread['tid'];
            $past_tid = $new_start_tid - $start_tid - 1;
            $count = ceil(($end_tid - $new_start_tid) / $past_tid);

            for ($i=0; $i<$count; $i++) {
                $_xstart = $new_start_tid + $past_tid * $i;
                $_xend = $_xstart + $past_tid - 1;
                if ($_xend > $end_tid) {
                    $_xend = $end_tid;
                }
                $url = "sitemapall&start={$_xstart}";
                C::t('#baidusubmit#baidusubmit_sitemap')->add($url, 1, $_xstart, $_xend);
            }

            $new_end_tid = $new_start_tid - 1;
            $new_url = "sitemapall&start={$start_tid}";
            C::t('#baidusubmit#baidusubmit_sitemap')->update_by_sid(
                    $sp['sid'],
                    array('url' => $new_url, 'start' => $start_tid, 'end' => $new_end_tid));

            $end_tid = $new_end_tid;
        }
        break;
    }
    echo $output;

    $fileSize = $fileSizeCheck;
    $itemCount = $itemCountCheck;

    if ($tid <= $installmaxtid) {
        $urlnum ++;
    }

    flush();
}
echo '</urlset>';

$timeLost = intval(1000 * (microtime(true) - $_G['starttime']));
C::t('#baidusubmit#baidusubmit_sitemap')->update_by_sid(
        $sitemap['sid'],
        array('item_count' => $itemCount, 'file_size' => $fileSize, 'lost_time' => $timeLost));

baidu_update_url_stat($urlnum);