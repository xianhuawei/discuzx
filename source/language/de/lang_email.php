<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_email.php by Valery Votintsev at sources.ru
 *      German Discuz!X Translation (2011-08-12) by Coldcut - http://www.cybertipps.com
 */


$lang = array
(
	'hello'				=> 'Hallo',
	'moderate_member_invalidate'	=> 'Nicht G&uuml;ltig',
	'moderate_member_delete'	=> 'L&ouml;schen',
	'moderate_member_validate'	=> 'Best&auml;tigt',


	'get_passwd_subject'	=> 'Passwort zurücksetzen',
	'get_passwd_message'	=> '
<p>{username},
Der folgende Inhalt wurde durch {bbname} versandt:</p>

<p>Du erhältst diese Mail, weil in unserem Forum ein neues Passwort für 
den Account mit dieser Email-Adresse angefordert wurde.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Achtung!</strong><br />
----------------------------------------------------------------------</p>
<p>Falls du diese Benachrichtigung nicht angefordert hast,
kannst du sie ignorieren.
Andernfalls befolge die folgenden Schritte,
um dein Passwort zurückzusetzen.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Vorgangsweise</strong><br />
----------------------------------------------------------------------</p>
</p>
1. Um dein Passwort zurückzusetzen, klicke innerhalb von 3 Tagen auf diesen Link.<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(Du musst eventuell den Link in deinen Browser einfügen)</p>

<p>2. Logge dich anschließend mit deinem neuen Passwort ein,
um zu bestätigen.</p>

<p>Angefordert durch die IP: {clientip}</p>


<p>
Mit freundlichen Grüßen,<br />
</p>
<p>{bbname} Team.
{siteurl}</p>',


	'email_verify_subject'	=> 'Hinweise zur Aktivierung',
	'email_verify_message'	=> '
<p>{username},
Der folgende Inhalt wurde durch {bbname} versandt:</p>
<p>Du erhältst diese Mail, weil in unserem Forum ein Account mit dieser
Adresse registriert wurde.
Falls du dich nicht registriert hast, bitte ignoriere diese Nachricht.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Hinweise zur Aktivierung</strong><br />
----------------------------------------------------------------------<br />

<p>Um unerwünschte Registrierungen zu vermeiden, musst du die Gültigkeit
deiner Email-Adresse bestätigen.</p>

<p>Um deinen Account zu aktivieren, klicke einfach auf folgenden Link:<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Du musst eventuell den Link in deinen Browser einfügen)</p>

<p>Danke für deine Registrierung und viel Spaß auf unserer Seite!</p>


<p>
Mit freundlichen Grüßen,<br />

{bbname} Team.<br />
{siteurl}</p>',

	'email_register_subject' =>	'Forum registration',//'论坛注册地址',
'email_register_message' =>	'<br />
<p>This letter is sent from {bbname}.</p>

<p>You have received this message due to somebody (may be you) registered this E-Mail address at {bbname}.
If you do not want to access to {bbname}, or you did not registered at this site,
please ignore this message.

You do not need to unsubscribe or do any other further action.</p>
<br />
----------------------------------------------------------------------<br />
<strong>New user registration instructions</strong><br />
----------------------------------------------------------------------<br />
<br />
<p>If you are a {bbname} new user, or have modified your registered before Email address,
it is required to verify your mailbox address in order to avoid junk or malicious e-mail.</p>

<p>For register just click on the link below. The following link is valid for 3 days. After expired you can request to re-send the activation email to a new e-mail address:<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(If the above link is not working, copy the link URL and paste it into your browser address bar manually)</p>

<p>Thank you for your visit, we are glad to see you at our site!</p>


<p>
Sincerely yours,<br />

{bbname} management team.<br />
{siteurl}</p>',


	'add_member_subject' =>	'Du wurdest freigeschaltet',
	'add_member_message' =>	'
{newusername},
Der folgende Inhalt wurde durch {bbname} versandt:

Du erhältst diese Nachricht,
weil du von {adminusername} von {bbname} freigeschalten wurdest.
Hinzugefügt wurdest du auch zu den {bbname} Mitgiedern. Die aktuelle Email Adresse wurde registriert.

----------------------------------------------------------------------
Wichtig!
----------------------------------------------------------------------

Falls du kein Mitglied dieses Forum bist, ignoriere diese Mail.

----------------------------------------------------------------------
Informationen zum Account
----------------------------------------------------------------------

Name der Seite: {bbname}
URL: {siteurl}

Username: {newusername}
Passwort: {newpassword}

Wilkommen im Forum! Von jetzt an kannst du dich mit deinen Daten einloggen.



Mit freundlichen Grüßen,

{bbname} Team.
{siteurl}',


	'birthday_subject'	=> 'Happy Birthday!',
	'birthday_message'	=> '
{username},
Der folgende Inhalt wurde durch {bbname} versandt:

Du erhältst diese Nachricht, weil du dich in unserem Forum registriert hast.
Das Team von {bbname} möchte dir alles gute zum Geburtstag wünschen.

Falls du kein Mitglied in unserem Forum bist, bitte ignoriere diese Mail.

P.S.
If you are not a member of our forum, or have no birthday today,
may be a mistake occure.
Check for your email address and birthday in your profile.
This message will not be sent to this e-mail address, please ignore this 
Message.


Mit freundlichen Grüßen,

{bbname} Team.
{siteurl}',

	'email_to_friend_subject'	=> '{$_G[member][username]} Empfehlung für dich: $thread[subject]',
	'email_to_friend_message'	=> '<br />
Dieser Brief ist {$_G[setting][bbname]} von {$_G[member][username]} gesendet.<br />
<br />
Du erhaltest diese Nachricht weil, {$_G[member][username]} durch {$_G[setting][bbname]} "Freunde empfehlen"<br />
Funktionale Inhalte empfehlen das folgende für dich,<br />
wenn du nicht interessiert bist, ignoriere bitte diese Nachricht.<br />
Du musst nicht Abmelden oder weitere Ma&szlig;nahmen treffen.<br />
<br />
----------------------------------------------------------------------<br />
Original Brief<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
Ende des Original-Brief<br />
----------------------------------------------------------------------<br />
<br />
Bitte beachte, dass dieser Brief nur durch den Benutzer, "E-Mail an einen Freund" zu schicken, nicht das Forum der offiziellen verwendete E-Mail,<br />
Forum Management-Team verantwortlich sein wird für solche Nachrichten.<br />
<br />
<br />
Willkommen {$_G[setting][bbname]}<br />
$_G[siteurl]',

	'email_to_invite_subject'	=> 'Deine Freunde {$_G[member][username]} Senden {$_G[setting][bbname]} Anmeldung zum Forum Einladungs-Code für dich',
	'email_to_invite_message'	=> '<br />
$sendtoname,<br />
Dieser Brief ist {$_G[setting][bbname]} von {$_G[member][username]} gesendet.<br />
<br />
Du erhaltest diese Nachricht, weil {$_G[member][username]} Durch unser Forum "senden Sie eine Einladung Code für einen Freund"<br />
Funktionale Inhalte empfehlen das folgende für dich, wenn du nicht interessiert bist, ignoriere bitte diese Nachricht.<br />
<br />
----------------------------------------------------------------------<br />
Original Brief<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
Ende des Original-Brief<br />
----------------------------------------------------------------------<br />
<br />
Bitte beachte, dass dieser Brief ist nur vom Benutzer verwendet werden "senden Sie eine Einladung Code an einen Freund geschickt", nicht das geeignete Forum für die amtliche Post,<br />
Forum Management-Team verantwortlich sein wird für solche Nachrichten.<br />
<br />
Willkommen {$_G[setting][bbname]}<br />
$_G[siteurl]',


	'moderate_member_subject'	=> 'Ergebnisse der Prüfung, um dem Benutzer',
	'moderate_member_message'	=> '<br />
<p>{username},
Diese Nachricht wurde von {bbname} gesendet.</p>

<p>Du erhaltest diese Nachricht, weil in unserem Forum diese E-Mail-Adresse ist, wenn ein neuer Benutzer registrieren
Ilse und Administratoren benötigen, um die neue Bedienungsanleitung schreiben, die E-Mail eingereichte gesetzt wirst du benachrichtigt
Die Anwendung der Audit-Ergebnisse.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Informationen zur Registrierung und Audit-Ergebnisse</strong><br />
----------------------------------------------------------------------<br />
<br />
Benutzername: {username}<br />
Registrierung: {regdate}<br />
Submit Zeit: {submitdate}<br />
Anzahl: {submittimes}<br />
Nachricht: {message}<br />
<br />
Audit-Ergebnisse: {modresult}<br />
Audit Zeit: {moddate}<br />
Audit Manager: {adminusername}<br />
Administrator Message: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Audit Ergebnisse zeigen,</strong><br />
----------------------------------------------------------------------<br />

<p>Akzeptiert: Dein Registrierung genehmigt wurde, musst du dich auf unserer offiziellen User-Forum.</p>

<p>Abgelehnt: Deine Anmeldung Informationen unvollständig sind, oder treffen einige unserer neuen Anforderungen der Nutzer, kannst du
	  Nach dem Administrator eine Nachricht, fülle die Registrierungsdaten, dann vorlegen.</p>

<p>Löschen: Dein Antrag auf Eintragung Fehler aufgrund unserer großen, oder die Zahl der Neuzulassungen von unserem Forum wurde
	  Als erwartet, ist der Antrag vollständig abgelehnt. Dein Konto aus der Datenbank entfernt, wird es nicht
	  Re-use erneut zu prüfen, dein Protokoll oder zu unterbreiten, bitte verstehen.</p>

<br />
<br />
Mit freundlichen Grüßen,<br />
<br />
{bbname} Management Team.<br />
{siteurl}',

	'adv_expiration_subject' => 'Die Anmeldung ist seit {day} Tagen abgelaufen. Bitte um Zeitgerechte bearbeitung.',
	'adv_expiration_message' => 'Die Anzeige wird in {day} Tagen ablaufen. Bitte um Zeitgerechte bearbeitung.<br /><br />{advs}',
	'invite_payment_email_message'	=> '
Willkommen im {bbname} bei {siteurl}! Deine Bestellung {orderid} wurde erhalten und vervollständigt.<br />
<br />----------------------------------------------------------------------<br />
Hier ist der Einladung Code
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Wichtig!
<br />----------------------------------------------------------------------<br />',
);

