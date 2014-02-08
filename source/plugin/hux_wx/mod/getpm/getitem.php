<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$user = C::t('#hux_wx#hux_wx')->fetch_by_openid($_GET['openid'],'cjpass,uid');
$md5hash = md5($user['cjpass'].$user['uid'].$_GET['openid']);
if ($md5hash == $_GET['md5hash']) {
	loaducenter();
	if (empty($_GET['page']) || !isset($_GET['page']) || $_GET['page']=='' || $_GET['page']==null) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	if (empty($_GET['pagesize']) || !isset($_GET['pagesize']) || $_GET['pagesize']=='' || $_GET['pagesize']==null || $_GET['pagesize'] > 20) {
		$pagesize = 20;
	} else {
		$pagesize = $_GET['pagesize'];
	}
	$num = uc_pm_view_num($user['uid'], $_GET['touid']);
	$offset = ($page - 1) * $pagesize;
	$pagetotal = $page * $pagesize;
	$pmdata = uc_pm_view($user['uid'], 0, $_GET['touid'], 5, $page, $pagesize);
	foreach ($pmdata as $k => $v) {
		$v['date'] = dgmdate($v['dateline']);
		if (CHARSET != 'utf-8' && !$wxsetting['code']) {
			$v['msgfrom'] = diconv($v['msgfrom'],CHARSET,'utf-8');
			$v['message'] = diconv($v['message'],CHARSET,'utf-8');
		}
		$pmview[$k] = $v;
	}
	array_multisort($pmview, SORT_DESC, $pmdata);
	$result = '{"list":';
	$result .= json_encode($pmview);
	$result .= '}';

		sleep(1);
		echo $result;
	//}
}
?>