<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *      Convert Language File - Traduit par Andre13 Support Fr.:http://discuz-fr.fr -27-déc.2011 
 *      $Id: utility/convert/language/lang.php by Valery Votintsev at sources.ru
 */
$lang = array(

	'config_dbhost'		=> 'Serveur Base de Données',//'数据库服务器',
	'config_dbuser'		=> 'Base de Données Identifiant',//'数据库用户名',
	'config_dbpw'		=> 'Base de Données mot de passe',//'数据库密码',
	'config_dbname'		=> 'Nom de la Base',//'数据库',
	'config_tablepre'	=> 'Préfixe de la table',//'数据表前缀',
	'config_dbcharset'	=> 'Base de Données jeu de caractères (facultatif)',//'数据表字符集 (可选)',
	'config_pconnect'	=> 'Connexion Permanente',//'持久连接',

	'config_type_source'	=> 'Base de données des paramètres Source (la version originale de la base de données)',//'数据源服务器设置 (原始版本的数据库)',
	'config_type_target'	=> 'Paramètres de base cible (correctement installé Discuz! Base de données X)',//'目标服务器设置 (已正确安装 Discuz! X 的数据库)',
	'config_type_ucenter'	=> 'UCenter paramètres du serveur (base de données correctement installé UCenter)',//'UCenter 服务器设置 (已正确安装 UCenter 的数据库)',

	'config_type_target_comment'	=> 'Note: La base de données cible sera remplacé ou mis à jour les données, comme ceux-ci contiennent un contenu important, Svp. faire une sauvegarde avant',//'注意：目标数据库的数据将会被替换或者更新,如当中含有重要内容,请先备份',
	'config_write_error'	=> 'data/ répertoire n\'est pas accessible en écriture, Svp. assurer que ce répertoire ont les permissions d\'écriture, de définir les droits 777',//'转换程序的 data/ 目录不可写,请确保此目录的可写权限,设置 777 属性',

	'config_save'		=> 'Enregistrer les paramètres du serveur',//'保存服务器设置',
	'config_usergroup'	=> 'Configuration des Groupes Utilisateurs',//'用户组配置',
	'config_from_usergroup'	=> 'Groupe utilisateur Source',//'来源用户组',
	'config_target_usergroup'	=> 'Groupe Utilisateur Cible',//'目标用户组',
	'config_extcredits'	=> 'Etendue de configuration des points',//'积分配置',
	'config_credit'		=> 'points',//'积分',
	'config_from_credit'	=> 'Source des Points',//'来源积分',
	'config_target_credit'	=> 'Points Cibles',//'目标积分',
	'config_experience'	=> 'Expérience valeur',//'经验值',
	'config_convert_forum'	=> 'Forum de conversion de données de configuration',//'数据转换配置',
	'config_from_data'	=> 'Source des données',//'源数据',
	'config_target_forum'	=> 'Forum Cible',//'目标版块',
	'config_poll'		=> 'Sondages',//'投票',
	'config_event'		=> 'Evénements',//'活动',
	'config_auto_create'	=> 'Auto-créer',//'自动创建',
	'config_convert'	=> 'Enregistrer la configuration convertie',//'保存转换配置',

	'submit'		=> 'Envoyer',//'提  交',

	'message_return'	=> 'Retour',//'返回上一步',
	'message_stop'		=> 'Stop',//'停止运行',
	'message_not_enabled_extcredit'	=> 'Dans le nouveau système devrait être ouvert au moins les caractéristiques des points, sinon la prochaine étape ne peut être convertie',//'新系统中至少应开启一个积分,否则无法进行下一步转换',

	'ok'			=> '&nbsp;&nbsp;OK&nbsp;&nbsp;',//'&nbsp;确&nbsp;&nbsp;定&nbsp;',
	'cancel'		=> '&nbsp;Annuler&nbsp;',//'&nbsp;取&nbsp;消&nbsp;',
	'return'		=> 'Retour',//'请返回',
	'tips'			=> 'Conseils',//'技巧提示',
	'tips_pconnect'		=> 'Note: Si la base de données source et la base de données cible sont placés sur le même serveur, définissez ceci à 0, sinon, mis à 1',//'注意：如果源数据库与目标数据库在同一服务器，该项必须设置为0，否则设置为1',

	'mysql_config_error'	=> 'MySQL configuration ne peut pas être vide',//'配置不能为空',
	'mysql_connect_error'	=> 'MySQL connexion a échoué',//'连接失败',

	'config_success'	=> 'Server configuré avec succès, et maintenant allez à l\'étape suivante',//'服务器配置成功,现在进行下一步',

	'setting_tips'		=> 'Modification des paramètres de conversion peut entraîner une moindre efficacité de conversion ou ne parviennent pas à terminer la conversion, de sorte s\'il vous plaît soyez prudent de modifier',//'修改转换程序设置可能导致您的转换效率降低或者无法正常完成转换,所以请您务必小心修改',

	'mysql_connect_error_1'	=> 'Erreur de connexion base de données, vérifier si le compte de base et mot de passe sont corrects.',//'数据库连接错误,请检查数据库密码和帐号是否正确',
	'mysql_connect_error_2'	=> 'Tables de données Echec de la vérification. Peut-être, vous n\'avez pas correctement rempli la "table de préfixe", ou vous n\'avez pas installé la version du programme',//'数据表检查错误,您可能没有正确填写 “数据表前缀”或者您尚未安装该版本的程序',

//---------------------------
	'invalid_request'	=> 'Demande Illégale',//'非法请求',

//---------------------------
//convert/include/do_config.inc.php

	'config_delete'			=> 'Si vous ne pouvez pas afficher les paramètres du programme, supprimez le fichier data/config.inc.php',//'如果无法显示设置项目,请删除文件 data/config.inc.php',

//---------------------------
//convert/include/do_convert.inc.php

	'select_convert_process'	=> 'Svp. Choisissez en premier  le processus de conversion',//'请首先选择转换程序',
	'update_start_time'	=> 'Mise à jour Temps de départ:',//'升级开始时间：',
	'elapsed_time'		=> 'Procédure de mise à jour a été effectuée',//'升级程序已经执行了',
	'days'			=> 'Jours',//'天',
	'hours'			=> 'Heures',//'小时',
	'minutes'		=> 'Minutes',//'分',
	'seconds'		=> 'Secondes',//'秒',
	'progress'		=> 'Progrès conversion',//'目前正在执行转换程序',
	'progress_intro1'	=> 'Le processus de conversion a besoin de rediriger plusieurs fois, ne fermez pas votre navigateur!',//'转换过程中需要多次跳转,请勿关闭浏览器.',
	'progress_intro2'	=> 'Si le programme est interrompu ou besoin de re-démarrer le programme en cours, Svp. cliquer sur',//'如果程序中断或者需要重新开始当前程序,请点击',
	'restart'		=> 'Redémarrez',//'重新开始',
	'process_finished'	=> 'Processus de conversion est terminée, maintenant passer à l\'étape suivante',//'转换程序 执行完毕, 现在跳转到下一个程序',
	'process_not_found'	=> 'Le transfert de données interrompu! Le processus de conversion ne peut être trouvé: ',//'数据转换中断! 无法找到转换程序 ',
	'process_all_finished'	=> 'Tous les les processus de conversion sont finis',//'转换程序全部运行完毕',

//---------------------------
//convert/include/do_finish.inc.php

	'conversion_completed'	=> 'Vous avez terminé la conversion de données!',//'您已经顺利的完成了数据转换!',
	'start_time'		=> 'Heure de départ mise à jour',//'本次升级开始时间',
	'end_time'		=> 'Fin du temps mise à jour',//'本次升级结束时间',
	'execution_time'	=> 'Mise à jour de temps d\'exécution total',//'升级累计执行时间',
	'update_more'		=> 'Dans des circonstances normales, vous pouvez aussi avoir besoin de suivre les instructions pour mettre à niveau, de sorte que le fonctionnement normal de votre nouveau programme',//'通常情况下,您可能还需要按照以下提示继续进行升级,从而使您的新程序正常运行',
	'read_me'		=> 'Enfin, lisez les instructions (readme)',//'最后的说明(readme)',

//---------------------------
//convert/include/do_select.inc.php

	'you_selected'		=> 'Vous avez sélectionné',//'您选择了',
	'process_number'	=> 'processus de conversion, la conversion de démarrage suivants',//'个转换程序,下面开始转换',
	'process_intro'		=> 'Habituellement, toutes les données dont vous avez besoin pour effectuer la table de conversion suivante, sauf si vous êtes dans le cours d\'une perturbation imprévue ou ont des besoins spéciaux, choisir seulement si nécessaire',//'通常情况下,您需要执行下面所有数据表的转换,除非您在执行过程中出现了意外的中断或者有特殊需求,才进行必要的选择',
	'process_configure'	=> 'Configurer le processus de conversion',//'配置转换过程',
	'select_all'		=> 'Tout Choisir',//'全选',
	'run_before_convert'	=> 'Exécuter des programmes avant la conversion',//'转换之前运行的程序',
	'table_convert'		=> 'Processus de conversion de la table',//'数据表转换程序',
	'other_convert'		=> 'Autres processus de conversion de soutien',//'其他辅助转换程序',
	'start_conversion'	=> 'Démarrer la conversion',//'开始转换',

//---------------------------
//convert/include/do_setting.inc.php

	'edit_file'		=> 'Modifiez le fichier',//'编辑配置文件',
	'r/o'			=> ' Lecture seule ',//' 只读 ',
	'settings_saved_ok'	=> 'Paramètres ont été mis à jour et sauvegardés avec succès',//'设置已经更新完毕并成功保存',
	'file_is_ro'		=> 'Le fichier de paramètres est en mode lecture seule, ne peut pas sauver, revenir en arrière',//'该设置文件为只读文件,无法保存,请返回',
	'settings_not_changed'	=> 'Vous n\'avez pas modifié les paramètres',//'您没有改变任何设置',

//---------------------------
//convert/include/do_source.inc.php

	'update_permissions'	=> 'Pour commencer la conversion, assurez-vous que le répertoire des données du programme et des fichiers sous le répertoire ont les permissions d\'écriture, ou le programme ne peut pas enregistrer les paramètres convertis',//'在开始转换之前,请确保本程序目录下的 data 目录为可写权限,否则无法存储转换设置',
	'update_forum_too'	=> 'Si il y a Discuz! et UChome aussi besoin de mettre à niveau, assurez-vous de mettre à niveau Discuz! Forum',//'如果有Discuz!和UChome同时需要升级,请务必先升级Discuz!论坛',
	'update_choose_process'	=> 'Svp. choisir correctement le processus de conversion, ou il peut provoquer ne peuvent être converties avec succès',//'请正确选择转换程序,否则可能造成无法转换成功',
	'update_more_space'	=> 'Le processus de conversion ne détruit pas les données d\'origine, donc la conversion nécessite de l\'Espace 2 fois plus que l\'Espace d\'origine des données',//'本转换程序不会破坏原始数据,所以转换需要2倍于原始数据空间',
	'source_version'	=> 'Version originale',//'原始版本',
	'target_version'	=> 'Version cible',//'目标版本',
	'introduction'		=> 'Introduction',//'简介',
	'description'		=> 'Description',//'说明',
	'settings'		=> 'Paramètres',//'设置',
	'view_readme'		=> 'Voir Lisez.moi',//'查看',
	'change'		=> 'Changer',//'修改',
	'start'			=> 'Démarrer',//'开始',

//---------------------------
//convert/include/global.func.php

	'jan'	=> ' Janvier ',//'一月',
	'feb'	=> ' Février ',//'二月',
	'mar'	=> ' Mars ',//'三月',
	'apr'	=> ' Avril ',//'四月',
	'may'	=> ' Mai ',//'五月',
	'jun'	=> ' Juin ',//'六月',
	'jul'	=> ' Juillet ',//'七月',
	'aug'	=> ' Août ',//'八月',
	'sep'	=> ' Septembre ',//'九月',
	'oct'	=> ' Octobre ',//'十月',
	'nov'	=> ' Novembre ',//'十一月',
	'dec'	=> ' Décembre ',//'十二月',
	'am'	=> ' AM ',//'上午',
	'pm'	=> ' PM ',//'下午',

	'prompt'		=> 'Rapide',//'系统提示',
	'dzx_update'		=> 'Discuz!X Mise à jour produits/Conversion',//'Discuz! X 系列产品升级转换',
	'dzx_update_wizard'	=> 'Discuz!X Mise à jour produits/Assistant de conversion',//'Discuz! X 系列产品升级/转换 向导',
	'step1'		=> '1. Choisissez le Type de Conversion',//'1.选择产品转换程序',
	'step2'		=> '2. Configuration du Serveur',//'2.设置服务器信息',
	'step3'		=> '3. Configuration de la Conversion',//'3.配置转换过程',
	'step4'		=> '4. Effectuer la Conversion des Données',//'4.执行数据转换',
	'step5'		=> '5. La conversion est Terminée',//'5.转换完成',

//---------------------------
//convert/source/d7.2_x1.0/pollvoter.php++

	'continue_convert_table '	=> 'Continuer à convertir la table de données ',//'继续转换数据表 ',
	'was_converted'			=> '. Total convertis: ',//', 已转换 ',
	'records'			=> 'records',//'条记录',


//---------------------------
//convert/source/d7.2_x1.0/table/access.php

	'from'	=> ' à partir de ',//' 从 ',
	'to'	=> ' à ',//' 至 ',
	'lines'	=> ' lignes.',//' 行',

//---------------------------
//convert/source/d7.2_x1.0/threadtype.php++

	'convert_thread_type'	=> 'Convertir la table Sujet Type',//'继续转换主题分类数据表',

//---------------------------
//convert/source/d7.2_x1.5/table/activityapplies.php

	'contacts'	=> ' Contacts: ',//' 联系方式:',

//---------------------------
//convert/source/d7.2_x2.0/table/moderators.php

	'converted'	=> ', Converti ',//'，已转换',
	'records'	=> ' records.',//'条记录。',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_event.php++

	'uchome_data'	=> 'UCHome des données',//'UCHome数据',
	'uchome_events'	=> 'UCHome des événements',//'UCHome活动',
	'uchome_events_convert'	=> 'Convertir l\'accueil des événements UCenter du contenu',//'从 UCenter Home 转移过来的活动内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_group.php++

	'group_home'	=> 'Groupe Accueil',//'空间群组',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_magic.php++

	'user_magic'	=> ' Magie Utilisateur',//'用户道具',
	'magic_records'	=> 'Magie obtenir des records',//'道具收入记录',
	'magic_use_records'	=> 'En utilisant des dossiers magiques',//'道具使用记录',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_poll.php++

	'uchome_polls'	=> 'UCHome données de sondages',//'UCHome投票数据',
	'uchome_polls_convert'	=> 'Convertir le contenu UCenter sondage Accueil',//'从 UCenter Home 转移过来的投票内容',

//---------------------------
//convert/source/uch2.0_x1.0/table/home_space.php++

	'space_home_error'	=> 'Erreur: les points de l\'Espace est vide. Configurer l\'Espace d\'info des points correspondants',//'发生错误,请配置积分对应关系信息',
);