<?php
!defined('IN_DISCUZ') && exit('Access Denied');
!defined('IN_ADMINCP') && exit('Access Denied');




showtableheader(lang("plugin/dsu_amupper","list_h1"));
$limit = 40;
$num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('plugin_dsuamupper'));
$page = max(1, intval($_GET['page']));
$start_limit = ($page - 1) * $limit;
$url = "admin.php?action=plugins&operation=config&identifier=dsu_amupper&pmod=list";
$multipage = multi($num, $limit, $page, $url);
$sql="SELECT * FROM ".DB::table('plugin_dsuamupper')." ORDER BY addup DESC , cons DESC ,lasttime LIMIT ".$start_limit." ,".$limit;
$querygg=DB::query($sql);
showsubtitle(array('', lang("plugin/dsu_amupper",'list_t1'), lang("plugin/dsu_amupper",'list_t2'), lang("plugin/dsu_amupper",'list_t3'), lang("plugin/dsu_amupper",'list_t4')));
while ($result=DB::fetch($querygg)){
	if($result['uname']){
		$result['uname'] = "<a href='home.php?mod=space&uid={$result['uid']}&do=profile' TARGET='viewer'>{$result['uname']}</a>({$result['uid']})";
	}else{
		$result['uname'] = "<a href='home.php?mod=space&uid={$result['uid']}&do=profile' TARGET='viewer'>UID:{$result['uid']}</a>";
	}
	showtablerow('', array(' ', ' ', ' ', ' '), array('', $result['uname'], $result['addup'], $result['cons'], dgmdate($result['lasttime'],'Y-m-d H:m:s',$_G['setting']['timeoffset'])));
}

showtablerow('', array(' ', ' ', ' ', ' '), array('', '', '', '', $multipage));
showtablefooter();




?>