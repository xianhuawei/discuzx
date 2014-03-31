<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_custom.php 15100 2010-08-19 02:51:15Z zhaoxiongfei $
 */

$lang = array
(
	'custom_name' => 'Tùy chọn',
	'custom_desc' => 'Bằng cách sử dụng mã HTML bạn có thể thêm quảng cáo vào bất cứ đâu<br /><br />
		<a href="javascript:;" onclick="prompt(\'Sao chép(CTRL+C)và thêm dòng sau vào mẫu, thêm quảng cáo\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Gọi nội bộ</a>&nbsp;
		<a href="javascript:;" onclick="prompt(\'Sao chép(CTRL+C)và thêm dòng sau vào tập tin HTML, thêm quảng cáo\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Gọi bên ngoài</a>',
	'custom_id_notfound' => 'Quảng cáo không tồn tại',
	'custom_codelink' => 'Code Nội bộ',
	'custom_text' => 'Mã tùy chọn',
);

?>