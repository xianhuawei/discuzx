<script type="text/JavaScript">
var rowtypedata = [
	[
		[1,'', 'td25'],
		[1,'<input type="text" class="txt" name="newname[]" size="18">']
	]
]
</script>

<?php

if(!submitcheck('actorsubmit')) {
	
	$ppp = 20;
	$start_limit = ($page - 1) * $ppp;
	$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_tag'));
	$multipage = multi($count, $ppp, $page, ADMINSCRIPT."?action=hsk&operation=types&do=$do");


	showformheader('hsk&operation=types&do='.$do);
	showtableheader('');
	
	showsubtitle(array('', 'hsk_types_7'));

	$query = DB::query("SELECT * FROM ".DB::table('common_tag')." WHERE status='0' ORDER BY tagid LIMIT $start_limit, $ppp");
	while($datarow = DB::fetch($query)){
		showtablerow('', array('', ''), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[$datarow[tagid]]\" value=\"$key\">",
			"<input type=\"text\" class=\"txt\" name=\"namenew[$datarow[tagid]]\" value=\"$datarow[tagname]\" size=\"18\">"
		));
	}


	echo '<tr><td></td><td><div><a href="###" onclick="addrow(this, 0);" class="addtr">'.cplang('hsk_types_add').'</a></div></td></tr>';
	showsubmit('actorsubmit', 'submit', 'del', '', $multipage, false);

	showtablefooter();	
	showformfooter();

}else{

	//生成新数组

	if(is_array($_GET['namenew'])) {
		foreach($_GET['namenew'] as $id => $name) {
			$name		= trim(dhtmlspecialchars($name));
			if($name){
				DB::query("UPDATE ".DB::table('common_tag')." SET tagname='$name' WHERE tagid='$id'");
			}
		}
	}

	if(is_array($_GET['newname'])) {
		$maxid = $maxid + 1;
		foreach($_GET['newname'] as $k => $v) {
			$v = dhtmlspecialchars(trim($v));
			if(!empty($v)) {
				DB::query("INSERT INTO ".DB::table('common_tag')."(tagname, status) VALUES ('$v', '0')");
			}
		}
	}

	cpmsg('hsk_types_add_succeed', 'action=hsk&operation=types&do='.$do, 'succeed');

}

?>