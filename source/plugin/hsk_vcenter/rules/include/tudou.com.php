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
define('TARCHAR', 'GBK');

function TAR_get($link, $host) {

	$TAR_return = array();
	$c = hsk_getfile($link);
	//$c = gzdecode($c);
	$c = hsk_iconv($c, TARCHAR, CHARSET);
	//以上使用 视频中心 自带的函数 hsk_getfile 获取数据并转码，下面开始判断采集内容进行整理。

	//标题		,atitle = "青盲-TV版"	//kw = "巧虎成长版2011年10月"
	preg_match_all("/kw = \"(.*?)\"/i", $c, $datarow);
	if(empty($datarow[1])){
		preg_match_all("/,ltitle = \"(.*?)\"/i" ,$c, $datarow);
	}
	if(empty($datarow[1])){
		preg_match_all("/title:\"(.*?)\"/i", $c, $datarow);
	}
	if(empty($datarow[1])){
		preg_match_all("/,atitle = \"(.*?)\"/i", $c, $datarow);
	}
	$TAR_return['subject'] = trim(dhtmlspecialchars($datarow[1][0]));

	//以上，标题结束。

	//图片
	preg_match_all("/pic = \'(.*?)\'/i", $c, $datarow);
	if(empty($datarow[1])){
		preg_match_all("/pic:\"(.*?)\"/i", $c, $datarow);
	}
	$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1][0]));

	//以上，图片结束。


	//视频地址		i122364484.html
	preg_match_all("/i(\d+).html/i", $link, $datarow);
	if(empty($datarow[1])){
		preg_match_all("/,iid = (\d+)/i", $c, $datarow);
	}
	if(empty($datarow[1])){
		preg_match_all("/iid:(\d+)/i", $c, $datarow);
	}

	if($datarow[1][0]){
		$TAR_return['flashid'] = $datarow[1][0].'_t';
		$TAR_return['flashurl'] = "http://js.tudouui.com/bin/player2/opn_25.swf?iid=".$datarow[1][0]."&autostart=true&autoPlay=true&&hdType=2&nBps=-1&channelId=22&v=3&hasPassword=";
	}
	//以上，视频地址结束。	http://js.tudouui.com/bin/player2/opn_25.swf?iid={iid}&autostart=true&autoPlay=true&&hdType=2&nBps=-1&channelId=22&v=3&hasPassword=

	//时长	time:"02:02:22"		,time = '1:54:31'		time = '37:42'

	preg_match("/time = \'(.*?)\'/i", $c, $datarow);
	if(!empty($datarow[1])){
		//得到时间
		$timelongarr = array_reverse(explode(":", $datarow[1]));
		$cx = array(1,60,3600);
		for($i=0; $i<count($cx); $i++){
			$timelong += $timelongarr[$i]*$cx[$i];
		}
	}
	$TAR_return['timelong_1'] = floor($timelong/60);
	$TAR_return['timelong_2'] = $timelong%60;
	//以上是视频时长的处理方法 ================================

	//视频简介		message
	preg_match_all("/desc = \"(.*?)\"/i", $c, $datarow);
	if(empty($datarow[1])){
		preg_match_all("/description\" content=\"(.*?)\"/i",$c,$datarow);
	}
	$TAR_return['message'] = $datarow[1][0];
	//以上，视频简介结束。

	//导演
	preg_match_all("/<ul class=\"v_detail\">(.*?)<li class=\"v_type\">/i", $c, $datarow);
	if(!empty($datarow[1])){	//继续处理	target="_blank">杜琪峰</a>
		preg_match_all("/\">(.*?)<\/a>/i", $datarow[1][0], $datarow);
		$TAR_return['director'] = $datarow[1][0];
	}
	//以上，导演结束。

	//主演
	unset($datarow[1][0]);
	if(!empty($datarow[1]))
		$TAR_return['actor'] = implode(",", $datarow[1]);
	//以上，主演结束。

	return  $TAR_return;
}


?>