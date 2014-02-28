<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_forum.php 33660 2013-07-29 07:51:05Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function discuz_uc_avatar($uid, $size = '', $returnsrc = FALSE) {
	global $_G;
	return avatar($uid, $size, $returnsrc, FALSE, $_G['setting']['avatarmethod'], $_G['setting']['ucenterurl']);
}

function dunlink($attach) {
	global $_G;
	$filename = $attach['attachment'];
	$havethumb = $attach['thumb'];
	$remote = $attach['remote'];
	if($remote) {
		ftpcmd('delete', 'forum/'.$filename);
		$havethumb && ftpcmd('delete', 'forum/'.getimgthumbname($filename));
	} else {
		@unlink($_G['setting']['attachdir'].'/forum/'.$filename);
		$havethumb && @unlink($_G['setting']['attachdir'].'/forum/'.getimgthumbname($filename));
	}
	if($attach['aid']) {
		@unlink($_G['setting']['attachdir'].'image/'.$attach['aid'].'_100_100.jpg');
	}
}

/**
权限表达式
* @param $formula - 权限表达式
*/
function formulaperm($formula) {
	global $_G;
	if($_G['forum']['ismoderator']) {
		return TRUE;
	}

	$formula = dunserialize($formula);
	$medalperm = $formula['medal'];
	$permusers = $formula['users'];
	$permmessage = $formula['message'];
	if($_G['setting']['medalstatus'] && $medalperm) {
		$exists = 1;
		$_G['forum_formulamessage'] = '';
		$medalpermc = $medalperm;
		if($_G['uid']) {
			$memberfieldforum = C::t('common_member_field_forum')->fetch($_G['uid']);
			$medals = explode("\t", $memberfieldforum['medals']);
			unset($memberfieldforum);
			foreach($medalperm as $k => $medal) {
				foreach($medals as $r) {
					list($medalid) = explode("|", $r);
					if($medalid == $medal) {
						$exists = 0;
						unset($medalpermc[$k]);
					}
				}
			}
		} else {
			$exists = 0;
		}
		if($medalpermc) {
			loadcache('medals');
			foreach($medalpermc as $medal) {
				if($_G['cache']['medals'][$medal]) {
					$_G['forum_formulamessage'] .= '<img src="'.STATICURL.'image/common/'.$_G['cache']['medals'][$medal]['image'].'" style="vertical-align:middle;" />&nbsp;'.$_G['cache']['medals'][$medal]['name'].'&nbsp; ';
				}
			}
			showmessage('forum_permforum_nomedal', NULL, array('forum_permforum_nomedal' => $_G['forum_formulamessage']), array('login' => 1));
		}
	}
	$formulatext = $formula[0];
	$formula = $formula[1];
	if($_G['adminid'] == 1 || $_G['forum']['ismoderator'] || in_array($_G['groupid'], explode("\t", $_G['forum']['spviewperm']))) {
		return FALSE;
	}
	if($permusers) {
		$permusers = str_replace(array("\r\n", "\r"), array("\n", "\n"), $permusers);
		$permusers = explode("\n", trim($permusers));
		if(!in_array($_G['member']['username'], $permusers)) {
			showmessage('forum_permforum_disallow', NULL, array(), array('login' => 1));
		}
	}
	if(!$formula) {
		return FALSE;
	}
	if(strexists($formula, '$memberformula[')) {
		preg_match_all("/\\\$memberformula\['(\w+?)'\]/", $formula, $a);
		$profilefields = array();
		foreach($a[1] as $field) {
			switch($field) {
				case 'regdate':
					$formula = preg_replace("/\{(\d{4})\-(\d{1,2})\-(\d{1,2})\}/e", "'\'\\1-'.sprintf('%02d', '\\2').'-'.sprintf('%02d', '\\3').'\''", $formula);
				case 'regday':
					break;
				case 'regip':
				case 'lastip':
					$formula = preg_replace("/\{([\d\.]+?)\}/", "'\\1'", $formula);
					$formula = preg_replace('/(\$memberformula\[\'(regip|lastip)\'\])\s*=+\s*\'([\d\.]+?)\'/', "strpos(\\1, '\\3')===0", $formula);
				case 'buyercredit':
				case 'sellercredit':
					space_merge($_G['member'], 'status');break;
				case substr($field, 0, 5) == 'field':
					space_merge($_G['member'], 'profile');
					$profilefields[] = $field;break;
			}
		}
		$memberformula = array();
		if($_G['uid']) {
			$memberformula = $_G['member'];
			if(in_array('regday', $a[1])) {
				$memberformula['regday'] = intval((TIMESTAMP - $memberformula['regdate']) / 86400);
			}
			if(in_array('regdate', $a[1])) {
				$memberformula['regdate'] = date('Y-m-d', $memberformula['regdate']);
			}
			$memberformula['lastip'] = $memberformula['lastip'] ? $memberformula['lastip'] : $_G['clientip'];
		} else {
			if(isset($memberformula['regip'])) {
				$memberformula['regip'] = $_G['clientip'];
			}
			if(isset($memberformula['lastip'])) {
				$memberformula['lastip'] = $_G['clientip'];
			}
		}
	}
	@eval("\$formulaperm = ($formula) ? TRUE : FALSE;");
	if(!$formulaperm) {
		if(!$permmessage) {
			$language = lang('forum/misc');
			$search = array('regdate', 'regday', 'regip', 'lastip', 'buyercredit', 'sellercredit', 'digestposts', 'posts', 'threads', 'oltime');
			$replace = array($language['formulaperm_regdate'], $language['formulaperm_regday'], $language['formulaperm_regip'], $language['formulaperm_lastip'], $language['formulaperm_buyercredit'], $language['formulaperm_sellercredit'], $language['formulaperm_digestposts'], $language['formulaperm_posts'], $language['formulaperm_threads'], $language['formulaperm_oltime']);
			for($i = 1; $i <= 8; $i++) {
				$search[] = 'extcredits'.$i;
				$replace[] = $_G['setting']['extcredits'][$i]['title'] ? $_G['setting']['extcredits'][$i]['title'] : $language['formulaperm_extcredits'].$i;
			}
			if($profilefields) {
				loadcache(array('fields_required', 'fields_optional'));
				foreach($profilefields as $profilefield) {
					$search[] = $profilefield;
					$replace[] = !empty($_G['cache']['fields_optional']['field_'.$profilefield]) ? $_G['cache']['fields_optional']['field_'.$profilefield]['title'] : $_G['cache']['fields_required']['field_'.$profilefield]['title'];
				}
			}
			$i = 0;$_G['forum_usermsg'] = '';
			foreach($search as $s) {
				if(in_array($s, array('digestposts', 'posts', 'threads', 'oltime', 'extcredits1', 'extcredits2', 'extcredits3', 'extcredits4', 'extcredits5', 'extcredits6', 'extcredits7', 'extcredits8'))) {
					$_G['forum_usermsg'] .= strexists($formulatext, $s) ? '<br />&nbsp;&nbsp;&nbsp;'.$replace[$i].': '.(@eval('return intval(getuserprofile(\''.$s.'\'));')) : '';
				} elseif(in_array($s, array('regdate', 'regip', 'regday'))) {
					$_G['forum_usermsg'] .= strexists($formulatext, $s) ? '<br />&nbsp;&nbsp;&nbsp;'.$replace[$i].': '.(@eval('return $memberformula[\''.$s.'\'];')) : '';
				}
				$i++;
			}
			$search = array_merge($search, array('and', 'or', '>=', '<=', '=='));
			$replace = array_merge($replace, array('&nbsp;&nbsp;<b>'.$language['formulaperm_and'].'</b>&nbsp;&nbsp;', '&nbsp;&nbsp;<b>'.$language['formulaperm_or'].'</b>&nbsp;&nbsp;', '&ge;', '&le;', '='));
			$_G['forum_formulamessage'] = str_replace($search, $replace, $formulatext);
		} else {
			$_G['forum_formulamessage'] = $permmessage;
		}

		if(!$permmessage) {
			showmessage('forum_permforum_nopermission', NULL, array('formulamessage' => $_G['forum_formulamessage'], 'usermsg' => $_G['forum_usermsg']), array('login' => 1));
		} else {
			showmessage('forum_permforum_nopermission_custommsg', NULL, array('formulamessage' => $_G['forum_formulamessage']), array('login' => 1));
		}
	}
	return TRUE;
}

/**
勋章权限表达式
* @param $formula - 勋章权限表达式
* @param $type - 1 权限验证 2 勋章字串
*/
function medalformulaperm($formula, $type) {
	global $_G;

	$formula = dunserialize($formula);
	$permmessage = $formula['message'];
	$formula = $formula['medal'];
	if(!empty($formula['usergroupallow']) && is_array($formula['usergroups']) && !in_array($_G['groupid'], $formula['usergroups'])) {
		loadcache('usergroups');
		$message = array();
		foreach($formula['usergroups'] as $groupid) {
			$message[] = $_G['cache']['usergroups'][$groupid]['grouptitle'].' ';
		}
		$_G['forum_formulamessage'] = implode(', ', $message);
		$_G['forum_usermsg'] = $_G['cache']['usergroups'][$_G['groupid']]['grouptitle'];
		return FALSE;
	}
	$formulatext = $formula[0];
	$formula = $formula[1];
	if(!$formula) {
		return FALSE;
	}
	if(strexists($formula, '$memberformula[')) {
		preg_match_all("/\\\$memberformula\['(\w+?)'\]/", $formula, $a);
		$profilefields = array();
		foreach($a[1] as $field) {
			switch($field) {
				case 'regdate':
					$formula = preg_replace("/\{(\d{4})\-(\d{1,2})\-(\d{1,2})\}/e", "'\'\\1-'.sprintf('%02d', '\\2').'-'.sprintf('%02d', '\\3').'\''", $formula);
				case 'regday':
					break;
				case 'regip':
				case 'lastip':
					$formula = preg_replace("/\{([\d\.]+?)\}/", "'\\1'", $formula);
					$formula = preg_replace('/(\$memberformula\[\'(regip|lastip)\'\])\s*=+\s*\'([\d\.]+?)\'/', "strpos(\\1, '\\3')===0", $formula);
				case 'buyercredit':
				case 'sellercredit':
					space_merge($_G['member'], 'status');break;
				case substr($field, 0, 5) == 'field':
					space_merge($_G['member'], 'profile');
					$profilefields[] = $field;break;
			}
		}
		$memberformula = array();
		if($_G['uid']) {
			$memberformula = $_G['member'];
			if(in_array('regday', $a[1])) {
				$memberformula['regday'] = intval((TIMESTAMP - $memberformula['regdate']) / 86400);
			}
			if(in_array('regdate', $a[1])) {
				$memberformula['regdate'] = date('Y-m-d', $memberformula['regdate']);
			}
			$memberformula['lastip'] = $memberformula['lastip'] ? $memberformula['lastip'] : $_G['clientip'];
		} else {
			if(isset($memberformula['regip'])) {
				$memberformula['regip'] = $_G['clientip'];
			}
			if(isset($memberformula['lastip'])) {
				$memberformula['lastip'] = $_G['clientip'];
			}
		}
	}
	@eval("\$formulaperm = ($formula) ? TRUE : FALSE;");
	if(!$formulaperm || $type == 2) {
		if(!$permmessage) {
			$language = lang('forum/misc');
			$search = array('regdate', 'regday', 'regip', 'lastip', 'buyercredit', 'sellercredit', 'digestposts', 'posts', 'threads', 'oltime');
			$replace = array($language['formulaperm_regdate'], $language['formulaperm_regday'], $language['formulaperm_regip'], $language['formulaperm_lastip'], $language['formulaperm_buyercredit'], $language['formulaperm_sellercredit'], $language['formulaperm_digestposts'], $language['formulaperm_posts'], $language['formulaperm_threads'], $language['formulaperm_oltime']);
			for($i = 1; $i <= 8; $i++) {
				$search[] = 'extcredits'.$i;
				$replace[] = $_G['setting']['extcredits'][$i]['title'] ? $_G['setting']['extcredits'][$i]['title'] : $language['formulaperm_extcredits'].$i;
			}
			if($profilefields) {
				loadcache(array('fields_required', 'fields_optional'));
				foreach($profilefields as $profilefield) {
					$search[] = $profilefield;
					$replace[] = !empty($_G['cache']['fields_optional']['field_'.$profilefield]) ? $_G['cache']['fields_optional']['field_'.$profilefield]['title'] : $_G['cache']['fields_required']['field_'.$profilefield]['title'];
				}
			}
			$i = 0;$_G['forum_usermsg'] = '';
			foreach($search as $s) {
				if(in_array($s, array('digestposts', 'posts', 'threads', 'oltime', 'extcredits1', 'extcredits2', 'extcredits3', 'extcredits4', 'extcredits5', 'extcredits6', 'extcredits7', 'extcredits8'))) {
					$_G['forum_usermsg'] .= strexists($formulatext, $s) ? '<br />&nbsp;&nbsp;&nbsp;'.$replace[$i].': '.(@eval('return intval(getuserprofile(\''.$s.'\'));')) : '';
				} elseif(in_array($s, array('regdate', 'regip'))) {
					$_G['forum_usermsg'] .= strexists($formulatext, $s) ? '<br />&nbsp;&nbsp;&nbsp;'.$replace[$i].': '.(@eval('return $memberformula[\''.$s.'\'];')) : '';
				}
				$i++;
			}
			$search = array_merge($search, array('and', 'or', '>=', '<=', '=='));
			$replace = array_merge($replace, array('&nbsp;&nbsp;<b>'.$language['formulaperm_and'].'</b>&nbsp;&nbsp;', '&nbsp;&nbsp;<b>'.$language['formulaperm_or'].'</b>&nbsp;&nbsp;', '&ge;', '&le;', '='));
			$_G['forum_formulamessage'] = str_replace($search, $replace, $formulatext);
		} else {
			$_G['forum_formulamessage'] = $permmessage;
		}

		return $_G['forum_formulamessage'];
	} elseif($formulaperm && $type == 1) {
		return FALSE;
	}
	return TRUE;
}

/**
* vip用户购买组权限是否到期
* @param $terms 期限 来源于 memberfields 表的 groupterms 字段
* @return 返回过期信息
*/
function groupexpiry($terms) {
	$terms = is_array($terms) ? $terms : dunserialize($terms);
	$groupexpiry = isset($terms['main']['time']) ? intval($terms['main']['time']) : 0;
	if(is_array($terms['ext'])) {
		foreach($terms['ext'] as $expiry) {
			if((!$groupexpiry && $expiry) || $expiry < $groupexpiry) {
				$groupexpiry = $expiry;
			}
		}
	}
	return $groupexpiry;
}

/**
* 显示主题分类
* @param $curtypeid - 当前被选择的类型id
* @return 返回的HTML数据
*/

function typeselect($curtypeid = 0) {
	global $_G;
	if($threadtypes = $_G['forum']['threadtypes']) {
		$html = '<select name="typeid" id="typeid"><option value="0">&nbsp;</option>';
		foreach($threadtypes['types'] as $typeid => $name) {
			$html .= '<option value="'.$typeid.'" '.($curtypeid == $typeid ? 'selected' : '').'>'.strip_tags($name).'</option>';
		}
		$html .= '</select>';
		return $html;
	} else {
		return '';
	}
}

/**
* 更新管理者状态
* @param $modacton - 动作
* @param $smcols - 执行次数
*/
function updatemodworks($modaction, $posts = 1) {
	global $_G;
	$today = dgmdate(TIMESTAMP, 'Y-m-d');
	if($_G['setting']['modworkstatus'] && $modaction && $posts) {
		$affect_rows = C::t('forum_modwork')->increase_count_posts_by_uid_modaction_dateline(1, $posts, $_G['uid'], $modaction, $today);
		if(!$affect_rows) {
			C::t('forum_modwork')->insert(array(
				'uid' => $_G['uid'],
				'modaction' => $modaction,
				'dateline' => $today,
				'count' => 1,
				'posts' => $posts,
			));
		}
	}
}

/**
 * 格式化一个sql语句，通常用于update操作
 *
 * @param string $fieldname 字段名称
 * @param int $position 位置
 * @param int $value 数值 0|1
 * @return string
 */
function buildbitsql($fieldname, $position, $value) {
	$t = " `$fieldname`=`$fieldname`";
	if($value) {
		$t .= ' | '.setstatus($position, 1);
	} else {
		$t .= ' & '.setstatus($position, 0);
	}
	return $t.' ';
}

function showmessagenoperm($type, $fid, $formula = '') {
	global $_G;
	loadcache('usergroups');
	if($formula) {
		$formula = dunserialize($formula);
		$permmessage = stripslashes($formula['message']);
	}

	$usergroups = $nopermgroup = $forumnoperms = array();
	$nopermdefault = array(
		'viewperm' => array(),
		'getattachperm' => array(),
		'postperm' => array(7),
		'replyperm' => array(7),
		'postattachperm' => array(7),
	);
	$perms = array('viewperm', 'postperm', 'replyperm', 'getattachperm', 'postattachperm');

	foreach($_G['cache']['usergroups'] as $gid => $usergroup) {
		$usergroups[$gid] = $usergroup['type'];
		$grouptype = $usergroup['type'] == 'member' ? 0 : 1;
		$nopermgroup[$grouptype][] = $gid;
	}
	if($fid == $_G['forum']['fid']) {
		$forum = $_G['forum'];
	} else {
		$forum = C::t('forum_forumfield')->fetch($fid);
	}

	foreach($perms as $perm) {
		$permgroups = explode("\t", $forum[$perm]);
		$membertype = $forum[$perm] ? array_intersect($nopermgroup[0], $permgroups) : TRUE;
		$forumnoperm = $forum[$perm] ? array_diff(array_keys($usergroups), $permgroups) : $nopermdefault[$perm];
		foreach($forumnoperm as $groupid) {
			$nopermtype = $membertype && $groupid == 7 ? 'login' : ($usergroups[$groupid] == 'system' || $usergroups[$groupid] == 'special' ? 'none' : ($membertype ? 'upgrade' : 'none'));
			$forumnoperms[$fid][$perm][$groupid] = array($nopermtype, $permgroups);
		}
	}

	$v = $forumnoperms[$fid][$type][$_G['groupid']][0];
	$gids = $forumnoperms[$fid][$type][$_G['groupid']][1];
	$comma = $permgroups = '';
	if(is_array($gids)) {
		foreach($gids as $gid) {
			if($gid && $_G['cache']['usergroups'][$gid]) {
				$permgroups .= $comma.$_G['cache']['usergroups'][$gid]['grouptitle'];
				$comma = ', ';
			} elseif($_G['setting']['verify']['enabled'] && substr($gid, 0, 1) == 'v') {
				$vid = substr($gid, 1);
				$permgroups .= $comma.$_G['setting']['verify'][$vid]['title'];
				$comma = ', ';
			}

		}
	}

	$custom = 0;
	if($permmessage) {
		$message = $permmessage;
		$custom = 1;
	} else {
		if($v) {
			$message = $type.'_'.$v.'_nopermission';
		} else {
			$message = 'group_nopermission';
		}
	}

	showmessage($message, NULL, array('fid' => $fid, 'permgroups' => $permgroups, 'grouptitle' => $_G['group']['grouptitle']), array('login' => 1), $custom);
}

/**
 * 依据 tid 或者 fid ,自动取得 $_G['forum'] 或 $_G['thread'] 数据
 * @global <type>
 */
function loadforum($fid = null, $tid = null) {
	global $_G;
	$tid = intval(isset($tid) ? $tid : getgpc('tid'));
	if(isset($fid)) {
		$fid = intval($fid);
	} else {
		$fid = getgpc('fid');
		if(!$fid && getgpc('gid')) {
			$fid = intval(getgpc('gid'));
		}
	}
	if(isset($_G['forum']['fid']) && $_G['forum']['fid'] == $fid || isset($_G['thread']['tid']) && $_G['thread']['tid'] == $tid){
		return null;
	}
	if(!empty($_GET['archiver'])) {//X1.5的Archiver兼容
		if($fid) {
			dheader('location: archiver/?fid-'.$fid.'.html');
		} elseif($tid) {
			dheader('location: archiver/?tid-'.$tid.'.html');
		} else {
			dheader('location: archiver/');
		}
	}
	if(defined('IN_ARCHIVER') && $_G['setting']['archiverredirect'] && !IS_ROBOT) {
		dheader('location: ../forum.php'.($_G['mod'] ? '?mod='.$_G['mod'].(!empty($_GET['fid']) ? '&fid='.$_GET['fid'] : (!empty($_GET['tid']) ? '&tid='.$_GET['tid'] : '')) : ''));
	}
	//note 图片列表模式
	if($_G['setting']['forumpicstyle']) {
		$_G['setting']['forumpicstyle'] = dunserialize($_G['setting']['forumpicstyle']);
		empty($_G['setting']['forumpicstyle']['thumbwidth']) && $_G['setting']['forumpicstyle']['thumbwidth'] = 203;
		empty($_G['setting']['forumpicstyle']['thumbheight']) && $_G['setting']['forumpicstyle']['thumbheight'] = 999;
	} else {
		$_G['setting']['forumpicstyle'] = array('thumbwidth' => 203, 'thumbheight' => 999);
	}
	if($fid) {
		$fid = is_numeric($fid) ? intval($fid) : (!empty($_G['setting']['forumfids'][$fid]) ? $_G['setting']['forumfids'][$fid] : 0);
	}

	$modthreadkey = isset($_GET['modthreadkey']) && $_GET['modthreadkey'] == modauthkey($tid) ? $_GET['modthreadkey'] : '';
	$_G['forum_auditstatuson'] = $modthreadkey ? true : false;

	$metadescription = $hookscriptmessage = '';
	$adminid = $_G['adminid'];

	if(!empty($tid) || !empty($fid)) {

		/**
		 * 判断当前 tid 是否合法, 并取得 thread 数据, 支持分表
		 * thread 数据存放于 $_G['thread']
		 */
		if(!empty ($tid)) {
			$archiveid = !empty($_GET['archiveid']) ? intval($_GET['archiveid']) : null;
			$_G['thread'] = get_thread_by_tid($tid, $archiveid);
			$_G['thread']['allreplies'] = $_G['thread']['replies'] + $_G['thread']['comments'];
			if(!$_G['forum_auditstatuson'] && !empty($_G['thread'])
					&& !($_G['thread']['displayorder'] >= 0 || (in_array($_G['thread']['displayorder'], array(-4,-3,-2)) && $_G['uid'] && $_G['thread']['authorid'] == $_G['uid']))) {
				$_G['thread'] = null;
			}

			//todo 此赋值是为了兼容某些旧程序, 逐渐废除 $_G['forum_thread']
			$_G['forum_thread'] = & $_G['thread'];

			if(empty($_G['thread'])) {
				$fid = $tid = 0;
			} else {
				$fid = $_G['thread']['fid'];
				$tid = $_G['thread']['tid'];
			}
		}

		if($fid) {
			$forum = C::t('forum_forum')->fetch_info_by_fid($fid);
		}

		if($forum) {
			if($_G['uid']) {
				if($_G['member']['accessmasks']) {
					$query = C::t('forum_access')->fetch_all_by_fid_uid($fid, $_G['uid']);
					$forum['allowview'] = $query[0]['allowview'];
					$forum['allowpost'] = $query[0]['allowpost'];
					$forum['allowreply'] = $query[0]['allowreply'];
					$forum['allowgetattach'] = $query[0]['allowgetattach'];
					$forum['allowgetimage'] = $query[0]['allowgetimage'];
					$forum['allowpostattach'] = $query[0]['allowpostattach'];
					$forum['allowpostimage'] = $query[0]['allowpostimage'];
				}
				if($adminid == 3) {
					$forum['ismoderator'] = C::t('forum_moderator')->fetch_uid_by_fid_uid($fid, $_G['uid']);
				}
			}
			$forum['ismoderator'] = !empty($forum['ismoderator']) || $adminid == 1 || $adminid == 2 ? 1 : 0;
			$fid = $forum['fid'];
			$gorup_admingroupids = $_G['setting']['group_admingroupids'] ? dunserialize($_G['setting']['group_admingroupids']) : array('1' => '1');

			//note 如果用户是群主给与管理权限
			if($forum['status'] == 3) {
				if(!empty($forum['moderators'])) {
					$forum['moderators'] = dunserialize($forum['moderators']);
				} else {
					require_once libfile('function/group');
					$forum['moderators'] = update_groupmoderators($fid);
				}
				if($_G['uid'] && $_G['adminid'] != 1) {
					$forum['ismoderator'] = !empty($forum['moderators'][$_G['uid']]) ? 1 : 0;
					$_G['adminid'] = 0;
					if($forum['ismoderator'] || $gorup_admingroupids[$_G['groupid']]) {
						$_G['adminid'] = $_G['adminid'] ? $_G['adminid'] : 3;
						if(!empty($gorup_admingroupids[$_G['groupid']])) { //note 群组管理组　可以编辑群主和群组成员的帖子
							$forum['ismoderator'] = 1;
							$_G['adminid'] = 2;
						}

						$group_userperm = dunserialize($_G['setting']['group_userperm']);
						if(is_array($group_userperm)) {
							$_G['group'] = array_merge($_G['group'], $group_userperm);
							//note 群组主题不能移动、复制、编辑分类
							$_G['group']['allowmovethread'] = $_G['group']['allowcopythread'] = $_G['group']['allowedittypethread']= 0;
						}
					}
				}
			}
			foreach(array('threadtypes', 'threadsorts', 'creditspolicy', 'modrecommend') as $key) {
				$forum[$key] = !empty($forum[$key]) ? dunserialize($forum[$key]) : array();
				if(!is_array($forum[$key])) {
					$forum[$key] = array();
				}
			}

			if($forum['status'] == 3) {
				$_G['isgroupuser'] = 0;
				$_G['basescript'] = 'group';
				if($forum['level'] == 0) {
					$levelinfo = C::t('forum_grouplevel')->fetch_by_credits($forum['commoncredits']);
					$levelid = $levelinfo['levelid'];
					$forum['level'] = $levelid;
					C::t('forum_forum')->update_group_level($levelid, $fid);
				}
				if($forum['level'] != -1) {
					loadcache('grouplevels');
					$grouplevel = $_G['grouplevels'][$forum['level']];
					if(!empty($grouplevel['icon'])) {
						$valueparse = parse_url($grouplevel['icon']);
						if(!isset($valueparse['host'])) {
							$grouplevel['icon'] = $_G['setting']['attachurl'].'common/'.$grouplevel['icon'];
						}
					}
				}

				//note 将群组的帖子设置覆盖到forum
				$group_postpolicy = $grouplevel['postpolicy'];
				if(is_array($group_postpolicy)) {
					$forum = array_merge($forum, $group_postpolicy);
				}
				$forum['allowfeed'] = $_G['setting']['group_allowfeed'];
				if($_G['uid']) {
					if(!empty($forum['moderators'][$_G['uid']])) {
						$_G['isgroupuser'] = 1;
					} else {
						$groupuserinfo = C::t('forum_groupuser')->fetch_userinfo($_G['uid'], $fid);
						$_G['isgroupuser'] = $groupuserinfo['level'];
						//note 非本群组成员不允许评分、评价、发布点评
						if($_G['isgroupuser'] <= 0 && empty($forum['ismoderator'])) {
							$_G['group']['allowrecommend'] = $_G['cache']['usergroup_'.$_G['groupid']]['allowrecommend'] = 0;
							$_G['group']['allowcommentpost'] = $_G['cache']['usergroup_'.$_G['groupid']]['allowcommentpost'] = 0;
							$_G['group']['allowcommentitem'] = $_G['cache']['usergroup_'.$_G['groupid']]['allowcommentitem'] = 0;
							$_G['group']['raterange'] = $_G['cache']['usergroup_'.$_G['groupid']]['raterange'] = array();
							$_G['group']['allowvote'] = $_G['cache']['usergroup_'.$_G['groupid']]['allowvote'] = 0;
						} else {
							$_G['isgroupuser'] = 1;
						}
					}
				}
			}
		} else {
			$fid = 0;
		}
	}

	$_G['fid'] = $fid;
	$_G['tid'] = $tid;
	$_G['forum'] = &$forum;
	$_G['current_grouplevel'] = &$grouplevel;

	if(empty($_G['uid'])) {
		$_G['group']['allowpostactivity'] = $_G['group']['allowpostpoll'] = $_G['group']['allowvote'] = $_G['group']['allowpostreward'] = $_G['group']['allowposttrade'] = $_G['group']['allowpostdebate'] = $_G['group']['allowpostrushreply'] = 0;
	}
	if(!empty($_G['forum']['widthauto'])) {
		$_G['widthauto'] = $_G['forum']['widthauto'];
	}
}

/**
 *
 * @param <type> $tid 主题id
 * @param <type> $forcetableid 是否强制只从某个分表中取得 thread, 默认 null
 * @return array 当有合法数值返回的时候, 将自动追加2个key值threadtable, posttable 记录此主题使用的分表名称
 */
function get_thread_by_tid($tid, $forcetableid = null) {
	global $_G;

	$ret = array();
	if(!is_numeric($tid)) {
		return $ret;
	}
	//获得 thread 分表信息
	loadcache('threadtableids');
	$threadtableids = array(0);
	if(!empty($_G['cache']['threadtableids'])) {
		if($forcetableid === null || ($forcetableid > 0 && !in_array($forcetableid, $_G['cache']['threadtableids']))) {
			$threadtableids = array_merge($threadtableids, $_G['cache']['threadtableids']);
		} else {
			$threadtableids = array(intval($forcetableid));
		}
	}
	$threadtableids = array_unique($threadtableids);
	//查找主题
	foreach($threadtableids as $tableid) {
		$tableid = $tableid > 0 ? $tableid : 0;
		$ret = C::t('forum_thread')->fetch($tid, $tableid);
		//找到主题, 追加两个元素到数组中, 分别记录当前主题所在的thread分表名,以及此主题的帖子所在的post分表名
		if($ret) {
			$ret['threadtable'] = C::t('forum_thread')->get_table_name($tableid);
			$ret['threadtableid'] = $tableid;
			$ret['posttable'] = 'forum_post'.($ret['posttableid'] ? '_'.$ret['posttableid'] : '');
			break;
		}
	}

	//没有找到主题,则返回空数组
	if(!is_array($ret)) {
		$ret = array();
	} elseif($_G['setting']['optimizeviews']) {
		//处理未被更新的查看数
		if(($row = C::t('forum_threadaddviews')->fetch($tid))) {
			$ret['addviews'] = intval($row['addviews']);
			$ret['views'] += $ret['addviews'];
		}
	}

	return $ret;
}

/**
 * 依据 pid 和 其他条件,从某个post数据表中取回post信息
 * @global <type> $_G
 * @param <type> $pid 帖子id
 * @param <type> $fields 帖子表字段,默认 *
 * @param <type> $addcondiction 其他条件,默认 空
 * @param <type> $forcetable 是否强制使用某个分表, 支持: 使用id: 0 1 2 或者 p(主表), a(副表) 或者直接制定表名 forum_post_1
 * @return array
 */
function get_post_by_pid($pid, $fields = '*', $addcondiction = '', $forcetable = null) {
	global $_G;

	$ret = array();
	if(!is_numeric($pid)) {
		return $ret;
	}

	loadcache('posttable_info');

	//确定需要搜索的分表
	$posttableids = array(0);
	if($_G['cache']['posttable_info']) {
		if(isset($forcetable)) {
			if(is_numeric($forcetable) && array_key_exists($forcetable, $_G['cache']['posttable_info'])) {
				$posttableids[] = $forcetable;
			} elseif(substr($forcetable, 0, 10) == 'forum_post') {
				$posttableids[] = $forcetable;
			}
		} else {
			$posttableids = array_keys($_G['cache']['posttable_info']);
		}
	}

	//在各个分表中查找记录, 找到后退出循环
	foreach ($posttableids as $id) {
		$table = empty($id) ? 'forum_post' : (is_numeric($id) ? 'forum_post_'.$id : $id);
		$ret = C::t('forum_post')->fetch_by_pid_condition($id, $pid, $addcondiction, $fields);
		if($ret) {
			$ret['posttable'] = $table;
			break;
		}
	}

	//没有找到帖子,则返回空数组
	if(!is_array($ret)) {
		$ret = array();
	}

	return $ret;
}

function get_post_by_tid_pid($tid, $pid) {
	static $postlist = array();
	if(empty($postlist[$pid])) {
		$postlist[$pid] = C::t('forum_post')->fetch('tid:'.$tid, $pid, false);
		if($postlist[$pid] && $postlist[$pid]['tid'] == $tid) {
			$user = getuserbyuid($postlist[$pid]['authorid']);
			$postlist[$pid]['adminid'] = $user['adminid'];
		} else {
			$postlist[$pid] = array();
		}
	}
	return $postlist[$pid];
}

function set_rssauth() {
	global $_G;
	if($_G['setting']['rssstatus'] && $_G['uid']) {
		$auth = authcode($_G['uid']."\t".($_G['fid'] ? $_G['fid'] : '').
		"\t".substr(md5($_G['member']['password']), 0, 8), 'ENCODE', md5($_G['config']['security']['authkey']));
	} else {
		$auth = '0';
	}
	$_G['rssauth'] = rawurlencode($auth);
}

/**
	是否有查看版块 RSS 的权限
*/
function rssforumperm($forum) {
	$is_allowed = $forum['type'] != 'group' && (!$forum['viewperm'] || ($forum['viewperm'] && forumperm($forum['viewperm'], 7)));
	return $is_allowed;
}

/**
 *	upload_icon_banner上传群组/版块图片
 *	$forum中 fid和status 必须存在，status判断是群组还是版块图片，以存入不同目录
 *	$file上传时的$_FILES
 *	$type icon 或 banner
 */
function upload_icon_banner(&$data, $file, $type) {
	global $_G;
	$data['extid'] = empty($data['extid']) ? $data['fid'] : $data['extid']; //note 如果不是版块或群组需定义extid，如usergroup8
	if(empty($data['extid'])) return '';

	if($data['status'] == 3 && $_G['setting']['group_imgsizelimit']) {
		$file['size'] > ($_G['setting']['group_imgsizelimit'] * 1024) && showmessage('file_size_overflow', '', array('size' => $_G['setting']['group_imgsizelimit'] * 1024));
	}
	$upload = new discuz_upload();
	$uploadtype = $data['status'] == 3 ? 'group' : 'common';

	if(!$upload->init($file, $uploadtype, $data['extid'], $type)) {
		return false;
	}

	if(!$upload->save()) {
		if(!defined('IN_ADMINCP')) {
			showmessage($upload->errormessage());
		} else {
			cpmsg($upload->errormessage(), '', 'error');
		}
	}
	if($data['status'] == 3 && $type == 'icon') {
		require_once libfile('class/image');
		$img = new image;
		$img->Thumb($upload->attach['target'], './'.$uploadtype.'/'.$upload->attach['attachment'], 48, 48, 'fixwr');
	}
	return $upload->attach['attachment'];
}

/**
	用于 archiver 环境下的分页
*/
function arch_multi($total, $perpage, $page, $link) {
	$pages = @ceil($total / $perpage) + 1;
	$pagelink = '';
	if($pages > 1) {
		$pagelink .= lang('forum/archiver', 'page') . ": \n";
		$pagestart = $page - 10 < 1 ? 1 : $page - 10;
		$pageend = $page + 10 >= $pages ? $pages : $page + 10;
		for($i = $pagestart; $i < $pageend; $i++) {
			$pagelink .= ($i == $page ? "<strong>[$i]</strong>" : "<a href=\"$link&page=$i\">$i</a>")." \n";
		}
	}
	return $pagelink;
}

/**
	archiver 模板路径
*/
function loadarchiver($path) {
	global $_G;
	if(!$_G['setting']['archiver']) {
		require_once DISCUZ_ROOT . "./source/archiver/common/header.php";
		echo '<div id="content">'.lang('message', 'forum_archiver_disabled').'</div>';
		require_once DISCUZ_ROOT . "./source/archiver/common/footer.php";
		exit;
	}
	$filename = $path . '.php';
	return DISCUZ_ROOT . "./source/archiver/$filename";
}

/**
 *	update_threadpartake 按参与人次更新主题热度
 */
function update_threadpartake($tid, $getsetarr = false) {
	global $_G;
	$setarr = array();
	if($_G['uid'] && $tid) {
		if($_G['setting']['heatthread']['period']) {
			$partaked = C::t('forum_threadpartake')->fetch($tid, $_G['uid']);
			$partaked = $partaked['uid'];
			if(!$partaked) {
				C::t('forum_threadpartake')->insert(array('tid' => $tid, 'uid' => $_G['uid'], 'dateline' => TIMESTAMP));
				$setarr = C::t('forum_thread')->increase($tid, array('heats' => 1), false, 0, $getsetarr);
			}
		} else {
			$setarr = C::t('forum_thread')->increase($tid, array('heats' => 1), false, 0, $getsetarr);

		}
	}
	if($getsetarr) {
		return $setarr;
	}
}

/**
 * 获取帖子封面地址
 *
 * @param int $tid
 * @param int $cover 负数时表示是远程，正数为本地 没有值表示只取filename
 */
function getthreadcover($tid, $cover = 0, $getfilename = 0) {
	global $_G;
	if(empty($tid)) {
		return '';
	}
	$coverpath = '';
	$covername = 'threadcover/'.substr(md5($tid), 0, 2).'/'.substr(md5($tid), 2, 2).'/'.$tid.'.jpg';
	if($getfilename) {
		return $covername;
	}
	if($cover) {
		$coverpath = ($cover < 0 ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl']).'forum/'.$covername;
	}
	return $coverpath;
}

/**
 * 将未使用的附件转为已使用状态
 * @param <int> $aid
 * @param <int> $tid
 * @param <pid> $pid
 */
function convertunusedattach($aid, $tid, $pid) {
	if(!$aid) {
		return;
	}
	global $_G;
	$attach = C::t('forum_attachment_n')->fetch_by_aid_uid(127, $aid, $_G['uid']);
	if(!$attach) {
		return;
	}
	$attach = daddslashes($attach);
	$attach['tid'] = $tid;
	$attach['pid'] = $pid;
	C::t('forum_attachment_n')->insert('tid:'.$tid, $attach);
	C::t('forum_attachment')->update($attach['aid'], array('tid' => $tid, 'pid' => $pid, 'tableid' => getattachtableid($tid)));
	C::t('forum_attachment_unused')->delete($attach['aid']);
}

/**
 * 更新附件的 TID 值
 * @param <string> $where 条件
 * @param <int> $oldtid 旧 TID
 * @param <int> $newtid  新 TID
 */
function updateattachtid($idtype, $ids, $oldtid, $newtid) {
		foreach(C::t('forum_attachment_n')->fetch_all_by_id('tid:'.$oldtid, $idtype, $ids) as $attach) {
			$attach['tid'] = $newtid;
			C::t('forum_attachment_n')->insert('tid:'.$newtid, $attach);
		}
		C::t('forum_attachment_n')->delete_by_id('tid:'.$oldtid, $idtype, $ids);
	C::t('forum_attachment')->update_by_id($idtype, $ids, $newtid);
}

/**
 * 更新帖子,该函数已不使用
 * @global  $_G
 * @param array $data 更新的数据
 * @param string/array $condition 条件
 * @param bool $unbuffered 是否即时返回
 * @param int $posttableid post分表ID
 * @return int 返回的更新的记录数
 */
function updatepost($data, $condition, $unbuffered = false, $posttableid = false) {
	return false;
}

/**
 * 新建一个帖子
 * @param array $data 新建的数据
*/
function insertpost($data) {
	if(isset($data['tid'])) {
		$thread = C::t('forum_thread')->fetch($data['tid']);
		$tableid = $thread['posttableid'];
	} else {
		$tableid = $data['tid'] = 0;
	}
	$pid = C::t('forum_post_tableid')->insert(array('pid' => null), true);


	$data = array_merge($data, array('pid' => $pid));

	C::t('forum_post')->insert($tableid, $data);
	if($pid % 1024 == 0) {
		C::t('forum_post_tableid')->delete_by_lesspid($pid);
	}
	savecache('max_post_id', $pid);
	return $pid;
}

function threadmodstatus($string) {
	global $_G;
	//note 是否强制当前用户发表的主题进入审核
	$postmodperiods = periodscheck('postmodperiods', 0);
	if($postmodperiods) {
		$modnewthreads = $modnewreplies = 1;
	} else {
		$censormod = censormod($string);
		$modnewthreads = (!$_G['group']['allowdirectpost'] || $_G['group']['allowdirectpost'] == 1) && $_G['forum']['modnewposts'] || $censormod ? 1 : 0;
		$modnewreplies = (!$_G['group']['allowdirectpost'] || $_G['group']['allowdirectpost'] == 2) && $_G['forum']['modnewposts'] == 2 || $censormod ? 1 : 0;

		//note 群组判断
		if($_G['forum']['status'] == 3) {
			$modnewthreads = !$_G['group']['allowgroupdirectpost'] || $_G['group']['allowgroupdirectpost'] == 1 || $censormod ? 1 : 0;
			$modnewreplies = !$_G['group']['allowgroupdirectpost'] || $_G['group']['allowgroupdirectpost'] == 2 || $censormod ? 1 : 0;
		}
	}

	//note 帖子内容是否包含url判断
	$_G['group']['allowposturl'] = $_G['forum']['status'] != 3 ? $_G['group']['allowposturl'] : $_G['group']['allowgroupposturl'];
	if($_G['group']['allowposturl'] == 1) {
		if(!$postmodperiods) {
			$censormod = censormod($string);
		}
		if($censormod) {
			$modnewthreads = $modnewreplies = 1;
		}
	}
	return array($modnewthreads, $modnewreplies);
}

function threadpubsave($tid, $passapproval = false) {
	global $_G;
	if($_G['setting']['plugins']['func'][HOOKTYPE]['threadpubsave']) {
		$hookparam = func_get_args();
		hookscript('threadpubsave', 'global', 'funcs', array('param' => $hookparam, 'step' => 'check'), 'threadpubsave');
	}
	$thread = C::t('forum_thread')->fetch_by_tid_displayorder($tid, -4, '=', !$passapproval ? $_G['uid'] : null);
	if(!$thread) {
		return 0;
	}
	$threadpost = C::t('forum_post')->fetch_threadpost_by_tid_invisible($tid);
	$thread['message'] = $threadpost['message'];

	$modworksql = 0;
	$displayorder = 0;
	$dateline = $_G['timestamp'];
	$moderatepids = $saveposts = array();
	$return = 1;

	list($modnewthreads) = threadmodstatus($thread['subject']."\t".$thread['message']);
	if($modnewthreads && $passapproval === false) {
		updatemoderate('tid', $tid);
		manage_addnotify('verifythread');
		$displayorder = -2;
		$modworksql = 1;
		$return = -1;
	} else {
		C::t('forum_post')->update_by_tid('tid:'.$tid, $tid, array('dateline' => $dateline, 'invisible' => '0'), false, false, 1);
	}

	C::t('forum_thread')->update($tid, array('displayorder'=>$displayorder, 'dateline'=>$_G['timestamp'], 'lastpost'=>$_G['timestamp']));
	$posts = $thread['replies'] + 1;
	if($thread['replies']) {
		$saveposts = C::t('forum_post')->fetch_all_by_tid('tid:'.$tid, $tid, true, '', 0, 0, 0);
		foreach($saveposts as $post) {
			$dateline++;
			$invisible = 0;
			list(, $modnewreplies) = threadmodstatus($post['subject']."\t".$post['message']);
			if($modnewreplies) {
				$moderatepids[] = $post['pid'];
				$verifypost = true;
				$invisible = -2;
				$modworksql = 1;
				$return = -2;
			}
			C::t('forum_post')->update('tid:'.$tid, $post['pid'], array('dateline' => $dateline, 'invisible' => $invisible));
			updatepostcredits('+', $thread['authorid'], 'reply', $thread['fid']);
		}
	}
	if($moderatepids) {
		updatemoderate('pid', $moderatepids);
		manage_addnotify('verifypost');
	}
	updatepostcredits('+', $thread['authorid'], 'post', $thread['fid']);
	$attachcount = C::t('forum_attachment_n')->count_by_id('tid:'.$thread['tid'], 'tid', $thread['tid']);
	updatecreditbyaction('postattach', $thread['authorid'], array(), '', $attachcount, 1, $thread['fid']);
	if($_G['forum']['status'] == 3) {
		C::t('forum_groupuser')->update_counter_for_user($thread['authorid'], $thread['fid'], 1);
	}

	//更新版块最后发帖
	$subject = str_replace("\t", ' ', $thread['subject']);
	$lastpost = $thread['tid']."\t".$subject."\t".$thread['lastpost']."\t".$thread['lastposter'];
	C::t('forum_forum')->update($_G['fid'], array('lastpost' => $lastpost));
	C::t('forum_forum')->update_forum_counter($thread['fid'], 1, $posts, $posts, $modworksql);
	if($_G['forum']['type'] == 'sub') {
		C::t('forum_forum')->update($_G['forum']['fup'], array('lastpost' => $lastpost));
	}
	if($_G['setting']['plugins']['func'][HOOKTYPE]['threadpubsave']) {
		hookscript('threadpubsave', 'global', 'funcs', array('param' => $hookparam, 'step' => 'save', 'posts' => $saveposts), 'threadpubsave');
	}
	return $return;
}

/**
 * 获取相关淘专辑 ...
 * @param int $tid 主题id
 * @param bool $all 是否不限数量全部读出
 * @param int &$num 相关淘专辑数量
 * @param int &$more 是否还有更多淘专辑
 * @return array 淘专辑信息
 */
function getrelatecollection($tid, $all = false, &$num, &$more) {
	global $_G;

	$maxdisplay = $_G['setting']['collectionnum'];
	if(!$maxdisplay) return;

	$tidrelate = C::t('forum_collectionrelated')->fetch($tid);
	$ctids = explode("\t", $tidrelate['collection'], -1);
	$num = count($ctids);

	if(!$ctids || !$num) {
		$more = $num = 0;
		return null;
	}
	if($all !== true && $num > $maxdisplay) {
		$more = 1;
	} else {
		$maxdisplay = 0;
	}
	return C::t('forum_collection')->fetch_all($ctids, 'follownum', 'DESC', 0, $maxdisplay, '', $tid);
}

function set_atlist_cookie($uids) {
	global $_G;
	$atlist = $tmp = array();
	$num = 0;
	$maxlist = 10;
	if(empty($uids)) {
		return;
	}
	$newnum = count($uids);
	if($newnum >= $maxlist) {
		$uids = array_slice($uids, 0, $maxlist);
		dsetcookie('atlist', implode(',', $uids), 86400 * 360);
		return;
	}
	if($_G['cookie']['atlist']) {
		$atlist = explode(',', $_G['cookie']['atlist']);
		foreach($atlist as $key => $val) {
			if(!in_array($val, $uids)) {
				$num++;
				if($num == ($maxlist - $newnum)) {
					break;
				}
				$tmp[$key] = $val;
			}
		}
	}
	dsetcookie('atlist', implode(',', $uids).($tmp ? ','.implode(',', $tmp) : ''), 86400 * 360);
}

/**
 * 云平台mini面板
 */
function cloud_referer_related() {
	global $_G;
	$my_search_data = $_G['setting']['my_search_data'];
	if (viewthread_is_search_referer() && $my_search_data['status']) {
		$appService = Cloud::loadClass('Service_App');
		if($appService->getCloudAppStatus('search')) {
			$_params = array('s_site_gid' => $_G['groupid'],
							'response_type' => 'js',
							'referer' => $_SERVER['HTTP_REFERER'],
						);
			$utilService = Cloud::loadClass('Service_Util');
			$signUrl = $utilService->generateSiteSignUrl($_params);
			$my_search_se_url = 'http://search.discuz.qq.com/api/site/se?' . $signUrl . "";
		}
	}
	return $my_search_se_url;
}

function viewthread_is_search_referer() {
	$regex = "((http|https)\:\/\/)?";
	$regex .= "([a-z]*.)?(ask.com|yahoo.com|cn.yahoo.com|bing.com|baidu.com|soso.com|google.com|google.cn)(.[a-z]{2,3})?\/";
	if(preg_match("/^$regex/", $_SERVER['HTTP_REFERER'])) {
		return true;
	}
	return false;
}


function stringtopic($value, $key = '', $force = false, $rlength = 0) {
	if($key === '') {
		$key = $value;
	}
	$basedir = !getglobal('setting/attachdir') ? './data/attachment' : getglobal('setting/attachdir');
	$url = !getglobal('setting/attachurl') ? './data/attachment/' : getglobal('setting/attachurl');
	$subdir1 = substr(md5($key), 0, 2);
	$subdir2 = substr(md5($key), 2, 2);
	$target = 'temp/'.$subdir1.'/'.$subdir2.'/';
	$targetname = substr(md5($key), 8, 16).'.png';
	discuz_upload::check_dir_exists('temp', $subdir1, $subdir2);
	if(!$force && file_exists($basedir.'/'.$target.$targetname)) {
		return $url.$target.$targetname;
	}
	$value = str_replace("\n", '', $value);
	$fontfile = $fontname = '';
	$ttfenabled = false;
	$size = 10;
	$w = 130;
	$rowh = 25;
	$value = explode("\r", $value);
	if($rlength) {
		$temp = array();
		foreach($value as $str) {
			$strlen = dstrlen($str);
			if($strlen > $rlength) {
				for($i = 0; $i < $strlen; $i++) {
					$sub = cutstr($str, $rlength, '');
					$temp[] = $sub;
					$str = substr($str, strlen($sub));
					$strlen = $strlen - $rlength;
				}
			} else {
				$temp[] = $str;
			}
		}
		$value = $temp;
		unset($temp);
	}
	if(function_exists('imagettftext')) {
		$fontroot = DISCUZ_ROOT.'./static/image/seccode/font/ch/';
		$dirs = opendir($fontroot);
		while($entry = readdir($dirs)) {
			if($entry != '.' && $entry != '..' && in_array(strtolower(fileext($entry)), array('ttf', 'ttc'))) {
				$fontname = $entry;
				break;
			}
		}
		if(!empty($fontname)) {
			$fontfile = DISCUZ_ROOT.'./static/image/seccode/font/ch/'.$fontname;
		}
		if($fontfile) {
			if(strtoupper(CHARSET) != 'UTF-8') {
				include DISCUZ_ROOT.'./source/class/class_chinese.php';
				$cvt = new Chinese(CHARSET, 'utf8');
				$value = $cvt->Convert(implode("\r", $value));
				$value = explode("\r", $value);
			}
			$ttfenabled = true;
		}
	}

	foreach($value as $str) {
		if($ttfenabled) {
			$box = imagettfbbox($size, 0, $fontfile, $str);
			$height = max($box[1], $box[3]) - min($box[5], $box[7]);
			$len = (max($box[2], $box[4]) - min($box[0], $box[6]));
			$rowh = max(array($height, $rowh));
		} else {
			$len = strlen($str) * 12;
		}
		$w = max(array($len, $w));
	}
	$h = $rowh * count($value) + count($value) * 2;
	$im = @imagecreate($w, $h);
	$background_color = imagecolorallocate($im, 255, 255, 255);
	$text_color = imagecolorallocate($im, 60, 60, 60);
	$h = $ttfenabled ? $rowh : 4;
	foreach($value as $str) {
		if($ttfenabled) {
			imagettftext($im, $size, 0, 0, $h, $text_color, $fontfile, $str);
			$h += 2;
		} else {
			imagestring($im, $size, 0, $h, $str, $text_color);
		}
		$h += $rowh;
	}
	imagepng($im, $basedir.'/'.$target.$targetname);
	imagedestroy($im);
	return $url.$target.$targetname;
}

function getreplybg($replybg = '') {
	global $_G;
	$style = '';
	if($_G['setting']['allowreplybg']) {
		if($replybg) {
			$bgurl = $replybg;
			if(file_exists($_G['setting']['attachurl'].'common/'.$replybg)) {
				$bgurl = $_G['setting']['attachurl'].'common/'.$replybg;
			}
		} elseif($_G['setting']['globalreplybg']) {
			$bgurl = $_G['setting']['globalreplybg'];
			if(file_exists($_G['setting']['attachurl'].'common/'.$_G['setting']['globalreplybg'])) {
				$bgurl = $_G['setting']['attachurl'].'common/'.$_G['setting']['globalreplybg'];
			}
		}
		if($bgurl) {
			$style = ' style="background-image: url('.$bgurl.');"';
		}
	}
	return $style;
}

?>