<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_email.php by Valery Votintsev at 
 *      polish language pack by kaaleth ( kaaleth-duscizpl@windowslive.com )
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$lang = array
(
	'hello'				=> 'Cześć',//'你好',
	'moderate_member_invalidate'	=> 'Odrzuć',//'否决',
	'moderate_member_delete'	=> 'Usuń',//'删除',
	'moderate_member_validate'	=> 'Akceptuj',//'通过',


	'get_passwd_subject'	=> 'Odzyskiwanie hasła',//'取回密码说明',
	'get_passwd_message'	=> '
<p>{username},
Ta wiadomość została wysłana ze strony {bbname}.</p>

<p>Otrzymałeś tą wiadomość, ponieważ ten adres Email został zarejestrowany
 na konto użytkownika naszego forum, który wysłał prośbę o odzyskanie hasła.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Ważne!</strong><br />
----------------------------------------------------------------------</p>

<p>Jeśli to nie Ty odwiedzasz nasze forum lub nie przeprowadziłeś żadnej zmiany,
proszę zignorować tą wiadomość.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Instrukcja odzyskiwania hasła</strong><br />
----------------------------------------------------------------------</p>
</p>
Link z prośbą o odzyskanie hasła jest ważny tylko i wyłącznie przez 3 dni od momentu dostarczenia tej wiadomośc:<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(Jeśli nie działa, proszę skopiować link do pola adresu w przeglądarce internetowej.)</p>

<p>Po otwarciu strony, proszę wprowadzić nowe hasło i potwierdzić formularz. Dopiero wtedy będziesz
mógł uzyskać dostęp do konta wpisując swoje nowe hasło.
Pamiętaj, że hasło możesz zmienić kiedykolwiek podczas edycji własnego konta.</p>

<p>Żądanie zostało wysłane z adresu IP: {clientip}</p>


<p>
Z poważaniem,<br />
</p>
<p>{bbname} management team.
{siteurl}</p>',


	'email_verify_subject'	=> 'Weryfikacja adresu Email',//'Email 地址验证',
	'email_verify_message'	=> '
<p>{username},<br />
Ta wiadomość została wysłana z serwisu {bbname}.</p>

<p>Otrzymałeś tą wiadomość, ponieważ Twój adres Email został zarejestrowany na naszym forum lub
ktoś z użytkowników przez pomyłkę wprowadził błędny podczas edycji konta.
Jeśli to nie Ty odwiedzasz nasze forum lub nie przeprowadziłeś żadnej zmiany,
proszę zignorować tą wiadomość.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Instrucje aktywacji konta</strong><br />
----------------------------------------------------------------------<br />
<br />
<p>Jeśli jesteś nowy na forum lub dokonałeś zmian w swoim profilu, proszę zastosować się do poniższych instrukcji.
Wymagamy weryfikacji Twojego adres Email. Operacja zapobiega niechcianym wiadomościom SPAM oraz innym operacjom.</p>

<p>Aby aktywować konto, kliknij na poniższy odnośnik:<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Jeśli nie działa, proszę skopiować link do pola adresu w przeglądarce internetowej.)</p>

<p>Dziękujemy za wizytę. Mamy nadzieję, że będziesz z nami szczęśliwy!</p>


<p>
Z poważaniem,<br />

Ekipa {bbname} .<br />
{siteurl}</p>',

	'email_register_subject' =>	'Rejestracja na forum',//'论坛注册地址',
'email_register_message' =>	'<br />
<p>Ta wiadomość została wysłana z serwisu {bbname}.</p>

<p>Otrzymałeś tą wiadomość, ponieważ Twój adres Email został zarejestrowany w serwisie {bbname}.
Jeśli nie chcesz odwiedzać naszego forum lub wycofać się z rejestracji,
proszę zignorować tą wiadomość.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Instrukcje rejestracji nowego konta</strong><br />
----------------------------------------------------------------------<br />
<br />
<p>Wygląda na to, że zostałeś nowym użytkownikiem serwisu {bbname} lub dokonałeś zmian w swoim aktualnym koncie.
Każda operacja mająca na celu zmianę danych chroniących Twoje konto, będzie wymagać wcześniejszego potwierdzenia.</p>

<p>Link ważny jest przez kolejne 3 dni od momentu jego wysłania. Po upływie tego czasu, możesz poprosić o nowy link aktywacyjny. Aby dokończyć proces rejestracji, proszę kliknąć w poniższy odnośnik. <br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Jeśli nie działa, proszę skopiować link do pola adresu w przeglądarce internetowej.)</p>

<p>Dziękujemy za wizytę.Thank you for your visit. Do zobaczenia!</p>


<p>
Z poważaniem,<br />

Ekipa {bbname} .<br />
{siteurl}</p>',


	'add_member_subject'	=> 'Zostałeś dodany jako nowy użytkownik',//'您被添加成为会员',
	'add_member_message'	=> '
{newusername},
<p>Ta wiadomość została wysłana z serwisu {bbname}.</p><br />
<br />
Witaj,
Przedstawiam się jako {adminusername} i jestem jednym z administratorów w serwisie {bbname}.<br />
Otrzymałeś tą wiadomość, ponieważ specjalnie dla Ciebie zostało utworzone nowe konto<br />
na naszym forum, do którego przypisaliśmy właśnie ten adres Email.<br />
<br />
----------------------------------------------------------------------<br />
Ważne!<br />
----------------------------------------------------------------------<br />
<br />
Jeśli nie jesteś zainteresowany członkostwem na naszym forum, proszę zignorować tą wiadomość.<br />
<br />
----------------------------------------------------------------------<br />
Informacje dotyczące konta<br />
----------------------------------------------------------------------<br />
<br />
Nazwa forum: {bbname}<br />
Adres forum: {siteurl}<br />
<br />
Użytkownik: {newusername}<br />
Hasło: {newpassword}<br />
<br />
Od teraz możesz użyć swojego konta by zalogować się na naszym forum, życzę przyjemności podczas Twoich odwiedzin!<br />
<br />
<br />
<br />
Sincerely yours,<br />
<br />
{bbname} management team.<br />
{siteurl}',


	'birthday_subject'	=> 'Happy Birthday to you!',//'祝您生日快乐',
	'birthday_message'	=> '<br />
{username},<br />
This letter was sent from the {bbname}.<br />
<br />
You have received this message, because of this email address is registered in our forum {bbname}.<br />
In accordance with the information in your profile, today is your Birthday.<br />
Forum management team have pleased to congratulate you with your Birthday,
and sincerely wish you a happy birthday!<br />
<br />
If you are not a member of our forum, or have no birthday today, may be a mistake occure.<br />
Check for your email address and birthday in your profile.<br />
This message will not be sent to this e-mail address, please ignore this  message.<br />
<br />
<br />
<p>
Z poważaniem,<br />

Ekipa {bbname} .<br />
{siteurl}</p>',

	'email_to_friend_subject'	=> '{$_G[member][username]} polecił Tobie temat: $thread[subject]',//'{$_G[member][username]} 推荐给您: $thread[subject]',
	'email_to_friend_message'	=> '<br />
Ta wiadomość została wysłana przez {$_G[member][username]} ze strony {$_G[setting][bbname]}.<br />
<br />
Otrzymałeś tą wiadomość, ponieważ użytkownik {$_G[member][username]}<br />
ze strony {$_G[setting][bbname]} polecił Ci tę zawartość używając przycisku "poleć znajomym".<br />
Polecamy przejrzenie wiadomości.<br />
Jeśli nie jesteś zainteresowany, proszę zignorować tą wiadomość.<br />
Ta wiadomość została wysłana dobrowolnie.<br />
<br />
----------------------------------------------------------------------<br />
Treść wiadomości<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
Koniec wiadomości<br />
----------------------------------------------------------------------<br />
<br />
Proszę pamiętać, że wiadomość została wysłana przez użytkownika naszego forum, który skorzystał z przycisku "poleć znajomym".<br />
Ekipa forum nie odpowiada za treść umieszczoną w tej zawartości.<br />
<br />
<br />
Witaj na {$_G[setting][bbname]}<br />
$_G[siteurl]',

	'email_to_invite_subject'	=> 'Twój znajomy {$_G[member][username]} zaprasza Cię do rejestracji na {$_G[setting][bbname]}',//'您的朋友 {$_G[member][username]} 发送 {$_G[setting][bbname]} 论坛注册邀请码给您',
	'email_to_invite_message'	=> '<br />
$sendtoname,<br />
Ta wiadomość została wysłana od {$_G[member][username]} z forum {$_G[setting][bbname]}.<br />
<br />
Otrzymałeś tą wiadomość, ponieważ została ona wysłana przez {$_G[member][username]} z {bbname} .<br />
Ta wiadomość zawiera kod zaproszenia, który upoważnia Cię do rejestracji na naszym forum,<br />
and said additionally the following.<br />
<br />
!!! If you are not interested in this, please ignore this message.<br />
You do not need to unsubscribe or other further action.<br />
<br />
----------------------------------------------------------------------<br />
Start of original message<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
End of the original message<br />
----------------------------------------------------------------------<br />
<br />
Please note that this letter was initiated by the user.<br />
Forum management team is not responsible for such messages.<br />
<br />
Welcome to {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject'	=> 'Audit results to inform the user',//'用户审核结果通知',
	'moderate_member_message'	=> '<br />
<p>{username},
This letter was sent from the {bbname}.</p>

<p>You have received this message, because of every new user registration
at our forum require to verify registered email address by site administrator.
After the manual verification you will be notified about the audition results.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Registration info and audit results</strong><br />
----------------------------------------------------------------------<br />
<br />
User Name: {username}<br />
Registration time: {regdate}<br />
Submission time: {submitdate}<br />
Submit number: {submittimes}<br />
Registration reason: {message}<br />
<br />
Audit Results: {modresult}<br />
Audit time: {moddate}<br />
Audit Manager: {adminusername}<br />
Administrator Message: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Audit results explanation</strong><br />
----------------------------------------------------------------------<br />

<p>Approved: Your registration has been approved, you have become an official user of {bbname}.</p>

<p>Rejected: Your registration information is incomplete, or does not meet some our requirements.
You can send a message to administrator, <a href="home.php?mod=spacecp&ac=profile" target="_blank">complete your registration information</a>, and then submit again.</p>

<p>Deleted: Your request for registration does not meet our requirements,
or number of new registrations exceed our possibilities.
Your request is completely rejected, your account removed from the database.
It can not be used for log in or submitted for re-examine, please understand.</p>
<br />
<br />
Sincerely yours,<br />
<br />
{bbname} management team.<br />
{siteurl}',

	'adv_expiration_subject' => 'Your site ad will be {day} days after the due, Please timely processing',//'您站点的广告将于 {day} 天后到期，请及时处理',
	'adv_expiration_message' => 'The following ads on your site will be expired {day} days, please deal with:<br /><br />{advs}',//'您站点的以下广告将于 {day} 天后到期，请及时处理：<br /><br />{advs}',
	'invite_payment_email_message'	=> '
Thank you for using the {bbname}, ({siteurl}), Your order {orderid} has been paid completed, Order has been validated.<br />
<br />----------------------------------------------------------------------<br />
Here is what you get the invitation code
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Important!
<br />----------------------------------------------------------------------<br />',
);

