<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_friend.php 26635 2011-12-19 01:59:13Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//获得指定用户好友列表fuid/fusername
function friend_list($uid, $limit, $start=0) {
	$list = array();
	$query = C::t('home_friend')->fetch_all_by_uid($uid, $start, $limit, true);
	foreach($query as $value) {
		$list[$value['fuid']] = $value;
	}
	return $list;
}

//获得当前用户的好友用户组
function friend_group_list() {
	global $_G;

	$space = array('uid' => $_G['uid']);
	space_merge($space, 'field_home');

	$groups = array();
	$spacegroup = empty($space['privacy']['groupname'])?array():$space['privacy']['groupname'];
	for($i = 0; $i < $_G['setting']['friendgroupnum']; $i++) {
		if($i == 0) {
			$groups[0] = lang('friend', 'friend_group_default');
		} else {
			if(!empty($spacegroup[$i])) {
				$groups[$i] = $spacegroup[$i];
			} else {
				if($i<8) {
					$groups[$i] = lang('friend', 'friend_group_'.$i);
				} else {
					$groups[$i] = lang('friend', 'friend_group_more', array('num'=>$i));
				}
			}
		}
	}
	return $groups;
}

/**
 * 是否为好友
 * @param mix $touids 要判断的id列表
 * @param int $isfull 是否返回好友表的其它信息
 * @return bool 返回是否为好友 同时在$_G变量中存储了好友关系和好友信息
*/
function friend_check($touids, $isfull = 0) {
	global $_G;

	if(empty($_G['uid'])) return false;
	if(is_array($touids)) {
		$query = C::t('home_friend')->fetch_all_by_uid_fuid($_G['uid'], $touids);

		foreach($query as $value) {
			$touid = $value['fuid'];
			$var = "home_friend_{$_G['uid']}_{$touid}";
			$fvar = "home_friend_{$touid}_{$_G['uid']}";
			$_G[$var] = $_G[$fvar] = true;
			if($isfull) {
				$fvarinfo = "home_friend_info_{$touid}_{$_G['uid']}";
				$_G[$fvarinfo] = $value;
			}
		}

		if(count($query) != count($touids)) { //增加数组传递情况的返回值，判断是否全部为好友。
			return false;
		} else {
			return true;
		}
	} else {
		$touid = $touids;
		$var = "home_friend_{$_G['uid']}_{$touid}";
		$fvar = "home_friend_{$touid}_{$_G['uid']}";
		if(!isset($_G[$var])) {
			$query = C::t('home_friend')->fetch_all_by_uid_fuid($_G['uid'], $touid);
			$friend = $query[0];
			if($friend) {
				$_G[$var] = $_G[$fvar] = true;
				if($isfull) {
					$fvarinfo = "home_friend_info_{$touid}_{$_G['uid']}";
					$_G[$fvarinfo] = $friend;
				}
			} else {
				$_G[$var] = $_G[$fvar] = false;
			}
		}
		return $_G[$var];
	}

}

//是否对方在我的好友请求里面
function friend_request_check($touid) {
	global $_G;

	$var = "home_friend_request_{$touid}";
	if(!isset($_G[$var])) {
		$result = C::t('home_friend_request')->fetch_by_uid_fuid($_G['uid'], $touid);
		$_G[$var] = $result?true:false;
	}
	return $_G[$var];
}

//添加好友 $touid要添加的用户UID $gid好友用户组 $note申请理由
//返回 -2 已经是好友 -1 已经申请过，等待验证 1 添加成功
function friend_add($touid, $gid=0, $note='') {
	global $_G;

	//检查是否已经是好友
	if($touid == $_G['uid']) return -2;
	if(friend_check($touid)) return -2;//已经是双向好友

	include_once libfile('function/stat');
	//检查对方是否在我的好友请求里面	
	$freind_request = C::t('home_friend_request')->fetch_by_uid_fuid($_G['uid'], $touid);
	if($freind_request) {
		//添加我的好友列表
		$setarr = array(
			'uid' => $_G['uid'],
			'fuid' => $freind_request['fuid'],
			'fusername' => addslashes($freind_request['fusername']),
			'gid' => $gid,
			'dateline' => $_G['timestamp']
		);
		C::t('home_friend')->insert($setarr);

		//从我的好友申请中删除
		friend_request_delete($touid);

		//更新我的好友缓存
		friend_cache($_G['uid']);

		//将我添加为对方的好友
		$setarr = array(
			'uid' => $touid,
			'fuid' => $_G['uid'],
			'fusername' => $_G['username'],
			'gid' => $freind_request['gid'],
			'dateline' => $_G['timestamp']
		);
		C::t('home_friend')->insert($setarr);

		addfriendlog($_G['uid'], $touid);
		//更新对方的好友缓存
		friend_cache($touid);
		//统计
		updatestat('friend');
	} else {

		//判断我是否已经在对方的好友申请里面
		$to_freind_request = C::t('home_friend_request')->fetch_by_uid_fuid($touid, $_G['uid']);
		if($to_freind_request) {
			return -1;//已经申请过，等待验证
		}

		//向对方的好友申请表中添加好友申请
		$setarr = array(
			'uid' => $touid,
			'fuid' => $_G['uid'],
			'fusername' => $_G['username'],
			'gid' => $gid,
			'note' => $note,
			'dateline' => $_G['timestamp']
		);
		C::t('home_friend_request')->insert($setarr);

		//统计
		updatestat('addfriend');
	}

	return 1;
}

//直接成为双向好友
function friend_make($touid, $tousername, $checkrequest=true) {
	global $_G;

	if($touid == $_G['uid']) return false;

	if($checkrequest) {
		//判断我是否已经在对方的好友申请里面
		$to_freind_request = C::t('home_friend_request')->fetch_by_uid_fuid($touid, $_G['uid']);
		if($to_freind_request) {
			C::t('home_friend_request')->delete_by_uid_fuid($touid, $_G['uid']);
		}

		//判断对方是否在我的好友申请里面
		$to_freind_request = C::t('home_friend_request')->fetch_by_uid_fuid($_G['uid'], $touid);
		if($to_freind_request) {
			C::t('home_friend_request')->delete_by_uid_fuid($_G['uid'], $touid);
		}
	}


	$insertarray = array(
		'uid' => $touid,
		'fuid' => $_G['uid'],
		'fusername' => $_G['username'],
		'dateline' => $_G['timestamp'],
	);
	C::t('home_friend')->insert($insertarray, false, true);

	$insertarray = array(
		'uid' => $_G['uid'],
		'fuid' => $touid,
		'fusername' => $tousername,
		'dateline' => $_G['timestamp'],
	);
	C::t('home_friend')->insert($insertarray, false, true);

	addfriendlog($_G['uid'], $touid);
	//增加统计
	include_once libfile('function/stat');
	updatestat('friend');
	friend_cache($touid);
	friend_cache($_G['uid']);
}

//添加好友日志
function addfriendlog($uid, $touid, $action = 'add') {
	global $_G;

	if($uid && $touid) {
		$flog = array(
				'uid' => $uid > $touid ? $uid : $touid,
				'fuid' => $uid > $touid ? $touid : $uid,
				'dateline' => $_G['timestamp'],
				'action' => $action
		);
		DB::insert('home_friendlog', $flog, false, true);
		return true;
	}

	return false;

}

//更新好友热度
function friend_addnum($touid) {
	global $_G;

	if($_G['uid'] && $_G['uid'] != $touid) {
		C::t('home_friend')->update_num_by_uid_fuid(1, $_G['uid'], $touid);
	}
}

//更新好友缓存
function friend_cache($touid) {
	global $_G;

	$tospace = array('uid' => $touid);
	space_merge($tospace, 'field_home');

	//屏蔽的用户组
	$filtergids = empty($tospace['privacy']['filter_gid'])?array():$tospace['privacy']['filter_gid'];

	//好友缓存
	$uids = array();
	$count = 0;
	$fcount = 0;
	$query = C::t('home_friend')->fetch_all_by_uid($touid, 0, 0, true);
	foreach($query as $value) {
		if($value['fuid'] == $touid) continue;
		if($fcount > 200) {
			$count = count($query);
			break;
		} elseif(empty($filtergids) || !in_array($value['gid'], $filtergids)) {
			$uids[] = $value['fuid'];
			$fcount++;
		}
		$count++;
	}
	C::t('common_member_field_home')->update($touid, array('feedfriend'=>implode(',', $uids)));
	C::t('common_member_count')->update($touid, array('friends'=>$count));

}


//删除我的一个好友申请
function friend_request_delete($touid) {
	global $_G;

	return C::t('home_friend_request')->delete_by_uid_fuid($_G['uid'], $touid);
}

//删除双向好友
function friend_delete($touid) {
	global $_G;

	//判断是否是好友关系
	if(!friend_check($touid)) return false;

	C::t('home_friend')->delete_by_uid_fuid_dual($_G['uid'], $touid);

	//更新统计数
	if(DB::affected_rows()) {
		//增加好友日志
		addfriendlog($_G['uid'], $touid, 'delete');
		friend_cache($_G['uid']);
		friend_cache($touid);
	}
}

?>