<?php
	
if(!defined('IN_DISCUZ') || !defined('IN_MYCENTER')) {
	exit('Access Denied');
}

if(empty($_GET['infloat']))
	exit('Access Denied, NO in float!');

$vid = intval($_GET['vid']);
$query = DB::query("SELECT v.*, m.username FROM ".DB::table('vgallerys')." v LEFT JOIN ".DB::table('common_member')." m ON m.uid=v.uid WHERE v.id='$vid' and v.audit='1'");
if(!$viewdata = DB::fetch($query)){
	showmessage(lang('plugin/hsk_vcenter', 'nofindvid'));
}

$balance = $_mymoney - $viewdata['vprice'];

if(!submitcheck('deletesubmit')) {

	//检查是有未过斯的购买记录
	$query = DB::query("SELECT id, dateline FROM ".DB::table('vgallery_pay')." WHERE vid='$vid' and uid='$discuz_uid'");
	if($datarow = DB::fetch($query)){
		$t = $datarow['dateline'] + $getvar['paytime'] * 3600;
		if(TIMESTAMP <= $t){
			showmessage(lang('plugin/hsk_vcenter', 'pay_error_1'), '', array(), array('closetime' => true, 'showdialog' => 1));
		}
	}

	//整理所属视频类别
	$viewdata['purl'] = getuseimg($viewdata['purl'], $viewdata['remote']);
	$viewdata['dateline'] = gmdate("Y-m-d, H:i", $viewdata['dateline'] + 3600 * $timeoffset);

	include template("topicadmin_pay", 'Kannol', PTEM);

}else{//提交后

	if($balance<0){
		showmessage(lang('plugin/hsk_vcenter', 'pay_error_1'), '', array(), array('closetime' => true, 'showdialog' => 1));
	}

	//开始购买
	DB::query("UPDATE ".DB::table('common_member_count')." SET $money_id=$money_id-$viewdata[vprice] WHERE uid='$discuz_uid'");
	DB::query("INSERT INTO ".DB::table('vgallery_pay')."(uid, vid, author, money, price, dateline) VALUES ('$discuz_uid', '$vid', '$viewdata[uid]', '$creditstrans', '$viewdata[vprice]', '$timestamp')");
	DB::query("UPDATE ".DB::table('common_member_count')." SET $money_id=$money_id+$viewdata[vprice] WHERE uid='$viewdata[uid]'");

	//统计信息
	$query = DB::query("SELECT vid FROM ".DB::table('vgallery_paycount')." WHERE vid='$vid'");
	if($datarow = DB::fetch($query)){
		DB::query("UPDATE ".DB::table('vgallery_paycount')." SET pnum=pnum+1, prices=prices+$viewdata[vprice], lastday='$timestamp' WHERE vid='$vid'");
	}else{
		DB::query("INSERT INTO ".DB::table('vgallery_paycount')."(vid, pnum, prices, lastday) VALUES ('$vid', '1', '$viewdata[vprice]', '$timestamp')");
	}

	//成功了
	showmessage(lang('plugin/hsk_vcenter', 'manage_sc'), sendurl('show', 'v', $vid));
}


?>