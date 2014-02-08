<?php
!defined('IN_DISCUZ') && exit('Access Denied');
!defined('IN_ADMINCP') && exit('Access Denied');

if(!$_GET['submit']){
	showtableheader(lang("plugin/dsu_amupper","trans_h1"));
	showformheader("plugins&operation=config&identifier=dsu_amupper&pmod=trans&submit=1", "");
	showsetting(lang('plugin/dsu_amupper','trans_f1'), 'reserve', '1', 'radio');
	echo '<input type="hidden" name="formhash" value="'.FORMHASH.'">';
	showsubmit('submit', "OK!");
	showformfooter();
	showtablefooter();
}elseif($_GET['submit'] && $_GET['reserve'] && $_G['adminid']=='1' && $_GET['formhash']==FORMHASH){
	$formhash = FORMHASH;
	$limit = 400;
	$tablename = DB::table('dsu_paulsign');
	$amuppertable = DB::table('plugin_dsuamupper');
	$query = DB::query("SHOW TABLES LIKE '$tablename'");
	$paulsign_exist = 0;
	if(DB::num_rows($query) > 0){$paulsign_exist = 1;}
	$query = DB::query("SHOW TABLES LIKE '$amuppertable'");
	$amupper_exist = 0;
	if(DB::num_rows($query) > 0){$amupper_exist = 1;}
	if($paulsign_exist && $amupper_exist){
		$num = DB::result_first("SELECT COUNT(*) FROM ".$tablename);
		$page = max(1, intval($_GET['page']));
		$start_limit = ($page - 1) * $limit;
	    $maxpage = ceil($num/$limit);
		$nextpage = $page + 1;
		$query = DB::query("SELECT * FROM ".DB::table('dsu_paulsign')." LIMIT ".$start_limit." ,".$limit);
		while($mrc = DB::fetch($query)){
				$mrc['mdays'] = $mrc['mdays'] + 1;
				$mrc['time2'] = dgmdate($mrc['time'],'Ymd',$_G['setting']['timeoffset']);
				DB::query("REPLACE INTO ".$amuppertable." (uid, uname, lasttime, time, cons, addup, allow) VALUES ('$mrc[uid]', '$mrc[uname]', '$mrc[time]', '$mrc[time2]', '$mrc[mdays]', '$mrc[days]', '0')");
		}
	}else{
		cpmsg('dsu_amupper:admin_no', 'action=plugins&operation=config&identifier=dsu_amupper&pmod=trans','succeed');
	}

	if($page<$maxpage){
		cpmsg(lang('plugin/dsu_amupper','admin_ing',array('jindu'=>$page.'/'.$maxpage)), 'action=plugins&operation=config&identifier=dsu_amupper&pmod=trans&reserve=reserve&submit=submit&formhash='.$formhash.'&page='.$nextpage,'loading');
	}else{
		cpmsg('dsu_amupper:admin_i', 'action=plugins&operation=config&identifier=dsu_amupper','succeed');
	}
}

?>