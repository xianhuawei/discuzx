<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_email.php by Valery Votintsev at sources.ru
 */


$lang = array
(
	'hello'				=> 'Hello',//'你好',
	'moderate_member_invalidate'	=> 'Decline',//'否决',
	'moderate_member_delete'	=> 'Delete',//'删除',
	'moderate_member_validate'	=> 'Accept',//'通过',


	'get_passwd_subject'	=> 'Retrieve Password Help',//'取回密码说明',
	'get_passwd_message'	=> '
<p>{username},
This letter was sent from the {bbname}.</p>

<p>You have received this message, because this email address is registered as a user in our forums,
and the user requests to reset the password by Email.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Important!</strong><br />
----------------------------------------------------------------------</p>
<p>If you did not requested password reset or if you have not registered at our forum,
please ignore and delete this message.
In the case you confirm the password reset,
you need to read the following content.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Password reset instructions</strong><br />
----------------------------------------------------------------------</p>
</p>
You only need to submit within three days after a request by clicking the link below to reset your password:<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(If the link above is not worked, please paste thist address manually into your browser address bar.)</p>

<p>After the above page open, enter a new password and submit a form, after then you can use your new password.
You can change your password at any time in a user control panel.</p>

<p>This request was submitted from the IP address: {clientip}</p>


<p>
Sincerely yours,<br />
</p>
<p>{bbname} management team.
{siteurl}</p>',


	'email_verify_subject'	=> 'Email Address Verification',//'Email 地址验证',
	'email_verify_message'	=> '
<p>{username},
This letter was sent from the {bbname}.</p>
<p>You have received this message, because of new user registration at our Forum,
or some user have used Your address when modified his/her Email.
If you did not visited our forum, or not carry out about such operations,
please ignore this message.
You do not need to unsubscribe or other further action.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Account activation instructions</strong><br />
----------------------------------------------------------------------<br />

<p>You are new to our forum, or modify your registration Email address to use this,
We need to verify the validity of your email address to avoid spam or other abuse actions.</p>

<p>To activate your email account you need to click the link below:<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(If the link above is not worked, please paste link address manually into your browser address bar.)</p>

<p>Thank you for your visit and wish you be happy! </p>


<p>
Sincerely yours,<br />

{bbname} management team.<br />
{siteurl}</p>',

	'add_member_subject'	=> 'You are added as a member',//'您被添加成为会员',
	'add_member_message'	=> '
{newusername},
This letter was sent from the {bbname}.

I am {adminusername}, one of the managers at {bbname}. You have received this message because you are just has been added as a member
at our forum, which is our current Email address you have registered.

----------------------------------------------------------------------
Important!
----------------------------------------------------------------------

If you are not interested in our Forum or do not intend to become a member, please ignore this message.

----------------------------------------------------------------------
Your Account Information
----------------------------------------------------------------------

Forum Name: {bbname}
Forum Address:{siteurl}

User Name: {newusername}
Password: {newpassword}

From now, you can use your account to log in to our forum, I wish you a pleasant to use!



Sincerely yours,

{bbname} management team.
{siteurl}',


	'birthday_subject'	=> 'Happy Birthday to you!',//'祝您生日快乐',
	'birthday_message'	=> '
{username},
This letter was sent from the {bbname}.

You have received this message, because this email address is registered in our forum.
In accordance with the information in your profile, today is your Birthday.

Forum management team have pleased to congratulate you with your Birthday,
and sincerely wish you a happy birthday!

P.S.
If you are not a member of our forum, or have no birthday today,
may be a mistake occure.
Check for your email address and birthday in your profile.
This message will not be sent to this e-mail address, please ignore this 
Message.


Sincerely yours,

{bbname} management team.
{siteurl}',

	'email_to_friend_subject'	=> '{$_G[member][username]} recommends you to visit: $thread[subject]',//'{$_G[member][username]} 推荐给您: $thread[subject]',
	'email_to_friend_message'	=> '
This letter was sent to you by {$_G[member][username]} from the {$_G[setting][bbname]}.

You have received this message because of {$_G[member][username]} from the {$_G[setting][bbname]}
clicked the "Email to Friend" link for recommend to you the following.
If you are not interested in this, please ignore this message.
You do not need to unsubscribe or other further action.

----------------------------------------------------------------------
Start of original message
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
End of the original message
----------------------------------------------------------------------

Please note that this letter was initiated by the forum user by "Email to a Friend" link!
Forum management team is not responsible for such messages.


Welcome to {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject'	=> 'Your friend {$_G[member][username]} invites you to register at {$_G[setting][bbname]}',//'您的朋友 {$_G[member][username]} 发送 {$_G[setting][bbname]} 论坛注册邀请码给您',
	'email_to_invite_message'	=> '
$sendtoname,
This letter was sent to you by {$_G[member][username]} from {$_G[setting][bbname]}.

You have received this message because the user {$_G[member][username]}
from our forum sent you an invitation code, that enable you to register
at our form, and said additionally the following.

!!! If you are not interested in this, please ignore this message.
You do not need to unsubscribe or other further action.

----------------------------------------------------------------------
Original letter began
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
End of the original letter
----------------------------------------------------------------------

Please note that this letter was initiated by the user.
Forum management team is not responsible for such messages.

Welcome to {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject'	=> 'Audit results to inform the user',//'用户审核结果通知',
	'moderate_member_message'	=> '<p>{username},
This letter was sent from the {bbname}.</p>
<p>You have received this message, because of every new user registration
at our forum require to verify registered email address by site administrator.
After the manual verification you will be notified about the audition results.
</p>

----------------------------------------------------------------------<br />
<strong>Registration info and audit results</strong><br />
----------------------------------------------------------------------<br />

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

<p>Approved: Your registration has been approved, you have become an official user of our forum.</p>

<p>Rejected:
Your registration information is incomplete,
or does not meet some our requirements.
You can send a message to administrator,
complete your registration information,
and then submit.</p>

<p>Deleted:
Your request for registration does not meet our requirements,
or number of new registrations exceed our possibilities.
Your request is completely rejected, your account removed from the database.
It can not be used for log in or submitted for re-examine,
please understand.</p>
<br />
<br />
Sincerely yours,<br />
<br />
{bbname} management team.<br />
{siteurl}',

	'adv_expiration_subject' =>	'Your site ad will be {day} days after the due, Please timely processing',
	'adv_expiration_message' =>	'The following ads on your site will be expired {day} days, please deal with:<br /><br />{advs}',
	'invite_payment_email_message'	=> '
Thank you for using the {bbname} ({siteurl}), Your order {orderid} has been paid completed, Order has been validated.<br />
<br />----------------------------------------------------------------------<br />
Here is what you get the invitation code
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Important!
<br />----------------------------------------------------------------------<br />',
);

?>