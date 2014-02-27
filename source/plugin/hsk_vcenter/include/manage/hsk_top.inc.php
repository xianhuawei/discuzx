<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}


$vid = intval($_GET['vid']);
if($vid){//执行编辑
	if(!submitcheck('reportsubmit')) {
		$query = DB::query("SELECT a.*, m.vsubject FROM ".DB::table('vgallery_top5')." a LEFT JOIN ".DB::table('vgallerys')." m ON m.id=a.vid where a.id='$vid'");
		if(!$rows = DB::fetch($query)){//未找到
			showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
		}
		include template("manage_top_edit", 'Kannol', PTEM);
		exit();
	}else{
		//处理提交
		$subject		= dhtmlspecialchars($_GET['subject']);
		$xpicstyle		= intval($_GET['xpicstyle']);													//上传截图相关		picstyle=1 网络图片
		$xpicstyle		= $xpicstyle==2 ? 2 : 1;
		$xfile2			= $xpicstyle == 1 ? dhtmlspecialchars($_GET['xfile2']) : null;
		$remote			= $_G['setting']['ftp']['on'] ? 1 : 0 ;											//是否开启远程图片

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=------文件上传
		$bigsql = null;
		require_once FINC.'/upload.class.php';
		if($_FILES['xfile1'] && $xpicstyle == 2) {
			$newdir = './data/hskcenter/album';
			$xsqldirname = hsk_uploadimg($_FILES['xfile1'], $newdir, 300, 200);
			$bigsql = ", picture='$xsqldirname', remote='$remote'";
		} elseif($xpicstyle == 1 && $xfile2){
			$xsqldirname = hsk_getimg($xfile2, "./data/hskcenter/album", 300, 200);
			if(!$xsqldirname){
				$xsqldirname = $xfile2;
			}
			$bigsql = ", picture='$xsqldirname', remote='$remote'";
		}
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--------文件上传

		DB::query("UPDATE ".DB::table('vgallery_top5')." SET title='$subject' $bigsql where id='$vid'");
		mark_top_cache();
		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=top');
	}	
}


if(!submitcheck('reportsubmit')) {

	$sendid = intval($_GET['sendid']);

	//先取得页面
	$page = max(1, intval($page));
	$ppp = 20;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_top5'));
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=manage&action='.$action);

	//全部类别的SQL
	$query = DB::query("SELECT a.*, m.vsubject FROM ".DB::table('vgallery_top5')." a LEFT JOIN ".DB::table('vgallerys')." m ON m.id=a.vid ORDER BY a.dps, a.id desc limit ".(($page-1)*$ppp).", $ppp");
	$i = ($page-1)*$ppp+1;
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 60, '..');
		$datarow['titlec'] = cutstr($datarow['title'], 60, '..');
		$datarow['picture'] = getuseimg($datarow['picture'], $datarow['remote']);
		$datarow['dateline'] = gmdate("Y-m-d, H:i", $datarow['dateline'] + 3600 * $timeoffset);
		$datarow['inpost'] = $i <= 12 ? 1 : 0;
		$datalist[] = $datarow;
		$i++;
	}

	include template("manage_top", 'Kannol', PTEM);

}else{
	
	$absup = intval($_GET['absup']);
	$displayernew = intval($_GET['displayernew']);
	$byordernew = intval($_GET['byordernew']);
	if($absup){
		//检查是否有重复
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_top5')." where vid='$absup'");
		$maxpage = DB::result($query, 0);
		if($maxpage){//有重复
			showmessage(lang('plugin/hsk_vcenter', 'addalbumditto'));
		}
		//继续	检查是否有此视频ID
		$query = DB::query("SELECT * FROM ".DB::table('vgallerys')." where id='$absup'");
		if(!$datarow = DB::fetch($query)){//未找到
			showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
		}

		DB::query("INSERT INTO ".DB::table('vgallery_top5')." (vid, title, uid, dateline, dps, picture, remote) 
					VALUES ('$absup', '$datarow[vsubject]', '$datarow[uid]', '$timestamp', $byordernew, '$datarow[purl]', '$datarow[remote]')");
	}

	//检查删除
	$deletes = $_GET['deletes'];
	$deletesql = implode(",", $deletes);

	if($deletes)DB::query("DELETE FROM ".DB::table('vgallery_top5')." WHERE id IN ($deletesql)");

	//检查排序
	$newdps = ($_GET['newdps']);
	if(is_array($newdps)){
		foreach($newdps as $keys=>$value){
			DB::query("UPDATE ".DB::table('vgallery_top5')." SET dps='$value' where id='$keys'");
		}
	}

	mark_top_cache();
	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=top');
}

?>