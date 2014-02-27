<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class block_tvlist {

	function block_tvlist() {}

	function name() {
		return lang('block/hskvcenter', 'hsk_name');
	}

	function blockclass() {
		return array('tvlist', lang('block/hskvcenter', 'hsk_tv_list'));
	}

	function fields() {
		return array();
	}


	var $setting = array();	
	function getsetting() {
		global $_G;

		$settings = array(
			'sids' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_sort'),
				'type' => 'select',
				'value' => $this->getsort()
			),
			'orders' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_order'),
				'type' => 'select',
				'value' => array(
					array('id', lang('block/hskvcenter', 'hsk_vod_dateline')),
					array('views', lang('block/hskvcenter', 'hsk_vod_views')),
					array('chk_up', lang('block/hskvcenter', 'hsk_vod_ding')),
					array('valuate', lang('block/hskvcenter', 'hsk_vod_valuate')),
					array('polls', lang('block/hskvcenter', 'hsk_vod_polls')),
					array('updateline', lang('block/hskvcenter', 'hsk_vod_update')),
				)
			),
			'addressid' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_address'),
				'type' => 'select',
				'value' => $this->getaddress()
			),
			'yearsid' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_years'),
				'type' => 'select',
				'value' => $this->getyears()
			),
			'languageid' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_language'),
				'type' => 'select',
				'value' => $this->getlanguage()
			),
			'albums' => array(
				'title' => lang('block/hskvcenter', 'hsk_album_style'),
				'type' => 'select',
				'value' => array(
					array('0', lang('block/hskvcenter', 'hsk_vod_all')),
					array('1', lang('block/hskvcenter', 'hsk_tv_total')),
					array('2', lang('block/hskvcenter', 'hsk_tv_update')),
				)
			),
			'prices' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_price'),
				'type' => 'select',
				'value' => array(
					array('0', lang('block/hskvcenter', 'hsk_vod_all')),
					array('1', lang('block/hskvcenter', 'hsk_vod_price_yes')),
					array('2', lang('block/hskvcenter', 'hsk_vod_price_no')),
				)
			),
			'limits' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_limits'),
				'type' => 'text',
				'default' => '10'
			),
			'styleids' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_style'),
				'type' => 'select',
				'value' => $this->getstylelist()
			),
			'pwidth' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_pwidth'),
				'type' => 'text',
				'default' => '116'
			),
			'pheight' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_pheight'),
				'type' => 'text',
				'default' => '160'
			),
			'subject_lan' => array(
				'title' => lang('block/hskvcenter', 'hsk_subject_lan'),
				'type' => 'text',
				'default' => '16'
			),
			'vinfo_lan' => array(
				'title' => lang('block/hskvcenter', 'hsk_vinfo_lan'),
				'type' => 'text',
				'default' => '80'
			),
		);

		return $settings;
	}

	function getstylelist(){
		$file = DISCUZ_ROOT.'./source/plugin/hsk_vcenter/block/hsk_style.inc.php';
		if(file_exists($file)){
			@require $file;
		}
		$newarray = array();
		//生成数组
		foreach($xml_list['tvlist'] as $key=>$val){
			$newarray[] = array($key, $val);
		}
		//检查自定义模板
		$block_folder= DISCUZ_ROOT.'source/plugin/hsk_vcenter/block/';
		$fp=opendir($block_folder);
		$rules_list = $rules_in = array();
		while(false != $file = readdir($fp))
		{
			if($file!='.' && $file!='..' && substr($file,-8)=='.inc.php' && substr($file,0,9)!='hsk_style'){
				$file = substr($file, 0, -8);
				$newarray[] = array($file, $file);
			}
		}
		return $newarray;
	}

	function getsort(){
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/_sort.inc.php';
			$newarray[] = array('0', lang('block/hskvcenter', 'hsk_vod_all'));
			foreach($_SORT as $datarow){
				if($datarow['sup'] == 0){
					$newarray_arr = array($datarow['sid'], $datarow['sort']);
					$newarray[] = $newarray_arr;
				}
			}
			return $newarray;
		}else{
			return array();
		}
	}

	function getaddress(){
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
			$newarray[] = array('0', lang('block/hskvcenter', 'hsk_vod_all'));
			foreach($address_new as $key=>$val){
				$newarray[] = array($key, $val);
			}
			return $newarray;
		}else{
			return array();
		}
	}

	function getyears(){
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
			$newarray[] = array('0', lang('block/hskvcenter', 'hsk_vod_all'));
			foreach($years_new as $key=>$val){
				$newarray[] = array($key, $val);
			}
			return $newarray;
		}else{
			return array();
		}
	}

	function getlanguage(){
		if(file_exists(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
			@require DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
			$newarray[] = array('0', lang('block/hskvcenter', 'hsk_vod_all'));
			foreach($language_new as $key=>$val){
				$newarray[] = array($key, $val);
			}
			return $newarray;
		}else{
			return array();
		}
	}

	function cookparameter($parameter) {
		return $parameter;
	}

	function getdata($style, $parameter) {
		global $_G;

		$returndata = array('html' => '', 'data' => '');
		$parameter = $this->cookparameter($parameter);

		$sids		= intval($parameter['sids']) ? intval($parameter['sids']) : 0;
		$orders		= !empty($parameter['orders']) ? $parameter['orders'] : 0;
		$prices		= intval($parameter['prices']) ? intval($parameter['prices']) : 0;
		$limits		= intval($parameter['limits']) ? intval($parameter['limits']) : 10;
		$addressid	= intval($parameter['addressid']) ? intval($parameter['addressid']) : 0;
		$yearsid	= intval($parameter['yearsid']) ? intval($parameter['yearsid']) : 0;
		$languageid	= intval($parameter['languageid']) ? intval($parameter['languageid']) : 0;

		//附加
		$pwidth		= intval($parameter['pwidth']) ? intval($parameter['pwidth']) : 90;
		$pheight	= intval($parameter['pheight']) ? intval($parameter['pheight']) : 72;
		$subject_lan= intval($parameter['subject_lan']) ? intval($parameter['subject_lan']) : 12;
		$styleids	= !empty($parameter['styleids']) ? $parameter['styleids'] : 1;
		$vinfo_lan	= intval($parameter['vinfo_lan']) ? intval($parameter['vinfo_lan']) : 80;
		$albums		= intval($parameter['albums']) ? intval($parameter['albums']) : 0;

		//处理SQL段
		if($prices==1){
			$price_sql = " AND price=0";
		}elseif($prices==2){
			$price_sql = " AND price>0";
		}else{
			$price_sql = null;
		}

		if($albums==1){
			$album_sql = " AND abtotal>0 and vsum>=abtotal";
		}elseif($albums==2){
			$album_sql = " AND (vsum<abtotal or abtotal=0) and vsum>0";
		}else{
			$album_sql = null;
		}

		$orders = in_array($orders, array('id', 'views', 'chk_up', 'polls', 'valuate', 'updateline')) ? $orders : 'id';

		$areadatalist = $sortdata = $sortdatatids = array();

		$sql = 	($sids ? " AND fid='$sids'" : null)
			.$price_sql
			.$album_sql
			.($addressid ? " AND address='$addressid'" : null)
			.($yearsid ? " AND years='$yearsid'" : null)
			.($languageid ? " AND language='$languageid'" : null);

		$query = DB::query("SELECT id, vsubject, purl, vsum, abtotal, uid, views, polls, valuate, remote, vinfo FROM ".DB::table('vgallerys')." where audit=1 and album=3 and subid=0 $sql ORDER BY $orders DESC limit $limits");
		while($data = DB::fetch($query)) {
			$data['vinfo'] = str_replace(chr(13).chr(10), "", $data['vinfo']);
			$data['vinfo'] = dhtmlspecialchars($data['vinfo']);

			//处理集数
			if($data['abtotal'] == 0 || ($data['vsum'] > 0 && $data['abtotal'] > $data['vsum'])){
				//更新中的
				$data['vsum'] = lang('block/hskvcenter', 'hsk_tv_update1').$data['vsum'];
			}else{
				$data['vsum'] = $data['abtotal'].lang('block/hskvcenter', 'hsk_tv_update2');
			}

			$list[] = array(
				'id' => $data['id'],
				'uid' => $data['uid'],
				'subject' => $data['vsubject'],
				'subjectc' => cutstr($data['vsubject'], $parameter['subject_lan'], '..'),
				'picture' => $this->getpicture($data['purl'], $data['remote']),
				'link' => $this->sendurl($data['id']),
				'username' => $data['username'],
				'vsum' => $data['vsum'],
				'abtotal' => $this->sendurl($data['id'], 1),
				'views' => $data['views'],
				'polls' => $data['polls'],
				'valuate' => $data['valuate'],
				'infodesc' => cutstr($data['vinfo'], $parameter['vinfo_lan'], '..'),
			);
		}
		$html = $this->send_html($styleids, $list, $pwidth, $pheight);
		return array('html' => $html, 'data' => null);
	}

	function send_html($styleid, $data, $width, $height) {
		if(intval($styleid)){
			$file = DISCUZ_ROOT.'./source/plugin/hsk_vcenter/block/hsk_style_'.$styleid.'.inc.php';
		}else{
			$file = DISCUZ_ROOT.'./source/plugin/hsk_vcenter/block/'.$styleid.'.inc.php';
		}
		if(!$styleid)return false;
		if(file_exists($file)){
			@require $file;
		}else{
			showmessage($styleid.lang('block/hskvcenter', 'hsk_nofindtmp'));
			return false;
		}

		$html_header = $_XMLS['header'];
		$html_footer = $_XMLS['footer'];
		$html_looper = $_XMLS['loop'];
		$xwidth = $width+8;
		$ywidth = $width-6;
		$rands = rand(100,999);

		$search_key = array('/{VID}/', '/{SUBJECT}/', '/{SUBJECTC}/', '/{PICTURE}/', '/{VSUM}/', '/{ABTOTAL}/', '/{VIEWS}/', '/{POLLS}/', '/{VALUATE}/', '/{PWIDTH}/', '/{PHEIGHT}/', '/{LINK}/', '/{SUMMARY}/', '/{USERNAME}/', '/{UID}/', '/{XWIDTH}/', '/{YWIDTH}/', '/{CSSID}/');
		$i=0;		global $_G, $cssid;

		foreach($data as $v) {
			$replac_key = array($v['id'], $v['subject'], $v['subjectc'], $v['picture'], $v['vsum'], $v['abtotal'], $v['views'], $v['polls'], $v['valuate'], $width, $height, $v['link'], $v['infodesc'], $v['username'], $v['uid'], $xwidth, $ywidth, $rands);
			$html_tmp = trim(preg_replace($search_key, $replac_key, $html_looper));
			$html .= $html_tmp;
			$i++;
		}
		$html_header = trim(preg_replace($search_key, $replac_key, $html_header));
		$html = $html_header.$html.$html_footer;
		//print_r($html);dexit();
		return $html;
	}

	function getpicture($img, $remote=0){
		global $_G;
		if($remote){
			$img = $_G['setting']['ftp']['attachurl'].$img;
		}else{
			if(substr($img,0,7) != 'http://'){
				$thepicurl = DISCUZ_ROOT.$img;
				if(!file_exists("$thepicurl") || !$img){
					$img = './source/plugin/hsk_vcenter/images/noimages.gif';
				}
			}
		}
		return $img;
	}

	function sendurl($vid, $check=0){
		global $_G;
		$hp = $_G['cache']['plugin']['hsk_vcenter']['openhtml'];
		if($hp){
			if(!$check){
				return "dlist-".$vid."-0-0-1.html";
			}else{
				return "acshow-end-".$vid.".html";
			}
		}else{
			if(!$check){
				return "plugin.php?id=hsk_vcenter:hsk_vcenter&mod=ablist&vid=".$vid;
			}else{
				return "plugin.php?id=hsk_vcenter:hsk_vcenter&mod=acshow&action=end&vid=".$vid;
			}
		}
	}


}


?>