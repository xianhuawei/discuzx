<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class DR extends discuz_redis{}

if(DISCUZ_REDIS) {
	global $_G;
	DR::init($_G['config']['discuz_redis']);
}