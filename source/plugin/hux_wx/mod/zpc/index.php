<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/zpc/lang/lang.'.currentlang().'.php';
if ($binded) {
	$zjquery = C::t('#hux_wx#hux_wx_userjp')->fetch_all_by_search(" AND uid='".intval($binded['uid'])."' AND state='0'",'ORDER BY dateline DESC',1,0,10);
	if ($zjquery) {
		$string = $zpclang['checkzjlist']."\n";
		foreach ($zjquery as $v) {
			$string .= $v['name']."(".dgmdate($v['dateline']).")\n";
		}
	} else {
		$string = $zpclang['checkzjlistno'];
	}
} else {
	$string = lang('plugin/hux_wx','tobind');
}
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>