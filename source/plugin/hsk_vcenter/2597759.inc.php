<?php 

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$vid	= dhtmlspecialchars($_REQUEST["code"]); //从flash传递过来的参数
$vid	= intval(substr($vid, strrpos($vid,"@")+1));

if(!$vid){
	dexit();
}

$discuz_uid			= $_G['uid'];									//用户ID
$discuz_user		= $_G['username'];								//用户ID
$adminid			= $_G['adminid'];								//系统管理员

$getvar				= $_G['cache']['plugin']['hsk_vcenter'];
$isopens			= $getvar['isopens'];						//视频展区功能开关
$theusergp_1		= $getvar['theusergp_1'];					//这个是使用权限用户级
$theusergp_2		= $getvar['theusergp_2'];					//这个是发布视频权限用户级
$theusergp_3		= $getvar['theusergp_3'];					//这个是审核权限用户级  // 本组免费收看收费的视频

//把权限提出来		1=使用权，2=发布权，3=审核权
$theusergp_1 = (array)unserialize($theusergp_1);
$groupon_1 = in_array('', $theusergp_1) ? TRUE : (in_array($mygroupid, $theusergp_1) ? TRUE : FALSE);

$theusergp_2 = (array)unserialize($theusergp_2);
$groupon_2 = in_array('', $theusergp_2) ? TRUE : (in_array($mygroupid, $theusergp_2) ? TRUE : FALSE);

$theusergp_3 = (array)unserialize($theusergp_3);
$groupon_3 = in_array('', $theusergp_3) ? TRUE : (in_array($mygroupid, $theusergp_3) ? TRUE : FALSE);

//检查是否有权限，权限1、管理员，权限2、自己
$query = DB::query("SELECT vprice, tid, uid, vurl FROM ".DB::table('vgallerys')." WHERE id='$vid'");
if(!$viewdata = DB::fetch($query)){
	echo "2";
	exit();
}

//付费视频：
if($viewdata['vprice'] && $adminid!=1 && !$groupon_3 && $discuz_uid != $viewdata['uid']){
	$tid = $viewdata['tid'];
	//付费的视频，检查是否购买过
	$query = DB::query("SELECT dateline FROM ".DB::table('common_credit_log')." WHERE uid='$discuz_uid' and operation='BTC' and relatedid='$tid'");
	if(!$inbuy = DB::fetch($query)){
		echo "3";
		exit();
	}
}
$parseLink = parse_url($viewdata['vurl']);
//print_r($parseLink);

if(preg_match_all("/\/sid\/(.*?)\/v\.swf/",$viewdata['vurl'], $flashid)) {
	//=http://v.youku.com/v_show/id_XMzA1Nzg4NjI4.html
	$flashid = "http://v.youku.com/v_show/id_".$flashid[1][0].".html";
	getRealUrl($flashid);
}elseif(preg_match_all("/id_(.*?)\.html/i", $viewdata['vurl'], $flashid)){
	getRealUrl($viewdata['vurl']);
}else{
	echo $viewdata['vurl'];
}


/*getSid 获取SID*/
function getSid() {
    $sid = time().(rand(0,9000)+10000);
    return $sid;
}
/*getkey 获取Key 老版本需要*/
function getkey($key1,$key2){
    $a = hexdec($key1);
    $b = $a ^ 0xA55AA5A5;
    $b = dechex($b);
    return $key2.$b;
}

/*
	getfileid 获取真实ID值
*/
function getfileid($fileId,$seed) {
    $mixed = getMixString($seed);
    $ids = explode("*",$fileId);
    unset($ids[count($ids)-1]);
    $realId = "";
    for ($i=0;$i < count($ids);++$i) {
        $idx = $ids[$i];
        $realId .= substr($mixed,$idx,1);
    }
    return $realId;
}
/*
	getMixString 获取ID组成信息
*/
function getMixString($seed) {
    $mixed = "";
    $source = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/\\:._-1234567890";
    $len = strlen($source);
    for($i=0;$i< $len;++$i){
        $seed = ($seed * 211 + 30031) % 65536;
        $index = ($seed / 65536 * strlen($source));
        $c = substr($source,$index,1);
        $mixed .= $c;
        $source = str_replace($c, "",$source);
    }
    return $mixed;
}


/*
	getRealUrl 输出 真实地址
		$link 优酷网址
*/		
function getRealUrl($links) {

	if ($links == NULL ) return ;										// 检测读取地址是否为空

	$type = array();
	$type[0] = 'hd2';
	$type[1] = 'mp4';
	$type[2] = 'flv';
	$flag = 1;
	
	preg_match_all("/id_(.*?).html/i",$links,$r); 						 //获取ID
	$link = 'http://v.youku.com/player/getPlayList/VideoIDS/'.$r[1][0];
	$jsonmsg = file_get_contents($link); 								 //获取 Json
	$obj = json_decode($jsonmsg);

	
	$seed = $obj->data[0]->seed; 										// seed 值
	
	if ($seed == NULL ) return ;										// 检测读取是否成功
	
	for ($i=0; $i < 3; ++$i) {
		$fileid = $obj->data[0]->streamfileids->$type[$i];  			//获取 文件ID名
		//echo $fileid;
		$flag = $i;
		if ($fileid != NULL ) break;
	}
	

	$forcount = $obj->data[0]->segs->$type[$flag]; 						//获取分段数
	
	
	//echo '<br>---输出视频类型----<br>';										
	//echo $type[$flag];
	//$x='mp4[0]';
	
	for ($i=0; $i<count($forcount); ++$i){
	
	switch ($flag)  
	{
		case 0:
			$key = $obj->data[0]->segs->hd2[$i]->k;
			break;
		case 1:
			$key = $obj->data[0]->segs->mp4[$i]->k;
			break;
		case 2:
			$key = $obj->data[0]->segs->flv[$i]->k;
			break;
		default:
			break;
	}
	
	$realid = getfileid($fileid,$seed);
	if (strlen ($i) == 1){
		$realid = substr($realid,0,8).'0'.dechex($i).substr($realid,10,strlen($realid) - 10);
	}	else {
		$realid = substr($realid,0,8).dechex($i).substr($realid,10,strlen($realid) - 10);
	}

	//echo '<br>---4----<br>';
	switch ($flag)  
	{
		case 0:
			echo 'http://f.youku.com/player/getFlvPath/sid/00_00/st/flv/fileid/'.$realid.'?K='.$key;
			break;
		case 1:
			echo 'http://f.youku.com/player/getFlvPath/sid/00_00/st/mp4/fileid/'.$realid.'?K='.$key;
			break;
		case 2:
			echo 'http://f.youku.com/player/getFlvPath/sid/00_00/st/flv/fileid/'.$realid.'?K='.$key;
			break;
		default:
			break;
	}
	echo '<br>';
	}
	//$key = $obj->data[0]->segs->hd2[0]->k;
}
?>