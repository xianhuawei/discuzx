<?php 

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$uid = $_GET['uid'];
if($types == "v"){				//个人专辑

	//先取得页面
	$uid = $uid ? $uid : $discuz_uid;

	$page = max(1, intval($page));
	$ppp = 20;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where album='1' and uid='$uid' and audit='1'");
	$maxpage = DB::result($query, 0);
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=getlist&types=v', 0, 4);
	
	$query = DB::query("SELECT id, vsubject, vsum FROM ".DB::table('vgallerys')." WHERE album='1' and uid='$uid' and audit='1' order by id desc limit ".(($page-1)*$ppp).", $ppp");
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 20, '');
		$listarr[] = $datarow;
	}
	$sendtypes = 3;
	include template("ajax_getlist", 'Kannol', PTEM);
}elseif($types == "p"){			//公共专辑

	$page = max(1, intval($page));
	$ppp = 2;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where album='2' and audit='1'");
	$maxpage = DB::result($query, 0);
	$multipage = multi($maxpage, $ppp, $page, PDIR.'&mod=getlist&types=p', 0, 2);

	$query = DB::query("SELECT id, vsubject, vsum FROM ".DB::table('vgallerys')." WHERE album='2' and audit='1' order by id desc limit ".(($page-1)*$ppp).", $ppp");
	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 20, '');
		$listarr[] = $datarow;
	}
	$sendtypes = 4;
	include template("ajax_getlist", 'Kannol', PTEM);

//下面是其它地方所需要的调用AJAX功能
}elseif($types == 'indexset'){
	//后台首页定制位置
	$styleid = intval($_GET['styleid']);
	if($styleid == 1){
		//生成大类的列表
		$query = DB::query("SELECT sid, sort FROM ".DB::table('vgallery_sort')." where available=1 and sup=0 ORDER BY dps, sid");
		while($datarow = DB::fetch($query)) {
			$sortlist[] = $datarow;
		}
		include template("admincp_styleid_1", 'Kannol', PTEM);
	}elseif($styleid == 2){
		//生成大类和小类的列表
		$query = DB::query("SELECT sid, sort, sup FROM ".DB::table('vgallery_sort')." where available=1 ORDER BY dps, sid");
		while($datarow = DB::fetch($query)) {
			if(!$datarow['sup']) {
				$sortlist[] = $datarow;
			} else {
				$suplist[] = $datarow;
			}
		}
		//print_r($suplist);dexit();
		include template("admincp_styleid_2", 'Kannol', PTEM);
	}elseif($styleid == 9){
		//数据调用
		$query = DB::query("SELECT bid, name, blockclass, dateline FROM ".DB::table('common_block')." where left(blockclass,11)='hskvcenter_' ORDER BY bid desc");
		while($datarow = DB::fetch($query)) {
			$blocks[] = $datarow;
		}
		//print_r($suplist);dexit();
		include template("admincp_styleid_9", 'Kannol', PTEM);
	}elseif($styleid == 8){
		//广告调用
		$ccc = intval($_GET['ccc']);
		$query = DB::query("SELECT id, subject, width, height FROM ".DB::table('vgallery_ad')." where displayer='1' and styleid='$ccc' ORDER BY id desc");
		while($datarow = DB::fetch($query)) {
			$adlist[] = $datarow;
		}
		//print_r($suplist);dexit();
		include template("admincp_styleid_8", 'Kannol', PTEM);
	}
}elseif($types == 'favorites'){
	//加入到收藏夹

	//检查是否存在视频
	$query = DB::query("SELECT id FROM ".DB::table('vgallerys')." WHERE id='$vid' and audit='1'");
	if(!$datarow = DB::fetch($query)){
		showmessage(lang('plugin/hsk_vcenter', 'nofindvid'), 'javascript:close();', array(), array('closetime' => true, 'showdialog' => 1));
	}

	$query = DB::query("SELECT vid FROM ".DB::table('vgallery_favorites')." WHERE uid='$discuz_uid' and vid='$vid'");
	if($datarow = DB::fetch($query)){
		//已收藏过了
		showmessage(lang('plugin/hsk_vcenter', 'fav_repeat'), 'javascript:close();', array(), array('closetime' => true, 'showdialog' => 1));
	}
	
	//执行收藏操作
	DB::query("INSERT INTO ".DB::table('vgallery_favorites')." (vid, uid, dateline) VALUES ('$vid', '$discuz_uid', '$timestamp')");
	DB::query("UPDATE ".DB::table('vgallery_member')." SET favsum=favsum+1 WHERE mid='$discuz_uid'");			

	showmessage(lang('plugin/hsk_vcenter', 'fav_success'), 'javascript:close();', array(), array('closetime' => false, 'showdialog' => 1));
}elseif($types == 'report'){
	//举报
	if(empty($_GET['infloat']))
		exit('Access Denied, NO in float!');

	$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE id='$vid'");
	if(!$datarow = DB::fetch($query)){
		showmessage(lang('plugin/hsk_vcenter', 'nofindvid'), '', array(), array('closetime' => true, 'showdialog' => 1));
	}

	if(submitcheck('reportsubmit')) {
		$message = censor(cutstr(dhtmlspecialchars(trim($_GET['message'])), 200, ''));
		if(!$message){
			showmessage(lang('plugin/hsk_vcenter', 'pay_error_3'));
		}
		if($reportid = DB::result_first("SELECT id FROM ".DB::table('vgallery_report')." WHERE uid='$discuz_uid' AND vid='$vid'")) {
			DB::query("UPDATE ".DB::table('vgallery_report')." SET message=CONCAT_WS(', ', message, '$message'), onsend=0 WHERE id='$reportid'");
		} else {
			DB::query("INSERT INTO ".DB::table('vgallery_report')."(uid, vid, message, dateline, onsend) VALUES ('$discuz_uid', '$vid', '$message', '$timestamp', 0)");
		}
		$report_receive = unserialize($_G['setting']['report_receive']);
		$moderators = array();
		if($report_receive['adminuser']) {
			foreach($report_receive['adminuser'] as $touid) {
				$message = '<a href="home.php?mod=space&uid='.$discuz_uid.'" target="_blank">'.$discuz_user.'</a> '.lang('plugin/hsk_vcenter', 'chk_rep').' <a href="'.sendurl('show', 0, $vid).'" target="_blank">'.$datarow['vsubject'].'</a>';
				notification_add($touid, 'post', $message, array(
					'from_id' => $vid,
					'from_idtype' => 'post',
				));
			}
		}
		showmessage('report_succeed', '', array(), array('closetime' => true, 'showdialog' => 1));
	}
	$reportlist	= explode("\n", $getvar['reportlist']);
	include template("topicadmin_report", 'Kannol', PTEM);
}

?>