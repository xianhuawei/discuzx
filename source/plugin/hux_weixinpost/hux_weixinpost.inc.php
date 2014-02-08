<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$ac = empty($_GET['ac']) ? '' : $_GET['ac'];
$wxsetting = $_G['cache']['plugin']['hux_weixinpost'];
if ($ac == 'money') {
	$uid = $_GET['uid'];
	$jfnum = intval($_GET['num']);
	$paymoney = 'extcredits'.$wxsetting['money'];
	$md5hash = $_GET['md5hash'];
	if ($md5hash == md5($uid.$jfnum.$wxsetting['pass'])) {
		updatemembercount($uid , array($paymoney => $jfnum));
		echo 1;
	} else {
		echo 0;
	}
} elseif ($ac == 'post') {
	$md5hash = $_GET['md5hash'];
	if ($md5hash == md5($wxsetting['pass'])) {
		require_once libfile('function/post');
		require_once libfile('function/forum');
		$uid = $wxsetting['uid'];
		$user = C::t('#hux_weixinpost#hux_common_member')->fetch_by_uid($uid);
		$username = $user['username'];
		$subject = $_GET['title'];
		$message = $_GET['body'];
		if (CHARSET != 'utf-8') {
			$subject = diconv($subject,'utf-8');
			$message = diconv($message,'utf-8');
		}
		$post_arr = array(
			'fid' => $wxsetting['forum'],
			'posttableid' => 0,
			'readperm' => 0,
			'price' => 0,
			'typeid' => 0,
			'sortid' => 0,
			'author' => $username,
			'authorid' => $uid,
			'subject' => $subject,
			'dateline' => TIMESTAMP,
			'lastpost' => TIMESTAMP,
			'lastposter' => $username,
			'displayorder' => 0,
			'digest' => 0,
			'special' => 0,
			'attachment' => 0,
			'moderated' => 1,
			'highlight' => 0,
			'closed' => 0,
			'status' => 0,
			'isgroup' => 0,
		);
		C::t('forum_thread')->insert($post_arr);
		$tid = C::t('#hux_weixinpost#hux_forum_forum')->insert_id();
		$pid = insertpost(array('fid' => $wxsetting['forum'],'tid' => $tid,'first' => '1','author' => $username,'authorid' => $uid,'subject' => $subject,'dateline' => TIMESTAMP,'message' => $message,'useip' => $_G['clientip'],'invisible' => '0','anonymous' => '0','usesig' => '0','htmlon' => '0','bbcodeoff' => '0','smileyoff' => '0','parseurloff' => '0','attachment' => '0',));
		updatepostcredits('+', $uid, 'post', $wxsetting['forum']);
		$lastpost = $tid."\t".addslashes($subject)."\t".TIMESTAMP."\t".$username;
		C::t('#hux_weixinpost#hux_forum_forum')->update_by_fid($wxsetting['forum'],$lastpost);
		echo $tid;
	} else {
		echo 0;
	}
} elseif ($ac == 'push') {
	$md5hash = $_GET['md5hash'];
	$uid = $_GET['uid'];
	$message = $_GET['body'];
	if (CHARSET != 'utf-8') {
			$message = diconv($message,'utf-8');
	}
	if ($md5hash == md5($uid.$wxsetting['pass'])) {
		notification_add($uid,'system',$message,0,1);
		echo 1;
	} else {
		echo 0;
	}
} else {
	$md5hash = $_GET['md5hash'];
	if ($md5hash == md5($wxsetting['pass'])) {
		echo 1;
	} else {
		echo 0;
	}
}
?>