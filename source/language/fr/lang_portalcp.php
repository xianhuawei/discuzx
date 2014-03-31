<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *      Traduction par Andre13 27.12.2011 - Support In French discuz-fr.fr
 *      $Id: lang_portalcp.php by Valery Votintsev at sources.ru
 */

$lang = array(
	'block_diy_nopreview'		=> '<p>Ce module contient js, vous ne pouvez pas pr&#233;visualiser, Svp. enregistrer et afficher</p>',  //  '<p>This module contain js, you cannot preview, please save and view</p>'  
	'block_diy_summary_html_tag'	=> 'Erreurs de contenu personnalis&#233;, les balises HTML:',  //  'Custom content errors, HTML tags:'  
	'block_diy_summary_not_closed'	=> ' Ne correspond pas',  // ' Does not match'   
	'block_all_category'		=> 'Toutes Cat&#233;gories',  //  All categories  
	'block_first_category'		=> 'Top Cat&#233;gories',  // Top category   
	'block_all_forum'		=> 'Tout les Forums',  //  All forums  
	'block_all_group'		=> 'Tout les Groupes Utilisateurs',  //  All usergroups  
	'block_all_type'		=> 'Toutes cat&#233;gories',  // All categories   
	'file_size_limit'		=> 'Le Fichier est plus grand que {size} kio, Svp. retour.',  //  File is larger than {size} kb, please return.  
	'set_to_conver'			=> 'D&#233;finir comme cover',  //  Set as cover  
	'insert_small_image'		=> 'Ins&#233;rez la petite image',  //  Insert small image  
	'insert_large_image'		=> 'Ins&#233;rer image de grande taille',  //   Insert large image 
	'insert_file'			=> 'Ins&#233;rer Fichier',  // Insert file   
	'delete'			=> 'Supprimer',  //  Delete  
	'upload_error'			=> 'T&#233;l&#233;chargement a &#233;chou&#233;',  //   Uploading failed 
	'upload_remote_failed'		=> 'T&#233;l&#233;chargement distant a &#233;chou&#233;',  // Remote uploading failed   
	'article_noexist'		=> 'Arcticle particulier inexistant',  // Specific arcticle does not exists   
	'article_noallowed'		=> 'Vous n\'&#234;tes pas autoris&#233; &#224; op&#233;rer cet article',  //  You are not allowed to operate this article  
	'article_publish_noallowed'	=> 'Vous n\'&#234;tes pas autoris&#233; &#224; publier cet article',  //  You are not allowed to publish article  
	'article_publish'		=> 'Publiez',  //   Publish 
	'article_manage'		=> 'G&#233;rer',  //   Manage 
	'article_tag'			=> 'Tag',  //  Tag  
	'select_category'		=> 'Choix Cat&#233;gorie',  //   Select category 
	'blockstyle_diy'		=> 'Personnalisez Mod&#232;le',  //  Customize template  

	'article_pushplus_info'	=> '<p><center><i><a href="{url}" class="xg1 xs1">Le contenu est fourni par {author}</a></i><center></p>',  //  '<p><center><i><a href="{url}" class="xg1 xs1">The content is provided by {author}</a></i><center></p>'  

	'diytemplate_name_null'	=> '[Null]',  //  '[Null]'  
	'portal/index'		=> 'Portail Index',  // Portal Index   
	'portal/list'		=> 'Article liste page(public)',  //   Article list page(public) 
	'portal/view'		=> 'Article contenu page(public)',  // Article content page(public)   
	'portal/comment'	=> 'Article comment. page',  //  Article comment page  
	'forum/discuz'		=> 'Forum Index',  // Forum Index   
	'forum/viewthread'	=> 'Posts contenu page(public)',  // Posts content page(public)   
	'forum/forumdisplay'	=> 'Forum liste page(public)',  // Forum list page(public)   
	'group/index'		=> $_G['setting']['navs'][3]['navname'].' Index',  //  ' Index'  
	'group/group_my'	=> 'My'.$_G['setting']['navs'][3]['navname'].' Index',  // ' Index'   
	'group/group'		=> $_G['setting']['navs'][3]['navname'].' contenu page',  // ' content page'   
	'home/space_home'	=> 'Espace Index',  // Space Index   
	'home/space_trade'	=> 'Espace page Commerce',  // Space trade page   
	'home/space_top'	=> 'Espace page Rang',  // Space ranking page   
	'home/space_thread'	=> 'Espace page Sujet',  // Space thread page   
	'home/space_reward'	=> 'Espace page R&#233;compense',  //  Space reward page  
	'home/space_share_list'	=> 'Espace page Partage',  // Space share page   
	'home/space_share_view'	=> 'Espace contenu page Partage',  //  Space share content page  
	'space_share_view'	=> 'Espace vue page Partage',  //  Space share view page  
	'home/space_poll'	=> 'Espace page Sondage',  //  Space poll page  
	'home/space_pm'		=> 'Espace M.P. page',  // Space P.M. page   
	'home/space_notice'	=> 'Espace Page Avis',  //  Space notice page  
	'home/space_group'	=> 'Espace'.$_G['setting']['navs'][3]['navname'].' page',  // ' page'   
	'home/space_friend'	=> 'Espace page Amis',  // Space friends page   
	'home/space_favorite'	=> 'Espace Page Favoris',  // Space favorite page   
	'home/space_doing'	=> 'Espace page Agiss.',  //  Space doing page  
	'home/space_debate'	=> 'Espace page D&#233;bats',  // Space debate page   
	'home/space_blog_view'	=> 'Espace contenu page du Blog',  //  Space blog content page  
	'home/space_blog_list'	=> 'Espace liste page du Blog ',  //  Space blog list page  
	'home/space_album_view'	=> 'Espace contenu page Album',  // Space album content page   
	'home/space_album_pic'	=> 'Espace contenu page Image',  // Space image content page   
	'home/space_album_list'	=> 'Espace liste page Album',  //  Space album list page  
	'home/space_activity'	=> 'Espace Page Activit&#233;',  // Space activity page   
	'ranklist/ranklist'	=> 'Espace liste page Rang ',  // Space ranking list page   
	'ranklist/blog'		=> 'Blog page Rang',  //    Blog ranking page
	'ranklist/poll'		=> 'Sondage page Rang',  //  Poll ranking page  
	'ranklist/activity'	=> 'Activit&#233; page Rang',  //  Activity ranking page  
	'ranklist/forum'	=> 'Forum page Rang',  // Forum ranking page   
	'ranklist/picture'	=> 'Image page Rang',  //  Image ranking page  
	'ranklist/group'	=> 'Groupe page Rang',  //  Group ranking page  
	'ranklist/thread'	=> 'Posts page Rang',  // Posts ranking page   
	'ranklist/member'	=> 'Utilisateurs page Rang',  // Users ranking page   
	'other_page'		=> 'Pas de Module BRICO',  //   Not DIY module 
	'upload'		=> 'T&#233;l&#233;ch.',  //   Upload 
	'remote'		=> 'Distant',  //   Remote 
	'portal_index'		=> 'Portail Accueil',  //  Portal Home  
	'portal_topic_blue'	=> 'Th&#232;me Bleu',  //  Blue theme  
	'portal_topic_green'	=> 'Th&#232;me Vert',  // Green theme   
	'portal_topic_grey'	=> 'Th&#232;me Gris',  //  Grey theme  
	'portal_topic_red'	=> 'Th&#232;me Rouge',  //  Red theme  

);