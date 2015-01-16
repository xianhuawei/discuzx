<?php
/**
 * 广告类example
 * 最终由source/block/html/block_adv.php执行
 * 脚本位置：source/class/adv/adv_name.php
 * 语言包位置：source/language/adv/lang_name.php
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class adv_example{
	
	var $version = '1.0';//脚本版本号
	var $name = 'name';//广告类型名称 (可填写语言包项目)
	var $description = 'desc';//广告类型说明 (可填写语言包项目)
	var $copyright = 'Comsenz Inc.';//版权 (可填写语言包项目)
	var $targets = array('portal', 'home', 'member', 'forum', 'group', 'userapp', 'plugin', 'custom');//广告类型适用的投放范围
	var $imagesizes = array('120x60', '120x240');//图片广告推荐大小

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

	function evalcode() {//广告显示时的运行代码
		return array(
			//检测广告是否投放时的代码
			'check' => '
			if(condition) {
				$checked = false;
			}',
			//广告显示时的代码 (随机调用投放的广告)
			'create' => '$adcode = $codes[$adids[array_rand($adids)]];',
		);
	}
}
?>