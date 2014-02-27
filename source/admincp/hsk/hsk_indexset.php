<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//自动升级子菜单
$hsk_id		= 'indexset';
$do			= intval($_GET['do']) ? intval($_GET['do']) : 1;
$menu_list = getpopmenu($hsk_id, $do);

shownav('hsk', 'hsk_header_nav');
showsubmenu('hsk_types', $menu_list);


if($do == '1') {	//类别管理
	$cp = $_GET['cp'];
	$id = $_GET['id'];

	
	if(!submitcheck('submit')) {

		//加载地区信息
		if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_index_set.inc.php')){
			require_once DISCUZ_ROOT.'./data/hskcenter/hsk_index_set.inc.php';
			$index_close['top']['subject']	= trim(dhtmlspecialchars(stripslashes($index_close['top']['subject'])));
			$index_close['top']['moremsg']	= trim(dhtmlspecialchars(stripslashes($index_close['top']['moremsg'])));
		}else{
			//重写文件
			$index_close = array(	'hot'=>array('close'=>0, 'subject'=>'No subject', 'moremsg'=>'No msg'),
									'top'=>array('close'=>0, 'subject'=>'New subject', 'moremsg'=>'New message'));
			hsk_tocache('index_set.inc', hsk_getcachevars(array('index_close' => $index_close)));
			cpmsg('hsk_hskconfig_bycache', 'action=hsk&operation=indexset&do='.$do, 'succeed');

		}

		showformheader('hsk&operation=indexset&do=1');
		showtableheader();
		showsubtitle(array('', 'ID', 'indexset_name', 'indexset_subject', 'indexset_moremsg', 'indexset_isclose'));
		showtagheader('tbody', '', true);

		$navsubtype = array();
		showtablerow('', array('class="td25"', 'class="td25"', '', '', '', ''), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"\" value=\"\" disabled>",
			"<input type=\"text\" class=\"txt\" size=\"2\" name=\"\" value=\"1\" disabled>",
			cplang("hot_index"),
			"<input type=\"text\" class=\"txt\" name=\"hot_subject\" value=\"".$index_close['hot']['subject']."\" style=\"width:200px;\" disabled>",
			"<input type=\"text\" class=\"txt\" name=\"hot_moremsg\" value=\"".$index_close['hot']['moremsg']."\" style=\"width:200px;\" disabled>",
			"<input class=\"checkbox\" type=\"checkbox\" name=\"hot_index_close\" value=\"1\" ".($index_close['hot']['close'] ? 'checked' : '').">",
		));
		showtablerow('', array('class="td25"', 'class="td25"', '', ''), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"\" value=\"\" disabled>",
			"<input type=\"text\" class=\"txt\" size=\"2\" name=\"\" value=\"2\" disabled>",
			cplang("top_index"),
			"<input type=\"text\" class=\"txt\" name=\"top_subject\" value=\"".$index_close['top']['subject']."\" style=\"width:200px;\">",
			'<textarea rows="8" name="top_moremsg" cols="50">'.$index_close['top']['moremsg'].'</textarea>',
			"<input class=\"checkbox\" type=\"checkbox\" name=\"top_index_close\" value=\"1\" ".($index_close['top']['close'] ? 'checked' : '').">",
		));
		showtagfooter('tbody');
		showsubmit('submit', 'submit');
		showtablefooter();
		showformfooter();

	} else {

		$hot_index_close			= intval($_GET['hot_index_close']);
		$top_index_close			= intval($_GET['top_index_close']);
		$top_subject				= trim($_GET['top_subject']);
		$top_moremsg				= trim($_GET['top_moremsg']);
		//dexit($top_moremsg);

		//重写文件
		$index_close = array(	'hot'=>array('close'=>$hot_index_close, 'subject'=>$hot_subject, 'moremsg'=>$hot_moremsg), 
								'top'=>array('close'=>$top_index_close, 'subject'=>$top_subject, 'moremsg'=>$top_moremsg));
		hsk_tocache('index_set.inc', hsk_getcachevars(array('index_close' => $index_close)));
		cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=indexset', 'succeed');

	}


}else{//其它管理
	$includefile = DISCUZ_ROOT."./source/admincp/hsk/include/".$hsk_id."_do_".$do.".inc.php";
	if(is_file($includefile)){//执行
		$cp = $_GET['cp'];
		$id = $_GET['id'];
		include $includefile;
	}else{
		cpmsg('hsk_hskcenter_error', '', 'error');
	}
}
?>