<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_custom.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'custom_name' => 'Tùy chọn',
	'custom_desc' => 'Hỗ trợ mã HTML<br /><br />
		<a href="javascript:;" onclick="prompt(\'Nhấn CTR + C để sao chép\', \'<!--{ad/custom_'.$_GET['customid'].'}-->\')" />nội bộ cuộc gọi</a>&nbsp;
		<a href="javascript:;" onclick="prompt(\'Nhấn CTR + C để sao chép\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_GET['customid'].'\\\'&gt;&lt;/script&gt;\')" />bên ngoài cuộc gọi</a>',
	'custom_id_notfound' => 'Quảng cáo không tồn tại',
	'custom_codelink' => 'Code Nội bộ',
	'custom_text' => 'Mã tùy chọn',
);

?>