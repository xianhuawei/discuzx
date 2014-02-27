<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';
if(!file_exists($cmp_config)){
	cpmsg('cmpsetconfigerror', '', 'error');
}else{
	require_once "$cmp_config";
	if(!$_CMP4['cmp_config']['senddomain']){
		cpmsg('cmpsetconfigerror', '', 'error');
	}
}

if(!submitcheck('submit')) {

	showformheader('hsk&operation=player&do=2', 'enctype');
	showtableheader();
	showsubtitle(array('', 'cmpskin_domain', 'cmpskin_fordomain'));
	showtagheader('tbody', '', true);


	$senddomain = explode(",", $_CMP4['cmp_config']['senddomain']);
	if(count($senddomain)<1){
		cpmsg('cmpsetconfigerror', '', 'error');
	}	

	//生成皮肤列表
	$skins_folder= DISCUZ_ROOT.'v/skins/';
	$fp=opendir($skins_folder);
	$skins_list = array();
	while(false != $file = readdir($fp))
	{
		if($file!='.' && $file!='..' && in_array(substr($file,-4), array('.zip', '.swf', '.jpg'))){
			$skins_list[] = $file;
		}
	}
	
	foreach($senddomain as $domain){
		
		//生成皮肤选择
		$groupselect = null;
		foreach($skins_list as $skinvar){
			$selectedis = $skinvar == $_CMP4['skins'][$domain] ? ' selected' : null;
			$groupselect .= '<option value="'.$skinvar.'"'.$selectedis.'>'.$skinvar.'</option>';
		}
		$usergroupselect = '<select name="sendskin['.$domain.']" size="1">'.$groupselect.'</select>';


		showtablerow('', array('', '', '',''), array("", $domain, $usergroupselect));
	}
	showtablerow('', array('', '', '',''), array("", cplang('updatenewskin'), '<input class="txt uploadbtn" type="file" name="updateskin" style="width:300px;">'));

	showtagfooter('tbody');
	showsubmit('submit', 'submit');
	showtablefooter();
	showformfooter();

} else {

	//提交
	$sendskin = dhtmlspecialchars($_GET['sendskin']);
	foreach($sendskin as $key=>$domain){
		$_CMP4['skins'][$key] = $domain;
	}

	//完成上传动作
	if($_FILES['updateskin']['size']) {

		$filetype		= strtolower(substr($_FILES['updateskin']['name'], strrpos($_FILES['updateskin']['name'], ".")+1));
		if(!in_array($filetype, array('zip', 'swf', '.jpg'))){
			cpmsg('cmpuploaderror', '', 'error');
		}
		
		$newdir = 'v/skins/';
		if(!is_dir(DISCUZ_ROOT.$newdir)){
			@mkdir(DISCUZ_ROOT.$newdir);
		}
		$uploadfile = DISCUZ_ROOT.$newdir.$_FILES['updateskin']['name'];
		//dexit($uploadfile);
		if(@copy($_FILES['updateskin']['tmp_name'], $uploadfile) || (function_exists('move_uploaded_file') && @move_uploaded_file($_FILES['updateskin']['tmp_name'], $uploadfile))) {
			@unlink($_FILES['updateskin']['tmp_name']);
		}
	}

	hsk_tocache('cmp4.inc', hsk_getcachevars(array('_CMP4' => $_CMP4)));

	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=player&do=2', 'succeed');

}
