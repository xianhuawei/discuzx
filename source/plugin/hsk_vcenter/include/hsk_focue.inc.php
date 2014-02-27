<?php

if(!defined('IN_DISCUZ') || !defined('IN_HSK')) {
	exit('Access Denied');
}

$op = in_array($_GET['op'], array('search', 'set')) ? $_GET['op'] : '';
$s = intval($_GET['s']);
$isinput = $s ? 'director' : 'actor';
$taglist = array();

if($op == 'search') {

	$wheresql = '';
	$searchkey = stripsearchkey($_GET['searchkey']);
	$wheresql = $s ? "AND director=1" : null;

	$query = DB::query("SELECT name FROM ".DB::table('vgallery_actor')." where firstname='$searchkey' $wheresql");
	while($value = DB::fetch($query)) {
		$taglist[] = $value;
	}
}
include_once template("ajax_focue", 'Kannol', PTEM);
?>