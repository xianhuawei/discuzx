<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: api_tenpay.php 32222 2012-12-03 02:28:43Z monkey $
 */


define('IN_API', true);
define('CURSCRIPT', 'api');

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('DISCUZ_PARTNER', $_G['setting']['ec_tenpay_bargainor']);// 商户号
define('DISCUZ_SECURITYCODE', $_G['setting']['ec_tenpay_key']);// 密钥
define('DISCUZ_AGENTID', '1204737401'); // 平台商账号

define('DISCUZ_TENPAY_OPENTRANS_CHNID', $_G['setting']['ec_tenpay_opentrans_chnid']);
define('DISCUZ_TENPAY_OPENTRANS_KEY', $_G['setting']['ec_tenpay_opentrans_key']);

define('STATUS_SELLER_SEND', 3);
define('STATUS_WAIT_BUYER', 4);
define('STATUS_TRADE_SUCCESS', 5);
define('STATUS_REFUND_CLOSE', 9);

/**
*请求处理类
*/
class RequestHandler {

	/** 网关url地址 */
	var $gateUrl;

	/** 密钥 */
	var $key;

	/** 请求的参数 */
	var $parameters;

	/** debug信息 */
	var $debugInfo;

	function __construct() {
		$this->RequestHandler();
	}

	function RequestHandler() {
		$this->gateUrl = "https://www.tenpay.com/cgi-bin/med/show_opentrans.cgi";
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
	}

	/**
	*初始化函数。
	*/
	function init() {
		//nothing to do
	}

	/**
	*获取入口地址,不包含参数值
	*/
	function getGateURL() {
		return $this->gateUrl;
	}

	/**
	*设置入口地址,不包含参数值
	*/
	function setGateURL($gateUrl) {
		$this->gateUrl = $gateUrl;
	}

	/**
	*获取密钥
	*/
	function getKey() {
		return $this->key;
	}

	/**
	*设置密钥
	*/
	function setKey($key) {
		$this->key = $key;
	}

	/**
	*获取参数值
	*/
	function getParameter($parameter) {
		return $this->parameters[$parameter];
	}

	/**
	*设置参数值
	*/
	function setParameter($parameter, $parameterValue) {
		$this->parameters[$parameter] = $parameterValue;
	}

	/**
	*获取所有请求的参数
	*@return array
	*/
	function getAllParameters() {
		$this->createSign();

		return $this->parameters;
	}

	/**
	*获取带参数的请求URL
	*/
	function getRequestURL() {
		$this->createSign();
		$reqPar = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			$reqPar .= $k . "=" . urlencode($v) . "&";
		}

		// 去掉最后一个&
		$reqPar = substr($reqPar, 0, strlen($reqPar)-1);
		$requestURL = $this->getGateURL() . "?" . $reqPar;
		return $requestURL;

	}

	/**
	*获取debug信息
	*/
	function getDebugInfo() {
		return $this->debugInfo;
	}

	/**
	*重定向到财付通支付
	*/
	function doSend() {
		header("Location:" . $this->getRequestURL());
		exit;
	}

	/**
	*创建md5摘要,规则是:按参数名称a-z排序,遇到空值的参数不参加签名。
	*/
	function createSign() {
		$signPars = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			if("" !== $v && "sign" !== $k) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey();
		$sign = strtolower(md5($signPars));
		$this->setParameter("sign", $sign);
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign);

	}

	/**
	*设置debug信息
	*/
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}

}

class ResponseHandler  {

	/** 密钥 */
	var $key;

	/** 应答的参数 */
	var $parameters;

	/** debug信息 */
	var $debugInfo;

	function __construct() {
		$this->ResponseHandler();
	}

	function ResponseHandler() {
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";

		/* GET */
		foreach($_GET as $k => $v) {
			$this->setParameter($k, $v);
		}
		/* POST */
		foreach($_POST as $k => $v) {
			$this->setParameter($k, $v);
		}
	}

	/**
	*获取密钥
	*/
	function getKey() {
		return $this->key;
	}

	/**
	*设置密钥
	*/
	function setKey($key) {
		$this->key = $key;
	}

	/**
	*获取参数值
	*/
	function getParameter($parameter) {
		return $this->parameters[$parameter];
	}

	/**
	*设置参数值
	*/
	function setParameter($parameter, $parameterValue) {
		$this->parameters[$parameter] = $parameterValue;
	}

	/**
	*获取所有请求的参数
	*@return array
	*/
	function getAllParameters() {
		return $this->parameters;
	}

	/**
	*是否财付通签名,规则是:按参数名称a-z排序,遇到空值的参数不参加签名。
	*true:是
	*false:否
	*/
	function isTenpaySign() {
		$signPars = "";

		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			if("sign" !== $k && "" !== $v) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey();
		$sign = strtolower(md5($signPars));
		$tenpaySign = strtolower($this->getParameter("sign"));
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign .
				" tenpaySign:" . $this->getParameter("sign"));

		return $sign == $tenpaySign;

	}

	/**
	*获取debug信息
	*/
	function getDebugInfo() {
		return $this->debugInfo;
	}

	/**
	*设置debug信息
	*/
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}
}

/**
 * 中介担保请求类
 * ============================================================================
 * api说明：
 * init(),初始化函数，默认给一些参数赋值，如cmdno,date等。
 * getGateURL()/setGateURL(),获取/设置入口地址,不包含参数值
 * getKey()/setKey(),获取/设置密钥
 * getParameter()/setParameter(),获取/设置参数值
 * getAllParameters(),获取所有参数
 * getRequestURL(),获取带参数的请求URL
 * doSend(),重定向到财付通支付
 * getDebugInfo(),获取debug信息
 *
 * ============================================================================
 *
 */

class MediPayRequestHandler extends RequestHandler {

	function __construct() {
		$this->MediPayRequestHandler();
	}

	function MediPayRequestHandler() {
		//默认支付网关地址
		$this->setGateURL("https://www.tenpay.com/cgi-bin/med/show_opentrans.cgi");
	}

	/**
	*@Override
	*初始化函数，默认给一些参数赋值。
	*/
	function init() {
		//自定参数，原样返回
		$this->setParameter("attach", "1");

		//平台商帐号
		$this->setParameter("chnid",  "");

		//任务代码
		$this->setParameter("cmdno", "12");

		//编码类型 1:gbk 2:utf-8
		$this->setParameter("encode_type", "1");

		//交易说明，不能包含<>’”%特殊字符
		$this->setParameter("mch_desc", "");

		//商品名称，不能包含<>’”%特殊字符
		$this->setParameter("mch_name", "");

		//商品总价，单位为分。
		$this->setParameter("mch_price",  "");

		//回调通知URL
		$this->setParameter("mch_returl",  "");

		//交易类型：1、实物交易，2、虚拟交易
		$this->setParameter("mch_type",  "");

		//商家的定单号
		$this->setParameter("mch_vno",  "");

		//是否需要在财付通填定物流信息，1：需要，2：不需要。
		$this->setParameter("need_buyerinfo",  "");

		//卖家财付通帐号
		$this->setParameter("seller",  "");

		//支付后的商户支付结果展示页面
		$this->setParameter("show_url",  "");

		//物流公司或物流方式说明
		$this->setParameter("transport_desc",  "");

		//需买方另支付的物流费用
		$this->setParameter("transport_fee",  "");

		//版本号
		$this->setParameter("version",  "2");

		//摘要
		$this->setParameter("sign",  "");

	}

}
/**
 * 中介担保应答类
 * ============================================================================
 * api说明：
 * getKey()/setKey(),获取/设置密钥
 * getParameter()/setParameter(),获取/设置参数值
 * getAllParameters(),获取所有参数
 * isTenpaySign(),是否财付通签名,true:是 false:否
 * doShow(),显示处理结果
 * getDebugInfo(),获取debug信息
 *
 * ============================================================================
 *
 */

class MediPayResponseHandler extends ResponseHandler {

	function doShow() {
		$strHtml = "<html><head>\r\n" .
			"<meta name=\"TENCENT_ONLINE_PAYMENT\" content=\"China TENCENT\">" .
			"</head><body></body></html>";

		echo $strHtml;

		exit;
	}
	/**
	 * @Override
	 * 签名规则,按字母a-z排序,遇到空值不参加签名
	 * @return bool
	 */
	function isTenpaySign() {

		$signParameterArray = array(
			'attach',
			'buyer_id',
			'cft_tid',
			'chnid',
			'cmdno',
			'mch_vno',
			'retcode',
			'seller',
			'status',
			'total_fee',
			'trade_price',
			'transport_fee',
			'version'
		);

		//按字母a-z排序
		ksort($signParameterArray);

		foreach($signParameterArray as $k ) {
			$v = $this->getParameter($k);
			if(isset($v)) {
				$signPars .= $k . "=" . urldecode($v) . "&";
			}
		}

		$signPars .= "key=" . $this->getKey();

		$sign = strtolower(md5($signPars));

		$tenpaySign = strtolower($this->getParameter("sign"));

		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign .
				" tenpaySign:" . $this->getParameter("sign"));

		return $sign == $tenpaySign;

	}

}

/**
生成支付URL
*/
function credit_payurl($price, &$orderid, $bank = 'DEFAULT') {
	include_once DISCUZ_ROOT . './source/class/class_chinese.php';
	global $_G;

	$date = dgmdate(TIMESTAMP, 'YmdHis');
	$suffix = dgmdate(TIMESTAMP, 'His').rand(1000, 9999);
	$transaction_id = DISCUZ_PARTNER.$date.$suffix;

	$orderid = dgmdate(TIMESTAMP, 'YmdHis').random(14);

	$chinese = new Chinese(strtoupper(CHARSET), 'GBK');
	$subject = $chinese->Convert(lang('forum/misc', 'credit_forum_payment').' '.$_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'].' '.intval($price * $_G['setting']['ec_ratio']).' '.$_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit']);

	$reqHandler = new RequestHandler();
	$reqHandler->setGateURL("https://gw.tenpay.com/gateway/pay.htm");

	$reqHandler->init();
	$reqHandler->setKey(DISCUZ_SECURITYCODE);

	$reqHandler->setParameter("partner", DISCUZ_PARTNER);
	$reqHandler->setParameter("out_trade_no", $orderid);
	$reqHandler->setParameter("total_fee", $price * 100);
	$reqHandler->setParameter("return_url", $_G['siteurl'].'api/trade/notify_credit.php');
	$reqHandler->setParameter("notify_url", $_G['siteurl'].'api/trade/notify_credit.php');
	$reqHandler->setParameter("body", $subject);	// 商品名称
	$reqHandler->setParameter("bank_type", $bank);

	$reqHandler->setParameter("spbill_create_ip", $_G['clientip']);
	$reqHandler->setParameter("fee_type", "1");
	$reqHandler->setParameter("subject", $subject);	// 商品名称

	$reqHandler->setParameter("sign_type", "MD5");
	$reqHandler->setParameter("service_version", "1.0");
	$reqHandler->setParameter("input_charset", "GBK");
	$reqHandler->setParameter("sign_key_index", "1");

	$reqHandler->setParameter("attach", "tenpay");
	$reqHandler->setParameter("time_start", $date);
	$reqHandler->setParameter("trade_mode","1");
	$reqHandler->setParameter("trans_type","1");
	$reqHandler->setParameter("agentid", DISCUZ_AGENTID);
	$reqHandler->setParameter("agent_type","2");

	$reqUrl = $reqHandler->getRequestURL();
	return $reqUrl;
}

/*
	商品交易url
*/
function trade_payurl($pay, $trade, $tradelog) {
	global $_G;

	/* 平台商密钥 */
	$key = DISCUZ_TENPAY_OPENTRANS_KEY;

	/* 平台商帐号 */
	$chnid = DISCUZ_TENPAY_OPENTRANS_CHNID;

	/* 卖家 */
	//$seller = DISCUZ_TENPAY_OPENTRANS_CHNID;
	$seller = $trade['tenpayaccount'];

	/* 交易说明 */
	$mch_desc = $trade['subject'];

	/* 商品名称 */
	$mch_name = $trade['subject'];

	/* 商品总价，单位为分 */
	$mch_price = $tradelog['baseprice'] * $tradelog['number'] * 100;

	/* 回调通知URL */
	$mch_returl = $_G['siteurl'].'api/trade/notify_trade.php';

	/* 商家的定单号 */
	$mch_vno = $tradelog['orderid'];

	/* 支付后的商户支付结果展示页面 */
	$show_url = $_G['siteurl'].'api/trade/notify_trade.php';

	/* 物流公司或物流方式说明 */
	$transport_desc = $pay['logistics_type'];

	/* 需买方另支付的物流费用,以分为单位 */
	$transport_fee = $tradelog['transportfee'] * 100;

	// 编码类型
	if(strtolower(CHARSET) == 'gbk') {
		$encode_type = '1';
	} else {
		$encode_type = '2';
	}

	$mch_type = '1';
	$need_buyerinfo = '1';
	if($pay['logistics_type'] == 'VIRTUAL') {
		$mch_type = '2';
		$need_buyerinfo = '2';
	}

	/* 创建支付请求对象 */
	$reqHandler = new MediPayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);

	//----------------------------------------
	//设置支付参数
	//----------------------------------------
	$reqHandler->setParameter("chnid", $chnid);						//平台商帐号
	$reqHandler->setParameter("encode_type", $encode_type);			//编码类型 1:gbk 2:utf-8
	$reqHandler->setParameter("mch_desc", $mch_desc);				//交易说明
	$reqHandler->setParameter("mch_name", $mch_name);				//商品名称
	$reqHandler->setParameter("mch_price", $mch_price);				//商品总价，单位为分
	$reqHandler->setParameter("mch_returl", $mch_returl);			//回调通知URL
	$reqHandler->setParameter("mch_type", $mch_type);				//交易类型：1、实物交易，2、虚拟交易
	$reqHandler->setParameter("mch_vno", $mch_vno);					//商家的定单号
	$reqHandler->setParameter("need_buyerinfo", $need_buyerinfo);				//是否需要在财付通填定物流信息，1：需要，2：不需要。
	$reqHandler->setParameter("seller", $seller);					//卖家财付通帐号
	$reqHandler->setParameter("show_url",	$show_url);				//支付后的商户支付结果展示页面
	$reqHandler->setParameter("transport_desc", $transport_desc);	//物流公司或物流方式说明
	$reqHandler->setParameter("transport_fee", $transport_fee);		//需买方另支付的物流费用
	$reqHandler->setParameter('attach', 'tenpay');

	//请求的URL
	$reqUrl = $reqHandler->getRequestURL();
	return $reqUrl;
}


/**
生成购买邀请码url
*/
function invite_payurl($amount, $price, &$orderid, $bank = 'DEFAULT') {
	include_once DISCUZ_ROOT . './source/class/class_chinese.php';
	global $_G;

	$date = dgmdate(TIMESTAMP, 'YmdHis');
	$suffix = dgmdate(TIMESTAMP, 'His').rand(1000, 9999);
	$transaction_id = DISCUZ_PARTNER.$date.$suffix;

	$orderid = dgmdate(TIMESTAMP, 'YmdHis').random(14);

	$chinese = new Chinese(strtoupper(CHARSET), 'GBK');
	$subject = $chinese->Convert(lang('forum/misc', 'invite_forum_payment').' '.intval($amount).' '.lang('forum/misc', 'invite_forum_payment_unit'));

	$reqHandler = new RequestHandler();
	$reqHandler->setGateURL("https://gw.tenpay.com/gateway/pay.htm");

	$reqHandler->init();
	$reqHandler->setKey(DISCUZ_SECURITYCODE);

	$reqHandler->setParameter("partner", DISCUZ_PARTNER);
	$reqHandler->setParameter("out_trade_no", $orderid);
	$reqHandler->setParameter("total_fee", $price * 100);
	$reqHandler->setParameter("return_url", $_G['siteurl'].'api/trade/notify_invite.php');
	$reqHandler->setParameter("notify_url", $_G['siteurl'].'api/trade/notify_invite.php');
	$reqHandler->setParameter("body", $subject);	// 商品名称
	$reqHandler->setParameter("bank_type", $bank);

	$reqHandler->setParameter("spbill_create_ip", $_G['clientip']);
	$reqHandler->setParameter("fee_type", "1");
	$reqHandler->setParameter("subject", $subject);	// 商品名称

	$reqHandler->setParameter("sign_type", "MD5");
	$reqHandler->setParameter("service_version", "1.0");
	$reqHandler->setParameter("input_charset", "GBK");
	$reqHandler->setParameter("sign_key_index", "1");

	$reqHandler->setParameter("attach", "tenpay");
	$reqHandler->setParameter("time_start", $date);
	$reqHandler->setParameter("trade_mode","1");
	$reqHandler->setParameter("trans_type","1");
	$reqHandler->setParameter("agentid", DISCUZ_AGENTID);
	$reqHandler->setParameter("agent_type","2");

	$reqUrl = $reqHandler->getRequestURL();
	return $reqUrl;
}
/*debug
* 接口返回值校验
* @param $type 返回类型	credit积分 trade商品
* @return 值
*/
function trade_notifycheck($type) {
	global $_G;

	if($type == 'credit' || $type == 'invite') {
		if(!DISCUZ_SECURITYCODE) {
			exit('Access Denied');
		}
		// 创建支付应答对象
		$resHandler = new ResponseHandler();
		$resHandler->setKey(DISCUZ_SECURITYCODE);

		// 不参加签名
		$resHandler->setParameter("bankname", "");
	} else {
		if(!DISCUZ_TENPAY_OPENTRANS_KEY) {
			exit('Access Denied');
		}
		$resHandler = new MediPayResponseHandler();
		$resHandler->setKey(DISCUZ_TENPAY_OPENTRANS_KEY);
	}
	if($type == 'credit' || $type == 'invite') {
		if($resHandler->isTenpaySign() && DISCUZ_PARTNER == $_GET['partner']) {
			return array(
				'validator'	=> isset($_GET['trade_state']) ? !$_GET['trade_state'] : 0,
				'order_no' 	=> $_GET['out_trade_no'],
				'trade_no'	=> isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '',
				'price' 	=> $_GET['total_fee'] / 100,
				'bargainor_id' => $_GET['partner'],
				'location'	=> true,
				);
		}
	} elseif($type == 'trade') {
		if($resHandler->isTenpaySign()) {
			return array(
				'validator' => $resHandler->getParameter('retcode') == '0',
				'order_no' => $resHandler->getParameter('mch_vno'),
				'trade_no' => $resHandler->getParameter('cft_tid'),
				'price' => $resHandler->getParameter('total_fee') / 100,
				'status' => $resHandler->getParameter('status'),
				'location'	=> true,
			);
		}
	} else {
		return array(
			'validator'	=> FALSE,
			'location'	=> 'forum.php?mod=memcp&action=credits&operation=addfunds&return=fail'
		);
	}
}

function trade_setprice($data, &$price, &$pay, &$transportfee) {
	if($data['transport'] == 3) {
		$pay['logistics_type'] = 'VIRTUAL';
	}

	if($data['transport'] != 3) {
		if($data['fee'] == 1) {
			$pay['logistics_type'] = 'POST';
			$pay['logistics_fee'] = $data['trade']['ordinaryfee'];
			if($data['transport'] == 2) {
				$price = $price + $data['trade']['ordinaryfee'];
				$transportfee = $data['trade']['ordinaryfee'];
			}
		} elseif($data['fee'] == 2) {
			$pay['logistics_type'] = 'EMS';
			$pay['logistics_fee'] = $data['trade']['emsfee'];
			if($data['transport'] == 2) {
				$price = $price + $data['trade']['emsfee'];
				$transportfee = $data['trade']['emsfee'];
			}
		} else {
			$pay['logistics_type'] = 'EXPRESS';
			$pay['logistics_fee'] = $data['trade']['expressfee'];
			if($data['transport'] == 2) {
				$price = $price + $data['trade']['expressfee'];
				$transportfee = $data['trade']['expressfee'];
			}
		}
	}
}

function trade_getorderurl($orderid) {
	return "https://www.tenpay.com/med/tradeDetail.shtml?b=1&trans_id=$orderid";
}

function trade_typestatus($method, $status = -1) {
	switch($method) {
		case 'buytrades'	: $methodvalue = array(1, 3);break;
		case 'selltrades'	: $methodvalue = array(2, 4);break;
		case 'successtrades'	: $methodvalue = array(5);break;
		case 'tradingtrades'	: $methodvalue = array(1, 2, 3, 4);break;
		case 'closedtrades'	: $methodvalue = array(6, 10);break;
		case 'refundsuccess'	: $methodvalue = array(9);break;
		case 'refundtrades'	: $methodvalue = array(9, 10);break;
		case 'unstarttrades'	: $methodvalue = array(0);break;
	}
	return $status != -1 ? in_array($status, $methodvalue) : $methodvalue;
}

function trade_getstatus($key, $method = 2) {
	$language = lang('forum/misc');
	$status[1] = array(
		'WAIT_BUYER_PAY' => 1,
		'WAIT_SELLER_CONFIRM_TRADE' => 2,
		'WAIT_SELLER_SEND_GOODS' => 3,
		'WAIT_BUYER_CONFIRM_GOODS' => 4,
		'TRADE_FINISHED' => 5,
		'TRADE_CLOSED' => 6,
		'REFUND_SUCCESS' => 9,
		'REFUND_CLOSED' => 10,
	);
	$status[2] = array(
		0  => $language['trade_unstart'],
		1  => $language['trade_waitbuyerpay'],
		2  => $language['trade_waitsellerconfirm'],
		3  => $language['trade_waitsellersend'],
		4  => $language['trade_waitbuyerconfirm'],
		5  => $language['trade_finished'],
		6  => $language['trade_closed'],
		9 => $language['trade_refundsuccess'],
		10 => $language['trade_refundclosed']
	);
	return $method == -1 ? $status[2] : $status[$method][$key];
}

?>