<?php


if(!$cp) {

	if(!submitcheck('actorsubmit')) {
		
		$navlist = array();
		$query = DB::query("SELECT * FROM ".DB::table('vgallery_ad')." WHERE styleid in(61,62) order by id");
		while($nav = DB::fetch($query)) {
			$nav['message']	= trim(dhtmlspecialchars(stripslashes($nav['message'])));
			$navlist[$nav['styleid']] = $nav;
		}
		//判断一下有没有这个广告
		if(!$navlist[61]){
			$data = array(
				'styleid'		=> 61,
				'subject'		=> '',
				'message'		=> '',
				'width'			=> 690,
				'height'		=> 0,
				'displayer'		=> 1
			);
			DB::insert('vgallery_ad', $data);
			$tomsg = 1;
		}

		if(!$navlist[62]){
			$data = array(
				'styleid'		=> 62,
				'subject'		=> '',
				'message'		=> '',
				'width'			=> 250,
				'height'		=> 0,
				'displayer'		=> 1
			);
			DB::insert('vgallery_ad', $data);
			$tomsg = 1;
		}

		if($tomsg)
			cpmsg('hsk_hskconfig_bycache', 'action=hsk&operation=adset&do='.$do, 'succeed');

		showformheader('hsk&operation=adset&do='.$do);
		showtableheader('');
		
		showsubtitle(array('ID', 'adset_subject', 'adset_size', 'adset_clicks', 'adset_displayer', ''));

		$i=61;
		foreach($navlist as $nav) {
			showtablerow('', array('style="width:100px;"', '', '', '', '',''), 
				array(
				cplang('ad_place_'.$i),
				"<input type=\"text\" class=\"txt\" size=\"15\" name=\"subjectnew[$nav[id]]\" value=\"".dhtmlspecialchars($nav['subject'])."\" style=\"width:150px;\">",
				$nav['width']." X <input type=\"text\" class=\"txt\" size=\"3\" style=\"width:50px;\" name=\"heightnew[$nav[id]]\" value=\"".dhtmlspecialchars($nav['height'])."\">Px",
				"<input class=\"txt\" type=\"text\" name=\"clicknew[$nav[id]]\" value=\"".$nav[clicks]."\" style=\"width:50px;\" disabled>",
				"<input class=\"checkbox\" type=\"checkbox\" name=\"displayernew[$nav[id]]\" value=\"1\" ".($nav['displayer'] ? 'checked' : '').">",
				"<a href=\"".ADMINSCRIPT."?action=hsk&operation=adset&do=$do&cp=edit&id=$nav[id]\" class=\"act\">$lang[edit]</a>"
			));
			$i++;
		}


		showsubmit('actorsubmit', 'submit', '');

		showtablefooter();	
		showformfooter();

	}else{

		//生成新数组
		if(is_array($_GET['subjectnew'])) {
			foreach($_GET['subjectnew'] as $id => $name) {
				$name			= addslashes(trim($name));
				$heightnew		= intval($_GET['heightnew'][$id]);
				$displayernew	= intval($_GET['displayernew'][$id]);

				DB::query("UPDATE ".DB::table('vgallery_ad')." SET subject='$name', height='$heightnew', displayer='$displayernew' WHERE id='$id'");
			}
		}

		hsk_updatecache('adlist');
		cpmsg('hsk_types_add_succeed', 'action=hsk&operation=adset&do='.$do, 'succeed');

	}

}elseif($cp == "edit" && $id) {//修改分类

	$nav = DB::fetch_first("SELECT * FROM ".DB::table('vgallery_ad')." WHERE id='$id'");
	if(!$nav) {
		cpmsg('hsk_types_notfind', '', 'error');
	}
	$nav['subject'] = stripslashes($nav['subject']);
	$nav['message'] = stripslashes($nav['message']);
	//print_r($nav);dexit();

	if(!submitcheck('editsubmit')) {

		showformheader("hsk&operation=adset&do=$do&cp=edit&id=$id", 'enctype');
		showtableheader();

		showtitle(cplang('ad_view'));
		showtablerow('', array('class="vtop" colspan="4" style="padding-left:20px;"'), array('<div id="ad_inview" style="height:'.$nav['height'].'px;">'.$nav['message'].'</div>'));

		showtitle(cplang('hsk_types_1').' - '.$nav['subject']);
		showsetting('adset_subject', 'subjectnew', $nav['subject'], 'text');
		showsetting('adset_height', 'heightnew', $nav['height'], 'text');
		showsetting('adset_message', 'messagenew', $nav['message'], 'textarea', '', 0, cplang('adset_message_view'));
		showsetting('hsk_edit_next', 'editnext', 1, 'radio');
		showsubmit('editsubmit');
		showtablefooter();
		showformfooter();

	} else {

		$subjectnew				= trim(dhtmlspecialchars($_GET['subjectnew']));
		$messagenew				= addslashes(trim($_GET['messagenew']));
		$heightnew				= intval($_GET['heightnew']);
		$editnext				= intval($_GET['editnext']);

		if($editnext){//自动跳转下一个类别
			$nav = DB::fetch_first("SELECT id FROM ".DB::table('vgallery_ad')." WHERE id>'$id' and styleid in(61,62)");
			if(!$nav) {
				$nexturl = 'action=hsk&operation=adset&do='.$do;
			}else{
				$nexturl = "action=hsk&operation=adset&do=$do&cp=edit&id=$nav[id]";
			}
		}else{
			$nexturl = 'action=hsk&operation=adset&do='.$do;
		}

		DB::query("UPDATE ".DB::table('vgallery_ad')." SET subject='$subjectnew', message='$messagenew', height='$heightnew' WHERE id='$id'");

		hsk_updatecache('adlist');
		cpmsg('hsk_setconfig_succeed', $nexturl, 'succeed');

	}
}
?>