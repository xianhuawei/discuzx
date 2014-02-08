<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/getpm/lang/lang.'.currentlang().'.php';
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$getpmlang['appcmdtxt'] = diconv($getpmlang['appcmdtxt'],CHARSET,'utf-8');
}
if ($binded) {
	$md5hash = md5($binded['uid'].TIMESTAMP.mt_rand(1000,9999).$_G['authkey']);
	C::t('#hux_wx#hux_wx')->update($openid,array('cjpass'=>$md5hash));
	$md5hash = md5($md5hash.$binded['uid'].$openid);
	$stringa = array(
		array(
			'title' => $getpmlang['appcmdtxt'],
			'description' => '',
			'picurl' => $_G['siteurl'].'source/plugin/hux_wx/mod/getpm/images/pm.jpg',
			'url' => $_G['siteurl'],
		)
	);
	loaducenter();
	$pmdata = uc_pm_list($binded['uid'],1,9);
	if ($pmdata['data']) {
		$msgtype = 'news';
		foreach ($pmdata['data'] as $v) {
			if (CHARSET != 'utf-8' && !$wxsetting['code']) {
				$v['msgfrom'] = diconv($v['msgfrom'],CHARSET,'utf-8');
				$v['message'] = diconv($v['message'],CHARSET,'utf-8');
			}
			$stringb[] = array(
				'title' => '['.$v['msgfromid'].']['.$v['msgfrom'].']'.$v['message'].'('.dgmdate($v['dateline']).')',
				'description' => '',
				'picurl' => $_G['setting']['ucenterurl'].'/avatar.php?uid='.$v['msgfromid'].'&size=big',
				'url' => $_G['siteurl'].'plugin.php?id=hux_wx:hux_wx&mod=getpm&ac=view&touid='.$v['msgfromid'].'&openid='.$openid.'&md5hash='.$md5hash.'&mobile=2',
			);	
		}
		$strings = array_merge($stringa,$stringb);
		$string = array(
			'items' => $strings,
		);
	} else {
		$string = $getpmlang['nopm'];
	}
} else {
	$string = lang('plugin/hux_wx','tobind');
}

if (CHARSET != 'utf-8' && !$wxsetting['code'] && $msgtype == 'text') {
	$string = diconv($string,CHARSET,'utf-8');
}

$contentStr = $string;
?>