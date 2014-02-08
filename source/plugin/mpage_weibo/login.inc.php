<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/mpage_weibo/config.php';
require_once DISCUZ_ROOT.'./source/plugin/mpage_weibo/saetv2.ex.class.php';

$o = new SaeTOAuthV2(WB_AKEY, WB_SKEY);
$code_url = $o->getAuthorizeURL(WB_CALLBACK_URL);

dheader("Location: $code_url");

?>