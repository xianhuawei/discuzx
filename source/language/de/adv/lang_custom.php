<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2011-08-12) by Coldcut - http://www.cybertipps.com
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'custom_name'		=> 'Werbung',
	'custom_desc'		=> 'Durch die Vorlage, HTML-Datei, f&uuml;ge den Code hinzu, kannst du jede Seite in der Site Inserieren. Bewerben Grundkenntnisse der HTML-Kenntnisse Webmaster.<br /><br />
				<a href="javascript:;" onclick="prompt(\'Kopiere die Zeile mit CTRL+C und füge die Vorlage dieser Werbung ein\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Interner Aufruf</a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'Kopiere die Zeile mit CTRL+C und füge den HTML als Werbung ein\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Externer Aufruf</a>',
	'custom_id_notfound'	=> 'ID existiert nicht',
	'custom_codelink'	=> 'Interner js Aufruf',
	'custom_text'		=> 'Werbung',
);

