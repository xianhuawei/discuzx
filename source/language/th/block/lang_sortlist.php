<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_sortlist.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 *	Translated to Thai by jaideejung007
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'sortlist_fids' => 'เลือกบอร์ด',
	'sortlist_fids_comment' => 'กำหนดบอร์ดที่ต้องการให้แสดงข้อมูล, สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายบอร์ด, หากต้องการให้แสดงทุกบอร์ด ไม่ต้องเลือกบอร์ดใดๆ',
	'sortlist_startrow' => 'จำนวนแถวเริ่มต้นของข้อมูล',
	'sortlist_startrow_comment' => 'ถ้าจำเป็นต้องตั้งค่าจำนวนแถวของข้อมูลเริ่มต้น, กรุณาใส่ค่าที่ต้องการ, 0 คือจะการเริ่มการทำงานจากแถวแรก, เป็นต้น',
	'sortlist_showitems' => 'จำนวนข้อมูลที่จะแสดง',
	'sortlist_showitems_comment' => 'กำหนดจำนวนข้อมูลที่จะแสดง, กรุณากำหนดเป็นจำนวนเต็มที่มากกว่า 0',
	'sortlist_titlelength' => 'จำนวนไบต์สูงสุดของชื่อกระทู้',
	'sortlist_titlelength_comment' => 'กำหนดความยาวของชื่อกระทู้, หากกำหนดจำนวนไบต์เกินจะไม่ลดโดยอัตโนมัติ, 0 คือจะลดโดยอัตโนมัติ',
	'sortlist_fnamelength' => 'จำนวนไบต์สูงสุดของชื่อบอร์ด',
	'sortlist_fnamelength_comment' => 'กำหนดความยาวของชื่อบอร์ด และความยาวของชื่อกระทู้จะถูกนับเข้าด้วยกัน',
	'sortlist_summarylength' => 'จำนวนไบต์สูงสุดของเนื้อหา',
	'sortlist_summarylength_comment' => 'กำหนดจำนวนไบต์สูงสุดของเนื้อหา, 0 คือค่าเริ่มต้น สามารถกำหนดได้สูงสุดถึง 255',
	'sortlist_tids' => 'กำหนดหัวข้อ',
	'sortlist_tids_comment' => 'กำหนด tid ของหัวข้อที่ต้องการ, หากมีมากกว่าหนึ่ง tid กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ tid หมายเหตุ: ปล่อยให้ว่างไว้หากไม่มีตัวกรองใดๆ',
	'sortlist_keyword' => 'แท็กของหัวข้อ',
	'sortlist_keyword_comment' => 'ตั้งค่าแท็กของกระทู้ หมายเหตุ: ปล่อยว่างไว้หากไม่มีแท็กใดๆ สามารถใช้สัญลักษณ์ * แทนแท็กหลัก ค้นหาโดยแท็กหลักเพิ่มเติม, สามารถใช้ช่องว่างระหว่างคำ หรือ AND ในการเชื่อมต่อ เช่น win32 AND unix เพื่อให้ตรงกับแท็กหลักที่มากกว่าหนึ่งคำ, สามารถใช้ | หรือ OR ในการเชื่อมต่อ เช่น win32 OR unix',
	'sortlist_typeids' => 'หมวดหมู่หัวข้อ',
	'sortlist_typeids_comment' => 'กำหนดหมวดหมู่หัวข้อ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'sortlist_typeids_all' => 'หมวดหมู่หัวข้อทั้งหมด',
	'sortlist_sortids' => 'หมวดหมู่ข้อมูล',
	'sortlist_sortids_comment' => 'กำหนดหมวดหมู่ข้อมูล หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'sortlist_sortids_all' => 'หมวดหมู่ข้อมูลทั้งหมด',
	'sortlist_digest' => 'กรองกระทู้สำคัญ',
	'sortlist_digest_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้สำคัญ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'sortlist_digest_0' => 'กระทู้ทั่วไป',
	'sortlist_digest_1' => 'กระทู้สำคัญ I',
	'sortlist_digest_2' => 'กระทู้สำคัญ II',
	'sortlist_digest_3' => 'กระทู้สำคัญ III',
	'sortlist_stick' => 'กรองกระทู้ปักหมุด',
	'sortlist_stick_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้ปักหมุด หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'sortlist_stick_0' => 'กระทู้ทั่วไป',
	'sortlist_stick_1' => 'ปักหมุด I',
	'sortlist_stick_2' => 'ปักหมุด II',
	'sortlist_stick_3' => 'ปักหมุด III',
	'sortlist_special' => 'กรองกระทู้พิเศษ',
	'sortlist_special_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้พิเศษ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'sortlist_special_1' => 'กระทู้โพล',
	'sortlist_special_2' => 'กระทู้ขายสินค้า',
	'sortlist_special_3' => 'กระทู้รางวัล',
	'sortlist_special_4' => 'กระทู้กิจกรรม',
	'sortlist_special_5' => 'กระทู้โต้วาที',
	'sortlist_special_0' => 'กระทู้ทั่วไป',
	'sortlist_special_reward' => 'กรองกระทู้รางวัล',
	'sortlist_special_reward_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้รางวัลหรือไม่',
	'sortlist_special_reward_0' => 'ทั้งหมด',
	'sortlist_special_reward_1' => 'ได้รับการแก้ไข',
	'sortlist_special_reward_2' => 'ไม่แน่นอน',
	'sortlist_recommend' => 'กรองกระทู้แนะนำ',
	'sortlist_recommend_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้แนะนำหรือไม่',
	'sortlist_orderby' => 'การจัดเรียงลำดับกระทู้',
	'sortlist_orderby_comment' => 'ตั้งค่าการจัดเรียงลำดับของกระทู้',
	'sortlist_orderby_lastpost' => 'จัดเรียงตามกระทู้ที่มีการตอบกลับล่าสุด',
	'sortlist_orderby_dateline' => 'จัดเรียงตามวันที่ตั้งกระทู้',
	'sortlist_orderby_replies' => 'จัดเรียงตามจำนวนข้อความตอบกลับ',
	'sortlist_orderby_views' => 'จัดเรียงตามจำนวนการเข้าชม/ดู',
	'sortlist_orderby_heats' => 'จัดเรียงตามความนิยม',
	'sortlist_orderby_recommends' => 'จัดเรียงตามกระทู้แนะนำ',
	'sortlist_lastpost' => 'โพสต์ล่าสุด',
	'sortlist_lastpost_nolimit' => 'ไม่จำกัด',
	'sortlist_lastpost_hour' => '1 ชั่วโมง',
	'sortlist_lastpost_day' => '1 วัน',
	'sortlist_lastpost_week' => '1 สัปดาห์',
	'sortlist_lastpost_month' => '1 เดือน',
	'sortlist_orderby_hours_comment' => 'ระบุเวลาการเรียงลำดับจำนวนการเรียกดู',
);

