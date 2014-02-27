<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MANAGE')) {
	exit('Access Denied');
}

$vid = intval($_GET['vid']);
$types = intval($_GET['types']);
$types = !$types ? 1 : $types;

$search		= dhtmlspecialchars($_GET['searchkey']);
$_search	= $search ? '&searchkey='.$search : null;

$fid		= intval($_GET['fid']);
$pager		= intval($_GET['pager']);

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
$deletevid	= intval($_GET['deletevid']);
$tmp_ablist	= $getvar['tmp_ablist'];

$page = $pager ? 1 : $page;
$page = max(1, intval($page));
$ppp = 20;

if($types == 1){

	if($vid){//管理专辑内视频
	
		$vidpage = "&vid=$vid";
		if(!submitcheck('reportsubmit')) {
			
			$query = DB::query("SELECT id, vsubject, abtotal, vsum, subid FROM ".DB::table('vgallerys')." WHERE id='$vid' and sup=0 and album=3");
			if(!$rows = DB::fetch($query)){//未找到
				showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
			}else{
				$abtitle = $rows['vsubject'];
				$abtotalnew = $rows['abtotal'];
				$linksup = $rows['subid'] ? $rows['subid'] : $rows['id'];

			}

			//视频管理
			$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.audit=1 and v.sup='$vid' $searchsql $fid_sql");
			$thesumx = DB::result($query, 0);
			$multipage = multi($thesumx, $ppp, $page, PDIR."&mod=manage&action=$action".$vidpage.$_types.$_fid.$_search);

			$query = DB::query("SELECT v.*, s.sort, s.sid, e.*, u.shares, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.audit=1 and v.sup='$vid' $searchsql $fid_sql ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

			while($datarow = DB::fetch($query)){
				$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
				$datarow['timelong'] = checkthetime($datarow['timelong']);
				$datarow['dateline1'] = gmdate("Y-m-d", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['dateline2'] = gmdate("H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
				$datalist[] = $datarow;
			}
			include template("manage_index_list", 'Kannol', PTEM);

		}else{//提交后

			//先处理高级选项
			$moreget = intval($_GET['moreget']);
			if($moreget){
				//表示有选择
				$rep_1 = dhtmlspecialchars($_GET['rep_1']);
				$rep_2 = dhtmlspecialchars($_GET['rep_2']);

				if($rep_2 || $rep_1){
					$rep_1 = str_replace('*|*', '', $rep_1);
					$rep_2 = str_replace('*|*', '', $rep_2);
					$autoex = strpos("a".$rep_2."b", "#x#");
					$rep_2 = str_replace("#x#", '', $rep_2);

					$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE sup='$vid' order by id");
					$i=1;
					$vsubjectnew = null;
					while($rows = DB::fetch($query)){
						if($rep_2 && $rep_1){
							$vsubjectnew = str_replace($rep_1, $rep_2, $rows['vsubject']);
						}elseif(!$rep_1 && $rep_2){
							$vsubjectnew = $rep_2;
						}elseif(!$rep_2 && $rep_1){
							$vsubjectnew = str_replace($rep_1, '', $rows['vsubject']);
						}

						if($autoex){
							//自动集数
							$vsubjectnew = $vsubjectnew.lang('plugin/hsk_vcenter', 'di').$i.lang('plugin/hsk_vcenter', 'thetv1');
						}

						//新的标题出来后，比较一下是否有修改，如果有，就上传
						$vsubjectnew = cutstr($vsubjectnew, 180, '');
						if($rows['vsubject'] != $vsubjectnew){
							//升级SQL
							DB::query("UPDATE ".DB::table('vgallerys')." SET vsubject='$vsubjectnew' WHERE id='$rows[id]'");
						}
						$vsubjectnew = null;
						$i++;
					}
				}

				//更新总集数
				$abtotalnew = intval($_GET['abtotalnew']);
				DB::query("UPDATE ".DB::table('vgallerys')." SET abtotal='$abtotalnew' WHERE id='$vid'");
			}

			$deletes = $_GET['deletes'];

			if(empty($deletes) && empty($moreget)) showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

			require_once libfile('function/delete');
			require_once libfile('function/post');
			hsk_dele_tvlist($deletes);
			update_ablist($vid);

			showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR."&mod=manage&action=$action".$vidpage.$_types.$_fid.$_search);
		}
	}else{

		//视频管理
		$hiddenfull = intval($_GET['hiddenfull']);
		$hiddensql = $hiddenfull ? "and (v.vsum < v.abtotal or v.abtotal=0)" : null;
		$hiddenpage = $hiddenfull ? "&hiddenfull=$hiddenfull" : null;
		$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.audit=1 and v.album=3 $hiddensql $searchsql $fid_sql");
		$thesumx = DB::result($query, 0);
		$multipage = multi($thesumx, $ppp, $page, PDIR."&mod=manage&action=$action".$_types.$_fid.$_search.$hiddenpage);

		$query = DB::query("SELECT v.*, s.sort, s.sid, e.*, u.shares, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.audit=1 and v.album=3 $hiddensql $searchsql $fid_sql ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

		while($datarow = DB::fetch($query)){
			$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
			$datarow['timelong'] = checkthetime($datarow['timelong']);
			$datarow['dateline1'] = gmdate("Y-m-d", $datarow['dateline'] + 3600 * $timeoffset);
			$datarow['dateline2'] = gmdate("H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
			$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
			$datalist[] = $datarow;
		}
		include template("manage_plist_list", 'Kannol', PTEM);
	}

}elseif($types == 2){

	if($vid){//管理专辑内的视频
		$vidpage = "&vid=$vid";
		if(!submitcheck('reportsubmit')) {
			
			$query = DB::query("SELECT vsubject, abtotal, vsum FROM ".DB::table('vgallerys')." WHERE id='$vid' and sup=0 and album=3");
			if(!$rows = DB::fetch($query)){//未找到
				showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
			}else{
				$abtitle = $rows['vsubject'];
				$abtotalnew = $rows['abtotal'];
			}
		
			//视频管理
			$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.audit=0 and v.sup='$vid' $searchsql $fid_sql");
			$thesumx = DB::result($query, 0);
			$multipage = multi($thesumx, $ppp, $page, PDIR."&mod=manage&action=$action".$vidpage.$_types.$_fid.$_search);

			$query = DB::query("SELECT v.*, s.sort, s.sid, e.*, u.shares, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.audit=0 and v.sup='$vid' $searchsql $fid_sql ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

			while($datarow = DB::fetch($query)){
				$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
				$datarow['timelong'] = checkthetime($datarow['timelong']);
				$datarow['dateline1'] = gmdate("Y-m-d", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['dateline2'] = gmdate("H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
				$datalist[] = $datarow;
			}
			include template("manage_index_audit", 'Kannol', PTEM);
		}else{//提交后

			$ptdata = $_GET['ptdata'];
			$auditarr = $deletes = array();
			if(is_array($ptdata)){
				foreach($ptdata as $keys=>$value){
					if($value == 2){
						//审核通过;
						$auditarr[] = $keys;
					}
				}
			}

			//审核
			if(!empty($auditarr)){
				hsk_audit_vgallery($auditarr, 1);
				update_ablist($vid);
			}

			showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR."&mod=manage&action=$action".$vidpage.$_types.$_fid.$_search);
		}
	}else{
	
		if(!submitcheck('reportsubmit')) {
		
			//视频管理
			$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid where v.audit=0 and v.album=3 $searchsql $fid_sql");
			$thesumx = DB::result($query, 0);
			$multipage = multi($thesumx, $ppp, $page, PDIR."&mod=manage&action=$action".$_types.$_fid.$_search);

			$query = DB::query("SELECT v.*, s.sort, s.sid, e.*, u.shares, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.sid LEFT JOIN ".DB::table('vgallery_evaluate_tc')." e ON e.vid=v.id LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=v.uid LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.audit=0 and v.album=3 $searchsql $fid_sql ORDER BY v.id desc LIMIT ".(($page-1)*$ppp).", $ppp");

			while($datarow = DB::fetch($query)){
				$datarow['valuate'] = sprintf("%01.1f", $datarow['valuate']/100);
				$datarow['timelong'] = checkthetime($datarow['timelong']);
				$datarow['dateline1'] = gmdate("Y-m-d", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['dateline2'] = gmdate("H:i:s", $datarow['dateline'] + 3600 * $timeoffset);
				$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
				$datalist[] = $datarow;
			}
			include template("manage_plist_audit", 'Kannol', PTEM);
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
				require_once libfile('function/delete');
				require_once libfile('function/post');
				hsk_dele_tvlist($deletes);
				update_ablist($vid);
			}

			//后审核
			if(!empty($auditarr)){
				hsk_audit_vgallery($auditarr, 1);
				update_ablist($vid);
			}

			showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR."&mod=manage&action=$action".$_types.$_fid.$_search);
		}
	}
}

?>