<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_connect.php 22869 2011-05-27 09:27:31Z fengning $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(

	'feed_sync_success' => 'Đồng bộ Feed thành công',
	'deletethread_sync_success' => 'Xóa chủ đề đồng bộ hóa thành công',
	'deletethread_sync_failed' => 'Xóa chủ đề đồng bộ hóa thất bại',
	'server_busy' => 'Xin lỗi máy chủ đang bận, hãy thử lại sau!',
	'share_token_outofdate' => '为了您的账号安全，请使用QQ帐号重新登录，将为您升级帐号安全机制<br/><br/>点击<a href={login_url}><img src=static/image/common/qq_login.gif class=vm alt=QQ登录 /></a>页面将发生跳转',
	'share_success' => 'Chia sẻ thành công',
	'broadcast_success' => 'Quảng bá thành công',

	'qzone_title' => 'Tiêu đề',
	'qzone_reason' => 'Lý do',
	'qzone_picture' => 'Hình ảnh',
	'qzone_shareto' => 'Không gian chia sẻ',
	'qzone_to_friend' => 'Chia sẻ với bạn bè',
	'qzone_reason_default' => 'Có thể nhập vào lý do hoặc các chi tiết để chia sẻ',
	'qzone_subject_is_empty' => 'Tiêu đề chia sẻ không thể để trống',
	'qzone_subject_is_long' => 'Tiêu đề vượt quá giới hạn',
	'qzone_reason_is_long' => 'Lý do vượt quá giới hạn',
	'qzone_share_same_url' => '该帖子您已经分享过，不需要重复分享',

	'weibo_title' => 'Để chia sẻ microblogging của tôi, bằng cách nói một điều gì đó',
	'weibo_input' => 'Có thể nhập <strong id=checklen></strong> từ',
	'weibo_select_picture' => 'Xin vui lòng chọn hình ảnh chia sẻ',
	'weibo_share' => 'Chia sẻ',
	'weibo_share_to' => 'Chia sẻ Microblogging',
	'weibo_reason_is_long' => 'Microblogging nội dung vượt quá giới hạn độ dài',
	'weibo_same_content' => '该帖子您已经转播过，不需要重复转播',
	'weibo_account_not_signup' => 'Có lỗi, tài khoản của bạn chưa được mở microblogging, không thể chia sẻ nội dung <a href=http://t.qq.com/reg/index.php target=_blank>Click vào đây để mở ngay lập tức</a>.',
	'user_unauthorized' => 'Có lỗi, bạn không được phép chia sẻ các chủ đề không gian các QQ, Tencent, Tencent vi-Bo và bạn bè.',
		
	'connect_errlog_server_no_response' => 'Server không đáp ứng',
	'connect_errlog_access_token_incomplete' => 'Có lỗi giao diện - AccessToken',
	'connect_errlog_request_token_not_authorized' => 'TMP Có lỗi hoặc dữ liệu không đầy đủ',
	'connect_errlog_sig_incorrect' => 'URL chữ ký không chính xác',

	'connect_tthread_broadcast' => '转播微博',
	'connect_tthread_message' => '<br><br><img class="vm" src="static/image/common/weibo.png">&nbsp;<a href="http://t.qq.com/{username}" target="_blank">来自 {nick} 的腾讯微博</a>',
	'connect_tthread_comment' => '微博评论',
);

?>