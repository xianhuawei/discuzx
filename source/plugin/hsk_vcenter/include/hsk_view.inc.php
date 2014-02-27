<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$tid = intval($_GET['tid']);
if(!$vid && !$tid)	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));

$tid = $vid ? 0 : $tid;

$wheretv = $tid ? "m.tid='$tid'" : "m.id='$vid'";
//检查是否有权限，权限1、管理员，权限2、自己
$query = DB::query("SELECT m.*, p.username, u.shares, u.ablists, u.hots, u.pushup, ab.album as ab_album, ab.vsubject as absubject, ab.address as ab_address, ab.years as ab_years, ab.language as ab_language, ab.sidstr as ab_sidstr, ab.tag as ab_tag, ab.polls as abpoll, ab.purl as abimage, ab.remote as abremote FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('common_member')." p USING(uid) LEFT JOIN ".DB::table('vgallery_member')." u ON u.mid=m.uid LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id='$vid'");
if(!$viewdata = DB::fetch($query))	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
$viewdata['dateline'] = gmdate("Y年m月d日, H:i", $viewdata['dateline'] + $timeoffset * 3600);
$viewdata['vinfo'] = nl2br($viewdata['vinfo']);
if(!$viewdata['purl']){
	$viewdata['purl'] = getuseimg($viewdata['abimage'], $viewdata['abremote']);
}else{
	$viewdata['purl'] = getuseimg($viewdata['purl'], $viewdata['remote']);
}

$viewdata['address']	= $viewdata['address'] ? $viewdata['address'] : $viewdata['ab_address'];
$viewdata['years']		= $viewdata['years'] ? $viewdata['years'] : $viewdata['ab_years'];
$viewdata['language']	= $viewdata['language'] ? $viewdata['language'] : $viewdata['ab_language'];

$viewdata['polls']	= $viewdata['abtotal'] == -1 ? $viewdata['abpoll'] : $viewdata['polls'];
$viewdata['views'] ++;
$thesup = $viewdata['sup'];

//生成作者数据
$sid				= $viewdata['sid'];
$tid				= $viewdata['tid'];
$vid				= $viewdata['id'];
$author['uid']		= $viewdata['uid'];
$author['username'] = $viewdata['username'];
$author['myshare']	= $viewdata['shares'];
$author['myablist'] = $viewdata['ablists'];
$author['myhots']	= $viewdata['hots'];

if($viewdata['album']){	//跳转到专辑列表
	$locationurl = sendurl('dlist',0,$vid,0,0,0);
	header("location: $locationurl");
	exit();
}

if($thesup)		DB::query("UPDATE ".DB::table('vgallerys')." SET views=views+1 where id='$thesup'");
if($tid)		DB::query("UPDATE ".DB::table('forum_thread')." SET views=views+1 where tid='$tid'");
				DB::query("UPDATE ".DB::table('vgallerys')." SET views=views+1 where id='$vid'");

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
}

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
}

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
}

foreach($_SORT as $sidrow){
	if($sidrow['sid'] == $sid){
		$fid = $sidrow['sup'];		//得到一级目录的ID
		$sidsname = $sidrow['sort'];
	}
}

foreach($_SORT as $datarow2){
	if($fid == $datarow2['sid']){
		$istv = $datarow2['istv'];
		$sortname = $datarow2['sort'];
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

if(!$thesup && $istv){
	$viewdata['absubject'] = lang('plugin/hsk_vcenter',  'vod_ablist');
	$thesup = $vid;
}elseif($thesup && $viewdata['ab_album'] <3 && $viewdata['ab_album'] >0){
	$viewdata['absubject'] = lang('plugin/hsk_vcenter',  'thevlist');
}

//整理所属视频类别
$sidarray = array();
$viewdata['sidstr'] = $viewdata['sidstr'] ? $viewdata['sidstr'] : $viewdata['ab_sidstr'];
$sidarray = explode("\t", $viewdata['sidstr']);
$i=0;
foreach($sidarray as $val){
	$sidnewarray = explode(',', $val);
	if($sidnewarray[0]){
		$sidlistarray[$i]['sid'] = $sidnewarray[0];
		$sidlistarray[$i]['sort'] = $sidnewarray[1];
		$i++;
	}
}

//有TAG，生成TAG数组
$sidarray = array();
$viewdata['tag'] = $viewdata['tag'] ? $viewdata['tag'] : $viewdata['ab_tag'];
$sidarray = explode("\t", $viewdata['tag']);

foreach($sidarray as $val){
	$sidnewarray = explode(',', $val);
	if($sidnewarray[0]){
		$taglistarray[] = $sidnewarray[0];
		$tagstrlist[] = $sidnewarray;
	}
}

//视频类型
$vodurl = $viewdata['vurl'];
$domain_array = $getvar['domain_array'];						//指定播放器列表
$domain_array = explode("\n", $domain_array);
$parseLink = parse_url($vodurl);
$thevodsite = strtolower($parseLink['host']);

foreach($domain_array as $val){
	$val = trim($val);
	$indomain = strpos($thevodsite, strtolower($val));
	if($indomain){
		$vod_style = $val;
		break;
	}
}

//土豆、优酷的高清选择
$hdchange = $getvar['hdchange'];//高清切换
if($hdchange && (strrpos($thevodsite, strtolower('youku.com')) || strrpos($thevodsite, strtolower('tudou.com')) || strrpos($thevodsite, strtolower('tudouui.com')))){
	$hdstyle = $_G['cookie']['hdstyle'];
	if(!$hdstyle){
		$cmphdstyle = 2;
	}else{
		$cmphdstyle = intval($hdstyle)>=1 && intval($hdstyle)<=3 ? intval($hdstyle) : 2;
	}
	$cmp_inde = $hd_array[$cmphdstyle];
	$onselein[$cmphdstyle] = 'in';
	$click_disabled[$cmphdstyle] = ' onclick="return false;"';
}

//处理特殊视频的FLASH地址，给分享使用
$flash_url = addslashes($viewdata['vurl']);

//CMP4优先级高于DOMAIN播放器
$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';
if(!file_exists($cmp_config)){}else{
	//加载参数
	require_once "$cmp_config";
	//判断是否在使用权限之内(domain)
	$incmpdomain = explode(",", $_CMP4['cmp_config']['senddomain']);
	foreach($incmpdomain as $val){
		$indomaincmp = strpos($thevodsite, strtolower($val));
		if($indomaincmp > 0){
			$theplayer_style = 'cmp';
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
			break;
		}
	}
}

if($theplayer_style == 'cmp'){}else{
	if($indomain){		//在特殊播放器列表内的
		if($viewdata['flashid']){
			$flashid = substr($viewdata['flashid'], 0, -2);
		}
		if(!$viewdata['flashid'] && $vod_style == 'youku.com'){
			if(preg_match("/id_(.*?)\.html/i", $viewdata['vurl'], $nflashid)){
				$flashid = $nflashid[1];
				$vodurl = "http://player.youku.com/player.php/sid/".$flashid."/v.swf";
			}elseif(preg_match("/\/sid\/(.*?)\/v\.swf/",$viewdata['vurl'],$flashids)){
				$flashid = $flashids[1];
				$vodurl = "http://player.youku.com/player.php/sid/".$flashid."/v.swf";
			}
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}elseif(preg_match("/iid=(.*?)&/i", $viewdata['vurl'], $flashids)){
			$flashid = $flashids[1];
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}elseif(preg_match("/iid=(.*?)\//i", $viewdata['vurl'], $flashids)){
			$flashid = $flashids[1];
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}elseif(preg_match("/view\/([\w\-]+)\/?/i", $viewdata['vurl'], $flashids)){
			$flashid = $flashids[1];
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}
		
	}else{
		$thestyle = strtolower(substr(strrchr($viewdata['vurl'],"."),1));
		if(in_array($thestyle, array('mp4','flv','f4v','mp3'))){
			$theplayer_style = 'cmp';
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}elseif('qvod://' == strtolower(substr($viewdata['vurl'], 0, 7))){
			$theplayer_style = $_CMP4['cmp_other']['qvod'] ? 'cmp' : "qvod";
			$inqvod = $_CMP4['cmp_other']['qvod'];
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
		}elseif('bdhd://' == strtolower(substr($viewdata['vurl'], 0, 7))){
			$theplayer_style = 'bdhd';
		}elseif('mms://' == strtolower(substr($viewdata['vurl'], 0, 6))){
			$theplayer_style = 'mms';
		}elseif('mms://' == strtolower(substr($viewdata['vurl'], 0, 6))){
			$theplayer_style = 'mms';
		}elseif('rtsp://' == strtolower(substr($viewdata['vurl'], 0, 7))){
			$theplayer_style = 'rtsp';
		}elseif(in_array($thestyle, array('wmv','avi','wma'))){
			$theplayer_style = 'mms';
		}elseif(in_array($thestyle, array('rm','rmvb','ram','ra'))){
			$theplayer_style = 'qvod';
		}elseif($thestyle == 'mov'){
			$theplayer_style = 'mov';
		}else{
			$theplayer_style = 'swf';
		}
	}
}


//处理窗口尺寸
$_PWIDTH = "960";
$_PHEIGHT = "520";
$_ISIE6 = strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0');

$viewdata['timelong'] = checkthetime($viewdata['timelong']);

$dvlistn['id'] = $viewdata['id'];
$dvlistn['sup'] = $thesup;
$dvlistn['istv'] = $viewdata['ab_album'] == 3 ? 1 : 0;
$dvlistn['dataline'] = $timestamp;
$dvlistn['subject'] = $thesup && $viewdata['ab_album'] == 3 ? $viewdata['absubject'].$viewdata['vsubject'] : $viewdata['vsubject'];


$dvlistnew = sendnewarray($dvlist, $dvlistn);
if(!$dvlistnew){}else{
	$dvlistnewinc = serialize($dvlistnew);
	dsetcookie('vgallery_list', $dvlistnewinc, 31536000);
}

//付费视频：
if($viewdata['vprice']  && $discuz_uid != $viewdata['uid']){//&& $adminid!=1 && !$groupon_3
	//付费的视频，检查是否购买过
	$query = DB::query("SELECT dateline FROM ".DB::table('vgallery_pay')." WHERE uid='$discuz_uid' and vid='$vid' order by id desc limit 1");
	if(!$inbuy = DB::fetch($query)){
		$buynow = 1;
		$viewdata['vurl'] = null;
	}else{
		if($getvar['paytime']){
			$t = $inbuy['dateline'] + $getvar['paytime']*3600;
			if($timestamp > $t){
				//过期
				$buynow = 1;
				$viewdata['vurl'] = null;
			}
		}
	}		
}

$query = DB::query("SELECT id, sid, vsubject, purl FROM ".DB::table('vgallerys')." WHERE uid='$bzuid' and audit=1 and album=0 and id<>$vid ORDER BY id desc limit 0, 9");
while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 10, '..');
	if(substr($datarow['purl'],0,7) != 'http://'){
		$thepicurl = DISCUZ_ROOT.$datarow['purl'];
		if(!file_exists("$thepicurl") || !$datarow['purl']){
			$datarow['purl'] = "./".MDIR."/noimages.gif";
		}
	}
	$datalist[] = $datarow;
}

$auditviews = !$isauditv || $adminid==1 ? null : lang('plugin/hsk_vcenter', 'pollview');
if($adminid==1){
	$linkarr = array(1=>'ulist', 2=>'plist', 3=>'tvlist');
}

//播客达人
$bokehot = 0;
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php';
	$bokehot = 1;
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adother.inc.php';
}

$seotitle =  $viewdata['vsubject'] ."\n".$viewdata['vinfo'];
list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($seotitle);
$navname = lang('plugin/hsk_vcenter', 'view');
$abnvtitle = $viewdata['ab_album'] == 3 ? $viewdata['absubject']." " : null;
$navtitle = $abnvtitle.$viewdata['vsubject']." - $navtitle";

include template("gallery_view", "Kannol", PTEM);

?>