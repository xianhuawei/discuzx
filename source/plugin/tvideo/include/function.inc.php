<?php

foreach($_GET as $k => $v) {
	$_G['onez_'.$k] = function_exists('daddslashes') ? daddslashes($v) : $v;
}
foreach($_POST as $k => $v) {
	$_G['onez_'.$k] = function_exists('daddslashes') ? daddslashes($v) : $v;
}
global $tvideo;
$tvideo = $_G['cache']['plugin']['tvideo'];

function tvideo_dzToFlash($str){
  global $_G;
  if(strtolower($_G['charset'])!='utf-8'){
    $str=tvideo_oiconv($_G['charset'],'utf-8',$str);
  }
  return $str;
}
function tvideo_FlashToDz($str){
  global $_G;
  if(strtolower($_G['charset'])!='utf-8'){
    $str=tvideo_oiconv('utf-8',$_G['charset'],$str);
  }
  return $str;
}
function tvideo_oiconv($from,$to,$string){
  if(function_exists('mb_convert_encoding')){
    return mb_convert_encoding($string,$to,$from);
  }else{
    return iconv($from,$to,$string);
  }
}
function tvideo_upload2(){
  global $_G;
  $id=$_G['onez_flvid'];
  
  $name=$_FILES['thumb']['name'];
  $_FILES['thumb']['error'] && exit('Error');
  $filetype=strtolower(end(explode('.',$name)));
  if($filetype!='jpg')exit('Error Format');
  $path=DISCUZ_ROOT.'./data/cache/tvideo';
  if(!file_exists($path))@mkdir($path,0777);
  @touch("$path/index.html");
  $file=$id.'.'.$filetype;
  if(@copy($_FILES['thumb']['tmp_name'], $path.'/'.$file)) {
    $succeed2 = true;
  }elseif(function_exists('move_uploaded_file') && @move_uploaded_file($_FILES['thumb']['tmp_name'], $path.'/'.$file)) {
    $succeed2 = true;
  }
  
	if($succeed2) {
    exit("ok$id");
	}
}
function tvideo_parse2($url){
  return tvideo_insertflash('source/plugin/tvideo/template/player2.swf','flv='.$url,225,171,'tvideo');
}
function tvideo_insertflash($Flash,$Vars,$width,$Height,$ID){
  strpos($Flash,'?')===false && $Flash.='?t='.@filemtime($Flash);
  $fullcode=0;
  if($fullcode){
    $FlashHtml='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ';
    $FlashHtml.='codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" ';
    $FlashHtml.='width="' . $width . '" height="' . $Height . '" id="' . $ID . '">';
    $FlashHtml.='<param name="movie" value="' . $Flash . '">';
    $FlashHtml.='<param name="quality" value="high">';
    $FlashHtml.='<param name="allowFullScreen" value="true">';
    $FlashHtml.='<param name="wmode" value="opaque">';
    $FlashHtml.='<param name="allowscriptaccess" value="always">';
    $FlashHtml.='<param name="FlashVars" value="'.$Vars.'">';
  }
  $FlashHtml.='<embed src="' . $Flash . '" name="' . $ID . '" quality="high" allowscriptaccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" ';
  $FlashHtml.='type="application/x-shockwave-flash" width="' . $width . '" FlashVars="'.$Vars.'" wmode="opaque" allowFullScreen="true" height="' . $Height . '"></embed>';
  if($fullcode){
    $FlashHtml.='</object>';
  }
  return $FlashHtml;
}
function tvideo_json($a=false){
  if (is_null($a)) return 'null'; 
  if ($a === false) return 'false'; 
  if ($a === true) return 'true'; 
  if (is_scalar($a)){ 
    if (is_float($a)){ 
      return floatval(str_replace(",", ".", strval($a))); 
    } 
    if (is_string($a)) { 
      $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"')); 
      return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"'; 
    }else{
       return $a; 
    }
  } 
  $isList = true; 
  for($i = 0, reset($a); $i < count($a); $i++, next($a)){ 
    if(key($a) !== $i){ 
      $isList = false; 
      break; 
    } 
  } 
  $result = array(); 
  if ($isList){ 
    foreach ($a as $v) $result[] = tvideo_json($v); 
    return '[' . join(',', $result) . ']'; 
  }else{
    foreach ($a as $k => $v) $result[] = tvideo_json($k).':'.tvideo_json($v); 
    return '{' . join(',', $result) . '}'; 
  } 
}
?>