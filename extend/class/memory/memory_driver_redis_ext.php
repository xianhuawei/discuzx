<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: memory_driver_redis.php 33337 2013-05-29 02:23:47Z andyzheng $
 */

class memory_driver_redis_ext extends memory_driver_redis
{
	function lPush($key, $value) {
		return $this->obj->lPush($key, $value);
	}

	function brPop($key, $ttl = 0) {
		return $this->obj->brPop($key, $ttl);
	}
}

?>
