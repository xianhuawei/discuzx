<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
 * 任务系统 example
 * 所有的任务最终由source/class/discuz/class_task.php 回调执行
 * 脚本位置：source/class/task/task_test.php
 * 语言包位置：source/language/task/lang_test.php
 */

class task_example {
	var $version = '1.0'; //脚本版本号
	var $name = '测试任务标题'; //任务名称 (可填写语言包项目)
	var $description = '测试任务描述'; //任务说明 (可填写语言包项目)
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">版权</a>'; //版权 (可填写语言包项目)
	var $icon = '';//默认图标
	var $period = '';//默认任务间隔周期
	var $periodtype = 0;//默认任务间隔周期单位 0:小时,1:天,2:周,3:月
	var $conditions = array(//任务附加条件
		'text' => array(
			'title' => '另外的设置项',//设置项目名称 (可填写语言项目)
			'type' => 'mradio',//项目类型 mradio,radio:单选,text:框
			'value' => array(),//项目选项 对应上面的值 参考task_post.php
			'default' => 0,//项目默认值 从value中选择一个作为默认的值
			'sort' => 'complete',//条件类型 (apply:申请任务条件 complete:完成任务条件)
		),
	);
	
	function preprocess($task) {//申请任务成功后的附加处理
	}

	function csc($task = array()) {//判断任务是否完成 (返回 TRUE:成功 FALSE:失败 0:任务进行中进度未知或尚未开始  大于0的正数:任务进行中返回任务进度)
	}

	function sufprocess($task) {//完成任务后的附加处理
	}

	function view($task, $taskvars) {//任务显示
	}

	function install() {//任务安装的附加处理
	}

	function uninstall() {//任务卸载的附加处理
	}

	function upgrade() {//任务升级的附加处理
	
	}
}
?>