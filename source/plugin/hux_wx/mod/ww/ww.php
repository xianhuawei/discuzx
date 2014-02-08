<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/ww/lang/lang.'.currentlang().'.php';
if (CHARSET != 'utf-8') {
	$keyword = diconv($keyword,CHARSET,'utf-8');
}
$xml = simplexml_load_file(DISCUZ_ROOT.'./source/plugin/hux_wx/mod/ww/ww.xml');
foreach ($xml as $k=>$v) {
	foreach ($v[0]->city as $vv) {
		foreach($vv[0]->county as $vvv){
			$att = $vvv[0]->attributes();
			if ($att['name'] == $keyword) {
				$wwcity[] = $att;
			}
		}
	}
}				
if (!$wwcity[0]['name']) {
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = $wwlang['weathererr'];
} else {
	$msgtype = 'news';
	$url = 'http://m.weather.com.cn/data/'.$wwcity[0]['weatherCode'].'.html';
	$r = file_get_contents($url);
	$r = json_decode($r,true);
	$rr = $r['weatherinfo'];
	$urlb = 'http://api2.sinaapp.com/search/weather/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword='.urlencode($keyword);
	$rb = file_get_contents($urlb);
	$rb = json_decode($rb,true);
	$rrb = $rb['text']['content'];
	if (CHARSET != 'utf-8' && $wxsetting['code']) {
		$rrb = diconv($rrb,'utf-8',CHARSET);
	}
	$wwinfo = explode("\n",$rrb);
	C::t('#hux_wx#hux_wx_action')->delete($openid);
	$string = array(
		'items' => array(
			array(
				'title' => $wwinfo[0],
				'description' => '',
				'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/ww/images/ww.jpg',
				'url' => 'http://www.hux.cc',
			),
			array(
				'title' => $wwinfo[1],
				'description' => '',
				'picurl' => 'http://m.weather.com.cn/img/b'.$rr['img1'].'.gif',
				'url' => 'http://www.hux.cc',
			),
			array(
				'title' => $wwinfo[2],
				'description' => '',
				'picurl' => 'http://m.weather.com.cn/img/b'.$rr['img3'].'.gif',
				'url' => 'http://www.hux.cc',
			),
			array(
				'title' => $wwinfo[3],
				'description' => '',
				'picurl' => 'http://m.weather.com.cn/img/b'.$rr['img5'].'.gif',
				'url' => 'http://www.hux.cc',
			)
		)
	);
}
if (CHARSET != 'utf-8' && !$wxsetting['code'] && $msgtype == 'text') {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>