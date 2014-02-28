<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_comment.php 33714 2013-08-07 01:42:26Z andyzheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 * 发表评论处理
 * @param string $message 评论内容
 * @param int $id 评论对象id
 * @param string $idtype 评论对象类别
 * @param int $cid 回复评论的id
 * @return array 包含评论id,评论成功的提示内容及传递参数
*/
function add_comment($message, $id, $idtype, $cid = 0) {
	global $_G, $bbcode;

	//判断是否有权限
	$allowcomment = false;
	switch($idtype) {
		case 'uid':
			$allowcomment = helper_access::check_module('wall');
			break;
		case 'picid':
			$allowcomment = helper_access::check_module('album');
			break;
		case 'blogid':
			$allowcomment = helper_access::check_module('blog');
			break;
		case 'sid':
			$allowcomment = helper_access::check_module('share');
			break;
	}
	if(!$allowcomment) {
		showmessage('quickclear_noperm');
	}
	$summay = getstr($message, 150, 0, 0, 0, -1);


	$comment = array();
	if($cid) {
		$comment = C::t('home_comment')->fetch_by_id_idtype($id, $idtype, $cid);
		if($comment && $comment['authorid'] != $_G['uid']) {
			$comment['message'] = preg_replace("/\<div class=\"quote\"\>\<blockquote\>.*?\<\/blockquote\>\<\/div\>/is", '', $comment['message']);
			$comment['message'] = $bbcode->html2bbcode($comment['message']);
			$message = ("<div class=\"quote\"><blockquote><b>".$comment['author']."</b>: ".getstr($comment['message'], 150, 0, 0, 2, 1).'</blockquote></div>').$message;
			if($comment['idtype'] == 'uid') {
				$id = $comment['authorid'];
			}
		} else {
			$comment = array();
		}
	}

	$hotarr = array();
	$stattype = '';
	$tospace = $pic = $blog = $album = $share = $poll = array();

	//note 检查权限
	switch($idtype) {
		case 'uid':
			//note 检索空间
			$tospace = getuserbyuid($id);
			$stattype = 'wall';//note 统计
			break;
		case 'picid':
			$pic = C::t('home_pic')->fetch($id);
			//note 图片不存在
			if(empty($pic)) {
				showmessage('view_images_do_not_exist');
			}
			$picfield = C::t('home_picfield')->fetch($id);
			$pic['hotuser'] = $picfield['hotuser'];
			//note 检索空间
			$tospace = getuserbyuid($pic['uid']);

			//note 获取相册
			$album = array();
			if($pic['albumid']) {
				$query = C::t('home_album')->fetch($pic['albumid']);
				if(!$query['albumid']) {
					C::t('home_pic')->update_for_albumid($albumid, array('albumid' => 0));
				}
			}

			//note 验证隐私
			if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
				showmessage('no_privilege_ckfriend_pic');
			} elseif(!$tospace['self'] && $album['friend'] == 4) {
				//note 密码输入问题
				$cookiename = "view_pwd_album_$album[albumid]";
				$cookievalue = empty($_G['cookie'][$cookiename])?'':$_G['cookie'][$cookiename];
				if($cookievalue != md5(md5($album['password']))) {
					showmessage('no_privilege_ckpassword_pic');
				}
			}

			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);
			$stattype = 'piccomment';//统计
			break;
		case 'blogid':
			//note 读取日志
			$blog = array_merge(
				C::t('home_blog')->fetch($id),
				C::t('home_blogfield')->fetch_targetids_by_blogid($id)
			);
			//note 日志不存在
			if(empty($blog)) {
				showmessage('view_to_info_did_not_exist');
			}

			//note 检索空间
			$tospace = getuserbyuid($blog['uid']);

			//note 验证隐私
			if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
				//note 没有权限
				showmessage('no_privilege_ckfriend_blog');
			} elseif(!$tospace['self'] && $blog['friend'] == 4) {
				//note 密码输入问题
				$cookiename = "view_pwd_blog_$blog[blogid]";
				$cookievalue = empty($_G['cookie'][$cookiename])?'':$_G['cookie'][$cookiename];
				if($cookievalue != md5(md5($blog['password']))) {
					showmessage('no_privilege_ckpassword_blog');
				}
			}

			//note 是否允许评论
			if(!empty($blog['noreply'])) {
				showmessage('do_not_accept_comments');
			}
			if($blog['target_ids']) {
				$blog['target_ids'] .= ",$blog[uid]";
			}

			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);
			$stattype = 'blogcomment';//统计
			break;
		case 'sid':
			$share = C::t('home_share')->fetch($id);
			//note 分享不存在
			if(empty($share)) {
				showmessage('sharing_does_not_exist');
			}

			//note 检索空间
			$tospace = getuserbyuid($share['uid']);

			$hotarr = array('sid', $share['sid'], $share['hotuser']);
			$stattype = 'sharecomment';//统计
			break;
		default:
			showmessage('non_normal_operation');
			break;
	}
	if(empty($tospace)) {
		showmessage('space_does_not_exist', '', array(), array('return' => true));
	}

	//note 黑名单
	if(isblacklist($tospace['uid'])) {
		showmessage('is_blacklist');
	}

	//note 热点
	if($hotarr && $tospace['uid'] != $_G['uid']) {
		hot_update($hotarr[0], $hotarr[1], $hotarr[2]);
	}

	//note 事件
	$fs = array();
	$fs['icon'] = 'comment';
	$fs['target_ids'] = '';
	$fs['friend'] = '';
	$fs['body_template'] = '';
	$fs['body_data'] = array();
	$fs['body_general'] = '';
	$fs['images'] = array();
	$fs['image_links'] = array();

	switch ($idtype) {
		case 'uid':
			//事件
			$fs['icon'] = 'wall';
			$fs['title_template'] = 'feed_comment_space';
			$fs['title_data'] = array('touser'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]\">$tospace[username]</a>");
			break;
		case 'picid':
			//事件
			$fs['title_template'] = 'feed_comment_image';
			$fs['title_data'] = array('touser'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]\">".$tospace['username']."</a>");
			$fs['body_template'] = '{pic_title}';
			$fs['body_data'] = array('pic_title'=>$pic['title']);
			$fs['body_general'] = $summay;
			$fs['images'] = array(pic_get($pic['filepath'], 'album', $pic['thumb'], $pic['remote']));
			$fs['image_links'] = array("home.php?mod=space&uid=$tospace[uid]&do=album&picid=$pic[picid]");
			$fs['target_ids'] = $album['target_ids'];
			$fs['friend'] = $album['friend'];
			break;
		case 'blogid':
			//更新评论统计
			C::t('home_blog')->increase($id, 0, array('replynum'=>1));
			//事件
			$fs['title_template'] = 'feed_comment_blog';
			$fs['title_data'] = array('touser'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]\">".$tospace['username']."</a>", 'blog'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]&do=blog&id=$id\">$blog[subject]</a>");
			$fs['target_ids'] = $blog['target_ids'];
			$fs['friend'] = $blog['friend'];
			break;
		case 'sid':
			//事件
			$fs['title_template'] = 'feed_comment_share';
			$fs['title_data'] = array('touser'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]\">".$tospace['username']."</a>", 'share'=>"<a href=\"home.php?mod=space&uid=$tospace[uid]&do=share&id=$id\">".str_replace(lang('spacecp', 'share_action'), '', $share['title_template'])."</a>");
			break;
	}

	//note 审核过滤
	$message = censor($message);
	if(censormod($message)) {
		$comment_status = 1;
	} else {
		$comment_status = 0;
	}

	$setarr = array(
		'uid' => $tospace['uid'],
		'id' => $id,
		'idtype' => $idtype,
		'authorid' => $_G['uid'],
		'author' => $_G['username'],
		'dateline' => $_G['timestamp'],
		'message' => $message,
		'ip' => $_G['clientip'],
		'port' => $_G['remoteport'],
		'status' => $comment_status,
	);
	$cid = C::t('home_comment')->insert($setarr, true);

	$action = 'comment';
	$becomment = 'getcomment';
	$note = $q_note = '';
	$note_values = $q_values = array();

	switch ($idtype) {
		case 'uid':
			$n_url = "home.php?mod=space&uid=$tospace[uid]&do=wall&cid=$cid";

			//通知
			$note_type = 'wall';
			$note = 'wall';
			$note_values = array('url'=>$n_url);
			$q_note = 'wall_reply';
			$q_values = array('url'=>$n_url);

			if($comment) {
				$msg = 'note_wall_reply_success';
				$magvalues = array('username' => $tospace['username']);
				$becomment = '';
			} else {
				$msg = 'do_success';
				$magvalues = array();
				$becomment = 'getguestbook';
			}

			$action = 'guestbook';
			break;
		case 'picid':
			$n_url = "home.php?mod=space&uid=$tospace[uid]&do=album&picid=$id&cid=$cid";

			$note_type = 'comment';
			$note = 'pic_comment';
			$note_values = array('url'=>$n_url);
			$q_note = 'pic_comment_reply';
			$q_values = array('url'=>$n_url);

			$msg = 'do_success';
			$magvalues = array();

			break;
		case 'blogid':
			//通知
			$n_url = "home.php?mod=space&uid=$tospace[uid]&do=blog&id=$id&cid=$cid";

			$note_type = 'comment';
			$note = 'blog_comment';
			$note_values = array('url'=>$n_url, 'subject'=>$blog['subject']);
			$q_note = 'blog_comment_reply';
			$q_values = array('url'=>$n_url);

			$msg = 'do_success';
			$magvalues = array();

			break;
		case 'sid':
			//分享
			$n_url = "home.php?mod=space&uid=$tospace[uid]&do=share&id=$id&cid=$cid";

			$note_type = 'comment';
			$note = 'share_comment';
			$note_values = array('url'=>$n_url);
			$q_note = 'share_comment_reply';
			$q_values = array('url'=>$n_url);

			$msg = 'do_success';
			$magvalues = array();

			break;
	}

	if(empty($comment)) {

		//note 非引用评论
		if($tospace['uid'] != $_G['uid']) {
			//note 事件发布
			if(ckprivacy('comment', 'feed')) {
				require_once libfile('function/feed');
				$fs['title_data']['hash_data'] = "{$idtype}{$id}";
				feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data'], $fs['body_general'],$fs['images'], $fs['image_links'], $fs['target_ids'], $fs['friend']);
			}

			$note_values['from_id'] = $id;
			$note_values['from_idtype'] = $idtype;
			$note_values['url'] .= "&goto=new#comment_{$cid}_li";

			//发送通知
			notification_add($tospace['uid'], $note_type, $note, $note_values);
		}

	} elseif($comment['authorid'] != $_G['uid']) {
		notification_add($comment['authorid'], $note_type, $q_note, $q_values);
	}

	if($comment_status == 1) {
		updatemoderate($idtype.'_cid', $cid);
		manage_addnotify('verifycommontes');
	}
	//note 统计
	if($stattype) {
		include_once libfile('function/stat');
		updatestat($stattype);
	}
	//note 积分
	if($tospace['uid'] != $_G['uid']) {
		$needle = $id;
		if($idtype != 'uid') {
			$needle = $idtype.$id;
		} else {
			$needle = $tospace['uid'];
		}
		//note 奖励评论发起者
		updatecreditbyaction($action, 0, array(), $needle);
		//note 奖励被评论者
		if($becomment) {
			if($idtype == 'uid') {
				$needle = $_G['uid'];
			}
			updatecreditbyaction($becomment, $tospace['uid'], array(), $needle);
		}
	}

	C::t('common_member_status')->update($_G['uid'], array('lastpost' => $_G['timestamp']), 'UNBUFFERED');
	$magvalues['cid'] = $cid;

	return array('cid' => $cid, 'msg' => $msg, 'magvalues' => $magvalues);
}

?>