<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
define('NOROBOT', TRUE);

$cvars = $_G['cache']['plugin']['torrent_info'];
$groups_list = (array)unserialize($cvars['groups_list']);
$cvars['groups_list'] = is_array($groups_list) ? $groups_list : array();
$cvars['magnet'] = (array)unserialize($cvars['magnet']);
$aid = $_G['gp_aid'] ? $_G['gp_aid'] : $_G['gp_amp;aid'];
if(!empty($cvars['groups_list'][0]) && !in_array($_G['groupid'], $cvars['groups_list'])) {
    showmessage('quickclear_noperm');
} elseif($aid) {
    $int_aid = intval($aid);
    if($int_aid <= 0 || $int_aid != $aid) {
        $aid = base64_decode($aid);
        list($aid) = explode('|', $aid);
        $int_aid = intval($aid);
    }
    if($int_aid>0) {
        include DISCUZ_ROOT.'./source/discuz_version.php';
		$onlyview = FALSE;

		$attachexists = FALSE;
		$istorrent = FALSE;
		if(!empty($int_aid) && is_numeric($int_aid)) {
            if(DISCUZ_VERSION == 'X2') {
                /* Code for Discuz! X2 */
                loadcache('threadtableids');
                $threadtableids = !empty($_G['cache']['threadtableids']) ? $_G['cache']['threadtableids'] : array();
                if(!in_array(0, $threadtableids)) {
                    $threadtableids = array_merge(array(0), $threadtableids);
                }
                $archiveid = intval($_G['gp_archiveid']);
                if(in_array($archiveid, $threadtableids)) {
                    $threadtable = $archiveid ? "forum_thread_{$archiveid}" : 'forum_thread';
                } else {
                    $threadtable = 'forum_thread';
                }
                $tableid = DB::result_first("SELECT tableid FROM ".DB::table('forum_attachment')." WHERE aid='$int_aid'");
                if(is_numeric($tableid)) {
                    $attach = DB::fetch_first("SELECT * FROM ".DB::table('forum_attachment_'.$tableid)." WHERE aid='$int_aid'");
                    if($_G['uid'] && $attach['uid'] != $_G['uid']) {
                        $thread = DB::fetch_first("SELECT tid, fid, posttableid, price, special FROM ".DB::table($threadtable)." WHERE tid='$attach[tid]' AND displayorder>='0'");
                        if($attach) {
                            $posttable = $thread['posttableid'] ? "forum_post_{$thread['posttableid']}" : 'forum_post';
                            $attach['invisible'] = DB::result_first("SELECT invisible FROM ".DB::table($posttable)." WHERE pid='$attach[pid]'");
                        }
                        if($attach && $attach['invisible'] == 0) {
                            $thread && $attachexists = TRUE;
                        }
                    } else {
                        $attachexists = TRUE;
                    }
                    strtolower(substr($attach['filename'], -8))=='.torrent' && $istorrent = TRUE;
                }
			} else {
                /* Code for Discuz! X2.5 */
                if($attach = C::t('forum_attachment')->fetch($int_aid)) {
                    $attach = C::t('forum_attachment_n')->fetch($attach['tableid'], $int_aid);
                    if($_G['uid'] && $attach['uid'] != $_G['uid']) {
                        $thread = C::t('forum_thread')->fetch_by_tid_displayorder($attach['tid'], 0, '>=', null, 0);
                        if($attach) {
                            $attachpost = C::t('forum_post')->fetch($thread['posttableid'], $attach['pid'], false);
                            $attach['invisible'] = $attachpost['invisible'];
                            unset($attachpost);
                        }
                        if($attach && $attach['invisible'] == 0) {
                            $thread && $attachexists = TRUE;
                        }
                    } else {
                        $attachexists = TRUE;
                    }
                    strtolower(substr($attach['filename'], -8))=='.torrent' && $istorrent = TRUE;
                }
			}
		}
        if($attachexists && $istorrent) {
            $cvars['magnet'] = in_array($_G['groupid'], $cvars['magnet']);
            if(DISCUZ_VERSION == 'X2') {
                /* Code for Discuz! X2 */
                $forum = DB::fetch_first("SELECT f.fid, f.viewperm, f.getattachperm, a.allowgetattach, a.allowgetimage FROM ".DB::table('forum_forumfield')." f
                    LEFT JOIN ".DB::table('forum_access')." a ON a.uid='$_G[uid]' AND a.fid=f.fid
                    WHERE f.fid='$thread[fid]'");

                $_GET['fid'] = $forum['fid'];

                $allowgetattach = !empty($forum['allowgetattach']) || (($_G['group']['allowgetattach']  || $_G['uid'] == $attach['uid']) && !$forum['getattachperm']) || forumperm($forum['getattachperm']);

                if($allowgetattach && ($attach['readperm'] && $attach['readperm'] > $_G['group']['readaccess']) && $_G['adminid'] <= 0 && !($_G['uid'] && $_G['uid'] == $attach['uid'])) {
                    /* 只有特定用户可以下载 */
                    $onlyview = TRUE;
                }

                $ismoderator = in_array($_G['adminid'], array(1, 2)) ? 1 : ($_G['adminid'] == 3 ? DB::result_first("SELECT uid FROM ".DB::table('forum_moderator')." m INNER JOIN ".DB::table($threadtable)." t ON t.tid='$attach[tid]' AND t.fid=m.fid WHERE m.uid='$_G[uid]'") : 0);

                $ispaid = FALSE;
                $exemptvalue = $ismoderator ? 128 : 16;
                if(!$thread['special'] && $thread['price'] > 0 && (!$_G['uid'] || ($_G['uid'] != $attach['uid'] && !($_G['group']['exempt'] & $exemptvalue)))) {
                    if(!$_G['uid'] || $_G['uid'] && !($ispaid = DB::result_first("SELECT uid FROM ".DB::table('common_credit_log')." WHERE uid='$_G[uid]' AND operation='BTC' AND relatedid='$attach[tid]'"))) {
                        /* 主题需要付费，未购买 */
                        $onlyview = TRUE;
                    }
                }

                $exemptvalue = $ismoderator ? 64 : 8;
                if($attach['price'] && (!$_G['uid'] || ($_G['uid'] != $attach['uid'] && !($_G['group']['exempt'] & $exemptvalue)))) {
                    $payrequired = $_G['uid'] ? !DB::result_first("SELECT uid FROM ".DB::table('common_credit_log')." WHERE uid='$_G[uid]' AND relatedid='$attach[aid]' AND operation='BAC'") : 1;
                    /* 附件需要付费，未购买 */
                    $payrequired && $onlyview = TRUE;
                }
			} else {
                /* Code for Discuz! X2.5 */
                $forum = C::t('forum_forumfield')->fetch_info_for_attach($thread['fid'], $_G['uid']);

                $_GET['fid'] = $forum['fid'];

                $allowgetattach = !empty($forum['allowgetattach']) || (($_G['group']['allowgetattach']  || $_G['uid'] == $attach['uid']) && !$forum['getattachperm']) || forumperm($forum['getattachperm']);

                if($allowgetattach && ($attach['readperm'] && $attach['readperm'] > $_G['group']['readaccess']) && $_G['adminid'] <= 0 && !($_G['uid'] && $_G['uid'] == $attach['uid'])) {
                    /* 只有特定用户可以下载 */
                    $onlyview = TRUE;
                }

                $ismoderator = in_array($_G['adminid'], array(1, 2)) ? 1 : ($_G['adminid'] == 3 ? C::t('forum_moderator')->fetch_uid_by_tid($attach['tid'], $_G['uid'], $archiveid) : 0);

                $ispaid = FALSE;
                $exemptvalue = $ismoderator ? 128 : 16;
                if(!$thread['special'] && $thread['price'] > 0 && (!$_G['uid'] || ($_G['uid'] != $attach['uid'] && !($_G['group']['exempt'] & $exemptvalue)))) {
                    if(!$_G['uid'] || $_G['uid'] && !($ispaid = C::t('common_credit_log')->count_by_uid_operation_relatedid($_G['uid'], 'BTC', $attach['tid']))) {
                        /* 主题需要付费，未购买 */
                        $onlyview = TRUE;
                    }
                }

                $exemptvalue = $ismoderator ? 64 : 8;
                if($attach['price'] && (!$_G['uid'] || ($_G['uid'] != $attach['uid'] && !($_G['group']['exempt'] & $exemptvalue)))) {
                    $payrequired = $_G['uid'] ? !C::t('common_credit_log')->count_by_uid_operation_relatedid($_G['uid'], 'BAC', $attach['aid']) : 1;
                    /* 附件需要付费，未购买 */
                    $payrequired && $onlyview = TRUE;
                }
			}
            if($attach['remote']) {
                showmessage(lang('plugin/torrent_info', 'not_support_remote'));
            } else {
                $filename = $_G['setting']['attachdir'].'forum/'.$attach['attachment'];
                if(!file_exists($filename)) {
                    showmessage('attachment_nonexistence');
                } else {
                    include DISCUZ_ROOT.'./source/plugin/torrent_info/class_torrent.php';
                    include DISCUZ_ROOT.'./source/plugin/torrent_info/array_torrent.php';
                    include DISCUZ_ROOT.'./source/plugin/torrent_info/function_torrent.php';
                    $torrent = array();
                    $getTorrent = new Torrent($filename);
                    $torrent['name'] = $getTorrent->name();
                    if($filename != $torrent['name']) {
						$encoding = $getTorrent->encoding;
						$torrent['name'] = diconv($torrent['name'], $encoding);
						$torrent['size'] = sizecount($getTorrent->size());
						$torrent['time'] = dgmdate($getTorrent->{'creation date'});
						$magnet = $getTorrent->magnet();
						$cvars['shorten'] && list($magnet) = explode('&amp;tr=', $magnet);
						$torrent['magnet'] = $magnet;
						$torrent['file'] = array(
							'length' => 0,
							'list' => array()
						);
						$temp = $getTorrent->info['files'];
						if(is_null($temp)) {
							$torrent['file']['length'] = 1;
							$torrent['file']['list'][] = array(
								'name' => $torrent['name'],
								'size' => $torrent['size'],
								'class' => getFiletype($torrent['name'])
							);
						} else {
							foreach((array)$temp as $file) {
								++$torrent['file']['length'];
								$file['path'] = array_reverse($file['path']);
								$name = array_shift($file['path']);
								$name = diconv($name, $encoding);
								if(substr($name, 0, 18) != '_____padding_file_'){
									$size = sizecount($file['length']);
									$class = getFiletype($name);
									$torrent['file']['list'][] = array(
										'name' => $name,
										'size' => $size,
										'class' => $class
									);
								}
							}
						}
						$torrent['announce'] = array('Hidden');
						$torrent['status'] = array();
						if(!$onlyview) {
							$torrent['announce'] = array();
							$temp = $getTorrent->announce();
							if(!is_null($temp)) {
								$hash_info = $getTorrent->hash_info();
								$cvars['safe_key'] = isset($cvars['safe_key']{0}) ? md5($cvars['safe_key']) : NULL;
								if(is_array($temp)) {
									if($cvars['announce']) {
										foreach($temp as $announce) {
											foreach($announce as $data) {
												$torrent['status'][] = rawurlencode(authcode(json_encode(array($hash_info, $data, $cvars['timeout'])), 'ENCODE', $cvars['safe_key']));
												$torrent['announce'][] = $data;
											}
										}
									} else {
										$torrent['announce'][] = $temp[0][0];
									}
								} else {
									$cvars['announce'] && $torrent['status'][] = rawurlencode(authcode(json_encode(array($hash_info, $torrent['announce'], $cvars['timeout'])), 'ENCODE', $cvars['safe_key']));
									$torrent['announce'][] = $temp;
								}
							} else {
								$torrent['announce'][] = 'Unknown';
							}
						}
						$torrent['status'] = json_encode($torrent['status']);
						$torrent['URI'] = $cvars['remote_url'] ? $cvars['remote_url'] . '?str=' : './plugin.php?id=torrent_info:get&str=';
						include template('torrent_info:torrent');
                    } else {
						showmessage(lang('plugin/torrent_info', 'not_torrent_file'));
                    }
                    unset($torrent);
                }
            }
        } elseif(!$istorrent) {
            showmessage(lang('plugin/torrent_info', 'not_torrent_file'));
        } else {
            showmessage('attachment_nonexistence');
        }
    }
} else {
    showmessage('attachment_nonexistence');
}
?>