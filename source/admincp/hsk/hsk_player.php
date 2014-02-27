<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//自动升级子菜单
$hsk_id		= 'player';
$do			= intval($_GET['do']) ? intval($_GET['do']) : 1;
$menu_list = getpopmenu($hsk_id, $do);

shownav('hsk', 'hsk_header_nav');
showsubmenu('hsk_player', $menu_list);

$cmp_config = DISCUZ_ROOT.'./data/hskcenter/hsk_cmp4.inc.php';

if($do == '1') {	//类别管理
	if(!submitcheck('submit')) {

		showformheader('hsk&operation=player&do=1');
		showtableheader();
		showsubtitle(array('', 'name', 'index_set_value'));
		showtagheader('tbody', '', true);

		if(!file_exists($cmp_config)){
			//配置文件未找到！
			$myarray = array(	'name'			=> 'Your site url',
								'link'			=> '/',
								'description'	=> '',
								'logo'			=> '{src:static/image/common/logo.png, xywh:[20,20,0,0]}',
								'logo_alpha'	=> '0.5',
								'auto_play'		=> '1',
								'context_menu'	=> '0',
								'imagesrc'		=> '/v/images/yinfu.png',
								'senddomain'	=> 'youku.com,tudou.com,tudouui.com',
								'defaultskin'	=> '',
								'playername'	=> 'yinfu.swf',
								);	
		}else{
			require_once "$cmp_config";
			$myarray = $_CMP4['cmp_config'];
		}


		//生成皮肤列表
		$skins_folder= DISCUZ_ROOT.'v/skins/';
		$fp=opendir($skins_folder);
		$skins_list = array();
		while(false != $file = readdir($fp))
		{
			if($file!='.' && $file!='..' && in_array(substr($file,-4), array('.zip', '.swf'))){
				$skins_list[] = $file;
			}
		}

		showtablerow('', array('', '', '',''), array("", cplang('cmpsenddomain'), "<input type=\"text\" class=\"txt\" name=\"newcmp_senddomain\" value=\"$myarray[senddomain]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "name", "<input type=\"text\" class=\"txt\" name=\"newcmp_name\" value=\"$myarray[name]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "link", "<input type=\"text\" class=\"txt\" name=\"newcmp_link\" value=\"$myarray[link]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "description", "<input type=\"text\" class=\"txt\" name=\"newcmp_description\" value=\"$myarray[description]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "logo", "<input type=\"text\" class=\"txt\" name=\"newcmp_logo\" value=\"$myarray[logo]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "logo_alpha", "<input type=\"text\" class=\"txt\" name=\"newcmp_logo_alpha\" value=\"$myarray[logo_alpha]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "auto_play", "<input type=\"text\" class=\"txt\" name=\"newcmp_auto_play\" value=\"$myarray[auto_play]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", "context_menu", "<input type=\"text\" class=\"txt\" name=\"newcmp_context_menu\" value=\"$myarray[context_menu]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", cplang('cmpnofindsrc'), "<input type=\"text\" class=\"txt\" name=\"newcmp_imagesrc\" value=\"$myarray[imagesrc]\" style=\"width:450px;\">"));
		showtablerow('', array('', '', '',''), array("", 'CMP4 Player name', "<input type=\"text\" class=\"txt\" name=\"newcmp_playername\" value=\"$myarray[playername]\" style=\"width:450px;\">"));
		//生成皮肤选择
		$groupselect = null;
		foreach($skins_list as $skinvar){
			$selectedis = $skinvar == $myarray['defaultskin'] ? ' selected' : null;
			$groupselect .= '<option value="'.$skinvar.'"'.$selectedis.'>'.$skinvar.'</option>';
		}
		$usergroupselect = '<select name="newcmp_defaultskin" size="1">'.$groupselect.'</select>';
		showtablerow('', array('', '', '',''), array("",  cplang('cmpdefaultskin'), $usergroupselect));

		showtagfooter('tbody');
		showsubmit('submit', 'submit');
		showtablefooter();
		showformfooter();

	} else {

		if(!file_exists($cmp_config)){}else{require_once "$cmp_config";}
		//提交
		$name			= dhtmlspecialchars($_GET['newcmp_name']);
		$link			= dhtmlspecialchars($_GET['newcmp_link']);
		$description	= dhtmlspecialchars($_GET['newcmp_description']);
		$logo			= dhtmlspecialchars($_GET['newcmp_logo']);
		$logo_alpha		= dhtmlspecialchars($_GET['newcmp_logo_alpha']);
		$auto_play		= intval($_GET['newcmp_auto_play']);
		$context_menu	= intval($_GET['newcmp_context_menu']);
		$imagesrc		= dhtmlspecialchars($_GET['newcmp_imagesrc']);
		$senddomain		= dhtmlspecialchars($_GET['newcmp_senddomain']);
		$defaultskin	= dhtmlspecialchars($_GET['newcmp_defaultskin']);
		$playername		= dhtmlspecialchars($_GET['newcmp_playername']);

		$newarray		= array('name'			=> $name,
								'link'			=> $link,
								'description'	=> $description,
								'logo'			=> $logo,
								'logo_alpha'	=> $logo_alpha,
								'auto_play'		=> $auto_play,
								'context_menu'	=> $context_menu,
								'imagesrc'		=> $imagesrc,
								'senddomain'	=> $senddomain,
								'defaultskin'	=> $defaultskin,
								'playername'	=> $playername,
							);
		$_CMP4['cmp_config'] = $newarray;

		//生成默认皮肤
		$senddomainarray = explode(",", $senddomain);
		if(count($senddomainarray)<1 || $_CMP4['skins']){}else{
			$skins_folder= DISCUZ_ROOT.'v/skins/';
			$fp=opendir($skins_folder);
			$skins_list = array();
			$defaultskin = '';
			while(false != $file = readdir($fp))
			{
				if($file!='.' && $file!='..' && in_array(substr($file,-4), array('.zip', '.swf'))){
					$defaultskin = $file;
					break;
				}
			}

			foreach($senddomainarray as $domain){
				$_CMP4['skins'][$domain] = $defaultskin;
			}
		}

		hsk_tocache('cmp4.inc', hsk_getcachevars(array('_CMP4' => $_CMP4)));

		cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=player', 'succeed');

	}

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