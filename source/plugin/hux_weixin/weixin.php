<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class wechatCallbackapi
{

    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
		$this->responseMsg();
        	exit;
        }
    }
    
    public function responseMsg()
    {
			global $wxsetting;
			$postStr = file_get_contents("php://input");

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
				if (CHARSET != 'utf-8') {
					$keyword = diconv($keyword,'utf-8');
				}
                $time = TIMESTAMP;
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				if(!empty( $keyword ))
                {
              		if ($keyword == 'help') {
              			$string = $wxsetting['mr'];
              		} else {
						$string = $wxsetting['mr'];
              			$wxjq = $this->_strToArr($wxsetting['jq']);
              			$wxmh = $this->_strToArr($wxsetting['mh']);
              			foreach ($wxmh as $v) {
              				if (strstr($keyword,$v[0])) {
              					$string = $v[1];
              				}
              			}
              			foreach ($wxjq as $v) {
              				if ($keyword == $v[0]) {
              					$string = $v[1];
              				}
              			}
              			$string = str_replace("{n}","\n",$string);
              		}
              		$msgType = "text";
					if (CHARSET != 'utf-8') {
						$string = diconv($string,CHARSET,'utf-8');
					}
                	$contentStr = $string;
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
    
	private function _strToArr($str){
		$arr = array();
		$arr = explode("\n", $str);
		$arrList = array();
		foreach ($arr as $key => $value){
			$arrList[$key] = explode("=", $value);
		}
		return $arrList;
	}
    
   private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
		
}
?>