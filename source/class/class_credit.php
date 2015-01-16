<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_credit.php 32967 2013-03-28 10:57:48Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class credit {

	var $checklowerlimit = true;	//是否更新积分
	var $coef = 1;	//规则倍数，解决上次附件一次多个附件问题
	var $extrasql = array();

	function credit() {}

	function &instance() {
		static $object;
		if(empty($object)) {
			$object = new credit();
		}
		return $object;
	}

	/**
	 * 执行积分规则
	 * @param String $action:  规则action名称
	 * @param Integer $uid: 操作用户
	 * @param String $needle: 防重字符串
	 * @param Integer $coef: 积分放大倍数
	 * @param Integer $update: 是否执行更新操作
	 * @param Integer $fid: 版块ID
	 * @return 返回积分策略
	 */
	function execrule($action, $uid = 0, $needle = '', $coef = 1, $update = 1, $fid = 0) {
		global $_G;

		$this->coef = $coef;
		$uid = intval($uid ? $uid : $_G['uid']);
		$fid = $fid ? $fid : (isset($_G['fid']) && $_G['fid'] ? $_G['fid'] : 0);
		$rule = $this->getrule($action, $fid);
		$updatecredit = false;

		$enabled = false;
		if($rule) {
			for ($i = 1; $i<=8; $i++) {
				if(!empty($rule['extcredits'.$i])) {
					$enabled = true; break;
				}
			}
		}

		//有积分再进行规则操作，否则不做任何处理
		if($enabled) {
			$rulelog = array();
			//校验是否存在版块定制，如果不存在则走默认，$fid无效
			$fids = $rule['fids'] ? explode(',', $rule['fids']) : array();
			$fid = in_array($fid, $fids) ? $fid : 0;
			$rulelog = $this->getrulelog($rule['rid'], $uid, $fid);
			if($rulelog && $rule['norepeat']) {
				$rulelog = array_merge($rulelog, $this->getchecklogbyclid($rulelog['clid'], $uid));
				$rulelog['norepeat'] = $rule['norepeat'];
			}
			if($rule['rewardnum'] && $rule['rewardnum'] < $coef) {
				$coef = $rule['rewardnum'];
			}
			//第一次执行相关策略
			if(empty($rulelog)) {
				$logarr = array(
					'uid' => $uid,
					'rid' => $rule['rid'],
					'fid' => $fid,
					'total' => $coef,
					'cyclenum' => $coef,
					'dateline' => $_G['timestamp']
				);

				if(in_array($rule['cycletype'], array(2,3))) {
					$logarr['starttime'] = $_G['timestamp'];
				}
				$logarr = $this->addlogarr($logarr, $rule, false);
				if($update) {
					$clid = C::t('common_credit_rule_log')->insert($logarr, 1);
					//判断是否需要去重
					if($rule['norepeat']) {
						$rulelog['isnew'] = 1;
						$rulelog['clid'] = $clid;
						$rulelog['uid'] = $uid;
						$rulelog['norepeat'] = $rule['norepeat'];
						$this->updatecheating($rulelog, $needle, true);
					}
				}
				$updatecredit = true;
			} else {

				$newcycle = false;
				$logarr = array();
				switch($rule['cycletype']) {
					case 0:		//一次性奖励
						break;
					case 1:		//每天限次数
					case 4:		//不限周期
						if($rule['cycletype'] == 1) {
							$today = strtotime(dgmdate($_G['timestamp'], 'Y-m-d'));
							//判断是否为昨天
							if($rulelog['dateline'] < $today && $rule['rewardnum']) {
								$rulelog['cyclenum'] =  0;
								$newcycle = true;
							}
						}
						if(empty($rule['rewardnum']) || $rulelog['cyclenum'] < $rule['rewardnum']) {
							//验证是否为需要去重操作
							if($rule['norepeat']) {
								$repeat = $this->checkcheating($rulelog, $needle, $rule['norepeat']);
								if($repeat && !$newcycle) {
									return false;
								}
							}
							if($rule['rewardnum']) {
								$remain = $rule['rewardnum'] - $rulelog['cyclenum'];
								if($remain < $coef) {
									$coef = $remain;
								}
							}
							$cyclenunm = $newcycle ? $coef : "cyclenum+'$coef'";
							//更新次数
							$logarr = array(
								'cyclenum' => "cyclenum=$cyclenunm",
								'total' => "total=total+'$coef'",
								'dateline' => "dateline='$_G[timestamp]'"
							);
							$updatecredit = true;
						}
						break;

					case 2:		//整点
					case 3:		//间隔分钟
						$nextcycle = 0;
						if($rulelog['starttime']) {
							if($rule['cycletype'] == 2) {
								//上一次执行时间
								$start = strtotime(dgmdate($rulelog['starttime'], 'Y-m-d H:00:00'));
								$nextcycle = $start+$rule['cycletime']*3600;
							} else {
								$nextcycle = $rulelog['starttime']+$rule['cycletime']*60;
							}
						}
						if($_G['timestamp'] <= $nextcycle && $rulelog['cyclenum'] < $rule['rewardnum']) {
							//验证是否为需要去重操作
							if($rule['norepeat']) {
								$repeat = $this->checkcheating($rulelog, $needle, $rule['norepeat']);
								if($repeat && !$newcycle) {
									return false;
								}
							}
							//计算剩用奖励次数缩小放大倍数
							if($rule['rewardnum']) {
								$remain = $rule['rewardnum'] - $rulelog['cyclenum'];
								if($remain < $coef) {
									$coef = $remain;
								}
							}
							$logarr = array(
								'cyclenum' => "cyclenum=cyclenum+'$coef'",
								'total' => "total=total+'$coef'",
								'dateline' => "dateline='$_G[timestamp]'"
							);
							$updatecredit = true;
						} elseif($_G['timestamp'] >= $nextcycle) {
							$newcycle = true;
							$logarr = array(
								'cyclenum' => "cyclenum=$coef",
								'total' => "total=total+'$coef'",
								'dateline' => "dateline='$_G[timestamp]'",
								'starttime' => "starttime='$_G[timestamp]'",
							);
							$updatecredit = true;
						}
						break;
				}
				//记录操作历史
				if($update) {
					if($rule['norepeat'] && $needle) {
						$this->updatecheating($rulelog, $needle, $newcycle);
					}
					if($logarr) {
						$logarr = $this->addlogarr($logarr, $rule, true);
						C::t('common_credit_rule_log')->increase($rulelog['clid'], $logarr);
					}
				}

			}

		}
		//执行积分更新操作
		if($update && ($updatecredit || $this->extrasql)) {
			//当不更新积分时清空所有积分规则值
			if(!$updatecredit) {
				for($i = 1; $i <= 8; $i++) {
					if(isset($_G['setting']['extcredits'][$i])) {
						$rule['extcredits'.$i] = 0;
					}
				}
			}
			$this->updatecreditbyrule($rule, $uid, $coef, $fid);
		}
		$rule['updatecredit'] = $updatecredit;

		return $rule;
	}

	/**
	 * 验证积分下限
	 * @param array $rule: 允许直接传规则数组例：(array('extcredits1' => 1))或者动作标识符
	 * @param Integer $uid: 用户UID
	 * @param Integer $coef: 积分放大倍数
	 * @return 返回true或-1~-8标记哪个积分出错
	 */
	function lowerlimit($rule, $uid = 0, $coef = 1, $fid = 0) {
		global $_G;

		$uid = $uid ? $uid : intval($_G['uid']);
		if($this->checklowerlimit && $uid && $_G['setting']['creditspolicy']['lowerlimit']) {
			$member = C::t('common_member_count')->fetch($uid);
			$fid = $fid ? $fid : (isset($_G['fid']) && $_G['fid'] ? $_G['fid'] : 0);
			$rule = is_array($rule) ? $rule : $this->getrule($rule, $fid);
			for($i = 1; $i <= 8; $i++) {
				if($_G['setting']['extcredits'][$i] && $rule['extcredits'.$i]) {
					$limit = (float)$_G['setting']['creditspolicy']['lowerlimit'][$i];
					$extcredit = (float)$rule['extcredits'.$i] * $coef;
					if($extcredit < 0 && ($member['extcredits'.$i] + $extcredit) < $limit) {
						return $i;	//负数，$i代表第几个积分
					}
				}
			}
		}
		return true;
	}

	/**
	 * 根据策略操作扩展积分
	 * @param Array $rule: 积分规则
	 * @param Integer $uids: 用户uid或者uid数组
	 * @param Integer $coef: 积分放大倍数
	 * @param Integer $fid: 论坛版块ID
	 */
	function updatecreditbyrule($rule, $uids = 0, $coef = 1, $fid = 0) {
		global $_G;

		$this->coef = intval($coef);
		$fid = $fid ? $fid : (isset($_G['fid']) && $_G['fid'] ? $_G['fid'] : 0);
		$uids = $uids ? $uids : intval($_G['uid']);
		$rule = is_array($rule) ? $rule : $this->getrule($rule, $fid);
		$creditarr = array();
		$updatecredit = false;
		for($i = 1; $i <= 8; $i++) {
			if(isset($_G['setting']['extcredits'][$i])) {
				$creditarr['extcredits'.$i] = intval($rule['extcredits'.$i]) * $this->coef;
				if(defined('IN_MOBILE') && $creditarr['extcredits'.$i] > 0) {
					$creditarr['extcredits'.$i] += $_G['setting']['creditspolicymobile'];
				}
				$updatecredit = true;
			}
		}
		if($updatecredit || $this->extrasql) {
			$this->updatemembercount($creditarr, $uids, is_array($uids) ? false : true, $this->coef > 0 ? urldecode($rule['rulenameuni']) : '');
		}
	}

	/**
	 * 更新积分
	 * @param String $creditarr: 积分数组例: array('extcredits1' => '1')
	 * @param Integer $uid: 用户uid或者uid数组
	 * @param Boolean $checkgroup: 是否检查用户组 true or false
	 * @param String $ruletxt: 积分规则文本
	 */
	function updatemembercount($creditarr, $uids = 0, $checkgroup = true, $ruletxt = '') {
		global $_G;

		if(!$uids) $uids = intval($_G['uid']);
		$uids = is_array($uids) ? $uids : array($uids);
		if($uids && ($creditarr || $this->extrasql)) {
			if($this->extrasql) $creditarr = array_merge($creditarr, $this->extrasql);
			$sql = array();
			$allowkey = array('extcredits1', 'extcredits2', 'extcredits3', 'extcredits4', 'extcredits5', 'extcredits6', 'extcredits7', 'extcredits8', 'friends', 'posts', 'threads', 'oltime', 'digestposts', 'doings', 'blogs', 'albums', 'sharings', 'attachsize', 'views', 'todayattachs', 'todayattachsize');
			$creditnotice = $_G['setting']['creditnotice'] && $_G['uid'] && $uids == array($_G['uid']);
			if($creditnotice) {
				if(!isset($_G['cookiecredits'])) {
					$_G['cookiecredits'] = !empty($_COOKIE['creditnotice']) ? explode('D', $_COOKIE['creditnotice']) : array_fill(0, 9, 0);
					for($i = 1; $i <= 8; $i++) {
						$_G['cookiecreditsbase'][$i] = getuserprofile('extcredits'.$i);
					}
				}
				if($ruletxt) {
					$_G['cookiecreditsrule'][$ruletxt] = $ruletxt;
				}
			}
			foreach($creditarr as $key => $value) {
				if(!empty($key) && $value && in_array($key, $allowkey)) {
					$sql[$key] = $value;
					if($creditnotice && substr($key, 0, 10) == 'extcredits') {
						$i = substr($key, 10);
						$_G['cookiecredits'][$i] += $value;
					}
				}
			}
			if($creditnotice) {
				dsetcookie('creditnotice', implode('D', $_G['cookiecredits']).'D'.$_G['uid']);
				dsetcookie('creditbase', '0D'.implode('D', $_G['cookiecreditsbase']));
				if(!empty($_G['cookiecreditsrule'])) {
					dsetcookie('creditrule', strip_tags(implode("\t", $_G['cookiecreditsrule'])));
				}
			}
			if($sql) {
				C::t('common_member_count')->increase($uids, $sql);
			}
			if($checkgroup && count($uids) == 1) $this->checkusergroup($uids[0]);
			$this->extrasql = array();
		}
	}

	/**
	 * 计算总积分
	 * @param Integer $uid: 用户UID
	 * @param Boolean $update: 更新总积分 true or false
	 */
	function countcredit($uid, $update = true) {
		global $_G;

		$credits = 0;
		if($uid && !empty($_G['setting']['creditsformula'])) {
			$member = C::t('common_member_count')->fetch($uid);
			eval("\$credits = round(".$_G['setting']['creditsformula'].");");
			if($uid == $_G['uid']) {
				if($update && $_G['member']['credits'] != $credits) {
					C::t('common_member')->update_credits($uid, $credits);
					$_G['member']['credits'] = $credits;
				}
			} elseif($update) {
				C::t('common_member')->update_credits($uid, $credits);
			}
		}
		return $credits;
	}

	/**
	 * 验证用户组是否需要升级操作
	 * @param Integer $uid: 用户UID
	 * @return 返回用户组ID
	 */
	function checkusergroup($uid) {
		global $_G;

		$uid = intval($uid ? $uid : $_G['uid']);
		$groupid = 0;
		if(!$uid) return $groupid;
		if($uid != $_G['uid']) {
			$member = getuserbyuid($uid);
		} else {
			$member = $_G['member'];
		}
		if(empty($member)) return $groupid;

		$credits = $this->countcredit($uid, false);
		$updatearray = array();
		$groupid = $member['groupid'];
		$group = C::t('common_usergroup')->fetch($member['groupid']);
		//积分不同时修改总积分
		if($member['credits'] != $credits) {
			$updatearray['credits'] = $credits;
			$member['credits'] = $credits;
		}
		$member['credits'] = $member['credits'] == '' ? 0 : $member['credits'] ;
		$sendnotify = false;
		if(empty($group) || $group['type'] == 'member' && !($member['credits'] >= $group['creditshigher'] && $member['credits'] < $group['creditslower'])) {
			$newgroup = C::t('common_usergroup')->fetch_by_credits($member['credits']);
			if(!empty($newgroup)) {
				if($member['groupid'] != $newgroup['groupid']) {
					$updatearray['groupid'] = $groupid = $newgroup['groupid'];
					$sendnotify = true;
				}
			}
		}
		if($updatearray) {
			C::t('common_member')->update($uid, $updatearray);
		}
		if($sendnotify) {
			notification_add($uid, 'system', 'user_usergroup', array('usergroup' => '<a href="home.php?mod=spacecp&ac=credit&op=usergroup">'.$newgroup['grouptitle'].'</a>', 'from_id' => 0, 'from_idtype' => 'changeusergroup'), 1);
		}

		return $groupid;

	}

	/**
	 * 删除论坛自定义积分规则记录，且只能删除每天、 整点、间隔分钟包括不限周期不限次数的
	 * @param String $rid：策略ID
	 * @param Integer $fid：版块ID
	 */
	function deletelogbyfid($rid, $fid) {

		$fid = intval($fid);
		if($rid && $fid) {
			$lids = C::t('common_credit_rule_log')->fetch_ids_by_rid_fid($rid, $fid);
			if($lids) {
				C::t('common_credit_rule_log')->delete($lids);
				C::t('common_credit_rule_log_field')->delete_clid($lids);
			}
		}
	}

	/**
	 * 更新防重记录
	 * @param array $rulelog: 策略日志数组,需在数组中加该策略规则的两项值、isnew标识新策略;norepeat重复类型
	 * @param String $needle: 防重字符串
	 * @param Boolean $newcycle: 标积是否为新周期 true、新执行周期; false、还在执行老周期
	 */
	function updatecheating($rulelog, $needle, $newcycle) {
		if($needle) {
			$logarr = array();
			switch($rulelog['norepeat']) {
				case 0:
					break;
				case 1:		//信息去重
					$info = empty($rulelog['info'])||$newcycle ? $needle : $rulelog['info'].','.$needle;
					$logarr['info'] = addslashes($info);
					break;
				case 2:		//用户去重
					$user = empty($rulelog['user'])||$newcycle ? $needle : $rulelog['user'].','.$needle;
					$logarr['user'] = addslashes($user);
					break;
				case 3:		//应用去重
					$app = empty($rulelog['app'])||$newcycle ? $needle : $rulelog['app'].','.$needle;
					$logarr['app'] = addslashes($app);
				break;
			}
			if($rulelog['isnew']) {
				$logarr['clid'] = $rulelog['clid'];
				$logarr['uid'] = $rulelog['uid'];
				C::t('common_credit_rule_log_field')->insert($logarr);
			} elseif($logarr) {
				C::t('common_credit_rule_log_field')->update($rulelog['uid'], $rulelog['clid'],$logarr);
			}
		}
	}

	/**
	 * 往策略记录数组中增加积分值
	 * @param array $logarr: 策略日志
	 * @param array $rule: 积分策略
	 * @return 返回新策略数组
	 */
	function addlogarr($logarr, $rule, $issql = 0) {
		global $_G;

		for($i = 1; $i <= 8; $i++) {
			if($_G['setting']['extcredits'][$i]) {
				$extcredit = intval($rule['extcredits'.$i]) * $this->coef;
				if($issql) {
					$logarr['extcredits'.$i] = 'extcredits'.$i."='$extcredit'";
				} else {
					$logarr['extcredits'.$i] = $extcredit;
				}
			}
		}
		return $logarr;
	}

	/**
	 * 获取积分规则
	 * @param String $action: 规则action名称
	 * @return 指定action策略数组或者false
	 */
	function getrule($action, $fid = 0) {
		global $_G;

		if(empty($action)) {
			return false;
		}
		$fid = $fid ? $fid : (isset($_G['fid']) && $_G['fid'] ? $_G['fid'] : 0);
		//判断群组的积分设置，如果允许则直接使用全局设置去掉fid
		if($_G['forum'] && $_G['forum']['status'] == 3) {
			$group_creditspolicy = $_G['grouplevels'][$_G['forum']['level']]['creditspolicy'];
			if(is_array($group_creditspolicy) && empty($group_creditspolicy[$action])) {
				return false;
			} else {
				$fid = 0;
			}
		}
		loadcache('creditrule');
		$rule = false;
		if(is_array($_G['cache']['creditrule'][$action])) {
			$rule = $_G['cache']['creditrule'][$action];
			$rulenameuni = $rule['rulenameuni'];
			//获取版块自定义版块策略
			if($rule['fids'] && $fid) {
				$fid = intval($fid);
				$fids = explode(',', $rule['fids']);
				if(in_array($fid, $fids)) {
					$forumfield = C::t('forum_forumfield')->fetch($fid);
					$policy = dunserialize($forumfield['creditspolicy']);
					if(isset($policy[$action])) {
						$rule = $policy[$action];
						$rule['rulenameuni'] = $rulenameuni;
					}
				}
			}

			for($i = 1; $i <= 8; $i++) {
				if(empty($_G['setting']['extcredits'][$i])) {
					unset($rule['extcredits'.$i]);
					continue;
				}
				$rule['extcredits'.$i] = intval($rule['extcredits'.$i]);
			}
		}
		return $rule;
	}

	/**
	 * 获取某一用户指定策略的执行日志
	 * @param Integer $rid: 指定规则的索引ID
	 * @param Integer $uid: 指定用户，如果没有指定uid则取当前用户
	 * @param Integer $fid: 指定版块策略ID
	 * @return 返回指定策略ID
	 */
	function getrulelog($rid, $uid = 0, $fid = 0) {
		global $_G;

		$log = array();
		$uid = $uid ? $uid : $_G['uid'];
		if($rid && $uid) {
			$log = C::t('common_credit_rule_log')->fetch_rule_log($rid, $uid, $fid);
		}
		return $log;
	}

	/**
	 * 验证信息是否重复
	 * @param array $rulelog: 策略日志数组
	 * @param string $needle: 信息字符串，例如日志+ID, blog1
	 * @param Integer $checktype: 需要验证的类型 1、信息去重; 2、用户去重; 3、应用去重
	 * @return true or false
	 */
	function checkcheating($rulelog, $needle, $checktype) {

		$repeat = false;
		switch($checktype) {
			case 0:
				break;
			case 1:		//信息去重
				$infoarr = explode(',', $rulelog['info']);
				if(!empty($rulelog['info']) && in_array($needle, $infoarr)) {
					$repeat = true;
				}
				break;
			case 2:		//用户去重
				$userarr = explode(',', $rulelog['user']);
				if(!empty($rulelog['user']) && in_array($needle, $userarr)) {
					$repeat = true;
				}
				break;
			case 3:		//应用去重
				$apparr = explode(',', $rulelog['app']);
				if(!empty($rulelog['app']) && in_array($needle, $apparr)) {
					$repeat = true;
				}
				break;
		}
		return $repeat;
	}

	/**
	 * 获取用户防重记录
	 * @param Integer $clid：策略日志ID
	 * @param Integer $uid：用户UID、没有指定获取当前用户策略
	 */
	function getchecklogbyclid($clid, $uid = 0) {
		global $_G;

		$uid = $uid ? $uid : $_G['uid'];
		return C::t('common_credit_rule_log_field')->fetch($uid, $clid);
	}
}

?>