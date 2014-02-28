<?php
/**
 * 道具类example
 * 最终由source/class/discuz/class_task.php 回调执行
 * 脚本位置：source/class/magic/magic_name.php
 * 语言包位置：source/language/magic/lang_name.php
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class magic_example{
	
	var $version = '1.0';//脚本版本号
	var $name = 'name';//道具名称 (可填写语言包项目)
	var $description = 'desc';//道具说明 (可填写语言包项目)
	var $price = '10';//道具默认价格
	var $weight = '10';//道具默认重量
	var $copyright = 'Comsenz Inc.';//版权 (可填写语言包项目)

	function getsetting() {//返回设置项目
		$settings = array(
			'text' => array(
				'title' => 'text_title',//设置项目名称 (可填写语言项目)
				'type' => 'mradio',//项目类型
				'value' => array(),//项目选项
				'default' => 0,//项目默认值
			)
		);
		return $settings;
	}

	function setsetting(&$advnew, &$parameters) {//保存设置项目
	
	}

	function usesubmit($magic, $parameters) {//道具使用
		
		
	}

	function show($magic) {//道具显示
		
	}
	
	function buy() {//道具购买
		
	}
}
?>