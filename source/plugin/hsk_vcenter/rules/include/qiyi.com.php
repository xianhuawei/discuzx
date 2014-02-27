<?php
/*可擴展型自定義函數
問題: 娱乐不正常 (頁柜不可以采集，第一個按入的視頻可采)
問題: 旅游 时尚 综艺 圖片問題 (以解決)
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
	
	//標題+轉碼
	preg_match_all("/\"title\":\"(.*?)\",/i", $c, $datarow);
	if(empty($datarow[1])) {
		preg_match_all("/title[\w\W]:[\w\W]\"(.*?)\",/i", $c, $datarow);
	}
	$TAR_return['subject'] = trim(dhtmlspecialchars($datarow[1][0]));
    //以上，標題結束。
	
	//視頻簡介		message
	preg_match_all("#wenzi1\">(.*?)<\/p>#is",$c,$datarow);
	if(empty($datarow[1])){
		preg_match_all("/artistDesc\">(.*?)<\/span>/i",$c,$datarow);
		if(empty($datarow[1])){
			preg_match_all("/description\" content=\"(.*?)\"/i",$c,$datarow);
		}
	}
	$TAR_return['message'] = str_replace("此页面提供了", '', $datarow[1][0]);
	$TAR_return['message'] = trim(dhtmlspecialchars($datarow[1][0]));
    //以上，視頻簡介結束
	
	//視頻地址
	preg_match_all("/\"videoId\":\"(.*?)\",/i", $c, $datarow);
	   if(empty($datarow[1])){
        preg_match_all("/videoId[\w\W]:[\w\W]\"(.*?)\",/i", $c, $datarow);
		}
	$TAR_return['flashurl'] = "http://player.video.qiyi.com/".$datarow[1][0];
	//以上，視頻地址結束。

	$TAR_return['flashid'] = $datarow[1][0]."_i";

    //圖片
	preg_match_all("/imgPathData\" style=\"display:none\">(.*?)<\/span><\/li>/i",$c,$datarow);
	if(empty($datarow[1])){
		preg_match_all("/imgPathData\" style=\"display:none\">(.*?)<\/span>/i",$c,$datarow);
	}
	$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1][0]));
    //以上，圖片結束。
	
	preg_match("/playLength\":\"(.*?)\",/i", $c, $datarow);
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
	//以上是視頻時長的處理方法 ================================
	
	//導演		
	preg_match("#<span>导演：<\/span>(.*?)<\/p>#is", $c, $datarow);
			preg_match_all("#_blank\">(.*?)<\/a>#is", $datarow[1], $datarow);
			$TAR_return['director'] = implode(",", $datarow[1]);
			$TAR_return['director'] = trim(dhtmlspecialchars($datarow[1][0]));
	//以上，導演結束。

    //主演		
	if(preg_match("#<span>主演：<\/span>(.*?)<\/p>#is", $c, $datarow)){
			preg_match_all("/_blank\">(.*?)<\/a>/i", $datarow[1], $datarow);
			$TAR_return['actor'] = implode(",", $datarow[1]);
			}else{
				if(preg_match("#<span>主角：<\/span>(.*?)<\/p>#is", $c, $datarow)){
					    preg_match_all("/\">(.*?)<\/a>/i", $datarow[1], $datarow);
			            $TAR_return['actor'] = implode(",", $datarow[1]);
				        }else{
							preg_match("#<span>嘉宾：</span>(.*?)<\/p>#is", $c, $datarow);
							preg_match_all("/_blank\">(.*?)<\/a>/i", $datarow[1], $datarow);
							$TAR_return['actor'] = implode(",", $datarow[1]);
						}
			}
	//以上，主演結束。

	
	return  $TAR_return;
}

?>