<?php
!defined('IN_DISCUZ') && exit('Access Denied');
!defined('IN_ADMINCP') && exit('Access Denied');

showtableheader(lang("plugin/dsu_amupper","list_h1"));
$limit = 40;
$num = C::t('#dsu_amupper#plugin_dsuamupper')->count();
$page = max(1, intval($_GET['page']));
$start_limit = ($page - 1) * $limit;
$url = "admin.php?action=plugins&operation=config&identifier=dsu_amupper&pmod=list";
$multipage = multi($num, $limit, $page, $url);
$result_all = C::t('#dsu_amupper#plugin_dsuamupper')->range($start_limit,$limit);

showsubtitle(array('', lang("plugin/dsu_amupper",'list_t1'), lang("plugin/dsu_amupper",'list_t2'), lang("plugin/dsu_amupper",'list_t3'), lang("plugin/dsu_amupper",'list_t4')));
foreach($result_all as $k=>$result){
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