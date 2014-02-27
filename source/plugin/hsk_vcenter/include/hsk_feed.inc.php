<?php 

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	dexit('Access Denied');
}

if($discuz_uid){
	//提取打分、顶、踩数据
	$self_ding = $self_cai = $self_ding_cai = $self_poll = $doing = 0;
	$query = DB::query("SELECT * FROM ".DB::table('vgallery_evaluate')." WHERE vid='$vid' and uid='$discuz_uid'");
	while($datarow = DB::fetch($query)){
		if($datarow['chk_up']){
			$self_ding_cai = 1;
			$self_ding = 1;
		}elseif($datarow['chk_down']){
			$self_ding_cai = 1;
			$self_cai = 1;
		}
		if($datarow['polls']){
			$self_poll = 1;
		}
	}
}


//打分开始
$rage = intval($_GET['rage']);
if($rage && !$error){

	if(!$discuz_uid){
		$error_lang = lang('plugin/hsk_vcenter', 'nopermission');
		$error = 4;
	}

	if($self_poll){
		$error = 1;									//error_1		重复评分
		$error_lang = lang('plugin/hsk_vcenter', 'pollerror_1');
	}elseif(!$error){
		if($rage>0 && $rage<=10){
			//开始打分

			//提取视频数据
			$update = 0;
			$query = DB::query("SELECT evaluate_r, evaluate_c FROM ".DB::table('vgallery_evaluate_tc')." WHERE vid='$vid'");
			if(!$datarow = DB::fetch($query)){
				$evaluate_r = $evaluate_c = 0;
			}else{
				$update = 1;
				$evaluate_r = $datarow['evaluate_r'];
				$evaluate_c = $datarow['evaluate_c'];
			}

			//计算新分数
			$evaluate_r = $evaluate_r + 1;
			$evaluate_c = $evaluate_c + $rage*100;

			$rage_new = floor($evaluate_c/$evaluate_r);
		
			DB::query("INSERT INTO ".DB::table('vgallery_evaluate')." (vid, uid, dateline, chk_up, chk_down, polls)
						VALUES ('$vid', '$discuz_uid', '$timestamp', '0', '0', '$rage')");
			DB::query("UPDATE ".DB::table('vgallerys')." SET valuate='$rage_new' WHERE id='$vid'");
			if($update){
				DB::query("UPDATE ".DB::table('vgallery_evaluate_tc')." SET evaluate_r='$evaluate_r', evaluate_c='$evaluate_c' WHERE vid='$vid'");
			}else{
				DB::query("INSERT INTO ".DB::table('vgallery_evaluate_tc')." (vid, evaluate_r, evaluate_c) VALUES ('$vid', '$evaluate_r', '$evaluate_c')");
			}
			$self_poll = 1;
			$doing = 1;

			//热点播客缓存
			hsk_hotuser();
		}else{
			$error = 2;								//error_2		评分范围1-10分
			$error_lang = lang('plugin/hsk_vcenter', 'pollerror_2');
		}
	}
}

//顶
$chk_up = intval($_GET['chk_up']);
if($chk_up && !$error){

	if(!$discuz_uid){
		$error_lang = lang('plugin/hsk_vcenter', 'nopermission');
		$error = 4;
	}

	if($self_ding_cai){
		$error = 3;									//error_3		重复顶
		$error_lang = lang('plugin/hsk_vcenter', 'pollerror_3');
	}elseif(!$error){
		//开始打分
		DB::query("INSERT INTO ".DB::table('vgallery_evaluate')." (vid, uid, dateline, chk_up, chk_down, polls)
					VALUES ('$vid', '$discuz_uid', '$timestamp', '1', '0', '0')");
		DB::query("UPDATE ".DB::table('vgallerys')." SET chk_up=chk_up+1 WHERE id='$vid'");
		$doing = 2;
		$self_ding_cai = $self_ding = 1;

		//热点播客缓存
		hsk_hotuser();
	}
}

//踩
$chk_down = intval($_GET['chk_down']);
if($chk_down && !$error){

	if(!$discuz_uid){
		$error_lang = lang('plugin/hsk_vcenter', 'nopermission');
		$error = 4;
	}

	if($self_ding_cai){
		$error = 3;									//error_3		重复踩
		$error_lang = lang('plugin/hsk_vcenter', 'pollerror_3');
	}else{
		//开始打分
		DB::query("INSERT INTO ".DB::table('vgallery_evaluate')." (vid, uid, dateline, chk_up, chk_down, polls)
					VALUES ('$vid', '$discuz_uid', '$timestamp', '0', '1', '0')");
		DB::query("UPDATE ".DB::table('vgallerys')." SET chk_down=chk_down+1 WHERE id='$vid'");
		$doing = 3;
		$self_ding_cai = $self_cai = 1;
	}
}


//提取视频数据
$query = DB::query("SELECT v.id, v.fid, v.valuate, v.polls, v.views, v.chk_up, v.chk_down, v.sup, v.vurl, v.uid, v.abtotal, ab.views as abviews, ab.polls as abpolls FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup WHERE v.id='$vid'");
if(!$viewdata = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
$viewdata['valuate'] = sprintf("%01.1f", $viewdata['valuate']/100);
$thesup = $viewdata['sup'];
$viewdata['polls'] = $viewdata['abtotal'] == -1 ? $viewdata['abpolls'] : $viewdata['polls'];
$viewdata['views'] = $viewdata['abtotal'] == -1 ? $viewdata['abviews'] : $viewdata['views'];

if($thesup && $doing){//专辑也要被顶上和评分
	if($doing == 1){
		$query = DB::query("SELECT evaluate_r, evaluate_c FROM ".DB::table('vgallery_evaluate_tc')." WHERE vid='$thesup'");
		$update = 0;
		if(!$datarow = DB::fetch($query)){
			$evaluate_r = $evaluate_c = 0;
		}else{
			$update = 1;
			$evaluate_r = $datarow['evaluate_r'];
			$evaluate_c = $datarow['evaluate_c'];
		}

		//计算新分数
		$evaluate_r = $evaluate_r + 1;
		$evaluate_c = $evaluate_c + $rage*100;

		$rage_new = floor($evaluate_c/$evaluate_r);
		DB::query("UPDATE ".DB::table('vgallerys')." SET valuate='$rage_new' WHERE id='$thesup'");

		if($update){
			DB::query("UPDATE ".DB::table('vgallery_evaluate_tc')." SET evaluate_r='$evaluate_r', evaluate_c='$evaluate_c' WHERE vid='$thesup'");
		}else{
			DB::query("INSERT INTO ".DB::table('vgallery_evaluate_tc')." (vid, evaluate_r, evaluate_c) VALUES ('$thesup', '$evaluate_r', '$evaluate_c')");
		}

	}elseif($doing == 2){
		DB::query("UPDATE ".DB::table('vgallerys')." SET chk_up=chk_up+1 WHERE id='$thesup'");
	}elseif($doing == 3){
		DB::query("UPDATE ".DB::table('vgallerys')." SET chk_down=chk_down+1 WHERE id='$thesup'");
	}
}

if($doing){
	hsk_dingvod();
	if($discuz_uid != $viewdata['uid']){	//播主增加一个热点
		DB::query("UPDATE ".DB::table('vgallery_member')." SET hots=hots+1, pushup=pushup+1 WHERE mid='$viewdata[uid]'");
		//热点播客缓存
		hsk_hotuser();
	}
}

foreach($_SORT as $datarow2){
	if($viewdata['fid'] == $datarow2['sid']){
		if($datarow2['sygroup']){
			$tmpstr = (array)unserialize($datarow2['sygroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if(!$relemiss && $adminid != 1){
				unset($viewdata);
				showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
			}
		}
	}
}

include template("ajax_feed", 'Kannol', PTEM);
?>