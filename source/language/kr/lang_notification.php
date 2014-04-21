<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 *	Translated to Korean by ionobgy
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'type_wall'		=> '메모남기기',//'留言',
	'type_piccomment'	=> '이미지 평론',//'图片评论',
	'type_blogcomment'	=> '블로그 평론',//'日志评论',
	'type_clickblog'	=> '블로그입장',//'日志表态',
	'type_clickarticle'	=> '문장입장',//'文章表态',
	'type_clickpic'		=> '이미지입장',//'图片表态',
	'type_sharecomment'	=> '평론공유',//'分享评论',
	'type_doing'		=> '기록6',//'记录',
	'type_friend'		=> '친구',//'好友',
	'type_credit'		=> '포인트',//'积分',
	'type_bbs'		=> '포럼',//'论坛',
	'type_system'		=> '시스템',//'系统',
	'type_thread'		=> '테마',//'主题',
	'type_task'		=> '미션',//'任务',
	'type_group'		=> '그룹',//'群组',

	'mail_to_user'		=> '신 통지서.',
	'showcredit'		=> '{actor} 님이 귀하에게 {credit} 입찰포인트를 주셔서<a href="misc.php?mod=ranklist&type=member" target="_self">경매순의</a>에서의 순위를 올리는데 도움주셨음.',
	'share_space'		=> '{actor} 님이 귀하의 개인홈피를 공유하셨음.',
	'share_blog'		=> '{actor} 님이 귀하의 블로그 <a href="{url}" target="_self">{subject}</a>를/을 공유함',
	'share_album'		=> '{actor} 님이 귀하의 앨범 <a href="{url}" target="_self">{albumname}</a>를/을 공유함',
	'share_pic'		=> '{actor} 님이 귀하의 {albumname} 앨범 중 <a href="{url}" target="_self">이미지</a>를/을 공유함',
	'share_thread'		=> '{actor} 님이 귀하의 글: <a href="{url}" target="_self">{subject}</a>를/을 공유함',
	'share_article'		=> '{actor} 님이 귀하의 문장: <a href="{url}" target="_self">{subject}</a>를/을 공유함',
	'magic_present_note'	=> '귀하에게 아이템 <a href="{url}" target="_self">{name}</a>를/을 선물함',
	'friend_add'		=> '{actor} 님과 친구가 되었습니다.',
	'friend_request'	=> '{actor} 님이 친구요청 하셨습니다{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">수락</a>',
	'doing_reply'		=> '{actor} 님이 귀하의 <a href="{url}" target="_self">토막글</a>에 답변을 하셨음.',
	'wall_reply'		=> '{actor} 님이 귀하가 남긴<a href="{url}" target="_self">메모</a>에 답변을 하셨음.',
	'pic_comment_reply'	=> '{actor} 님이 귀하의 <a href="{url}" target="_self">사진평론</a>에 답변을 하셨음.',
	'blog_comment_reply'	=> '{actor} 님이 귀하의 <a href="{url}" target="_self">블로그 댓글</a>에 리필을 남김',
	'share_comment_reply'	=> '{actor} 님이 귀하의 <a href="{url}" target="_self">공유 댓글</a>에 리필을 남김',
	'wall'			=> '{actor} 님이 귀하의 <a href="{url}" target="_self">방명록</a>에 메세지를 남김',
	'pic_comment'		=> '{actor} 남이 당신의 <a href="{url}" target="_self">사진</a>에 댓글을 남김',
	'blog_comment'		=> '{actor} 님이 귀하의 블로그 <a href="{url}" target="_self">{subject}</a>에 댓글을 남김',
	'share_comment'		=> '{actor} 님이 귀하의  <a href="{url}" target="_self">공유</a>에 댓글을 남김',
	'click_blog'		=> '{actor} 님이 귀하의 블로그 <a href="{url}" target="_self">{subject}</a>에 표시를 남김',
	'click_pic'		=> '{actor} 님이 귀하의 <a href="{url}" target="_self">사진</a>에 표시를 남김',
	'click_article'		=> '{actor} 님이 귀하의 문서 <a href="{url}" target="_self">{subject}</a>에 표시를 남김',
	'show_out'		=> '{actor} 님이 귀하의 홈페이지를 방문함, 이것은 당신이 지불한 최종 입찰 포인트를 보여줌',
	'puse_article'		=> '축하합니다.. 당신의 <a href="{url}" target="_self">{subject}</a>가 문서목록에 추가되었습니다. <a href="{newurl}" target="_self">보기</a>',

	'myinvite_request'	=> '새 앱 소식 있음.<a href="home.php?mod=space&do=notice&view=userapp">관련된 작업에 대한 앱 정보를 보려면 여기를 클릭 하십시오</a>',


	'group_member_join'	=> '{actor}님이 귀하의 그룹가입 신청은 심가가 있어야 합니다. <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, please moderate him in the <a href="{url}" target="_blank">관리센터</a>',//'{actor} 加入你的群组需要审核，请到群组 <a href="{url}" target="_blank">管理后台</a> 进行审核',
	'group_member_invite'	=> '{actor}님이 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>동호회로 초대 합니다, <a href="{url}" target="_blank">가입하기</a>',//'{actor} 邀请你加入 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组，<a href="{url}" target="_blank">点此马上加入</a>',
	'group_member_check'	=> '<a href="{url}" target="_blank">{groupname}</a>그룹의 심사에 통과 되였습니다, <a href="{url}" target="_blank">방문하기</a>',//'你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
	'group_member_check_failed'	=> '아쉽게도 <a href="{url}" target="_blank">{groupname}</a> 그룹의 심사에 통과되지 못했습니다.',//'你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',
	'group_mod_check'		=> '귀하께서 창립하신 "<a href="{url}" target="_blank">{groupname}</a>" 그룹이 심사에 통과 되였습니다, please <a href="{url}" target="_blank">방문하기</a>',//'您的创建的群组 <a href="{url}" target="_blank">{groupname}</a> 审核通过了，请 <a href="{url}" target="_blank">点击这里访问</a>',

	'reason_moderate'	=> '귀하의 글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> {actor}님이 {modaction} 처리 하셨습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> {actor}님에 의해 {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> '귀하의 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 의 게시물을 {actor}님이 삭제 하셨습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> 'Your comment in <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> was deleted by {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> '귀하의 글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> {actor}님이 {modaction} 처리 하셨습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post'	=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, {actor} {modaction} 님께 .<br />
				{warningexpiration} 일 내에 연속  {warninglimit}번 경고를 받음으로 {warningexpiration} 일 발언금지 됩니다.<br />
				현재까지 {authorwarnings} 번 경고를 받으셨습니다. 주의 하세요.
				<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'		=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 가 {actor}님에 의해  <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a>으로 이동 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div> ',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'		=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 가 {actor}님에 의해 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a>으로 복사 되였습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'	=> '귀하의 포상덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 취소 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'	=> '귀하의 덧글<a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 도장{stamp} 이 추가되였습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'	=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 도장이 취소 되였습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 아이콘 {stamp}이 추가 되였습니다.<div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> '귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 아이콘이 취소 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> '덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>에서의 귀하의 리필이 {actor}님에 의해 베스트글로 설정 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'您在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> '덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>에서의 귀하의 리필이 {actor}님에 의해 베스트글 취소 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_quickclear'	=> '귀하의 {cleartype}이 {actor}님에 의해 삭제 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'您的{cleartype} 被 {actor} 清除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'	=> '귀하가 발포하신 덧글 {threadsubject}가 심사에 통과 되지 못했고 이미 삭제 되였습니다, <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete_reason' => 'Published by you thread {threadsubject} was not approved, and now has been deleted! <div class="quote"><blockquote>{reason}</blockquote></div>',//'您发表的主题 {threadsubject} 未通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate'	=> '귀하의 게시글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 심사에 통과 되였습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete'	=> '귀하의 리필이 심사에 통과 되지 못했으며 이미 삭제 되였습니다. <p class="summary">리필 내용: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'	=> '귀하의 리필이 심사에 통과 되였습니다. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">보기</a> <p class="summary">리필 내용: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'		=> '{actor}에서의 {credit} 포인트 이체를 받으셨습니다.. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">보기</a>
				<p class="summary">{actor} 메모: <span>{transfermessage}</span></p>',

	'addfunds'		=> '귀하의 포인트 충전요청이 완성되여 포인트계정에 적립 되였습니다.
				&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">보기 &rsaquo;</a>.
				<p class="summary">오더넘버: <span>{orderid}</span></p>
				<p class="summary">지출: <span>{price} 원</span></p>
				<p class="summary">수입: <span>{value}</span></p>',

	'rate_reason'		=> ' 귀하의 덧글 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a>가 {actor}님에 의해 [{ratescore}] 채점 되였습니다. <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'recommend_note_post'	=> '축하합니다! 귀하의 게시글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 편집에 채용 되였습니다.',//'恭喜，您的帖子 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被编辑采用',

	'rate_removereason'	=> '{actor}님께서 덧글<a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a>에서의 귀하의 게시글채점을 취소 하셨습니다. {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 귀하의 상품<a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 구매 하셨습니다, 이미 지불된 상태고 발송 대기 중입니다. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">보기</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm'	=> '귀하께서 구매하신 상품 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 이미 발송 되였습니다, 수신확인 대기 중입니다. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">보기</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success'	=> '상품 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 환불 성공. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">평가하기</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success'		=> '상품 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 거래 성공. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">평가하기</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid'	=> '판매자 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a>님이 상품 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 거래서를 수정 하셨습니다. 확인 바랍니다. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">보기</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid'	=> '구매자 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a>님이 상품<a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 거래서를 수정 하셨습니다. 확인  바랍니다. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">보기</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit'		=> '귀하와 거래하신 (actor)님께서 이미 평가를 하셨습니다. &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">평가하기</a>',//'与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

	'activity_notice'	=> '{actor}님께서 귀하가 주최하신 이벤트 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>에 참석 신청을 하셨습니다, 심사바랍니다. <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a>',//'{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'activity_apply'	=> '이벤트 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 작성자 "{actor}"님께서 귀하의 참석을 허락하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> '이벤트 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 작성자 actor}님께서 귀하에게 이벤트참석 신청 정보완성하셔야 함을 알립니다.  and inform you that you need to improve the event registration information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 通知您需要完善活动报名信息 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> '이벤트 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 의 작성자 {actor}님께서 귀하의 참석을 거절 하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">보기</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 拒绝您参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> '{actor}님께서 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 이벤트 참여 취소를 하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">보기 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 取消了参加 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> '이벤트 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 의 작성자 {actor}님께서 알려드립니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',// '活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 发来通知&nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看活动 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> '귀하의 포상덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 에 {actor}님이 최적 답을 설정 하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer'	=> '귀하의 리필이 포상덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 의 작성자{actor}님께서 최적 답으로 선정 하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a>',//'你的回复被的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> '포상덧글 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 에서의 귀하의 리필이 최적 답으로 선정되였습니다.&nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기 &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add'		=> '{actor}님이 귀하가 덧글<a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>에서의 게시글을 평가 하셨습니다. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">보기</a>',//'{actor} 点评了您曾经在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 发表的帖子 &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor}님이 리필 하셨습니다. <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a>. &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">보기</a>',//'{actor} 回复了您的帖子 <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看</a>',

	'task_reward_credit'	=> '축하합니다! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성 하셨습니다, {creditbonus} 포인를 획득하셨습니다. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">나의 포인트 보기 &rsaquo;</a></p>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

	'task_reward_magic'	=> '축하합니다!<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성 하셨습니다,  아이템 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 개 획득 하셨습니다.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

	'task_reward_medal'	=> '축하합니다!<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성 하셨습니다, <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 훈장을 획득 하셨습니다. {bonus} 일 유효.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

	'task_reward_medal_forever'	=> '축하합니다!<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성 하셨습니다, <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 훈장을 획득 하셨습니다. 영원히 유효.',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

	'task_reward_invite'	=> '축하합니다! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성 하셨습니다. <a href="home.php?mod=spacecp&ac=invite" target="_blank">초대장코드넘버를 {rewardtext}개 획득 하셨습니다.</a> {bonus} 일 유효.',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得<a href="home.php?mod=spacecp&ac=invite" target="_blank">邀请码 {rewardtext}个</a> 有效期 {bonus} 天',

	'task_reward_group'	=> '축하합니다! <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a> 미션 완성하셨습니다, {bonus} 일의 {rewardtext}사용자 그룹 사용 권한을 획득하셨습니다. <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">권한보기</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'user_usergroup'	=> '귀하의 사용자 그룹이 {usergroup}으로 업그레이드 되였습니다. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">권한 보기</a>',//'你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'grouplevel_update'	=> '축하 합니다! 귀하의 그룹{groupname} 이 {newlevel}으로 업그레이드 되였습니다.',//'恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

	'thread_invite'		=> '{actor}님께서 {invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 초대 하셨습니다. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">보기</a>',//'{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'blog_invite'		=> '{actor}님께서 포스트 <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a> 보기를 초대 하셨습니다, &nbsp; <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank" class="lit">보기</a>',//'{actor} 邀请您查看日志 <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a> &nbsp; <a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'article_invite'	=> '{actor}님께서 문서<a href="portal.php?mod=view&aid={aid}" target="_blank">{subject}</a> 보기에 초대 하셨습니다, &nbsp; <a href="portal.php?mod=view&aid={aid}" target="_blank" class="lit">보기</a>',//'{actor} 邀请您查看文章 <a href="portal.php?mod=view&aid={aid}" target="_blank">{subject}</a> &nbsp; <a href="portal.php?mod=view&aid={aid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'invite_friend'		=> '축하 합니다.{actor}님 초대에 성공하셔서 친구가 되였습니다.',//'恭喜你成功邀请到 {actor} 并成为你的好友',

	'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a> sent a greeting: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">인사에 답하기</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">무시</a>',//'<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">回打招呼</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">忽略</a>',

	'profile_verify_error'		=> '{verify}정보 심사거절 되였습니다,다음 내용을 재 입력해주세요.<br/>{profile}<br/>거절이유: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass'		=> '축하합니다.  {verify} 요청이 승인되었습니다.',
	'profile_verify_pass_refusal'	=> '죄송합니다, 귀하께서 기입하신 {verify} 정보가 심사거절 되였습니다.',//'很遗憾，你填写的{verify}资料审核被拒绝了',
	'member_ban_speak'		=> '{user}님께서 귀하를 {day} 일 동안 발언금지 시켰습니다. (0 은 영원히 금지). 발언금지 이유: {reason}',//'你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',
	'member_ban_visit'		=> '{user}님께서 귀하를 {day} 일 동안 방문정지 시켰습니다. (0 은 영원히 금지.) 방문금지 이유: {reason}',//'您已被 {user} 禁止访问，期限：{day}天(0：代表永久禁止访问)，禁止访问理由：{reason}',
	'member_ban_status'		=> '귀하는 {user}님께 정지 당하셨습니다, 방문금지 이유: {reason}',//'您已被 {user} 锁定，禁止访问理由：{reason}',
	'member_follow'			=> '귀하께서 관심가지신 분의 {count} 개 새로운 피드가 있습니다. <a href="home.php?mod=follow">Click to view</a>',//'您关注的人已有{count}条新动态。<a href="home.php?mod=follow">Click to view</a>',
	'member_follow_add'		=> '{actor} 님이 팔로잉 하셨습니다. <a href="home.php?mod=follow&do=follower">보기</a>',//'{actor} 收听了你。<a href="home.php?mod=follow&do=follower">Click to view</a>',

	'member_moderate_invalidate'	=> '귀하의 계정이 관리자 심사에 통과되지 못했습니다. <a href="home.php?mod=spacecp&ac=profile">등록정보를 다시 입력제출해 주세요.</a>.<br />Administrator remark: <b>{remark}</b>',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_validate'	=> '귀하의 계정이 심사에 통과 되였습니다.<br />관리자 통지서: <b>{remark}</b>',//'你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark'	=> '귀하의 계정이 심사에 통과 되지 못했습니다. <a href="home.php?mod=spacecp&ac=profile">등록정보를 다시 입력제출해 주세요.</a>.',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。',
	'member_moderate_validate_no_remark'	=> '귀하의 계정이 심사에 통과 되였습니다.',//'你的账号已经通过审核。',
	'manage_verifythread'		=> '심사대기중인 덧글가 있습니다. <a href="admin.php?action=moderate&operation=threads&dateline=all">Verify now</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',
	'manage_verifypost'		=> '심사대기중인 리필이 있습니다. <a href="admin.php?action=moderate&operation=replies&dateline=all">Verify now</a>',//'有新的待审核回帖。<a href="admin.php?action=moderate&operation=replies&dateline=all">现在进行审核</a>',
	'manage_verifyuser'		=> '심사대기중인 회원이 있습니다.. <a href="admin.php?action=moderate&operation=members">Verify now</a>',//'有新的待审核会员。<a href="admin.php?action=moderate&operation=members">现在进行审核</a>',
	'manage_verifyblog'		=> '심사대기중인 포스트가 있습니다. <a href="admin.php?action=moderate&operation=blogs">Verify now</a>',//'有新的待审核日志。<a href="admin.php?action=moderate&operation=blogs">现在进行审核</a>',
	'manage_verifydoing'		=> '심사대기중인 기록이 있습니다. <a href="admin.php?action=moderate&operation=doings">Very now</a>',//'有新的待审核记录。<a href="admin.php?action=moderate&operation=doings">现在进行审核</a>',
	'manage_verifypic'		=> '심사대기중인 이미지가 있습니다. <a href="admin.php?action=moderate&operation=pictures">Verify now</a>',//'有新的待审核图片。<a href="admin.php?action=moderate&operation=pictures">现在进行审核</a>',
	'manage_verifyshare'		=> '심사대기중인 공유가 있습니다. <a href="admin.php?action=moderate&operation=shares">Verify now</a>',//'有新的待审核分享。<a href="admin.php?action=moderate&operation=shares">现在进行审核</a>',
	'manage_verifycommontes'	=> '심사대기중인 새로운 메모/리필이 있습니다. <a href="admin.php?action=moderate&operation=comments">Verify now</a>',//'有新的待审核留言/评论。<a href="admin.php?action=moderate&operation=comments">现在进行审核</a>',
	'manage_verifyrecycle'		=> '휴지통에 처리 대기중인 새로운 덧글가 있습니다. <a href="admin.php?action=recyclebin">보기</a>',//'回收站有新的待处理主题。<a href="admin.php?action=recyclebin">现在处理</a>',
	'manage_verifyrecyclepost'	=> '게시글 휴지통에 처리 대기중인 게시글이 있습니다. <a href="admin.php?action=recyclebinpost">보기</a>',//'回帖回收站有新的待处理回帖。<a href="admin.php?action=recyclebinpost">现在处理</a>',
	'manage_verifyarticle'		=> '심사대기중인 문서가 있습니다. <a href="admin.php?action=moderate&operation=articles">보기</a>',//'有新的待审核文章。<a href="admin.php?action=moderate&operation=articles">现在进行审核</a>',
	'manage_verifymedal'		=> '새로운 훈장신청 심사 대기가 있습니다. <a href="admin.php?action=medals&operation=mod">보기</a>',//'有新的待审核勋章申请。<a href="admin.php?action=medals&operation=mod">现在进行审核</a>',
	'manage_verifyacommont'		=> '새로운 문서논평 심사 대기가 있습니다. <a href="admin.php?action=moderate&operation=articlecomments">보기</a>',//'有新的待审核文章评论。<a href="admin.php?action=moderate&operation=articlecomments">现在进行审核</a>',
	'manage_verifytopiccommont'	=> '새로운 포스트논평 심사 대기가 있습니다. <a href="admin.php?action=moderate&operation=topiccomments">보기</a>',//'有新的待审核专题评论。<a href="admin.php?action=moderate&operation=topiccomments">现在进行审核</a>',
	'manage_verify_field'		=> '새로운 작업대기가 있습니다. {verifyname}. <a href="admin.php?action=verify&operation=verify&do={doid}">보기</a>',//'有新的待处理{verifyname}。<a href="admin.php?action=verify&operation=verify&do={doid}">现在处理</a>',
	'system_notice'			=> '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration'		=> '귀하의 사이트 광고가 {day} 일후 만기 되오니 빠른 처리 바랍니다:<br />{advs}',//'您站点的以下广告将于 {day} 天后到期，请及时处理：<br />{advs}',
	'report_change_credits'		=> '{actor}님께서 귀하의 신고를 처리 하셨습니다, 귀하의 {creditchange}',//'{actor} 处理了你的举报，你的 {creditchange}',
	'at_message'			=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 덧글 <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> 에서 귀하를 언급했습니다. <div class="quote"><blockquote>{message}</blockquote></div><a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">보기</a>.',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 在主题 <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> 中提到了你<div class="quote"><blockquote>{message}</blockquote></div><a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">现在去看看</a>。',
	'new_report'			=> '새로운 신고가 있습니다, <a href="admin.php?action=report" target="_blank">보기</a>.',//'有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
	'new_post_report'		=> '새로운 신고가 있습니다, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">보기</a>.',//'有新的举报等待处理，<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">点此进入管理面版</a>。',
	'magics_receive'		=> '{actor} sent the magic {magicname} to you .
					<p class="summary">{actor} said: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">Return the gift back!</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">View my magics</a></p>',
	'invite_collection'		=> '{actor}님께서 귀하를 파트리 앨범:<a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> work team.<br /><a href="forum.php?mod=collection&action=edit&op=acceptinvite&ctid={ctid}&dateline={dateline}">Accept the invitation</a> 의 공동편집에 초대 하셨습니다.',//'{actor} 邀请您参与维护淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>。<br /> <a href="forum.php?mod=collection&action=edit&op=acceptinvite&ctid={ctid}&dateline={dateline}">接受邀请</a>',
	'collection_removed'		=> '편집에 참여하신 파트리 앨범 <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 은 {actor}님께의해 닫겼습니다.',//'您参与维护的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 已被 {actor} 关闭。',
	'exit_collection'		=> '파트리 앨범 <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 의 편집에서 퇴출 하셨습니다.',//'您已经退出维护淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>。',
	'collection_becommented'	=> '귀하의 파트리 앨범 <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 에 새로운 논평가 있습니다.',//'您的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 收到了新评论。',
	'collection_befollowed'		=> '귀하의 파트리 앨범 <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 이 새로운 구독자가 있습니다.',//'您的淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 有新用户订阅了！',
	'collection_becollected'	=> '축하합니다,귀하의 덧글 <a href="forum.php?mod=viewthread&tid={tid}">{threadname}</a> 가 <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a>파트리에 수록 되였습니다. !',//'恭喜您的主题 <a href="forum.php?mod=viewthread&tid={tid}">{threadname}</a> 被淘专辑  <a href="forum.php?mod=collection&action=view&ctid={ctid}">{collectionname}</a> 收录了！',

	'pmreportcontent'		=> '{pmreportcontent}',

);

