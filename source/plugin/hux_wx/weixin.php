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
			global $_G,$wxsetting,$paymoney,$paymoneyname;
			$postStr = file_get_contents("php://input");

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
				if ($postObj->MsgType == 'image') {
					$keyword = $postObj->PicUrl.'||'.$postObj->MediaId;
				} elseif ($postObj->MsgType == 'event') {
					$keyword = $postObj->Event.'||'.$postObj->EventKey;
				} elseif ($postObj->MsgType == 'location') {
					$keyword = $postObj->Location_Y.','.$postObj->Location_X;
				} else {
					$keyword = trim($postObj->Content);
				}
				if (CHARSET != 'utf-8') {
					$keyword = diconv($keyword,'utf-8');
				}
				if(!empty( $keyword ))
                {
              		$openid = addslashes(htmlspecialchars($fromUsername));
                	$keyword = addslashes(htmlspecialchars($keyword));
                	$huxaction = C::t('#hux_wx#hux_wx_action')->fetch_by_openid($openid);
					$binded = C::t('#hux_wx#hux_wx')->fetch_by_openid($openid);
                	$gp = unserialize($wxsetting['gp']);
					$postgp = unserialize($wxsetting['postgp']);
					$appconfigsql = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($keyword,'configs');
					$applogin = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('login','appid');
					if ($appconfigsql) {
						$appconfigs = explode('||',$appconfigsql['configs']);
						foreach($appconfigs as $value){ 
							$appconfigss = explode(':',$value);
							$appconfig[$appconfigss[0]] = $appconfigss[1];
						}
					}
					if ($keyword == $wxsetting['cc']) {
              			C::t('#hux_wx#hux_wx_action')->delete($openid);
              			$string = lang('plugin/hux_wx','cc');
						if (CHARSET != 'utf-8' && !$wxsetting['code']) {
							$string = diconv($string,CHARSET,'utf-8');
						}
						$msgtype = 'text';
						$contentStr = $string;
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
						if (CHARSET != 'utf-8' && !$wxsetting['code']) {
							$string = diconv($string,CHARSET,'utf-8');
						}
						$msgtype = 'text';
						$contentStr = $string;
						if ($huxaction) {
							if ($postObj->MsgType == 'event') {
								$keywords = explode('||',$keyword);
								if ($keywords[0] == 'subscribe') {
									C::t('#hux_wx#hux_wx_action')->delete($openid);
									$string = $wxsetting['gz'];
									if (CHARSET != 'utf-8' && !$wxsetting['code']) {
										$string = diconv($string,CHARSET,'utf-8');
									}
									$contentStr = $string;
								} elseif ($keywords[0] == 'unsubscribe') {
									C::t('#hux_wx#hux_wx_action')->delete($openid);
								}
							} else {
								$appconfigsql = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($huxaction['type'],'configs');
								if ($appconfigsql) {
									$appconfigs = explode('||',$appconfigsql['configs']);
									foreach($appconfigs as $value){ 
										$appconfigss = explode(':',$value);
										$appconfig[$appconfigss[0]] = $appconfigss[1];
									}
								}
								$applist = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($huxaction['type'],'appid');
								if ($applist) {
									include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$applist['appid'].'/'.$applist['appid'].'.php';
								}
							}
						} elseif (substr($keyword,0,1) == '@' && !$wxsetting['at']) {
							include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/at/index.php';
						} elseif (substr($keyword,0,1) == '#' && $applogin) {
							include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/login/index.php';
						} else {
							if ($postObj->MsgType == 'text') {
								$applist = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($keyword,'appid');
								if ($applist) {
									include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$applist['appid'].'/index.php';
								}
							} elseif ($postObj->MsgType == 'event') {
								$keywords = explode('||',$keyword);
								if ($keywords[0] == 'subscribe') {
									$string = $wxsetting['gz'];
									if (CHARSET != 'utf-8' && !$wxsetting['code']) {
										$string = diconv($string,CHARSET,'utf-8');
									}
									$contentStr = $string;
								} elseif ($keywords[0] == 'CLICK') {
									$keyword = $keywords[1];
									$appconfigsql = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($keywords[1],'configs');
									if ($appconfigsql) {
										$appconfigs = explode('||',$appconfigsql['configs']);
										foreach($appconfigs as $value){ 
											$appconfigss = explode(':',$value);
											$appconfig[$appconfigss[0]] = $appconfigss[1];
										}
									}
									$applist = C::t('#hux_wx#hux_wx_config')->fetch_by_appcmd($keyword,'appid');
									if ($applist) {
										include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$applist['appid'].'/index.php';
									}
								}
							} elseif ($postObj->MsgType == 'image') {
								include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/pic/uploadpic.php';
							}
						}
					}				
					if ($msgtype == 'text') {
						$resultStr = $this->makeText($fromUsername, $toUsername, $contentStr);
					} else {
						$resultStr = $this->makeNews($fromUsername, $toUsername, $contentStr);
					}
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
    
    private function makeText($fromUsername,$toUsername,$text='',$FuncFlag=0)
    {
        $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>";
        return sprintf($textTpl,$fromUsername,$toUsername,TIMESTAMP,$text,$FuncFlag);
    }
    private function makeNews($fromUsername,$toUsername,$newsData=array(),$FuncFlag=0)
    {
        $newTplHeader = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>%s</ArticleCount><Articles>";
        $newTplItem = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>";
        $newTplFoot = "</Articles>
            <FuncFlag>0</FuncFlag>
            </xml>";
        $Content = '';
        $itemsCount = count($newsData['items']);
        $itemsCount = $itemsCount < 10 ? $itemsCount : 10;
        if ($itemsCount) {
            foreach ($newsData['items'] as $key => $item) {
                if ($key<=9) {
                    $Content .= sprintf($newTplItem,$item['title'],$item['description'],$item['picurl'],$item['url']);
                }
            }
        }
        $header = sprintf($newTplHeader,$fromUsername,$toUsername,TIMESTAMP,$itemsCount);
        $footer = sprintf($newTplFoot,$FuncFlag);
        return $header . $Content . $footer;
    }	
	
	private function _strToArr($str){
		$arr = array();
		$arr = explode("\n", $str);
		$arrList = array();
		foreach ($arr as $key => $value){
			$arrList[$key] = explode("||", $value);
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