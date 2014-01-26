<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_common.php 206 2013-05-29 08:16:46Z qingrongfu $
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function showcssmenus($title, $menus = array(), $right = '', $replace = array()) {
	if(empty($menus)) {
		$s = '<div class="itemtitle">'.$right.'<h3>'.cplang($title, $replace).'</h3></div>';
	} elseif(is_array($menus)) {
		$s = '<div class="itemtitle">'.$right.'<h3>'.cplang($title, $replace).'</h3><ul class="tab1">';
		foreach($menus as $k => $menu) {
			if(is_array($menu[0])) {
				$s .= '<li id="addjs'.$k.'" class="'.($menu[1] ? 'current' : 'hasdropmenu').'" onmouseover="dropmenu(this);"><a href="#"><span>'.cplang($menu[0]['menu']).'<em>&nbsp;&nbsp;</em></span></a><div id="addjs'.$k.'child" class="dropmenu" style="display:none;">';
				if(is_array($menu[0]['submenu'])) {
					foreach($menu[0]['submenu'] as $submenu) {
						$s .= $submenu[1] ? '<a href="'.ADMINSCRIPT.'?action='.$submenu[1].'" class="'.($submenu[2] ? 'current' : '').'" onclick="'.$submenu[3].'">'.cplang($submenu[0]).'</a>' : '<a><b>'.cplang($submenu[0]).'</b></a>';
					}
				}
				$s .= '</div></li>';
			} else {
				$s .= '<li'.($menu[2] ? ' class="current"' : '').'><a href="'.(!$menu[4] ? ADMINSCRIPT.'?action='.$menu[1] : $menu[1]).'"'.(!empty($menu[3]) ? ' target="_blank"' : '').'><span>'.cplang($menu[0]).'</span></a></li>';
			}
		}
		$s .= '</ul></div>';
	}
	echo !empty($menus) ? '<div class="floattop" style="top:30px;">'.$s.'</div>' : $s;
	echo '<div class="floattopempty"></div>';
}

function adminlog($action, $cum = 1, $type = 'total', $ver = '21') {
	if($type == 'total') {
		$action = $action.$ver;
	}
	return C::t('#discuz_security#discuz_security_adminlog')->update_by_action($action, $cum, $type);
}

?>