<?php
$charset = strtolower(CHARSET);

if($_G['config']['output']['language'] == 'zh_cn'){
	define(HSK_LANG, "sc_{$charset}");
}else{
	define(HSK_LANG, "tc_{$charset}");
}
include DISCUZ_ROOT.'./source/admincp/hsk/language/'.HSK_LANG.'.lang.php';

$GLOBALS['admincp_actions_normal'][] = 'hsk';

?>