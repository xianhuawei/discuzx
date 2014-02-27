<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('PDIR', 'plugin.php?id=hsk_vcenter:hsk_vcenter');
define('PTEM', 'source/plugin/hsk_vcenter/template');

define('MDIR', './source/plugin/hsk_vcenter/images');
define('JSDIR', './source/plugin/hsk_vcenter/javascript');
define('NOIMG', './source/plugin/hsk_vcenter/images/noimages.gif');

define('PINC', './source/plugin/hsk_vcenter/include');
define('FINC', './source/plugin/hsk_vcenter/function');
define('PNAME', lang('plugin/hsk_vcenter', 'hackname'));

define('ADDIR', './source/plugin/hsk_vcenter/ad');



//------------获取网页传递的参数-------------------------------------------//

$fid				= intval($_GET['fid']);
$ids				= intval($_GET['ids']);
$vid				= intval($_GET['vid']);
$page				= intval($_GET['page']);
$types				= dhtmlspecialchars($_GET['types']);

//------------获取系统全局变量-------------------------------------------//

$discuz_uid			= $_G['uid'];									//用户ID
$discuz_user		= $_G['username'];								//用户ID
$adminid			= $_G['adminid'];								//系统管理员
$timestamp			= TIMESTAMP;									//时间
$timeoffset			= $_G['member']['timeoffset'];					//时间差
$grouptitle			= $_G['group']['grouptitle'];
$credits			= $_G['member']['credits'];
$attachdir			= $_G['setting']['attachdir'];
$attachurl			= $_G['setting']['attachurl'];
$clientip			= $_G['clientip'];
$maxprice			= $_G['group']['maxprice'];						//最多能卖多少钱
$mygroupid			= $_G['member']['groupid'];						//自已的组ID
$creditstax			= $_G['setting']['creditstax'];					//这个是收取的利率

//------------获取插件的后台参数---------------------------------------------//

$getvar				= $_G['cache']['plugin']['hsk_vcenter'];

$isopens			= $getvar['isopens'];						//视频展区功能开关
$isevaluate			= $getvar['isevaluate'];					//是否允许对视频进行评价
$israte				= $getvar['israte'];						//是否允许对视频进行打分
$isaudit			= $getvar['isaudit'];						//不是管理员发布的视频进否需要审核后才能显示
$isauditv			= $getvar['isauditv'];						//不是管理员发布的评论进否需要审核后才能显示
$isgetimg			= $getvar['isgetimg'];						//是否本地化网络图片
$topcheck			= $getvar['topcheck'];						//侧栏的热播数据多久更新一次【小时】
$isuploadimg		= $getvar['isuploadimg'];					//是否允许会员上传视频截图。
$theusergp_1		= $getvar['theusergp_1'];					//这个是使用权限用户级
$theusergp_2		= $getvar['theusergp_2'];					//这个是发布视频权限用户级
$theusergp_3		= $getvar['theusergp_3'];					//这个是审核权限用户级  // 本组免费收看收费的视频
$ispostmoney		= $getvar['ispostmoney'];					//能否出售视频
$getfiles			= $getvar['getfiles'] * 4202 / 2 + 1;
$creditstrans		= $getvar['getfree'];						//消费积分
$maxincperthread	= $getvar['getmoney'];						//消费最高金额
$_maxwidth			= $getvar['maxwidth'];						//截图宽度
$_maxheight			= $getvar['maxheight'];						//截图高度
$_maxresize			= $getvar['maxresize'];						//截图裁剪
$isaddactor			= $getvar['isaddactor'];					//可填写并添加演员
$hp					= $getvar['openhtml'];						//开启伪静态功能开关
$tag_radio			= $getvar['tag_radio'];						//是否开启TAG
$astaghot			= $getvar['astaghot'];						//热门TAG个数
$vod_option			= $getvar['vod_option'];					//附加字段—————地区、语言、年代
$isautoplay			= intval($getvar['isautoplay']);			//视频是否自动播放
$showbig			= $getvar['showbig'];						//默认宽幕
$header_disabled	= $getvar['header_disabled'];				//关头部一级菜单。

$_PDIR = $hp ? 'v.html' : 'plugin.php?id=hsk_vcenter:hsk_vcenter';
$dvlist = (array)unserialize(stripslashes($_G['cookie']['vgallery_list']));
$dvcount = count($dvlist)>0 && $dvlist[0] <> '';

//----------------视频出售方面的东西-------------------------------------------//
if(!$creditstrans){
	//未绑定积分时不允许使用系统！
	showmessage(lang('plugin/hsk_vcenter', 'bandcredits'));
}

$money_id = 'extcredits'.$creditstrans;
$money_name = $_G['setting']['extcredits'][$creditstrans]['title'];
$money_unit = $_G['setting']['extcredits'][$creditstrans]['unit'];

if($discuz_uid){
	$query = DB::query("SELECT m.*, u.$money_id FROM ".DB::table('vgallery_member')." m LEFT JOIN ".DB::table('common_member_count')." u ON u.uid=m.mid WHERE m.mid='$discuz_uid'");
	if($userinfo = DB::fetch($query)){
		$_mymoney = $userinfo[$money_id];			//我的钱
		$_myshare = $userinfo['shares'];			//分享视频数
		$_myhots = $userinfo['hots'];				//我的热点
		$_myablist = $userinfo['ablists'];			//我的专辑
		$_mychkup = $userinfo['pushup'];			//顶  踩
		$_mychkdown = $userinfo['pushdown'];
		$_myplaylist = $userinfo['favsum'];			//收藏视频数
	}else{
		//不是视频 中心的用户，自动加入
		DB::query("INSERT INTO ".DB::table('vgallery_member')." (mid) VALUES ('$discuz_uid')");
		showmessage(lang('plugin/hsk_vcenter', 'joingok'), $_PDIR);
	}
}


//------------判断权限---------------------------------------------//
//把权限提出来		1=使用权，2=发布权，3=审核权
$theusergp_1 = (array)unserialize($theusergp_1);
$groupon_1 = in_array('', $theusergp_1) ? TRUE : (in_array($mygroupid, $theusergp_1) ? TRUE : FALSE);

$theusergp_2 = (array)unserialize($theusergp_2);
$groupon_2 = in_array('', $theusergp_2) ? TRUE : (in_array($mygroupid, $theusergp_2) ? TRUE : FALSE);

$theusergp_3 = (array)unserialize($theusergp_3);
$groupon_3 = in_array('', $theusergp_3) ? TRUE : (in_array($mygroupid, $theusergp_3) ? TRUE : FALSE);

if($adminid!=1 && !$groupon_1)		showmessage(lang('plugin/hsk_vcenter', 'nopermission'), '', array(), array('login' => true));
if(!$isopens && $adminid!=1)		showmessage(lang('plugin/hsk_vcenter', 'hackclose'), '', array(), array('login' => true));

//------------获取  各种缓存数据	---------------------------------------------//
@require DISCUZ_ROOT.FINC.'/function.func.php';
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
}else{
	hsk_stylewrite();
	showmessage(lang('plugin/hsk_vcenter', 'setconfigok'), $_PDIR);
}

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_totalfun.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_totalfun.cache.php';
	$todays = mktime(0,0,0,date("m"),date("d"),date("Y"));
	if($_TOTALFUN[3] < $todays){
		$_TOTALFUN[2] = 0;
	}

}

$modarray = array(	'release',		//发布
					'abpost',		//连发模式
					'list',			//视频列表
					'tag',			//标签显示
					'ablist',		//专辑列表
					'view',			//观看视频
					'feed',			//分享小窗口
					'getloadlist',	//AJAX获取某些视频数据
					'getablist',	//关联专辑用的弹出窗口
					'getpic',		//截图资源
					'goto',			//跳转专用
					'acshow',		//跳转功能
					'my',			//我的视频列表
					'polls',		//提取评论内容
					'manage',		//管理专用
					'actor',		//演员
					'author',		//用户视频列表
					'topicadmin',	//外部管理
					'reply',		//回复
					'omment',		//加载评论
					'loadsid',		//加载同类视频
					'loadsup',		//加载专辑内视频
					'loadtag',		//加载TAG类视频
					'loadtype',		//加载分类选择
					'search',		//搜索
					'import',		//导入TXT视频数据
					'relesid',		//加载发布视频时的分类
					'focue',		//提取 导演和演员资料
					'getlist',		//AJAX提取专辑、公共专辑
					'today',		//今日更新
					'hdstyle'		//改变CMP4的高清类型
					);

$sortcolor = array(0=>'',1=>'Red',2=>'Orange',3=>'Yellow',4=>'Green',5=>'Cyan',6=>'Blue',7=>'Purple',8=>'Gray');

$mod = !in_array($discuz->var['mod'], $modarray) ? null : $discuz->var['mod'];
define('IN_HSK', 1);

if($mod){
	if(file_exists(DISCUZ_ROOT.PINC.'/hsk_'.$mod.'.inc.php')){
		require DISCUZ_ROOT.PINC.'/hsk_'.$mod.'.inc.php';
		exit();
	}else{
		showmessage(lang('plugin/hsk_vcenter', 'hsk_nofile'));
	}
}

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_index_set.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/hsk_index_set.inc.php';
	$index_close['top']['subject']	= trim(stripslashes($index_close['top']['subject']));
	$index_close['top']['moremsg']	= trim(stripslashes($index_close['top']['moremsg']));
}

if(!$index_close['hot']['close']){
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_index_album.cache.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/cache/_index_album.cache.php';
		$indexalbum = count($_INDEXALBUM)>0 && is_array($_INDEXALBUM[0]);
		$indexalbumcount = count($_INDEXALBUM);
	}
}

if(!$index_close['top']['close']){
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_index_top.cache.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/cache/_index_top.cache.php';
		$indextop = count($_INDEXTOP)>0 && is_array($_INDEXTOP[0]);
	}
}

//播客达人
$bokehot = 0;
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_hotuser.cache.php';
	$bokehot = 1;
}

//最新视频
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newlist.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newlist.cache.php';
}

//最新专辑
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_newablist.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_newablist.cache.php';
}

//首页定制
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_block.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_block.inc.php';
	if($blockget){
		block_get($blockget);
	}
}

//广告
if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_adlist.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_adlist.inc.php';
}

//生成 SEO 参数	加载模板
list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo();
$navname = PNAME.lang('plugin/hsk_vcenter', 'indexname');
include template("gallery_index", 'Kannol', PTEM);

?>
