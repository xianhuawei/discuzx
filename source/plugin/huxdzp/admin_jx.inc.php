<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$PSlang = $scriptlang['huxdzp'];
$PTlang = $templatelang['huxdzp'];
$op = addslashes($_GET['op']);
if(submitcheck('dzpsubmit')) {
  $queryaa = DB::query("SELECT count(jid) as jnum FROM ".DB::table('plugin_zhuanpan_jx')."");
  $dzpaa = DB::fetch($queryaa);

  $query = DB::query("SELECT jid FROM ".DB::table('plugin_zhuanpan_jx')." ORDER BY jorder");
  while($dzp = DB::fetch($query)) {

    if ($dzpaa['jnum'] >0){
    $jid = addslashes($_GET['jid'.$dzp['jid']]);
    $jorder = addslashes($_GET['jorder'.$dzp['jid']]);
    $jname = addslashes($_GET['jname'.$dzp['jid']]);
    DB::query("update ".DB::table('plugin_zhuanpan_jx')." set jorder='$jorder',jname='$jname' where jid='$jid'");
    }
  }
  cpmsg($PSlang['op_sus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=huxdzp&pmod=admin_jx', 'succeed');
}else{
  showformheader('plugins&operation=config&do='.$pluginid.'&identifier=huxdzp&pmod=admin_jx', 'dzpsubmit');

  showtableheader();

  showsubtitle(array($PTlang['jid'], 'display_order', $PTlang['jname']));

  $querybb = DB::query("SELECT count(jid) as jnum FROM ".DB::table('plugin_zhuanpan_jx')."");
  $dzpbb = DB::fetch($querybb);

  $query = DB::query("SELECT * FROM ".DB::table('plugin_zhuanpan_jx')." ORDER BY jorder");
    while($dzp = DB::fetch($query)) {

      if ($dzpbb['jnum'] >0){
        showtablerow('', array('class="td25"', 'class="td28"'), array(
$dzp[jid],
'<input type="hidden" name="jid'.$dzp[jid].'" value="'.$dzp[jid].'" /><input type="text" class="txt" name="jorder'.$dzp[jid].'" value="'.$dzp[jorder].'" size="2" />',
'<input type="text" class="txt" name="jname'.$dzp[jid].'" value="'.$dzp[jname].'" size="2" />'));
      }else{
        showtablerow('', array('class="td25"', 'class="td28"'), array(
'no data'));
      }
    }
showsubmit('dzpsubmit', 'submit');

showtablefooter();

showformfooter();
}
?>