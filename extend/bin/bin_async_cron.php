<?php
/*
 *      $Id: 2013/7/22 11:15:54 bin_async_cron.php Luca Shin $
 */

(function_exists('ini_set') && ini_set('default_socket_timeout', -1)) || exit('Function \'ini_set\' shouldn\'t be forbindden!!');
define('IN_DISCUZ', true);
error_reporting(E_ERROR);
require '../../config/config_global.php';
require '../../source/function/function_filesock.php';

try {
	if(!($rds = new Redis())) throw new RedisException("No Redis Extension Loaded!\n");
	if(!$rds->pconnect($_config['memory']['redis']['server'], $_config['memory']['redis']['port'], 0)) throw new RedisException("Please check config file!\n");
} catch(RedisException $e) {
	exit($e->getMessage());
}

echo "==============================\n";
echo "DISCUZX! async_cron job START!\n";
echo "==============================\n";

$key = "dz_asy_cron";
try {
	while(list(,$task) = $rds->brPop($key, 0)) {
		list($url, $postString) = unserialize($task);
		$return = unserialize(_dfsockopen($url, 4096, $postString, '', false, '', 5));
		if($return['errCode'] == 0) {
			echo date(DATE_ATOM)." >>Success! Return:".implode(' + ', $return)."!The list remain ".$rds->llen($key)." tasks!\n";
		} else {
			$rds->lPush($key, $task);
			echo date(DATE_ATOM)." 2>>failed! Return:".implode(' + ', $return)." This task has been add to the end of the list!\n";
		}
	}
} catch(Exception $e) {
	echo $e->getMessage()."\n";
	exit("You have to unforbindden function 'ini_set'!\n ");
}
