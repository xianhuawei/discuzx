<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: home_follow.php 33660 2013-07-29 07:51:05Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$_G['uid']) {
	showmessage('login_before_enter_home', null, array(), array('showmsg' => true, 'login' => 1));
}
//允许动作
$dos = array('feed', 'follower', 'following', 'view');
$do = (!empty($_GET['do']) && in_array($_GET['do'], $dos)) ? $_GET['do'] : (!$_GET['uid'] ? 'feed' : 'view');

//处理分页
$page = empty($_GET['page']) ? 1 : intval($_GET['page']);
if($page<1) $page=1;
$perpage = 20;
$start = ($page-1)*$perpage;
$multi = '';
$theurl = 'home.php?mod='.($do == 'view' ? 'space' : 'follow').(!in_array($do, array('feed', 'view')) ? '&do='.$do : '');
$uid = $_GET['uid'] ? $_GET['uid'] : $_G['uid'];
$viewself = $uid == $_G['uid'] ? true : false;
$space = $viewself ? $_G['member'] : getuserbyuid($uid, 1);
if(empty($space)) {
	showmessage('follow_visituser_not_exist');
} elseif(in_array($space['groupid'], array(4, 5, 6)) && ($_G['adminid'] != 1 && $space['uid'] != $_G['uid'])) {
	//被禁言用户只能查看个人资料
	dheader("Location:home.php?mod=space&uid=$uid&do=profile");
}
space_merge($space, 'count');
space_merge($space, 'profile');
space_merge($space, 'field_home');

if($viewself) {
	$showguide = false;
} else {
	$theurl .= $uid ? '&uid='.$uid : '';
	$do = $do == 'feed' ? 'view' : $do;

	//查询相互的关注状态
	$flag = C::t('home_follow')->fetch_status_by_uid_followuid($_G['uid'], $uid);
}
$showrecommend = true;
$archiver = $primary = 1;
$followerlist = array();
//裁切一部份个人简介
$space['bio'] = cutstr($space['bio'], 200);
//获取上次阅读的Cookie同时记录当前Cookie
$lastviewtime = 0;
if($do == 'feed') {
	$view = 'follow';
	if(in_array($_GET['view'], array('special', 'follow', 'other'))) {
		$view = $_GET['view'];
		$theurl .= '&view='.$_GET['view'];
	}

	$vuid = $view == 'other' ? 0 : $_G['uid'];
	$list = getfollowfeed($vuid, $view, false, $start, $perpage);
	if((empty($list['feed']) || count($list['feed']) < 20) && (!empty($list['user']) || $view == 'other')) {
		$primary = 0;
		//没有取到值，重新取一次存档表
		$alist = getfollowfeed($vuid, $view, true, $start, $perpage);
		if(empty($list['feed']) && empty($alist['feed'])) {
			$showguide = true;
			$archiver = 0;
		} else {
			$showguide = false;
			//合并数据
			foreach($alist as $key => $values) {
				if($key != 'user') {
					foreach($values as $id => $value) {
						if(!isset($list[$key][$id])) {
							$list[$key][$id] = $value;
						}
					}
				}
			}
		}

	} elseif(empty($list['user']) && $view != 'other') {
		$archiver = $primary = 0;
		$showguide = false;
	}
	if($showguide) {
		if(!empty($_G['cookie']['lastshowtime'])) {
			$time = explode('|', $_G['cookie']['lastshowtime']);
			$today = strtotime(dgmdate($_G['timestamp'], 'Y-m-d'));
			if($time[0] == $uid && (TIMESTAMP - $time[1] < 86400 && $time[1] > $today)) {
				$showguide = false;
			}
		}
		dsetcookie('lastshowtime', $uid.'|'.TIMESTAMP, 86400);
	}
	if(!empty($_G['cookie']['lastviewtime'])) {
		$time = explode('|', $_G['cookie']['lastviewtime']);
		if($time[0] == $_G['uid']) {
			$lastviewtime = $time[1];
		}
	} else {
		$lastviewtime = getuserprofile('lastactivity');
	}
	dsetcookie('lastviewtime', $_G['uid'].'|'.TIMESTAMP, 31536000);
	if($_G['member']['newprompt_num']['follow']) {
		C::t('home_notification')->delete_by_type('follow', $_G['uid']);
		helper_notification::update_newprompt($_G['uid'], 'follow');
	}
	//推荐收听
	$recommend = $users = array();
	if(helper_access::check_module('follow')) {
		loadcache('recommend_follow');
		if(empty($_G['cache']['recommend_follow']) || !empty($_G['cache']['recommend_follow']) && (empty($_G['cache']['recommend_follow']['users']) || TIMESTAMP - $_G['cache']['recommend_follow']['dateline'] > 86400)) {
			foreach(C::t('home_specialuser')->fetch_all_by_status(0, 10) as $value) {
				$recommend[$value['uid']] = $value['username'];
			}
			//踢掉有可能是自已的用户
			unset($recommend[$_G['uid']]);
			if(count($recommend) < 10) {
				//取听众数最多的100个，然后根据这些用户再进行最后更新时间排序取20个
				$followuser = C::t('common_member_count')->range_by_field(0, 100, 'follower', 'DESC');
				//根据最新发帖者取出20个用户
				$userstatus = C::t('common_member_status')->fetch_all_orderby_lastpost(array_keys($followuser), 0, 20);
				$users = C::t('common_member')->fetch_all_username_by_uid(array_keys($userstatus));
			}
			savecache('recommend_follow', array('dateline'=>TIMESTAMP, 'users'=>$users, 'defaultusers' => $recommend));
		} else {
			$users = &$_G['cache']['recommend_follow']['users'];
			$recommend = &$_G['cache']['recommend_follow']['defaultusers'];
		}
		if(!empty($users)) {
			if(count($recommend) < 10) {
				//补齐10个用户，有可能取出的是自已，所以额外多取一个
				$randkeys = array_rand($users, 11 - count($recommend));
				foreach($randkeys as $ruid) {
					if($ruid != $_G['uid']) {
						$recommend[$ruid] = $users[$ruid];
					}
				}
			}
		}
		if($do == 'following') {
			foreach($list as $ruid => $user) {
				if(isset($recommend[$ruid])) {
					unset($recommend[$ruid]);
				}
			}
		}
		//进一步踢除已关注的用户
		if($recommend) {
			$users = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], array_keys($recommend));
			foreach($users as $ruid => $user) {
				if(isset($recommend[$ruid])) {
					unset($recommend[$ruid]);
				}
			}
		}
	}

	$navactives = array('feed' => ' class="a"');
	$actives = array($view => ' class="a"');
	//note 发帖时是否显示验证码或者验证问答
	list($seccodecheck, $secqaacheck) = seccheck('publish');

} elseif($do == 'view') { //note 查看特定的一个人
	$list = getfollowfeed($uid, 'self', false, $start, $perpage);
	if(empty($list['feed'])) {
		$primary = 0;
		//没有取到值，重新取一次存档表
		$list = getfollowfeed($uid, 'self', true, $start, $perpage);
		if(empty($list['user'])) {
			$archiver = 0;
		}
	}
	//在这里过滤一下含有分类信息的版块
	if(!isset($_G['cache']['forums'])) {
		loadcache('forums');
	}
	//开启模块时才查询
	if(helper_access::check_module('follow')) {
		$followerlist = C::t('home_follow')->fetch_all_following_by_uid($uid, 0, 9);
	}
	$seccodecheck = ($_G['setting']['seccodestatus'] & 4) && (!$_G['setting']['seccodedata']['minposts'] || getuserprofile('posts') < $_G['setting']['seccodedata']['minposts']);
	$secqaacheck = $_G['setting']['secqaa']['status'] & 2 && (!$_G['setting']['secqaa']['minposts'] || getuserprofile('posts') < $_G['setting']['secqaa']['minposts']);
} elseif($do == 'follower') { //note 关注我的人
	$count = C::t('home_follow')->count_follow_user($uid, 1);
	if($viewself && !empty($_G['member']['newprompt_num']['follower'])) {
		$newfollower = C::t('home_notification')->fetch_all_by_uid($uid, -1, 'follower', 0, $_G['member']['newprompt_num']['follower']);
		$newfollower_list = array();
		foreach($newfollower as $val) {
			$newfollower_list[] = $val['from_id'];
		}
		C::t('home_notification')->delete_by_type('follower', $_G['uid']);
		helper_notification::update_newprompt($_G['uid'], 'follower');
	}
	if($count) {
		$list = C::t('home_follow')->fetch_all_follower_by_uid($uid, $start, $perpage);
		//分页
		$multi = multi($count, $perpage, $page, $theurl);
	}
	if(helper_access::check_module('follow')) {
		$followerlist = C::t('home_follow')->fetch_all_following_by_uid($uid, 0, 9);
	}
	$navactives = array($do => ' class="a"');
} elseif($do == 'following') { //note 我关注的人
	$count = C::t('home_follow')->count_follow_user($uid);
	if($count) {
		$status = $_GET['status'] ? 1 : 0;
		$list = C::t('home_follow')->fetch_all_following_by_uid($uid, $status, $start, $perpage);
		//分页
		$multi = multi($count, $perpage, $page, $theurl);
	}
	if(helper_access::check_module('follow')) {
		$followerlist = C::t('home_follow')->fetch_all_follower_by_uid($uid, 9);
	}
	$navactives = array($do => ' class="a"');
}

//note 取最近动作
if(($do == 'follower' || $do == 'following') && $list) {
	$uids = array_keys($list);
	$fieldhome = C::t('common_member_field_home')->fetch_all($uids);
	foreach($fieldhome as $fuid => $val) {
		$list[$fuid]['recentnote'] = $val['recentnote'];
	}
	$memberinfo = C::t('common_member_count')->fetch_all($uids);
	$memberprofile = C::t('common_member_profile')->fetch_all($uids);

	//note 当不是查看自已的列表时更新列表用户与自已的关注状态
	if(!$viewself) {
		$myfollow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $uids);
		foreach($uids as $muid) {
			$list[$muid]['mutual'] = 0;
			if(!empty($myfollow[$muid])) {
				$list[$muid]['mutual'] = $myfollow[$muid]['mutual'] ? 1 : -1;
			}

		}
	}
	//取出Ta特别关注的用户
	$specialfollow = C::t('home_follow')->fetch_all_following_by_uid($uid, 1, 10);
}

if($viewself) {
	//在这里过滤一下含有分类信息的版块
	if(!isset($_G['cache']['forums'])) {
		loadcache('forums');
	}
	$fields = C::t('forum_forumfield')->fetch_all_by_fid(array_keys($_G['cache']['forums']));
	foreach($fields as $fid => $field) {
		if(!empty($field['threadsorts'])) {
			unset($_G['cache']['forums'][$fid]);
		}
	}
	require_once libfile('function/forumlist');
	$forumlist = forumselect();
	$defaultforum = $_G['setting']['followforumid'] ? $_G['cache']['forums'][$_G['setting']['followforumid']] : array();
	require_once libfile('function/upload');
	$swfconfig = getuploadconfig($_G['uid']);
}

//处理导航
if($do == 'feed') {
	$navigation = ' <em>&rsaquo;</em> <a href="home.php?mod=follow&view='.$view.'">'.lang('space', 'follow_view_'.$view).'</a>';
	$navtitle = lang('space', 'follow_view_'.$view);
} elseif($do == 'view') {
	$navigation = ' <em>&rsaquo;</em> <a href="home.php?mod=space&uid='.$uid.'">'.$space['username'].'</a>';
	if($type != 'feed') {
		$navigation .= ' <em>&rsaquo;</em> '.lang('space', 'follow_view_type_feed').'</a>';
	}
	$navtitle = lang('space', 'follow_view_feed', array('who' => $space['username']));
} else {
	$navigation = ' <em>&rsaquo;</em> <a href="home.php?mod=space&uid='.$uid.'">'.$space['username'].'</a> <em>&rsaquo;</em> '.lang('space', 'follow_view_'.($viewself?'my':'do').'_'.$do);
	$navtitle = lang('space', 'follow_view_'.($viewself?'my':'do').'_'.$do);
}
$metakeywords = $navtitle;
$metadescription = $navtitle;
$navtitle = helper_seo::get_title_page($navtitle, $_G['page']);
include template('diy:home/follow_feed');

?>