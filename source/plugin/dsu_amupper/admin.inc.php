<?php
!defined('IN_DISCUZ') && exit('Access Denied');
!defined('IN_ADMINCP') && exit('Access Denied');

//公共部分

if(!$_GET['submit']){
	$exsel = extc2seled(0,$_G['setting']['extcredits']);
	loadcache('usergroups');
	$usergroups = $_G['cache']['usergroups'];
	$gidsel = usergroups2seled('-1',$usergroups);
	echo '<script type="text/JavaScript">
	var rowtypedata = [[
		[1,"", ""],
		[1,\'<input type="text" class="txt" name="days[]" size="7">\', ""],
		[1,\''.$gidsel.'\', ""],
		[1,\''.$exsel.'\', ""],
		[1,\'<input type="text" class="txt" name="reward[]" size="7">\', ""],
	]]
	</script>';
	showformheader('plugins&operation=config&identifier=dsu_amupper&pmod=admin');
	showtips(lang("plugin/dsu_amupper","admin2_p1"));
	showtableheader(lang("plugin/dsu_amupper","admin2_h1"));
	showsubtitle(array(lang("plugin/dsu_amupper","admin2_t0"), lang("plugin/dsu_amupper","admin2_t1"), lang("plugin/dsu_amupper","admin2_t4"),lang("plugin/dsu_amupper","admin2_t2"), lang("plugin/dsu_amupper","admin2_t3")));

	$arr = DB::fetch_all("SELECT * FROM %t WHERE id>%d LIMIT %d", array('plugin_dsuamupperc', '-1', '100'), 'id');

	if($arr){
		$i = 0;
		$data_f2a =dstripslashes($arr);
		foreach ($data_f2a as $id => $result){
			$exsel = extc2seled($result['extcredits'],$_G['setting']['extcredits']);
			$gidsel = usergroups2seled($result['usergid'],$usergroups);
			showtablerow('', array(' ', ' ', ' ', ' '), array(
				'<input type="checkbox" class="checkbox" name="delete[]" value="'.$i.'" />',
				'<INPUT TYPE="hidden" NAME="id[]" value="'.$result['id'].'"><input type="text" class="txt" name="days[]" value="'.$result['days'].'" size="7" />',
				''.$gidsel.'',
				''.$exsel.'',
				'<input type="text" class="txt" name="reward[]" value="'.$result['reward'].'" size="7" />',
			));
			$i++;
		}
	}
	echo '<tr><td></td><td colspan="3"><div><a href="#addrow" name="addrow" onclick="addrow(this, 0)" class="addtr">'.lang("plugin/dsu_amupper","admin2_s1").'</a></div></td></tr>';
	showsubmit('submit', lang("plugin/dsu_amupper","admin2_s2"));
	showtablefooter();
	showformfooter();
}elseif($_G['adminid']=='1' && $_GET['formhash']==FORMHASH){
	
	$mrcs = array();
	$max_i = max(count($_GET['days']), count($_GET['usergid']), count($_GET['extcredits']), count($_GET['reward']));
	
	for($i=0; $i < $max_i; $i++){
		if(intval($_GET['days'][$i]) && intval($_GET['extcredits'][$i]) && intval($_GET['usergid'][$i]) && intval($_GET['reward'][$i]*100) && !in_array($i,$_GET['delete'])){
			$mrcs[$i]['days']=intval($_GET['days'][$i]);
			$mrcs[$i]['usergid']=intval($_GET['usergid'][$i]);
			$mrcs[$i]['extcredits']=intval($_GET['extcredits'][$i]);
			$mrcs[$i]['reward']=intval($_GET['reward'][$i]*100)/100;
			$mrcs[$i]['id']=intval($i);
		}
	}

	DB::query('DELETE FROM %t', array('plugin_dsuamupperc'));
	foreach ($mrcs as $id => $result){

		DB::query("INSERT INTO ".DB::table('plugin_dsuamupperc')." (days, usergid, extcredits, reward, id) VALUES (".implode(',', $result).")");
	}

	cpmsg('dsu_amupper:admin2_i', 'action=plugins&operation=config&identifier=dsu_amupper&pmod=admin','succeed');
}


//自定义函数
function usergroups2seled($id,$array){
	$extc_sel = '<select name="usergid[]">';
	if($id == '-1'){$extc_sel .='<option value="-1"  selected>'.lang("plugin/dsu_amupper","admin2_no").'</option>' ;}else{$extc_sel .='<option value="-1">'.lang("plugin/dsu_amupper","admin2_no").'</option>' ;}
	foreach($array as $i => $value){
		if($id == $i ){
			$extc_sel .='<option value="'.$i.'" selected>'.$value['grouptitle'].'</option>' ;
		}else{
			$extc_sel .='<option value="'.$i.'">'.$value['grouptitle'].'</option>' ;
		}
	}
	$extc_sel .= '</select>';
	return $extc_sel;
}
function extc2seled($id,$array){
	$extc_sel = '<select name="extcredits[]">';
	foreach($array as $i => $value){
		if($id == $i ){
			$extc_sel .='<option value="'.$i.'" selected>'.$value['title'].'</option>' ;
		}else{
			$extc_sel .='<option value="'.$i.'">'.$value['title'].'</option>' ;
		}
	}
	$extc_sel .= '</select>';
	return $extc_sel;
}
?>