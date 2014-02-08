<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$Plang = $scriptlang['hux_wx'];
if($_GET['op'] == 'add') {
	if ($_GET['formhash'] == formhash()) {
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/lang/lang.'.currentlang().'.php';
		$huxapplangname = $_GET['appid'].'lang';			
		$appnamebak = $$huxapplangname;
		if ($_GET['appid'] == 'at') {
			$appid = '@';
		} elseif ($_GET['appid'] == 'login') {
			$appid = '#';
		} else {
			$appid = $_GET['appid'];
		}
		$apparr = array(
			'appid' => $_GET['appid'],
			'appcmd' => $appid,
			'appcmdtxt' => $appnamebak['appcmdtxt'],
			'configs' => $appnamebak['configs'],
			'paixu' => 0,
			'admincmd' => $appnamebak['admincmd'],
			'appver' => $appnamebak['appver'],
		);
		$appnum = C::t('#hux_wx#hux_wx_config')->fetch_by_appid($_GET['appid']);
		if (!$appnum) {
			C::t('#hux_wx#hux_wx_config')->insert($apparr);
		}
		require_once libfile('function/plugin');
		if (!$appnum) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/install.php';
		}
		cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
	}
} elseif($_GET['op'] == 'del') {
	if ($_GET['formhash'] == formhash()) {
		C::t('#hux_wx#hux_wx_config')->delete_by_appid($_GET['appid']);
		require_once libfile('function/plugin');
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/uninstall.php';
		cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
	}
} elseif($_GET['op'] == 'appup') {
	if ($_GET['formhash'] == formhash()) {
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/lang/lang.'.currentlang().'.php';
		$huxapplangname = $_GET['appid'].'lang';			
		$appnamebak = $$huxapplangname;
		$appver = C::t('#hux_wx#hux_wx_config')->fetch_by_appid($_GET['appid'],'appver');
		if ($appver['appver'] == $appnamebak['appver']) {
			cpmsg($Plang['notup'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
		} else {
			C::t('#hux_wx#hux_wx_config')->update_appver_by_appid($_GET['appid'],$appnamebak['appver']);
			require_once libfile('function/plugin');
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/upgrade.php';
			cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
		}
	}
} elseif($_GET['op'] == 'set') {
	$appnum = C::t('#hux_wx#hux_wx_config')->fetch_by_appid($_GET['appid']);
	if (submitcheck('submit')) {
		if (($appnum['appid'] == 'at' && $_GET['appcmd'] != '@') || ($appnum['appid'] == 'login' && $_GET['appcmd'] != '#')) {
			cpmsg('#|'.$Plang['aterr'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
		} else {
			$configs_datas = explode('&',urldecode(file_get_contents("php://input")));
			foreach($configs_datas as $value){
				$configs_datass = explode('=',$value);
				$configs_data .= $configs_datass[0].':'.$configs_datass[1].'||';
			}
			$data_arr = array(
				'appcmd' => $_GET['appcmd'],
				'appcmdtxt' => $_GET['appcmdtxt'],
				'paixu' => $_GET['paixu'],
				'configs' => str_replace("\r\n","[n]",$configs_data)
			);
			C::t('#hux_wx#hux_wx_config')->update($appnum['id'],$data_arr);
			cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
		}
	} else {
		if ($appnum) {
			$appconfigs = explode('||',$appnum['configs']);
			foreach($appconfigs as $value){ 
				$appconfigss = explode(':',$value);
				$appconfig[$appconfigss[0]] = $appconfigss[1];
			}
		}
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=set&');
		showtableheader();
		echo '<tr class="header"><th>'.$Plang['appcmd'].'</th><th></th></tr>';
		echo '<tr><td width="300"><input name="appcmd" type="text" value="'.$appnum['appcmd'].'" size="40" /><input name="appid" type="hidden" value="'.$appnum['appid'].'" /></td><td></td></tr>';
		echo '<tr class="header"><th>'.$Plang['appcmdtxt'].'</th><th></th></tr>';
		echo '<tr><td><input name="appcmdtxt" type="text" value="'.$appnum['appcmdtxt'].'" size="40" /></td><td></td></tr>';
		echo '<tr class="header"><th>'.$Plang['paixu'].'</th><th></th></tr>';
		echo '<tr><td><input name="paixu" type="text" value="'.$appnum['paixu'].'" size="40" /></td><td></td></tr>';
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/admin.php';
		showtablefooter();
		showsubmit('submit', 'submit');
	}
} elseif($_GET['op'] == 'modadmin') {
	include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$_GET['appid'].'/admincp.php';
} elseif($_GET['op'] == 'state') {
	if ($_GET['formhash'] == formhash()) {
		C::t('#hux_wx#hux_wx_config')->update($_GET['eid'],array('state'=>$_GET['stateac']));
		cpmsg($Plang['opsus'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp', 'succeed');
	}
} else {
	$sqlapp = C::t('#hux_wx#hux_wx_config')->fetch_all('*','ORDER BY paixu ASC');
	echo '<strong>'.$Plang['cmdadd'].'</strong>';
	showtableheader();
	echo '<tr class="header"><th>'.$Plang['appcmd'].'</th><th>'.$Plang['appid'].'</th><th>'.$Plang['appcmdtxt'].'</th><th>'.$Plang['qx'].'</th><th>'.$Plang['appver'].'</th><th>'.$Plang['jpstate'].'</th><th>'.$Plang['op'].'</th></tr>';
	foreach ($sqlapp as $v) {
		include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$v['appid'].'/lang/lang.'.currentlang().'.php';
		$huxapplangname = $v['appid'].'lang';			
		$appnamebak = $$huxapplangname;
		$v['new'] = $v['appver'] != $appnamebak['appver'] ? '&nbsp;<font color=red>NEW&nbsp;'.$appnamebak['appver'] : '';
		$v['appqx'] = $v['admincmd'] == 1 ? $Plang['guanli'] : $Plang['member'];
		if ($v['state'] == 1) {
			$v['state'] = $Plang['hide'];
			$v['stateop'] = $Plang['show'];
			$v['stateac'] = 0;
		} else {
			$v['state'] = $Plang['show'];
			$v['stateop'] = $Plang['hide'];
			$v['stateac'] = 1;
		}
		echo '<tr><td>'.$v['appcmd'].'</td><td>'.$v['appid'].'</td><td>'.$v['appcmdtxt'].'</td><td>'.$v['appqx'].'</td><td>'.$v['appver'].$v['new'].'</td><td>'.$v['state'].'</td><td><a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=set&appid='.$v['appid'].'>'.$Plang['set'].'</a>&nbsp;|&nbsp;<a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=state&stateac='.$v['stateac'].'&eid='.$v['id'].'&formhash='.FORMHASH.'>'.$v['stateop'].'</a>&nbsp;|&nbsp;<a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=appup&appid='.$v['appid'].'&formhash='.FORMHASH.'>'.$Plang['appup'].'</a>&nbsp;|&nbsp;<a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=del&appid='.$v['appid'].'&formhash='.FORMHASH.'>'.$Plang['delete'].'</a></td></tr>';
	}
	showtablefooter();
	echo '<br><strong>'.$Plang['cmddel'].'</strong>';
	showtableheader();
	foreach ($sqlapp as $v) {
		$appss[] = $v['appid'];
	}
	$appss = array_unique($appss);
	$appss = array_filter($appss);
	$appdir = DISCUZ_ROOT.'./source/plugin/hux_wx/mod';
	$appsdir = dir($appdir);
	echo '<tr class="header"><th>'.$Plang['appcmd'].'</th><th>'.$Plang['appcmdtxt'].'</th><th>'.$Plang['qx'].'</th><th>'.$Plang['appver'].'</th><th>'.$Plang['op'].'</th></tr>';
	while($appid = $appsdir->read()) {
		if(!in_array($appid, array('.', '..')) && is_dir($appdir.'/'.$appid) && !in_array($appid,$appss)) {
			include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/'.$appid.'/lang/lang.'.currentlang().'.php';
			$huxapplangname = $appid.'lang';			
			$appnamebak = $$huxapplangname;
			$appnamebak['appqx'] = $appnamebak['admincmd'] == 1 ? $Plang['guanli'] : $Plang['member'];
			echo '<td>'.$appid.'</td><td>'.$appnamebak['appcmdtxt'].'</td><td>'.$appnamebak['appqx'].'</td><td>'.$appnamebak['appver'].'</td><td><a href='.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=hux_wx&pmod=admincp&op=add&appid='.$appid.'&formhash='.FORMHASH.'>'.$Plang['add'].'</a></td></tr>';
		}
	}
	showtablefooter();
}
?>