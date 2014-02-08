<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./source/plugin/hux_zp/hux_zp.fun.php';
$ac = empty($_GET['ac']) ? '' : $_GET['ac'];
$zpsetting = $_G['cache']['plugin']['hux_zp'];
$loginmsg = lang('message','to_login');
$game_start = '';
$gp = unserialize($zpsetting['gp']);
$paymoney = "extcredits".$zpsetting['money'];
$paymoneyname = $_G['setting']['extcredits'][$zpsetting['money']]['title'];
$mycash = getuserprofile($paymoney);
$actives[$ac] = "class='a'";
$playernum = C::t('#hux_zp#hux_zp_user')->count();
$prize_query = C::t('#hux_zp#hux_zp')->fetch_all();
foreach ($prize_query as $v) {
	$prize_list[] = $v;
}
$show_query = C::t('#hux_zp#hux_zp_userjp')->fetch_all_by_show(1,$zpsetting['shownum']);
foreach ($show_query as $v) {
	$member = C::t('#hux_zp#hux_common_member')->fetch_by_uid($v['uid']);
	$v['username'] = $member['username'];
	$show_list[] = $v;
}
$guize = str_replace("\n","<br>",$zpsetting['info']);
if (!$zpsetting['open']) {
	showmessage($zpsetting['closemsg'],'index.php');
}
if ($ac == 'msg') {
	if (CHARSET != 'utf-8') {
		$_GET['text'] = diconv($_GET['text'],'utf-8',CHARSET);
	}
}
if ($_G['uid']){
	$user = C::t('#hux_zp#hux_zp_user')->fetch_by_uid($_G['uid']);
	if (!$user) {
		$game_start = '2';
	} else {
		if ($mycash < $zpsetting['moneynum']) {
			$game_start = '5';
		} else {
			$game_start = '1';
		}
	}
	
	if ($ac == 'info') {
		$showuid = $_G['uid'];
		if ($_GET['uid']) {
			$showuid = $_GET['uid'];
			if($_G['adminid'] != '1'){
				showmessage('hux_zp:not_allow');
			}
			$user = C::t('#hux_zp#hux_zp_user')->fetch_by_uid($showuid);
		}
		$lianxi = explode('|',$user['info']);
		if(submitcheck('addsubmit')){
			$userinfo = $_GET['lianxia']."|".$_GET['lianxib']."|".$_GET['lianxic']."|".$_GET['lianxid']."|".$_GET['lianxie']."|".$_GET['lianxif'];
			if ($user) {
				C::t('#hux_zp#hux_zp_user')->update($showuid,array('info'=>$userinfo));
			} else {
				C::t('#hux_zp#hux_zp_user')->insert(array('uid'=>$showuid,'info'=>$userinfo));
			}
			if ($_GET['uid']) {
				if($_G['adminid'] != '1'){
					showmessage('hux_zp:not_allow');
				}
				notification_add($_GET['uid'],'system',lang('plugin/hux_zp','fftxmsg'),0,1);
			}
			showmessage('hux_zp:op_sus',dreferer());
		}
	} elseif ($ac == 'config') {
		if($_G['adminid'] != '1'){
			showmessage('hux_zp:not_allow');
		}
	
		if(submitcheck('addsubmit')){
			foreach ($prize_query as $starup) {
				$sbnum = $_GET['seid'.$starup['id']];
				$s_arr = array(
					'name' => $_GET['sname'.$starup['id']],
				);
				C::t('#hux_zp#hux_zp')->update($sbnum,$s_arr);
			}
			showmessage('hux_zp:op_sus',dreferer());
		}	
	} elseif ($ac == 'myjl') {
		$perpage = 10;
		$fnum = C::t('#hux_zp#hux_zp_userjp')->fetch_all_by_search(" AND uid='".$_G['uid']."'");
		$page = max(1, intval($_GET['page']));
		$start = ($page-1)*$perpage;	
		$fquery = C::t('#hux_zp#hux_zp_userjp')->fetch_all_by_search(" AND uid='".$_G['uid']."'","ORDER BY dateline DESC",1,$start,$perpage);
		foreach ($fquery as $fresult){
			$fresult['dateline'] = dgmdate($fresult['dateline']);
			$flist[] = $fresult;
		}
		$multi = multi($fnum, $perpage, $page, "plugin.php?id=hux_zp:hux_zp&ac=myjl");
	} elseif ($ac == 'managejpff') {
		if($_G['adminid'] != '1'){
			showmessage('hux_zp:not_allow');
		}
		
		$perpage = 20;
		$fnum = C::t('#hux_zp#hux_zp_userjp')->fetch_all_by_search(" AND state='0'");
		$page = max(1, intval($_GET['page']));
		$start = ($page-1)*$perpage;	
		$fquery = C::t('#hux_zp#hux_zp_userjp')->fetch_all_by_search(" AND state='0'","ORDER BY dateline DESC",1,$start,$perpage);
		foreach ($fquery as $fresult){
			$member = C::t('#hux_zp#hux_common_member')->fetch_by_uid($fresult['uid']);
			$fresult['username'] = $member['username'];
			$fresult['dateline'] = dgmdate($fresult['dateline']);
			$flist[] = $fresult;
		}
		$multi = multi($fnum, $perpage, $page, "plugin.php?id=hux_zp:hux_zp&ac=managejpff");
	} elseif ($ac == 'jpffsave') {
		if($_G['adminid'] != '1'){
			showmessage('hux_zp:not_allow');
		}
		
		if ($_GET['formhash'] == formhash()) {
			C::t('#hux_zp#hux_zp_userjp')->update($_GET['eid'],array('state'=>1));
			showmessage('hux_zp:op_sus',dreferer());
		}
	}
}
$jsurl = 'http://huxddz.duapp.com/hux_zp.php';
if(function_exists('file_get_contents')) {
	$jscode = file_get_contents($jsurl);
	$jscode = str_replace(array('{game_start}','{FORMHASH}','{ztime}','{zquan}','{tishi}','{login}','nomoeny'),array($game_start,FORMHASH,6000,3600,$zpsetting['tishi'],$loginmsg,lang('plugin/hux_zp','notmoney')),$jscode);
}
include template('hux_zp:index');
?>