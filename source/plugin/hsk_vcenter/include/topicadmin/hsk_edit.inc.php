<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

if(!$discuz_uid)
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));

//检查是否有权限修改视频
$adminsql = $adminid == 1 ? null : "and m.uid='".$discuz_uid."'";
$query = DB::query("SELECT m.*, n.vsubject as abname, p.username, d.name, n.album as abalbum, n.purl as abpurl, n.sidstr as absidstr FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." n ON n.id=m.sup LEFT JOIN ".DB::table('common_member')." p ON p.uid=m.uid LEFT JOIN ".DB::table('vgallery_actor')." d ON d.aid=m.director WHERE m.id='$vid' $adminsql");
if(!$editvar = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
}

//如果是管理员，则不需要审核了！
$oraudit = $adminid==1 || $groupon_3 || !$isaudit ? 1 : 0;
$orclosed = $adminid==1 || $groupon_3 || !$isaudit ? 0 : 1;
$editvar['purl'] = getuseimg($editvar['purl'], $editvar['remote'], 'null');

//标签
$sidarray = $tagsendarray = array();
$sidarray = explode("\t", $editvar['tag']);
$i=0;
foreach($sidarray as $val){
	$sidnewarray = explode(',', $val);
	if($sidnewarray[0]){
		$tagsendarray[] = $sidnewarray[1];
		$i++;
	}
}
$taglistarray = implode(' ', $tagsendarray);

//演员
$sidarray = $sidlistarray = array();
$sidarray = explode("\t", $editvar['actor']);
$i=0;
foreach($sidarray as $val){
	$sidnewarray = explode(',', $val);
	if($sidnewarray[0]){
		$sidlistarray[] = $sidnewarray[1];
		$i++;
	}
}
$actorlistarray = implode(', ', $sidlistarray);
$director = $editvar['name'];


//处理分类信息
$sidarray = array();
for($i=1;$i<=4;$i++){
	$ic = 'sid'.($i==1 ? '' : $i);
	if($editvar[$ic]){
		$sidarray[] = $editvar[$ic];
	}
}

//调入处理TYPE类别
if(($editvar['album'] == 0 && $editvar['sup']==0) || $editvar['album']==3){
	//说明在编辑独立的视频
	$types = 1;
}elseif($editvar['album'] == 0 && $editvar['sup']){
	//说明在编辑专辑内的视频
	$editvar['abname'] = cutstr($editvar['abname'], 10, '..');
	if($editvar['abalbum'] == 1){
		//用户专辑
		$types = 3;
	}elseif($editvar['abalbum'] == 2){
		//公共专辑
		$types = 4;
	}elseif($editvar['abalbum'] == 3){
		//公共专辑
		$types = 5;
	}
}elseif($editvar['album']<3 && $editvar['album']>=1){
	//说明在编辑公共专辑||私有专辑
	$types = 2;
}

foreach($_SORT as $val){
	if(!$val['sup']){//重新生成所有一级分类
		if($val['regroup']){
			$tmpstr = (array)unserialize($val['regroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if($relemiss){
				$newsort[] = $val;
			}
		}else{$newsort[] = $val;}
	}
}

if($editvar['flashid'] && substr($editvar['flashid'],-2,1)=='_'){
	$getflashid = substr($editvar['flashid'], 0, -2);
	$rightflashid = substr($editvar['flashid'], -2);
}else{
	$getflashid = $editvar['flashid'];
}

if(!submitcheck('reportsubmit')) {

	$absidarr = "$editvar[sid]_$editvar[sid2]_$editvar[sid3]_$editvar[sid4]";
	$p = count($sidarray);

	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
		foreach($address_new as $key=>$val){
			$addres_arr['key'] = $key;
			$addres_arr['val'] = $val;
			$_ADDRESS[] = $addres_arr;
		}
		$addres_arr = array();
		unset($address_new);
	}
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
		foreach($years_new as $key=>$val){
			$addres_arr['key'] = $key;
			$addres_arr['val'] = $val;
			$_YEARS[] = $addres_arr;
		}
		unset($years_new);
		unset($address_new);
	}
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
		foreach($language_new as $key=>$val){
			$addres_arr['key'] = $key;
			$addres_arr['val'] = $val;
			$_LANGUAGE[] = $addres_arr;
		}
		unset($language_new);
		unset($address_new);
	}

	//一级类别
	$abfid = $onestyle = $editvar['fid'];
	$linkarr = array(1=>'ulist', 2=>'plist', 3=>'tvlist');

	//附加参数address  years  language 
	$editaddress = $editvar['address'];
	$edityears = $editvar['years'];
	$editlanguage = $editvar['language'];

	$timelong_1 = floor($editvar['timelong']/60);
	$timelong_2 = $editvar['timelong']%60;

	//根据TYPES类型调用附件的视频数据
	if($types == 1 && $editvar['album']!=3){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album=0 and abtotal>=0 and uid='$discuz_uid' and sup=0 and id<$vid ORDER BY id desc LIMIT 6");
	}elseif($types == 1 && $editvar['album']==3){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album=3 and abtotal>=0 and uid='$discuz_uid' and sup=0 and id<$vid ORDER BY id desc LIMIT 6");
	}elseif($types == 5){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and sup='$editvar[sup]' and id<$vid ORDER BY id desc LIMIT 6");
	}elseif($types == 3 || $types == 4){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and sup='$editvar[sup]' and id<$vid and uid='$discuz_uid' ORDER BY id desc LIMIT 6");
	}elseif($types == 2){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album='1' and id<$vid and uid='$discuz_uid' ORDER BY id LIMIT 6");
	}


	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$_myvodlist[$datarow['id']] = $datarow;
	}
	$prevsum = count($_myvodlist);

	$nextsum = max(7, (13-$prevsum));
	if($types == 1 && $editvar['album']!=3){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album=0 and abtotal>=0 and uid='$discuz_uid' and sup=0 and id>=$vid ORDER BY id LIMIT $nextsum");
	}elseif($types == 1 && $editvar['album']==3){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album=3 and abtotal>=0 and uid='$discuz_uid' and sup=0 and id>=$vid ORDER BY id LIMIT $nextsum");
	}elseif($types == 5){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and sup='$editvar[sup]' and id>=$vid ORDER BY id LIMIT $nextsum");
	}elseif($types == 3 || $types == 4){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and sup='$editvar[sup]' and id>=$vid and uid='$discuz_uid' ORDER BY id LIMIT $nextsum");
	}elseif($types == 2){
		$query = DB::query("SELECT id, vsubject FROM ".DB::table('vgallerys')." WHERE audit=1 and album='1' and id>=$vid and uid='$discuz_uid' ORDER BY id LIMIT $nextsum");
	}

	while($datarow = DB::fetch($query)){
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$_myvodlist[$datarow['id']] = $datarow;
	}

	sort($_myvodlist);

	//print_r($_myvodlist);exit("abc");
	$isreadonly = $isaddactor ? null : 'readonly';

	list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo(lang('plugin/hsk_vcenter', 'edit'));
	$navname = lang('plugin/hsk_vcenter', 'edit').lang('plugin/hsk_vcenter', 'thevod');
	$navtitle = $navname." - $navtitle";

	include template("topicadmin_edit", 'Kannol', PTEM);
	dexit();

}else{
	//提交后

	$s1					=	intval($_GET['s1']);

	if($s1){
		$thefid = 0;
		$chk_sort_miss = null;
		foreach($newsort as $datarow){
			if($datarow['sid'] == $s1){
				$chk_sort_miss = 1;
				$thefid = $datarow['band'];
				$sortmoney = $datarow['sortmoney'];
				$_maxwidth = $datarow['rewid'] && $datarow['rehei'] ? $datarow['rewid'] : $_maxwidth;
				$_maxheight = $datarow['rewid'] && $datarow['rehei'] ? $datarow['rehei'] : $_maxheight;
				if($datarow['type'] == 'sub')	$fupfid = $datarow['fup'];
			}
		}


		if(!$chk_sort_miss && $types != 3 && $types != 5)
			showmessage(lang('plugin/hsk_vcenter', 'nosortmiss'));
		
		//修改FID,加SQLdexit($thefid);
		$hsk_edit_sql = ", fid='$s1'";
		$hsk_post_sql = ", fid='$thefid'";
		$hsk_sube_sql = ", fid='$thefid'";

		if($editvar['album']==1 || $editvar['album']==3){
			//专辑和TV都要更新内含视频的参数
			$sup_sql = ", fid='$s1'";
		}
		
		$update_cache[] = 'fid';
	}else{
		showmessage(lang('plugin/hsk_vcenter', 'nosetsort'));
	}


	if($vod_option){
		$s2				=	intval($_GET['s2']);														//地区
		$s3				=	intval($_GET['s3']);														//年代
		$s4				=	intval($_GET['s4']);														//语言
		$directornew	= trim(dhtmlspecialchars($_GET['director']));									//导演
		$directornew	= str_replace('/', ',', $directornew);
		$actornew		= trim(dhtmlspecialchars($_GET['actor']));										//主演
		$actornew		= str_replace('/', ',', $actornew);
	}

	$sidnew				= dhtmlspecialchars($_GET['share_sid']);										//类别	
	$vpricenew			= intval($_GET['vprice']);														//价格
	$vurlnew			= trim(dhtmlspecialchars($_GET['vurl']));										//视频地址
	$newflashid			= trim(dhtmlspecialchars($_GET['newflashid']));								//flashid
	$tagsnew			= trim(dhtmlspecialchars($_GET['tags']));										//TAG
	$subjectnew			= censor(trim(dhtmlspecialchars($_GET['subject'])));							//标题
	$messagenew			= censor(substr(dhtmlspecialchars($_GET['message']),0,500));					//简介

	$timeonenew			= intval($_GET['timeone']);
	$timetwonew			= intval($_GET['timetwo']);
	$timelongnew		= $timeonenew*60+$timetwonew;													//上面三条时间

	$picstyle			= intval($_GET['picstyle']);													//上传截图相关		picstyle=1 网络图片
	$picstyle			= $picstyle==2 ? 2 : 1;
	$file2				= $picstyle == 1 ? dhtmlspecialchars($_GET['file2']) : null;
	$remote				= $_G['setting']['ftp']['on'] ? 1 : 0 ;											//是否开启远程图片
	$sendtvis			= $editvar['album']==1 ? intval($_GET['sendtvis']) : 0;						//生成剧集

	$editvar['vurl'] = trim(dhtmlspecialchars($editvar['vurl']));
	if($editvar['vurl'] == $vurlnew || $editvar['album']>0){}else{
		if($types == 4 || $types == 3 || $types == 1){
			if(strlen($vurlnew)<6 || strlen($vurl)>vurlnew){
				showmessage(lang('plugin/hsk_vcenter', 'nofindvodurl'));
			}
		}
		$hsk_edit_sql .= ", vurl='$vurlnew'";
	}

	if($editvar['vsubject'] == $subjectnew){}else{
		if(strlen($subjectnew)<2 || strlen($subjectnew)>180){
			showmessage(lang('plugin/hsk_vcenter', 'nopersubject'));
		}
		$hsk_edit_sql .= ", vsubject='$subjectnew'";
		$hsk_post_sql .= ", subject='$subjectnew'";
		$hsk_sube_sql .= ", subject='$subjectnew'";
	}

	if(!$tagsnew && !$tagsendarray){}else{
		$tags = sendtag($tagsnew, 4);
		if(!hsk_compare($tags, $tagsendarray)){
			//修改了TAG了，进行处理
			delete_tag($tagsendarray, $vid, 'HSKTAG');
			$tags_str = $tag_radio ? hsk_addtag($tagsnew, $vid, 'HSKTAG') : NULL;
			$hsk_edit_sql .= ", tag='$tags_str'";

			if($editvar['album']==3){
				//专辑和TV都要更新内含视频的参数
				$sup_sql .= ", tag='$tags_str'";
			}
			
			$update_cache[] = 'tag';
		}
	}

	$tags = null;
	if(!$actornew && !$sidlistarray){}else{
		$tags = sendtag($actornew, 8);
		if(!hsk_compare($tags, $sidlistarray)){
			//修改了演员了，进行处理
			delete_actor($sidlistarray, $vid, 'HSKACT');
			$actor_str = hsk_addactor($actornew, $vid, 'HSKACT');
			$hsk_edit_sql .= ", actor='$actor_str'";
		}
	}

	if($director != $directornew){
		//修改了导演，进行处理
		$director = hsk_director($directornew);
		$hsk_edit_sql .= ", director='$director'";
	}

	if($timelongnew){
		$hsk_edit_sql .= ", timelong='$timelongnew'";
	}

	if(!hsk_compare($sidarray, $sidnew) && $types !=3 && $types !=5){
		//修改了分类，需要进行处理
		$typeid = array(0=>0,1=>0,2=>0,3=>0);
		$chkid = $typeid = 0;
		$sid_str = null;
		foreach($sidnew as $val){
			if($chkid < 4){
				foreach($_SORT as $sval){
					if($sval['sid'] == $val){
						if($sval['sup'] == $s1){
							//二级分类于1级分类匹配
							$sid_str .= $sval['sid'].','.$sval['sort'].'\t';
							$sid_r[$chkid] = $sval['sid'];
							$typeid = $typeid ? $typeid : $sval['band'];
						}else{
							showmessage(lang('plugin/hsk_vcenter', 'nopersidfid'));
						}
					}
				}
			}
			$chkid++;
		}
		$hsk_edit_sql .= ", sid='$sid_r[0]', sid2='$sid_r[1]', sid3='$sid_r[2]', sid4='$sid_r[3]', sidstr='$sid_str', typeid='$typeid'";
		$hsk_sube_sql .= ", typeid='$typeid'";
		if($editvar['album']==1 || $editvar['album']==3){
			//专辑和TV都要更新内含视频的参数
			if($editvar['sidstr'] != $editvar['absidstr'] && $editvar['album']==1){}else{
				$sup_sql .= ", sid='$sid_r[0]', sid2='$sid_r[1]', sid3='$sid_r[2]', sid4='$sid_r[3]', sidstr='$sid_str', typeid='$typeid'";
			}
		}
		$update_cache[] = 'sid';
	}

	if($vpricenew == $editvar['vprice']){}else{
		if($vpricenew && $ispostmoney){
			if($vpricenew > $maxprice)
				$vpricenew = $maxprice;
		}else{
			$vpricenew = $sortmoney && $ispostmoney ? $sortmoney : 0;
		}
		$hsk_edit_sql .= ", vprice='$vpricenew'";
		$hsk_sube_sql .= ", price='$vpricenew'";
	}

	//处理FLASHID,$rightflashid
	$insdarr = array('_y', '_u', '_p', '_t', '_b', '_l', '_q', '_h', '_d', '_i', '_x');
	$insdright = substr($newflashid,-2);
	if(in_array($insdright, $insdarr)){
		$hsk_edit_sql .= ", flashid='$newflashid'";
	}else{
		if($getflashid == $newflashid && $newflashid){}else{
			if($rightflashid && $newflashid){
				$newflashid = $flashid.$rightflashid;
			}else{
				$newflashid = $newflashid;
			}
			$hsk_edit_sql .= ", flashid='$newflashid'";
		}
	}
	//dexit($editvar['flashid']);

	//判断是否有修改图片
	if($picstyle == 1 && $file2){
		if($file2 != $editvar['purl']){
			$changpic = 1;
		}
	}

	//判断附加参数
	if($s2 == $editvar['address']){}else{
		//修改地区
		$hsk_edit_sql .= ", address='$s2'";
	}

	if($s3 == $editvar['years']){}else{
		$hsk_edit_sql .= ", years='$s3'";
	}

	if($s4 == $editvar['language']){}else{
		$hsk_edit_sql .= ", language='$s4'";
	}

	//视频介绍messagenew
	$editvar['vinfo'] = censor(dhtmlspecialchars($editvar['vinfo']));
	if($messagenew == $editvar['vinfo']){}else{
		$hsk_edit_sql .= ", vinfo='$messagenew'";
	}

	if(!$s1 && $types != 3 && $types != 5){
		showmessage(lang('plugin/hsk_vcenter', 'nosetsort'));
	}

	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=------文件上传
	require_once FINC.'/upload.class.php';
	if($_FILES['file1'] && $picstyle == 2) {
		$newdir = './data/hskcenter/frontcover';
		$sqldirname = hsk_uploadimg($_FILES['file1'], $newdir);

		if(substr($editvar['purl'],0,7) != 'http://' && $editvar['abpurl'] != $editvar['purl']){
			$filename = $editvar['purl'];
			$remote = $editvar['remote'];
			$atta_arr = array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0);
			hsk_unlink($atta_arr);
		}

		$hsk_edit_sql .= ", purl='$sqldirname', remote='$remote'";

	} elseif($picstyle == 1 && $changpic){
		$sqldirname = hsk_getimg($file2, "./data/hskcenter/frontcover");

		if(substr($editvar['purl'],0,7) != 'http://' && $editvar['abpurl'] != $editvar['purl']){
			$filename = $editvar['purl'];
			$remote = $editvar['remote'];
			$atta_arr = array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0);
			hsk_unlink($atta_arr);
		}

		if(!$sqldirname){
			$sqldirname = $file2;
		}

		$hsk_edit_sql .= ", purl='$sqldirname', remote='$remote'";

	}
	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--------文件上传

	//开始升级数据库
	if($editvar['tid'] && $hsk_sube_sql){
		$expiration = $timestamp + 3600 * $timeoffset;
		$postdateline = gmdate("Y-m-d", $expiration);

		$tmp_list			= $getvar['tmp_list'];					//模板内容
		$free_list			= $getvar['free_list'];					//免费内容
		$postmessage = loadmsg($messagenew, $subjectnew, $editvar['username'], $vid, $vurlnew, $postdateline, $vpricenew, 1);

		DB::query("UPDATE ".DB::table('forum_thread')." SET closed='$orclosed'$hsk_sube_sql where tid='$editvar[tid]'");
		DB::query("UPDATE ".DB::table('forum_post')." SET message='$postmessage'$hsk_post_sql where pid='$editvar[pid]'");
	
	}

	//生成剧集   sendtvis
	$sendtvis = $editvar['uid'] == $discuz_uid || $adminid == 1 ? $sendtvis : 0;
	if($sendtvis){
		//确认有权限后开始转换	album
		//生成主题
		if($thefid){
			$strarr = array('fid'=>$thefid, 'posttableid'=>0, 'readperm'=>0, 'price'=>$vpricenew, 'typeid'=>$typeid, 'sortid'=>0, 'author'=>"$editvar[username]", 'authorid'=>"$editvar[uid]", 'subject'=>"$editvar[vsubject]", 'dateline'=>$timestamp,	'lastpost'=>$timestamp, 'lastposter'=>"$editvar[username]", 'displayorder'=>0, 'digest'=>0, 'special'=>0, 'attachment'=>0, 'moderated'=>0, 'highlight'=>0, 'closed'=>0, 'status'=>0, 'isgroup'=>0);
			$tid = DB::insert('forum_thread', $strarr, 1);

			$expiration = $timestamp + 3600 * $timeoffset;
			$postdateline = gmdate("Y-m-d", $expiration);

			require_once libfile('function/post');
			require_once libfile('function/forum');

			$pid = insertpost(array(
				'fid' => $thefid,
				'tid' => $tid,
				'first' => '1',
				'author' => $editvar['username'],
				'authorid' => $editvar['uid'],
				'subject' => $editvar['vsubject'],
				'dateline' => $_G['timestamp'],
				'message' => $postmessage,
				'useip' => $_G['clientip'],
				'invisible' => '0',
				'anonymous' => '0',
				'usesig' => '0',
				'htmlon' => '0',
				'bbcodeoff' => '0',
				'smileyoff' => '0',
				'parseurloff' => '0',
				'attachment' => '0',
				'tags' => $editvar['tag'],
				'replycredit' => 0,
				'status' => (defined('IN_MOBILE') ? 8 : 0)
			));
			
			updatepostcredits('+', $editvar['uid'], 'post', $thefid);
			$lastpost = "$tid\t".addslashes($editvar['vsubject'])."\t$timestamp\t$editvar[username]";
			DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid='$thefid'", 'UNBUFFERED');
			//是否有上极版块，如果有，更新上级版块
			if($fupfid){
				DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost' WHERE fid='$fupfid'", 'UNBUFFERED');
			}
			
			DB::query("UPDATE ".DB::table('vgallerys')." SET album='3', tid='$tid', pid='$pid' where id='$vid'");
			DB::query("UPDATE ".DB::table('vgallerys')." SET abtotal='-1' where sup='$vid'");

			$tmp_ablist	= $getvar['tmp_ablist'];
			update_ablist($vid);

		}else{
			DB::query("UPDATE ".DB::table('vgallerys')." SET album='3' where id='$vid'");
			DB::query("UPDATE ".DB::table('vgallerys')." SET abtotal='-1' where sup='$vid'");
		}
		//生成贴子
	}	


	if($hsk_edit_sql){
		DB::query("UPDATE ".DB::table('vgallerys')." SET audit='$oraudit'$hsk_edit_sql where id='$vid'");
		if($sup_sql && ($editvar['album']==1 || $editvar['album']==3)){
			//说明要更新下属内容
			DB::query("UPDATE ".DB::table('vgallerys')." SET sup='$vid'$sup_sql where sup='$vid'");
		}

		//开始更新缓存了
		foreach($update_cache as $val){
			if($val == 'fid'){
				//FID缓存
				hsk_fidupdate($editvar['fid']);
				hsk_fidupdate($s1);
			}elseif($val == 'sid'){
				$newarray = array_merge($sidarray, $sidnew);
				$newarray = array_unique($newarray);
				foreach($newarray as $keyid){
					hsk_sidupdate($keyid);
				}
			}elseif($val == 'tag'){
				hsk_taghot();
			}
		}
		//其它必要更新

		//最新视频缓存
		if($types == 1){
			if($editvar['album']==3){
				$tmp_ablist	= $getvar['tmp_ablist'];
				update_ablist($vid);
			}else{
				hsk_newvod();
			}
		}elseif($types == 2){
			hsk_newablist();
		}elseif($types == 5){
			$tmp_ablist	= $getvar['tmp_ablist'];
			update_ablist($editvar['sup']);
		}

	}
	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), PDIR."&mod=topicadmin&action=edit&vid=$vid");
}
	

?>