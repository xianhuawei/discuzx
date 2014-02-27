<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}


$vid = intval($_GET['vid']);
$types = intval($_GET['types']);
$types = !$vid && !$types ? 1 : $types;

if($vid){//执行编辑
	if(!submitcheck('reportsubmit')) {
		$query = DB::query("SELECT v.id, v.vsubject, v.purl, v.vsum, v.subid, v.abtotal, v.updateline, v.flashid, v.dateline, v.tvurl, s.sort, s.sid, v.absubject, v.remote FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid WHERE v.id='$vid' or v.subid='$vid' order by v.subid, v.id");
		$linksend = $actionkey = 0;
		while($datarow = DB::fetch($query)){
			$linksend = $datarow['subid'] == 0 ? $datarow['id'] : $linksend;
			$actionkey = $datarow['subid'] == 0 ? "'".substr($datarow['flashid'], -2)."'" : $actionkey;
			$datarow['updateline'] = gmdate("Y-m-d H:i", $datarow['updateline'] + $timeoffset * 3600);
			$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + $timeoffset * 3600);
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$rows[] = $datarow;
		}

		if(!$rows){
			showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
		}
		include template("manage_marger_edit", 'Kannol', PTEM);
		exit();
	}else{

		$copyarr = dhtmlspecialchars($_GET['copyarr']);
		$subject = dhtmlspecialchars($_GET['subject']);
		$absubject = dhtmlspecialchars($_GET['absubject']);
		$linksend = intval($_GET['linksend']);

		//更新内容
		foreach($subject as $key=>$val){
			$subsql = $key == $linksend ? "subid='0'" : "subid='$linksend'";
			$absubjectsql = $absubject[$key] ? ", absubject='$absubject[$key]'" : null;
			$subjectsql = $subject[$key] ? ", vsubject='$subject[$key]'" : null;
			DB::query("UPDATE ".DB::table('vgallerys')." SET $subsql $absubjectsql $subjectsql where id='$key'");
		}

		//删除关联
		$deletes = $_GET['deletes'];
		$deletesql = implode(",", $deletes);
		if($deletes)DB::query("UPDATE ".DB::table('vgallerys')." SET subid='0' WHERE id IN ($deletesql)");

		//复制信息
		if($copyarr){
			$query = DB::query("SELECT * FROM ".DB::table('vgallerys')." where id='$linksend'");
			if(!$datarow = DB::fetch($query)){//未找到
				showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
			}
			foreach($copyarr as $val){
				DB::query("UPDATE ".DB::table('vgallerys')." SET sid='$datarow[sid]', sid2='$datarow[sid2]', sid3='$datarow[sid3]', sid4='$datarow[sid4]', sidstr='$datarow[sidstr]', abtotal='$datarow[abtotal]', purl='$datarow[purl]', address='$datarow[address]', years='$datarow[years]', language='$datarow[language]', director='$datarow[director]', actor='$datarow[actor]', tag='$datarow[tag]', vinfo='$datarow[vinfo]', remote='$datarow[remote]' where id='$val'");
			}
		}			

		//添加关联
		$absup = intval($_GET['absup']);
		$absubject_new = intval($_GET['absubject_new']);

		if($absup){
			//检查是否有此视频ID， 或是否已被关联
			if($absup == $linksend)
				showmessage(lang('plugin/hsk_vcenter', 'marger_self'));
			$query = DB::query("SELECT * FROM ".DB::table('vgallerys')." where id='$absup'");
			if(!$datarow = DB::fetch($query)){//未找到
				showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
			}else{
				if($datarow['subid']>0){
					showmessage(lang('plugin/hsk_vcenter', 'marger_repeat'));
				}
			}

			$query = DB::query("SELECT * FROM ".DB::table('vgallerys')." where subid='$absup'");
			if($datarow = DB::fetch($query)){//未找到
				showmessage(lang('plugin/hsk_vcenter', 'marger_repeat1'));
			}
			$absubjectsql = $absubject_new ? ", absubject='$absubject_new'" : null;
			DB::query("UPDATE ".DB::table('vgallerys')." SET subid='$linksend' $absubjectsql where id='$absup'");
		}
		
		showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR.'&mod=manage&action=marger&vid='.$linksend);
		dexit();
	}	
}else{

	$search		= dhtmlspecialchars($_GET['searchkey']);
	$_search	= $search ? '&search='.$search : null;

	$fid		= intval($_GET['fid']);
	$pager		= intval($_GET['pager']);
	$page = $pager ? 1 : $page;

	$_fid		= $fid ? '&fid='.$fid : null;
	$_types		= $types ? '&types='.$types : null;

	foreach($_SORT as $val){
		if(!$val['sup']){//重新生成所有一级分类
			if($val['regroup']){
				$tmpstr = (array)unserialize($val['regroup']);
				$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
				if($relemiss){
					$newsort[] = $val;
				}
			}else{
				$newsort[] = $val;
			}
		}
	}

	$searchsql	= $search ? "and v.vsubject LIKE '%$search%'" : NULL;
	$fid_sql	= $fid ? "and v.fid='$fid'" : null;
	$_searchsql	= $search ? "and vsubject LIKE '%$search%'" : NULL;
	$_fid_sql	= $fid ? "and fid='$fid'" : null;

	$mypage = $page ? 0 : 1;
	$page = max(1, intval($page));
	$ppp = 15;

	if($types == 1){
		//未关联的
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.subid=0 and v.abtotal>=0 and s.istv=1 and v.sup=0 $searchsql $fid_sql");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=manage&action=marger'.$_types.$_fid.$_search);

		$query = DB::query("SELECT v.id, v.vsubject, v.purl, v.vsum, v.abtotal, v.updateline, v.flashid, v.dateline, v.tvurl, s.sort, s.sid, v.absubject, v.remote FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid WHERE v.subid=0 and v.abtotal>=0 and s.istv=1 and v.sup=0 $searchsql $fid_sql ORDER BY v.updateline desc LIMIT ".(($page-1)*$ppp).", $ppp");
	}else{
		//已关联的
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." WHERE subid>0 $_searchsql $_fid_sql");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR.'&mod=manage&action=marger'.$_types.$_fid.$_search);

		$query = DB::query("SELECT a.id, a.vsubject, a.purl, a.vsum, a.abtotal, a.updateline, a.flashid, a.dateline, a.tvurl, s.sort, s.sid, a.absubject, a.remote FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallerys')." a ON a.id=v.subid LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid WHERE v.subid>0 $searchsql $fid_sql GROUP BY v.subid ORDER BY v.updateline desc LIMIT ".(($page-1)*$ppp).", $ppp");
	}
	while($datarow = DB::fetch($query)){
		$datarow['updateline'] = gmdate("Y-m-d H:i", $datarow['updateline'] + $timeoffset * 3600);
		$datarow['dateline'] = gmdate("Y-m-d H:i", $datarow['dateline'] + $timeoffset * 3600);
		$datarow['keys'] = substr($datarow['flashid'], -1);
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['absubject'] = $datarow['absubject'] ? "_".$datarow['absubject'] : null;
		$datalist[] = $datarow;
	}
	
	include template("manage_marger", 'Kannol', PTEM);

}

?>