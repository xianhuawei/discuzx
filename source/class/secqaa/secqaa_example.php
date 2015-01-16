<?php
/**
 * 验证问答类 example
 * 最终由source/class/helper/helper_seccheck 执行
 * 脚本位置：source/class/secqaa/secqaa_name.php
 * 语言包位置：source/language/secqaa/lang_name.php
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class secqaa_example{
	
	var $version = '1.0';//脚本版本号
	var $name = 'name';//验证问答名称 (可填写语言包项目)
	var $description = 'desc';//验证问答说明 (可填写语言包项目)
	var $copyright = 'Comsenz Inc.';//版权 (可填写语言包项目)

	function make(&$question) {//返回安全问答的答案和问题 ($question 为问题，函数返回值为答案)
		
	}
}
?>