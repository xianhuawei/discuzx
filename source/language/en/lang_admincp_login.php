<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_admincp_login.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'login_title'		=> 'Login to Admin Center',//'登录管理中心',
	'login_username'	=> 'User name',//'用户名',
	'login_password'	=> 'Password',//'密　码',

	'submit'		=> 'Submit',//'提交',
	'forcesecques'		=> 'required',//'必填项',
	'security_question'	=> 'Sequre Question',//'提　问',
	'security_answer'	=> 'Answer',//'回　答',
	'security_question_0'	=> 'No secure question',//'无安全提问',
	'security_question_1'	=> 'Mother\'s name',//'母亲的名字',
	'security_question_2'	=> 'Grandpa\'s name',//'爷爷的名字',
	'security_question_3'	=> 'Father\'s birth city',//'父亲出生的城市',
	'security_question_4'	=> 'First teacher name',//'您其中一位老师的名字',
	'security_question_5'	=> 'Your Computer model',//'您个人计算机的型号',
	'security_question_6'	=> 'Your favorite restaurant',//'您最喜欢的餐馆名称',
	'security_question_7'	=> 'Last 4 digits of driver\'s license',//'驾驶执照的最后四位数字',

	'login_tips'		=> 'Discuz! used PHP and MySQL and other solutions for building the high quality community. It is amongst the preferred technology for the brand community site!',//'Discuz! 是一个采用 PHP 和 MySQL 等多种数据库构建的高效建站解决方案, 是众多社区网站首选技术品牌!',
	'login_nosecques'	=> 'You can use secure login. Please set your security question, and then visit the management center. You can <a href="forum.php?mod=memcp&action=profile&typeid=1">Click here for set the security question</a>.',//'您还没有使用安全登录，请在个人中心设置您的安全提问后，再访问管理中心。您可以 <a href="forum.php?mod=memcp&action=profile&typeid=1" target="_blank">点击这里</a> 进入安全提问的设置。',

	'login_cplock'		=> 'Your Admin Center has been locked!<br>Please re-visit later in <b>{ltime}</b> seconds',//'您的管理面板已经锁定! <br>请在<b> {ltime} </b>秒以后重新访问管理中心',
	'login_user_lock'	=> 'Since your password was wrong too many times, the login request has been denied. Please try again later after 15 minutes',//'由于您的登录密码错误次数过多,本次登录请求已经被拒绝. 请 15 分钟后重新尝试',
	'login_cp_noaccess'	=> '<b>Admin Center (or this operation) was not yet opened for you.</b><br><br>Your current operation has been recorded, do not try illegall actions.',//'<b>管理中心(或此项操作)尚未对您开放</b><br><br>您的此次操作已经记录, 请勿非法尝试',
	'noaccess'		=> 'Admin rights (or this operation) was not been open to you. Please contact the site administrator.',//'后台管理权限(或此项操作)尚未对您开放, 请联系站点管理员',


);

