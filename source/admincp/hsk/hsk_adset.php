<script type="text/JavaScript">
	var rowtypedata = [
		[[1, '', 'td25'], [1,'', 'td25'], [1, '<input name="newname[]" value="" size="15" type="text" class="txt" style="width:150px;">'], [1, '<select size="1" name="newstyleid[]"><option value="1"><?=cplang("ad_styleid_1")?></option><option value="2"><?=cplang("ad_styleid_2")?></option></select>'], [1, 'Width X <input name="newheight[]" value="0" size="15" type="text" class="txt" style="width:40px;">Px']]
	];
</script>


<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//自动升级子菜单
$hsk_id		= 'adset';
$do			= intval($_GET['do']) ? intval($_GET['do']) : 1;
$menu_list = getpopmenu($hsk_id, $do);

shownav('hsk', 'hsk_header_nav');
showsubmenu('hsk_types', $menu_list);

if($do == '1') {	//类别管理
	$cp = $_GET['cp'];
	$id = $_GET['id'];

	if(!$cp) {

		if(!submitcheck('submit')) {

			showformheader('hsk&operation=adset&do=1');
			showtableheader();
			showsubtitle(array('', 'ID', 'adset_subject', 'adset_style', 'adset_size', 'adset_clicks', 'adset_displayer', ''));
			showtagheader('tbody', '', true);

			$navlist = $subnavlist = $pluginsubnav = array();
			$query = DB::query("SELECT * FROM ".DB::table('vgallery_ad')." WHERE styleid in(1,2) ORDER BY id");
			while($nav = DB::fetch($query)) {
				$nav['message'] = stripslashes($nav['message']);
				$navlist[$nav['id']] = $nav;
			}
			//print_r($subnavlist);
			foreach($navlist as $nav) {
				$navsubtype = array();
				showtablerow('', array('class="td25"', 'class="td25"', '', '', '',''), 
					array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$nav[id]\">",
					"<input type=\"text\" class=\"txt\" size=\"2\" name=\"order[$nav[id]]\" value=\"$nav[id]\" disabled>",
					"<input type=\"text\" class=\"txt\" size=\"15\" name=\"subjectnew[$nav[id]]\" value=\"".dhtmlspecialchars($nav['subject'])."\" style=\"width:150px;\">",
					"<select size=\"1\" name=\"styleidnew[$nav[id]]\"><option value=\"1\"".($nav['styleid']==1 ? " selected" : null).">".cplang('ad_styleid_1')."</option>
					<option value=\"2\"".($nav['styleid']==2 ? " selected" : null).">".cplang('ad_styleid_2')."</option></select>",
					$nav['width']." X <input type=\"text\" class=\"txt\" size=\"3\" style=\"width:50px;\" name=\"heightnew[$nav[id]]\" value=\"".dhtmlspecialchars($nav['height'])."\">Px",
					"<input class=\"txt\" type=\"text\" name=\"clicknew[$nav[id]]\" value=\"$nav[clicks]\" style=\"width:50px;\">",
					"<input class=\"checkbox\" type=\"checkbox\" name=\"displayernew[$nav[id]]\" value=\"1\" ".($nav['displayer'] ? 'checked' : '').">",
					"<a href=\"".ADMINSCRIPT."?action=hsk&operation=adset&do=1&cp=edit&id=$nav[id]\" class=\"act\">$lang[edit]</a>"
				));
			}
			showtagfooter('tbody');
			echo '<tr><td colspan="1"></td><td colspan="7"><div><a href="###" onclick="addrow(this, 0, 0)" class="addtr">'.cplang('hsk_types_add').'</a></div></td></tr>';
			showsubmit('submit', 'submit', 'del');
			showtablefooter();
			showformfooter();

		} else {

			if($ids = dimplode($_GET['delete'])) {
				DB::query("DELETE FROM ".DB::table('vgallery_ad')." WHERE id IN ($ids)");
			}

			if(is_array($_GET['subjectnew'])) {
				foreach($_GET['subjectnew'] as $id => $subject) {
					$subject			= trim(dhtmlspecialchars($subject));
					$styleid			= intval($_GET['styleidnew'][$id]);
					$height				= intval($_GET['heightnew'][$id]);
					$displayer			= intval($_GET['displayernew'][$id]);
					$width				= $styleid == 1 ? 690 : 250;
					DB::query("UPDATE ".DB::table('vgallery_ad')." SET subject='$subject', styleid='$styleid', width='$width', height='$height', displayer='$displayer' WHERE id='$id'");
				}
			}

			if(is_array($_GET['newname'])) {
				foreach($_GET['newname'] as $k => $v) {
					$v = dhtmlspecialchars(trim($v));
					if(!empty($v)) {
						$styleid	= intval($_GET['newstyleid'][$k]);
						$height		= intval($_GET['newheight'][$k]);
						$width		= $styleid == 1 ? 690 : 250;
						if($height){
							$data = array(
								'styleid'		=> $styleid,
								'subject'		=> $v,
								'width'			=> $width,
								'height'		=> $height,
								'displayer'		=> '1',
								'clicks'		=> '0'
							);
							//print_r($data);exit();
							DB::insert('vgallery_ad', $data);
						}
					}
				}
			}

			hsk_updatecache('adlist');
			cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=adset', 'succeed');

		}

	}elseif($cp == "edit" && $id) {//修改分类

		$nav = DB::fetch_first("SELECT * FROM ".DB::table('vgallery_ad')." WHERE id='$id'");
		if(!$nav) {
			cpmsg('hsk_types_notfind', '', 'error');
		}
		$nav['message'] = stripslashes($nav['message']);
		//print_r($nav);dexit();

		if(!submitcheck('editsubmit')) {

			showformheader("hsk&operation=adset&do=1&cp=edit&id=$id", 'enctype');
			showtableheader();

			showtitle(cplang('ad_view'));
			showtablerow('', array('class="vtop" colspan="4" style="padding-left:20px;"'), array('<div id="ad_inview" style="height:'.$nav['height'].'px;">'.$nav['message'].'</div>'));

			showtitle(cplang('hsk_types_1').' - '.$nav['subject']);
			showsetting('adset_subject', 'subjectnew', $nav['subject'], 'text');
			showsetting('adset_height', 'heightnew', $nav['height'], 'text');
			showsetting('adset_message', 'messagenew', $nav['message'], 'textarea', '', 0, cplang('adset_message_view'));
			showsetting('hsk_edit_next', 'editnext', 1, 'radio');
			showsubmit('editsubmit');
			showtablefooter();
			showformfooter();

		} else {

			$subjectnew				= trim(dhtmlspecialchars($_GET['subjectnew']));
			$messagenew				= addslashes(trim($_GET['messagenew']));
			$heightnew				= intval($_GET['heightnew']);
			$editnext				= intval($_GET['editnext']);

			if($editnext){//自动跳转下一个类别
				$nav = DB::fetch_first("SELECT id FROM ".DB::table('vgallery_ad')." WHERE id>'$id'");
				if(!$nav) {
					$nexturl = 'action=hsk&operation=adset';
				}else{
					$nexturl = "action=hsk&operation=adset&do=1&cp=edit&id=$nav[id]";
				}
			}else{
				$nexturl = 'action=hsk&operation=adset';
			}

			DB::query("UPDATE ".DB::table('vgallery_ad')." SET subject='$subjectnew', message='$messagenew', height='$heightnew' WHERE id='$id'");

			hsk_updatecache('adlist');
			cpmsg('hsk_setconfig_succeed', $nexturl, 'succeed');

		}
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