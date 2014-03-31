<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
 */

define('UC_VERNAME', 'International Version');

$lang = array(
	'SC_GBK'		=> 'Chinois simplifi&#233; GBK encodage',//'简体中文版',
	'TC_BIG5'		=> 'Chinois traditionnel encodage BIG5',//'繁体中文版',
	'SC_UTF8'		=> 'Simplifi&#233; encodage UTF8 Chinoise',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditionnelle Chinoise Encodage UTF8',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859', // 'ENGLISH ISO8859'
	'EN_UTF8'		=> 'ENGLISH UTF-8', // 'ENGLISH UTF-8'

	'title_install'		=> SOFT_NAME.' Assistant de configuration',//SOFT_NAME.' 安装向导', // ' Setup Wizard'
	'agreement_yes'		=> 'Je souscris',//'我同意', // 'I agree'
	'agreement_no'		=> 'Je ne souscris pas',//'我不同意', // 'I do NOT agree'
	'notset'		=> 'Non d&#233;fini',//'不限制',//????? No limits, Not limited // 'Not set'

	'message_title'		=> 'Reminder',//'提示信息', //  'Reminder'
	'error_message'		=> 'Message Erreur',//'错误信息', // 'Error message'
	'message_return'	=> 'Retour',//'返回', // 'Return'
	'return'		=> 'Retour',//'返回', // 'Return'
	'install_wizard'	=> 'Assistant de configuration',//'安装向导',  // 'Setup Wizard'
	'config_nonexistence'	=> 'Fichier de configuration Inexistant',//'配置文件不存在', // 'Configuration file does not exist'
	'nodir'			=> 'Le r&#233;pertoire n\'existe pas',//'目录不存在',  // 'Directory does not exist'
	'redirect'		=> 'Navigateur va automatiquement rediriger la page, sans intervention humaine.<br>Sauf si votre navigateur ne supporte pas les frames, Svp., cliquez ici',//'浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里', // 'Browser will automatically redirect the page, without a human intervention.<br>Except when your browser does not support frames, please click here'
	'auto_redirect'		=> 'Navigateur va automatiquement rediriger la page, sans intervention humaine.',//'浏览器会自动跳转页面，无需人工干预', // 'Browser will automatically redirect the page, without a human intervention.'
	'database_errno_2003'	=> 'Impossible de se connecter &#224; la base de donn&#233;es, v&#233;rifier si la base de donn&#233;es est ex&#233;cut&#233; et l\'adresse du serveur de bases de donn&#233;es est correct.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确', // 'Can not connect to the database, check whether the database is run and the database server address is correct.'
	'database_errno_1044'	=> 'Impossible de cr&#233;er une nouvelle base de donn&#233;es, Svp. v&#233;rifier le nom base de donn&#233;es est correct.',//'无法创建新的数据库，请检查数据库名称填写是否正确',  // 'Unable to create a new database, please check the database name is correct.'
	'database_errno_1045'	=> 'Impossible de se connecter &#224; la base de donn&#233;es, v&#233;rifiez le nom d\'utilisateur et mot de passe base de donn&#233;es sont corrects.',//'无法连接数据库，请检查数据库用户名或者密码是否正确', // 'Can not connect to the database, check the database user name and password are correct.'
	'database_errno_1064'	=> 'Erreur de Syntaxe SQL',//'SQL 语法错误', // 'SQL Syntax error'

	'dbpriv_createtable'	=> 'Aucune autorisation pour CREER une TABLE, ne peuvent pas continuer l\'installation.',//'没有CREATE TABLE权限，无法继续安装', // 'No CREATE TABLE permission, can not continue installation.'
	'dbpriv_insert'		=> 'Aucune autorisation CHOISIS, ne peut pas continuer l\'installation.',//'没有INSERT权限，无法继续安装', // 'No INSERT permission, can not continue installation.'
	'dbpriv_select'		=> 'Aucun privil&#232;ge CHOISIS, ne peut pas continuer l\'installation.',//'没有SELECT权限，无法继续安装', // 'No SELECT privileges, can not continue installation.'
	'dbpriv_update'		=> 'Aucune autorisation DE MISE A JOUR ne peut pas continuer l\'installation.',//'没有UPDATE权限，无法继续安装', // 'No UPDATE permissions, can not continue installation.'
	'dbpriv_delete'		=> 'Aucune autorisation pour SUPPRIMER ne peut pas continuer l\'installation.',//'没有DELETE权限，无法继续安装', // 'No DELETE permissions, can not continue installation.'
	'dbpriv_droptable'	=> 'Aucune autorisation COMMANDE de la TABLE &#224; installer.',//'没有DROP TABLE权限，无法安装', // 'No DROP TABLE permissions to install.'

	'db_not_null'		=> 'Base de donn&#233;es UCenter d&#233;j&#224; install&#233;, continuez l\'installation effacera les anciennes donn&#233;es.',//'数据库中已经安装过 UCenter, 继续安装会清空原有数据。', //  'UCenter database already installed, continue the installation will clear the old data.'
	'db_drop_table_confirm'	=> 'Pour continuer l\'installation il est n&#233;cessaire d\'effacer toutes les anciennes donn&#233;es, &#234;tes-vous s&#251;r de vouloir continuer?',//'继续安装会清空全部原有数据，您确定要继续吗?', // 'To continue the installation it is required to clear all the old data, are you sure you want to continue?'

	'writeable'		=> 'Access. en &#233;criture',//'可写', // 'writable'
	'unwriteable'		=> 'PAS ACCES en &#233;criture',//'不可写', // 'NOT writable'
	'old_step'		=> '&#233;tape pr&#233;c&#233;dente',//'上一步', // 'Previous step'
	'new_step'		=> 'Prochaine &#233;tape',//'下一步', // 'Next step'

	'database_errno_2003'	=> 'Impossible de se connecter &#224; la base de donn&#233;es, v&#233;rifier si la base de donn&#233;es est ex&#233;cut&#233; et l\'adresse du serveur de bases de donn&#233;es est correct.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确', // 'Can not connect to the database, check whether the database is run and the database server address is correct.'
	'database_errno_1044'	=> 'Impossible de cr&#233;er une nouvelle base de donn&#233;es, Svp. v&#233;rifier le nom base de donn&#233;es est correct.',//'无法创建新的数据库，请检查数据库名称填写是否正确', //  'Unable to create a new database, please check the database name is correct.'
	'database_errno_1045'	=> 'Impossible de se connecter &#224; la base de donn&#233;es, v&#233;rifiez le nom d\'utilisateur et mot de passe base de donn&#233;es sont corrects.',//'无法连接数据库，请检查数据库用户名或者密码是否正确', // 'Can not connect to the database, check the database user name and password are correct.'
	'database_connect_error'	=> 'Erreur de connexion base de donn&#233;es.',//'数据库连接错误', // 'Database connection error.'

	'step_title_1'		=> 'V&#233;rifiez les conditions',//'检查安装环境', // 'Check environment'
	'step_title_2'		=> 'D&#233;finir les conditions',//'设置运行环境', //  'Set environment'
	'step_title_3'		=> 'Cr&#233;er la Base',//'创建数据库', // 'Create Database'
	'step_title_4'		=> 'Installer',//'安装', // 'Install'
	'step_env_check_title'	=> 'D&#233;marrer l\'installation',//'开始安装', // 'Start Installation'
	'step_env_check_desc'	=> 'V&#233;rifiez les conditions et les fichiers/des droits des r&#233;pertoires',//'环境以及文件目录权限检查', // 'Check environment and files/directories permissions'
	'step_db_init_title'	=> 'Installez Base de Donn&#233;es',//'安装数据库', // 'Install database'
	'step_db_init_desc'	=> 'D&#233;marrage de l\'installation de bases de donn&#233;es',//'正在执行数据库安装', // 'Starting the database installation'

	'step1_file'		=> 'Liste des Fichiers',//'目录文件', // 'File list'
	'step1_need_status'	=> 'Obligatoires',//'所需状态', // 'Required'
	'step1_status'		=> 'Statuts',//'当前状态', // 'Status'
	'not_continue'		=> 'Svp., essayez de r&#233;parer positions marqu&#233;es par une croix rouge',//'请将以上红叉部分修正再试', // 'Please, try to repair positions marked by a red cross'

	'tips_dbinfo'		=> 'R&#233;glage de la base de donn&#233;es des informations',//'填写数据库信息', // 'Setting the database information'
	'tips_dbinfo_comment'	=> '',//'',
	'tips_admininfo'	=> 'Configuration des Informations Administrateur',//'填写管理员信息', // 'Setting the administrator information'
	'step_ext_info_title'	=> 'Install&#233; avec Succ&#232;s.',//'安装成功。', // 'Installed successfully.'
	'step_ext_info_comment'	=> 'Cliquez pour entrer la connexion',//'点击进入登陆', // 'Click to enter login'

	'ext_info_succ'		=> 'Install&#233; avec Succ&#232;s.',//'安装成功。', // 'Installed successfully.'
	'install_submit'	=> 'Envoyer',//'提交', // 'Submit'
	'install_locked'	=> 'Installez le verrouillage a &#233;t&#233; install&#233;.<br><br>Si vous &#234;tes certain de vouloir r&#233;-installer, allez sur le serveur et supprimez le fichier<br />'.str_replace(ROOT_PATH, '', $lockfile),//'安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile), // 'Install lock has been installed.<br><br>If you sure you want to re-install, go to the server and delete the file<br />'.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Vous devez r&#233;soudre les probl&#232;mes ci-dessus, avant que l\'installation puisse se poursuivre.',//'您必须解决以上问题，安装才可以继续', // 'You must solve the above problems, before the installation can continue.'

	'step_app_reg_title'	=> 'Configuration Environnement',//'设置运行环境', // 'Setting environment'
	'step_app_reg_desc'	=> 'V&#233;rifiez un environnement serveur, et mettre UCenter',//'检测服务器环境以及设置 UCenter', // 'Check the server environment, and set UCenter'
	'tips_ucenter'		=> 'Svp. remplissez les informations pour les UCenter',//'请填写 UCenter 相关信息', // 'Please fill in the information for UCenter'
	'tips_ucenter_comment'	=> 'UCenter est le Comsenz inc. programme de service de base. Discuz! Conseil et d\'autres applications Comsenz comptent sur ce programme. Si vous avez d&#233;j&#224; install&#233; UCenter, Svp. remplir les informations ci-dessous. Sinon, Svp. aller &#224; <a href="http://www.discuz.com/" target="blank">Produits Comsenz</a> pour t&#233;l&#233;charger et installer UCenter, puis continuer.',//'UCenter 是 Comsenz 公司产品的核心服务程序，Discuz! Board 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。', // 'UCenter is the Comsenz inc. core service program. Discuz! Board and other Comsenz applications rely on this program. If you have already installed UCenter, please fill in the information below. Otherwise, please go to <a href="http://www.discuz.com/" target="blank">Comsenz Products</a> to download and install UCenter, and then continue.'

	'advice_mysql_connect'		=> 'Svp. v&#233;rifiez le module MySQL est correctement charg&#233;.',//'请检查 mysql 模块是否正确加载', // 'Please check the mysql module is loaded correctly.'
	'advice_fsockopen'		=> 'Cette fonction n&#233;cessite <b>allow_url_fopen</b> possibilit&#233; d\'&#234;tre <b>On</b> in php.ini. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能', // 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.'
	'advice_gethostbyname'		=> 'Configuration de PHP n\'est pas permis &#224; la <b>gethostbyname</b> fonction. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能', // 'PHP configuration is not allowed the <b>gethostbyname</b> function. Please contact the server administrator to resolve this problem.'
	'advice_file_get_contents'	=> 'Cette fonction n&#233;cessite <b>allow_url_fopen</b> option to <b>On</b> in php.ini. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能', // 'This function require the <b>allow_url_fopen</b> option to <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.'
	'advice_xml_parser_create'	=> 'Cette fonction n&#233;cessite le soutien PHP de XML. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能', // 'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.'

	'ucurl'				=> 'UCenter URL',//'UCenter 的 URL', // 'UCenter URL'
	'ucpw'				=> 'Ucenter Mot de Passe Administrateur',//'UCenter 创始人密码', // 'UCenter administrator password'
	'ucip'				=> 'UCenter adresse IP',//'UCenter 的IP地址', // 'UCenter IP address'
	'ucenter_ucip_invalid'		=> 'Format Invalide, Svp. indiquer l\'adresse IP correctement',//'格式错误，请填写正确的 IP 地址', // 'Invalid format, please fill in the correct IP address'
	'ucip_comment'			=> 'Dans la plupart des cas, vous pouvez laisser ce vide',//'绝大多数情况下您可以不填', // 'In most cases you can leave this empty'

	'tips_siteinfo'			=> 'Svp. remplir les informations du site',//'请填写站点信息', // 'Please fill in the site information'
	'sitename'			=> 'Nom du Site',//'站点名称', // 'Site Name'
	'siteurl'			=> 'URL du Site',//'站点 URL', // 'Site URL'

	'forceinstall'			=> 'Installation Obligatoire',//'强制安装', // 'Mandatory installation'
	'dbinfo_forceinstall_invalid'	=> 'Pr&#233;fixe Actuel  de table de donn&#233;es est d&#233;j&#224; utilis&#233; par la table des m&#234;mes donn&#233;es! Vous pouvez modifier le "Pr&#233;fixe de Table de nom" d\'&#233;viter de supprimer les anciennes donn&#233;es, ou choisir de forcer l\'installation obligatoire. Installation obligatoire va supprimer toutes les anciennes donn&#233;es, et ces donn&#233;es anciennes ne peuvent pas &#234;tre restaur&#233;es.',//'当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复', //  'Current database table prefix is already used by the same data table! You can modify the "Table name prefix" to avoid deleting the old data, or choose to force the mandatory installation. Mandatory installation will delete all the old data, and this old data can not be restored.'

	'click_to_back'			=> 'Cliquez ici pour retourner',//'点击返回上一步', // 'Click to go Back'
	'adminemail'			=> 'Administratif E-Mail',//'系统信箱 Email', // 'Administrative E-Mail'
	'adminemail_comment'		=> 'Utilis&#233; pour envoyer les rapports d\'erreur',//'用于发送程序错误报告', // 'Used to send error reports'
	'dbhost_comment'		=> 'Adresse de l\'h&#244;te serveur de base, g&#233;n&#233;ralement localhost',//'数据库服务器地址, 一般为 localhost', // 'Database server host address, usually localhost'
	'tablepre_comment'		=> 'Pour utiliser des applications multiples avec la m&#234;me base, Svp. modifier le pr&#233;fixe de table',//'同一数据库运行多个论坛时，请修改前缀', //  'For use multiple applications with the same database, please modify the teble prefix'
	'forceinstall_check_label'	=> 'Je veux supprimer toutes les donn&#233;es, et de commencer l\'installation obligatoire!',//'我要删除数据，强制安装 !!!', // 'I want to delete all the data, and start mandatory installation!'

	'uc_url_empty'			=> 'Vous avez &#224; remplir dans l\'URL UCenter',//'您没有填写 UCenter 的 URL，请返回填写', // 'You have to fill in the UCenter URL'
	'uc_url_invalid'		=> 'Format d\'URL est invalide UCenter',//'URL 格式错误', // 'UCenter URL format is invalid'
	'uc_url_unreachable'		=> 'Adresse URL UCenter est inaccessible, Svp. v&#233;rifier',//'UCenter 的 URL 地址可能填写错误，请检查', // 'UCenter URL address is unreachable, please check'
	'uc_ip_invalid'			=> 'Impossible de r&#233;soudre le nom de domaine, Svp. remplir l\'adresse IP du site',//'无法解析该域名，请填写站点的 IP', // 'Can not resolve the domain name, please fill in the site IP address'
	'uc_admin_invalid'		=> 'UCenter administrateur mot de passe invalide, Svp. re-remplir',//'UCenter 创始人密码错误，请重新填写',  //  'UCenter administrator password invalid, please re-fill'
	'uc_data_invalid'		=> 'D&#233;faillance de communication UCenter. V&#233;rifiez l\'adresse URL est correcte UCenter',//'通信失败，请检查 UCenter 的URL 地址是否正确 ',  //  'UCenter communication failure. Check the UCenter URL address is correct'
	'uc_dbcharset_incorrect'	=> 'Mettre UCenter caract&#232;res de la base est incompatible avec le jeu de caract&#232;res application actuelle',//'UCenter 数据库字符集与当前应用字符集不一致',  //  'UCenter database character set is inconsistent with the current application character set'
	'uc_api_add_app_error'		=> 'Ajout &#224; une erreur d\'application UCenter',//'向 UCenter 添加应用错误', // 'Adding to UCenter application error' 
	'uc_dns_error'			=> 'Erreurs UCenter r&#233;solution DNS. Svp. revenir et de remplir l\'adresse IP UCenter',//'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址', // 'UCenter DNS resolution error. Please return and fill in the UCenter IP address'

	'ucenter_ucurl_invalid'		=> 'URL UCenter est le format vide ou mal plac&#233;s Svp. v&#233;rifier',//'UCenter 的URL为空，或者格式错误，请检查', // 'UCenter URL is empty or wrong format, please check'
	'ucenter_ucpw_invalid'		=> 'UCenter mot de passe administrateur est vide, ou des erreurs de formatage, Svp. v&#233;rifier',//'UCenter 的创始人密码为空，或者格式错误，请检查', // 'UCenter administrator password is blank, or formatting errors, please check'
	'siteinfo_siteurl_invalid'	=> 'L\'URL du site est vide, ou des erreurs de formatage, Svp. v&#233;rifier',//'站点URL为空，或者格式错误，请检查',// 'The site URL is blank, or formatting errors, please check'
	'siteinfo_sitename_invalid'	=> 'Le nom du site est le format vide ou mal plac&#233;s Svp. v&#233;rifier',//'站点名称为空，或者格式错误，请检查', // 'The site name is empty or wrong format, please check'
	'dbinfo_dbhost_invalid'		=> 'Serveur de base est vide, ou de mauvaise forme, Svp. v&#233;rifier',//'数据库服务器为空，或者格式错误，请检查', // 'Database server is empty, or wrong format, please check'
	'dbinfo_dbname_invalid'		=> 'Nom de la base est vide, ou de mauvaise forme, Svp. v&#233;rifier',//'数据库名为空，或者格式错误，请检查', // 'Database name is empty, or wrong format, please check'
	'dbinfo_dbuser_invalid'		=> 'Nom d\'utilisateur base de donn&#233;es est vide, ou une erreur de format, Svp. v&#233;rifier',//'数据库用户名为空，或者格式错误，请检查', // 'Database user name is blank, or format error, please check'
	'dbinfo_dbpw_invalid'		=> 'Base de donn&#233;es de mot de passe est vide, ou une erreur de format, Svp. v&#233;rifier',//'数据库密码为空，或者格式错误，请检查', // 'Database password is blank, or format error, please check'
	'dbinfo_adminemail_invalid'	=> 'L\'adresse email du site syst&#232;me est vide, ou une erreur de format, Svp. v&#233;rifier',//'系统邮箱为空，或者格式错误，请检查', // 'The site system email address is empty, or format error, please check'
	'dbinfo_tablepre_invalid'	=> 'Le pr&#233;fixe de table est vide, ou une erreur de format, Svp. v&#233;rifier',//'数据表前缀为空，或者格式错误，请检查', // 'Table prefix is blank, or format error, please check'
	'admininfo_username_invalid'	=> 'Nom d\'utilisateur administrateur est vide, ou une erreur de format, Svp. v&#233;rifier',//'管理员用户名为空，或者格式错误，请检查', // 'Administrator user name is blank, or format error, please check'
	'admininfo_email_invalid'	=> 'Email administrateur est vide, ou une erreur de format, Svp. v&#233;rifier',//'管理员Email为空，或者格式错误，请检查', // 
	'admininfo_password_invalid'	=> 'Mot de passe administrateur est vide, Svp. remplir',//'管理员密码为空，请填写', // 'Administrator password is blank, please fill in'
	'admininfo_password2_invalid'	=> 'Deux mots de passe ne sont pas &#233;gaux, Svp. v&#233;rifier',//'两次密码不一致，请检查', // 'Two passwords are not equal, please check'

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> New Discuz! X installation (incluant UCenter serveur)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 全新安装 Discuz! X (含 UCenter Server)</label>', // '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> New Discuz! X installation (including UCenter Server)</label>'
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Installez Discuz! X uniquement (Indiquer manuellement install&#233; UCenter serveur)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> 仅安装 Discuz! X (手工指定已经安装的 UCenter Server)</label>', // '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Install Discuz! X only (specify manually already installed UCenter Server)</label>'

	'username'			=> 'Admin.Identifiant',//'管理员账号', // 'Administrator username'
	'email'				=> 'Admin.E-mail',//'管理员 Email', // 'Administrator Email'
	'password'			=> 'Admin.Mot de Passe',//'管理员密码', // 'Administrator password' 
	'password_comment'		=> 'Mot de passe Administrateur ne peut pas &#234;tre vide',//'管理员密码不能为空', //  'Administrator password can not be empty'
	'password2'			=> 'R&#233;p&#233;tez le mot de passe',//'重复密码', // 'Repeat password'

	'admininfo_invalid'		=> 'Informations Administrateur n\'est pas compl&#232;te, consultez le usernamet administrateur, mot de passe, email',//'管理员信息不完整，请检查管理员账号，密码，邮箱', // 'Administrator information is not complete, check the administrator usernamet, password, email'
	'dbname_invalid'		=> 'Nom de la base est vide, Svp. remplir le nom de la base',//'数据库名为空，请填写数据库名称', // 'Database name is empty, please fill in the database name'
	'tablepre_invalid'		=> 'Le pr&#233;fixe de table est vide ou erreur de format, Svp. v&#233;rifier',//'数据表前缀为空，或者格式错误，请检查', // 'Table prefix is blank or format error, please check'
	'admin_username_invalid'	=> 'Nom d\'utilisateur ill&#233;gal! Longueur du nom utilisateur ne doit pas &#234;tre plus de 15 caract&#232;res en anglais, et ne peut pas contenir de caract&#232;res sp&#233;ciaux, comme des lettres ou des chiffres chinois',//'非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字', // 'Illegal user name! User name length should not be more than 15 English characters, and can not contain special characters, like Chinese letters or numbers'
	'admin_password_invalid'	=> 'Mot de passe et les &#233;carts ci-dessus, Svp. entrer de nouveau',//'密码和上面不一致，请重新输入', // 'Password and the above discrepancies, please re-enter'
	'admin_email_invalid'		=> 'L\'adresse e-mail utilis&#233;e est invalide ou le format est invalide, Svp. changer pour r&#233;pondre &#224; d\'autres',//'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址', // 'The e-mail address used is invalid or the format is invalid, please change to other address'
	'admin_invalid'			=> 'Vous n\'avez pas rempli les informations d\'administrateur complets, Svp. remplissez soigneusement chaque &#233;l&#233;ment',//'您的信息管理员信息没有填写完整，请仔细填写每个项目', // 'You did not fill in complete administrator information, please carefully fill in each item'
	'admin_exist_password_error'	=> 'Cet utilisateur existe d&#233;j&#224;. Si vous souhaitez d&#233;finir cet utilisateur comme administrateur, Svp. entrez le mot correct pour l\'utilisateur, ou de remplacer le nom de l\'administrateur',//'该用户已经存在，如果您要设置此用户为论坛的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字', // 'This user already exists. If you want to set this user as an administrator, please enter the correct password for the user, or replace the administrator name'

	'tagtemplates_subject'		=> 'Titre',//'标题', // 'Title'
	'tagtemplates_uid'		=> 'UTILISATEUR ID',//'用户 ID', // 'User ID'
	'tagtemplates_username'		=> 'Publi&#233; par',//'发帖者', // 'Posted by'
	'tagtemplates_dateline'		=> 'Date',//'日期', //  'Date'
	'tagtemplates_url'		=> 'URL Mod&#232;les',//'主题地址', // 'Templates URL'

	'uc_version_incorrect'		=> 'Votre version du serveur UCenter est trop ancien. Svp. mettre &#224; niveau le service UCenter avec la derni&#232;re version. T&#233;l&#233;charger l\'adresse: http://www.comsenz.com/.',//'您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。', // 'Your UCenter server version is too old. Please upgrade the UCenter service with the latest version. Download address: http://www.comsenz.com/.'
	'config_unwriteable'		=> 'Assistant de configuration ne peut pas &#233;crire le fichier de configuration. Activer les permissions d\'&#233;criture config.inc.php (666 or 777)',//'安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)', // 'Setup Wizard can not write the configuration file. Enable the config.inc.php write permissions (666 or 777)'

	'install_in_processed'		=> 'Installation ...',//'正在安装...', // 'Installing ...'
	'install_succeed'		=> 'Installation avec succ&#232;s! Cliquez ici pour entrer votre Discuz! X2',//'安装成功，点击进入', // 'Installation successfully completed! Click here to enter your Discuz! X2'
	'install_cloud'			=> 'Apr&#232;s une installation r&#233;ussie, Bienvenue &#224; l\'ouverture de Discuz! cloud Platform<br>Discuz! Cloud Platform d&#233;di&#233;e &#224; aider les propri&#233;taires de site Web pour augmenter leur trafic de sites Web, de renforcer la capacit&#233; des op&#233;rateurs de sites Web, et d\'augmenter un chiffre d\'affaires site.<br>Discuz! Cloud Platform fournit actuellement un Internet libre QQ, Tencent analyse, Nuage de recherche, QQ groupe communautaire, d\'itin&#233;rance, SOSO &#233;motic&#244;ne services.Discuz! Cloud Platform continuera &#224; fournir des services de qualit&#233; plus pour le projet.<br>Avant ouverture de Discuz! Platform make sure that your website (Discuz!, UCHome ou SupeSite) a &#233;t&#233; am&#233;lior&#233; pour Discuz! X2.',//'安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。', // 'After successful installation, Welcome to the opening Discuz! Cloud platform<br>Discuz! Cloud platform dedicated to help website owners to increase their websites traffic, enhance the ability of Web site operators, and increase a website revenue.<br>Discuz! Cloud platform currently provides a free QQ Internet, Tencent analysis, Cloud search, QQ Group Community,Roaming,SOSO emoticon services.Discuz! Cloud platform will continue to provide more quality services to the project.<br>Before open the Discuz! Platform make sure that your website (Discuz!, UCHome or SupeSite) has been upgraded to Discuz! X2.'
	'to_install_cloud'		=> 'Ouvrir Admin-Center',//'到后台开通', // 'Open Admin-Center'
	'to_index'			=> 'Temporairement pas ouvert',//'暂不开通',  // 'Temporarily not open'

	'init_credits_karma'	=> 'R&#233;putation',//'威望',//!!! The same in install_var.php // 'Reputation'
	'init_credits_money'	=> 'Points',//'金钱',//!!! The same in install_var.php // 'Points'

	'init_postno0'		=> '#1',//'楼主',//!!! The same in install_var.php   // '#1'
	'init_postno1'		=> '#2',//'沙发',    //!!! The same in install_var.php  // '#2'
	'init_postno2'		=> '#3',//'板凳',   //!!! The same in install_var.php // '#3'
	'init_postno3'		=> '#4',//'地板',   //!!! The same in install_var.php // '#4'

	'init_support'		=> 'Digg',//'支持',   //!!! The same in install_var.php // 'Digg' 
	'init_opposition'	=> 'Enfouir',//'反对',//!!! The same in install_var.php // 'Bury'

	'init_group_0'	=> 'Membre',//'会员', // 'Member'
	'init_group_1'	=> 'Administrateur',//'管理员', // 'Administrator'
	'init_group_2'	=> 'Super Mod&#233;rateur',//'超级版主', // 'Super Moderator'
	'init_group_3'	=> 'Mod&#233;rateur',//'版主', // 'Moderator'
	'init_group_4'	=> 'L/E Membre',//'禁止发言', // 'R/O Member'
	'init_group_5'	=> 'Banni',//'禁止访问', // 'Banned'
	'init_group_6'	=> 'IP Banni',//'禁止 IP', // 'IP Banned'
	'init_group_7'	=> 'Inviter',//'游客', // 'Guest'
	'init_group_8'	=> 'Attendre pour v&#233;rification',//'等待验证会员', // 'Wait for verification'
	'init_group_9'	=> 'D&#233;butant',//'乞丐',  //  'Newbie'
	'init_group_10'	=> 'Junior',//'新手上路', // 'Junior'
	'init_group_11'	=> 'Membre',//'注册会员', //  'Member'
	'init_group_12'	=> 'Membre Novice',//'中级会员', // 'Middle Member'
	'init_group_13'	=> 'Membre Senior',//'高级会员', // 'Senior Member'
	'init_group_14'	=> 'Membre Or',//'金牌会员', // 'Gold Member'
	'init_group_15'	=> 'V&#233;t&#233;ran',//'论坛元老', //'Veteran'

	'init_rank_1'	=> 'D&#233;butant',//'新生入学', // 'Beginner'
	'init_rank_2'	=> 'Apprenti',//'小试牛刀', // 'Apprentice'
	'init_rank_3'	=> 'Interne',//'实习记者', // 'Intern'
	'init_rank_4'	=> 'R&#233;dacteur pigiste',//'自由撰稿人', // 'Freelance writer'
	'init_rank_5'	=> 'Ecrivain distingu&#233;',//'特聘作家', // 'Distinguished Writer'

	'init_cron_1'	=> 'Compteur de Posts aujourd\'hui vides',//'清空今日发帖数', // 'Empty today\'s post count'
	'init_cron_2'	=> 'Videz le temps de ce mois en ligne',//'清空本月在线时间', // 'Empty this month\'s online time'
	'init_cron_3'	=> 'Donn&#233;es quotidiennes de nettoyage',//'每日数据清理', // 'Daily data cleaning'
	'init_cron_4'	=> 'Les statistiques d\'anniversaire et e-mail des abonnements',//'生日统计与邮件祝福', //  'Birthday statistics and e-mail subscriptions'
	'init_cron_5'	=> 'Notifications sujet R&#233;pondre',//'主题回复通知', // 'Topic reply notifications'
	'init_cron_6'	=> 'Bulletin quotidien de nettoyage',//'每日公告清理', // 'Daily bulletin clean up'
	'init_cron_7'	=> 'Limit&#233;es dans le temps op&#233;ration de nettoyage',//'限时操作清理', // 'Time-limited operation clean-up'
	'init_cron_8'	=> 'Messages de promotion de nettoyage',//'论坛推广清理', // 'Promotion messages clean-up'
	'init_cron_9'	=> 'Sujet mensuel de nettoyage',//'每月主题清理', // 'Monthly topic clean-up'
	'init_cron_10'	=> 'Mise &#224; jour quotidienne X-Espace utilisateurs',//'每日 X-Space更新用户', // 'Daily update X-Space users'
	'init_cron_11'	=> 'Mise &#224; jour hebdomadaire Topic',//'每周主题更新', // 'Weekly topic update'

	'init_bbcode_1'	=> 'Alors que le contenu de d&#233;filement horizontal, l\'effet est similaire aux balises HTML chapiteau, Note: Cet effet n\'est valable que sous Internet Explorer.',//'使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。',  // 'So that the contents of horizontal scrolling, the effect is similar to the marquee HTML tags, Note: This effect only valid under Internet Explorer browser.'
	'init_bbcode_2'	=> 'Int&#233;gr&#233; animation Flash',//'嵌入 Flash 动画', // 'Embedded Flash animation'
	'init_bbcode_3'	=> 'Voir QQ statut en ligne, cliquez sur cette ic&#244;ne et de discuter avec elle/lui',//'显示 QQ 在线状态，点这个图标可以和他（她）聊天', // 'Show QQ online status, click to this icon and chat with him/her'
	'init_bbcode_4'	=> 'Exposant',//'上标', // 'Superscript'
	'init_bbcode_5'	=> 'Indice',//'下标', // 'Subscript'
	'init_bbcode_6'	=> 'Lecteur Windows M&#233;dia Audio',//'嵌入 Windows media 音频', // 'Embedded Windows media audio'
	'init_bbcode_7'	=> 'Lecteur Windows m&#233;dias audio ou vid&#233;o',//'嵌入 Windows media 音频或视频', // 'Embedded Windows media audio or video'

	'init_qihoo_searchboxtxt'		=> 'Mots-cl&#233;s d\'entr&#233;e pour une recherche rapide dans ce forum',//'输入关键词,快速搜索本论坛', //  'Input keywords for quick search this forum'
	'init_threadsticky'			=> 'Objet Scotch&#233;: top mondial, Haute cat&#233;gorie, ce Top Topic',//'全局置顶,分类置顶,本版置顶', // 'Stick object: Global top, Category Top, This forum top'

	'init_default_style'			=> 'Style par D&#233;faut',//'默认风格', // 'Default Style'
	'init_default_forum'			=> 'Forum par D&#233;faut',//'默认版块', // 'Default Forum'
	'init_default_template'			=> 'Mod&#232;le par D&#233;faut',//'默认模板套系', //   'Default template'
	'init_default_template_copyright'	=> 'Sing Imagination (Beijing) Technologique Co., Ltd.',//'康盛创想（北京）科技有限公司', // 'Sing Imagination (Beijing) Technology Co., Ltd.'

	'init_dataformat'	=> 'Y-m-d',//'Y-n-j', // 'Y-m-d' // French is ==> A-m-j <==
	'init_modreasons'	=> 'Publicit&#233;/SPAM\r\nMalveillants/Hacking\r\nContenu Ill&#233;gal\r\nVieux Sujet\r\nPost Doublon\r\n\r\nJe comprend\r\nExcellent article\r\nOriginal contenu',//'广告/SPAM\r\n恶意灌水\r\n违规内容\r\n文不对题\r\n重复发帖\r\n\r\n我很赞同\r\n精品文章\r\n原创内容', // 'Advertising/SPAM\r\nMalicious/Hacking\r\nIllegal content\r\nOfftopic\r\nRepeated post\r\n\r\nI agree\r\nExcellent article\r\nOriginal content'
	'init_userreasons'	=> 'Efficace!\r\nUtiles\r\nTr&#232;s Agr&#233;able\r\nLe Meilleur!\r\nInt&#233;ressant', // 'Powerfull!\r\nUsefull\r\nVery nice\r\nThe best!\r\nInteresting'
	'init_link'		=> 'Discuz! Forum Officiel',//'Discuz! 官方论坛', //  'Discuz! Official forum',//'Discuz! 官方论坛' // 'Discuz! Official forum'
	'init_link_note'	=> 'Pour fournir les derni&#232;res Discuz! Nouvelles de produit, des t&#233;l&#233;chargements de logiciels et les &#233;changes techniques',//'提供最新 Discuz! 产品新闻、软件下载与技术交流', // 'To provide the latest Discuz! Product news, software downloads and technical exchanges'

	'init_promotion_task'	=> 'Site de promotion des t&#226;ches',//'网站推广任务', //  'Website promotion task'
	'init_gift_task'	=> 'T&#226;che Initial.cadeau',//'红包类任务', //  'Init Gift Task'
	'init_avatar_task'	=> 'T&#226;che Avatar',//'头像类任务', // 'Avatar Task'

	'license'	=> '<div class="license"><h1>Contrat de Licence</h1>

<p>Droit d\'Auteur (c) 2001-2010, Hong Sing Imagination (Beijing) Technologique Co., Ltd. Tous droits r&#233;serv&#233;s.</p>

<p>Merci d\'avoir choisi Discuz! forum. Nous esp&#233;rons que notre produit sera en mesure de vous fournir une solution rapide, forum communautaire efficace et puissant.</p>

<p>Discuz! Anglaise le nom complet Crossday Discuz! Conseil, chinois Discuz nom complet! Forum, ci-apr&#232;s d&#233;nomm&#233; Discuz!.</p>

<p>Sing Imagination (Beijing) Technologique Co., Ltd. pour la Discuz! d&#233;veloppeurs de produits, et ils auront Discuz! Droit d\'Auteur produit (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technologique Co., Ltd. website http://www.comsenz.com, Discuz! Adresse du site officiel est http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>

<p>Discuz! droit d\'Auteur a &#233;t&#233; enregistr&#233; dans Le Peuple le droit d\'Auteur R&#233;publique de Chine Administration nationale du droit d\'Auteur, et par des trait&#233;s internationaux. Utilisateur: qu\'il s\'agisse de particuliers ou d\'organisations, lucratives ou non, la fa&#184;on d\'utiliser (y compris l\'&#233;tude et de recherche), sont tenus de lire attentivement cet accord, comprendre, accepter et respecter tous les termes de cet accord seulement apr&#232;s le d&#233;but en utilisant Discuz! logiciel.</p>

<p>Cette licence s\'applique et ne s\'applique qu\'aux Discuz! X version, Hong Sing Imagination (Beijing) Technologique Co., Ltd. a le pouvoir d\'interpr&#233;tation d&#233;finitive de l\'accord de licence.</p>

<h3>I. Accord sur les droits de licence</h3>
<ol>
<li>Vous pouvez respecter pleinement l\'accord de licence utilisateur final, bas&#233; sur le logiciel utilis&#233; dans cet usage non commercial, sans avoir &#224; payer les frais de droits d\'Auteur du logiciel de licence.</Li>
<li>Accord que vous pouvez dans les contraintes et les limites de modifier Discuz! styles de code source (si fournis) ou l\'interface en fonction de vos besoins du site.</Li>
<li>Vous devez utiliser ce logiciel pour cr&#233;er le forum toutes les informations concernant ses membres, des articles et des informations li&#233;es &#224; la propri&#233;t&#233;, et est ind&#233;pendante de l\'engagement et les obligations juridiques li&#233;es &#224; la teneur article.</Li>
<li>Une licence commerciale, vous pouvez utiliser ce logiciel pour des applications commerciales, alors que selon le type de licence achet&#233;e pour d&#233;terminer la p&#233;riode de support technique, support technique, formulaire de support technique et du contenu, du moment de l\'achat, dans la p&#233;riode de support technique avoir un moyen de passer &#224; travers les domaines sp&#233;cifi&#233;s d&#233;sign&#233;s de services de soutien technique. Les utilisateurs professionnels autoris&#233;s ont le pouvoir de r&#233;fl&#233;chir et de commenter, les commentaires pertinents seront une consid&#233;ration primordiale, mais pas n&#233;cessairement accept&#233;e promesse ou </Li>
</ol>

<h3>II. Accord contraintes et limites</h3>
<ol>
<li>Business licence n\'a pas &#233;t&#233; avant, peut ne pas utiliser ce logiciel &#224; des fins commerciales (y compris mais non limit&#233; &#224; des sites d\'affaires, op&#233;rations commerciales, &#224; des fins commerciales ou site web lucratif). Achat de licence commerciale, Svp. visitez les instructions de r&#233;f&#233;rence http://www.discuz.com, appelez 8610-51657885 pour plus de d&#233;tails.</Li>
<li>Peut ne pas associ&#233;s avec le logiciel ou d\'une licence d\'entreprise pour la location, la vente, hypoth&#232;que ou accorder des sous-licences.</Li>
<li>En tout cas, que peu importe comment utilis&#233;, modifi&#233; ou l\'am&#233;nagement paysager, les changements dans quelle mesure, il suffit d\'utiliser Discuz! en tout ou en partie, sans l\'autorisation &#233;crite du Forum de bas de page D&#233;partement Discuz! Chantez le nom et l\'imagination (Beijing) Technology Co., Ltd site Web affili&#233; (http://www.comsenz.com, http://www.discuz.com ou http://www.discuz.net) le lien doit &#234;tre retenu, et non pas supprim&#233;es ou modifi&#233;es.</Li>
<li>Interdit Discuz! la totalit&#233; ou toute partie de la base &#224; l\'&#233;laboration d\'une version d&#233;riv&#233;e, version modifi&#233;e ou tiers de version de la redistribution.</Li>
<li>Si vous avez omis de se conformer aux termes du pr&#233;sent Accord, votre permis sera r&#233;sili&#233;, les droits concessionnaire sera r&#233;cup&#233;r&#233;, et assumer la responsabilit&#233; juridique correspondante.</Li>
</ol>

<h3>III. Garantie limit&#233;e et limitation de responsabilit&#233;</h3>
<ol>
<li>Les logiciels et les documents d\'accompagnement que de ne pas fournir toute garantie expresse ou implicite, ou de garantie sous la forme de l\'indemnit&#233; pr&#233;vue.</li>
<li>L\'utilisation volontaire de l\'utilisateur de ce logiciel, vous devez comprendre les risques de l\'utilisation de ce logiciel, les services techniques dans le pas d\'acheter des produits avant, nous ne promettons pas de fournir toute forme d\'appui technique, l\'utilisation de garanties, ni responsable de toute utilisation de cette probl&#232;mes logiciels li&#233;s &#224; la responsabilit&#233; d&#233;coulant.</li>
<li>Hong Sing Soci&#233;t&#233; n\'utilise pas le logiciel pour construire un site web ou un forum de poste ou responsable de l\'information, vous assumez l\'enti&#232;re responsabilit&#233;.</li>
<li>Hong Sing soci&#233;t&#233; fournit des logiciels et services en temps opportun, la s&#233;curit&#233;, l\'exactitude n\'est pas garantie, en raison de force majeure, &#224; Hong Chantez facteurs hors du contr&#244;le de l\'entreprise (y compris les attaques de pirates, la puissance de freinage, etc) caus&#233;s par des logiciels et des services de suspension ou de r&#233;siliation, et donner &#224; votre perte, vous vous engagez &#224; chanter la renonciation de responsabilit&#233; d\'entreprise de tous les droits.</li>
<li>Hong Sing Soci&#233;t&#233; sp&#233;cifiquement attirer votre attention sur Hong Chantez Soci&#233;t&#233; afin de prot&#233;ger le d&#233;veloppement des affaires et l\'ajustement de l\'autonomie, Hong Chantez Soci&#233;t&#233; a &#224; tout moment avec ou sans pr&#233;avis de modifier le contenu du service, de suspendre ou de r&#233;silier tout ou partie des droits des logiciels et services, les changements seront affich&#233;s sur les pages pertinentes du site Web de Sing, y compris, sans pr&#233;avis. Hong Chantez Soci&#233;t&#233; de modifier ou interrompre l\'exercice, la cessation de tout ou partie des droits des logiciels et de services r&#233;sultant de la perte, sans Hong Chantez Soci&#233;t&#233; envers vous ou tout tiers.
</li>
</ol>


<p>Hong produits chantent sur l\'utilisateur final de licence contrat de licence d\'entreprise, et des services techniques aux d&#233;tails fournis par le Hong Chantez exclusif. Chantez la soci&#233;t&#233; a, sans pr&#233;avis, de modifier le contrat de licence et la liste des prix des services droit de l\'accord modifi&#233; ou liste de prix du changement de la date du nouvel utilisateur autoris&#233; &#224; prendre effet.</p>
<p>Une fois que vous lancez l\'installation &#224; Hong produits Sing, est r&#233;put&#233; pour bien comprendre et accepter les termes du pr&#233;sent Accord, les termes dans la jouissance des droits reconnus dans le m&#234;me temps, par les contraintes et des restrictions pertinentes. Accord de licence en dehors de la port&#233;e des actes serait une violation directe de cet accord de licence et constituerait une contrefa&#184;on, nous avons le droit de r&#233;silier l\'autorisation, doit &#234;tre command&#233; d\'arr&#234;ter les d&#233;g&#226;ts, et de conserver le pouvoir d\'enqu&#234;ter responsabilit&#233;s connexes.</p>
<p>L\'interpr&#233;tation des termes du contrat de licence, la validit&#233; et de r&#232;glement des diff&#233;rends, applicable &#224; la partie continentale de gens de la R&#233;publique de droit.</p>
<p>Entre Hong Sing si vous et tout litige ou toute controverse, devrait d\'abord &#234;tre r&#233;gl&#233;s par voie de consultations amicales, la consultation &#233;choue, vous acceptez de soumettre le diff&#233;rend ou controverse Cour Chantez Haidian District gens d\'o&#249; la comp&#233;tence. Hong Chantez Soci&#233;t&#233; a le droit d\'interpr&#233;ter les termes ci-dessus et la discr&#233;tion.</p>
</div>',

	'uc_installed'		=> 'Vous avez install&#233; le UCenter. Si vous avez besoin de r&#233;-installer, supprimer les donn&#233;es/install.lock fichier',//'您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件', // 'You have installed the UCenter. If you need to re-install, delete the data/install.lock file'
	'i_agree'		=> 'J\'ai lu et j\'accepte tous les &#233;l&#233;ments des Conditions',//'我已仔细阅读，并同意上述条款中的所有内容', // 'I have read and agree to all the elements of the Terms'
	'supportted'		=> 'Pris en charge',//'支持', //  'Supported'
	'unsupportted'		=> 'Non pris en charge',//'不支持', //  'Unsupportted'
	'max_size'		=> 'Pris en charge / Taille Maxi.',//'支持/最大尺寸', //  'Supported / Max Size'
	'project'		=> 'Projet',//'项目', //  'Project'
	'ucenter_required'	=> 'Obligatoires',//'Discuz! 所需配置', //  'Required'
	'ucenter_best'		=> 'Pr&#233;f&#233;r&#233;s',//'Discuz! 最佳', //  'Preferred'
	'curr_server'		=> 'Serveur Actuel',//'当前服务器', //  'Current server'
	'env_check'		=> 'V&#233;rifiez les conditions',//'环境检查', // 'Check environment'
	'os'			=> 'Syst&#232;me d\'exploitation',//'操作系统', // 'Operating System'
	'php'			=> 'Version PHP',//'PHP 版本', //  'PHP Version'
	'attachmentupload'	=> 'Pi&#232;ce jointe t&#233;l&#233;charger',//'附件上传', //  'Attachment upload'
	'unlimit'		=> 'Aucune limite',//'不限制', // 'No limit'
	'version'		=> 'Version',//'版本', // 'Version'
	'gdversion'		=> 'Librairie GD',//'GD 库', // 'GD Library'
	'allow'			=> 'Autoriser',//'允许', // 'Allow'
	'unix'			=> 'Unix-like',//'类Unix', //  'Unix-like'
	'diskspace'		=> 'Espace Disque',//'磁盘空间', // 'Disk Space'
	'priv_check'		=> 'V&#233;rifiez le r&#233;pertoire/Permissions des Fichiers',//'目录、文件权限检查', // 'Check directory/file permissions'
	'func_depend'		=> 'V&#233;rifier les d&#233;pendances en fonction',//'函数依赖性检查', // 'Check function dependency'
	'func_name'		=> 'Nom de la Fonction',//'函数名称', // 'Function name'
	'check_result'		=> 'V&#233;rifier le r&#233;sultat',//'检查结果', // 'Check result'
	'suggestion'		=> 'Recommandation',//'建议', // 'Recommendation'
	'advice_mysql'		=> 'Svp. v&#233;rifiez le module MySQL est correctement charg&#233;',//'请检查 mysql 模块是否正确加载', // 'Please check the mysql module is loaded correctly'
	'advice_fopen'		=> 'Cette fonction n&#233;cessite <b>allow_url_fopen</b> possibilit&#233; d\'&#234;tre <b>On</b> dans php.ini. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能', // 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.'
	'advice_file_get_contents'	=> 'Cette fonction n&#233;cessite <b>allow_url_fopen</b> possibilit&#233; d\'&#234;tre <b>On</b> dans php.ini. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能', // 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.'
	'advice_xml'			=> 'Cette fonction n&#233;cessite le soutien PHP de XML. Svp. contactez l\'administrateur du serveur pour r&#233;soudre ce probl&#232;me.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能', // 'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.'
	'none'				=> 'Aucun',//'无', // 'None'

	'dbhost'		=> 'Serveur Base de Donn&#233;es',//'数据库服务器',  // 'Database server'
	'dbuser'		=> 'Base de donn&#233;es identifiant',//'数据库用户名',  // 'Database username'
	'dbpw'			=> 'Base de donn&#233;es mot de passe',//'数据库密码',  // 'Database password'
	'dbname'		=> 'Nom Base Donn&#233;es',//'数据库名',  // 'Database name'
	'tablepre'		=> 'Le Pr&#233;fixe de Table',//'数据表前缀',  // 'Table prefix'

	'ucfounderpw'		=> 'UCenter mot de passe admin',//'创始人密码',  // 'UCenter admin password'
	'ucfounderpw2'		=> 'R&#233;p&#233;tez UCenter mot de passe admin',//'重复创始人密码',  // 'Repeat UCenter admin password'

	'init_log'		=> 'Initialiser journaux',//'初始化记录',  // 'Initialize log'
	'clear_dir'		=> 'Effacer le r&#233;pertoire',//'清空目录',  // 'Clear directory'
	'select_db'		=> 'Choisissez la base de donn&#233;es',//'选择数据库',  // 'Select the database'
	'create_table'		=> 'Cr&#233;er la Table',//'建立数据表',  // 'Create table'
	'succeed'		=> 'Succ&#232;s',//'成功 ',  // 'Success'

	'testdata'			=> 'Ajouter des donn&#233;es des r&#233;gions',//'附加数据',  // 'Add regions data'
	'testdata_check_label'		=> 'Installez donn&#233;es r&#233;gionales suppl&#233;mentaires (countries/regions/cities)',//'Install demo page templates (4)', // 'Install additional regional data'
	'portalstatus'			=> 'Statut Portail',  // 'Portal status'
	'portalstatus_check_label'	=> '',  //  '',
	'groupstatus'			=> 'Groupes Statut', // 'Groups status'
	'groupstatus_check_label'	=> '',  // '',
	'homestatus'			=> 'Statut Accueil',  // 'Home Status'
	'homestatus_check_label'	=> '',  // '',
	'install_data'			=> 'Les donn&#233;es sont Install&#233;es avec Succ&#232;s',//'正在安装数据',  // 'Data installed successfully'
	'install_test_data'		=> 'Installer les Donn&#233;es R&#233;gionales',//'正在安装附加数据',  // 'Install regional data'

	'method_undefined'		=> 'M&#233;thode Non D&#233;finie',//'未定义方法',  // 'Undefined method'
	'database_nonexistence'		=> 'Objet base de donn&#233;es Inexistante',//'数据库操作对象不存在', // 'Database object does not exist'
	'skip_current'			=> 'Passer cette &#233;tape',//'跳过本步', // 'Skip this step'
	'topic'				=> 'Topic',//'专题', // 'Topic'
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> 'Bienvenue chez Discuz! X Installation!',  //  'Welcome to Discuz! X Installation!'
	'select_language'		=> '<b>Choisissez la langue d\'installation</b>:', // '<b>Select the installation language</b>:'
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',

//---------------------------------------------------------------
// Added by Bertrand

	'FR_UTF8'		=> 'FRANCAIS UTF-8', // 'FRANCAIS UTF-8'
	'FR_ISO'		=> 'FRANCAIS ISO8859', // 'FRANCAIS ISO8859'

);

$msglang = array(
	'config_nonexistence'	=> 'Votre config.inc.php fichier sont Inexistants. Impossible de de poursuivre l\'installation, Svp. utiliser le FTP pour télécharger le fichier et essayez à nouveau.',//'您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
);

?>