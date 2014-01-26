<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sys_checkdir.php 205 2013-05-29 08:16:16Z qingrongfu $
 */

adminlog('CKDIR');
switch (check_dir()) {
	case 0:
		$msg = $csslang['sys_dir_io_error'];
		break;
	case 1:
		$msg = $csslang['sys_dir_can_read'];
		break;
	case 2:
		$msg = $csslang['sys_dir_cant_read'];
		break;
	default:
		$msg = '';
}
cpmsg($msg);

?>