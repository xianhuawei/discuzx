<?php 


if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

//showmessage('登录提示', '', array(), array('login' => true));
if(!$discuz_uid)
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));

//是否可以给普通会员发布
if(!$groupon_2 && $adminid!=1)
	showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));

//处理类别控制信息
$sendtodoing		= $getvar['sendtodoing'];
$openplist			= $getvar['openplist'];
$p					= 0;
//如果是管理员，则不需要审核了！
$oraudit = $adminid==1 || $groupon_3 || !$isaudit ? 1 : 0;
$orclosed = $adminid==1 || $groupon_3 || !$isaudit ? 0 : 1;
$ortidaudit = $adminid==1 || $groupon_3 || !$isaudit ? 0 : -1;

if(!in_array($types, array(2,3,4)))		$types = 1;

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

//print_r($newsort);exit("abc");
$isreadonly = $isaddactor ? null : 'readonly';

//查访采集

$rules_folder= DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/include/';
$fp=opendir($rules_folder);
$rules_list = $rules_in = array();
while(false != $file = readdir($fp))
{
	if($file!='.' && $file!='..' && substr($file,-4)=='.php'){
		$file = substr($file, 0, -4);
		$rules_list[] = $file;
	}
}

if(($types == 3 || $types == 4) && $vid){
	if($types == 3){
		$query = DB::query("SELECT vsubject, id, uid, vsum, tid, fid, sid, sid2, sid3, sid4, remote, typeid, sidstr, pid, vinfo, audit FROM ".DB::table('vgallerys')." WHERE album=1 and id='$vid' and uid='$discuz_uid' and audit='1'");
	}else{
		$query = DB::query("SELECT vsubject, id, uid, vsum, tid, fid, sid, sid2, sid3, sid4, remote, typeid, sidstr, pid, vinfo, audit FROM ".DB::table('vgallerys')." WHERE album=2 and id='$vid' and audit='1'");
	}
	if($datarow = DB::fetch($query)){
	}else{//没有专辑
		showmessage(lang('plugin/hsk_vcenter', 'nofindlist'), PDIR.'&mod=release&types=$types');
	}
	//生成专辑专用参数
	$abid = $datarow['id'];
	$abnamec = cutstr($datarow['vsubject'], 30, '');
	$abname = $datarow['vsubject'];
	$abtid = $datarow['tid'];
	$abpid = $datarow['pid'];
	$absum = $datarow['vsum'];
	$abfid = $datarow['fid'];
	$absid = array(1=>$datarow['sid'], 2=>$datarow['sid2'], 3=>$datarow['sid3'], 4=>$datarow['sid4']);
	$absid = array_diff($absid, array(1=>0));
	$p = count(array_unique($absid));
	$absidarr = "$datarow[sid]_$datarow[sid2]_$datarow[sid3]_$datarow[sid4]";
	$abremote = $datarow['remote'];
	$absidstr = $datarow['sidstr'];
	$abtypeid = $datarow['typeid'];
	$abvinfo = $datarow['vinfo'];
	$abuid = $datarow['uid'];
	$abaudit = $datarow['audit'];

	unset($datarow);

}elseif(($types == 3 || $types == 4) && !$vid){
	showmessage(lang('plugin/hsk_vcenter', 'nofindlist'), PDIR.'&mod=release&types=$types');
}

if(!submitcheck('reportsubmit')) {

	if($types == 1 || $types == 2 || $types == 4){
		$onestyle = $abfid;
		foreach($newsort as $datarow){
			if(!$onestyle && !$datarow['sup']){
				$onestyle = $datarow['sid'];
			}
		}
	}

	
	list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo(lang('plugin/hsk_vcenter', 'm_release'));
	$navname = lang('plugin/hsk_vcenter', 'm_release');
	$navtitle = lang('plugin/hsk_vcenter', 'm_release')." - $navtitle";

	include template("gallery_release".$isleftr, 'Kannol', PTEM);
}else{

	$share_url	= trim(dhtmlspecialchars($_GET['share_url']));
	$parseLink = parse_url($share_url);
	if($share_url && !$parseLink['host']){
		showmessage(lang('plugin/hsk_vcenter', 'nofindurl'));
	}

	if($share_url && $parseLink['host']){

		$rules_folder= DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/include/';
		$fp=opendir($rules_folder);
		while(false != $file = readdir($fp))
		{
			if($file!='.' && $file!='..'){
				$file = substr($file, 0, -4);
				$indomain = strpos(strtolower($parseLink['host']), strtolower($file));
				if($indomain){
					closedir($fp);
					@require $rules_folder.$file.'.php';
					$file_get = TAR_get($share_url, $hosts[1]);
					break;
				}
			}
		}
		//自动分享的内容		print_r($file_get);dexit();

		if($types == 1 || $types == 2 || $types == 4){
			$onestyle = $abfid;
			foreach($newsort as $datarow){
				if(!$onestyle && !$datarow['sup']){
					$onestyle = $datarow['sid'];
				}
			}
		}

		list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo(lang('plugin/hsk_vcenter', 'm_release'));
		$navname = lang('plugin/hsk_vcenter', 'm_release');
		$navtitle = lang('plugin/hsk_vcenter', 'm_release')." - $navtitle";

		include template("gallery_release".$isleftr, 'Kannol', PTEM);
		dexit();
	}
	

	//提交后检查
	$s1				=	intval($_GET['s1']);														//1级分类		下面几行是类别有效性验证。和获取类别信息

	$thefid = 0;
	$chk_sort_miss = null;
	if($types == 3)	$s1 = $abfid;
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

	if(!$chk_sort_miss && $types != 3)
		showmessage(lang('plugin/hsk_vcenter', 'nosortmiss'));

	
	if($vod_option){
		$s2			=	intval($_GET['s2']);														//地区
		$s3			=	intval($_GET['s3']);														//年代
		$s4			=	intval($_GET['s4']);														//语言
		$director	= trim(dhtmlspecialchars($_GET['director']));									//导演
		$director	= str_replace('/', ',', $director);
		$actor		= trim(dhtmlspecialchars($_GET['actor']));										//主演
		$actor		= str_replace('/', ',', $actor);
	}
	$sid			= dhtmlspecialchars($_GET['share_sid']);										//类别	
	$vprice			= intval($_GET['vprice']);														//价格
	$vurl			= trim(dhtmlspecialchars($_GET['vurl']));										//视频地址
	$tags			= trim(dhtmlspecialchars($_GET['tags']));										//TAG
	$subject		= censor(trim(dhtmlspecialchars($_GET['subject'])));							//标题
	$message		= censor(substr(dhtmlspecialchars($_GET['message']),0,500));					//简介
	$flashid		= trim(dhtmlspecialchars($_GET['flashid']));							//标题

	$timeone		= intval($_GET['timeone']);
	$timetwo		= intval($_GET['timetwo']);
	$timelong		= $timeone*60+$timetwo;															//上面三条时间

	$picstyle		= intval($_GET['picstyle']);													//上传截图相关		picstyle=1 网络图片
	$picstyle		= $picstyle==2 ? 2 : 1;
	$file2			= $picstyle == 1 ? dhtmlspecialchars($_GET['file2']) : null;
	$abtype			= $openplist ? intval($_GET['abtype']) : 1;									//专辑类型

	$remote			= $_G['setting']['ftp']['on'] ? 1 : 0 ;											//是否开启远程图片

	if($types == 4 || $types == 3 || $types == 1){
		if(strlen($vurl)<6 || strlen($vurl)>250){
			showmessage(lang('plugin/hsk_vcenter', 'nofindvodurl'));
		}
	}

	if(strlen($subject)<2 || strlen($subject)>180){
		showmessage(lang('plugin/hsk_vcenter', 'nopersubject'));
	}

	//处理分类
	if($types != 3){
		$typeid = array(0=>0,1=>0,2=>0,3=>0);
		$chkid = $typeid = 0;
		$sid_str = null;
		foreach($sid as $val){
			if($chkid < 4){
				foreach($_SORT as $sval){
					if($sval['sid'] == $val){
						if($sval['sup'] == $s1){
							//二级分类于1级分类匹配
							$sid_str .= $sval['sid'].",".$sval['sort']."\t";
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
	}

	if($vprice && $ispostmoney){
		if($vprice > $maxprice)
			$vprice = $maxprice;
	}else{
		$vprice = $sortmoney && $ispostmoney ? $sortmoney : 0;
	}

	if((!$s1 || !$sid_str || !$sid_r) && $types != 3){
		showmessage(lang('plugin/hsk_vcenter', 'nosetsort'));
	}

	if($types == 1){
		$query = DB::query("SELECT id FROM ".DB::table('vgallerys')." WHERE vurl='$vurl' and uid='$discuz_uid'");
		if($pidate = DB::fetch($query)){
			showmessage(lang('plugin/hsk_vcenter', 'nolikevod'));
		}
	}elseif($types == 3 || $types == 4){
		$query = DB::query("SELECT id FROM ".DB::table('vgallerys')." WHERE vsubject='$subject' and sup='$vid'");
		if($pidate = DB::fetch($query)){
			showmessage(lang('plugin/hsk_vcenter', 'nolikevod'));
		}
	}

	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=------文件上传
	require_once FINC.'/upload.class.php';
	if($_FILES['file1'] && $picstyle == 2) {
		$newdir = './data/hskcenter/frontcover';
		$sqldirname = hsk_uploadimg($_FILES['file1'], $newdir);
	} elseif($picstyle == 1 && $file2){
		$sqldirname = hsk_getimg($file2, "./data/hskcenter/frontcover");
		if(!$sqldirname){
			$sqldirname = $file2;
		}
	}else{
		$sqldirname = $file2;
	}
	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--------文件上传

	
	//开始上传视频信息
	if($types == 1){		//上传单视频
		if($thefid){		//绑定版块

			//取自定义模板信息
			$tmp_list			= $getvar['tmp_list'];					//模板内容
			$free_list			= $getvar['free_list'];					//免费内容

			//上传主题数据
			$strarr = array('fid'=>$thefid, 'posttableid'=>0, 'readperm'=>0, 'price'=>$vprice, 'typeid'=>$typeid, 'sortid'=>0, 'author'=>"$discuz_user", 'authorid'=>"$discuz_uid", 'subject'=>"$subject", 'dateline'=>$timestamp,						'lastpost'=>$timestamp, 'lastposter'=>"$discuz_user", 'displayorder'=>0, 'digest'=>0, 'special'=>0, 'attachment'=>0, 'moderated'=>0, 'highlight'=>0, 'closed'=>$orclosed, 'displayorder'=>$ortidaudit, 'status'=>0, 'isgroup'=>0);
			$tid = DB::insert('forum_thread', $strarr, 1);

			//上传视频信息
			$strarr = array();	
			$director = hsk_director($director);
			$strarr = array('fid'=>$s1, 'sid'=>$sid_r[0], 'sid2'=>$sid_r[1], 'sid3'=>$sid_r[2], 'sid4'=>$sid_r[3], 'sidstr'=>"$sid_str", 'typeid'=>$typeid, 'tid'=>$tid, 'pid'=>0, 'vprice'=>$vprice, 'album'=>0, 'sup'=>0, 'vsum'=>0, 'abtotal'=>0, 'subid'=>0, 'vsubject'=>"$subject", 'vurl'=>"$vurl", 'tvurl'=>'', 'flashid'=>"$flashid", 'purl'=>"$sqldirname", 'address'=>$s2, 'years'=>$s3, 'language'=>$s4, 'director'=>$director, 'actor'=>"", 'uid'=>$discuz_uid, 'dateline'=>$timestamp, 'timelong'=>$timelong, 'views'=>1, 'polls'=>0, 'valuate'=>0, 'audit'=>$oraudit, 'tag'=>"", 'replyuid'=>0, 'updateline'=>$timestamp, 'pgallery'=>0, 'remote'=>$remote, 'vinfo'=>"$message");
			$newid = DB::insert('vgallerys', $strarr, 1);

			$actor_str = hsk_addactor($actor, $newid, 'HSKACT');
			$tags_str = $tag_radio ? hsk_addtag($tags, $newid, 'HSKTAG') : NULL;
			
			$expiration = $timestamp + 3600 * $timeoffset;
			$postdateline = gmdate("Y-m-d", $expiration);
			$postmessage = loadmsg($message, $subject, $discuz_user, $newid, $vurl, $postdateline, $vprice, 1);

			require_once libfile('function/post');
			require_once libfile('function/forum');

			$pid = insertpost(array(
				'fid' => $thefid,
				'tid' => $tid,
				'first' => '1',
				'author' => $_G['username'],
				'authorid' => $_G['uid'],
				'subject' => $subject,
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
				'tags' => $tags_str,
				'replycredit' => 0,
				'status' => (defined('IN_MOBILE') ? 8 : 0)
			));
			
			updatepostcredits('+', $discuz_uid, 'post', $thefid);
			$lastpost = "$tid\t".addslashes($subject)."\t$timestamp\t$discuz_user";
			DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid='$thefid'", 'UNBUFFERED');
			//是否有上极版块，如果有，更新上级版块
			if($fupfid){
				DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost' WHERE fid='$fupfid'", 'UNBUFFERED');
			}
			DB::query("UPDATE ".DB::table('vgallerys')." SET pid='$pid', tag='$tags_str', actor='$actor_str' WHERE id='$newid'");
			DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares+1 WHERE mid='$discuz_uid'");


		}else{

			$strarr = array();	
			$director = hsk_director($director);
			$strarr = array('fid'=>$s1, 'sid'=>$sid_r[0], 'sid2'=>$sid_r[1], 'sid3'=>$sid_r[2], 'sid4'=>$sid_r[3], 'sidstr'=>"$sid_str", 'typeid'=>0, 'tid'=>0, 'pid'=>0, 'vprice'=>$vprice, 'album'=>0, 'sup'=>0, 'vsum'=>0, 'abtotal'=>0, 'subid'=>0, 'vsubject'=>"$subject", 'vurl'=>"$vurl", 'tvurl'=>'', 'flashid'=>"$flashid", 'purl'=>"$sqldirname", 'address'=>$s2, 'years'=>$s3, 'language'=>$s4, 'director'=>$director, 'actor'=>"", 'uid'=>$discuz_uid, 'dateline'=>$timestamp, 'timelong'=>$timelong, 'views'=>1, 'polls'=>0, 'valuate'=>0, 'audit'=>$oraudit, 'tag'=>"", 'replyuid'=>0, 'updateline'=>$timestamp, 'pgallery'=>0, 'remote'=>$remote, 'vinfo'=>"$message");
			$newid = DB::insert('vgallerys', $strarr, 1);

			$actor_str = hsk_addactor($actor, $newid, 'HSKACT');
			$tags_str = $tag_radio ? hsk_addtag($tags, $newid, 'HSKTAG') : NULL;

			DB::query("UPDATE ".DB::table('vgallerys')." SET tag='$tags_str', actor='$actor_str' WHERE id='$newid'");
			DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares+1 WHERE mid='$discuz_uid'");
		}

		//更新到个人动态
		if($sendtodoing){
			$setarr = array(
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'message' => $subject,
				'ip' => $_G['clientip'],
				'status' => '0',
			);
			$newdoid = DB::insert('home_doing', $setarr, 1);

			$feedmsg = lang('plugin/hsk_vcenter', 'sendtodoing')."<a href=\"".sendurl('show', 0, $newid)."\" target=\"_blank\">$subject</a>";
			$feedarr = array(
				'appid' => '',
				'icon' => 'doing',
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'title_template' => lang('feed', 'feed_doing_title'),
				'title_data' => daddslashes(serialize(dstripslashes(array('message'=>$feedmsg)))),
				'body_template' => '',
				'body_data' => '',
				'id' => $newdoid,
				'idtype' => 'doid'
			);

			DB::insert('home_feed', $feedarr);

			$setarr = array('recentnote'=>$feedmsg, 'spacenote'=>$feedmsg);
			$credit = $experience = 0;
			$extrasql = array('doings' => 1);
			DB::update('common_member_field_home', $setarr, "uid='$_G[uid]'");
		}

		//创建和更新缓存
		if($oraudit){
			for($i=0; $i<=4; $i++){
				//更新4个类别
				if($sid_r[$i]){
					hsk_sidupdate($sid_r[$i]);
				}
			}
			
			//一级类别
			hsk_fidupdate($s1);
		}
		
		//标签缓存
		if($tag_radio){hsk_taghot();}

		//最新视频缓存
		hsk_newvod();

		//热点播客缓存
		hsk_hotuser();

		showmessage($oraudit ? lang('plugin/hsk_vcenter', 'release_ok') : lang('plugin/hsk_vcenter', 'release_ok').lang('plugin/hsk_vcenter', 'release_audit'), sendurl('show', 0, $newid));

	}elseif($types == 2){		//创建专辑			

		$strarr = array();	
		$strarr = array('fid'=>$s1, 'sid'=>$sid_r[0], 'sid2'=>$sid_r[1], 'sid3'=>$sid_r[2], 'sid4'=>$sid_r[3], 'sidstr'=>"$sid_str", 'typeid'=>$typeid, 'tid'=>0, 'pid'=>0, 'vprice'=>0, 'album'=>$abtype, 'sup'=>0, 'vsum'=>0, 'abtotal'=>0, 'subid'=>0, 'vsubject'=>"$subject", 'vurl'=>"", 'tvurl'=>'', 'flashid'=>'', 'purl'=>"$sqldirname", 'address'=>0, 'years'=>0, 'language'=>0, 'director'=>0, 'actor'=>"", 'uid'=>$discuz_uid, 'dateline'=>$timestamp, 'timelong'=>0, 'views'=>1, 'polls'=>0, 'valuate'=>0, 'audit'=>$oraudit, 'tag'=>"", 'replyuid'=>0, 'updateline'=>$timestamp, 'pgallery'=>0, 'remote'=>$remote, 'vinfo'=>"$message");
		$newid = DB::insert('vgallerys', $strarr, 1);

		$tags_str = $tag_radio ? hsk_addtag($tags, $newid, 'HSKTAG') : NULL;

		DB::query("UPDATE ".DB::table('vgallerys')." SET tag='$tags_str' WHERE id='$newid'");
		DB::query("UPDATE ".DB::table('vgallery_member')." SET ablists=ablists+1 WHERE mid='$discuz_uid'");

		//更新到个人动态
		if($sendtodoing){
			$setarr = array(
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'message' => $subject,
				'ip' => $_G['clientip'],
				'status' => '0',
			);
			$newdoid = DB::insert('home_doing', $setarr, 1);

			$feedmsg = lang('plugin/hsk_vcenter', 'sendablist')."<a href=\"".sendurl('dlist', 0, $newid)."\" target=\"_blank\">$subject</a>";
			$feedarr = array(
				'appid' => '',
				'icon' => 'doing',
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'title_template' => lang('feed', 'feed_doing_title'),
				'title_data' => daddslashes(serialize(dstripslashes(array('message'=>$feedmsg)))),
				'body_template' => '',
				'body_data' => '',
				'id' => $newdoid,
				'idtype' => 'doid'
			);

			DB::insert('home_feed', $feedarr);

			$setarr = array('recentnote'=>$feedmsg, 'spacenote'=>$feedmsg);
			$credit = $experience = 0;
			$extrasql = array('doings' => 1);
			DB::update('common_member_field_home', $setarr, "uid='$_G[uid]'");
		}
		
		//标签缓存
		if($tag_radio){hsk_taghot();}

		//最新视频缓存
		hsk_newablist();

		//热点播客缓存
		hsk_hotuser();

		showmessage(lang('plugin/hsk_vcenter', 'abrelease_ok'), sendurl('show', 0, $newid));

	}elseif($types == 3 || $types == 4){
		if($thefid){			//绑定版块

			//取自定义模板信息
			$tmp_list			= $getvar['tmp_list'];					//模板内容
			$free_list			= $getvar['free_list'];					//免费内容

			if($types == 4){		//投放公共视频时，不是管理员或审核员时，需要审核视频
				$orclosed = $groupon_3 || $adminid == 1 || ($discuz_uid == $abuid && $abaudit) ? 0 : 1;
				$oraudit = $orclosed ? 0 : 1;
				$ortidaudit = $orclosed ? 0 : -1;
				if($s1 && $sid_str){//独立选择了视频的类别的
					$abfid = $s1;
					$absid[1] = $sid_r[0];$absid[2] = $sid_r[1];$absid[3] = $sid_r[2];$absid[4] = $sid_r[3];
					$abtypeid = $typeid;
				}					
				$vprice = 0;		//公共视频不能售价
			}

			//上传主题数据
			$strarr = array('fid'=>$thefid, 'posttableid'=>0, 'readperm'=>0, 'price'=>$vprice, 'typeid'=>$abtypeid, 'sortid'=>0, 'author'=>"$discuz_user", 'authorid'=>"$discuz_uid", 'subject'=>"$subject", 'dateline'=>$timestamp,						'lastpost'=>$timestamp, 'lastposter'=>"$discuz_user", 'displayorder'=>0, 'digest'=>0, 'special'=>0, 'attachment'=>0, 'moderated'=>0, 'highlight'=>0, 'closed'=>$orclosed, 'displayorder'=>$ortidaudit, 'status'=>0, 'isgroup'=>0);
			$tid = DB::insert('forum_thread', $strarr, 1);

			//上传专辑内的视频
			$strarr = array();	
			$strarr = array('fid'=>$abfid, 'sid'=>$absid[1], 'sid2'=>$absid[2], 'sid3'=>$absid[3], 'sid4'=>$absid[4], 'sidstr'=>"$absidstr", 'typeid'=>$abtypeid, 'tid'=>$tid, 'pid'=>0, 'vprice'=>$vprice, 'album'=>0, 'sup'=>$abid, 'vsum'=>0, 'abtotal'=>0, 'subid'=>0, 'vsubject'=>"$subject", 'vurl'=>"$vurl", 'tvurl'=>'', 'flashid'=>"$flashid", 'purl'=>"$sqldirname", 'address'=>'', 'years'=>'', 'language'=>'', 'director'=>'', 'actor'=>"", 'uid'=>$discuz_uid, 'dateline'=>$timestamp, 'timelong'=>$timelong, 'views'=>1, 'polls'=>0, 'valuate'=>0, 'audit'=>$oraudit, 'tag'=>"", 'replyuid'=>0, 'updateline'=>$timestamp, 'pgallery'=>0, 'remote'=>$remote, 'vinfo'=>"$message");
			$newid = DB::insert('vgallerys', $strarr, 1);

			$tags_str = $tag_radio ? hsk_addtag($tags, $newid, 'HSKTAG') : NULL;
			
			$expiration = $timestamp + 3600 * $timeoffset;
			$postdateline = gmdate("Y-m-d", $expiration);
			$postmessage = loadmsg($message, $subject, $discuz_user, $newid, $vurl, $postdateline, $vprice, 1);

			require_once libfile('function/post');
			require_once libfile('function/forum');

			$pid = insertpost(array(
				'fid' => $thefid,
				'tid' => $tid,
				'first' => '1',
				'author' => $_G['username'],
				'authorid' => $_G['uid'],
				'subject' => $subject,
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
				'tags' => $tags_str,
				'replycredit' => 0,
				'status' => (defined('IN_MOBILE') ? 8 : 0)
			));
			
			updatepostcredits('+', $discuz_uid, 'post', $thefid);
			$lastpost = "$tid\t".addslashes($subject)."\t$timestamp\t$discuz_user";
			DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid='$thefid'", 'UNBUFFERED');
			//是否有上极版块，如果有，更新上级版块
			if($fupfid){
				DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost' WHERE fid='$fupfid'", 'UNBUFFERED');
			}

			DB::query("UPDATE ".DB::table('vgallerys')." SET pid='$pid', tag='$tags_str' WHERE id='$newid'");
			DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum+1 WHERE id='$abid'");
			DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares+1 WHERE mid='$discuz_uid'");


		}else{

			$strarr = array();	
			$strarr = array('fid'=>$abfid, 'sid'=>$absid[1], 'sid2'=>$absid[2], 'sid3'=>$absid[3], 'sid4'=>$absid[4], 'sidstr'=>"$absidstr", 'typeid'=>$abtypeid, 'tid'=>$abtid, 'pid'=>$abpid, 'vprice'=>0, 'album'=>0, 'sup'=>$abid, 'vsum'=>0, 'abtotal'=>0, 'subid'=>0, 'vsubject'=>"$subject", 'vurl'=>"$vurl", 'tvurl'=>'', 'flashid'=>"$flashid", 'purl'=>"$sqldirname", 'address'=>0, 'years'=>0, 'language'=>0, 'director'=>0, 'actor'=>"", 'uid'=>$discuz_uid, 'dateline'=>$timestamp, 'timelong'=>$timelong, 'views'=>1, 'polls'=>0, 'valuate'=>0, 'audit'=>$oraudit, 'tag'=>"", 'replyuid'=>0, 'updateline'=>$timestamp, 'pgallery'=>0, 'remote'=>$remote, 'vinfo'=>"$message");
			$newid = DB::insert('vgallerys', $strarr, 1);

			$tags_str = $tag_radio ? hsk_addtag($tags, $newid, 'HSKTAG') : NULL;

			DB::query("UPDATE ".DB::table('vgallerys')." SET tag='$tags_str' WHERE id='$newid'");
			DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum+1 WHERE id='$abid'");
			DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares+1 WHERE mid='$discuz_uid'");
		}

		//更新到个人动态
		if($sendtodoing){
			$setarr = array(
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'message' => $subject,
				'ip' => $_G['clientip'],
				'status' => '0',
			);
			$newdoid = DB::insert('home_doing', $setarr, 1);

			$feedmsg = lang('plugin/hsk_vcenter', 'sendtodoing')."<a href=\"".sendurl('show', 0, $newid)."\" target=\"_blank\">$subject</a>";
			$feedarr = array(
				'appid' => '',
				'icon' => 'doing',
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => $_G['timestamp'],
				'title_template' => lang('feed', 'feed_doing_title'),
				'title_data' => daddslashes(serialize(dstripslashes(array('message'=>$feedmsg)))),
				'body_template' => '',
				'body_data' => '',
				'id' => $newdoid,
				'idtype' => 'doid'
			);

			DB::insert('home_feed', $feedarr);

			$setarr = array('recentnote'=>$feedmsg, 'spacenote'=>$feedmsg);
			$credit = $experience = 0;
			$extrasql = array('doings' => 1);
			DB::update('common_member_field_home', $setarr, "uid='$_G[uid]'");
		}

		//创建和更新缓存
		if($oraudit){
			for($i=0; $i<=4; $i++){
				//更新4个类别
				if($absid[$i]){
					hsk_sidupdate($absid[$i]);
				}
			}
			
			//一级类别
			hsk_fidupdate($abfid);
		}
		
		//标签缓存
		if($tag_radio){hsk_taghot();}

		//最新视频缓存
		hsk_newvod();

		//最新专辑缓存
		hsk_newablist();

		//热点播客缓存
		hsk_hotuser();
		
		showmessage($oraudit ? lang('plugin/hsk_vcenter', 'release_ok') : lang('plugin/hsk_vcenter', 'release_ok').lang('plugin/hsk_vcenter', 'release_audit'), sendurl('show', 0, $newid));
	}

}



?>