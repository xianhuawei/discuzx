<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: helper_page.php 33588 2013-07-12 06:34:56Z hypowang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class helper_page {


	/**
	* 分页
	* @param $num - 总数
	* @param $perpage - 每页数
	* @param $curpage - 当前页
	* @param $mpurl - 跳转的路径
	* @param $maxpages - 允许显示的最大页数
	* @param $page - 最多显示多少页码
	* @param $autogoto - 最后一页，自动跳转
	* @param $simple - 是否简洁模式（简洁模式不显示上一页、下一页和页码跳转）
	* @param $jsfunc - js callback 
	* @return 返回分页代码
	*/
	public static function multi($num, $perpage, $curpage, $mpurl, $maxpages = 0, $page = 10, $autogoto = FALSE, $simple = FALSE, $jsfunc = FALSE) {
		global $_G;
		//debug 加入 ajaxtarget 属性
		$ajaxtarget = !empty($_GET['ajaxtarget']) ? " ajaxtarget=\"".dhtmlspecialchars($_GET['ajaxtarget'])."\" " : '';

		//note 处理#描点
		$a_name = '';
                
                //处理特殊字符
                $mpurl = str_replace(array("'", '"', "\\"), array('%27', '%22', '%5c'), $mpurl);

		if(strpos($mpurl, '#') !== FALSE) {
			$a_strs = explode('#', $mpurl);
			$mpurl = $a_strs[0];
			$a_name = '#'.$a_strs[1];
		}
		if($jsfunc !== FALSE) {
			$mpurl = 'javascript:'.$mpurl;
			$a_name = $jsfunc;
			$pagevar = '';
		} else {
			//非JS模式下输出page=
			$pagevar = 'page=';
		}

		if(defined('IN_ADMINCP')) {
			$shownum = $showkbd = TRUE;
			$showpagejump = FALSE;
			$lang['prev'] = '&lsaquo;&lsaquo;';
			$lang['next'] = '&rsaquo;&rsaquo;';
		} else {
			$shownum = $showkbd = FALSE;
			$showpagejump = TRUE;
			//noteX 手机模式下使用语言包的上下翻页(IN_MOBILE)
			if(defined('IN_MOBILE') && !defined('TPL_DEFAULT')) {
				$lang['prev'] = lang('core', 'prevpage');
				$lang['next'] = lang('core', 'nextpage');
			} else {
				$lang['prev'] = '&nbsp;&nbsp;';
				$lang['next'] = lang('core', 'nextpage');
			}
			$lang['pageunit'] = lang('core', 'pageunit');
			$lang['total'] = lang('core', 'total');
			$lang['pagejumptip'] = lang('core', 'pagejumptip');
		}
		//noteX 手机模式下使用较小的页数和小点(IN_MOBILE)
		if(defined('IN_MOBILE') && !defined('TPL_DEFAULT')) {
			$dot = '..';
			$page = intval($page) < 10 && intval($page) > 0 ? $page : 4 ;
		} else {
			$dot = '...';
		}
		$multipage = '';
		if($jsfunc === FALSE) {
			$mpurl .= strpos($mpurl, '?') !== FALSE ? '&amp;' : '?';
		}

		$realpages = 1;
		$_G['page_next'] = 0;
		$page -= strlen($curpage) - 1;
		if($page <= 0) {
			$page = 1;
		}
		if($num > $perpage) {

			$offset = floor($page * 0.5);

			$realpages = @ceil($num / $perpage);
			$curpage = $curpage > $realpages ? $realpages : $curpage;
			$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

			if($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				$from = $curpage - $offset;
				$to = $from + $page - 1;
				if($from < 1) {
					$to = $curpage + 1 - $from;
					$from = 1;
					if($to - $from < $page) {
						$to = $page;
					}
				} elseif($to > $pages) {
					$from = $pages - $page + 1;
					$to = $pages;
				}
			}
			$_G['page_next'] = $to;
			$multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="'.(self::mpurl($mpurl, $pagevar, 1)).$a_name.'" class="first"'.$ajaxtarget.'>1 '.$dot.'</a>' : '').
			($curpage > 1 && !$simple ? '<a href="'.(self::mpurl($mpurl, $pagevar, $curpage - 1)).$a_name.'" class="prev"'.$ajaxtarget.'>'.$lang['prev'].'</a>' : '');
			for($i = $from; $i <= $to; $i++) {
				$multipage .= $i == $curpage ? '<strong>'.$i.'</strong>' :
				'<a href="'.(self::mpurl($mpurl, $pagevar, $i)).($ajaxtarget && $i == $pages && $autogoto ? '#' : $a_name).'"'.$ajaxtarget.'>'.$i.'</a>';
			}

			$wml = defined('IN_MOBILE') && IN_MOBILE == 3;
			$jsurl = '';
			if(($showpagejump || $showkbd) && !$simple && !$ajaxtarget && !$wml) {
				$jsurl = $mpurl.(strpos($mpurl, '{page}') !== false ? '\'.replace(\'{page}\', this.value == 1 ? \'\' : this.value)': $pagevar.'\'+this.value;').'; doane(event);';
			}

			$multipage .= ($to < $pages ? '<a href="'.(self::mpurl($mpurl, $pagevar, $pages)).$a_name.'" class="last"'.$ajaxtarget.'>'.$dot.' '.$realpages.'</a>' : '').
			($showpagejump && !$simple && !$ajaxtarget && !$wml ? '<label><input type="text" name="custompage" class="px" size="2" title="'.$lang['pagejumptip'].'" value="'.$curpage.'" onkeydown="if(event.keyCode==13) {window.location=\''.$jsurl.'}" /><span title="'.$lang['total'].' '.$pages.' '.$lang['pageunit'].'"> / '.$pages.' '.$lang['pageunit'].'</span></label>' : '').
			($curpage < $pages && !$simple ? '<a href="'.(self::mpurl($mpurl, $pagevar, $curpage + 1)).$a_name.'" class="nxt"'.$ajaxtarget.'>'.$lang['next'].'</a>' : '').
			($showkbd && !$simple && $pages > $page && !$ajaxtarget && !$wml ? '<kbd><input type="text" name="custompage" size="3" onkeydown="if(event.keyCode==13) {window.location=\''.$jsurl.'}" /></kbd>' : '');

			$multipage = $multipage ? '<div class="pg">'.($shownum && !$simple ? '<em>&nbsp;'.$num.'&nbsp;</em>' : '').$multipage.'</div>' : '';
		}
		$maxpage = $realpages;
		return $multipage;
	}

	public static function mpurl($mpurl, $pagevar, $page) {
		if(strpos($mpurl, '{page}') !== false) {
			return trim(str_replace('{page}', ($page == 1 ? '' : $page), $mpurl), '?');
		} else {
			$separator = '';
			if($pagevar[0] !== '&' && $pagevar[0] !== '?') {
				if(strpos($mpurl, '?') !== FALSE) {
					$separator = '';
				} else {
					$separator = '?';
				}
			}
			return $mpurl.$separator.$pagevar.$page;
		}
	}
	/**
	* 只有上一页下一页的分页（无需知道数据总数）
	* @param $num - 本次所取数据条数
	* @param $perpage - 每页数
	* @param $curpage - 当前页
	* @param $mpurl - 跳转的路径
	* @return 返回分页代码
	*/
	public static function simplepage($num, $perpage, $curpage, $mpurl) {
		$return = '';
		$lang['next'] = lang('core', 'nextpage');
		$lang['prev'] = lang('core', 'prevpage');
		$next = $num == $perpage ? '<a href="'.(self::mpurl($mpurl, '&amp;page=', $curpage + 1)).'" class="nxt">'.$lang['next'].'</a>' : '';
		$prev = $curpage > 1 ? '<span class="pgb"><a href="'.(self::mpurl($mpurl, '&amp;page=', $curpage - 1)).'">'.$lang['prev'].'</a></span>' : '';
		if($next || $prev) {
			$return = '<div class="pg">'.$prev.$next.'</div>';
		}
		return $return;
	}
}

?>