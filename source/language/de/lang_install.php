<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2010-09-20) by Coldcut - http://www.cybertipps.com
 */

define('UC_VERNAME', 'International Version');

$lang = array(
	'SC_GBK'		=> 'Vereinfachtes Chinesisch GBK encoding',//'简体中文版',
	'TC_BIG5'		=> 'Traditionelles  Chinesisch BIG5 encoding',//'繁体中文版',
	'SC_UTF8'		=> 'Vereinfachtes Chinesisch UTF8 encoding',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditionelles  Chinesisch UTF8 encoding',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install'		=> SOFT_NAME.' Setup-Assistent',//SOFT_NAME.' 安装向导',
	'agreement_yes'		=> 'Ich stimme zu',//'我同意',
	'agreement_no'		=> 'Ich bin nicht einverstanden',//'我不同意',
	'notset'		=> 'Unlimitiert',

	'message_title'		=> 'Nachricht',//'提示信息',
	'error_message'		=> 'Fehlermeldung',//'错误信息',
	'message_return'	=> 'Zur&uuml;ck',//'返回',
	'return'		=> 'Zur&uuml;ck',//'返回',
	'install_wizard'	=> 'Setup-Assistent',//'安装向导',
	'config_nonexistence'	=> 'Konfigurationsdatei existiert nicht',//'配置文件不存在',
	'nodir'			=> 'Verzeichnis existiert nicht',//'目录不存在',
	'redirect'		=> 'Der Browser leitet automatisch weiter.<br>Falls er nicht automatisch weiterleitet, bitte hier klicken',//'浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'auto_redirect'		=> 'Der Browser wird automatisch die Seite weiterleiten',//'浏览器会自动跳转页面，无需人工干预',
	'database_errno_2003'	=> 'Kann keine Verbindung zur Datenbank herstellen, bitte &uuml;berpr&uuml;fen ob sie startet und ob die Url stimmt',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> 'Kann keine neue Datenbank erstellen, bitte &uuml;berpr&uuml;fe ob der Datenbankname korrekt ist',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> 'Keine Verbindung zur Datenbank, &uuml;berpr&uuml;fe ob der Datenbankbenutzername und das Passwort korrekt sind.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064'	=> 'SQL Satz illegal',//'SQL 语法错误',

	'dbpriv_createtable'	=> 'Keine Berechtigung um CREATE TABLE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_insert'		=> 'Keine Berechtigung um INSERT auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_select'		=> 'Keine Berechtigung um SELECT auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_update'		=> 'Keine Berechtigung um UPDATE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_delete'		=> 'Keine Berechtigung um DELETE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_droptable'	=> 'Keine Berechtigung um DROP TABLE auszuf&uuml;hren, es kann nicht fortgesetzt werden',

	'db_not_null'		=> 'Sie haben UCenter in der selben Datenbank erstellt, wenn Sie fortfahren werden die vorhandenen Daten &uuml;berschrieben.',
	'db_drop_table_confirm'	=> 'Alle vorhandenen Daten werden &uuml;berschrieben, sind Sie sicher das Sie fortfahren m&ouml;chten?',

	'writeable'		=> 'Beschreibbar',
	'unwriteable'		=> 'Nicht Beschreibbar',
	'old_step'		=> 'Zur&uuml;ck',
	'new_step'		=> 'Weiter',

	'database_errno_2003'	=> 'Keine Verbindung zur Datenbank, bitte &uuml;berpr&uuml;fen ob sie startet und ob die Url stimmt',
	'database_errno_1044'	=> 'Kann keine neue Datenbank erstellen, bitte &uuml;berpr&uuml;fe ob der Datenbankname korrekt ist',
	'database_errno_1045'	=> 'Keine Verbindung zur Datenbank, &uuml;berpr&uuml;fe ob der Datenbankbenutzername und das Passwort korrekt sind',
	'database_connect_error'	=> 'Datenbank Verbindungsfehler',

'step_title_1'		=> 'Check environment',//'检查安装环境',
'step_title_2'		=> 'Set environment',//'设置运行环境',
'step_title_3'		=> 'Create Database',//'创建数据库',
'step_title_4'		=> 'Install',//'安装',
'step_env_check_title'	=> 'Start Installation',//'开始安装',
	'step_env_check_desc'	=> 'Env & Einstellungs-Check',
	'step_db_init_title'	=> 'Installiere Datenbank',
	'step_db_init_desc'	=> 'Installiere Datenbank und Administrator-Konfiguration',
	
	'step1_file'		=> 'Dir & File',
	'step1_need_status'	=> 'Erforderlich',
	'step1_status'		=> 'Aktuell',
	'not_continue'		=> 'Was in roter Farbe angezeigt wird, bitte &auml;ndern und erneut versuchen.',

	'tips_dbinfo'		=> 'Datenbank Information',
	'tips_dbinfo_comment'	=> '',
	'tips_admininfo'	=> 'Administrator Information',
	'step_ext_info_title'	=> 'Installiert',
	'step_ext_info_comment'	=> 'Hier klicken um einzuloggen.',

	'ext_info_succ'		=> 'Installation war Erfolgreich',
	'install_submit'	=> '&Uuml;bermitteln',
	'install_locked'	=> 'Die Installation wurde durch eine fr&uuml;here Installation gesperrt, bitte l&ouml;schen Sie<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Das obere Problem muss gel&ouml;st werden bevor Sie weiterfahren k&ouml;nnen',

	'step_app_reg_title'	=> 'Setup Umgebung',
	'step_app_reg_desc'	=> 'Erkennung von Server-Umgebung und Anforderung von UCenter',
	'tips_ucenter'		=> 'Bitte f&uuml;llen Sie die relaventen Infos von UCenter aus',
	'tips_ucenter_comment'	=> 'UCenter ist ein Comsenz Produkte des Core Service Program. Die Discuz! Board Installation und den Betrieb verlassen sich auf dieses Programm. Wenn bereits UCenter installiert ist, f&uuml;lle bitte die unten angegebenen Informationen aus. Ansonsten gehe bitte auf <a href="http://www.discuz.com/" target="blank">Comsenz Produkte</a> downloade und installiere es.',

	'advice_mysql_connect'		=> 'Bitte stellen Sie sicher, dass MySQL korrekt ist',
	'advice_fsockopen'		=> 'Sie m&uuml;ssen allow_url_fopen in der php.ini erlauben, wenden Sie sich bitte an Ihren Provider, um sicherzustellen, dass es eingeschaltet ist',
	'advice_gethostbyname'		=> 'gethostbyname Funktion wird in der php.ini eingestellt, bitte wenden Sie sich an Ihren Provider um Sicherzustellen das es eingeschaltet ist',
	'advice_file_get_contents'	=> 'allow_url_fopen Funktion wird in der php.ini, bitte wenden Sie sich an Ihren Provider um Sicherzustellen das es eingeschaltet ist',
	'advice_xml_parser_create'	=> 'XML Funktion wird in der php config, bitte wenden Sie sich an Ihren Provider um Sicherzustellen das es eingeschaltet ist',

	'ucurl'				=> 'UCenter URL',
	'ucpw'				=> 'UCenter Founder Pwd',
	'ucip'				=> 'IP-Adresse von UCenter',
	'ucenter_ucip_invalid'		=> 'Falsche IP Adresse',
	'ucip_comment'			=> 'Normalerweise musst du das nicht ausf&uuml;llen',

	'tips_siteinfo'			=> 'Webseiten Information',
	'sitename'			=> 'Webseiten Name',
	'siteurl'			=> 'Webseiten URL',

	'forceinstall'			=> 'Installation erzwingen',
	'dbinfo_forceinstall_invalid'	=> 'Sie k&ouml;nnen das Pr&auml;fix jederzeit &auml;ndern um keine vorhandenen Daten zu verlieren. Wenn die Datenbank das selbe Pr&auml;fix enth&auml;lt werden die Daten &uuml;berschrieben.',

	'click_to_back'			=> 'Hier klicken um zur&uuml;ckzukehren',
	'adminemail'			=> 'Admin Email',
	'adminemail_comment'		=> 'Dient zum Senden von Skriptfehler Berichten',
	'dbhost_comment'		=> 'DB Server Adresse, meist localhost',
	'tablepre_comment'		=> 'Bitte Pr&auml;fix &auml;ndern wenn mehrere Installationen erfolgen sollen',
	'forceinstall_check_label'	=> 'Installation erzwingen, ich m&ouml;chte die alten Daten l&ouml;schen!!!',

	'uc_url_empty'			=> 'UCenter URL ist leer, bitte gehen Sie zur&uuml;ck um eine einzugeben',
	'uc_url_invalid'		=> 'Ung&uuml;ltige URL',
	'uc_url_unreachable'		=> 'UCenter URL ist falsch, bitte &uuml;berpr&uuml;fen',
	'uc_ip_invalid'			=> 'Cant resolve domain, please fill in website IP',
	'uc_admin_invalid'		=> 'Falsches UC Founder Passwort, bitte nochmal versuchen',
	'uc_data_invalid'		=> 'Kommunikation Error, bitte &uuml;berpr&uuml;fe die UC URL',
	'uc_dbcharset_incorrect'	=> 'UCenter Zeichensatz ist mit der aktuellen Anwendung nicht konform.',
	'uc_api_add_app_error'		=> 'UCenter Application Error',
	'uc_dns_error'			=> 'UCenter DNSParse Fehler. Bitte gib die UCenter IPAdresse ein',

	'ucenter_ucurl_invalid'		=> 'UC URL leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'ucenter_ucpw_invalid'		=> 'UC Founder Passwort leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'siteinfo_siteurl_invalid'	=> 'URL leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'siteinfo_sitename_invalid'	=> 'Webseiten Name leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbhost_invalid'		=> 'DB Server leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbname_invalid'		=> 'DB Server Name leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbuser_invalid'		=> 'DB Benutzername leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbpw_invalid'		=> 'DB Passwort leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_adminemail_invalid'	=> 'Admin eMail leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_tablepre_invalid'	=> 'Ung&uuml;ltiges Pr&auml;fix, darf nicht mit Nummern beginnen, oder "." enthalten',
	'admininfo_username_invalid'	=> 'Admin Benutzername leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'admininfo_email_invalid'	=> 'Admin Email leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'admininfo_password_invalid'	=> 'Admin Passwort leer, bitte ausf&uuml;llen',
	'admininfo_password2_invalid'	=> 'Passwort funktioniert nicht, bitte &uuml;berpr&uuml;fen',

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> Neue Installation von Discuz! X (Ucenter Server enthalten)</label>',
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Nur Discuz! X installieren (Ucenter Server wurde bereits installiert)</label>',

	'username'			=> 'Admin Benutzernamename',
	'email'				=> 'Admin Email',
	'password'			=> 'Admin Pwd',
	'password_comment'		=> 'Admin Pwd darf nicht leer sein',
	'password2'			=> 'Pwd wiederholen',

	'admininfo_invalid'		=> 'Admin Info nicht Komplett, bitte &uuml;berpr&uuml;fe den Admin Benutzernamen, Pwd, und eMail',
	'dbname_invalid'		=> 'Datenbank Name leer, bitte den korrekten Datenbanknamen eingeben',
	'tablepre_invalid'		=> 'Data Pr&auml;fix ist leer, oder hat das falsche Format',
	'admin_username_invalid'	=> 'Ung&uuml;ltiger Benutzername, L&auml;nge kann mehr als 15 Zeichen, alphanumerische, oder kann auch Sonderzeichen enthalten',
	'admin_password_invalid'	=> 'Passwort stimmt nicht &uuml;berein, bitte erneut versuchen',
	'admin_email_invalid'		=> 'Ung&uuml;ltige Email, jemand anderer benutzt sie oder existiert nicht, bitte verwenden Sie eine Andere',
	'admin_invalid'			=> 'Administrator Info nicht Komplett, bitte alles ausf&uuml;llen',
	'admin_exist_password_error'	=> 'Benutzername ist bereits vorhanden, wenn Sie ihn als Forum Admin m&ouml;chten, f&uuml;llen Sie bitte das richtige Passwort aus oder &auml;ndern sie den Benutzernamen',

	'tagtemplates_subject'		=> 'Thema',
	'tagtemplates_uid'		=> 'Benutzer ID',
	'tagtemplates_username'		=> 'Poster',
	'tagtemplates_dateline'		=> 'Datum',
	'tagtemplates_url'		=> 'Url',

	'uc_version_incorrect'		=> 'UCenter Version nicht aktuell, verwende die aktuelle Version von http://www.msg2me.com/',
	'config_unwriteable'		=> 'Kann die config Datei nicht beschreiben, bitte setzte den Chmod der config.inc.php auf 777',

	'install_in_processed'		=> 'Installiere ...',
	'install_succeed'		=> 'User Center wurde installiert, bitte hier klicken um fortzufahren',
'install_cloud'			=> 'After successful installation, Welcome to the opening Discuz! Cloud platform<br>Discuz! Cloud platform dedicated to help website owners to increase their websites traffic, enhance the ability of Web site operators, and increase a website revenue.<br>Discuz! Cloud platform currently provides a free QQ Internet, Tencent analysis, Cloud search, QQ Group Community,Roaming,SOSO emoticon services.Discuz! Cloud platform will continue to provide more quality services to the project.<br>Before open the Discuz! Platform make sure that your website (Discuz!, UCHome or SupeSite) has been upgraded to Discuz! X2.',//'安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。',
'to_install_cloud'		=> 'Open Admin-Center',//'到后台开通',
'to_index'			=> 'Temporarily not open',//'暂不开通',

	'init_credits_karma'	=> 'Karma',
	'init_credits_money'	=> 'Geld',

	'init_postno0'		=> '#1',
	'init_postno1'		=> '#2',
	'init_postno2'		=> '#3',
	'init_postno3'		=> '#4',

	'init_support'		=> 'Pro',
	'init_opposition'	=> 'Contra',

	'init_group_0'	=> 'Mitglied',
	'init_group_1'	=> 'Administrator',
	'init_group_2'	=> 'Super-Moderator',
	'init_group_3'	=> 'Moderator',
	'init_group_4'	=> 'Sprechverbot',
	'init_group_5'	=> 'Forbidden',
	'init_group_6'	=> 'Banned IP',
	'init_group_7'	=> 'Besucher',
	'init_group_8'	=> 'Abspanns Mitglied',
	'init_group_9'	=> 'Neuling',
	'init_group_10'	=> 'Neues Mitglied',
	'init_group_11'	=> 'Registriertes Mitglied',
	'init_group_12'	=> 'Standard Mitglied',
	'init_group_13'	=> 'Senior Member',
	'init_group_14'	=> 'Gold Member',
	'init_group_15'	=> 'Forum Veteran',

	'init_rank_1'	=> 'Neuling',
	'init_rank_2'	=> 'Kleiner Chooper',
	'init_rank_3'	=> 'Erfahren',
	'init_rank_4'	=> 'Freies Mitglied',
	'init_rank_5'	=> 'Profi',

	'init_cron_1'	=> 'Anzahl leerer Posts',
	'init_cron_2'	=> 'Onlinezeit im Monat',
	'init_cron_3'	=> 'Bereinigung',
	'init_cron_4'	=> 'Statistik und E-Mail Gl&uuml;ckw&uuml;nsche',
	'init_cron_5'	=> 'Wiederherstellung der Anmeldung',
	'init_cron_6'	=> 'Ank&uuml;ndigungen',
	'init_cron_7'	=> 'Zeitlich begr&auml;nzte Clean-Ups',
	'init_cron_8'	=> 'Forum Promotion Clean-up',
	'init_cron_9'	=> 'Monatliches Clean-up',
	'init_cron_10'	=> 'Daily X-Space Update',
	'init_cron_11'	=> 'W&ouml;chentliches Themen Update',

	'init_bbcode_1'	=> 'Inhalte horizontal Scrollen HTML der marquee Label. Hinweis: Dieser Effekt nur in der Internet Explorer auslesen',
	'init_bbcode_2'	=> 'Embedded-Flash-Animation',
	'init_bbcode_3'	=> 'Zeige QQ Online',
	'init_bbcode_4'	=> 'Hochgestellt',
	'init_bbcode_5'	=> 'Subscript',
	'init_bbcode_6'	=> 'Embedded Windows Media Audio',
	'init_bbcode_7'	=> 'Embedded Windows Media Audio-oder Video',

	'init_qihoo_searchboxtxt'	=> 'Stichworte, f&uuml;r eine schnelle Suche in diesem Forum',
	'init_threadsticky'		=>'Global Top, Top eingestuft, Ausgabe oben',

	'init_default_style'		=> 'Standard-Style',
	'init_default_forum'		=> 'Version',
	'init_default_template'		=> 'Abteilung Standard-Template-Set',
	'init_default_template_copyright'	=> 'Comsenz (Beijing) Technology Co., Ltd',

	'init_dataformat'	=> 'Y-m-d',
	'init_modreasons'	=> 'Werbung/SPAM\r\nSch&auml;dlicher Code\r\nIllegale Inhalte\r\nIrrelevant\r\nDoppelposting\r\n\r\nEinverstanden\r\nArtikel\r\nOriginal-Inhalt',
'init_userreasons'	=> 'Powerfull!\r\nUsefull\r\nVery nice\r\nThe best!\r\nInteresting',
	'init_link'		=> 'Discuz! Official Forums',
	'init_link_note'	=> 'Discuz! Produkte. Software und Downloads.',

	'init_promotion_task'	=> 'Website-F&ouml;rderung Aufgabe',
	'init_gift_task'	=> 'Red Envelope Art der Aufgabe',
	'init_avatar_task'	=> 'Avatar Aufgabe',

	'license'	=> '<div class="license"><h1>Lizenz-Vereinbarung</h1>

<p>Copyright (c) 2001-2010, Hong Sing Wunsch (Beijing) Technology Co., Ltd. Alle Rechte vorbehalten</p>

<p>Vielen Dank, dass Sie sich f&uuml;r UCenter Produkte entschieden haben. Wir hoffen, dass sich unsere Anstrengungen gelohnt haben, um Ihnen eine schnelle, leistungsf&auml;hige und effiziente L&ouml;sung zur Erstellung Ihrer Website zu Verf&uuml;gung stellen zu k&ouml;nnen.</p>

<p>Discuz! English full name Crossday Discuz! Board, Chinese full name Discuz! Forum, hereinafter referred to as Discuz!.</p>

<p>Sing Imagination (Beijing) Technology Co., Ltd. for the Discuz! product developers, and they shall have Discuz! Product Copyright (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, Discuz! Official website address is http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>

<p>Discuz! copyright has been registered in The People\'s Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using Discuz! software.</p>

<p>This License applies and only applies Discuz! X version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3>I. Das Recht auf Lizenz-Vereinbarung</h3>
<ol>
<li>Mit dem Endbenutzer-Lizenzvertrag k&ouml;nnen Sie, auf der Grundlage der Anwendung dieser Software, f&uuml;r nicht-kommerzielle Zwecke, und ohne Software-Lizenzgeb&uuml;hren, dieses Produkt nutzen.</li>
<li>Anhaltend an diese Bestimmungen in der Vereinbarung, d&uuml;rfen Sie den Quellcode (sofern verf&uuml;gbar) oder die Schnittstelle f&uuml;r Ihre Website-Anforderungen &auml;ndern.</li>
<li>Sie haben zur Nutzung der Software die Verpflichtung, Texte und Informationen des Eigentums anzuerkennen, unabh&auml;ngig von der Verpflichtung zum Inhalt und Gegenstande im Zusammenhang mit rechtlichen Verpflichtungen.</li>
<li>Autorisierter Zugang zu kommerziellen Software f&uuml;r kommerzielle Anwendungen, ist in der gleichen Zeit auf der Grundlage der Art, die von der Beh&ouml;rde, die in der Zeit der technischen Unterst&uuml;tzung, f&uuml;r den Inhalt der Art und Weise. Business autorisierte Benutzer genießen ihre Ansichten spiegeln die Macht der Ansichten wird der vorrangig zu ber&uuml;cksichtigen ist, aber nicht angenommen werden m&uuml;ssen, um sicherzustellen, dass die Verpflichtungen eingehalten werden.</li>
</ol>

<h3>II. Die Zustimmung der Pflichten und Grenzen</h3>
<ol>
<li>Business wurde nicht genehmigt, bevor die Software f&uuml;r kommerzielle Zwecke (einschließlich, aber nicht beschr&auml;nkt auf Corporate Websites, Business-Website oder Kopf-Profit-Site Gewinn) verwendet werden darf. F&uuml;r den Erwerb von Lizenzen, besuchen Sie bitte http://www.discuz.com oder rufen Sie 8610-51657885 (China) an, dort erfahren Sie mehr.</li>
<li>Diese Software darf nicht vervielf&auml;ltigt, vermietet, verkauft oder anderweitig angeboten werden.</li>
<li>In jedem Fall heißt das, egal, welcher Nutzung, unabh&auml;ngig davon, ob einer &Auml;nderung, wie die Verwendung von UCenter oder Teile davon, ohne die schriftliche Genehmigung zur Entfernung der Fußleiste des UCenter, um den Namen und die Sing (Beijing) Technology Co., Ltd im Rahmen der Website (http://www.comsenz.com, http://www.discuz.com oder http://www.discuz.net) muss der Link beibehalten werden.</li>
<li>UCenter wurde ganz oder teilweise auf der Grundlage f&uuml;r die Entwicklung daraus abgeleiteter Version, eine modifizierte Version von oder f&uuml;r die Umverteilung von Drittanbieter-Versionen.</li>
<li>Wenn Sie den Bestimmungen dieses Abkommens nicht zustimmen, wird die Lizenz beendet, dem Lizenznehmer das Recht entzogen, und hat mit der entsprechenden rechtlichen Verantwortung zu rechnen.</li>
</ol>

<h3>III. Die Sicherheit und Haftung</h3>
<ol>
<li>An der Software und den Dokumenten gibt es keine implizite Garantie f&uuml;r die Entsch&auml;digung in irgendeiner Form.</li>
<li>F&uuml;r die freiwillige Nutzung dieser Software sowie aller Produkte tragen Sie die Risiken. Wir versprechen keine technische Unterst&uuml;tzung oder bieten Garantien.</li>
<li>Sing Wunsch (Beijing) Technology Co., Ltd Software, f&uuml;r Gegenst&auml;nde oder Informationen.</li>
<li>Hong Sing company provides software and services in a timely manner, security, accuracy is not guaranteed, due to force majeure, Hong Sing factors beyond the control of the company (including hacker attacks, stopping power, etc.) caused by software and services Suspension or termination, and give your losses, you agree to Sing corporate responsibility waiver of all rights.</li>
<li>Hong Sing Company specifically draw your attention to Hong Sing Company in order to protect business development and adjustment of autonomy, Hong Sing Company has at any time with or without prior notice to modify the service content, suspend or terminate some or all of the rights of software and services , changes will be posted on the relevant pages of Sing website, including without notice. Hong Sing Company to modify or discontinue the exercise, termination of some or all of the rights of software and services resulting from the loss, without Hong Sing Company to you or any third party.</li>
</ol>


<p>Hong Sing products on the end user license agreement, business license and technical services to the details provided by the Hong Sing exclusive. Sing the company has without prior notice, modify the license agreement and services price list right to the modified agreement or price list from the change of the date of the new authorized user to take effect.</p>
<p>Once you start the installation Hong Sing products, shall be deemed to fully understand and accept the terms of this Agreement, the terms in the enjoyment of the rights granted at the same time, by the relevant constraints and restrictions. Licensing agreement outside the scope of acts would be a direct violation of this License Agreement and constitute an infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and retain the power to investigate related responsibilities.</p>
<p>The interpretation of the terms of the license agreement, validity, and dispute resolution, applicable to the mainland People\'s Republic of law.</p>
<p>Between Hong Sing if you and any dispute or controversy, should first be settled through friendly consultations, the consultation fails, you hereby agree to submit the dispute or controversy Sing Haidian District People\'s Court where jurisdiction. Hong Sing Company has the right to interpret the above terms and discretion.</p>
</div>',

	'uc_installed'		=> 'Sie haben UCenter zuvor schon installiert, wenn sie es nocheinmal installieren m&ouml;chten, l&ouml;schen Sie bitte data/install.lock ',
	'i_agree'		=> 'Ich habe die Bestimmungen zur oben genannten Lizenz gelesen und stimme zu',
	'supportted'		=> 'Unterst&uuml;tzt',
	'unsupportted'		=> 'Nicht Unterst&uuml;tzt',
	'max_size'		=> 'Maximale Gr&ouml;sse',
	'project'		=> 'Projekt',
	'ucenter_required'	=> 'Erforderlich',
	'ucenter_best'		=> 'Best',
	'curr_server'		=> 'Aktuell',
	'env_check'		=> 'Env Check',
	'os'			=> 'OS',
	'php'			=> 'PHP Version',
	'attachmentupload'	=> 'Anlage',
	'unlimit'		=> 'Kein Limit',
	'version'		=> 'Version',
	'gdversion'		=> 'GD Lib',
	'allow'			=> 'Erlaube',
	'unix'			=> 'Unix Typ',
	'diskspace'		=> 'Festplattenspeicher',
	'priv_check'		=> 'Dire  & Datei Einstellungs-Check',
	'func_depend'		=> 'Function depend check',
	'func_name'		=> 'Funktion Name',
	'check_result'		=> 'Resultat',
	'suggestion'		=> 'Vorschlag',
	'advice_mysql'		=> 'Bitte &uuml;berpr&uuml;fen Sie, ob das mysql-Modul geladen wurde',
	'advice_fopen'		=> 'Sie m&uuml;ssen allow_url_fopen in der php.ini einstellen, bitte kontaktieren Sie Ihren Provider um sicher zu gehen das es erlaubt ist',
	'advice_file_get_contents'	=> 'Sie m&uuml;ssen allow_url_fopen in der php.ini einstellen, bitte kontaktieren Sie Ihren Provider um sicher zu gehen das es erlaubt ist',
	'advice_xml'			=> 'Diese Funktion ben&ouml;tigt XML Support in PHP. Bitte kontaktieren Sie Ihren Provider um sicher zu gehen das es erlaubt ist',
	'none'				=> 'Nichts',

	'dbhost'		=> 'DB Server',
	'dbuser'		=> 'DB Benutzername',
	'dbpw'			=> 'DB Passwort',
	'dbname'		=> 'DB Name',
	'tablepre'		=> 'Tabellen Pr&auml;fix',

	'ucfounderpw'		=> 'Founder Pwd',
	'ucfounderpw2'		=> 'Pwd wiederholen',

	'init_log'		=> 'Log Initialisierung',
	'clear_dir'		=> 'Leere Liste',
	'select_db'		=> 'Datenbank ausw&auml;hlen',
	'create_table'		=> 'Tabelle erstellen',
	'succeed'		=> 'Erfolgt',
	
	'testdata'			=> 'Installations und Testdaten',
	'testdata_check_label'		=> 'Ja',
	'portalstatus'			=> 'Portal Status',
	'portalstatus_check_label'	=> '',
	'groupstatus'			=> 'Gruppen Status',
	'groupstatus_check_label'	=> '',
'homestatus'			=> 'Home Status',
	'homestatus_check_label'	=> '',
	'install_data'			=> 'Zus&auml;tzliche Daten werden installiert',
	'install_test_data'		=> 'Testdaten werden installiert',

	'method_undefined'		=> 'Undefinierte Methode',
	'database_nonexistence'		=> 'Datenbank nicht vorhanden',
	'skip_current'			=> 'Diesen Schritt &uuml;berspringen',
	'topic'				=> 'Themen',
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> 'Willkommen bei Discuz! X Installation!',
	'select_language'		=> '<b>Wählen Sie die Sprache für die Installation</b>:',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',

//---------------------------------------------------------------



);

$msglang = array(
	'config_nonexistence'	=> 'Die config.inc.php existiert nicht. Bitte lade sie per FTP hoch und versuche es erneut.',
);

?>