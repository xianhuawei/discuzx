<?php
/**
 *	表态评分
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_she_btps {

}

class plugin_she_btps_forum extends plugin_she_btps {
	function cknewuserbtps() {
		global $_G;
		$result = true;
		if(!$_G['uid']) return lang('message', 'to_login');
		if(!empty($_G['forum']['replyperm'])) {
			$replyperm = explode("\t",$_G['forum']['replyperm']);
			if(!in_array($_G['groupid'],$replyperm)) return lang('message', 'forum_access_view_disallow');
		}
		if(checkperm('disablepostctrl')) {
			return $result;
		}
		$ckuser = $_G['member'];
		if($_G['setting']['newbiespan'] && $_G['timestamp']-$ckuser['regdate']<$_G['setting']['newbiespan']*60) {
			$result = lang('message', 'no_privilege_newbiespan', '', array('newbiespan' => $_G['setting']['newbiespan']));
		}
		if($_G['setting']['need_avatar'] && empty($ckuser['avatarstatus'])) {
			$result = lang('message', 'no_privilege_avatar');
		}
		if($_G['setting']['need_email'] && empty($ckuser['emailstatus'])) {
			$result = lang('message', 'no_privilege_email');
		}
		if($_G['setting']['need_friendnum']) {
			space_merge($ckuser, 'count');
			if($ckuser['friends'] < $_G['setting']['need_friendnum']) {
				$result = lang('message', 'no_privilege_friendnum', '', array('friendnum' => $_G['setting']['need_friendnum']));
			}
		}
		return $result;
	}

	function viewthread_useraction_output() {
		global $_G;
		$btpsConfig = array();
		$btpsConfig = $_G['cache']['plugin']['she_btps'];
		if(!$btpsConfig['btps_no']) return;
		$btps_forum = unserialize($btpsConfig['btps_forum']);//版块
		if(!in_array($_G['fid'],$btps_forum)) return;
		$btps_group = unserialize($btpsConfig['btps_group']);//用户组
		if(!in_array($_G['groupid'],$btps_group)) return;
		$closed = $_G['forum_thread']['closed'];//锁定主题
		if(intval($btpsConfig['btps_post']) && $closed) return;
		$querypost = DB::query("SELECT pid,first FROM ".DB::table('forum_post')." WHERE tid = '$_G[tid]' AND first =1");
		$resultpost = DB::fetch($querypost);
		$postpid = $resultpost['pid'];

		$htmdata = '
		<style>
			.click_div {width:160px;margin:0 auto;}
			.atdtid {margin: 15px auto;}
			.atdtid td {text-align: center; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; vertical-align: bottom; padding-top: 10px; width:50px;}
			.atdtid .atdtidc {position: relative; margin: 0px auto 10px; width: 20px; height: 50px}
			.atdtidc div {position: absolute; text-align: left; width: 20px; bottom: 0px; left: 0px}
			.atdtid .ac1 {background: #06f}
			.atdtid .ac2 {background: #c30}
			.atdtid .ac3 {background: #0c0}
			.atdtidc em {position: absolute; text-align: center; margin: -25px 0px 0px -5px; width: 30px; color: #999; font-size: 11px}
			.atdtid .buttona {cursor:pointer; border:none!important; background: url(source/plugin/she_btps/images/a.gif) no-repeat 0px 0px; width:32px; height:32px}
			.atdtid .buttonb {cursor:pointer; border:none!important; background: url(source/plugin/she_btps/images/b.gif) no-repeat 0px 0px; width:32px; height:32px}
			.atdtid .buttonc {cursor:pointer; border:none!important; background: url(source/plugin/she_btps/images/c.gif) no-repeat 0px 0px; width:32px; height:32px}
			#postajaxok:hover {color: #FF6600;}
		</style>
		<script type="text/javascript" reload="1">
 		';
		if (intval($btpsConfig['btps_ms'])){
			$htmdata .= '
				function succeedhandle_rate(locationhref){
					ajaxget(\'plugin.php?id=she_btps:btps&action=postajax&fid='.$_G['fid'].'&tid='.$_G['tid'].'&pid='.$postpid.'&formhash='.FORMHASH.'&txts=\' + she_btps_s, \'postajaxok\');
					setTimeout(\'hreftime()\',800);
				}
				function hreftime(){
					ajaxget(\'forum.php?mod=viewthread&tid='.$_G['tid'].'&viewpid='.$postpid.'\', \'post_'.$postpid.'\', \'post_'.$postpid.'\');
					loadcss(\'forum_moderator\');
				}
			';
		}else{
			$htmdata .= '
				function succeedhandle_rate(locationhref){
					ajaxget(\'plugin.php?id=she_btps:btps&action=postajax&fid='.$_G['fid'].'&tid='.$_G['tid'].'&pid='.$postpid.'&formhash='.FORMHASH.'&txts=\' + she_btps_s, \'postajaxok\');
					setTimeout(\'hreftime()\',1500);
				}
			';
			if (trim($btpsConfig['btps_rewrite'])){
				$urltext = str_replace('{tid}', $_G['tid'], trim($btpsConfig['btps_rewrite']));
				$htmdata .= '
					function hreftime(){
						location.href=\''.$urltext.'\';
					}
				';
			}else{
				$htmdata .= '
					function hreftime(){
						location.href=\'forum.php?mod=viewthread&tid='.$_G['tid'].'\';
					}
				';
			}
		}
		$htmdata .= '
	 		if (document.getElementById(\'comment_'.$postpid.'\')){
				document.getElementById(\'comment_'.$postpid.'\').innerHTML += \'<div id="btpsajax_'.$postpid.'" style="padding-top: 20px;"></div>\';
				ajaxget(\'plugin.php?id=she_btps:btps&action=btpsajax&fid='.$_G['fid'].'&tid='.$_G['tid'].'&pid='.$postpid.'\', \'btpsajax_'.$postpid.'\');
			}
 		';
		if (intval($btpsConfig['btps_post'])){//开启回帖
			$btpspost = $this->cknewuserbtps();
			$htmdata .= '
				function postajax(s){
					she_btps_s = s;
					var btpspost = \''.$btpspost.'\';
					if (btpspost != 1){
						showDialog(btpspost, \'notice\', \''.lang('template', 'board_message').'\', null, 0);return false;
					}else{
						ajaxpost(\'rateform_\'+s, \'return_rate\', \'return_rate\', \'onerror\');
					}
				}
			';
		}else{
			$htmdata .= '
				function postajax(s){
					she_btps_s = s;
					ajaxpost(\'rateform_\'+s, \'return_rate\', \'return_rate\', \'onerror\');
				}
			';
		}
		$htmdata .= '</script>';
		return $htmdata;
	}

	function forumdisplay_author_output() {
		global $_G;
		$btpsConfig = array();
		$she_btps = array();
		$btpsConfig = $_G['cache']['plugin']['she_btps'];
		if(!$btpsConfig['btps_no']) return array();
		if(!$btpsConfig['btps_ext_zs']) return array();
		$btps_ext_zs = intval($btpsConfig['btps_ext_zs']);
		$btps_forum = unserialize($btpsConfig['btps_forum']);//版块
		if(!in_array($_G['fid'],$btps_forum)) return array();
		foreach($_G['forum_threadlist'] as $member) {
			if (!empty($member['author'])) {
				$querypost = DB::query("SELECT pid FROM ".DB::table('forum_post')." WHERE tid = '$member[tid]' AND first =1");
				$resultpost = DB::fetch($querypost);
				$postpid = $resultpost['pid'];
				$querycache = DB::query("SELECT rate FROM ".DB::table('forum_postcache')." WHERE pid = '$postpid'");
				$resultcache = DB::fetch($querycache);
				$resultcache['rate'] = dunserialize($resultcache['rate']);
				$postlist['ratelogextcredits'] = $resultcache['rate']['extcredits'];
				$htmdata = '<span class="y" style="background:#fff;border:solid 1px #D9D9D9;height:20px;margin-top:3px;line-height:20px;text-align: center;"><strong class="xi2">'.intval($postlist['ratelogextcredits'][$btps_ext_zs]).'</strong></span>';
			}
			$she_btps[] = $htmdata;
		}
		return $she_btps;
	}
}
?>