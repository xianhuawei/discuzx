<script type="text/JavaScript">
var rowtypedata = [
	[
		[1,'', 'td25'],
		[1,'<select name="adnewonstate[]" size="1"><option value="playing">playing</option><option value="paused" selected>paused</option><option value="stopped">stopped</option>'],
		[1,'<input type="text" class="txt" name="adnewsrc[]" size="18" style="width:200px;">'],
		[1,'<input type="text" class="txt" name="adnewlink[]" size="18" style="width:200px;">'],
		[1,'<input type="text" class="txt" name="adnewtime[]" size="18">', 'td25'],
		[1,'<input type="text" class="txt" name="adnewwidth[]" size="18">', 'td25'],
		[1,'<input type="text" class="txt" name="adnewheight[]" size="18">', 'td25']
	]
]
</script>



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

	showformheader('hsk&operation=player&do=3');
	showtableheader();
	showsubtitle(array('', 'cmp_ad_onstate', 'cmp_ad_src', 'cmp_ad_link', 'cmp_ad_time', 'cmp_ad_width', 'cmp_ad_height'));
	showtagheader('tbody', '', true);

	$adarray = $_CMP4['adlist'];
	foreach($adarray as $value){
		
		//生成皮肤选择
		$groupselect = null;
		$skins_list = array('playing', 'paused', 'stopped');
		foreach($skins_list as $skinvar){
			$selectedis = $skinvar == $value['onstate'] ? ' selected' : null;
			$groupselect .= '<option value="'.$skinvar.'"'.$selectedis.'>'.$skinvar.'</option>';
		}
		$usergroupselect = '<select name="newonstate[]" size="1">'.$groupselect.'</select>';

		showtablerow('', array('', '', '','','class="td25"','class="td25"','class="td25"'), array('', $usergroupselect,
			'<input type="text" class="txt" name="newsrc[]" value="'.$value['src'].'" size="18" style="width:200px;">',
			'<input type="text" class="txt" name="newlink[]" value="'.$value['link'].'" size="18" style="width:200px;">',
			'<input type="text" class="txt" name="newtime[]" value="'.$value['time'].'" size="18">',
			'<input type="text" class="txt" name="newwidth[]" value="'.$value['width'].'" size="18">',
			'<input type="text" class="txt" name="newheight[]" value="'.$value['height'].'" size="18">',
			));
	}

	showtagfooter('tbody');
	echo '<tr><td></td><td colSpan="6"><div><a href="###" onclick="addrow(this, 0);" class="addtr">'.cplang('hsk_types_add').'</a></div></td></tr>';
	showsubmit('submit', 'submit', 'del', '', $multipage, false);
	showtablefooter();
	showformfooter();

} else {

	//提交
	$newarray = array();
	//生成新数组
	
	if(is_array($_GET['newsrc'])) {
		foreach($_GET['newsrc'] as $id => $name) {
			$src		= trim(dhtmlspecialchars($name));
			$onstate	= trim(dhtmlspecialchars($_GET['newonstate'][$id]));
			$time		= intval($_GET['newtime'][$id]);
			$link		= trim(dhtmlspecialchars($_GET['newlink'][$id]));
			$width		= intval($_GET['newwidth'][$id]);
			$height		= intval($_GET['newheight'][$id]);

			if($src && in_array($onstate, array('playing', 'paused', 'stopped'))){
				$newarray[] = array('onstate'=>$onstate, 'src'=>$src, 'link'=>$link, 'time'=>$time, 'width'=>$width, 'height'=>$height);
			}
		}
	}
	
	//print_r($newarray);dexit();

	if(is_array($_GET['adnewsrc'])) {
		foreach($_GET['adnewsrc'] as $id => $v) {
			$src		= trim(dhtmlspecialchars($v));
			$onstate	= trim(dhtmlspecialchars($_GET['adnewonstate'][$id]));
			$time		= intval($_GET['adnewtime'][$id]);
			$link		= trim(dhtmlspecialchars($_GET['adnewlink'][$id]));
			$width		= intval($_GET['adnewwidth'][$id]);
			$height		= intval($_GET['adnewheight'][$id]);

			if($src && in_array($onstate, array('playing', 'paused', 'stopped'))){
				$newarray[] = array('onstate'=>$onstate, 'src'=>$src, 'link'=>$link, 'time'=>$time, 'width'=>$width, 'height'=>$height);
			}
		}
	}

	$_CMP4['adlist'] = $newarray;
	hsk_tocache('cmp4.inc', hsk_getcachevars(array('_CMP4' => $_CMP4)));

	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=player&do=3', 'succeed');

}
