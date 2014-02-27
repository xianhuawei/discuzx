<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//自动升级子菜单
$hsk_id		= 'types';
$do			= intval($_GET['do']) ? intval($_GET['do']) : 1;
$menu_list = getpopmenu($hsk_id, $do);

shownav('hsk', 'hsk_header_nav');
showsubmenu('hsk_types', $menu_list);

if($do == '1') {	//类别管理
	$cp = $_GET['cp'];
	$id = $_GET['id'];

	if(!$cp) {

		if(!submitcheck('submit')) {

			showformheader('hsk&operation=types&do=1');
			showtableheader();
			showsubtitle(array('', 'display_order', 'name', 'hsk_band_stat', 'hsk_type_money', 'hsk_type_manage', 'available', ''));
			showtagheader('tbody', '', true);

			$navlist = $subnavlist = $pluginsubnav = array();
			$query = DB::query("SELECT s.*, f.name as fname, f.fid, t.typeid, t.name as tname FROM ".DB::table('vgallery_sort')." s LEFT JOIN ".DB::table('forum_forum')." f ON f.fid=s.band LEFT JOIN ".DB::table('forum_threadclass')." t ON t.typeid=s.band ORDER BY s.dps");
			while($nav = DB::fetch($query)) {
				if($nav['sup']) {
					$subnavlist[$nav['sup']][] = $nav;
				} else {
					$navlist[$nav['sid']] = $nav;
				}
			}
			//print_r($subnavlist);
			foreach($navlist as $nav) {
				$navsubtype = array();
				showtablerow('', array('class="td25"', 'class="td25"', '', '', '',''), 
					array(!$nav['sup'] && $subnavlist[$nav['sid']] ? '<a href="javascript:;" class="right" onclick="toggle_group(\'subnav_'.$nav['sid'].'\', this)">[-]</a>'.'<input type="checkbox" class="checkbox" value="" disabled="disabled" />' : "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$nav[sid]\">",
					"<input type=\"text\" class=\"txt\" size=\"2\" name=\"displayordernew[$nav[sid]]\" value=\"$nav[dps]\">",
					"<div><input type=\"text\" class=\"txt\" size=\"15\" name=\"namenew[$nav[sid]]\" value=\"".dhtmlspecialchars($nav['sort'])."\">".
						($nav['sup'] == 0 ? "<a href=\"###\" onclick=\"addrowdirect=1;addrow(this, 1, $nav[sid])\" class=\"addchildboard\">".cplang('hsk_sort2_add')."</a></div>" : null),
					$nav['fid'] ? "<b>".$nav['fname']."</b>(".$nav['fid'].")" : null,
					"<input type=\"text\" class=\"txt\" size=\"15\" name=\"sortmoneynew[$nav[sid]]\" value=\"$nav[sortmoney]\">",
					!$nav['sup'] ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"sortmannew[$nav[sid]]\" value=\"".dhtmlspecialchars($nav['sortman'])."\">" : null,
					"<input class=\"checkbox\" type=\"checkbox\" name=\"availablenew[$nav[sid]]\" value=\"1\" ".($nav['available'] ? 'checked' : '').">",
					"<a href=\"".ADMINSCRIPT."?action=hsk&operation=types&do=1&cp=edit&id=$nav[sid]\" class=\"act\">$lang[edit]</a>"
				));
				if(!empty($subnavlist[$nav['sid']])) {
					showtagheader('tbody', 'subnav_'.$nav['sid'], true);
					$subnavnum = count($subnavlist[$nav['sid']]);
					foreach($subnavlist[$nav['sid']] as $sub) {
						$subnavnum--;
						showtablerow('', array('class="td25"', 'class="td25"', '', ''), array(
							"<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$sub[sid]\">",
							"<input type=\"text\" class=\"txt\" size=\"2\" name=\"displayordernew[$sub[sid]]\" value=\"$sub[dps]\">",
							"<div class=\"".($subnavnum ? 'board' : 'lastboard')."\"><input type=\"text\" class=\"txt\" size=\"15\" name=\"namenew[$sub[sid]]\" value=\"".dhtmlspecialchars($sub['sort'])."\"></div>",
							$sub['tname'],
							"<input type=\"text\" class=\"txt\" size=\"15\" name=\"sortmoneynew[$sub[sid]]\" value=\"$sub[sortmoney]\">",
							'',
							"<input class=\"checkbox\" type=\"checkbox\" name=\"availablenew[$sub[sid]]\" value=\"1\" ".($sub['available'] ? 'checked' : '').">",
							"<a href=\"".ADMINSCRIPT."?action=hsk&operation=types&do=1&cp=edit&id=$sub[sid]\" class=\"act\">$lang[edit]</a>"
						));
					}
					showtagfooter('tbody');
				}
			}
			showtagfooter('tbody');
			echo '<tr><td colspan="1"></td><td colspan="8"><div><a href="###" onclick="addrow(this, 0, 0)" class="addtr">'.cplang('hsk_sort1_add').'</a></div></td></tr>';
			showsubmit('submit', 'submit', 'del');
			showtablefooter();
			showformfooter();


			echo <<<EOT
<script type="text/JavaScript">
	var rowtypedata = [
		[[1, '', 'td25'], [1,'<input name="newdisplayorder[]" value="" size="3" type="text" class="txt">', 'td25'], [1, '<input name="newname[]" value="" size="15" type="text" class="txt">'], [1, '', ''], [1, '<input name="newsortmoney[]" value="0" size="15" type="text" class="txt">'], [2, '<input name="newsortman[]" value="" size="15" type="text" class="txt">']],
		[[1, '', 'td25'], [1,'<input name="newdisplayorder[]" value="" size="3" type="text" class="txt">', 'td25'], [1, '<div class=\"board\"><input name="newname[]" value="" size="15" type="text" class="txt"></div>'], [1, '', ''], [1, '<input name="newsortmoney[]" value="0" size="15" type="text" class="txt"><input type="hidden" name="newparentid[]" value="{1}" />'], [3, '']]
	];
</script>
EOT;

		} else {

			if($ids = dimplode($_GET['delete'])) {
				DB::query("DELETE FROM ".DB::table('vgallery_sort')." WHERE sid IN ($ids)");
			}

			if(is_array($_GET['namenew'])) {
				foreach($_GET['namenew'] as $id => $name) {
					$name = trim(dhtmlspecialchars($name));
					$sortmoneynew		= intval($_GET['sortmoneynew'][$id]);
					$sortmannew			= dhtmlspecialchars($_GET['sortmannew'][$id]);
					$availablenew[$id]	= intval($_GET['availablenew'][$id]);
					$displayordernew[$id] = intval($_GET['displayordernew'][$id]);
					$nameadd = !empty($name) ? ", sort='$name'" : '';
					DB::query("UPDATE ".DB::table('vgallery_sort')." SET dps='$displayordernew[$id]', available='$availablenew[$id]', sortman='$sortmannew', sortmoney='$sortmoneynew' $nameadd WHERE sid='$id'");
				}
			}

			if(is_array($_GET['newname'])) {
				foreach($_GET['newname'] as $k => $v) {
					$v = dhtmlspecialchars(trim($v));
					if(!empty($v)) {
						$newparentid[$k] = intval($_GET['newparentid'][$k]);
						$newsortman = $newparentid[$k] ? null : $_GET['newsortman'][$k];
						$newsortmoney = $_GET['newsortmoney'][$k];
						$newdisplayorder[$k] = intval($_GET['newdisplayorder'][$k]);
						$data = array(
							'sup'			=> $newparentid[$k],
							'sort'			=> $v,
							'dps'			=> $newdisplayorder[$k],
							'sortman'		=> $newsortman,
							'sortmoney'		=> $newsortmoney,
							'available'		 => '1'
						);
						//print_r($data);exit();
						DB::insert('vgallery_sort', $data);
					}
				}
			}

			hsk_updatecache('sort');
			cpmsg('hsk_types_add_succeed', 'action=hsk&operation=types', 'succeed');

		}

	}elseif($cp == "edit" && $id) {//修改分类

		$nav = DB::fetch_first("SELECT s.*, u.band as supband FROM ".DB::table('vgallery_sort')." s LEFT JOIN ".DB::table('vgallery_sort')." u ON u.sid=s.sup WHERE s.sid='$id'");
		if(!$nav) {
			cpmsg('hsk_types_notfind', '', 'error');
		}
		//print_r($nav);dexit();

		if(!submitcheck('editsubmit')) {

			$string = sprintf('%02d', $nav['highlight']);

			$query = DB::query("SELECT * FROM ".DB::table('vgallery_sort')." WHERE sup='0' ORDER BY dps, sid");
			$parentselect = array(array('0', cplang('misc_customnav_parent_top')));
			$parentname = '';
			while($pnavs = DB::fetch($query)) {
				if($pnavs['sid'] != $nav['sid'])
					$parentselect[] = array($pnavs['sid'], '&nbsp;&nbsp;'.$pnavs['sort']);
				if($nav['sid'] == $pnavs['sup']) {
					$parentname = ' - '.$pnavs['sort'];
				}
			}

			//浏览权限
			$tmpstr = unserialize($nav['sygroup']);
			$usergroupselect = '<select name="sygroupnew[]" size="10" multiple="multiple"><option value="0"'.(@in_array('', $tmpstr) ? ' selected' : '').'>'.cplang('plugins_empty').'</option>';

			$tmpstr = is_array($tmpstr) ? $tmpstr : array($tmpstr);

			$query = DB::query("SELECT type, groupid, grouptitle, radminid FROM ".DB::table('common_usergroup')." ORDER BY (creditshigher<>'0' || creditslower<>'0'), creditslower, groupid");
			$groupselect = array();
			while($group = DB::fetch($query)) {
				$group['type'] = $group['type'] == 'special' && $group['radminid'] ? 'specialadmin' : $group['type'];
				$groupselect[$group['type']] .= '<option value="'.$group['groupid'].'"'.(@in_array($group['groupid'], $tmpstr) ? ' selected' : '').'>'.$group['grouptitle'].'</option>';
			}
			$usergroupselect .= '<optgroup label="'.$lang['usergroups_member'].'">'.$groupselect['member'].'</optgroup>'.
				($groupselect['special'] ? '<optgroup label="'.$lang['usergroups_special'].'">'.$groupselect['special'].'</optgroup>' : '').
				($groupselect['specialadmin'] ? '<optgroup label="'.$lang['usergroups_specialadmin'].'">'.$groupselect['specialadmin'].'</optgroup>' : '').
				'<optgroup label="'.$lang['usergroups_system'].'">'.$groupselect['system'].'</optgroup></select>';
			$tmpstr = '';


			//发布权限
			$tmpstr = unserialize($nav['regroup']);
			$reusergroupselect = '<select name="regroupnew[]" size="10" multiple="multiple"><option value="0"'.(@in_array('', $tmpstr) ? ' selected' : '').'>'.cplang('plugins_empty').'</option>';

			$tmpstr = is_array($tmpstr) ? $tmpstr : array($tmpstr);

			$query = DB::query("SELECT type, groupid, grouptitle, radminid FROM ".DB::table('common_usergroup')." ORDER BY (creditshigher<>'0' || creditslower<>'0'), creditslower, groupid");
			$groupselect = array();
			while($group = DB::fetch($query)) {
				$group['type'] = $group['type'] == 'special' && $group['radminid'] ? 'specialadmin' : $group['type'];
				$groupselect[$group['type']] .= '<option value="'.$group['groupid'].'"'.(@in_array($group['groupid'], $tmpstr) ? ' selected' : '').'>'.$group['grouptitle'].'</option>';
			}
			$reusergroupselect .= '<optgroup label="'.$lang['usergroups_member'].'">'.$groupselect['member'].'</optgroup>'.
				($groupselect['special'] ? '<optgroup label="'.$lang['usergroups_special'].'">'.$groupselect['special'].'</optgroup>' : '').
				($groupselect['specialadmin'] ? '<optgroup label="'.$lang['usergroups_specialadmin'].'">'.$groupselect['specialadmin'].'</optgroup>' : '').
				'<optgroup label="'.$lang['usergroups_system'].'">'.$groupselect['system'].'</optgroup></select>';
			$tmpstr = '';
			

			if(!$nav['sup']) {
				//绑定论坛

				require_once libfile('function/forumlist');
				$fupselect = '<select name="bandnew"><option value="0">'.cplang('hsk_band_no').'</option>'.forumselect(FALSE, 0, $nav['band'], TRUE).'</select>';

			
			}elseif($nav['supband']){
				//绑定主题分类
				$fupselect = "<select name=\"bandnew\">\n<option value=\"0\">".cplang('hsk_band_no')."</option>\n";
				$query = DB::query("SELECT typeid, name FROM ".DB::table('forum_threadclass')." where fid='$nav[supband]' ORDER BY displayorder");
				while($fup = DB::fetch($query)) {
					$selected = $fup['typeid'] == $nav['band'] || $fup['name'] == $nav['sort'] ? "selected=\"selected\"" : NULL;
					$fupselect .= "<option value=\"$fup[typeid]\" $selected>$fup[name]</option>";
				}
				$fupselect .= '</select>';
			}



			showformheader("hsk&operation=types&do=1&cp=edit&id=$id", 'enctype');
			showtableheader();
			showtitle(cplang('hsk_types_1').$parentname.' - '.$nav['sort']);
			showsetting('hsk_types_1_name', 'namenew', $nav['sort'], 'text');
			showsetting('hsk_types_sup', array('supnew', $parentselect), $nav['sup'], 'select');
			showsetting('hsk_types_color', array('colornew', array(
				array(0, '<span style="color: '.LINK.';">Default</span>'),
				array(1, '<span style="color: Red;">Red</span>'),
				array(2, '<span style="color: Orange;">Orange</span>'),
				array(3, '<span style="color: Yellow;">Yellow</span>'),
				array(4, '<span style="color: Green;">Green</span>'),
				array(5, '<span style="color: Cyan;">Cyan</span>'),
				array(6, '<span style="color: Blue;">Blue</span>'),
				array(7, '<span style="color: Purple;">Purple</span>'),
				array(8, '<span style="color: Gray;">Gray</span>'),
			)), $nav['scolor'], 'mradio2');
			if(!$nav['sup']) {			//hsk_types_istv
				showsetting('hsk_types_istv', 'istvnew', intval($nav['istv']), 'radio');
				showsetting('hsk_types_rewid', 'rewidnew', intval($nav['rewid']), 'text');
				showsetting('hsk_types_rehei', 'reheinew', intval($nav['rehei']), 'text');
				showsetting('hsk_band_fid', 'bandnew', '', $fupselect, '', 0, cplang('hsk_band_fid_info'));
				showsetting('hsk_type_manage', 'sortmannew', $nav['sortman'], 'text', '', 0, cplang('hsk_type_manage_info'));
				showsetting('hsk_type_sygroup', 'sygroupnew', '', $usergroupselect, '', 0, cplang('hsk_type_sygroup_info'));
				showsetting('hsk_type_regroup', 'regroupnew', '', $reusergroupselect, '', 0, cplang('hsk_type_regroup_info'));
				showsetting('hsk_type_money', 'sortmoneynew', $nav['sortmoney'], 'text', '', 0, cplang('hsk_type_money_info'));
			}else{
				if($nav['supband'])
					showsetting('hsk_band_typeid', 'bandnew', '', $fupselect, '', 0, cplang('hsk_band_typeid_info'));
			}

			showsetting('hsk_edit_next', 'editnext', 1, 'radio');
			showsubmit('editsubmit');
			showtablefooter();
			showformfooter();

		} else {

			$namenew				= trim(dhtmlspecialchars($_GET['namenew']));
			$sortmannew				= trim(dhtmlspecialchars($_GET['sortmannew']));
			$supnew					= intval($_GET['supnew']);
			$sortmoneynew			= intval($_GET['sortmoneynew']);
			$rewidnew				= intval($_GET['rewidnew']);
			$reheinew				= intval($_GET['reheinew']);
			$istvnew				= intval($_GET['istvnew']);
			$colornew				= $_GET['colornew'];
			$bandnew				= intval($_GET['bandnew']);
			$sygroupnew				= is_array($_GET['sygroupnew']) ? serialize($_GET['sygroupnew']) : null;
			$regroupnew				= is_array($_GET['regroupnew']) ? serialize($_GET['regroupnew']) : null;
			$editnext				= intval($_GET['editnext']);

			if($editnext){//自动跳转下一个类别
				$nav = DB::fetch_first("SELECT sid FROM ".DB::table('vgallery_sort')." WHERE dps>'$id' or sid>'$id'");
				if(!$nav) {
					$nexturl = 'action=hsk&operation=types';
				}else{
					$nexturl = "action=hsk&operation=types&do=1&cp=edit&id=$nav[sid]";
				}
			}else{
				$nexturl = 'action=hsk&operation=types';
			}

			DB::query("UPDATE ".DB::table('vgallery_sort')." SET sort='$namenew', sup='$supnew', scolor='$colornew', band='$bandnew', rewid='$rewidnew', rehei='$reheinew', sortman='$sortmannew', sortmoney='$sortmoneynew', sygroup='$sygroupnew', regroup='$regroupnew', istv='$istvnew' WHERE sid='$id'");

			hsk_updatecache('sort');
			cpmsg('hsk_types_add_succeed', $nexturl, 'succeed');

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