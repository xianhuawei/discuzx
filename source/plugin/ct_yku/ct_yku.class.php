<?php
	if(!defined('IN_DISCUZ')){exit('Access Denied');}

	class plugin_ct_yku{
		function discuzcode($param){
			global $_G;			
			$config = $_G['cache']['plugin']['ct_yku'];
			$isopen = $config['isopen'];
		
			$config = $_G['cache']['plugin']['ct_yku'];
			$usergroup = (array)unserialize($config['usergroup']);
			$forums  = (array)unserialize($config['forums']);
			$em_usergroup = strlen(implode(',',$usergroup ));
			$em_forums = strlen(implode(',',$forums ));

			if($param['caller'] == 'discuzcode' && $isopen && (in_array($_G['groupid'],$usergroup) || $em_usergroup==0)  && (in_array($_G['fid'],$forums)|| $em_forums==0 ) )
			{	
				if(strstr($_G['discuzcodemessage'],"[ct_yku]"))
				{
					$videowidth = $config['videowidth'] ? $config['videowidth'] : '450';
					$videoheight = $config['videoheight'] ? $config['videoheight'] : '360';
					$autoplay = $config['autoplay'] ? 'true' : 'false';
					//http://static.youku.com/v1.0.0149/v/swf/loader.swf
					//http://static.youku.com/v1.0.0189/v/swf/qplayer.swf
					//<embed src="http://static.youku.com/v1.0.0189/v/swf/qplayer.swf?winType=adshow&VideoIDS=XNjUyOTMyOTIw&isAutoPlay=false&delayload=false&isShowRelatedVideo=false" width="300" height="300"  border="0" align="center" wmode="transparent" allowfullscreen="true"></embed>
					$str1 ='<embed src="http://static.youku.com/v1.0.0189/v/swf/qplayer.swf?winType=adshow&VideoIDS=';
					$str2 ='&isAutoPlay='.$autoplay.'&delayload=false&isShowRelatedVideo=false  border="0" align="center" wmode="transparent" allowfullscreen="true" width="'.$videowidth.'" height="'.$videoheight.'"></embed>';
					$_G['discuzcodemessage'] = str_replace("[ct_yku]" ,$str1,$_G['discuzcodemessage']);
					$_G['discuzcodemessage'] = str_replace("[/ct_yku]",$str2,$_G['discuzcodemessage']);
				}
			}
	}
}

class plugin_ct_yku_forum extends plugin_ct_yku
{
	function post_top()
	{
		global $_G;	
		$config = $_G['cache']['plugin']['ct_yku'];
		$isopen = $config['isopen'];
		$usergroup = (array)unserialize($config['usergroup']);
		$forums  = (array)unserialize($config['forums']);
		$em_usergroup = strlen(implode(',',$usergroup ));
		$em_forums = strlen(implode(',',$forums ));

		if($isopen && (in_array($_G['groupid'],$usergroup) || $em_usergroup==0)  && (in_array($_G['fid'],$forums)|| $em_forums==0 ) )
		{
			$url_empty = lang('plugin/ct_yku','url_empty');
			$ct_tip = lang('plugin/ct_yku','ct_tip');
			$add_yku = lang('plugin/ct_yku','add_yku');
			$url_error = lang('plugin/ct_yku','url_error');

			$html  ='<script type="text/javascript" language="javascript" src="source/plugin/ct_yku/js/jquery.min.js"></script>';
			$html .='<script type="text/javascript">var jq = jQuery.noConflict(); </script>';
			$html .='<script src="source/plugin/ct_yku/js/ct_yku.js"></script>';
			$html .='<script>var url_empty = "'.$url_empty.'";</script>';
			$html .='<script>var url_error = "'.$url_error.'";</script>';

			$html .='<div class="tbms mbm ">
						<div >->'.$ct_tip.'http://v.youku.com/v_show/id_XMjgyNjE0MjQ0.html</div>
						<div><input value="" name="ct_yku" type="text" size="56" class="px" id="ct_yku_text">
							<button  class="pn"  value="true" type="button" onclick="ct_yku_click();">
							<em>'.$add_yku.'</em>
							</button>
						</div>
					</div>' ;
			return $html;
		}
	}
}



?>