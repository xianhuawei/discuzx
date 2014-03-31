<?php

/**+++
 *      $Id: lang_restore.php by Valery Votintsev at sources.ru
 */

$lang = array(

//---------------------------
//utility/restore.php

	'restore_title'		=> 'Discuz! outil de r&#233;cup&#233;ration de donn&#233;es',//'Discuz! 数据恢复工具', // 'Discuz! data recovery tool'
	'restore_questions'	=> 'Pour toute question R&#233;cup&#233;ration, Svp. visitez le site de support',//'恢复当中有任何问题请访问技术支持站点', // 'For any Recovering questions, please visit the support site'
	'browser_jump'		=> 'Navigateur sautera automatiquement la page, sans intervention humaine. Sauf si longtemps lorsque votre navigateur ne supporte pas les cadres, Svp., cliquez ici',//'浏览器会自动跳转页面，无需人工干预。除非当您的浏览器长时间没有自动跳转时，请点击这里', // 'Browser will automatically jump page, without human intervention. Unless a long time when your browser does not support frames, please click here'
	'ok'			=> 'OK',//'确定', // 'OK'
	'cancel'		=> 'Annuler',//'取消', // 'Cancel'
	'filename'		=> 'Nom du Fichier',//'文件名称', // 'File Name'

	'director'		=> 'Annuaire',//'所在目录', // 'Directory'
	'version'		=> 'Version',//'版本',  // 'Version'
	'time'			=> 'Temps de Sauvegarde',//'备份时间',  // 'Backup Time'
	'type'			=> 'Type',//'类型', //  'Type'
	'size'			=> 'Taille',//'尺寸', // 'Size'
	'db_method'		=> 'M&#233;thode',//'方式', // 'Method'
	'db_volume'		=> 'Nombre de volumes',//'卷数', // 'Number of volumes'
	'import'		=> 'Importer',//'导入', // 'Import'
	'different_dbcharset_tablepre'	=> 'Importez les donn&#233;es de sauvegarde et le fichier de configuration ont des valeurs diff&#233;rentes: {diff}. Etes-vous s&#251;r de continuer &#224; ex&#233;cuter ce programme?',//'检测到导入的备份数据与配置文件的{diff} 不同，您还要继续运行此程序吗？', // 'Import the backup data and the configuration file have different values: {diff}. Are you shure to continue to run this program?' // 
	'db_import_tips'	=> 'Cette fonctionnalit&#233; est dans le r&#233;tablissement de donn&#233;es de sauvegarde dans le m&#234;me temps, seront enti&#232;rement couverts par les donn&#233;es existantes, assurez-vous de la r&#233;cup&#233;ration avant le forum ferm&#233;, restaur&#233; apr&#232;s la fin de r&#233;ouverture du forum.<br />Vous pouvez afficher les donn&#233;es du site D&#233;tails de gestion de sauvegarde des fichiers de sauvegarde, suppression de sauvegarde obsol&#232;tes, et d\'importer la sauvegarde n&#233;cessaire.<br /><span class="red">L\'ensemble du processus de restauration des donn&#233;es vers une nouvelle page sera compl&#233;t&#233;e avec succ&#232;s r&#233;cup&#233;rer vos donn&#233;es, Svp. assurez-vous de retirer rapidement le fichier restore.php.</span><br />',//'本功能在恢复备份数据的同时，将全部覆盖原有数据，请确定恢复前已将论坛关闭，恢复全部完成后可以将论坛重新开放。<br />您可以通过数据备份管理功能查看站点的备份文件的详细信息，删除过期的备份,并导入需要的备份。<br /><span class="red">恢复数据的整个过程会在一个新页面完成，您成功恢复数据后请务必及时删除restore.php文件。</span><br />', // 'This feature is in restoring backup data at the same time, will be fully covered by existing data, make sure the recovery before the forum shut down, restored after completion re-opening the forum.<br />You can view the site data backup management Details of the backup files, delete outdated backup, and import the necessary backup.<br /><span class="red">The entire process of restoring data to a new page will be completed successfully recover your data, please be sure to promptly remove restore.php file.</span><br />'
	'db_export_discuz'	=> 'Discuz! Donn&#233;es (Sans UCenter)',//'Discuz! 数据(不含UCenter)', // 'Discuz! Data (Without UCenter)'
	'db_export_discuz_uc'	=> 'Discuz! et UCenter Data',//'Discuz! 和 UCenter 数据', //'Discuz! and UCenter Data' 
	'db_multivol'		=> 'Multi-volume',//'多卷', // 'Multi-volume'
	'db_import_unzip'	=> 'D&#233;compresser',//'解压缩', // 'Decompress'
	'db_export_zip'		=> 'Compresser la Sauvegarde',//'压缩备份', // 'Backup compress'
	'db_zip'		=> 'ZIP', // 'ZIP'
	'db_shell'		=> 'Shell', // 'Shell'
	'unknown'		=> 'Inconnu',//'未知', // 'Unknown'
	'backup_file_unexist'	=> 'Fichier de sauvegarde est Inexistant',//'备份文件不存在', //  'Backup file does not exist.' 
	'connect_error'		=> 'Erreur de connexion base de donn&#233;es, Svp. consulter le fichier de configuration de bases de donn&#233;es config/config_global.php and config/config_ucenter.php existe et correctement configur&#233;',//'连接数据库失败，请您查看数据库配置文件config/config_global.php和config/config_ucenter.php是否存在以及配置是否正确', //  'Database connection error, please view the database configuration file config/config_global.php and config/config_ucenter.php exists and correctly configured'
	'dbcharsetdiff'		=> ' Jeu de caract&#232;res base de donn&#233;es ($_config[\'db\'][\'1\'][\'dbcharset\'])',//' 数据库字符集($_config[\'db\'][\'1\'][\'dbcharset\'])', // ' Database character set ($_config[\'db\'][\'1\'][\'dbcharset\'])' // ' Database character set ($_config[\'db\'][\'1\'][\'dbcharset\'])'
	'tableprediff'		=> 'R&#233;fixe de Table($_config[\'db\'][\'1\'][\'tablepre\'])',//' 表前缀($_config[\'db\'][\'1\'][\'tablepre\'])', // 'Table prefix ($_config[\'db\'][\'1\'][\'tablepre\'])'
	'database_import_multivol_succeed'	=> 'Multi-volume de sauvegarde import&#233;es dans la base de donn&#233;es avec succ&#232;s<br />Svp. mettre &#224; jour le cache dans le fond<br /><span class="red">Enlever d&#232;s que possible le fichier restore.php, afin de ne pas avoir un impact sur les donn&#233;es</span>',//'分卷数据成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>', // 'Multi-Volume backup imported into the database successfully<br />Please update the cache in the background<br /><span class="red">Remove as soon as possible the file restore.php, so as not to impact on the data</span>'
	'database_import_file_illegal'		=> 'Fichier de donn&#233;es est Inexistant: Il peut &#234;tre serveur ne permet pas de t&#233;l&#233;charger des fichiers ou la taille du fichier d&#233;passe la limite',//'数据文件不存在：可能服务器不允许上传文件或文件大小超过限制', // 'Data file does not exist: It may be server does not allow to upload files or file size exceeds limit'
	'database_import_multivol_prompt'	=> 'Volume des donn&#233;es import&#233;es dans la base de donn&#233;es avec succ&#232;s, avez-vous besoin d\'importer automatiquement une sauvegarde &#224; d\'autres volumes dans cette sauvegarde?',//'分卷数据第一卷成功导入数据库，您需要自动导入本次备份的其他分卷吗？', // 'Volume data imported into the database successfully, do you need to automatically import a backup to other volumes in this backup?'
	'database_import_succeed'		=> 'Donn&#233;es dans la base de donn&#233;es du site a &#233;t&#233; correctement<br />Svp. mettre &#224; jour le cache dans le fond<br /><span class="red">Enlever d&#232;s que possible restore.php fichier, afin de ne pas avoir un impact sur les donn&#233;es</span>',//'数据已成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>', // 'Data into the site database has been successfully<br />Please update the cache in the background<br /><span class="red">Remove as soon as possible the file restore.php, so as not to impact on the data</span>'
	'database_import_format_illegal'	=> 'Fichier de donn&#233;es est non Discuz! format, ne peut &#234;tre import&#233;',//'数据文件非 Discuz! 格式，无法导入', //  'Data file is non-Discuz! format, can not be imported'
	'database_import_unzip'			=> '{info}<br />D&#233;compressez le fichier de sauvegarde est termin&#233;e. Avez-vous besoin d\'importer automatiquement la sauvegarde? Apr&#232;s avoir import&#233; les fichiers extraits seront supprim&#233;s',//'{info}<br />备份文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除', // '{info}<br />Unzip the backup file is completed. Do you need to automatically import the backup? After importing the extracted files will be deleted'
	'database_import_multivol_unzip'	=> '{info}<br />D&#233;compressez le sous-volume de sauvegarde du fichier est termin&#233;e. Avez-vous besoin d\'auto-extraction d\'autres sous-volume?',//'{info}<br />备份文件解压缩完毕，您需要自动解压缩其他的分卷文件吗？', // '{info}<br />Unzip the backup sub-volume file is completed. Do you need to self-extract other sub-volume?'
	'database_import_multivol_unzip_redirect'	=> 'Fichier de Donn&#233;es # {multivol} extrait avec succ&#232;s, le programme continuera automatiquement',//'数据文件 #{multivol} 解压缩成功，程序将自动继续', // 
	'database_import_confirm'		=> 'Fichier de donn&#233;es Importation et Discuz actuelle! Les versions sont incompatibles et peuvent provoquer une panne',//'导入和当前 Discuz! 版本不一致的数据极有可能产生无法解决的故障，您确定继续吗？', // 
	'database_import_confirm_sql'		=> 'Etes-vous s&#251;r que vous voulez importer la sauvegarde?',//'您确定导入该备份吗？', // 'Are you sure you want to import the backup?' 
	'database_import_confirm_zip'		=> 'Etes-vous s&#251;r que vous voulez d&#233;compresser la sauvegarde?',//'您确定解压该备份吗？', // 'Are you sure you want to unzip the backup?'
	'database_import_multivol_confirm'	=> 'Extraire tous les fichiers sous-volume est termin&#233;, vous avez besoin d\'importer automatiquement la sauvegarde? Apr&#232;s avoir import&#233; les fichiers extraits seront supprim&#233;s',//'所有分卷文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除', // 'Extract all the sub-volume file is completed, you need to automatically import the backup? After importing the extracted files will be deleted'
	'database_import_multivol_redirect'	=> 'Fichier de Donn&#233;es # {volume} import&#233;s avec succ&#232;s, le programme continuera automatiquement',//'数据文件 #{volume} 成功导入，程序将自动继续', // 'Data file # {volume} successfully imported, the program will automatically continue'
	'error_quit_msg'			=> 'R&#233;soudre le probl&#232;me ci-dessus, avant de poursuivre la r&#233;cup&#233;ration de donn&#233;es',//'必须解决以上问题，才能继续恢复数据', // 'Solve the above problem, before continue the data recover'
	'restored_error'			=> 'R&#233;cup&#233;rer fonction de donn&#233;es est verrouill&#233;e. Si vraiment vous voulez r&#233;cup&#233;rer les donn&#233;es, Svp. allez sur le serveur et supprimez le fichier ./data/restore.lock',//'恢复数据功能锁定，已经恢复过了，如果您确定要恢复数据，请到服务器上删除./data/restore.lock', // 'Recover data function is locked. If you really want to recover data, please go to the server and delete the file ./data/restore.lock'

);