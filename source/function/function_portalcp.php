<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_portalcp.php 33715 2013-08-07 01:59:25Z andyzheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function get_uploadcontent($attach, $type='portal', $dotype='') {

	$return = '';
	$dotype = $dotype ? 'checked' : '';
	if($attach['isimage']) {
		$pic = pic_get($attach['attachment'], $type, $attach['thumb'], $attach['remote'], 0);
		$small_pic = $attach['thumb'] ? getimgthumbname($pic) : '';
		$check = $attach['pic'] == $type.'/'.$attach['attachment'] ? 'checked' : $dotype;
		$aid = $check ? $attach['aid'] : '';

		$return .= '<a href="javascript:;" class="opattach"><span class="opattach_ctrl">';
		$return .= '<span onclick="insertImage(\''.$pic.'\');" class="cur1">'.lang('portalcp', 'insert_large_image').'</span>';
		$return .= '<span class="pipe">|</span>';
		if($small_pic) $return .= '<span onclick="insertImage(\''.$small_pic.'\', \''.$pic.'\');" class="cur1">'.lang('portalcp', 'small_image').'</span>';
		$return .= '</span><img src="'.($small_pic ? $small_pic : $pic).'" onclick="insertImage(\''.$pic.'\');" class="cur1"></a>';
		$return .= '<label for="setconver'.$attach['attachid'].'" class="cur1 xi2"><input type="radio" name="setconver" id="setconver'.$attach['attachid'].'" class="pr" value="1" onclick="setConver(\''.addslashes(serialize(array('pic'=>$type.'/'.$attach['attachment'], 'thumb'=>$attach['thumb'], 'remote'=>$attach['remote']))).'\') '.$check.'>'.lang('portalcp', 'set_to_conver').'</label>';
		$return .= '<span class="pipe">|</span>';
		if($type == 'portal') $return .= '<span class="cur1 xi2" onclick="deleteAttach(\''.$attach['attachid'].'\', \'portal.php?mod=attachment&id='.$attach['attachid'].'&aid='.$aid.'&op=delete\');">'.lang('portalcp', 'delete').'</span>';

	} else {
		$attach_url = $type == 'forum' ? 'forum.php?mod=attachment&aid='.aidencode($attach['attachid'], 1) : 'portal.php?mod=attachment&id='.$attach['attachid'];
		$return .= '<table id="attach_list_'.$attach['attachid'].'" width="100%" class="xi2">';
		$return .= '<td width="50" class="bbs"><a href="'.$attach_url.'" target="_blank">'.$attach['filename'].'</a></td>';
		$return .= '<td align="right" class="bbs">';
		$return .= '<a href="javascript:void(0);" onclick="insertFile(\''.$attach['filename'].'\', \''.$attach_url.'\');return false;">'.lang('portalcp', 'insert_file').'</a><br>';
		if($type == 'portal') $return .= '<a href="javascript:void(0);" onclick="deleteAttach(\''.$attach['attachid'].'\', \'portal.php?mod=attachment&id='.$attach['attachid'].'&op=delete\');return false;">'.lang('portalcp', 'delete').'</a>';
		$return .= '</td>';
		$return .= '</table>';
	}
	return $return;

}

function get_upload_content($attachs, $dotype='') {
	$html = '';
	$dotype = $dotype ? 'checked' : '';
	$i = 0;
	foreach($attachs as $key => $attach) {
		$type = $attach['from'] == 'forum' ? 'forum' : 'portal';
		$html .= '<td id="attach_list_'.$attach['attachid'].'">';
		if($attach['isimage']) {
			$pic = pic_get($attach['attachment'], $type, $attach['thumb'], $attach['remote'], 0);
			$small_pic = $attach['thumb'] ? getimgthumbname($pic) : '';
			$check = $attach['pic'] == $type.'/'.$attach['attachment'] ? 'checked' : $dotype;
			$aid = $check ? $attach['aid'] : '';

			$html .= '<a href="javascript:;" class="opattach">';
			$html .= '<span class="opattach_ctrl">';
			$html .= '<span onclick="insertImage(\''.$pic.'\');" class="cur1">'.lang('portalcp', 'insert_large_image').'</span><span class="pipe">|</span>';
			if($small_pic) $html .= '<span onclick="insertImage(\''.$small_pic.'\', \''.$pic.'\');" class="cur1">'.lang('portalcp', 'small_image').'</span>';
			$html .= '</span><img src="'.($small_pic ? $small_pic : $pic).'" onclick="insertImage(\''.$pic.'\');" class="cur1" /></a>';
			$html .= '<label for="setconver'.$attach['attachid'].'" class="cur1 xi2"><input type="radio" name="setconver" id="setconver'.$attach['attachid'].'" class="pr" value="1" onclick=setConver(\''.addslashes(serialize(array('pic'=>$type.'/'.$attach['attachment'], 'thumb'=>$attach['thumb'], 'remote'=>$attach['remote']))).'\') '.$check.'>'.lang('portalcp', 'set_to_conver').'</label>';
			if($type == 'portal') {
				$html .= '<span class="pipe">|</span><span class="cur1 xi2" onclick="deleteAttach(\''.$attach['attachid'].'\', \'portal.php?mod=attachment&id='.$attach['attachid'].'&aid='.$aid.'&op=delete\');">'.lang('portalcp', 'delete').'</span>';
			}
		} else {
			$html .= '<img src="static/image/editor/editor_file_thumb.png" class="cur1" onclick="insertFile(\''.$attach['filename'].'\', \'portal.php?mod=attachment&id='.$attach['attachid'].'\');" tip="'.$attach['filename'].'" onmouseover="showTip(this);" /><br/>';
			$html .= '<span onclick="deleteAttach(\''.$attach['attachid'].'\', \'portal.php?mod=attachment&id='.$attach['attachid'].'&op=delete\');" class="cur1 xi2">'.lang('portalcp', 'delete').'</span>';
		}
		$html .= '</td>';
		$i++;

		if($i % 4 == 0 && isset($attachs[$i])) {
			$html .= '</tr><tr>';
		}
	}
	if(!empty($html)) {
		if(($imgpad = $i % 4) > 0) {
			$html .= str_repeat('<td width="25%"></td>', 4 - $imgpad);
		}

		$html = '<table class="imgl"><tr>'.$html.'</tr></table>';
	}
	return $html;
}

/**根据UID得到可管理或发布文章的所有分类
 * @param <type> $uid
 */
function getallowcategory($uid){
	global $_G;
	$permission = array();
	if (empty($uid)) return $permission;
	if(getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3)) {
		$uid = max(0,intval($uid));
		foreach(C::t('portal_category_permission')->fetch_all_by_uid($uid) as $catid=>$value) {
			if ($value['allowpublish'] || $value['allowmanage']) {
				$permission[$catid] = $value;
			}
		}
	}
	return $permission;
}

//得到栏目权限树
function getpermissioncategory($category, $permission = array()) {

	//整理有权限的树
	$cats = array();
	foreach ($permission as $k=>$v) {
		$cur = $category[$v];

		if ($cur['level'] != 0) {
			while ($cur['level']) {
				$cats[$cur['upid']]['permissionchildren'][$cur['catid']] = $cur['catid'];
				$cur = $category[$cur['upid']];
			}
		} elseif(empty($cats[$v])) {
			$cats[$v] = array();
		}
	}

	return $cats;
}

/**根据UID得到可管理或推荐的所有页面
 * @param <type> $uid
 */
function getallowdiytemplate($uid){
	if (empty($uid)) return false;
	$permission = array();
	$uid = max(0,intval($uid));
	$permission = C::t('common_template_permission')->fetch_all_by_uid($uid);
	return $permission;
}

/**
 * 获取原模板文件的目录，主要是分区和版块在指定不同模板的时候不同
 * @param string $targettplname 生成的模板名称
 * @return string 原模板文件的目录
 */
function getdiytpldir($targettplname) {
	global $_G;
	$tpldir = $pre = '';
	if (substr($targettplname, 0, 13) === ($pre = 'forum/discuz_')) {
	} elseif (substr($targettplname, 0, 19) === ($pre = 'forum/forumdisplay_')) {
	}
	if($pre) {
		$forum = C::t('forum_forum')->fetch(intval(str_replace($pre, '', $targettplname)));
		if(!empty($forum['styleid'])) {
			$_cname = 'style_'.$forum['styleid'];
			loadcache($_cname);
			$tpldir = empty($_G['cache'][$_cname]['tpldir']) ? '' : $_G['cache'][$_cname]['tpldir'];
		}
	}
	return $tpldir ? $tpldir : ($_G['cache']['style_default']['tpldir'] ? $_G['cache']['style_default']['tpldir'] : './template/default');
}

/**
 * 保存DIY的数据到模板文件
 * @param string $tpldirectory 原始模板目录
 * @param string $primaltplname 原始的模板名称
 * @param string $targettplname 要生成的模板名称
 * @param array $data diy的所有数据
 * @param bool $database 是否保存到数据库
 * @param string $optype 暂存标识
 * @return bool
 */
function save_diy_data($tpldirectory, $primaltplname, $targettplname, $data, $database = false, $optype = '') {
	global $_G;
	if (empty($data) || !is_array($data)) return false;
	checksecurity($data['spacecss']);//检查CSS中是否有特殊字符
	if(empty($tpldirectory)) {
		$tpldirectory = getdiytpldir($targettplname);
	}
	$isextphp = false;
	$file = $tpldirectory.'/'.$primaltplname.'.htm';
	if (!file_exists($file)) {
		$file = $tpldirectory.'/'.$primaltplname.'.php';
		if (!file_exists($file)) {
			$file = './template/default/'.$primaltplname.'.htm';
		} else {
			$isextphp = true;
		}
	}
	if(!file_exists($file)) return false;
	//得到模板文件的内容并进行数据替换
	$content = file_get_contents(DISCUZ_ROOT.$file);
	if($isextphp) {
		$content = substr($content, strpos($content, "\n"));
	}
	//替换模板名称
	$content = preg_replace("/\<\!\-\-\[name\].+?\[\/name\]\-\-\>\s+/is", '', $content);
	//替换帮助信息
	$content = preg_replace("/\<script src\=\"misc\.php\?mod\=diyhelp\&action\=get.+?\>\<\/script\>/", '', $content);
	//替换布局
	foreach ($data['layoutdata'] as $key => $value) {
		$key = trimdxtpllang($key);
		$html = '';
		$html .= '<div id="'.$key.'" class="area">';
		$html .= getframehtml($value);
		$html .= '</div>';
		$content = preg_replace("/(\<\!\-\-\[diy\=$key\]\-\-\>).+?(\<\!\-\-\[\/diy\]\-\-\>)/is", "\\1".$html."\\2", $content);
	}
	//替换样式
	$data['spacecss'] = str_replace('.content', '.dxb_bc', $data['spacecss']);
	$data['spacecss'] = trimdxtpllang($data['spacecss']);
	$content = preg_replace("/(\<style id\=\"diy_style\" type\=\"text\/css\"\>).*?(\<\/style\>)/is", "\\1".$data['spacecss']."\\2", $content);
	//替换风格
	if (!empty($data['style'])) {
		$content = preg_replace("/(\<link id\=\"style_css\" rel\=\"stylesheet\" type\=\"text\/css\" href\=\").+?(\"\>)/is", "\\1".$data['style']."\\2", $content);
	}

	//暂存标识
	$flag = $optype == 'savecache' ? true : false;
	if($flag) {
		$targettplname = $targettplname.'_diy_preview';//暂存时改变模块名
	} else {
		@unlink('./data/diy/'.$tpldirectory.'/'.$targettplname.'_diy_preview.htm');//非预览时删除临时文件
	}

	//保存文件
	$tplfile =DISCUZ_ROOT.'./data/diy/'.$tpldirectory.'/'.$targettplname.'.htm';
	$tplpath = dirname($tplfile);
	if (!is_dir($tplpath)) {
		dmkdir($tplpath); //创建不存在的目录
	} else {
		if (file_exists($tplfile) && !$flag) copy($tplfile, $tplfile.'.bak');//保存备份(预览和暂存时不备份)
	}
	//保存DIY的内容到文件中
	$r = file_put_contents($tplfile, $content);
	//暂存时不入库
	if ($r && $database && !$flag) {
		$diytplname = getdiytplname($targettplname, $tpldirectory);
		C::t('common_diy_data')->insert(array(
			'targettplname' => $targettplname,
			'tpldirectory' => $tpldirectory,
			'primaltplname' => $primaltplname,
			'diycontent' => serialize($data),
			'name' => $diytplname,
			'uid' => $_G['uid'],
			'username' => $_G['username'],
			'dateline' => TIMESTAMP,
		), false, true);
	}
	return $r;
}


/**
 * 查找指定模板的页面名称
 * @param array $tpls 模板名
 * @return array 页面名称数组
 */
function getdiytplnames($tpls) {
	$arr = $ret = array();
	foreach((array)$tpls as $targettplname) {
		$id = $pre = '';
		if (substr($targettplname, 0, 12) === ($pre = 'portal/list_')) {
		} elseif (substr($targettplname, 0, 12) === ($pre = 'portal/view_')) {
		} elseif (substr($targettplname, 0, 13) === ($pre = 'forum/discuz_')) {
		} elseif (substr($targettplname, 0, 17) === ($pre = 'forum/viewthread_')) {
		} elseif (substr($targettplname, 0, 19) === ($pre = 'forum/forumdisplay_')) {
		} elseif (substr($targettplname, 0, 28) === ($pre = 'portal/portal_topic_content_')) {
		}
		if($pre && ($id = dintval(str_replace($pre, '', $targettplname)))) {
			$arr[$pre][$id] = $id;
		}
	}
	foreach($arr as $pre => $ids) {
		if ($pre === 'portal/list_') {
			foreach(C::t('portal_category')->fetch_all($ids) as $id => $value) {
				$ret[$pre][$id] = $value['catname'];
			}
		} elseif ($pre === 'portal/view_') {
			$portal_view_name = lang('portalcp', 'portal_view_name');
			foreach(C::t('portal_category')->fetch_all($ids) as $id => $value) {
				$ret[$pre][$id] = $value['catname'].$portal_view_name;
			}
		} elseif ($pre === 'forum/forumdisplay_' || $pre === 'forum/discuz_') {
			foreach(C::t('forum_forum')->fetch_all($ids) as $id => $value) {
				$ret[$pre][$id] = $value['name'];
			}
		} elseif ($pre === 'forum/viewthread_') {
			$forum_viewthread_name = lang('portalcp', 'forum_viewthread_name');
			foreach(C::t('forum_forum')->fetch_all($ids) as $id => $value) {
				$ret[$pre][$id] = $value['name'].$forum_viewthread_name;
			}
		} elseif ($pre === 'portal/portal_topic_content_') {
			foreach(C::t('portal_topic')->fetch_all($ids) as $id => $value) {
				$ret[$pre][$id] = $value['title'];
			}
		}
	}
	return $ret;
}

//得到DIY页面的名称
function getdiytplname($targettplname, $tpldirectory) {
	$diydata = C::t('common_diy_data')->fetch($targettplname, $tpldirectory);
	$diytplname = $diydata ? $diydata['name'] : '';
	if(empty($diytplname) && ($data = getdiytplnames(array($targettplname)))) {
		$diytplname = array_shift(array_shift($data));
	}
	return $diytplname;
}
//得到框架的HTML
function getframehtml($data = array()) {
	global $_G;
	$html = $style = '';
	foreach ((array)$data as $id => $content) {
		$id = trimdxtpllang($id);
		$flag = $name = '';
		list($flag, $name) = explode('`', $id);
		//处理frame
		if ($flag == 'frame') {
			$fattr = $content['attr'];
			$fattr['name'] = trimdxtpllang($fattr['name']);
			$fattr['className'] = trimdxtpllang($fattr['className']);
			$moveable = $fattr['moveable'] == 'true' ? ' move-span' : '';
			$html .= '<div id="'.$fattr['name'].'" class="'.$fattr['className'].'">';
			//处理标题
			if (checkhastitle($fattr['titles'])) {
				$style = gettitlestyle($fattr['titles']);
				$cn = trimdxtpllang(implode(' ',$fattr['titles']['className']));
				$html .= '<div class="'.$cn.'"'.$style.'>'.gettitlehtml($fattr['titles'], 'frame').'</div>';
			}
			foreach ((array)$content as $colid => $coldata) {
				list($colflag, $colname) = explode('`', $colid);
				$colname = trimdxtpllang($colname);
				$cn = trimdxtpllang($coldata['attr']['className']);
				//单列处理
				if ($colflag == 'column') {
					$html .= '<div id="'.$colname.'" class="'.$cn.'">';
					$html .= '<div id="'.$colname.'_temp" class="move-span temp"></div>';
					$html .= getframehtml($coldata);
					$html .= '</div>';
				}
			}
			$html .= '</div>';
		//处理Tab
		} elseif ($flag == 'tab') {
			$fattr = $content['attr'];
			$fattr['name'] = trimdxtpllang($fattr['name']);
			$fattr['className'] = trimdxtpllang($fattr['className']);
			$moveable = $fattr['moveable'] == 'true' ? ' move-span' : '';
			$html .= '<div id="'.$fattr['name'].'" class="'.$fattr['className'].'">';
			$switchtype = 'click';
			foreach ((array)$content as $colid => $coldata) {
				list($colflag, $colname) = explode('`', $colid);
				$colname = trimdxtpllang($colname);
				$cn = trimdxtpllang($coldata['attr']['className']);
				//单列处理
				if ($colflag == 'column') {
					//处理标题, tab 的标题为第一列,所以标题文字在第一列里
					if (checkhastitle($fattr['titles'])) {
						$style = gettitlestyle($fattr['titles']);
						$title = gettitlehtml($fattr['titles'], 'tab');
					}
					$switchtype = is_array($fattr['titles']['switchType']) && !empty($fattr['titles']['switchType'][0]) ? $fattr['titles']['switchType'][0] : 'click';
					$switchtype = in_array(strtolower($switchtype), array('click', 'mouseover')) ? $switchtype : 'click';
					$html .= '<div id="'.$colname.'" class="'.$cn.'"'.$style.' switchtype="'.$switchtype.'">'.$title;
					$html .= getframehtml($coldata);
					$html .= '</div>';
				}
			}
			$html .= '<div id="'.$fattr['name'].'_content" class="tb-c"></div>';
			$html .= '<script type="text/javascript">initTab("'.$fattr['name'].'","'.$switchtype.'");</script>';
			$html .= '</div>';
		//处理block
		} elseif ($flag == 'block') {
			//模块的属性值
			$battr = $content['attr'];
			$bid = intval(str_replace('portal_block_', '', $battr['name']));
			if (!empty($bid)) {
				$html .= "<!--{block/{$bid}}-->";
				$_G['curtplbid'][$bid] = $bid;
			}
		}
	}

	return $html;
}
function gettitlestyle($title) {
	$style = '';
	if (is_array($title['style']) && count($title['style'])) {
		foreach ($title['style'] as $k=>$v){
			$style .= trimdxtpllang($k).':'.trimdxtpllang($v).';';
		}
	}
	$style = $style ? ' style=\''.$style.'\'' : '';
	return $style;
}
//检查是否有标题
function checkhastitle($title) {
	if (!is_array($title)) return false;
	foreach ($title as $k => $v) {
		if (strval($k) == 'className') continue;
		if (!empty($v['text'])) return true;
	}
	return false;
}

//处理多标题信息,返回标题的html代码
function gettitlehtml($title, $type) {
	global $_G;
	if (!is_array($title)) return '';
	$html = $one = $style = $color =  '';
	foreach ($title as $k => $v) {
		if (in_array(strval($k),array('className','style'))) continue;
		if (empty($v['src']) && empty($v['text'])) continue;
		$v['className'] = trimdxtpllang($v['className']);
		$v['font-size'] = intval($v['font-size']);
		$v['margin'] = intval($v['margin']);
		$v['float'] = trimdxtpllang($v['float']);
		$v['color'] = trimdxtpllang($v['color']);
		$v['src'] = trimdxtpllang($v['src']);
		$v['href'] = trimdxtpllang($v['href']);
		$v['text'] = dhtmlspecialchars(str_replace(array('{', '$'), array('{ ', '$ '), $v['text']));
		//k == first 的为主标题
		$one = "<span class=\"{$v['className']}\"";
		$style = $color = "";
		$style .= empty($v['font-size']) ? '' : "font-size:{$v['font-size']}px;";
		$style .= empty($v['float']) ? '' : "float:{$v['float']};";
		$margin_ = empty($v['float']) ? 'left' : $v['float'];
		$style .= empty($v['margin']) ? '' : "margin-{$margin_}:{$v['margin']}px;";
		$color = empty($v['color']) ? '' : "color:{$v['color']};";
		$img = !empty($v['src']) ? '<img src="'.$v['src'].'" class="vm" alt="'.$v['text'].'"/>' : '';
		if (empty($v['href'])) {
			$style = empty($style)&&empty($color) ? '' : ' style="'.$style.$color.'"';
			$one .= $style.">$img{$v['text']}";
		} else {
			$style = empty($style) ? '' : ' style="'.$style.'"';
			$colorstyle = empty($color) ? '' : ' style="'.$color.'"';
			$one .= $style.'><a href="'.$v['href'].'" target="_blank"'.$colorstyle.'>'.$img.$v['text'].'</a>';
		}
		$one .= '</span>';

		//去除绝对路径
		$siteurl = str_replace(array('/','.'),array('\/','\.'),$_G['siteurl']);
		$one = preg_replace('/\"'.$siteurl.'(.*?)\"/','"$1"',$one);

		//主标题放在第一位
		$html = $k === 'first' ? $one.$html : $html.$one;
	}
	return $html;
}

//得到皮肤
function gettheme($type) {
	$themes = array();
	//获取本地风格目录
	$themedirs = dreaddir(DISCUZ_ROOT."/static/$type");
	//在些做缓存，如果dirs的个数与缓存个数不相等则更新 // 暂无实现
	foreach ($themedirs as $key => $dirname) {
		//样式文件和图片需存在
		$now_dir = DISCUZ_ROOT."/static/$type/$dirname";
		if(file_exists($now_dir.'/style.css') && file_exists($now_dir.'/preview.jpg')) {
			$themes[] = array(
				'dir' => $type.'/'.$dirname,
				'name' => getcssname($type.'/'.$dirname)
			);
		}
	}
	return $themes;
}

//获取系统风格名
function getcssname($dirname) {
	$css = @file_get_contents(DISCUZ_ROOT.'./static/'.$dirname.'/style.css');
	if($css) {
		preg_match("/\[name\](.+?)\[\/name\]/i", trim($css), $mathes);
		if(!empty($mathes[1])) $name = dhtmlspecialchars($mathes[1]);
	} else {
		$name = 'No name';
	}
	return $name;
}

function checksecurity($str) {

	//执行一系列的过滤验证是否合法的CSS
	$filter = array(
		'/\/\*[\n\r]*(.+?)[\n\r]*\*\//is',
		'/[^a-z0-9\\\]+/i',
		'/important/i',
	);
	if(preg_match("/[^a-z0-9:;'\(\)!\.#\-_\s\{\}\/\,\"\?\>\=\?\%]+/i", $str)) {
		showmessage('css_contains_elements_of_insecurity');
	}
	$str = preg_replace($filter, '', $str);
	if(preg_match("/(expression|import|javascript)/i", $str)) {
		showmessage('css_contains_elements_of_insecurity');
	}
	return true;
}

/**
 * 将 block 属性和样式导出
 * @param <type> $bids
 */
function block_export($bids) {
	$return = array('block'=>array(), 'style'=>array());
	if(empty($bids)) {
		return;
	}
	$styleids = array();
	foreach(C::t('common_block')->fetch_all($bids) as $value) {
		//反序列化参数数据
		$value['param'] = dunserialize($value['param']);
		//反序列化模板数据
		if(!empty($value['blockstyle'])) $value['blockstyle'] = dunserialize($value['blockstyle']);

		$return['block'][$value['bid']] = $value;
		if(!empty($value['styleid'])) $styleids[] = intval($value['styleid']);
	}
	if($styleids) {
		$styleids = array_unique($styleids);
		foreach(C::t('common_block_style')->fetch_all($styleids) as $value) {
			$value['template'] = dunserialize($value['template']);
			if(!empty($value['fields'])) $value['fields'] = dunserialize($value['fields']);
			$return['style'][$value['styleid']] = $value;
		}
	}
	return $return ;
}

/**
 * 将由block_export 导出的数据导入
 * @param <type> $data
 */
function block_import($data) {
	global $_G;
	if(!is_array($data['block'])) {
		return ;
	}
	$stylemapping = array();
	if($data['style']) {//导入style并得到对应关系
		$hashes = $styles = array();
		foreach($data['style'] as $value) {
			$hashes[] = $value['hash'];
			$styles[$value['hash']] = $value['styleid'];
		}
		// 查找库中已有的样式，并得到映射关系
		if(!empty($hashes)) {
			foreach(C::t('common_block_style')->fetch_all_by_hash($hashes) as $value) {
				$id = $styles[$value['hash']];
				$stylemapping[$id] = intval($value['styleid']);
				unset($styles[$value['hash']]);
			}
		}
		// 新的样式，添加到库中
		foreach($styles as $id) {
			$style = $data['style'][$id];
			$style['styleid'] = '';
			if(is_array($style['template'])) {
				$style['template'] = serialize($style['template']);
			}
			if(is_array($style['fields'])) {
				$style['fields'] = serialize($style['fields']);
			}
			$newid = C::t('common_block_style')->insert($style, true);
			$stylemapping[$id] = $newid;
		}
	}

	// 插入block并得到映射关系
	$blockmapping = array();
	foreach($data['block'] as $block) {
		$oid = $block['bid'];
		if(!empty($block['styleid'])) {
			$block['styleid'] = intval($stylemapping[$block['styleid']]);
		}
		$block['bid'] = '';
		$block['uid'] = $_G['uid'];
		$block['username'] = $_G['username'];
		$block['dateline'] = 0;
		$block['notinherited'] = 0;
		if(is_array($block['param'])) {
			$block['param'] = serialize($block['param']);
		}
		if(is_array($block['blockstyle'])) {
			$block['blockstyle'] = serialize($block['blockstyle']);
		}
		$newid = C::t('common_block')->insert($block, true);
		$blockmapping[$oid] = $newid;
	}
	include_once libfile('function/cache');
	updatecache('blockclass');
	return $blockmapping;
}

//note 根据名称得到模块或框架
function getobjbyname($name, $data) {
	if (!$name || !$data) return false;

	foreach ((array)$data as $id => $content) {
		list($type, $curname) = explode('`', $id);
		if ($curname == $name) {
			return array('type'=>$type,'content'=>$content);
		} elseif ($type == 'frame' || $type == 'tab' || $type == 'column') {
			$r = getobjbyname($name, $content);
			if ($r) return $r;
		}
	}
	return false;
}

//得到所有框架名和模块ID
function getframeblock($data) {
	global $_G;

	if (!isset($_G['curtplbid'])) $_G['curtplbid'] = array();
	if (!isset($_G['curtplframe'])) $_G['curtplframe'] = array();

	foreach ((array)$data as $id => $content) {
		list($flag, $name) = explode('`', $id);
		//处理frame
		if ($flag == 'frame' || $flag == 'tab') {
			foreach ((array)$content as $colid => $coldata) {
				list($colflag, $colname) = explode('`', $colid);
				//单列处理
				if ($colflag == 'column') {
					getframeblock($coldata,$framename);
				}
			}
			$_G['curtplframe'][$name] = array('type'=>$flag,'name'=>$name);
		//处理Block
		} elseif ($flag == 'block') {
			//模块的属性值
			$battr = $content['attr'];
			$bid = intval(str_replace('portal_block_', '', $battr['name']));
			if (!empty($bid)) {
				$_G['curtplbid'][$bid] = $bid;
			}
		}
	}
}

//解析框架和模块对应的CSS
function getcssdata($css) {
	global $_G;
	if (empty($css)) return '';
	$reglist = array();
	foreach ((array)$_G['curtplframe'] as $value) {
		$reglist[] = '#'.$value['name'].'.*?\{.*?\}';
	}
	foreach ((array)$_G['curtplbid'] as $value) {
		$reglist[] = '#portal_block_'.$value.'.*?\{.*?\}';
	}
	$reg = implode('|',$reglist);
	preg_match_all('/'.$reg.'/',$css,$csslist);
	return implode('', $csslist[0]);
}

//导入DIY文件
function import_diy($file) {
	global $_G;

	$css = '';
	$html = array();
	$arr = array();

	$content = file_get_contents($file);
	require_once libfile('class/xml');
	if (empty($content)) return $arr;
	$content = preg_replace("/\<\!\-\-\[name\](.+?)\[\/name\]\-\-\>\s+/i", '', $content);
	$diycontent = xml2array($content);

	if ($diycontent) {

		//得到原frameID和新frameID
		foreach ($diycontent['layoutdata'] as $key => $value) {
			if (!empty($value)) getframeblock($value);
		}
		$newframe = array();
		foreach ($_G['curtplframe'] as $value) {
			$newframe[] = $value['type'].random(6);
		}

		//导入block数据
		$mapping = array();
		if (!empty($diycontent['blockdata'])) {
			$mapping = block_import($diycontent['blockdata']);
			unset($diycontent['blockdata']);
		}

		//得到原blockID和新blockID
		$oldbids = $newbids = array();
		if (!empty($mapping)) {
			foreach($mapping as $obid=>$nbid) {
				$oldbids[] = '#portal_block_'.$obid.' ';
				$newbids[] = '#portal_block_'.$nbid.' ';
				$oldbids[] = '[portal_block_'.$obid.']';
				$newbids[] = '[portal_block_'.$nbid.']';
				$oldbids[] = '~portal_block_'.$obid.'"';
				$newbids[] = '~portal_block_'.$nbid.'"';
			}
		}

		//替换框架名和模块样式名
		require_once libfile('class/xml');
		$xml = array2xml($diycontent['layoutdata'],true);
		$xml = str_replace($oldbids, $newbids, $xml);
		$xml = str_replace((array)array_keys($_G['curtplframe']), $newframe, $xml);
		$diycontent['layoutdata'] = xml2array($xml);

		//替换css样式名
		$css = str_replace($oldbids, $newbids, $diycontent['spacecss']);
		$css = str_replace((array)array_keys($_G['curtplframe']), $newframe, $css);
		//生成HTML代码
		foreach ($diycontent['layoutdata'] as $key => $value) {
			$html[$key] = getframehtml($value);
		}
	}
	if (!empty($html)) {
		$xml = array2xml($html, true);
		require_once libfile('function/block');
		//生成block内容
		block_get_batch(implode(',', $mapping));
		foreach ($mapping as $bid) {
			$blocktag[] = '<!--{block/'.$bid.'}-->';
			$blockcontent[] = block_fetch_content($bid);
		}
		$xml = str_replace($blocktag,$blockcontent,$xml);
		$html = xml2array($xml);
		$arr = array('html'=>$html,'css'=>$css,'mapping'=>$mapping);
	}
	return $arr;
}

/**
 * 检查DIY模板是否有效
 * @param string $template 带目录的模板名
 * @return <bool>
 */
function checkprimaltpl($template) {
	global $_G;
	$tpldirectory = '';
	if(strpos($template, ':') !== false) {
		list($tpldirectory, $template) = explode(':', $template);
	}
	//过滤文件名
	if(!$template || preg_match("/(\.)(exe|jsp|asp|aspx|cgi|fcgi|pl)(\.|$)/i", $template)) {
		return 'diy_template_filename_invalid';
	}
	if(strpos($tpldirectory, '..') !== false || strpos($tpldirectory, "\0") !== false) {
		return 'diy_tpldirectory_invalid';
	}
	$primaltplname = (!$tpldirectory ? DISCUZ_ROOT.$_G['cache']['style_default']['tpldir'] : $tpldirectory).'/'.$template.'.htm';
	if (!file_exists($primaltplname)) {
		$primaltplname = DISCUZ_ROOT.'./template/default/'.$template.'.htm';
	}
	//只能是.htm
	$pathinfos = pathinfo($primaltplname);
	if(strtolower($pathinfos['extension']) != 'htm') {
		return 'diy_template_extension_invalid';
	}
	//模板是否存在
	if (!is_file($primaltplname)) {
		return 'diy_template_noexist';
	}
	return true;
}

/**
 * 获取文章内置8个标签的显示名称
 * @global <type> $_G
 * @return <type>
 */
function article_tagnames() {
	global $_G;
	if(!isset($_G['article_tagnames'])) {
		$_G['article_tagnames'] = array();
		for($i=1; $i<=8; $i++) {
			if(isset($_G['setting']['article_tags']) && isset($_G['setting']['article_tags'][$i])) {
				$_G['article_tagnames'][$i] = $_G['setting']['article_tags'][$i];
			} else {
				$_G['article_tagnames'][$i] = lang('portalcp', 'article_tag').$i;
			}
		}
	}
	return $_G['article_tagnames'];
}

/**
 * 把 文章 tag 解析为对应的8个标签的值
 * @param <type> $tag
 * @return <type>
 */
function article_parse_tags($tag) {
	$tag = intval($tag);
	$article_tags = array();
	for($i=1; $i<=8; $i++) {
		$k = pow(2, $i-1);
		$article_tags[$i] = ($tag & $k) ? 1 : 0;
	}
	return $article_tags;
}

/**
 * 把标签位拼成 tag 数值
 * @param <type> $tags
 * @return <type>
 */
function article_make_tag($tags) {
	$tags = (array)$tags;
	$tag = 0;
	for($i=1; $i<=8; $i++) {
		if(!empty($tags[$i])) {
			$tag += pow(2, $i-1);
		}
	}
	return $tag;
}

/**
 * 显示文章/日志/相册分类下拉选择框
 * @param <type> $type
 * @param <type> $name
 * @param <type> $shownull
 * @param <type> $current
 */
function category_showselect($type, $name='catid', $shownull=true, $current='') {
	global $_G;
	if(! in_array($type, array('portal', 'blog', 'album'))) {
		return '';
	}
	loadcache($type.'category');
	$category = $_G['cache'][$type.'category'];

	$select = "<select id=\"$name\" name=\"$name\" class=\"ps vm\">";
	if($shownull) {
		$select .= '<option value="">'.lang('portalcp', 'select_category').'</option>';
	}
	foreach ($category as $value) {
		if($value['level'] == 0) {
			$selected = ($current && $current==$value['catid']) ? 'selected="selected"' : '';
			$select .= "<option value=\"$value[catid]\"$selected>$value[catname]</option>";
			if(!$value['children']) {
				continue;
			}
			foreach ($value['children'] as $catid) {
				$selected = ($current && $current==$catid) ? 'selected="selected"' : '';
				$select .= "<option value=\"{$category[$catid][catid]}\"$selected>-- {$category[$catid][catname]}</option>";
				if($category[$catid]['children']) {
					foreach ($category[$catid]['children'] as $catid2) {
						$selected = ($current && $current==$catid2) ? 'selected="selected"' : '';
						$select .= "<option value=\"{$category[$catid2][catid]}\"$selected>---- {$category[$catid2][catname]}</option>";
					}
				}
			}
		}
	}
	$select .= "</select>";
	return $select;
}

/**
 * 获取文章分类制定分类下的所有子分类 id
 * @param <type> $catid
 * @param <type> $depth
 */
function category_get_childids($type, $catid, $depth=3) {
	global $_G;
	if(! in_array($type, array('portal', 'blog', 'album'))) {
		return array();
	}
	loadcache($type.'category');
	$category = $_G['cache'][$type.'category'];
	$catids = array();
	if(isset($category[$catid]) && !empty($category[$catid]['children']) && $depth) {
		$catids = $category[$catid]['children'];
		foreach($category[$catid]['children'] as $id) {
			$catids = array_merge($catids, category_get_childids($type, $id, $depth-1));
		}
	}
	return $catids;
}

/**
 * 获取指定分类的文章数
 * @param <type> $type
 * @param <type> $catid
 */
function category_get_num($type, $catid) {
	global $_G;
	if(! in_array($type, array('portal', 'blog', 'album'))) {
		return array();
	}
	loadcache($type.'category');
	$category = $_G['cache'][$type.'category'];

	$numkey = $type == 'portal' ? 'articles' : 'num';
	if(! isset($_G[$type.'category_nums'])) {
		$_G[$type.'category_nums'] = array();
		$tables = array('portal'=>'portal_category', 'blog'=>'home_blog_category', 'album'=>'home_album_category');
		$query = C::t($tables[$type])->fetch_all_numkey($numkey);
		foreach ($query as $value) {
			$_G[$type.'category_nums'][$value['catid']] = intval($value[$numkey]);
		}
	}

	$nums = $_G[$type.'category_nums'];
	$num = intval($nums[$catid]);
	if($category[$catid]['children']) {
		foreach($category[$catid]['children'] as $id) {
			$num += category_get_num($type, $id);
		}
	}
	return $num;
}


function updatetopic($topic = ''){
	global $_G;

	$topicid = empty($topic) ? '' : $topic['topicid'];
	include_once libfile('function/home');
	$_POST['title'] = getstr(trim($_POST['title']), 255);
	$_POST['name'] = getstr(trim($_POST['name']), 255);
	$_POST['domain'] = getstr(trim($_POST['domain']), 255);
	if(empty($_POST['title'])) {
		return 'topic_title_cannot_be_empty';
	}
	if(empty($_POST['name'])) {
		$_POST['name'] = $_POST['title'];
	}
	if(!$topicid || $_POST['name'] != $topic['name']) {
		if(($value = C::t('portal_topic')->fetch_by_name($_POST['name']))) {
			return 'topic_name_duplicated';
		}
	}
	//删除该域名记录
	if($topicid && !empty($topic['domain'])) {
		require_once libfile('function/delete');
		deletedomain($topicid, 'topic');
	}
	if(!empty($_POST['domain'])) {
		require_once libfile('function/domain');
		domaincheck($_POST['domain'], $_G['setting']['domain']['root']['topic'], 1);
	}

	$setarr = array(
		'title' => $_POST['title'],
		'name' => $_POST['name'],
		'domain' => $_POST['domain'],
		'summary' => getstr($_POST['summary']),
		'keyword' => getstr($_POST['keyword']),
		'useheader' => $_POST['useheader'] ? '1' : '0',// 使用网站导航
		'usefooter' => $_POST['usefooter'] ? '1' : '0',// 使用网站尾部信息
		'allowcomment' => $_POST['allowcomment'] ? 1 : 0,
		'closed' => $_POST['closed'] ? 0 : 1,
	);

	if($_POST['deletecover'] && $topic['cover']) {
		if($topic['picflag'] != '0') pic_delete(str_replace('portal/', '', $topic['cover']), 'portal', 0, $topic['picflag'] == '2' ? '1' : '0');
		$setarr['cover'] = '';
	} else {
		//封面
		if($_FILES['cover']['tmp_name']) {// 上传
			if($topic['cover'] && $topic['picflag'] != '0') pic_delete(str_replace('portal/', '', $topic['cover']), 'portal', 0, $topic['picflag'] == '2' ? '1' : '0');
			$pic = pic_upload($_FILES['cover'], 'portal');
			if($pic) {
				$setarr['cover'] = 'portal/'.$pic['pic'];
				$setarr['picflag'] = $pic['remote'] ? '2' : '1';
			}
		} else {
			if(!empty($_POST['cover']) && $_POST['cover'] != $topic['cover']) {
				if($topic['cover'] && $topic['picflag'] != '0') pic_delete(str_replace('portal/', '', $topic['cover']), 'portal', 0, $topic['picflag'] == '2' ? '1' : '0');
				$setarr['cover'] = $_POST['cover'];
				$setarr['picflag'] = '0';
			}
		}
	}


	//模板
	$primaltplname = '';
	//新专题或还没有选择模板文件或重新选择模板文件
	if(empty($topicid) || empty($topic['primaltplname']) || ($topic['primaltplname'] && $topic['primaltplname'] != $_POST['primaltplname'])) {
		$primaltplname = $_POST['primaltplname'];
		if(!isset($_POST['signs'][dsign($primaltplname)])) {
			return 'diy_sign_invalid';
		}
		$checktpl = checkprimaltpl($primaltplname);
		if($checktpl !== true) {
			return $checktpl;
		}
		$setarr['primaltplname'] = $primaltplname;
	}

	if($topicid) {
		C::t('portal_topic')->update($topicid, $setarr);
		C::t('common_diy_data')->update('portal/portal_topic_content_'.$topicid, getdiydirectory($topic['primaltplname']), array('name'=>$setarr['title']));
	} else {
		$setarr['uid'] = $_G['uid'];
		$setarr['username'] = $_G['username'];
		$setarr['dateline'] = $_G['timestamp'];
		$setarr['closed'] = '1'; // 默认关闭状态
		$topicid = addtopic($setarr);
		if(!$topicid) {
			return 'topic_created_failed';
		}

	}

	if(!empty($_POST['domain'])) {
		C::t('common_domain')->insert(array('domain' => $_POST['domain'], 'domainroot' => $_G['setting']['domain']['root']['topic'], 'id' => $topicid, 'idtype' => 'topic'));
	}

	$tpldirectory = '';
	//重新选择模板文件，生成DIY模板文件
	if($primaltplname && $topic['primaltplname'] != $primaltplname) {
		$targettplname = 'portal/portal_topic_content_'.$topicid;
		if(strpos($primaltplname, ':') !== false) {
			list($tpldirectory, $primaltplname) = explode(':', $primaltplname);
		}
		C::t('common_diy_data')->update($targettplname, getdiydirectory($topic['primaltplname']), array('primaltplname'=>$primaltplname, 'tpldirectory'=>$tpldirectory));
		updatediytemplate($targettplname);
	}

	//生成模板文件
	if($primaltplname && empty($topic['primaltplname'])) {
		$tpldirectory = ($tpldirectory ? $tpldirectory : $_G['cache']['style_default']['tpldir']);
		$content = file_get_contents(DISCUZ_ROOT.$tpldirectory.'/'.$primaltplname.'.htm');
		$tplfile = DISCUZ_ROOT.'./data/diy/'.$tpldirectory.'/portal/portal_topic_content_'.$topicid.'.htm';
		$tplpath = dirname($tplfile);
		if (!is_dir($tplpath)) {
			dmkdir($tplpath);
		}
		file_put_contents($tplfile, $content);
	}

	// 更新缓存
	include_once libfile('function/cache');
	updatecache(array('diytemplatename', 'setting'));

	return $topicid;
}

//添加新的专题
function addtopic($topic) {
	global $_G;
	$topicid = '';
	if($topic && is_array($topic)) {
		$topicid = C::t('portal_topic')->insert($topic, true);
		if(!empty($topicid)) {
			//创建DIY数据
			$diydata = array(
				'targettplname' => 'portal/portal_topic_content_'.$topicid,
				'name' => $topic['title'],
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'dateline' => TIMESTAMP,
			);
			C::t('common_diy_data')->insert($diydata);
		}
	}
	return $topicid;
}

/**
 * 根据BID得到相关权限
 * @param <int> $bid 模块ID
 * @return <array> 权限数组，如果没有权限则返回空数组
 * @example array('allowmanage'=>'1','allowrecommend'=>'1','needverify'=>'0')
 */
function getblockperm($bid) {
	global $_G;
	//空权限
	$perm = array('allowmanage'=>'0','allowrecommend'=>'0','needverify'=>'1');
	$bid = max(0, intval($bid));
	if(!$bid) return $perm;
	$allperm = array('allowmanage'=>'1','allowrecommend'=>'1','needverify'=>'0');
	//有DIY的权限，直接返回所有权限
	if(checkperm('allowdiy')) {
		return $allperm;
	//同时没有允许管理模块、允许推送数据到模块、管理专题和添加专题的权限，直接返回空权限
	} elseif (!getstatus($_G['member']['allowadmincp'], 4) && !getstatus($_G['member']['allowadmincp'], 5) && !getstatus($_G['member']['allowadmincp'], 6) && !checkperm('allowmanagetopic') && !checkperm('allowaddtopic')) {
		return $perm;
	}
	require_once libfile('class/blockpermission');
	$blockpermsission = & block_permission::instance();
	//模块的权限
	$perm = $blockpermsission->get_perms_by_bid($bid, $_G['uid']);
	$perm = $perm ? current($perm) : '';
	if(empty($perm)) {
		//查看所属页面的权限
		if(($block = C::t('common_block')->fetch($bid))) {
			$block = array_merge($block, C::t('common_template_block')->fetch_by_bid($bid));
		}
		//新添加的页面模块（非JS模块）
		if(empty($block['targettplname']) && empty($block['blocktype'])) {
			//有管理专题权限或创建专题且是自己模块
			if(($_G['group']['allowmanagetopic'] || ($_G['group']['allowaddtopic'] && $block['uid'] == $_G['uid']))) {
				$perm = $allperm;
			}
		//模块属于专题的
		} elseif(substr($block['targettplname'], 0, 28) == 'portal/portal_topic_content_') {//note 专题
			if(!empty($_G['group']['allowmanagetopic'])) {
				$perm = $allperm;
			} elseif($_G['group']['allowaddtopic']) {//note 判断专题是不是当前用户所有
				$id = str_replace('portal/portal_topic_content_', '', $block['targettplname']);
				$topic = C::t('portal_topic')->fetch(intval($id));
				if($topic['uid'] == $_G['uid']) {
					$perm = $allperm;
				}
			}
		}
	}
	return $perm;
}

/**
 * 检查频道栏目或文章的权限
 * @global  $_G
 * @param <int> $catid 频道栏目ID
 * @param <int> $aid 文章ID
 * @param <array> $article 文章的数组
 * @param <bool> $isverify 是否审核
 * @param <bool> $return 是否返回信息
 * @return <boll> 如果成功返回TRUE，否则直接报错误信息
 */
function check_articleperm($catid, $aid = 0, $article = array(), $isverify = false, $return = false) {
	global $_G;

	if(empty($catid)) {
		if(!$return) {
			showmessage('article_category_empty');
		} else {
			return 'article_category_empty';
		}
	}

	// 全局权限
	if($_G['group']['allowmanagearticle'] || (empty($aid) && $_G['group']['allowpostarticle']) || $_GET['modarticlekey'] == modauthkey($aid)) {
		return true;
	}

	$permission = getallowcategory($_G['uid']);
	if(isset($permission[$catid])) {
		if($permission[$catid]['allowmanage'] || (empty($aid) && $permission[$catid]['allowpublish'])) {
			return true;
		}
	}
	//审核功能权限的判断不执行下面的判断
	if(!$isverify && $aid && !empty($article['uid']) && $article['uid'] == $_G['uid'] && ($article['status'] == 1 && $_G['group']['allowpostarticlemod'] || empty($_G['group']['allowpostarticlemod']))) {
		return true;
	}

	if(!$return) {
		showmessage('article_edit_nopermission');
	} else {
		return 'article_edit_nopermission';
	}
}

/**
 * 文章评论添加
 * @param int $id 文章id
 * @param string $message 评论内容
 * @$param string $idtype 评论类型 aid, toipcid
 * @return string
 */
function addportalarticlecomment($id, $message, $idtype = 'aid') {
	global $_G;

	$id = intval($id);
	if(empty($id)) {
		return 'comment_comment_noexist';
	}
	$message = getstr($message, $_G['group']['allowcommentarticle'], 0, 0, 1, 0);
	if(strlen($message) < 2) return 'content_is_too_short';

	$idtype = in_array($idtype, array('aid' ,'topicid')) ? $idtype : 'aid';
	$tablename = $idtype == 'aid' ? 'portal_article_title' : 'portal_topic';
	$data = C::t($tablename)->fetch($id);
	if(empty($data)) {
		return 'comment_comment_noexist';
	}
	if($data['allowcomment'] != 1) {
		return 'comment_comment_notallowed';
	}

	$message = censor($message);
	if(censormod($message)) {
		$comment_status = 1;
	} else {
		$comment_status = 0;
	}

	$setarr = array(
		'uid' => $_G['uid'],
		'username' => $_G['username'],
		'id' => $id,
		'idtype' => $idtype,
		'postip' => $_G['clientip'],
		'port' => $_G['remoteport'],
		'dateline' => $_G['timestamp'],
		'status' => $comment_status,
		'message' => $message
	);

	$pcid = C::t('portal_comment')->insert($setarr, true);

	if($comment_status == 1) {
		updatemoderate($idtype.'_cid', $pcid);
		$notifykey = $idtype == 'aid' ? 'verifyacommont' : 'verifytopiccommont';
		manage_addnotify($notifykey);
	}
	//note 更新统计
	$tablename = $idtype == 'aid' ? 'portal_article_count' : 'portal_topic';
	C::t($tablename)->increase($id, array('commentnum' => 1));
	C::t('common_member_status')->update($_G['uid'], array('lastpost' => $_G['timestamp']), 'UNBUFFERED');

	//note 奖励评论发起者
	if($data['uid'] != $_G['uid']) {
		updatecreditbyaction('portalcomment', 0, array(), $idtype.$id);
	}
	return 'do_success';
}

/**
 * 过滤模板语言
 * @param <type> $s
 * @return <type>
 */
function trimdxtpllang($s){
	return str_replace(array('{', '$', '<', '>'), array('{ ', '$ ', '', ''), $s);
}

/**
 * 相关文章处理
 * @param integer $aid 文章id
 * @param array $raids 相关文章id
 * @return bool
 */
function addrelatedarticle($aid, $raids) {
	C::t('portal_article_related')->delete_by_aid_raid($aid, $aid);
	if($raids) {
		$relatedarr = array();
		$relatedarr = array_map('intval', $raids);
		$relatedarr = array_unique($relatedarr);
		$relatedarr = array_filter($relatedarr);
		if($relatedarr) {
			$list = C::t('portal_article_title')->fetch_all($relatedarr);
			C::t('portal_article_related')->insert_batch($aid, $list);
		}
	}
	return true;
}


//获取系统内置模板名
function getprimaltplname($filename) {
	global $_G, $lang;
	$tpldirectory = '';
	if(strpos($filename, ':') !== false) {
		list($tpldirectory, $filename) = explode(':', $filename);
	}
	if(empty($tpldirectory)) {
		$tpldirectory = ($_G['cache']['style_default']['tpldir'] ? $_G['cache']['style_default']['tpldir'] : './template/default');
	}
	$content = @file_get_contents(DISCUZ_ROOT.$tpldirectory.'/'.$filename);
	$name = $tpldirectory.'/'.$filename;
	if($content) {
		preg_match("/\<\!\-\-\[name\](.+?)\[\/name\]\-\-\>/i", trim($content), $mathes);
		if(!empty($mathes[1])) {
			preg_match("/^\{lang (.+?)\}$/", $mathes[1], $langs);
			if(!empty($langs[1])) {
				$name = !$lang[$langs[1]] ? $langs[1] : $lang[$langs[1]];
			} else {
				$name = dhtmlspecialchars($mathes[1]);
			}
		}
	}
	return $name;
}

function getdiydirectory($value) {
	$directory = '';
	if($value && strpos($value, ':') !== false) {
		list($directory) = explode(':', $value);
	}
	return $directory;
}
?>