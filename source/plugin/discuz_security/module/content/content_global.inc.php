<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: content_global.inc.php 209 2013-05-29 09:31:39Z qingrongfu $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

$limit = 20;
$page = dintval($_GET['page']) ? dintval($_GET['page']) : 1;
$orderby = 'dateline';

$mes = $csslang['content_gtips'];//技巧提示内容
showtips('', $id = 'tips', $display = TRUE, $mes);
if(submitcheck('content_delete') && !empty($_POST['d_content_delete'])) {
	if(C::t('#discuz_security#discuz_security_forum')->delete_by_uid($_POST['d_content_delete'])) {
		adminlog('PTMZT', count($_POST['d_content_delete']));
		cpmsg($csslang['content_delete_success'], $msgbaseurl.$pageadd, 'succeed');
	}
	cpmsg($csslang['content_delete_failed'], $msgbaseurl.$pageadd, 'error');
} 
showformheader(PARAM_URL.'&cp=content_global','submit');
showtableheader();
	showtablerow('class="header"', array('class="td23"','class="td23"','class="td23"','class="td24"', ''), array(
		'',
		$csslang['content_uid'],
		$csslang['content_username'],
		$csslang['content_dateline'],
		$csslang['content_ip'],
	));

	$content_list = C::t('#discuz_security#discuz_security_forum')->fetch(($_GET['page'] - 1) * $limit, $limit, $orderby);
	foreach($content_list as $content_global) {
		$content_global['dateline'] = dgmdate($content_global['dateline'], 'Y-n-j H:i');
		showtablerow('', array('class="td23"','class="td23"','class="td24"', ''), array(
			"<input class=\"checkbox\" type=\"checkbox\" name=\"d_content_delete[]\" value=\"$content_global[uid]\">",
			$content_global['uid'],
			$content_global['username'],
			$content_global['dateline'],
			$content_global['lastip'],
		));
	}

	$multipage = multi(C::t('#discuz_security#discuz_security_forum')->count(), $limit, $page, DS_URL.'&cp=content_global');
	showsubmit('', '', '', 
		'<input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'delete\')" /><label for="chkall">'.$csslang['content_selectall'].'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
		'<input type="submit" class="btn" name="content_delete" value="'.$csslang['content_delete'].'" />');
showtablefooter();
showformfooter();
echo $multipage;
?>