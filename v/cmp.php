<?php

header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );

require '../source/class/class_core.php';
$discuz = & discuz_core::instance();
$discuz->init();
$_CMP4 = array();
$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';

//解析参数
$id = intval($_GET['id']);
if(!$id){
	//无效
	$label_str = "Did not find the video.";
	$cmp4error = 1;
}else{
	if(!file_exists($cmp_config)){
		//配置文件未找到！
		$label_str = "Check the configuration file for CMP4.";
		$cmp4error = 1;
	}else{
		//检查数据库
		$query = DB::query("SELECT v.flashid, v.album, v.vsubject, v.sup, v.vurl, v.purl, v.remote, ab.vsubject as absubject, ab.purl as abimage, ab.remote as abremote, v.vprice, v.uid FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=v.sup WHERE v.id='$id'");
		if(!$datarow = DB::fetch($query)){
			$label_str = "Did not find the video.";
			$cmp4error = 1;
		}elseif($datarow['album'] > 0 && !$datarow['sup']){
			$label_str = "Did not find the video.";
			$cmp4error = 1;
		}elseif(!$datarow['flashid'] && !$datarow['vurl']){
			$label_str = "Did not find the video.";
			$cmp4error = 1;
		}elseif($datarow['vprice'] && ($_G['uid'] != $datarow['uid'])){
			//付费的视频，检查是否购买过
			$query = DB::query("SELECT a.value FROM ".DB::table('common_pluginvar')." a LEFT JOIN ".DB::table('common_plugin')." b ON b.pluginid=a.pluginid WHERE a.variable='paytime' and b.identifier='hsk_vcenter'");
			if($pluginarr = DB::fetch($query)){
				$getvartime = $pluginarr['value'];
			}else{
				$getvartime = 720;
			}
			$query = DB::query("SELECT dateline FROM ".DB::table('vgallery_pay')." WHERE uid='$_G[uid]' and vid='$id' order by id desc limit 1");
			if(!$inbuy = DB::fetch($query)){
				$label_str = "付费视频，您需登陆本站购买才能观看.";
				$cmp4error = 1;
			}else{
				if($getvartime){
					$t = $inbuy['dateline'] + $getvartime*3600;

					if(TIMESTAMP > $t){
						//过期
						$label_str = "付费视频，您需登陆本站购买才能观看.";
						$cmp4error = 1;
					}
				}
			}
		}
	}
}


require_once "$cmp_config";
$_CMP4['cmp_other']['cmpshare'] = $id ? $_CMP4['cmp_other']['cmpshare'] : null;
if(!$cmp4error){
	//开始生成
	$datarow['vsubject'] = $datarow['sup'] ? $datarow['absubject']." - ".$datarow['vsubject'] : $datarow['vsubject'];
	$imagesrc = $_CMP4['cmp_config']['imagesrc'];
	DB::query("UPDATE ".DB::table('vgallerys')." SET views=views+1 where id='$id'");
	$flashid = $datarow['flashid'];
	if(!$flashid || strlen($flashid)==2) $flashid = get_flashid($datarow['vurl']);
	//print_r($flashid); dexit("noerror");

	$lists = 'src';
	$sitecase = substr($flashid, -1, 1);
	$flashid = substr($flashid, 0, -2);
	if(!$datarow['purl']){
		$imagesrc = getuseimg($datarow['abimage'], $datarow['abremote']);
	}else{
		$imagesrc = getuseimg($datarow['purl'], $datarow['remote']);
	}
	if(!$flashid){
		$thestyle = strtolower(substr(strrchr($datarow['vurl'],"."),1));
		if(in_array($thestyle, array('mp4','flv','mp3','f4v'))){
			$src_str = $datarow['vurl'].'?start={start_bytes}';
			$label_str = $datarow['vsubject'];
			$vodstyle = "";
			$website = "defaultskin";
			$_CMP4['skins']['defaultskin'] = $_CMP4['cmp_config']['defaultskin'];
			$replacestr = "视频源站";
		}else{
			$src_str = $_CMP4['cmp_config']['imagesrc'];
			$label_str = "Did not find the video.";
		}
	}else{//生成代理连接
		$hdstyle = $_G['cookie']['hdstyle'];
		if($sitecase == 'y' || $sitecase == 'p'){
			//优酷视频
			$src_str = $flashid;
			$label_str = $datarow['vsubject'];
			$vodstyle = "youku";
			$website = $replacestr = "youku.com";
			$hd_array = array(1=>'flv', 2=>'mp4', 3=>'hd2');
		}elseif($sitecase == 't'){
			//土豆视频
			$src_str = $_G['siteurl']."hsk_tudou.php?tid=$flashid&hd=$hdstyle&start={start_bytes}";
			$label_str = $datarow['vsubject'];
			$vodstyle = "";
			$website = $replacestr = "tudou.com";
		}elseif($sitecase == 'u'){
			$src_str = $_G['siteurl']."hsk_tudou.php?tid=$flashid&hd=$hdstyle&start={start_bytes}";
			$label_str = $datarow['vsubject'];
			$vodstyle = "";
			$website = $replacestr = "tudouui.com";
		}
	}		

}else{
	$lists = 'src';
	$imagesrc = $_CMP4['cmp_config']['imagesrc'];
}

function get_flashid($str){

	if(preg_match("/youku.com/i", $str, $hosts)) {
		if(preg_match("/id_(.*?)\.html/i", $str, $nflashid)){
			$flashid = $nflashid[1].'_y';
		}elseif(preg_match("/\/sid\/(.*?)\/v\.swf/", $str, $nflashid)){
			$flashid = $nflashid[1].'_y';
		}
	}elseif(preg_match("/iid=(.*?)&/i", $str, $nflashid)){
		$flashid = $nflashid[1].'_t';
	}elseif(preg_match("/iid=(.*?)\//i", $str, $nflashid)){
		$flashid = $nflashid[1].'_t';
	}elseif(preg_match("/view\/([\w\-]+)\/?/i", $str, $nflashid)){
		$flashid = $nflashid[1].'_t';
	}
	return $flashid;
}

function getuseimg($img, $remote=0){
	global $_G;
	if(!$img) return false;
	if($remote){
		$img = $_G['setting']['ftp']['attachurl'].$img;
	}else{
		if(substr($img,0,7) != 'http://'){
			$thepicurl = DISCUZ_ROOT.$img;
			if(!file_exists("$thepicurl") || !$img){
				return $img;
			}else{
				$img = '.'.$img;
			}
		}
	}
	return $img;
}




?>
<cmp

	name = "<?php echo $_CMP4['cmp_config']['name']?>" 
	link = "<?php echo $_CMP4['cmp_config']['link']?>"
	description = "<?php echo $_CMP4['cmp_config']['description']?>"
	logo="<?php echo $_CMP4['cmp_config']['logo']?>"
	logo_alpha="<?php echo $_CMP4['cmp_config']['logo_alpha']?>"

	skins = "skins/<?php echo($_CMP4['skins'][$website] ? $_CMP4['skins'][$website] : 'youtube.swf')?>"

	plugins="
	plugins/announce.swf,
	plugins/ads.swf,
	plugins/youku.swf,
	<?php echo $_CMP4['cmp_other']['cmpshare']?>
	"

	ads = "<?php
	echo "\n";
	foreach($_CMP4['adlist'] as $value){
		echo "\t{src:$value[src],link:$value[link],link_target:_blank,width:$value[width],height:$value[height],duration:$value[time],onstate:$value[onstate],target:video},\n";
	}
	?>
	"

	backgrounds = ""
	skin_id = "1"
	<?php
	if($id){
	?>
	<?php echo $lists?> = "<?php echo $src_str?>"
	<?php
	if($lists == 'src'){echo "\n";?>
	<?php if($vodstyle){echo "\n";?>
	stream="true"
	type="<?php echo $vodstyle?>"
	streamtype = "<?php echo $hd_array[$hdstyle]; ?>"
	<?php }?>
	label = "<?php echo $label_str?>"
	<?php
	}?>
	image="<?php echo $imagesrc?>"
	<?php
	}
	if($_CMP4['cmp_other']['announce_1']){
		$_CMP4['cmp_other']['announce_1'] = str_replace('{WEBSITE}', $replacestr, $_CMP4['cmp_other']['announce_1']);
		echo "\n";
	?>
	announce_content = "<?php echo $_CMP4['cmp_other']['announce_1']?>"
	announce_xywh = "<?php echo $_CMP4['cmp_other']['announce_3']?>"
	announce_speed = "<?php echo $_CMP4['cmp_other']['announce_2']?>"
	<?php
	}
	?>
	
	auto_play = "<?php echo $_CMP4['cmp_config']['auto_play']?>"
	list_delete = "1"
	context_menu = "<?php echo $_CMP4['cmp_config']['context_menu']?>"
	
	sound_sample = "0"
	api = "cmp_loaded"
/>