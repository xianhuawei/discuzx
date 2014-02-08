<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_levfire {

	public static $PL_G, $_G, $PLNAME, $PLSTATIC, $PLURL, $lang = array(), $table, $navtitle, $uploadurl, $remote, $talk;
	public static $lm;

	public function __construct() {
		self::_init();
		self::$lang = self::_levlang();
	}

	public static function global_header() {
		global $_G, $todayposts, $postdata, $posts, $onlinenum, $membercount, $invisiblecount,$onlineinfo,
			   $guestcount, $whosonline, $forum, $forumlist, $catlist, $sublist;//print_r($whosonline);
		$_PLG = self::$PL_G;
		$date = intval((TIMESTAMP - strtotime($_PLG['startdate'])) /3600);
		$hour = date('H', TIMESTAMP);
		$mins = date('i', TIMESTAMP);
		$secs = 1;
		if (self::_isopen('secs')) {
			$secs = intval((TIMESTAMP - strtotime(date('Ymd', TIMESTAMP)))/2);
		}
		$todayposts += $_PLG['todayposts'] * $hour + $secs;//今日
		$postdata[0]+= $_PLG['yesterdays'] * 23 + ($secs ? 43200 : 0);//昨日
		$posts += $_PLG['posts'] * $date + $todayposts + $postdata[0];//帖子
		$_G['cache']['userstats']['totalmembers'] += $_PLG['totalmembers'] * $date + $todayposts + $postdata[0] - $secs;//会员
		$_onlinenum = $onlinenum;
		$onlinenum += $_PLG['onlinenum'] * $hour + $secs;//在线人数
		$membercount += $_PLG['onlinenum'] * $hour + intval($secs/2);//在线会员
		$invisiblecount = $membercount - $_PLG['onlinenum'] * $hour;//隐身会员
		$guestcount = $onlinenum - $membercount;
		$onlineinfo[0]+= $_PLG['onlinehigh'];//最高在线会员记录
		if ($_G['fid']) {
			$_G['forum']['todayposts']+=  $_PLG['forumnum'] *$hour + $mins;//版块今日发帖
			//$_G['forum']['threads']   += 1009;//版块主题数量
			if ($sublist) {
				foreach ($sublist as $key => $sub) {
					if ($sublist[$key]['threads']) {
						$sublist[$key]['todayposts']+= $_PLG['forumnum'] *$hour + intval($secs/9) + $forumid;
						$sublist[$key]['threads']   += $sublist[$key]['todayposts'] + $_PLG['forumnum'] + $forumid;
						$sublist[$key]['posts']     += $sublist[$key]['threads'] + $_PLG['forumnum'] + $forumid;
					}
				}
			}
		}else {
			foreach ($catlist as $cat) {
				foreach ($cat['forums'] as $forumid) {
					if ($forumlist[$forumid]['threads']) {
						$forumlist[$forumid]['todayposts']+= $_PLG['forumnum'] *$hour + intval($secs/9) + $forumid;//版块今日发帖
						$forumlist[$forumid]['threads']   += $forumlist[$forumid]['todayposts'] + $_PLG['forumnum'] + $forumid;//帖子回复数
						$forumlist[$forumid]['posts']     += $forumlist[$forumid]['threads'] + $_PLG['forumnum'] + $forumid;//帖子查看数
					}
				}
			}
		}
		$_G['forum_thread']['views'] += $_PLG['views'] *$date; //主题查看数量
	}
	
	public static function _init() {

		global $_G;
		self::$_G     = $_G;
		self::$PLNAME = 'levfire';
		self::$PL_G   = self::$_G['cache']['plugin'][self::$PLNAME];//print_r($PL_G);

		self::$PLSTATIC = 'source/plugin/'.self::$PLNAME.'/statics/';
		self::$PLURL    = 'plugin.php?id='.self::$PLNAME;
		self::$uploadurl= self::$PLSTATIC.'upload/common/';
		self::$remote   = 'plugin.php?id='.self::$PLNAME.':l&fh='.FORMHASH.'&m=';
		self::$lm       = 'plugin.php?id='.self::$PLNAME.':l&fh='.FORMHASH.'&m=_m.';
	}

	public static function _levlang($string = '', $key = 0) {
		$sets  = $string ? $string : (!$key ? self::$PL_G['levlang'] : '');
		$lang  = array();
		if ($sets) {
			$array = explode("\n", $sets);
			foreach ($array as $r) {
				$thisr  = explode('=', trim($r));
				$lang[trim($thisr[0])] = trim($thisr[1]);
			}
			if (!$key) {
				$lang['extscore'] = self::$_G['setting']['extcredits'][self::$PL_G['scoretype']]['title'];
				$flang = lang('plugin/levfire');
				if (is_array($flang)) $lang = $lang + $flang;
			}
		}
		return $lang;
	}

	public static function _levdiconv($string, $in_charset = 'utf-8', $out_charset = CHARSET) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = diconv($val, $in_charset, $out_charset);
			}
		} else {
			$string = diconv($string, $in_charset, $out_charset);
		}
		return $string;
	}
	
	public static function _isopen($key = 'close') {
		$isopen = unserialize(self::$PL_G['isopen']);
		if (is_array($isopen) && in_array($key, $isopen)) return TRUE;
	}
	
	public static function _ckopen($info, $ck) {
		$ckinfo = unserialize($info);
		if ($ckinfo[0] && !in_array($ck, $ckinfo)) return TRUE;
	}
	
	public static function _loadextjs($jquery = 0, $force = 0) {
		global $_G;
		$js = '';
		if ($jquery && (self::$_G['loadjquery'] !=1 || $force)) {
			$_G['loadjquery'] = 1;
			$js .= '<script language="javascript" type="text/javascript" src="'.self::$PLSTATIC.'jquery.min.js"></script>
					 <script language="javascript" type="text/javascript">var $$ = jQuery.noConflict();</script>';
		}
		if (self::$_G['loadartjs'] !=1 || $force) {
			$_G['loadartjs'] = 1;
			$js .= '<script type="text/javascript" src="'.self::$PLSTATIC.'dialog417/dialog.js?skin=default"></script>
				  	<script type="text/javascript" src="'.self::$PLSTATIC.'dialog417/plugins/iframeTools.js"></script>';
		}
		return $js;
	}
	
}








