<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: Restful.php 31472 2012-08-31 08:18:07Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class Cloud_Service_Client_Restful_ext extends Cloud_Service_Client_Restful{

	protected function _callMethod($method, $args, $isBatch = false) {
		$this->errorCode = 0;
		$this->errorMessage = '';
		$url = $this->_url;
		$avgDomain = explode('.', $method);
		switch ($avgDomain[0]) {
			case 'site':
				$url = 'http://api.discuz.qq.com/site_cloud.php';
				break;
			case 'qqgroup':
				$url = 'http://api.discuz.qq.com/site_qqgroup.php';
				break;
			case 'connect':
				$url = 'http://api.discuz.qq.com/site_connect.php';
				break;
			case 'security':
				$url = 'http://api.discuz.qq.com/site_security.php';
				break;
			default:
				$url = $this->_url;
		}
		$params = array();
		$params['sId'] = $this->_sId;
		$params['method'] = $method;
		$params['format'] = strtoupper($this->_format);

		$params['sig'] = $this->_generateSig($params, $method, $args);
		$params['ts'] = $this->_ts;

		$postData = $this->_createPostData($params, $args);

		if ($isBatch) {
			$this->_batchParams[] = $postData;

			return true;
		} else {

			$utilService = Cloud::loadClass('Service_Util');
			$postString = $utilService->httpBuildQuery($postData, '', '&');
            
            if($avgDomain[0] == 'security' && defined('ASYNCTASK') && ASYNCTASK == true) return self::_callAsync($url, $postString);
			$result = $this->_postRequest($url, $postString);
			if ($this->_debug) {
				$this->_message('receive data ' . dhtmlspecialchars($result) . "\n\n");
			}

			return $this->_parseResponse($result);
		}
	}

	static public function _callAsync($url, $postString) {
		$key = "dz_asy_cron";
		$aryapi = array($url, $postString);
		$rds = memory_driver_redis::instance();
		return $rds->lPush($key, $aryapi);
	}

}
