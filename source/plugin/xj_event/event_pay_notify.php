<?php

define('IN_API', true);
define('CURSCRIPT', 'api');

require '../../../source/class/class_core.php';
require '../../../source/function/function_forum.php';

$discuz = C::app();
$discuz->init();

list($ec_contract, $ec_securitycode, $ec_partner, $ec_creditdirectpay) = explode("\t", authcode($_G['setting']['ec_contract'], 'DECODE', $_G['config']['security']['authkey']));
define('DISCUZ_PARTNER', $ec_partner);
define('DISCUZ_SECURITYCODE', $ec_securitycode);
define('DISCUZ_DIRECTPAY', $ec_creditdirectpay);




$apitype = empty($_GET['attach']) || !preg_match('/^[a-z0-9]+$/i', $_GET['attach']) ? 'alipay' : $_GET['attach'];
//$_G['siteurl'] = dhtmlspecialchars('http://'.$_SERVER['HTTP_HOST'].preg_replace("/\/+(source\/plugin\/xj_event)?\/*$/i", '', substr($PHP_SELF, 0, strrpos($PHP_SELF, '/'))).'/');
//$PHP_SELF = $_SERVER['PHP_SELF'];
$_G['siteurl'] = str_replace('source/plugin/xj_event/','',$_G['siteurl']);




if($apitype == 'alipay'){
	$notifydata = alipay_notifycheck();
	$orderid = $notifydata['order_no'];
	$tradeno = $notifydata['trade_no'];
	$trade_status = $notifydata['trade_status'];
	$notify_time = $_G['timestamp'];
	if($notifydata['trade_status'] == 'WAIT_BUYER_PAY'){   //绛夊緟鏀粯
		$buyer_email = $_GET['buyer_email'];
		DB::query("UPDATE ".DB::table('xj_eventpay_log')." SET paystate=1, trade_status='$trade_status', tradeno='$tradeno', buyer_email='$buyer_email', notify_time=$notify_time  WHERE orderid = '$orderid'");
	}elseif($notifydata['trade_status'] == 'WAIT_SELLER_SEND_GOODS'){         //涔板宸蹭粯娆撅紝绛夊緟鍙戣揣
		$pay_time = $_G['timestamp'];
		DB::query("UPDATE ".DB::table('xj_eventpay_log')." SET paystate=2, trade_status='$trade_status', pay_time=$pay_time, notify_time=$notify_time WHERE orderid = '$orderid'");
		$item = DB::fetch_first("SELECT applyid FROM ".DB::table('xj_eventpay_log')." WHERE orderid = '$orderid'");
		$applyid = $item['applyid'];
		DB::query("UPDATE ".DB::table('xj_eventapply')." SET pay_state=1 WHERE applyid = $applyid");
	}elseif($notifydata['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS'){
		DB::query("UPDATE ".DB::table('xj_eventpay_log')." SET trade_status='$trade_status', notify_time=$notify_time WHERE orderid = '$orderid'");
	}elseif($notifydata['trade_status'] == 'TRADE_FINISHED'){
		DB::query("UPDATE ".DB::table('xj_eventpay_log')." SET paystate=3, trade_status='$trade_status', notify_time=$notify_time WHERE orderid = '$orderid'");
		$item = DB::fetch_first("SELECT applyid FROM ".DB::table('xj_eventpay_log')." WHERE orderid = '$orderid'");
		$applyid = $item['applyid'];
		DB::query("UPDATE ".DB::table('xj_eventapply')." SET pay_state=1,verify=1 WHERE applyid = $applyid");
	}elseif($notifydata['trade_status'] == 'TRADE_CLOSED'){
		DB::query("UPDATE ".DB::table('xj_eventpay_log')." SET paystate=9, trade_status='$trade_status', notify_time=$notify_time WHERE orderid = '$orderid'");
	}
}


//璋冭瘯璁板綍寮€濮?
$notifydatastr = print_r($notifydata,true)."-------------------notifydata  \r\n";
$notifydatastr = $notifydatastr.print_r($_GET,true)."---------GET \r\n";
$notifydatastr = $notifydatastr.print_r($_POST,true)."---------POST \r\n\r\n\r\n";
$filename = "./pay.txt";
$fp = fopen("$filename", "a"); //镓揿紑鏂囦欢鎸囬拡锛屽垱寤烘枃浠?
fwrite($fp, $notifydatastr);
fclose($fp); //鍏抽棴鎸囬拡
//璋冭瘯璁板綍缁撴潫



if($notifydata['location']) {
	$url = rawurlencode('home.php?mod=spacecp&ac=credit');
	if($apitype == 'tenpay') {
		echo <<<EOS
<meta name="TENCENT_ONLINE_PAYMENT" content="China TENCENT">
<html>
<body>
<script language="javascript" type="text/javascript">
window.location.href='$_G[siteurl]plugin.php?id=xj_event:event_pay&action=paysucceed';
</script>
</body>
</html>
EOS;
	} else {
		dheader('location: '.$_G['siteurl'].'plugin.php?id=xj_event:event_pay&action=paysucceed');
	}
} else {
	exit($notifydata['notify']);
}


function alipay_notifycheck() {
	global $_G;
	if(!empty($_POST)) {
		$notify = $_POST;
		$location = FALSE;
	} elseif(!empty($_GET)) {
		$notify = $_GET;
		$location = TRUE;
	} else {
		exit('Access Denied');
	}
	

	if(dfsockopen("http://notify.alipay.com/trade/notify_query.do?partner=".DISCUZ_PARTNER."&notify_id=".$notify['notify_id'], 60) !== 'true') {
		exit('Access Denied');
	}

	
	if(!DISCUZ_SECURITYCODE) {
		exit('Access Denied');
	}
	ksort($notify);
	$sign = '';
	foreach($notify as $key => $val) {
		if($key != 'sign' && $key != 'sign_type') $sign .= "&$key=$val";
	}
	if($notify['sign'] != md5(substr($sign,1).DISCUZ_SECURITYCODE)) {
		exit('Access Denied');
	}
	return array(
    	'order_no' 	=> $notify['out_trade_no'],
        'trade_no'	=> $notify['trade_no'],
        'trade_status' 	=> $notify['trade_status'],
        'price' 	=> $notify['total_fee'],
		'notify'	=> 'success',
		'location'	=> $location
	);
	/*
	if(($type == 'credit' || $type == 'invite') && (!DISCUZ_DIRECTPAY && $notify['notify_type'] == 'trade_status_sync' && ($notify['trade_status'] == 'WAIT_SELLER_SEND_GOODS' || $notify['trade_status'] == 'TRADE_FINISHED') || DISCUZ_DIRECTPAY && ($notify['trade_status'] == 'TRADE_FINISHED' || $notify['trade_status'] == 'TRADE_SUCCESS'))
		|| $type == 'trade' && $notify['notify_type'] == 'trade_status_sync') {
		return array(
			'validator'	=> TRUE,
			'status' 	=> trade_getstatus(!empty($notify['refund_status']) ? $notify['refund_status'] : $notify['trade_status'], 1),
			'order_no' 	=> $notify['out_trade_no'],
			'price' 	=> !DISCUZ_DIRECTPAY && $notify['price'] ? $notify['price'] : $notify['total_fee'],
			'trade_no'	=> $notify['trade_no'],
			'notify'	=> 'success',
			'location'	=> $location
			);
	} else {
		return array(
			'validator'	=> FALSE,
			'notify'	=> 'fail',
			'location'	=> $location
			);
	}
	*/
}









?>