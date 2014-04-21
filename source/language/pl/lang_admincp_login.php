<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_admincp_login.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'login_title'		=> 'Zaloguj się do panelu administratora',//'登录管理中心',
	'login_username'	=> 'Użytkownik',//'用户名',
	'login_password'	=> 'Hasło',//'密　码',
	'submit'		=> 'Wyślij',//'提交',
	'forcesecques'		=> 'wymagane',//'必填项',
	'security_question'	=> 'Pytanie zabezp.',//'提　问',
	'security_answer'	=> 'Odpowiedź',//'回　答',
	'security_question_0'	=> 'Brak',//'无安全提问',
	'security_question_1'	=> 'Nazwisko panieńskie matki',//'母亲的名字',
	'security_question_2'	=> 'Imię dziadka',//'爷爷的名字',
	'security_question_3'	=> 'Miejsce urodzenia ojca',//'父亲出生的城市',
	'security_question_4'	=> 'Nazwisko pierwszego wychowawcy',//'您其中一位老师的名字',
	'security_question_5'	=> 'Model użytkującego komputera',//'您个人计算机的型号',
	'security_question_6'	=> 'Nazwa ulubionej restauracji',//'您最喜欢的餐馆名称',
	'security_question_7'	=> 'Ostatnie 4 znaki tablicy rejestracyjnej pojazdu',//'驾驶执照的最后四位数字',

	'login_tips'		=> 'Discuz! używa PHP i MySQL ale także innych rozwiązań, które wspomagają społeczeństwu budowanie wspólnoty wysokiej jakości.',//'Discuz! 是一个采用 PHP 和 MySQL 等多种数据库构建的高效建站解决方案, 是众多社区网站首选技术品牌!',
	'login_nosecques'	=> 'Możesz skorzystać z bezpieczniejszego logowania. W tym celu, proszę ustawić pytanie zabezpieczające i dopiero wtedy odwiedzić ten panel. <a href="forum.php?mod=memcp&action=profile&typeid=1">Kliknij tutaj, aby ustawić pytanie zabezpieczające.</a>.',//'您还没有使用安全登录，请在个人中心设置您的安全提问后，再访问管理中心。您可以 <a href="forum.php?mod=memcp&action=profile&typeid=1" target="_blank">点击这里</a> 进入安全提问的设置。',

	'login_cplock'		=> 'Panel administratora został zablokowany!<br>Proszę odczekać <b>{ltime}</b> sekund.',//'您的管理面板已经锁定! <br>请在<b> {ltime} </b>秒以后重新访问管理中心',
	'login_user_lock'	=> 'Twoje ostatnie próby logowania nie powiodły się, dlatego też przez pewien okres nie będziesz mógł się tu zalogować. Proszę spróbować ponownie za 15 minut.',//'由于您的登录密码错误次数过多,本次登录请求已经被拒绝. 请 15 分钟后重新尝试',
	'login_cp_noaccess'	=> '<b>Panel administratora (lub ta operacja) nie została wykonana przez Ciebie.</b><br><br>To zdarzenie zostało zapisane, nie próbuj oszukiwać.',//'<b>管理中心(或此项操作)尚未对您开放</b><br><br>您的此次操作已经记录, 请勿非法尝试',
	'noaccess'		=> 'Wygląda na to, że nie masz dostępu do żądanej sekcji. Jeśli uważasz, że coś jest nie tak, skontaktuj się z administratorem.',//'后台管理权限(或此项操作)尚未对您开放, 请联系站点管理员',


);

