<?php
/*可擴展型自定義函數


規範如下：
==========

	(1)		FUNCTION 名稱必須為  TAR_get, 並注意大小寫
	(2)		定義採集的網站使用的編碼
			define('TARCHAR', 'UTF-8');

	(2)		最後返回一個數組，包含以下鍵值

			array(
					'subject'		=>			//視頻標題
					'image'			=>			//視頻截圖
					'flashurl'		=>			//視頻地址
					'flashid'		=>			//視頻地址識別串		可選
					'timelong'		=>			//視頻時長
					'message'		=>			//視頻簡介
					'director'		=>			//導演					可選
					'actor'			=>			//主演					可選，格式為多個可用（,）和（/）隔開
				);


*/

//定義對方網站的編碼（重中之重）
define('TARCHAR', 'GBK');

function TAR_get($link, $host) {

	$TAR_return = array();
	$c = hsk_getfile($link);
	$c = hsk_iconv($c, TARCHAR, CHARSET);
	//以上使用 視頻中心 自帶的函數 hsk_getfile 獲取數據並轉碼，下面開始判斷採集內容進行整理。

	//標題
	preg_match_all("/<title>视频：(.*?) - (.*?)<\/title>/", $c, $datarow);
	if(empty($datarow[1])){
		preg_match_all("/<title>(.*?) - (.*?)<\/title>/", $c, $datarow);
		if(empty($datarow[1])){
			preg_match_all("/<title>(.*?) -在线观看/", $c, $datarow);
			if(empty($datarow[1])){
				preg_match_all("/<title>(.*?)<\/title>/", $c, $datarow);
			}
		}
	}
	//轉碼
	$TAR_return['subject'] = trim(dhtmlspecialchars($datarow[1][0]));

	//以上，標題結束。

	//圖片
	preg_match_all("/var cover=\"(.*?)\"/i",$c,$datarow);
	if(empty($datarow[1])){
		preg_match_all("/,bCover: \'(.*?)\'/i",$c,$datarow);
	}
	$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1][0]));
	//以上，圖片結束。


	//視頻地址
	if(preg_match_all("/var vid=\"(\d+)\"/", $c, $datarow)){
		if(!empty($datarow[1][0])) {
		$TAR_return['flashid'] = $datarow[1][0];
		$TAR_return['flashurl'] = "http://share.vrs.sohu.com/".$datarow[1][0]."/v.swf&autoplay=false";
		}
		}else{
			if(preg_match_all("/vid: \"(\d+)\"/", $c, $datarow)){
			if(!empty($datarow[1][0])) {
		       $TAR_return['flashid'] = $datarow[1][0];
		       $TAR_return['flashurl'] = "http://share.vrs.sohu.com/my/v.swf&topBar=1&id=".$datarow[1][0]."&autoplay=false";
			}
			}else{
			preg_match_all("/vid: \'(\d+)\'/", $c, $datarow);
			if(!empty($datarow[1][0])) {
		       $TAR_return['flashid'] = $datarow[1][0];
		       $TAR_return['flashurl'] = "http://share.vrs.sohu.com/my/v.swf&topBar=1&id=".$datarow[1][0]."&autoplay=false";
			}
			}
		}
	//以上，視頻地址結束。

	//此網站視頻不支持獲取時間長度
	preg_match("/var vLength=\"(.*?)\"/i", $c, $datarow);
		if(empty($datarow[1])){
			preg_match("/TV_VIDEO_LENTH=\"(.*?)\"/i", $c, $datarow);
			//if(empty($datarow[1])){
				//preg_match("/videoLength:[\w\W](.*?)/",$c,$datarow); //http://my.tv.sohu.com 時間問題
			//}
		}
	if(!empty($datarow[1])){
		//得到時間
		$timelongarr = array_reverse(explode(":", $datarow[1]));
		$cx = array(1,60,3600);
		for($i=0; $i<count($cx); $i++){
			$timelong += $timelongarr[$i]*$cx[$i];
		}
	}
	$TAR_return['timelong_1'] = floor($timelong/60);
	$TAR_return['timelong_2'] = $timelong%60;
	//以上是視頻時長的處理方法 ================================

	//視頻簡介		message
	preg_match_all("/<p>(.*?)<\/p><br><script type=/i",$c,$datarow);
	if(empty($datarow[1])){
		preg_match_all("/description\" content=\"(.*?)\">/i",$c,$datarow);
		if(empty($datarow[1])){
			preg_match_all("/color2\">(.*?)<\/em><\/span>/i",$c,$datarow);
		}
	}
	$TAR_return['message'] = $datarow[1][0];
	//以上，視頻簡介結束。
	
	//導演		
	preg_match_all("/VRS_DIRECTOR=\"(.*?):\"/i",$c,$datarow);
	$TAR_return['director'] = implode(",", $datarow[1]);
	//以上，導演結束。

    //主演		
	preg_match_all("/VRS_ACTOR=\"(.*?)\"/i",$c,$datarow);
	$TAR_return['actor'] = str_replace(":", ',', $datarow[1][0]);
	//以上，主演結束。

	return  $TAR_return;
}

?>