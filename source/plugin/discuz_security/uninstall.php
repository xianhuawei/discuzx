<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: uninstall.php 125 2013-05-13 08:59:41Z vinsonbwang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE cdb_plugin_discuz_security_banip;
DROP TABLE cdb_plugin_discuz_security_forum;
DROP TABLE cdb_plugin_discuz_security_manager_action;

EOF;
runquery($sql);


$finish = TRUE;
