<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'custom_name'		=> 'Publicitaires personnalis&#233;e',
	'custom_desc'		=> 'Gr&#226;ce au mod&#232;le, le fichier HTML, ajoutez le code des annonces, vous pouvez ajouter n\'importe quelle page sur le site de publicitaires. Pour les propri&#233;taires pour comprendre simplement les connaissances en HTML.<br /><br />
				<a href="javascript:;" onclick="prompt(\'Svp. copier(CTRL+C)Et ajoutez la ligne suivante au mod&#232;le de, Ajouter cette publicit&#233;\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Les communications internes</a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'Svp. copier(CTRL+C)Et ajoutez la ligne suivante au fichier HTML, Ajouter cette publicit&#233;\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Appel ext&#233;rieur</a>',
	'custom_id_notfound'	=> 'Publicit&#233; personnalis&#233; innexistant',
	'custom_codelink'	=> 'Les communications internes',
	'custom_text'		=> 'Publicit&#233; personnalis&#233;',
);

