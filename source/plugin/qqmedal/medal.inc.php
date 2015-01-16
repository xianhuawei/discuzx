<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
//error_reporting(E_ALL);
$qqmedal = unserialize($_G['setting']['qqmedal']);


if (!$_G['setting']['connect']['allow'] || $_G['cookie']['has_qqmedal'] == 1 || !$_G['cookie']['client_created'] || (time() - $_G['cookie']['client_created'] > 60) && $_G['cookie']['client_created'] || !$_G['uid'] || !$_G['member']['conisbind']  || !$qqmedal['allowed']) {
    return;
}

$cookie_expires = 2592000;

$mid = $_G['setting']['qqmedalid'];
if (!$mid) {
	return;
}

// 判断勋章是否可用
$medal = C::t('forum_medal')->fetch_all_by_id($mid);
$available = $medal[0]['available'];
if (!$available) {
	return;
}

$connectService = Cloud::loadClass('Service_Connect');
$connectService->connectMergeMember();

if(C::t('common_member_medal')->count_by_uid_medalid($_G['uid'], $mid)) {
	// 标记已发
	dsetcookie('has_qqmedal', 1, $cookie_expires);
	exit;
}

$rewardcredit = $qqmedal['rewardcredit'] ? intval($qqmedal['rewardcredit']) : 1; //默认credits1
$addcreditnum = $qqmedal['addcreditnum'] ? intval($qqmedal['addcreditnum']) : 2; //默认加2

if (submitcheck('publishsubmit')) {

	$_G['publish_feed'] = $_POST['connect_publish_feed_infloat'] == 0 ? 0 : 1; // 推送到Qzone，默认推送
	$_G['publish_t'] = $_POST['connect_publish_t_infloat'] == 0 ? 0 : 1; // 推送到微博，默认推送
	
	if ($_G['publish_feed'] || $_G['publish_t']) {

		// 加积分
		if ($rewardcredit && $addcreditnum) {
			updatemembercount($_G['uid'], array($rewardcredit => $addcreditnum), 1);
		}

		$connectOAuthClient = Cloud::loadClass('Service_Client_ConnectOAuth');
		$url = $_G['siteurl'];

		if ($_G['publish_feed']) {
			$qzone_params = array(
				'title' => lang('plugin/qqmedal', 'qqmedal') . lang('plugin/qqmedal', 'title'),
				'summary' => $qqmedal['feed'],
				'url' => $url.'?ADTAG=DISCUZ.QQMEDAL.QZONE',
				'nswb' => '1', // 不自动同步到微博
			);

			try {
				$response = $connectOAuthClient->connectAddShare($_G['member']['conopenid'], $_G['member']['conuin'], $_G['member']['conuinsecret'], $qzone_params);
			} catch(Exception $e) {
				$errorCode = $e->getCode();
			}
		}

		if ($_G['publish_t']) {
			$t_params = array(
				'content' => lang('plugin/qqmedal', 'qqmedal') . $qqmedal['feed'] . $url . '?ADTAG=DISCUZ.QQMEDAL.WEIBO',
			);
			try {
				$response = $connectOAuthClient->connectAddT($_G['member']['conopenid'], $_G['member']['conuin'], $_G['member']['conuinsecret'], $t_params);
			} catch(Exception $e) {
				$errorCode = $e->getCode();
			}
		}

	}

	// 奖励勋章
	$result = C::t('common_member_field_forum')->fetch($_G['uid']);
	$medals = $result['medals'];
	$medalsnew = $medals ? $mid . "\t" . $medals : $mid;

	C::t('common_member_field_forum')->update($_G['uid'], array('medals' => $medalsnew));
	C::t('common_member_medal')->insert(array('uid' => $_G['uid'], 'medalid' => $mid), 0, 1);
	
	C::t('forum_medallog')->insert(array(
		'uid' => $_G['uid'],
		'medalid' => $mid,
		'type' => 0,
		'dateline' => TIMESTAMP,
		'expiration' => '',
		'status' => 0,
	));
	
	// 标记已发
	dsetcookie('has_qqmedal', 1, $cookie_expires);

	$message = lang('plugin/qqmedal', 'publish_succeed');
	
	include template('common/header');
	$return  = <<<EOF
<script type="text/javascript" reload="1">

	var message = "{$message}";
	var dialog_id = "{$_POST['handlekey']}";
	hideWindow(dialog_id);

	showDialog(message, 'right', null, null, 0);
</script>
EOF;
	echo $return;
	include template('common/footer');

} else {
	// 标记待发状态
	dsetcookie('has_qqmedal', 2);
	include template('qqmedal:medal');
}

?>