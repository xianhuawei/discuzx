<?php


/**
 *      本程序由靖飒开发
 *      若要二次开发或用于商业用途的，需要经过靖飒同意。
 *
 *      2011-08-16
 *
 *		愿我的妻子儿女、家人、朋友身体安康，天天快乐！
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$action				= dhtmlspecialchars($_GET['action']);
$update				= dhtmlspecialchars($_GET['update']);
$action_url			= $action ? "&action=$action" : null;

define('RPDIR', 'plugin.php?id=hsk_vcenter:rules'.$action_url);
define('PTEM', 'source/plugin/hsk_vcenter/rules/template');
define('PDIR', 'plugin.php?id=hsk_vcenter:hsk_vcenter');
define('NOIMG', './source/plugin/hsk_vcenter/images/noimages.gif');

define('MDIR', './source/plugin/hsk_vcenter/images');
define('PINC', './source/plugin/hsk_vcenter/include');
define('FINC', './source/plugin/hsk_vcenter/function');
define('PNAME', lang('plugin/hsk_vcenter', 'hackname'));


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
$clientip			= $_G['clientip'];
$maxprice			= $_G['group']['maxprice'];						//最多能卖多少钱
$mygroupid			= $_G['member']['groupid'];						//自已的组ID

//------------获取插件的后台参数---------------------------------------------//
$getvar				= $_G['cache']['plugin']['hsk_vcenter'];
$isgetimg			= $getvar['isgetimg'];						//是否本地化网络图片
$creditstrans		= $getvar['getfree'];						//消费积分
$maxincperthread	= $getvar['getmoney'];						//消费最高金额
$_maxwidth			= $getvar['maxwidth'];						//截图宽度
$_maxheight			= $getvar['maxheight'];						//截图高度
$_maxresize			= $getvar['maxresize'];						//截图裁剪
$isaddactor			= $getvar['isaddactor'];					//可填写并添加演员
$tag_radio			= $getvar['tag_radio'];						//是否开启TAG
$astaghot			= $getvar['astaghot'];						//热门TAG个数
$sendtodoing		= $getvar['sendtodoing'];
$hp					= $getvar['openhtml'];						//开启伪静态功能开关

//----------------视频出售方面的东西-------------------------------------------//
$money_id	= 'extcredits'.$creditstrans;
$money_name = $_G['setting']['extcredits'][$creditstrans]['title'];
$money_unit = $_G['setting']['extcredits'][$creditstrans]['unit'];
$remote		= $_G['setting']['ftp']['on'] ? 1 : 0 ;											//是否开启远程图片


if($adminid != 1){
	showmessage("非法传递！");
}

@require DISCUZ_ROOT.FINC.'/function.func.php';
$charset = CHARSET;

if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
}else{
	hsk_stylewrite();
	showmessage(lang('plugin/hsk_vcenter', 'setconfigok'), RPDIR);
}


if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_totalfun.cache.php')){
	@require DISCUZ_ROOT.'./data/hskcenter/cache/_totalfun.cache.php';
}

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

$onestyle = 0;
$defaulefid = 0;
foreach($_SORT as $val){
	if(!$val['sup']){//重新生成所有一级分类
		if($val['regroup']){
			$tmpstr = (array)unserialize($val['regroup']);
			$relemiss = in_array('', $tmpstr) ? TRUE : (in_array($mygroupid, $tmpstr) ? TRUE : FALSE);
			if($relemiss){
				$defaulefid = in_array($val['sort'], array('电视剧', '电视', '连续剧', '剧集', 'TV')) ? $val['sid'] : $defaulefid;
				$onestyle = $onestyle ? $onestyle : $val['sid'];
				$newsort[] = $val;
			}
		}else{
			$defaulefid = in_array($val['sort'], array('电视剧', '电视', '连续剧', '剧集', 'TV')) ? $val['sid'] : $defaulefid;
			$onestyle = $onestyle ? $onestyle : $val['sid'];
			$newsort[] = $val;
		}
	}
}

$defaulefid = $defaulefid ? $defaulefid : $onestyle;


$site = $action;
$rules_folder= DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/business/';
$fp=opendir($rules_folder);
$rules_list = $rules_in = array();
while(false != $file = readdir($fp))
{
	if($file!='.' && $file!='..'){
		$file = substr($file, 0, -4);
		$file = str_replace('_tmp', '', $file);
		if(in_array($file, $rules_list)){
			$rules_in[] = $file;
		}
		$rules_list[] = $file;
		$indomain1 = strpos(strtolower($site), strtolower($file1));
	}
}

if(!in_array($action, $rules_list))$action=null;

list($navtitle, $metakeywords, $metadescription, $seohead) = hsk_getseo($abvalue['vsubject'].$abvalue['vinfo']);
if(submitcheck("reportsubmit") && $action){

	//采集模块支持
	$rules_file = DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/business/'.$action.'.php';
	@require $rules_file;

	$navname = "$action 数据采集中心";
	$navtitle = "$action 数据采集中心 - $navtitle";

	include template("rules_get", "Kannol", PTEM);
	dexit();

}elseif($update == 'all' && $action){
	//一键全部更新
	$rules_file = DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/business/'.$action.'_upall.php';

	$navname = "$action 数据采集中心";
	$navtitle = "$action 数据采集中心 - $navtitle";

	if(!file($rules_file)){
		showmessage("对不起，您没有权限使用此功能！");
	}else{
		@require $rules_file;
		dexit();
	}
}else{

	if($action){
		$navname = "$action 数据采集中心";
		$navtitle = "$action 数据采集中心 - $navtitle";
		//采集模块模板
		$rules_file = DISCUZ_ROOT.'source/plugin/hsk_vcenter/rules/business/'.$action.'_tmp.php';
		@require $rules_file;
		include template("rules_tmp", "Kannol", PTEM);
	}else{
		$navname = "数据采集中心";
		$navtitle = "数据采集中心 - $navtitle";
		include template("rules_index", "Kannol", PTEM);
	}
}

?>