<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *      Convert Language File
 *      $Id: utility/convert/language/lang.php by Valery Votintsev at sources.ru
 */
$lang = array(

	'config_dbhost'		=> '데이터뱅크서버',//'数据库服务器',
	'config_dbuser'		=> '데이터뱅크사용자명',//'数据库用户名',
	'config_dbpw'		=> '데이터뱅크비밀번호',//'数据库密码',
	'config_dbname'		=> '데이터뱅크',//'数据库',
	'config_tablepre'	=> '테이블 접두사',//'数据表前缀',
	'config_dbcharset'	=> '데이터베이스 문자셋 (선태가능)',//'数据表字符集 (可选)',
	'config_pconnect'	=> '연결 장시간 유지',//'持久连接',

	'config_type_source'	=> '소스 데이터베이스 설정 (기존버번의 데이터뱅크)',//'数据源服务器设置 (原始版本的数据库)',
	'config_type_target'	=> '목표서버 세팅 (Discuz! X 데이터뱅크 세팅이 완료되였습니다.)',//'目标服务器设置 (已正确安装 Discuz! X 的数据库)',
	'config_type_ucenter'	=> 'UCenter서버 세팅 (UCenter의 데이터뱅크 세팅이 완료되였습니다.)',//'UCenter 服务器设置 (已正确安装 UCenter 的数据库)',

	'config_type_target_comment'	=> '주의: 목표 데이터뱅크의 데이터가 교체되거나 업되오니 중요한 내용이 있으면 백업하시면 됩니다. ',//'注意：目标数据库的数据将会被替换或者更新,如当中含有重要内容,请先备份',
	'config_write_error'	=> '전환프로그램의 data/ 디렉토리 쓰기 권한이 없습니다, 777 권한을 설정,이 디렉토리는 쓰기 권한이 있는지 확인하십시오',//'转换程序的 data/ 目录不可写,请确保此目录的可写权限,设置 777 属性',

	'config_save'		=> '서버세팅저장',//'保存服务器设置',
	'config_usergroup'	=> '사용그룹세팅',//'用户组配置',
	'config_from_usergroup'	=> '소스 사용자 그룹',//'来源用户组',
	'config_target_usergroup'	=> '목표사용그룹',//'目标用户组',
	'config_extcredits'	=> '포인트배치',//'积分配置',
	'config_credit'		=> '포인트',//'积分',
	'config_from_credit'	=> '소스 포인트',//'来源积分',
	'config_target_credit'	=> '목표 포인트',//'目标积分',
	'config_experience'	=> '경험치',//'经验值',
	'config_convert_forum'	=> '포럼 데이터 변환 설정',//'数据转换配置',
	'config_from_data'	=> '소스 데이터',//'源数据',
	'config_target_forum'	=> '목표 토론장',//'目标版块',
	'config_poll'		=> '투표',//'投票',
	'config_event'		=> '이벤트',//'活动',
	'config_auto_create'	=> '자동생성',//'自动创建',
	'config_convert'	=> '변환설정 저장',//'保存转换配置',

	'submit'		=> '확인',//'提  交',

	'message_return'	=> '돌아가기',//'返回上一步',
	'message_stop'		=> '정지',//'停止运行',
	'message_not_enabled_extcredit'	=> '신 시스템중에는 최소 1가지 포인트가 오픈되여야 다음단계의 전환진행이 가능합니다.',//'新系统中至少应开启一个积分,否则无法进行下一步转换',

	'ok'			=> '&nbsp;&nbsp;OK&nbsp;&nbsp;',//'&nbsp;确&nbsp;&nbsp;定&nbsp;',
	'cancel'		=> '&nbsp;Cancel&nbsp;',//'&nbsp;取&nbsp;消&nbsp;',
	'return'		=> '되돌아가주세요',//'请返回',
	'tips'			=> '도움말',//'技巧提示',
	'tips_pconnect'		=> '참고 : 원본 데이터베이스와 대상 데이터베이스가 동일한 서버에 위치하는 경우, 0으로 설정, 그렇지 않으면 1로 설정',//'注意：如果源数据库与目标数据库在同一服务器，该项必须设置为0，否则设置为1',

	'mysql_config_error'	=> 'MySQL의 설정은 비워둘 수 없습니다',//'配置不能为空',
	'mysql_connect_error'	=> 'MySQL 연결실패',//'连接失败',

	'config_success'	=> '서버세팅이 성공적으로 완성되여 다음 단계를 진행합니다.',//'服务器配置成功,现在进行下一步',

	'setting_tips'		=> '변환 설정을 수정하는 것은 낮은 변환 효율을 일으킬하거나 전환을 완료하는 데 실패할 수 있으므로 수정 조심하세요',//'修改转换程序设置可能导致您的转换效率降低或者无法正常完成转换,所以请您务必小心修改',

	'mysql_connect_error_1'	=> '데이터베이스 연결 오류, 데이터베이스 계정과 암호 정확 여부 확인.',//'数据库连接错误,请检查数据库密码和帐号是否正确',
	'mysql_connect_error_2'	=> '데이터 테이블 검사 에러. "테이블 접두어"가 정확하지 못하거나 해당 버전의 프로그램을 설치하지 않았음.',//'数据表检查错误,您可能没有正确填写 “数据表前缀”或者您尚未安装该版本的程序',

//---------------------------
	'invalid_request'	=> '불법요청',//'非法请求',

//---------------------------
//convert/include/do_config.inc.php

	'config_delete'			=> '세팅아이템이 나타나지 않으면 data/config.inc.php 파일을 삭제해 주세요.',//'如果无法显示设置项目,请删除文件 data/config.inc.php',

//---------------------------
//convert/include/do_convert.inc.php

	'select_convert_process'	=> '우선먼저 전환프로그램을 선택하여 주세요.',//'请首先选择转换程序',
	'update_start_time'	=> '업데이트시작시간:',//'升级开始时间：',
	'elapsed_time'		=> '업데이트프로그램이 이미 실행중입니다.',//'升级程序已经执行了',
	'days'			=> '일',//'天',
	'hours'			=> '시간',//'小时',
	'minutes'		=> '분',//'分',
	'seconds'		=> '초',//'秒',
	'progress'		=> '지금 전환프로그램이 실행중입니다.',//'目前正在执行转换程序',
	'progress_intro1'	=> '전환와중에 여러번 페이지이전이 있을수 있으니 브라우저를 끄지 마세요!',//'转换过程中需要多次跳转,请勿关闭浏览器.',
	'progress_intro2'	=> '프로그램이 정지되거나 재 진행하시려면 클릭하세요.',//'如果程序中断或者需要重新开始当前程序,请点击',
	'restart'		=> '재 진행',//'重新开始',
	'process_finished'	=> '전환프로그램이 집행 완료되였습니다.지금 다음 프로그램 진행으로 이전 됩니다.',//'转换程序 执行完毕, 现在跳转到下一个程序',
	'process_not_found'	=> '데이터전환이 중단되였습니다. 전환프로그램을 찾을수가 없습니다. ',//'数据转换中断! 无法找到转换程序 ',
	'process_all_finished'	=> '전화프로그램이 전부 집행완료 되였습니다.',//'转换程序全部运行完毕',

//---------------------------
//convert/include/do_finish.inc.php

	'conversion_completed'	=> '축하합니다! 데이터전환이 성공적으로 완료되였습니다.',//'您已经顺利的完成了数据转换!',
	'start_time'		=> '이번 업그레이드 시작 시간',//'本次升级开始时间',
	'end_time'		=> '이번 업데이트 마감 시간',//'本次升级结束时间',
	'execution_time'	=> '업그레이드 누계 집행시간',//'升级累计执行时间',
	'update_more'		=> '일반상황에서 귀하께서는 다음 제시내용에 따라 업그레이드를 계속 진행 하셔야 될 경우도 있습니다. ',//'通常情况下,您可能还需要按照以下提示继续进行升级,从而使您的新程序正常运行',
	'read_me'		=> '마지막설명 (readme)',//'最后的说明(readme)',

//---------------------------
//convert/include/do_select.inc.php

	'you_selected'		=> '귀하께서는 선택하셨습니다.',//'您选择了',
	'process_number'	=> '개의 전환 프로그램 실행됩니다.',//'个转换程序,下面开始转换',
	'process_intro'		=> 'Usually, all the data you need to perform the following conversion table, unless you are in the course of an unexpected disruption or have special needs, choose only if necessary',//'通常情况下,您需要执行下面所有数据表的转换,除非您在执行过程中出现了意外的中断或者有特殊需求,才进行必要的选择',
	'process_configure'	=> '변환 프로세스 설정',//'配置转换过程',
	'select_all'		=> '전부선택',//'全选',
	'run_before_convert'	=> '전환전 운행되였던 프로그램.',//'转换之前运行的程序',
	'table_convert'		=> '데이터 테이블 전환 프로세서',//'数据表转换程序',
	'other_convert'		=> '기타보조 전환프로그램.',//'其他辅助转换程序',
	'start_conversion'	=> '전환시작',//'开始转换',

//---------------------------
//convert/include/do_setting.inc.php

	'edit_file'		=> '설정파일을 편집',//'编辑配置文件',
	'r/o'			=> ' 읽기만 가능 ',//' 只读 ',
	'settings_saved_ok'	=> '세팅이 성공적으로 완료,저장 되였습니다.',//'设置已经更新完毕并成功保存',
	'file_is_ro'		=> '이 파일은 읽기만 가능하오니 저장이 안됩니다. 되돌아 주세요.',//'该设置文件为只读文件,无法保存,请返回',
	'settings_not_changed'	=> '아무런 세팅조작이 없었습니다.',//'您没有改变任何设置',

//---------------------------
//convert/include/do_source.inc.php

	'update_permissions'	=> '전환 시작전 본 프로그램목록중의 data목록에대해 편집권한이 있는지 환인 바랍니다.',//'在开始转换之前,请确保本程序目录下的 data 目录为可写权限,否则无法存储转换设置',
	'update_forum_too'	=> 'Discuz! 와 UChome 동시에 업그레이드 하셔야 된다면 필이 Discuz!포럼부터 업그레이드 진행하여 주세요.',//'如果有Discuz!和UChome同时需要升级,请务必先升级Discuz!论坛',
	'update_choose_process'	=> '전환프로그램을 정확이 선택하여 주시기 바랍니다. 그렇지 않으면 전환에 실패 하실수도 있습니다.',//'请正确选择转换程序,否则可能造成无法转换成功',
	'update_more_space'	=> '본 전환프로그램은 기존 데이터를 파괴하지 않는대신 전환진행에는 기존 데이터공간의 2배이상이 필요합니다.',//'本转换程序不会破坏原始数据,所以转换需要2倍于原始数据空间',
	'source_version'	=> '기존버전',//'原始版本',
	'target_version'	=> '목표버전',//'目标版本',
	'introduction'		=> '소개',//'简介',
	'description'		=> '설명',//'说明',
	'settings'		=> '세팅',//'设置',
	'view_readme'		=> '보기',//'查看',
	'change'		=> '수정',//'修改',
	'start'			=> '시작',//'开始',

//---------------------------
//convert/include/global.func.php

	'jan'	=> ' 1월 ',//'一月',
	'feb'	=> ' 2월 ',//'二月',
	'mar'	=> ' 3월 ',//'三月',
	'apr'	=> ' 4월 ',//'四月',
	'may'	=> ' 5월 ',//'五月',
	'jun'	=> ' 6월 ',//'六月',
	'jul'	=> ' 7월 ',//'七月',
	'aug'	=> ' 8월 ',//'八月',
	'sep'	=> ' 9월 ',//'九月',
	'oct'	=> ' 10월 ',//'十月',
	'nov'	=> ' 11월 ',//'十一月',
	'dec'	=> ' 12월 ',//'十二月',
	'am'	=> ' AM ',//'上午',
	'pm'	=> ' PM ',//'下午',

	'prompt'		=> '시스템 통지서.',//'系统提示',
	'dzx_update'		=> 'Discuz!X 시리즈 제품 업그레이드 전환.',//'Discuz! X 系列产品升级转换',
	'dzx_update_wizard'	=> 'Discuz!X 시리즈 제품 업그레이드/전환 가이드.',//'Discuz! X 系列产品升级/转换 向导',
	'step1'		=> '1. 제품 전환프로그램을 선택하여 주세요.',//'1.选择产品转换程序',
	'step2'		=> '2. 서버정보세팅',//'2.设置服务器信息',
	'step3'		=> '3. 설정전환 과정',//'3.配置转换过程',
	'step4'		=> '4. 데이터 변환 집행',//'4.执行数据转换',
	'step5'		=> '5. 전환완성',//'5.转换完成',

//---------------------------
//convert/source/d7.2_x1.0/pollvoter.php++

	'continue_convert_table '	=> '계속해서 데이터 테이블 변환 ',//'继续转换数据表 ',
	'was_converted'			=> '. 이미 변환: ',//', 已转换 ',
	'records'			=> '기록9',//'条记录',


//---------------------------
//convert/source/d7.2_x1.0/table/access.php

	'from'	=> ' 부터 ',//' 从 ',
	'to'	=> ' 까지 ',//' 至 ',
	'lines'	=> ' lines.',//' 行',

//---------------------------
//convert/source/d7.2_x1.0/threadtype.php++

	'convert_thread_type'	=> '스레드 유형 테이블 계속해서 변환',//'继续转换主题分类数据表',

//---------------------------
//convert/source/d7.2_x1.5/table/activityapplies.php

	'contacts'	=> ' 연락방식: ',//' 联系方式:',

//---------------------------
//convert/source/d7.2_x2.0/table/moderators.php

	'converted'	=> ', 이미전환 ',//'，已转换',
	'records'	=> ' 개의 기록.',//'条记录。',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_event.php++

	'uchome_data'	=> 'UCHome 데이터',//'UCHome数据',
	'uchome_events'	=> 'UCHome 이벤트',//'UCHome活动',
	'uchome_events_convert'	=> 'UCenter Home 에서부터 이전된 이벤트내용.',//'从 UCenter Home 转移过来的活动内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_group.php++

	'group_home'	=> '그룹홈',//'空间群组',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_magic.php++

	'user_magic'	=> ' 사용자 아이템',//'用户道具',
	'magic_records'	=> '아이템 수입 기록',//'道具收入记录',
	'magic_use_records'	=> '아디템 사용 내역',//'道具使用记录',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_poll.php++

	'uchome_polls'	=> 'UCHome 투표 데이터',//'UCHome投票数据',
	'uchome_polls_convert'	=> 'UCenter Home 에서 이전해온 투표내용.',//'从 UCenter Home 转移过来的投票内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_space.php++

	'space_home_error'	=> '에러: 포인트 대응 관계 정보를 설정해 주세요.',//'发生错误,请配置积分对应关系信息',
);