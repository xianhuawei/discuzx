<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

$pushid = dhtmlspecialchars($_GET['deletes']);
if(!$pushid)
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

if(is_array($pushid)){
	$pushidstr = implode(',', $pushid);
}else{
	$pushidstr = $pushid;
	$pushid = explode(',', $pushid);
}
//查询专辑

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo(lang('plugin/hsk_vcenter', 'topic_push'));
$navname = lang('plugin/hsk_vcenter', 'topic_push');
$navtitle = $navname." - $navtitle";

if(!submitcheck('pushsumbit')) {

	//挑出这些视频
	$isadminsql = $adminid == 1 ? null : "and m.uid='$discuz_uid'";
	$query = DB::query("SELECT m.id, m.vsubject, m.sup, n.vsubject as abname, n.id as abid FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." n ON n.id=m.sup WHERE m.id in($pushidstr)$isadminsql");
	$abid = 0;
	while($datarow = DB::fetch($query)){
		if($abid){
			if($abid != $datarow['abid']){
				//有不同专辑内的视频
				showmessage(lang('plugin/hsk_vcenter', 'push_error_1'));
			}
		}else{
			$abid = $datarow['abid'];
		}
		$pushrow[] = $datarow;
	}
	if(!$pushrow || !$abid){
		showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
	}	

	$absubject = $pushrow[0]['abname'];


	include template("topicadmin_push", 'Kannol', PTEM);

}else{

	$abid = intval($_GET['abid']);

	$isadminsql = $adminid == 1 ? null : "and uid='$discuz_uid'";
	$query = DB::query("SELECT fid, sid, sid2, sid3, sid4, sidstr, album, abtotal FROM ".DB::table('vgallerys')." WHERE id='$abid'$isadminsql");
	if(!$datarow = DB::fetch($query)){
		showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
	}

	$i=0;
	foreach($pushid as $keyid){
		//开始逐个升级

		$query = DB::query("SELECT id, uid FROM ".DB::table('vgallerys')." WHERE id='$keyid' and sup='$abid'$isadminsql");
		if($datarow1 = DB::fetch($query)){
			$i++;
			DB::query("UPDATE ".DB::table('vgallerys')." SET sup='0', abtotal='0' where id='$keyid'");
		}
	}

	if($i){
		DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum-$i where id='$abid'");
		if($datarow['album'] == 3){
			$tmp_ablist	= $getvar['tmp_ablist'];
			update_ablist($abid);
		}
	}


	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=my&action=index');
}

?>