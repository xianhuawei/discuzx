<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_email.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$lang = array
(
	'hello' => 'Chào bạn',
	'moderate_member_invalidate' => 'Thành viên vô hiệu',
	'moderate_member_delete' => 'Xóa',
	'moderate_member_validate' => 'Bởi',


	'get_passwd_subject' =>		'Trợ giúp Lấy mật khẩu',
	'get_passwd_message' =>		'
<p>{username},
Lá thư này gửi từ {bbname}.</p>

<p>Bạn nhận được lời nhắn này, vì bạn đã dùng địa chỉ Email này để đăng ký tài khoản {bbname} chúng tôi làm vậy để xác thực Email đồng thời giúp ích cho việc lấy lại mật khẩu tài khoản nếu bạn có quên hoặc mất nó sau này.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Điều quan trọng</strong><br />
----------------------------------------------------------------------</p>

<p>Nếu bạn không phải là người tạo ra tài khoản {bbname} xin vui lòng bỏ qua
Và xóa tin nhắn này. Chỉ khi bạn cần phải lấy lại mật khẩu, cần phải tiếp tục đọc phần sau đây
Nội dung.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Hướng dẫn đặt lại mật khẩu</strong><br />
----------------------------------------------------------------------</p>
</p>
Bạn có ba ngày kể từ ngày yêu cầu đổi mật khẩu. Hãy nhấp vào liên kết dưới đây, quá hạn trên, yêu cầu đổi mật khẩu của bạn sẽ bị hủy bỏ:<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(Nếu liên kết trên ko hoạt động, vui lòng copy nó và dán vào khung địa chỉ trình duyệt của bạn!)</p>

<p>Trong trang mới mở ra. Nhập mật khẩu mới của bạn. Xác nhận, và bạn có thể sử dụng mật khẩu mới để đăng nhập.
Hoặc nếu bạn đã đăng nhập vào tài khoản rồi, bạn có thể sửa đội mật khẩu trong thiết đặt cá nhân.</p>

<p>Yêu cầu gửi bởi IP : {clientip}</p>


<p>
Thân ái,<br />
</p>
<p>{bbname} BQT.
{siteurl}</p>',


	'email_verify_subject' =>	'Xác minh địa chỉ Email',
	'email_verify_message' =>	'<br />
<p>{username},<br />
Lá thư này đã được gửi bởi {bbname}.</p>

<p>Bạn nhận được lời nhắn này, vì bạn đã dùng địa chỉ Email này để đăng ký tài khoản {bbname} chúng tôi làm vậy để xác thực Email đồng thời giúp ích cho việc lấy lại mật khẩu tài khoản nếu bạn có quên hoặc mất nó sau này.
Nếu bạn không tạo ra tài khoản {bbname} hoặc bạn đã quên sửa đổi Email của bạn trong thiết lập dẫn đến mail bị gửi sai. 
Hãy bỏ qua lá thư này nếu thấy phiền nhé.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Hướng dẫn kích hoạt tài khoản</strong><br />
----------------------------------------------------------------------<br />
<br />
<p>Nếu bạn là một người vừa đăng ký tài khoản {bbname} hoặc vừa mới sửa đổi thiết đặt Email, chúng tôi cần xác minh tính hợp lệ của địa chỉ của bạn để tránh spam email hoặc bị lạm dụng.</p>

<p>Hãy nhấp vào liên kết phía dưới để kích hoạt tài khoản Email của bạn <br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Nếu liên kết trên ko hoạt động, vui lòng copy nó và dán vào khung địa chỉ trình duyệt của bạn!)</p>

<p>Cảm ơn vì bạn đã tham gia forum của chúng tôi, chúc bạn gặp nhiều may mắn trong cuộc sống!</p>


<p>
Thân ái,<br />

{bbname} BQT.<br />
{siteurl}</p>',

	'email_register_subject' =>	'Đăng ký mail mới',
	'email_register_message' =>	'<br />
<p>Lá thư này được gửi bởi  {bbname}.</p>

<p>Bạn nhận được lời nhắn này, vì bạn đã dùng địa chỉ Email này để đăng ký tài khoản {bbname} chúng tôi làm vậy để xác thực Email đồng thời giúp ích cho việc lấy lại mật khẩu tài khoản nếu bạn có quên hoặc mất nó sau này.
Nếu bạn không tạo ra tài khoản {bbname} hoặc bạn đã quên sửa đổi Email của bạn trong thiết lập dẫn đến mail bị gửi sai. 
Hãy bỏ qua lá thư này nếu thấy phiền nhé.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Hướng dẫn người dùng mới đăng ký mail mới </strong><br />
----------------------------------------------------------------------<br />
<br />
<p>Nếu bạn là một người vừa đăng ký tài khoản {bbname} hoặc vừa mới sửa đổi thiết đặt Email, chúng tôi cần xác minh tính hợp lệ của địa chỉ của bạn để tránh spam email hoặc bị lạm dụng.</p>

<p>Bạn hãy nhấp vào liên kết sau để hoàn thành việc đăng ký, và liên kết này chỉ tồn tại trong vòng ba ngày. Nếu quá 3 ngày bạn có thể tái xác thực lại Email.<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Nếu liên kết trên ko hoạt động, vui lòng copy nó và dán vào khung địa chỉ trình duyệt của bạn!)</p>

<p>Cảm ơn vì bạn đã tham gia forum của chúng tôi, chúc bạn gặp nhiều may mắn trong cuộc sống!</p>


<p>
Thân ái, <br />

{bbname} BQT.<br />
{siteurl}</p>',


	'add_member_subject' =>		'Thêm 1 thành viên mới',
	'add_member_message' => 	'
{newusername},
Lá thư này đã được gửi bởi  {bbname}.<br />
<br />
Tôi là {adminusername}, Quản trị viên của {bbname}. Bạn nhận được thư này vì bạn gia nhập thành viên của website {bbname}, địa chỉ Email được dùng để đăng kí!<br />
<br />
----------------------------------------------------------------------<br />
Chú ý quan trọng <br />
----------------------------------------------------------------------<br />
<br />
Nếu bạn không đăng ký tài khoản {bbname} hoặc không muốn trở thành thành viên, xin vui lòng bỏ qua thư này.<br />
<br />
----------------------------------------------------------------------<br />
Thông tin tài khoản<br />
----------------------------------------------------------------------<br />
<br />
Site Name: {bbname}<br />
Địa chỉ trang web: {siteurl}<br />
<br />
Tên: {newusername}<br />
Mật khẩu: {newpassword}<br />
<br />
Từ bây giờ, bạn có thể sử dụng đăng tài khoản trên để đăng nhập {bbname}, chúc bạn có những phút giây thư giãn thật thoải mái!
<br />
<br />
<br />
<br />
Thân ái,<br />
<br />
{bbname} BQT.<br />
{siteurl}',


	'birthday_subject' =>		'Chúc mừng Sinh nhật',
	'birthday_message' => 		'<br />
{username},<br />
Lá thư này đã được gửi bởi  {bbname}.<br />
<br />
Bạn nhận được lời nhắn này, vì bạn đã dùng địa chỉ Email này để đăng ký tài khoản {bbname}<br />
Và theo như thông tin tài khoản bạn đã thiết lập thì hôm nay là ngày sinh nhật của bạn. Thay mặt cho đội ngũ quản lý {bbname}, chân thành gửi đến bạn một lời chúc mừng Sinh nhật. Chúc bạn có một Sinh nhật vui vẻ, đầm ấm và hạnh phúc. <br /><br />
<br />
Nếu bạn không phải là thành viên của {bbname}, hay hôm nay không phải ngày sinh nhật của bạn, có thể là email của bạn
đã bị lạm dụng, hoặc điền sai Sinh nhật. br />
Xin vui lòng bỏ qua Email này.<br />
<br />
<br />
Thân ái,<br />
<br />
{bbname} BQT.<br />
{siteurl}',

	'email_to_friend_subject' =>	'{$_G[member][username]} giới thiệu bạn: $thread[subject]',
	'email_to_friend_message' =>	'<br />
Lá thư này là do thành viên {$_G[setting][bbname]} với {$_G[member][username]} gửi.<br />
<br />
Bạn nhận được mail này do thành viên {$_G[member][username]} của {$_G[setting][bbname]} đã sử dụng chức năng “giới thiệu bạn bè” với những nội dung đề nghị dưới đây cho bạn, nếu bạn không quan tâm, vui lòng bỏ qua thư này.<br />
Bạn không cần hủy bỏ đăng kí hoặc làm thêm bất cứ điều gì.<br />
<br />
----------------------------------------------------------------------<br />
Nội dung<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
Hết.<br />
----------------------------------------------------------------------<br />
<br />
Đây là email được thành viên tại {bbname} sử dụng chức năng "Giới thiệu bạn bè" để gửi.
Đội ngũ quản lý trang web sẽ chịu trách nhiệm cho các tin nhắn như vậy.<br />
<br />
Chào mừng đến với {$_G[setting][bbname]}<br />
$_G[siteurl]',

	'email_to_invite_subject' =>	'Bạn của bạn: {$_G[member][username]} gửi một mã mời tham gia {$_G[setting][bbname]} đến bạn',
	'email_to_invite_message' =>	'<br />
$sendtoname,<br />
Lá thư này gửi từ thành viên {$_G[member][username]} của {$_G[setting][bbname]}.<br />
<br />
Bạn nhận được Email này là do thành viên {$_G[member][username]} đến từ {bbname} sử dụng chức năng "Mời bạn bè" với những nội dung đề nghị dưới đây cho bạn.<br />
Nếu bạn không quan tâm, vui lòng bỏ qua thư này. Bạn không cần hủy bỏ đăng kí hoặc làm thêm bất cứ điều gì<br />
Trình tự: <br />
<br />
----------------------------------------------------------------------<br />
Nội dung:<br />
----------------------------------------------------------------------<br />
<br />
$message<br />
<br />
----------------------------------------------------------------------<br />
Hết.<br />
----------------------------------------------------------------------<br />
<br />
Đây là email được thành viên tại {bbname} sử dụng chức năng "Giới thiệu bạn bè" để gửi.
Đội ngũ quản lý trang web sẽ chịu trách nhiệm cho các tin nhắn như vậy.<br />
<br />
Chào mừng đến với {$_G[setting][bbname]}<br />
$_G[siteurl]',


	'moderate_member_subject' =>	'Thông báo cho người sử dụng kết quả kiểm duyệt',
	'moderate_member_message' =>	'<br />
<p>{username},
Lá thư này gửi từ {bbname}</p>

<p>Bạn nhận được tin nhắn này vì địa chỉ email này được sử dụng để đăng kí thành viên mới tại {bbname}. Ban quản trị cần thiết phải xem xét hướng dẫn người sử dụng mới, tin nhắn sẽ thông báo cho bạn để gửi Ứng dụng kết quả kiểm duyệt.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Thông tin đăng ký và kết quả kiểm duyệt</strong><br />
----------------------------------------------------------------------<br />
<br />
Tên: {username}<br />
Ngày đăng kí: {regdate}<br />
Ngày gửi: {submitdate}<br />
Lần gửi: {submittimes}<br />
Nội dung: {message}<br />
<br />
Kết quả: {modresult}<br />
Ngày kiểm duyệt: {moddate}<br />
Quản trị viên: {adminusername}<br />
Webmaster: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Kết quản kiểm duyệt cho thấy</strong><br />
----------------------------------------------------------------------<br />

<p>Duyệt: đăng ký của bạn đã được chấp thuận, bạn trở thành một người sử dụng chính thức tại {bbname}.</p>

<p>Từ chối: thông tin đăng ký của bạn không đầy đủ, hoặc chưa đáp ứng yêu cầu của chúng tôi cho một người dùng mới, bạn có thể <a href="home.php?mod=spacecp&ac=profile" target="_blank">Hoàn tất thông tin đăng ký</a>,rồi gửi lại lần nữa.</p>

<pXóa: Yêu cầu đăng kí của bạn không phù hợp và không được chấp thuận. Tài khoản của bạn bị xóa khỏi hệ thống. Tài khoản này có thể được tái sử dụng bởi người dùng khác.</p>

<br />
<br />
Thân ái,<br />
<br />
{bbname} BQT.<br />
{siteurl}',

	'adv_expiration_subject' =>	'Quảng cáo của bạn sẽ hết hạn ngày {day},vui lòng kiểm tra lại',
	'adv_expiration_message' =>	'Các Quảng cáo của bạn trên trang web sẽ hết hạn ngày {day},xin vui lòng giải quyết:<br /><br />{advs}',
	'invite_payment_email_message' => '
Chào mừng đến với {bbname},{siteurl} ,phí bạn trả quảng cáo đã kết thúc{orderid} và quảng cáo đã hết hiệu lực.<br />
<br />----------------------------------------------------------------------<br />
Bạn nhận được một mãi mời!
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Chú ý!
<br />----------------------------------------------------------------------<br />',
);

?>