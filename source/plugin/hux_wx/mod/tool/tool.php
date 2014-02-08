<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/tool/lang/lang.'.currentlang().'.php';
$appid = $appconfig['appkey'];
$sign = md5(md5($appid).$appconfig['appsk']);
$url = 'http://api.k780.com:88/?app=';
if ($huxaction['action'] == '0') {
	if (!in_array($keyword,array('1','2','3','4','5','6','7','8','9'))) {
		$string = $toollang['idmsg'];
	} else {
		C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$keyword));
		if ($keyword == 1) {
			$string = $toollang['ip'];
		} elseif ($keyword == 2) {
			$string = $toollang['phone'];
		} elseif ($keyword == 3) {
			$string = $toollang['idcard'];
		} elseif ($keyword == 9) {
			$string = $toollang['qr'];
		} else {
			$string = $toollang['url'];
		}
	}
} elseif ($huxaction['action'] == '1') {
	$data = getHttp($url,1,$keyword,$appid,$sign);
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['where']."\n".$data['result']['att'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '2') {
	$data = getHttp($url,2,$keyword,$appid,$sign);
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['area']."\n".$data['result']['area']."\n\n".$toollang['postno']."\n".$data['result']['postno']."\n\n".$toollang['where']."\n".$data['result']['att']."\n\n".$toollang['ctype']."\n".$data['result']['ctype']."\n\n".$toollang['operators']."\n".$data['result']['operators'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '3') {
	$data = getHttp($url,3,$keyword,$appid,$sign);
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['where']."\n".$data['result']['att']."\n\n".$toollang['born']."\n".$data['result']['born']."\n\n".$toollang['sex']."\n".$data['result']['sex'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '4') {
	$data = getHttp($url,4,$keyword,$appid,$sign,'domain.whois');
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['registrar']."\n".$data['result']['registrar']."\n\n".$toollang['contact_email']."\n".$data['result']['contact_email']."\n\n".$toollang['sponsoring_registrar']."\n".$data['result']['sponsoring_registrar']."\n\n".$toollang['dom_insdate']."\n".$data['result']['dom_insdate']."\n\n".$toollang['dom_upddate']."\n".$data['result']['dom_upddate']."\n\n".$toollang['dom_expdate']."\n".$data['result']['dom_expdate'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '5') {
	$data = getHttp($url,4,$keyword,$appid,$sign,'domain.alexa');
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['sitenm']."\n".$data['result']['sitenm']."\n\n".$toollang['country']."\n".$data['result']['country']."\n\n".$toollang['accesss_speed']."\n".$data['result']['accesss_speed']."\n\n".$toollang['speed_score']."\n".$data['result']['speed_score']."\n\n".$toollang['backlinks']."\n".$data['result']['backlinks']."\n\n".$toollang['country_rank']."\n".$data['result']['country_rank']."\n\n".$toollang['global_rank']."\n".$data['result']['global_rank'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '6') {
	$data = getHttp($url,4,$keyword,$appid,$sign,'domain.beian');
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['icpno']."\n".$data['result']['icpno']."\n\n".$toollang['webhome']."\n".$data['result']['webhome']."\n\n".$toollang['organizers']."\n".$data['result']['organizers']."\n\n".$toollang['organizers_type']."\n".$data['result']['organizers_type']."\n\n".$toollang['exadate']."\n".$data['result']['exadate'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '7') {
	$data = getHttp($url,5,$keyword,$appid,$sign,'pagerank.google');
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['pr']."\n".$data['result']['page_rank'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '8') {
	$data = getHttp($url,5,$keyword,$appid,$sign,'pagerank.sogou');
	if (CHARSET != 'utf-8') {
		$data = diconv($data,'utf-8',CHARSET);
	}
	if ($data['success'] == '0') {
		$string = $data['msg'];
	} else {
		$string = $toollang['pr']."\n".$data['result']['page_rank'];
	}
	C::t('#hux_wx#hux_wx_action')->delete($openid);
} elseif ($huxaction['action'] == '9') {
	$msgtype = 'news';
	if (CHARSET != 'utf-8' && $wxsetting['code']) {
		$keyword = diconv($keyword,'utf-8');
		$toollang['showqr'] = diconv($toollang['showqr'],'utf-8');
	}
	$keywords = urlencode($keyword);
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = array(
		'items' => array(array(
				'title' => $keyword,
				'description' => $toollang['showqr'],
				'picurl' => $url.'qr.get&data='.$keywords.'&level=L&size=10',
				'url' => $url.'qr.get&data='.$keywords.'&level=L&size=10',
		))
	);
}
if (CHARSET != 'utf-8' && !$wxsetting['code'] && $msgtype == 'text') {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;

function getHttp($url,$type,$text,$appid='',$sign='',$tool='') {
	$urlb = '&appkey='.$appid.'&sign='.$sign.'&format=json';
	if ($type == 1) {
		$urlc = 'ip.get&ip='.$text;
	} elseif ($type == 2) {
		$urlc = 'phone.get&phone='.$text;
	} elseif ($type == 3) {
		$urlc = 'idcard.get&idcard='.$text;
	} elseif ($type == 4) {
		$urlc = $tool.'&domain='.$text;
	} elseif ($type == 5) {
		$urlc = $tool.'&url='.$text;
	}
	$urls = $url.$urlc.$urlb;
	$r = file_get_contents($urls);
	$r = json_decode($r,true);
	return $r;
}
?>