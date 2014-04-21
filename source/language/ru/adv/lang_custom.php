<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Valery Votintsev at sources.ru
 */

$lang = array
(
	'custom_name'		=> 'Произвольный блок рекламы',
	'custom_desc'		=> 'Добавить произвольный код рекламы в шаблон или HTML файл.<br /><br />
				<a href="javascript:;" onclick="prompt(\'(CTRL + C) - Скопируйте контент и вставьте его в нужный шаблон\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Обращение к внутреннему Javascript</a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'(CTRL + C) - Скопируйте контент и вставьте его в нужный HTML файл\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Обращение к внешнему Javascript</a>',
	'custom_id_notfound'	=> 'Объявление не найдено',
	'custom_codelink'	=> 'Обращение к внутреннему Javascript',
	'custom_text'		=> 'Текст объявления',
);

