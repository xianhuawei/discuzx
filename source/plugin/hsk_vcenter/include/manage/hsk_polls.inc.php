<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}

$vid = intval($_GET['vid']);

$page = $pager ? 1 : $page;
$page = max(1, intval($page));
$ppp = 20;


if($types == 1){
	if(!submitcheck('reportsubmit')) {

		//视频管理
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_poll')." where audit=1 and vid='$vid'");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=manage&action=polls');

		$query = DB::query("SELECT p.id, p.vid, p.uid, p.dateline, p.post, v.vsubject, m.username FROM ".DB::table('vgallery_poll')." p LEFT JOIN ".DB::table('vgallerys')." v ON v.id=p.vid LEFT JOIN  ".DB::table('common_member')." m ON m.uid=p.uid WHERE p.audit=1 and p.vid='$vid' ORDER BY p.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

		while($datarow = DB::fetch($query)){
			$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + 3600 * $timeoffset);
			if(!$thesubject){
				$thesubject = $datarow['vsubject'];
			}
			$datarow['post'] = cutstr(dhtmlspecialchars($datarow['post']), 50, '...');
			$datalist[] = $datarow;
		}
		include template("manage_polls_list", 'Kannol', PTEM);
	}else{//提交后

		$deletes = $_GET['deletes'];

		if(empty($deletes)) showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

		//删除，执行数据库
		$deletesql = implode(",", $deletes);
		if(DB::query("DELETE FROM	".DB::table('vgallery_poll')." WHERE id in($deletesql)")){
			$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_poll')." where vid='$vid'");
			$thesumx = DB::result($query, 0);
			DB::query("UPDATE ".DB::table('vgallerys')." SET polls='$thesumx' where id='$vid'");
		}

		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=polls&types=1&vid='.$vid);
	}
}else{
	//审核
	$types = 2;

	if(!submitcheck('reportsubmit')) {

		//视频管理
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_poll')." where audit=0");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=manage&action=polls');

		$query = DB::query("SELECT p.id, p.vid, p.uid, p.dateline, p.post, v.vsubject, m.username FROM ".DB::table('vgallery_poll')." p LEFT JOIN ".DB::table('vgallerys')." v ON v.id=p.vid LEFT JOIN  ".DB::table('common_member')." m ON m.uid=p.uid WHERE p.audit=0 ORDER BY p.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

		while($datarow = DB::fetch($query)){
			$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + 3600 * $timeoffset);
			if(!$thesubject){
				$thesubject = $datarow['vsubject'];
			}
			$datarow['post'] = cutstr(dhtmlspecialchars($datarow['post']), 50, '...');
			$datalist[] = $datarow;
		}
		include template("manage_polls_audit", 'Kannol', PTEM);
	}else{//提交后

		$ptdata = $_GET['ptdata'];
		$auditarr = $deletes = array();
		if(is_array($ptdata)){
			foreach($ptdata as $keys=>$value){
				if($value == 2){
					//审核通过;
					$auditarr[] = $keys;
				}else if($value == 3){
					//删除
					$deletes[] = $keys;
				}
			}
		}

		//先删除
		if(!empty($deletes)){
			//删除
			$deletesql = implode(",", $deletes);
			DB::query("DELETE FROM	".DB::table('vgallery_poll')." WHERE id in($deletesql)");
		}

		//后审核
		if(!empty($auditarr)){
			$deletesql = implode(",", $auditarr);
			DB::query("UPDATE ".DB::table('vgallery_poll')." SET audit='1' WHERE id in($deletesql)");
		}

		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=polls&types=2');
	}

}


?>