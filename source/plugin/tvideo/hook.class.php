<?php
/**
 *	[语音发帖(sound.{modulename})] (C)2012-2099 Powered by .
 *	Version: 1.0
 *	Date: 2012-12-20 16:48
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_tvideo {
	public function global_header() {
    return'<link href="source/plugin/tvideo/template/images/style.css" rel="stylesheet" type="text/css" />';
  }
	public function discuzcode() {
    global $tvideo,$_G;
    require_once DISCUZ_ROOT . './source/plugin/tvideo/include/function.inc.php';
    $_G['discuzcodemessage']=preg_replace("/\[tvideo\]([^\[]+)\[\/tvideo\]/ies", "tvideo_parse2('\\1')", $_G['discuzcodemessage']);
  }
}

class plugin_tvideo_forum extends plugin_tvideo {
	function post_editorctrl_left() {
    global $tvideo,$_G;
    require_once DISCUZ_ROOT . './source/plugin/tvideo/include/function.inc.php';
    $groups=(array)@unserialize($tvideo['groups']);
    if(!in_array($_G['groupid'],$groups))return;
    $forums=(array)@unserialize($tvideo['forums']);
    if(!in_array($_G['fid'],$forums))return;
    $data='';
    if($tvideo['enabled_video']){
      $data.='<a id="e_tvideo2" title="'.lang('plugin/tvideo','addvideo1').'" onmousedown="showWindow(\'tvideo\', \'plugin.php?id=tvideo&action=insert2\')" href="javascript:;">'.lang('plugin/tvideo','addvideo2').'</a>';
    }
    return $data;
  }
}
?>