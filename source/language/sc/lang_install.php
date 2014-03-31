<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
 */

define('UC_VERNAME', 'International Version');

$lang = array(
	'SC_GBK'		=> '简体中文版',//'Simplified Chinese GBK encoding',
	'TC_BIG5'		=> '繁体中文版',//'Traditional Chinese BIG5 encoding',
	'SC_UTF8'		=> '简体中文 UTF8 版',//'Simplified Chinese UTF8 encoding',
	'TC_UTF8'		=> '繁体中文 UTF8 版',//'Traditional Chinese UTF8 encoding',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install'		=> SOFT_NAME.' 安装向导',//SOFT_NAME.' Setup Wizard',
	'agreement_yes'		=> '我同意',//'I agree',
	'agreement_no'		=> '我不同意',//'I do NOT agree',
	'notset'		=> '不限制',//'Not set',

	'message_title'		=> '提示信息',//'Reminder',
	'error_message'		=> '错误信息',//'Error message',
	'message_return'	=> '返回',//'Return',
	'return'		=> '返回',//'Return',
	'install_wizard'	=> '安装向导',//'Setup Wizard',
	'config_nonexistence'	=> '配置文件不存在',//'Configuration file does not exist',
	'nodir'			=> '目录不存在',//'Directory does not exist',
	'redirect'		=> '浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',//'Browser will automatically redirect the page, without a human intervention.<br>Except when your browser does not support frames, please click here',
	'auto_redirect'		=> '浏览器会自动跳转页面，无需人工干预',//'Browser will automatically redirect the page, without a human intervention.',
	'database_errno_2003'	=> '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',//'Can not connect to the database, check whether the database is run and the database server address is correct.',
	'database_errno_1044'	=> '无法创建新的数据库，请检查数据库名称填写是否正确',//'Unable to create a new database, please check the database name is correct.',
	'database_errno_1045'	=> '无法连接数据库，请检查数据库用户名或者密码是否正确',//'Can not connect to the database, check the database user name and password are correct.',
	'database_errno_1064'	=> 'SQL 语法错误',//'SQL Syntax error',

	'dbpriv_createtable'	=> '没有CREATE TABLE权限，无法继续安装',//'No CREATE TABLE permission, can not continue installation.',
	'dbpriv_insert'		=> '没有INSERT权限，无法继续安装',//'No INSERT permission, can not continue installation.',
	'dbpriv_select'		=> '没有SELECT权限，无法继续安装',//'No SELECT privileges, can not continue installation.',
	'dbpriv_update'		=> '没有UPDATE权限，无法继续安装',//'No UPDATE permissions, can not continue installation.',
	'dbpriv_delete'		=> '没有DELETE权限，无法继续安装',//'No DELETE permissions, can not continue installation.',
	'dbpriv_droptable'	=> '没有DROP TABLE权限，无法安装',//'No DROP TABLE permissions, can not install.',

	'db_not_null'		=> '数据库中已经安装过 UCenter, 继续安装会清空原有数据。',//'UCenter database already installed, continue the installation will clear the old data.',
	'db_drop_table_confirm'	=> '继续安装会清空全部原有数据，您确定要继续吗?',//'To continue the installation it is required to clear all the old data, are you sure you want to continue?',

	'writeable'		=> '可写',//'writable',
	'unwriteable'		=> '不可写',//'NOT writable',
	'old_step'		=> '上一步',//'Previous step',
	'new_step'		=> '下一步',//'Next step',

	'database_errno_2003'	=> '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',//'Can not connect to the database, check whether the database is run and the database server address is correct.',
	'database_errno_1044'	=> '无法创建新的数据库，请检查数据库名称填写是否正确',//'Unable to create a new database, please check the database name is correct.',
	'database_errno_1045'	=> '无法连接数据库，请检查数据库用户名或者密码是否正确',//'Can not connect to the database, check the database user name and password are correct.',
	'database_connect_error'	=> '数据库连接错误',//'Database connection error.',

	'step_title_1'		=> '检查安装环境',//'Check environment',
	'step_title_2'		=> '设置运行环境',//'Set environment',
	'step_title_3'		=> '创建数据库',//'Create Database',
	'step_title_4'		=> '安装',//'Install',
	'step_env_check_title'	=> '开始安装',//'Start Installation',
	'step_env_check_desc'	=> '环境以及文件目录权限检查',//'Check environment and files/directories permissions',
	'step_db_init_title'	=> '安装数据库',//'Install database',
	'step_db_init_desc'	=> '正在执行数据库安装',//'Starting the database installation',

	'step1_file'		=> '目录文件',//'File list',
	'step1_need_status'	=> '所需状态',//'Required',
	'step1_status'		=> '当前状态',//'Status',
	'not_continue'		=> '请将以上红叉部分修正再试',//'Please, try to repair positions marked by a red cross',

	'tips_dbinfo'		=> '填写数据库信息',//'Setting the database information',
	'tips_dbinfo_comment'	=> '',//'',
	'tips_admininfo'	=> '填写管理员信息',//'Setting the administrator information',
	'step_ext_info_title'	=> '安装成功。',//'Installed successfully.',
	'step_ext_info_comment'	=> '点击进入登陆',//'Click to enter login',

	'ext_info_succ'		=> '安装成功。',//'Installed successfully.',
	'install_submit'	=> '提交',//'Submit',
	'install_locked'	=> '安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),//'Install lock has been installed.<br><br>If you sure you want to re-install, go to the server and delete the file<br />'.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> '您必须解决以上问题，安装才可以继续',//'You must solve the above problems, before the installation can continue.',

	'step_app_reg_title'	=> '设置运行环境',//'Setting environment',
	'step_app_reg_desc'	=> '检测服务器环境以及设置 UCenter',//'Check the server environment, and set UCenter',
	'tips_ucenter'		=> '请填写 UCenter 相关信息',//'Please fill in the information for UCenter',
	'tips_ucenter_comment'	=> 'UCenter 是 Comsenz 公司产品的核心服务程序，Discuz! Board 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。',//'UCenter is the Comsenz inc. core service program. Discuz! Board and other Comsenz applications rely on this program. If you have already installed UCenter, please fill in the information below. Otherwise, please go to <a href="http://www.discuz.com/" target="blank">Comsenz Products</a> to download and install UCenter, and then continue.',

	'advice_mysql_connect'		=> '请检查 mysql 模块是否正确加载',//'Please check the mysql module is loaded correctly.',
	'advice_fsockopen'		=> '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',//'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',
	'advice_gethostbyname'		=> '是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能',//'PHP configuration is not allowed the <b>gethostbyname</b> function. Please contact the server administrator to resolve this problem.',
	'advice_file_get_contents'	=> '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',//'This function require the <b>allow_url_fopen</b> option to <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',
	'advice_xml_parser_create'	=> '该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',//'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.',

	'ucurl'				=> 'UCenter 的 URL',//'UCenter URL',
	'ucpw'				=> 'UCenter 创始人密码',//'UCenter administrator password',
	'ucip'				=> 'UCenter 的IP地址',//'UCenter IP address',
	'ucenter_ucip_invalid'		=> '格式错误，请填写正确的 IP 地址',//'Invalid format, please fill in the correct IP address',
	'ucip_comment'			=> '绝大多数情况下您可以不填',//'In most cases you can leave this empty',

	'tips_siteinfo'			=> '请填写站点信息',//'Please fill in the site information',
	'sitename'			=> '站点名称',//'Site Name',
	'siteurl'			=> '站点 URL',//'Site URL',

	'forceinstall'			=> '强制安装',//'Mandatory installation',
	'dbinfo_forceinstall_invalid'	=> '当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复',//'Current database table prefix is already used by the same data table! You can modify the "Table name prefix" to avoid deleting the old data, or choose to force the mandatory installation. Mandatory installation will delete all the old data, and this old data can not be restored.',

	'click_to_back'			=> '点击返回上一步',//'Click to go Back',
	'adminemail'			=> '系统信箱 Email',//'Administrative E-Mail',
	'adminemail_comment'		=> '用于发送程序错误报告',//'Used to send error reports',
	'dbhost_comment'		=> '数据库服务器地址, 一般为 localhost',//'Database server host address, usually localhost',
	'tablepre_comment'		=> '同一数据库运行多个论坛时，请修改前缀',//'For use multiple applications with the same database, please modify the teble prefix',
	'forceinstall_check_label'	=> '我要删除数据，强制安装 !!!',//'I want to delete all the data, and start mandatory installation!',

	'uc_url_empty'			=> '您没有填写 UCenter 的 URL，请返回填写',//'You have to fill in the UCenter URL',
	'uc_url_invalid'		=> 'URL 格式错误',//'UCenter URL format is invalid',
	'uc_url_unreachable'		=> 'UCenter 的 URL 地址可能填写错误，请检查',//'UCenter URL address is unreachable, please check',
	'uc_ip_invalid'			=> '无法解析该域名，请填写站点的 IP',//'Can not resolve the domain name, please fill in the site IP address',
	'uc_admin_invalid'		=> 'UCenter 创始人密码错误，请重新填写',//'UCenter administrator password invalid, please re-fill',
	'uc_data_invalid'		=> '通信失败，请检查 UCenter 的URL 地址是否正确 ',//'UCenter communication failure. Check the UCenter URL address is correct',
	'uc_dbcharset_incorrect'	=> 'UCenter 数据库字符集与当前应用字符集不一致',//'UCenter database character set is inconsistent with the current application character set',
	'uc_api_add_app_error'		=> '向 UCenter 添加应用错误',//'Adding to UCenter application error',
	'uc_dns_error'			=> 'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址',//'UCenter DNS resolution error. Please return and fill in the UCenter IP address',

	'ucenter_ucurl_invalid'		=> 'UCenter 的URL为空，或者格式错误，请检查',//'UCenter URL is empty or wrong format, please check',
	'ucenter_ucpw_invalid'		=> 'UCenter 的创始人密码为空，或者格式错误，请检查',//'UCenter administrator password is blank, or formatting errors, please check',
	'siteinfo_siteurl_invalid'	=> '站点URL为空，或者格式错误，请检查',//'The site URL is blank, or formatting errors, please check',
	'siteinfo_sitename_invalid'	=> '站点名称为空，或者格式错误，请检查',//'The site name is empty or wrong format, please check',
	'dbinfo_dbhost_invalid'		=> '数据库服务器为空，或者格式错误，请检查',//'Database server is empty, or wrong format, please check',
	'dbinfo_dbname_invalid'		=> '数据库名为空，或者格式错误，请检查',//'Database name is empty, or wrong format, please check',
	'dbinfo_dbuser_invalid'		=> '数据库用户名为空，或者格式错误，请检查',//'Database user name is blank, or format error, please check',
	'dbinfo_dbpw_invalid'		=> '数据库密码为空，或者格式错误，请检查',//'Database password is blank, or format error, please check',
	'dbinfo_adminemail_invalid'	=> '系统邮箱为空，或者格式错误，请检查',//'The site system email address is empty, or format error, please check',
	'dbinfo_tablepre_invalid'	=> '数据表前缀为空，或者格式错误，请检查',//'Table prefix is blank, or format error, please check',
	'admininfo_username_invalid'	=> '管理员用户名为空，或者格式错误，请检查',//'Administrator user name is blank, or format error, please check',
	'admininfo_email_invalid'	=> '管理员Email为空，或者格式错误，请检查',//'Administrator Email is blank, or format error, please check',
	'admininfo_password_invalid'	=> '管理员密码为空，请填写',//'Administrator password is blank, please fill in',
	'admininfo_password2_invalid'	=> '两次密码不一致，请检查',//'Two passwords are not equal, please check',

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 全新安装 Discuz! X (含 UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> New Discuz! X installation (including UCenter Server)</label>',
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> 仅安装 Discuz! X (手工指定已经安装的 UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Install Discuz! X only (specify manually already installed UCenter Server)</label>',

	'username'			=> '管理员账号',//'Administrator username',
	'email'				=> '管理员 Email',//'Administrator Email',
	'password'			=> '管理员密码',//'Administrator password',
	'password_comment'		=> '管理员密码不能为空',//'Administrator password can not be empty',
	'password2'			=> '重复密码',//'Repeat password',

	'admininfo_invalid'		=> '管理员信息不完整，请检查管理员账号，密码，邮箱',//'Administrator information is not complete, check the administrator usernamet, password, email',
	'dbname_invalid'		=> '数据库名为空，请填写数据库名称',//'Database name is empty, please fill in the database name',
	'tablepre_invalid'		=> '数据表前缀为空，或者格式错误，请检查',//'Table prefix is blank or format error, please check',
	'admin_username_invalid'	=> '非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字',//'Illegal user name! User name length should not be more than 15 English characters, and can not contain special characters, like Chinese letters or numbers',
	'admin_password_invalid'	=> '密码和上面不一致，请重新输入',//'Password and the above discrepancies, please re-enter',
	'admin_email_invalid'		=> 'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址',//'The e-mail address used is invalid or the format is invalid, please change to other address',
	'admin_invalid'			=> '您的信息管理员信息没有填写完整，请仔细填写每个项目',//'You did not fill in complete administrator information, please carefully fill in each item',
	'admin_exist_password_error'	=> '该用户已经存在，如果您要设置此用户为论坛的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字',//'This user already exists. If you want to set this user as an administrator, please enter the correct password for the user, or replace the administrator name',

	'tagtemplates_subject'		=> '标题',//'Title',
	'tagtemplates_uid'		=> '用户 ID',//'User ID',
	'tagtemplates_username'		=> '发帖者',//'Posted by',
	'tagtemplates_dateline'		=> '日期',//'Date',
	'tagtemplates_url'		=> '主题地址',//'Templates URL',

	'uc_version_incorrect'		=> '您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。',//'Your UCenter server version is too old. Please upgrade the UCenter service with the latest version. Download address: http://www.comsenz.com/.',
	'config_unwriteable'		=> '安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)',//'Setup Wizard can not write the configuration file. Enable the config.inc.php write permissions (666 or 777)',

	'install_in_processed'		=> '正在安装...',//'Installing ...',
	'install_succeed'		=> '安装成功，点击进入',//'Installation successfully completed! Click here to enter your Discuz! X2',
	'install_cloud'			=> '安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。',//'After successful installation, Welcome to the opening Discuz! Cloud platform<br>Discuz! Cloud platform dedicated to help website owners to increase their websites traffic, enhance the ability of Web site operators, and increase a website revenue.<br>Discuz! Cloud platform currently provides a free QQ Internet, Tencent analysis, Cloud search, QQ Group Community,Roaming,SOSO emoticon services.Discuz! Cloud platform will continue to provide more quality services to the project.<br>Before open the Discuz! Platform make sure that your website (Discuz!, UCHome or SupeSite) has been upgraded to Discuz! X2.',
	'to_install_cloud'		=> '到后台开通',//'Open Admin-Center',
	'to_index'			=> '暂不开通',//'Temporarily not open',

	'init_credits_karma'	=> '威望',//!!! The same in install_var.php//'Reputation',
	'init_credits_money'	=> '金钱',//!!! The same in install_var.php//'Points',

	'init_postno0'		=> '楼主',//'#1',//!!! The same in install_var.php 
	'init_postno1'		=> '沙发',//'#2',//!!! The same in install_var.php
	'init_postno2'		=> '板凳',//'#3',//!!! The same in install_var.php
	'init_postno3'		=> '地板',//'#4',//!!! The same in install_var.php

	'init_support'		=> '支持',//'Digg',//!!! The same in install_var.php
	'init_opposition'	=> '反对',//'Bury',//!!! The same in install_var.php

	'init_group_0'	=> '会员',//'Member',
	'init_group_1'	=> '管理员',//'Administrator',
	'init_group_2'	=> '超级版主',//'Super Moderator',
	'init_group_3'	=> '版主',//'Moderator',
	'init_group_4'	=> '禁止发言',//'R/O Member',
	'init_group_5'	=> '禁止访问',//'Banned',
	'init_group_6'	=> '禁止 IP',//'IP Banned',
	'init_group_7'	=> '游客',//'Guest',
	'init_group_8'	=> '等待验证会员',//'Wait for verification',
	'init_group_9'	=> '乞丐',//'Newbie',
	'init_group_10'	=> '新手上路',//'Junior',
	'init_group_11'	=> '注册会员',//'Member',
	'init_group_12'	=> '中级会员',//'Middle Member',
	'init_group_13'	=> '高级会员',//'Senior Member',
	'init_group_14'	=> '金牌会员',//'Gold Member',
	'init_group_15'	=> '论坛元老',//'Veteran',

	'init_rank_1'	=> '新生入学',//'Beginner',
	'init_rank_2'	=> '小试牛刀',//'Apprentice',
	'init_rank_3'	=> '实习记者',//'Intern',
	'init_rank_4'	=> '自由撰稿人',//'Freelance writer',
	'init_rank_5'	=> '特聘作家',//'Distinguished Writer',

	'init_cron_1'	=> '清空今日发帖数',//'Empty today\'s post count',
	'init_cron_2'	=> '清空本月在线时间',//'Empty this month\'s online time',
	'init_cron_3'	=> '每日数据清理',//'Daily data cleaning',
	'init_cron_4'	=> '生日统计与邮件祝福',//'Birthday statistics and e-mail subscriptions',
	'init_cron_5'	=> '主题回复通知',//'Topic reply notifications',
	'init_cron_6'	=> '每日公告清理',//'Daily bulletin clean up',
	'init_cron_7'	=> '限时操作清理',//'Time-limited operation clean-up',
	'init_cron_8'	=> '论坛推广清理',//'Promotion messages clean-up',
	'init_cron_9'	=> '每月主题清理',//'Monthly topic clean-up',
	'init_cron_10'	=> '每日 X-Space更新用户',//'Daily update X-Space users',
	'init_cron_11'	=> '每周主题更新',//'Weekly topic update',

	'init_bbcode_1'	=> '使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。',//'So that the contents of horizontal scrolling, the effect is similar to the marquee HTML tags, Note: This effect only valid under Internet Explorer browser.',
	'init_bbcode_2'	=> '嵌入 Flash 动画',//'Embedded Flash animation',
	'init_bbcode_3'	=> '显示 QQ 在线状态，点这个图标可以和他（她）聊天',//'Show QQ online status, click to this icon and chat with him/her',
	'init_bbcode_4'	=> '上标',//'Superscript',
	'init_bbcode_5'	=> '下标',//'Subscript',
	'init_bbcode_6'	=> '嵌入 Windows media 音频',//'Embedded Windows media audio',
	'init_bbcode_7'	=> '嵌入 Windows media 音频或视频',//'Embedded Windows media audio or video',

	'init_qihoo_searchboxtxt'	=> '输入关键词,快速搜索本论坛',//'Input keywords for quick search this forum',
	'init_threadsticky'		=> '全局置顶,分类置顶,本版置顶',//'Stick object: Global top, Category Top, This forum top',

	'init_default_style'		=> '默认风格',//'Default Style',
	'init_default_forum'		=> '默认版块',//'Default Forum',
	'init_default_template'		=> '默认模板套系',//'Default template',
	'init_default_template_copyright'	=> '康盛创想（北京）科技有限公司',//'Sing Imagination (Beijing) Technology Co., Ltd.',

	'init_dataformat'	=> 'Y-m-d',//'Y-n-j',
	'init_modreasons'	=> '广告/SPAM\r\n恶意灌水\r\n违规内容\r\n文不对题\r\n重复发帖\r\n\r\n我很赞同\r\n精品文章\r\n原创内容',//'Advertising/SPAM\r\nMalicious/Hacking\r\nIllegal content\r\nOfftopic\r\nRepeated post\r\n\r\nI agree\r\nExcellent article\r\nOriginal content',
	'init_userreasons'	=> '很给力!\r\n神马都是浮云\r\n赞一个!\r\n山寨\r\n淡定',//'Powerfull!\r\nUsefull\r\nVery nice\r\nThe best!\r\nInteresting',
	'init_link'		=> 'Discuz! 官方论坛',//'Discuz! Official forum',
	'init_link_note'	=> '提供最新 Discuz! 产品新闻、软件下载与技术交流',//'To provide the latest Discuz! Product news, software downloads and technical exchanges',

	'init_promotion_task'	=> '网站推广任务',//'Website promotion task',
	'init_gift_task'	=> '红包类任务',//'Init Gift Task',
	'init_avatar_task'	=> '头像类任务',//'Avatar Task',

	'license' => '<div class="license"><h1>中文版授权协议 适用于中文用户</h1>

<p>版权所有 (c) 2001-2011，北京康盛新创科技有限责任公司保留所有权利。</p>

<p>感谢您选择康盛产品。希望我们的努力能为您提供一个高效快速、强大的站点解决方案，和强大的社区论坛解决方案。康盛公司网址为 http://www.comsenz.com，产品官方讨论区网址为 http://www.discuz.net。</p>

<p>用户须知：本协议是您与康盛公司之间关于您非商业使用康盛公司提供的各种软件产品及服务的法律协议。无论您是个人或组织、盈利与否、用途如何（包括以学习和研究为目的），均需仔细阅读本协议，包括免除或者限制康盛责任的免责条款及对您的权利限制。请您审阅并接受或不接受本服务条款。如您不同意本服务条款及/或康盛随时对其的修改，您应不使用或主动取消康盛公司提供的康盛产品。否则，您的任何对康盛产品中的相关服务的注册、登陆、下载、查看等使用行为将被视为您对本服务条款全部的完全接受，包括接受康盛对服务条款随时所做的任何修改。</p>

<p>本服务条款一旦发生变更, 康盛将在网页上公布修改内容。修改后的服务条款一旦在网页上公布即有效代替原来的服务条款。您可随时登陆康盛官方论坛查阅最新版服务条款。如果您选择接受本条款，即表示您同意接受协议各项条件的约束。如果您不同意本服务条款，则不能获得使用本服务的权利。您若有违反本条款规定，康盛公司有权随时中止或终止您对康盛产品的使用资格并保留追究相关法律责任的权利。</p>

<p>在理解、同意、并遵守本协议的全部条款后，方可开始使用康盛产品。您可能与康盛公司直接签订另一书面协议，以补充或者取代本协议的全部或者任何部分。</p>

<p>康盛拥有本软件的全部知识产权。本软件只供许可协议，并非出售。康盛只允许您在遵守本协议各项条款的情况下复制、下载、安装、使用或者以其他方式受益于本软件的功能或者知识产权。</p>

<h3>I. 协议许可的权利</h3>
<ol>
<li>您可以在完全遵守本许可协议的基础上，将本软件应用于非商业用途，而不必支付软件版权许可费用。</li>
<li>您可以在协议规定的约束和限制范围内修改康盛产品源代码(如果被提供的话)或界面风格以适应您的网站要求。</li>
<li>您拥有使用本软件构建的网站中全部会员资料、文章及相关信息的所有权，并独立承担与使用本软件构建的网站内容的审核、注意义务，确保其不侵犯任何人的合法权益，独立承担因使用康盛软件和服务带来的全部责任，若造成康盛公司或用户损失的，您应予以全部赔偿。</li>
<li>本协议是您与康盛公司之间关于您非商业使用康盛公司提供的各种软件产品及服务的法律协议，若您需将康盛软件或服务用户商业用途，必须另行获得康盛的书面许可，您在获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持期限、技术支持方式和技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</li>
</ol>

<h3>II. 协议规定的约束和限制</h3>
<ol>
<li>未获康盛公司书面商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目或实现盈利的网站）。购买商业授权请登陆http://www.discuz.com参考相关说明，也可以致电8610-51282255了解详情。</li>
<li>不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</li>
<li>无论如何，即无论用途如何、是否经过修改或美化、修改程度如何，只要使用康盛产品的整体或任何部分，未经书面许可，页面页脚处的康盛产品名称和康盛公司下属网站（http://www.comsenz.com、或 http://www.discuz.net） 的链接都必须保留，而不能清除或修改。</li>
<li>禁止在康盛产品的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</li>
<li>如果您未能遵守本协议的条款，您的授权将被终止，所许可的权利将被收回，同时您应承担相应法律责任。</li>
</ol>

<h3>III. 有限担保和免责声明</h3>
<ol>
<li>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</li>
<li>用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。</li>
<li>康盛公司不对使用本软件构建的网站中或者论坛中的文章或信息承担责任，全部责任由您自行承担。</li>
<li>康盛公司对康盛提供的软件和服务之及时性、安全性、准确性不作担保，由于不可抗力因素、康盛公司无法控制的因素（包括黑客攻击、停断电等）等造成软件使用和服务中止或终止，而给您造成损失的，您同意放弃追究康盛公司责任的全部权利。</li>
<li>康盛公司特别提请您注意，康盛公司为了保障公司业务发展和调整的自主权，康盛公司拥有随时经或未经事先通知而修改服务内容、中止或终止部分或全部软件使用和服务的权利，修改会公布于康盛公司网站相关页面上，一经公布视为通知。 康盛公司行使修改或中止、终止部分或全部软件使用和服务的权利而造成损失的，康盛公司不需对您或任何第三方负责。
</li>
</ol>

<p>有关康盛产品最终用户授权协议、商业授权与技术服务的详细内容，均由 康盛公司独家提供。康盛公司拥有在不事先通知的情况下，修改授权协议和服务价目表的权利，修改后的协议或价目表对自改变之日起的新授权用户生效。</p>
<p>一旦您开始安装康盛产品，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权利的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
<p>本许可协议条款的解释，效力及纠纷的解决，适用于中华人民共和国大陆法律。</p>
<p>若您和康盛之间发生任何纠纷或争议，首先应友好协商解决，协商不成的，您在此完全同意将纠纷或争议提交康盛所在地北京市海淀区人民法院管辖。康盛公司拥有对以上各项条款内容的解释权及修改权。</p>
</div>',

	'uc_installed'		=> '您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件',//'You have installed the UCenter. If you need to re-install, delete the data/install.lock file',
	'i_agree'		=> '我已仔细阅读，并同意上述条款中的所有内容',//'I have read and agree to all the elements of the Terms',
	'supportted'		=> '支持',//'Supported',
	'unsupportted'		=> '不支持',//'Unsupportted',
	'max_size'		=> '支持/最大尺寸',//'Supported / Max Size',
	'project'		=> '项目',//'Project',
	'ucenter_required'	=> 'Discuz! 所需配置',//'Required',
	'ucenter_best'		=> 'Discuz! 最佳',//'Preferred',
	'curr_server'		=> '当前服务器',//'Current server',
	'env_check'		=> '环境检查',//'Check environment',
	'os'			=> '操作系统',//'Operating System',
	'php'			=> 'PHP 版本',//'PHP Version',
	'attachmentupload'	=> '附件上传',//'Attachment upload',
	'unlimit'		=> '不限制',//'No limit',
	'version'		=> '版本',//'Version',
	'gdversion'		=> 'GD 库',//'GD Library',
	'allow'			=> '允许',//'Allow',
	'unix'			=> '类Unix',//'Unix-like',
	'diskspace'		=> '磁盘空间',//'Disk Space',
	'priv_check'		=> '目录、文件权限检查',//'Check directory/file permissions',
	'func_depend'		=> '函数依赖性检查',//'Check function dependency',
	'func_name'		=> '函数名称',//'Function name',
	'check_result'		=> '检查结果',//'Check result',
	'suggestion'		=> '建议',//'Recommendation',
	'advice_mysql'		=> '请检查 mysql 模块是否正确加载',//'Please check the mysql module is loaded correctly',
	'advice_fopen'		=> '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',//'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',
	'advice_file_get_contents'	=> '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',//'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',
	'advice_xml'			=> '该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',//'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.',
	'none'				=> '无',//'None',

	'dbhost'		=> '数据库服务器',//'Database server',
	'dbuser'		=> '数据库用户名',//'Database username',
	'dbpw'			=> '数据库密码',//'Database password',
	'dbname'		=> '数据库名',//'Database name',
	'tablepre'		=> '数据表前缀',//'Table prefix',

	'ucfounderpw'		=> '创始人密码',//'UCenter admin password',
	'ucfounderpw2'		=> '重复创始人密码',//'Repeat UCenter admin password',

	'init_log'		=> '初始化记录',//'Initialize log',
	'clear_dir'		=> '清空目录',//'Clear directory',
	'select_db'		=> '选择数据库',//'Select the database',
	'create_table'		=> '建立数据表',//'Create table',
	'succeed'		=> '成功 ',//'Success',

	'testdata'			=> '附加数据',//'Add regions data',
	'testdata_check_label'		=> '完整地区数据（四级）',//'Install additional regional data (countries/regions/cities)',
	'portalstatus'			=> '开启门户功能',//'Portal status',
	'portalstatus_check_label'	=> '',
	'groupstatus'			=> '开启群组功能',//'Groups status',
	'groupstatus_check_label'	=> '',
	'homestatus'			=> '开启家园功能',//'Home Status',
	'homestatus_check_label'	=> '',
	'install_data'			=> '正在安装数据',//'Data installed successfully',
	'install_test_data'		=> '正在安装附加数据',//'Install regional data',

	'method_undefined'		=> '未定义方法',//'Undefined method',
	'database_nonexistence'		=> '数据库操作对象不存在',//'Database object does not exist',
	'skip_current'			=> '跳过本步',//'Skip this step',
	'topic'				=> '专题',//'Topic',
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> '欢迎到Discuz！ X安装！',//'Welcome to Discuz! X Installation!',
	'select_language'		=> '<b>选择安装语言</b>',//'<b>Select the installation language</b>:',

//---------------------------------------------------------------

);

$msglang = array(
	'config_nonexistence'	=> '您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',//'Your config.inc.php file does not exist. Can not continue the installation, please use the FTP to upload the file and try again.',
);

?>