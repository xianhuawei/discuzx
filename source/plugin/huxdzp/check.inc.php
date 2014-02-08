<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once DISCUZ_ROOT.'./source/plugin/huxdzp/huxdzp.func.php';

global $_G;
$uid = $_G['uid'];
$username = $_G['username'];
$dzpsetting = $_G['cache']['plugin']['huxdzp'];
$paymoney = "extcredits".$dzpsetting['paymoney'];
$paymoneyname = $_G['setting']['extcredits'][$dzpsetting['paymoney']]['title'];
$paymoneyunit = $_G['setting']['extcredits'][$dzpsetting['paymoney']]['uint'];
$paymoneynum = $dzpsetting['paymoneynum'];
$awmoney = $dzpsetting['awmoney'];
$playnum = $dzpsetting['playnum']-1;
$mycash = getuserprofile($paymoney);
$open = $dzpsetting['open'];
$langninb = lang('plugin/huxdzp','ninb');
$langbuzu = lang('plugin/huxdzp','buzu');
$langweizhong = lang('plugin/huxdzp','weizhong');
$langloginmsg = lang('plugin/huxdzp','loginmsg');
$jlmsg = $dzpsetting['jlmsg'];
$mrawmsg = $dzpsetting['mrawmsg'];
$gailvs = trim($dzpsetting['gailv']);
$gailv = explode(',' ,$gailvs);
$loginstat = '';
$gamemsg = '';
$winmsg = '';
if ($uid){
          if($mycash >= $paymoneynum){
            $loginstat = '&game=1';
            DB::query("UPDATE ".DB::table('common_member_count')." SET $paymoney=$paymoney-$paymoneynum WHERE uid='$uid'");

	    $getValue=new getValues();
	    $array=$gailv;
	    $getValue->inputValue($array);
	    foreach($getValue->getValue(1) as $k){
	      $winnumber = $k;
	    }

            $jx = DB::fetch_first("SELECT * FROM ".DB::table('plugin_zhuanpan_jx')." where jid='$winnumber'");
	    $jid = $jx['jid'];
	    if ($jid > 12) {
	      $winmsg = $langweizhong;
	    }else{
		    DB::query("INSERT INTO ".DB::table('plugin_zhuanpan_userjp')." (jxname,jpstate,sqstate,uid,username) VALUE('$jx[jname]','0','0','$uid','$username')");
		  $winmsg = $jlmsg.'['.$jx['jname'].']';
            }

          }else{
            $loginstat = '&game=0';
            $gamemsg = $langninb.$paymoneyname.$langbuzu;
          }
}else{
$loginstat = '&game=0';
$gamemsg = $langloginmsg;
}

echo "$loginstat|$gamemsg|$winmsg|$winnumber";
?>