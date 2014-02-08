<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/bind/lang/lang.'.currentlang().'.php';
if ($huxaction['action'] == '0') {
	C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$keyword));
	$string = $bindlang['yzmode'];
} else {
	$bindac = explode('|||',$huxaction['action']);
	if ($bindac[1]) {
		if ($bindac[1] == '1') {
			loaducenter();
			$user = uc_get_user(addslashes($bindac[0]));
			if (!$user) {
				C::t('#hux_wx#hux_wx_action')->delete($openid);
				$string = lang('plugin/hux_wx','nouid');
			} else {
				if (!$binded) {
					if ($user['password'] == md5(md5($keyword).$user['salt'])) {
						C::t('#hux_wx#hux_wx')->insert(array('openid'=>$openid,'uid'=>$bindac[0]));
						if ($appconfig['verify'] && $appconfig['verify'] != '0') {
							$vid = C::t('common_member_verify')->count_by_uid($bindac[0]);
							if ($vid > 0) {
								C::t('common_member_verify')->update($bindac[0],array($appconfig['verify']=>1));
							} else {
								C::t('common_member_verify')->insert(array('uid'=>$bindac[0],$appconfig['verify']=>1));
							}
						}
						C::t('#hux_wx#hux_wx_action')->delete($openid);
						$string = $bindlang['bindsus'];
					} else {
						C::t('#hux_wx#hux_wx_action')->delete($openid);
						$string = $bindlang['passerr'];
					}
				} else {
					C::t('#hux_wx#hux_wx_action')->delete($openid);
					$string = $bindlang['binderr'];
				}
			}										
		} elseif ($bindac[1] == '2') {
			if (!$binded) {
				if ($bindac[2] == $keyword) {
					C::t('#hux_wx#hux_wx')->insert(array('openid'=>$openid,'uid'=>$bindac[0]));
					if ($appconfig['verify'] && $appconfig['verify'] != '0') {
						$vid = C::t('common_member_verify')->count_by_uid($bindac[0]);
						if ($vid > 0) {
							C::t('common_member_verify')->update($bindac[0],array($appconfig['verify']=>1));
						} else {
							C::t('common_member_verify')->insert(array('uid'=>$bindac[0],$appconfig['verify']=>1));
						}
					}
					C::t('#hux_wx#hux_wx_action')->delete($openid);
					$string = $bindlang['bindsus'];
				} else {
					C::t('#hux_wx#hux_wx_action')->delete($openid);
					$string = $bindlang['yzerr'];
				}
			} else {
				C::t('#hux_wx#hux_wx_action')->delete($openid);
				$string = $bindlang['binderr'];
			} 
		}
	} else {
		if ($keyword != '1' && $keyword != '2') {
			$string = $bindlang['yzselect'];
		} else {
			if ($keyword == '1') {
				C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$huxaction['action'].'|||'.$keyword));
				$string = $bindlang['pass'];
			} elseif ($keyword == '2') {
				$yzrand = mt_rand(100000,999999);
				notification_add($huxaction['action'],'system',$bindlang['yzshow'].$yzrand,0,1);
				C::t('#hux_wx#hux_wx_action')->update($openid,array('action'=>$huxaction['action'].'|||'.$keyword.'|||'.$yzrand));
				$string = $bindlang['yzmsg'];
			}
		}
	}
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>