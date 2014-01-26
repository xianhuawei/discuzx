<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_security.class.php 213 2013-05-30 08:32:11Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/discuz_security/common.inc.php'; 

class plugin_discuz_security{
	
	//limit qingrongfu
	private $obj;
	private $today;
	private $redisHost;
	private $redisPort;
	private $redisPass;
	private $maxSess;
	private $lowScoreSess;
	private $maxBadBlock;
	private $unBanTime;
	private $frashTime;
	private $regTime;
	private $regWarn;
	private $regBlock;
	private $enable = false;
	private $sid;
	//limit end
	
	//lucashen
	protected $vars;
	//lucashen

	function __construct() {
		global $_G;
		//lucashen
		$this->vars['quesgrp'] = array();
		$this->vars = $_G['cache']['plugin']['discuz_security'];
		$this->vars['quesgrp'] = unserialize($this->vars['quesgrp']);
        //lucashen

		//limit qingrongfu
		$hasRedis = extension_loaded('redis');
		if($hasRedis  && $_G['cache']['plugin']['discuz_security']['islimit']) {
			!empty($_G['cache']['plugin']['discuz_security']['limitRedisHost']) ? 
					$this->redisHost = $_G['cache']['plugin']['discuz_security']['limitRedisHost'] : $this->redisHost = '127.0.0.1';
			!empty($_G['cache']['plugin']['discuz_security']['limitRedisPort']) ?
				   	$this->redisPort = $_G['cache']['plugin']['discuz_security']['limitRedisPort'] : $this->redisPort = 6379;
			!empty($_G['cache']['plugin']['discuz_security']['limitRedisPass']) ?
				   	$this->redisPass = $_G['cache']['plugin']['discuz_security']['limitRedisPass'] : $this->redisPass = '';
			!empty($_G['cache']['plugin']['discuz_security']['limitMaxSessPerSec']) ?
				   	$this->maxSess = $_G['cache']['plugin']['discuz_security']['limitMaxSessPerSec'] : $this->maxSess = 20;
			!empty($_G['cache']['plugin']['discuz_security']['limitLowScoreSessPerSec']) ?
				   	$this->lowScoreSess = $_G['cache']['plugin']['discuz_security']['limitLowScoreSessPerSec'] : $this->lowScoreSess = 10;
			!empty($_G['cache']['plugin']['discuz_security']['limitMaxBadBlock']) ?
				   	$this->maxBadBlock = $_G['cache']['plugin']['discuz_security']['limitMaxBadBlock'] : $this->maxBadBlock = 80;
			!empty($_G['cache']['plugin']['discuz_security']['limitUnBanTime']) ?
				   	$this->unBanTime = $_G['cache']['plugin']['discuz_security']['limitUnBanTime'] : $this->unBanTime = 7200;
			!empty($_G['cache']['plugin']['discuz_security']['limitFrashTime']) ? 
					$this->frashTime = $_G['cache']['plugin']['discuz_security']['limitFrashTime'] : $this->frashTime = 5;
			!empty($_G['cache']['plugin']['discuz_security']['limitRegTime']) ?
				   	$this->regTime = $_G['cache']['plugin']['discuz_security']['limitRegTime'] : $this->regTime = 30;
			!empty($_G['cache']['plugin']['discuz_security']['limitRegWarn']) ?
				   	$this->regWarn = $_G['cache']['plugin']['discuz_security']['limitRegWarn'] : $this->regWarn = 3;
			!empty($_G['cache']['plugin']['discuz_security']['limitRegBlock']) ?
				   	$this->regBlock = $_G['cache']['plugin']['discuz_security']['limitRegBlock'] : $this->regBlock = 5;
				   	
			if($hasRedis) {
				$this->obj = new Redis();
				$ret = $this->obj->pconnect($this->redisHost, $this->redisPort);
				if($ret) {
						$this->enable = true;
				}
				if(!empty($this->redisPass)) {
					if(!$this->obj->auth($this->redisPass)){
						$this->enable = false;
					}
				}
				$this->today=date('Ymd');
				$this->sid=$_G['sid'];
			}
		}
		// limit qingrongfu
	}

	public function common (){
		//limit qingrongfu
		if($this->enable) {
			$clientIp = $_SERVER['REMOTE_ADDR'];
			//跳过robot检查
			if(checkrobot()) {
				$usrAgent = $_SERVER['HTTP_USER_AGENT'];
				$usrAgentKey = md5($usrAgent);
				//检查是否符合封锁条件
				$this->_checkBanRobot($usrAgentKey, $clientIp);

				//记录曾经来过的robot Agent
				//if(!hExists('allAgent', $usrAgentKey)){
				$this->obj->hSet('allAgent', $usrAgentKey, $usrAgent);
				//}
				//为本次robot访问做加分排名
				$this->obj->zIncrBy($usrAgentKey.'.Score', 1, $clientIp);
				if($this->obj->ttl($usrAgentKey.'.Score') == -1){
					$this->obj->setTimeout($usrAgentKey.'.Score', 10);
				}
				//统计来访次数
				$this->obj->incr($usrAgentKey.'Count');
			} else {
				//swfupload功能不处理，否则批量上传可能失败.
				if(!(strpos($_SERVER['REQUEST_URI'], 'mod=image') && strpos($_SERVER['REQUEST_URI'], 'size=')) && !strpos($_SERVER['REQUEST_URI'], 'mod=swfupload')) {
				//跳过白名单
					if(!$this->obj->sIsMember('ip.white', $clientIp)) {
						//记录IP/PV
						$this->obj->zIncrBy('dayIpCount:'.$this->today, 1, $clientIp);
						//计算总SESS和低分SESS
						$sessCount=$this->obj->zSize('sid:'.$clientIp);
						$oneSessCount=$this->obj->zCount('sid:'.$clientIp, 0, 1);
						//如果大于$maxBadBlock次就一直封锁
						if($this->obj->zScore('banIP', $clientIp) >= $this->maxBadBlock) {
							$this->_banOne($clientIp);
						}
						//单IP 并发超过maxSess或低分SESS超过lowScoreSess，封锁
						if(($sessCount > $this->maxSess)||($oneSessCount > $this->lowScoreSess)) {
							$this->_banOne($clientIp);
						}
						//判断是否注册机,并处理
						$pos = strpos($_SERVER['REQUEST_URI'], 'mod=register');
						if($pos !== false && $pos !=="") {
							//黑名单处理
							if($this->obj->sIsMember('ip.black', $clientIp)) {
								$this->_banOne($clientIp);
							}
							//计算注册速度
							$regSpeed=$this->obj->get('regFrq:'.$clientIp);
				
							$this->obj->incr('regFrq:'.$clientIp);
							if($this->obj->ttl('regFrq:'.$clientIp) == -1) {
								$this->obj->setTimeout('regFrq:'.$clientIp, $this->regTime);
							}
				
							//注册5分钟阈值判定
							if($regSpeed >= $this->regBlock) {
								$this->_addBlack($clientIp);
								$this->_banOne($clientIp);
							}
							if($regSpeed >= $this->regWarn) {
								$this->_banOne($clientIp);
							}
						}
						//为当前访问做加分
						$this->obj->zIncrBy('sid:'.$clientIp, 1, $this->sid);
						//做定时处理
						if($this->obj->ttl('sid:'.$clientIp) == -1) {
							$this->obj->setTimeout('sid:'.$clientIp, $this->frashTime);
						}
					}
				}
			}
		}
		//limit qingrongfu
		
		//lucashen
        global $_G;
        if(in_array(CURSCRIPT, array('forum', 'group', 'member', 'plugin', 'portal', 'home'))
        	&& !(CURSCRIPT == 'member' && $_G['gp_action'] == 'logout')
        	) {
	        if($_G['uid'] > 0 && C::t('#discuz_security#common_member_status_child')->result_lastpost() + 3600*24*60 < $_G['timestamp']) {
	        	$_G['setting']['seccodestatus'] = $_G['setting']['seccodestatus'] | 4;
	        	$_G['setting']['seccodedata']['minposts'] = false;
	        	//adminlog('60D');//TODO
	        }
			if(getcookie('dz_sc_fq') && $_G['uid'] > 0 
				&& (
					!($_G['mod'] == 'spacecp' && $_G['gp_ac'] == 'profile') && $_G['inajax'] == 0 
					&& $_G['gp_action'] != 'logout'
					&& !(CURSCRIPT == 'home' && ($_G['gp_ac'] == 'sendmail' || $_G['gp_ac'] == 'pm'))
					 )
				) {
				adminlog('SFQUS');
				$location = $_G['siteurl'].'home.php?mod=spacecp&ac=profile&op=password';
				dheader('location:'.$location);
			}
        }
		//lucashen
	}
	
	//封锁一个ip一次
	private function _banOne($ip){
		$this->obj->zIncrBy('banIP', 1, $ip);
		if($this->obj->hExists('banTime','first.'.$ip)) {
				$this->obj->hSet('banTime', 'last.'.$ip, time());
		} else {
				$this->obj->hSet('banTime', 'first.'.$ip, time());
		}
		debug('AccessDenied by Discuz Security limit.');
	}
	//塞黑名单
	private function _addBlack($ip){
		$this->obj->sAdd('ip.black', $ip);
	}
	//robot封锁检查
	private function _checkBanRobot($usrAgentKey, $clientIp) {
		if($this->obj->sIsMember('banAgent', $userAgentKey)){
			debug('AccessDenied by Discuz Security limit.');
		}
		if($this->obj->sIsMember('banCNet', long2ip(ip2long($clientIp)&ip2long('255.255.255.0')))){
			debug('AccessDenied by Discuz Security limit.');
		}
		if($this->obj->sIsMember('banRobotIp',$clientIp)) {
			debug('AccessDenied by Discuz Security limit.');
		}
		if($this->obj->sIsMember('banRobotBNet',long2ip(ip2long($clientIp)&ip2long('255.255.0.0')))) {
			debug('AccessDenied by Discuz Security limit.');
		}
	}
}

class plugin_discuz_security_member extends plugin_discuz_security {
	public function logging_input_message() {
		global $_G;
		if($_G['uid'] > 0) {
			if(in_array($_G['groupid'], $this->vars['quesgrp']) && empty($_GET['questionid']) && empty($_GET['answer'])) {
				$location = $_G['siteurl'].'home.php?mod=spacecp&ac=profile&op=password';
				$href = str_replace("'", "\'", $location);
				$ucsynlogin = $_G['setting']['allowsynlogin'] ? uc_user_synlogin($_G['uid']) : '';
				dsetcookie('dz_sc_fq', 1);
				showmessage(lang('plugin/discuz_security', 'quesmessage'), $location, array(),
					array(
						'showid' => 'succeedmessage',
						'extrajs' => '<script type="text/javascript">'.
							'setTimeout("window.location.href =\''.$href.'\';", 3000);'.
							'$(\'succeedmessage_href\').href = \''.$href.'\';'.
							'$(\'main_message\').style.display = \'none\';'.
							'$(\'main_succeed\').style.display = \'\';'.
							'</script>'.$ucsynlogin,
						'striptags' => false,
						'showdialog' => true
					)
				);
				exit;
			} elseif(in_array($_G['groupid'], $this->vars['quesgrp']) && !empty($_GET['questionid']) && !empty($_GET['answer'])) {
				dsetcookie('dz_sc_fq');
			}
		}
		if(!$this->vars['is_accountip'] || $_G['uid'] > 0 || $_G['gp_action'] != 'login' || $_G['member_loginperm'] == 0) return false;
		C::t('#discuz_security#discuz_security_banip')->update_by_ip();
	}
}

class plugin_discuz_security_forum extends plugin_discuz_security {
	//高级模式发主题帖监控
	public function post() {
		global $_G;
		//allowmobile,mobileseccode
		//全局用户监控
		$usernum = C::t('common_member_action_log')->count_per_hour($_G['uid'], "thread");
		if(!$_G['setting']['maxthreadsperhour']) {
            if($_GET['action'] != 'reply' && ($_GET['handlekey'] != 'vfastpost' ||  $_GET['handlekey'] != 'fastpost')) {
                if($usernum >= $_G['cache']['plugin']['discuz_security']['maxthread']) {
                    $this->write_content_check_log($_G['uid'], $_G['clientip']);
                    $_G['setting']['seccodestatus']  = pow(2,11) - 1;
                }
            }
		}

		//版主编辑操作监控
		if($_GET['action'] == 'edit' && ($_G['adminid'] == 1 || $_G['adminid'] == 2 || $_G['adminid'] == 3)) {
			$actionnum = C::t('#discuz_security#discuz_security_manager_action')->count_per_hour_manager($_G['uid'], 'edit');
			$latesttime = C::t('#discuz_security#discuz_security_manager_action')->fetch_latesttime($_G['uid']);
			$latesttime = intval($latesttime['recdateline']);
			//var_dump($actionnum);exit;
			if(($actionnum >= $_G['cache']['plugin']['discuz_security']['maxaction']) && ((TIMESTAMP - $latesttime) > 1800)) {
	
				$tid = $_G['thread']['tid'];
				dheader("Location: plugin.php?tid={$tid}&id=discuz_security:content_seccode");
			} else {
				if(submitcheck('editsubmit')) {
				C::t('#discuz_security#discuz_security_manager_action')->useractionlog($_G['uid'], $_GET['action'], TIMESTAMP, '');
				}
			}
		}	
	}

	//快速发主题帖监控
	public function forumdisplay() {
		global $_G;
		$usernum = C::t('common_member_action_log')->count_per_hour($_G['uid'], "thread");
		if($_G['setting']['maxthreadsperhour']) {

		} else {
			if($usernum >= $_G['cache']['plugin']['discuz_security']['maxthread']) {
				$this->write_content_check_log($_G['uid'], $_G['clientip']);
				$_G['setting']['seccodestatus']  = pow(2,11) - 1;
			}
		}
	}
	
	public function write_content_check_log($uid, $ip) {
		global $_G;
		$uid = dintval($uid);
		if(empty($uid) || empty($ip)) {
			showmessage("no uid");
		}
		
		if($result = DB::fetch_first("SELECT uid FROM " . DB::table('discuz_security_forum') . " WHERE username = '$_G[username]'")) {
			C::t('#discuz_security#discuz_security_forum')->update($uid, $_G['username'], $ip);
		} else {
			C::t('#discuz_security#discuz_security_forum')->insert($uid, $_G['username'], $ip);
		}
	}

}

?>
