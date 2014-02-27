<?php

function hsk_getseo($skey = ''){
	global $_G;
	$skey = $skey ? dhtmlspecialchars($skey) : null;

	//加载SEO参数
	if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_seo.inc.php')){
		require_once DISCUZ_ROOT.'./data/hskcenter/hsk_seo.inc.php';
	}else{
		$seo_new = array (
		  'navtitle' => PNAME,
		  'metakeywords' => PNAME.' - {bbname}',
		  'metadescription' => '{AUTOKEYS}',
		  'seohead' => '',
		);
	}

	$searchs = array('/{bbname}/', '/{AUTOKEYS}/');
	$replaces = array($_G['setting']['bbname'], $skey);

	$seo_array = array();
	foreach($seo_new as $val){
		$seo_array[] = trim(preg_replace($searchs, $replaces, $val));
	}
	return $seo_array;
}

function getfirstname($str){
	if(ord($str)>="1" and ord($str)<=ord("z") ){
		return strtoupper($str); 
	}

	//$s=diconv("UTF-8","gb2312", $str);

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

function hsk_getimg($url, $imgpath = './data/hskcenter/temp', $widthx = 0, $heightx = 0) {
	global $_G, $s1,$_maxwidth,$_maxheight,$_maxresize;
	if(strtolower(substr($url, 0, 6)) == "http:/" || strtolower(substr($url, 0, 6)) == "ftp://"){
		$imgtype_inarray = array('jpg', 'jpge', 'gif', 'png');
		$img_type		= substr($url, strrpos($url, '.')+1);
		$img_type		= in_array($img_type, $imgtype_inarray) ? $img_type : 'jpg';
		
		//检查目录
		if(!is_dir(DISCUZ_ROOT.$imgpath))@mkdir(DISCUZ_ROOT.$imgpath);
		$imgpath .= "/".date("ym")."/";
		if(!is_dir(DISCUZ_ROOT.$imgpath))mkdir(DISCUZ_ROOT.$imgpath);
		$randname = rand(100,999);
		$newfilename	= $s1."~".time()."~".$randname.".".$img_type;
		$newfilename_	= $s1."~".time()."~".$randname."_.".$img_type;
		$uploadfile = DISCUZ_ROOT.$imgpath.$newfilename;
	}
	
	$c = hsk_getfile($url);
	if(@$fp = fopen("$uploadfile", 'w')) {
		fwrite($fp, "$c");
		fclose($fp);
	} else {
		return 0;
	}
	//处理URL
	$thisimg = getimagesize($uploadfile);
	$_maxwidth = $widthx ? $widthx : $_maxwidth;
	$_maxheight = $heightx ? $heightx : $_maxheight;
	if($thisimg[0] > $_maxwidth || $thisimg[1] > $_maxheight){
		$class = new resizeimage($uploadfile, $_maxwidth, $_maxheight, $_maxresize);
		$newfilename = $newfilename_;
	}

	$returnfile = $imgpath.$newfilename;
	
	//远程附件
	if($_G['setting']['ftp']['on']) {
		require_once libfile('class/ftp');
		$ftp = & discuz_ftp::instance();
		$ftp->connect();
		
		if($ftp->connectid && $ftp->upload(DISCUZ_ROOT.$returnfile, $returnfile)) {
			@unlink(DISCUZ_ROOT.$returnfile);
		}
		
	}
	return $returnfile;
}


function hsk_uploadimg($soucer, $imgpath = './data/hskcenter/temp', $widthx = 0, $heightx = 0){
	global $_G, $s1,$_maxwidth,$_maxheight,$_maxresize;

	if($soucer['error'])	return false;

	$name			= $soucer["name"];
	$tmp_name		= $soucer["tmp_name"];
	$type			= $soucer["type"];
	$filetype		= substr($name, strrpos($name, ".")+1);
	$size			= $soucer["size"];
	$maxsize		= 500*1024;	//最大允许上许文件大小
	if(!$name)		return false;

	$type_inarray	= array("image/pjpeg", "image/jpeg", "image/gif", "image/x-png", "image/png");
	if(!in_array($type, $type_inarray))		return false;
	if($size>$maxsize)						return false;
	

	if(!is_dir(DISCUZ_ROOT.$imgpath))@mkdir(DISCUZ_ROOT.$imgpath);
	$imgpath .= "/".date("ym")."/";
	if(!is_dir(DISCUZ_ROOT.$imgpath))mkdir(DISCUZ_ROOT.$imgpath);
	$randname = rand(100,999);
	$newfilename	= $s1."~".time()."~".$randname.".".$filetype;
	$newfilename_	= $s1."~".time()."~".$randname."_.".$filetype;
	$uploadfile = DISCUZ_ROOT.$imgpath.$newfilename;

	if(@copy($tmp_name, $uploadfile) || (function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $uploadfile))) {
		@unlink($tmp_name);
		$thisimg = getimagesize($uploadfile);
		$_maxwidth = $widthx ? $widthx : $_maxwidth;
		$_maxheight = $heightx ? $heightx : $_maxheight;
		if($thisimg[0] > $_maxwidth || $thisimg[1] > $_maxheight){
			$class = new resizeimage($uploadfile, $_maxwidth, $_maxheight, $_maxresize);
			$newfilename = $newfilename_;
		}

		$returnfile = $imgpath.$newfilename;
		
		//远程附件
		if($_G['setting']['ftp']['on']) {
			require_once libfile('class/ftp');
			$ftp = & discuz_ftp::instance();
			$ftp->connect();
			
			if($ftp->connectid && $ftp->upload(DISCUZ_ROOT.$returnfile, $returnfile)) {
				@unlink(DISCUZ_ROOT.$returnfile);
			}
			
		}
		return $returnfile;
	}
}



function hsk_tocache($script, $cachedata, $prefix = 'cache_vcenter_', $cache_dir = './data/hskcenter/') {
	global $_G;

	$dir = DISCUZ_ROOT.$cache_dir;
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if($fp = @fopen("$dir$prefix$script.php", 'wb')) {
		fwrite($fp, "<?php\n//Discuz! cache file, DO NOT modify me!\n//Cache By: Kannol(ddzz.cc)\n//Identify: ".md5($prefix.$script.'.php'.$cachedata.$_G['config']['security']['authkey'])."\n\n$cachedata?>");
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


function hsk_stylewrite(){
	//分类写入缓存
	global $_G;
	$query = DB::query("SELECT s.sid, s.sup, s.band, s.sort, s.scolor, s.sygroup, s.regroup, s.sortman, s.sortmoney, s.rewid, s.rehei, s.istv, f.fup, f.type FROM ".DB::table('vgallery_sort')." s LEFT JOIN ".DB::table('forum_forum')." f ON f.fid=s.band WHERE s.available='1' ORDER BY s.dps, s.sid");
	while($datarow = DB::fetch($query)) {
		$typelist[] = $datarow;
	}
	hsk_tocache('sort.inc', hsk_getcachevars(array('_SORT' => $typelist)), '_', './data/hskcenter/');
}

function hsk_sidupdate($sid, $abtype = 0){
	//分类写入缓存
	if(!$sid) return false;
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, timelong, remote FROM ".DB::table('vgallerys')." WHERE audit='1' and abtotal>=0 and subid=0 and (sid='$sid' or sid2='$sid' or sid3='$sid' or sid4='$sid') ORDER BY id desc limit 0, 15");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("sid_$sid.cache", hsk_getcachevars(array('_SIDLIST' => $typelist)), '_', './data/hskcenter/cache/');
}


function hsk_fidupdate($fid, $abtype = 0){
	//分类写入缓存
	if(!$fid) return false;
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, timelong, remote FROM ".DB::table('vgallerys')." WHERE audit='1' and abtotal>=0 and subid=0 and fid='$fid' ORDER BY id desc limit 0, 15");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("fid_$fid.cache", hsk_getcachevars(array('_FIDLIST' => $typelist)), '_', './data/hskcenter/cache/');
	total_fun();
}

function total_fun(){
	//最新数量
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1");
	$maxpage[1] = DB::result($query, 0);

	//取得今天的时间轴
	$todays = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1 and dateline>=$todays");
	$maxpage[2] = DB::result($query, 0);
	$maxpage[3] = $todays;

	hsk_tocache("totalfun.cache", hsk_getcachevars(array('_TOTALFUN' => $maxpage)), '_', './data/hskcenter/cache/');
}

function hsk_taghot(){
	global $_G, $astaghot;
	$query = DB::query("SELECT t.* FROM ".DB::table('common_tag')." t LEFT JOIN ".DB::table('vgallery_tags')." tt ON tt.tagid=t.tagid WHERE tt.idtype='HSKTAG' GROUP BY tt.tagid ORDER BY t.ashot desc, tt.tagid desc limit 0, $astaghot");
	while($datarow = DB::fetch($query)) {
		$typelist[] = $datarow;
	}
	$timeinfo = "\$tagid_cache_time = $_G[timestamp];\n";
	hsk_tocache("tagid_hot.cache", $timeinfo.hsk_getcachevars(array('_TAGIDLIST' => $typelist)), '_', './data/hskcenter/cache/');
}

function hsk_newactor(){
	global $_G;
	$query = DB::query("SELECT aid, name, alias, sex, region, photo, ashot FROM ".DB::table('vgallery_actor')." WHERE left(pcode,2)='01' or left(pcode,2)='11' ORDER BY aid desc limit 20");
	while($datarow = DB::fetch($query)) {
		$typelist[] = $datarow;
	}
	hsk_tocache("_newactor.cache", $timeinfo.hsk_getcachevars(array('_ACTORLIST' => $typelist)), '_', './data/hskcenter/cache/');
}


//最新视频
function hsk_newvod(){
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, remote, timelong FROM ".DB::table('vgallerys')." WHERE audit='1' and album='0' and abtotal>=0 ORDER BY id desc limit 0, 20");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("newlist.cache", hsk_getcachevars(array('_NEWLIST' => $typelist)), '_', './data/hskcenter/cache/');
}

//最新专辑
function hsk_newablist(){
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, remote FROM ".DB::table('vgallerys')." WHERE audit='1' and album in (1,2) and subid=0 ORDER BY id desc limit 0, 20");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("newablist.cache", hsk_getcachevars(array('_NEWABLIST' => $typelist)), '_', './data/hskcenter/cache/');
}

//最新剧集
function hsk_newabtotal(){
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, remote FROM ".DB::table('vgallerys')." WHERE audit='1' and album=3 and subid=0 ORDER BY id desc limit 0, 20");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("newabtotal.cache", hsk_getcachevars(array('_NEWABTOTAL' => $typelist)), '_', './data/hskcenter/cache/');
}

//最新剧集更新中的
function hsk_newab_update(){
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, remote FROM ".DB::table('vgallerys')." WHERE audit='1' and album=3 and subid=0 and abtotal>0 and vsum>0 and vsum<abtotal ORDER BY updateline desc limit 0, 20");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 30, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("newab_update.cache", hsk_getcachevars(array('_NEWUPDATE' => $typelist)), '_', './data/hskcenter/cache/');
}

//最热播客
function hsk_hotuser(){
	global $_G;
	$query = DB::query("SELECT m.*, mm.username FROM ".DB::table('vgallery_member')." m LEFT JOIN ".DB::table('common_member')." mm ON mm.uid=m.mid WHERE m.shares>0 ORDER BY m.shares desc limit 0, 30");
	while($datarow = DB::fetch($query)) {
		$datarow['usernamec'] = cutstr($datarow['username'], 10, '..');
		$typelist[] = $datarow;
	}
	hsk_tocache("hotuser.cache", hsk_getcachevars(array('_HOTUSER' => $typelist)), '_', './data/hskcenter/cache/');
}

//ALBUM 热点聚焦缓存
function mark_album_cache(){
	global $_G;
	$query = DB::query("SELECT a.*, m.vsubject, m.album FROM ".DB::table('vgallery_album')." a LEFT JOIN ".DB::table('vgallerys')." m ON m.id=a.vid where a.displayer=1 order by a.byorder, a.id desc limit 10");
	while($datarow = DB::fetch($query)) {
		if($datarow['album']){
			$datarow['link1'] = sendurl('dlist', 0, $datarow['vid']);
			$datarow['link2'] = sendurl('acshow', 'end', $datarow['vid']);
		}else{
			$datarow['link1'] = $datarow['link2'] = sendurl('show', 0, $datarow['vid']);
		}
		$datarow['title'] = cutstr($datarow['title'], 90, '..');
		$datarow['picture'] = getuseimg($datarow['picture'], $datarow['remote']);
		$datarow['spic'] = getuseimg($datarow['spic'], $datarow['remote']);
		$typelist[] = $datarow;
	}
	hsk_tocache("index_album.cache", hsk_getcachevars(array('_INDEXALBUM' => $typelist)), '_', './data/hskcenter/cache/');
}

//ALBUM 推荐视频缓存
function mark_top_cache(){
	global $_G;
	$query = DB::query("SELECT a.title, a.vid, a.uid, a.picture, a.remote, u.username FROM ".DB::table('vgallery_top5')." a LEFT JOIN ".DB::table('common_member')." u ON u.uid=a.uid order by a.dps, a.id desc limit 12");
	while($datarow = DB::fetch($query)) {
		$ilang = !$ilang ? 34 : 22;
		$datarow['titlec'] = cutstr($datarow['title'], $ilang, '..');
		$datarow['picture'] = getuseimg($datarow['picture'], $datarow['remote']);
		unset($datarow['remote']);
		$typelist[] = $datarow;
	}
	hsk_tocache("index_top.cache", hsk_getcachevars(array('_INDEXTOP' => $typelist)), '_', './data/hskcenter/cache/');
}

//顶的最多的视频
function hsk_dingvod(){
	global $_G;
	$query = DB::query("SELECT id, vsubject, purl, tid, vsum, abtotal, vurl, uid, views, polls, valuate, remote, chk_up, chk_down FROM ".DB::table('vgallerys')." WHERE audit='1' and abtotal>=0 ORDER BY chk_up desc, id limit 0, 20");
	while($datarow = DB::fetch($query)) {
		$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
		$datarow['vsubjectc'] = cutstr($datarow['vsubject'], 24, '..');
		$typelist[] = $datarow;
	}
	$timeinfo = "\$ding_cache_time = $_G[timestamp];\n";
	hsk_tocache("dinglist.cache", hsk_getcachevars(array('_DINGLIST' => $typelist)), '_', './data/hskcenter/cache/');
}



function gzdecode ($data) { 
	$flags = ord(substr($data, 3, 1)); 
	$headerlen = 10; 
	$extralen = 0; 
	$filenamelen = 0; 
	if ($flags & 4) { 
		$extralen = unpack('v' ,substr($data, 10, 2)); 
		$extralen = $extralen[1]; 
		$headerlen += 2 + $extralen; 
	} 
	if ($flags & 8) // Filename 
		$headerlen = strpos($data, chr(0), $headerlen) + 1; 
	if ($flags & 16) // Comment 
		$headerlen = strpos($data, chr(0), $headerlen) + 1; 
	if ($flags & 2) // CRC at end of file 
		$headerlen += 2; 
	$unpacked = @gzinflate(substr($data, $headerlen)); 
	if ($unpacked === FALSE) 
		$unpacked = $data; 
	return $unpacked; 
} 


function checkthetime($val){
	if(!$val){
		return "00'00";
	}else{
		$a = floor($val/60);
		if(strlen($a)<=2){
			$a = substr("00", 0, 2-strlen($a)).$a;
		}
		$b = $val%60;
		$c = $a."'".substr("00", 0, 2-strlen($b)).$b;
		return $c;
	}
}


function hsk_addtag($tags, $itemid , $typeid = 'HSKTAG') {
	global $_G;

	if($tags == '') {
		return;
	}

	$tags = str_replace(array(chr(0xa3).chr(0xac), chr(0xa1).chr(0x41), chr(0xef).chr(0xbc).chr(0x8c), ' '), ',', censor($tags));
	if(strexists($tags, ',')) {
		$tagarray = array_unique(explode(',', $tags));
	} else {
		$tagarray = array_unique(explode(' ', $tags));
	}
	$tagcount = 0;
	foreach($tagarray as $tagname) {
		$tagname = trim($tagname);
		if(preg_match('/^([\x7f-\xff_-]|\w|\s){3,20}$/', $tagname)) {
			$result = DB::fetch_first("SELECT tagid, status FROM ".DB::table('common_tag')." WHERE tagname='$tagname'");
			if($result['tagid']) {
				if(!$result['status']) {
					$tagid = $result['tagid'];
					DB::query("UPDATE ".DB::table('common_tag')." SET ashot=ashot+1 WHERE tagid='$tagid'", 'UNBUFFERED');
				}
			} else {
				DB::query("INSERT INTO ".DB::table('common_tag')." (tagname, status, ashot) VALUES ('$tagname', '0', '1')");
				$tagid = DB::insert_id();
			}
			if($tagid) {
				DB::query("INSERT INTO ".DB::table('vgallery_tags')." (tagid, tagname, itemid, idtype) VALUES ('$tagid', '$tagname', '$itemid', '$typeid')");
				$tagcount++;
				$tagstr .= $tagid.','.$tagname.'\t';
			}
			if($tagcount > 3) {
				unset($tagarray);
				break;
			}
		}
	}
	return $tagstr;
}

function delete_tag($tags, $itemid, $typeid = 'HSKTAG'){
	global $_G;

	if($tags == '') {
		return;
	}

	foreach($tags as $tagname) {
		$tagname = trim($tagname);
		$result = DB::fetch_first("SELECT tagid, status FROM ".DB::table('common_tag')." WHERE tagname='$tagname'");
		if($result['tagid']) {
			if(!$result['status']) {
				$tagid = $result['tagid'];
				DB::query("UPDATE ".DB::table('common_tag')." SET ashot=ashot-1 WHERE tagid='$tagid'", 'UNBUFFERED');
				DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$tagid' AND itemid='$itemid' AND idtype='HSKTAG'");
			}
		}
	}
}

function hsk_addactor($actors, $itemid , $typeid = 'HSKACT') {
	global $isaddactor;

	if($actors == '') {
		return;
	}

	$actors = str_replace(array(chr(0xa3).chr(0xac), chr(0xa1).chr(0x41), chr(0xef).chr(0xbc).chr(0x8c), ' '), ',', censor($actors));
	if(strexists($actors, ',')) {
		$tagarray = array_unique(explode(',', $actors));
	} else {
		$tagarray = array_unique(explode(' ', $actors));
	}
	$tagcount = 0;
	foreach($tagarray as $tagname) {
		$tagname = trim($tagname);
		if(preg_match('/^([\x7f-\xff_-]|\w|\s){3,20}$/', $tagname)) {
			$result = DB::fetch_first("SELECT aid, name FROM ".DB::table('vgallery_actor')." WHERE name='$tagname'");
			if($result['name']) {
				$actorid = $result['aid'];
				DB::query("UPDATE ".DB::table('vgallery_actor')." SET ashot=ashot+1 WHERE aid='$actorid'", 'UNBUFFERED');
			} elseif($isaddactor) {
				$firstzb = getfirstname($tagname);
				DB::query("INSERT INTO ".DB::table('vgallery_actor')." (name, firstname, director, region, pcode, ashot) VALUES ('$tagname', '$firstzb', 0, 0, '01000', 1)");
				$actorid = DB::insert_id();
			}
			if($actorid) {
				DB::query("INSERT INTO ".DB::table('vgallery_tags')." (tagid, tagname, itemid, idtype) VALUES ('$actorid', '$tagname', '$itemid', '$typeid')");
				$tagcount++;
				$tagstr .= $actorid.','.$tagname.'\t';
			}
			if($tagcount > 7) {
				unset($tagarray);
				break;
			}
		}
	}
	return $tagstr;
}

function delete_actor($actors, $itemid, $typeid = 'HSKACT'){
	global $_G;

	if($actors == '') {
		return;
	}
	foreach($actors as $tagname) {
		$tagname = trim($tagname);
		$result = DB::fetch_first("SELECT aid, name FROM ".DB::table('vgallery_actor')." WHERE name='$tagname'");
		if($result['name']) {
			$actorid = $result['aid'];
			DB::query("UPDATE ".DB::table('vgallery_actor')." SET ashot=ashot-1 WHERE aid='$actorid'", 'UNBUFFERED');
			DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$actorid' AND itemid='$itemid' AND idtype='HSKACT'");
		}
	}
}

function hsk_director($actors, $itemid) {
	global $isaddactor;

	if($actors == '') {
		return;
	}

	$actors = str_replace(array(chr(0xa3).chr(0xac), chr(0xa1).chr(0x41), chr(0xef).chr(0xbc).chr(0x8c), ' '), ',', censor($actors));
	if(strexists($actors, ',')) {
		$tagarray = array_unique(explode(',', $actors));
	} else {
		$tagarray = array_unique(explode(' ', $actors));
	}
	$tagcount = $actorid = 0;
	foreach($tagarray as $tagname) {
		$tagname = trim($tagname);
		if(preg_match('/^([\x7f-\xff_-]|\w|\s){3,20}$/', $tagname)) {
			$result = DB::fetch_first("SELECT aid, name FROM ".DB::table('vgallery_actor')." WHERE director=1 and name='$tagname'");
			if($result['name']) {
				$actorid = $result['aid'];
			} elseif($isaddactor) {
				$firstzb = getfirstname($tagname);
				DB::query("INSERT INTO ".DB::table('vgallery_actor')." (name, firstname, director, region, pcode) VALUES ('$tagname', '$firstzb', 1, 1, '10000')");
				$actorid = DB::insert_id();
			}
			$tagcount++;
			if($tagcount > 0) {
				unset($tagarray);
				break;
			}
		}
	}
	return $actorid;
}



function loadmsg($msg, $title, $user, $vid, $url, $dateline, $price, $types=1){
	global $_G, $tmp_list, $free_list, $playurl;
	//取得类型

	//CMP4优先级高于DOMAIN播放器
	$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';
	if(!file_exists($cmp_config)){}else{
		//加载参数
		require_once "$cmp_config";
		//判断是否在使用权限之内(domain)
		$incmpdomain = explode(",", $_CMP4['cmp_config']['senddomain']);
		foreach($incmpdomain as $val){
			$indomaincmp = strpos($url, strtolower($val));
			if($indomaincmp > 0){
				$theplayer_style = 'cmp';
				$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
				$urlcode = '[flash=720,460]'.$flash_url.'[/flash]';
				break;
			}
		}
	}
	
	
	if($theplayer_style == 'cmp'){}else{
		$thestyle = strtolower(substr(strrchr($url,"."),1));
		if(in_array($thestyle, array('mp4','flv','f4v','mp3'))){
			$theplayer_style = 'cmp';
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
			$urlcode = '[flash=720,460]'.$flash_url.'[/flash]';
		}elseif('qvod://' == strtolower(substr($url, 0, 7))){
			$theplayer_style = 'cmp';
			$flash_url = $_G['siteurl']."v/".$_CMP4['cmp_config']['playername']."?php=$vid/v.swf";
			$urlcode = '[flash=720,460]'.$flash_url.'[/flash]';
		}elseif('mms://' == strtolower(substr($url, 0, 6))){
			$urlcode = '[media=mms,720,460]'.$url.'[/media]';
		}elseif('rtsp://' == strtolower(substr($url, 0, 7)) || 'bdhd://' == strtolower(substr($url, 0, 7))){
			$urlcode = '[ddzz=bdhd,720,460]'.$url.'[/ddzz]';
		}elseif(in_array($thestyle, array('wmv','avi','wma','mp4','mp3','rm','rmvb','ram','ra','mov','asf'))){
			$urlcode = '[media='.$thestyle.',720,460]'.$url.'[/media]';
		}else{
			$urlcode = '[flash=720,460]'.$url.'[/flash]';
		}
	}

	$playurl = sendurl('show', 0, $vid);

	//收费模式
	if($price){
		$tmp_list = $free_list;
		$urlcode = '';
	}

	//替换内容
	$searchs = array('/{RE_TITLE}/', '/{RE_AUTHOR}/', '/{RE_DATE}/', '/{RE_THEURL}/', '/{RE_PLAYER}/', '/{RE_MESSAGE}/');
	$replaces = array($title, $user, $dateline, $playurl, $urlcode, $msg);
	$message = trim(preg_replace($searchs, $replaces, $tmp_list));
	return $message;
}


function sendurl($mods, $fs='null', $fsid=0, $types=0, $m=0, $s=0, $page=1, $hpclose=0, $address=0, $years=0){
	global $hp;
	$hpclose = intval($hpclose);
	if(in_array($mods, array('list','dlist','actor'))){
		$fs = $fs == 's' ? 's' : 'f';
	}
	$fsid = intval($fsid);
	$types = intval($types)<0 || intval($types)>3 ? 0 : intval($types);
	$m = intval($m)<0 || intval($m)>3 ? 0 : intval($m);
	$s = intval($s)<0 || intval($s)>2 ? 0 : intval($s);
	$page = max(intval($page),1);
	$address = intval($address);
	$years = intval($years);

	if($hp && !$hpclose){
		switch($mods){
			case 'alist':
				return $mods."-".$fs."-".$fsid."-".$types."-".$m."-".$s."-".$address."-".$years."-".$page.".html";
				break;
			case 'dlist':
				return $mods."-".$fsid."-".$m."-".$s."-".$page.".html";
				break;
			case 'show':
				$fs = in_array($fs, array("v","t")) ? 'v' : $fs;
				if($fs=='v'){
					return $mods."-".$fsid.".html";
				}else{
					return $mods."-".$fs."-".$fsid.".html";
				}
				break;
			case 'pushshow':
				$fs = in_array($fs, array("v","t")) ? 'v' : $fs;
				if($fs=='v'){
					return $mods."-".$fsid.".html";
				}else{
					return $mods."-".$fs."-".$fsid.".html";
				}
				break;
			case 'tag':
				return $mods."-".$fsid."-".$types."-".$s."-".$page.".html";
				break;
			case 'actor':
				return $mods."-".$fs."-".$fsid."-".$page.".html";
				break;
			case 'acshow':
				return $mods."-".$fs."-".$fsid.".html";
				break;
			case 'author':
				return $mods."-".$fsid."-".$page.".html";
				break;
			case 'today':
				return "today-$page.html";
				break;
		}
	}else{
		$fspage = $mods=='list' && $fs && $fsid ? "&$fs"."id=".$fsid : null;
		$typepage = $types ? "&types=$types" : null;
		if($mods == 'dlist'){
			$mpage = $m ? "&t=$m" : null;
		}else{
			$mpage = $m ? "&m=$m" : null;
		}
		$spage = $s ? "&s=$s" : null;
		$pageurl = $page>1 ? "&page=$page" : null;
		$any_1 = $address ? "&address=$address" : null;
		$any_2 = $years ? "&years=$years" : null;

		switch($mods){
			case 'list':
				return PDIR."&mod=$mods".$fspage.$typepage.$mpage.$spage.$any_1.$any_2.$pageurl;
				break;
			case 'dlist':
				return PDIR."&mod=ablist&vid=".$fsid.$mpage.$spage.$pageurl;
				break;
			case 'show':
				return PDIR."&mod=view&vid=".$fsid;
				break;
			case 'pushshow':
				return "plugin.php?id=hsk_vcenter&mod=view&vid=".$fsid;
				break;
			case 'tag':
				return PDIR."&mod=tag&vid=".$fsid.$typepage.$spage.$pageurl;
				break;
			case 'actor':
				return PDIR."&mod=actor&action=".$fs."&aid=".$fsid.$pageurl;
				break;
			case 'acshow':
				return PDIR."&mod=acshow&action=".$fs."&vid=".$fsid;
				break;
			case 'author':
				return PDIR."&mod=author&uid=".$fsid.$pageurl;
				break;
			case 'today':
				return PDIR."&mod=today".$pageurl;
				break;
		}
	}
}



function hsk_iconv($str, $charset_b, $charset_f){
	if(!$charset_b || !$charset_f || !$str)		return false;

	//判断各编码类别
	$charset_b = strtolower($charset_b);
	$charset_f = strtolower($charset_f);


	if($charset_b == $charset_f){
		return $str;
	}else{
		$charset_b = $charset_b == 'gbk' ? 'GB18030' : $charset_b;
		$charset_f = $charset_f == 'gbk' ? 'GB18030' : $charset_f;
		//dexit($charset_b."|".$charset_f);
		$str = diconv($str, $charset_b, $charset_f);
		return $str;
	}
}

function getuseimg($img, $remote=0, $imgsrc=''){
	global $_G;
	if(!$imgsrc)$imgsrc = NOIMG;
	if($imgsrc == 'null')$imgsrc = '';
	if(!$img) return $imgsrc;
	if($remote){
		$img = $_G['setting']['ftp']['attachurl'].$img;
	}else{
		if(substr($img,0,7) != 'http://'){
			$thepicurl = DISCUZ_ROOT.$img;
			if(!file_exists("$thepicurl") || !$img){
				$img = $imgsrc;
			}
		}
	}
	return $img;
}



function update_ablist($vid){
	global $_G, $tmp_ablist;
	$vid = intval($vid);
	if(!$vid)	return false;

	$query = DB::query("SELECT * from ".DB::table("vgallerys")." WHERE (sup='$vid' or id='$vid') and audit=1 order by id");
	$i=1;
	while($datarow = DB::fetch($query)){
		if($datarow['id'] == $vid){//是专辑
			$vsum				= $datarow['vsum'];
			$abtotal			= $datarow['abtotal'];
			$ab_replace[]		= $subject = $datarow['vsubject'];
			$ab_replace[]		= $datarow['remote'] ? "[img][url=".sendurl('dlist','0',$vid,0,0)."]".getuseimg($datarow['purl'], $datarow['remote'])."[/img][/url]" : "[url=".sendurl('dlist','0',$vid,0,0)."][img]".$_G['siteurl'].getuseimg($datarow['purl'], $datarow['remote'])."[/img][/url]";
			$ab_sort			= $datarow['sidstr'];
			$ab_actor			= $datarow['actor'];
			$ab_director		= $datarow['director'];

			//处理演员和类别
			$sidarray = explode("\t", $ab_sort);
			$tmpstr = null;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0] && $sidnewarray[1]){
					$shu = $tmpstr ? "|" : null;
					$tmpstr .= $shu." [url=".sendurl('list','s',$sidnewarray[0],0,0,0,1)."]".$sidnewarray[1]."[/url] ";
				}
			}
			$ab_replace[] = $tmpstr;

			$sidarray = explode("\t", $ab_actor);
			$tmpstr = null;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0] && $sidnewarray[1]){
					$shu = $tmpstr ? "|" : null;
					$tmpstr .= $shu." [url=".sendurl('actor','s',$sidnewarray[0])."]".$sidnewarray[1]."[/url] ";
				}
			}
			$ab_replace[] = $tmpstr;
			
			$ab_replace[]		= get_director($ab_director);
			$ab_replace[]		= get_name($datarow['years'], 'years');
			$ab_replace[]		= get_name($datarow['address'], 'address');
			$ab_replace[]		= get_name($datarow['language'], 'language');
			$ab_replace[]		= $datarow['vinfo'];
			$pid				= $datarow['pid'];
			$tid				= $datarow['tid'];
		}else{
			$trs .= "[tr][td=30][align=center] $i. [/align][/td][td] $datarow[vsubject] [/td][td][url=".sendurl('show',0, $datarow['id'])."]Open[/url][/td][/tr]\n";
			$msg .= $datarow['vinfo'] ? "[b]".$datarow['vsubject'].":[/b] \n\n　　".$datarow['vinfo']."\n\n" : null;
			$i++;
		}
	}

	if($i<=1){
		$ab_replace[] = 'Did not find any video!';
	}else{
		$ab_replace[] = '[table]'.$trs.'[/table]';
	}
	$ab_replace[] = $msg;

	//替换内容
	$searchs = array('/{RE_ABTITLE}/', '/{RE_ABIMG}/', '/{RE_SORT}/', '/{RE_ACTORS}/', '/{RE_DIRECTOR}/', '/{RE_YEARS}/', '/{RE_ADDRESS}/', '/{RE_LANGUAGE}/', '/{RE_ABINFO}/', '/{RE_ABLIST}/', '/{RE_ABLISTINFO}/');
	$message = trim(preg_replace($searchs, $ab_replace, $tmp_ablist));

	$subject = $vsum < $abtotal ? $subject." ( $vsum / $abtotal )" : $subject;

	if($tid)DB::query("UPDATE ".DB::table('forum_thread')." SET subject='$subject' where tid='$tid'");
	if($pid)DB::query("UPDATE ".DB::table('forum_post')." SET subject='$subject', message='$message' where pid='$pid'");

}



function get_name($id, $file){
	if(!$id || !$file)	return false;
	if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_'.$file.'.inc.php')){
		@require DISCUZ_ROOT.'./data/hskcenter/hsk_'.$file.'.inc.php';
		$pack = $file."_new";
		$returns = $$pack;
		return $returns[$id];
	}else{
		return false;
	}
}


function get_director($aid){
	global $_G;
	$query = DB::query("SELECT name from ".DB::table("vgallery_actor")." WHERE aid='$aid'");
	if($actorlist = DB::fetch($query)){
		return "[url=".sendurl('actor','f',$aid)."]".$actorlist['name']."[/url]";
	}else{
		return 'Nofind';
	}
}

function sendnewarray($arr, $innew){

	//先删除空数据
	foreach($arr as $key=>$val){
		if(!$val['id']){unset($arr[$key]);}
	}

	//检查是否有相同的数据
	$repid = 0;
	foreach($arr as $key=>$val){
		//找到要被代替的那条记录
		if($val['sup'] == $innew['sup'] && $val['sup']>0 || $val['id'] == $innew['id']){
			$reparr = $arr[$key];
			$repkey = $key;
			$repid = 1;
		}
	}
	//根据情况 生成新数组
	$newarray[0] = $innew;
	$i = 1;
	foreach($arr as $key=>$val){
		if($repid && $repkey == $key){}else{
			$newarray[$i] = $val;
			if($i>=9)break;
			$i++;
		}
	}
	return $newarray;
}


function pushtag($subject, $message){
	$subjectenc = rawurlencode(strip_tags($subject));
	$messageenc = rawurlencode(strip_tags(preg_replace("/\[.+?\]/U", '', $message)));
	$data = @implode('', file("http://keyword.discuz.com/related_kw.html?ics=".CHARSET."&ocs=".CHARSET."&title=$subjectenc&content=$messageenc"));

	if($data) {

		if(PHP_VERSION > '5' && CHARSET != 'utf-8') {
			require_once libfile('class/chinese');
			$chs = new Chinese('utf-8', CHARSET);
		}

		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $data, $values, $index);
		xml_parser_free($parser);

		$kws = array();

		foreach($values as $valuearray) {
			if($valuearray['tag'] == 'kw' || $valuearray['tag'] == 'ekw') {
				$kws[] = !empty($chs) ? $chs->convert(trim($valuearray['value'])) : trim($valuearray['value']);
			}
		}

		$return = '';
		if($kws) {
			foreach($kws as $kw) {
				$kw = htmlspecialchars($kw);
				$br = $return ? ',' : null;
				$return = $return.$br.$kw;
			}
			$return = htmlspecialchars($return);
		}
		return $return;
	}
}


function hsk_dele_vgallery($vids){
	global $_G;
	$deletesql = implode(",", $vids);

	$query = DB::query("SELECT v.uid, v.purl, v.tid, v.fid, v.sid, v.sid2, v.sid3, v.sid4, v.sup, v.tag, v.remote, s.band FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid WHERE v.id IN ($deletesql)");

	$cache_fsort = $cache_sort = array();
	while($datadele = DB::fetch($query)){
		if(substr($datadele['purl'],0,7) != 'http://'){
			$filename = $datadele['purl'];
			$remote = $datadele['remote'];
			$atta_arr = array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0);
			//print_r($atta_arr);dexit();
			hsk_unlink($atta_arr);
		}
		//删除主题
		if($datadele['tid']){
			deletethread($datadele['tid'], true, true);
			updateforumcount($datadele['band']);
		}

		//如果是专辑内的，对专辑进行调节
		if($datadele['sup']){
			DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum-1 WHERE id='$datadele[sup]'");
		}

		//处理TAG
		if($datadele['tag']){

			//有TAG，生成TAG数组
			$sidarray = array();
			$sidarray = explode("\t", $datadele['tag']);

			$tagid=0;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0]){
					$tagid = $sidnewarray[0];
					DB::query("UPDATE ".DB::table('common_tag')." SET ashot=ashot-1 WHERE tagid='$tagid'", 'UNBUFFERED');
					DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$tagid' AND itemid='$datadele[id]' AND idtype='HSKTAG'");
				}
			}
		}

		//处理演员
		if($datadele['actor']){

			$sidarray = array();
			$sidarray = explode("\t", $datadele['actor']);

			$tagid=0;
			foreach($sidarray as $val){
				$sidnewarray = explode(',', $val);
				if($sidnewarray[0]){
					$tagid = $sidnewarray[0];
					DB::query("UPDATE ".DB::table('vgallery_actor')." SET ashot=ashot-1 WHERE aid='$tagid'", 'UNBUFFERED');
					DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$tagid' AND itemid='$datadele[id]' AND idtype='HSKACT'");
				}
			}
		}

		//处理用户资料数
		DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares-1 WHERE mid='$datadele[uid]'");			

		//处理那些于此视频关联的视频
		DB::query("UPDATE ".DB::table('vgallerys')." SET subid='0' WHERE subid='$datadele[id]'");			
		
		//处理分类缓存
		$cache_sort[] = $datadele['sid'];
		$cache_sort[] = $datadele['sid2'];
		$cache_sort[] = $datadele['sid3'];
		$cache_sort[] = $datadele['sid4'];
		$cache_fsort[] = $datadele['fid'];
	}

	//处理分类缓存
	$_cachesort = array_unique($cache_sort);
	foreach($_cachesort as $val){
		hsk_sidupdate($val);
	}

	$_cachesort = array_unique($cache_fsort);
	foreach($_cachesort as $val){
		hsk_fidupdate($val);
	}

	//继续删除视频内容
	DB::query("DELETE FROM ".DB::table('vgallerys')." WHERE id IN ($deletesql)");
	hsk_taghot();
	hsk_newvod();
	total_fun();
}


function hsk_dele_plist($vids, $notdepic = 0){

	if(!$vids) return false;
	$query = DB::query("SELECT uid, purl, tid, fid, sid, sid2, sid3, sid4, sup, tag, remote FROM ".DB::table('vgallerys')." WHERE id='$vids'");
	if(!$datadele = DB::fetch($query)){
		return false;
	}

	//开始处理
	if(substr($datadele['purl'],0,7) != 'http://' && !$notdepic){
		$filename = $datadele['purl'];
		$remote = $datadele['remote'];
		$atta_arr = array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0);
		//print_r($atta_arr);dexit();
		hsk_unlink($atta_arr);
	}
	//删除主题
	if($datadele['tid']){
		deletethread($datadele['tid'], true, true);
		updateforumcount($datadele['band']);
	}

	//处理那些于此视频关联的视频
	DB::query("UPDATE ".DB::table('vgallerys')." SET subid='0' WHERE subid='$vids'");

	//处理TAG
	if($datadele['tag']){

		//有TAG，生成TAG数组
		$sidarray = array();
		$sidarray = explode("\t", $datadele['tag']);

		$tagid=0;
		foreach($sidarray as $val){
			$sidnewarray = explode(',', $val);
			if($sidnewarray[0]){
				$tagid = $sidnewarray[0];
				DB::query("UPDATE ".DB::table('common_tag')." SET ashot=ashot-1 WHERE tagid='$tagid'", 'UNBUFFERED');
				DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$tagid' AND itemid='$vids' AND idtype='HSKTAG'");
			}
		}
	}

	//处理演员
	if($datadele['actor']){

		$sidarray = array();
		$sidarray = explode("\t", $datadele['actor']);

		$tagid=0;
		foreach($sidarray as $val){
			$sidnewarray = explode(',', $val);
			if($sidnewarray[0]){
				$tagid = $sidnewarray[0];
				DB::query("UPDATE ".DB::table('vgallery_actor')." SET ashot=ashot-1 WHERE aid='$tagid'", 'UNBUFFERED');
				DB::query("DELETE FROM	".DB::table('vgallery_tags')." WHERE tagid='$tagid' AND itemid='$vids' AND idtype='HSKACT'");
			}
		}
	}

	//处理用户资料数
	DB::query("UPDATE ".DB::table('vgallery_member')." SET ablists=ablists-1 WHERE mid='$datadele[uid]'");

	//处理分类缓存
	$cache_sort[] = $datadele['sid'];
	$cache_sort[] = $datadele['sid2'];
	$cache_sort[] = $datadele['sid3'];
	$cache_sort[] = $datadele['sid4'];
	$cache_fsort[] = $datadele['fid'];

	//处理分类缓存
	$_cachesort = array_unique($cache_sort);
	foreach($_cachesort as $val){
		hsk_sidupdate($val);
	}

	$_cachesort = array_unique($cache_fsort);
	foreach($_cachesort as $val){
		hsk_fidupdate($val);
	}

	//继续删除视频内容
	DB::query("DELETE FROM ".DB::table('vgallerys')." WHERE id='$vids'");
	hsk_taghot();
	hsk_newabtotal();
	hsk_newab_update();
	total_fun();
}

function hsk_dele_tvlist($vids){
	global $_G;
	if(!$vids) return false;
	$deletesql = implode(",", $vids);

	$query = DB::query("SELECT uid, purl, tid, fid, sid, sid2, sid3, sid4, sup, tag, remote FROM ".DB::table('vgallerys')." WHERE id IN ($deletesql)");

	$t = 0;
	while($datadele = DB::fetch($query)){
		if(substr($datadele['purl'],0,7) != 'http://' && $datadele['purl']){
			$filename = $datadele['purl'];
			$remote = $datadele['remote'];
			$atta_arr = array('attachment' => $filename, 'remote' => $remote, 'thumb' => 0);
			//print_r($atta_arr);dexit();
			hsk_unlink($atta_arr);
		}
		$t++;
		if(!$supid){
			$supid = $datadele['sup'];
			$supuid = $datadele['uid'];
		}
	}

	//继续删除视频内容
	DB::query("DELETE FROM ".DB::table('vgallerys')." WHERE id IN ($deletesql)");
	DB::query("UPDATE ".DB::table('vgallerys')." SET vsum=vsum-$t WHERE id='$supid'");
	//处理用户资料数
	DB::query("UPDATE ".DB::table('vgallery_member')." SET shares=shares-$t WHERE mid='$supuid'");			
	total_fun();
	hsk_newabtotal();
	hsk_newab_update();
}


function hsk_audit_vgallery($vids, $istv = 0){
	global $_G;
	$deletesql = implode(",", $vids);

	$query = DB::query("SELECT v.uid, v.purl, v.tid, v.fid, v.sid, v.sid2, v.sid3, v.sid4, v.tag, v.remote, s.band FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('vgallery_sort')." s ON s.sid=v.fid WHERE v.id IN ($deletesql)");

	$cache_fsort = $cache_sort = array();
	while($datadele = DB::fetch($query)){
		//处理分类缓存
		$cache_sort[] = $datadele['sid'];
		$cache_sort[] = $datadele['sid2'];
		$cache_sort[] = $datadele['sid3'];
		$cache_sort[] = $datadele['sid4'];
		$cache_fsort[] = $datadele['fid'];
		$tidarr[] = $datadele['tid'];
	}

	$tidarr = implode(",", $tidarr);
	$query = DB::query("Update ".DB::table('vgallerys')." set audit='1' WHERE id IN ($deletesql)");
	$query = DB::query("Update ".DB::table('forum_thread')." set closed='0', displayorder='0' WHERE tid IN ($tidarr)");

	//处理分类缓存
	$_cachesort = array_unique($cache_sort);
	foreach($_cachesort as $val){
		hsk_sidupdate($val);
	}

	$_cachesort = array_unique($cache_fsort);
	foreach($_cachesort as $val){
		hsk_fidupdate($val);
	}

	//最新视频缓存
	hsk_newvod();
	if($istv){
		hsk_newabtotal();
		hsk_newab_update();
	}
}


function hsk_unlink($attach) {
	global $_G;
	$filename = $attach['attachment'];
	if(!$filename)return false;

	$remote = $attach['remote'];
	if($remote) {
		require_once libfile('class/ftp');
		$ftp = & discuz_ftp::instance();
		$ftp->connect();
		$filename = $_G['setting']['ftp']['attachdir'].substr($filename, 1);
		//dexit($filename);
		$ftp->ftp_delete($filename);

	} else {
		$filename = DISCUZ_ROOT.$filename;
		@unlink($filename);
	}
}


function hsk_block($rows){
	global $_ADLIST;
	if($rows['type']>2||$rows['type']<1)return false;
	$rows['funid'] = intval($rows['funid']);
	if(!$rows['funid'])return false;

	if(in_array($rows['funid'], array(1,2,3,4,5,6,7))){
		//FID显示
		$files = DISCUZ_ROOT.'./data/hskcenter/block/_'.$rows['type'].'_'.$rows['id'].'.cache.php';
		if(file_exists("$files")){
			@require "$files";

			@require DISCUZ_ROOT.$_SEND['files'];
			$_MATH = $$_SEND['math'];
			if(!$_MATH)return false;
			$i=1;
			if($_SEND['type'] == 1){
				//左侧的显示
				$str = '<div class="collgrid6t" style="padding:1px;"><div class="items">';
				foreach($_MATH as $datarow){
					if($i>$_SEND['sum'])break;
					$i5 = $i%5==0 ? ' last' : null;
					if($_SEND['istv'] || in_array($rows['funid'], array(5,7))){
						if($datarow['abtotal'] && $datarow['vsum'] >= $datarow['abtotal']){
							$absum = $datarow['abtotal'].lang('plugin/hsk_vcenter', 'thetv1').lang('plugin/hsk_vcenter', 'thetv2');
						}elseif($datarow['timelong']){
							$absum = checkthetime($datarow['timelong']);
						}elseif($datarow['vsum']){
							$absum = lang('plugin/hsk_vcenter', 'thetv0').$datarow['vsum'];
						}
					}
					$vinf = $absum ? '<span class="vpbg"></span><span class="vinf">'.$absum.'</span>' : null;
					$str1 .= '<ul class="p'.$i5.'" style="width:120px;"><li class="p_thumb" style="height:'.$_SEND['heigh'].'px;"><a title="'.$datarow['vsubject'].'" href="'.sendurl('show', 0, $datarow['id']).'"><img class="clipImg" alt="'.$datarow['vsubject'].'" src="'.$datarow['purl'].'"></a>'.$vinf.'</li><li class="p_title"><a title="'.$datarow['vsubject'].'" href="'.sendurl('show', 0, $datarow['id']).'" class="xs2">'.cutstr($datarow['vsubject'], 14, '').'</a></li></ul>';
					$i++;
				}
				$str = $str.$str1.'</div></div>';
				echo $str;
			}elseif($_SEND['type'] == 2){
				//右侧的要进行判断
				if($_SEND['style'] == 1){
					//无图模式
					$ic=0;
					foreach($_MATH as $datarow){
						if($ic>$_SEND['sum']-1)break;
						$str1 .= '<div style="margin:6px 0px 6px 0px"><a title="'.$datarow['vsubject'].'" href="'.sendurl('show', 0, $datarow['id']).'" style="background:url('.MDIR.'/n'.$ic.'.gif) no-repeat 0px 3px; padding-left:18px;">'.$datarow['vsubjectc'].'</a></div><hr style="margin: 0px;" class="da">';
						$ic++;
					}
					echo $str1;
				}elseif($_SEND['style'] == 2){
					//左边小图+右边标题
					$ic=1;
					$str = '<div class="xld xlda">';
					foreach($_MATH as $datarow){
						if($ic>$_SEND['sum'])break;
						if($_SEND['istv'] || in_array($rows['funid'], array(5,7))){
							if($datarow['abtotal'] && $datarow['vsum'] >= $datarow['abtotal']){
								$absum = $datarow['abtotal'].lang('plugin/hsk_vcenter', 'thetv1').lang('plugin/hsk_vcenter', 'thetv2');
							}else{
								$absum = lang('plugin/hsk_vcenter', 'thetv0').$datarow['vsum'].lang('plugin/hsk_vcenter', 'thetv1');
							}
						}else{
							$absum = $datarow['views'].lang('plugin/hsk_vcenter', 'play');
						}
						$str1 .= '<dl class="pbn bbda cl" title="'.$datarow['vsubject'].'"><dd class="m avt"><a href="'.sendurl('show', 0, $datarow['id']).'"><img border="0" src="'.$datarow['purl'].'"></a></dd><dd class="ptm xs2"><a href="'.sendurl('show', 0, $datarow['id']).'" class="xi1">'.$datarow['vsubjectc'].'</a></dd><dd><span>'.$absum.'</span></dd></dl>';
						$ic++;
					}
					$str = $str.$str1.'</div>';
					echo $str;
				}elseif($_SEND['style'] == 3){
					//左边小图+右边标题
					$ic=1;
					$str = '<ul class="hskml hskmls cl">';
					foreach($_MATH as $datarow){
						if($ic>$_SEND['sum'])break;
						if($_SEND['istv'] || in_array($rows['funid'], array(5,7))){
							if($datarow['abtotal'] && $datarow['vsum'] >= $datarow['abtotal']){
								$absum = $datarow['abtotal'].lang('plugin/hsk_vcenter', 'thetv1').lang('plugin/hsk_vcenter', 'thetv2');
							}else{
								$absum = lang('plugin/hsk_vcenter', 'thetv0').$datarow['vsum'].lang('plugin/hsk_vcenter', 'thetv1');
							}
						}else{
							$absum = $datarow['views'].lang('plugin/hsk_vcenter', 'play');
						}
						$str1 .= '<li><a href="'.sendurl('show', 0, $datarow['id']).'"><img border="0" src="'.$datarow['purl'].'" title="'.$datarow['vsubject'].'"></a><p><a href="'.sendurl('show', 0, $datarow['id']).'" class="xi2" title="'.$datarow['vsubject'].'">'.cutstr($datarow['vsubjectc'], 8, '..').'</a></p></li>';
						$ic++;
					}
					$str = $str.$str1.'</ul>';
					echo $str;
				}
			}
		}
		return false;
	}elseif($rows['funid'] == 8){
		//广告
		if($rows['type']==1){
			$adwidth = 690;
		}else{
			$adwidth = 250;
		}
		$myad = $_ADLIST[$rows['value']];
		if($myad){
			//有广告可以提取
			$myad['message'] = stripslashes($myad['message']);
			echo '<div style="width:'.$adwidth.'px; height:'.$myad['height'].'px;">'.$myad['message'].'</div>';
			return false;
		}
	}
}


function sendtag($tags, $num){

	if($tags == '') {
		return;
	}

	$num = $num-1;

	$tags = str_replace(array(chr(0xa3).chr(0xac), chr(0xa1).chr(0x41), chr(0xef).chr(0xbc).chr(0x8c), ' '), ',', censor($tags));
	if(strexists($tags, ',')) {
		$tagarray = array_unique(explode(',', $tags));
	} else {
		$tagarray = array_unique(explode(' ', $tags));
	}
	$tagcount = 0;
	foreach($tagarray as $tagname) {
		$tagname = trim($tagname);
		if(preg_match('/^([\x7f-\xff_-]|\w|\s){3,20}$/', $tagname)) {
			$tagcount++;
			$tagstr[] = $tagname;
			if($tagcount > $num) {
				unset($tagarray);
				break;
			}
		}
	}
	return $tagstr;
}

function hsk_compare($array1, $array2){
	sort($array1);
	sort($array2);
	if($array1 == $array2){
		return true;
	}else{
		return false;
	}
}


function hsk_dis_select($reportlist, $types = '') {

	if(!is_array($reportlist)) return false;

	if($types == 'search'){
		//热点搜索
		foreach($reportlist as $reason) {
			$tmparr	= explode("||", $reason);
			$bris = $select ? '<span class="pipe">|</span>' : null;
			if($tmparr[0] && $tmparr[1]){
				$select .= $bris.'<span class="xi2" style="cursor:pointer;" onclick="window.open(\''.sendurl('show', 0, $tmparr[1]).'\')">'.$tmparr[0].'</span>';
			}elseif($tmparr[0]){
				$tmparr[0] = trim(dhtmlspecialchars($tmparr[0]));
				$select .= $bris.'<span class="xi2" style="cursor:pointer;" onclick="setfrm(0,\''.$tmparr[0].'\');">'.$tmparr[0].'</span>';
			}
		}
	}else{
		foreach($reportlist as $reason) {
			$select .= $reason ? '<li>'.$reason.'</li>' : '<li>--------</li>';
		}
	}

	if($select) {
		return $select;
	} else {
		return false;
	}

}


?>