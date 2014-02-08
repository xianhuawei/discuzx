<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class mobileplugin_easyflv {

	var $groupon = false;
	var $forumon = false;

	function mobileplugin_easyflv() {
		global $_G;
		//note 后台设置允许的版块
		$forums = (array)unserialize($_G['cache']['plugin']['easyflv']['forums']);
		//note 当前版块判断
		$this->forumon = in_array('', $forums) ? TRUE : (in_array($_G['fid'], $forums) ? TRUE : FALSE);
		if(!$forums[0]&&count($forums)<=1){
			$this->forumon = TRUE;
		}
	}
}
	function post_easyflv_message($params){
		global $_G,$easycount;
		$icon = intval($_G['cache']['plugin']['easyflv']['icon']);
		if(!$icon){
			return;
		}
		list($message, $forword, $thread) = $params['param'];
		if(strpos($message,'succeed')==TRUE&&$easycount){
			DB::query("UPDATE ".DB::table('forum_thread')." SET icon='$icon' WHERE tid='$thread[tid]'");
		}
	}
class mobileplugin_easyflv_forum extends mobileplugin_easyflv {
	function post_easyflv() {
		global $_G,$easycount;
		if(!$this->forumon){return;}
		if($_G['gp_replysubmit']&&!$_G['cache']['plugin']['easyflv']['replyon']){return;}
			$find=array();
			$replace=array();
			$ctx = stream_context_create(array('http' => array('timeout' => 10)));
		//搜狐视频
			preg_match_all("/(http:\/\/tv.sohu.com\/[\d]+\/n[\d]+.shtml)/",$_G['gp_message'],$rm);
			$nm = count($rm[1]);
			for($i=0;$i<$nm;$i++){
				$c = $str = file_get_contents($rm[1][$i], false, $ctx);
				preg_match("/var vid[\s]?=[\s]?\"([\d]*?)\"[\w\W]*?cover[\s]?=[\s]?\"([^\"]*?)\"[\w\W]*?(playlistId[\s]?=[\s]?\"([\d]*?)\"|)/",$c,$var);
				$u = "http://share.vrs.sohu.com/".$var[1]."/v.swf&topBar=0&autoplay=false&plid=".$var[4]."&pub_catecode=&xuid=u5953583";
				if($i==0){
					$u = str_replace("autoplay=false",'autoplay=true',$u);
					$cover = "[img=225,169]".$var[2]."[/img]";
				}
				$find[]=$rm[1][$i];
				$replace[]=$u;
			}
		//
		//cntv视频
			$rm=array();
			$var=array();
			preg_match_all("/(http:\/\/[^\.]+.cntv.cn\/[^\.]+.shtml|http:\/\/tv.cntv.cn\/video\/[^\s\r\n\[]+)/",$_G['gp_message'],$rm);
			$nm = count($rm[1]);
			for($i=0;$i<$nm;$i++){
				$c = $str = file_get_contents($rm[1][$i], false, $ctx);
				preg_match("/\"videoId\",[\s]?\"([\w\d]+)\"/i",$c,$vid);
				preg_match("/\"videoCenterId\",[\s]?\"([\w\d]+)\"/i",$c,$cid);
				if(!$vid[1]&&!$cid[1]){
				preg_match("/videoId=([\w\d]+)&/i",$c,$vid);
				preg_match("/videoCenterId=([\w\d]+)\"/i",$c,$cid);
				}
				if(!$vid[1]&&!$cid[1]){
				preg_match("/id: '([\w\d]+)',/",$c,$vid);
				preg_match("/videoCenterId: '([\w\d]+)',/",$c,$cid);
				}
				$u = "http://player.cntv.cn/standard/cntvOutSidePlayer.swf?v=2.0.2013.1.30.0&videoId=".$vid[1]."&isAutoPlay=false&videoCenterId=".$cid[1]."";
				if($i==0){
					$u = str_replace("isAutoPlay=false",'autoplay=true',$u);
				}
				if($vid[1]&&$cid[1]){
					$find[]=$rm[1][$i];
					$replace[]=$u;
				}
			}
		//
			if($_G['setting']['version']=='X2'){
					$_G['gp_message'] = str_replace($find,$replace,$_G['gp_message'])."\r\n".$cover;
			}else{
					$_GET['message'] = str_replace($find,$replace,$_GET['message'])."\r\n".$cover;
			}
		if($_SERVER['REQUEST_METHOD']=='POST'&&$_G['gp_message']){
		 $exp = array(
		  "/(\[[um][^\]]*?\]|)http:\/\/v\.youku\.com\/v_show\/id_([^\.]+)\.html(\?f=[\d]+|@[\w]*?|)(\[\/(url|media)\]|)/",
		  "/(\[[um][^\]]*?\]|)http:\/\/www\.56\.com\/[^\r\n\s]+(vid-|v_)([^\.]+)\.html(\/[^\.]+\.html|)(\[\/(url|media)\]|)/",
		  "/(\[[um][^\]]*?\]|)http:\/\/www\.tudou\.com\/(listplay|albumplay)\/([^\/]+)\/([\w]+).html(\[\/(url|media)\]|)/",
		  "/(\[[um][^\]]*?\]|)http:\/\/www\.tudou\.com\/programs\/view\/([^\?\/\s]+)\/(\?[^\r\n]+|)(\[\/(url|media)\]|)/i",
		  "/(\[[um][^\]]*?\]|)http:\/\/v\.ku6\.com\/([\w]+\/|)show([_\d]*?)\/([^\/]+)\.html(\[\/(url|media)\]|)/i",
		  "/(\[[um][^\]]*?\]|)http:\/\/v\.ifeng\.com\/([\w\/]+)\/([\d-]*?)\/([^\/]+)\.shtml(\[\/(url|media)\]|)/i",
		  "/(\[[um][^\]]*?\]|)http:\/\/v.pptv.com\/[^\/]+\/([^\.]+)\.html(\[\/(url|media)\]|)/i",
		  "/(\[[um][^\]]*?\]|)http:\/\/v.pps.tv\/play_([^\.]+)\.html(\[\/(url|media)\]|)/i",
		);
			$rep =array(
				'[flash]http://player.youku.com/player.php/sid/\\2/v.swf[/flash]',
				'[flash]http://player.56.com/v_\\3.swf/1030_plager.swf[/flash]',
				'[flash]http://www.tudou.com/v/\\4/dW5pb25faWQ9MTAzMjA2XzEwMDAwMV8wMl8wMQ/v.swf[/flash]',
				'[flash]http://www.tudou.com/v/\\2/dW5pb25faWQ9MTAzMjA2XzEwMDAwMV8wMl8wMQ/v.swf[/flash]',
				'[flash]http://player.ku6.com/refer/\\4/v.swf[/flash]',
				'[flash]http://v.ifeng.com/include/exterior.swf?AutoPlay=false&guid=\\4[/flash]',
				'[flash]http://player.pptv.com/v/\\2.swf[/flash]',
				'[flash]http://player.pps.tv/player/sid/\\2/v.swf[/flash]',
			);
				$exp[] = "/(\[url[^\]]*?\]|)http:\/\/my.tv.sohu.com\/[^\/]+\/[^\/]+\/([\d]+).shtml(\[\/url\]|)/i";
				$rep[] = '[flash]http://share.vrs.sohu.com/my/v.swf&topBar=0&id=\\2&autoplay=false&xuid=u5953583[/flash]';

			if($_G['cache']['plugin']['easyflv']['autoswf']){
				$exp[] = "/(\[url[^\]]*?\]|\[flash[^\]]*?\]|\[media[^\]]*?\]|)(http:\/\/[^\r\n\s]+\.swf)([\?&\/][^\r\n\s\[]+|)(\[\/url\]|\[\/flash\]|\[\/media\]|)/i";
				$rep[] = '[flash]\\2\\3[/flash]';
			}
			if($_G['setting']['version']=='X2'){
				$_G['gp_message'] = preg_replace($exp,$rep,$_G['gp_message'],-1,$easycount);
			}else{
				$_GET['message'] = preg_replace($exp,$rep,$_GET['message'],-1,$easycount);
			}
		}
	}
}
?>

