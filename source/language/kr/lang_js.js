/**---
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	Javascript Language variables

	$Id: lang_js.js by Valery Votintsev, codersclub.org

	Translated to Korean by ionobgy
*/

//--------------------------------
//static/js/register.js

// Suggested email domains for registering:
var emaildomains = [
		'aol.com',
		'163.com',
		'sina.com',
		'sohu.com',
		'gmail.com',
		'hotmail.com',
		'msn.com',
		'qq.com',
		'yahoo.cn',
		'yahoo.com',
		'daum.net',
		'naver.com',
		'nate.com',
		'empas.com'
		];

//--------------------------------
//static/js/common.js

var colortexts = {
	'Black'			: '블랙',//'黑色',
	'Sienna'		: '시에나',//'赭色',
	'DarkOliveGreen'	: '다크 올리브 그린',//'暗橄榄绿色',
	'DarkGreen'		: '다크 그린',//'暗绿色',
	'DarkSlateBlue'		: '다크 그레이 블루',//'暗灰蓝色',
	'Navy'			: '해군',//'海军色',
	'Indigo'		: '남빛',//'靛青色',
	'DarkSlateGray'		: '암록색',//'墨绿色',
	'DarkRed'		: '다크 레드',//'暗红色',
	'DarkOrange'		: '다크 오렌지',//'暗桔黄色',
	'Olive'			: '올리브',//'橄榄色',
	'Green'			: '그린',//'绿色',
	'Teal'			: '물오리',//'水鸭色',
	'Blue'			: '블루',//'蓝色',
	'SlateGray'		: '회석색',//'灰石色',
	'DimGray'		: '암 회색',//'暗灰色',
	'Red'			: '레드',//'红色',
	'SandyBrown'		: '모래',//'沙褐色',
	'YellowGreen'		: '옐로우 그린',//'黄绿色',
	'SeaGreen'		: '바다 녹색',//'海绿色',
	'MediumTurquoise'	: '그린 에메랄드',//'间绿宝石',
	'RoyalBlue'		: '로얄 블루',//'皇家蓝',
	'Purple'		: '퍼플',//'紫色',
	'Gray'			: '그레이',//'灰色',
	'Magenta'		: '레드 퍼플',//'红紫色',
	'Orange'		: '오렌지',//'橙色',
	'Yellow'		: '옐로우',//'黄色',
	'Lime'			: '산 오렌지',//'酸橙色',
	'Cyan'			: '청색',//'青色',
	'DeepSkyBlue'		: '딥 스카이 블루',//'深天蓝色',
	'DarkOrchid'		: '다크 퍼플',//'暗紫色',
	'Silver'		: '실버',//'银色',
	'Pink'			: '핑크',//'粉色',
	'Wheat'			: '연한 옐로우',//'浅黄色',
	'LemonChiffon'		: '레몬',//'柠檬绸色',
	'PaleGreen'		: '창 그린',//'苍绿色',
	'PaleTurquoise'		: '보석 그린',//'苍宝石绿',
	'LightBlue'		: '밝은 블루',//'亮蓝色',
	'Plum'			: '매화',//'洋李色',
	'White'			: '화이트' //'白色'
};

/*
',',	//'，',
'.',	//'。',
':',	//'点',
'!',	//'！'
'&laquo;',//'《',
'&raquo;',//'》',
*/


//--------------------------------

var lng = {

//---------------------------
//static/image/editor/editor_base.js
// USED in /source/module/home/home_editor.php
// MOVE TO:
//static/js/editor_base.js
	'restore_last_saved'	: '마지막으로 저장된 것을 복구하겠습니까?',//'您确定要恢复上次保存?',
	'cut_manually'		: '브라우저가 자동으로 자르기를 허용하지 않습니다. 키보드에서 단축키 (Ctrl X)를 이용하세요.',//'您的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成',
	'copy_manually'		: '브라우저가 자동으로 복사를 허용하지 않습니다. 키보드 단축기 (Ctrl C)를 이용하세요.',//'您的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成',
	'paste_manually'	: '브라우저가 자동으로 복사를 허용하지 않습니다.키보드 단축키 (Ctrl V)를 이용하세요.',//'您的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成',
	'graffiti_no_init'	: '그라피티 초기화 데이터를 찾을 수 없습니다.',//'找不到涂鸦板初始化数据',
	'ie5_only'		: 'IE 5.01 이후 버전만 지원합니다.',//'只支持IE 5.01以上版本',
	'edit_raw'		: '원본 파일 수정',//'编辑源码',
	'plain_text_warn'	: '플레인 텍스트로 변경하면 포맷이 상실됩니다.!\n계속하겠습니까?',//'转换为纯文本时将会遗失某些格式。\n您确定要继续吗？',
	'browser_update'	: '당신의 브라우저가 지원하지 않습니다. 브라우저를 업그레이드 하겠습니까?',//'你的浏览器不支持此功能，请升级浏览器版本',
	'tips'			: '팁',//'小提示',

//---------------------------
//static/image/editor/editor_function.js
// USED in: /source/admincp/admincp_feed.php
// USED in: /template/default/home/cpacecp_blog.htm
// USED in: /template/default/portal/portalcp_article.htm
// MOVED TO:
//static/js/editor_function.js
	'wysiwyg_only'		: '이 작업은 위지위그 모드에서만 가능합니다.',//'本操作只在多媒体编辑模式下才有效',

//---------------------------
//static/image/admincp/cloud/cloud.js
	'int_cloud_test'	: '다른 클라우드 인터페이스 테스트',//'云平台其他接口测试',
	'int_roaming_test'	: '다른 로밍 인터페이스 테스트',//'漫游其他接口测试',
	'int_qq_test'		: '다른 QQ 인터페이스 테스트',//'QQ互联接口测试',
	'server_busy'		: '서버 부하로 잠시후 재시도 바랍니다.',//'服务器繁忙，请稍后再试',
	'tested_ok'		: '데스트 성공, 사용시간: ',//'测试成功，耗时 ',
	'seconds'		: ' 초.',//' 秒',

//---------------------------
//static/image/admincp/cloud/qqgroup.js
	'select_topic_to_push'	: '문서로 보내기 위해서는 최소한 하나의 글을 선택해야 합니다',//'请至少推送一条头条主题和一条列表主题',
	'select_item_to_push'	: '문서로 보내기 위해서는 최소한 하나의 아이템을 선택해야 합니다.',//'请至少推送一条信息到列表区域',
	'loading'		: '불러오는 중...',//'加载中...',
	'push5reached'		: '글을 푸시한 횟수가 5개에 도달했습니다. 취소하거나 다시 시도하세요.',//'推送帖子已达到5条，请在右侧取消一些再重试。',
	'click_left'		: '좌측 클릭',//'点击左侧',
	'push_to_list'		: '목록으로 보내겠습니까?',//'将信息推送到列表',
	'wait_image_upload'	: '이미지 업로드중, 잠시 기다리세요...',//'图片上传中，请稍后...',





//---------------------------
//upload/static/js/at.js
//	'enter_username'	: 'Please enter the user name',//'请输用户名',

//---------------------------
//upload/static/js/common_extra.js
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/calendar.js
//static/js/forum_calendar.js
//static/js/home_calendar.js

	'prev_month'	: '전달',//'上一月',
	'next_month'	: '다음달',//'下一月',
	'select_year'	: '연도 선택',//'点击选择年份',
	'select_month'	: '월 선택',//'点击选择月份',
	'wday0'		: '일',//'日',
	'wday1'		: '월',//'一',
	'wday2'		: '화',//'二',
	'wday3'		: '수',//'三',
	'wday4'		: '목',//'四',
	'wday5'		: '금',//'五',
	'wday6'		: '토',//'六',
	'month'		: '월',//'月',
	'today'		: '오늘',//'今天',
	'hours'		: '시',//'点',
	'minutes'	: '분',//'分',
	'halfhour'	: 'Half hour',//'半小时',
	'ok'		: 'Ok',//'OK',

//--------------------------------
//static/js/common.js

	'open_new_win'		: '새창에서 열기',//'在新窗口打开',
	'actual_size'		: '실케 크기',//'实际大小',
	'close'			: '닫기',//'关闭',
	'wheel_zoom'		: '마우스 휠을 이용하여 이미지 확대.축소',//'鼠标滚轮缩放图片',
	'reminder'		: '통지서',//'提示信息',
	'submit'		: '확인',//'确定',
	'cancel'		: '취소',//'取消',
	'wait_please'		: '불러오는중...',//'请稍候...',
	'int_error'		: '내부 에러, 내용을 표시할 수 없습니다.',//'内部错误，无法显示此内容',
	'flash_required'	: 'Adobe Flash Player 9.0.124 나 이후 버전이 필요합니다.',//'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
	'flash_download'	: 'Flash Player 다운로드',//'下载 Flash Player',
	'day1'			: '1 일',//'一天',
	'week1'			: '1 주',//'一周',
	'days7'			: '7 일',//'7 天',
	'days14'		: '14 일',//'14 天',
	'month1'		: '1 개월',//'一个月',
	'month3'		: '3 개월',//'三个月',
	'month6'		: '6 개월',//'半年',
	'year1'			: '1 년',//'一年',
	'custom'		: '임의 입력',//'自定义',
	'permanent'		: '영구',//'永久',
	'show_all_expr'		: '모든 이모티콘 보기',//'显示所有表情',
	'page_prev'		: '이전 페이지',//'上页',
	'page_next'		: '다음 페이지',//'下页',
	'copy2clipboard'	: '클립보드에 복사',//'点此复制到剪贴板',
// ATTENTION!
// The next line must have the same value as in /template.php - 'enter_content' !!!
	'enter_search_string'	: '검색어 입력',//'请输入搜索内容',
	'refresh_q&a'		: '인증문답 보기',//'刷新验证问答',
	'refresh_code'		: '인증넘버 보기',//'刷新验证码',
	'code_invalid'		: '보안 코드가 틀렸습니다. 다시 입력하세요.',//'验证码错误，请重新填写',
	'q&a_invalid'		: '틀린 답입니다. 다시 입력하세요.',//'验证问答错误，请重新填写',
	'code_clipboard'	: '코드가 클립보드에 복사되었습니다.',//'代码已复制到剪贴板',
	'enter_link_url'	: '링크 URL 입력',//'请输入链接地址',
	'enter_link_text'	: '링크 text 입력',//'请输入链接文字',
	'enter_image_url'	: '이미지 URL 입력',//'请输入图片地址',
	'width_optional'	: '넓이 (선택)',//'宽(可选)',
	'height_optional'	: '높이 (선택)',//'高(可选)',
	'narrow_screen'		: '좁은 화면',//'切换到窄版',
	'wide_screen'		: '넓은 화면',//'切换到宽版',
	'logging_wait'		: '로그인중, 잠시 기다리세요...',//'登录中，请稍后...',
	'notices_no'		: '【　  】',//'【　　　】',
	'notices_yes'		: '【통지서】',//'【新提醒】',
	'sec_after_win_closed'	: ' 초후 창이 닫힙니다.',//' 秒后窗口关闭',
	'sec_after_page_jump'	: ' 초후 이전 페이지로 돌아갑니다.',//' 秒后页面跳转',
	'jump_now'		: '지금 이동',//'立即跳转',
	'error_message'		: '오류 메세지',//'错误信息',
	'ctrl_d_favorites'	: '즐겨찾기에 저장하려면 Ctrl + D 키를 누르세요.',//'请按 Ctrl+D 键添加到收藏夹',
	'non_ie_manually'	: '익스플로러가 아니면 직접 설정해야 합니다.',//'非 IE 浏览器请手动将本站设为首页',
	'blind_enable'		: 'Enable blind experience',//'开启盲人体验',//tc:'開啟盲人體驗',
	'blind_disable'		: 'Disable blind experience',//'关闭盲人体验',//tc:'關閉盲人體驗',

//--------------------------------
//static/js/common_diy.js

	'edit'			: '수정',//'编辑',
	'warn_not_saved'	: '데이터를 수정했습니다.나가시면 변경한 모든 내용이 없어집니다.',//'您的数据已经修改,退出将无法保存您的修改。',
	'confirm_exit'		: '나가시면 모든 변경 내용이 없어집니다. 그래도 나가시겠습니까?',//'退出将不会保存您刚才的设置。是否确认退出？',
	'select_image_upload'	: '업로드할 이미지를 선택하세요',//'请选择您要上传的图片',

//--------------------------------
//static/js/common_extra.js

	'copy_failed'		: '복사 실패. "엑세스 허용"을 선택하세요.',//'复制失败，请选择“允许访问”',
	'prev'			: '이전.',//'上一张',
	'next'			: '다음',//'下一张',

//--------------------------------
//static/js/editor.js

	'restore_size_edit'	: '편집창 크기 복원',//'恢复编辑器大小',
	'full_screen_edit'	: '전체화면 편집창',//'全屏方式编辑',
	'current_length'	: '현재 길이',//'当前长度',
	'bytes'			: '바이트',//'字节',
	'system_limit'		: '시스템 제한',//'系统限制',
	'up_to'			: '~',//'到',
	'check_length'		: '길이 체크',//'字数检查',
	'data_restored'		: '데이터가 복구되었습니다.',//'数据已恢复',
	'data_saved'		: '데이터 저장됨',//'数据已保存',
	'clear_all_sure'	: '모든 내용을 지우겠습니까?',//'您确认要清除所有内容吗？',
	'hide_content'		: '숨김할 내용 입력.',//'请输入要隐藏的信息内容',
	'free_content'		: '게시물 가격 설정시 구매전 무료보기 가능한 부분을 입력하세요.',//'如果您设置了帖子售价，请输入购买前免费可见的信息内容',
	'when_thread_replied'	: '리필 단 사람에게만 보임',//'只有当浏览者回复本帖时才显示',
	'when_points_more'	: '포인트가',//'只有当浏览者积分高于',
	'when_show'		: '이상인 사용자에게만 보임',//'时才显示',
	'table_rows'		: '가로열',//'表格行数',
	'table_columns'		: '세로열',//'表格列数',
	'table_width'		: '넓이: ',//'表格宽度: ',
	'bg_color'		: '배경색',//'背景颜色',
	'table_intro0'		: '빠른 작성 팁',//'快速书写表格提示',
	'table_intro1'		: '&quot;[tr=색상]&quot; 가로열 배경색 지정<br />&quot;[td=넓이]&quot; 세로열 넓이 지정<br />&quot;[td=열 범위,행 범위,넓이]&quot; 행열 띄어쓰기와 넓이 지정<br /><br /빠른 테이블 작성예: ',//'“[tr=颜色]” 定义行背景<br />“[td=宽度]” 定义列宽<br />“[td=列跨度,行跨度,宽度]” 定义行列跨度<br /><br />快速书写表格范例：',
	'table_intro2'		: '[table]<br />이름:|Discuz!<br />버전:|X1.5<br />[/table]',//'[table]<br />Name:|Discuz!<br />Version:|X1<br />[/table]',
	'table_intro3'		: '사용 &quot;|&quot; 가로열 분리, 만일 &quot;|&quot; 문자가 데이터 내에 있으면 ,  &quot;\\|&quot;로 바꾸어 주고, &quot;\\n&quot;로 분리하세요.',//'用“|”分隔每一列，表格中如有“|”用“\\|”代替，换行用“\\n”代替。',
	'audio_url'		: '음악 파일의 URL 입력',//'请输入音乐文件地址',
	'video_url'		: '비디오 파일의 URL 입력',//'请输入视频地址',
	'auto_play'		: '자동 시작?',//'是否自动播放',
	'flash_url'		: '플레시 파일의  URL 입력',//'请输入 Flash 文件地址',
	'enter_please'		: '입력하세요',//'请输入第',
	'nth_parameter'		: '-번째 인자',//' 个参数',
	'font'			: '글꼴',//'字体',
	'full_screen'		: '전체 화면',//'全屏',
	'restore_size'		: '크기 복귀',//'恢复',
	'general'		: '표준 모드',//'常用',
	'simple'		: '고급 모드',//'高级',
	'bad_browser'		: '브라우저가 이 기능을 지원하지 않습니다.',//'你的浏览器不支持此功能',
	'click_autosave_enable'	: '자동 저장하려면 여기를 클릭하세요',//'点击开启自动保存',
	'autosave_enable'	: '자동 저장 켜기',//'开启自动保存',
	'autosave_disable'	: '지동 저장 끄기',//'点击关闭自动保存',
	'autosave_enabled'	: '자동 저장 기능이 켜짐',//'数据自动保存已开启',
	'autosave_disabled'	: '자동 저장 기능이 꺼짐',//'数据自动保存已关闭',
	'data_saved_at'		: '데이터 이미',//'数据已于',
	'saved_time'		: '저장',//NOT REQUIRED IN ENGLISH!//'保存',
	'sec_before_saving'	: '초후 자동 저장됨',//'秒后保存',
	'insert_quote'		: '인용부호 삽입',//'请输入要插入的引用',
	'insert_code'		: '코드 삽입',//'请输入要插入的代码',
	'enter_item_list'	: '아이템 목록을 입력하세요.\r\n공란으로 두거나 취소를 누르세요.',//'输入一个列表项目.\r\n留空或者点击取消完成此列表.',
	'width'			: '넓이',//'宽',
	'height'		: '높이',//'高',
	'audio_support'		: '지원: wma, mp3, ra, rm 등<br />예: http://server/audio.wma',//'支持 wma mp3 ra rm 等音乐格式<br />示例: http://server/audio.wma',
	'video_support'		: '지원: Youku, potatoes, 56, 6, cool video 등 <br /> wmv avi rmvb mov swf flv video 포맷 <br />예: http://server/movie.wmv',//'支持优酷、土豆、56、酷6等视频站的视频网址<br />支持 wmv avi rmvb mov swf flv 等视频格式<br />示例: http://server/movie.wmv',
	'flash_support'		: '지원 플레시 포멧: swf flv <br />예: http://server/flash.swf',//'支持 swf flv 等 Flash 网址<br />示例: http://server/flash.swf',
	'paste_from_word'	: '워드로부터 붙여넣을 내용 입력',//'从 Word 粘贴内容',
	'paste_word_tip'	: '워드 문서로부터 붙여넣기 위해 단축키 (Ctrl + V)를 사용하세요.',//'请通过快捷键(Ctrl+V)把 Word 文件中的内容粘贴到上',
	'show_tips'		: '통지서',//'友情提示',
	'expire_days'		: '유효일자 (days)',//'有效天数',
	'expire_days_invalid'	: '이상 일 지난 후 태그 자동무효.',//'距离发帖日期大于这个天数时标签自动失效',
//--------------------------------
//static/js/forum.js

	'del_thread_sure'	: '인기글에서 이 글을 삭제하겠습니까?',//'您确认要把此主题从热点主题中移除么？',
	'there_are'		: '유 ',//'有',
	'new_reply_exists'	: '새 리필이 달렸습니다. 보시려면 클릭하세요',//'有新回复的主题，点击查看',
//--------------------------------
//static/js/forum_google.js

	'search_net'	: '네트워크에서 검색',//'网页搜索',
	'search_site'	: '사이트에서 검색',//'站内搜索',
	'search'	: '검색',//'搜索',

//--------------------------------
//static/js/forum_moderate.js

	'choose_tread'	: '조작할 글을 선택하세요',//'请选择需要操作的帖子',

//--------------------------------
//static/js/forum_post.js

	'internal_error'	: '내부 서버 오류',//'内部服务器错误',
	'upload_ok'		: '업로드 성공',//'上传成功',
	'ext_not_supported'	: '지원하지 않는 확장자임',//'不支持此类扩展名',
	'sorry_ext_not_supported'	: '죄송합니다, 이 확장자는 지원하지 않습니다.',//'对不起，不支持上传此类扩展名的附件。',
	'illegal_image_type'	: '잘못된 이미지 타입',//'图片附件不合法',
	'can_not_save_attach'	: '첨부파일을 저장할 수 없습니다.',//'附件文件无法保存',
	'invalid_file'		: '불법적인 파일은 올릴 수 없습니다.',//'没有合法的文件被上传',
	'illegal_operation'	: '잘못된 조작임',//'非法操作',
	'enter_content'		: '제목이나 내용을 입력하세요.',//'请完成标题或内容栏',
	'select_category'	: '글 카테고리를 선택하세요.',//'请选择主题对应的分类',
	'select_category_info'	: '글 정보에 적당한 분류를 입력하세요.',//'请选择主题对应的分类信息',
	'title_long'		: '제목 길이는 255자를 초과할 수 없습니다.',//'您的标题超过 80 个字符的限制',
	'content_long'		: '내용 길이가 요구 조건을 충족하지 않습니다.\n\n',//'您的帖子长度不符合要求。\n\n',
	'ignore_pending_attach'	: '아직 사용하지 않은 첨부 파일이 있습니다. 무시하겠습니까?',//'您有等待上传的附件，确认不上传这些附件吗？',
	'still_uploading'	: '아직 업로드 중인 파일이 있습니다. 잠시만 기다려 주세요. 완료되면 글은 자동 게시됩니다...',//'您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...',
	'no_data_recover'	: '복구할 데이터가 없습니다!',//'没有可以恢复的数据！',
	'content_overwrite'	: '경고:\n현재 내용이 저장된 내용으로 바뀝니다!\n그래도 데이터를 복구하시겠습니까?',//'此操作将覆盖当前帖子内容，确定要恢复数据吗？',
	'upload_finished'	: '업로드 완료!',//'附件上传完成！',
	'successfull'		: '성공:',//'成功',
	'failed'		: '실패:',//'失败',
	'ones'			: '개',//'个',
	'uploading'		: '업로드중...',//'上传中...',
	'select_image_files'	: '이미지 파일을 선택하세요',//'请选择图片文件',
	'delete'		: '삭제',//'删除',
	'contains'		: '포함 ',//'包含',
	'img_attached_num'	: '이미지가 첨부됨',//'个图片附件',
	'files attached_num'	: '파일이 첨부됨',//'个附件',
	'images'		: '이미지',//'图片',
	'attachments'		: '첨부파일',//'附件',
	'upload_failed'		: '업로드가 실패했습니다.',//'上传失败',

	'attach_big'		: '첨부파일 크기가 허용 용량을 초과했습니다.',//'服务器限制无法上传那么大的附件',
	'attach_group_big'	: '당신이 속한 그룹의 전체 첨부파일 크기가 허용용량을 초과헸습니다.',//'用户组限制无法上传那么大的附件',
	'attach_type_big'	: '이 파일 타입의 전체 첨부파일 크기가 허용용량이 용랴량을 초과했습니다.',//'文件类型限制无法上传那么大的附件',
	'attach_daily_big'	: '하루 허용 용량을 초과했습니다.',//'本日已无法上传更多的附件',
	'validating_q&a'	: 'Q & A 검증 중입니다. 잠시 기다리세요.',//'验证问答校验中，请稍后',
	'validating_code'	: '코드를 검증 중입니다. 잠시 기다리세요.',//'验证码校验中，请稍后',
	'attach_type_disabled'	: '이런 첨부파일은 허용되지 않습니다.',//'附件类型被禁止',
	'attach_max'		: '최대 한계',//'不能超过',
	'vote_max_reached'	: '설문의 최대수가 되었습니다: ',//'已达到最大投票数',
	'no_remote_attach'	: '죄송합니다. 원격 첨부는 허용하지 않습니다.',//'抱歉，暂无远程附件',
	'delete_post_sure'	: '이 글을 삭제하겠습니까?',//'确定要删除该帖子吗？',
	'feed_add_confirm'	: '구독권한 혹은 게시물 판매 설정을 하셨는데 팔로우 하시겠습니까?',//'由于您设置了阅读权限或出售帖，您确认还转播给您的听众看吗？',
//--------------------------------
//static/js/forum_viewthread.js

	'best_answer_sure'	: '이 글을 베스트 리필로 선정하겠습니까?',//'您确认要把该回复选为“最佳答案”吗？',
	'premoderated'		: '이 분류의 리필은 인증이 필요합니다. 인증된 후에 글이 표시됩니다.',//'本版回帖需要审核，您的帖子将在通过审核后显示',
	'credit_confirm1'	: '다운로드 가격 ',//'下载需要消耗',
	'credit_confirm2'	: ' 포인트, 다운로드 받겠습니까?',//'，您是否要下载？',
	'thread_to_clipboard'	: '글 주소가 클립보드에 복사되었습니다.',//'帖子地址已经复制到剪贴板',
	'click_to_enlarge'	: '확장하려면 클릭하세요',//'点击放大',
	'notify_on_reply'	: '리필 통지서 받기',//'接收回复通知',
	'notify_on_reply_cancel'	: '리필 통지서 취소',//'取消回复通知',
	'share_connection_failed'	: '공유 연결 실패, 나중에 다시 시도하세요.',//'分享服务连接失败，请稍后再试',
	'qq_bind'		: '당신의  QQ 계정과 연결하세요.',//'请先绑定QQ账号',
	'quote_by'		: '인용 by .*? in .*? code',//'本帖最后由 .*? 于 .*? 编辑',
	'copy_code'		: '코드 복사',//'复制代码',

//--------------------------------
//static/js/handlers.js
	'file_selected_exceed'	: '선택하신 파일 개수가 제한을 초과 했습니다.',//'您选择的文件个数超过限制。',
	'upload_number_exceed'	: '파일 업로드 가능한 상한에 도달 했습니다.',//'您已达到上传文件的上限了。',
	'can_choose_more'	: '아직 ',//'您还可以选择 ',
	'files'			: ' 개 파일 선택 가능합니다.',//' 个文件',
	'file_is_large'		: '파일이 너무 큼니다.',//'文件太大.',
	'file_is_empty'		: '0 바이트 파일 업로드 불가합니다.',//'不能上传零字节文件.',
	'file_type_disabled'	: '이 유형의 파일 업로드 금지.',//'禁止上传该类型的文件.',
	'unhandled_error'	: 'Unhandled Error',//'',
	'upload_progress'	: '업로드 중입니다. ',//'正在上传',
	'upload_cancelled'	: '취소',//'取消上传',
	'file_description'	: '이미지 설명',//'图片描述',
	'image_upload_failed'	: '이미지 업로드 실패',//'图片上传失败',
	'upload_failed'		: '업로드 실패',//'上传失败',
	'upload_completed'	: '업로드 완성.',//'上传完成.',
	'upload_error'		: '업로드 에러: ',//'',
	'config_error'		: '구성 오류',//'',
	'server_error'		: '서버 (IO) 에러',//'',
	'security_error'	: '보안 에러',//'',
	'upload_limit_exceed'	: '업로드 제한 초과.',//'',
	'file_not_found'	: '파일을 찾을수 없습니다.',//'',
	'validation_failed'	: '유효성 검사에 실패했습니다. 업로드 생략.',//'',
	'upload_stopped'	: '중단',//'',

//--------------------------------
//static/js/home.js
	'day'			: '일',//'日',
	'category_empty'	: '분류몀은 비워둘 수 없습니다!',//'分类名不能为空！',

//--------------------------------
//static/js/home_ajax.js

//	'close'			: 'Close',//'关闭',
//	'wait_please'		: 'Loading ...',//'请稍候...',

//--------------------------------
//static/js/home_blog.js

	'title_length_invalid'	: '제목 길이가 요구조건(최소 1~80 자)에 맞지 않습니다.',//'标题长度(1~80字符)不符合要求',

//--------------------------------
//static/js/home_common.js

	'show_orig_image'	: '새창에서 원본 이미지 보기',//'点击图片，在新窗口显示原始尺寸',
	'continue_sure'		: '계속하겠습니까?',//'您确定要执行本操作吗？',
	'select_item'		: '조작할 아이템을 선택하세요',//'请选择要操作的对象',
	'image_url_invalid'	: '잘못된 이미지 URL',//'图片地址不正确',
	'audio_url_invalid'	: '잘못된 오디오 URL, 비워둘 수 없습니다.',//'音乐地址错误，不能为空',

//!!!!! MayBe wrap this names!!
	'collapse'		: '축소',//'收起',
	'expand'		: '확대',//'展开',

//--------------------------------
//static/js/home_friendselector.js

	'select_max'		: '최대 선택 가능 친구',//'最多只允许选择',
	'users'			: '회원',//'个用户',
	'allready_exists'	: '이미 있음',//'已经存在',

//--------------------------------
//static/js/home_manage.js

	'you_friends_now'	: '친구가 되었습니다.',//'你们现在是好友了，接下来，您还可以：',
	'leave_message'		: '이제 메세지를 남길 수 있습니다.',//'给TA留言',
	'or'			: '또는',//'或者',
	'send_greeting'		: '인사를 보낼 수 있습니다.',//'打个招呼',
	'reply'			: '리필',//'回复',
	'comment'		: '논평',//'评论',
	'close_list'		: '목록 닫기',//'收起列表',
	'more_feeds'		: '더 보기',//'更多动态',

//--------------------------------
//static/js/home_uploadpic.js

	'image_type_invalid'	: '죄송합니다. 이런 확장자의 이미지는 지원하지 않습니다.',//'对不起，不支持上传此类扩展名的图片',
	'insert_to_content'	: '현재 커서 위치에 내용을 삽입하려면 여기를 클릭하세요.',//'点击这里插入内容中当前光标的位置',
	'insert'		: '삽입',//'插入',
	'image_description'	: '이미지 설명',//'图片描述',
	'uploading_wait'	: '업로드중, 잠시 기다리세요',//'上传中，请等待',
	'retry'			: '재시도',//'重试',

//--------------------------------
//static/js/portal.js

	'delete_sure'		: '이 데이터를 삭제하겠습니까?',//'您确定要删除该数据吗？',
	'ignore_sure'		: '이 데이터를 무시하겠습니까?',//'您确定要屏蔽该数据吗？',
	'to'			: '보낼 곳',//'到',

	'choose_block'		: '블럭 선택',//'选择模块',
	'blocks_found1'		: '발견됨',//'找到',
	'blocks_found2'		: '해당 블럭 있음',//'个相应的模块',
	'blocks_not_found'	: '해당 블럭 없음',//'没有相应的模块',
	'select_block'		: '블럭을 선택하세요!',//'请选择一个模块！',
	'show_settings'		: '설정 보기',//'展开设置项',
	'hide_settings'		: '설정 숨기기',//'收起设置项',
	'block_name_empty'	: '블럭 이름은 비워둘 수 없습니다.',//'模块标识不能为空',
	'block_convert_sure'	: '블럭을 변환하겠습니까?',//'你确定要转换模块的类型从',
	'back'			: '뒤로',//'返回',
	'settings_expand'	: '설정 펼치기',//'展开设置项',
	'settings_hide'		: '설정 숨기기',//'收起设置项',
	'custom_content_error'	: 'Custom 내용 오류! HTML 코드: ',//'自定义内容错误，',
	'html_error'		: 'HTML 코드: ',//'HTML代码：',
	'tags_not_match'	: ' - 태그가 틀립니다.',//' 标签不匹配',
	'entered'		: '입력한 ',//'已输入 ',
	'exceed'		: '초과',//'超出 ',
	'title_length_bad'	: '제목 길이가 정확하지 않습니다.',//'标题长度不正确',
	'summary_length_bad'	: '소개 길이가 정확하지 못합니다.',//'简介长度不正确',

//--------------------------------
//static/js/portal_diy.js

	'choose_style'		: '스타일 선택',//'选择样式',
	'style'			: '스타일',//'样式',
	'style1'		: '스타일1',//'样式1',
	'style2'		: '스타일2',//'样式2',
	'style3'		: '스타일3',//'样式3',
	'style4'		: '스타일4',//'样式4',
	'style5'		: '스타일5',//'样式5',
	'style6'		: '스타일6',//'样式6',
	'style7'		: '스타일7',//'样式7',
	'no_border'		: '프레임 경계선 없음',//'无边框框架',
	'no_border_no_margin'	: '경계선 없음, 외부여백 없음',//'无边框且无边距',

	'title'			: '제목',//'标题',
	'attribute'		: '속성',//'属性',
	'data'			: '데이터',//'数据',
	'update'		: '업데이트',//'更新',
	'export'		: '내보내기',//'导出',
	'repeat'		: '반복',//'平铺',
	'no_repeat'		: '반복안함',//'不平铺',
	'repeat_x'		: '수평 반복',//'横向平铺',
	'repeat_y'		: '수직 반복',//'纵向平铺',
	'no_style'		: '스타일 없음',//'无样式',
	'solid_line'		: '실선',//'实线',
	'dotted_line'		: '점선',//'点线',
	'dashed_line'		: '넓은 점선',//'虚线',
	'link'			: '링크',//'链接',
	'border'		: '경계',//'边框',
	'size'			: '크기',//'大小',
	'color'			: '색',//'颜色',
	'separate_config'	: '설정 분리',//'分别设置',
	'right'			: '우측',//'右',
	'bottom'		: '하단',//'下',
	'top'			: '상단',//'上',
	'left'			: '좌측',//'左',
	'margin'		: '외부여백',//'外边距',
	'padding'		: '내부여백',//'内边距',
	'bg_image'		: '배경 이미지',//'背景图片',
	'class'			: '지정 클래스',//'指定class',
	'block'			: '블럭',//'模块',
	'frame'			: '프레임',//'框架',
	'onclick'		: '클릭',//'点击',
	'onmouseover'		: '스침',//'滑过',
	'switch_type'		: '스위치 형태',//'切换类型',
	'image'			: '이미지',//'图片',
	'position'		: '위치',//'位置',
	'align_left'		: '좌측 정렬',//'居左',
	'align_right'		: '우측 정렬',//'居右',
	'offset'		: '오프셋',//'偏移量',
//!!! mainly the same as 'color' !!!!!!
//	'colour'		: 'Colour',//'色',
	'add_new_title'		: '새 제목 추가',//'添加新标题',
	'delete_this_sure'	: '삭제하겠습니까? 일단 삭제하면 복구할 수 없습니다.',//'您确实要删除吗,删除以后将不可恢复',
	'loading_content'	: '내용 불러오는 중...',//'正在加载内容...',
	'modified_import'	: '내용을 수정을 했습니다. 저장 후에 불러 오세요. 그렇지 않으면 이번에는 수정내용이 반영되지 않습니다.',//'您已经做过修改，请保存后再做导出，否则导出的数据将不包括您这次所做的修改。',
	'total'			: '총 ',//'共',
	'blocks'		: '블럭',//'个模块',
	'updating_the'		: '업데이트번호 #',//'正在更新第',
	'done'			: '완료',//'已完成',
	'start_updating'	: '업데이트 시작...',//'开始更新...',
	'update_block_data'	: '블럭 데이터 업데이트',//'更新模块数据',
	'clear_diy_sure'	: '현재 페이지의 DIY를 지우겠습니까? 지우면 되돌릴 수 없습니다.',//'您确实要清空页面上所在DIY数据吗,清空以后将不可恢复',
	'frame_not_found'	: '경고: 프레임이 없습니다. 먼저 프레임을 추가하세요.',//'提示：未找到框架，请先添加框架。',
	'apply_all_pages'	: '모든 페이지에 적용',//'应用于此类全部页面',
	'apply_current_page'	: '현재 페이지에 적용',//'只应用于本页面',
	'save_temp_sure'	: '임시 데이터를 저장하겠습니까?<br />저장하려면 확인 버튼을 클릭하고 취소하려면 취소 버튼을 클릭하세요.',//'是否保留暂存数据？<br />按确定按钮将保留暂存数据，按取消按钮将删除暂存数据。',
	'save_temp'		: '임시 데이터 저장',//'保留暂存数据',
	'revert_last_saved'	: '저장된 결과의 이전 버전으로 돌아가겠습니까?',//'您确定要恢复到上一版本保存的结果吗？',
	'continue_temp_sure'	: '임시 데이터로 DIY 작업을 계속하겠습니까?',//'是否继续暂存数据的DIY？',
	'update_completed'	: '업데이트가 완료되었습니다.',//'已更新完成。',
	'tab_label'		: '탭 라벨',//'tab标签',
	'temp_action'		: '현재 스타일에 임시 데이터를 불러오려면 계속 버튼을 클릭하시고.<br />삭제하려면 삭제 버튼을 클릭하세요.',//'按继续按钮将打开暂存数据并DIY，<br />按删除按钮将删除暂存数据。',
	'continue'		: '계속',//'继续',
	'block_no_rights'	: '죄송합니다. 편집모듈 추가 권한이 없습니다.',//'抱歉，您没有权限添加或编辑模块',

//--------------------------------
//static/js/portal_diy_data.js
	'data_manage'		: '모듈 데이터를 직접 관리 가능.',//'可直接管理模块数据',
	'quit'			: '종료',//'退出',
//--------------------------------
//static/js/qshare.js
	'from_tencent'		: '나는 오픈 플랫폼인 텐센트 마이크로 블로깅으로부터 왔습니다.',//"\u6211\u6765\u81EA\u4E8E\u817E\u8BAF\u5FAE\u535A\u5F00\u653E\u5E73\u53F0",

//--------------------------------
//static/js/register.js

	'username_invalid'	: '이름에 적합하지 않은 문자가 있습니다.',//'用户名包含敏感字符',
	'username_short'	: '이름은 최소 3자 이상이어야 합니다.',//'用户名小于 3 个字符',
	'username_long'		: '이름은 최대 15자 이하여야 합니다.',//'用户名超过 15 个字符',
	'passwords_not_equal'	: '두번 입력하신 비밀번호가 일치하지 않습니다.',//'两次输入的密码不一致',
	'email_invalid'		: '이메일 주소에 적합하지 않은 문자가 있습니다.',//'Email 包含敏感字符',
	'invite_code_invalid'	: '초대 코드에 적합하지 않은 문자가 있습니다.',//'邀请码包含敏感字符',
	'password_fill'		: '비밀번호를 입력하세요',//'请填写密码',
	'password_again'	: '비밀번호를 다시 한번 입력하세요',//'请再次输入密码',
	'email_fill'		: '이메일 주소를 입력하세요',//'请输入邮箱地址',
	'length_min'		: ', 최소 길이는',//', 最小长度为 '
	'chars'			: ' 개 문자',//' 个字符',
	'password_strength'	: 'Password strength: ',//'密码强度:',
	'pw_weak'		: '약',//'弱',
	'pw_middle'		: '중',//'中',
	'pw_strong'		: '강',//'强',
	'pass_short'		: '비밀번호가 너무 짧습니다. 최소',//'密码太短，不得少于 ',
	'digital'		: '수자',//'数字',
	'lowercase'		: '소문자 포함된 조합으로 입력하여 주세요.',//'小写字母',
	'capitals'		: '대문자',//'大写字母',
	'specials'		: '특수기호',//'特殊符号',
	'pw_weak_info'		: '비밀번호가 약합니다, ',//'密码太弱，密码中必须包含 ',

//--------------------------------
//static/js/seditor.js
	'enter_username'	: '사용자 명을 입력하여 주세요',//'请输用户名',
	'at_friend'		: '@친구 계정 하시면 친구에게 게시물을 볼수있도록 알려줍니다.',//'@朋友账号，就能提醒他来看帖子',

//--------------------------------
//static/js/smilies.js

//--------------------------------
//static/js/space_diy.js

	'save_js'		: '자바스크립트는 저장 후 보입니다.',//'javascript脚本保存后显示',
	'settings'		: '설정',//'设置',

//---------------------------
//static/js/swfupload.js

	'attach_file'		: '첨부파일',

//---------------------------
//static/js/threadsort.js

	'select_please'		: '선택하세요',//'请选择',
	'required_fill'		: '요구 항목이 다 채워지지 않았습니다.',//'必填项目没有填写',
	'select_next_level'	: '다음 단계를 선택하세요',//'请选择下一级',
	'numeric_invalid'	: '숫자는 쓸 수 없습니다.',//'数字填写不正确',
	'email_invalid'		: '이메일 주소가 틀렸습니다.',//'邮件地址不正确',
	'text_too_long'		: '항목 값이 너무 깁니다.',//'填写项目长度过长',
	'value_is_greater'	: '최대 허용값보다 큽니다.',//'大于设置最大值',
	'value_is_less'		: '최소 허용값보다 작습니다.',//'小于设置最小值',
	'enter_valid_url'	: ' http://으로 시작되는 정확안 URL 주소를 입력하여 주세요.',//'请正确填写以http://开头的URL地址',

//--------------------------------
//static/js/upload.js

	'file_not_supported'	: '죄송합니다. 이 파일 타입은 지원하지 않습니다.',//'对不起，不支持上传此类文件',

//-------------------------------------
//source/function/function_admincp.php
	'version_uptodate'	: '당신은 최신 Discuz! 프로그램을 사용하고 있습니다. 주기적 업그레이드를 하려면 아래 팁을 참고하세요.',

//-------------------------------------
//api/manyou/cloud_iframe.js
	'add_operation'		: '조작 추가',//'&#28155;&#21152;&#21040;&#24120;&#29992;&#25805;&#20316;',

//--------------------------------------------
//static/js/googlemap.js + static/js/editor.js

	'map_title'		: '구글 지도',//'google图',
	'map_insert'		: '구글 지도 삽입',//'插入google地图',
	'map_insert_tips'	: '주소 찾기로 구글 지도 삽입 (현재는 한 주소만 지원!)',//'通过搜索插入google地图（暂只支持单点标注）！',
	'map_center_changed'	: '지도 중심이 변경되었습니다.!',//'地图中心已经改变！',
	'map_wrong_address'	: '틀린 주소입니다! 현재 주소는 없습니다.',//' 地址错误，未找到当前地址',

//-------------------------------------
//	''	: '',//'',

'fiction'	: ''

};
