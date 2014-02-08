<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$dzp_root = "source/plugin/huxdzp";
global $_G;
$action = empty($_GET['action']) ? '' : addslashes($_GET['action']);
$uid = $_G['uid'];
$adminid = $_G['adminid'];
$username = $_G['username'];
$dzpsetting = $_G['cache']['plugin']['huxdzp'];
$paymoney = "extcredits".$dzpsetting['paymoney'];
$paymoneynum = $dzpsetting['paymoneynum'];
$paymoneyname = $_G['setting']['extcredits'][$dzpsetting['paymoney']]['title'];
$paymoneyunit = $_G['setting']['extcredits'][$dzpsetting['paymoney']]['uint'];
$mycash = $_G['member'][$paymoney];
$jlmsg = $dzpsetting['jlmsg'];
$zjlistnum = $dzpsetting['nums'];
$atclassa = '';
$atclassb = '';
$atclassc = '';
$atclassd = '';
$atclasse = '';
$str = '';

if ($action == 'jplist') {
  $atclassb = 'class=a';
  $query = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_jx')." ORDER BY jorder");
  while($dzp = DB::fetch($query)) {
    $jxlist[] = $dzp;
  }
}elseif ($action == 'myjl') {
  if(empty($uid)) showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));

  $atclassc = 'class=a';
  $perpage = $zjlistnum;
  $n = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_userjp')." WHERE uid='$uid'");
  $numd = DB::num_rows($n);
  $page = max(1, addslashes($_GET['page']));	
  $start = ($page-1)*$perpage;
  $queryd = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_userjp')." WHERE uid='$uid' ORDER BY eid DESC limit $start,$perpage");
  while($resultd = DB::fetch($queryd)){
    $myjl[] = $resultd;
  }
  $multi = multi($numd, $perpage, $page, "plugin.php?id=huxdzp:huxdzp&action=myjl");
}elseif ($action == 'ffsq') {
  if(empty($uid)) showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));

  $eid = addslashes($_GET['eid']);
    DB::query("UPDATE ".DB::table('plugin_zhuanpan_userjp')." SET sqstate='1' WHERE eid='$eid'");
  showmessage('huxdzp:op_sus','plugin.php?id=huxdzp:huxdzp&action=myjl');
}elseif ($action == 'managejpff') {
  if($adminid != '1'){
    showmessage('huxdzp:not_allow');
  }
  $atclasse = 'class=a';
  $perpage = $dzpsetting['nums'];
  $n = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_userjp')." WHERE sqstate='1' and jpstate='0'");
  $numd = DB::num_rows($n);
  $page = max(1, addslashes($_GET['page']));	
  $start = ($page-1)*$perpage;
  $queryd = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_userjp')." WHERE sqstate='1' and jpstate='0' ORDER BY eid DESC limit $start,$perpage");
  while($resultd = DB::fetch($queryd)){
    $mnjpff[] = $resultd;
  }
  $multi = multi($numd, $perpage, $page, "plugin.php?id=huxdzp:huxdzp&action=managejpff");
}elseif ($action == 'jpffsave') {
  if($adminid != '1'){
    showmessage('huxdzp:not_allow');
  }

  $eid = addslashes($_GET['eid']);
  DB::query("UPDATE ".DB::table('plugin_zhuanpan_userjp')." SET jpstate='1' WHERE eid='$eid'");
  showmessage('huxdzp:op_sus','plugin.php?id=huxdzp:huxdzp&action=managejpff');
}else{
  $atclassa = 'class=a';
}
include template('huxdzp:huxdzp');
?>