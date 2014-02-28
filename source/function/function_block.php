<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_block.php 32895 2013-03-21 04:18:15Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//获得模块数据处理对象
function block_script($blockclass, $script) {
	global $_G;
	$arr = explode('_', $blockclass);
	$dirname = $arr[0];
	$xmlid = null;
	if(strtoupper($dirname) == 'XML' && $script == 'xml' && intval($arr[1])) {
		$xmlid = intval($arr[1]);
	}
	$var = "blockscript_{$dirname}_{$script}";
	$script = 'block_'.$script;
	if(!isset($_G[$var]) || $xmlid) {
		if(@include_once libfile($script, 'class/block/'.$dirname)) {
			$_G[$var] = $xmlid ?  new $script($xmlid) : new $script();
		} else {
			$_G[$var] = false;
		}
	}
	return $_G[$var];
}

/**
* Portal模块
* @param $parameter - 参数集合
*/
function block_get_batch($parameter) {
	global $_G;
	$bids = $parameter && is_array($parameter) ? $parameter : ($parameter ? explode(',', $parameter) : array());
	$bids = array_map('intval', $bids);
	$bids = array_unique($bids);
	$styleids = array();

	if($bids) {
		//从缓存中获取
		if(C::t('common_block')->allowmem) {
			if(($cachedata = memory('get', $bids, 'blockcache_')) !== false) {
				foreach ($cachedata as $bid => $block) {
					$_G['block'][$bid] = $block;
					if($block['styleid']) {
						$styleids[$block['styleid']] = $block['styleid'];
					}
				}
				if($styleids) {
					block_getstyle($styleids);
				}
				if(!($bids = array_diff($bids, array_keys($cachedata)))) {
					return true;
				}
			}
		}

		//未启用缓存或部分缓存丢失
		$items = $prelist = array();
		foreach(C::t('common_block_item')->fetch_all_by_bid($bids) as $item) {
			if($item['itemtype'] == '1' && $item['enddate'] && $item['enddate'] < TIMESTAMP) {
				continue;
			} elseif($item['itemtype'] == '1' && (!$item['startdate'] || $item['startdate'] <= TIMESTAMP)) {
				//有预定数据时初始化预定数组
				if (!empty($items[$item['bid']][$item['displayorder']])) {
					$prelist[$item['bid']] = array();
				}
				$prelist[$item['bid']][$item['displayorder']] = $item;
			}
			$items[$item['bid']][$item['displayorder']] = $item;
		}
		foreach(C::t('common_block')->fetch_all($bids) as $bid => $block) {
			if(!empty($block['styleid']) && $block['styleid'] > 0) {
				$styleids[] = intval($block['styleid']);
			}
			if(!empty($items[$bid])) {
				ksort($items[$bid]);
				$newitem = array();
				//有预定数据时：自动数据按顺序顺延，手动数据覆盖
				if(!empty($prelist[$bid])) {
					//顺延计数器
					$countpre = 0;
					foreach($items[$bid] as $position => $item) {
						if(empty($prelist[$bid][$position])) {//当前位置无预定数据则直接存放
							if(isset($items[$bid][$position+$countpre])) {
								$newitem[$position+$countpre] = $item;
							}
						} else {//当前位置有预定数据
							//手动数据
							if ($item['itemtype']=='1') {
								//覆盖较早的手动数据
								if ($prelist[$bid][$position]['startdate'] >= $item['startdate']) {
									$newitem[$position] = $prelist[$bid][$position];
								} else {
									$newitem[$position] = $item;
								}
								//自动数据按顺序顺延
							} else {
								$newitem[$position] = $prelist[$bid][$position];
								$countpre++;
								if(isset($items[$bid][$position+$countpre])) {
									$newitem[$position+$countpre] = $item;
								}
							}
						}
					}
					ksort($newitem);
				}
				$block['itemlist'] = empty($newitem) ? $items[$bid] : $newitem;
			}
			$block['param'] = $block['param'] ? dunserialize($block['param']) : array();
			$_G['block'][$bid] = $block;

			//缓存数据
			if(C::t('common_block')->allowmem) {
				memory('set', 'blockcache_'.$bid, $_G['block'][$bid], C::t('common_block')->cache_ttl);
			}

		}
	}
	// 批量加载模块样式
	if($styleids) {
		block_getstyle($styleids);
	}
}

/**
* Portal 模块显示
*
* @param $parameter - 参数集合
*/
function block_display_batch($bid) {
	echo block_fetch_content($bid);
}

/**
 * 让 block 生成 html
 * @param unknown_type $bid
 * @param unknown_type $forceupdate *
 * 备注：forceupdate 参数使添加/编辑模块时不受更新次数限制
 */
function block_fetch_content($bid, $isjscall=false, $forceupdate=false) {
	global $_G;
	static $allowmem = null, $cachettl = null;
	if($allowmem === null) {
		$allowmem = ($cachettl = getglobal('setting/memory/diyblockoutput')) !== null && memory('check');
	}

	$str = '';
	$block = empty($_G['block'][$bid])?array():$_G['block'][$bid];
	if(!$block) {
		return;
	}

	if($forceupdate) {
		block_updatecache($bid, true);
		$block = $_G['block'][$bid];
	} elseif($block['cachetime'] > 0 && $_G['timestamp'] - $block['dateline'] > $block['cachetime']) {

		$block['cachetimerange'] = empty($block['cachetimerange']) ? (isset($_G['setting']['blockcachetimerange']) ? $_G['setting']['blockcachetimerange'] : '') : $block['cachetimerange'];
		$inrange = empty($block['cachetimerange']) ? true : false;
		if(!$inrange) {
			$block['cachetimerange'] = explode(',', $block['cachetimerange']);
			$hour = date('G', TIMESTAMP);
			if($block['cachetimerange'][0] <= $block['cachetimerange'][1]) {
				$inrange = $block['cachetimerange'][0] <= $hour && $block['cachetimerange'][1] >= $hour;
			} else {
				$inrange = !($block['cachetimerange'][1] < $hour && $block['cachetimerange'][0] > $hour);
			}
		}

		if($isjscall || $block['punctualupdate']) {//note js调用或者模块指定准时更新
			block_updatecache($bid, true);
			$block = $_G['block'][$bid];
		} elseif((empty($_G['blockupdate']) || $block['dateline'] < $_G['blockupdate']['dateline']) && $inrange) {//note 页面输出时更新最早的一个
			$_G['blockupdate'] = array('bid'=>$bid, 'dateline'=>$block['dateline']);
		}
	}

	//note js 调用 或 内部调用的模块不输出外层的两个DIV
	$hidediv = $isjscall || $block['blocktype'];

	$_cache_key = 'blockcache_'.($isjscall ? 'js' : 'htm').'_'.$bid;
	//note 获取缓存，注意：指定无缓存或隐藏输出的情况下，不做缓存
	if($allowmem && empty($block['hidedisplay']) && empty($block['nocache']) && ($str = memory('get', $_cache_key)) !== false) {

	} else {

		if($hidediv) {//note js 调用 或 内部调用的模块不输出外层的两个DIV
			if($block['summary']) $str .= $block['summary'];
			$str .= block_template($bid);
		} else {// 默认显示模块html
			if($block['title']) $str .= $block['title'];
			$str .= '<div id="portal_block_'.$bid.'_content" class="dxb_bc">';
			if($block['summary']) {
				$str .= "<div class=\"portal_block_summary\">$block[summary]</div>";
			}
			$str .= block_template($bid);
			$str .= '</div>';
		}

		if($allowmem && empty($block['hidedisplay']) && empty($block['nocache'])) {
			memory('set', $_cache_key, $str, C::t('common_block')->cache_ttl);
		}
	}

	if(!$hidediv) {//note js 调用 或 内部调用的模块不输出外层的两个DIV
		$classname = !empty($block['classname']) ? $block['classname'].' ' : '';
		$div = "<div id=\"portal_block_$bid\" class=\"{$classname}block move-span\">";
		if(($_GET['diy'] === 'yes' || $_GET['inajax']) && check_diy_perm()) {
			$div .= "<div class='block-name'>$block[name] (ID:$bid)</div>";
		}
		$str = $div.$str."</div>";
	}
	//搜索条中FORMHASH的处理
	if($block['blockclass'] == 'html_html' && $block['script'] == 'search') $str = strtr($str, array('{FORMHASH}'=>FORMHASH));
	return !empty($block['hidedisplay']) ? '' : $str;
}

/**
 * 更新block缓存数据
 * @param unknown_type $block
 * 备注：forceupdate 参数使添加/编辑模块时不受更新次数限制
 */
function block_updatecache($bid, $forceupdate=false) {
	global $_G;
	//模块属性设置不更新或强制更新
	if((isset($_G['block'][$bid]['cachetime']) && $_G['block'][$bid]['cachetime'] < 0) || !$forceupdate && discuz_process::islocked('block_update_cache', 5)) {
		return false;
	}
	C::t('common_block')->clear_cache($bid);
	$block = empty($_G['block'][$bid])?array():$_G['block'][$bid];
	if(!$block) {
		return false;
	}
	$obj = block_script($block['blockclass'], $block['script']);
	if(is_object($obj)) {
		C::t('common_block')->update($bid, array('dateline'=>TIMESTAMP));
		$_G['block'][$bid]['dateline'] = TIMESTAMP;
		$theclass = block_getclass($block['blockclass']);
		$thestyle = !empty($block['styleid']) ? block_getstyle($block['styleid']) : dunserialize($block['blockstyle']);

		// 获取数据
		if(in_array($block['blockclass'], array('forum_thread', 'group_thread', 'space_blog', 'space_pic', 'portal_article'))) {// 特殊，先从推荐表里找
			$datalist = array();
			$mapping = array('forum_thread'=>'tid', 'group_thread'=>'tid', 'space_blog'=>'blogid', 'space_blog'=>'picid', 'portal_article'=>'aid');
			$idtype = $mapping[$block['blockclass']];
			$bannedids = !empty($block['param']['bannedids']) ? explode(',', $block['param']['bannedids']) : array();
			$bannedsql = $bannedids ? ' AND id NOT IN ('.dimplode($bannedids).')' : '';
			$shownum = intval($block['shownum']);
			$titlelength	= !empty($block['param']['titlelength']) ? intval($block['param']['titlelength']) : 40;
			$summarylength	= !empty($block['param']['summarylength']) ? intval($block['param']['summarylength']) : 80;
			foreach(C::t('common_block_item_data')->fetch_all_by_bid($bid, 1, 0, $shownum * 2, $bannedids, false) as $value) {
				$value['title'] = cutstr($value['title'], $titlelength, '');
				$value['summary'] = cutstr($value['summary'], $summarylength, '');
				$value['itemtype'] = '3'; //推送数据的标识为3
				$datalist[] = $value;
				// 将已经获取的数据加入模块屏蔽数据，防止获取重复
				$bannedids[] = intval($value['id']);
			}
			// 如果不够，继续按默认条件获取
			$leftnum = $block['shownum'] - count($datalist);
			if($leftnum > 0 && empty($block['isblank'])) {
				if($leftnum != $block['param']['items']) {
					$block['param']['items'] = $leftnum;
					$block['param']['bannedids'] = implode(',',$bannedids);
				}
				$return = $obj->getdata($thestyle, $block['param']);
				$return['data'] = array_merge($datalist, (array)$return['data']);
			} else {
				$return['data'] = $datalist;
			}
		} else {//直接取数据
			$return = $obj->getdata($thestyle, $block['param']);
		}

		if($return['data'] === null) {// 返回html
			$_G['block'][$block['bid']]['summary'] = $return['html'];
			C::t('common_block')->update($bid, array('summary'=>$return['html']));
		} else {// 返回数据
			$_G['block'][$block['bid']]['itemlist'] = block_updateitem($bid, $return['data']);
		}
	} else {
		C::t('common_block')->update($bid, array('dateline'=>TIMESTAMP+999999, 'cachetime'=>0));
		$_G['block'][$bid]['dateline'] = TIMESTAMP+999999;
	}
	//缓存
	if(C::t('common_block')->allowmem) {
		memory('set', 'blockcache_'.$bid, $_G['block'][$bid], C::t('common_block')->cache_ttl);
		$styleid = $_G['block'][$bid]['styleid'];
		if($styleid && $_G['blockstyle_'.$styleid]) {
			memory('set', 'blockstylecache_'.$styleid, $_G['blockstyle_'.$styleid], C::t('common_block')->cache_ttl);
		}
	}
	discuz_process::unlock('block_update_cache');// 完成后立即解锁
}

//模块风格显示
function block_template($bid) {
	global $_G;

	$block = empty($_G['block'][$bid]) ? array() : $_G['block'][$bid];

	$theclass = block_getclass($block['blockclass'], false);
	$thestyle = !empty($block['styleid']) ? block_getstyle($block['styleid']) : dunserialize($block['blockstyle']);
	if(empty($block) || empty($theclass) || empty($thestyle)) {
		return false;
	}
	// 使用指定 style 显示block_item
	$template = block_build_template($thestyle['template']);
	// 解析模板中的 loop 和 order
	if(!empty($block['itemlist'])) {
		if($thestyle['moreurl']) {
			$template = str_replace('{moreurl}', 'portal.php?mod=block&bid='.$bid, $template);
		}
		//替换模板变量
		$fields = array('picwidth'=>array(), 'picheight'=>array(), 'target'=>array(), 'currentorder'=>array());
		if($block['hidedisplay']) {//note 隐藏内容输出时解析所有变量
			$fields = array_merge($fields, $theclass['fields']);
		} else {//note 仅解析模板中用到的变量
			$thestyle['fields'] = !empty($thestyle['fields']) && is_array($thestyle['fields']) ? $thestyle['fields'] : block_parse_fields($template);
			foreach($thestyle['fields'] as $k) {
				if(isset($theclass['fields'][$k])) {
					$fields[$k] = $theclass['fields'][$k];
				}
			}
		}

		$order = 0;
		$dynamicparts = array();//note 记录要替换的动态模板
		foreach($block['itemlist'] as $position=>$blockitem) {
			$itemid = $blockitem['itemid'];
			$order++;

			// rkey 动态模板标记； rpattern 匹配正则； rvalue 处理完成后的模板； tpl 要做替换的模板部分
			$rkey = $rpattern = $rvalue = $rtpl = array();
			// 多个循环中[indexn=n]xxx[/indexn]的标记
			$rkeyplug = false;
			if(isset($thestyle['template']['index']) && is_array($thestyle['template']['index']) && isset($thestyle['template']['index'][$order])) {
				$rkey[] = 'index_'.$order;
				$rpattern[] = '/\s*\[index='.$order.'\](.*?)\[\/index\]\s*/is';
				$rvalue[] = '';
				$rtpl[] = $thestyle['template']['index'][$order];
			}
			// 如果未指定任何 index=[当前数据行]，处理 loop
			if(empty($rkey)) {
				$rkey[] = 'loop';
				$rpattern[] = '/\s*\[loop\](.*?)\[\/loop\]\s*/is';
				$rvalue[] = isset($dynamicparts['loop']) ? $dynamicparts['loop'][1] : '';//note 需要追加到已经解析的模板里
				if(is_array($thestyle['template']['order']) && isset($thestyle['template']['order'][$order])) {
					$rtpl[] = $thestyle['template']['order'][$order];
				} elseif(is_array($thestyle['template']['order']) && isset($thestyle['template']['order']['odd']) && ($order % 2 == 1)) {
					$rtpl[] = $thestyle['template']['order']['odd'];
				} elseif(is_array($thestyle['template']['order']) && isset($thestyle['template']['order']['even']) && ($order % 2 == 0)) {
					$rtpl[] = $thestyle['template']['order']['even'];
				} else {
					$rtpl[] = $thestyle['template']['loop'];
				}
			}
			if(!empty($thestyle['template']['indexplus'])) {
				foreach($thestyle['template']['indexplus'] as $k=>$v) {
					if(isset($v[$order])) {
						$rkey[] = 'index'.$k.'='.$order;
						$rkeyplug = true;
						$rpattern[] = '/\[index'.$k.'='.$order.'\](.*?)\[\/index'.$k.'\]/is';
						$rvalue[] = '';
						$rtpl[] = $v[$order];
					}
				}
			}
			// 如果未指定任何 indexn=[当前数据行]，处理 loop
			if(empty($rkeyplug)) {
				if(!empty($thestyle['template']['loopplus'])) {
					foreach($thestyle['template']['loopplus'] as $k=>$v) {
						$rkey[] = 'loop'.$k;
						$rpattern[] = '/\s*\[loop'.$k.'\](.*?)\[\/loop'.$k.'\]\s*/is';
						$rvalue[] = isset($dynamicparts['loop'.$k]) ? $dynamicparts['loop'.$k][1] : '';
						if(is_array($thestyle['template']['orderplus'][$k]) && isset($thestyle['template']['orderplus'][$k][$order])) {
							$rtpl[] = $thestyle['template']['orderplus'][$k][$order];
						} elseif(is_array($thestyle['template']['orderplus'][$k]) && isset($thestyle['template']['orderplus'][$k]['odd']) && ($order % 2 == 1)) {
							$rtpl[] = $thestyle['template']['orderplus'][$k]['odd'];
						} elseif(is_array($thestyle['template']['orderplus'][$k]) && isset($thestyle['template']['orderplus'][$k]['even']) && ($order % 2 == 0)) {
							$rtpl[] = $thestyle['template']['orderplus'][$k]['even'];
						} else {
							$rtpl[] = $thestyle['template']['loopplus'][$k];
						}
					}
				}
			}
			// 处理当前数据的数据项
			$blockitem['fields'] = !empty($blockitem['fields']) ? $blockitem['fields'] : array();
			$blockitem['fields'] = is_array($blockitem['fields']) ? $blockitem['fields'] : dunserialize($blockitem['fields']);
			if(!empty($blockitem['showstyle'])) {
				$blockitem['fields']['showstyle'] = dunserialize($blockitem['showstyle']);
			}
			$blockitem = $blockitem['fields'] + $blockitem;

			$blockitem['picwidth'] = !empty($block['picwidth']) ? intval($block['picwidth']) : 'auto';
			$blockitem['picheight'] = !empty($block['picheight']) ? intval($block['picheight']) : 'auto';
			$blockitem['target'] = !empty($block['target']) ? ' target="_'.$block['target'].'"' : '';
			$blockitem['currentorder'] = $order;//note 当前顺序
			$blockitem['parity'] = $order % 2;//note 奇偶

			// 替换模板中的变量
			$searcharr = $replacearr = array();
			$searcharr[] = '{parity}';
			$replacearr[] = $blockitem['parity'];
			foreach($fields as $key=>$field) {
				$replacevalue = $blockitem[$key];
				// 字段类型
				$field['datatype'] = !empty($field['datatype']) ? $field['datatype'] : '';
				if($field['datatype'] == 'int') {// int
					$replacevalue = intval($replacevalue);
				} elseif($field['datatype'] == 'string') {//字符串
					$replacevalue = preg_quote($replacevalue);
				} elseif($field['datatype'] == 'date') {//时间
					$replacevalue = dgmdate($replacevalue, $block['dateuformat'] ? 'u' : $block['dateformat'], '9999', $block['dateuformat'] ? $block['dateformat'] : '');
				} elseif($field['datatype'] == 'title') {//title
					// 特别：需要处理图片或链接中的 title, alt 属性
					$searcharr[] = '{title-title}';
					$replacearr[] = preg_quote(!empty($blockitem['fields']['fulltitle']) ? $blockitem['fields']['fulltitle'] : dhtmlspecialchars($replacevalue));
					$searcharr[] = '{alt-title}';
					$replacearr[] = preg_quote(!empty($blockitem['fields']['fulltitle']) ? $blockitem['fields']['fulltitle'] : dhtmlspecialchars($replacevalue));
					$replacevalue = preg_quote($replacevalue);
					if($blockitem['showstyle'] && ($style = block_showstyle($blockitem['showstyle'], 'title'))) {
						$replacevalue = '<font style="'.$style.'">'.$replacevalue.'</font>';
					}
				} elseif($field['datatype'] == 'summary') {//summary
					$replacevalue = preg_quote($replacevalue);
					if($blockitem['showstyle'] && ($style = block_showstyle($blockitem['showstyle'], 'summary'))) {
						$replacevalue = '<font style="'.$style.'">'.$replacevalue.'</font>';
					}
				} elseif($field['datatype'] == 'pic') {//图片
					// 默认
					if($blockitem['picflag'] == '1') {//本地
						$replacevalue = $_G['setting']['attachurl'].$replacevalue;
					} elseif ($blockitem['picflag'] == '2') {//远程
						$replacevalue = $_G['setting']['ftp']['attachurl'].$replacevalue;
					}
					// 若是本地或远程图片（picflag：0为URL，1为本地，2为远程）且设定了缩略图，使用缩略图
					if($blockitem['picflag'] && $block['picwidth'] && $block['picheight'] && $block['picwidth'] != 'auto' && $block['picheight'] != 'auto') {
						//已经生成缩略图
						if($blockitem['makethumb'] == 1) {
							if($blockitem['picflag'] == '1') {//本地
								$replacevalue = $_G['setting']['attachurl'].$blockitem['thumbpath'];
							} elseif ($blockitem['picflag'] == '2') {//远程
								$replacevalue = $_G['setting']['ftp']['attachurl'].$blockitem['thumbpath'];
							}
						} elseif(!$_G['block_makethumb'] && !$blockitem['makethumb']) {// 每次最多处理一个缩略图
							// 先假定生成失败
							C::t('common_block_item')->update($itemid, array('makethumb'=>2));
							require_once libfile('class/image');
							$image = new image();
							$thumbpath = block_thumbpath($block, $blockitem);
							//开启了远程上传
							if($_G['setting']['ftp']['on']) {
								$ftp = & discuz_ftp::instance();
								$ftp->connect();
								//远程文件存在 或 生成缩略图并上传成功
								if($ftp->connectid && $ftp->ftp_size($thumbpath) > 0 || ($return = $image->Thumb($replacevalue, $thumbpath, $block['picwidth'], $block['picheight'], 2) && $ftp->upload($_G['setting']['attachurl'].'/'.$thumbpath, $thumbpath))) {
									$picflag = 1; //common_block_pic表中的picflag标识（0本地，1远程）
									$_G['block_makethumb'] = true; //每个进程可生成一次
									@unlink($_G['setting']['attachdir'].'./'.$thumbpath); //删除本地生成的缩略图
								}
							//未开启远程上传，本地文件存在 或 生成缩略图成功
							} elseif(file_exists($_G['setting']['attachdir'].$thumbpath) || ($return = $image->Thumb($replacevalue, $thumbpath, $block['picwidth'], $block['picheight'], 2))) {
								$picflag = 0; //common_block_pic表中的picflag标识（0本地，1远程）
								$_G['block_makethumb'] = true; //每个进程可生成一次
							}
							//生成缩略图成功
							if($_G['block_makethumb']) {
								//保存缩略图生成成功标识位和路径
								C::t('common_block_item')->update($itemid, array('makethumb'=>1, 'thumbpath' => $thumbpath));
								//清空模块缓存
								C::t('common_block')->clear_cache($block['bid']);
								//保存模块和图片的关联
								$thumbdata = array('bid' => $block['bid'], 'itemid' => $itemid, 'pic' => $thumbpath, 'picflag' => $picflag, 'type' => '0');
								C::t('common_block_pic')->insert($thumbdata);
							}
						}
					}
				}
				$searcharr[] = '{'.$key.'}';
				$replacearr[] = $replacevalue;

				// 把处理后的值放入 $_G['block_bid'] ，以供模板方式调用
				if($block['hidedisplay']) {
					//还原经过 正则表达式转义的字符
					if(strpos($replacevalue, "\\") !== false) {
						$replacevalue = str_replace(
								array('\.', '\\\\', '\+', '\*', '\?', '\[', '\^', '\]', '\$', '\(', '\)', '\{', '\}', '\=', '\!', '\<', '\>', '\|', '\:', '\-'),
								array('.', '\\', '+', '*', '?', '[', '^', ']', '$', '(', ')', '{', '}', '=', '!', '<', '>', '|', ':', '-'), $replacevalue);
					}
					$_G['block_'.$bid][$order-1][$key] = $replacevalue;
				}
			}
			foreach($rtpl as $k=>$str_template) {
				if($str_template) {
					// 特别：需要处理图片或链接中的 title, alt 属性
					$str_template = preg_replace('/title=[\'"]{title}[\'"]/', 'title="{title-title}"', $str_template);
					$str_template = preg_replace('/alt=[\'"]{title}[\'"]/', 'alt="{alt-title}"', $str_template);
					$rvalue[$k] .= str_replace($searcharr, $replacearr, $str_template);
					$dynamicparts[$rkey[$k]] = array($rpattern[$k], $rvalue[$k]);
				}
			}
		}// foreach($block['itemlist'] as $itemid=>$blockitem) {

		// 替换
		// loop 与 index
		foreach($dynamicparts as $value) {
			$template = preg_replace($value[0], $value[1], $template);
		}
		$template = str_replace('\\', '&#92;', stripslashes($template));
	}
	// 去除未匹配到的标签
	$template = preg_replace('/\s*\[(order\d*)=\w+\](.*?)\[\/\\1\]\s*/is', '', $template);
	$template = preg_replace('/\s*\[(index\d*)=\w+\](.*?)\[\/\\1\]\s*/is', '', $template);
	$template = preg_replace('/\s*\[(loop\d{0,1})\](.*?)\[\/\\1\]\s*/is', '', $template);
	return $template;
}

function block_showstyle($showstyle, $key) {
	$style = '';
	if(!empty($showstyle["{$key}_b"])) {
		$style .= 'font-weight: 900;';
	}
	if(!empty($showstyle["{$key}_i"])) {
		$style .= 'font-style: italic;';
	}
	if(!empty($showstyle["{$key}_u"])) {
		$style .= 'text-decoration: underline;';
	}
	if(!empty($showstyle["{$key}_c"])) {
		$style .= 'color: '.$showstyle["{$key}_c"].';';
	}
	return $style;
}


/**
 * Portal 模块设置项
 *
 * @param $blocksetting - 设置项参数
 * @param $value - 设置项值
 *	type - 设置项类型
 *	radio			= “是/否”单选
 *	text/password/number	= 单行文本
 *	textarea		= 多行文本
 *	select			= 单选选择框(!)
 *	mselect			= 多选选择框(!)
 *	mradio			= 单选框(!)
 *	mcheckbox		= 复选框(!)
 *	file			= 文件上传
 *	mfile			= 文件上传+输入框
 *	*			= 自定义文字
 *	(!):此类型的设置项要求 $varname 为数组 “array(设置项变量名, 设置项预设值)”。设置项预设值 为 “array(值，文本)” 组成的数组
 */
function block_setting($blockclass, $script, $values = array()) {
	global $_G;

	$return = array();
	$obj = block_script($blockclass, $script);
	if(!is_object($obj)) return $return;
	return block_makeform($obj->getsetting(), $values);
}

function block_makeform($blocksetting, $values){
	global $_G;
	static $randomid = 0, $calendar_loaded = false;
	$return = array();
	foreach($blocksetting as $settingvar => $setting) {
		$varname = in_array($setting['type'], array('mradio', 'mcheckbox', 'select', 'mselect')) ?
			($setting['type'] == 'mselect' ? array('parameter['.$settingvar.'][]', $setting['value']) : array('parameter['.$settingvar.']', $setting['value']))
			: 'parameter['.$settingvar.']';
		$value = isset($values[$settingvar]) ? $values[$settingvar] : $setting['default'];
		$type = $setting['type'];
		$s = $comment = '';
		if(preg_match('/^([\w]+?)_[\w]+$/i', $setting['title'], $match)) {
			$langscript = $match[1];
			$setname = lang('block/'.$langscript, $setting['title']);
			$comment = lang('block/'.$langscript, $setting['title'].'_comment', array(), '');
		} else {
			$langscript = '';
			$setname = $setting['title'];
		}
		$check = array();
		if($type == 'radio') {
			$value ? $check['true'] = "checked" : $check['false'] = "checked";
			$value ? $check['false'] = '' : $check['true'] = '';
			$s .= '<label for="randomid_'.(++$randomid).'" class="lb"><input type="radio" name="'.$varname.'" id="randomid_'.$randomid.'" class="pr" value="1" '.$check['true'].'>'.lang('core', 'yes').'</label>'.
				'<label for="randomid_'.(++$randomid).'" class="lb"><input type="radio" name="'.$varname.'" id="randomid_'.$randomid.'" class="pr" value="0" '.$check['false'].'>'.lang('core', 'no').'</label>';
		} elseif($type == 'text' || $type == 'password' || $type == 'number') {
			$s .= '<input type="'.$type.'" name="'.$varname.'" class="px" value="'.dhtmlspecialchars($value).'" />';
		} elseif($type == 'textarea') {
			$s .= '<textarea name="'.$varname.'" class="pt" rows="4" cols="40">'.dhtmlspecialchars($value).'</textarea>';
		} elseif($type == 'mtextarea') {
			$s .= '<textarea name="'.$varname.'" class="pt" rows="4" cols="40" onblur="blockCheckTag(this);">'.dhtmlspecialchars($value).'</textarea>';
		} elseif($type == 'select') {
			$s .= '<select name="'.$varname[0].'" class="ps">';
			foreach($varname[1] as $option) {
				$selected = $option[0] == $value ? ' selected="selected"' : '';
				$s .= '<option value="'.$option[0].'"'.$selected.'>'.($langscript ? lang('block/'.$langscript, $option[1]) : $option[1]).'</option>';
			}
			$s .= '</select>';
		} elseif($type == 'mradio') {
			if(is_array($varname)) {
				$radiocheck = array($value => ' checked');
				$s .= '<ul'.(empty($varname[2]) ?  ' class="pr"' : '').'>';
				foreach($varname[1] as $varary) {
					if(is_array($varary) && !empty($varary)) {
						$s .= '<li'.($radiocheck[$varary[0]] ? ' class="checked"' : '').'><label for="randomid_'.(++$randomid).'"><input type="radio" name="'.$varname[0].'" id="randomid_'.$randomid.'" class="pr" value="'.$varary[0].'"'.$radiocheck[$varary[0]].'>'.($langscript ? lang('block/'.$langscript, $varary[1]) : $varary[1]).'</label></li>';
					}
				}
				$s .= '</ul>';
			}
		} elseif($type == 'mcheckbox') {
			$s .= '<ul class="nofloat">';
			foreach($varname[1] as $varary) {
				if(is_array($varary) && !empty($varary)) {
					$checked = is_array($value) && in_array($varary[0], $value) ? ' checked' : '';
					$s .= '<li'.($checked ? ' class="checked"' : '').'><label for="randomid_'.(++$randomid).'"><input type="checkbox" name="'.$varname[0].'[]" id="randomid_'.$randomid.'" class="pc" value="'.$varary[0].'"'.$checked.'>'.($langscript ? lang('block/'.$langscript, $varary[1]) : $varary[1]).'</label></li>';
				}
			}
			$s .= '</ul>';
		} elseif($type == 'mselect') {
			$s .= '<select name="'.$varname[0].'" class="ps" multiple="multiple" size="10">';
			foreach($varname[1] as $option) {
				$selected = is_array($value) && in_array($option[0], $value) ? ' selected="selected"' : '';
				$s .= '<option value="'.$option[0].'"'.$selected.'>'.($langscript ? lang('block/'.$langscript, $option[1]) : $option[1]).'</option>';
			}
			$s .= '</select>';
		} elseif($type == 'calendar') {
			if(! $calendar_loaded) {
				$s .= "<script type=\"text/javascript\" src=\"{$_G[setting][jspath]}calendar.js?".VERHASH."\"></script>";
				$calendar_loaded = true;
			}
			$s .= '<input type="text" name="'.$varname.'" class="px" value="'.dhtmlspecialchars($value).'" onclick="showcalendar(event, this, true)" />';
		} elseif($type == 'district') {
			include_once libfile('function/profile');
			$elems = $vals = array();
			$districthtml = '';
			foreach($setting['value'] as $fieldid) {
				$elems[] = 'parameter['.$fieldid.']';
				$vals[$fieldid] = $values[$fieldid];
				if(!empty($values[$fieldid])) {
					$districthtml .= $values[$fieldid].'<input type="hidden" name="parameter['.$fieldid.']" value="'.$values[$fieldid].'" /> ';
				}
			}
			$containertype = strpos($setting['title'], 'birthcity') !== false ? 'birth' : 'reside';
			$containerid = 'randomid_'.(++$randomid);
			if($districthtml) { //已经填写过
				$s .= $districthtml;
				$s .= '&nbsp;&nbsp;<a href="javascript:;" onclick="showdistrict(\''.$containerid.'\', ['.dimplode($elems).'], '.count($elems).', \'\', \''.$containertype.'\'); return false;">'.lang('spacecp', 'profile_edit').'</a>';
				$s .= '<p id="'.$containerid.'"></p>';
			} else {// 未填写
				$s .= "<div id=\"$containerid\">".showdistrict($vals, $elems, $containerid, null, $containertype).'</div>';
			}
		} elseif($type == 'file') {
			$s .= '<input type="'.$type.'" name="'.$varname.'" class="pf" value="'.dhtmlspecialchars($value).'" />';
		} elseif($type == 'mfile') {
			$s .= '<label for="'.$settingvar.'way_remote"'.' class="lb"><input type="radio" name="'.$settingvar.'_chk" id="'.$settingvar.'way_remote" class="pr" onclick="showpicedit(\''.$settingvar.'\');" checked="checked">'.lang('portalcp', 'remote').'</label>';
			$s .= '<label for="'.$settingvar.'way_upload"'.' class="lb"><input type="radio" name="'.$settingvar.'_chk" id="'.$settingvar.'way_upload" class="pr" onclick="showpicedit(\''.$settingvar.'\');">'.lang('portalcp', 'upload').'</label><br />';
			$s .= '<input type="text" name="'.$varname.'" id="'.$settingvar.'_remote" class="px" value="'.dhtmlspecialchars($value).'" />';
			$s .= '<input type="file" name="'.$settingvar.'" id="'.$settingvar.'_upload" class="pf" value="" style="display:none" />';
		} else {
			$s .= $type;
		}
		$return[] = array('title' => $setname, 'html' => $s, 'comment'=>$comment);
	}
	return $return;
}
/**
 * 更新block item 数据
 *
 * @param int $bid - block id
 * @param array $items - block item 格式的数据列表
 */
function block_updateitem($bid, $items=array()) {
	global $_G;
	$block = $_G['block'][$bid];
	if(!$block) {
		if(!($block = C::t('common_block')->fetch($bid))) {
			return false;
		}
		$_G['block'][$bid] = $block;
	}
	$block['shownum'] = max($block['shownum'], 1);// 至少一条数据
	$showlist = array();// 模块当前的数据
	$archivelist = array(); // 移动到 archive的数据
	$prelist = array(); // 预定数据
	
	$oldvalue = $fixedvalue = $fixedkeys = array();

	foreach(C::t('common_block_item')->fetch_all_by_bid($bid, true) as $value) {
		$key = $value['idtype'].'_'.$value['id'];
		// 保存固定数据
		if($value['itemtype'] == '1') {
			//固定数据：因有预定数据所以一个位置可以有多条数据
			$fixedvalue[$value['displayorder']][] = $value;
			$fixedkeys[$key] = 1;
			continue;
		//数据没有重复
		} elseif(!isset($oldvalue[$key])) {
			$oldvalue[$key] = $value;
		//删除重复的数据
		} else {
			$archivelist[$value['itemid']] = 1;
		}
	}

	$processkeys = array();
	$itemcount = count($items); //源数据的总数
	//处理新的数据
	for($k = 0; $k < $itemcount; $k++) {
		$v = $items[$k];
		$key = $v['idtype'].'_'.$v['id'];
		//已经是固定数据，则清空此数据
		if(isset($fixedkeys[$key])) {
			$items[$k] = null;
		//新数据与原显示数据相同 && 没有处理过$key
		} elseif(isset($oldvalue[$key]) && !isset($processkeys[$key])) {
			//被修改过则保留修改过的值:2此记录被修改过，3为推送数据
			if($oldvalue[$key]['itemtype'] == '2') {
				$items[$k] = $oldvalue[$key];//保存修改过的值
			} else {
				$items[$k]['itemid'] = $oldvalue[$key]['itemid'];//保留自增itemid
			}
			unset($oldvalue[$key]);//清空此值，$oldvalue数组中最终保留的数据将删除
			$processkeys[$key] = 1;
		//已经处理过的$key，即有相同的数据时删除此条相同数据
		} elseif(isset($processkeys[$key])) {
			unset($items[$k]);
		}
	}

	//清理空值
	$items = array_filter($items);

	//$oldvalue中保留的数据为要要删除的信息
	foreach($oldvalue as $value) {
		$archivelist[$value['itemid']] = 1;
	}
	//按位置循环填充数据
	for($i = 1; $i <= $block['shownum']; $i++) {
		$jump = false; //源数据是否顺延下一位使用
		//有固定位置数据
		if(isset($fixedvalue[$i])) {
			foreach($fixedvalue[$i] as $value) {
				if($value['startdate'] > TIMESTAMP) {// 预定数据
					$prelist[] = $value; //保存数据
				} elseif((!$value['startdate'] || $value['startdate'] <= TIMESTAMP)
						&& (!$value['enddate'] || $value['enddate'] > TIMESTAMP)) {// 当前显示
					$showlist[] = $value; //保存数据
					$jump = true; //当前位置有固定数据，则源数据顺延下一位使用
				} else {// 过期的
					$archivelist[$value['itemid']] = 1;
				}
			}
		}
		if(!$jump) {
			//从items的开关移出一个单元，保存数据
			$curitem = array();
			if(!($curitem = array_shift($items))) {
				break;
			}
			$curitem['displayorder'] = $i; //更新显示位置

			//处理缩略图
			$curitem['makethumb'] = 0;
			if($block['picwidth'] && $block['picheight'] && $curitem['picflag']) { //picflag=0为url地址
				$thumbpath = empty($curitem['thumbpath']) ? block_thumbpath($block, $curitem) : $curitem['thumbpath'];
				//开启远程上传图片
				if($_G['setting']['ftp']['on']) {
					//打开FTP
					if(empty($ftp) || empty($ftp->connectid)) {
						$ftp = & discuz_ftp::instance();
						$ftp->connect();
					}
					//检查文件是否已经存在，存在则标识为已生成缩略图
					if($ftp->ftp_size($thumbpath) > 0) {
						$curitem['makethumb'] = 1;
						$curitem['picflag'] = 2;
					}
				//保存到本地缩略图片
				} else if(file_exists($_G['setting']['attachdir'].$thumbpath)) {
					$curitem['makethumb'] = 1;
					$curitem['picflag'] = 1;
					//保存缩略图地址
				}
				$curitem['thumbpath'] = $thumbpath; //记录缩略图名
			}
			//序列化 fields
			if(is_array($curitem['fields'])) {
				$curitem['fields'] = serialize($curitem['fields']);
			}

			$showlist[] = $curitem; //保存数据
		}
	}
	//删除相同数据中未再次使用的数据
	foreach($items as $value) {
		if(!empty($value['itemid'])) { //有itemid的为相同的数据
			$archivelist[$value['itemid']] = 1;
		}
	}
	// 存档 （note： 已修改为不存档，直接删除）
	if($archivelist) {
		$delids = array_keys($archivelist);
		C::t('common_block_item')->delete_by_itemid_bid($delids, $bid);
		//删除模块相关的图片
		block_delete_pic($bid, $delids);
	}
	// 更新 item数据
	$inserts = $itemlist = array();
	$itemlist = array_merge($showlist, $prelist);
	C::t('common_block_item')->insert_batch($bid, $itemlist);

	// 去掉空item
	$showlist = array_filter($showlist);
	return $showlist;
}

/**
 * 返回 block 的缩略图路径
 * @param unknown_type $block
 * @param unknown_type $item
 */
function block_thumbpath($block, $item) {
	global $_G;
	$hash = md5($item['pic'].'-'.$item['picflag'].':'.$block['picwidth'].'|'.$block['picheight']);
	return 'block/'.substr($hash, 0, 2).'/'.$hash.'.jpg';
}

/**
 * 获取模块分类
 * @param unknown_type $classname
 */
function block_getclass($classname, $getstyle=false) {
	global $_G;
	if(!isset($_G['cache']['blockclass'])) {
		loadcache('blockclass');
	}
	$theclass = array();
	list($c1, $c2) = explode('_', $classname);
	if(is_array($_G['cache']['blockclass']) && isset($_G['cache']['blockclass'][$c1]['subs'][$classname])) {
		$theclass = $_G['cache']['blockclass'][$c1]['subs'][$classname];
		if($getstyle && !isset($theclass['style'])) {
			foreach(C::t('common_block_style')->fetch_all_by_blockclass($classname) as $value) {
				$value['template'] = !empty($value['template']) ? (array)(dunserialize($value['template'])) : array();
				$value['fields'] = !empty($value['fields']) ? (array)(dunserialize($value['fields'])) : array();
				$key = 'blockstyle_'.$value['styleid'];
				$_G[$key] = $value;
				$theclass['style'][$value['styleid']] = $value;
			}
			$_G['cache']['blockclass'][$c1]['subs'][$classname] = $theclass;
		}
	}
	return $theclass;
}

/**
 * 通过模块关联模板找到diy页面
 * @param <type> $tplname
 * @param <type> $diymode
 */
function block_getdiyurl($tplname, $diymod = false) {
	$mod = $id = $script = $url = '';
	$flag = 0; //0独立模块， 1共享模块, 2未使用模块
	if (empty ($tplname)) {
		$flag = 2;
	} else {
		list($script,$tpl) = explode('/',$tplname);
		if (!empty($tpl)) {
			$arr = array();
			preg_match_all('/(.*)\_(\d{1,9})/', $tpl,$arr);
			$mod = empty($arr[1][0]) ? $tpl : $arr[1][0];
			$id = max(intval($arr[2][0]),0);
			if($script == 'ranklist') {
				$script = 'misc';
				$mod = 'ranklist&type='.$mod;
			} else {
				switch ($mod) {
					case 'index' :
						$mod = 'index';
						break;
					case 'discuz' :
						$flag = 0;
						if($id){
							$mod = 'index&gid='.$id;
						} else {
							$mod = 'index';
						}
						break;
					case 'space_home' :
						$mod = 'space';
						break;
					case 'forumdisplay' :
						$flag = $id ? 0 : 1;
						$mod .= '&fid='.$id;
						break;
					case 'viewthread' :
						$flag = $id ? 0 : 1;
						$mod = 'forumdisplay&fid='.$id;
						break;
					case 'list' :
						$flag = $id ? 0 : 1;
						$mod .= '&catid='.$id;
						break;
					case 'portal_topic_content' :
						$flag = $id ? 0 : 1;
						$mod = 'topic&topicid='.$id;
						break;
					case 'view' :
						$flag = $id ? 0 : 1;
						$mod .= '&aid='.$id;
						break;
					default :
						break;
				}
			}
		}
		$url = empty($mod) || $flag == '1' ? '' : $script.'.php?mod='.$mod.($diymod?'&diy=yes':'');
	}
	return array('url'=>$url,'flag'=>$flag);
}

/**
 * 删除未使用的模块
 *
 */
function block_clear() {
	$uselessbids = $usingbids = $bids = array();
	$bids = C::t('common_block')->fetch_all_bid_by_blocktype(0,1000);
	$usingbids = array_keys(C::t('common_template_block')->fetch_all_by_bid($bids));
	$uselessbids = array_diff($bids, $usingbids);
	if (!empty($uselessbids)) {
		C::t('common_block_item')->delete_by_bid($uselessbids);//模块显示数据
		C::t('common_block_item_data')->delete_by_bid($uselessbids);//模块推送数据
		C::t('common_block_favorite')->delete_by_bid($uselessbids);//模块收藏数据
		C::t('common_block_permission')->delete_by_bid_uid_inheritedtplname($uselessbids); //模块权限数据
		C::t('common_block')->delete($uselessbids);//模块
		C::t('common_block')->optimize();
		C::t('common_block_item')->optimize();
		//清除模块相关的图片
		block_delete_pic($uselessbids);
	}
}

function block_getstyle($styleids = array()) {
	global $_G;
	static $allowmem = null, $cachettl =null;
	if($allowmem === null) {
		$allowmem = ($cachettl = getglobal('setting/memory/diyblock')) !== null && memory('check');
	}

	$pre = 'blockstyle_';
	if(($ret = $styleids && !is_array($styleids) ? $styleids : false)) {
		if($_G[$pre.$ret]) {
			return $_G[$pre.$ret];
		} else {
			$styleids = (array)$styleids;
		}
	}
	$cacheprekey = 'blockstylecache_';
	$styleids = array_map('intval', $styleids);
	$styleids = array_unique($styleids);

	if($styleids) {
		//从缓存中获取
		if($allowmem) {
			if(($cachedata = memory('get', $styleids, $cacheprekey)) !== false) {
				foreach ($cachedata as $styleid => $style) {
					$_G[$pre.$styleid] = $style;
				}
				if(!($styleids = array_diff($styleids, array_keys($cachedata)))) {
					return $ret ? $_G[$pre.$ret] : true;
				}
			}
		}

		// 批量加载模块样式
		if($styleids) {
			foreach(C::t('common_block_style')->fetch_all($styleids) as $styleid => $value) {
				$value['template'] = !empty($value['template']) ? (array)(dunserialize($value['template'])) : array();
				$value['fields'] = !empty($value['fields']) ? (array)(dunserialize($value['fields'])) : array();
				$_G[$pre.$styleid] = $value;
				//缓存数据
				if($allowmem) {
					memory('set', $cacheprekey.$styleid, $_G[$pre.$styleid], $cachettl);
				}
			}
		}
		return $ret ? $_G[$pre.$ret] : true;
	}
	return array();
}

/**
 * 生成模块分类缓存
 */
function blockclass_cache() {
	global $_G;
	$data = $dirs = $styles = $dataconvert = array();
	$dir = DISCUZ_ROOT.'/source/class/block/';
	$dh = opendir($dir);
	while(($filename=readdir($dh))) {
		if(is_dir($dir.$filename) && substr($filename,0,1) != '.') {
			$dirs[$filename] = $dir.$filename.'/';
		}
	}
	ksort($dirs);
	// 扫描目录中的模块
	foreach($dirs as $name=>$dir) {
		// 大分类
		$blockclass = $blockconvert = array();
		if(file_exists($dir.'blockclass.php')) {
			include_once($dir.'blockclass.php');
		}
		if(empty($blockclass['name'])) {
			$blockclass['name'] = $name;
		} else {
			$blockclass['name'] = dhtmlspecialchars($blockclass['name']);
		}
		$blockclass['subs'] = array();

		$dh = opendir($dir);
		while(($filename = readdir($dh))) {
			$match = $infos = $oneinfo = $fieldsconvert = array();
			$scriptname = $scriptclass = '';
			// 查找 block_[name].php 命名的文件，检查是否包含合法的模块数据类
			if(preg_match('/^(block_[\w]+)\.php$/i', $filename, $match)) {
				$scriptclass = $match[1];
				$scriptname = preg_replace('/^block_/i', '', $scriptclass);
				include_once $dir.$filename;
				if(class_exists($scriptclass, false)) {
					$obj = new $scriptclass();
					if(method_exists($obj, 'name') && method_exists($obj, 'blockclass') && method_exists($obj, 'fields')
							&& method_exists($obj, 'getsetting') && method_exists($obj, 'getdata')) {
						if($scriptclass == 'block_xml') {
							foreach($obj->blockdata as $one) {
								$oneinfo['name'] = dhtmlspecialchars($one['data']['name']);
								//覆盖子类的KEY，一个XML地址属于XML大类下的一个小类
								$oneinfo['blockclass'] = array($one['id'], $oneinfo['name']);
								$oneinfo['fields'] = dhtmlspecialchars($one['data']['fields']);

								// 解析模板
								foreach($one['data']['style'] as $value) {
									$arr = array(
										'blockclass'=>'xml_'.$one['id'],
										'name' => dhtmlspecialchars($value['name']),
									);
									block_parse_template($value['template'], $arr);
									$styles[$arr['hash']] = $arr;
								}
								$infos[] = $oneinfo;
							}
						} else {
							$oneinfo['name'] = $obj->name();
							$oneinfo['blockclass'] = $obj->blockclass();
							$oneinfo['fields'] = $obj->fields();
							$infos[] = $oneinfo;
						}
					}
					//可相互转换模块类型的数据
					if(method_exists($obj, 'fieldsconvert')) {
						$fieldsconvert = $obj->fieldsconvert();
					}
				}
			}
			foreach($infos as $info) {
				// 是合法的数据类，需要有 name 和 blockclass
				if($info['name'] && is_array($info['blockclass']) && $info['blockclass'][0] && $info['blockclass'][1]) {
					list($key, $title) = $info['blockclass'];
					$key = $name.'_'.$key;
					// 模块分类
					if(!isset($blockclass['subs'][$key])) {
						$blockclass['subs'][$key] = array(
							'name' => $title,
							'fields' => $info['fields'],
							'script' => array()
						);
					}
					// 向分类中添加数据调用类
					$blockclass['subs'][$key]['script'][$scriptname] = $info['name'];
					if(!isset($blockconvert[$key]) && !empty($fieldsconvert)) {
						$blockconvert[$key] = $fieldsconvert;
					}
				}
			}
		}//note #endof# while(($filename = readdir($dh))) {

		// 该目录下还有合法的模块数据调用类
		if($blockclass['subs']) {
			$data[$name] = $blockclass;

			// 检查默认模块样式
			$blockstyle = array();
			if(file_exists($dir.'blockstyle.php')) {
				include_once($dir.'blockstyle.php');
			}
			if($blockstyle) {
				// 解析模板
				foreach($blockstyle as $value) {
					$arr = array(
						'blockclass'=>$name.'_'.$value['blockclass'],
						'name' => $value['name']
					);
					block_parse_template($value['template'], $arr);
					$styles[$arr['hash']] = $arr;
				}
			}
		}

		//保存可相互转换模块类型的数据
		if(!empty($blockconvert)) {
			$dataconvert[$name] = $blockconvert;
		}

	}

	// 处理默认样式
	if($styles) {
		// 检查是否已经存在
		$hashes = array_keys($styles);
		foreach(C::t('common_block_style')->fetch_all_by_hash($hashes) as $value) {
			unset($styles[$value['hash']]);
		}
		// 添加新的
		if($styles) {
			C::t('common_block_style')->insert_batch($styles);
		}
	}
	savecache('blockclass', $data);
	// 注意此缓存为blockclass的子缓存，所以没有updatecache('blockconvert');。updatecache('blockclass')方法将一起更新这两个缓存。
	savecache('blockconvert', $dataconvert);
}

function block_parse_template($str_template, &$arr) {

	// 检测是否需要生成缩略图
	$arr['makethumb'] = strexists($str_template, '{picwidth}') ? 1 : 0;
	// 检测是否需要获取pic
	$arr['getpic'] = strexists($str_template, '{pic}') ? 1 : 0;
	// 检测是否需要获取summary
	$arr['getsummary'] = strexists($str_template, '{summary}') ? 1 : 0;
	// 检测是否需要设置链接打开方式
	$arr['settarget'] = strexists($str_template, '{target}') ? 1 : 0;
	// 检测是否更多链接
	$arr['moreurl'] = strexists($str_template, '{moreurl}') ? 1 : 0;
	// 模板中使用的字段
	$fields = block_parse_fields($str_template);
	$arr['fields'] = serialize($fields);

	// 解析模板
	$template = array();
	$template['raw'] = $str_template;
	$template['header'] = $template['footer'] = '';
	$template['loop'] = $template['loopplus'] = $template['order'] = $template['orderplus'] = $template['index'] = $template['indexplus'] = array();

	// 模板循环部分
	$match = array();
	if(preg_match('/\[loop\](.*?)\[\/loop]/is', $str_template, $match)) {
		$template['loop'] = trim($match[1]);
	}
	$match = array();
	if(preg_match_all('/\[(loop\d)\](.*?)\[\/\\1]/is', $str_template, $match)) {
		foreach($match[1] as $key=>$value) {
			$content = trim($match[2][$key]);
			$k = intval(str_replace('loop', '', $value));
			$template['loopplus'][$k] = $content;
		}
	}
	// 指定顺序部分
	$match = array();
	if(preg_match_all('/\[order=(\d+|odd|even)\](.*?)\[\/order]/is', $str_template, $match)) {
		foreach($match[1] as $key => $order) {
			$template['order'][$order] = trim($match[2][$key]);
		}
	}
	$match = array();
	if(preg_match_all('/\[(order\d+)=(\d+|odd|even)\](.*?)\[\/\\1]/is', $str_template, $match)) {
		foreach($match[1] as $key=>$value) {
			$content = trim($match[3][$key]);
			$order = $match[2][$key];
			$k = intval(str_replace('order', '', $value));
			$template['orderplus'][$k][$order] = $content;
		}
	}
	// 指定数据部分
	$match = array();
	if(preg_match_all('/\[index=(\d+)\](.*?)\[\/index]/is', $str_template, $match)) {
		foreach($match[1] as $key=>$order) {
			$template['index'][$order] = trim($match[2][$key]);
		}
	}
	$match = array();
	if(preg_match_all('/\[(index\d+)=(\d+)\](.*?)\[\/\\1]/is', $str_template, $match)) {
		foreach($match[1] as $key=>$value) {
			$content = trim($match[3][$key]);
			$order = intval($match[2][$key]);
			$k = intval(str_replace('index', '', $value));
			$template['indexplus'][$k][$order] = $content;
		}
	}
	$arr['template'] = serialize($template);
	$arr['hash'] = substr(md5($arr['blockclass'].'|'.$arr['template']), 8, 8);
}

/**
 * 解析模板中用到的字段
 * @param <type> $template
 */
function block_parse_fields($template) {
	$fields = array();
	if(preg_match_all('/\{(\w+)\}/', $template, $matches)) {
		foreach($matches[1] as $fieldname) {
			$fields[] = $fieldname;
		}
		$fields = array_unique($fields);
		$fields = array_diff($fields, array('picwidth', 'picheight', 'target', ''));
		$fields = array_values($fields);
	}
	return $fields;
}

/**
 * 组装模块样式模板
 * @param <type> $style
 */
function block_build_template($template) {
	if(! is_array($template)) {
		return $template;
	}
	if(!empty($template['raw'])) {//note 新的模板数据里保留了原始的模板
		return $template['raw'];
	}
	// 兼容以前的模板
	$str_template = $template['header'];
	if($template['loop']) {
		$str_template .= "\n[loop]\n{$template['loop']}\n[/loop]";
	}
	if(!empty($template['order']) && is_array($template['order'])) {
		foreach($template['order'] as $key=>$value) {
			$str_template .= "\n[order={$key}]\n{$value}\n[/order]";
		}
	}
	$str_template .= $template['footer'];
	return $str_template;
}

/**
 * 模块是否含推荐库（可被推荐数据）
 * @param <type> $block
 */
function block_isrecommendable($block) {
	return !empty($block) && in_array($block['blockclass'], array('forum_thread', 'group_thread', 'portal_article', 'space_pic', 'space_blog')) ? true : false;
}

/**
 * 删除模块相关的图片
 * @param int $bid 模块ID
 * @param array $itemid 模块记录ID
 */
function block_delete_pic($bid, $itemid = array()) {
	global $_G;
	if(!empty($bid)) {
		$picids = array();
		foreach(C::t('common_block_pic')->fetch_all_by_bid_itemid($bid, $itemid) as $value) {
			$picids[$value['picid']] = $value['picid'];
			if($value['picflag']) {
				ftpcmd('delete', $value['pic']);
			} else {
				@unlink($_G['setting']['attachdir'].'/'.$value['pic']);
			}
		}
		if(!empty($picids)) {
			C::t('common_block_pic')->delete($picids);
		}
	}
}

/**
 * 更新页面和模块的关系
 * @param string $targettplname 页面名称
 * @param array $blocks 模块IDS
 */
function update_template_block($targettplname, $tpldirectory, $blocks) {
	//更新模板中包含的模块（bid）
	if(!empty($targettplname)) {
		if(empty($blocks)) {
			C::t('common_template_block')->delete_by_targettplname($targettplname, $tpldirectory);
		} else {
			//原所有BIDS
			$oldbids = array();
			$oldbids = array_keys(C::t('common_template_block')->fetch_all_by_targettplname($targettplname, $tpldirectory));
			//新增加的BIDS
			$newaddbids = array_diff($blocks, $oldbids);
			//清空原关联关系
			C::t('common_template_block')->delete_by_targettplname($targettplname, $tpldirectory);
			if($tpldirectory === './template/default') {
				C::t('common_template_block')->delete_by_targettplname($targettplname, '');
			}
			//唯一性处理
			$blocks = array_unique($blocks);
			//保存新的关联关系
			C::t('common_template_block')->insert_batch($targettplname, $tpldirectory, $blocks);
			//更新模块的权限
			if(!empty($newaddbids)) {
				require_once libfile('class/blockpermission');
				$tplpermission = & template_permission::instance();
				$tplpermission->add_blocks($targettplname, $newaddbids);
			}
		}
	}
}
?>