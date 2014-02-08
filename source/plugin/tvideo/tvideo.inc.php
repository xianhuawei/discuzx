<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/tvideo/include/function.inc.php';
$action=$_G['onez_action'];
if($action=='insert2'){
  $flashvars='timelength='.(int)$tvideo['timelength2'];
  $flash=tvideo_insertflash('source/plugin/tvideo/template/CamRecord.swf',$flashvars,367,482,'tvideo_insert2');
  include template('tvideo:insert2');
}elseif($action=='upload2'){
  set_time_limit(0);
  $credittype=$tvideo['credittype'];
  $credit=$tvideo['credit2'];
  if($credit>0){
    $row = DB::fetch_first('SELECT * FROM '. DB::table('common_member_count').' where uid='.$_G['uid']); 
    $money = (int)$row['extcredits'.$credittype];
    if($money<$credit){
      exit(tvideo_dzToFlash(lang('plugin/tvideo','lowcredit')));
    }
    updatemembercount($_G['uid'], array($credittype => -$credit));
  }
  $url=tvideo_upload2();
  exit($url);
}elseif($action=='flv'){
  $id=$_G['onez_flvid'];
  $file='/data/cache/tvideo/'.$id.'.flv';
  
  $filename=DISCUZ_ROOT.$file;
  if(file_exists($filename)){
    exit($_G['siteurl'].$file);
  }else{
    $info=parse_url($_G['siteurl']);
    $site=strtolower($info['host']);
    $url="http://fms.onez.cn/flvs/$site/$id.flv";
    set_time_limit(0);
    @touch($filename);
    $data=@file_get_contents($url);
    if($data){
      @file_put_contents($filename,$data);
    }
  }
  
  exit();
}
?>