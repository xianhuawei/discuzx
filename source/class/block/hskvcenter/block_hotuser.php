<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class block_hotuser {

	function block_hotuser() {}

	function name() {
		return lang('block/hskvcenter', 'hsk_name');
	}

	function blockclass() {
		return array('hotuser', lang('block/hskvcenter', 'hsk_hotuser'));
	}

	function fields() {
		return array();
	}


	var $setting = array();	
	function getsetting() {
		global $_G;

		$settings = array(
			'orders' => array(
				'title' => lang('block/hskvcenter', 'hsk_vod_order'),
				'type' => 'select',
				'value' => array(
					array('dateline', lang('block/hskvcenter', 'hsk_user_new')),
					array('shares', lang('block/hskvcenter', 'hsk_user_share')),
					array('ablists', lang('block/hskvcenter', 'hsk_user_list')),
					array('hots', lang('block/hskvcenter', 'hsk_user_hots')),
				)
			),
			'pwidth' => array(
				'title' => lang('block/hskvcenter', 'hsk_user_width'),
				'type' => 'text',
				'default' => '50'
			),
			'pheight' => array(
				'title' => lang('block/hskvcenter', 'hsk_user_height'),
				'type' => 'text',
				'default' => '50'
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
		foreach($xml_list['hotuser'] as $key=>$val){
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

	function cookparameter($parameter) {
		return $parameter;
	}

	function getdata($style, $parameter) {
		global $_G;

		$returndata = array('html' => '', 'data' => '');
		$parameter = $this->cookparameter($parameter);

		$orders		= !empty($parameter['orders']) ? $parameter['orders'] : 0;
		$limits		= intval($parameter['limits']) ? intval($parameter['limits']) : 10;
		$pwidth		= intval($parameter['pwidth']) ? intval($parameter['pwidth']) : 50;
		$pheight	= intval($parameter['pheight']) ? intval($parameter['pheight']) : 50;

		//附加
		$styleids	= !empty($parameter['styleids']) ? $parameter['styleids'] : 1;

		$orders = in_array($orders, array('dateline', 'shares', 'ablists', 'hots')) ? $orders : 'shares';

		$query = DB::query("SELECT m.shares, m.ablists, m.hots, mm.username, mm.uid FROM ".DB::table('vgallery_member')." m LEFT JOIN ".DB::table('common_member')." mm ON mm.uid=m.mid where m.shares>0 ORDER BY m.$orders DESC limit $limits");
		while($data = DB::fetch($query)) {
			$list[] = array(
				'uid' => $data['uid'],
				'picture' => avatar($data['uid'], 'middle', true, false, false, $_G['setting']['ucenterurl']),
				'link' => $this->sendurl($data['uid']),
				'username' => $data['username'],
				'shares' => $data['shares'],
				'ablists' => $data['ablists'],
				'hots' => $data['hots'],
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

		$search_key = array('/{UID}/', '/{PICTURE}/', '/{LINK}/', '/{USERNAME}/', '/{SHARES}/', '/{ABLISTS}/', '/{HOTS}/', '/{PWIDTH}/', '/{PHEIGHT}/');
		$i=0;
		foreach($data as $v) {
			$replac_key = array($v['uid'], $v['picture'], $v['link'], $v['username'], $v['shares'], $v['ablists'], $v['hots'], $width, $height);
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
			return "author-".$vid."-0-0-1.html";
		}else{
			return "plugin.php?id=hsk_vcenter:hsk_vcenter&mod=author&mid=".$vid;
		}
	}

}
?>