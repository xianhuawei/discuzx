<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: account.inc.php 199 2013-05-29 02:46:11Z lucashen $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/discuz_security/common.inc.php'; 

cpheader();
$limit = 50;
$page = empty($_GET['page']) ? 1 : intval($_GET['page']);
$baseurl = "plugins&operation=$operation&do=$do&identifier=$identifier&pmod=$pmod";
$msgbaseurl = "action=$baseurl";
$fullbaseurl = ADMINSCRIPT.'?'.$msgbaseurl;
$orderby = $_GET['orderby'] && in_array($_GET['orderby'], array('count', 'lastupdate')) ? $_GET['orderby'] : '';

if(empty($operation) || $operation == 'config') {
	$urladd = $orderby == '' ? '' : '&orderby='.$orderby;
	$pageadd = $urladd.'&page='.$page;
	showcssmenus(lang('plugin/discuz_security', 'account_manage'), array(
		array(
			array(
				'menu' => lang('plugin/discuz_security', 'account_manage'), 
				'submenu' => array(
						array(lang('plugin/discuz_security', 'baniplist'), $baseurl),
//						array(lang('plugin/discuz_security', 'unsetting_adm'), $baseurl),
					),
				),
			),
		)
	);
	showtips(lang('plugin/discuz_security', 'banip_tips'));
	if(submitcheck('delipsubmit') && !empty($_POST['delete'])) {
		if(adminlog('IPLOG', C::t('#discuz_security#discuz_security_banip')->sum_by_ip($_POST['delete'])) && C::t('#discuz_security#discuz_security_banip')->delete_by_ip($_POST['delete'])) {
			cpmsg(lang('plugin/discuz_security', 'success'), $msgbaseurl.$pageadd, 'succeed');
		}
		cpmsg(lang('plugin/discuz_security', 'failed'), $msgbaseurl.$pageadd, 'error');
	} elseif(submitcheck('banipsubmit') && !empty($_POST['delete'])) {
		banip($_POST['delete']);
		adminlog('IPLOG', C::t('#discuz_security#discuz_security_banip')->sum_by_ip($_POST['delete']));
		C::t('#discuz_security#discuz_security_banip')->delete_by_ip($_POST['delete']);
		cpmsg(lang('plugin/discuz_security', 'success'), $msgbaseurl.$pageadd, 'succeed');
	} elseif(submitcheck('banipsegsubmit') && !empty($_POST['delete'])) {
		banip($_POST['delete'], true);
		adminlog('IPLOG', C::t('#discuz_security#discuz_security_banip')->sum_by_ip($_POST['delete']));
		C::t('#discuz_security#discuz_security_banip')->delete_by_ip($_POST['delete']);
		cpmsg(lang('plugin/discuz_security', 'success'), $msgbaseurl.$pageadd, 'succeed');
	} elseif(submitcheck('trucsubmit')) {
		adminlog('IPLOG', C::t('#discuz_security#discuz_security_banip')->sum_by_ip());
		C::t('#discuz_security#discuz_security_banip')->truncate();
		cpmsg(lang('plugin/discuz_security', 'success'), $msgbaseurl.$pageadd, 'succeed');
	} else {
		showformheader($baseurl.$pageadd);
		showtableheader();
		showsubtitle(array(lang('plugin/discuz_security', 'select'), 'setting_antitheft_ip', 
			'<span class="tab1"><span class="hasdropmenu"><a style="text-align: center;" href="'.$fullbaseurl.'&orderby=count">'.lang('plugin/discuz_security', 'history_count').'<em>&nbsp;&nbsp;</em></a></span></span>', 
			'<span class="tab1"><span class="hasdropmenu"><a style="text-align: center;" href="'.$fullbaseurl.'&orderby=lastupdate">'.lang('plugin/discuz_security', 'last_errorts').'<em>&nbsp;&nbsp;</em></a></span></span>', 
			'ip'));

		$banlist = C::t('#discuz_security#discuz_security_banip')->fetch_range(($page - 1) * $limit, $limit, $orderby);
		foreach ($banlist as $ban) {
			$ban['lastupdate'] = dgmdate($ban['lastupdate'], 'Y-n-j H:i');
			showtablerow('', array('class="td25"', 'class="td28"'), array(
				"<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$ban[ip]\">",
				"<b>{$ban['ip']}</b>",
				$ban['count'],
				$ban['lastupdate'],
				str_replace('-', '', convertip($ban['ip'])),
			));
		}
		$multipage = multi(C::t('#discuz_security#discuz_security_banip')->fetch_count(), $limit, $page, $fullbaseurl.$urladd);
		showsubmit('', '', '', 
			'<input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'delete\')" /><label for="chkall">'.cplang('select_all').'</label>&nbsp;&nbsp;'.
			'<input type="submit" class="btn" name="delipsubmit" value="'.lang('plugin/discuz_security', 'del_select').'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
			'<input type="submit" class="btn" name="banipsubmit" value="'.lang('plugin/discuz_security', 'ban_ip').'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
			'<input type="submit" class="btn" name="banipsegsubmit" value="'.lang('plugin/discuz_security', 'ban_ip_segment').'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
			'<input type="submit" class="btn" name="trucsubmit" value="'.lang('plugin/discuz_security', 'truncate').'" />');

		showtablefooter();
		showformfooter();
		echo $multipage;
	}
}

function banip($ip, $seg = false) {
	global $_G;
	if(empty($ip)) return false;
	if(!is_array($ip)) $ip = array($ip);
	foreach($ip as $banip) {
		if(strpos($banip, ',') !== false) {
			list($banipaddr, $expiration) = explode(',', $banip);
			$expiration = strtotime($expiration);
		} else {
			list($banipaddr, $expiration) = explode(';', $banip);
			$expiration = TIMESTAMP + ($expiration ? $expiration : 30) * 86400;
		}
		if(!trim($banipaddr)) {
			continue;
		}

		$ipnew = explode('.', $banipaddr);
		for($i = 0; $i < 4; $i++) {
			if(strpos($ipnew[$i], '*') !== false) {
				$ipnew[$i] = -1;
			} else {
				$ipnew[$i] = intval($ipnew[$i]);
			}
		}
		if($seg == true) $ipnew[3] = -1;
		$checkexists = C::t('common_banned')->fetch_by_ip($ipnew[0], $ipnew[1], $ipnew[2], $ipnew[3]);
		if($checkexists) {
			continue;
		}

		C::app()->session->update_by_ipban($ipnew[0], $ipnew[1], $ipnew[2], $ipnew[3]);
		$data = array(
			'ip1' => $ipnew[0],
			'ip2' => $ipnew[1],
			'ip3' => $ipnew[2],
			'ip4' => $ipnew[3],
			'admin' => $_G['username'],
			'dateline' => $_G['timestamp'],
			'expiration' => $expiration,
		);
		C::t('common_banned')->insert($data, false, true);
	}

	updatecache('ipbanned');
}
