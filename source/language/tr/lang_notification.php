<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 */

$lang = array
(

	'type_wall'		=> 'Mesaj',
	'type_piccomment'	=> 'Resim yorum',
	'type_blogcomment'	=> 'Blog yorum',
	'type_clickblog'	=> 'Blog rating',
	'type_clickarticle'	=> 'Haber rating',
	'type_clickpic'		=> 'Resim rating',
	'type_sharecomment'	=> 'Paylaşım rating',
	'type_doing'		=> 'Durum',
	'type_friend'		=> 'Arkadaş',
	'type_credit'		=> 'Puanlar',
	'type_bbs'		=> 'Forum',
	'type_system'		=> 'Sistem',
	'type_thread'		=> 'Konu',
	'type_task'		=> 'Görev',
	'type_group'		=> 'Grup',

	'mail_to_user'		=> 'Yeni duyuru',
	'showcredit'		=> '{actor} size klasman listesinde yer almanız için {credit} puan gönderdi, klasman <a href="misc.php?mod=ranklist&type=member" target="_blank">listesi</a> ',
	'share_space'		=> '{actor} sizin sayfanızı paylaştı.',
	'share_blog'		=> '{actor} sizin <a href="{url}" target="_blank">{subject}</a> konulu blogunuzu paylaştı.',
	'share_album'		=> '{actor} sizin <a href="{url}" target="_blank">{albumname}</a> isimli albümünüzü paylaştı.',
	'share_pic'		=> '{actor} sizin {albumname} albümünüz\'de ki <a href="{url}" target="_blank"> resmi</a> paylaştı.',
	'share_thread'		=> '{actor}  <a href="{url}" target="_blank">{subject}</a> isimli konunuzu paylaştı.',
	'share_article'		=> '{actor}  <a href="{url}" target="_blank">{subject}</a> konulu haberinizi paylaştı.',
	'magic_present_note'	=> ' <a href="{url}" target="_blank">{name}</a> size hediye etti.',
	'friend_add'		=> '{actor} ile arkadaş oldunuz.',
	'friend_request'	=> '{actor} requested you to add as a friend: {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Approve the request</a>',//'{actor} 请求加您为好友{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">批准申请</a>',
	'doing_reply'		=> '{actor} <a href="{url}" target="_blank">durumunuza</a> cevap yazdı.',
	'wall_reply'		=> '{actor} size <a href="{url}" target="_blank">cevap</a> yazdı.',
	'pic_comment_reply'	=> '{actor} resim yorumunuzu <a href="{url}" target="_blank">cevapladı.</a>',
	'blog_comment_reply'	=> '{actor} blog  yorumunuzu <a href="{url}" target="_blank">cevapladı.</a>',
	'share_comment_reply'	=> '{actor} paylaşım  yorumunuzu <a href="{url}" target="_blank">cevapladı.</a>',
	'wall'			=> '{actor} duvarınıza <a href="{url}" target="_blank">mesaj ekledi</a>',
	'pic_comment'		=> '{actor} resminizi <a href="{url}" target="_blank">yorumladı.</a>',
	'blog_comment'		=> '{actor} <a href="{url}" target="_blank">{subject}</a> blogunuzu yorumladı.',
	'share_comment'		=> '{actor} paylaşımınızı <a href="{url}" target="_blank">yorumladı.</a>',
	'click_blog'		=> '{actor} blogunuza <a href="{url}" target="_blank">{subject}</a> rating verdi.',
	'click_pic'		=> '{actor} sizin <a href="{url}" target="_blank">resminizi</a> rating kullandı',
	'click_article'		=> '{actor} <a href="{url}" target="_blank">{subject}</a> haberinize rating verdi.',
	'show_out'		=> '{actor} visited your home page, this showed your final bid point also consumed',//'{actor} 访问了你的主页后，你在竞价排名榜中最后一个积分也被消费掉了',
	'puse_article'		=> 'Congratulations, your article <a href="{url}" target="_blank">{subject}</a> has been pushed to portal, <a href="{newurl}" target="_blank">click here to view</a>',//'恭喜你，你的<a href="{url}" target="_blank">{subject}</a>已被推送到门户， <a href="{newurl}" target="_blank">点击查看</a>',

	'myinvite_request'	=> 'Application new message <a href="home.php?mod=space&do=notice&view=userapp">Click here to enter the application info page and related operations</a>',//'有新的应用消息<a href="home.php?mod=space&do=notice&view=userapp">点此进入应用消息页面进行相关操作</a>',


	'group_member_join'	=> '{actor}<a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> isimli grubunuza katılmak istiyor, lütfen kontrol ediniz <a href="{url}" target="_blank">Grup Panel</a> ',
	'group_member_invite'	=> '{actor} sizi <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> grubuna katılmağa davet ediyor, <a href="{url}" target="_blank">hemen katıl..</a>',
	'group_member_check'	=> '<a href="{url}" target="_blank">{groupname}</a> grubunu görmek için, lütfen <a href="{url}" target="_blank">tıklayınız</a>',
	'group_member_check_failed'	=> '<a href="{url}" target="_blank">{groupname}</a> grubunu ziyaret etmediniz.',

	'reason_moderate'	=> '<a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuz {actor} onayı bekliyor <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuz {actor} tarafından bölünmüştür <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuz {actor} tarafından silinmiştir. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> ' <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> yorumunuz {actor} tarafından silinmiştir. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> mesajınız {actor} tarafından yasaklanmıştır. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post'	=> 'Your thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was {modaction} by {actor}.<br />
				If you were warned {warninglimit} times in {warningexpiration} days, you will be disabled to post {warningexpiration} days automatically.<br />
				Currently, you have been warned {authorwarnings} times!
				<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'		=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> mesajınız {actor} tarafından taşınmıştır <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'		=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> mesajınız {actor} tarafından kopyalanmıştır <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> ödüllü konunuz {actor} tarafından kaldırılmıştır <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuza {actor} tarafından {stamp} damgası vurulmuştur <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuz\'da ki damga {actor} tarafından kaldırılmıştır <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuza {actor} tarafından {stamp} damgası vurulmuştur <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuz\'da ki damga {actor} tarafından silinmiştir <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konusun\'da ki cevabınız {actor} tarafından sabitlenmiştir <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konusun\'da ki cevabınız  {actor} tarafından sabitlikten kaldırılmıştır<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'	=> ' {threadsubject} isimli konunuz onaylanmadığı için silinmiştir <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> isimli konunuz onaylanmıştır! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete'	=> 'Cevabınız onaylanmadığı için silinmiştir <p class="summary">Içerik: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'	=> 'Cevabınız onaylanmıştır! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a> <p class="summary">Içerik: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'		=> ' {actor} size {credit} puan verdi &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">detaylar &rsaquo;</a>
				<p class="summary">{actor}\'n mesajı: <span>{transfermessage}</span></p>',

	'addfunds'		=> 'Your request to recharge points successfully completed, Corresponding amount of points have been credited to your points account
                		&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Click to view &rsaquo;</a>.
				<p class="summary">Order number: <span>{orderid}</span></p>
                		<p class="summary">Payment: <span>{price} USD</span></p>
                		<p class="summary">Incoming points: <span>{value}</span></p>',

	'rate_reason'		=> ' <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> konusuna cevabınız {actor} tarafından {ratescore} rating almıştır<div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason'	=> '{actor} <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> konusuna cevabınıza verdiği {ratescore} ratingi geri almıştır<div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> bought your product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, the other has been paid, waiting for your delivery  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm'	=> 'You buy the product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a>  has shipped, waiting for your confirmation  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Click to view</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success'	=> 'Products <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> has a refund successfully, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success'		=> 'Products <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> has been saled successfully, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Rate it</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid'	=> 'Seller <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> modified the product <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure that &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">view it</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid'	=> 'Buyer <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> modified the order <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure that &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">View it</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit'		=> '{actor} ve siz rating aldınız &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">yorumlar &rsaquo;</a>',

	'activity_notice'	=> '{actor}  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliğinize katılmak istiyor, gözden geçirin &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'activity_apply'	=> '{actor} sizin <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliğine katılmanızı onaylamıştır &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliği bilgileri tamamlanması için {actor} uyarı yaptı &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliğiniz {actor} tarafından silinmiştir &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">detaylar &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliğine katılımı {actor} iptal etmiştir &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">detaylar &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> etkinliğine {actor} not ekledi &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Etkinlik &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konulu ödülünüz {actor} tarafından en iyi cevap seçilmiştir &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'reward_bestanswer'	=> ' <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konusuna cevabınız {actor} tarafından en iyi cevap seçilmiştir &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> 'Your reply to the reward thread <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was selected as the best answer &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">View &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add'	=> '{actor}  <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> konunuzu yorumladı &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor} <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> konulu mesajınıza cevap yazdı&nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">bakınız</a>',

	'task_reward_credit'	=> 'Tebrikler! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> görevini tamamlayarak {creditbonus} puan kazandınız&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">puan durumunuz &rsaquo;</a></p>',

	'task_reward_magic'	=> 'Tebrikler! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> görevini tamamlayarak, <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} araç kazandınız',

	'task_reward_medal'	=> 'Tebrikler! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> görevini tamamlayarak, <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> madalyasi aldınız, Geçerlilik: {bonus} gün',

	'task_reward_medal_forever'	=> 'Congratulations on completing your tasks: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, Get medal <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> Permanent',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

	'task_reward_invite'	=> 'Tebrikler! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> görevini tamamlayarak <a href="home.php?mod=spacecp&ac=invite" target="_blank">davet kodu  {rewardtext} aldınız</a> Geçerlilik: {bonus} gün',

	'task_reward_group'	=> 'Tebrikler! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> görevini tamamlayarak {bonus} gün geçerli {rewardtext} üyegrubu\'na geçtiniz &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'user_usergroup'	=> 'Üye grubunuz {usergroup} grubuna değistirilmistir &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">detaylar &rsaquo;</a>',

	'grouplevel_update'	=> 'Tebrikler! {groupname} grubunuz {newlevel}\'na yükseltilmiştir.',

	'thread_invite'		=> '{actor} sizi {invitename} davet ediyor <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">detaylar &rsaquo;</a>',
	'invite_friend'		=> 'Tebrikler! davet ettiğiniz {actor} ile başarıyla arkadaş oldunuz.',

	'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Back to say hello</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Ignore</a>',//'<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">回打招呼</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">忽略</a>',

	'profile_verify_error'		=> '{verify} data review is denied, the following fields need to fill in:<br/>{profile}<br/>the reason for rejection: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass'		=> 'Tebrikler! bilgileriniz {verify} tarafından kabul edilmiştir.',
	'profile_verify_pass_refusal'	=> 'Üzgünüz, bilgileriniz {verify} tarafından kabul edilmemiştir.',
	'member_ban_speak'		=> '{user} ile ietişiminiz {day} gün için yasaklanmıştır.(0:süresiz),Neden:{reason}',

	'member_moderate_invalidate'	=> 'Hesabınız onaylanamamıştır.,lütfen <a href="home.php?mod=spacecp&ac=profile">tekrar başvurunuz</a>.<br />Admin Mesajı: <b>{remark}</b>',
	'member_moderate_validate'	=> 'Hesabınız onaylanmıştır.<br />Admin Mesajı: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark'	=> 'Hesabınız kontrol edilemiyor,lütfen <a href="home.php?mod=spacecp&ac=profile">tekrar başvurunuz</a>.',
	'member_moderate_validate_no_remark'	=> 'Hesabınız onaylanmıştır.',
	'manage_verifythread'		=> 'New pending threads. <a href="admin.php?action=moderate&operation=threads&dateline=all">Verify now</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',
	'manage_verifypost'		=> 'New pending replies. <a href="admin.php?action=moderate&operation=replies&dateline=all">Verify now</a>',//'有新的待审核回帖。<a href="admin.php?action=moderate&operation=replies&dateline=all">现在进行审核</a>',
	'manage_verifyuser'		=> 'New pending members. <a href="admin.php?action=moderate&operation=members">Verify now</a>',//'有新的待审核会员。<a href="admin.php?action=moderate&operation=members">现在进行审核</a>',
	'manage_verifyblog'		=> 'New pending blogs. <a href="admin.php?action=moderate&operation=blogs">Verify now</a>',//'有新的待审核日志。<a href="admin.php?action=moderate&operation=blogs">现在进行审核</a>',
	'manage_verifydoing'		=> 'New pending doings. <a href="admin.php?action=moderate&operation=doings">Very now</a>',//'有新的待审核记录。<a href="admin.php?action=moderate&operation=doings">现在进行审核</a>',
	'manage_verifypic'		=> 'New pending images. <a href="admin.php?action=moderate&operation=pictures">Verify now</a>',//'有新的待审核图片。<a href="admin.php?action=moderate&operation=pictures">现在进行审核</a>',
	'manage_verifyshare'		=> 'New pending shares. <a href="admin.php?action=moderate&operation=shares">Verify now</a>',//'有新的待审核分享。<a href="admin.php?action=moderate&operation=shares">现在进行审核</a>',
	'manage_verifycommontes'	=> 'New pending comments/replies. <a href="admin.php?action=moderate&operation=comments">Verify now</a>',//'有新的待审核留言/评论。<a href="admin.php?action=moderate&operation=comments">现在进行审核</a>',
	'manage_verifyrecycle'		=> 'New pending Recycle Bin threads. <a href="admin.php?action=recyclebin">Verify now</a>',//'回收站有新的待处理主题。<a href="admin.php?action=recyclebin">现在处理</a>',
	'manage_verifyrecyclepost'	=> 'New pending Recycle Bin posts. <a href="admin.php?action=recyclebinpost">Verify now</a>',//'回帖回收站有新的待处理回帖。<a href="admin.php?action=recyclebinpost">现在处理</a>',
	'manage_verifyarticle'		=> 'New pending articles. <a href="admin.php?action=moderate&operation=articles">Verify now</a>',//'有新的待审核文章。<a href="admin.php?action=moderate&operation=articles">现在进行审核</a>',
	'manage_verifymedal'		=> 'New pending medals. <a href="admin.php?action=medals&operation=mod">Verify now</a>',//'有新的待审核勋章申请。<a href="admin.php?action=medals&operation=mod">现在进行审核</a>',
	'manage_verifyacommont'		=> 'New pending article comments. <a href="admin.php?action=moderate&operation=articlecomments">Verify now</a>',//'有新的待审核文章评论。<a href="admin.php?action=moderate&operation=articlecomments">现在进行审核</a>',
	'manage_verifytopiccommont'	=> 'New pending topic comments. <a href="admin.php?action=moderate&operation=topiccomments">Verify now</a>',//'有新的待审核专题评论。<a href="admin.php?action=moderate&operation=topiccomments">现在进行审核</a>',
	'manage_verify_field'		=> 'New pending fields {verifyname}. <a href="admin.php?action=verify&operation=verify&do={doid}">Verify now</a>',//'有新的待处理{verifyname}。<a href="admin.php?action=verify&operation=verify&do={doid}">现在处理</a>',
	'system_notice'			=> '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration'		=> 'The following ads on your site will be expired in {day} days. Please deal with:<br />{advs}',//'您站点的以下广告将于 {day} 天后到期，请及时处理：<br />{advs}',
	'report_change_credits'		=> '{actor} has deal with your report, your points {creditchange}',//'{actor} 处理了你的举报，你的 {creditchange}',
	'new_report'			=> 'new report pending, <a href="admin.php?action=report" target="_blank">Click here to enter the background processing</a>.',//'有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
	'new_post_report'		=> 'New pending report, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Click here to enter the administration panel</a>.',//'有新的举报等待处理，<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">点此进入管理面版</a>。',
	'magics_receive'		=> 'You have received the magic {magicname} from {actor}.
					<p class="summary">{actor} said: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">Return the gift back!</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">View my magics</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
'terms_of_services'		=> 'This is Rules.\nMust read!',

);

