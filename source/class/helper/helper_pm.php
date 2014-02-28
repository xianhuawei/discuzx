<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: helper_pm.php 31440 2012-08-28 07:22:57Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class helper_pm {


	/**
	* 发送短消息（兼容提醒）
	* @param $toid - 接收方id
	* @param $subject - 标题
	* @param $message - 内容
	* @param $fromid - 发送方id
	*/
	public static function sendpm($toid, $subject, $message, $fromid = '', $replypmid = 0, $isusername = 0, $type = 0) {
		global $_G;
		if($fromid === '') {
			$fromid = $_G['uid'];
		}
		$author = '';
		if($fromid) {
			if($fromid == $_G['uid']) {
				$sendpmmaxnum = $_G['group']['allowsendpmmaxnum'];
				$author = $_G['username'];
			} else {
				$user = getuserbyuid($fromid);
				$author = $user['username'];
				loadcache('usergroup_'.$user['groupid']);
				$sendpmmaxnum = $_G['cache']['usergroup_'.$user['groupid']]['allowsendpmmaxnum'];
			}
			$currentnum = C::t('common_member_action_log')->count_day_hours(getuseraction('pmid'), $fromid);
			if($sendpmmaxnum && $currentnum >= $sendpmmaxnum) {
				return -16;//note 超过用户组设置的最大发短消息上限
			}
		}

		loaducenter();
		$return = uc_pm_send($fromid, $toid, addslashes($subject), addslashes($message), 1, $replypmid, $isusername, $type);
		if($return > 0 && $fromid) {
			//单个发送的上报消息中心
			//本地反查UID
			if($_G['setting']['cloud_status']) {
				$msgService = Cloud::loadClass('Cloud_Service_Client_Message');
				if(is_numeric($toid)) {
					$msgService->add($toid, $fromid, $author, $_G['timestamp']);
				} else {
					$senduids = array();
					foreach(C::t('common_member')->fetch_all_by_username(explode(',', $toid)) as $touser) {
						$senduids[$touser['uid']] = $touser['uid'];
					}
					if($senduids) {
						$msgService->add($senduids, $fromid, $author, $_G['timestamp']);
					}
				}


			}
			foreach(explode(',', $fromid) as $v) {
				useractionlog($fromid, 'pmid');
			}
		}

		return $return;
	}
}

?>