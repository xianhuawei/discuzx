<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_highlight.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 *	Translated to Thai by jaideejung007
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'highlight_name' => 'เน้นสีกระทู้และบล๊อก',
	'highlight_desc' => 'เน้นสีกระทู้และบล๊อกของคุณ เปลี่ยนสีให้น่าสนใจ',
	'highlight_expiration' => 'ระยะเวลาเน้นสี',
	'highlight_expiration_comment' => 'ตั้งค่าระยะเวลาการเน้นสีกระทู้ ค่าเริ่มต้นคือ 24 ชั่วโมง',
	'highlight_forum' => 'สามารถใช้งานได้ในเว็บบอร์ด',
	'highlight_info_tid' => 'เน้นสีกระทู้เป็นระยะเวลา {expiration} ชั่วโมง',
	'highlight_info_blogid' => 'เน้นสี เปลี่ยนสี ชื่อบล๊อก',
	'highlight_color' => 'สี',
	'highlight_info_nonexistence_tid' => 'กรุณาระบุกระทู้ที่คุณต้องการเน้นสี',
	'highlight_info_nonexistence_blogid' => 'กรุณาระบุบล๊อกที่คุณต้องการเน้นสี',
	'highlight_succeed_tid' => 'กระทู้ที่คุณต้องการถูกเน้นสีเรียบร้อยแล้ว',
	'highlight_succeed_blogid' => 'บล๊อกที่คุณต้องการถูกเน้นสีเรียบร้อยแล้ว',
	'highlight_info_noperm' => 'ขออภัย! บอร์ดนี้ไม่อนุญาตให้ใช้ไอเท็มนี้',
	'highlight_info_notype' => 'เกิดข้อผิดพลาด คุณไม่ได้ระบุประเภทของการดำเนินการ',

	'highlight_notification' => '{actor} ใช้ไอเท็ม{magicname} กับกระทู้ {subject} ของคุณ <a href="forum.php?mod=viewthread&tid={tid}">ไปดูกระทู้!</a>',
	'highlight_notification_blogid' => '{actor} ใช้ไอเท็ม{magicname} กับบล๊อก {subject} ของคุณ <a href="home.php?mod=space&do=blog&id={blogid}">ไปดูบล๊อก!</a>',
);

