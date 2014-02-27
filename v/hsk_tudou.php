<?php

$tid = "".htmlspecialchars($tid);
$start = intval($start);
$hd	 = intval($hd) >= 1 && intval($hd) <= 3 ? intval($hd) : 2;

if(!$tid){
	$filesrc = "/v/yinfu.png";
}else{
	$hdsid = array(1=>'2', 2=>'4', 3=>'99');
	$url = "http://v2.tudou.com/v.action?st=".$hdsid[$hd]."&pw=&ui=0&retc=1&mt=0&noCache=77667&si=10200&sid=10200&vn=02&it=".$tid;
	$filesrc = curl_get_contents($url, $hd);
	if(!$filesrc){
		$filesrc = curl_get_nohd($url, $hd);
		preg_match('/>([^<]*)<\/f>/', $filesrc, $rg);
		$src =$rg[1];

		$start = $start ? "&tflvbegin=".$start : null;
		header("location: $src".$start);
		exit();

	}else{
		$start = $start ? "&tflvbegin=".$start : null;
		header("location: $filesrc".$start);
		exit();
	}
}

function curl_get_contents($url, $hdstyle=2){
	if(!function_exists('curl_init')) {
		$content = fsock_get_contents($url);
	} else {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		$content = curl_exec($ch);
		$errormsg = curl_error($ch);
		curl_close($ch);
		if($errormsg != '') {
			echo $errormsg;
			return false;
		}
	}

	$parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($parser, $content, $values, $index);
	xml_parser_free($parser);

	//print_r($values); exit();
	foreach($values as $val){
		if($hdstyle == 3){
			if($val['attributes']['brt'] == "99"){
				$vodurl = $val['value'];
				break;
			}
		}elseif($hdstyle == 1){
			for($i=2; $i<=5; $i++){
				if($val['attributes']['brt'] == $i){
					$vodurl = $val['value'];
					break;
				}
			}
		}elseif($hdstyle == 2){
			for($i=5; $i>=2; $i--){
				if($val['attributes']['brt'] == $i){
					$vodurl = $val['value'];
					break;
				}
			}
		}
	}

	if($hdstyle == 3 && !$vodurl){
		//没有找到高清地址，选用最新昕的地址
		foreach($values as $val){
			for($i=5; $i>=2; $i--){
				if($val['attributes']['brt'] == $i){
					$vodurl = $val['value'];
					break;
				}
			}
		}
	}
	
	$vodurl = str_replace('?key=', '?10200&key=', $vodurl);
	return $vodurl;
	//return false;

}

function curl_get_nohd($url, $hdstyle=2){
	if(!function_exists('curl_init')) {
		$content = fsock_get_contents($url);
	} else {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		$content = curl_exec($ch);
		$errormsg = curl_error($ch);
		curl_close($ch);
		if($errormsg != '') {
			echo $errormsg;
			return false;
		}
	}
	return $content;
}


function fsock_get_contents($url){
	if(!function_exists('fsockopen')) {
		return false;
	} else {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$url = eregi_replace('^http://', '', $url);
		$temp = explode('/', $url);
		$host = array_shift($temp);
		$path = '/'.implode('/', $temp);
		$temp = explode(':', $host);
		$host = $temp[0];
		$port = isset($temp[1]) ? $temp[1] : 80;
		$fp = @fsockopen($host, $port, $errno, $errstr, 30);
		if ($fp){
			@fputs($fp, "GET $path HTTP/1.1\r\nHost: $host\r\nAccept: */*\r\nReferer:$url\r\nUser-Agent: $user_agent\r\nConnection: Close\r\n\r\n");
		}
		$content = '';
		while ($str = @fread($fp, 4096)){
			$content .= $str;
		}
		@fclose($fp);

		if(preg_match("/^HTTP\/\d.\d 301 Moved Permanently/is", $content)){
			if(preg_match("/Location:(.*?)\r\n/is", $content, $murl)){
				return fsock_get_contents($murl[1]);
			}
		}

		if(preg_match("/^HTTP\/\d.\d 200 OK/is", $content)){
			preg_match("/Content-Type:(.*?)\r\n/is", $content, $murl);
			$contentType = trim($murl[1]);
			$content = explode("\r\n\r\n", $content, 2);
			$content = $content[1];
		}
		return $content;
	}
}

