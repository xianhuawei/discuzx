<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_install.php by Valery Votintsev, codersclub.org
 */

define('UC_VERNAME', 'International Version');

$lang = array(
	'SC_GBK'		=> 'Simplified Chinese GBK encoding',//'简体中文版',
	'TC_BIG5'		=> 'Traditional Chinese BIG5 encoding',//'繁体中文版',
	'SC_UTF8'		=> 'Simplified Chinese UTF8 encoding',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditional Chinese UTF8 encoding',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install' => 'วิชาร์ตการติดตั้ง '.SOFT_NAME.'',
	'agreement_yes' => 'ยอมรับข้อตกลง',
	'agreement_no' => 'ปฏิเสธข้อตกลง',
	'notset' => 'ไม่จำกัด',

	'message_title' => 'คำชี้แจง',
	'error_message' => 'ข้อความผิดพลาด',
	'message_return' => 'คลิกที่นี่เพื่อย้อนกลับ',
	'return' => 'ย้อนกลับ',
	'install_wizard' => 'ตัวช่วยการติดตั้ง',
	'config_nonexistence' => 'ไฟล์กำหนดค่าไม่มี',
	'nodir' => 'ไดเรคเทอรี่ไม่มี',
	'redirect' => 'เบราเซอร์จะไปยังหน้าต่อไปโดยอัตโนมัติ, โดยไม่ต้องกระทำการใดๆ...<br>หากเบราว์เซอร์ของคุณไม่ไปยังหน้าต่อไปโดยอัตโนมัติโปรดคลิกที่นี่',
	'auto_redirect' => 'เบราเซอร์จะข้ามไปยังหน้าต่อไปโดยอัตโนมัติ',
	'database_errno_2003' => 'ไม่สามารถเชื่อมต่อกับฐานข้อมูล โปรดตรวจสอบฐานข้อมูลว่าเชื่อมต่ออยู่เซิร์ฟเวอร์ฐานข้อมูลถูกต้องหรือไม่',
	'database_errno_1044' => 'ไม่สามารถสร้างฐานข้อมูลใหม่โปรดตรวจสอบชื่อฐานข้อมูลที่กรอกให้ถูกต้อง',
	'database_errno_1045' => 'ไม่สามารถเชื่อมต่อกับฐานข้อมูลโปรดตรวจสอบชื่อผู้ใช้ฐานข้อมูลและรหัสผ่านให้ถูกต้อง',
	'database_errno_1064' => 'SQL เกิดข้อผิดพลาด',

	'dbpriv_createtable' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ CREATE TABLE ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',
	'dbpriv_insert' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ INSERT ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',
	'dbpriv_select' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ SELECT ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',
	'dbpriv_update' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ UPDATE ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',
	'dbpriv_delete' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ DELETE ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',
	'dbpriv_droptable' => 'ในการติดตั้งนี้ ไม่อนุญาตให้ DROP TABLE ไม่สามารถดำเนินการต่อให้สมบูรณ์ได้',

	'db_not_null' => 'ในระบบฐานข้อมูลมีการติดตั้ง UCenter แล้ว  ให้ดำเนินการต่อเพื่อลบข้อมูลเก่า',
	'db_drop_table_confirm' => 'ฉันแน่ใจว่าต้องการดำเนินการลบล้างข้อมูลเก่า?',

	'writeable' => 'สามารถเขียนได้',
	'unwriteable' => 'ไม่สามารถเขียนได้',
	'old_step' => 'ขั้นตอนก่อนหน้า',
	'new_step' => 'ขั้นตอนถัดไป',

	'database_errno_2003' => 'ไม่สามารถเชื่อมต่อกับฐานข้อมูล โปรดตรวจสอบฐานข้อมูลว่าเชื่อมต่ออยู่เซิร์ฟเวอร์ฐานข้อมูลถูกต้องหรือไม่',
	'database_errno_1044' => 'ไม่สามารถสร้างฐานข้อมูลใหม่โปรดตรวจสอบชื่อฐานข้อมูลที่กรอกให้ถูกต้อง',
	'database_errno_1045' => 'ไม่สามารถเชื่อมต่อกับฐานข้อมูลโปรดตรวจสอบชื่อผู้ใช้ฐานข้อมูลและรหัสผ่านให้ถูกต้อง',
	'database_connect_error' => 'การเชื่อมต่อฐานข้อมูลผิดพลาด',

	'step_title_1' => 'การตรวจสอบก่อนติดตั้ง',
	'step_title_2' => 'กำหนดข้อมูลระบบ',
	'step_title_3' => 'สร้างฐานข้อมูล',
	'step_title_4' => 'ติดตั้ง',
	'step_env_check_title' => 'เริ่มต้นการติดตั้ง',
	'step_env_check_desc' => 'ตรวจสอบระบบการเข้าถึงของไฟล์และโฟลเดอร์',
	'step_db_init_title' => 'ติดตั้งฐานข้อมูล',
	'step_db_init_desc' => 'ดำเนินการติดตั้งฐานข้อมูล และ สร้างผู้ดูแลระบบ',

	'step1_file' => 'โฟลเดอร์และไฟล์',
	'step1_need_status' => 'สถานะที่ต้องการ',
	'step1_status' => 'สถานะปัจจุบัน',
	'not_continue' => 'กรุณาตรวจสอบโฟลเดอร์/ไฟล์ สีแดงและลองอีกครั้ง',

	'tips_dbinfo' => 'กรอกข้อมูลระบบฐานข้อมูล',
	'tips_dbinfo_comment' => '',
	'tips_admininfo' => 'กรอกข้อมูลผู้ดูแลระบบ',
	'step_ext_info_title' => 'การติดตั้งสำเร็จ',
	'step_ext_info_comment' => 'คลิกที่นี่เพื่อเข้าสู่ระบบ',

	'ext_info_succ' => 'การติดตั้งสำเร็จ',
	'install_submit' => 'ตกลง',
	'install_locked' => 'การติดตั้งถูกระงับ, หากคุณต้องการติดตั้งใหม่ให้ไปที่เซิร์ฟเวอร์แล้วทำการลบ<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg' => 'คุณต้องแก้ปัญหาข้างต้น, มิฉนั้นการติดตั้งจะไม่สามารถดำเนินการต่อไปได้',

	'step_app_reg_title' => 'ตั้งค่าระบบ',
	'step_app_reg_desc' => 'ทดสอบระบบเซิร์ฟเวอร์, และตั้งค่า UCenter',
	'tips_ucenter' => 'กรุณากรอกข้อมูลของ UCenter ที่กำหนดไว้',
	'tips_ucenter_comment' => 'UCenter เป็นผลิตภัณฑ์หลักของบริษัทฯ Comsenz ซึ่ง Discuz! Board ต้องติดตั้งและพึ่งพาการทำงานของโปรแกรมนี้. หากคุณติดตั้ง UCenter ไว้แล้ว กรุณากรอกข้อมูลด้านล่าง หากคุณยังไม่มีและยังไม่ได้ติดตั้ง UCenter กรุณาไปที่ <a href="http://www.discuzthai.com/" target="blank">DiscuzThai</a> เพื่อดาวน์โหลด UCenter เวอร์ชันภาษาไทย แล้วทำการติดตั้งเพื่อดำเนินการต่อไป',

	'advice_mysql_connect' => 'กรุณาตรวจสอบว่า MySQL มีการเชื่อมต่ออย่างถูกต้อง',
	'advice_gethostbyname' => 'ค่า gethostbyname.ใน PHP ถูกปิดใช้งาน   โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_file_get_contents' => 'ตรวจสอบ allow_url_fopen ใน php.ini ว่าเปิดใช้งานอยู่รึเปล่า. โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_xml_parser_create' => 'ต้องตรวจสอบดูว่าสนับสนุน PHP สำหรับ XML หรือไม่. โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_fsockopen' => 'ตรวจสอบ allow_url_fopen ใน php.ini ว่าเปิดใช้งานอยู่รึเปล่า. โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_pfsockopen' => 'ตรวจสอบไฟล์ php.ini ว่าฟังก์ชัน allow_url_fopen ได้ถูกตั้งสถานะเป็น On หรือเปิดการใช้งานอยู่หรือไม่ โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_stream_socket_client' => 'ฟังก์ชันใน PHP อนุญาตให้เข้าถึงการทำงานของ stream_socket_client หรือไม่ โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_curl_init' => 'ฟังก์ชันใน PHP อนุญาตให้เข้าถึงการทำงานของ curl_init หรือไม่ โปรดติดต่อผู้ให้บริการโฮสเพื่อตรวจสอบการเปิดคุณลักษณะนี้',

	'ucurl' => 'ที่อยู่ URL ของ UCenter',
	'ucpw' => 'รหัสผ่านของ UCenter',
	'ucip' => 'ที่อยู่ IP ของ UCenter',
	'ucenter_ucip_invalid' => 'รูปแบบผิดพลาด กรุณากรอกที่อยู่ IP ให้ถูกต้อง',
	'ucip_comment' => 'ที่อยู่ IP ไม่จำเป็นต้องกรอก',

	'tips_siteinfo' => 'กรุณากรอกข้อมูลเว็บไซต์',
	'sitename' => 'ชื่อเว็บไซต์',
	'siteurl' => 'URL เว็บไซต์',

	'forceinstall' => 'กำลังติดตั้ง',
	'dbinfo_forceinstall_invalid' => 'ในฐานข้อมูลปัจจุบันมีคำนำหน้าตารางเดียวกัน คุณสามารถปรับเปลี่ยนชื่อคำนำหน้าตาราง เพื่อหลีกเลี่ยงการลบข้อมูลเก่า หรือเลือกที่จะติดตั้งทับลงไปในข้อมูลเก่า.การติดตั้งจำเป็นจะต้องลบข้อมูลเก่า และไม่สามารถกู้คืนได้',

	'click_to_back' => 'คลิกกลับไปที่ขั้นตอนที่แล้ว',
	'adminemail' => 'อีเมล์ผู้ดูแล',
	'adminemail_comment' => 'ใช้ในการส่งรายงานข้อผิดพลาด',
	'dbhost_comment' => 'ทั่วไปจะเป็น localhost',
	'tablepre_comment' => 'ถ้าติดตั้งในฐานข้อมูลเดียวกันกรุณาแก้ไขคำนำหน้า',
	'forceinstall_check_label' => 'ฉันต้องการลบข้อมูลที่ติดตั้ง!!!',

	'uc_url_empty' => 'คุณไม่ได้กรอก URL ของ UCenter กรุณากลับไปกรอก',
	'uc_url_invalid' => 'รูปแบบของ URL ผิดพลาด',
	'uc_url_unreachable' => 'ที่อยู่ URL ของ UCenter อาจกรอกข้อผิดกรุณากลับไปตรวจสอบ',
	'uc_ip_invalid' => 'ไม่สามารถใส่ชื่อโดเมนโปรดกรอก IP ของเว็บไซต์',
	'uc_admin_invalid' => 'รหัสผ่านของ UCenter ผิดพลาดกรุณากรอกใหม่',
	'uc_data_invalid' => 'การเชื่อมต่อล้มเหลว กรุณาตรวจสอบที่อยู่ URL ของ UCenter ให้ถูกต้อง',
	'uc_dbcharset_incorrect' => 'ข้อมูล UCenter และไม่ตรงกับปัจจุบัน',
	'uc_api_add_app_error' => 'เพิ่มโปรแกรมไปยัง UCenter ผิดพลาด',
	'uc_dns_error' => 'DNS ของ UCenter เกิดผิดพลาด กรุณากลับไปกรอกที่อยู่ IP ของ UCenter',

	'ucenter_ucurl_invalid' => 'URL ของ UCenter ว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'ucenter_ucpw_invalid' => 'รหัสผ่านของ UCenter ว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'siteinfo_siteurl_invalid' => 'URL ของเว็บไซต์ว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'siteinfo_sitename_invalid' => 'ชื่อเว็บไซต์ว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_dbhost_invalid' => 'เซิร์ฟเวอร์ฐานข้อมูลว่างหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_dbname_invalid' => 'ชื่อฐานข้อมูลว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_dbuser_invalid' => 'ชื่อผู้ใช้ฐานข้อมูลว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_dbpw_invalid' => 'รหัสผ่านฐานข้อมูลว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_adminemail_invalid' => 'อีเมลผู้ดูแลระบบว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'dbinfo_tablepre_invalid' => 'คำนำหน้าตารางข้อมูลว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'admininfo_username_invalid' => 'ชื่อผู้ดูแลระบบว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'admininfo_email_invalid' => 'อีเมลผู้ดูแลระบบว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'admininfo_password_invalid' => 'รหัสผ่านผู้ดูแลระบบว่างเปล่าหรือผิดรูปแบบ กรุณากลับไปตรวจสอบ',
	'admininfo_password2_invalid' => 'ยืนยันรหัสผ่านผู้ดูแลระบบว่างเปล่าหรือไม่ตรงกัน กรุณากลับไปตรวจสอบ',

/*vot*/	'install_dzfull'		=> 'ติดตั้ง Discuz! X ใหม่ (พร้อมด้วย UCenter Server)',//'全新安装 Discuz! X (含 UCenter Server)',
/*vot*/	'install_dzonly'		=> 'ติดตั้งเฉพาะ Discuz! X เท่านั้น (กรณีที่ Ucenter Server มีการติดตั้งแล้ว)',//'仅安装 Discuz! X (手工指定已经安装的 UCenter Server)',

	'username' => 'ชื่อผู้ดูแลระบบ',
	'email' => 'อีเมล์',
	'password' => 'รหัสผ่าน',
	'password_comment' => 'รหัสผ่านผู้ดูแลระบบต้องไม่ว่างเปล่า',
	'password2' => 'ยืนยันรหัสผ่าน',

	'admininfo_invalid' => 'ข้อมูลผู้ดูแลระบบไม่สมบูรณ์โปรดตรวจสอบ ชื่อผู้ดูแลระบบ, รหัสผ่าน, อีเมล',
	'dbname_invalid' => 'ชื่อฐานข้อมูลว่างเปล่ากรุณากรอกชื่อฐานข้อมูล',
	'tablepre_invalid' => 'คำนำหน้าตารางข้อมูลว่างเปล่าหรือรูปแบบไม่ถูกต้องกรุณาตรวจสอบ',
	'admin_username_invalid' => 'ชื่อผู้ดูแลระบบไม่ถูกต้อง ความยาวชื่อผู้ดูแลระบบไม่ควรเกิน 15 ตัวอักษร และ ตัวเลข，และไม่สามารถใส่อักขระพิเศษ，โดยทั่วไปจะใช้ตัวอักษไทย จีน อังกฤษ หรือตัวเลข',
	'admin_password_invalid' => 'รหัสผ่านที่ไม่ตรงกับข้างต้นกรุณาป้อนอีกครั้ง',
	'admin_email_invalid' => 'ข้อผิดพลาด ที่อยู่อีเมล์นี้ใช้ไปแล้วหรือรูปแบบอีเมลที่ไม่ถูกต้อง, กรุณาใช้อีเมลอื่น',
	'admin_invalid' => 'ข้อมูลผู้ดูแลระบบของคุณไม่สมบูรณ์กรุณากรอกข้อมูลในแต่ละรายการ',
	'admin_exist_password_error' => 'หากคุณต้องการใช้ชื่อผู้ดูแลระบบนี้ ไปตั้งค่าชื่อผู้ใช้ในเมนูผู้ดูแลระบบ ',

	'tagtemplates_subject' => 'ชื่อ',
	'tagtemplates_uid' => 'ID ผู้ใช้',
	'tagtemplates_username' => 'โพสต์โดย',
	'tagtemplates_dateline' => 'วันที่',
	'tagtemplates_url' => 'ที่อยู่หัวข้อ',

	'uc_version_incorrect' => 'UCenter เซิร์ฟเวอร์ ของคุณเวอร์ชันต่ำเกินไป กรุณาอัพเกรด UCenter ของคุณให้เป็นเวอร์ชันล่าสุด ดาวน์โหลดเวอร์ชันล่าสุดได้ที่: http://www.comsenz.com/',
	'config_unwriteable' => 'ตัวช่วยการติดตั้งไม่สามารถเขียนไฟล์ config.inc.php ให้กำหนดสิทธิ์ไฟล์นี้เป็น (777)',

	'install_in_processed' => 'กำลังติดตั้ง...',
	'install_succeed' => 'ติดตั้งเสร็จสมบูรณ์, คลิกที่นี่เพื่อไปยังเว็บไซต์ของคุณ',
	'install_cloud' => 'ขอแสดงความยินดี คุณได้ติดตั้งเสร็จสมบูรณ์แล้ว ขอต้อนรับคุณเข้าร่วมพัฒนา Discuz! แบบกลุ่มเมฆ<br>Discuz! แบบกลุ่มเมฆ จะช่วยให้เว็บมาสเตอร์ทุกคนสามารถปรับปรุงจำนวนทราฟิกของเว็บไซต์ได้ และเพิ่มความสามารถในการจัดการภายในเว็บไซต์ของท่าน เพื่อเพิ่มรายได้ในเว็บของท่านได้<br>Discuz! แบบกลุ่มเมฆ จะไม่คิดค่าบริการในการเข้าถึงต่างๆ ได้แก่ QQ Internet, Tencent, vertical and horizontal search, community QQ groups, roaming, SOSO expression services. Discuz! แบบกลุ่มเมฆจะยังคงให้บริการที่มีคุณภาพมากยิ่งขึ้นต่อไป<br>ก่อนการเปิดการใช้งาน Discuz! แบบกลุ่มเมฆ ต้องมั่นใจว่าเว็บไซต์ของคุณ （Discuz!, UCHome  หรือ SupeSite）ได้รับการอัพเกรดเป็น Discuz!X2.5 เรียบร้อยแล้ว',
	'to_install_cloud' => 'ติดตั้ง',
	'to_index' => 'เปิด',

	'init_credits_karma'	=> 'Reputation',//'威望',//!!! The same in install_var.php
	'init_credits_money'	=> 'Points',//'金钱',//!!! The same in install_var.php

	'init_postno0'		=> '#1',//'楼主',//!!! The same in install_var.php 
	'init_postno1'		=> '#2',//'沙发',    //!!! The same in install_var.php
	'init_postno2'		=> '#3',//'板凳',   //!!! The same in install_var.php
	'init_postno3'		=> '#4',//'地板',   //!!! The same in install_var.php

	'init_support'		=> 'Digg',//'支持',   //!!! The same in install_var.php
	'init_opposition'	=> 'Bury',//'反对',//!!! The same in install_var.php

	'init_group_0' => 'สมาชิก',
	'init_group_1' => 'ผู้ดูแลระบบ',
	'init_group_2' => 'ผู้ดูแลสูงสุด',
	'init_group_3' => 'ผู้ดูแลกระดาน',
	'init_group_4' => 'แบนห้ามโพสต์',
	'init_group_5' => 'แบนห้ามเข้า',
	'init_group_6' => 'แบน IP',
	'init_group_7' => 'ผู้เยี่ยมชม',
	'init_group_8' => 'รอยืนยัน',
	'init_group_9' => 'ขอส่วนบุญ',
	'init_group_10' => 'Newbie',
	'init_group_11' => 'Member',
	'init_group_12' => 'Conqueror',
	'init_group_13' => 'Senior Member',
	'init_group_14' => 'Gold Member',
	'init_group_15' => 'Forum Legend',

	'init_rank_1' => 'ผู้เริ่มต้น',
	'init_rank_2' => 'โพสต์มือใหม่',
	'init_rank_3' => 'โพสต์มือสมัครเล่น',
	'init_rank_4' => 'โพสต์มืออาชีพ',
	'init_rank_5' => 'โพสต์มือฉมัง',

	'init_cron_1' => 'เคลียร์จำนวนโพสต์ในวันนี้',
	'init_cron_2' => 'อัพเดทยกยอดเวลาออนไลน์',
	'init_cron_3' => 'เคลียร์ข้อมูลประจำวัน',
	'init_cron_4' => 'สถิติ และอีเมลอวยพรวันคล้ายวันเกิด',
	'init_cron_5' => 'กู้คืนข้อความ',
	'init_cron_6' => 'เคลียร์ประกาศ',
	'init_cron_7' => 'อัพเดทหัวข้อที่หมดอายุ',
	'init_cron_8' => 'เคลียร์ข้อมูลการโปรโมทเว็บ',
	'init_cron_9' => 'เคลียร์กระทู้ประจำเดือน',
	'init_cron_10' => 'X-Space อัพเดทสมาชิกวันนี้',
	'init_cron_11' => 'อัพเดทหัวข้อสัปดาห์นี้',

	'init_bbcode_1' => 'เนื้อหาจะเลื่อนในแนวนอน ผลลัพท์จะคล้ายกับ HTML marquee หมายเหตุ: ผลลัพท์นี้มีผลแสดงบน Internet Explorer เท่านั้น',
	'init_bbcode_2' => 'ใส่ Flash แอนนิเมชั่น',
	'init_bbcode_3' => 'แสดงสถานะ QQ ออนไลน์ คลิกที่ไอคอนของเขา(เธอ) เพื่อสนทนา',
	'init_bbcode_4' => 'ตัวยก',
	'init_bbcode_5' => 'ตัวห้อย',
	'init_bbcode_6' => 'ใส่เสียง Windows media',
	'init_bbcode_7' => 'ใส่เสียงหรือวีดีโอ Windows media',

	'init_qihoo_searchboxtxt' =>'ใส่คำที่ต้องการค้นหา สำหรับค้นหาอย่างรวดเร็วในเว็บไซต์นี้',
	'init_threadsticky' =>'ปักหมุด I,ปักหมุด II, ปักหมุด III',

	'init_default_style' => 'รูปแบบหลัก',
	'init_default_forum' => 'เว็บบอร์ดตัวอย่าง',
	'init_default_template' => 'เทมเพลทหลัก',
	'init_default_template_copyright'	=> 'Sing Imagination (Beijing) Technology Co., Ltd.',//'北京康盛新创科技有限责任公司',

	'init_dataformat'	=> 'Y-m-d',//'Y-n-j',
	'init_modreasons' => 'โพสต์โฆษณา\r\nสแปมโพสต์\r\nโพสต์ไม่เข้ากับเนื้อหา\r\nโพสต์ผิดห้อง\r\n\r\nโพสต์นี้จัดเต็ม\r\nถูกใจให้ทิป\r\nโพสต์ยอดเยี่ยม\r\nโพสต์มีเนื้อหาเป็นต้นฉบับ\r\nขอบคุณค่ะ\r\nขอบคุณครับ',
	'init_userreasons' => 'โพสต์นี้จัดเต็ม\r\nถูกใจให้ทิป\r\nโพสต์ยอดเยี่ยม\r\nโพสต์มีเนื้อหาเป็นต้นฉบับ\r\nขอบคุณค่ะ\r\nขอบคุณครับ',
	'init_link'		=> 'Discuz! Official forum',//'Discuz! 官方论坛',
	'init_link_note' => 'ชุมชนผู้ใช้งานเว็บบอร์ด Discuz!',

	'init_promotion_task' => 'กิจกรรมโปรโมทเว็บไซต์ของเรา',
	'init_gift_task' => 'กิจกรรมกล่องของขวัญ',
	'init_avatar_task' => 'กิจกรรมเปลี่ยนรูปประจำตัว',

	'license'	=> '<div class="license"><h1>License agreement</h1>

<p>Copyright (c) 2001-2010, Hong Sing Imagination (Beijing) Technology Co., Ltd. All rights reserved.</p>

<p>Thank you for choosing Discuz! forum product. We hope that our product will be able to provide you with a fast, efficient and powerful community forum solution.</p>

<p>Discuz! English full name Crossday Discuz! Board, Chinese full name Discuz! Forum, hereinafter referred to as Discuz!.</p>

<p>Sing Imagination (Beijing) Technology Co., Ltd. for the Discuz! product developers, and they shall have Discuz! Product Copyright (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, Discuz! Official website address is http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>

<p>Discuz! copyright has been registered in The People\'s Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using Discuz! software.</p>

<p>This License applies and only applies Discuz! X version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3>I. Licensing agreement rights</h3>
<ol>
<li>You can fully comply with the end user license agreement, based on the software used in this non-commercial use, without having to pay for software copyright licensing fees.</Li>
<li>Agreement you can within the constraints and limitations modify Discuz! source code (if provided) or interface styles to suit your site requirements.</Li>
<li>You have to use this software to build the forum all the membership information, articles and related information of ownership, and is independent of commitment and legal obligations related to the article content.</Li>
<li>A commercial license, you can use this software for commercial applications, while according to the type of license purchased to determine the period of technical support, technical support, technical support form and content, from the moment of purchase, within the period of technical support have a way to get through the specified designated areas of technical support services. Business authorized users have the power to reflect and comment, relevant comments will be a primary consideration, but not necessarily be accepted promise or guarantee.</Li>
</ol>

<h3>II. Agreement constraints and limitations</h3>
<ol>
<li>Business license has not been before, may not use this software for commercial purposes (including but not limited to business sites, business operations, for commercial purpose or profit web site). Purchase of commercial license, please visit http://www.discuz.com reference instructions, call 8610-51657885 for more details.</Li>
<li>May not associated with the software or business license for rental, sale, mortgage or grant sub-licenses.</Li>
<li>In any case, that no matter how used, whether modified or landscaping, changes to what extent, just use Discuz! the whole or any part, without the written permission of the Forum page footer Department Discuz! name and Sing Imagination (Beijing) Technology Co., Ltd. affiliated website (http://www.comsenz.com, http://www.discuz.com or http://www.discuz.net) the link must be retained, not removed or modified .</Li>
<li>Prohibited Discuz! the whole or any part of the basis for the development of any derivative version, modified version or third-party version for redistribution.</Li>
<li>If you failed to comply with the terms of this Agreement, your license will be terminated, the licensee rights will be recovered, and bear the corresponding legal responsibility.</Li>
</ol>

<h3>III. Limited Warranty and Disclaimer</h3>
<ol>
<li>The software and the accompanying documents as not to provide any express or implied, or guarantee in the form of compensation provided.</li>
<li>User voluntary use of this software, you must understand the risks of using this software, technical services in the not to buy products before, we do not promise to provide any form of technical support, use of guarantees, nor liable for any use of this software issues related to liability arising.</li>
<li>Hong Sing Company does not use the software to build a website or forum post or liable for the information, you assume full responsibility.</li>
<li>Hong Sing company provides software and services in a timely manner, security, accuracy is not guaranteed, due to force majeure, Hong Sing factors beyond the control of the company (including hacker attacks, stopping power, etc.) caused by software and services Suspension or termination, and give your losses, you agree to Sing corporate responsibility waiver of all rights.</li>
<li>Hong Sing Company specifically draw your attention to Hong Sing Company in order to protect business development and adjustment of autonomy, Hong Sing Company has at any time with or without prior notice to modify the service content, suspend or terminate some or all of the rights of software and services , changes will be posted on the relevant pages of Sing website, including without notice. Hong Sing Company to modify or discontinue the exercise, termination of some or all of the rights of software and services resulting from the loss, without Hong Sing Company to you or any third party.
</li>
</ol>


<p>Hong Sing products on the end user license agreement, business license and technical services to the details provided by the Hong Sing exclusive. Sing the company has without prior notice, modify the license agreement and services price list right to the modified agreement or price list from the change of the date of the new authorized user to take effect.</p>

<p>Once you start the installation Hong Sing products, shall be deemed to fully understand and accept the terms of this Agreement, the terms in the enjoyment of the rights granted at the same time, by the relevant constraints and restrictions. Licensing agreement outside the scope of acts would be a direct violation of this License Agreement and constitute an infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and retain the power to investigate related responsibilities.</p>

<p>The interpretation of the terms of the license agreement, validity, and dispute resolution, applicable to the mainland People\'s Republic of law.</p>

<p>Between Hong Sing if you and any dispute or controversy, should first be settled through friendly consultations, the consultation fails, you hereby agree to submit the dispute or controversy Sing Haidian District People\'s Court where jurisdiction. Hong Sing Company has the right to interpret the above terms and discretion.</p>

</div>',

	'uc_installed' => 'คุณได้ติดตั้ง UCenter ไว้อยู่แล้ว หากคุณจำเป็นต้องติดตั้งใหม่ให้ลบไฟล์ data/install.lock',
	'i_agree' => 'ฉันได้อ่านและยอมรับข้อตกลงทั้งหมด',
	'supportted' => 'สนับสนุน',
	'unsupportted' => 'ไม่สนับสนุน',
	'max_size' => 'สนับสนุน/ขนาดสูงสุด',
	'project' => 'รายการ',
	'ucenter_required' => 'ขั้นต่ำ',
	'ucenter_best' => 'แนะนำ',
	'curr_server' => 'เซิร์ฟเวอร์ปัจจุบัน',
	'env_check' => 'ความต้องการของระบบ',
	'os' => 'ระบบปฏิบัติการ',
	'php' => 'PHP เวอร์ชั่น',
	'attachmentupload' => 'อัปโหลดไฟล์',
	'unlimit' => 'ไม่จำกัด',
	'version' => 'เวอร์ชั่น',
	'gdversion' => 'GD เวอร์ชั่น',
	'allow' => 'อนุญาต',
	'unix' => 'คลาส Unix',
	'diskspace' => 'พื้นที่ดิสก์',
	'priv_check' => 'ตรวจสอบสิทธิ์ไดเร็กทอรี',
	'func_depend' => 'ตรวจสอบฟังก์ชัน',
	'func_name' => 'ชื่อฟังก์ชัน',
	'check_result' => 'ทดสอบผลลัพธ์',
	'suggestion' => 'คำแนะนำ',
	'advice_mysql' => 'ตรวจสอบว่าโมดูล MySQL โหลดอย่างถูกต้อง',
	'advice_fopen' => 'ตรวจสอบ allow_url_fopen ใน php.ini ว่าเปิดใช้งานอยู่หรือไม่ โปรดติดต่อผู้ให้บริการโฮสต์เพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_file_get_contents' => 'ตรวจสอบ allow_url_fopen ใน php.ini ว่าเปิดใช้งานอยู่หรือไม่ โปรดติดต่อผู้ให้บริการโฮสต์เพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'advice_xml' => 'ตรวจสอบดูว่าสนับสนุน PHP สำหรับ XML หรือไม่ โปรดติดต่อผู้ให้บริการโฮสต์เพื่อตรวจสอบการเปิดคุณลักษณะนี้',
	'none' => 'ไม่มี',

	'dbhost' => 'เซิร์ฟเวอร์',
	'dbuser' => 'ชื่อผู้ใช้',
	'dbpw' => 'รหัสผ่าน',
	'dbname' => 'ชื่อฐานข้อมูล',
	'tablepre' => 'คำนำหน้าตาราง',

	'ucfounderpw' => 'รหัสผ่าน',
	'ucfounderpw2' => 'ยืนยันรหัสผ่าน',

	'init_log' => 'บันทึกการเขียน',
	'clear_dir' => 'ล้างเนื้อหาในโฟล์เดอร์',
	'select_db' => 'เลือกฐานข้อมูล',
	'create_table' => 'สร้างตารางข้อมูล',
	'succeed' => 'สำเร็จ',

	'install_data' => 'กำลังติดตั้งข้อมูล',
	'install_test_data' => 'กำลังติดตั้งข้อมูลเพิ่มเติม',

	'method_undefined' => 'ไม่กำหนดวิธี',
	'database_nonexistence' => 'ไม่พบฐานข้อมูลที่ต้องการ',
	'skip_current' => 'ข้ามขั้นตอนนี้',
	'topic' => 'หัวข้อ',

//---------------------------------------------------------------
// Added by Valery Votintsev
// 2 vars for language select:
	'welcome'			=> 'Welcome to Discuz! X Installation!',//'欢迎到Discuz！ X安装！',
	'select_language'		=> '<b>Select the installation language</b>:',//'<b>选择安装语言</b>',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',
	'mbstring'			=> 'MBstring Library',//'MBstring 库',

//---------------------------------------------------------------

);

$msglang = array(
	'config_nonexistence' => 'ไม่พบไฟล์ config.inc.php ในระบบ ตัวช่วยการติดตั้งไม่สามารถดำเนินการต่อไปได้ กรุณาใช้เครื่องมือ FTP เพื่ออัพโหลดไฟล์ดังกล่าวและลองใหม่อีกครั้ง',
);

