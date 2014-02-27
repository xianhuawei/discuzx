<?php
/*可扩展型自定义函数


规范如下：
==========

	(1)		FUNCTION 名称必须为  TAR_get, 并注意大小写
	(2)		定义采集的网站使用的编码
			define('TARCHAR', 'UTF-8');

	(2)		最后返回一个数组，包含以下键值

			array(
					'subject'		=>			//视频标题
					'image'			=>			//视频截图
					'flashurl'		=>			//视频地址
					'flashid'		=>			//视频地址识别串		可选
					'timelong'		=>			//视频时长
					'message'		=>			//视频简介
					'director'		=>			//导演					可选
					'actor'			=>			//主演					可选，格式为多个可用（,）和（/）隔开
				);


*/

//定义对方网站的编码（重中之重）
define('TARCHAR', 'UTF-8');

function TAR_get($link, $host) {

	$TAR_return = array();
	$c = hsk_getfile($link);
	$c = hsk_iconv($c, TARCHAR, CHARSET);
	//以上使用 视频中心 自带的函数 hsk_getfile 获取数据并转码，下面开始判断采集内容进行整理。

	//标题		<h3 class="headline" title="		<span class="name">武侠</span>
	if(!preg_match("/<h3 class=\"headline\" title=\"(.*?)\">/i", $c, $datarow)){
		preg_match("/<span class=\"name\">(.*?)<\/span>/i", $c, $datarow);
	}
	if(empty($datarow[1])){
		if(!preg_match("/keywords\" content=\"(.*?)\">/i", $c, $datarow)){
			preg_match("/subtitle\">(.*?)<\/span>/i", $c, $datarow);
		}
	}
	//转码
	$TAR_return['subject'] = trim(dhtmlspecialchars($datarow[1]));

	//以上，标题结束。

	//图片		<li class="thumb"><img src='http://res.mfs.ykimg.com/050E00004FAB709A97927375B50A7C65' alt='武侠'></li>
	if(!preg_match("/&screenshot=(.*?)\"/i",$c,$datarow)){
		preg_match("/<li class=\"thumb\"><img src=\'(.*?)\' alt/i",$c,$datarow);
	}
	$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1]));
	if(empty($TAR_return['image'])){
		preg_match("/http:\/\/res.mfs(.*?)\"/i",$c,$datarow);
		$TAR_return['image'] = "http://res.mfs".$datarow[1];
	}
	//以上，图片结束。


	//视频地址			<li class="link"><a charset="420-2-11" href="http://v.youku.com/v_show/id_XMjk3NDgwNTgw.html"
	if(!preg_match("/<li class=\"link\"><a(.*?)_show\/id_(.*?)[=.]/i", $c, $datarow)){
		preg_match("/target=\"_blank\"  href=\"http:\/\/v.youku.com\/v_show\/id_(.*?)[=.]/i", $c, $datarow);
		$TAR_return['flashid'] = $datarow[1];
	}else{
		$TAR_return['flashid'] = $datarow[2];
	}
	if(empty($TAR_return['flashid'])){
		preg_match("/id\_(.*?)[=.]/", $link, $datarow);
		$TAR_return['flashid'] = $datarow[1];
	}
	if(empty($TAR_return['flashid'])){
		preg_match("/var[\w\W]videoId2=[\w\W]\'(.*?)\'/", $c, $datarow);
		$TAR_return['flashid'] = $datarow[1];
	}
	if(!empty($TAR_return['flashid'])){
		$TAR_return['flashurl'] = "http://player.youku.com/player.php/sid/".$TAR_return['flashid']."/v.swf";
		$TAR_return['flashid'] = $TAR_return['flashid'].'_y';
	}
	//以上，视频地址结束。

	//此网站视频不支持获取时间长度		<label>时长:</label>115分钟							</span>

	$timelong = 0;
	if(!preg_match("/<\/label>(.*?)分/i", $c, $datarow)){
		preg_match("#时长:<\/span>(.*?)分#is", $c, $datarow);
	}
	$timelong = intval($datarow[1])*60;

	$TAR_return['timelong_1'] = floor($timelong/60);
	$TAR_return['timelong_2'] = $timelong%60;
	//以上是视频时长的处理方法 ================================

	//视频简介		message		<div class="statdesc">		<span class="long" style="display:none;">
	if(!preg_match("#<div class=\"statdesc\">(.*?)<\/span>#is",$c,$datarow)){
		preg_match("/item\">(.*?)<a onclick=/i",$c,$datarow);
		$TAR_return['message'] = $datarow[1];
	}else{
		$TAR_return['message'] = str_replace("<span>", '', $datarow[1]);
		$TAR_return['message'] = str_replace("\t", '', $TAR_return['message']);
	}
	if(empty($TAR_return['message'])){
		preg_match("#<span class=\"long\" style=\"display:none;\">(.*?)<\/span>#is",$c,$datarow);
		$TAR_return['message'] = $datarow[1];
	}

	if(empty($TAR_return['message'])){
		preg_match("/description\" content=\"(.*?)\"/i",$c,$datarow);
		$TAR_return['message'] = $datarow[1];
	}
	$TAR_return['message'] = dhtmlspecialchars($TAR_return['message']);
	//以上，视频简介结束。

	//导演
	preg_match_all("/<li class=\"show_director\">(.*?)<\/li>/i", $c, $datarow);
	if(!empty($datarow[1])){	//继续处理	target="_blank">杜琪峰</a>
		preg_match("/target=\"_blank\">(.*?)<\/a>/i", $datarow[1][0], $datarow);
		$TAR_return['director'] = $datarow[1];
	}
	if(empty($TAR_return['director'])){
		preg_match("#<label>导演:<\/label>(.*?)target=\"_blank\">(.*?)<\/a>#is", $c, $datarow);
		$TAR_return['director'] = $datarow[2];
	}
	//以上，导演结束。

	//主演		<li class="act-avatar">
	preg_match_all("#<li class=\"act-avatar\">(.*?)<\/li>#is", $c, $datarow);
	if(!empty($datarow[1])){	//继续处理	title="玄彬"
		foreach($datarow[1] as $value){
			preg_match("/title=\"(.*?)\">/i", $value, $datarowc);
			if(!empty($datarowc[1]))
				$tmparr[] = $datarowc[1];
		}
		$TAR_return['actor'] = implode(",", $tmparr);
	}

	//<h6>演员:</h6>
	if(empty($TAR_return['actor'])){
		if(preg_match("#<h6>演员:<\/h6>(.*?)<!--.users-->#is", $c, $datarow)){
			preg_match_all("/alt=\"(.*?)\"/i", $datarow[1], $datarow);
			$TAR_return['actor'] = implode(",", $datarow[1]);
		}
	}
	if(empty($TAR_return['actor'])){
		if(preg_match_all("#<li class=\"avatar\">(.*?)<\/li>#is", $c, $datarow)){
			foreach($datarow[1] as $value){
				preg_match("/alt=\"(.*?)\"/i", $value, $datarowc);
				if(!empty($datarowc[1])){
					if($datarowc[1] == $TAR_return['director']){
						break;
					}
					$tmparr[] = $datarowc[1];
				}
			}
			$TAR_return['actor'] = implode(",", $tmparr);
		}
	}
	//以上，主演结束。
	//print_r($TAR_return);dexit();

	return  $TAR_return;
}


?>