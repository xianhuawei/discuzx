<?php


if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$action	= dhtmlspecialchars($_GET['action']);

$fid	= intval($fid);
$size	= intval($_GET['size']);

if($fid){
	foreach($_SORT as $datarow){
		if($datarow['sid'] == $fid){
			$_maxwidth		= $datarow['rewid'] ? $datarow['rewid'] : $_maxwidth;						//截图宽度
			$_maxheight		= $datarow['rehei'] ? $datarow['rehei'] : $_maxheight;						//截图高度
			$_height		= $_maxheight * 2 + 10;
			$_width			= $_maxwidth * 5 + 70;
		}
	}
	$objis = 'file2';
}elseif($size==1){
	$_maxwidth		= 300;
	$_maxheight		= 96;
	$_height		= $_maxheight * 2 + 10;
	$_width			= $_maxwidth * 2 + 70;
	$objis = 'xfile2';
}elseif($size==2){
	$_maxwidth		= 86;
	$_maxheight		= 50;
	$_height		= $_maxheight * 2 + 10;
	$_width			= $_maxwidth * 5 + 70;
	$objis = 'zfile2';
}elseif($size==3){
	$_maxwidth		= 150;
	$_maxheight		= 100;
	$_height		= $_maxheight * 2 + 10;
	$_width			= $_maxwidth * 5 + 70;
	$objis = 'xfile2';
}

$action = str_replace(" ", '', $action);
$action = str_replace("\"", '', $action);
$action = str_replace("'", '', $action);
$siteurl = 'http://image.baidu.com/i?word='.$action;
$c = hsk_getfile($siteurl);

preg_match_all("#<script>var imgdata =(.*)<\/script>#isU", $c, $datarow);
$c = $datarow[1][0];

if(!$c){
	showmessage(lang('plugin/hsk_vcenter', 'nofindimg'));
}

preg_match_all("#\"objURL\":\"(.*)\"#isU", $c, $datarow);
preg_match_all("/\"width\":(\d+),\"height\":(\d+),/i", $c, $datarow1);

$cm = count($datarow[1]);
$page = ceil($cm/10);

$page_str = null;
for($i=1;$i<=$page;$i++){
	$br	= $page_str ? ' - ' : null;
	$page_str .= $br.'<a href="javascript:;" onclick="return chang_page('.$i.');" class="xi2">['.(($i-1)*10+1)."-".($i*10)."]</a>";
}

include template("ajax_getpic", 'Kannol', PTEM);

?>