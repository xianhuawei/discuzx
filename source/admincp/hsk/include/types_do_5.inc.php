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
	if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php')){
		require_once DISCUZ_ROOT.'./data/hskcenter/hsk_years.inc.php';
	}else{
		//重写文件
		$years_new = array(	1=>'1950-1990', 
							2=>'1990-2000', 
							3=>'2001', 
							4=>'2002', 
							5=>'2003', 
							6=>'2004', 
							7=>'2005', 
							8=>'2006', 
							9=>'2007', 
							10=>'2008', 
							11=>'2009', 
							12=>'2010', 
							13=>'2011', 
							14=>'2012');
		hsk_tocache('years.inc', hsk_getcachevars(array('years_new' => $years_new)));
		cpmsg('hsk_hskconfig_bycache', 'action=hsk&operation=types&do='.$do, 'succeed');

	}

	showformheader('hsk&operation=types&do='.$do);
	showtableheader('');
	
	showsubtitle(array('', 'hsk_types_4', ''));

	foreach($years_new as $key => $val){
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

	hsk_tocache('years.inc', hsk_getcachevars(array('years_new' => $new_array)));
	cpmsg('hsk_types_add_succeed', 'action=hsk&operation=types&do='.$do, 'succeed');

}
?>