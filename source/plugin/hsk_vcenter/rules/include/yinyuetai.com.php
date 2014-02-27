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
define('TARCHAR', 'UTF-8');

function TAR_get($link, $host) {

	$TAR_return = array();
	$c = hsk_getfile($link);
	$c = hsk_iconv($c, TARCHAR, CHARSET);
	//以上使用 視頻中心 自帶的函數 hsk_getfile 獲取數據並轉碼，下面開始判斷採集內容進行整理。
	
	//標題
	preg_match_all("/og:title\" content=\"(.*?)\"/i", $c, $datarow);
	//轉碼
	$TAR_return['subject'] = trim(dhtmlspecialchars($datarow[1][0]));
    //以上，標題結束。
	
	//圖片
	preg_match_all("/og:image\" content=\"(.*?)\"/i",$c,$datarow);
	$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1][0]));
	//以上，圖片結束。
	
	//視頻地址
	preg_match_all("/video\/([\w\-]+)/", $link, $datarow);
	   if(!empty($datarow[1][0])) {
		   $TAR_return['flashid'] = $datarow[1][0];
           $TAR_return['flashurl'] = "http://www.yinyuetai.com/video/player/".$datarow[1][0]."/v_0.swf";
		}
    //以上，視頻地址結束。
	
	//此網站視頻不支持獲取時間長度
	$timelong = 0;
	$TAR_return['timelong_1'] = floor($timelong/60);
	$TAR_return['timelong_2'] = $timelong%60;
	//以上是視頻時長的處理方法 ================================

	//視頻簡介		message
	preg_match_all("/og:description\" content=\"(.*?)\"/i",$c,$datarow);
	$TAR_return['message'] = $datarow[1][0];
	//以上，視頻簡介結束。

	return  $TAR_return;
}
?>