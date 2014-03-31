<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuz.vn
 *      $Id: lang_email.php 20525 2011-02-25 04:25:21Z congyushuai $
 */


$lang = array
(
	'hello' => 'Chào bạn',
	'moderate_member_invalidate' => 'Thành viên vô hiệu',
	'moderate_member_delete' => 'Xóa',
	'moderate_member_validate' => 'Bởi',


	'get_passwd_subject' =>		'Trợ giúp Lấy mật khẩu',
	'get_passwd_message' =>		'
<p>{username},
Thư này gửi từ {bbname} .</p>

<p>Bạn nhận được tin nhắn này vì địa chỉ email này đã được dùng để đăng ký thành viên tại {bbname} </p>
<p>
----------------------------------------------------------------------<br />
<strong>Quan trọng!</strong><br />
----------------------------------------------------------------------</p>

<p>Nếu bạn không yêu cầu đặt lại mật khẩu tại {bbname} xin vui lòng bỏ qua
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

Chú ý, người quản trị có thể sửa đổi mật khẩu giúp bạn.</p>

<p>Yêu cầu gửi bởi IP: {clientip}</p>


<p>
Trân trọng!<br />
</p>
<p>BQT {bbname}.
{siteurl}</p>',


	'email_verify_subject' =>	'Xác minh Địa chỉ Email',
	'email_verify_message' =>	'
<p>{username}, 
Thư được gửi từ {bbname}.</p>

<p>Bạn nhận được email này, là do bạn là Người đăng ký, hoặc đổi lại địa chỉ email tại {bbname}. Nếu như không phải bạn đăng ký tại {bbname}, xin vui lòng bỏ qua thông báo này nếu bạn thấy phiền.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Hướng dẫn kích hoạt tài khoản</strong><br />
----------------------------------------------------------------------<br />

<p>Nếu bạn là một người dùng mới đăng kí tại {bbname}, hoặc sửa đổi địa chỉ Email của bạn, chúng tôi cần xác minh tính hợp lệ của địa chỉ của bạn để tránh spam email hoặc bị lạm dụng.</p>

<p>Bạn chỉ cần nhấn vào liên kết dưới đây để kích hoạt tài khoản: <br />

<a href="{url}" target="_self">{url}</a>
<br />
(Nếu liên kết không mở ra trong trang mới bạn hãy tự copy bằng tay rồi dán lên thanh địa chỉ của trình duyệt)</p>

<p>Cảm ơn bạn đã ghé thăm, chúc bạn luôn vui vẻ hanh phúc!</p>


<p>
Trân trọng<br />

Nhóm quản trị {bbname}.<br />
{siteurl}</p>',

	'add_member_subject' =>		'Đăng ký thành viên tại website',
	'add_member_message' => 	'
{newusername} , 
Thư được gửi bởi {bbname}.

Tôi là {adminusername} , thuộc đội ngũ quản trị {bbname}, bạn nhận được email này vì bạn đã đăng ký  thành viên tại diễn đàn chúng tôi. Bạn đã sử dụng địa chỉ email này để đăng ký.

----------------------------------------------------------------------
Quan trọng!
----------------------------------------------------------------------

Nếu như bạn không quan tâm đến diễn đàn của chúng tôi hoặc không có ý định trở thành thành viên, vui lòng bỏ qua email này.

----------------------------------------------------------------------
Thông tin tài khoản
----------------------------------------------------------------------

Tên diễn đàn: {bbname}
Địa chỉ diễn đàn: {siteurl}

Username: {newusername}
Mật khẩu: {newpassword}

Từ bây giờ bạn có thể đăng nhập vào diễn đàn bằng tài khoản đã đăng ký, có nhiều điều thú vị đang chờ bạn!



Trân trọng

Nhóm quản trị {bbname}.
{siteurl}',


	'birthday_subject' =>		'Chúc mừng sinh nhật bạn',
	'birthday_message' => 		'
{username}, 
Thư được gửi bởi {bbname}.

Bạn nhận được thư vì bạn đã đăng ký thành viên tại website chúng tôi với email này. Và theo thông tin điền vào thì hôm nay là sinh nhật của bạn, thay mặt cho đội ngũ quản lý diễn đàn chúc bạn có một sinh nhật vui vẻ hạnh phúc.

Nếu bạn không phải thành viên hoặc hôm nay không phải sinh nhật của bạn chúng tôi xin lỗi vì email này có thể đã bị lạm dụng. Địa chỉ email này của bạn sẽ không nhận được tin nhắn lặp lại nữa (nếu bạn nhập sai sinh nhật), vui lòng bỏ qua email này.



Trân trọng

Nhóm quản trị {bbname}.
{siteurl}',

	'email_to_friend_subject' =>	'{$_G[member][username]} Đề tài nên xem: $thread[subject]',
	'email_to_friend_message' =>	'Email này được gửi bởi {$_G[member][username]} tại diễn đàn {$_G[setting][bbname]}.

Bạn nhận được email này vì thành viên {$_G[member][username]} tại {$_G[setting][bbname]} sử dụng chức năng "Gửi email cho bạn bè" để gửi đề tài cho bạn. Nếu bạn không có hứng thú vui lòng bỏ qua email này, bạn không cần phải hủy thông báo hoặc thực hiện thao tác khác.

----------------------------------------------------------------------
Phần đầu đoạn thư gốc
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Phần kết đoạn thư gốc
----------------------------------------------------------------------

Vui lòng lưu ý rằng thư này được gửi bởi thành viên, sử dụng chức năng "Gửi cho bạn bè" chứ không phải là email chính thức từ diễn đàn. Nhóm quản trị sẽ phản hồi cho các tin nhắn đó.

Chào mừng bạn đến với {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject' =>	'Bạn của bạn là {$_G[member][username]} đã gửi mã mời đăng ký tại {$_G[setting][bbname]} cho bạn',
	'email_to_invite_message' =>	'
$sendtoname,
Email này được gửi bởi {$_G[member][username]} tại diễn đàn {$_G[setting][bbname]}.

Bạn nhận được email này vì tài khoản {$_G[member][username]} đã sử dụng chức năng "Gửi mã mời cho bạn bè" tại website để gửi cho bạn. Nếu bạn không có hứng thú, vui lòng bỏ qua email này, bạn không cần phải hủy nhận thông báo hoặc các thao tác khác.

----------------------------------------------------------------------
Phần đầu đoạn thư gốc
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Phần kết đoạn thư gốc
----------------------------------------------------------------------

Vui lòng chú ý thư này được gửi bởi thành viên, sử dụng chức năng "Gửi mã mời cho bạn bè", không phải email chính thức từ hệ thống. Nhóm quản trị sẽ phản hồi cho từng email này.

Chào mừng bạn đến với {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject' =>	'Thông báo kết quả xét duyệt thành viên',
	'moderate_member_message' =>	'
<p>{username} , 
Thư được gửi bởi {bbname}.</p>

<p>Bạn nhận được thư này vì email này được sử dụng để đăng ký thành viên mới t ại diễn đàn. Ban quản trị cần xét duyệt tài khoản của bạn trước khi đưa vào sử dụng, vui lòng kiểm tra email thường xuyên và xem kết quả kiểm duyệt.</p>

----------------------------------------------------------------------<br />
<strong>Thông tin đăng ký và kết quả xét duyệt</strong><br />
----------------------------------------------------------------------<br />

Username: {username}<br />
Ngày tham gia: {regdate}<br />
Thời gian gửi: {submitdate}<br />
Tần số gửi: {submittimes}<br />
Đăng ký tại: {message}<br />
<br />
Kết quả duyệt: {modresult}<br />
Thời gian duyệt: {moddate}<br />
Người duyệt: {adminusername}<br />
Quản lý tin nhắn: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Kết quả xét duyệt của bạn</strong><br />
----------------------------------------------------------------------<br />

<p>Kết quả: Thông tin đăng ký của bạn đã được xét duyệt, bạn đã trở thành thành viên chính thức.</p>

<p>Bị từ chối: Thông tin đăng ký của bạn chưa hoàn thiện, hoặc thiếu những thông tin cần thiết, bạn có thể vào phần quản lý thông tin, <a href="home.php?mod=spacecp&ac=profile" target="_self">Hoàn thiện thông tin đăng ký</a>, sau đó bạn sẽ được duyệt.</p>

<p>Đã xóa: Thông tin yêu cầu đăng ký của bạn quá lớn, hoặc do số lượng thành viên đăng ký quá lớn khiến hệ thống lỗi. Ứng dụng đã bị từ chối hoàn toàn, tài khoản của bạn đã bị xóa khỏi dữ liệu, vui lòng không đăng nhập hoặc gửi thông tin. Hãy hiểu cho chúng tôi.</p>

<br />
<br />
Trân trọng<br />
<br />
Nhóm quản trị {bbname}.<br />
{siteurl}',

	'adv_expiration_subject' =>	'Quảng cáo của bạn sẽ hết hạn ngày {day}, vui lòng hồi đáp',
	'adv_expiration_message' =>	'Những quảng cáo dưới đây sẽ hết hạn sau {day} ngày nữa, hãy để ý thời gian để hồi đáp: <br /><br />{advs}',
	'invite_payment_email_message' => '
Chào mừng {bbname}({siteurl}), đơn hàng số {orderid} đã thanh toán thành công, đơn hàng đã hoàn thành.<br />
<br />----------------------------------------------------------------------<br />
Đây là mã mời mà bạn nhận được
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Quan trọng!
<br />----------------------------------------------------------------------<br />',
);

?>