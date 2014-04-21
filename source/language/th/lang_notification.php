<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php 30795 2012-06-20 02:03:13Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'type_wall' => 'ฝากข้อความ',
	'type_piccomment' => 'ความคิดเห็นในรูปภาพ',
	'type_blogcomment' => 'ความคิดเห็นในบล็อก',
	'type_clickblog' => 'ความรู้สึกในบล็อก',
	'type_clickarticle' => 'ความรู้สึกในบทความ',
	'type_clickpic' => 'ความรู้สึกในรูปภาพ',
	'type_sharecomment' => 'ความคิดเห็นในข้อมูลที่นำมาแบ่งปัน',
	'type_doing' => 'ทักทาย',
	'type_friend' => 'เพื่อน',
	'type_credit' => 'เครดิต',
	'type_bbs' => 'เว็บบอร์ด',
	'type_system' => 'ระบบ',
	'type_thread' => 'กระทู้',
	'type_task' => 'กิจกรรม',
	'type_group' => 'คลับ',

	'mail_to_user' => 'ข้อความใหม่',
	'showcredit' => '{actor} เสนอ {credit} เครดิต เพื่อจัดอันดับให้กับคุณ สนับสนุนการจัดอันดับได้ที่ <a href="misc.php?mod=ranklist&type=member" target="_blank">รายการอันดับ</a>',
	'share_space' => '{actor} แบ่งปันโปรไฟล์ของคุณ',
	'share_blog' => '{actor} แบ่งปันบล็อก <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'share_album' => '{actor} แบ่งปันอัลบั้ม <a href="{url}" target="_blank">{albumname}</a> ของคุณ',
	'share_pic' => '{actor} แบ่งปัน<a href="{url}" target="_blank"> รูปภาพ</a>ในอัลบั้ม {albumname} ของคุณ',
	'share_thread' => '{actor} แบ่งปันกระทู้ <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'share_article' => '{actor} แบ่งปันบทความ <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'magic_present_note' => 'มอบไอเท็ม <a href="{url}" target="_blank">{name}</a> ให้กับคุณ',
	'friend_add' => '{actor} ได้เพิ่มคุณเป็นเพื่อนเรียบร้อยแล้ว',
	'friend_request' => '{actor} ขอเพิ่มคุณเป็นเพื่อน {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">รับเป็นเพื่อน</a>',
	'doing_reply' => '{actor} ตอบกลับ <a href="{url}" target="_blank">ข้อความทักทาย</a> ของคุณ',
	'wall_reply' => '{actor} ตอบกลับ <a href="{url}" target="_blank">ข้อความ</a> ของคุณ',
	'pic_comment_reply' => '{actor} ตอบกลับ <a href="{url}" target="_blank">ความคิดเห็นในรูปภาพ</a> ของคุณ',
	'blog_comment_reply' => '{actor} ตอบกลับ <a href="{url}" target="_blank">ความคิดเห็นในบล็อก</a> ของคุณ',
	'share_comment_reply' => '{actor} ตอบกลับ <a href="{url}" target="_blank">ความคิดเห็นในการแบ่งปัน</a> ของคุณ',
	'wall' => '{actor} ฝากข้อความถึงคุณ <a href="{url}" target="_blank">อ่านข้อความ</a>',
	'pic_comment' => '{actor} แสดงความคิดเห็นใน <a href="{url}" target="_blank">รูปภาพ</a> ของคุณ',
	'blog_comment' => '{actor} แสดงความคิดเห็นใน <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'share_comment' => '{actor} แสดงความคิดเห็นใน <a href="{url}" target="_blank">แบ่งปัน</a> ของคุณ',
	'click_blog' => '{actor} แสดงความรู้สึกในบล็อก <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'click_pic' => '{actor} แสดงความรู้สึกใน <a href="{url}" target="_blank">รูปภาพ</a> ของคุณ',
	'click_article' => '{actor} แสดงความรู้สึกในบทความ <a href="{url}" target="_blank">{subject}</a> ของคุณ',
	'show_out' => '{actor} เยี่ยมชมโปรไฟล์ของคุณ และได้รับเครดิตสุดท้ายไปแล้ว',
	'puse_article' => 'ขอแสดงความยินดี กระทู้<a href="{url}" target="_blank">{subject}</a>ของคุณถูกนำไปเป็นบทความ <a href="{newurl}" target="_blank">คลิกเพื่อดู</a>',

	'myinvite_request' => 'ข้อความแอพลิเคชันใหม่<a href="home.php?mod=space&do=notice&view=userapp">คลิกที่นี่เพื่อดูหน้าข้อมูลแอพลิเคชันที่เกี่ยวข้อง</a>',


	'group_member_join' => '{actor} ได้เข้าร่วมคลับ <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> ของคุณ ขณะนี้อยู่ในระหว่างรอการตรวจสอบ โปรดไปที่<a href="{url}" target="_blank">การจัดการคลับ</a> เพื่อดำเนินการตรวจสอบ',
	'group_member_invite' => '{actor} เชิญคุณเข้าร่วมคลับ <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> <a href="{url}" target="_blank">คลิกที่นี่เพื่อเข้าร่วม</a>',
	'group_member_check' => 'คุณได้ผ่านการตรวจสอบและสามารถเข้าร่วมคลับ <a href="{url}" target="_blank">{groupname}</a> ได้แล้ว กรุณา <a href="{url}" target="_blank">คลิกเพื่อเข้าชม</a>',
	'group_member_check_failed' => 'คุณไม่ผ่านการตรวจสอบไม่สามารถเข้าร่วมคลับ <a href="{url}" target="_blank">{groupname}</a>',
	'group_mod_check' => 'สร้างกลุ่มของคุณ <a href="{url}" target="_blank">{groupname}</a> อนุมัติแล้ว กรุณา<a href="{url}" target="_blank">คลิกที่นี่เพื่อเยี่ยมชม</a>',

	'reason_moderate' => '{actor} {modaction} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge' => '{actor} {modaction} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post' => '{actor} ลบกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment' => '{actor} ลบตอบกลับของคุณในกระทู้ <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post' => '{actor} {modaction} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post' => '{actor} {modaction} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ {actor} {modaction}<br />
ห้ามโพสต์เป็นเวลา {warningexpiration} วัน เนื่องจากถูกเตือนต่อเนื่องทั้งหมด {warninglimit} ครั้ง คุณจะถูกห้ามโพสต์โดยอัตโนมัติเป็นเวลา {warningexpiration} วัน<br />
ถึงตอนนี้ คุณถูกตักเตือน {authorwarnings} ครั้ง <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move' => '{actor} ย้ายกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณไปที่ <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy' => '{actor} คัดลอกกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณไปที่ <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward' => '{actor} เพิกถอนกระทู้รางวัล <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update' => '{actor} ติดแสตมป์ {stamp} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete' => '{actor} ลอกแสตมปออกจากกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update' => '{actor} ใส่ไอคอน {stamp} กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete' => '{actor} ลบไอคอนออกจากกระทู้  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ของคุณ <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply' => '{actor} ปักหมุดตอบกลับของคุณในกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply' => '{actor} ถอดหมุดตอบกลับของคุณในกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_quickclear' => '{actor} ได้ลบ {cleartype} ออก <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete' => 'กระทู้ {threadsubject} ของคุณ ไม่ผ่านการตรวจสอบและตอนนี้ได้ถูกลบออกไปแล้ว!',

	'modthreads_delete_reason' => 'กระทู้ {threadsubject} ของคุณ ไม่ผ่านการตรวจสอบและตอนนี้ได้ถูกลบออกไปแล้ว! <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate' => 'กระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> ของคุณ ผ่านการตรวจสอบและตอนนี้ถูกโพสต์ลงไปแล้ว! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูกระทู้ &rsaquo;</a>',

	'modreplies_delete' => 'การโพสต์ตอบกลับของคุณไม่ผ่านการตรวจสอบ และได้ถูกลบออกไปแล้ว! <p class="summary">เนื้อหา: <span>{post}</span></p>',

	'modreplies_validate' => 'การโพสต์ตอบกลับของคุณผ่านการตรวจสอบแล้ว! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">ดูเนื้อหา &rsaquo;</a> <p class="summary">เนื้อหา: <span>{post}</span></p>',

	'transfer' => 'คุณได้รับจากเครดิตจาก {actor} ผ่านการโอนเป็นจำนวน {credit} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>
<p class="summary">{actor} พูดว่า: <span>{transfermessage}</span></p>',

	'addfunds' => 'การร้องขอแลกเปลี่ยนเครดิตของคุณเรียบร้อย ระบบได้ส่งรายงานการแลกเปลี่ยนมายังข้อความส่าวนตัวของคุณ &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>
<p class="summary">หมายเลข: <span>{orderid}</span></p><p class="summary">ค่าใช้จ่าย: <span>฿ {price}  บาท</span></p><p class="summary">รายได้: <span>{value}</span></p>',

	'rate_reason' => '{actor} ให้คะแนนกระทู้ <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> ของคุณ {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'recommend_note_post' => 'ขอแสดงความยินดี ข้อความของคุณ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ได้ถูกตั้งให้เป็นโพสต์แนะนำแล้ว',

	'rate_removereason' => '{actor} ลบคะแนนกระทู้ <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> ของคุณ {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send' => '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> ซื้อสินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> ของคุณ ผู้ซื้อได้ชำระเงินแล้ว กำลังรอการจัดส่งสินค้าของคุณ &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'trade_buyer_confirm' => 'คุณได้ซื้อสินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> ผู้ขายได้ส่งสินค้าไปแล้ว กำลังรอยืนยันการรับสินค้า &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'trade_fefund_success' => 'สินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> มีการคืนเงินเรียบร้อยแล้ว &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'trade_success' => 'สินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> มีการซื้อขายประสบความสำเร็จ &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'trade_order_update_sellerid' => 'ผู้ขาย <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> ปรับเปลี่ยนสินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> และรายละเอียดต่างๆ โปรดตรวจสอบ &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'trade_order_update_buyerid' => 'ผู้ซื้อ <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> ปรับเปลี่ยนสินค้า <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> และรายละเอียดต่างๆ โปรดตรวจสอบ &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'eccredit' => '{actor} การประเมินสินค้าของคุณ &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'activity_notice' => '{actor} สมัครเข้าร่วมกิจกรรมของคุณ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> โปรดตรวจสอบ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'activity_apply' => '{actor} สปอนเซอร์กิจกรรม <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> อนุญาตให้คุณเข้าร่วมในกิจกรรมนี้ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish' => '{actor} สปอนเซอร์กิจกรรม <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> แจ้งข้อมูลที่คุณต้องใช้ดำเนินการในการสมัครเข้าร่วม &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete' => '{actor} สปอนเซอร์กิจกรรม <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ปฏิเสธการขอเข้าร่วมกิจกรรมของคุณ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel' => '{actor} ยกเลิกการมีส่วนร่วมใน <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> กิจกรรม &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification' => '{actor} สปอนเซอร์กิจกรรม <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>ส่งการแจ้งเตือน&nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียดกิจกรรม &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question' => 'คุณได้รับรางวัลใน <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>เนื่องจาก {actor} เลือกคำตอบ ของคุณ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'reward_bestanswer' => '{actor} เลือกข้อความตอบกลับของคุณใน <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> เป็นคำตอบที่ถูกต้อง &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'reward_bestanswer_moderator' => 'คำตอบของคุณในกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ได้รับเลือกเป็นคำตอบที่ดีที่สุด &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'comment_add' => '{actor} แสดงความคิดเห็นโพสต์ของคุณในกระทู้ <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',

	'reppost_noticeauthor' => '{actor} ตอบกระทู้ <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">ดูรายละเอียด</a>',

	'task_reward_credit' => 'ขอแสดงความยินดีคุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> สำเร็จ คุณได้รับเครดิต {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">ดูเครดิตของฉัน &rsaquo;</a></p>',

	'task_reward_magic' => 'ขอแสดงความยินดีคุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>สำเร็จ คุณได้รับไอเท็ม <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} ชิน',

	'task_reward_medal' => 'ขอแสดงความยินดีคุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>สำเร็จ คุณได้รับเหรียญรางวัล <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> สามารถใช้ได้เป็นเวลา {bonus} วัน',

	'task_reward_medal_forever' => 'ขอแสดงความยินดี คุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> เสร็จสมบูรณ์ คุณได้รับเหรียญ <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> เป็นรางวัลแบบถาวร',

	'task_reward_invite' => 'ขอแสดงความยินดีคุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>สำเร็จ คุณได้รับโค้ดเชิญชวน<a href="home.php?mod=spacecp&ac=invite" target="_blank">โค้ดเชิญชวน {rewardtext}</a> สามารถใช้ได้เป็นเวลา {bonus} วัน',

	'task_reward_group' => 'ขอแสดงความยินดีคุณได้ทำกิจกรรม: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>สำเร็จ คุณได้เข้าร่วมกลุ่ม {rewardtext} เป็นเวลา {bonus} วัน &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">ดูระดับการใช้งานของกลุ่มนี้ &rsaquo;</a>',

	'user_usergroup' => 'กลุ่มสมาชิกของคุณได้อัพเกรดเป็น {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">ดูระดับการใช้งานของกลุ่มนี้ &rsaquo;</a>',

	'grouplevel_update' => 'ขอแสดงความยินดี กลุ่มของคุณ {groupname} ได้รับการอัพเกรดไปยัง {newlevel}',

	'thread_invite' => '{actor} เชิญชวนคุณ {invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',
	'blog_invite' => '{actor} เชิญคุณให้ดูบล็อก <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a> &nbsp; <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>', 
	'article_invite' => '{actor} เชิญคุณให้ดูบทความ <a href="portal.php?mod=view&aid={aid}" target="_blank">{subject}</a> &nbsp; <a href="portal.php?mod=view&aid={aid}" target="_blank" class="lit">ดูรายละเอียด &rsaquo;</a>',
	'invite_friend' => 'ขอแสดงความยินดีชวนเพื่อนสำเร็จ {actor} และคุณเป็นเพื่อนกันแล้ว',

	'poke_request' => '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">ตอบกลับคำทักทาย</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">ไม่สนใจ</a>',

	'profile_verify_error' => '{verify} ปฏิเสธข้อมูลของคุณ ต้องกรอกข้อมูลต่อไปนี้:<br/>{profile}<br/>สาเหตุของการปฏิเสธ:{reason}',
	'profile_verify_pass' => 'ขอแสดงความยินดี ข้อมูลที่คุณกรอกผ่านการตรวจสอบ ตรวจสอบข้อมูลโดย {verify}',
	'profile_verify_pass_refusal' => 'ขออภัย, {verify} ปฏิเสธข้อมูลที่คุณกรอก',
	'member_ban_speak' => '{user} ถูกแบนห้ามโพสต์ เป็นเวลา: {day} วัน (ถ้าเป็น 0 คือถูกแบนถาวร) เหตุผล: {reason}',
	'member_ban_visit' => '{user} ถูกแบนห้ามเข้าชม เป็นเวลา: {day} วัน (ถ้าเป็น 0 คือถูกแบนถาวร) เหตุผล: {reason}',
	'member_ban_status' => '{user} ถูกแบนห้ามการเข้าถึง: {reason}',
	'member_follow' => 'มีสมาชิกได้แสดงความเห็นในติดตามจำนวน {count} ข้อความ <a href="home.php?mod=follow">คลิกที่นี่เพื่อดูรายละเอียด</a>',
	'member_follow_add' => '{actor} เพิ่มการติดตามของคุณ <a href="home.php?mod=follow&do=follower">คลิกที่นี่เพื่อดูรายละเอียด</a>',

	'member_moderate_invalidate' => 'การตรวจสอบข้อมูลของคุณล้มเหลว กรุณา<a href="home.php?mod=spacecp&ac=profile">ส่งข้อมูลการลงทะเบียนเพื่อตรวจสอบอีกครั้ง</a><br />ข้อความของผู้ดูแล: <b>{remark}</b>',
	'member_moderate_validate' => 'บัญชีสมาชิกของคุณผ่านการตรวจสอบได้รับการอนุมัติแล้ว<br />ข้อความของผู้ดูแล: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark' => 'การตรวจสอบข้อมูลของคุณล้มเหลว กรุณา<a href="home.php?mod=spacecp&ac=profile">ส่งข้อมูลการลงทะเบียนเพื่อตรวจสอบอีกครั้ง</a>',
	'member_moderate_validate_no_remark' => 'บัญชีสมาชิกของคุณผ่านการตรวจสอบได้รับการอนุมัติแล้ว',
	'manage_verifythread' => 'มีกระทู้ใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=threads&dateline=all">ตรวจสอบตอนนี้</a>',
	'manage_verifypost' => 'มีโพสต์ใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=replies&dateline=all">ตรวจสอบตอนนี้</a>',
	'manage_verifyuser' => 'มีสมาชิกใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=members">ตรวจสอบตอนนี้</a>',
	'manage_verifyblog' => 'มีบล็อกใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=blogs">ตรวจสอบตอนนี้</a>',
	'manage_verifydoing' => 'มีคำทักทายใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=doings">ตรวจสอบตอนนี้</a>',
	'manage_verifypic' => 'มีรูปภาพใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=pictures">ตรวจสอบตอนนี้</a>',
	'manage_verifyshare' => 'มีการแบ่งปันใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=shares">ตรวจสอบตอนนี้</a>',
	'manage_verifycommontes' => 'มีข้อความ/ความเห็นใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=comments">ตรวจสอบตอนนี้</a>',
	'manage_verifyrecycle' => 'ถังขยะมีกระทู้ใหม่ที่รอการตรวจสอบ <a href="admin.php?action=recyclebin">จัดการตอนนี้</a>',
	'manage_verifyrecyclepost' => 'ถังขยะมีโพสต์ใหม่ที่รอการตรวจสอบ <a href="admin.php?action=recyclebinpost">จัดการตอนนี้</a>',
	'manage_verifyarticle' => 'มีบทความใหม่ที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=articles">ตรวจสอบตอนนี้</a>',
	'manage_verifymedal' => 'มีเหรียญรางวัลใหม่ที่รอการตรวจสอบ <a href="admin.php?action=medals&operation=mod">ตรวจสอบตอนนี้</a>',
	'manage_verifyacommont' => 'มีความคิดเห็นใหม่ในบทความที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=articlecomments">ตรวจสอบตอนนี้</a>',
	'manage_verifytopiccommont' => 'มีความคิดเห็นใหม่ในหัวข้อที่รอการตรวจสอบ <a href="admin.php?action=moderate&operation=topiccomments">ตรวจสอบตอนนี้</a>',
	'manage_verify_field' => 'มีการกรอก {verifyname} ใหม่ที่รอการตรวจสอบ <a href="admin.php?action=verify&operation=verify&do={doid}">จัดการตอนนี้</a>',
	'system_notice' => '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration' => 'โฆษณาเว็บไซต์ของคุณจะหมดอายุภายใน {day} วัน, โปรดรีบดำเนินการ: <br />{advs}',
	'report_change_credits' => '{actor} จัดการกับการรายงานของคุณ {creditchange} {msg}',
	'at_message' => '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> ได้กล่าวถึงคุณในโพสต์ของ <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> ว่า: <div class="quote"><blockquote>{message}</blockquote></div><a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">คลิกที่นี่เพื่อดูรายละเอียด</a>',
	'new_report' => 'มีการรายงานเข้ามาใหม่ <a href="admin.php?action=report" target="_blank">คลิกที่นี่เพื่อดูและดำเนินการรายงานนี้</a>',
	'new_post_report' => 'มีการรายงานใหม่ที่รอการตรวจสอบ <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">คลิกที่นี่เพื่อเข้าสู่ศูนย์จัดการระบบ</a>',
	'magics_receive' => '{actor} มอบไอเท็ม {magicname} ให้กับคุณ
<p class="summary">{actor} พูดว่า: <span>{msg}</span></p>
<p class="mbn"><a href="home.php?mod=magic" target="_blank">รับไอเท็ม</a>
<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">ดูกล่องไอเท็มของฉัน</a></p>',
	'invite_collection' => '{actor} เชิญคุณเข้าร่วมในคลังกระทู้  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a><br /> <a href="forum.php?mod=collection&action=edit&op=acceptinvite&ctid={ctid}&dateline={dateline}">ยอมรับคำเชิญ</a>',
	'collection_removed' => 'คลังกระทู้ที่คุณเข้าร่วมตอนนี้  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> ได้ถูกลบออกโดย {actor}',
	'exit_collection' => 'คุณได้เข้าร่วมคลังกระทู้ก่อนหน้านี้อยู่แล้ว  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>',
	'collection_becommented' => 'คุณได้เข้าแสดงความเห็นจากคลังกระทู้นี้  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> จากการแสดงความคิดเห็นใหม่',
	'collection_befollowed' => 'มีสมาชิกได้ติดตามคลังกระทู้ <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> ของคุณ',
	'collection_becollected' => 'ขอแสดงความยินดี! กระทู้ <a href="forum.php?mod=viewthread&tid={tid}">{threadname}</a> ของคุณได้รับการจัดเก็บในคลังกระทู้แล้ว  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>',

	'pmreportcontent' => '{pmreportcontent}',

);

?>