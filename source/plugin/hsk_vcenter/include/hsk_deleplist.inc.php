<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}


$vid = intval($_GET['vid']);
if($vid){//执行编辑
	if(!submitcheck('reportsubmit')) {
		$query = DB::query("SELECT a.*, m.vsubject FROM ".DB::table('vgallery_album')." a LEFT JOIN ".DB::table('vgallerys')." m ON m.id=a.vid where a.id='$vid'");
		if(!$rows = DB::fetch($query)){//未找到
			showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
		}
		include template("manage_album_edit", 'Kannol', PTEM);
		exit();
	}else{
		//处理提交
		$xpicstyle		= intval($_GET['xpicstyle']);													//上传截图相关		picstyle=1 网络图片
		$xpicstyle		= $xpicstyle==2 ? 2 : 1;
		$xfile2			= $xpicstyle == 1 ? dhtmlspecialchars($_GET['xfile2']) : null;

		$zpicstyle		= intval($_GET['zpicstyle']);													//上传截图相关		picstyle=1 网络图片
		$zpicstyle		= $zpicstyle==2 ? 2 : 1;
		$zfile2			= $zpicstyle == 1 ? dhtmlspecialchars($_GET['zfile2']) : null;

		$remote			= $_G['setting']['ftp']['on'] ? 1 : 0 ;											//是否开启远程图片
		$message		= trim(dhtmlspecialchars($_GET['message']));

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=------文件上传
		require_once FINC.'/upload.class.php';
		if($_FILES['xfile1'] && $xpicstyle == 2) {
			$newdir = './data/hskcenter/album';
			$xsqldirname = hsk_uploadimg($_FILES['xfile1'], $newdir, 690, 221);
			$bigsql = "picture='$xsqldirname', ";
		} elseif($xpicstyle == 1 && $xfile2){
			$xsqldirname = hsk_getimg($xfile2, "./data/hskcenter/album", 690, 221);
			if(!$xsqldirname){
				$xsqldirname = $xfile2;
			}
			$bigsql = "picture='$xsqldirname', ";
		}
		if($_FILES['zfile1'] && $zpicstyle == 2) {
			$newdir = './data/hskcenter/album';
			$zsqldirname = hsk_uploadimg($_FILES['zfile1'], $newdir, 60, 35);
			$spicsql = "spic='$zsqldirname', ";
		} elseif($zpicstyle == 1 && $zfile2){
			$zsqldirname = hsk_getimg($zfile2, "./data/hskcenter/album", 60, 35);
			if(!$zsqldirname){
				$zsqldirname = $zfile2;
			}
			$spicsql = "spic='$zsqldirname', ";
		}
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--------文件上传
		DB::query("UPDATE ".DB::table('vgallery_album')." SET $bigsql $spicsql title='$message' where id='$vid'");
		mark_album_cache();
		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=album&vid='.$vid);
	}	
}


if(!submitcheck('reportsubmit')) {

	//先取得页面
	$page = max(1, intval($page));
	$ppp = 20;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_album')." where displayer=1");
	$maxpage = DB::result($query, 0);
	$countmax = $maxpage;
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=manage&action='.$action);

	//全部类别的SQL
	$query = DB::query("SELECT a.id, a.vid, a.title, a.spic, a.picture, a.remote, a.byorder, m.vsubject FROM ".DB::table('vgallery_album')." a LEFT JOIN ".DB::table('vgallerys')." m ON m.id=a.vid WHERE a.displayer=1 ORDER BY a.byorder, a.id desc limit ".(($page-1)*$ppp).", $ppp");
	$i = ($page-1)*$ppp+1;
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 50, '..');
		//$datarow['title'] = cutstr($datarow['title'], 90, '..');
		$datarow['spic'] = getuseimg($datarow['spic'], $datarow['remote']);
		$datarow['picture'] = getuseimg($datarow['picture'], $datarow['remote']);
		$datarow['inpost'] = $i <= 10 ? 1 : 0;
		$datalist[] = $datarow;
		$i++;
	}
	include template("manage_album", 'Kannol', PTEM);

}else{
	
	$absup = intval($_GET['absup']);
	$displayernew = intval($_GET['displayernew']);
	$byordernew = intval($_GET['byordernew']);
	if($absup){
		//检查是否有重复
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallery_album')." where vid='$absup'");
		$maxpage = DB::result($query, 0);
		if($maxpage){//有重复
			showmessage(lang('plugin/hsk_vcenter', 'addalbumditto'));
		}
		//继续	检查是否有此视频ID
		$query = DB::query("SELECT * FROM ".DB::table('vgallerys')." where id='$absup'");
		if(!$datarow = DB::fetch($query)){//未找到
			showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
		}
		//开始添加
		$isdesc = cutstr($datarow['vinfo'], 90, "..");
		if($datarow['album']==3 && $datarow['vsum'] && $datarow['vsum'] < $datarow['abtotal']){
			$isdesc .= "(".lang('plugin/hsk_vcenter', 'thetv0').$datarow['vsum'].lang('plugin/hsk_vcenter', 'thetv1').")";
		}elseif($datarow['album']==3 && $datarow['vsum'] && $datarow['vsum'] >= $datarow['abtotal']){
			$isdesc .= "(".$datarow['vsum'].lang('plugin/hsk_vcenter', 'thetv1').lang('plugin/hsk_vcenter', 'thetv2').")";
		}

		DB::query("INSERT INTO ".DB::table('vgallery_album')." (vid, title, link1, link2, displayer, byorder, spic) 
					VALUES ('$absup', '$isdesc', '', '', 1, $byordernew, '$datarow[purl]')");
	}

	//检查删除
	$deletes = $_GET['deletes'];
	$deletesql = implode(",", $deletes);

	if($deletes)DB::query("DELETE FROM ".DB::table('vgallery_album')." WHERE id IN ($deletesql)");

	//检查排序
	$newdps = ($_GET['newdps']);
	if(is_array($newdps)){
		foreach($newdps as $keys=>$value){
			DB::query("UPDATE ".DB::table('vgallery_album')." SET byorder='$value' where id='$keys'");
		}
	}

	mark_album_cache();
	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=album');
}
?>