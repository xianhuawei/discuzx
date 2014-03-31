<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
	Translated to Korean by ionobgy
 */

define('UC_VERNAME', 'English Version');

$lang = array(
	'SC_GBK'		=> 'Simplified Chinese GBK encoding',//'简体中文版',
	'TC_BIG5'		=> 'Traditional Chinese BIG5 encoding',//'繁体中文版',
	'SC_UTF8'		=> 'Simplified Chinese UTF8 encoding',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditional Chinese UTF8 encoding',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install'		=> SOFT_NAME.' 설치 마법사',//SOFT_NAME.' 安装向导',
	'agreement_yes'		=> '동의함',//'我同意',
	'agreement_no'		=> '동의하지 않음',//'我不同意',
	'notset'		=> '제한없음',//'不限制',//????? No limits, Not limited

	'message_title'		=> '알림',//'提示信息',
	'error_message'		=> '오류 메세지',//'错误信息',
	'message_return'	=> '복귀',//'返回',
	'return'		=> '복귀',//'返回',
	'install_wizard'	=> '설치 마법사',//'安装向导',
	'config_nonexistence'	=> 'Configuration 파일이 없음',//'配置文件不存在',
	'nodir'			=> '폴더가 없음',//'目录不存在',
	'redirect'		=> '브라우저가 자동으로 이전 페이지로 돌아갑니다.<br>프레임을 지원하지 않는 브라우저라면 여기를 누르세요',//'浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'auto_redirect'		=> '브라우저가 자동으로 이전 페이지로 돌아갑니다.',//'浏览器会自动跳转页面，无需人工干预',
	'database_errno_2003'	=> '데이터베이스에 연결할 수 없음, 데이터베이스 서버 이름이 맞는지 서버가 가동 중인지 확인하세요.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> '새 데이터베이스를 만들 수 없음, 데이터베이스 이름이 올바른지 확인하세요p.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> '데이터베이스에 연결할 수 없음. 데이터베이스 사용자와 암호가 올바른지 확인하세요.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064'	=> 'SQL 구문 오류',//'SQL 语法错误',

	'dbpriv_createtable'	=> '테이블 작성권한이 없어 설치를 계속할 수 없음.',//'没有CREATE TABLE权限，无法继续安装',
	'dbpriv_insert'		=> '데이터 삽입 권한이 없어 설치를 계속할 수 없음.',//'没有INSERT权限，无法继续安装',
	'dbpriv_select'		=> 'SELECT 권한이 없어 설치를 계속할 수 없음.',//'没有SELECT权限，无法继续安装',
	'dbpriv_update'		=> 'UPDATE 권한이 없어 설치를 계속할 수 없음.',//'没有UPDATE权限，无法继续安装',
	'dbpriv_delete'		=> 'DELETE 권한이 없어 설치를 계속할 수 없음.',//'没有DELETE权限，无法继续安装',
	'dbpriv_droptable'	=> 'TABLE 삭제 권한이 없어 설치를 계속할 수 없음.',//'没有DROP TABLE权限，无法安装',

	'db_not_null'		=> 'UCenter 데이터베이스가 이미 설치되 있음. 설치를 진행하면 기존 데이터는 삭제됩니다.',//'数据库中已经安装过 UCenter, 继续安装会清空原有数据。',
	'db_drop_table_confirm'	=> '설치를 계속하면 기존 데이터가 삭제됩니다. 계속하시겠습니까?',//'继续安装会清空全部原有数据，您确定要继续吗?',

	'writeable'		=> '쓰기 가능',//'可写',
	'unwriteable'		=> '쓰기 불가능',//'不可写',
	'old_step'		=> '이전 단계',//'上一步',
	'new_step'		=> '다음 단계',//'下一步',

	'database_errno_2003'	=> '데이터베이스에 연결할 수 없음, 데이터베이스 서버 이름이 맞는지 서버가 가동 중인지 확인하세요.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> '새 데이터베이스를 만들 수 없음, 데이터베이스 이름이 올바른지 확인하세요p.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> '데이터베이스에 연결할 수 없음. 데이터베이스 사용자와 암호가 올바른지 확인하세요.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_connect_error'	=> '데이터베이스 연결 오류.',//'数据库连接错误',

	'step_title_1'		=> '환경 설정 확인',//'检查安装环境',
	'step_title_2'		=> '환경 설정',//'设置运行环境',
	'step_title_3'		=> '데이터베이스 생성',//'创建数据库',
	'step_title_4'		=> '설치',//'安装',
	'step_env_check_title'	=> '설치 시작',//'开始安装',
	'step_env_check_desc'	=> '환경 설정을 확인하고 파일과 폴더 권한을 확인하세요.',//'环境以及文件目录权限检查',
	'step_db_init_title'	=> '데이터베이스 설치',//'安装数据库',
	'step_db_init_desc'	=> '데이터베이스 설치 시작',//'正在执行数据库安装',

	'step1_file'		=> '파일 목록',//'目录文件',
	'step1_need_status'	=> '요구사항',//'所需状态',
	'step1_status'		=> '상태',//'当前状态',
	'not_continue'		=> '빨간 십자가 표시된 부분들을 수정하세요.',//'请将以上红叉部分修正再试',

	'tips_dbinfo'		=> '데이터베이스 정보 설정',//'填写数据库信息',
	'tips_dbinfo_comment'	=> '',//'',
	'tips_admininfo'	=> '관리자 정보 설정',//'填写管理员信息',
	'step_ext_info_title'	=> '성공적으로 실치됨.',//'安装成功。',
	'step_ext_info_comment'	=> '로그인하려면 클릭하세요',//'点击进入登陆',

	'ext_info_succ'		=> '성공적으로 설치됨.',//'安装成功。',
	'install_submit'	=> '확인',//'提交',
	'install_locked'	=> '이전 설치시 생성된 잠금 파일이 있습니다.<br><br>다시 설치하기 하시려면 다음 파일을 삭제하세요.<br />'.str_replace(ROOT_PATH, '', $lockfile),//'安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> '설치를 계속하려면 위 문제를 완료해야 합니다.',//'您必须解决以上问题，安装才可以继续',

	'step_app_reg_title'	=> '환경 설정',//'设置运行环境',
	'step_app_reg_desc'	=> '서버 환경 설정을 확인하고  UCenter를 설정하세요.',//'检测服务器环境以及设置 UCenter',
	'tips_ucenter'		=> 'UCenter를 위한 정보를 입력하세요.',//'请填写 UCenter 相关信息',
	'tips_ucenter_comment'	=> 'UCenter는 Comsenz 회사의 핵심 제품입니다. Discuz! Board나 다른 Comsenz 제품은  이 프로그램에 의존합니다. 만일 당신이 이미 UCenter를 설치했다면 아래 정보를 입력하시고 그렇지 않으면 <a href="http://www.discuz.com/" target="blank">Comsenz 제품</a>으로 가서 UCenter를 다운 받아 설치하세요.',//'UCenter 是 Comsenz 公司产品的核心服务程序，Discuz! Board 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。',

	'advice_mysql_connect'		=> 'Mysql 모듈이 제대로 로드되었는지 확인하세요.',//'请检查 mysql 模块是否正确加载',
	'advice_fsockopen'		=> '이 기능은 php.ini에 <b>allow_url_fopen</b> 옵션이 <b>On</b> 되어 있어야 합니다. 문제를 해결하기 위해서는 서버 관리자에게 문의하시기 바랍니다.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_gethostbyname'		=> 'PHP 환경 설정은 <b>gethostbyname</b> 기능에 의해  가능하지 않습니다. 문제를 해결하기 위해서는 서버 관리자에게 문의하시기 바랍니다.',//'是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> '이 기능은 in php.ini에 <b>allow_url_fopen</b> 옵션이 <b>On</b> 되어 있어야 합니다. 문제를 해결하기 위해서는 서버 관리자에게 문의하시기 바랍니다.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml_parser_create'	=> '이 기능은 당신의 php가 XML을 지원해야 합니다. 문제를 해결하기 위해서는 서버 관리자에게 문의하시기 바랍니다.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',

	'ucurl'				=> 'UCenter URL',//'UCenter 的 URL',
	'ucpw'				=> 'UCenter 관리자 암호',//'UCenter 创始人密码',
	'ucip'				=> 'UCenter IP 주소',//'UCenter 的IP地址',
	'ucenter_ucip_invalid'		=> '적합하지 않은 형식임. 올바른 IP 주소를 넣으세요.',//'格式错误，请填写正确的 IP 地址',
	'ucip_comment'			=> '대개는 공란으로 두면 됩니다.',//'绝大多数情况下您可以不填',

	'tips_siteinfo'			=> '사이트 정보를 넣으세요.',//'请填写站点信息',
	'sitename'			=> '사이트 이름',//'站点名称',
	'siteurl'			=> '사이트 URL',//'站点 URL',

	'forceinstall'			=> '수동 설치',//'强制安装',
	'dbinfo_forceinstall_invalid'	=> '현재 데이터베이스 테이블 접두사가 이미 사용중입니다! 예전 데이터의 삭제를 피하기 위해 "테이블 이름 접두사"를 변경할 수 있고 필수 설치를 선택할 수도 있습니다. 필수 설치시 예전 데이터가 삭제되면 다시 복구할 수 없습니다.',//'当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复',

	'click_to_back'			=> '뒤로 가려면 클릭하세요',//'点击返回上一步',
	'adminemail'			=> '관리자 이메일',//'系统信箱 Email',
	'adminemail_comment'		=> '오류 보고를 위해 사용됨.',//'用于发送程序错误报告',
	'dbhost_comment'		=> '데이터베이스 서버 호스트 주소. 대개는 localhost임',//'数据库服务器地址, 一般为 localhost',
	'tablepre_comment'		=> '같은 데이터베이스로 여러 프로그램을 설치하려면 테이블 접두사를 변경하세요.',//'同一数据库运行多个论坛时，请修改前缀',
	'forceinstall_check_label'	=> '모든 데이터를 삭제하고 필수 설치를 원합니다!',//'我要删除数据，强制安装 !!!',

	'uc_url_empty'			=> 'UCenter URL을 입력해야 합니다.',//'您没有填写 UCenter 的 URL，请返回填写',
	'uc_url_invalid'		=> 'UCenter URL 형식이 잘못되었습니다.',//'URL 格式错误',
	'uc_url_unreachable'		=> 'UCenter URL 주소가 응답하지않습니다. 다시 확인하세요.',//'UCenter 的 URL 地址可能填写错误，请检查',
	'uc_ip_invalid'			=> '도메인 이름이 해석되지 않습니다. 사이트  IP 주소를 입력하세요.',//'无法解析该域名，请填写站点的 IP',
	'uc_admin_invalid'		=> 'UCenter 관리자 비밀번호가 맞지 않습니다. 다시 입력하세요.',//'UCenter 创始人密码错误，请重新填写',
	'uc_data_invalid'		=> 'UCenter 연결이 실패했습니다. UCenter URL 주소가 맞는지 확인하세요.',//'通信失败，请检查 UCenter 的URL 地址是否正确 ',
	'uc_dbcharset_incorrect'	=> 'UCenter 데이터베이스 문자세트가 현재 프로그램의 문자세트와 다릅니다.',//'UCenter 数据库字符集与当前应用字符集不一致',
	'uc_api_add_app_error'		=> 'UCenter 어플리케이션 오류에 추가',//'向 UCenter 添加应用错误',
	'uc_dns_error'			=> 'UCenter DNS 해석 오류입니다. UCenter IP 주소를 다시 입력하세요.',//'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址',

	'ucenter_ucurl_invalid'		=> 'UCenter URL이 비었거나 틀렸습니다. 다시 입력하세요.',//'UCenter 的URL为空，或者格式错误，请检查',
	'ucenter_ucpw_invalid'		=> 'UCenter 관리자 비밀번호가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'UCenter 的创始人密码为空，或者格式错误，请检查',
	'siteinfo_siteurl_invalid'	=> '사이트 URL이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'站点URL为空，或者格式错误，请检查',
	'siteinfo_sitename_invalid'	=> '사이트 이름이 비었거나 형식이 맞지 않습니다.다시 입력하세요. ',//'站点名称为空，或者格式错误，请检查',
	'dbinfo_dbhost_invalid'		=> '데이터베이스 서버 이름이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据库服务器为空，或者格式错误，请检查',
	'dbinfo_dbname_invalid'		=> '데이터베이스 이름이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据库名为空，或者格式错误，请检查',
	'dbinfo_dbuser_invalid'		=> '데이터베이스 사용자 이름이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据库用户名为空，或者格式错误，请检查',
	'dbinfo_dbpw_invalid'		=> '데이터베이스 사용자 비밀번호가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据库密码为空，或者格式错误，请检查',
	'dbinfo_adminemail_invalid'	=> '사이트 시스템 이메일 주소가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'系统邮箱为空，或者格式错误，请检查',
	'dbinfo_tablepre_invalid'	=> '테이블 접두사가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据表前缀为空，或者格式错误，请检查',
	'admininfo_username_invalid'	=> '관리자 이름이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'管理员用户名为空，或者格式错误，请检查',
	'admininfo_email_invalid'	=> '관리자 이메일이 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'管理员Email为空，或者格式错误，请检查',
	'admininfo_password_invalid'	=> '관리자 비밀번호가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'管理员密码为空，请填写',
	'admininfo_password2_invalid'	=> '두 비밀번호가 다릅니다. 다시 입력하세요.',//'两次密码不一致，请检查',

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 새 Discuz! X 설치 (UCenter 서버 포함)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 全新安装 Discuz! X (含 UCenter Server)</label>',
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Discuz! X 만 설치 (이미 UCenter 서버 설치시)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> 仅安装 Discuz! X (手工指定已经安装的 UCenter Server)</label>',

	'username'			=> '관리자 이름',//'管理员账号',
	'email'				=> '관리자 이메일',//'管理员 Email',
	'password'			=> '관리자 비밀번호',//'管理员密码',
	'password_comment'		=> '관리자 비밀번호는 비워둘 수 없습니다.',//'管理员密码不能为空',
	'password2'			=> '비밀번호 재입력',//'重复密码',

	'admininfo_invalid'		=> '관리자 정보가 완전하지 않습니다. 이름과 비밀번호 이메잃을 확인하세요.',//'管理员信息不完整，请检查管理员账号，密码，邮箱',
	'dbname_invalid'		=> '데이터베이스 이름이 비었습니다, 다시 입력하세요.',//'数据库名为空，请填写数据库名称',
	'tablepre_invalid'		=> '테이블 접두사가 비었거나 형식이 맞지 않습니다. 다시 입력하세요.',//'数据表前缀为空，或者格式错误，请检查',
	'admin_username_invalid'	=> '관리자 이름이 적합하지 않습니다. 영문으로 15자를 넘으면 안됩니다. 또한 중국어나 숫자를 넣으면 안됩니다.',//'非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字',
	'admin_password_invalid'	=> '비밀번호가 다릅니다. 다시 입력하세요.',//'密码和上面不一致，请重新输入',
	'admin_email_invalid'		=> '이메일 주소가 적당하지 않거나 형식이 맞지 않습니다. 다른 주소를 입력하세요.',//'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址',
	'admin_invalid'			=> '관리자 정보를 다 입력하지 않았습니다. 주의깊게 각 항목을 다시 확인하세요.',//'您的信息管理员信息没有填写完整，请仔细填写每个项目',
	'admin_exist_password_error'	=> '이 회원은 이미 있습니다. 이 회원을 관리자로 설정하려면 올바른 비밀번호를 입력하세요. 아니면 관리자 이름을 다른 것으로 바꾸세요.',//'该用户已经存在，如果您要设置此用户为论坛的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字',

	'tagtemplates_subject'		=> '제목',//'标题',
	'tagtemplates_uid'		=> '회원 ID',//'用户 ID',
	'tagtemplates_username'		=> '올린 사람',//'发帖者',
	'tagtemplates_dateline'		=> '일자',//'日期',
	'tagtemplates_url'		=> '템플레이트 URL',//'主题地址',

	'uc_version_incorrect'		=> '당신의 UCenter 서버 버전은 너무 오래되었습니다. 최근 버전으로 업그레이드 하시기 바랍니다. 다운로드 주소: http://www.comsenz.com/.',//'您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。',
	'config_unwriteable'		=> '설치 마법사가 설정 파일에 기록할 수 없습니다. config.inc.php 파일에 대한 쓰기 권한이 있는지 확인하세요. 퍼미션 (666 or 777)',//'安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)',

	'install_in_processed'		=> '설치중...',//'正在安装...',
	'install_succeed'		=> '성공적으로 설치되었습니다! 당신의 Discuz! X2에 입장하려면 여기를 클릭하세요.',//'安装成功，点击进入',
	'install_cloud'			=> '설치 후에 Discuz!클라우드 플랫폼에 방문하시면 좋습니다.<br>Discuz! 클라우드 플랫폼은 사이트 방문자를 늘리거나 웹사이트 성능 개선에 도움이 됩니다.<br>Discuz! 클라우드 플랫폼은  QQ 인터넷과 Tencent 분석, 클라우드 검색, QQ 그룹 컴뮤니티, 로밍, SOSO 이모티콘을 제공합니다.<br>Discuz! 플랫폼을 사용하기 전에 (Discuz!, UCHome or SupeSite)은 to Discuz! X2로 업그레이드 해야 합니다.',//'安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。',
	'to_install_cloud'		=> '관리자 센터 열기',//'到后台开通',
	'to_index'			=> '임시로 폐쇄됨',//'暂不开通',

	'init_credits_karma'	=> '평판',//'威望',//!!! The same in install_var.php
	'init_credits_money'	=> '포인트',//'金钱',//!!! The same in install_var.php

	'init_postno0'		=> '#1',//'楼主',//!!! The same in install_var.php 
	'init_postno1'		=> '#2',//'沙发',    //!!! The same in install_var.php
	'init_postno2'		=> '#3',//'板凳',   //!!! The same in install_var.php
	'init_postno3'		=> '#4',//'地板',   //!!! The same in install_var.php

	'init_support'		=> '추천',//'支持',   //!!! The same in install_var.php
	'init_opposition'	=> '반대',//'反对',//!!! The same in install_var.php

	'init_group_0'	=> '회원',//'会员',
	'init_group_1'	=> '관리자',//'管理员',
	'init_group_2'	=> '운영자',//'超级版主',
	'init_group_3'	=> '부운영자',//'版主',
	'init_group_4'	=> '발언금지',//'禁止发言',
	'init_group_5'	=> '접근금지',//'禁止访问',
	'init_group_6'	=> 'IP금지',//'禁止 IP',
	'init_group_7'	=> '손님',//'游客',
	'init_group_8'	=> '인증대기',//'等待验证会员',
	'init_group_9'	=> '신입회원',//'乞丐',
	'init_group_10'	=> '초급회원',//'新手上路',
	'init_group_11'	=> '일반회원',//'注册会员',
	'init_group_12'	=> '중급회원',//'中级会员',
	'init_group_13'	=> '고급회원',//'高级会员',
	'init_group_14'	=> '골드회원',//'金牌会员',
	'init_group_15'	=> '선임회원',//'论坛元老',

	'init_rank_1'	=> '신참',//'新生入学',
	'init_rank_2'	=> '겹습생',//'小试牛刀',
	'init_rank_3'	=> '수습생',//'实习记者',
	'init_rank_4'	=> '프리랜서',//'自由撰稿人',
	'init_rank_5'	=> '초빙작가',//'特聘作家',

	'init_cron_1'	=> '금일 글수 비움',//'清空今日发帖数',
	'init_cron_2'	=> '이달의 접속 시간 비움',//'清空本月在线时间',
	'init_cron_3'	=> '매일 데이터 지우기',//'每日数据清理',
	'init_cron_4'	=> '생일 통계 및 이메일 구독',//'生日统计与邮件祝福',
	'init_cron_5'	=> '토픽 답글 공지',//'主题回复通知',
	'init_cron_6'	=> '매일 게시판 지우기',//'每日公告清理',
	'init_cron_7'	=> '타임 제한 조작 지우기',//'限时操作清理',
	'init_cron_8'	=> '홍보 메세지 지우기',//'论坛推广清理',
	'init_cron_9'	=> '매달 토픽 지우기',//'每月主题清理',
	'init_cron_10'	=> '매일 광장 회원 갱신',//'每日 X-Space更新用户',
	'init_cron_11'	=> '매주 토픽 갱신',//'每周主题更新',

	'init_bbcode_1'	=> '수평 스크롤 내용에 대한 효과는 marquee HTML와 비슷하다. 노트: 이 기능은 Internet Explorer에만 작용함.',//'使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。',
	'init_bbcode_2'	=> 'Flash 애니메이션 삽입',//'嵌入 Flash 动画',
	'init_bbcode_3'	=> 'QQ 온라인 상태 보기, 아이콘을 누르고 채팅하면 됩니다.',//'显示 QQ 在线状态，点这个图标可以和他（她）聊天',
	'init_bbcode_4'	=> '위첨자',//'上标',
	'init_bbcode_5'	=> '아래첨자',//'下标',
	'init_bbcode_6'	=> '윈도우 미디어 오디오 삽입',//'嵌入 Windows media 音频',
	'init_bbcode_7'	=> '윈도우 미디어 오디오나 비디오 삽입',//'嵌入 Windows media 音频或视频',

	'init_qihoo_searchboxtxt'		=> '이 포럼에서 빠른검색을 사용하려면 검색어를 입력하세요',//'输入关键词,快速搜索本论坛',
	'init_threadsticky'			=> '붙일 장소: 전체 탑, 분류 탑, 이 포럼 탑',//'全局置顶,分类置顶,本版置顶',

	'init_default_style'			=> '기본 스타일',//'默认风格',
	'init_default_forum'			=> '기본 포럼',//'默认版块',
	'init_default_template'			=> '기본 틀',//'默认模板套系',
	'init_default_template_copyright'	=> 'Sing Imagination (Beijing) Technology Co., Ltd.',//'康盛创想（北京）科技有限公司',

	'init_dataformat'	=> 'Y-m-d',//'Y-n-j',
	'init_modreasons'	=> '광고/스팸\r\n악의적인 글/해킹\r\n불법 콘텐츠\r\n주제를 벗어난 글\r\n반복된 게시\r\n\r\n동의함\r\n우수한 글\r\n원본',//'广告/SPAM\r\n恶意灌水\r\n违规内容\r\n文不对题\r\n重复发帖\r\n\r\n我很赞同\r\n精品文章\r\n原创内容',
	'init_userreasons'	=> '파워풀하다!\r\n유용하다\r\n매우 좋다\r\n최고다!\r\n흥미롭다',
	'init_link'		=> 'Discuz! 공식 포럼',//'Discuz! 官方论坛',
	'init_link_note'	=> '최신 Discuz! 제폼 소식을 받거나 소프트웨어를 다운로드하고 기술 교환을 하려면',//'提供最新 Discuz! 产品新闻、软件下载与技术交流',

	'init_promotion_task'	=> '사이트 홍보 임무',//'网站推广任务',
	'init_gift_task'	=> '선물 임무',//'红包类任务',
	'init_avatar_task'	=> '아바타 임무',//'头像类任务',

	'license'	=> '<div class="license"><h1>License agreement</h1>

<p>English Version of EULA, for non-Chinese-Speaking Users Only</p>

<p>Copyright (c) 2001-2009, Comsenz Inc. All Rights Reserved.</p>

<p>IMPORTANT: THIS SOFTWARE END USER LICENSE AGREEMENT("EULA") IS A LEGAL AGREEMENT BETWEEN YOU AND Comsenz Inc.. READ IT CAREFULLY BEFORE COMPLETING THE INSTALLATION PROCESS AND USING THE SOFTWARE. IT PROVIDES A LICENSE TO USE THE SOFTWARE AND CONTAINS WARRANTY INFORMATION AND LIABILITY DISCLAIMERS. BY INSTALLING AND USING THE SOFTWARE, YOU ARE CONFIRMING YOUR ACCEPTANCE OF THE SOFTWARE AND AGREEING TO BECOME BOUND BY THE TERMS OF THIS AGREEMENT. IF YOU DO NOT AGREE TO BE BOUND BY THESE TERMS, PLEASE DO NOT INSTALL OR USE THE SOFTWARE. YOU MUST ASSUME THE ENTIRE RISK OF USING THIS PROGRAM. ANY LIABILITY OF Comsenz Inc. WILL BE LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE BEFORE FIRST INSTALLATION.</p>

<p>Sing Imagination (Beijing) Technology Co., Ltd. for the Discuz! product developers, and they shall have Discuz! Product Copyright (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, Discuz! Official website address is http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>

<p>Discuz! copyright has been registered in The People\'s Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using Discuz! software.</p>

<p>This License applies and only applies Discuz! X version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3>1. Definitions</h3>
<ol>
<li>"Crossday Discuz! Board"("Discuz!" for short) is a bulletin board system which is developed by Comsenz Inc.</Li>
<li>"the Software" means "Crossday Discuz! Board".</Li>
<li> "Comsenz Inc." is the enterprise being responsible for Discuz! product.</Li>
</ol>

<h3>2. License Grants</h3>
<ol>
<li>You may use the Software for free for non-commercial use under the License Restrictions.</Li>
<li>You may modify the source code(if being provieded) or interface of the Software to fit your website under the License Restrictions.</Li>
<li>You have property of all members’ information and articles in the Bulletin Board powered by the Software; meanwhile , you need assume all relevant legal duty by yourself.</Li>
<li>You may use the Software for commercial use after purchasing the commercial license. Moreover, according to the license you purchased you may get specified term, manner and content of technical support from Comsenz Inc. Commercial users are prior to submiting ideas and opinions to Comsenz Inc., but without any guarantee of acceptance.</Li>
</ol>

<h3>3. License Restrictions</h3>
<ol>
<li>You may not use the Software for commercial use or profit use, unless you have been licensed to. To purchase the license , please visit http://www.discuz.com or dial 8610-5165 7885 for more information.</li>
<li>You may not rent, lease, sublicense, sell, assign, pledge the Software and its services.</li>
<li>You may not remove or modify the copyright information and relevant links, such as http://www.comsenz.com, http://www.discuz.com and http://www.discuz.net, in the footer of board pages without the prior written consent of Comsenz Inc., no matter how heavily you modified the Software.</li>
<li>You may not modify the Software to create derivative works for redistribution based upon the Software.</li>
<li>In the event that you fail to comply with this EULA, your license will be terminated.
</li>
</ol>

<h3>4. LIMITED WARRANTY AND DISCLAIMER</h3>
<ol>
<li>THE SOFTWARE AND THE ACCOMPANYING FILES ARE SOLD "AS IS" AND WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER WARRANTIED WHETHER EXPRESSED OR IMPLIED.</Li>
<li>Comsenz Inc. is not liable for the content of any message posted on the forums powered by the Software.</Li>
<li>You must assume the entire risk of using the Software. ANY LIABILITY OF Comsenz Inc. WILL BE LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT, REFUND OF PURCHASE PRICE BEFORE YOUR FIRST INSTALLATION.</Li>
</ol>

<h3>5. Official Websites</h3>
<ol>
<li>URL of Comsenz Inc. is http://www.comsenz.com</Li>
<li>URL of Discuz! Home is http://www.discuz.com</Li>
<li>URL of Discuz! Community is http://www.discuz.net</Li>
</ol>

<p>Comsenz Inc. reserves the right to modify this EULA. Discuz! Home provides offical information on license and price, Comsenz Inc. may modify them without notice. Modified license and price list will apply to new licensed users.</p>
</div>',

	'uc_installed'		=> 'UCenter를 설치했습니다. 다시 설치하려면 data/install.lock file을 삭제하세요.',//'您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件',
	'i_agree'		=> '내용을 읽었고 위 내용에 동의합니다.',//'我已仔细阅读，并同意上述条款中的所有内容',
	'supportted'		=> '지원',//'支持',
	'unsupportted'		=> '미지원',//'不支持',
	'max_size'		=> '지원 / 최대 크기',//'支持/最大尺寸',
	'project'		=> '프로젝트',//'项目',
	'ucenter_required'	=> '요구조건',//'Discuz! 所需配置',
	'ucenter_best'		=> '선호',//'Discuz! 最佳',
	'curr_server'		=> '현재 서버',//'当前服务器',
	'env_check'		=> '환경 확인',//'环境检查',
	'os'			=> '운영체제',//'操作系统',
	'php'			=> 'PHP 버전',//'PHP 版本',
	'attachmentupload'	=> '첨부파일 올리기',//'附件上传',
	'unlimit'		=> '제한 없음',//'不限制',
	'version'		=> '버전',//'版本',
	'gdversion'		=> 'GD 라이브러리',//'GD 库',
	'allow'			=> '허용',//'允许',
	'unix'			=> 'Unix 류',//'类Unix',
	'diskspace'		=> 'Disk 공간',//'磁盘空间',
	'priv_check'		=> '폴더와 파일 권한 확인',//'目录、文件权限检查',
	'func_depend'		=> '기능 의존성 확인',//'函数依赖性检查',
	'func_name'		=> '함수 이름',//'函数名称',
	'check_result'		=> '확인 결과',//'检查结果',
	'suggestion'		=> '권고',//'建议',
	'advice_mysql'		=> 'mysql 모듈이 올바로 로드되었는지 확인하세요.',//'请检查 mysql 模块是否正确加载',
	'advice_fopen'		=> '이 기능은 php.ini 파일에서 <b>allow_url_fopen</b> 항목이 <b>On</b>되어 있어야 합니다. 문제를 해결하기 위해 서버 관리자에게 문의하세요.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> '이 기능은 php.ini 파일에서 <b>allow_url_fopen</b> 항목이 <b>On</b>되어 있어야 합니다 . 문제를 해결하기 위해 서버 관리자에게 문의하세요.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml'			=> '이 기능은 PHP가 XML을 지원해야 합니다. 문제를 해결하기 위해 서버 관리자에게 문의하세요.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',
	'none'				=> '없음',//'无',

	'dbhost'		=> '데이터베이스 서버',//'数据库服务器',
	'dbuser'		=> '데이터베이스 사용자 이름',//'数据库用户名',
	'dbpw'			=> '데이터베이스 비밀번호',//'数据库密码',
	'dbname'		=> '데이터베이스 이름',//'数据库名',
	'tablepre'		=> '테이블 접두사',//'数据表前缀',

	'ucfounderpw'		=> 'UCenter 관리자 비밀번호',//'创始人密码',
	'ucfounderpw2'		=> 'UCenter 관리자 비밀번호 재입력',//'重复创始人密码',

	'init_log'		=> '로그 파일 초기화',//'初始化记录',
	'clear_dir'		=> '목록 정리',//'清空目录',
	'select_db'		=> '데이터베이스 선택',//'选择数据库',
	'create_table'		=> '테이블 생성',//'建立数据表',
	'succeed'		=> '성공',//'成功 ',

	'testdata'			=> '지역 데이터 추가',//'附加数据',
	'testdata_check_label'		=> '추가 지역 데이터 설치 (국가/지역/도시)',//'Install demo page templates (4)',
	'portalstatus'			=> '우편번호',
	'portalstatus_check_label'	=> '',
	'groupstatus'			=> '그룹 상태',
	'groupstatus_check_label'	=> '',
	'homestatus'			=> '주거 상태',
	'homestatus_check_label'	=> '',
	'install_data'			=> '데이터가 성공적으로 설치되었습니다.',//'正在安装数据',
	'install_test_data'		=> '지역 데이터 설치',//'正在安装附加数据',

	'method_undefined'		=> '정의되지 않은 방법',//'未定义方法',
	'database_nonexistence'		=> '데이터베이스 대상이 없습니다.',//'数据库操作对象不存在',
	'skip_current'			=> '이 단계 건너띄기',//'跳过本步',
	'topic'				=> '토픽',//'专题',
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> 'Discuz! X 설치에 오신 것을 환영합니다!',
	'select_language'		=> '<b>설치시 언어를 선택하세요.</b>:',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',

//---------------------------------------------------------------



);

$msglang = array(
	'config_nonexistence'	=> 'config.inc.php 파일이 없습니다. 설치를 계속할 수 없습니다. FTP를 사용해 파일을 업로드하고 다시 시도해 주세요.',//'您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
);

?>