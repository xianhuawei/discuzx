<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

if(empty($_GET['infloat']))
	exit('Access Denied, NO in float!');

$vid = intval($_GET['vid']);
$isadminsql = $adminid == 1 ? null : "and v.uid='$discuz_uid'";

$query = DB::query("SELECT v.*, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.id='$vid' and v.album>0$isadminsql");
if(!$viewdata = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}

$sendtourl = dhtmlspecialchars($_GET['sendtourl']);
if(!$sendtourl){
	//生成自动的连接
	$x = dreferer();
	$sendtourl = substr($x, strpos($x, '&mod='));
}
//dexit($sendtourl);
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

	include template("topicadmin_deleplist", 'Kannol', PTEM);

}else{//提交后

	$deleteyes = intval($_GET['deleteyes']);
	$invodis = intval($_GET['invodis']);

	require_once libfile('function/delete');
	require_once libfile('function/post');

	if($invodis == 1){
		//删除内含所有视频

		if($viewdata['album']==2){
			//公共专辑要把别人的视频移出去
			$query = DB::query("SELECT id FROM ".DB::table('vgallerys')." WHERE sup='$vid' and uid<>'$discuz_uid'");
			while($datarow = DB::fetch($query)){
				$deleteids[] = $datarow['id'];
			}
			$deleteids = implode(",", $deleteids);
			DB::query("UPDATE ".DB::table('vgallerys')." SET sup='0' where id in($deleteids)");
		}

		$isadminsql = $adminid == 1 ? null : "and uid='$discuz_uid'";
		$query = DB::query("SELECT id FROM ".DB::table('vgallerys')." WHERE sup='$vid'$isadminsql");
		while($datarow = DB::fetch($query)){
			$deleteids[] = $datarow['id'];
		}

		if($deleteids){
			if($viewdata['album'] == 3){
				hsk_dele_tvlist($deleteids);
			}else{
				hsk_dele_vgallery($deleteids);
			}
		}

	}else{
		//移出视频
		$query = DB::query("SELECT id, vsubject, purl, remote FROM ".DB::table('vgallerys')." WHERE sup='$vid'");
		while($datarow = DB::fetch($query)){
			if($deleteyes && $viewdata['album']==3){
				$newsubject = $viewdata['vsubject']." ".$datarow['vsubject'];
				if(!$datarow['purl']){
					$purlsql = ", purl='$viewdata[purl]', remote='$viewdata[remote]'";
					$notdepic = 1;
				}
				DB::query("UPDATE ".DB::table('vgallerys')." SET vsubject='$newsubject'$purlsql where id='$datarow[id]'");
			}
			$deleteids[] = $datarow['id'];
		}

		$deleteids = implode(",", $deleteids);
		if($deleteids)
			DB::query("UPDATE ".DB::table('vgallerys')." SET sup='0', abtotal='0' where id in($deleteids)");
	}

	hsk_dele_plist($vid, $notdepic);
	//缓存
	hsk_fidupdate($viewdata['fid']);
	hsk_sidupdate($viewdata['sid']);

	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), $sendtourl);
}


?>