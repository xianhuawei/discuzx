<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_checkonline.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'checkonline_name'		=> 'Carte Radar',   //  Radar card
	'checkonline_desc'		=> 'V&#233;rification d\'un utilisateur soit en ligne ou hors ligne',   // Check one user online or offline 
	'checkonline_targetuser'	=> 'Qui voulez-vous v&#233;rifier',   //  Who do you want to check
	'checkonline_info_nonexistence'	=> 'Svp. entrer nom d\'Utilisateur',   // Please enter username 
	'checkonline_hidden_message'	=> '{username} est cach&#233; , l\'heure de sa derni&#232;re activit&#233; est  {time}',   // {username} is hidden, last active time is {time} 
	'checkonline_online_message'	=> '{username} est En-Ligne, derni&#232;re fois actif est {time}',   // {username} is online, last active time is {time} 
	'checkonline_offline_message'	=> '{username} est Hors-Ligne',   //  {username} is offline
	'checkonline_info_noperm'	=> 'D&#233;sol&#233;, vous n\'&#234;tes pas autoris&#233; &#224; voir cet Utilisateur',   //  Sorry, you are not allowed to view this user

	'checkonline_notification'	=> 'quelqu\'un a utilis&#233; {magicname} pour v&#233;rifier si vous &#233;tiez En-Ligne ou hors connexion',   //  Someone used {magicname} to check you online or offline
);

