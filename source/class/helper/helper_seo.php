<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: helper_seo.php 32836 2013-03-14 08:10:02Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class helper_seo {


	/**
	 * 获取 SEO设置
	 * @param string $page 调用哪个页面的
	 * @param array $data 可替换数据
	 * @return array('seotitle', 'seodescription', 'seokeywords')
	 */
	public static function get_seosetting($page, $data = array(), $defset = array()) {
		global $_G;
		$searchs = array('{bbname}');
		$replaces = array($_G['setting']['bbname']);

		$seotitle = $seodescription = $seokeywords = '';
		$titletext = $defset['seotitle'] ? $defset['seotitle'] : $_G['setting']['seotitle'][$page];
		$descriptiontext = $defset['seodescription'] ? $defset['seodescription'] : $_G['setting']['seodescription'][$page];
		$keywordstext = $defset['seokeywords'] ? $defset['seokeywords'] : $_G['setting']['seokeywords'][$page];
		preg_match_all("/\{([a-z0-9_-]+?)\}/", $titletext.$descriptiontext.$keywordstext, $pageparams);
		if($pageparams) {
			foreach($pageparams[1] as $var) {
				$searchs[] = '{'.$var.'}';
				//处理分页，分页数大于1时显示
				if($var == 'page') {
					$data['page'] = $data['page'] > 1 ? lang('core', 'page', array('page' => $data['page'])) : '';
				}
				$replaces[] = $data[$var] ? strip_tags($data[$var]) : '';
			}
			if($titletext) {
				$seotitle = helper_seo::strreplace_strip_split($searchs, $replaces, $titletext);
			}
			if($descriptiontext && (isset($_G['makehtml']) || CURSCRIPT == 'forum' || IS_ROBOT || $_G['adminid'] == 1)) {
				$seodescription = helper_seo::strreplace_strip_split($searchs, $replaces, $descriptiontext);
			}
			if($keywordstext && (isset($_G['makehtml']) || CURSCRIPT == 'forum' || IS_ROBOT || $_G['adminid'] == 1)) {
				$seokeywords = helper_seo::strreplace_strip_split($searchs, $replaces, $keywordstext);
			}
		}
		return array($seotitle, $seodescription, $seokeywords);
	}


	/**
	 * 需处理连续分隔符的str_replace()
	 * @param array $searchs 被替换的数组
	 * @param array $replaces 用于替换的数组
	 * @param string $str 目标字符串
	 */
	public static function strreplace_strip_split($searchs, $replaces, $str) {
		$searchspace = array('((\s*\-\s*)+)', '((\s*\,\s*)+)', '((\s*\|\s*)+)', '((\s*\t\s*)+)', '((\s*_\s*)+)');
		$replacespace = array('-', ',', '|', ' ', '_');
		return trim(preg_replace($searchspace, $replacespace, str_replace($searchs, $replaces, $str)), ' ,-|_');
	}

	/**
	 * 返回带第几页的title
	 * @global  $_G
	 * @param string $navtitle 源标题
	 * @param int $page 页码
	 * @return string
	 */
	public static function get_title_page($navtitle, $page){
		if($page > 1) {
			$navtitle .= ' - '.lang('core', 'page', array('page' => $page));
		}
		return $navtitle;
	}

	/**
	 * 获取批定类型的关联连接
	 *
	 * @param string $extent 内容所需关联链接范围　article, forum, group, blog
	 * @return string 有效的关联链接
	 */
	public static function get_related_link($extent) {
		global $_G;
		loadcache('relatedlink');
		$allextent = array('article' => 0, 'forum' => 1, 'group' => 2, 'blog' => 3);
		$links = array();
		if($_G['cache']['relatedlink'] && isset($allextent[$extent])) {
			foreach($_G['cache']['relatedlink'] as $link) {
				$link['extent'] = sprintf('%04b', $link['extent']);
				if($link['extent'][$allextent[$extent]] && $link['name'] && $link['url']) {
					$links[] = daddslashes($link);
				}
			}
		}
		rsort($links);
		return $links;
	}

	/**
	 * 在给定内容中加入关联连接
	 *
	 * @param string $content 需要加入关联链接的内容
	 * @param string $extent 内容所需关联链接范围　article, forum, group, blog
	 * @return string 变更后的内容
	 */
	public static function parse_related_link($content, $extent) {
		global $_G;
		loadcache('relatedlink');
		$allextent = array('article' => 0, 'forum' => 1, 'group' => 2, 'blog' => 3);
		if($_G['cache']['relatedlink'] && isset($allextent[$extent])) {
			$searcharray = $replacearray = array();
			foreach($_G['cache']['relatedlink'] as $link) {
				$link['extent'] = sprintf('%04b', $link['extent']);
				if($link['extent'][$allextent[$extent]] && $link['name'] && $link['url']) {
					$searcharray[$link[name]] = '/('.preg_quote($link['name']).')/i';
					$replacearray[$link[name]] = "<a href=\"$link[url]\" target=\"_blank\" class=\"relatedlink\">$link[name]</a>";
				}
			}
			if($searcharray && $replacearray) {
				$_G['trunsform_tmp'] = array();
				$content = preg_replace("/(<script\s+.*?>.*?<\/script>)|(<a\s+.*?>.*?<\/a>)|(<img\s+.*?[\/]?>)|(\[attach\](\d+)\[\/attach\])/ies", "helper_seo::base64_transform('encode', '<relatedlink>', '\\1\\2\\3\\4', '</relatedlink>')", $content);
				$content = preg_replace($searcharray, $replacearray, $content, 1);
				$content = preg_replace("/<relatedlink>(.*?)<\/relatedlink>/ies", "helper_seo::base64_transform('decode', '', '\\1', '')", $content);
			}
		}
		return $content;
	}


	/**
	 * 用于正则替换的特殊base64
	 *
	 * @param string $type encode OR decode
	 * @param string $prefix 结果前缀
	 * @param string $string 要操作的字符串
	 * @param string $suffix 结果后缀
	 * @return string 变更后的内容
	 */
	public static function base64_transform($type, $prefix, $string, $suffix) {
		global $_G;
		if($type == 'encode') {
			$_G['trunsform_tmp'][] = base64_encode(str_replace("\\\"", "\"", $string));
			return $prefix.(count($_G['trunsform_tmp']) - 1).$suffix;
		} elseif($type == 'decode') {
			return $prefix.base64_decode($_G['trunsform_tmp'][$string]).$suffix;
		}
	}
}

?>