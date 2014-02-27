<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class block_vodlist {

	function block_vodlist() {}

	function name() {
		return lang('block/hskvcenter', 'hsk_name');
	}

	function blockclass() {
		return array('vodlist', lang('block/hskvcenter', 'hsk_vod_list'));
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
				'default' => '90'
			),
			'pheight' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_pheight'),
				'type' => 'text',
				'default' => '72'
			),
			'subject_lan' => array(
				'title' => lang('block/hskvcenter', 'hsk_subject_lan'),
				'type' => 'text',
				'default' => '12'
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
		foreach($xml_list['vodlist'] as $key=>$val){
			$newarray[] = array($key, $val);
		}
		//print_r($newarray);dexit();
		
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
			$newarray = array();
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
		$addressid	= intval($parameter['addressid']) ? intval($parameter['addressid']) : 0;
		$yearsid	= intval($parameter['yearsid']) ? intval($parameter['yearsid']) : 0;
		$languageid	= intval($parameter['languageid']) ? intval($parameter['languageid']) : 0;
		$limits		= intval($parameter['limits']) ? intval($parameter['limits']) : 10;

		//附加
		$pwidth		= intval($parameter['pwidth']) ? intval($parameter['pwidth']) : 90;
		$pheight	= intval($parameter['pheight']) ? intval($parameter['pheight']) : 72;
		$subject_lan= intval($parameter['subject_lan']) ? intval($parameter['subject_lan']) : 12;
		$styleids	= !empty($parameter['styleids']) ? $parameter['styleids'] : 1;
		$vinfo_lan	= intval($parameter['vinfo_lan']) ? intval($parameter['vinfo_lan']) : 80;

		//处理SQL段
		if($prices==1){
			$price_sql = " AND price=0";
		}elseif($prices==2){
			$price_sql = " AND price>0";
		}else{
			$price_sql = null;
		}

		$orders = in_array($orders, array('id', 'views', 'chk_up', 'polls', 'valuate')) ? $orders : 'id';

		$areadatalist = $sortdata = $sortdatatids = array();

		$sql = 	($sids ? " AND v.fid='$sids'" : null)
			.$price_sql
			.($addressid ? " AND v.address='$addressid'" : null)
			.($yearsid ? " AND v.years='$yearsid'" : null)
			.($languageid ? " AND v.language='$languageid'" : null);

		$query = DB::query("SELECT v.id, v.vsubject, v.purl, v.vsum, v.abtotal, v.uid, v.views, v.polls, v.valuate, v.remote, v.vinfo, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid where v.audit=1 and v.album=0 and v.abtotal>=0 and v.subid=0 $sql ORDER BY v.$orders DESC limit $limits");
		while($data = DB::fetch($query)) {
			$data['vinfo'] = str_replace(chr(13).chr(10), "", $data['vinfo']);
			$data['vinfo'] = dhtmlspecialchars($data['vinfo']);

			$list[] = array(
				'id' => $data['id'],
				'uid' => 'home.php?mod=space&uid='.$data['uid'],
				'subject' => $data['vsubject'],
				'subjectc' => cutstr($data['vsubject'], $parameter['subject_lan'], '..'),
				'picture' => $this->getpicture($data['purl'], $data['remote']),
				'link' => $this->sendurl($data['id']),
				'username' => $data['username'],
				'vsum' => $data['vsum'],
				'abtotal' => $data['abtotal'],
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

		$search_key = array('/{VID}/', '/{SUBJECT}/', '/{SUBJECTC}/', '/{PICTURE}/', '/{VSUM}/', '/{ABTOTAL}/', '/{VIEWS}/', '/{POLLS}/', '/{VALUATE}/', '/{PWIDTH}/', '/{PHEIGHT}/', '/{LINK}/', '/{SUMMARY}/', '/{USERNAME}/', '/{UID}/');
		$i=0;
		foreach($data as $v) {
			$replac_key = array($v['id'], $v['subject'], $v['subjectc'], $v['picture'], $v['vsum'], $v['abtotal'], $v['views'], $v['polls'], $v['valuate'], $width, $height, $v['link'], $v['infodesc'], $v['username'], $v['uid']);
			$html_tmp = trim(preg_replace($search_key, $replac_key, $html_looper));
			$html .= $html_tmp;
			$i++;
		}
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

	function sendurl($vid){
		global $_G;
		$hp = $_G['cache']['plugin']['hsk_vcenter']['openhtml'];
		if($hp){
			return "show-".$vid.".html";
		}else{
			return "plugin.php?id=hsk_vcenter:hsk_vcenter&mod=view&vid=".$vid;
		}
	}
}
?>