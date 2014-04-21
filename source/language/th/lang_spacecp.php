<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php 28195 2012-02-24 02:59:57Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array(

	'by' => 'โดย',
	'tab_space' => ' ',

	'share' => 'แบ่งปัน',
	'share_action' => 'แบ่งปัน',

	'pm_comment' => 'ตอบความคิดเห็น',
	'pm_thread_about' => 'ส่งข้อความส่วนตัวถึงคุณจากกระทู้ [{subject}]',

	'wall_pm_subject' => 'สวัสดี ฉันได้ฝากข้อความไว้ในโปรไฟล์ของคุณ',
	'wall_pm_message' => 'ฉันได้ฝากข้อความไว้ในโปรไฟล์ของคุณ [url=\\1]คลิกที่นี่เพื่อดูข้อความ[/url]',
	'reward' => 'รางวัล',
	'reward_info' => 'โหวตและได้รับ  \\1 เครดิต',
	'poll_separator' => '","',

	'pm_report_content' => '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a>รายงานข้อความส่วนตัว:<br>จากข้อความส่วนตัวของ<a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a><br>เนื้อหา:{message}',
	'message_can_not_send_1' => 'ส่งล้มเหลว จำนวนครั้งในการส่งข้อความของคุณครบตามที่ระบบกำหนดไว้แล้ว ภายใน 24 ชั่วโมง คุณจึงจะสามารถส่งข้อความได้อีกครั้ง',
	'message_can_not_send_2' => 'คุณส่งข้อความติดต่อกันเร็วเกินไป กรุณารอสักครู่แล้วค่อยส่งใหม่อีกครั้ง',
	'message_can_not_send_3' => 'ขออภัย! คุณไม่สามารถส่งข้อความส่วนตัวจำนวนมากให้เพื่อน',
	'message_can_not_send_4' => 'ขออภัย! คุณไม่สามารถใช้ฟังก์ชันการส่งข้อความส่วนตัว',
	'message_can_not_send_5' => 'การสนทนากลุ่มของคุณครบตามที่ระบบกำหนดไว้แล้ว ภายใน 24 ชั่วโมง คุณจึงจะสามารถสนทนากลุ่มได้อีกครั้ง',
	'message_can_not_send_6' => 'ผู้รับบล็อกข้อความของคุณ',
	'message_can_not_send_7' => 'ผู้ร่วมสนทนาในกลุ่มเกินจำนวนจำกัด',
	'message_can_not_send_8' => 'ขออภัย! คุณไม่สามารถส่งข้อความให้ตัวเอง',
	'message_can_not_send_9' => 'ข้อความว่างเปล่า หรือผู้รับบล็อกข้อความของคุณ',
	'message_can_not_send_10' => 'การสนทนากลุ่มต้องมีผู้ร่วมสนทนาไม่น้อยกว่าสองคน',
	'message_can_not_send_11' => 'เซสชันไม่มีอยู่',
	'message_can_not_send_12' => 'ขออภัย! คุณไม่มีสิทธิ์ในการดำเนินการนี้',
	'message_can_not_send_13' => 'นี่ไม่ใช่ข้อความสนทนากลุ่ม',
	'message_can_not_send_14' => 'นี่ไม่ใช่ข้อความส่วนตัว',
	'message_can_not_send_15' => 'ข้อมูลไม่ถูกต้อง',
	'message_can_not_send_16' => 'คุณมีการส่งข้อความส่วนตัวเกิดจำนวนครั้งที่กำหนดในรอบ 24 ชั่วโมงแล้ว',
	'message_can_not_send_onlyfriend' => 'สมาชิกนี้รับเฉพาะข้อความจากเพื่อนเท่านั้น',


	'friend_subject' => '<a href="{url}" target="_blank">{username} ส่งคำขอเพิ่มคุณเป็นเพื่อน</a>',
	'friend_request_note' => ' ป.ล.:{note}',
	'comment_friend' =>'<a href="\\2" target="_blank">\\1 ส่งข้อความถึงคุณ</a>',
	'photo_comment' => '<a href="\\2" target="_blank">\\1 แสดงความคิดเห็นเกี่ยวกับรูปภาพของคุณ</a>',
	'blog_comment' => '<a href="\\2" target="_blank">\\1 แสดงความคิดเห็นเกี่ยวกับบล็อกของคุณ</a>',
	'poll_comment' => '<a href="\\2" target="_blank">\\1 แสดงความคิดเห็นเกี่ยวกับโพลของคุณ</a>',
	'share_comment' => '<a href="\\2" target="_blank">\\1 แสดงความคิดเห็นเกี่ยวกับการแบ่งปันของคุณ</a>',
	'friend_pm' => '<a href="\\2" target="_blank">\\1 ส่งข้อความส่วนตัวถึงคุณ</a>',
	'poke_subject' => '<a href="\\2" target="_blank">\\1 ส่งคำทักทายถึงคุณ</a>',
	'mtag_reply' => '<a href="\\2" target="_blank">\\1 ตอบกลับกระทู้ของคุณ</a>',
	'event_comment' => '<a href="\\2" target="_blank">\\1 แสดงความคิดเห็นเกี่ยวกับกิจกรรมของคุณ</a>',

	'friend_pm_reply' => '\\1 ตอบกลับข้อความส่วนตัวของคุณ',
	'comment_friend_reply' => '\\1 ตอบกลับข้อความของคุณ',
	'blog_comment_reply' => '\\1 ตอบกลับความคิดเห็นในบล็อกของคุณ',
	'photo_comment_reply' => '\\1 ตอบกลับความคิดเห็นในรูปภาพของคุณ',
	'poll_comment_reply' => '\\1 ตอบกลับความคิดเห็นในโพลของคุณ',
	'share_comment_reply' => '\\1 ตอบกลับความคิดเห็นในการแบ่งปันของคุณ',
	'event_comment_reply' => '\\1 ตอบกลับความคิดเห็นในกิจกรรมของคุณ',

	'mail_my' => 'แจ้งเตือนการโต้ตอบระหว่างฉันและเพื่อน',
	'mail_system' => 'แจ้งเตือนจากระบบ',

	'invite_subject' => '{username} เชิญคุณเข้าร่วมและเป็นเพื่อนใน {sitename}',
	'invite_massage' => '<table border="0">
		<tr>
		<td valign="top">{avatar}</td>
		<td valign="top">
		<h3>สวัสดี ฉันชื่อ {username} ขอเชิญชวนคุณเข้าร่วมและเป็นเพื่อนกับฉันใน {sitename}</h3><br>
		 ได้โปรดเข้าร่วมและเป็นเพื่อนกับฉับ คุณสามารถติดตามความเคลื่อนไหว อ่านบล็อก ดูรูปภาพ แลกเปลี่ยนความรู้/ประสบการณ์ใหม่ๆ และติดต่อกับฉันได้ตลอดเวลา<br>
		<br>
		หากคุณยินดียอมรับเทียบเชิญ:<br>{saymsg}
		<br><br>
		<strong>กรุณาคลิกที่ลิงก์ด้านล่างนี้ เพื่อยอมรับเทียบเชิญ:</strong><br>
		<a href="{inviteurl}">{inviteurl}</a><br>
		<br>
		<strong>ถ้าคุณเป็นสมาชิกของ {sitename} อยู่แล้ว โปรดคลิกที่ลิงก์ด้านล่างเพื่อเข้าเยี่ยมชมโปรไฟล์ของฉัน:</strong><br>
		<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
		</td></tr></table>',

	'app_invite_subject' => '{username} เชิญชวนคุณเข้าร่วมสนุกกับ {appname} ใน {sitename}',
	'app_invite_massage' => '<table border="0">
		<tr>
		<td valign="top">{avatar}</td>
		<td valign="top">
		<h3>สวัสดี ฉันชื่อ {username}  ที่ {sitename} มี {appname} ให้ร่วมสนุก ฉันอยากจะเชิญชวนคุณมาร่วมสนุกด้วยกัน</h3><br>
		<br>
		หากคุณยินดียอมรับเทียบเชิญ:<br>
		{saymsg}
		<br><br>
		<strong>โปรดคลิกที่ลิงก์ด้านล่าง เพื่อยอมรับเทียบเชิญและร่วมสนุกกับ {appname} ด้วยกัน:</strong><br>
		<a href="{inviteurl}">{inviteurl}</a><br>
		<br>
		<strong>ถ้าคุณเป็นสมาชิกของ {sitename} อยู่แล้ว โปรดคลิกที่ลิงก์ด้านล่างเพื่อเข้าเยี่ยมชมโปรไฟล์ของฉัน:</strong><br>
		<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
		</td></tr></table>',

	'person' => 'คน',
	'delete' => 'ลบ',

	'space_update' => '{actor} ปรับปรุงโปรไฟล์ส่วนตัว',

	'active_email_subject' => 'เปิดใช้งานอีเมลของคุณ',
	'active_email_msg' => 'กรุณาคัดลอกลิงก์เปิดใช้งานต่อไปนี้ลงในเบราว์เซอร์ เพื่อเปิดการใช้งานอีเมลของคุณ<br>ลิงก์สำหรับเปิดใช้งานอีเมล:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space' => 'แบ่งปันโปรไฟล์',
	'share_blog' => 'แบ่งปันบล็อก',
	'share_album' => 'แบ่งปันอัลบั้ม',
	'default_albumname' => 'อัลบั้มเริ่มต้น',
	'share_image' => 'แบ่งปันรูปภาพ',
	'share_article' => 'แบ่งปันบทความ',
	'album' => 'อัลบั้ม',
	'share_thread' => 'แบ่งปันกระทู้',
	'mtag' => '{$_G[setting][navs][3][navname]}',
	'share_mtag' => 'แบ่งปัน {$_G[setting][navs][3][navname]}',
	'share_mtag_membernum' => 'สมาชิกที่มีอยู่ {membernum} คน',
	'share_tag' => 'แบ่งปันคีย์เวิร์ด',
	'share_tag_blognum' => 'บล็อกที่มีอยู่ {blognum} บล็อก',
	'share_link' => 'แบ่งปันเว็บไซต์',
	'share_video' => 'แบ่งปันวีดีโอ',
	'share_music' => 'แบ่งปันเพลง',
	'share_flash' => 'แบ่งปันแฟลช Flash',
	'share_event' => 'แบ่งปันกิจกรรม',
	'share_poll' => 'แบ่งปันโพล \\1',
	'event_time' => 'เวลา',
	'event_location' => 'สถานที่',
	'event_creator' => 'สปอนเซอร์',
	'the_default_style' => 'รูปแบบเริ่มต้น',
	'the_diy_style' => 'สร้างรูปแบบของฉันเอง',

	'thread_edit_trail' => '<ins class="modify">[แก้ไขกระทู้ \\1 ใน \\2 ]</ins>',
	'create_a_new_album' => 'สร้างอัลบั้มใหม่',
	'not_allow_upload' => 'คุณไม่ได้รับอนุญาตให้อัพโหลดรูปภาพ',
	'not_allow_upload_extend' => 'ไฟล์ประเภท {extend} ไม่อนุญาตให้อัพโหลด',
	'files_can_not_exceed_size' => 'ไฟล์ประเภท {extend} ไม่สามารถมีขนาดเกิน {size} ได้',
	'get_passwd_subject' => 'คำขอเปลี่ยนรหัสผ่านใหม่',
	'get_passwd_message' => 'คลิกลิงก์ด้านล่างนี้เพื่อตั้งค่ารหัสผ่านของคุณ ลิงก์นี้จะมีอายุเพียง 3 วันเท่านั้น:<br />\\1<br />(ให้ทำการคัดลอกลิงก์แล้ววางที่บราวเซอร์หากลิงก์ไม่สามารถคลิกได้)<br />เมื่อไปยังลิงก์ที่ส่งมาแล้ว ป้อนรหัสผ่านใหม่ หลังจากนั้นคุณสามารถใช้รหัสผ่านใหม่เพื่อลงชื่อเข้าใช้',
	'file_is_too_big' => 'ไฟล์ขนาดใหญ่เกินไป',

	'take_part_in_the_voting' => '{actor} โหวตโพล <a href="{url}" target="_blank">{subject}</a> ของ {touser} ได้รับ {reward} ',
	'lack_of_access_to_upload_file_size' => 'ไม่สามารถอัพโหลด เนื่องจากพื้นที่โปรไฟล์ของคุณเต็ม',
	'only_allows_upload_file_types' => 'ไฟล์รูปภาพจะต้องเป็นรูปแบบ jpg, jpeg, gif, png เท่านั้น',
	'unable_to_create_upload_directory_server' => 'ไม่สามารถสร้างโฟลเดอร์สำหรับเก็บไฟล์ที่อัพโหลดบนเซิร์ฟเวอร์ได้',
	'inadequate_capacity_space' => 'ความจุของพื้นที่ไม่เพียงพอ ไม่สามารถอัพโหลดไฟล์ใหม่',
	'mobile_picture_temporary_failure' => 'ไม่สามารถย้ายไฟล์ที่ระบุไปยังไปยังโฟลเดอร์ชั่วคราวบนเซิร์ฟเวอร์ได้',
	'ftp_upload_file_size' => 'อัพโหลดรูปภาพระยะไกลล้มเหลว',
	'comment' => 'แสดงความคิดเห็น',
	'upload_a_new_picture' => 'อัพโหลดรูปภาพใหม่',
	'upload_album' => 'อัลบั้มปรับปรุงล่าสุด',
	'the_total_picture' => 'ทั้งหมด \\1 รูปภาพ',

	'space_open_subject' => 'แจ้งเตือน ให้ดูแลและปรับปรุงโปรไฟล์ส่วนตัวของคุณ',
	'space_open_message' => 'สวัสดี วันนี้ฉันได้ไปเยี่ยมชมโปรไฟล์ส่วนตัวของคุณ พบว่าคุณไม่ดูแลโปรไฟล์ของตัวเอง คุณน่าจะไปดูแลและปรับปรุงโปรไฟล์ของคุณบ้าง โปรไฟล์ของคุณคือ:\\1space.php',



	'apply_mtag_manager' => 'ต้องการให้ <a href="\\1" target="_blank">\\2</a> เป็นกลุ่มหลัก เหตุผล:\\3 <a href="\\1" target="_blank">(คลิกที่นี่เพื่อเข้าสู่การจัดการ)</a>',


	'magicunit' => 'หน่วย',
	'magic_note_wall' => '{actor}<a href="{url}" target="_blank">ฝากข้อความ</a>ถึงคุณ',
	'magic_call' => 'มีอะไรจะบอกคุณ<a href="{url}" target="_blank">คลิกที่นี่เพื่อดู</a>',


	'present_user_magics' => 'คุณได้รับไอเท็ม \\1 เป็นของขวัญจากผู้ดูแลระบบ',
	'has_not_more_doodle' => 'คุณไม่ได้วาดภาพ',

	'do_stat_login' => 'ลงชื่อเข้าใช้',
	'do_stat_mobilelogin' => 'ลงชื่อเข้าใช้ผ่านโทรศัพท์มือถือ',
	'do_stat_connectlogin' => 'ลงชื่อเข้าใช้ด้วยบัญชี QQ',
	'do_stat_register' => 'ลงทะเบียนใหม่',
	'do_stat_invite' => 'ชวนเพื่อน',
	'do_stat_appinvite' => 'เชิญให้เข้าร่วมแอพลิเคชัน',
	'do_stat_add' => 'เผยแพร่',
	'do_stat_comment' => 'โต้ตอบ',
	'do_stat_space' => 'ข้อมูลเชิงโต้ตอบ',
	'do_stat_doing' => 'ทักทาย',
	'do_stat_blog' => 'บล็อก',
	'do_stat_activity' => 'กิจกรรม',
	'do_stat_reward' => 'รางวัล',
	'do_stat_debate' => 'โต้วาที',
	'do_stat_trade' => 'สินค้า',
	'do_stat_group' => "สร้าง {$_G[setting][navs][3][navname]}",
	'do_stat_tgroup' => "{$_G[setting][navs][3][navname]}",
	'do_stat_home' => "{$_G[setting][navs][4][navname]}",
	'do_stat_forum' => "{$_G[setting][navs][2][navname]}",
	'do_stat_groupthread' => 'กระทู้ของคลับ',
	'do_stat_post' => 'ตอบกลับ',
	'do_stat_grouppost' => 'ตอบกลับของคลับ',
	'do_stat_pic' => 'รูปภาพ',
	'do_stat_poll' => 'โพล',
	'do_stat_event' => 'กิจกรรม',
	'do_stat_share' => 'แบ่งปัน',
	'do_stat_thread' => 'กระทู้',
	'do_stat_docomment' => 'ความคิดเห็นทักทาย',
	'do_stat_blogcomment' => 'ความคิดเห็นบล็อก',
	'do_stat_piccomment' => 'ความคิดเห็นรูปภาพ',
	'do_stat_pollcomment' => 'ความคิดเห็นโพล',
	'do_stat_pollvote' => 'ร่วมโหวต',
	'do_stat_eventcomment' => 'ความคิดเห็นกิจกรรม',
	'do_stat_eventjoin' => 'เข้าร่วมกิจกรรม',
	'do_stat_sharecomment' => 'ความคิดเห็นแบ่งปัน',
//	'do_stat_post' => 'ตอบกลับ',
	'do_stat_click' => 'แสดงความรู้สึก',
	'do_stat_wall' => 'ฝากข้อความ',
	'do_stat_poke' => 'ทักทาย',
	'do_stat_sendpm' => 'ส่งข้อความส่วนตัว',
	'do_stat_addfriend' => 'ขอเป็นเพื่อน',
	'do_stat_friend' => 'รับเป็นเพื่อน',
	'do_stat_post_number' => 'จำนวนโพสต์',
	'do_stat_statistic' => 'สถิติโดยรวม',
	'logs_credit_update_TRC' => 'ร่วมกิจกรรมของเว็บไซต์',
	'logs_credit_update_RTC' => 'ตั้งกระทู้รางวัล',
	'logs_credit_update_RAC' => 'ตอบคำถามถูกต้อง',
	'logs_credit_update_MRC' => 'สุ่มใช้ไอเท็ม',
	'logs_credit_update_BMC' => 'ซื้อไอเท็ม',
	'logs_credit_update_TFR' => 'โอนย้าย',
	'logs_credit_update_RCV' => 'ได้รับจากการโอน',
	'logs_credit_update_CEC' => 'แลกเปลี่ยนเครดิต',
	'logs_credit_update_ECU' => 'แลกเปลี่ยนเครดิตภายใน UCenter',
	'logs_credit_update_SAC' => 'ขายไฟล์แนบ',
	'logs_credit_update_BAC' => 'ซื้อไฟล์แนบ',
	'logs_credit_update_PRC' => 'ได้คะแนนโพสต์',
	'logs_credit_update_RSC' => 'ให้คะแนนโพสต์',
	'logs_credit_update_STC' => 'ขายกระทู้',
	'logs_credit_update_BTC' => 'ซื้อกระทู้',
	'logs_credit_update_AFD' => 'ซื้อเครดิต',
	'logs_credit_update_UGP' => 'ซื้อกลุ่มผู้ใช้เพิ่มเติม',
	'logs_credit_update_RPC' => 'ได้รางวัลจากการรายงาน',
	'logs_credit_update_ACC' => 'เข้าร่วมกิจกรรม',
	'logs_credit_update_RCT' => 'ให้รางวัลตอบกระทู้',
	'logs_credit_update_RCA' => 'ได้รับรางวัลตอบกระทู้',
	'logs_credit_update_RCB' => 'ได้รับโบนัสเครดิตจากการตอบกลับ',
	'logs_credit_update_CDC' => 'รหัสการ์ดเครดิต',
	'logs_credit_update_RGC' => 'เรียกคืนเครดิต',
	'logs_credit_update_BGC' => 'แจกเครดิต',
	'logs_credit_update_AGC' => 'ได้รับเครดิต',
	'logs_credit_update_RKC' => 'ร่วมจัดอันดับ',
	'logs_credit_update_BME' => 'ซื้อเหรียญ',
	'logs_credit_update_RPR' => 'เครดิตสะสม',
	'logs_credit_update_RPZ' => 'ประวัติเครดิต',
	'logs_credit_update_reward_clean' => 'เคลียร์',
	'logs_select_operation' => 'กรุณาเลือกประเภทของการดำเนินการ',
	'task_credit' => 'รางวัลเครดิตภารกิจ',
	'special_3_credit' => 'หักเครดิตสำหรับการตอบ',
	'special_3_best_answer' => 'เครดิตรางวัลสำหรับคำตอบที่ดีที่สุด',
	'magic_credit' => 'สุ่มไอเท็มเพื่อรับเครดิต',
	'magic_space_gift' => 'ใส่อั่งเปาไว้ในหน้าแรกของสเปซของคุณ',
	'magic_space_re_gift' => 'กู้คืนอั่งเปา',
	'magic_space_get_gift' => 'รับอั่งเปา',
	'credit_transfer' => 'โอนเครดิต',
	'credit_transfer_tips' => 'เครดิตรับมา',
	'credit_exchange_tips_1' => 'แลกเปลี่ยนเครดิต ',
	'credit_exchange_to' => 'แลกเปลี่ยน',
	'credit_exchange_center' => 'แลกเปลี่ยนโดยใช้ Ucenter',
	'attach_sell' => 'ขาย',
	'attach_sell_tips' => 'ได้รับจากไฟล์แนบ',
	'attach_buy' => 'ซื้อ',
	'attach_buy_tips' => 'สูญเสียจากไฟล์แนบ',
	'grade_credit' => 'ได้รับเครดิตจากคะแนน',
	'grade_credit2' => 'เครดิตถูกหักจากคะแนนโพสต์',
	'thread_credit' => 'ได้รับเครดิตการขายกระทู้',
	'thread_credit2' => 'สูญเสียเครดิตกระทู้',
	'buy_credit' => 'เติมเงินเครดิต',
	'buy_usergroup' => 'เติมเงินกลุ่มผู้ใช้งาน',
	'buy_medal' => 'ซื้อเหรียญ',
	'report_credit' => 'รายงานเครดิต',
	'join' => 'เข้าร่วม',
	'activity_credit' => 'หักเครดิตค่ากิจกรรม',
	'thread_send' => 'หักค่าส่ง',
	'replycredit' => 'เครดิตที่จ่าย',
	'add_credit' => 'เพิ่มเครดิต',
	'recovery' => 'กู้คืน',
	'replycredit_post' => 'รางวัลการตอบกลับ',
	'replycredit_thread' => 'รางวัลสำหรับกระทู้',
	'card_credit' => 'การ์ดเติมเครดิต',
	'ranklist_top' => 'ใช้เครดิตเพื่อเข้าร่วมการประมูลอันดับ',
	'admincp_op_credit' => 'การดำเนินการเครดิต',
	'credit_update_reward_clean' => 'เคลียร์',

	'profile_unchangeable' => 'ข้อมูลนี้ไม่สามารถเปลี่ยนแปลงได้ในภายหลังจากที่บันทึก',
	'profile_is_verifying' => 'ข้อมูลนี้จะถูกตรวจสอบก่อนที่จะเผยแพร่',
	'profile_mypost' => 'โพสต์ของฉัน',
	'profile_need_verifying' => 'ข้อมูลนี้จะถูกตรวจสอบหลังจากที่บันทึก',
	'profile_edit' => 'แก้ไข',
	'profile_censor' => '(กรองคำหยาบ)',
	'profile_verify_modify_error' => '{verify} การรับรองไม่อนุญาตให้แก้ไข',
	'profile_verify_verifying' => 'ข้อมูล {verify} ของคุณได้ถูกส่งเรียบร้อยแล้ว กรุณารอการตรวจสอบ',

//'district_level_0'		=> '- Country -',//'-国家-',
	'district_level_1' => '-จังหวัด-',
	'district_level_2' => '-อำเภอ-',
	'district_level_3' => '-ตำบล-',
	'district_level_4' => '-หมู่บ้าน-',
	'invite_you_to_visit' => '{user} เชิญชวนคุณให้เข้าชม {bbname}',

	'portal' => 'พอร์ทัล',
	'group' => 'กลุ่ม',
	'follow' => 'ติดตาม',
	'collection' => 'คลังกระทู้',
	'guide' => 'กระทู้แนะนำ',
	'feed' => 'ความเคลื่อนไหว',
	'blog' => 'บล็อก',
	'doing' => 'ทักทาย',
	'wall' => 'ข้อความ',
	'homepage' => 'หน้าแรก',
	'ranklist' => 'รายการอันดับ',
	'select_the_navigation_position' => 'เลือกประเภท {type} เมนูนำทาง',
	'close_module' => 'ปิดประเภทโมดูล {type}',

	'follow_add_remark' => 'เพิ่มมาร์กในการติดตาม',
	'follow_modify_remark' => 'แก้ไขมาร์กการติดตาม',
	'follow_specified_group' => 'ระบุกลุ่มสำหรับการติดตาม',
	'follow_specified_forum' => 'ระบุเว็บบอร์ดสำหรับการติดตาม',

	'filesize_lessthan' => 'ขนาดไฟล์ควรจะน้อยกว่า',

	'spacecp_message_prompt' => '(สนับสนุนตั้งแต่ {msg} ตัวอักษร จนถึงสูงสุด 1000 ตัวอักษร)',
	'card_update_doing' => ' <a class="xi2" href="###">[ปรับปรุงข้อความทักทาย]</a>',
	'email_acitve_message' => '<img src="{imgdir}/mail_inactive.png" alt="ยังไม่ได้ยืนยัน" class="vm" />
					<span class="xi1">อีเมล({newemail})ของคุณยังไม่ได้ยืนยัน...</span><br />
						ระบบได้ส่งอีเมลยืนยันไปยังอีเมลที่คุณใช้ลงทะเบียน โปรดตรวจสอบอีเมลของคุณ เพื่อยืนยันและเปิดใช้งาน<br>
						ถ้าคุณไม่ได้รับอีเมลยืนยัน คุณสามารถเปลี่ยนอีเมล หรือ<a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">คลิกที่นี่เพื่อขอรับอีเมลยืนยันอีกครั้ง</a>',

);

?>