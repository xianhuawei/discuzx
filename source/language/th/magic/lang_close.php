<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_close.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 *	Translated to Thai by jaideejung007
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'close_name' => 'ปิดกระทู้',
	'close_desc' => 'คุณสามารถปิดกระทู้ ห้ามตอบกลับหรือแสดงความคิดเห็น',
	'close_expiration' => 'ระยะเวลาที่จะปิดกระทู้',
	'close_expiration_comment' => 'การปิดกระทู้สามารถตั้งค่าให้ปิดแค่ชั่วคราวหรือปิดเป็นเวลานาน ค่าเริ่มต้นคือ 24 ชั่วโมง',
	'close_forum' => 'สามารถใช้งานได้ในเว็บบอร์ด',
	'close_info' => 'ปิดกระทู้เป็นระยะเวลา {expiration} ชั่วโมง กรุณากรอก ID กระทู้',
	'close_info_nonexistence' => 'กรุณาระบุกระทู้ที่คุณต้องการปิด',
	'close_succeed' => 'กระทู้ของคุถูกปิดเรียบร้อย',
	'close_info_noperm' => 'ขออภัย! บอร์ดนี้ไม่อนุญาตให้ใช้ไอเท็มนี้',
	'close_info_user_noperm' => 'ขออภัย! คุณไม่สามารถใช้ไอเท็มนี้ได้',

	'close_notification' => '{actor} ใช้ไอเท็ม{magicname} กับกระทู้ {subject} ของคุณ <a href="forum.php?mod=viewthread&tid={tid}">ไปดูกระทู้!</a>',
);

