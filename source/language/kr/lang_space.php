<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_space.php by Valery Votintsev at sources.ru
 *	Translated to Korean by ionobgy
 */

$lang = array(
	'hour'	=> '오늘',
	'before'	=> '이전',
	'minute'	=> '분',
	'second'	=> '초',
	'now'	=> '지금',
	'dot'	=> '、',
	'poll'	=> '투표',
	'blog'	=> '블로그',
	'friend_group_default'	=> '기타',
	'friend_group_1'	=> '사이트',
	'friend_group_2'	=> '활동',
	'friend_group_3'	=> '친구',
	'friend_group_4'	=> '지인',
	'friend_group_5'	=> '동료',
	'friend_group_6'	=> '학생',
	'friend_group_7'	=> '없음',
	'friend_group'	=> '맞춤 설정',
	'wall'	=> '남기기',
	'pic_comment'	=> '이미지 댓글',
	'blog_comment'	=> '블로그 댓글',
	'clickblog'	=> '블로그 순위',
	'clickpic'	=> '이미지 순위',
	'clickthread'	=> '주제 순위',
	'share_comment'	=> '공유 댓글',
	'share_notice'	=> '공유',
	'doing_comment'	=> '토막글 댓글',
	'friend_notice'	=> '친구',
	'poll_comment'	=> '투표 댓글',
	'poll_invite'	=> '투표 초대',
	'default_albumname'	=> '기본 앨범',
	'credit'	=> '포인트',
	'credit_unit'	=> '개',
	'man'	=> '남자',
	'woman'	=> '여자',
	'gender_0'	=> '개인 정보 보호',
	'gender_1'	=> '남자',
	'gender_2'	=> '여자',
	'year'	=> '년',
	'month'	=> '월',
	'day'	=> '일',
	'unmarried'	=> '미혼',
	'married'	=> '기혼',
	'hidden_username'	=> '익명',
	'gender'	=> '성별',
	'age'	=> '세',
	'comment'	=> '댓글',
	'reply'	=> '답글',
	'from'	=> 'from',
	'anonymity'	=> '익명',
	'viewmore'	=> '더보기',
	'constellation_1'	=> 'Aquarius',
	'constellation_2'	=> 'Pisces',
	'constellation_3'	=> 'Aries',
	'constellation_4'	=> 'Taurus',
	'constellation_5'	=> 'Gemini',
	'constellation_6'	=> 'Cancer',
	'constellation_7'	=> 'Leo',
	'constellation_8'	=> 'Virgo',
	'constellation_9'	=> 'Libra',
	'constellation_10'	=> 'Scorpio',
	'constellation_11'	=> 'Sagittarius',
	'constellation_12'	=> 'Capricorn',
	'zodiac_1'	=> 'Rat',
	'zodiac_2'	=> 'Ox',
	'zodiac_3'	=> 'Tiger',
	'zodiac_4'	=> 'Rabbit',
	'zodiac_5'	=> 'Dragon',
	'zodiac_6'	=> 'Snake',
	'zodiac_7'	=> 'Horse',
	'zodiac_8'	=> 'Goat',
	'zodiac_9'	=> 'Monkey',
	'zodiac_10'	=> 'Rooster',
	'zodiac_11'	=> 'Dog',
	'zodiac_12'	=> 'Pig',

	'credits'	=> '포인트',
	'usergroup'	=> '회원 등급',
	'friends'	=> '친구',
	'blogs'	=> '블로그',
	'threads'	=> '주제',
	'albums'	=> '앨범',
	'sharings'	=> '공유',
	'space_views'	=> '블로그 방문자 <strong class="xi1">{views}</strong> 명',
	'views'	=> '공간조회수',
	'block1'	=> '사용자 정의 모듈1',
	'block2'	=> '사용자 정의 모듈2',
	'block3'	=> '사용자 정의 모듈3',
	'block4'	=> '사용자 정의 모듈4',
	'block5'	=> '사용자 정의 모듈5',
	'blockdata' => array(
		'personalinfo'	=> '개인 정보',
		'profile'	=> '프로필',
		'doing'		=> '토막글',
		'feed'		=> '소식',
		'blog'		=> '블로그',
		'stickblog'	=> '이전 블로그',
		'album'		=> '앨범',
		'friend'	=> '친구',
		'visitor'	=> '최근 방문자',
		'wall'		=> '방명록',
		'share'		=> '공유',
		'thread'	=> '주제',
		'group'		=> $_G[setting][navs][3][navname],
		'music'		=> '뮤직 박스',
		'statistic'	=> '통계',
		'myapp'		=> '어플리케이션',
		'block1'	=> '자유 모듈1',
		'block2'	=> '자유 모듈2',
		'block3'	=> '자유 모듈3',
		'block4'	=> '자유 모듈4',
		'block5'	=> '자유 모듈5'
	),

	'block_title'	=> '<div class="blocktitle title"><span>{bname}</span>{more}</div>',
	'blog_li'	=> '<dl class="bbda cl"><dt><a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">{subject}</a><span class="xg2 xw0"> {date}</span></dt>',
	'blog_li_img'	=> '<dd class="atc"><a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank"><img src="{src}" class="summaryimg" /></a></dd>',
	'blog_li_ext'	=> '<dd class="xg1"><a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}" target="_blank">({viewnum})조회 수</a><span class="pipe">|</span><a href="home.php?mod=space&uid={uid}&do=blog&id={blogid}#comment" target="_blank">({replynum})댓글 수</a></dd>',
	'album_li'	=> '<li style="width:70px"><div class="c"><a href="home.php?mod=space&uid={uid}&do=album&id={albumid}" target="_blank" title="{albumname}, 업데이트 {date}"><img src="{src}" alt="{albumname}" width="70" height="70" /></a></div><p><a href="home.php?mod=space&uid={uid}&do=album&id={albumid}" target="_blank" title="{albumname}, 업데이트 {date}">{albumname}</a></p><span>이미지: {picnum} 개</span></li>',
	'doing_li'	=> '<li>{message}</li><br />{date} {from} 댓글({replynum})',
	'visitor_anonymity'	=> '<div class="avatar48"><img src="image/magic/hidden.gif" alt="익명"></div><p>익명</p>',
	'visitor_list'	=> '<a href="home.php?mod=space&uid={uid}" target="_blank" class="avt"><em class="{class}"></em>{avatar}</a><p><a href="home.php?mod=space&uid={uid}" title="{username}">{username}</a></p>',
	'wall_form'	=> '<div class="space_wall_post">
					<form action="home.php?mod=spacecp&ac=comment" id="quickcommentform_{uid}" name="quickcommentform_{uid}" method="post" autocomplete="off" onsubmit="ajaxpost(\'quickcommentform_{uid}\', \'return_commentwall_{uid}\');doane(event);">
						'.($_G['uid'] ? '<span id="message_face" onclick="showFace(this.id, \'comment_message\');return false;" class="cur1"><img src="static/image/common/facelist.gif" alt="facelist" class="mbn vm" /></span>
						<br /><textarea name="message" id="comment_message" class="pt" rows="3" cols="60" onkeydown="ctrlEnter(event, \'commentsubmit_btn\');" style="width: 90%;"></textarea>
						<input type="hidden" name="refer" value="home.php?mod=space&uid={uid}" />
						<input type="hidden" name="id" value="{uid}" />
						<input type="hidden" name="idtype" value="uid" />
						<input type="hidden" name="commentsubmit" value="true" />' :
						'<div class="pt hm">글을 작성하시려면 <a href="member.php?mod=logging&action=login" onclick="showWindow(\'login\', this.href)" class="xi2">로그인</a> | <a href="member.php?mod='.$_G['setting']['regname'].'" class="xi2">'.$_G['setting']['reglinkname'].'</a>을 하셔야 합니다.</div>').'
						<p class="ptn"><button '.($_G['uid'] ? 'type="submit"' : 'type="button" onclick="showWindow(\'login\', \'member.php?mod=logging&action=login&guestmessage=yes\')"').' name="commentsubmit_btn" value="true" id="commentsubmit_btn" class="pn"><strong>글 쓰기</strong></button></p>
						<input type="hidden" name="handlekey" value="commentwall_{uid}" />
						<span id="return_commentwall_{uid}"></span>
						<input type="hidden" name="formhash" value="{FORMHASH}" />
					</form>'.
					($_G['uid'] ? '<script type="text/javascript">
						function succeedhandle_commentwall_{uid}(url, msg, values) {
							wall_add(values[\'cid\']);
						}
					</script>' : '').'
					</div>',
	'wall_li'	=> '<dl class="bbda cl" id="comment_{cid}_li">
				<dd class="m avt">
				{author_avatar}
				</dd>
				<dt>
				{author}
				<span class="y xw0">{op}</span>
				<span class="xg1 xw0">{date}</span>
				<span class="xgl">{moderated}</span>
				</dt>
				<dd id="comment_{cid}">{message}</dd>
				</dl>',
	'wall_more'	=> '<dl><dt><span class="y xw0"><a href="home.php?mod=space&uid={uid}&do=wall">전체 보기</a></span><dt></dl>',
	'wall_edit'	=> '<a href="home.php?mod=spacecp&ac=comment&op=edit&cid={cid}&handlekey=editcommenthk_{cid}" id="c_{cid}_edit" onclick="showWindow(this.id, this.href, \'get\', 0);">수정</a> ',
	'wall_del'	=> '<a href="home.php?mod=spacecp&ac=comment&op=delete&cid={cid}&handlekey=delcommenthk_{cid}" id="c_{cid}_delete" onclick="showWindow(this.id, this.href, \'get\', 0);">삭제</a> ',
	'wall_reply'	=> '<a href="home.php?mod=spacecp&ac=comment&op=reply&cid={cid}&handlekey=replycommenthk_{cid}" id="c_{cid}_reply" onclick="showWindow(this.id, this.href, \'get\', 0);">답글</a>',
	'group_li'	=> '<li><a href="forum.php?mod=group&fid={groupid}" target="_blank"><img src="{icon}" alt="{name}" /></a><p><a href="forum.php?mod=group&fid={groupid}" target="_blank">{name}</a></p></li>',
	'poll_li'	=> '<div class="c z"><img alt="poll" src="static/image/feed/poll.gif" alt="poll" class="t" /><h4 class="h"><a target="_blank" href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a></h4><div class="mtn xg1">작성 시간：{dateline}</div></div>',
	'myapp_li_icon'	=> '<li><img src="{icon}" onerror="this.onerror=null;this.src=\'http://appicon.manyou.com/icons/{appid}\'" alt="{appname}" class="vm" /> <a href="userapp.php?mod=app&id={appid}">{appname}</a></li>',
	'myapp_li_logo'	=> '<li><a href="userapp.php?mod=app&id={appid}"><img src="http://appicon.manyou.com/logos/{appid}" alt="{appname}" /><p><a href="userapp.php?mod=app&id={appid}">{appname}</a></p></li>',
	'music_no_content'	=> '뮤직 박스 정보가 없습니다.',
	'block_profile_diy'	=> '꾸미기',
	'block_profile_wall'	=> '방명록',
	'block_profile_avatar'	=> '아바타',
	'block_profile_update'	=> '프로필',
	'block_profile_wall_to_me'	=> '방명록',
	'block_profile_friend_add'	=> '초대',
	'block_profile_friend_ignore'	=> '친구제거',
	'block_profile_poke'	=> '인사',
	'block_profile_sendmessage'	=> '쪽지',
	'block_doing_reply'	=> '답글',
	'block_doing_no_content'	=> '토막글이 없습니다.',
	'block_doing_no_content_publish'	=> '，<a href ="home.php?mod=space&uid={uid}&do=doing&view=me&from=space">토막글 작성</a>',
	'block_blog_no_content'	=> '블로그 정보가 없습니다.',
	'block_blog_no_content_publish'	=> '，<a href ="home.php?mod=spacecp&ac=blog">글 쓰기</a>',
	'block_album_no_content'	=> '앨범 정보가 없습니다.',
	'block_album_no_content_publish'	=> '，<a href ="home.php?mod=spacecp&ac=upload">업로드</a>',
	'block_feed_no_content'	=> '최근 소식이 없습니다.',
	'block_thread_no_content'	=> '주제 정보가 없습니다.',
	'block_thread_no_content_publish'	=> '，<a href ="forum.php?mod=misc&action=nav&special=0&from=home" onclick="showWindow(\'nav\', this.href);return false;">작성</a>',
	'block_friend_no_content'	=> '친구 정보가 없습니다.',
	'block_friend_no_content_publish'	=> ' <a href ="home.php?mod=spacecp&ac=search">친구 찾기</a> 또는 <a href ="home.php?mod=spacecp&ac=invite">초대</a>',
	'block_visitor_no_content'	=> '최근 방문자 정보가 없습니다.',
	'block_visitor_no_content_publish'	=> '，<a href ="home.php?mod=space&do=friend&view=online&type=member">블로그 방문</a>',
	'block_share_no_content'	=> '공유 정보가 없습니다.',
	'block_wall_no_content'	=> '방명록 메시지가 없습니다.',
	'block_group_no_content'	=> '모임 정보가 없습니다.',
	'block_group_no_content_publish'	=> '，<a href ="forum.php?mod=group&action=create">만들기</a> 또는 <a href ="group.php?mod=index">가입</a>',
	'block_group_no_content_join'	=> '，<a href ="group.php?mod=index">가입</a>',
	'block_myapp_no_content'	=> '어플리케이션 정보가 없습니다.',
	'block_myapp_no_content_publish'	=> '，<a href ="userapp.php?mod=manage&my_suffix=/app/list">어플리케이션 목록</a>',
	'block_view_noperm'	=> '볼수 있는 권한이 없습니다.',
	'block_view_profileinfo_noperm'	=> '프로필을 볼수 있는 권한이 없습니다.',
	'click_play'	=> '재생',
	'click_view'	=> '보기',
	'feed_view_only'	=> '기록 보기',

	'export_pm'	=> 'SMS 내보내기',
	'pm_export_header'	=> '짧은 메세지',
	'pm_export_touser'	=> '보낼 대상: {touser}',
	'pm_export_subject'	=> '제목: {subject}',
	'all'	=> '전체',
	'manage_post'	=> '글 관리',
	'manage_album'	=> '앨범 관리',
	'manage_blog'	=> '블로그 관리',
	'manage_comment'	=> '댓글 관리',
	'manage_doing'	=> '토막글 관리',
	'manage_feed'	=> '소식 관리',
	'manage_group_prune'	=> '모임 글 관리',
	'manage_group_threads'	=> '모임 주제 관리',
	'manage_share'	=> '공유 관리',
	'manage_pic'	=> '이미지 관리',

	'sb_blog'	=> '{who}님 블로그',
	'sb_album'	=> '{who}님 앨범',
	'sb_space'	=> '{who}님 블로그 홈',
	'sb_feed'	=> '{who}님 소식',
	'sb_doing'	=> '{who}님 토막글',
	'sb_sharing'	=> '{who}님 공유',
	'sb_friend'	=> '{who}님 친구',
	'sb_wall'	=> '{who}님 방명록',
	'sb_profile'	=> '{who}님 프로필',
	'sb_thread'	=> '{who}님 주제',
	'doing_you_can'	=> '내용을 입력 하세요...',
	'block_profile_all'	=> '<p style="text-align: right;"><a href="home.php?mod=space&uid={uid}&do=profile">개인 프로필 전체 보기</a></p>',
	'block_profile_edit'	=> '<span class="y xw0"><a href="home.php?mod=spacecp&ac=profile">내 프로필 수정</a></span>',

	'viewthread_userinfo_hour'	=> '시간',
	'viewthread_userinfo_uid'	=> 'UID',
	'viewthread_userinfo_posts'	=> '게시글',
	'viewthread_userinfo_threads'	=> '주제',
	'viewthread_userinfo_doings'	=> '토막글',
	'viewthread_userinfo_blogs'	=> '블로그',
	'viewthread_userinfo_albums'	=> '앨범',
	'viewthread_userinfo_sharings'	=> '공유',
	'viewthread_userinfo_friends'	=> '친구',
	'viewthread_userinfo_digest'	=> '요약',
	'viewthread_userinfo_credits'	=> '포인트',
	'viewthread_userinfo_readperm'	=> '읽기 권한',
	'viewthread_userinfo_regtime'	=> '접속 시간',
	'viewthread_userinfo_lastdate'	=> '최근 접속',
	'viewthread_userinfo_oltime'	=> '온라인 시간',

);

?>