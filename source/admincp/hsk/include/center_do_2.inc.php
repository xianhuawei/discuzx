<?php

if(is_file(DISCUZ_ROOT.'./data/hskcenter/hsk_seo.inc.php'))
	require_once DISCUZ_ROOT.'./data/hskcenter/hsk_seo.inc.php';

if(!submitcheck('seosubmit')) {
	
	if(!$seo_new['navtitle']){
		$seo_new['navtitle'] = cplang('header_hsk');
	}
	if(!$seo_new['metadescription']){
		$seo_new['metadescription'] = "{AUTOKEYS}";
	}
	if(!$seo_new['metakeywords']){
		$seo_new['metakeywords'] = cplang('header_hsk');
	}

	showformheader('hsk&operation=center&do='.$do);
	showtableheader();
	showtitle(cplang('setting_seo'));
	showtablerow('', array('class="vtop tips2" colspan="4" style="padding-left:20px;"'), array('<ul><li>'.cplang('setting_seo_seotitle_comment').'</li><li>'.cplang('setting_seo_seodescription_comment').'</li><li>'.cplang('setting_seo_seokeywords_comment').'</li><li>'.cplang('setting_seo_autokeys').'</li></ul>'));

	showtitle(cplang('header_hsk'));
	showtablerow('', array('width="80"', ''), array(
			cplang('setting_seo_seotitle'),
			'<input type="text" name="seotitle_new" value="'.$seo_new['navtitle'].'" class="txt" style="width:280px;" />',
		)
	);
	showtablerow('', array('width="80"', ''), array(
			cplang('setting_seo_seokeywords'),
			'<input type="text" name="seokeywords_new" value="'.$seo_new['metakeywords'].'" class="txt" style="width:280px;" />'
		)
	);
	showtablerow('', array('width="80"', ''), array(
			cplang('setting_seo_seodescription'),
			'<input type="text" name="seodescription_new" value="'.$seo_new['metadescription'].'" class="txt" style="width:280px;" />',
		)
	);

	showtablefooter();
	showtableheader();
	showsetting('setting_seo_seohead', 'seohead_new', $seo_new['seohead'], 'textarea');
	showsubmit('seosubmit', 'submit');
	showtablefooter();
	showformfooter();


}else{

	//生成新数据
	$setting['navtitle']			= trim(dhtmlspecialchars($_GET['seotitle_new']));
	$setting['metakeywords']		= trim(dhtmlspecialchars($_GET['seokeywords_new']));
	$setting['metadescription']		= trim(dhtmlspecialchars($_GET['seodescription_new']));
	$setting['seohead']				= trim(dhtmlspecialchars($_GET['seohead_new']));

	hsk_tocache('seo.inc', hsk_getcachevars(array('seo_new' => $setting)));

	cpmsg('hsk_setconfig_succeed', 'action=hsk&operation=center&do='.$do, 'succeed');

}
?>