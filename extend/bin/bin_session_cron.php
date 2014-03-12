<?php
/*
 *      $Id: 2013/9/12 11:15:08 bin_session_cron.php Luca Shin $
 */

(function_exists('ini_set') && ini_set('default_socket_timeout', -1)) || exit('Function \'ini_set\' shouldn\'t be forbindden!!');
define('IN_DISCUZ', true);
error_reporting(E_ERROR);
require '../../config/config_global.php';

try {
	if(!($rds = new Redis())) throw new RedisException("No Redis Extension Loaded!\n");
	if(!$rds->pconnect($_config['memory']['redis']['server'], $_config['memory']['redis']['port'])) throw new RedisException("Please check config file!\n");
} catch(RedisException $e) {
	exit($e->getMessage());
}

echo "DISCUZX! session_cron job START!\n";

try {
	while(1) {
		$ts = microtime(true);
		$invisible0 = $invisible1 = $count1 = $count2 = $count0 = 0;
		$fidct = array();	
		$keys = $rds->keys("sR:s_*");
		if(!empty($keys) && is_array($keys)) {
			foreach($keys as $v) {
				$data = $rds->hGetAll($v);
				$onlinehold = time() - 900;
				if($data['lastactivity'] < $onlinehold) $rds->delete($v);
				if($data['invisible'] == 0) $invisible0 ++;
				if($data['invisible'] == 1) $invisible1 ++;
				if($data['uid'] == 0) $count2 ++;
				if($data['uid'] > 0) $count1 ++;
				$count0 ++;
				if($data['fid'] != 0) $fidct[$data['fid']] ++;
				usleep(500);
			}
		}
		$rt = array(
			'c_i_t0' => $invisible0,
			'c_i_t1' => $invisible1,
			'c_t1' => $count1,
			'c_t2' => $count2,
			'c_t0' => $count0,
			'c_b_f' => serialize($fidct),
		);	
		$rds->hMset('sR:status', $rt);
		
		$break = microtime(true) - $ts;
		echo date(DATE_ATOM)." exectime:$break s\n"; 
		sleep(5);		
	}
} catch(RedisException $e) {
	exit("You have to unforbindden function 'ini_set'!\n ");
}
