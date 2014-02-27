<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';
if(!file_exists($cmp_config)){
	cpmsg('cmpsetconfigerror', '', 'error');
}else{
	require_once "$cmp_config";
	if(!$_CMP4['cmp_config']['senddomain']){
		cpmsg('cmpsetconfigerror', '', 'error');
	}
}


$nav = $_CMP4['cmp_other'];

if(!submitcheck('submit')) {

	showformheader('hsk&operation=player&do=4');
	showtableheader();
	showtitle(cplang('cmp_share_title'));
	showsetting('cmp_share', 'new_cmpshare', ($nav['cmpshare']=='plugins/sharing.swf,' ? 1 : 0), 'radio');

	showtitle(cplang('cmp_qvod_title'));
	showsetting('cmp_qvod', 'new_qvod', $nav['qvod'], 'radio');

	showtitle(cplang('cmp_announce'));
	showsetting('cmp_announce_1', 'new_announce_1', $nav['announce_1'], 'textarea', '', 0, cplang('cmp_announce_help'));
	showsetting('cmp_announce_2', 'new_announce_2', $nav['announce_2'], 'text');
	showsetting('cmp_announce_3', 'new_announce_3', $nav['announce_3'], 'text');

	showtablefooter();
	showtableheader();
	showsubmit('submit', 'submit', '');
	showtablefooter();
	showformfooter();

} else {

	//提交
	$new_cmpshare	= trim(dhtmlspecialchars($_GET['new_cmpshare']));
	$new_announce_1	= trim(dhtmlspecialchars($_GET['new_announce_1']));
	$new_announce_2	= intval($_GET['new_announce_2']);
	$new_announce_3	= trim(dhtmlspecialchars($_GET['new_announce_3']));
	$new_qvod		= intval($_GET['new_qvod']);

	$new_cmpshare = $new_cmpshare ? 'plugins/sharing.swf,' : null;
	$newarray = array('cmpshare'=>$new_cmpshare, 'announce_1'=>$new_announce_1, 'announce_2'=>$new_announce_2, 'announce_3'=>$new_announce_3, 'qvod'=>$new_qvod);

	$_CMP4['cmp_other'] = $newarray;

	hsk_tocache('cmp4.inc', hsk_getcachevars(array('_CMP4' => $_CMP4)));

	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=player&do=4', 'succeed');

}
