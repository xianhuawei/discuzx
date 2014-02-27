<script type="text/JavaScript">
var _index_id = 1;
var rowtypedata = [
	[
		[1,'', 'td25'],
		[1,'', 'td25'],
		[1,'<p style="padding:3px;"><input type="text" class="txt" name="newname[{1}]" size="18"></p><p style="padding:3px;"><input type="text" class="txt" name="newalias[{1}]" size="18" style="width:160px;">'],
		[1,'<select size="1" name="newsex[{1}]"><option selected value="1"><?=cplang('hsk_actor_sex_1')?></option><option value="2"><?=cplang('hsk_actor_sex_2')?></option></select>'],
		[1,'<ul style="WIDTH: 180px" class="ckbox" onmouseover="altStyle(this);"><li style="WIDTH: 50px"><input class="checkbox" type="checkbox" name="newdircetor[{1}]" value="1"><?=cplang('hsk_actor_pcode_1')?></li><li class="checked" style="WIDTH: 50px"><input class="checkbox" type="checkbox" name="newactor[{1}]" value="1" checked><?=cplang('hsk_actor_pcode_2')?></li><li style="WIDTH: 50px"><input class="checkbox" type="checkbox" name="newsinger[{1}]" value="1"><?=cplang('hsk_actor_pcode_3')?></li><li style="WIDTH: 50px"><input class="checkbox" type="checkbox" name="newchair[{1}]" value="1"><?=cplang('hsk_actor_pcode_4')?></li><li style="WIDTH: 50px"><input class="checkbox" type="checkbox" name="newother[{1}]" value="1"><?=cplang('hsk_actor_pcode_5')?></li></ul>', 'vtop rowform'],
		[1,'<select size="1" name="newregion[{1}]"><option selected value="1"><?=cplang('hsk_actor_region_1')?></option><option value="2"><?=cplang('hsk_actor_region_2')?></option><option value="3"><?=cplang('hsk_actor_region_3')?></option><option value="4"><?=cplang('hsk_actor_region_4')?></option></select>'],
		[2,'<input style="DISPLAY: none" id="fileC{1}_0" class="txt uploadbtn marginbot" type="file" name="TMPnewphoto[{1}]"><input id="fileC{1}_1" class="txt marginbot" value="" name="newphoto[{1}]"><br><a id="fileC{1}_0a" onclick="$(\'fileC{1}_1a\').style.fontWeight = \'\';this.style.fontWeight = \'bold\';$(\'fileC{1}_1\').name = \'TMPnewphoto[{1}]\';$(\'fileC{1}_0\').name = \'newphoto[{1}]\';$(\'fileC{1}_0\').style.display = \'\';$(\'fileC{1}_1\').style.display = \'none\';$(\'upstyle[{1}]\').value=\'1\';" href="javascript:;"><?=cplang('hsk_actor_upfile')?></a>&nbsp;<a style="FONT-WEIGHT: bold" id="fileC{1}_1a" onclick="$(\'fileC{1}_0a\').style.fontWeight = \'\';this.style.fontWeight = \'bold\';$(\'fileC{1}_0\').name = \'TMPnewphoto[{1}]\';$(\'fileC{1}_1\').name = \'newphoto[{1}]\';$(\'fileC{1}_1\').style.display = \'\';$(\'fileC{1}_0\').style.display = \'none\';$(\'upstyle[{1}]\').value=\'2\';" href="javascript:;"><?=cplang('hsk_actor_sendurl')?></a><input type="hidden" name="upstyle[{1}]" value="2">', 'vtop rowform']
	]
]
</script>

<?php

if($cp == "edit" && $id) {//修改分类

	$nav = DB::fetch_first("SELECT * FROM ".DB::table('vgallery_actor')." WHERE aid='$id'");
	if(!$nav) {
		cpmsg('hsk_types_notfind', '', 'error');
	}
	//print_r($nav);dexit();

	if(!submitcheck('editsubmit')) {

		showformheader("hsk&operation=types&do=$do&cp=edit&id=$id", 'enctype');
		showtableheader();
		showtitle(cplang('hsk_types_3').' - '.$nav['name']);
		showsetting('hsk_actor_name', 'namenew', $nav['name'], 'text');
		showsetting('hsk_actor_alias', 'aliasnew', $nav['alias'], 'text');

		showsetting('hsk_actor_sex', array('sexnew', array(
			array(1, cplang('hsk_actor_sex_1')),
			array(2, cplang('hsk_actor_sex_2'))
		)), $nav['sex'], 'mradio2');


		$varname = array('pcodenew', array(), 'isfloat');
		$pcodearray = array('1'=>$nav['pcode'][0], '2'=>$nav['pcode'][1], '3'=>$nav['pcode'][2], '4'=>$nav['pcode'][3], '5'=>$nav['pcode'][4]);

		for($i=1; $i<=strlen($nav['pcode']); $i++){
			$varname[1][$i] = array($i, cplang("hsk_actor_pcode_$i"), '1');
		}
		showsetting('hsk_actor_pcode', $varname, $pcodearray, 'omcheckbox');

		showsetting('hsk_actor_region', array('regionnew', array(
			array(1, cplang('hsk_actor_region_1')),
			array(2, cplang('hsk_actor_region_2')),
			array(3, cplang('hsk_actor_region_3')),
			array(4, cplang('hsk_actor_region_4'))
		)), $nav['region'], 'mradio2');

		showsetting('hsk_actor_photo', 'photonew', $nav['photo'], 'filetext', '', 0, cplang('hsk_actor_photo_info').$logohtml);

		showsetting('hsk_edit_next', 'editnext', 1, 'radio');
		showsubmit('editsubmit');
		showtablefooter();
		showformfooter();

	} else {

		$pcodenew				= dhtmlspecialchars($_GET['pcodenew']);
		$directornew			= intval($pcodenew[1]);
		$pcodenew				= intval($pcodenew[1]).intval($pcodenew[2]).intval($pcodenew[3]).intval($pcodenew[4]).intval($pcodenew[5]);

		$namenew				= trim(dhtmlspecialchars($_GET['namenew']));
		$aliasnew				= trim(dhtmlspecialchars($_GET['aliasnew']));
		$sexnew					= intval($_GET['sexnew']);
		$regionnew				= intval($_GET['regionnew']);
		$editnext				= intval($_GET['editnext']);
		$firstname				= getfirstname($namenew);;

		if($_FILES['photonew']) {
			$newdir = './data/hskcenter/actor';
			if(!is_dir(DISCUZ_ROOT.$newdir)){
				@mkdir(DISCUZ_ROOT.$newdir);
			}
			$newdir .= "/".date("ym");
			$newimgpath = hsk_uploadimg($_FILES['photonew'], $newdir);
			if($newimgpath){
				if($nav['photo'])	@unlink(DISCUZ_ROOT.$nav['photo']);
			}else{
				$newimgpath = $photonew;
			}
		} else {
			$photonew = $_GET['photonew'];
			if($photonew && (strtolower(substr($photonew, 0, 6)) == "http:/" || strtolower(substr($photonew, 0, 6)) == "ftp://")){
				$imgtype_inarray = array('jpg', 'jpge', 'gif', 'png');
				$img_type = substr($photonew, strrpos($photonew, '.')+1);
				$img_type = in_array($img_type, $imgtype_inarray) ? $img_type : 'jpg';
				
				$img_folder = DISCUZ_ROOT."./data/hskcenter/actor/";
				if(!is_dir($img_folder)){
					mkdir($img_folder);
				}
				$img_folder .= date("ym")."/";
				if(!is_dir($img_folder)){
					mkdir($img_folder);
				}

				$img_name = $sexnew."_".time()."_".rand(100,999).".".$img_type;

				$newimgpath = hsk_getimg($photonew, $img_folder.$img_name);

				if(!$newimgpath){
					$newimgpath = $photonew;
				}else{
					if($nav['photo'])	@unlink(DISCUZ_ROOT.$nav['photo']);
				}
			}
		}

		if($editnext){//自动跳转下一个类别
			$nav = DB::fetch_first("SELECT aid FROM ".DB::table('vgallery_actor')." WHERE aid>'$id'");
			if(!$nav) {
				$nexturl = 'action=hsk&operation=types&do='.$do;
			}else{
				$nexturl = "action=hsk&operation=types&do=$do&cp=edit&id=$nav[aid]";
			}
		}else{
			$nexturl = 'action=hsk&operation=types&do='.$do;
		}

		$nameadd		= !empty($namenew) ? ", name='$namenew', firstname='$firstname'" : '';		//firstname  alias  sex  director  region  pcode 
		DB::query("UPDATE ".DB::table('vgallery_actor')." SET alias='$aliasnew', sex='$sexnew', director='$directornew', region='$regionnew', pcode='$pcodenew', photo='$newimgpath' $nameadd WHERE aid='$id'");

		cpmsg('hsk_types_add_succeed', $nexturl, 'succeed');

	}
}elseif(!submitcheck('actorsubmit')) {
	
	$keys = dhtmlspecialchars($_GET['keys']);
	
	$_NAMEINDEX = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	for($i=0; $i<count($_NAMEINDEX); $i++){
		$_NAMEINDEX_VAR .= $keys==$_NAMEINDEX[$i] ? "<span style=\"padding-left:5px; padding-right:5px;\"><b>[".$_NAMEINDEX[$i]."]</b></span>" : "<a href=\"".ADMINSCRIPT."?action=hsk&operation=types&do=$do&keys=".$_NAMEINDEX[$i]."\" style=\"padding-left:5px; padding-right:5px;\">[".$_NAMEINDEX[$i]."]</a>";
	}


	$allvar = $keys ? "<a href=\"".ADMINSCRIPT."?action=hsk&operation=types&do=$do\" style=\"padding-left:5px; padding-right:5px;\">[ALL]</a>" : "<span style=\"padding-left:5px; padding-right:5px;\"><b>[ALL]</b></span>";

	showformheader('hsk&operation=types&do='.$do, 'enctype');
	showtableheader($allvar.$_NAMEINDEX_VAR);
	
	showsubtitle(array('', 'hsk_actor_photo', 'hsk_actor_name', 'hsk_actor_sex', 'hsk_actor_pcode', 'hsk_actor_region', 'hsk_actor_photo_info'));


	$ppp = 15;
	$start_limit = ($page - 1) * $ppp;
	$filteradd = $keys ? '&keys='.$keys : null;
	$sqladd = $keys ? " and firstname='$keys'" : null;
	$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('vgallery_actor')." WHERE pcode<>'10000'".$sqladd);
	$multipage = multi($count, $ppp, $page, ADMINSCRIPT."?action=hsk&operation=types&do=$do".$filteradd);
	
	
	$query = DB::query("SELECT * FROM ".DB::table('vgallery_actor')." where pcode<>'10000' $sqladd ORDER by aid LIMIT $start_limit, $ppp");
	while($actors = DB::fetch($query)) {
		
		//处理职业信息
		$check1 = $actors['pcode'][0] == 1 ? 'checked' : null;
		$check2 = $actors['pcode'][1] == 1 ? 'checked' : null;
		$check3 = $actors['pcode'][2] == 1 ? 'checked' : null;
		$check4 = $actors['pcode'][3] == 1 ? 'checked' : null;
		$check5 = $actors['pcode'][4] == 1 ? 'checked' : null;

		//处理头像
		//处理头像
		$headinfo = null;
		if($actors['photo'] && substr($actors['photo'],0,17) == './data/hskcenter/'){
			$thepicurl = DISCUZ_ROOT.$actors['photo'];
			if(file_exists("$thepicurl")){
				$headinfo = "<img src=\"$actors[photo]\" border=\"0\" align=\"absmiddle\" width=\"40\" height=\"55\" style=\"padding:0px;\">";
			}
		}

		$pcode_str = "
		<ul style=\"WIDTH: 180px;\" class=\"ckbox\" onmouseover=\"altStyle(this);\">
		<li class=\"$check1\" style=\"WIDTH: 50px;\"><input class=\"checkbox\" type=\"checkbox\" name=\"dircetornew[$actors[aid]]\" value=\"1\" $check1>".cplang('hsk_actor_pcode_1')."</li>
		<li class=\"$check2\" style=\"WIDTH: 50px;\"><input class=\"checkbox\" type=\"checkbox\" name=\"actornew[$actors[aid]]\" value=\"1\" $check2>".cplang('hsk_actor_pcode_2')."</li>
		<li class=\"$check3\" style=\"WIDTH: 50px;\"><input class=\"checkbox\" type=\"checkbox\" name=\"singernew[$actors[aid]]\" value=\"1\" $check3>".cplang('hsk_actor_pcode_3')."</li>
		<li class=\"$check4\" style=\"WIDTH: 50px;\"><input class=\"checkbox\" type=\"checkbox\" name=\"chairnew[$actors[aid]]\" value=\"1\" $check4>".cplang('hsk_actor_pcode_4')."</li>
		<li class=\"$check5\" style=\"WIDTH: 50px;\"><input class=\"checkbox\" type=\"checkbox\" name=\"othernew[$actors[aid]]\" value=\"1\" $check5>".cplang('hsk_actor_pcode_5')."</li></ul>";


		showtablerow('', array('', '', '', '', 'class="vtop rowform" style="width:180px;"','', 'class="td26"'), 
			array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[$actors[aid]]\" value=\"$actors[aid]\">",
			"$headinfo",
			"<p style=\"padding:3px;\"><input type=\"text\" class=\"txt\" size=\"15\" name=\"namenew[$actors[aid]]\" value=\"".dhtmlspecialchars($actors['name'])."\"></p>
			<p style=\"padding:3px;\"><input type=\"text\" class=\"txt\" size=\"18\" name=\"aliasnew[$actors[aid]]\" value=\"".dhtmlspecialchars($actors['alias'])."\" style=\"width:160px;\">",			
			"<select size=\"1\" name=\"sexnew[$actors[aid]]\"><option value=\"1\"".($actors['sex']==1 ? " selected" : null).">".cplang('hsk_actor_sex_1')."</option>
			<option value=\"2\"".($actors['sex']==2 ? " selected" : null).">".cplang('hsk_actor_sex_2')."</option></select>",
			"$pcode_str",
			"<select size=\"1\" name=\"regionnew[$actors[aid]]\"><option value=\"1\"".($actors['region']==1 ? " selected" : null).">".cplang('hsk_actor_region_1')."</option>
			<option value=\"2\"".($actors['region']==2 ? " selected" : null).">".cplang('hsk_actor_region_2')."</option>
			<option value=\"3\"".($actors['region']==3 ? " selected" : null).">".cplang('hsk_actor_region_3')."</option>
			<option value=\"4\"".($actors['region']==4 ? " selected" : null).">".cplang('hsk_actor_region_4')."</option></select>",
			"<input class=\"txt\" type=\"text\" name=\"photonew[$actors[aid]]\" value=\"$actors[photo]\" readonly=\"readonly\" size=\"40\">",
			"<a href=\"".ADMINSCRIPT."?action=hsk&operation=types&do=$do&cp=edit&id=$actors[aid]\" class=\"act\">$lang[edit]</a>"
		));
	}


	echo '<tr><td></td><td colspan="6"><div><a href="###" onclick="addrow(this, 0, _index_id); _index_id++;" class="addtr">'.cplang('hsk_actor_add').'</a></div></td></tr>';
	showsubmit('actorsubmit', 'submit', 'del', '', $multipage, false);

	showtablefooter();	
	showformfooter();

}else{

	//提交后		print_r($_FILES);exit();
	if($ids = dimplode($_GET['delete'])) {
		DB::query("DELETE FROM ".DB::table('vgallery_actor')." WHERE aid IN ($ids)");
	}

	if(is_array($_GET['namenew'])) {
		foreach($_GET['namenew'] as $id => $name) {
			$name = trim(dhtmlspecialchars($name));
			$dircetornew	= intval($_GET['dircetornew'][$id]);
			$actornew		= intval($_GET['actornew'][$id]);
			$singernew		= intval($_GET['singernew'][$id]);
			$chairnew		= intval($_GET['chairnew'][$id]);
			$othernew		= intval($_GET['newother'][$id]);
			$pcodenew		= $dircetornew.$actornew.$singernew.$chairnew.$othernew;
			$sexnew			= intval($_GET['sexnew'][$id]);
			$regionnew		= intval($_GET['regionnew'][$id]);
			$aliasnew		= dhtmlspecialchars($_GET['aliasnew'][$id]);
			$firstname		= getfirstname($name);
			$nameadd		= !empty($name) ? ", name='$name', firstname='$firstname'" : '';		//firstname  alias  sex  director  region  pcode 
			DB::query("UPDATE ".DB::table('vgallery_actor')." SET alias='$aliasnew', sex='$sexnew', director='$dircetornew', region='$regionnew', pcode='$pcodenew' $nameadd WHERE aid='$id'");
		}
	}

	if(is_array($_GET['newname'])) {
		foreach($_GET['newname'] as $k => $v) {
			$v = dhtmlspecialchars(trim($v));
			if(!empty($v)) {

				$newdircetor	= intval($_GET['newdircetor'][$k]);
				$newactor		= intval($_GET['newactor'][$k]);
				$newsinger		= intval($_GET['newsinger'][$k]);
				$newchair		= intval($_GET['newchair'][$k]);
				$newother		= intval($_GET['newother'][$k]);
				$newpcode		= $newdircetor.$newactor.$newsinger.$newchair.$newother;
				$newsex			= intval($_GET['newsex'][$k]);
				$newregion		= intval($_GET['newregion'][$k]);
				$newalias		= dhtmlspecialchars($_GET['newalias'][$k]);
				$newphoto		= $_GET['newphoto'][$k];
				$newupstyle		= $_GET['upstyle'][$k];

				if($newupstyle == '1'){//上传图片
					$_UPIMG['name'] = $_FILES['newphoto']['name'][$k];
					$_UPIMG['type'] = $_FILES['newphoto']['type'][$k];
					$_UPIMG['tmp_name'] = $_FILES['newphoto']['tmp_name'][$k];
					$_UPIMG['error'] = $_FILES['newphoto']['error'][$k];
					$_UPIMG['size'] = $_FILES['newphoto']['size'][$k];

					$newdir = './data/hskcenter/actor';
					if(!is_dir(DISCUZ_ROOT.$newdir)){
						@mkdir(DISCUZ_ROOT.$newdir);
					}
					$newdir .= "/".date("ym");
					$newimgpath = hsk_uploadimg($_UPIMG, $newdir);

				}elseif($newupstyle == '2' && (strtolower(substr($newphoto, 0, 6)) == "http:/" || strtolower(substr($newphoto, 0, 6)) == "ftp://")){
					//远程图片
					$imgtype_inarray = array('jpg', 'jpge', 'gif', 'png');
					$img_type = substr($newphoto, strrpos($newphoto, '.')+1);
					$img_type = in_array($img_type, $imgtype_inarray) ? $img_type : 'jpg';
					
					$img_folder = DISCUZ_ROOT."./data/hskcenter/actor/";
					if(!is_dir($img_folder)){
						mkdir($img_folder);
					}
					$img_folder .= date("ym")."/";
					if(!is_dir($img_folder)){
						mkdir($img_folder);
					}

					$img_name = $newsex."_".time()."_".rand(100,999).".".$img_type;

					$newimgpath = hsk_getimg($newphoto, $img_folder.$img_name);

					if(!$newimgpath){
						$newimgpath = $newphoto;
					}
				}

				$data = array(
					'name'			=> $v,
					'alias'			=> $newalias,
					'sex'			=> $newsex,
					'pcode'			=> $newpcode,
					'region'		=> $newregion,
					'firstname'		=> getfirstname($v),
					'photo'			=> $newimgpath,
					'director'		=> $newdircetor
				);
				
				DB::insert('vgallery_actor', $data);
			}
		}
	}
	cpmsg('hsk_actor_add_succeed', 'action=hsk&operation=types&do='.$do, 'succeed');

}
?>