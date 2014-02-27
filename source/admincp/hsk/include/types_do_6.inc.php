<script type="text/JavaScript">
var rowtypedata = [
	[
		[1,'', 'td25'],
		[1,'<input type="text" class="txt" name="newindex[]" size="3">', 'td25'],
		[1,'<input type="text" class="txt" name="newname[]" size="18">']
	]
]
</script>

<?php

if(!submitcheck('actorsubmit')) {
	
	//加载地区信息
	if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php')){
		require_once DISCUZ_ROOT.'./data/hskcenter/hsk_language.inc.php';
	}else{
		//重写文件
		$language_new = array(	1=>cplang('hsk_language_1'), 
								2=>cplang('hsk_language_2'), 
								3=>cplang('hsk_language_3'), 
								4=>cplang('hsk_language_4'), 
								5=>cplang('hsk_language_5'), 
								6=>cplang('hsk_language_6'));
		hsk_tocache('language.inc', hsk_getcachevars(array('language_new' => $language_new)));
		cpmsg('hsk_hskconfig_bycache', 'action=hsk&operation=types&do='.$do, 'succeed');

	}

	showformheader('hsk&operation=types&do='.$do);
	showtableheader('');
	
	showsubtitle(array('', 'hsk_types_4', ''));

	foreach($language_new as $key => $val){
		showtablerow('', array('', 'class="td25"', ''), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[$key]\" value=\"$key\">",
			"<input type=\"text\" class=\"txt\" name=\"indexnew[$key]\" value=\"$key\" size=\"3\">",
			"<input type=\"text\" class=\"txt\" name=\"namenew[$key]\" value=\"$val\" size=\"18\">"
		));
	}


	echo '<tr><td></td><td colSpan="3"><div><a href="###" onclick="addrow(this, 0);" class="addtr">'.cplang('hsk_types_add').'</a></div></td></tr>';
	showsubmit('actorsubmit', 'submit', 'del');

	showtablefooter();	
	showformfooter();

}else{

	//生成新数组

	if(is_array($_GET['namenew'])) {
		foreach($_GET['namenew'] as $id => $name) {
			$name		= trim(dhtmlspecialchars($name));
			$disabled	= $_GET['delete'][$id];
			$indexkey	= intval($_GET['indexnew'][$id]);
			if(!$disabled && $name){
				$indexkey = $indexkey ? $indexkey : $id;
				$new_array[$indexkey] = $name;
				$maxid = max($maxid, $indexkey);
			}
		}
	}

	if(is_array($_GET['newname'])) {
		$maxid = $maxid + 1;
		foreach($_GET['newname'] as $k => $v) {
			$v = dhtmlspecialchars(trim($v));
			if(!empty($v)) {
				$indexkey	= intval($_GET['newindex'][$k]);
				$indexkey = $indexkey ? $indexkey : $maxid;
				$new_array[$indexkey] = $v;
				$maxid++;
			}
		}
	}

	hsk_tocache('language.inc', hsk_getcachevars(array('language_new' => $new_array)));
	cpmsg('hsk_types_add_succeed', 'action=hsk&operation=types&do='.$do, 'succeed');

}
?>