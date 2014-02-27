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
	if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php')){
		require_once DISCUZ_ROOT.'./data/hskcenter/hsk_address.inc.php';
	}else{
		//重写文件
		$address_new = array(	1=>cplang('hsk_address_1'), 
								2=>cplang('hsk_address_2'), 
								3=>cplang('hsk_address_3'), 
								4=>cplang('hsk_address_4'), 
								5=>cplang('hsk_address_5'), 
								6=>cplang('hsk_address_6'), 
								7=>cplang('hsk_address_7'), 
								8=>cplang('hsk_address_8'));
		hsk_tocache('address.inc', hsk_getcachevars(array('address_new' => $address_new)));
		cpmsg('hsk_hskconfig_bycache', 'action=hsk&operation=types&do='.$do, 'succeed');

	}

	showformheader('hsk&operation=types&do='.$do);
	showtableheader('');
	
	showsubtitle(array('', 'hsk_types_4', ''));

	foreach($address_new as $key => $val){
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

	hsk_tocache('address.inc', hsk_getcachevars(array('address_new' => $new_array)));
	cpmsg('hsk_types_add_succeed', 'action=hsk&operation=types&do='.$do, 'succeed');

}
?>