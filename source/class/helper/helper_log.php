<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: helper_log.php 28822 2012-03-14 06:35:55Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 * Description of helper_log
 *
 * @author zhangguosheng
 */
class helper_log {

	/*
	 * 运行log记录
	 */
	public static function runlog($file, $message, $halt=0) {
		global $_G;

		$nowurl = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
		$log = dgmdate($_G['timestamp'], 'Y-m-d H:i:s')."\t".$_G['clientip']."\t$_G[uid]\t{$nowurl}\t".str_replace(array("\r", "\n"), array(' ', ' '), trim($message))."\n";
		helper_log::writelog($file, $log);
		if($halt) {
			exit();
		}
	}


	/**
	 * 写入运行日志
	 */
	public static function writelog($file, $log) {
		global $_G;
		$yearmonth = dgmdate(TIMESTAMP, 'Ym', $_G['setting']['timeoffset']);
		$logdir = DISCUZ_ROOT.'./data/log/';
		$logfile = $logdir.$yearmonth.'_'.$file.'.php';
		if(@filesize($logfile) > 2048000) {
			$dir = opendir($logdir);
			$length = strlen($file);
			$maxid = $id = 0;
			while($entry = readdir($dir)) {
				if(strpos($entry, $yearmonth.'_'.$file) !== false) {
					$id = intval(substr($entry, $length + 8, -4));
					$id > $maxid && $maxid = $id;
				}
			}
			closedir($dir);

			$logfilebak = $logdir.$yearmonth.'_'.$file.'_'.($maxid + 1).'.php';
			@rename($logfile, $logfilebak);
		}
		if($fp = @fopen($logfile, 'a')) {
			@flock($fp, 2);
			if(!is_array($log)) {
				$log = array($log);
			}
			foreach($log as $tmp) {
				fwrite($fp, "<?PHP exit;?>\t".str_replace(array('<?', '?>'), '', $tmp)."\n");
			}
			fclose($fp);
		}
	}


	/**
	 * 用户操作日志
	 * @param int $uid 用户ID
	 * @param string $action 操作类型 tid=thread pid=post blogid=blog picid=picture doid=doing sid=share aid=article uid_cid/blogid_cid/sid_cid/picid_cid/aid_cid/topicid_cid=comment
	 * @return bool
	 */
	public static function useractionlog($uid, $action) {
		$uid = intval($uid);
		if(empty($uid) || empty($action)) {
			return false;
		}
		$action = getuseraction($action);
		C::t('common_member_action_log')->insert(array('uid' => $uid, 'action' => $action, 'dateline' => TIMESTAMP));
		return true;
	}

	/**
	 * 得到用户操作的代码或代表字符，参数为数字返回字符串，参数为字符串返回数字
	 * @param string/int $var
	 * @return int/string 注意：如果失败返回false，请使用===判断，因为代码0代表tid
	 */
	public static function getuseraction($var) {
		$value = false;
		//操作代码
		$ops = array('tid', 'pid', 'blogid', 'picid', 'doid', 'sid', 'aid', 'uid_cid', 'blogid_cid', 'sid_cid', 'picid_cid', 'aid_cid', 'topicid_cid', 'pmid');
		if(is_numeric($var)) {
			$value = isset($ops[$var]) ? $ops[$var] : false;
		} else {
			$value = array_search($var, $ops);
		}
		return $value;
	}

}

?>