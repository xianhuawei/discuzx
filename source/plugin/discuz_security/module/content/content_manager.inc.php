<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: content_manager.inc.php 209 2013-05-29 09:31:39Z qingrongfu $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

$limit = 20;
$page = dintval($_GET['page']) ? dintval($_GET['page']) : 1;
$orderby = 'dateline';

$mes = $csslang['content_mtips'];//技巧提示内容
showtips('', $id = 'tips', $display = TRUE, $mes);
if(submitcheck('content_delete') && !empty($_POST['d_content_delete'])) {
	if(C::t('#discuz_security#discuz_security_manager_action')->delete_by_uid($_POST['d_content_delete'])) {
		adminlog('ATMZT', count($_POST['d_content_delete']));
		cpmsg($csslang['content_delete_success'], $msgbaseurl.$pageadd, 'succeed');
	}
	cpmsg($csslang['content_delete_failed'], $msgbaseurl.$pageadd, 'error');
}
showformheader(PARAM_URL.'&cp=content_manager','submit');
showtableheader();
	showtablerow('class="header"', array('class="td23"','class="td23"','class="td23"','class="td24"', ''), array(
		'',
		$csslang['content_uid'],
		$csslang['content_username'],
		$csslang['content_dateline'],
		'',
	));

	$content_list = C::t('#discuz_security#discuz_security_manager_action')->fetch(($_GET['page'] - 1) * $limit, $limit, $orderby);
	
	foreach($content_list as $content_manager) {
		$content_manager['dateline'] = dgmdate($content_manager['dateline'], 'Y-n-j H:i');
		showtablerow('', array('class="td23"','class="td23"','class="td24"', ''), array(
			"<input class=\"checkbox\" type=\"checkbox\" name=\"d_content_delete[]\" value=\"$content_manager[uid]\">",
			$content_manager['uid'],
			$content_manager['username'],
			$content_manager['dateline'],
			'',
		));
	}
	$multipage = multi(C::t('#discuz_security#discuz_security_manager_action')->count(), $limit, $page, DS_URL.'&cp=content_manager');
	showsubmit('', '', '', 
		'<input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'delete\')" /><label for="chkall">'.$csslang['content_selectall'].'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
		'<input type="submit" class="btn" name="content_delete" value="'.$csslang['content_delete'].'" />');
showtablefooter();
showformfooter();
echo $multipage;
?>