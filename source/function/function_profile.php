<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_profile.php 33491 2013-06-24 07:13:17Z kamichen $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 * 获取设置资料项的html代码
 * 注意：对birthcity和residecity，需要在外层 td 指定id为 td_birthcity td_residecity
 * 如果返回为空，表示该项目不是合法资料项
 * @param unknown_type $fieldid
 * @param $space  用户资料，主要设置默认值
 * @param $showstatus  是否显示附加信息：审核状态；不可修改提示等
 * $ignoreunchangable 是否忽略不可修改设置，即返回可输入的input
 * $ignoreshowerror 是否忽略 showerror 区域
 */
function profile_setting($fieldid, $space=array(), $showstatus=false, $ignoreunchangable = false, $ignoreshowerror = false) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available'] || in_array($fieldid, array('uid', 'constellation', 'zodiac', 'birthmonth', 'birthyear', 'birthprovince', 'birthdist', 'birthcommunity', 'resideprovince', 'residedist', 'residecommunity'))) {
		return '';
	}

	if($showstatus) {//附加信息需检查用户提交的审核资料
		$uid = intval($space['uid']);
		if($uid && !isset($_G['profile_verifys'][$uid])) {//正在审核项
			$_G['profile_verifys'][$uid] = array();
			if($value = C::t('common_member_verify_info')->fetch_by_uid_verifytype($uid, 0)) {
				$fields = dunserialize($value['field']);
				foreach($fields as $key => $fvalue) {
					if($_G['cache']['profilesetting'][$key]['needverify']) {
						$_G['profile_verifys'][$uid][$key] = $fvalue;
					}
				}
			}
		}
		$verifyvalue = NULL;
		if(isset($_G['profile_verifys'][$uid][$fieldid])) {
			if($fieldid=='gender') {
				$verifyvalue = lang('space', 'gender_'.intval($_G['profile_verifys'][$uid][$fieldid]));
			} elseif($fieldid=='birthday') {
				$verifyvalue = $_G['profile_verifys'][$uid]['birthyear'].'-'.$_G['profile_verifys'][$uid]['birthmonth'].'-'.$_G['profile_verifys'][$uid]['birthday'];
			} else {
				$verifyvalue = $_G['profile_verifys'][$uid][$fieldid];
			}
		}
	}

	$html = '';
	$field['unchangeable'] = !$ignoreunchangable && $field['unchangeable'] ? 1 : 0;
	if($fieldid == 'birthday') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {//不可修改
			return '<span>'.$space['birthyear'].'-'.$space['birthmonth'].'-'.$space['birthday'].'</span>';
		}
		//生日:年
		$birthyeayhtml = '';
		$nowy = dgmdate($_G['timestamp'], 'Y');
		for ($i=0; $i<100; $i++) {
			$they = $nowy - $i;
			$selectstr = $they == $space['birthyear']?' selected':'';
			$birthyeayhtml .= "<option value=\"$they\"$selectstr>$they</option>";
		}
		//生日:月
		$birthmonthhtml = '';
		for ($i=1; $i<13; $i++) {
			$selectstr = $i == $space['birthmonth']?' selected':'';
			$birthmonthhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		//生日:日
		$birthdayhtml = '';
		if(empty($space['birthmonth']) || in_array($space['birthmonth'], array(1, 3, 5, 7, 8, 10, 12))) {
			$days = 31;
		} elseif(in_array($space['birthmonth'], array(4, 6, 9, 11))) {
			$days = 30;
		} elseif($space['birthyear'] && (($space['birthyear'] % 400 == 0) || ($space['birthyear'] % 4 == 0 && $space['birthyear'] % 400 != 0))) {
			$days = 29;
		} else {
			$days = 28;
		}
		for ($i=1; $i<=$days; $i++) {
			$selectstr = $i == $space['birthday']?' selected':'';
			$birthdayhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		$html = '<select name="birthyear" id="birthyear" class="ps" onchange="showbirthday();" tabindex="1">'
				.'<option value="">'.lang('space', 'year').'</option>'
				.$birthyeayhtml
				.'</select>'
				.'&nbsp;&nbsp;'
				.'<select name="birthmonth" id="birthmonth" class="ps" onchange="showbirthday();" tabindex="1">'
				.'<option value="">'.lang('space', 'month').'</option>'
				.$birthmonthhtml
				.'</select>'
				.'&nbsp;&nbsp;'
				.'<select name="birthday" id="birthday" class="ps" tabindex="1">'
				.'<option value="">'.lang('space', 'day').'</option>'
				.$birthdayhtml
				.'</select>';

	} elseif($fieldid=='gender') {
		if($field['unchangeable'] && $space[$fieldid] > 0) {//不可修改
			return '<span>'.lang('space', 'gender_'.intval($space[$fieldid])).'</span>';
		}
		$selected = array($space[$fieldid]=>' selected="selected"');
		$html = '<select name="gender" id="gender" class="ps" tabindex="1">';
		if($field['unchangeable']) {
			$html .= '<option value="">'.lang('space', 'gender').'</option>';
		} else {
			$html .= '<option value="0"'.($space[$fieldid]=='0' ? ' selected="selected"' : '').'>'.lang('space', 'gender_0').'</option>';
		}
		$html .= '<option value="1"'.($space[$fieldid]=='1' ? ' selected="selected"' : '').'>'.lang('space', 'gender_1').'</option>'
			.'<option value="2"'.($space[$fieldid]=='2' ? ' selected="selected"' : '').'>'.lang('space', 'gender_2').'</option>'
			.'</select>';

	} elseif($fieldid=='birthcity') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {//不可修改
			return '<span>'.$space['birthprovince'].'-'.$space['birthcity'].'</span>';
		}
		$values = array(0,0,0,0);
		$elems = array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity');
		if(!empty($space['birthprovince'])) { //已经填写过
			$html = profile_show('birthcity', $space);
			$html .= '&nbsp;(<a href="javascript:;" onclick="showdistrict(\'birthdistrictbox\', [\'birthprovince\', \'birthcity\', \'birthdist\', \'birthcommunity\'], 4, \'\', \'birth\'); return false;">'.lang('spacecp', 'profile_edit').'</a>)';
			$html .= '<p id="birthdistrictbox"></p>';
		} else {// 未填写
			$html = '<p id="birthdistrictbox">'.showdistrict($values, $elems, 'birthdistrictbox', 1, 'birth').'</p>';
		}

	} elseif($fieldid=='residecity') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {//不可修改
			return '<span>'.$space['resideprovince'].'-'.$space['residecity'].'</span>';
		}
		$values = array(0,0,0,0);
		$elems = array('resideprovince', 'residecity', 'residedist', 'residecommunity');
		if(!empty($space['resideprovince'])) { //已经填写过
			$html = profile_show('residecity', $space);
			$html .= '&nbsp;(<a href="javascript:;" onclick="showdistrict(\'residedistrictbox\', [\'resideprovince\', \'residecity\', \'residedist\', \'residecommunity\'], 4, \'\', \'reside\'); return false;">'.lang('spacecp', 'profile_edit').'</a>)';
			$html .= '<p id="residedistrictbox"></p>';
		} else {// 未填写
			$html = '<p id="residedistrictbox">'.showdistrict($values, $elems, 'residedistrictbox', 1, 'reside').'</p>';
		}
	} elseif($fieldid=='qq') {
		$html = "<input type=\"text\" name=\"$fieldid\" id=\"$fieldid\" class=\"px\" value=\"$space[$fieldid]\" tabindex=\"1\" /><p><a href=\"\" class=\"xi2\" onclick=\"this.href='http://wp.qq.com/set.html?from=discuz&uin='+$('$fieldid').value\" target=\"_blank\">".lang('spacecp', 'qq_set_status')."</a></p>";
	} else {
		if($field['unchangeable'] && $space[$fieldid]!='') {//不可修改
			if($field['formtype']=='file') {
				$imgurl = getglobal('setting/attachurl').'./profile/'.$space[$fieldid];
				return '<span><a href="'.$imgurl.'" target="_blank"><img src="'.$imgurl.'"  style="max-width: 500px;" /></a></span>';
			} else {
				return '<span>'.nl2br($space[$fieldid]).'</span>';
			}
		}
		if($field['formtype']=='textarea') {
			$html = "<textarea name=\"$fieldid\" id=\"$fieldid\" class=\"pt\" rows=\"3\" cols=\"40\" tabindex=\"1\">$space[$fieldid]</textarea>";
		} elseif($field['formtype']=='select') {
			$field['choices'] = explode("\n", $field['choices']);
			$html = "<select name=\"$fieldid\" id=\"$fieldid\" class=\"ps\" tabindex=\"1\">";
			foreach($field['choices'] as $op) {
				$html .= "<option value=\"$op\"".($op==$space[$fieldid] ? 'selected="selected"' : '').">$op</option>";
			}
			$html .= '</select>';
		} elseif($field['formtype']=='list') {
			$field['choices'] = explode("\n", $field['choices']);
			$html = "<select name=\"{$fieldid}[]\" id=\"$fieldid\" class=\"ps\" multiple=\"multiplue\" tabindex=\"1\">";
			$space[$fieldid] = explode("\n", $space[$fieldid]);
			foreach($field['choices'] as $op) {
				$html .= "<option value=\"$op\"".(in_array($op, $space[$fieldid]) ? 'selected="selected"' : '').">$op</option>";
			}
			$html .= '</select>';
		} elseif($field['formtype']=='checkbox') {
			$field['choices'] = explode("\n", $field['choices']);
			$space[$fieldid] = explode("\n", $space[$fieldid]);
			foreach($field['choices'] as $op) {
				$html .= ''
					."<label class=\"lb\"><input type=\"checkbox\" name=\"{$fieldid}[]\" id=\"$fieldid\" class=\"pc\" value=\"$op\" tabindex=\"1\"".(in_array($op, $space[$fieldid]) ? ' checked="checked"' : '')." />"
					."$op</label>";
			}
		} elseif($field['formtype']=='radio') {
			$field['choices'] = explode("\n", $field['choices']);
			foreach($field['choices'] as $op) {
				$html .= ''
						."<label class=\"lb\"><input type=\"radio\" name=\"{$fieldid}\" class=\"pr\" value=\"$op\" tabindex=\"1\"".($op == $space[$fieldid] ? ' checked="checked"' : '')." />"
						."$op</label>";
			}
		} elseif($field['formtype']=='file') {
			$html = "<input type=\"file\" value=\"\" name=\"$fieldid\" id=\"$fieldid\" tabindex=\"1\" class=\"pf\" style=\"height:26px;\" /><input type=\"hidden\" name=\"$fieldid\" value=\"$space[$fieldid]\" />";
			if(!empty($space[$fieldid])) {
				$url = getglobal('setting/attachurl').'./profile/'.$space[$fieldid];
				$html .= "&nbsp;<label><input type=\"checkbox\" class=\"checkbox\" tabindex=\"1\" name=\"deletefile[$fieldid]\" id=\"$fieldid\" value=\"yes\" />".lang('spacecp', 'delete')."</label><br /><a href=\"$url\" target=\"_blank\"><img src=\"$url\" width=\"200\" class=\"mtm\" /></a>";
			}
		} else {
			$html = "<input type=\"text\" name=\"$fieldid\" id=\"$fieldid\" class=\"px\" value=\"$space[$fieldid]\" tabindex=\"1\" />";
		}
	}
	//提示信息
	$html .= !$ignoreshowerror ? "<div class=\"rq mtn\" id=\"showerror_$fieldid\"></div>" : '';
	if($showstatus) {//状态提示信息
		$html .= "<p class=\"d\">$value[description]";
		if($space[$fieldid]=='' && $value['unchangeable']) {
			$html .= lang('spacecp', 'profile_unchangeable');
		}
		if($verifyvalue !== null) {
			if($field['formtype'] == 'file') {
				$imgurl = getglobal('setting/attachurl').'./profile/'.$verifyvalue;
				$verifyvalue = "<img src='$imgurl' alt='$imgurl' style='max-width: 500px;'/>";
			}
			$html .= "<strong>".lang('spacecp', 'profile_is_verifying')." (<a href=\"#\" onclick=\"display('newvalue_$fieldid');return false;\">".lang('spacecp', 'profile_mypost')."</a>)</strong>"
				."<p id=\"newvalue_$fieldid\" style=\"display:none\">".$verifyvalue."</p>";
		} elseif($field['needverify']) {
			$html .= lang('spacecp', 'profile_need_verifying');
		}
		$html .= '</p>';
	}

	return $html;
}

/**
 * 检查提交的资料项是否合法
 * 需要注意的是：提交的资料项可能包含 birthyrea，resideprovince等，
 * 这些项虽然不在 $_G[cache][profilesetting] 中，但也是合法的
 * @param $field  资料项
 * @param $value  提交值
 * @param $space  用户资料，主要用来检查不可修改项；为空则不检查
 */
function profile_check($fieldid, &$value, $space=array()) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	if(empty($_G['profilevalidate'])) {// 资料默认的正则校验
		include libfile('spacecp/profilevalidate', 'include');
		$_G['profilevalidate'] = $profilevalidate;
	}

	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available']) {// 不存在或者未启用的资料项
		return false;
	}

	// 检查必填
	if($value=='') {// 避免选项中含 '0' 的误判
		if($field['required']) {
			if(in_array($fieldid, array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
				if(substr($fieldid, 0, 5) == 'birth') {
					if(!empty($_GET['birthprovince']) || !empty($_GET['birthcity']) || !empty($_GET['birthdist']) || !empty($_GET['birthcommunity'])) {
						return true;
					}
				} elseif(!empty($_GET['resideprovince']) || !empty($_GET['residecity']) || !empty($_GET['residedist']) || !empty($_GET['residecommunity'])) {
					return true;
				}
			}
			return false;
		} else {//非必填情况为空直接返回 true
			return true;
		}
	}
	//检查不可修改
	if($field['unchangeable'] && !empty($space[$fieldid])) {
		return false;
	}

	include_once libfile('function/home');
	// 特殊
	if(in_array($fieldid, array('birthday', 'birthmonth', 'birthyear', 'gender'))) {
		$value = intval($value);
		return true;
	} elseif(in_array($fieldid, array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
		$value = getstr($value);
		return true;
	}

	if($field['choices']) {//选项
		$field['choices'] = explode("\n", $field['choices']);
	}
	// 其他
	if($field['formtype'] == 'text' || $field['formtype'] == 'textarea') {
		$value = getstr($value);
		if($field['size'] && strlen($value) > $field['size']) {// 超出指定长度
			return false;
		} else {//验证输入
			$field['validate'] = !empty($field['validate']) ? $field['validate'] : ($_G['profilevalidate'][$fieldid] ? $_G['profilevalidate'][$fieldid] : '');
			if($field['validate'] && !preg_match($field['validate'], $value)) {//设置了正则验证
				return false;
			}
		}
	} elseif($field['formtype'] == 'checkbox' || $field['formtype'] == 'list') {
		$arr = array();
		foreach ($value as $op) {
			if(in_array($op, $field['choices'])) {
				$arr[] = $op;
			}
		}
		$value = implode("\n", $arr);
		if($field['size'] && count($arr) > $field['size']) {// 超出指定长度
			return false;
		}
	} elseif($field['formtype'] == 'radio' || $field['formtype'] == 'select') {
		if(!in_array($value, $field['choices'])){ // 非法内容
			return false;
		}
	}
	return true;
}

/**
 * 返回资料项的显示内容
 * @param unknown_type $fieldid
 * @param unknown_type $space
 */
function profile_show($fieldid, $space=array(), $getalone = false) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	if($fieldid == 'qqnumber') {
		$_G['cache']['profilesetting'][$fieldid] = $_G['cache']['profilesetting']['qq'];
	}
	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available'] || (!$getalone && in_array($fieldid, array('uid', 'birthmonth', 'birthyear', 'birthprovince', 'resideprovince')))) {//非法的资料项
		return false;
	}

	if($fieldid=='gender') {
		return lang('space', 'gender_'.intval($space['gender']));
	} elseif($fieldid=='birthday' && !$getalone) {
		$return = $space['birthyear'] ? $space['birthyear'].' '.lang('space', 'year').' ' : '';
		if($space['birthmonth'] && $space['birthday']) {
			$return .= $space['birthmonth'].' '.lang('space', 'month').' '.$space['birthday'].' '.lang('space', 'day');
		}
		return $return;
	} elseif($fieldid=='birthcity' && !$getalone) {
		return $space['birthprovince']
				.(!empty($space['birthcity']) ? ' '.$space['birthcity'] : '')
				.(!empty($space['birthdist']) ? ' '.$space['birthdist'] : '')
				.(!empty($space['birthcommunity']) ? ' '.$space['birthcommunity'] : '');
	} elseif($fieldid=='residecity' && !$getalone) {
		return $space['resideprovince']
				.(!empty($space['residecity']) ? ' '.$space['residecity'] : '')
				.(!empty($space['residedist']) ? ' '.$space['residedist'] : '')
				.(!empty($space['residecommunity']) ? ' '.$space['residecommunity'] : '');
	} elseif($fieldid == 'site') {
		$url = str_replace('"', '\\"', $space[$fieldid]);
		return "<a href=\"$url\" target=\"_blank\">$url</a>";
	} elseif($fieldid == 'position') {
		return nl2br($space['office'] ? $space['office'] : $space['position']);
	} elseif($fieldid == 'qq') {
		return '<a href="http://wpa.qq.com/msgrd?V=3&Uin='.$space[$fieldid].'&Site='.$_G['setting']['bbname'].'&Menu=yes&from=discuz" target="_blank" title="'.lang('spacecp', 'qq_dialog').'"><img src="'.STATICURL.'/image/common/qq.gif" alt="QQ" style="margin:0px;"/></a>';
	} elseif($fieldid == 'qqnumber') {
		return $space['qq'];
	} else {
		return nl2br($space[$fieldid]);
	}
}


/**
 * 显示地区下拉菜单
 * @param <array> $values array(1=>省份id, 2=>城市id, 3=>县城id, 4=>乡镇id)
 * @param <array> $elems array(1=>省份元素name, 2=>城市元素name, 3=>县城元素name, 4=>乡镇元素name)
 * @param <string> $onchange onchange 时触发的函数
 * @param <int> $showlevel 指定显示的层级数；如果不指定则等于values数目
 * @param <string> $container 容器id
 */
function showdistrict($values, $elems=array(), $container='districtbox', $showlevel=null, $containertype = 'birth') {
	$html = '';
	if(!preg_match("/^[A-Za-z0-9_]+$/", $container)) {
		return $html;
	}
	$showlevel = !empty($showlevel) ? intval($showlevel) : count($values);// 显示层级数
	$showlevel = $showlevel <= 4 ? $showlevel : 4;
	$upids = array(0);
	for($i=0;$i<$showlevel;$i++) {
		if(!empty($values[$i])) {
			$upids[] = intval($values[$i]);
		} else {
			for($j=$i; $j<$showlevel; $j++) {
				$values[$j] = '';
			}
			break;
		}
	}
	$options = array(1=>array(), 2=>array(), 3=>array(), 4=>array());
	if($upids && is_array($upids)) {
		foreach(C::t('common_district')->fetch_all_by_upid($upids, 'displayorder', 'ASC') as $value) {
			if($value['level'] == 1 && ($value['id'] != $values[0] && ($value['usetype'] == 0 || !(($containertype == 'birth' && in_array($value['usetype'], array(1, 3))) || ($containertype != 'birth' && in_array($value['usetype'], array(2, 3))))))) {
				continue;
			}
			$options[$value['level']][] = array($value['id'], $value['name']);
		}
	}
	$names = array('province', 'city', 'district', 'community');
	for($i=0; $i<4;$i++) {
		if(!empty($elems[$i])) {
			$elems[$i] = dhtmlspecialchars(preg_replace("/[^\[A-Za-z0-9_\]]/", '', $elems[$i]));
		} else {
			$elems[$i] = ($containertype == 'birth' ? 'birth' : 'reside').$names[$i];
		}
	}

	for($i=0;$i<$showlevel;$i++) {
		$level = $i+1;
		if(!empty($options[$level])) {
			$jscall = "showdistrict('$container', ['$elems[0]', '$elems[1]', '$elems[2]', '$elems[3]'], $showlevel, $level, '$containertype')";
			$html .= '<select name="'.$elems[$i].'" id="'.$elems[$i].'" class="ps" onchange="'.$jscall.'" tabindex="1">';
			$html .= '<option value="">'.lang('spacecp', 'district_level_'.$level).'</option>';
			foreach($options[$level] as $option) {
				$selected = $option[0] == $values[$i] ? ' selected="selected"' : '';
				$html .= '<option did="'.$option[0].'" value="'.$option[1].'"'.$selected.'>'.$option[1].'</option>';
			}
			$html .= '</select>';
			$html .= '&nbsp;&nbsp;';
		}
	}
	return $html;
}

/**
 * 计算启用的个人资料项完成进度
 * 该统计按用户栏目中的启用项做统计的
 */
function countprofileprogress($uid = 0) {
	global $_G;

	$uid = intval(!$uid ? $_G['uid'] : $uid);
	if(($profilegroup = C::t('common_setting')->fetch('profilegroup', true))) {
		$fields = array();
		foreach($profilegroup as $type => $value) {
			foreach($value['field'] as $key => $field) {
				$fields[$key] = $field;
			}
		}
		//用户组不允许使用签名时去掉此项
		if(isset($fields['sightml']) && empty($_G['group']['maxsigsize'])) {
			unset($fields['sightml']);
		}
		//用户组不允许使用自定义头衔时去掉此项
		if(isset($fields['customstatus']) && empty($_G['group']['allowcstatus'])) {
			unset($fields['customstatus']);
		}
		loadcache('profilesetting');
		$allowcstatus = !empty($_G['group']['allowcstatus']) ? true : false;
		$complete = 0;
		$profile = array_merge(C::t('common_member_profile')->fetch($uid), C::t('common_member_field_forum')->fetch($uid));
		foreach($fields as $key) {
			if((!isset($_G['cache']['profilesetting'][$key]) || !$_G['cache']['profilesetting'][$key]['available']) && !in_array($key, array('sightml', 'customstatus'))) {
				unset($fields[$key]);
				continue;
			}
			if(in_array($key, array('birthday', 'birthyear', 'birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
				if($key=='birthday') {
					if(!empty($profile['birthyear']) || !empty($profile[$key])) {
						$complete++;
					}
					unset($fields['birthyear']);
				} elseif($key=='birthcity') {
					if(!empty($profile['birthprovince']) || !empty($profile[$key]) || !empty($profile['birthdist']) || !empty($profile['birthcommunity'])) {
						$complete++;
					}
					unset($fields['birthprovince']);
					unset($fields['birthdist']);
					unset($fields['birthcommunity']);
				} elseif($key=='residecity') {
					if(!empty($profile['resideprovince']) || !empty($profile[$key]) || !empty($profile['residedist']) || !empty($profile['residecommunity'])) {
						$complete++;
					}
					unset($fields['resideprovince']);
					unset($fields['residedist']);
					unset($fields['residecommunity']);
				}
			} else if($profile[$key] != '') { //避免选项中含 '0' 的误判
				$complete++;
			}
		}
		$progress = floor($complete / count($fields) * 100);
		C::t('common_member_status')->update($uid, array('profileprogress' => $progress > 100 ? 100 : $progress), 'UNBUFFERED');
		return $progress;
	}
}

// 获取星座
function get_constellation($birthmonth,$birthday) {
	$birthmonth = intval($birthmonth);
	$birthday = intval($birthday);
	$idx = $birthmonth;
	if ($birthday <= 22) {
		if (1 == $birthmonth) {
			$idx = 12;
		} else {
			$idx = $birthmonth - 1;
		}
	}
	return $idx > 0 && $idx <= 12 ? lang('space', 'constellation_'.$idx) : '';
}

// 获取生肖
function get_zodiac($birthyear) {
	$birthyear = intval($birthyear);
	$idx = (($birthyear - 1900) % 12) + 1;
	return $idx > 0 && $idx <= 12 ? lang('space', 'zodiac_'. $idx) : '';
}
?>