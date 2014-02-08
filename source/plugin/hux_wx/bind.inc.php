<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$Plang = $scriptlang['hux_wx'];
if ($_GET['op'] == 'unbind') {
	if ($_GET['formhash'] == formhash()) {
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/unbind/lang/lang.'.currentlang().'.php';
		$openid = $_GET['openid'];
		$binded = C::t('#hux_wx#hux_wx')->fetch_by_openid($openid,'uid');
		$unbind_bd = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('bind');
		if ($unbind_bd) {
			$appconfigs_bd = explode('||',$unbind_bd['configs']);
			foreach($appconfigs_bd as $value){ 
				$appconfigss_bd = explode(':',$value);
				$appconfig_bd[$appconfigss_bd[0]] = $appconfigss_bd[1];
			}
			if ($appconfig_bd['verify'] && $appconfig_bd['verify'] != '0') {
				$vid = C::t('common_member_verify')->count_by_uid($binded['uid']);
				if ($vid > 0) {
					C::t('common_member_verify')->update($binded['uid'],array($appconfig_bd['verify']=>0));
				}
			}
		}
		C::t('#hux_wx#hux_wx')->delete($openid);
		C::t('#hux_wx#hux_wx_action')->delete($openid);
		cpmsg($unbindlang['unbind'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=bind', 'succeed');
	}
} else {
	$perpage = 20;
	$fnum = C::t('#hux_wx#hux_wx')->fetch_all_by_search();
	$page = max(1, intval($_GET['page']));
	$start = ($page-1)*$perpage;	
	$fquery = C::t('#hux_wx#hux_wx')->fetch_all_by_search('',"ORDER BY uid ASC",1,$start,$perpage);
	showformheader('plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admin&op=zjdel&');
	showtableheader();
	$appnum = C::t('#hux_wx#hux_wx_config')->fetch_by_appid('unbind','appid');
	$thadd = $appnum ? '<th>op</th>' : '';
	echo "<tr class='header'><th>openid</th><th>uid</th><th>username</th>".$thadd."</tr>";
	foreach ($fquery as $fresult){
		$member = C::t('#hux_wx#hux_common_member')->fetch_by_uid($fresult['uid']);
		$fresult['username'] = $member['username'];
		if ($appnum) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/unbind/lang/lang.'.currentlang().'.php';
			$fresult['op'] = '<td><a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=bind&op=unbind&openid='.$fresult['openid'].'&formhash='.FORMHASH.'>'.$unbindlang['appcmdtxt'].'</a></td>';
		} else {
			$fresult['op'] = '';
		}
		echo "<tr><td>".$fresult['openid']."</td><td>".$fresult['uid']."</td><td><a href='home.php?mod=space&uid=".$fresult['uid']."' target='_blank'>".$fresult['username']."</a></td>".$fresult['op']."</tr>";
	}
	showtablefooter();
	$multi = multi($fnum, $perpage, $page, ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=hux_wx&pmod=bind");	
	showsubmit('', '', '', '', $multi, false);
}
?>