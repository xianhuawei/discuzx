<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

DB::query("DROP TABLE IF EXISTS ".DB::table('vgallerys'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_actor'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_ad'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_album'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_evaluate'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_evaluate_tc'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_favorites'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_indexset'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_member'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_pay'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_paycount'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_poll'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_report'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_sort'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_tags'));
DB::query("DROP TABLE IF EXISTS ".DB::table('vgallery_top5'));

DB::query("ALTER TABLE ".DB::table('common_tag')." DROP ashot");

$finish = TRUE;
?>