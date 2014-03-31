<?php

/**+++
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_groupattachment.php 22411 2011-05-06 06:09:35Z zhangguosheng $
 */

$lang = array
(
	'groupattachment_name'		=> 'รายการไฟล์แนบจากบอร์ดของคลับ',
	'groupattachment_desc'		=> 'เรียกใช้รายการไฟล์แนบจากบอร์ดของคลับ',
	'groupattachment_fids'		=> 'กำหนดคลับ',
	'groupattachment_fids_comment'	=> 'กำหนด ID ของคลับ หากมีมากกว่าหนึ่ง ID กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ ID',
	'groupattachment_tids'		=> 'กำหนดหัวข้อ',
	'groupattachment_tids_comment'	=> 'กำหนด ID ของหัวข้อที่ต้องการ หากมีมากกว่าหนึ่ง ID กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ ID',
	'groupattachment_gtids'		=> 'หมวดหมู่ของคลับ',
	'groupattachment_gtids_comment'	=> 'กำหนดหมวดหมู่ของคลับที่ต้องการให้แสดงข้อมูล สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายหมวดหมู่ หากต้องการให้แสดงทุกหมวดหมู่ ไม่ต้องเลือกหมวดหมู่ของคลับใดๆ',
	'groupattachment_startrow'	=> 'จำนวนแถวเริ่มต้นของข้อมูล',
	'groupattachment_startrow_comment'	=> 'ถ้าจำเป็นต้องตั้งค่าจำนวนแถวของข้อมูลเริ่มต้น กรุณาใส่ค่าที่ต้องการ 0 คือจะการเริ่มการทำงานจากแถวแรก เป็นต้น',
	'groupattachment_items'			=> 'จำนวนข้อมูลที่จะแสดง',
	'groupattachment_items_comment'		=> 'กำหนดจำนวนข้อมูลที่จะแสดง กรุณากำหนดเป็นจำนวนเต็มที่มากกว่า 0',
	'groupattachment_titlelength'		=> 'จำนวนไบท์สูงสุดของชื่อไฟล์แนบ',
	'groupattachment_titlelength_comment'	=> 'กำหนดความยาวชื่อไฟล์แนบ/จะแสดงเท่าความยาวของชื่อกระทู้',
	'groupattachment_summarylength'		=> 'ความยาวของเนื้อหา',
	'groupattachment_summarylength_comment'	=> 'กำหนความยาวดเนื้อหาของไฟล์แนบ/จะแสดงเท่าความยาวเนื้อหาของกระทู้',
	'groupattachment_maxwidth'		=> 'ความกว้างของรูปภาพ(พิกเซล)',
	'groupattachment_maxwidth_comment'	=> 'กำหนดความกว้างของรูปภาพ หากกำหนดขนาดที่กว้างเกินไปจะไม่ถูกปรับขนาด 0 คือจะปรับขนาดโดยอัตโนมัติ',
	'groupattachment_maxheight'		=> 'ความสูงของรูปภาพ(พิกเซล)',
	'groupattachment_maxheight_comment'	=> 'กำหนดความสูงของรูปภาพ หากกำหนดขนาดที่สูงเกินไปจะไม่ถูกปรับขนาด 0 คือจะปรับขนาดโดยอัตโนมัติ',
	'groupattachment_threadmethod'		=> 'โหมด ข้อความ',
	'groupattachment_threadmethod_comment'	=> 'Select "Yes" to call attachment by thread mode, each thread display one attachment; select "No" to call attachment by attachment mode',
	'groupattachment_digest'		=> 'กรองกระทู้สำคัญ',
	'groupattachment_digest_comment'	=> 'ตั้งค่าให้กรองเฉพาะกระทู้สำคัญ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'groupattachment_digest_0'	=> 'กระทู้ทั่วไป',
	'groupattachment_digest_1'	=> 'กระทู้สำคัญ I',
	'groupattachment_digest_2'	=> 'กระทู้สำคัญ II',
	'groupattachment_digest_3'	=> 'กระทู้สำคัญ III',
	'groupattachment_special'	=> 'กรองกระทู้พิเศษ',
	'groupattachment_special_comment'	=> 'ตั้งค่าให้กรองเฉพาะกระทู้พิเศษ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'groupattachment_special_1'	=> 'กระทู้โพล',
	'groupattachment_special_2'	=> 'กระทู้ขายสินค้า',
	'groupattachment_special_3'	=> 'กระทู้รางวัล',
	'groupattachment_special_4'	=> 'กระทู้กิจกรรม',
	'groupattachment_special_5'	=> 'กระทู้โต้วาที',
	'groupattachment_special_0'	=> 'กระทู้ทั่วไป',
	'groupattachment_special_reward'	=> 'กรองกระทู้รางวัล',
	'groupattachment_special_reward_comment'	=> 'กำหนดว่าจะแสดงเฉพาะกระทู้รางวัลหรือไม่',
	'groupattachment_special_reward_0'	=> 'ทั้งหมด',
	'groupattachment_special_reward_1'	=> 'ได้รับการแก้ไข',
	'groupattachment_special_reward_2'	=> 'ไม่แน่นอน',
	'groupattachment_dateline'	=> 'เวลาอัปโหลดไฟล์แนบ',
	'groupattachment_dateline_nolimit'	=> 'ไม่จำกัด',
	'groupattachment_dateline_hour'	=> 'ล่าสุด 1 ชั่วโมง',
	'groupattachment_dateline_day'	=> 'ล่าสุด 24 ชั่วโมง',
	'groupattachment_dateline_week'	=> 'ล่าสุด 1 สัปดาห์',
	'groupattachment_dateline_month'	=> 'ล่าสุด 1 เดือน',
	'groupattachment_gviewperm'	=> 'สิทธิ์ในการเรียกดู',
	'groupattachment_gviewperm_nolimit'	=> 'ไม่จำกัด',
	'groupattachment_gviewperm_only_member'	=> 'เฉพาะสมาชิก',
	'groupattachment_gviewperm_all_member'	=> 'ทั้งหมด',
	'groupattachment_highlight'			=> 'Highlight found words',
);

