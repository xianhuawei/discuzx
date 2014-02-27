<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$rid = intval($_GET['rid']);
$oid = intval($_GET['oid']);
$oid = $oid ? $oid : $rid;
$seleid = $oid ? $oid : $rid;
//先取得总数
$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1 and sup='$vid' and album=0 and id<$rid");
$thesumx = DB::result($query, 0);

if($thesumx >= 4){
	if($thesumx>4){
		//说明有多于4个那么就可以点向前按扭
		$link_p = '<a href="'.PDIR.'&mod=loadsup&oid='.$oid.'&vid='.$vid.'&rid=%thepurl%" onclick="ajaxget(this.href, \'load_thealbum\');doane(event);"><img border="0" src="'.MDIR.'/p1.gif" width="17" height="65" onmouseover="this.src=\''.MDIR.'/p2.gif\'"; onmouseout="this.src=\''.MDIR.'/p1.gif\';"></a>';
	}else{//如果等于4，说明正好显示完，那么就不可以点击了
		$link_p = '<img border="0" src="'.MDIR.'/p0.gif" width="17" height="65">';
	}
	$thesum = 4;
	$theout = 5;
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1 and album=0 and sup='$vid' and id>=$rid");
	$theout1 = DB::result($query, 0);
	if($theout1 <= 4){
		$link_n = '<img border="0" src="'.MDIR.'/ne0.gif" width="17" height="65">';
		if($theout+$thesumx<=9)
			$link_p = '<img border="0" src="'.MDIR.'/p0.gif" width="17" height="65">';
		$thesum = 9-$theout1;
		$theout = $theout1;
	}else{
		if($theout1==5){
			$link_n = '<img border="0" src="'.MDIR.'/ne0.gif" width="17" height="65">';
		}else{
			$link_n = '<a href="'.PDIR.'&mod=loadsup&oid='.$oid.'&vid='.$vid.'&rid=%thenurl%" onclick="ajaxget(this.href, \'load_thealbum\');doane(event);"><img border="0" src="'.MDIR.'/ne1.gif" width="17" height="65" onmouseover="this.src=\''.MDIR.'/ne2.gif\'"; onmouseout="this.src=\''.MDIR.'/ne1.gif\';"></a>';
		}
	}
}else{
	$thesum = $thesumx;
	$theout = 9-$thesum;
	$link_p = '<img border="0" src="'.MDIR.'/p0.gif" width="17" height="65">';
	$query = DB::query("SELECT COUNT(*) FROM ".DB::table('vgallerys')." where audit=1 and album=0 and sup='$vid' and id>=$rid");
	$theout1 = DB::result($query, 0);
	if($theout1 <= 4){
		$link_n = '<img border="0" src="'.MDIR.'/ne0.gif" width="17" height="65">';
		$thesum = 9-$theout1;
		$theout = $theout1;
	}else{
		if($theout1==5 || $theout1+$thesum<=9){
			$link_n = '<img border="0" src="'.MDIR.'/ne0.gif" width="17" height="65">';
		}else{
			$link_n = '<a href="'.PDIR.'&mod=loadsup&oid='.$oid.'&vid='.$vid.'&rid=%thenurl%" onclick="ajaxget(this.href, \'load_thealbum\');doane(event);"><img border="0" src="'.MDIR.'/ne1.gif" width="17" height="65" onmouseover="this.src=\''.MDIR.'/ne2.gif\'"; onmouseout="this.src=\''.MDIR.'/ne1.gif\';"></a>';
		}
	}
}

$query = DB::query("SELECT m.id, m.vsubject, m.purl, n.vsubject as abname, n.vsum, n.purl as abpurl, m.remote, n.remote as abremote FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." n ON n.id=m.sup WHERE m.audit=1 and m.sup='$vid' and m.album=0 and m.id<$rid ORDER BY m.id desc limit 0, $thesum");

$thesupname = null;
$thesupvsum = $next_vid = $prev_vid = 0;
while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] =cutstr($datarow['vsubject'], 12, '');
	$thesupname = $thesupname ? $thesupname : $datarow['abname'];
	$thesupvsum = $thesupvsum ? $thesupvsum : $datarow['vsum'];
	$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
	$datalist[] = $datarow;
}


$query = DB::query("SELECT m.id, m.vsubject, m.purl, n.vsubject as abname, n.vsum, n.purl as abpurl, m.remote, n.remote as abremot, n.abtotal FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." n ON n.id=m.sup WHERE m.sup='$vid' and m.audit=1 and m.album=0 and m.id>=$rid ORDER BY m.id limit 0, $theout");

$thesupname = null;
$thesupvsum = 0;
while($datarow = DB::fetch($query)){
	$datarow['vsubjectc'] =cutstr($datarow['vsubject'], 12, '');
	$thesupname = $thesupname ? $thesupname : $datarow['abname'];
	$thesupvsum = $thesupvsum ? $thesupvsum : $datarow['vsum'];
	$istv = $datarow['abtotal'];
	$datarow['purl'] = getuseimg($datarow['purl'], $datarow['remote']);
	$datalist1[] = $datarow;
}

$abvalue['vsum'] = $abvalue['abtotal'] = $thesupvsum;

$datarow = array();
$query = DB::query("SELECT m.id, m.vsubject, m.purl, m.remote, ab.vsubject as ab_vsubject, ab.purl as ab_purl, ab.remote as ab_remote FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id>'$oid' and m.sup='$vid' and m.audit='1' order by id limit 1");
if($datarow = DB::fetch($query)){
	//有下一集
	$next_vid = $datarow['id'];
	$next_subject = $datarow['vsubject'];
	$next_subjectc = cutstr($datarow['ab_vsubject'].$datarow['vsubject'], 40, '..');
	$next_purl = $datarow['purl'] ? getuseimg($datarow['purl'], $datarow['remote']) : getuseimg($datarow['ab_purl'], $datarow['ab_remote']);
}else{
	$next_vid = 0;
}

$datarow = array();
$query = DB::query("SELECT m.id, m.vsubject, m.purl, m.remote, ab.vsubject as ab_vsubject, ab.purl as ab_purl, ab.remote as ab_remote FROM ".DB::table('vgallerys')." m LEFT JOIN ".DB::table('vgallerys')." ab ON ab.id=m.sup WHERE m.id<'$oid' and m.sup='$vid' and m.audit='1' order by id desc limit 1");
if($datarow = DB::fetch($query)){
	//有上一集
	$prev_vid = $datarow['id'];
	$prev_subject = $datarow['vsubject'];
	$prev_subjectc = cutstr($datarow['ab_vsubject'].$datarow['vsubject'], 40, '..');
	$prev_purl = $datarow['purl'] ? getuseimg($datarow['purl'], $datarow['remote']) : getuseimg($datarow['ab_purl'], $datarow['ab_remote']);
}else{
	$prev_vid = 0;
}


$thestr_p = null;
for($i=$thesum-1; $i>=0; $i--){
	if($datalist[$i])
		$datalist2[] = $datalist[$i];
	$thestr_p = $thestr_p ? $thestr_p : $datalist[$i]['id'];
}

$thestr_n = null;
for($i=0; $i<$theout; $i++){
	if($datalist1[$i])
		$datalist2[] = $datalist1[$i];
	$thestr_n = $datalist1[$i]['id'];

}

//替换连接点的ID值	
$link_p = str_replace("%thepurl%", $thestr_p, $link_p);	$link_n = str_replace("%thenurl%", $thestr_n, $link_n);

include template("gallery_loadsup", 'Kannol', PTEM);

?>