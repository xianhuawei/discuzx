<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Valery Votintsev at sources.ru
 *      Translated to Spanish by jhoxi, discuzhispano.com
 */

$lang = array
(
	'custom_name'		=> 'Antíguo Anuncio',//'自定义广告',
	'custom_desc'		=> 'Agregar código anuncio personalizado en las plantillas o un archivo HTML.<br /><br />
				<a href="javascript:;" onclick="prompt(\'Por favor, copie (CTRL+C) el contenido a continuación a las plantillas\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Js llamada interna</a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'Por favor, copie (CTRL+C) el contenido a continuación a los archivos HTML\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Js llamada externa</a>',
	'custom_id_notfound'	=> 'Anuncio antíguo no existe',//'自定义广告不存在',
	'custom_codelink'	=> 'Js llamada interna',//'内部调用',
	'custom_text'		=> 'Publicidad personalizada',//'自定义广告',
);

