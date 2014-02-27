<?php
for($i=1; $i<10; $i++){
	$styleselect .= '<option value="'.$i.'">'.cplang('index_style_'.$i).'</option>';
}		
?>		

<script type="text/JavaScript">
var rowtypedata = [
	[
		[1,'', 'td25'],
		[1,'<input type="text" class="txt" name="newdsp[]" size="3">', 'td25'],
		[1,'<input type="text" class="txt" name="newsubject[]" size="18">'],
		[4,'<select size="1" name="newstyle[]"><?=$styleselect?></select>']
	]
]

	function addjscall() {
		var blockclass = $('stylenew').value;
		if(blockclass==1 || blockclass==2 || blockclass==8 || blockclass==9) {
			showWindow('getvalue', 'plugin.php?id=hsk_vcenter:hsk_vcenter&mod=getlist&types=indexset&ccc=2&styleid=' + blockclass);
		} else if(blockclass) {
			$('valuenew').value = '0';
		} else {
			alert('<?=cplang("hsk_types_notfind")?>');
		}
	}
</script>

<?php


if(!$cp) {

	if(!submitcheck('actorsubmit')) {
		
		$navlist = array();
		$query = DB::query("SELECT * FROM ".DB::table('vgallery_indexset')." WHERE typeid='2' order by dsp, id");
		while($nav = DB::fetch($query)) {
			$nav['moremsg']	= trim(dhtmlspecialchars(stripslashes($nav['moremsg'])));
			$nav['subject']	= trim(dhtmlspecialchars(stripslashes($nav['subject'])));
			$navlist[$nav['id']] = $nav;
		}

		showformheader('hsk&operation=indexset&do='.$do);
		showtableheader('');
		
		showsubtitle(array('', 'index_set_dsp', 'index_set_subject', 'index_set_style', 'index_set_value', 'index_set_right', ''));

		foreach($navlist as $nav) {

			$styleselect = null;
			for($i=1; $i<10; $i++){
				$styleselect .= "
				<option value=\"$i\"".($nav['styleid']==$i ? " selected" : null).">".cplang('index_style_'.$i)."</option>";
			}		

			showtablerow('', array('', 'class="td25"', '', '', '', ''), 
				array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$nav[id]\">",
				"<input type=\"text\" class=\"txt\" name=\"dspnew[$nav[id]]\" value=\"$nav[dsp]\" size=\"3\">",
				"<input type=\"text\" class=\"txt\" name=\"namenew[$nav[id]]\" value=\"$nav[subject]\" size=\"18\">",
				"<select size=\"1\" name=\"stylenew[$nav[id]]\">$styleselect</select>",
				"$nav[value]",
				"<input type=\"text\" class=\"txt\" name=\"\" value=\"$nav[moremsg]\" style=\"width:300px;\" readonly>",
				"<a href=\"".ADMINSCRIPT."?action=hsk&operation=indexset&do=$do&cp=edit&id=$nav[id]\" class=\"act\">$lang[edit]</a>"
			));
		}

		echo '<tr><td></td><td colSpan="6"><div><a href="###" onclick="addrow(this, 0);" class="addtr">'.cplang('hsk_types_add').'</a></div></td></tr>';
		showsubmit('actorsubmit', 'submit', 'del');

		showtablefooter();	
		showformfooter();

	}else{

		if($ids = dimplode($_GET['delete'])) {
			DB::query("DELETE FROM ".DB::table('vgallery_indexset')." WHERE id IN ($ids)");
		}

		//生成新数组
		if(is_array($_GET['namenew'])) {
			foreach($_GET['namenew'] as $id => $name) {
				$name			= addslashes(trim($name));
				$styleid		= intval($_GET['stylenew'][$id]);
				$dsp			= dhtmlspecialchars($_GET['dspnew'][$id]);

				DB::query("UPDATE ".DB::table('vgallery_indexset')." SET dsp='$dsp', styleid='$styleid', subject='$name' WHERE id='$id'");
			}
		}

		if(is_array($_GET['newsubject'])) {
			foreach($_GET['newsubject'] as $k => $v) {
				$v = trim(dhtmlspecialchars($v));
				if(!empty($v)) {
					$data = array(
						'subject'		=> $v,
						'styleid'		=> intval($_GET['newstyle'][$k]),
						'typeid'		=> 2,
						'dsp'			=> intval($_GET['newdsp'][$k]),
						'moremsg'		=> '',
						'value'			=> '0'
					);
					DB::insert('vgallery_indexset', $data);
				}
			}

		}

		hsk_updatecache('index_data');
		cpmsg('hsk_types_add_succeed', 'action=hsk&operation=indexset&do='.$do, 'succeed');

	}

}elseif($cp == "edit" && $id) {//修改分类

	$nav = DB::fetch_first("SELECT * FROM ".DB::table('vgallery_indexset')." WHERE id='$id'");
	if(!$nav) {
		cpmsg('hsk_types_notfind', '', 'error');
	}
	$nav['moremsg'] = stripslashes($nav['moremsg']);
	$nav['subject'] = stripslashes($nav['subject']);
	//print_r($nav);dexit();

	if(!submitcheck('editsubmit')) {

		//功能类别
		$fupselect = "<select name=\"stylenew\">\n";
		for($i=1; $i<10; $i++) {
			$selected = $nav['styleid'] == $i ? "selected=\"selected\"" : NULL;
			$fupselect .= "<option value=\"$i\" $selected>".cplang('index_style_'.$i)."</option>";
		}
		$fupselect .= '</select>';

		//选择样式
		$fupselect2 = "<select name=\"getstylenew\">\n";
		for($i=1; $i<4; $i++) {
			$selected = $nav['getstyle'] == $i ? "selected=\"selected\"" : NULL;
			$fupselect2 .= "<option value=\"$i\" $selected>".cplang('index_getstylee_'.$i)."</option>";
		}
		$fupselect2 .= '</select>';



		showformheader("hsk&operation=indexset&do=$do&cp=edit&id=$id", 'enctype');
		showtableheader();

		showtitle(cplang('index_set_subject').' - '.$nav['subject']);
		showsetting('index_set_subject', 'subjectnew', $nav['subject'], 'text');
		showsetting('index_set_style', 'stylenew', '', $fupselect, '', 0, cplang('index_sendvalue'));
		showsetting('index_set_value', 'valuenew', $nav['value'], 'text');
		showsetting('index_set_sum', 'getsumnew', $nav['getsum'], 'text', '', 0, cplang('index_set_sum_info'));
		showsetting('index_set_getstyle', 'getstylenew', '', $fupselect2, '', 0, cplang('index_set_sum_info'));
		showsetting('index_set_right', 'moremsgnew', $nav['moremsg'], 'textarea');
		showsetting('hsk_edit_next', 'editnext', 1, 'radio');
		showsubmit('editsubmit');
		showtablefooter();
		showformfooter();

	} else {

		$subjectnew				= addslashes(trim($_GET['subjectnew']));
		$moremsgnew				= addslashes(trim($_GET['moremsgnew']));
		$stylenew				= intval($_GET['stylenew']);
		$valuenew				= intval($_GET['valuenew']);
		$editnext				= intval($_GET['editnext']);
		$getsumnew				= intval($_GET['getsumnew']);
		$getstylenew			= intval($_GET['getstylenew']);

		if($editnext){//自动跳转下一个类别
			$nav = DB::fetch_first("SELECT id FROM ".DB::table('vgallery_indexset')." WHERE id>'$id'");
			if(!$nav) {
				$nexturl = 'action=hsk&operation=indexset&do='.$do;
			}else{
				$nexturl = "action=hsk&operation=indexset&do=$do&cp=edit&id=$nav[id]";
			}
		}else{
			$nexturl = 'action=hsk&operation=indexset&do='.$do;
		}

		DB::query("UPDATE ".DB::table('vgallery_indexset')." SET subject='$subjectnew', styleid='$stylenew', moremsg='$moremsgnew', value='$valuenew', getsum='$getsumnew', getstyle='$getstylenew' WHERE id='$id'");

		hsk_updatecache('index_data');
		cpmsg('hsk_setconfig_succeed', $nexturl, 'succeed');

	}
}
?>