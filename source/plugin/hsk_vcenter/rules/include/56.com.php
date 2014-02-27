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
	preg_match_all("/albumTitle\">(.*?)<\/span>/i", $c, $datarow);
	if(empty($datarow[1][0])){
		preg_match_all("/<h1>(.*?)<\/h1>/i", $c, $datarow);
		if(empty($datarow[1][0])){
			preg_match_all("/sinaWb\',\'(.*?)\',/i", $c, $datarow);
		}
	}
	//轉碼
	$datarow = str_replace('【56高校影像力】', '', $datarow[1][0]);
	$TAR_return['subject'] = str_replace('【56首映礼】', '', $datarow);

	//以上，標題結束
	
	//圖片
	if(preg_match_all("/img\":\"(.*?)\"/i",$c,$datarow)){
		$datarow = str_replace('\/', '/', $datarow[1][0]);
		$TAR_return['image'] = trim(dhtmlspecialchars($datarow));
		}else{
			if(preg_match_all("/173px\" src=\"(.*?)\" width=\"234/i",$c,$datarow)){
				$TAR_return['image'] = trim(dhtmlspecialchars($datarow[1][0]));
			}else{
		preg_match_all("/img_host=(.*?)&key/i",$c,$datarow);
		$datarow = str_replace('&user=', '/', $datarow[1][0]);
		$datarow = str_replace('&sURL=', '/', $datarow);
		$datarow = str_replace('&pURL=', '/', $datarow);
		$datarow = str_replace('&URLid=', 'i56olo56i56.com_', $datarow);
		//$datarow = str_replace("&host=c(\d{1,2}).56.com", '/images', $datarow);
		$datarow = "http://img.".$datarow.".jpg";
		preg_match_all("/56.com\/(.*?)hd/",$datarow,$str);
		preg_match_all("/http:\/\/img.(.*?)&host/",$datarow,$str1);
		$TAR_return['image'] = "http://img.".$str1[1][0]."/images/".$str[1][0]."hd.jpg";
			}
		}
	//以上，圖片結束。
	
	//視頻簡介		message
	if(preg_match_all("#<span>简介：<\/span>(.*?)<\/p>#is", $c, $datarow)){
				$datarow = str_replace('&nbsp;', '', $datarow[1][0]);
				$datarow = str_replace('<br>', '', $datarow);
				$TAR_return['message'] = trim(dhtmlspecialchars($datarow));
				}else{
					preg_match_all("/description\" content=\"(.*?)\"/i",$c,$datarow);
					$TAR_return['message'] = trim(dhtmlspecialchars($datarow[1][0]));
				}
	//以上，視頻簡介結束。

	//視頻地址
	preg_match_all("/videoId\': \"(.*?)\"/", $c, $datarow);
	if(empty($datarow[1][0])){
		preg_match_all("/id = \'(.*?)\'/", $c, $datarow);
	}
	   if(!empty($datarow[1][0])) {
		   $TAR_return['flashid'] = $datarow[1][0].'_56';
           $TAR_return['flashurl'] = "http://player.56.com/v_".$datarow[1][0].".swf";
		}
	//以上，視頻地址結束。
	
	//此網站視頻不支持獲取時間長度
	$timelong = 0;
	$TAR_return['timelong_1'] = floor($timelong/60);
	$TAR_return['timelong_2'] = $timelong%60;
	//以上是視頻時長的處理方法 ================================

    //導演		
	preg_match("#<b>导演：<\/b>(.*?)<br>#is", $c, $datarow);
	$TAR_return['director'] = $datarow[1];
	//以上，導演結束。

    //主演		
	preg_match("#<b>主演：<\/b>(.*?)<br>#is", $c, $datarow);
	$TAR_return['actor'] = str_replace('、', ',', $datarow[1]);
	//以上，主演結束。

	
	return  $TAR_return;
}

?>