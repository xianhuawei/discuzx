<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_houselist.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 *	Translated to Thai by jaideejung007
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'categorylist_fids' => 'เลือกบอร์ด',
	'categorylist_fids_comment' => 'กำหนดบอร์ดที่ต้องการให้แสดงข้อมูล, สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายบอร์ด, หากต้องการให้แสดงทุกบอร์ด ไม่ต้องเลือกบอร์ดใดๆ',
	'categorylist_startrow' => 'จำนวนแถวเริ่มต้นของข้อมูล',
	'categorylist_startrow_comment' => 'ถ้าจำเป็นต้องตั้งค่าจำนวนแถวของข้อมูลเริ่มต้น, กรุณาใส่ค่าที่ต้องการ, 0 คือจะการเริ่มการทำงานจากแถวแรก, เป็นต้น',
	'categorylist_showitems' => 'จำนวนข้อมูลที่จะแสดง',
	'categorylist_showitems_comment' => 'กำหนดจำนวนข้อมูลที่จะแสดง, กรุณากำหนดเป็นจำนวนเต็มที่มากกว่า 0',
	'categorylist_titlelength' => 'จำนวนไบต์สูงสุดของชื่อกระทู้',
	'categorylist_titlelength_comment' => 'กำหนดความยาวของชื่อกระทู้, หากกำหนดจำนวนไบต์เกินจะไม่ลดโดยอัตโนมัติ, 0 คือจะลดโดยอัตโนมัติ',
	'categorylist_fnamelength' => 'จำนวนไบต์สูงสุดของชื่อบอร์ด',
	'categorylist_fnamelength_comment' => 'กำหนดความยาวของชื่อบอร์ด และความยาวของชื่อกระทู้จะถูกนับเข้าด้วยกัน',
	'categorylist_summarylength' => 'จำนวนไบต์สูงสุดของเนื้อหา',
	'categorylist_summarylength_comment' => 'กำหนดจำนวนไบต์สูงสุดของเนื้อหา, 0 คือค่าเริ่มต้น สามารถกำหนดได้สูงสุดถึง 255',
	'categorylist_tids' => 'กำหนดหัวข้อ',
	'categorylist_tids_comment' => 'กำหนด tid ของหัวข้อที่ต้องการ, หากมีมากกว่าหนึ่ง tid กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ tid หมายเหตุ: ปล่อยให้ว่างไว้หากไม่มีตัวกรองใดๆ',
	'categorylist_keyword' => 'แท็กของหัวข้อ',
	'categorylist_keyword_comment' => 'ตั้งค่าแท็กของกระทู้ หมายเหตุ: ปล่อยว่างไว้หากไม่มีแท็กใดๆ สามารถใช้สัญลักษณ์ * แทนแท็กหลัก ค้นหาโดยแท็กหลักเพิ่มเติม, สามารถใช้ช่องว่างระหว่างคำ หรือ AND ในการเชื่อมต่อ เช่น win32 AND unix เพื่อให้ตรงกับแท็กหลักที่มากกว่าหนึ่งคำ, สามารถใช้ | หรือ OR ในการเชื่อมต่อ เช่น win32 OR unix',
	'categorylist_sortids' => 'หมวดหมู่หัวข้อ',
	'categorylist_sortids_comment' => 'กำหนดหมวดหมู่หัวข้อ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'categorylist_styleids' => 'รูปแบบหมวดหมู่',
	'categorylist_styleids_comment' => 'เลือกรูปแบบหมวดหมู่',
	'categorylist_styleids_style1' => 'แบบที่ 1',
	'categorylist_styleids_style2' => 'แบบที่ 2',
	'categorylist_styleids_style3' => 'แบบที่ 3',
	'categorylist_styleids_style4' => 'แบบที่ 4',
	'categorylist_styleids_style5' => 'แบบที่ 5',
	'categorylist_typeids_all' => 'รูปแบบทั้งหมด',
	'categorylist_categoryids' => 'หมวดหมู่ข้อมูล',
	'categorylist_categoryids_comment' => 'กำหนดหมวดหมู่ข้อมูล หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'categorylist_categoryids_all' => 'หมวดหมู่ข้อมูลทั้งหมด',
	'categorylist_digest' => 'กรองกระทู้สำคัญ',
	'categorylist_digest_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้สำคัญ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'categorylist_digest_0' => 'กระทู้ทั่วไป',
	'categorylist_digest_1' => 'กระทู้สำคัญ I',
	'categorylist_digest_2' => 'กระทู้สำคัญ II',
	'categorylist_digest_3' => 'กระทู้สำคัญ III',
	'categorylist_stick' => 'กรองกระทู้ปักหมุด',
	'categorylist_stick_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้ปักหมุด หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'categorylist_stick_0' => 'กระทู้ทั่วไป',
	'categorylist_stick_1' => 'ปักหมุด I',
	'categorylist_stick_2' => 'ปักหมุด II',
	'categorylist_stick_3' => 'ปักหมุด III',
	'categorylist_special' => 'กรองกระทู้พิเศษ',
	'categorylist_special_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้พิเศษ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'categorylist_special_1' => 'กระทู้โพล',
	'categorylist_special_2' => 'กระทู้ขายสินค้า',
	'categorylist_special_3' => 'กระทู้รางวัล',
	'categorylist_special_4' => 'กระทู้กิจกรรม',
	'categorylist_special_5' => 'กระทู้โต้วาที',
	'categorylist_special_0' => 'กระทู้ทั่วไป',
	'categorylist_special_reward' => 'กรองกระทู้รางวัล',
	'categorylist_special_reward_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้รางวัลหรือไม่',
	'categorylist_special_reward_0' => 'ทั้งหมด',
	'categorylist_special_reward_1' => 'ได้รับการแก้ไข',
	'categorylist_special_reward_2' => 'ไม่แน่นอน',
	'categorylist_recommend' => 'กรองกระทู้แนะนำ',
	'categorylist_recommend_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้แนะนำหรือไม่',
	'categorylist_orderby' => 'การจัดเรียงลำดับกระทู้',
	'categorylist_orderby_comment' => 'ตั้งค่าการจัดเรียงลำดับของกระทู้',
	'categorylist_orderby_lastpost' => 'จัดเรียงตามกระทู้ที่มีการตอบกลับล่าสุด',
	'categorylist_orderby_dateline' => 'จัดเรียงตามวันที่ตั้งกระทู้',
	'categorylist_orderby_replies' => 'จัดเรียงตามจำนวนข้อความตอบกลับ',
	'categorylist_orderby_views' => 'จัดเรียงตามจำนวนการเข้าชม/ดู',
	'categorylist_orderby_heats' => 'จัดเรียงตามความนิยม',
	'categorylist_orderby_recommends' => 'จัดเรียงตามกระทู้แนะนำ',
	'categorylist_orderby_hourviews' => 'จัดเรียงตามการเข้าชมต่อชั่วโมง',
	'categorylist_orderby_todayviews' => 'จัดเรียงตามการเข้าชมต่อวัน',
	'categorylist_orderby_weekviews' => 'จัดเรียงตามการเข้าชมต่อสัปดาห์',
	'categorylist_orderby_monthviews' => 'จัดเรียงตามการเข้าชมต่อเดือน',
	'categorylist_orderby_hours' => 'กำหนดเวลา (ชั่วโมง)',
	'categorylist_orderby_hours_comment' => 'กำหนดเวลาในการจัดเรียงลำดับกระทู้',
);

