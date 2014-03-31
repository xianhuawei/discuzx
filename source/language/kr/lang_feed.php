<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_feed.php by Valery Votintsev at sources.ru
 *	Translated to Korean by ionobgy
 */

$lang = array
(

	'feed_blog_password'	=> '{actor} 님이 비밀 블로그글 {subject} 남김.',
	'feed_blog_title'	=> '{actor} 님이 블로그에 글을 작성함.',
	'feed_blog_body'	=> '<b>{subject}</b><br />{summary}',
	'feed_album_title'	=> '{actor} 님이 앨범 제목 변경함',
	'feed_album_body'	=> '<b>{album}</b><br />총 {picnum}개 이미지',
	'feed_pic_title'	=> '{actor} 님이 새 이미지 올림',
	'feed_pic_body'	=> '{title}',



	'feed_poll'	=> '{actor} 님이 새 설문을 작성함',

	'feed_comment_space'	=> '{actor} 님이 {touser}의 공간에 메세지 남김',
	'feed_comment_image'	=> '{actor} 님이 {touser}의 이미지에 메세지 남김',
	'feed_comment_blog'	=> '{actor} 님이 {touser}의 블로그 {blog}에 메세지 남김',
	'feed_comment_poll'	=> '{actor} 님이 {touser}의 설문 {poll}에 메세지 남김',
	'feed_comment_event'	=> '{actor} 님이 {touser}의 활동 {event}에 메세지 남김',
	'feed_comment_share'	=> '{actor} 님이 {touser}의 공유 {share}에 메세지 남김',

	'feed_showcredit'	=> '{actor} 님이 {fusername}에게 입찰 크래딧 {credit} 선물함，친구의 <a href="misc.php?mod=ranklist&type=member" target="_blank">입찰 순위 올리기</a>',
	'feed_showcredit_self'	=> '{actor} 님이  입찰 크래딧 {credit} 올림，자신의 <a href="misc.php?mod=ranklist&type=member" target="_blank">입찰 순위 올리기</a>',
	'feed_doing_title'	=> '{actor}：{message}',
	'feed_friend_title'	=> '{actor} 님과 {touser} 님이 친구가 되었습니다.',



	'feed_click_blog'	=> '{actor} 님이  {touser} 님의 블로그 {subject}에 “{click}” 함',
	'feed_click_thread'	=> '{actor} 님이 {touser} 님의 글 {subject}에 “{click}” 함 ',
	'feed_click_pic'	=> '{actor} 님이 {touser} 님의 앨범에  “{click}” 함 ',
	'feed_click_article'	=> '{actor} 님이 {touser} 님의 문장 {subject}에  “{click}” 함 ',


	'feed_task'	=> '{actor} 님이 {task} 임무 완수',
	'feed_task_credit'	=> '{actor} 님이 {task} 임무 완수，{credit} 크래딧 얻음',

	'feed_profile_update_base'	=> '{actor} 님이 자신의 기본 정보를 갱신함',
	'feed_profile_update_contact'	=> '{actor} 님이 자신의 연락처를 갱신함',
	'feed_profile_update_edu'	=> '{actor} 님이 자신의 교육과정을 갱신함',
	'feed_profile_update_work'	=> '{actor} 님이 자신의 직업을 갱신함',
	'feed_profile_update_info'	=> '{actor}님이 자신의 개인정보를 갱신함',
	'feed_profile_update_bbs'	=> '{actor} 님이 자신의 포럼을 갱신함',
	'feed_profile_update_verify'	=> '{actor} 님이 자신의 인증을 갱신함',

	'feed_add_attachsize'	=> '{actor} 님이 첨부 파일 공간을 {size}로 변경하기 위해  {credit} 크래딧 사용. (<a href="home.php?mod=spacecp&ac=credit&op=addsize">변경 원함</a>)',

	'feed_invite'	=> '{actor} 님이 {username} 님에게 초대를 보내서 친구가 됨',

	'magicuse_thunder_announce_title'	=> '<strong>{username} used a thunder card</strong>',
	'magicuse_thunder_announce_body'	=> 'Hello everyone, I\'m online now.<br /><a href="home.php?mod=space&uid={uid}" target="_blank">Welcome to visit my space</a>',


	'feed_thread_title' =>			'{actor}님이 새글을 작성',
	'feed_thread_message' =>		'<b>{subject}</b><br />{message}',

	'feed_reply_title'		=> '{actor} replied the topic {subject} of {author}',//'{actor} 回复了 {author} 的话题 {subject}',
	'feed_reply_title_anonymous'	=> 'Anonymous replied the topic {subject} of {author}',//'{actor} 回复了话题 {subject}',
	'feed_reply_message'		=> '',

	'feed_thread_poll_title'	=> '{actor} started new poll',//'{actor} 发起了新投票',
	'feed_thread_poll_message'	=> '<b>{subject}</b><br />{message}',//'<b>{subject}</b><br />{message}',

	'feed_thread_votepoll_title'	=> '{actor} voted in the poll {subject}',//'{actor} 参与了关于 {subject} 的投票',
	'feed_thread_votepoll_message'	=> '',

	'feed_thread_goods_title'	=> '{actor} put a new product for sell',//'{actor} 出售了一个新商品',
	'feed_thread_goods_message_1'	=> '<b>{itemname}</b><br />Price: {itemprice} per additional(???) {itemcredit} {creditunit}',//'<b>{itemname}</b><br />售价 {itemprice} 元 附加 {itemcredit}{creditunit}',
	'feed_thread_goods_message_2'	=> '<b>{itemname}</b><br />Price: {itemprice} USD',//'<b>{itemname}</b><br />售价 {itemprice} 元',
	'feed_thread_goods_message_3'	=> '<b>{itemname}</b><br />Price: {itemcredit} {creditunit}',//'<b>{itemname}</b><br />售价 {itemcredit}{creditunit}',

	'feed_thread_reward_title'	=> '{actor} started a new reward thread',//'{actor} 发起了新悬赏',
	'feed_thread_reward_message'	=> '<b>{subject}</b><br />Reward: {rewardprice} {extcredits}',//'<b>{subject}</b><br />悬赏 {rewardprice}{extcredits}',

	'feed_reply_reward_title'	=> '{actor} replied the reward thread {subject}',//'{actor} 回复了关于 {subject} 的悬赏',
	'feed_reply_reward_message'	=> '',

	'feed_thread_activity_title'	=> '{actor} started new event',//'{actor} 发起了新活动',
	'feed_thread_activity_message'	=> '<b>{subject}</b><br />Start time: {starttimefrom}<br />Location: {activityplace}<br />{message}',//'<b>{subject}</b><br />开始时间：{starttimefrom}<br />活动地点：{activityplace}<br />{message}',

	'feed_reply_activity_title'	=> '{actor} enrolled in the activitiy: {subject}',//'{actor} 报名参加了 {subject} 的活动',
	'feed_reply_activity_message'	=> '',

	'feed_thread_debate_title'	=> '{actor} started new debate',//'{actor} 发起了新辩论',
	'feed_thread_debate_message'	=> '<b>{subject}</b><br />Square: {affirmpoint}<br />Anti-square: {negapoint}<br />{message}',//'<b>{subject}</b><br />正方：{affirmpoint}<br />反方：{negapoint}<br />{message}',

	'feed_thread_debatevote_title_1'	=> '{actor} marked as positively the debate {subject}',//'{actor} 以正方身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_title_2'	=> '{actor} marked as negatively the debate {subject}',//'{actor} 以反方身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_title_3'	=> '{actor} marked as neutral the debate {subject}',//'{actor} 以中立身份参与了关于 {subject} 的辩论',
	'feed_thread_debatevote_message_1'	=> '',
	'feed_thread_debatevote_message_2'	=> '',
	'feed_thread_debatevote_message_3'	=> '',

);

?>