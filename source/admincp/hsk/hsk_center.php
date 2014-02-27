<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//自动升级子菜单
$hsk_id		= 'center';
$do			= intval($_GET['do']) ? intval($_GET['do']) : 1;
$menu_list = getpopmenu($hsk_id, $do);

shownav('hsk', 'hsk_header_nav');
showsubmenu('hsk_types', $menu_list);


if($do == '1') {	//类别管理
	$cp = $_GET['cp'];
	$id = $_GET['id'];

	showtableheader('hsk_hack_info');
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_hack_ver'), $_HSK['config']['var'].'&nbsp; <span id="newvar_get">'.cplang('hsk_config_loading').'</span>'));
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_hack_lang'), $_HSK['config']['lang']));
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_hack_authorize'), '<span id="anthorze_get">'.cplang('hsk_config_loading').'</span>'));
	showtablefooter();
	showtableheader('hsk_developers_info');
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_developers_anthor'), $_HSK['config']['d_anthor']));
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_developers_copyright'), $_HSK['config']['d_copyright']));
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_developers_site'), '<a href="'.$_HSK['config']['d_site'].'" target="_blank">'.$_HSK['config']['d_site'].'</a>'));
	showtablerow('class="hover"', array('class="td24"'), array(cplang('hsk_ddzz_info'), $_update['ddzz_close'] ? cplang('hsk_ddzz_open') : cplang('hsk_ddzz_close')));
	if(!$_update['ddzz_close']){
		showtablerow('class="hover"', array('class="td24"'), array('', '<span id="ddzz_get">'.cplang('hsk_config_loading').'</span>'));
	}
	showtablefooter();

}elseif($do == '8'){		//开关最新动态
	$mod = dhtmlspecialchars($_GET['mod']);
	if($mod == 'open' && $_update['ddzz_close']){
		//开启动态
		$cachearr = null;
		$cachearr = "\$_update['ddzz_close'] = 0;\n\$_update['ddzz_site'] = 'http://ddzz.cc/v4.php';\n";
		hsk_tocache('ddzzinfo.inc', $cachearr);
	}elseif($mod == 'close' && !$_update['ddzz_close']){
		//关闭动态
		$cachearr = null;
		$cachearr = "\$_update['ddzz_close'] = 1;\n";
		hsk_tocache('ddzzinfo.inc', $cachearr);
	}

	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=center', 'succeed');


}else{//其它管理
	$includefile = DISCUZ_ROOT."./source/admincp/hsk/include/".$hsk_id."_do_".$do.".inc.php";
	if(is_file($includefile)){//执行
		$cp = $_GET['cp'];
		$id = $_GET['id'];
		include $includefile;
	}else{
		cpmsg('hsk_hskcenter_error', '', 'error');
	}
}
?>
<script type="text/javascript">
	ajaxget("admin.php?action=hsk&operation=center&do=6", "newvar_get");
	ajaxget("admin.php?action=hsk&operation=center&do=7", "anthorze_get");
	<?php
		if(!$_update['ddzz_close']){echo 'ajaxget("admin.php?action=hsk&operation=center&do=9", "ddzz_get")';}
	?>
</script>