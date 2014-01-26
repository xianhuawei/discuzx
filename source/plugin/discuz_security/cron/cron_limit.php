<?php

//cronname:sys_limit_cron
//week:
//day:
//hour:
//minute:0,5,10,15,20,25,30,35,40,45,50,55

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

loadcache('plugin');
$hasRedis = extension_loaded('redis');
if($_G['cache']['plugin']['discuz_security']['islimit'] && $hasRedis && $_G['cache']['plugin']['discuz_security']['limitRedisHost']
	&& $_G['cache']['plugin']['discuz_security']['limitRedisPort']) {
	//连接Redis
	$r = new Redis();
	$r->pconnect($_G['cache']['plugin']['discuz_security']['limitRedisHost'], $_G['cache']['plugin']['discuz_security']['limitRedisPort']);
	if(!empty($_G['cache']['plugin']['discuz_security']['limitRedisPass'])) {
		$r->auth($_G['cache']['plugin']['discuz_security']['limitRedisPass']);
	}
	
	$banIps = $r->hGetAll('banTime');
	if(!empty($banIps)) {
		foreach ($banIps as $k => $v) {
			if(($k[0] == 'f')&&!$r->hExists('banTime', 'last.'.substr($k,6))) {
				$ip = substr($k, 6);
				$now = time();
				$firstTime = $v;
				 if(($now - $firstTime) >= 3600) {
					$r->lPush('unBanIpLog', $ip.'::'.date(lang('plugin/discuz_security', 'sys_limit_dateformat'),$firstTime).'::'.date(lang('plugin/discuz_security', 'sys_limit_dateformat'),$lastTime));
					$r->zDelete('banIP', $ip); 
					$r->hDel('banTime', 'first.'.$ip);
					$r->hDel('banTime', 'last.'.$ip);
					$r->sRem('ip.black', $ip);
				}
			}
			if($k[0] == 'l') {
				$now = time();
				$lastTime = $v;
				$ip = substr($k, 5);
				$firstTime = $r->hGet('banTime', 'first.'.$ip);
				if(($now - $lastTime) >= 7200) {
					$r->lPush('unBanIpLog', $ip.'::'.date(lang('plugin/discuz_security', 'sys_limit_dateformat'),$firstTime).'::'.date(lang('plugin/discuz_security', 'sys_limit_dateformat'),$lastTime));
					$r->zDelete('banIP', $ip); 
					$r->hDel('banTime', 'first.'.$ip);
					$r->hDel('banTime', 'last.'.$ip);
					$r->sRem('ip.black', $ip);
				}
	
			}
		}
	}
}

?>