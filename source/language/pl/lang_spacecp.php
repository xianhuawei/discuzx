<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array(

	'by'			=> 'Accept by',//'通过',
	'tab_space'		=> ' ',

	'share'			=> 'Udostępnień',//'分享',
	'share_action'		=> 'shared',//'分享了',

	'pm_comment'		=> 'Reply message',//'答复点评',
	'pm_thread_about'	=> 'Dotyczy tematu "{subject}"',//'关于你在“{subject}”的帖子',

	'wall_pm_subject'	=> 'New wall message',//'您好，我给您留言了',
	'wall_pm_message'	=> 'Hi, you have a new message at your wall, [url=\\1]click here to view it[/url]',//'我在您的留言板给你留言了，[url=\\1]点击这里去留言板看看吧[/url]',
	'reward'		=> 'Reward',//'悬赏',
	'reward_info'		=> 'A vote get to you: + \\1 points.',//'参与投票可获得  \\1 积分',
	'poll_separator'	=> ', ',//'"、"',

	'pm_report_content'		=> '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a> zgłosił wiadomość:<br> Autor <a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a> wiadomość <br> Zawartość: {message}',//'<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a>举报短消息：<br>来自<a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a>的短消息<br>内容：{message}',
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
	'message_can_not_send_16'	=> 'You have exceeded the maximum number of PM within 24 hours',//'您超出了24小时内发短消息数量的上限',
	'message_can_not_send_onlyfriend'	=> 'The user can receive short message only from friends',//'该用户只接收好友发送的短消息',


	'friend_subject'	=> '<a href="{url}" target="_blank">{username} asked to add you to the friend list</a>',//'<a href="{url}" target="_blank">{username} 请求加你为好友</a>',
	'friend_request_note'	=> ', PS: {note}',//'，附言：{note}',
	'comment_friend'	=> '<a href="\\2" target="_blank">\\1 leave a message to you</a>',//'<a href="\\2" target="_blank">\\1 给你留言了</a>',
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 commented your image</a>',//'<a href="\\2" target="_blank">\\1 评论了你的照片</a>',
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 commented your blog</a>',//'<a href="\\2" target="_blank">\\1 评论了你的日志</a>',
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 commented your poll</a>',//'<a href="\\2" target="_blank">\\1 评论了你的投票</a>',
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 commented your share</a>',//'<a href="\\2" target="_blank">\\1 评论了你的分享</a>',
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 sent PM to you</a>',//'<a href="\\2" target="_blank">\\1 给你发私信了</a>',
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 sent greeting to you</a>',//'<a href="\\2" target="_blank">\\1 向你打招呼</a>',
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 replied to your group topic</a>',//'<a href="\\2" target="_blank">\\1 回复了你的话题</a>',
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 commented your event</a>',//'<a href="\\2" target="_blank">\\1 评论了你的活动</a>',

	'friend_pm_reply'	=> '\\1 replied to your private message',//'\\1 回复了你的私信',
	'comment_friend_reply'	=> '\\1 replied to your message',//'\\1 回复了你的留言',
	'blog_comment_reply'	=> '\\1 replied to your blog comment',//'\\1 回复了你的日志评论',
	'photo_comment_reply'	=> '\\1 replied to your image comment',//'\\1 回复了你的照片评论',
	'poll_comment_reply'	=> '\\1 replied to your poll comment',//'\\1 回复了你的投票评论',
	'share_comment_reply'	=> '\\1 replied to your share comment',//'\\1 回复了你的分享评论',
	'event_comment_reply'	=> '\\1 replied to your event comment',//'\\1 回复了你的活动评论',

	'mail_my'		=> 'Remind about interaction with my friends',//'好友与我的互动提醒',
	'mail_system'		=> 'System alerts',//'系统提醒',

	'invite_subject'	=> '{username} invited you to join the {sitename}, and become friends',//'{username}邀请您加入{sitename}，并成为好友',
	'invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi, I am {username}. I invite you to join the (sitename) and be my friend</h3><br>
				Please join to my friends, and you can understand my current situation, communicate with me, and contact with me at any time.<br>
				<br>
				Invite P.S.:<br>{saymsg}
				<br><br>
				<strong>Please click the link below to receive the Friend Invite:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>If you have an account at {sitename}, please click the following link to see my personal page:</strong><br>
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

	'person'		=> 'ludzie',//'人',
	'delete'		=> 'Usuń',//'删除',

	'space_update'		=> '{actor} zaktualizował profil',//'{actor} 被SHOW了一下',

	'active_email_subject'	=> 'Aktywacja Email',//'您的邮箱激活邮件',
	'active_email_msg'	=> 'Please copy the following link to your browser in order to activate your mailbox.<br>E-mail activation link:<br><a href="{url}" target="_blank">{url}</a>',//'请复制下面的激活链接到浏览器进行访问，以便激活你的邮箱。<br>邮箱激活链接:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space'		=> 'udostępnił profil',//'分享了一个用户',
	'share_blog'		=> 'udostępnił blog',//'分享了一篇日志',
	'share_album'		=> 'udostępnił album',//'分享了一个相册',
	'default_albumname'	=> 'Album domyślny',//'默认相册',
	'share_image'		=> 'udostępnił obrazek',//'分享了一张图片',
	'share_article'		=> 'udostępnił artykuł',//'分享了一篇文章',
	'album'			=> 'Albumy',//'相册',
	'share_thread'		=> 'udostępnił temat',//'分享了一个帖子',
	'mtag'			=> 'Grupy',
	'share_mtag'		=> 'Udostępnił grupę',
	'share_mtag_membernum'	=> 'zawiera (membernum) użytkowników',//'现有 {membernum} 名成员',
	'share_tag'		=> 'udostępnił tag',//'分享了一个标签',
	'share_tag_blognum'	=> 'used in {blognum} blogs',//'现有 {blognum} 篇日志',
	'share_link'		=> 'udostępnił link',//'分享了一个网址',
	'share_video'		=> 'udostępnił film',//'分享了一个视频',
	'share_music'		=> 'udostępnił muzykę',//'分享了一个音乐',
	'share_flash'		=> 'udostępnił aplikację flash',//'分享了一个 Flash',
	'share_event'		=> 'udostępnił wydarzenie',//'分享了一个活动',
	'share_poll'		=> 'udostępnił ankietę',//'分享了一个\\1投票',
	'event_time'		=> 'Czas',//'活动时间',
	'event_location'	=> 'Lokalizacja',//'活动地点',
	'event_creator'		=> 'Autor',//'发起人',
	'the_default_style'	=> 'Styl domyślny',//'默认风格',
	'the_diy_style'		=> 'Własny styl',//'自定义风格',

	'thread_edit_trail'		=> '<ins class="modify">[Edytowano przez \\1 dnia \\2]</ins>',//'<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',
	'create_a_new_album'		=> 'created a new album',//'创建了新相册',
	'not_allow_upload'		=> 'You have no permission to upload image',//'您现在没有权限上传图片',
	'not_allow_upload_extend'	=> 'It is not allowed to upload images of {extend} type',//'不允许上传{extend}类型的图片',
	'files_can_not_exceed_size'	=> '{extend} type files can not exceed the {size}',//'{extend}类文件不能超过{size}',
	'get_passwd_subject'		=> 'Recover password by email',//'取回密码邮件',
	'get_passwd_message'		=> 'You should use the link below to reset your password in 3 days:<br />\\1<br />If clicking the URL in this message does not work, just copy and paste it into the address bar of your browser.<br />At the page opened just enter your new password and submit. After this you can login with new password.',//'您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：<br />\\1<br />(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)<br />上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录了。',
	'file_is_too_big'		=> 'File is too large',//'文件过大',

	'take_part_in_the_voting'		=> '{actor} voted the {touser} poll  <a href="{url}" target="_blank">{subject}</a> and get reward {reward} points.',//'{actor} 参与了 {touser} 的{reward}投票 <a href="{url}" target="_blank">{subject}</a>',
	'lack_of_access_to_upload_file_size'	=> 'Unable to get uploaded file size',//'无法获取上传文件大小',
	'only_allows_upload_file_types'		=> 'Enabled to upload image file types: jpg,jpeg,gif,png',//'只允许上传jpg、jpeg、gif、png标准格式的图片',
	'unable_to_create_upload_directory_server'	=> 'Unable to create upload directory at the server',//'服务器无法创建上传目录',
	'inadequate_capacity_space'		=> 'Can not upload new attachments, insufficient space capacity.',//'空间容量不足，不能上传新附件',
	'mobile_picture_temporary_failure'	=> 'Can not move temporary files to specified server directory',//'无法转移临时文件到服务器指定目录',
	'ftp_upload_file_size'		=> 'Remote FTP upload failed (file size)',//'远程上传图片失败',
	'comment'			=> 'Comment',//'评论',
	'upload_a_new_picture'		=> 'uploaded new image',//'上传了新图片',
	'upload_album'			=> 'updated album',//'更新了相册',
	'the_total_picture'		=> 'Total \\1 images',//'共 \\1 张图片',

	'space_open_subject'	=> 'Come to your personal page and take care about it',//'快来打理一下您的个人主页吧',
	'space_open_message'	=> 'Hi, today I visited your personal page and found out you do not customize it. Take a look! The address is: \\1space.php',//'hi，我今天去拜访了一下您的个人主页，发现您自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',



	'apply_mtag_manager'	=> 'Want to be a moderator of the group <a href="\\1" target="_blank">\\2</a>. The reason:\\3 <br><a href="\\1" target="_blank">(click here to manage)</a>',//'想申请成为 <a href="\\1" target="_blank">\\2</a> 的群主，理由如下:\\3。<a href="\\1" target="_blank">(点击这里进入管理)</a>',


	'magicunit'		=> 'ones',//'个',
	'magic_note_wall'	=> 'left a message on your <a href="{url}" target="_blank">Wall</a>',//'在留言板上给你<a href="{url}" target="_blank">留言</a>',
	'magic_call'		=> 'mid-pointed your name in blog, <a href="{url}" target="_blank">click here to view</a>',//'在日志中点了你的名，<a href="{url}" target="_blank">快去看看吧</a>',


	'present_user_magics'	=> 'You have received the magic gift \\1 from administrator',//'您收到了管理员赠送的道具：\\1',
	'has_not_more_doodle'	=> 'You have no Graffiti.',//'您没有涂鸦板了',

	'do_stat_login'		=> 'Logowania',//'来访用户',
	'do_stat_mobilelogin'	=> 'Mobilne logowania',//'手机访问',
	'do_stat_connectlogin'	=> 'Logowania z użyciem QQ',//'QQ登录访问',
	'do_stat_register'	=> 'Rejestracje',//'新注册用户',
	'do_stat_invite'	=> 'Zaproszeń do znajomych',//'好友邀请',
	'do_stat_appinvite'	=> 'Zaproszeń do aplikacji',//'应用邀请',
	'do_stat_add'		=> 'Publikowane aktywności',//'信息发布',
	'do_stat_comment'	=> 'Komentarzy',//'信息互动',
	'do_stat_space'		=> 'Akcje użytkowników',//'用户互动',
	'do_stat_doing'		=> 'Aktywność',//'记录',
	'do_stat_blog'		=> 'Blogi',//'日志',
	'do_stat_activity'	=> 'Wydarzenia',//'活动',
	'do_stat_reward'	=> 'Nagrody',//'悬赏',
	'do_stat_debate'	=> 'Debat',//'辩论',
	'do_stat_trade'		=> 'Produktów',//'商品',
	'do_stat_group'		=> 'Grupy',//"创建{$_G[setting][navs][3][navname]}",
	'do_stat_tgroup'	=> 'Grupy',//"{$_G[setting][navs][3][navname]}",
	'do_stat_home'		=> 'Profilów',//"{$_G[setting][navs][4][navname]}",
	'do_stat_forum'		=> 'Forum',//"{$_G[setting][navs][2][navname]}",
	'do_stat_groupthread'	=> 'Tematów grup',//'群组主题',
	'do_stat_post'		=> 'Odpowiedzi',//'主题回复',
	'do_stat_grouppost'	=> 'Odpowiedzi grup',//'群组回复',
	'do_stat_pic'		=> 'Obrazków',//'图片',
	'do_stat_poll'		=> 'Ankiet',//'投票',
	'do_stat_event'		=> 'Wydarzeń',//'活动',
	'do_stat_share'		=> 'Udostępnień',//'分享',
	'do_stat_thread'	=> 'Tematów',//'主题',
	'do_stat_docomment'	=> 'Komentarze',//'记录回复',
	'do_stat_blogcomment'	=> 'Komentarze blogów',//'日志评论',
	'do_stat_piccomment'	=> 'Komentarze obrazków',//'图片评论',
	'do_stat_pollcomment'	=> 'Komentarze ankiet',//'投票评论',
	'do_stat_pollvote'	=> 'Głosów w ankietach',//'参与投票',
	'do_stat_eventcomment'	=> 'Komentarze wydarzeń',//'活动评论',
	'do_stat_eventjoin'	=> 'Dołączeń do wydarzeń',//'参加活动',
	'do_stat_sharecomment'	=> 'Udostępnień komentarzy',//'分享评论',
//vot	'do_stat_post'		=> 'Replies',//'主题回帖',
	'do_stat_click'		=> 'Przyklejonych',//'表态',
	'do_stat_wall'		=> 'Tablic',//'留言',
	'do_stat_poke'		=> 'Zaczepek',//'打招呼',
	'do_stat_sendpm'	=> 'Wiadomości',//'发短消息',
	'do_stat_addfriend'	=> 'Zaproszeń do znajomych',//'好友请求',
	'do_stat_friend'	=> 'Potwierdzonych znajomości',//'成为好友',
	'do_stat_post_number'	=> 'Postów',//'发帖量',
	'do_stat_statistic'	=> 'Scalone statystyki',//'合并统计',
	/*!*/	'logs_credit_update_INDEX'	=> array('TRC','RTC','RAC','MRC','BMC','TFR','RCV','CEC','ECU','SAC','BAC','PRC','RSC','STC','BTC','AFD','UGP','RPC','ACC','RCT','RCA','RCB','CDC','RGC','BGC','AGC','RKC','BME','RPR','RPZ','FCP','BGC'),
	'logs_credit_update_TRC'	=> 'Nagroda za zadanie',//'任务奖励',
	'logs_credit_update_RTC'	=> 'Nagroda za temat',//'悬赏主题',
	'logs_credit_update_RAC'	=> 'Nagroda za najlepszą odpowiedź',//'最佳答案',
	'logs_credit_update_MRC'	=> 'Otrzymanie magii',//'道具随机获取',
	'logs_credit_update_BMC'	=> 'Zakup magii',//'购买道具',
	'logs_credit_update_TFR'	=> 'Transfer return',//'转账转出',
	'logs_credit_update_RCV'	=> 'Transfer received',//'转账接收',
	'logs_credit_update_CEC'	=> 'Redeem Points',//'积分兑换',
	'logs_credit_update_ECU'	=> 'UCenter points Exchange Spending',//'UCenter积分兑换支出',
	'logs_credit_update_SAC'	=> 'Sprzedaż załącznika',//'出售附件',
	'logs_credit_update_BAC'	=> 'Zakup załącznika',//'购买附件',
	'logs_credit_update_PRC'	=> 'Post was rated',//'帖子被评分',
	'logs_credit_update_RSC'	=> 'Rate Post',//'帖子评分',
	'logs_credit_update_STC'	=> 'Sprzedaż tematu',//'出售主题',
	'logs_credit_update_BTC'	=> 'Zakup tematu',//'购买主题',
	'logs_credit_update_AFD'	=> 'Zakup punktów',//'购买积分',//?????????
	'logs_credit_update_UGP'	=> 'Zakup członkostwa grupy',//'购买扩展用户组',
	'logs_credit_update_RPC'	=> 'Nagroda za raport',//'举报奖惩',
	'logs_credit_update_ACC'	=> 'Uczestnictwo w aktywności',//'参与活动',
	'logs_credit_update_RCT'	=> 'Create Replies award',//'回帖奖励',
	'logs_credit_update_RCA'	=> 'Replies winning',//'回帖中奖',
	'logs_credit_update_RCB'	=> 'Return Replies award',//'返还回帖奖励积分',
	'logs_credit_update_CDC'	=> 'Recharge card secret',//'卡密充值',
	'logs_credit_update_RGC'	=> 'Usunięcie prezentu',//'回收红包',
	'logs_credit_update_BGC'	=> 'Return Gift',//'埋下红包',
	'logs_credit_update_AGC'	=> 'Otrzymanie prezentu',//'获得红包',
	'logs_credit_update_RKC'	=> 'Licytacja rangi',//'竞价排名',
	'logs_credit_update_BME'	=> 'Zakup medalu',//'购买勋章',
	'logs_credit_update_RPR'	=> 'Background points rewards and punishments',//'后台积分奖惩',
	'logs_credit_update_RPZ'	=> 'Background points rewards and punishments clean',//'后台积分奖惩清零',
	/*!*/	'logs_credit_update_FCP'	=> 'Zakup forum',//'付费版块',
	/*!*/	'logs_credit_update_BGR'	=> 'Stworzenie grupy',//'创建群组',
	/*!*/	'buildgroup'			=> 'View already built groups',//'查看已创建的群组',
	'logs_credit_update_reward_clean'	=> 'Wyczyść',//'清零',
	'logs_select_operation'		=> 'Proszę wybrać typ operacji',//'请选择操作类型',
	'task_credit'			=> 'Task reward points',//'任务奖励积分',
	'special_3_credit'		=> 'Reward Topic points deduction',//'悬赏主题扣除积分',
	'special_3_best_answer'		=> 'Reward points get best answer',//'最佳答案获取悬赏积分',
	'magic_credit'			=> 'Magic random get points',//'道具随机获取积分',
	'magic_space_gift'		=> 'Own Space red envelopes',//'在自已空间首页埋下红包',
	'magic_space_re_gift'		=> 'Gift recycling can not run for the red envelope',//'回收还没有用完的红包',
	'magic_space_get_gift'		=> 'Access to space to receive gift',//'访问空间领取的红包',
	'credit_transfer'		=> 'Transfer points',//'进行积分转帐',
	'credit_transfer_tips'		=> 'Income transfers',//'的转账收入',
	'credit_exchange_tips_1'	=> 'Perform the points exchange',//'执行积分对兑换操作,将 ',
	'credit_exchange_to'		=> 'Converted to',//'兑换成',
	'credit_exchange_center'	=> 'UCenter Exchange Points Center',//'通过UCenter兑换积分',
	'attach_sell'			=> 'Sprzedaj',//'出售',
	'attach_sell_tips'		=> 'Get points for attachments',//'的附件获得积分',
	'attach_buy'			=> 'Kup',//'购买',
	'attach_buy_tips'		=> 'Spent points for attachments',//'的附件支出积分',
	'grade_credit'			=> 'Points obtained by Rating',//'被评分获得的积分',
	'grade_credit2'			=> 'Posts rating deducted points',//'帖子评分扣除的积分',
	'thread_credit'			=> 'Get points for Topic access',//'主题获得积分',
	'thread_credit2'		=> 'Spent points for Topic access',//'主题支出积分',
	'buy_credit'			=> 'Recharge points',//'对积分充值',
	'buy_usergroup'			=> 'Spend points to buy Group access',//'购买扩展用户组支出积分',
	'buy_medal'			=> 'Buy Medal',//'购买勋章',
	/*!*/	'buy_forum'			=> 'Buy a paid forum access permissions',//'购买付费版块的访问权限',
	'report_credit'			=> 'Rewards and punishments report',//'举报功能中的奖惩',
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
	'admincp_op_credit'		=> 'Credit rewards and punishments operations',//'后台积分奖惩操作',
	'credit_update_reward_clean'	=> 'Clean',//'清零',

	'profile_unchangeable'		=> 'This information could not be edited after sumbit',//'此项资料提交后不可修改',
	'profile_is_verifying'		=> 'This information is verifying',//'此项资料正在审核中',
	'profile_mypost'		=> 'My postings',//'我提交的内容',
	'profile_need_verifying'	=> 'This information have to be verified',//'此项资料提交后需要审核',
	'profile_edit'			=> 'Edytuj',//'修改',
	'profile_censor'		=> '(cenzura)',//'（含有敏感词汇）',
	'profile_verify_modify_error'	=> 'The {verify} was certified. Modification is disabled.',//'{verify}已经认证通过不允许修改',
	'profile_verify_verifying'	=> 'Your {verify} information has been submitted, please wait for verification.',//'您的{verify}信息已提交，请耐心等待核查。',

	'district_level_1'		=> '- Lokalizacja -',//'-国家-',
	'district_level_2'		=> '- Region -',//'-省份-',
	'district_level_3'		=> '- Miasto -',//'-城市-',
	'district_level_4'		=> '- Kraj/Miejscowość -',//'-州县/乡镇-',
	'invite_you_to_visit'		=> '{user} zaprosił Cię do {bbname}',//'{user}邀请您访问{bbname}',
//vot	'district_level_0'		=> '- Lokalizacja -',//'-国家-',
	'portal'		=> 'Portal',//'门户',
	'group'			=> 'Grupy',//'群组',
	'follow'		=> 'Obserwowani',//'广播',
	'collection'		=> 'Kolekcja',//'淘帖',
	'guide'			=> 'Przewodnik',//'导读',
	'feed'			=> 'Aktywność',//'动态',
	'blog'			=> 'Blogi',//'日志',
	'doing'			=> 'Aktywność',//'记录',
	'wall'			=> 'Tablica',//'留言板',
	'homepage'		=> 'Personal Space',//'个人主页',
	'ranklist'		=> 'Ranking',//'排行榜',
	'select_the_navigation_position'	=> 'Select {type} navigation position',//'选择{type}导航位置',
	'close_module'		=> 'Close the {type} module',//'关闭{type}功能',

	'follow_add_remark'		=> 'Add remark',//'添加备注',
	'follow_modify_remark'		=> 'Edit remark',//'修改备注',
	'follow_specified_group'	=> 'Specyficzna grupa dla obserwowanych',//'广播专区',
	'follow_specified_forum'	=> 'Specyficzne forum dla obserwowanych',//'广播专版',

	'filesize_lessthan'		=> 'File size should be less than ',//'文件大小应该小于',

	'spacecp_message_prompt'	=> '(wspierany kod {msg}, maks. 1000 znaków)',//'(支持 {msg} 代码,最大 1000 字)',
	'card_update_doing'		=> ' <a class="xi2" href="###">[Zmień]</a>',//' <a class="xi2" href="###">[更新记录]</a>',
	'email_acitve_message'		=> '<img src="{imgdir}/mail_inactive.png" alt="Unverified" class="vm" />
						<span class="xi1">Email ({newemail}) oczekuje na aktywację ...</span><br />
						System wysłał na podany adres E-Mail wiadomość, w której znajdziesz informacje dotyczące aktywacji konta.<br>
						Jeśli nie otrzymałeś wiadomości z aktywacją konta, możesz zmienić adres E-Mail lub poprosić o <a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">ponowną aktywację konta</a>.',
	'qq_set_status'		=> 'Ustaw status QQ online',//'设置我的QQ在线状态',
	'qq_dialog'		=> 'Rozpocznij czat w QQ',//'发起QQ聊天',

);

