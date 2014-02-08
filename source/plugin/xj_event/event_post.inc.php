<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$allowthreadplugin = $_G['setting']['threadplugins'] ? C::t('common_setting')->fetch('allowthreadplugin', true) : array();
$mythread = $allowthreadplugin[$_G['groupid']];
if(!in_array('xj_event',$mythread)){
	showmessage(lang('plugin/xj_event', 'nmyfbhddqx'));
}
$forumlist = forumselect(FALSE, 0, $fid, TRUE);
include template('xj_event:event_post');


function forumselect($groupselectable = FALSE, $arrayformat = 0, $selectedfid = 0, $showhide = FALSE, $evalue = FALSE, $special = 0) {
	global $_G;
	$items = array();
	$query = DB::query("select A.fid FROM ".DB::table('forum_forum')." A,".DB::table('forum_forumfield')." B WHERE A.fid = B.fid and A.type<>'group' and A.status=1 and B.threadplugin like '%xj_event%'");
	while($value = DB::fetch($query)){
		$items[] = $value['fid'];
	}


	if(!isset($_G['cache']['forums'])) {
		loadcache('forums');
	}
	$forumcache = &$_G['cache']['forums'];
	$forumlist = $arrayformat ? array() : '<optgroup label="&nbsp;">';
	foreach($forumcache as $forum) {
		if(!$forum['status'] && !$showhide) {
			continue;
		}
		if($selectedfid) {
			if(!is_array($selectedfid)) {
				$selected = $selectedfid == $forum['fid'] ? ' selected' : '';
			} else {
				$selected = in_array($forum['fid'], $selectedfid) ? ' selected' : '';
			}
		}
		if($forum['type'] == 'group') {
			if($arrayformat) {
				$forumlist[$forum['fid']]['name'] = $forum['name'];
			} else {
				$forumlist .= $groupselectable ? '<option value="'.($evalue ? 'gid_' : '').$forum['fid'].'" class="bold">--'.$forum['name'].'</option>' : '</optgroup><optgroup label="--'.$forum['name'].'">';
			}
			$visible[$forum['fid']] = true;
		} elseif($forum['type'] == 'forum' && isset($visible[$forum['fup']]) && (!$forum['viewperm'] || ($forum['viewperm'] && forumperm($forum['viewperm'])) || strstr($forum['users'], "\t$_G[uid]\t")) && (!$special || (substr($forum['allowpostspecial'], -$special, 1)))) {
			if($arrayformat) {
				$forumlist[$forum['fup']]['sub'][$forum['fid']] = $forum['name'];
			} else {
				if(in_array($forum['fid'],$items)){
					$forumlist .= '<option value="'.($evalue ? 'fid_' : '').$forum['fid'].'"'.$selected.'>'.$forum['name'].'</option>';
				}
			}
			$visible[$forum['fid']] = true;
		} elseif($forum['type'] == 'sub' && isset($visible[$forum['fup']]) && (!$forum['viewperm'] || ($forum['viewperm'] && forumperm($forum['viewperm'])) || strstr($forum['users'], "\t$_G[uid]\t")) && (!$special || substr($forum['allowpostspecial'], -$special, 1))) {
			if($arrayformat) {
				$forumlist[$forumcache[$forum['fup']]['fup']]['child'][$forum['fup']][$forum['fid']] = $forum['name'];
			} else {
				if(in_array($forum['fid'],$items)){
					$forumlist .= '<option value="'.($evalue ? 'fid_' : '').$forum['fid'].'"'.$selected.'>&nbsp; &nbsp; &nbsp; '.$forum['name'].'</option>';
				}
			}
		}
	}
	if(!$arrayformat) {
		$forumlist .= '</optgroup>';
		$forumlist = str_replace('<optgroup label="&nbsp;"></optgroup>', '', $forumlist);
	}
	return $forumlist;
}
?>