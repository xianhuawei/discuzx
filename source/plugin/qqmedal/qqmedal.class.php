<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_qqmedal {

    function global_footer() {
        global $_G;

		$qqmedal = unserialize($_G['setting']['qqmedal']);
		
        if (!$_G['setting']['connect']['allow'] || $_G['cookie']['has_qqmedal'] == 1 || !$_G['cookie']['client_created'] || (time() - $_G['cookie']['client_created'] > 60) && $_G['cookie']['client_created'] || !empty($_G['inajax']) || !empty($_G['inshowmessage']) || !$_G['uid'] || !$_G['member']['conisbind'] || !$qqmedal['allowed']) {
            return;
        }

        $mid = $_G['setting']['qqmedalid'];
        if (!$mid) {
            return;
        }
		// 判断勋章是否可用
		$medal = C::t('forum_medal')->fetch_all_by_id($mid);
		$available = $medal[0]['available'];
		if (!$available) {
			return;
		}

		if(C::t('common_member_medal')->count_by_uid_medalid($_G['uid'], $mid)) {
			$cookie_expires = 2592000;
            dsetcookie('has_qqmedal', 1, $cookie_expires);
        } elseif ($_G['cookie']['has_qqmedal'] == 2) {
			// 待发状态奖励勋章
			$result = C::t('common_member_field_forum')->fetch($_G['uid']);
			$medals = $result['medals'];
			$medalsnew = $medals ? $mid . "\t" . $medals : $mid;

			C::t('common_member_field_forum')->update($_G['uid'], array('medals' => $medalsnew));
			C::t('common_member_medal')->insert(array('uid' => $_G['uid'], 'medalid' => $mid), 0, 1);
			
			C::t('forum_medallog')->insert(array(
				'uid' => $_G['uid'],
				'medalid' => $mid,
				'type' => 0,
				'dateline' => TIMESTAMP,
				'expiration' => '',
				'status' => 0,
			));
			

			$cookie_expires = 2592000;
			dsetcookie('has_qqmedal', 1, $cookie_expires);
		} else {
			return '<link rel="stylesheet" type="text/css" href="source/plugin/qqmedal/template/qqmedal.css" /><script>showWindow(\'open_medal\', \'plugin.php?id=qqmedal:medal\');</script>';
		}
	}
}

?>