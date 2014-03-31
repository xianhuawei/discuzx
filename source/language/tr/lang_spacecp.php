<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php by Valery Votintsev at sources.ru
 */

$lang = array(

	'by'			=> 'by',
	'tab_space'		=> ' ',

	'share'			=> 'Paylaş',
	'share_action'		=> 'paylaştı',

	'pm_comment'		=> 'Yorum yanıtla',
	'pm_thread_about'	=> ' "{subject}" mesajınız hakkında',

	'wall_pm_subject'	=> 'Merhaba, size mesaj yazdım',
	'wall_pm_message'	=> 'Size mesaj yazdım, [url=\\1]bakabilirsiniz[/url]',
	'reward'		=> 'Ödül',
	'reward_info'		=> 'Oyla: +  \\1 ',
	'poll_separator'	=> ', ',//'"、"',

	'pm_report_content'		=> '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a> Report message:<br>from <a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a> short message<br>content: {message}',//'<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a>举报短消息：<br>来自<a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a>的短消息<br>内容：{message}',
	'message_can_not_send_1'	=> 'Failed to send. You have exceeds the 24 hours limit of sent messages',//'发送失败，您当前超出了24小时内两人会话的上限',
	'message_can_not_send_2'	=> 'You have sent a short message twice too fast - please wait',//'两次发送短消息太快，请稍候再发送',
	'message_can_not_send_3'	=> 'Sorry, you can not to send PM to non-friends',//'抱歉，您不能给非好友批量发送短消息',
	'message_can_not_send_4'	=> 'Sorry, currently you can not use the Send Message function',//'抱歉，您目前还不能使用发送短消息功能',
	'message_can_not_send_5'	=> 'You have exceeded the group chat number of messages within 24 hours session',//'您超出了24小时内群聊会话的上限',
	'message_can_not_send_6'	=> 'Recipient have blocked your message',//'对方屏蔽了您的短消息',
	'message_can_not_send_7'	=> 'The group chat maximum number of messages exceeded',//'超过了群聊人数上限',
	'message_can_not_send_8'	=> 'Sorry, you can not send PM to yourself',//'抱歉，您不能给自己发短消息',
	'message_can_not_send_9'	=> 'The message is empty or the recipient blocked your message',//'收件人为空或对方屏蔽了您的短消息',
	'message_can_not_send_10'	=> 'Initiated group chat must have at least two members',//'发起群聊人数不能小于两人',
	'message_can_not_send_11'	=> 'The session does not exist',//'该会话不存在',
	'message_can_not_send_12'	=> 'Sorry, you do not have permission for this operation',//'抱歉，您没有权限操作',
	'message_can_not_send_13'	=> 'This is not a group chat message',//'这不是群聊消息',
	'message_can_not_send_14'	=> 'This is not private message',//'这不是私人消息',
	'message_can_not_send_15'	=> 'Wrong data',//'数据有误',
	'message_can_not_send_onlyfriend'	=> 'The user can receive short message only from friends',//'该用户只接收好友发送的短消息',


	'friend_subject'	=> '<a href="{url}" target="_blank">{username} sizinle arkadaş olmak istiyor</a>',
	'friend_request_note'	=> ', Not:{note}',
	'comment_friend'	=> '<a href="\\2" target="_blank">\\1 size mesaj yazdı</a>',
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 resminizi yorumladı</a>',
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 blogunuzu yorumladı</a>',
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 anketinizi yorumladı</a>',
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 paylaşımınızı yorumladı</a>',
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 size Ö.M gönderdi</a>',
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 size selam gönderdi</a>',
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 konunuzu cevapladı</a>',
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 etkinliğinize yorum ekledi</a>',

	'friend_pm_reply'	=> '\\1 mesajınızı cevapladı',
	'comment_friend_reply'	=> '\\1 yorumunuzu cevapladı',
	'blog_comment_reply'	=> '\\1 blog yorumunuzu cevapladı',
	'photo_comment_reply'	=> '\\1 resim yorumunuzu cevapladı',
	'poll_comment_reply'	=> '\\1 anket yorumunuzu cevapladı',
	'share_comment_reply'	=> '\\1 paylaşım yorumunuzu cevapladı',
	'event_comment_reply'	=> '\\1 etkinlik yorumunuzu cevapladı',

	'mail_my'		=> 'Remind about interaction with my friends',//'好友与我的互动提醒',
	'mail_system'	=> 'Sistem uyarıları',

	'invite_subject'	=> '{username} sizi {sitename}\'ye kayıt olmanız için davet ediyor,',
	'invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Selam, ben {username}, sizinle arkadaş ve {sitename} sitesine  kayıt olmağa davet ediyorum</h3><br>
				Beni arkadaşlarınıza eklemenizi rica ediyorum, böylelikle tartışma, iletisim ve paylaşımlarda bulunabiliriz.<br>
				<br>
				Davet mesajı:<br>{saymsg}
				<br><br>
				<strong>Arkadaş davetini kabul etmek için lütfen aşağıdaki linki tıklayınız:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>Eğer {sitename} sitesine üye iseniz,aşağıdaki linki tıklayarak profilime bakabilirsiniz:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'app_invite_subject'	=> '{username} invite you to join the {sitename} and play with {appname}',//'{username}邀请您加入{sitename}，一起来玩{appname}',
	'app_invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi, I am {username} from {sitename}. I invite you to join and play together with &quot;{appname}&quot;</h3><br>
				<br>
				Invite P.S.:<br>
				{saymsg}
				<br><br>
				<strong>Please click the link below to receive the invite to play with {appname}:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>if you have an account at {sitename}, please click the following link to see my personal page:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'person'		=> 'kişiler',
	'delete'		=> 'Sil',

	'space_update'		=> '{actor} gôsterildi',

	'active_email_subject'	=> 'Mail aktivasyon',
	'active_email_msg'	=> 'Mail etkinleştirmek için lütfen aşağıdaki linki tarayıcınızın adres çubuğuna kopyalayıp yapıştırın<br>Link:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space'		=> ' sayfa paylaştı.',
	'share_blog'		=> ' blog paylaştı.',
	'share_album'		=> ' albüm paylaştı.',
	'default_albumname'	=> 'Varsayılan Albüm',
	'share_image'		=> ' resim paylaştı.',
	'share_article'		=> ' haber paylaştı.',
	'album'			=> 'Albüm',
	'share_thread'		=> ' konu paylaştı.',
	'mtag'			=> 'Grup',
	'share_mtag'		=> ' grup paylaştı.',
	'share_mtag_membernum'	=> ' toplam {membernum} üye',
	'share_tag'		=> ' etiket paylaştı.',
	'share_tag_blognum'	=> ' toplam {blognum} blog',
	'share_link'		=> ' Url paylaştı.',
	'share_video'		=> ' video paylaştı.',
	'share_music'		=> ' müzik paylaştı.',
	'share_flash'		=> ' Flash paylaştı.',
	'share_event'		=> ' etkinlik paylaştı.',
	'share_poll'		=> '\\1 anket paylaştı.',
	'event_time'		=> 'Süre',
	'event_location'	=> 'Yer',
	'event_creator'		=> 'Ekleyen',
	'the_default_style'	=> 'Varsayılan stil',
	'the_diy_style'		=> 'Özel stil',

	'thread_edit_trail'		=> '<ins class="modify">[Konu \\1 tarafından \\2 tarihinde düzenlendi.]</ins>',
	'create_a_new_album'		=> ' yeni albüm ekledi.',
	'not_allow_upload'		=> 'resim yükleme izniniz bulunmuyor.',
	'not_allow_upload_extend'	=> 'It is not allowed to upload images of {extend} type',//'不允许上传{extend}类型的图片',
	'files_can_not_exceed_size'	=> '{extend} type files can not exceed the {size}',//'{extend}类文件不能超过{size}',
	'get_passwd_subject'		=> 'Şifre sıfırla',
	'get_passwd_message'		=> '3 gün içinde şifrenizi sıfırlamak için aşağıdaki bağlantıyı kullanmanız gerekir:<br />\\1<br /><br />Yeni şifrenizi girin ve gönderin, sonra yeni şifre ile giriş yapınız.',
	'file_is_too_big'		=> 'Dosya çok büyük',

	'take_part_in_the_voting'		=> '{actor} {touser}\'n {reward}  <a href="{url}" target="_blank">{subject}</a> konulu anketine katıldı',
	'lack_of_access_to_upload_file_size'	=> 'Dosya boyutu alınamıyor',
	'only_allows_upload_file_types'		=> 'Sadece jpg,jpeg,gif,png uzantılı resimler yükleyebilirsiniz',
	'unable_to_create_upload_directory_server'	=> 'Unable to create upload directory at the server',//'服务器无法创建上传目录',
	'inadequate_capacity_space'		=> 'Yeterli alanınız olmadığı için yükleme yapılamıyor ',
	'mobile_picture_temporary_failure'	=> 'Dosyalar belirtilen dizine transfer edilemiyor',
	'ftp_upload_file_size'		=> 'FTP yüklenemedi',
	'comment'			=> 'Yorum',
	'upload_a_new_picture'		=> ' yeni resim yükledi',
	'upload_album'			=> ' albümü güncelledi',
	'the_total_picture'		=> 'Toplam \\1 resim',

	'space_open_subject'	=> 'Kişisel sayfan ',
	'space_open_message'	=> 'Merhaba, bugün senin kişisel sayfanı ziyaret ettim, biraz daha düzenleme yapabilirsin:\\1space.php',



	'apply_mtag_manager'	=> ' <a href="\\1" target="_blank">\\2</a> grubu için yönetici olmak istiyor, neden:\\3。<a href="\\1" target="_blank">(Yönetim)</a>',


	'magicunit'		=> '',
	'magic_note_wall'	=> '{actor} duvarınıza<a href="{url}" target="_blank"> mesaj yazdı</a>',
	'magic_call'		=> ' bloguna çağırdı, <a href="{url}" target="_blank">Tıkla</a>',


	'present_user_magics'	=> 'Admin size hediye etti:\\1',
	'has_not_more_doodle'	=> 'Henüz grafitiniz bulunmuyor.',

	'do_stat_login'		=> 'Konuk',
	'do_stat_mobilelogin'	=> 'Mobile login',//'手机访问',
	'do_stat_connectlogin'	=> 'QQ login',//'QQ登录访问',
	'do_stat_register'	=> 'Yeni Kayıtlı',
	'do_stat_invite'	=> 'Arkadaş daveti',
	'do_stat_appinvite'	=> 'App davet',
	'do_stat_add'		=> 'Mesaj bilgiler',
	'do_stat_comment'	=> 'Bilgi İnteraktif',
	'do_stat_space'		=> 'Etkileşim',
	'do_stat_doing'		=> 'Doing',
	'do_stat_blog'		=> 'Blog',
	'do_stat_activity'	=> 'Etkinlik',
	'do_stat_reward'	=> 'Ödül',
	'do_stat_debate'	=> 'Tartışma',
	'do_stat_trade'		=> 'Ticaret',
	'do_stat_group'		=> 'Grup',
	'do_stat_tgroup'	=> 'Groups',
	'do_stat_home'		=> 'Space',
	'do_stat_forum'		=> 'Forum',
	'do_stat_groupthread'	=> 'Grup Konular',
	'do_stat_post'		=> 'Mesajlar',
	'do_stat_grouppost'	=> 'Grup Mesajlar',
	'do_stat_pic'		=> 'Resimler',
	'do_stat_poll'		=> 'Anket',
	'do_stat_event'		=> 'Etkinlik',
	'do_stat_share'		=> 'Paylaşım',
	'do_stat_thread'	=> 'Konu',
	'do_stat_docomment'	=> 'Durum yanıtlar',
	'do_stat_blogcomment'	=> 'Blog yorum',
	'do_stat_piccomment'	=> 'Resim yorum',
	'do_stat_pollcomment'	=> 'Anket yorum',
	'do_stat_pollvote'	=> 'Anket',
	'do_stat_eventcomment'	=> 'Etkinlik yorum',
	'do_stat_eventjoin'	=> 'Etkinlik katılım',
	'do_stat_sharecomment'	=> 'Paylaşım yorum',
//	'do_stat_post'		=> 'Mesajlar',
	'do_stat_click'		=> 'Rating',
	'do_stat_wall'		=> 'Duvar',
	'do_stat_poke'		=> 'Selam',
	'do_stat_sendpm'	=> 'Send PM',//'发短消息',
	'do_stat_addfriend'	=> 'Friend request',//'好友请求',
	'do_stat_friend'	=> 'Become friends',//'成为好友',
	'do_stat_post_number'	=> 'Mesaj sayısı',
	'do_stat_statistic'	=> 'Merged Statistics',//'合并统计',
	'logs_credit_update_TRC'	=> 'Task reward',//'任务奖励',
	'logs_credit_update_RTC'	=> 'Reward Topic',//'悬赏主题',
	'logs_credit_update_RAC'	=> 'Best Reply Award',//'最佳答案',
	'logs_credit_update_MRC'	=> 'Magic random get',//'道具随机获取',
	'logs_credit_update_BMC'	=> 'Buy magic',//'购买道具',
	'logs_credit_update_TFR'	=> 'Transfer return',//'转账转出',
	'logs_credit_update_RCV'	=> 'Transfer received',//'转账接收',
	'logs_credit_update_CEC'	=> 'Redeem Points',//'积分兑换',
	'logs_credit_update_ECU'	=> 'UCenter points Exchange Spending',//'UCenter积分兑换支出',
	'logs_credit_update_SAC'	=> 'Sale attachment',//'出售附件',
	'logs_credit_update_BAC'	=> 'Buy attachment',//'购买附件',
	'logs_credit_update_PRC'	=> 'Post was rated',//'帖子被评分',
	'logs_credit_update_RSC'	=> 'Rate Post',//'帖子评分',
	'logs_credit_update_STC'	=> 'Sold Topic',//'出售主题',
	'logs_credit_update_BTC'	=> 'Buy Topic',//'购买主题',
	'logs_credit_update_AFD'	=> 'Buy points',//'购买积分',//?????????
	'logs_credit_update_UGP'	=> 'Purchase Group access',//'购买扩展用户组',
	'logs_credit_update_RPC'	=> 'Report reward',//'举报奖惩',
	'logs_credit_update_ACC'	=> 'Participate in activities',//'参与活动',
	'logs_credit_update_RCT'	=> 'Create Replies award',//'回帖奖励',
	'logs_credit_update_RCA'	=> 'Replies winning',//'回帖中奖',
	'logs_credit_update_RCB'	=> 'Return Replies award',//'返还回帖奖励积分',
	'logs_credit_update_CDC'	=> 'Recharge card secret',//'卡密充值',

	'logs_credit_update_RGC'	=> 'Remove Gift',//'回收红包',
	'logs_credit_update_BGC'	=> 'Return Gift',//'埋下红包',
	'logs_credit_update_AGC'	=> 'Receive Gift',//'获得红包',
	'logs_credit_update_RKC'	=> 'Bid rank',//'竞价排名',
	'logs_select_operation'		=> 'Please select the operation type',//'请选择操作类型',
	'task_credit'			=> 'Task reward points',//'任务奖励积分',
	'special_3_credit'		=> 'Reward Topic points deduction',//'悬赏主题扣除积分',
	'special_3_best_answer'		=> 'Reward points get best answer',//'最佳答案获取悬赏积分',
	'magic_credit'			=> 'Magic random get points',//'道具随机获取积分',
	'magic_space_gift'		=> 'Own Space Home lay gift',//'在自已空间首页埋下红包',
	'magic_space_re_gift'		=> 'Return not run out gift',//'回收还没有用完的红包',
	'magic_space_get_gift'		=> 'Access to space to receive gift',//'访问空间领取的红包',
	'credit_transfer'		=> 'Transfer points',//'进行积分转帐',
	'credit_transfer_tips'		=> 'Income transfers',//'的转账收入',
	'credit_exchange_tips_1'	=> 'Perform the points exchange',//'执行积分对兑换操作,将 ',
	'credit_exchange_to'		=> 'Converted to',//'兑换成',
	'credit_exchange_center'	=> 'UCenter Exchange Points Center',//'通过UCenter兑换积分',
	'attach_sell'			=> 'Sell',//'出售',
	'attach_sell_tips'		=> 'Get points for attachments',//'的附件获得积分',
	'attach_buy'			=> 'Buy',//'购买',
	'attach_buy_tips'		=> 'Spent points for attachments',//'的附件支出积分',
	'grade_credit'			=> 'Points obtained by Rating',//'被评分获得的积分',
	'grade_credit2'			=> 'Posts rating deducted points',//'帖子评分扣除的积分',
	'thread_credit'			=> 'Get points for Topic access',//'主题获得积分',
	'thread_credit2'		=> 'Spent points for Topic access',//'主题支出积分',
	'buy_credit'			=> 'Recharge points',//'对积分充值',
	'buy_usergroup'			=> 'Spend points to buy Group access',//'购买扩展用户组支出积分',
	'report_credit'			=> 'Report function of rewards and punishments',//'举报功能中的奖惩',
	'join'				=> 'Join',//'参与',
	'activity_credit'		=> 'Activity points deducted',//'活动扣除积分',
	'thread_send'			=> 'Post thread deduct points',//'扣除发表',
	'replycredit'			=> 'Reply points',//'散发的积分',
	'add_credit'			=> 'Rewards Points',//'奖励积分',
	'recovery'			=> 'Recovery',//'回收',
	'replycredit_post'		=> 'Replies award',//'回帖奖励',
	'replycredit_thread'		=> 'Create thread points',//'散发的帖子',
	'card_credit'			=> 'Points obtained by recharge card',//'卡密充值获得的积分',
	'ranklist_top'			=> 'Spend points to participate in bid ranking',//'参加竞价排名消费积分',

	'profile_unchangeable'		=> 'Bu bilgiler yayınlandıktan sonra düzenlenemez',
	'profile_is_verifying'		=> 'Bu bilgiler gözden geçirilecektir',
	'profile_mypost'		=> 'Mesajlarım',
	'profile_need_verifying'	=> 'Bilgiler gözden geçirilmesi gerekmektedir.',
	'profile_edit'			=> 'Değiştir',
	'profile_censor'		=> '(Sansürlü kelimeler)',
	'profile_verify_modify_error'	=> '{verify} değiştirilemez',
	'profile_verify_verifying'	=> 'Your {verify} information has been submitted, please wait for verification.',//'您的{verify}信息已提交，请耐心等待核查。',

//'district_level_0'		=> '- Country -',//'-国家-',
	'district_level_1'		=> '-Ülke-',
	'district_level_2'		=> '-Şehir-',
	'district_level_3'		=> '-Ilçe-',
	'district_level_4'		=> '-Kasaba-',
	'invite_you_to_visit'		=> '{user} invite you to {bbname}',//'{user}邀请您访问{bbname}',

	'spacecp_message_prompt'	=> '(Destek {msg} kod,en fazla 1000 kelime)',
	'card_update_doing'		=> ' <a class="xi2" href="###">[Yenile]</a>',
	'email_acitve_message'		=> '<img src="{imgdir}/mail_inactive.png" alt="Doğrulanmamış" class="vm" />
						<span class="xi1">Yeni Email({newemail})Doğrulama bekliyor ...</span><br />
						Sistem email etkinleştirmek için size doğrulama maili gönderdi,Lütfen maillerinizi kontrol ediniz.<br>
						Eger doğrulama emaili almadıysanız, buradan tekrar talep edebilirsiniz.<a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">Yeniden doğrulama emaili</a>',

//	'do_stat_login'			=> 'Ziyaretçi',
);

