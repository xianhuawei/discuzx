<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_email.php by Valery Votintsev at sources.ru
 */


$lang = array
(
	'hello'				=> 'Bonjour',
	'moderate_member_invalidate'	=> 'Invalider',
	'moderate_member_delete'	=> 'Supprimer',
	'moderate_member_validate'	=> 'Agr&#233;ment',


	'get_passwd_subject'	=> 'R&#233;initialiser Mot de Passe',
	'get_passwd_message'	=> '
<p>{username},
Ce Courrier est Envoy&#233; Par {bbname}.</p>

<p>Vous Recevez ce Mail Car votre E-mail est Enregistr&#233; Sur notre Site,
Et Vous Demander un Nouveau Mot de Passe.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Important!</strong><br />
----------------------------------------------------------------------</p>
<p>Vous Recevez ce Mail Parce Que Vous ou Quelqu\'un d\'Autre a Tent&#233; De
R&#233;initialiser votre Mot de Passe dans notre Site. si Vous n\'Avez pas Demander un Nouveau Mot ou Que Vous
Ne sont pas un Membre de notre Site, Svp. Ignorer ce Message</p>
<p>
----------------------------------------------------------------------<br />
<strong>Comment R&#233;initialiser le Mot de Passe</strong><br />
----------------------------------------------------------------------</p>
</p>
Pour R&#233;initialiser Votre Mot De Passe, Svp. Visiter Le Lien Ci-dessous Les 3 Jours Ouvrables:<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(Si En Cliquant Sur L\'url de ce Message ne fonctionne Pas, Il Suffit de Copier et De
Le Coller dans la Barre d\'Adresse de votre Navigateur.)</p>

<p>Svp. Visitez la Page Sur et R&#233;initialiser le Mot, Alors Vous Pouvez L\'utiliser pour Vous Connecter Sur notre Site. Vous Pouvez Changer votre Mot de Passe dans Param&#232;tre.</p>

<p>Demande IP: {clientip}</p>


<p>
Votre,<br />
</p>
<p>{bbname} Team.
{siteurl}</p>',


	'email_verify_subject'	=> 'V&#233;rif. Courr. Electr. E-mail',
	'email_verify_message'	=> '
<p>{username},
Ce Courrier est Envoy&#233; Par {bbname}.</p>

<p>Vous Recevez ce Mail Car Vous Vous &#202;tes Enregistr&#233; Sur notre Site,
Ou Quelqu\'un a Utilis&#233; votre Adresse Email. si Vous n\'Avez pas Visit&#233; notre Site ou de V&#233;rifier
Votre E-mail, Svp. Ignorer ce Mail.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Comment Activer le Compte</strong><br />
----------------------------------------------------------------------<br />

<p>Vous &#202;tes un D&#233;butant de notre Site ou Que Vous Modifiez votre Adresse Email,
Nous Avons Besoin de V&#233;rifier votre Adresse Email pour &#201;viter un Mail Invalide.</p>

<p>Svp. Visitez le Lien Ci-dessous pour Activer votre Compte: <br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Si En Cliquant Sur L\'url de ce Message ne Fonctionne Pas, Il Suffit de Copier et De
Le Coller dans la Barre d\'Adresse de votre Navigateur.)</p>

<p>Merci pour votre visite!</p>


<p>
Votre,<br />

{bbname} Team.<br />
{siteurl}</p>',

	'add_member_subject'	=> 'Renseignements Sur le Compte Important',
	'add_member_message'	=> '
{newusername},
Ce Courrier est Envoy&#233; Par {bbname}.

Je Suis {adminusername}, l\'un des {bbname} Administrateur. Vous recevez ce mail
Parce Que Vous Avez &#233;t&#233; Ajout&#233; En Tant Que Membre de notre Site. ce Courriel est votre Email Inscrits.

----------------------------------------------------------------------
Important!
----------------------------------------------------------------------

Si Vous N\'&#234;tes pas Int&#233;ress&#233;s &#224; notre Site ou ne Souhaitez pas &#234;tre un Membre,
Svp. Ignorer ce Mail.

----------------------------------------------------------------------
Informations sur le compte
----------------------------------------------------------------------

Nom du Forum: {bbname}
URL du Forum: {siteurl}

Identifiant: {newusername}
Mot de Passe: {newpassword}

Maintenant, Vous Pouvez Utiliser votre Compte pour Vous Connecter Sur notre Site, Merci!



Votre,

{bbname} Team.
{siteurl}',


	'birthday_subject'	=> 'Joyeux Anniversaire',
	'birthday_message'	=> '
{username},
Ce Courrier est Envoy&#233; Par {bbname}.

Vous Recevez ce Mail Car votre E-mail est Enregistr&#233; Sur notre Site,
Et Aujourd\'hui c\'est Ton Anniversaire.
Joyeux Anniversaire {username} ! .

Si Vous n\'&#234;tes pas un Membre de notre Site ou Aujourd\'hui  ce n\'est  pas votre Anniversaire, Il y a
Peut-&#234;tre Une Erreur D\'information Dans La Liste De Notre Base De Donn&#233;es Ou, Que Votre Profil A &#201;t&#233; Chang&#233; Involontairement
Mais heureusement que ce  mail est uniquement envoyer une fois par an, vous pouvez ignorer ce message, et excusez nous du d&#233;sagr&#233;ment..



Votre,

{bbname} Team.
{siteurl}',

	'email_to_friend_subject'	=> '{$_G[member][username]} recommande $thread[subject] pour vous',
	'email_to_friend_message'	=> '
Ce Courrier est Envoy&#233; Par {$_G[member][username]} de {$_G[setting][bbname]}.

Vous Recevez ce Mail car {$_G[member][username]} a utilis&#233; "Recommandons &#224; des Amis" de {$_G[setting][bbname]}
et de recommander le contenu ci-dessous. Si cela ne vous int&#233;resses pas, vous pouvez ignorer ce message.
Vous n\'avez pas besoin de faire d\'autres op&#233;rations.

----------------------------------------------------------------------
D&#233;but secteur de son contenu
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Fin du contenu
----------------------------------------------------------------------

Ce mail est envoy&#233; en utilisant "Recommandons &#224; des amis" de cette fonction,
ceci n\'est pas un courrier officiel, nous ne serons pas tenus responsables.

Bienvenue pour visiter {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject'	=> 'Votre Ami {$_G[member][username]} a envoy&#233; un code d\'invitation de {$_G[setting][bbname]} pour vous',
	'email_to_invite_message'	=> '
$sendtoname,
Ce courrier est envoy&#233; par {$_G[member][username]} de {$_G[setting][bbname]}.

Vous recevez ce mail car {$_G[member][username]} a utilis&#233; "Envoyer le code d\'invitation &#224; des amis" de notre forum
&#224; recommander certains contenus pour vous. Si vous n\'&#234;tes pas interess&#233; eux, vous pouvez ignorer cet e-mail.
Vous n\'avez pas besoin de faire d\'autres op&#233;rations.

----------------------------------------------------------------------
D&#233;but secteur de son contenu
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Contenu Fin
----------------------------------------------------------------------

Ce mail est envoy&#233; en utilisant "Envoyer le code d\'invitation &#224; des Amis" pour cette fonction,
ceci n\'est pas un courrier officiel, nous ne serons pas tenus responsables.

Bienvenue pour visiter {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject'	=> 'Result. Moderation Utilisateur',
	'moderate_member_message'	=> '
<p>{username} ,
Ce courrier est envoy&#233; par {bbname}.</p>

<p>Vous recevez ce mail car vous vous &#234;tes enregistr&#233; sur notre site ou quelqu\'un a utilis&#233; votre adresse email.
Ce mail est utilis&#233; pour envoyer le r&#233;sultat de la mod&#233;ration.</p>

----------------------------------------------------------------------<br />
<strong>Enreg. information et Resul. moderation</strong><br />
----------------------------------------------------------------------<br />

Identifiant: {username}<br />
Date Enreg.: {regdate}<br />
Date Env.: {submitdate}<br />
Heure Env.: {submittimes}<br />
Enreg. Raison: {message}<br />
<br />
Resultat Moderation: {modresult}<br />
Temps de Moder.: {moddate}<br />
Standard.: {adminusername}<br />
Message: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Explication de la mod&#233;ration</strong><br />
----------------------------------------------------------------------<br />

<p>Agr&#233;ment: Votre inscription a &#233;t&#233; l\'approbation, vous &#234;tes le membre de notre site maintenant.</p>

<p>Invalide:
Vos informations d\'enregistrements ne sont pas termin&#233;s ou ne r&#233;pondent pas &#224; nos exigences,
You can <a href="home.php?mod=spacecp&ac=profile" target="_blank">Compl&#233;ter Vos Informations</a> et de pr&#233;senter &#224; nouveau.</p>

<p>Suppression:
Vos informations ne r&#233;pondent pas &#224; nos besoins ou le nombre de membres est remplis
Votre demande a &#233;t&#233; invalid&#233;e. Votre compte a &#233;t&#233; supprim&#233; &#224; partir de notre
base de donn&#233;es. Vous ne pouvez pas l\'utiliser pour vous connecter ou pr&#233;senter la requ&#234;te de mod&#233;ration &#224; nouveau.</p>

<br />
<br />
Sinc&#232;rement,<br />
<br />
{bbname} Les Gestionnaires de la Team<br />
{siteurl}',

	'adv_expiration_subject' =>	'La publicit&#233; de votre site sera expir&#233; dans {day} jours, Svp. faire face au cas &#233;ch&#233;ant.',
	'adv_expiration_message' =>	'Les annonces suivantes sur votre site sont expir&#233;s {day} jours, Svp. faire face:<br /><br />{advs}',
	'invite_payment_email_message'	=> '
Bienvenue sur {bbname} ({siteurl}), votre commande a &#233;t&#233; pay&#233; {orderid} commande achev&#233; ont &#233;t&#233; valid&#233;s.<br />
<br />----------------------------------------------------------------------<br />
Voici ce Que Vous Obtenez Code Invitation
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Important!
<br />----------------------------------------------------------------------<br />',
);

?>