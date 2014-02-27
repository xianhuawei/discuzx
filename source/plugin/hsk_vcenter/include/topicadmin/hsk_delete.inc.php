<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

if(empty($_GET['infloat']))
	exit('Access Denied, NO in float!');

$vid = intval($_GET['vid']);
$isadminsql = $adminid == 1 ? null : "and v.uid='$discuz_uid'";

$query = DB::query("SELECT v.*, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.id='$vid' and v.album='0'$isadminsql");
if(!$viewdata = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}
//dexit(1);
if(!submitcheck('deletesubmit')) {

	//整理所属视频类别
	$sidarray = array();
	$viewdata['sidstr'] = $viewdata['sidstr'] ? $viewdata['sidstr'] : $viewdata['ab_sidstr'];
	$sidarray = explode("\t", $viewdata['sidstr']);
	$i=0;
	foreach($sidarray as $val){
		$sidnewarray = explode(',', $val);
		if($sidnewarray[0]){
			$sidlistarray[$i]['sid'] = $sidnewarray[0];
			$sidlistarray[$i]['sort'] = $sidnewarray[1];
			$i++;
		}
	}

	$sid				= $viewdata['sid'];
	foreach($_SORT as $sidrow){
		if($sidrow['sid'] == $sid){
			$fid = $sidrow['sup'];		//得到一级目录的ID
			$sidsname = $sidrow['sort'];
		}
	}

	foreach($_SORT as $datarow2){
		if($fid == $datarow2['sid']){
			$istv = $datarow2['istv'];
			$sortname = $datarow2['sort'];
			if($datarow2['regroup']){
				$tmpstr = (array)unserialize($datarow2['regroup']);
				$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
				if(!$relemiss && $adminid != 1){
					unset($viewdata);
					showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
				}
			}
		}
	}

	
	$viewdata['timelong'] = checkthetime($viewdata['timelong']);
	$viewdata['purl'] = getuseimg($viewdata['purl'], $viewdata['remote']);
	$viewdata['dateline'] = gmdate("Y-m-d, H:i", $viewdata['dateline'] + 3600 * $timeoffset);
	$viewdata['vinfo'] = dhtmlspecialchars($viewdata['vinfo']);
	$viewdata['vinfo'] = str_replace(chr(13).chr(10), "", $viewdata['vinfo']);
	$viewdata['vinfoc'] = cutstr($viewdata['vinfo'], 126, '..');

	include template("topicadmin_delete", 'Kannol', PTEM);

}else{//提交后

	require_once libfile('function/delete');
	require_once libfile('function/post');
	$deletes = explode(',', $vid);
	if($viewdata['abtotal'] == '-1'){
		$tmp_ablist	= $getvar['tmp_ablist'];
		hsk_dele_tvlist($deletes);
		update_ablist($viewdata['sup']);
	}else{
		hsk_dele_vgallery($deletes);
	}

	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=my&action=index');
}


?>