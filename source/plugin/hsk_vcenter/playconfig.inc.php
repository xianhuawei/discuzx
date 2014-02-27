<?php 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('MDIR', 'source/plugin/hsk_vcenter/images');
define('PDIR', 'plugin.php?id=hsk_vcenter:hsk_vcenter');
class plugin_vgallery{}

$vid	= dhtmlspecialchars($_REQUEST["vid"]); //从flash传递过来的参数
$vid	= intval(substr($vid, strrpos($vid,"@")+1));

if(!$vid)dexit();

$query = DB::query("SELECT sup FROM ".DB::table('vgallerys')." WHERE id='$vid'");
if($datarow = DB::fetch($query)){
	$supid = $datarow['sup'];
}else{dexit();}

if($supid){
	$query = DB::query("SELECT id, vsubject, purl FROM ".DB::table('vgallerys')." WHERE sup='$supid' and id>'$vid' and audit=1 ORDER BY id limit 1");
	if($datarow = DB::fetch($query)){
		if(substr($datarow['purl'],0,7) != 'http://'){
			$thepicurl = DISCUZ_ROOT.$datarow['purl'];
			if(!file_exists("$thepicurl") || !$datarow['purl']){
				$datarow['purl'] = "./".MDIR."/noimages.gif";
			}
		}
		$datarow['vsubject'] = diconv(cutstr(addslashes($datarow['vsubject']), 16, '..'), 'GB18030', 'UTF-8');
		$datarow['link'] = PDIR.'&tion=view&vid='.$datarow['id'];
		$otherdata[] = $datarow;
	}

	$query = DB::query("SELECT id, vsubject, purl FROM ".DB::table('vgallerys')." WHERE id>'$vid' and audit=1 and album=0 and sup<>'$supid' ORDER BY id limit 2");
	$otherid = 0;
	while($datarow = DB::fetch($query)){
		$otherid ++ ;
		if(substr($datarow['purl'],0,7) != 'http://'){
			$thepicurl = DISCUZ_ROOT.$datarow['purl'];
			if(!file_exists("$thepicurl") || !$datarow['purl']){
				$datarow['purl'] = "./".MDIR."/noimages.gif";
			}
		}
		$datarow['vsubject'] = diconv(cutstr(addslashes($datarow['vsubject']), 16, '..'), 'GB18030', 'UTF-8');
		$datarow['link'] = PDIR.'&tion=view&vid='.$datarow['id'];
		$otherdata[] = $datarow;
	}

	if($otherid < 2){
		//先加载首页特别显示的5个视频 缓存信息
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php';
			shuffle($_RANDLIST);
			foreach($_RANDLIST as $datarow){
				$datarow['vsubject'] = diconv(cutstr(addslashes($datarow['vsubject']), 16, '..'), 'GB18030', 'UTF-8');
				$datarow['link'] = PDIR.'&tion=view&vid='.$datarow['id'];
				$otherdata[] = $datarow;
				if($otherid >= 1){
					break;
				}
				$otherid ++ ;
			}
		}
	}
}else{

	$query = DB::query("SELECT id, vsubject, purl FROM ".DB::table('vgallerys')." WHERE id>'$vid' and audit=1 and album=0 ORDER BY id limit 3");
	$otherid = 0;
	while($datarow = DB::fetch($query)){
		$otherid ++ ;
		if(substr($datarow['purl'],0,7) != 'http://'){
			$thepicurl = DISCUZ_ROOT.$datarow['purl'];
			if(!file_exists("$thepicurl") || !$datarow['purl']){
				$datarow['purl'] = "./".MDIR."/noimages.gif";
			}
		}
		$datarow['vsubject'] = diconv(cutstr(addslashes($datarow['vsubject']), 16, '..'), 'GB18030', 'UTF-8');
		$datarow['link'] = PDIR.'&tion=view&vid='.$datarow['id'];
		$otherdata[] = $datarow;
	}
	if($otherid < 2){
		//先加载首页特别显示的5个视频 缓存信息
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/cache/_randlist.cache.php';
			$otherid = 0;
			shuffle($_RANDLIST);
			foreach($_RANDLIST as $datarow){
				$datarow['vsubject'] = diconv(cutstr(addslashes($datarow['vsubject']), 16, '..'), 'GB18030', 'UTF-8');
				$datarow['link'] = PDIR.'&tion=view&vid='.$datarow['id'];
				$otherdata[] = $datarow;
				if($otherid >= 1){
					break;
				}
				$otherid ++ ;
			}
		}
	}
}
echo "<?xml version='1.0' encoding='UTF-8'?>";

?>
<swf1 name="play" logo="/static/image/common/logo.png">
	<ad img="/static/image/common/logo.png" link="/"></ad>
	<ad img="/static/image/common/logo1.png" link="/"></ad>
	<ad img="/static/image/common/logo2.png" link="/"></ad>
	<ad img="/static/image/common/logo3.png" link="/"></ad>
</swf1>
<video name="video" visible="true">
	<video img="<?=$otherdata[0]['purl']?>" link="<?=$otherdata[0]['link']?>" txt="<?=$otherdata[0]['vsubject']?>" autoplay="1" playlink="<?=$otherdata[0]['link']?>"></video>
	<video img="<?=$otherdata[1]['purl']?>" link="<?=$otherdata[1]['link']?>" txt="<?=$otherdata[1]['vsubject']?>"></video>
	<video img="<?=$otherdata[2]['purl']?>" link="<?=$otherdata[2]['link']?>" txt="<?=$otherdata[2]['vsubject']?>"></video>
</video>

