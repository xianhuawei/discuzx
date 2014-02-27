<?php

function getpopmenu($hsk_id, $do_id){
	for($i=1; $i>0; $i++){
		$menu_id = 'hsk_'.$hsk_id.'_'.$i;
		$do_id = intval($do_id) ? intval($do_id) : 1;
		if(cplang($menu_id) != $menu_id){
			//有此菜单项
			$selemenu = $do_id == $i ? 1 : 0;
			$meun_loop = array("$menu_id", "hsk&operation=$hsk_id&do=$i", $selemenu);
		}else{
			//菜单收集结束
			break;
		}
		$menu_list[] = $meun_loop;
	}
	return $menu_list;

}


function getfirstname($str){
	if(ord($str)>="1" and ord($str)<=ord("z") ){
		return strtoupper($str); 
	}
	
	$asc=ord($str{0})*256+ord($str{1})-65536;

	if($asc>=-20319 and $asc<=-20284)	return "A";
	if($asc>=-20283 and $asc<=-19776)	return "B";
	if($asc>=-19775 and $asc<=-19219)	return "C";
	if($asc>=-19218 and $asc<=-18711)	return "D";
	if($asc>=-18710 and $asc<=-18527)	return "E";
	if($asc>=-18526 and $asc<=-18240)	return "F";
	if($asc>=-18239 and $asc<=-17923)	return "G";
	if($asc>=-17922 and $asc<=-17418)	return "H";              
	if($asc>=-17417 and $asc<=-16475)	return "J";              
	if($asc>=-16474 and $asc<=-16213)	return "K";              
	if($asc>=-16212 and $asc<=-15641)	return "L";              
	if($asc>=-15640 and $asc<=-15166)	return "M";              
	if($asc>=-15165 and $asc<=-14923)	return "N";              
	if($asc>=-14922 and $asc<=-14915)	return "O";              
	if($asc>=-14914 and $asc<=-14631)	return "P";              
	if($asc>=-14630 and $asc<=-14150)	return "Q";              
	if($asc>=-14149 and $asc<=-14091)	return "R";              
	if($asc>=-14090 and $asc<=-13319)	return "S";              
	if($asc>=-13318 and $asc<=-12839)	return "T";              
	if($asc>=-12838 and $asc<=-12557)	return "W";              
	if($asc>=-12556 and $asc<=-11848)	return "X";              
	if($asc>=-11847 and $asc<=-11056)	return "Y";              
	if($asc>=-11055 and $asc<=-10247)	return "Z";  

	return 0;
}

function hsk_getfile($url) {
	if(!function_exists('curl_init')) {
		$c = file_get_contents($url);
		return $c;
	} else {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$ch = curl_init();
		$timeout = 30;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		@ $c = curl_exec($ch);
		curl_close($ch);
		return $c;
	}
}

function hsk_getimg($url, $imgpath) {
	$c = hsk_getfile($url);
	if(@$fp = fopen("$imgpath", 'w')) {
		fwrite($fp, "$c");
		fclose($fp);
	} else {
		return 0;
	}
	//处理URL
	$str = "./data/hskcenter";
	$imgpath = substr($imgpath, strpos($imgpath, $str));
	return $imgpath;
}


function hsk_uploadimg($soucer, $sendfilepath = './data/hskcenter/temp'){

	if($soucer['error'])	return false;

	$name			= $soucer["name"];
	$tmp_name		= $soucer["tmp_name"];
	$type			= $soucer["type"];
	$filetype		= substr($name, strrpos($name, ".")+1);
	$size			= $soucer["size"];
	$getnewpath		= DISCUZ_ROOT.$sendfilepath;
	$newfilename	= "/".date("m-d")."~".time()."~".rand(100,999).".".$filetype;
	$uploadfile		= $getnewpath.$newfilename;

	$maxsize		= 500*1024;	//最大允许上许文件大小

	if(!$name){
		return false;
	}

	$type_inarray	= array("image/pjpeg", "image/jpeg", "image/gif", "image/x-png", "image/png");
	if(!in_array($type, $type_inarray))		return false;
	if($size>$maxsize)						return false;
	
	//检查目录
	if(!is_dir($getnewpath)){
		@mkdir($getnewpath);
	}

	if(@copy($tmp_name, $uploadfile) || (function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $uploadfile))) {
		@unlink($tmp_name);
		return $sendfilepath.$newfilename;
	}else{
		return false;
	}
}



function hsk_tocache($script, $cachedata, $prefix = 'hsk_', $cache_dir = './data/hskcenter/') {
	global $_G;

	$dir = DISCUZ_ROOT.$cache_dir;
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if($fp = @fopen("$dir$prefix$script.php", 'wb')) {
		fwrite($fp, "<?php\n//Discuz! cache file, DO NOT modify me!\n//Cache By: Kannol(yinfu.cc)\n//Identify: ".md5($prefix.$script.'.php'.$cachedata.$_G['config']['security']['authkey'])."\n\n$cachedata?>");
		fclose($fp);
	} else {
		exit('Can not write to cache files, please check directory ./data/ and ./data/hskcenter/ .');
	}
}


function hsk_getcachevars($data, $type = 'VAR') {
	$evaluate = '';
	foreach($data as $key => $val) {
		if(!preg_match("/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/", $key)) {
			continue;
		}
		if(is_array($val)) {
			$evaluate .= "\$$key = ".hsk_arrayeval($val).";\n";
		} else {
			$val = addcslashes($val, '\'\\');
			$evaluate .= $type == 'VAR' ? "\$$key = '$val';\n" : "define('".strtoupper($key)."', '$val');\n";
		}
	}
	return $evaluate;
}

function hsk_arrayeval($array, $level = 0) {
	if(!is_array($array)) {
		return "'".$array."'";
	}
	if(is_array($array) && function_exists('var_export')) {
		return var_export($array, true);
	}

	$space = '';
	for($i = 0; $i <= $level; $i++) {
		$space .= "\t";
	}
	$evaluate = "Array\n$space(\n";
	$comma = $space;
	if(is_array($array)) {
		foreach($array as $key => $val) {
			$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
			$val = !is_array($val) && (!preg_match("/^\-?[1-9]\d*$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;
			if(is_array($val)) {
				$evaluate .= "$comma$key => ".hsk_arrayeval($val, $level + 1);
			} else {
				$evaluate .= "$comma$key => $val";
			}
			$comma = ",\n$space";
		}
	}
	$evaluate .= "\n$space)";
	return $evaluate;
}


function hsk_updatecache($style, $fids=0, $sids=0, $num=0, $cache_dir='./data/hskcenter/cache/'){
	//	fids\一级分类	sids\二级分类	num\缓存个数	cache_dir\缓存目录
	global $_G;

	switch($style) {
		CASE 'sort':	//分类
			$query = DB::query("SELECT s.sid, s.sup, s.band, s.sort, s.scolor, s.sygroup, s.regroup, s.sortman, s.sortmoney, s.rewid, s.rehei, s.istv, f.fup, f.type FROM ".DB::table('vgallery_sort')." s LEFT JOIN ".DB::table('forum_forum')." f ON f.fid=s.band WHERE s.available='1' ORDER BY s.dps, s.sid");
			while($datarow = DB::fetch($query)) {
				$typelist[] = $datarow;
			}
			hsk_tocache('sort.inc', hsk_getcachevars(array('_SORT' => $typelist)), '_', './data/hskcenter/');
			break;
		CASE 'index_data':		//首页定制内容
			madepluginid();
			$query = DB::query("SELECT * FROM ".DB::table('vgallery_indexset')." ORDER BY dsp, id");
			$blockget = array();
			while($datarow = DB::fetch($query)) {
				//左侧数据
				if(in_array($datarow['styleid'], array(1,2,8,9)) && !$datarow['value']){
					//应该有的数据但是没有，此条失败
				}else{
					//检查数据是否确定存在
					if($datarow['styleid']==8){
						//检查广告是否有效
						$query1 = DB::query("SELECT id FROM ".DB::table('vgallery_ad')." where id='$datarow[value]'");
						if($datarow1 = DB::fetch($query1)) {
							$memch = array();
							$memch['type'] = $datarow['typeid'];
							$memch['id'] = stripslashes($datarow['id']);
							$memch['subject'] = stripslashes($datarow['subject']);
							$memch['moremsg'] = stripslashes($datarow['moremsg']);
							$memch['funid'] = $datarow['styleid'];
							$memch['value']	= $datarow['value'];
							$memch['style'] = $datarow['getstyle'];
							$memch['sum'] = $datarow['getsum'];
							$typelist[] = $memch;
						}
					}elseif($datarow['styleid']==9){
						//检查广告是否有效
						$query1 = DB::query("SELECT bid FROM ".DB::table('common_block')." where bid='$datarow[value]'");
						if($datarow1 = DB::fetch($query1)) {
							$memch = array();
							$memch['type'] = $datarow['typeid'];
							$memch['id'] = stripslashes($datarow['id']);
							$memch['subject'] = stripslashes($datarow['subject']);
							$memch['moremsg'] = stripslashes($datarow['moremsg']);
							$memch['funid'] = $datarow['styleid'];
							$memch['value']	= $datarow['value'];
							$memch['style'] = $datarow['getstyle'];
							$memch['sum'] = $datarow['getsum'];
							$blockget[] = $datarow['value'];
							$typelist[] = $memch;
						}
					}else{
						$memch = array();
						$memch['type'] = $datarow['typeid'];
						$memch['id'] = stripslashes($datarow['id']);
						$memch['subject'] = stripslashes($datarow['subject']);
						$memch['moremsg'] = stripslashes($datarow['moremsg']);
						$memch['funid'] = $datarow['styleid'];
						$memch['value']	= $datarow['value'];
						$memch['style'] = $datarow['getstyle'];
						$memch['sum'] = $datarow['getsum'];
						hsk_block($memch);
						$typelist[] = $memch;
					}
				}
			}
			//处理BLOCK信息
			$blockget = array_unique($blockget);
			$blockget = implode(",", $blockget);
			hsk_tocache('block.inc', "\$blockget = '".$blockget."';\n".hsk_getcachevars(array('_BLOCK' => $typelist)), '_', './data/hskcenter/');
			break;

		CASE 'adlist':	//分类
			$query = DB::query("SELECT id, styleid, subject, width, height, message FROM ".DB::table('vgallery_ad')." WHERE displayer='1' and styleid in(1,2) ORDER by id");
			while($datarow = DB::fetch($query)) {
				$datarow['message'] = stripslashes($datarow['message']);
				$typelist["$datarow[id]"] = $datarow;
			}
			hsk_tocache('adlist.inc', hsk_getcachevars(array('_ADLIST' => $typelist)), '_', './data/hskcenter/');

			$typelist = array();
			$query = DB::query("SELECT id, styleid, subject, width, height, message FROM ".DB::table('vgallery_ad')." WHERE displayer='1' and styleid>20 GROUP BY styleid ORDER by id");
			while($datarow = DB::fetch($query)) {
				$datarow['message'] = stripslashes($datarow['message']);
				$typelist["$datarow[styleid]"] = $datarow;
			}
			hsk_tocache('adother.inc', hsk_getcachevars(array('_ADOTHER' => $typelist)), '_', './data/hskcenter/');
			break;

		DEFAULT:
			break;

	}
}

function madepluginid(){
	//生成主要参数
	$query = DB::query("SELECT a.pluginid, a.value, a.variable FROM ".DB::table("common_pluginvar")." a LEFT JOIN ".DB::table("common_plugin")." b ON b.pluginid=a.pluginid WHERE a.variable in('maxwidth', 'maxheight', 'openhtml') and b.identifier='hsk_vcenter'");
	while($datarow = DB::fetch($query)){
		$_plglink = $datarow['pluginid'];
		if($datarow['variable'] == 'maxwidth')
			$_width = $datarow['value'] ? $datarow['value'] : 136;
		if($datarow['variable'] == 'maxheight')
			$_heigh = $datarow['value'] ? $datarow['value'] : 96;
		if($datarow['variable'] == 'openhtml')
			$_hp = $datarow['value'];
	}
	if(!$_plglink){
		//还没安装插件
		cpmsg('hsk_hskcenter_setupfirst', '', 'error');
	}
	$cachearr = "\$_plglink = $_plglink;\n\$_width = $_width;\n\$_heigh = $_heigh;\n\$_hp = $_hp;\n";
	hsk_tocache('pluginid.inc', $cachearr);
}

function hsk_block($rows){
	global $_G, $_width, $_heigh, $_hp;

	//处理高度使图片平均
	if($_width != 116){
		//针对非116PX的截图进行计算
		$x = $_width/116;
		$_width = 116;
		$_heigh = floor($_heigh/$x);
	}
	
	//这个是首页DIY数据
	$floder = './data/hskcenter/block/';
	$files = '_'.$rows['type'].'_'.$rows['id'].'.cache';
	//开始生成数据
	if($rows['funid'] == 1){
		//FID list

		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
			return false;
		}else{
			@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
			foreach($_SORT as $datarow){
				if($datarow['sid'] == $rows['value'] && !$datarow['sup']){
					$fid = $datarow['sid'];		//得到一级目录的ID
					$istv = $datarow['istv'];
					$width = $datarow['rewid'] ? $datarow['rewid'] : $_width;
					$heigh = $datarow['rehei'] ? $datarow['rehei'] : $_heigh;
				}
			}

			//处理高度使图片平均
			if($width != 116){
				//针对非116PX的截图进行计算
				$x = $width/116;
				$heigh = floor($heigh/$x);
			}

			//以上得到FID的相关数据  |  下面开始调入  FID 数据
			if(!file_exists(DISCUZ_ROOT."./data/hskcenter/cache/_fid_$fid.cache.php")){
				return false;
			}else{
				//提出数据
				$send['type'] = $rows['type'];
				$send['files'] = "./data/hskcenter/cache/_fid_$fid.cache.php";
				$send['value'] = $fid;
				$send['width'] = $width;
				$send['heigh'] = $heigh;
				$send['sum'] = $rows['sum'];
				$send['istv'] = $istv;
				$send['style'] = $rows['style'];
				$send['math'] = '_FIDLIST';
				
				//数据更新完，写入缓存
				hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
			}
		}
	}elseif($rows['funid'] == 2){
		//FID list

		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
			return false;
		}else{
			@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
			foreach($_SORT as $datarow){
				if($datarow['sid'] == $rows['value'] && $datarow['sup']){
					$fid = $datarow['sup'];		//得到一级目录的ID
				}
			}

			foreach($_SORT as $datarow){
				if($datarow['sid'] == $fid && !$datarow['sup']){
					$sid = $rows['value'];
					$istv = $datarow['istv'];
					$width = $datarow['rewid'] ? $datarow['rewid'] : $_width;
					$heigh = $datarow['rehei'] ? $datarow['rehei'] : $_heigh;
				}
			}
			
			//处理高度使图片平均
			if($width != 116){
				//针对非116PX的截图进行计算
				$x = $width/116;
				$heigh = floor($heigh/$x);
			}

			//以上得到FID的相关数据  |  下面开始调入  FID 数据
			if(!file_exists(DISCUZ_ROOT."./data/hskcenter/cache/_sid_$sid.cache.php")){
				return false;
			}else{
				//提出数据
				$send['type'] = $rows['type'];
				$send['files'] = "./data/hskcenter/cache/_sid_$sid.cache.php";
				$send['value'] = $sid;
				$send['width'] = $width;
				$send['heigh'] = $heigh;
				$send['sum'] = $rows['sum'];
				$send['istv'] = $istv;
				$send['style'] = $rows['style'];
				$send['math'] = '_SIDLIST';
				
				//数据更新完，写入缓存
				hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
			}
		}
	}elseif($rows['funid'] == 3){
		//全局最新视频

		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_newlist.cache.php')){
			//提出数据
			$send['type'] = $rows['type'];
			$send['files'] = "./data/hskcenter/cache/_newlist.cache.php";
			$send['value'] = $sid;
			$send['width'] = $_width;
			$send['heigh'] = $rows['value'] ? $rows['value'] : $_heigh;
			$send['sum'] = $rows['sum'];
			$send['istv'] = $istv;
			$send['style'] = $rows['style'];
			$send['math'] = '_NEWLIST';
			
			//数据更新完，写入缓存
			hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
		}else{
			return false;
		}
	}elseif($rows['funid'] == 4){
		//全局专辑
		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_newablist.cache.php')){
			//提出数据
			$send['type'] = $rows['type'];
			$send['files'] = "./data/hskcenter/cache/_newablist.cache.php";
			$send['value'] = $sid;
			$send['width'] = $_width;
			$send['heigh'] = $rows['value'] ? $rows['value'] : $_heigh;
			$send['sum'] = $rows['sum'];
			$send['istv'] = $istv;
			$send['style'] = $rows['style'];
			$send['math'] = '_NEWABLIST';
			
			//数据更新完，写入缓存
			hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
		}else{
			return false;
		}
	}elseif($rows['funid'] == 5){
		//剧集
		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_newabtotal.cache.php')){
			//提出数据
			$send['type'] = $rows['type'];
			$send['files'] = "./data/hskcenter/cache/_newabtotal.cache.php";
			$send['value'] = $sid;
			$send['width'] = $_width;
			$send['heigh'] = $rows['value'] ? $rows['value'] : $_heigh;
			$send['sum'] = $rows['sum'];
			$send['istv'] = $istv;
			$send['style'] = $rows['style'];
			$send['math'] = '_NEWABTOTAL';
			
			//数据更新完，写入缓存
			hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
		}else{
			return false;
		}
	}elseif($rows['funid'] == 6){
		//顶的最多
		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_dinglist.cache.php')){
			//提出数据
			$send['type'] = $rows['type'];
			$send['files'] = "./data/hskcenter/cache/_dinglist.cache.php";
			$send['value'] = $sid;
			$send['width'] = $_width;
			$send['heigh'] = $rows['value'] ? $rows['value'] : $_heigh;
			$send['sum'] = $rows['sum'];
			$send['istv'] = $istv;
			$send['style'] = $rows['style'];
			$send['math'] = '_DINGLIST';
			
			//数据更新完，写入缓存
			hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
		}else{
			return false;
		}
	}elseif($rows['funid'] == 7){
		//同步追剧
		if(!file_exists(DISCUZ_ROOT.'./data/hskcenter/_newab_update.cache.php')){
			//提出数据
			$send['type'] = $rows['type'];
			$send['files'] = "./data/hskcenter/cache/_newab_update.cache.php";
			$send['value'] = $sid;
			$send['width'] = $_width;
			$send['heigh'] = $rows['value'] ? $rows['value'] : $_heigh;
			$send['sum'] = $rows['sum'];
			$send['istv'] = $istv;
			$send['style'] = $rows['style'];
			$send['math'] = '_NEWUPDATE';
			
			//数据更新完，写入缓存
			hsk_tocache("$files", hsk_getcachevars(array('_SEND' => $send)), '', './data/hskcenter/block/');
		}else{
			return false;
		}
	}
}

function sendurl($vid, $hp=0){
	if($hp){
		return "show-".$vid.".html";
	}else{
		return PDIR."&mod=view&vid=".$vid;
	}
}


?>