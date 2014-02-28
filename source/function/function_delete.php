<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_delete.php 34074 2013-10-08 01:30:38Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once libfile('function/home');

/**
 * 删除用户
 * @param string $uids 待删的 ID 数组
 * @param boolean $delpost 是否包含帖子信息
 */
function deletemember($uids, $delpost = true) {
	global $_G;
	if(!$uids) {
		return;
	}
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletemember']) {
		$_G['deleteposuids'] = & $uids;
		$hookparam = func_get_args();
		hookscript('deletemember', 'global', 'funcs', array('param' => $hookparam, 'step' => 'check'), 'deletemember');
	}
	if($delpost) {
		deleteattach($uids, 'uid');
		deletepost($uids, 'authorid');
	}

	$arruids = $uids;
	$uids = dimplode($uids);
	$numdeleted = count($arruids);
	foreach(array('common_member_field_forum', 'common_member_field_home', 'common_member_count',
		'common_member_profile', 'common_member_status',) as $table) {
		C::t($table)->delete($arruids, true, 1);
	}

	foreach(array( 'common_member_log', 'common_member_verify', 'common_member_validate', 'common_member_magic') as $table) {
		C::t($table)->delete($arruids, true);
	}

	C::t('forum_access')->delete_by_uid($arruids);
	C::t('common_member_verify_info')->delete_by_uid($arruids);
	C::t('common_member_action_log')->delete_by_uid($arruids);
	C::t('forum_moderator')->delete_by_uid($arruids);
	C::t('forum_post_location')->delete_by_uid($arruids);
	$doids = array();
	$query = C::t('home_doing')->fetch_all_by_uid_doid($arruids);
	foreach($query as $value) {
		$doids[$value['doid']] = $value['doid'];
	}

	C::t('home_docomment')->delete_by_doid_uid($doids, $arruids);
	C::t('common_domain')->delete_by_id_idtype($arruids, 'home');
	C::t('home_feed')->delete_by_uid($arruids);
	C::t('home_notification')->delete_by_uid($arruids);
	C::t('home_poke')->delete_by_uid_or_fromuid($uids);
	C::t('home_comment')->delete_by_uid($arruids);
	C::t('home_visitor')->delete_by_uid_or_vuid($uids);
	C::t('home_friend')->delete_by_uid_fuid($arruids);
	C::t('home_friend_request')->delete_by_uid_or_fuid($arruids);
	C::t('common_invite')->delete_by_uid_or_fuid($arruids);
	C::t('common_myinvite')->delete_by_touid_or_fromuid($uids);
	C::t('common_moderate')->delete($arruids, 'uid_cid');
	C::t('common_member_forum_buylog')->delete_by_uid($arruids);
	C::t('forum_threadhidelog')->delete_by_uid($arruids);
	C::t('common_member_crime')->delete_by_uid($arruids);

	foreach(C::t('forum_collectionfollow')->fetch_all_by_uid($arruids) as $follow) {
		C::t('forum_collection')->update_by_ctid($follow['ctid'], 0, -1);
	}

	foreach(C::t('forum_collectioncomment')->fetch_all_by_uid($arruids) as $comment) {
		C::t('forum_collection')->update_by_ctid($comment['ctid'], 0, 0, -1);
	}

	$query = C::t('home_pic')->fetch_all_by_uid($uids);
	foreach($query as $value) {
		$pics[] = $value;
	}
	deletepicfiles($pics);

	//note 删除相册封面图片
	include_once libfile('function/home');
	$query = C::t('home_album')->fetch_all_by_uid($arruids);
	foreach($query as $value) {
		pic_delete($value['pic'], 'album', 0, ($value['picflag'] == 2 ? 1 : 0));
	}

	C::t('common_mailcron')->delete_by_touid($arruids);

	foreach(array('home_doing', 'home_share', 'home_album', 'common_credit_rule_log', 'common_credit_rule_log_field',
		'home_pic', 'home_blog', 'home_blogfield', 'home_class', 'home_clickuser',
		'home_userapp', 'home_userappfield', 'home_show', 'forum_collectioncomment', 'forum_collectionfollow', 'forum_collectionteamworker') as $table) {
		C::t($table)->delete_by_uid($arruids);
	}
	C::t('common_member')->delete($arruids, 1, 1);

	manyoulog('user', $uids, 'delete');
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletemember']) {
		hookscript('deletemember', 'global', 'funcs', array('param' => $hookparam, 'step' => 'delete'), 'deletemember');
	}
	return $numdeleted;
}

/**
 * 删除帖子
 * @param array $ids 待删的 ID 数组
 * @param string $idtype authorid/tid/pid
 * @param boolean $credit 是否处理积分
 * @param int $posttableid post分表ID
 */
function deletepost($ids, $idtype = 'pid', $credit = false, $posttableid = false, $recycle = false) {
	global $_G;
	$recycle = $recycle && $idtype == 'pid' ? true : false;
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletepost']) {
		$_G['deletepostids'] = & $ids;
		$hookparam = func_get_args();
		hookscript('deletepost', 'global', 'funcs', array('param' => $hookparam, 'step' => 'check'), 'deletepost');
	}
	if(!$ids || !in_array($idtype, array('authorid', 'tid', 'pid'))) {
		return 0;
	}

	//note post分表缓存
	loadcache('posttableids');
	$posttableids = !empty($_G['cache']['posttableids']) ? ($posttableid !== false && in_array($posttableid, $_G['cache']['posttableids']) ? array($posttableid) : $_G['cache']['posttableids']): array('0');

	$count = count($ids);
	$idsstr = dimplode($ids);

	//处理积分
	if($credit) {
		$tuidarray = $ruidarray = array();
		foreach($posttableids as $id) {
			$postlist = array();
			if($idtype == 'pid') {
				$postlist = C::t('forum_post')->fetch_all($id, $ids, false);
			} elseif($idtype == 'tid') {
				$postlist = C::t('forum_post')->fetch_all_by_tid($id, $ids, false);
			} elseif($idtype == 'authorid') {
				$postlist = C::t('forum_post')->fetch_all_by_authorid($id, $ids, false);
			}
			foreach($postlist as $post) {
				if($post['invisible'] != -1 && $post['invisible'] != -5) {
					if($post['first']) {
						$tuidarray[$post['fid']][] = $post['authorid'];
					} else {
						$ruidarray[$post['fid']][] = $post['authorid'];
						if($post['authorid'] > 0 && $post['replycredit'] > 0) {
							$replycredit_list[$post['authorid']][$post['tid']] += $post['replycredit'];
						}
					}
					$tids[] = $post['tid'];
				}
			}
			unset($postlist);
		}

		if($tuidarray || $ruidarray) {
			require_once libfile('function/post');
		}
		//处理发贴的积分
		if($tuidarray) {
			foreach($tuidarray as $fid => $tuids) {
				updatepostcredits('-', $tuids, 'post', $fid);
			}
		}
		//处理回帖的积分
		if($ruidarray) {
			foreach($ruidarray as $fid => $ruids) {
				updatepostcredits('-', $ruids, 'reply', $fid);
			}
		}
	}

	foreach($posttableids as $id) {
		if($recycle) {
			C::t('forum_post')->update($id, $ids, array('invisible' => -5));
		} else {
			if($idtype == 'pid') {
				C::t('forum_post')->delete($id, $ids);
				C::t('forum_postcomment')->delete_by_pid($ids);
				C::t('forum_postcomment')->delete_by_rpid($ids);
			} elseif($idtype == 'tid') {
				C::t('forum_post')->delete_by_tid($id, $ids);
				C::t('forum_postcomment')->delete_by_tid($ids);
			} elseif($idtype == 'authorid') {
				C::t('forum_post')->delete_by_authorid($id, $ids);
				C::t('forum_postcomment')->delete_by_authorid($ids);
			}
			C::t('forum_trade')->delete_by_id_idtype($ids, ($idtype == 'authorid' ? 'sellerid' : $idtype));
			C::t('home_feed')->delete_by_id_idtype($ids, ($idtype == 'authorid' ? 'uid' : $idtype));
		}
	}
	if(!$recycle && $idtype != 'authorid') {
		if($idtype == 'pid') {
			C::t('forum_poststick')->delete_by_pid($ids);
		} elseif($idtype == 'tid') {
			C::t('forum_poststick')->delete_by_tid($ids);
		}

	}
	if($idtype == 'pid') {
		C::t('forum_postcomment')->delete_by_rpid($ids);
		C::t('common_moderate')->delete($ids, 'pid');
		C::t('forum_post_location')->delete($ids);
		C::t('forum_filter_post')->delete_by_pid($ids);
		C::t('forum_hotreply_number')->delete_by_pid($ids);
		C::t('forum_hotreply_member')->delete_by_pid($ids);
	} elseif($idtype == 'tid') {
		C::t('forum_post_location')->delete_by_tid($ids);
		C::t('forum_filter_post')->delete_by_tid($ids);
		C::t('forum_hotreply_number')->delete_by_tid($ids);
		C::t('forum_hotreply_member')->delete_by_tid($ids);
		C::t('forum_sofa')->delete($ids);
	} elseif($idtype == 'authorid') {
		C::t('forum_post_location')->delete_by_uid($ids);
	}
	if($replycredit_list) {
		foreach(C::t('forum_replycredit')->fetch_all($tids) as $rule) {
			$rule['extcreditstype'] = $rule['extcreditstype'] ? $rule['extcreditstype'] : $_G['setting']['creditstransextra'][10] ;
			$replycredity_rule[$rule['tid']] = $rule;
		}
		foreach($replycredit_list AS $uid => $tid_credit) {
			foreach($tid_credit AS $tid => $credit) {
				$uid_credit[$replycredity_rule[$tid]['extcreditstype']] -= $credit;
			}
			updatemembercount($uid, $uid_credit, true);
		}
	}
	if(!$recycle) {
		deleteattach($ids, $idtype);
	}
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletepost']) {
		hookscript('deletepost', 'global', 'funcs', array('param' => $hookparam, 'step' => 'delete'), 'deletepost');
	}
	return $count;
}

function deletethreadcover($tids) {
	global $_G;
	loadcache(array('threadtableids', 'posttableids'));
	$threadtableids = !empty($_G['cache']['threadtableids']) ? $_G['cache']['threadtableids'] : array(0);
	$deletecover = array();
	foreach($threadtableids as $tableid) {
		foreach(C::t('forum_thread')->fetch_all_by_tid($tids, 0, 0, $tableid) as $row) {
			if($row['cover']) {
				$deletecover[$row['tid']] = $row['cover'];
			}
		}
	}
	if($deletecover) {
		foreach($deletecover as $tid => $cover) {
			$filename = getthreadcover($tid, 0, 1);
			$remote = $cover < 0 ? 1 : 0;
			dunlink(array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0));
		}
	}
}

/**
 * 删除主题
 * @param array $ids 待删的 ID 数组
 * @param boolean $membercount 是否更新用户帖数统计
 * @param boolean $credit 是否处理积分
 * @param boolean $ponly 是否只处理分表、入回收站时使用
 */
function deletethread($tids, $membercount = false, $credit = false, $ponly = false) {
	global $_G;
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletethread']) {
		$_G['deletethreadtids'] = & $tids;
		$hookparam = func_get_args();
		hookscript('deletethread', 'global', 'funcs', array('param' => $hookparam, 'step' => 'check'), 'deletethread');
	}
	if(!$tids) {
		return 0;
	}

	$count = count($tids);
	$arrtids = $tids;
	$tids = dimplode($tids);

	//note 主题分表缓存
	loadcache(array('threadtableids', 'posttableids'));
	$threadtableids = !empty($_G['cache']['threadtableids']) ? $_G['cache']['threadtableids'] : array();
	$posttableids = !empty($_G['cache']['posttableids']) ? $_G['cache']['posttableids'] : array('0');
	//补充主题主表
	if(!in_array(0, $threadtableids)) {
		$threadtableids = array_merge(array(0), $threadtableids);
	}

	C::t('common_moderate')->delete($arrtids, 'tid');
	C::t('forum_threadclosed')->delete($arrtids);
	C::t('forum_newthread')->delete_by_tids($arrtids);

	//note 收集待删的tid、fid、posttableid、threadtables
	$cachefids = $atids = $fids = $postids = $threadtables = array();
	foreach($threadtableids as $tableid) {
		foreach(C::t('forum_thread')->fetch_all_by_tid($arrtids, 0, 0, $tableid) as $row) {
			$atids[] = $row['tid'];
			//note 整理出回帖分表
			$row['posttableid'] = !empty($row['posttableid']) && in_array($row['posttableid'], $posttableids) ? $row['posttableid'] : '0';
			$postids[$row['posttableid']][$row['tid']] = $row['tid'];
			if($tableid) {
				$fids[$row['fid']][] = $tableid;
			}
			$cachefids[$row['fid']] = $row['fid'];
		}
		if(!$tableid && !$ponly) {
			$threadtables[] = $tableid;
		}
	}

	//更新主题、帖子的积分或用户统计
	if($credit || $membercount) {
		$losslessdel = $_G['setting']['losslessdel'] > 0 ? TIMESTAMP - $_G['setting']['losslessdel'] * 86400 : 0;

		//note 从分表中得到所有的post列表
		$postlist = $uidarray = $tuidarray = $ruidarray = array();
		foreach($postids as $posttableid => $posttabletids) {
			foreach(C::t('forum_post')->fetch_all_by_tid($posttableid, $posttabletids, false) as $post) {
				if($post['invisible'] != -1 && $post['invisible'] != -5) {
					$postlist[] = $post;
				}
			}
		}
		foreach(C::t('forum_replycredit')->fetch_all($arrtids) as $rule) {
			$rule['extcreditstype'] = $rule['extcreditstype'] ? $rule['extcreditstype'] : $_G['setting']['creditstransextra'][10] ;
			$replycredit_rule[$rule['tid']] = $rule;
		}

		//note 处理post
		foreach($postlist as $post) {
			if($post['dateline'] < $losslessdel) {
				if($membercount) {
					if($post['first']) {
						updatemembercount($post['authorid'], array('threads' => -1, 'post' => -1), false);
					} else {
						updatemembercount($post['authorid'], array('posts' => -1), false);
					}
				}
			} else {
				if($credit) {
					if($post['first']) {
						$tuidarray[$post['fid']][] = $post['authorid'];
					} else {
						$ruidarray[$post['fid']][] = $post['authorid'];
					}
				}
			}
			if($credit || $membercount) {
				if($post['authorid'] > 0 && $post['replycredit'] > 0) {
					if($replycredit_rule[$post['tid']]['extcreditstype']) {
						updatemembercount($post['authorid'], array($replycredit_rule[$post['tid']]['extcreditstype'] => (int)('-'.$post['replycredit'])));
					}
				}
			}
		}

		if($credit) {
			if($tuidarray || $ruidarray) {
				require_once libfile('function/post');
			}
			if($tuidarray) {
				foreach($tuidarray as $fid => $tuids) {
					updatepostcredits('-', $tuids, 'post', $fid);
				}
			}
			if($ruidarray) {
				foreach($ruidarray as $fid => $ruids) {
					updatepostcredits('-', $ruids, 'reply', $fid);
				}
			}
			//note 处理附件积分
			$auidarray = $attachtables = array();
			foreach($atids as $tid) {
				$attachtables[getattachtableid($tid)][] = $tid;
			}
			foreach($attachtables as $attachtable => $attachtids) {
				foreach(C::t('forum_attachment_n')->fetch_all_by_id($attachtable, 'tid', $attachtids) as $attach) {
					if($attach['dateline'] > $losslessdel) {
						$auidarray[$attach['uid']] = !empty($auidarray[$attach['uid']]) ? $auidarray[$attach['uid']] + 1 : 1;
					}
				}
			}
			if($auidarray) {
				$postattachcredits = !empty($_G['forum']['postattachcredits']) ? $_G['forum']['postattachcredits'] : $_G['setting']['creditspolicy']['postattach'];
				updateattachcredits('-', $auidarray, $postattachcredits);
			}
		}
	}

	//note 删除淘专辑内主题
	$relatecollection = C::t('forum_collectionthread')->fetch_all_by_tids($arrtids);
	if(count($relatecollection) > 0) {
		$collectionids = array();
		foreach($relatecollection as $collection) {
			$collectionids[] = $collection['ctid'];
		}
		$collectioninfo = C::t('forum_collection')->fetch_all($collectionids);
		foreach($relatecollection as $collection) {
			$decthread = C::t('forum_collectionthread')->delete_by_ctid_tid($collection['ctid'], $arrtids);
			$lastpost = null;
			if(in_array($collectioninfo[$collection['ctid']]['lastpost'], $arrtids) && ($collectioninfo[$collection['ctid']]['threadnum'] - $decthread) > 0) {
				$collection_thread = C::t('forum_collectionthread')->fetch_by_ctid_dateline($collection['ctid']);
				if($collection_thread) {
					$thread = C::t('forum_thread')->fetch($collection_thread['tid']);
					$lastpost = array(
						'lastpost' => $thread['tid'],
						'lastsubject' => $thread['subject'],
						'lastposttime' => $thread['dateline'],
						'lastposter' => $thread['authorid']
					);
				}
			}
			C::t('forum_collection')->update_by_ctid($collection['ctid'], -$decthread, 0, 0, 0, 0, 0, $lastpost);
		}
		C::t('forum_collectionrelated')->delete($arrtids);
	}
	//清除帖子列表缓存数据
	if($cachefids) {
		C::t('forum_thread')->clear_cache($cachefids, 'forumdisplay_');
	}
	if($ponly) {
		if($_G['setting']['plugins']['func'][HOOKTYPE]['deletethread']) {
			hookscript('deletethread', 'global', 'funcs', array('param' => $hookparam, 'step' => 'delete'), 'deletethread');
		}
		C::t('forum_thread')->update($arrtids, array('displayorder'=>-1, 'digest'=>0, 'moderated'=>1));
		foreach($postids as $posttableid=>$oneposttids) {
			C::t('forum_post')->update_by_tid($posttableid, $oneposttids, array('invisible' => '-1'));
		}
		return $count;
	}

	//note 回帖奖励积分清理
	C::t('forum_replycredit')->delete($arrtids);
	C::t('forum_post_location')->delete_by_tid($arrtids);
	C::t('common_credit_log')->delete_by_operation_relatedid(array('RCT', 'RCA', 'RCB'), $arrtids);
	C::t('forum_threadhidelog')->delete_by_tid($arrtids);
	deletethreadcover($arrtids);
	//note 删除主题
	foreach($threadtables as $tableid) {
		C::t('forum_thread')->delete_by_tid($arrtids, false, $tableid);
	}

	//删除帖子、附件
	if($atids) {
		foreach($postids as $posttableid=>$oneposttids) {
			deletepost($oneposttids, 'tid', false, $posttableid);
		}
		deleteattach($atids, 'tid');
	}
	//note 更新分表主题帖子数
	if($fids) {
		loadcache('forums');
		foreach($fids as $fid => $tableids) {
			if(empty($_G['cache']['forums'][$fid]['archive'])) {
				continue;
			}
			foreach(C::t('forum_thread')->count_posts_by_fid($fid) as $row) {
				C::t('forum_forum_threadtable')->insert(array(
						'fid' => $fid,
						'threadtableid' => $tableid,
						'threads' => $row['threads'],
						'posts' => $row['posts']
				), false, true);
			}
		}
	}

	//note 处理附属表 新增主题相关表的时候要在这里添加
	foreach(array('forum_forumrecommend', 'forum_polloption', 'forum_poll', 'forum_polloption_image', 'forum_activity', 'forum_activityapply', 'forum_debate',
		'forum_debatepost', 'forum_threadmod', 'forum_relatedthread',
		'forum_pollvoter', 'forum_threadimage', 'forum_threadpreview') as $table) {
		C::t($table)->delete_by_tid($arrtids);
	}
	C::t('forum_typeoptionvar')->delete_by_tid($arrtids);//note 从上面移动到这里处理
	C::t('forum_poststick')->delete_by_tid($arrtids);//note 从上面移动到这里处理
	C::t('forum_filter_post')->delete_by_tid($arrtids);
	C::t('forum_hotreply_member')->delete_by_tid($arrtids);
	C::t('forum_hotreply_number')->delete_by_tid($arrtids);
	C::t('home_feed')->delete_by_id_idtype($arrtids, 'tid');
	C::t('common_tagitem')->delete(0, $arrtids, 'tid');
	C::t('forum_threadrush')->delete($arrtids);
	if($_G['setting']['plugins']['func'][HOOKTYPE]['deletethread']) {
		hookscript('deletethread', 'global', 'funcs', array('param' => $hookparam, 'step' => 'delete'), 'deletethread');
	}
	return $count;
}

/**
 * 删除论坛附件
 * @param type $ids 待删的 ID 数组
 * @param type $idtype uid/authorid/tid/pid
 */
function deleteattach($ids, $idtype = 'aid') {
	global $_G;
	if(!$ids || !in_array($idtype, array('authorid', 'uid', 'tid', 'pid'))) {
		return;
	}
	$idtype = $idtype == 'authorid' ? 'uid' : $idtype;

	$pics = $attachtables = array();

	if($idtype == 'tid') {
		$pollImags = C::t('forum_polloption_image')->fetch_all_by_tid($ids);
		foreach($pollImags as $image) {
			dunlink($image);
		}
	}
	foreach(C::t('forum_attachment')->fetch_all_by_id($idtype, $ids) as $attach) {
		$attachtables[$attach['tableid']][] = $attach['aid'];
	}

	foreach($attachtables as $attachtable => $aids) {
		if($attachtable == 127) {
			continue;
		}
		$attachs = C::t('forum_attachment_n')->fetch_all($attachtable, $aids);
		foreach($attachs as $attach) {
			if($attach['picid']) {
				$pics[] = $attach['picid'];
			}
			dunlink($attach);
		}
		C::t('forum_attachment_exif')->delete($aids);
		C::t('forum_attachment_n')->delete($attachtable, $aids);
	}
	C::t('forum_attachment')->delete_by_id($idtype, $ids);
	if($pics) {
		$albumids = array();
		C::t('home_pic')->delete($pics);
		$query = C::t('home_pic')->fetch_all($pics);
		foreach($query as $album) {
			if(!in_array($album['albumid'], $albumids)) {
				C::t('home_album')->update($album['albumid'], array('picnum' => C::t('home_pic')->check_albumpic($album['albumid'])));
				$albumids[] = $album['albumid'];
			}
		}
	}
}

/**
 * 删除评论
 * @param array $cids 待删除的 ID 数组
 */
function deletecomments($cids) {
	global $_G;

	$blognums = $newcids = $dels = $counts = array();
	$allowmanage = checkperm('managecomment');

	$query = C::t('home_comment')->fetch_all($cids);
	$deltypes = array();
	foreach($query as $value) {
		if($allowmanage || $value['authorid'] == $_G['uid'] || $value['uid'] == $_G['uid']) {
			$dels[] = $value;
			$newcids[] = $value['cid'];
			$deltypes[] = $value['idtype'].'_cid';
			if($value['authorid'] != $_G['uid'] && $value['uid'] != $_G['uid']) {
				$counts[$value['authorid']]['coef'] -= 1;
			}
			if($value['idtype'] == 'blogid') {
				$blognums[$value['id']]++;
			}
		}
	}

	if(empty($dels)) return array();

	C::t('home_comment')->delete($newcids);
	for($i = 0; $i < count($newcids); $i++) {
		C::t('common_moderate')->delete($newcids[$i], $deltypes[$i]);
	}

	//扣除相应的积分
	if($counts) {
		foreach ($counts as $uid => $setarr) {
			batchupdatecredit('comment', $uid, array(), $setarr['coef']);
		}
	}
	//更新统计
	if($blognums) {
		$nums = renum($blognums);
		foreach ($nums[0] as $num) {
			C::t('home_blog')->increase($nums[1][$num], 0, array('replynum' => -$num));
		}
	}
	return $dels;
}

/**
 * 删除博客
 * @param array $blogids 待删除的 ID 数组
 */
function deleteblogs($blogids) {
	global $_G;

	//获取博客信息
	$blogs = $newblogids = $counts = array();
	$allowmanage = checkperm('manageblog');

	$query = C::t('home_blog')->fetch_all($blogids);
	foreach($query as $value) {
		if($allowmanage || $value['uid'] == $_G['uid']) {
			$blogs[] = $value;
			$newblogids[] = $value['blogid'];
			//积分
			if($value['status'] == 0) {//note 如果没有通过审核就删除，则不需要处理积分和用户日志数
				if($value['uid'] != $_G['uid']) {
					$counts[$value['uid']]['coef'] -= 1;
				}
				$counts[$value['uid']]['blogs'] -= 1;
			}
		}
	}
	if(empty($blogs)) return array();

	//数据删除
	C::t('common_moderate')->delete($newblogids, 'blogid');
	C::t('common_moderate')->delete($newblogids, 'blogid_cid');

	if(getglobal('setting/blogrecyclebin') && !$force) {
		C::t('home_blog')->update($newblogids, array('status' => -1));
		return $blogs;
	}
	C::t('home_blog')->delete($newblogids);
	C::t('home_blogfield')->delete($newblogids);
	C::t('home_comment')->delete('', $newblogids, 'blogid');
	C::t('home_feed')->delete_by_id_idtype($newblogids, 'blogid');
	C::t('home_clickuser')->delete_by_id_idtype($newblogids, 'blogid');

	//更新统计
	if($counts) {
		foreach ($counts as $uid => $setarr) {
			batchupdatecredit('publishblog', $uid, array('blogs' => $setarr['blogs']), $setarr['coef']);
		}
	}

	//删除标签关系
	C::t('common_tagitem')->delete(0, $newblogids, 'blogid');

	return $blogs;
}

/**
 * 删除事件
 * @param array $feedids 待删除的 ID 数组
 */
function deletefeeds($feedids) {
	global $_G;

	$allowmanage = checkperm('managefeed');

	$feeds = $newfeedids = array();
	$query = C::t('home_feed')->fetch_all($feedids);
	foreach($query as $value) {
		if($allowmanage || $value['uid'] == $_G['uid']) {//管理员/作者
			$newfeedids[] = $value['feedid'];
			$feeds[] = $value;
		}
	}

	if(empty($newfeedids)) return array();

	C::t('home_feed')->delete($newfeedids);

	return $feeds;
}

/**
 * 删除分享
 * @param array $sids 待删除的 ID 数组
 */
function deleteshares($sids) {
	global $_G;

	$allowmanage = checkperm('manageshare');

	$shares = $newsids = $counts = array();
	foreach(C::t('home_share')->fetch_all($sids) as $value) {
		if($allowmanage || $value['uid'] == $_G['uid']) {//管理员/作者
			$shares[] = $value;
			$newsids[] = $value['sid'];

			//积分
			if($value['uid'] != $_G['uid']) {
				$counts[$value['uid']]['coef'] -= 1;
			}
			$counts[$value['uid']]['sharings'] -= 1;
		}
	}
	if(empty($shares)) return array();

	C::t('home_share')->delete($newsids);
	C::t('home_comment')->delete('', $newsids, 'sid');
	C::t('home_feed')->delete_by_id_idtype($newsids, 'sid');
	C::t('common_moderate')->delete($newsids, 'sid');
	C::t('common_moderate')->delete($newsids, 'sid_cid');

	//更新统计
	if($counts) {
		foreach ($counts as $uid => $setarr) {
			batchupdatecredit('createshare', $uid, array('sharings' => $setarr['sharings']), $setarr['coef']);
		}
	}

	return $shares;
}

/**
 * 删除记录
 * @param array $ids 待删除的 ID 数组
 */
function deletedoings($ids) {
	global $_G;

	$allowmanage = checkperm('managedoing');

	$doings = $newdoids = $counts = array();
	$query = C::t('home_doing')->fetch_all($ids);
	foreach($query as $value) {
		if($allowmanage || $value['uid'] == $_G['uid']) {//管理员/作者
			$doings[] = $value;
			$newdoids[] = $value['doid'];

			//积分
			if($value['uid'] != $_G['uid']) {
				$counts[$value['uid']]['coef'] -= 1;
			}
			$counts[$value['uid']]['doings'] -= 1;
		}
	}

	if(empty($doings)) return array();

	C::t('home_doing')->delete($newdoids);
	C::t('home_docomment')->delete_by_doid_uid($newdoids);
	C::t('home_feed')->delete_by_id_idtype($newdoids, 'doid');
	C::t('common_moderate')->delete($newdoids, 'doid');

	//更新统计
	if($counts) {
		foreach ($counts as $uid => $setarr) {
			if ($uid) {
				batchupdatecredit('doing', $uid, array('doings' => $setarr['doings']), $setarr['coef']);
				$lastdoing = C::t('home_doing')->fetch_all_by_uid_doid($uid, '', 'dateline', 0, 1, true, true);
				$setarr = array('recentnote'=>$lastdoing[0]['message'], 'spacenote'=>$lastdoing[0]['message']);
				C::t('common_member_field_home')->update($_G['uid'], $setarr);
			}
		}
	}

	return $doings;
}

/**
 * 删除空间
 * @param array $uid 待删除的用户 ID
 */
function deletespace($uid) {
	global $_G;

	$allowmanage = checkperm('managedelspace');

	//软删除
	if($allowmanage) {
		C::t('common_member')->update($uid, array('status' => 1));
		manyoulog('user', $uid, 'delete');
		return true;
	} else {
		return false;
	}
}

/**
 * 删除图片
 * @param array $picids 待删除的 ID 数组
 */
function deletepics($picids) {
	global $_G;

	$albumids = $sizes = $pics = $newids = array();
	$allowmanage = checkperm('managealbum');

	$haveforumpic = false;
	$query = C::t('home_pic')->fetch_all($picids);
	foreach($query as $value) {
		if($allowmanage || $value['uid'] == $_G['uid']) {
			//删除文件
			$pics[] = $value;
			$newids[] = $value['picid'];
			$sizes[$value['uid']] = $sizes[$value['uid']] + $value['size'];
			$albumids[$value['albumid']] = $value['albumid'];
			if(!$haveforumpic && $value['remote'] > 1) {
				$haveforumpic = true;
			}
		}
	}
	if(empty($pics)) return array();

	C::t('home_pic')->delete($newids);
	if($haveforumpic) {
		for($i = 0;$i < 10;$i++) {
			C::t('forum_attachment_n')->reset_picid($i, $newids);
		}
	}

	C::t('home_comment')->delete('', $newids, 'picid');
	C::t('home_feed')->delete_by_id_idtype($newids, 'picid');
	C::t('home_clickuser')->delete_by_id_idtype($newids, 'picid');
	C::t('common_moderate')->delete($newids, 'picid');
	C::t('common_moderate')->delete($newids, 'picid_cid');

	//更新统计
	if($sizes) {
		foreach ($sizes as $uid => $setarr) {
			$attachsize = intval($sizes[$uid]);
			updatemembercount($uid, array('attachsize' => -$attachsize), false);
		}
	}

	//更新相册封面
	require_once libfile('function/spacecp');
	foreach ($albumids as $albumid) {
		if($albumid) {
			album_update_pic($albumid);
		}
	}

	//删除图片
	deletepicfiles($pics);

	return $pics;
}

/**
 * 删除图片文件
 * @param array $pics 待删除的图片数组
 */
function deletepicfiles($pics) {
	global $_G;
	$remotes = array();
	include_once libfile('function/home');
	foreach ($pics as $pic) {
		pic_delete($pic['filepath'], 'album', $pic['thumb'], $pic['remote']);
	}
}

/**
 * 删除相册
 * @param array $albumids 待删除的 ID 数组
 */
function deletealbums($albumids) {
	global $_G;

	$sizes = $dels = $newids = $counts = array();
	$allowmanage = checkperm('managealbum');

	$albums = C::t('home_album')->fetch_all($albumids);
	foreach($albums as $value) {
		if($value['albumid']) {
			if($allowmanage || $value['uid'] == $_G['uid']) {
				$dels[] = $value;
				$newids[] = $value['albumid'];
				if(!empty($value['pic'])) {
					include_once libfile('function/home');
					pic_delete($value['pic'], 'album', 0, ($value['picflag'] == 2 ? 1 : 0));
				}
			}
			$counts[$value['uid']]['albums'] -= 1;
		}
	}

	if(empty($dels)) return array();

	//获取积分
	$pics = $picids = array();
	$query = C::t('home_pic')->fetch_all_by_albumid($newids);
	foreach($query as $value) {
		$pics[] = $value;
		$picids[] = $value['picid'];
		$sizes[$value['uid']] = $sizes[$value['uid']] + $value['size'];
	}

	//删除图片
	if($picids) {
		deletepics($picids);//删除图片
	}
	C::t('home_album')->delete($newids);
	C::t('home_feed')->delete_by_id_idtype($newids, 'albumid');
	if($picids) {
		C::t('home_clickuser')->delete_by_id_idtype($picids, 'picid');
	}

	if($sizes) {
		foreach ($sizes as $uid => $value) {
			$attachsize = intval($sizes[$uid]);
			$albumnum = $counts[$uid]['albums'] ? $counts[$uid]['albums'] : 0;
			updatemembercount($uid, array('albums' => $albumnum, 'attachsize' => -$attachsize), false);
		}
	}
	return $dels;
}

function deletetrasharticle($aids) {
	global $_G;

	require_once libfile('function/home');
	$articles = $trashid = $pushs = $dels = array();
	foreach(C::t('portal_article_trash')->fetch_all($aids) as $value) {
		$dels[$value['aid']] = $value['aid'];
		$article = dunserialize($value['content']);
		$articles[$article['aid']] = $article;
		if(!empty($article['idtype'])) $pushs[$article['idtype']][] = $article['id'];
		if($article['pic']) {
			pic_delete($article['pic'], 'portal', $article['thumb'], $article['remote']);
		}
		if($article['htmlmade'] && $article['htmldir'] && $article['htmlname']) {
			deletehtml(DISCUZ_ROOT.'/'.$article['htmldir'].$article['htmlname'], $article['contents']);
		}
	}

	if($dels) {
		C::t('portal_article_trash')->delete($dels, 'UNBUFFERED');
		deletearticlepush($pushs);
		deletearticlerelated($dels);
	}

	return $articles;
}

/**
 * 删除门户文章
 * @param array $aids 待删除的 ID 数组
 * @param boolean $istrash
 */
function deletearticle($aids, $istrash = true) {
	global $_G;

	if(empty($aids)) return false;
	$trasharr = $article = $bids = $dels = $attachment = $attachaid = $catids = $pushs = array();
	$query = C::t('portal_article_title')->fetch_all($aids);
	foreach($query as $value) {
		$catids[] = intval($value['catid']);
		$dels[$value['aid']] = $value['aid'];
		$article[] = $value;
		if(!empty($value['idtype'])) $pushs[$value['idtype']][] = $value['id'];
	}
	if($dels) {
		foreach($article as $key => $value) {
			if($istrash) {
				$trasharr[] = array('aid' => $value['aid'], 'content'=>serialize($value));
			} elseif($value['pic']) {
				//删除封面图片
				pic_delete($value['pic'], 'portal', $value['thumb'], $value['remote']);
				$attachaid[] = $value['aid'];
				if($value['madehtml'] && $value['htmldir'] && $value['htmlname']) {
					deletehtml(DISCUZ_ROOT.'/'.$value['htmldir'].$value['htmlname'], $value['contents']);
				}
			}
		}
		if($istrash && $trasharr) {
			C::t('portal_article_trash')->insert_batch($trasharr);
		} else {
			deletearticlepush($pushs);
			deletearticlerelated($dels);
		}

		C::t('portal_article_title')->delete($dels);
		C::t('common_moderate')->delete($dels, 'aid');

		// 相关文章分类文章数目
		$catids = array_unique($catids);
		if($catids) {
			foreach($catids as $catid) {
				$cnt = C::t('portal_article_title')->fetch_count_for_cat($catid);
				C::t('portal_category')->update($catid, array('articles'=>dintval($cnt)));
			}
		}
	}
	return $article;
}

/**
 * 清除生成文章的标识
 */
function deletearticlepush($pushs) {
	if(!empty($pushs) && is_array($pushs)) {
		foreach($pushs as $idtype=> $fromids) {
			switch ($idtype) {
				case 'blogid':
					if(!empty($fromids)) C::t('home_blogfield')->update($fromids, array('pushedaid'=>'0'));
					break;
				case 'tid':
					if(!empty($fromids)) C::t('forum_thread')->update($fromids, array('pushedaid'=>'0'));
					break;
			}
		}
	}
}

/**
 * 删除文章相关的数据
 */
function deletearticlerelated($dels) {

	//统计
	C::t('portal_article_count')->delete($dels);
	//内容
	C::t('portal_article_content')->delete_by_aid($dels);

	//附件
	if($attachment = C::t('portal_attachment')->fetch_all_by_aid($dels)) {
		require_once libfile('function/home');
		foreach ($attachment as $value) {
			pic_delete($value['attachment'], 'portal', $value['thumb'], $value['remote']);
		}
		C::t('portal_attachment')->delete(array_keys($attachment));
	}

	//评论
	C::t('portal_comment')->delete_by_id_idtype($dels, 'aid');
	C::t('common_moderate')->delete($dels, 'aid_cid');

	//相关文章
	C::t('portal_article_related')->delete_by_aid_raid($dels);

}

function deleteportaltopic($dels) {
	if(empty($dels)) return false;
	$targettplname = array();
	foreach ((array)$dels as $key => $value) {
		$targettplname[] = 'portal/portal_topic_content_'.$value;
	}
	C::t('common_diy_data')->delete($targettplname, null);

	//删除模块权限
	require_once libfile('class/blockpermission');
	$tplpermission = & template_permission::instance();
	$templates = array();
	$tplpermission->delete_allperm_by_tplname($targettplname);

	//删除指定的域名
	deletedomain($dels, 'topic');
	C::t('common_template_block')->delete_by_targettplname($targettplname);

	require_once libfile('function/home');

	$picids = array();
	foreach(C::t('portal_topic')->fetch_all($dels) as $value) {
		if($value['picflag'] != '0') pic_delete(str_replace('portal/', '', $value['cover']), 'portal', 0, $value['picflag'] == '2' ? '1' : '0');
	}

	$picids = array();
	foreach(C::t('portal_topic_pic')->fetch_all($dels) as $value) {
		$picids[] = $value['picid'];
		pic_delete($value['filepath'], 'portal', $value['thumb'], $value['remote']);
	}
	if (!empty($picids)) {
		C::t('portal_topic_pic')->delete($picids, true);
	}


	C::t('portal_topic')->delete($dels);
	C::t('portal_comment')->delete_by_id_idtype($dels, 'topicid');
	C::t('common_moderate')->delete($dels, 'topicid_cid');

	//清除模块
	include_once libfile('function/block');
	block_clear();

	// 更新缓存
	include_once libfile('function/cache');
	updatecache('diytemplatename');
}

/**
 * 跟据id、idtype删除指定的域名
 * @param Integer $ids: 指写ids
 * @param String $idtype:对象类型subarea:分区、forum:版块、home:个人空间、group:群组、topic:专题、channel:频道
 */
function deletedomain($ids, $idtype) {
	if($ids && $idtype) {
		C::t('common_domain')->delete_by_id_idtype($ids, $idtype);
	}
}

/**
 * 删除指定淘帖专辑
 * @param int $ctid 专题ID
 */
function deletecollection($ctid) {
	$tids = array();
	$threadlist = C::t('forum_collectionthread')->fetch_all_by_ctid($ctid);
	$tids = array_keys($threadlist);

	deleterelatedtid($tids, $ctid);

	$collectionteamworker = C::t('forum_collectionteamworker')->fetch_all_by_ctid($ctid);
	foreach ($collectionteamworker as $worker) {
		//向参与者发送关闭通知
		notification_add($worker['uid'], "system", 'collection_removed', array('ctid'=>$collectiondata['ctid'], 'collectionname'=>$collectiondata['name']), 1);
	}

	C::t('forum_collectionthread')->delete_by_ctid($ctid);
	C::t('forum_collectionfollow')->delete_by_ctid($ctid);
	C::t('forum_collectioncomment')->delete_by_ctid($ctid);
	C::t('forum_collectionteamworker')->delete_by_ctid($ctid);
	C::t('forum_collectioninvite')->delete_by_ctid($ctid);
	C::t('forum_collection')->delete($ctid, true);
}

/**
 * 删除指定主题中的淘专辑
 * @param array $tids 主题ID数组
 * @param int $ctid 指定淘专辑
 */
function deleterelatedtid($tids, $ctid) {
	$loadreleated = C::t('forum_collectionrelated')->fetch_all($tids, true);
	foreach($loadreleated as $loadexist) {
		if($loadexist['tid']) {
			$collectionlist = explode("\t", $loadexist['collection']);
			if(count($collectionlist)>0) {
				foreach ($collectionlist as $collectionkey=>$collectionvalue) {
					if ($collectionvalue == $ctid) {
						unset($collectionlist[$collectionkey]);
						break;
					}
				}
			}
			$newcollection = implode("\t", $collectionlist);
			if (trim($newcollection) == '') {
				C::t('forum_collectionrelated')->delete($loadexist['tid']);
				C::t('forum_thread')->update_status_by_tid($loadexist['tid'], '1111111011111111', '&'); //标记forum_thread
			} else {
				C::t('forum_collectionrelated')->update_collection_by_ctid_tid($newcollection, $loadexist['tid'], true);
			}
		}
	}
}

function deletehtml($htmlname, $count = 1) {
	global $_G;
	@unlink($htmlname.'.'.$_G['setting']['makehtml']['extendname']);
	if($count > 1) {
		for($i = 2; $i <= $count; $i++) {
			@unlink($htmlname.$i.'.'.$_G['setting']['makehtml']['extendname']);
		}
	}
}
?>