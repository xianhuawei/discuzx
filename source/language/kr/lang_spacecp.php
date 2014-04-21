<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array(

	'by'			=> '통과',//'通过',
	'tab_space'		=> ' ',

	'share'			=> '공유',//'分享',
	'share_action'		=> '공유 하셨습니다.',//'分享了',

	'pm_comment'		=> '리필 논평',//'答复点评',
	'pm_thread_about'	=> '님의 "{subject}" 에 대한 글',//'关于你在“{subject}”的帖子',

	'wall_pm_subject'	=> '안녕하세요, 님께 메모를 남겼습니다.',//'您好，我给您留言了',
	'wall_pm_message'	=> '님의 방명록에 메모를 남겼습니다, [url=\\1]이곳을 클릭하여 메모를 보세요[/url]',
	'reward'		=> '포상',//'悬赏',
	'reward_info'		=> '투표에 참여하시면 \\1 포인트를 얻을수 있습니다.',//'参与投票可获得  \\1 积分',
	'poll_separator'	=> ', ',//'"、"',

	'pm_report_content'		=> '<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a> 신고문자:<br><a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a> 에게서 온 문자<br>내용: {message}',//'<a href="home.php?mod=space&uid={reporterid}" target="_blank">{reportername}</a>举报短消息：<br>来自<a href="home.php?mod=space&uid={uid}" target="_blank">{username}</a>的短消息<br>内容：{message}',
	'message_can_not_send_1'	=> '발송실패.24시간내 2명채팅 상한선을 초과 하셨습니다.',//'发送失败，您当前超出了24小时内两人会话的上限',
	'message_can_not_send_2'	=> '글문연속 발송 시간 간격 늦게 해주세요.',//'两次发送短消息太快，请稍候再发送',
	'message_can_not_send_3'	=> '죄송합니다. 친구가아닌 분에게 글문대량 발송이 불가합니다.',//'抱歉，您不能给非好友批量发送短消息',
	'message_can_not_send_4'	=> '죄송합니다. 님은아직 글문발송 기능 사용 불가합니다.',//'抱歉，您目前还不能使用发送短消息功能',
	'message_can_not_send_5'	=> '24시간내 그룹채팅 상한선을 초과 하셨습니다.',//'您超出了24小时内群聊会话的上限',
	'message_can_not_send_6'	=> '상대방이 님의 글문수락을 차단 하셧습니다',//'对方屏蔽了您的短消息',
	'message_can_not_send_7'	=> '그룹채팅 허용인수를 초과 하셨습니다.',//'超过了群聊人数上限',
	'message_can_not_send_8'	=> '죄송합니다. 자신에게는 글문 발송이 불가합니다.',//'抱歉，您不能给自己发短消息',
	'message_can_not_send_9'	=> '수신자가 없거나 상대방이 님의 글문수락을 차단 하셨습니다.',//'收件人为空或对方屏蔽了您的短消息',
	'message_can_not_send_10'	=> '그룹채팅 인수는 2명이상 이여야 합니다.',//'发起群聊人数不能小于两人',
	'message_can_not_send_11'	=> '대화가 존재하지 않습니다.',//'该会话不存在',
	'message_can_not_send_12'	=> '죄송합니다. 조작권한이 없습니다.',//'抱歉，您没有权限操作',
	'message_can_not_send_13'	=> '그룹채팅내용이 아닙니다.',//'这不是群聊消息',
	'message_can_not_send_14'	=> '비밀내용이 아닙니다.',//'这不是私人消息',
	'message_can_not_send_15'	=> '데이터 오류입니다.',//'数据有误',
	'message_can_not_send_16'	=> '24시간내 글문 발송 허용수량을 초과 하셨습니다.',//'您超出了24小时内发短消息数量的上限',
	'message_can_not_send_onlyfriend'	=> '상대방은 친구 글문만 받습니다.',//'该用户只接收好友发送的短消息',


	'friend_subject'	=> '<a href="{url}" target="_blank">{username} 님을 친구추가 하셨습니다.</a>',//'<a href="{url}" target="_blank">{username} 请求加你为好友</a>',
	'friend_request_note'	=> ', PS: {note}',//'，附言：{note}',
	'comment_friend'	=> '<a href="\\2" target="_blank">\\1 님에게 글문를 남겼습니다.</a>',//'<a href="\\2" target="_blank">\\1 给你留言了</a>',
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 님의 이미지에 대해 평론 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 评论了你的照片</a>',
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 님의 블로그를 평론 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 评论了你的日志</a>',
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 님의 투표를 평론 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 评论了你的投票</a>',
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 님의 공유를 평론 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 评论了你的分享</a>',
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 님에게 비밀글문를 발송했습니다.</a>',//'<a href="\\2" target="_blank">\\1 给你发私信了</a>',
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 님에게 인사를 사셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 向你打招呼</a>',
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 님의 글에 답변을 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 回复了你的话题</a>',
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 님의 이벤트를 평론 하셨습니다.</a>',//'<a href="\\2" target="_blank">\\1 评论了你的活动</a>',

	'friend_pm_reply'	=> '\\1 님의 비밀글문에 답변 하셨습니다.',//'\\1 回复了你的私信',
	'comment_friend_reply'	=> '\\1 님의 글문에 답변 하셨습니다.',//'\\1 回复了你的留言',
	'blog_comment_reply'	=> '\\1 님의 블로그평론에 답변 하셨습니다.',//'\\1 回复了你的日志评论',
	'photo_comment_reply'	=> '\\1 님의 이미지평론에 답변 하셨습니다.',//'\\1 回复了你的照片评论',
	'poll_comment_reply'	=> '\\1 님의 투표평론에 답변 하셨습니다.',//'\\1 回复了你的投票评论',
	'share_comment_reply'	=> '\\1 님의 공유평론에 답변 하셨습니다.',//'\\1 回复了你的分享评论',
	'event_comment_reply'	=> '\\1 님의 이벤트평론에 답변 하셨습니다.',//'\\1 回复了你的活动评论',

	'mail_my'		=> '친구와의 연락 통지서.',//'好友与我的互动提醒',
	'mail_system'		=> '시스템 통지서.',//'系统提醒',

	'invite_subject'	=> '{username} 가 님을 {sitename} 에 가입요청 및 친구추가 원합니다.',//'{username}邀请您加入{sitename}，并成为好友',
	'invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi, 저는 {username} 입니다. (sitename) 에 가입하셔서 친구가 되기를 원합니다. </h3><br>
				친추 하시면 저의 최근 상황을 아실수 있고 대화도 나누며 수시로 연락하실수 있습니다..<br>
				<br>
				초대P.S.:<br>{saymsg}
				<br><br>
				<strong>아래 링크를 클릭하셔서 친구추가 요청을 수락하시면 됩니다:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>{sitename} 계정 있으시면 , 아래 링크를 클릭하셔서 저의 홈페이지를 보실수 있습니다:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'app_invite_subject'	=> '{username}님이 귀하를 {sitename} 에 가입여 같이 {appname}즐기기를 원합니다. ',//'{username}邀请您加入{sitename}，一起来玩{appname}',
	'app_invite_massage'	=> '<table border="0">
				<tr>
				<td valign="top">{avatar}</td>
				<td valign="top">
				<h3>Hi, 저는 {username} 입니다. {sitename}에서 {appname}즐기고 있습니다. 님도 가입하셔서 같이 즐기기를 원합니다.</h3><br>
				<br>
				초대P.S.:<br>
				{saymsg}
				<br><br>
				<strong>아래 링크를 클릭하셔서 친구추가 수락하셔서 같이 {appname} 즐겨요:</strong><br>
				<a href="{inviteurl}">{inviteurl}</a><br>
				<br>
				<strong>{sitename} 계정 있으시면, 아래 링크를 클릭하셔서 저의 홈페이지를 보실수 있습니다:</strong><br>
				<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
				</td></tr></table>',

	'person'		=> '명',//'人',
	'delete'		=> '삭제',//'删除',

	'space_update'		=> '{actor} SHOW 받았습니다.',//'{actor} 被SHOW了一下',

	'active_email_subject'	=> '이메일 활성화용 메일.',//'您的邮箱激活邮件',
	'active_email_msg'	=> '메일주소 사용 가능여부 확인을 위해 다음 링크를 브라우저에 카피하여 방문바랍니다.<br>E-mail 활성화 링크:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space'		=> '사용자 한명을 공유 하셨습니다.',//'分享了一个用户',
	'share_blog'		=> '홈피의 포스트를 공유 하셨습니다.',//'分享了一篇日志',
	'share_album'		=> '앨범을 공유 하셨습니다.',//'分享了一个相册',
	'default_albumname'	=> '기본앨범',//'默认相册',
	'share_image'		=> '이미지를 공유 하셨습니다.',//'分享了一张图片',
	'share_article'		=> '문장 한편을 공유 하셨습니다.',//'分享了一篇文章',
	'album'			=> '앨범',//'相册',
	'share_thread'		=> '글 한편을 공유 하셨습니다.',//'分享了一个帖子',
	'mtag'			=> 'Groups',
	'share_mtag'		=> 'Share the group',
	'share_mtag_membernum'	=> '지금 (membernum) 명의 맴버가 있습니다.',//'现有 {membernum} 名成员',
	'share_tag'		=> '태그 공유 하셨습니다.',//'分享了一个标签',
	'share_tag_blognum'	=> '지금 {blognum} 편의 포스트가 있습니다.',//'现有 {blognum} 篇日志',
	'share_link'		=> '인터넷 주소를 공유 하셨습니다.',//'分享了一个网址',
	'share_video'		=> '동영상을 공유 하셨습니다.',//'分享了一个视频',
	'share_music'		=> '음악을 공유 하셨습니다.',//'分享了一个音乐',
	'share_flash'		=> '플래쉬를 공유 하셨습니다.',//'分享了一个 Flash',
	'share_event'		=> '이벤트를 공유 하셨습니다.',//'分享了一个活动',
	'share_poll'		=> '투표공유\\1',//'分享了一个\\1投票',
	'event_time'		=> '이벤트 시간',//'活动时间',
	'event_location'	=> '이벤트 지점',//'活动地点',
	'event_creator'		=> '발기인',//'发起人',
	'the_default_style'	=> '기본스타일',//'默认风格',
	'the_diy_style'		=> '개인정의 스타일',//'自定义风格',

	'thread_edit_trail'		=> '<ins class="modify">[ 본 테마는 \\1님이 \\2에 편집 하셨습니다.]</ins>',//'<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',
	'create_a_new_album'		=> '신 앨범 생성',//'创建了新相册',
	'not_allow_upload'		=> '님은 아직 이미지 업로드 권한이 없습니다.',//'您现在没有权限上传图片',
	'not_allow_upload_extend'	=> '{extend}류의 이미지 업로드 불가 합니다.',//'不允许上传{extend}类型的图片',
	'files_can_not_exceed_size'	=> '{extend}류의 파일은 {size} 초과 불가 합니다.',//'{extend}类文件不能超过{size}',
	'get_passwd_subject'		=> '비번찾기 메일',//'取回密码邮件',
	'get_passwd_message'		=> '요청발송후 3일내에 다음 링크클릭을 통하여 비번을 재 설정 할수 있습니다:<br />\\1<br />(위 주소가 링크 형식이 아니라면 수동으로 브라우저에 주소를 카피하여 방문 바랍니다.)<br />위 링크주소 페이지에서 최신 비번을 입력등록 하신후 설정하신 비번으로 계정 로그인 가능합니다.',
	'file_is_too_big'		=> '파일이 너무 큽니다.',//'文件过大',

	'take_part_in_the_voting'		=> '{actor}는 {touser}의 투표에 참여 하셨습니다. <a href="{url}" target="_blank">{subject}</a> and get reward {reward} points.',//'{actor} 参与了 {touser} 的{reward}投票 <a href="{url}" target="_blank">{subject}</a>',
	'lack_of_access_to_upload_file_size'	=> '업로드 하신 파일크기 확인이 안됩니다.',//'无法获取上传文件大小',
	'only_allows_upload_file_types'		=> 'jpg,jpeg,gif,png 표준형식의 이미지만 업로드 가능합니다.',//'只允许上传jpg、jpeg、gif、png标准格式的图片',
	'unable_to_create_upload_directory_server'	=> '서버가 업로드 하신 목록을 생성할수 없습니다.',//'服务器无法创建上传目录',
	'inadequate_capacity_space'		=> '서버용량이 부족하여 새로운 첨부파일 업로드가 불가 합니다.',//'空间容量不足，不能上传新附件',
	'mobile_picture_temporary_failure'	=> '임시파일을 지정하신 서버목록으로 이동이 불가 합니다.',//'无法转移临时文件到服务器指定目录',
	'ftp_upload_file_size'		=> '원격파일 업로드를 실패 하셨습니다.',//'远程上传图片失败',
	'comment'			=> '평론',//'评论',
	'upload_a_new_picture'		=> '새로운 이미지를 업로드 하셨습니다.',//'上传了新图片',
	'upload_album'			=> '앨범을 업그레이드 하셨습니다.',//'更新了相册',
	'the_total_picture'		=> '총 \\1 장 이미지.',//'共 \\1 张图片',

	'space_open_subject'	=> '개인 홈페이지를 너무 오래동안 관리하시지 않으셨습니다.',//'快来打理一下您的个人主页吧',
	'space_open_message'	=> 'Hi, 님의 홈페이지를 방문했었는데 너무 오래동안 정리를 않하셨네요, 확인 해보세요: \\1space.php',//'hi，我今天去拜访了一下您的个人主页，发现您自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',



	'apply_mtag_manager'	=> ' <a href="\\1" target="_blank">\\2</a> 의 회장이 되길 원합니다. 그 이유는:\\3 <br><a href="\\1" target="_blank">(이곳을 체크하셔서 관리)</a>',//'想申请成为 <a href="\\1" target="_blank">\\2</a> 的群主，理由如下:\\3。<a href="\\1" target="_blank">(点击这里进入管理)</a>',


	'magicunit'		=> 'ones',//'个',
	'magic_note_wall'	=> '방명록에 <a href="{url}" target="_blank">메모 남기기</a>',//'在留言板上给你<a href="{url}" target="_blank">留言</a>',
	'magic_call'		=> '포스트중에서 님의 이름이 떳습니다, <a href="{url}" target="_blank">바로보기</a>',//'在日志中点了你的名，<a href="{url}" target="_blank">快去看看吧</a>',


	'present_user_magics'	=> '관리자가 증정하신 아이템 \\1 을 받으셨습니다.',//'您收到了管理员赠送的道具：\\1',
	'has_not_more_doodle'	=> '그라피티 판 이 없습니다.',//'您没有涂鸦板了',

	'do_stat_login'		=> '방문자',//'来访用户',
	'do_stat_mobilelogin'	=> '모바일 방문',//'手机访问',
	'do_stat_connectlogin'	=> 'QQ등록',//'QQ登录访问',
	'do_stat_register'	=> '새로 등록하신 사용자',//'新注册用户',
	'do_stat_invite'	=> '친구초대',//'好友邀请',
	'do_stat_appinvite'	=> '초대사용',//'应用邀请',
	'do_stat_add'		=> '정보발포',//'信息发布',
	'do_stat_comment'	=> '정보소통',//'信息互动',
	'do_stat_space'		=> '사용자소통',//'用户互动',
	'do_stat_doing'		=> '기록4',//'记录',
	'do_stat_blog'		=> '포스트',//'日志',
	'do_stat_activity'	=> '이벤트',//'活动',
	'do_stat_reward'	=> '포상',//'悬赏',
	'do_stat_debate'	=> '변론',//'辩论',
	'do_stat_trade'		=> '상품',//'商品',
	'do_stat_group'		=> 'Groups',//"创建{$_G[setting][navs][3][navname]}",
	'do_stat_tgroup'	=> 'Groups',//"{$_G[setting][navs][3][navname]}",
	'do_stat_home'		=> 'Space',//"{$_G[setting][navs][4][navname]}",
	'do_stat_forum'		=> 'Forum',//"{$_G[setting][navs][2][navname]}",
	'do_stat_groupthread'	=> '그룹테마',//'群组主题',
	'do_stat_post'		=> '테마답변',//'主题回复',
	'do_stat_grouppost'	=> '그룹답변',//'群组回复',
	'do_stat_pic'		=> '이미지',//'图片',
	'do_stat_poll'		=> '투표',//'投票',
	'do_stat_event'		=> '이벤트',//'活动',
	'do_stat_share'		=> '공유',//'分享',
	'do_stat_thread'	=> '덧글',//'主题',
	'do_stat_docomment'	=> '기록리필',//'记录回复',
	'do_stat_blogcomment'	=> '포스트 논평',//'日志评论',
	'do_stat_piccomment'	=> '이미지 논평',//'图片评论',
	'do_stat_pollcomment'	=> '투표 논평',//'投票评论',
	'do_stat_pollvote'	=> '투표 참석',//'参与投票',
	'do_stat_eventcomment'	=> '이벤트 논평',//'活动评论',
	'do_stat_eventjoin'	=> '이벤트 참석',//'参加活动',
	'do_stat_sharecomment'	=> '공유 논평',//'分享评论',
//vot	'do_stat_post'		=> 'Replies',//'主题回帖',
	'do_stat_click'		=> '정적',//'表态',
	'do_stat_wall'		=> '메세지',//'留言',
	'do_stat_poke'		=> '인사',//'打招呼',
	'do_stat_sendpm'	=> '글문',//'发短消息',
	'do_stat_addfriend'	=> '친구요청',//'好友请求',
	'do_stat_friend'	=> '친구되기',//'成为好友',
	'do_stat_post_number'	=> '게시글 수',//'发帖量',
	'do_stat_statistic'	=> '합병통계',//'合并统计',
	'logs_credit_update_TRC'	=> '미션 보상',//'任务奖励',
	'logs_credit_update_RTC'	=> '포상덧글',//'悬赏主题',
	'logs_credit_update_RAC'	=> '최적답',//'最佳答案',
	'logs_credit_update_MRC'	=> '아이템 랜덤 얻기',//'道具随机获取',
	'logs_credit_update_BMC'	=> '아이템 구매',//'购买道具',
	'logs_credit_update_TFR'	=> '이체',//'转账转出',
	'logs_credit_update_RCV'	=> '수락',//'转账接收',
	'logs_credit_update_CEC'	=> '포인트 교환',//'积分兑换',
	'logs_credit_update_ECU'	=> 'UCenter 포인트 교환 지출',//'UCenter积分兑换支出',
	'logs_credit_update_SAC'	=> '첨부파일 판매',//'出售附件',
	'logs_credit_update_BAC'	=> '첨부파일 구매',//'购买附件',
	'logs_credit_update_PRC'	=> '게시물이 채점되였음.',//'帖子被评分',
	'logs_credit_update_RSC'	=> '게시물 채점',//'帖子评分',
	'logs_credit_update_STC'	=> '덧글 판매',//'出售主题',
	'logs_credit_update_BTC'	=> '덧글 구매',//'购买主题',
	'logs_credit_update_AFD'	=> '포인트 구매',//'购买积分',//?????????
	'logs_credit_update_UGP'	=> '확장 사용자 그룹 구매',//'购买扩展用户组',
	'logs_credit_update_RPC'	=> '신고상벌',//'举报奖惩',
	'logs_credit_update_ACC'	=> '활동에 참여',//'参与活动',
	'logs_credit_update_RCT'	=> '리필 보상',//'回帖奖励',
	'logs_credit_update_RCA'	=> '리필 당첨',//'回帖中奖',
	'logs_credit_update_RCB'	=> '리필보상 포인트를 반환',//'返还回帖奖励积分',
	'logs_credit_update_CDC'	=> '카드비번으로 충전',//'卡密充值',
	'logs_credit_update_RGC'	=> '금일봉 회수',//'回收红包',
	'logs_credit_update_BGC'	=> '금일봉 묻기',//'埋下红包',
	'logs_credit_update_AGC'	=> '금일봉 취득',//'获得红包',
	'logs_credit_update_RKC'	=> '입찰 순위',//'竞价排名',
	'logs_credit_update_BME'	=> '훈장구매',//'购买勋章',
	'logs_credit_update_RPR'	=> '관리중심 포인트 상벌',//'后台积分奖惩',
	'logs_credit_update_RPZ'	=> '관리중심 포인트 상벌 0으로',//'后台积分奖惩清零',
	'logs_credit_update_reward_clean'	=> '0으로',//'清零',
	'logs_select_operation'		=> '작업유형을 선택하세요.',//'请选择操作类型',
	'task_credit'			=> ' 미션 보상 포인트',//'任务奖励积分',
	'special_3_credit'		=> '포상 덧글 포인트 차감',//'悬赏主题扣除积分',
	'special_3_best_answer'		=> '베시트 리필 포상포인트 획득',//'最佳答案获取悬赏积分',
	'magic_credit'			=> '아이템 랜덤 포인트 획득',//'道具随机获取积分',
	'magic_space_gift'		=> '개인 공간 홈피에 금일봉 묻기',//'在自已空间首页埋下红包',
	'magic_space_re_gift'		=> '다 사용하지 못한 금일봉 회수',//'回收还没有用完的红包',
	'magic_space_get_gift'		=> '공간 방문으로 얻은 금일봉',//'访问空间领取的红包',
	'credit_transfer'		=> '포인트 이체',//'进行积分转帐',
	'credit_transfer_tips'		=> '의 이체 수입',//'的转账收入',
	'credit_exchange_tips_1'	=> '포인트 교환 조작 집행.',//'执行积分对兑换操作,将 ',
	'credit_exchange_to'		=> 'Converted to',//'兑换成',
	'credit_exchange_center'	=> 'UCenter으로 포인트 교환',//'通过UCenter兑换积分',
	'attach_sell'			=> '판매',//'出售',
	'attach_sell_tips'		=> '의 첨부파일로 얻은 포인트',//'的附件获得积分',
	'attach_buy'			=> '구매',//'购买',
	'attach_buy_tips'		=> '의 첨부파일로 지출 포인트',//'的附件支出积分',
	'grade_credit'			=> '채점받아 얻은 포인트',//'被评分获得的积分',
	'grade_credit2'			=> '게시물 평가로 차감된 포인트',//'帖子评分扣除的积分',
	'thread_credit'			=> '덧글로 얻은 포인트',//'主题获得积分',
	'thread_credit2'		=> '덧글로 지출된 포인트',//'主题支出积分',
	'buy_credit'			=> '포인트 충전',//'对积分充值',
	'buy_usergroup'			=> '확장 사용그룹 구매로 지출된 포인트',//'购买扩展用户组支出积分',
	'buy_medal'			=> '훈장 구매',//'购买勋章',
	'report_credit'			=> '신고공능중의 상벌',//'举报功能中的奖惩',
	'join'				=> '참여',//'参与',
	'activity_credit'		=> '활동 포인트 차감',//'活动扣除积分',
	'thread_send'			=> 'Post thread deduct points',//'扣除发表',
	'replycredit'			=> 'Reply points',//'散发的积分',
	'add_credit'			=> '보상 포인트',//'奖励积分',
	'recovery'			=> '회수',//'回收',
	'replycredit_post'		=> '리필 보상',//'回帖奖励',
	'replycredit_thread'		=> 'Create thread points',//'散发的帖子',
	'card_credit'			=> '충전카드로 얻은 포인트',//'卡密充值获得的积分',
	'ranklist_top'			=> '입찰순위 참여에 소비된 포인트',//'参加竞价排名消费积分',
	'admincp_op_credit'		=> '관리중심 포인트 상벌 조작',//'后台积分奖惩操作',
	'credit_update_reward_clean'	=> '삭제',//'清零',

	'profile_unchangeable'		=> '이 내용은 제출후 수정 불가 합니다.',//'此项资料提交后不可修改',
	'profile_is_verifying'		=> '이 내용은 심사 중입니다.',//'此项资料正在审核中',
	'profile_mypost'		=> '이미 제출한 내용',//'我提交的内容',
	'profile_need_verifying'	=> '이 내용은 제출후 심사진행이 있습니다.',//'此项资料提交后需要审核',
	'profile_edit'			=> '수정',//'修改',
	'profile_censor'		=> '(금지단어 포함)',//'（含有敏感词汇）',
	'profile_verify_modify_error'	=> '{verify} 이미 인증에 통과 되였음으로 수정 불가 합니다.',//'{verify}已经认证通过不允许修改',
	'profile_verify_verifying'	=> '귀하의 {verify} 정보는 이미 제출되였습니다.심사통과를 기다려 주세요.',//'您的{verify}信息已提交，请耐心等待核查。',

	'district_level_1'		=> '- 국가 -',//'-国家-',
	'district_level_2'		=> '- 도 -',//'-省份-',
	'district_level_3'		=> '- 시 -',//'-城市-',
	'district_level_4'		=> '- 지역/지방 -',//'-州县/乡镇-',
	'invite_you_to_visit'		=> '{user}님이 {bbname} 방문 초대합니다.',//'{user}邀请您访问{bbname}',
//vot	'district_level_0'		=> '- Country -',//'-国家-',
	'portal'		=> '포털',//'门户',
	'group'			=> '그룹',//'群组',
	'follow'		=> '팔로우',//'广播',
	'collection'		=> '파트리',//'淘帖',
	'guide'			=> '가이드',//'导读',
	'feed'			=> '동향',//'动态',
	'blog'			=> '포스트',//'日志',
	'doing'			=> '기록3',//'记录',
	'wall'			=> '방명록',//'留言板',
	'homepage'		=> '개인홈피',//'个人主页',
	'ranklist'		=> '순위666',//'排行榜',
	'select_the_navigation_position'	=> '{type} 네비게이션 위치 선택.',//'选择{type}导航位置',
	'close_module'		=> '{type} 기능 정지',//'关闭{type}功能',

	'follow_add_remark'		=> '비고추가',//'添加备注',
	'follow_modify_remark'		=> '비고수정',//'修改备注',
	'follow_specified_group'	=> '팔로우전문구역',//'广播专区',
	'follow_specified_forum'	=> '팔로우전문포럼',//'广播专版',

	'filesize_lessthan'		=> '파이크기는 작기',//'文件大小应该小于',

	'spacecp_message_prompt'	=> '({msg} 코드를 지원, 최대 1000 자.)',//'(支持 {msg} 代码,最大 1000 字)',
	'card_update_doing'		=> ' <a class="xi2" href="###">[업그레이드 기록]</a>',//' <a class="xi2" href="###">[更新记录]</a>',
	'email_acitve_message'		=> '<img src="{imgdir}/mail_inactive.png" alt="미인증" class="vm" />
						<span class="xi1">New E-mail ({newemail}) 인증대기중 ...</span><br />
						시스템은 이미 위 메일주소로 메일활성화 인증용 메일을 발송하였으니 확인하시고 인증받으시길 바랍니다.<br>
						인증용 메일을 받지 못하셨다면 메일주소를 교체하시거나 <a href="home.php?mod=spacecp&ac=profile&op=password&resend=1" class="xi2">인증용 메일을 재 발송하세요.</a>',
	'qq_set_status'		=> 'I set my QQ online status',//'设置我的QQ在线状态',
	'qq_dialog'		=> 'Start QQ chat',//'发起QQ聊天',

);

