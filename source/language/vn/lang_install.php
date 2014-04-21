<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php 28275 2012-02-27 04:14:58Z monkey $
 *      $Id: lang_install.php by Valery Votintsev, codersclub.org
 */

define('UC_VERNAME', 'International Version');
$lang = array(
	'SC_GBK' => 'SC GBK',
	'TC_BIG5' => 'TC BIG5',
	'SC_UTF8' => 'Tiếng Việt',
	'TC_UTF8' => 'TC UTF8',
	'EN_ISO' => 'ENGLISH ISO8859',
	'EN_UTF8' => 'ENGLIST UTF-8',

	'title_install' => 'Cài đặt '.SOFT_NAME.'',
	'agreement_yes' => 'Đồng ý',
	'agreement_no' => 'Hủy bỏ',
	'notset' => 'Không giới hạn',

	'message_title' => 'Thông báo',
	'error_message' => 'Có lỗi',
	'message_return' => 'Quay lại',
	'return' => 'Quay lại',
	'install_wizard' => 'Cài đặt Discuz X2.5',
	'config_nonexistence' => 'Tập tin cấu hình không tồn tại',
	'nodir' => 'Thư mục không tồn tại',
	'redirect' => 'Trình duyệt sẽ tự động chuyển sang trang mới.<br>Nếu trình duyệt của bạn không hỗ trợ hãy bấm vào đây.',
	'auto_redirect' => 'Trình duyệt sẽ tự động chuyển sang trang mới',
	'database_errno_2003' => 'Không thể kết nối với CSDL vui lòng kiểm tra địa chỉ máy chủ CSDL',
	'database_errno_1044' => 'Không thể tạo CSDL mới, hãy kiểm tra tên CSDL là chính xác',
	'database_errno_1045' => 'Không thể kết nối với CSDL vui lòng kiểm tra tài khoản hoặc mật khẩu CSDL',
	'database_errno_1064' => 'Lỗi kết nối CSDL',

	'dbpriv_createtable' => 'Ko thể CREATE TABLE để tiếp tục cài đặt',
	'dbpriv_insert' => 'Ko thể INSERT để tiếp tục cài đặt',
	'dbpriv_select' => 'Ko thể SELECT để tiếp tục cài đặt',
	'dbpriv_update' => 'Ko thể UPDATE để tiếp tục cài đặt',
	'dbpriv_delete' => 'Ko thể DELETE để tiếp tục cài đặt',
	'dbpriv_droptable' => 'Ko thể DROP TABLE để tiếp tục cài đặt',

	'db_not_null' => 'CSDL đã được cài đặt Ucenter, tiếp tục cài đặt sẽ xóa dữ liệu gốc.',
	'db_drop_table_confirm' => 'Tiếp tục cài đặt CSDL cũ sẽ bị xóa hết. Bạn có chắc chắn muốn tiếp tục ?',

	'writeable' => 'Có thể viết',
	'unwriteable' => 'Ko thể viết',
	'old_step' => 'Quay lại',
	'new_step' => 'Tiếp theo',

	'database_errno_2003' => 'Không thể kết nối với CSDL vui lòng kiểm tra địa chỉ máy chủ CSDL',
	'database_errno_1044' => 'Không thể tạo CSDL mới, hãy kiểm tra tên CSDL là chính xác',
	'database_errno_1045' => 'Không thể kết nối với CSDL vui lòng kiểm tra tài khoản hoặc mật khẩu CSDL',
	'database_connect_error' => 'Lỗi kết nối CSDL',

	'step_title_1' => 'Môi trường',
	'step_title_2' => 'Ucenter',
	'step_title_3' => 'CSDL',
	'step_title_4' => 'Cài đặt',
	'step_env_check_title' => 'Bắt đầu cài đặt',
	'step_env_check_desc' => 'Kiểm tra môi trường cài đặt',
	'step_db_init_title' => 'Cài đặt cơ sở dữ liệu',
	'step_db_init_desc' => 'Đang chạy trình cài đặt cơ sở dữ liệu',

	'step1_file' => 'Tập tin',
	'step1_need_status' => 'Yêu cầu',
	'step1_status' => 'Hiện tại',
	'not_continue' => 'Xin vui lòng sửa đổi theo yêu cầu',

	'tips_dbinfo' => 'Điền thông tin CSDL',
	'tips_dbinfo_comment' => '',
	'tips_admininfo' => 'Điền thông tin quản trị',
	'step_ext_info_title' => 'Cài đặt thành công',
	'step_ext_info_comment' => 'Nhấn vào đây để nhập thông tin đăng nhập',

	'ext_info_succ' => 'Cài đặt thành công',
	'install_submit' => 'Tiếp tục',
	'install_locked' => 'Cài đặt đã bị khóa, nếu bạn thực sự muốn cài đặt lại, hãy vào máy chủ xóa <br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg' => 'Bạn phải giải quyết vấn đề trên, để việc cài đặt có thể tiếp tục',

	'step_app_reg_title' => 'Thiết lập môi trường',
	'step_app_reg_desc' => 'Kiểm tra máy chủ và Ucenter',
	'tips_ucenter' => 'Điền thông tin Ucenter',
	'tips_ucenter_comment' => 'Nếu bạn đã cài đặt Ucenter thì hãy điền vào các thông tin dưới đây, nếu chưa cài đặt bạn có thể tải Ucenter tại <a href="http://www.discuz.com/" target="blank">Comsenz</a> hoặc <a href="http://www.discuz.vn/" target="blank">discuz.vn</a>',

	'advice_mysql_connect' => 'Kiểm tra chắc chắn các module mysql ko bị lỗi',
	'advice_gethostbyname' => 'Để cài đặt cần mở chức năng gethostbyname',
	'advice_file_get_contents' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt',
	'advice_xml_parser_create' => 'Chức năng này yêu cầu có hỗ trợ XML trong PHP',
	'advice_fsockopen' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt',
	'advice_pfsockopen' => 'Cần bật hàm allow_url_fopen',
	'advice_stream_socket_client' => 'Whether the prohibition in the PHP configuration the stream_socket_client function',
	'advice_curl_init' => 'Whether banned curl_init function in PHP configuration',

	'ucurl' => 'URL UCenter',
	'ucpw' => 'Mật khẩu',
	'ucip' => 'IP UCenter',
	'ucenter_ucip_invalid' => 'Định dạng lỗi, vui lòng điền đúng định dạng IP',
	'ucip_comment' => 'Thường thì không phải điền',

	'tips_siteinfo' => 'Xin vui lòng điền vào các thông tin trang web',
	'sitename' => 'Tên trang web',
	'siteurl' => 'URL trang web',

	'forceinstall' => 'Bắt buộc cài đặt',
	'dbinfo_forceinstall_invalid' => 'CSDL này đã chứa dữ liệu, để cài đặt bạn có thể sửa các bảng tiền tố hoặc cài đè nên dữ liệu cũ.',

	'click_to_back' => 'Quay lại',
	'adminemail' => 'Admin Email',
	'adminemail_comment' => 'Dùng để báo lỗi chương trình',
	'dbhost_comment' => 'Thường là localhost',
	'tablepre_comment' => 'Điền vào nếu mún phân biệt bảng khi cài nhiều diễn đàn',
	'forceinstall_check_label' => 'Tôi sẽ cài đè dữ liệu cũ',

	'uc_url_empty' => 'Bạn chưa điền URL Ucenter.',
	'uc_url_invalid' => 'URL không hợp lệ',
	'uc_url_unreachable' => 'Sai URL Ucenter, vui lòng kiểm tra',
	'uc_ip_invalid' => 'Không thể dùng tên miền, vui lòng điền IP',
	'uc_admin_invalid' => 'Sai mật khẩu Ucenter',
	'uc_data_invalid' => 'Sai thông tin, vui lòng kiểm tra URL Ucenter ',
	'uc_dbcharset_incorrect' => 'Mã font Ucenter không trùng với Discuz X1.5, vui lòng kiểm tra',
	'uc_api_add_app_error' => 'Thêm ứng dụng vài Ucenter ko thành công',
	'uc_dns_error' => 'DNS Ucenter lỗi vui lòng dùng IP',

	'ucenter_ucurl_invalid' => 'Sai URL Ucenter',
	'ucenter_ucpw_invalid' => 'Sai mật khẩu Ucenter',
	'siteinfo_siteurl_invalid' => 'URL trang web trống hoặc sai định dạng',
	'siteinfo_sitename_invalid' => 'Tên trang web trống, vui lòng kiểm tra',
	'dbinfo_dbhost_invalid' => 'Sai tên máy chủ CSDL',
	'dbinfo_dbname_invalid' => 'Sai tài khoản',
	'dbinfo_dbuser_invalid' => 'Sai tài khoản CSDL, vui lòng kiểm tra',
	'dbinfo_dbpw_invalid' => 'Sai mật khẩu CSDL, vui lòng kiểm tra',
	'dbinfo_adminemail_invalid' => 'Email trống, vui lòng kiểm tra',
	'dbinfo_tablepre_invalid' => 'Bảng tiền tố trống hoặc sai định dạng, vui lòng kiểm tra',
	'admininfo_username_invalid' => 'Tên tài khoản trống hoặc sai định dạng, vui lòng kiểm tra',
	'admininfo_email_invalid' => 'Email trống, vui lòng kiểm tra',
	'admininfo_password_invalid' => 'Mật khẩu trống, vui lòng kiểm tra',
	'admininfo_password2_invalid' => 'Hai mật khẩu không giống nhau.',

/*vot*/	'install_dzfull' => 'Cài mới cùng UCenter',
/*vot*/	'install_dzonly' => 'Cài với Ucenter sẵn có',

	'username' => 'Tài khoản',
	'email' => 'Email',
	'password' => 'Mật khẩu',
	'password_comment' => 'Điền vào mật khẩu',
	'password2' => 'Nhập lại',

	'admininfo_invalid' => 'Sai thông tin, vui lòng kiểm tra lại',
	'dbname_invalid' => 'Tên CSDL trống, vui lòng điền lại',
	'tablepre_invalid' => 'Sai tiền tố hoặc trống, vui lòng kiểm tra',
	'admin_username_invalid' => 'Tên tài khoản không đúng, tối đa là 15 ký tự và ko có ký tự đặc biệt',
	'admin_password_invalid' => 'Hai mật khẩu không giống nhau',
	'admin_email_invalid' => 'Email lỗi, email đã được sử dụng hoặc sai định dạng.',
	'admin_invalid' => 'Thông tin lỗi, hãy nhập cẩn thận từng mục',
	'admin_exist_password_error' => 'Tên người sử dụng đã tồn tại, nếu bạn muốn thiết lập quản trị diễn đàn này, vui lòng nhập đúng mật khẩu cho người dùng, hoặc thay thế tên của người quản trị diễn đàn',

	'tagtemplates_subject' => 'Tiêu đề',
	'tagtemplates_uid' => 'Số ID',
	'tagtemplates_username' => 'Tài khoản',
	'tagtemplates_dateline' => 'Ngày',
	'tagtemplates_url' => 'Địa chỉ chủ đề',

	'uc_version_incorrect' => 'Phiên bản Ucenter đã quá cũ bạn cần cập nhật bản mới tại ：http://www.comsenz.com/ hoặc http://wwww.discuz.vn',
	'config_unwriteable' => 'Ko cài đặt, bạn cần chmod tập tin config.inc.php = 0777',

	'install_in_processed' => 'Cài đặt ...',
	'install_succeed' => 'Cài đặt thành công, bấm vào đây để tiếp tục',
	'install_cloud' => 'Successful installation, welcomed the opening of the Discuz! Cloud platform <br> Powered by Discuz! Cloud platform is committed to help website owners increase traffic, enhance the ability of Web site operators to increase website revenue.<br>Discuz! Cloud platform is provided free of charge QQ Internet, Tencent, vertical and horizontal search, community QQ groups, roaming, SOSO expression services. Discuz! Cloud platform will continue to provide more quality services. <br> opened Discuz! platform, make sure your site (Discuz!, UCHome, or SupeSite) has been upgraded to Discuz! X2.5.',
	'to_install_cloud' => 'Opened to the background',
	'to_index' => 'Temporarily opened',

	'init_credits_karma' => 'Uy tín',
	'init_credits_money' => 'Tiền',

	'init_postno0' => 'Chủ thớt',
	'init_postno1' => 'Giật tem',
	'init_postno2' => 'Hạng 3',
	'init_postno3' => 'Hạng 4',

	'init_support' => 'Tốt',
	'init_opposition' => 'Kém',

	'init_group_0' => 'Thành viên',
	'init_group_1' => 'Quản trị viên',
	'init_group_2' => 'Siêu quản lý',
	'init_group_3' => 'Quản lý',
	'init_group_4' => 'Cấm phát ngôn',
	'init_group_5' => 'Cấm truy cập',
	'init_group_6' => 'Cấm IP',
	'init_group_7' => 'Khách',
	'init_group_8' => 'Chờ xác nhận',
	'init_group_9' => 'Khách/Chưa kích hoạt',
	'init_group_10' => 'Thành viên mới',
	'init_group_11' => 'Thành viên',
	'init_group_12' => 'Thành viên năng nổ',
	'init_group_13' => 'Thành viên nhiệt tình',
	'init_group_14' => 'Thành viên sáng giá',
	'init_group_15' => 'Thành viên gắn bó',

	'init_rank_1' => 'Tập viết',
	'init_rank_2' => 'Học sinh',
	'init_rank_3' => 'Sinh viên',
	'init_rank_4' => 'Tiến sĩ',
	'init_rank_5' => 'Giáo sư',

	'init_cron_1' => 'Xóa hết bài hôm nay',
	'init_cron_2' => 'Xóa thời gian online trong tháng',
	'init_cron_3' => 'Xóa hết dữ liệu ngày',
	'init_cron_4' => 'Thống kê email mừng sinh nhật',
	'init_cron_5' => 'Trả lời thông báo',
	'init_cron_6' => 'Xóa hết thông báo',
	'init_cron_7' => 'Xóa hết kế hoạch',
	'init_cron_8' => 'Làm sạch thúc đẩy diễn đàn',
	'init_cron_9' => 'Xóa hết chủ đề của tháng',
	'init_cron_10' => 'Cập nhật X-Space hàng ngày',
	'init_cron_11' => 'Chủ đề cập nhật hàng tuần',

	'init_bbcode_1' => 'Marquee',
	'init_bbcode_2' => 'Chèn Flash',
	'init_bbcode_3' => 'QQ',
	'init_bbcode_4' => 'Sup',
	'init_bbcode_5' => 'Sub',
	'init_bbcode_6' => 'Chèn file âm thanh',
	'init_bbcode_7' => 'Chèn file video',

	'init_qihoo_searchboxtxt' =>'Nhập từ khóa, Tìm nhanh diễn đàn này',
	'init_threadsticky' =>'Chú ý, Phân loại, Chú ý',

	'init_default_style' => 'Phong cách mặc định',
	'init_default_forum' => 'Diễn đàn mặc định',
	'init_default_template' => 'Mẫu mặc định',
	'init_default_template_copyright' => 'Comsenz (Bắc Kinh)',

	'init_dataformat' => 'j-n-Y',
	'init_modreasons' => 'Quảng cáo/SPAM\r\nVirus\r\nKhông dấu\r\nLạc đề\r\nTrùng bài\r\n\r\nĐồng tình\r\nBài hay\r\nTinh hoa',
	'init_userreasons' => 'Quảng cáo\r\nSPAM\r\nSEX\r\nLạc đề\r\nPhạm quy\r\n\r\nĐồng tình\r\nBài hay\r\nNguyên tác',
	'init_link' => 'Discuz! Diễn đàn chính thức thiết lập và trao đổi kỹ thuật',
	'init_link_note' => 'Cung cấp Discuz mới nhất! Tin tức sản phẩm, tải về và trao đổi kỹ thuật',

	'init_promotion_task' => 'Nhiệm vụ thưởng',
	'init_gift_task' => 'Nhiệm vụ nhận quà',
	'init_avatar_task' => 'Nhiệm vụ avatar',

	'license' => '<div class="license"><h1>Giấy phép thỏa thuận</h1>

<p>Copyright (c) 2001-2010, Hong Sing Imagination (Beijing) Technology Co., Ltd. All rights reserved.</p>

<p>Thank you for choosing Discuz! forum product. We hope that our product will be able to provide you with a fast, efficient and powerful community forum solution.</p>

<p>Discuz! English full name Crossday Discuz! Board, Chinese full name Discuz! Forum, hereinafter referred to as Discuz!.</p>
<p>Sing Imagination (Beijing) Technology Co., Ltd. for the Discuz! product developers, and they shall have Discuz! Product Copyright (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, Discuz! Official website address is http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>
<p>Discuz! copyright has been registered in The People\'s Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using Discuz! software.</p>

<p>This License applies and only applies Discuz! X version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3>I. Licensing agreement rights</h3>
<ol>
<li>You can fully comply with the end user license agreement, based on the software used in this non-commercial use, without having to pay for software copyright licensing fees.</Li>
<li>Agreement you can within the constraints and limitations modify Discuz! source code (if provided) or interface styles to suit your site requirements.</Li>
<li>You have to use this software to build the forum all the membership information, articles and related information of ownership, and is independent of commitment and legal obligations related to the article content.</Li>
<li>A commercial license, you can use this software for commercial applications, while according to the type of license purchased to determine the period of technical support, technical support, technical support form and content, from the moment of purchase, within the period of technical support have a way to get through the specified designated areas of technical support services. Business authorized users have the power to reflect and comment, relevant comments will be a primary consideration, but not necessarily be accepted promise or guarantee.</Li>
</ol>

<h3>II. Agreement constraints and limitations</h3>
<ol>
<li>Business license has not been before, may not use this software for commercial purposes (including but not limited to business sites, business operations, for commercial purpose or profit web site). Purchase of commercial license, please visit http://www.discuz.com reference instructions, call 8610-51657885 for more details.</Li>
<li>May not associated with the software or business license for rental, sale, mortgage or grant sub-licenses.</Li>
<li>In any case, that no matter how used, whether modified or landscaping, changes to what extent, just use Discuz! the whole or any part, without the written permission of the Forum page footer Department Discuz! name and Sing Imagination (Beijing) Technology Co., Ltd. affiliated website (http://www.comsenz.com, http://www.discuz.com or http://www.discuz.net) the link must be retained, not removed or modified .</Li>
<li>Prohibited Discuz! the whole or any part of the basis for the development of any derivative version, modified version or third-party version for redistribution.</Li>
<li>If you failed to comply with the terms of this Agreement, your license will be terminated, the licensee rights will be recovered, and bear the corresponding legal responsibility.</Li>
</ol>

<h3>III. Limited Warranty and Disclaimer</h3>
<ol>
<li>The software and the accompanying documents as not to provide any express or implied, or guarantee in the form of compensation provided.</li>
<li>User voluntary use of this software, you must understand the risks of using this software, technical services in the not to buy products before, we do not promise to provide any form of technical support, use of guarantees, nor liable for any use of this software issues related to liability arising.</li>
<li>Hong Sing Company does not use the software to build a website or forum post or liable for the information, you assume full responsibility.</li>
<li>Hong Sing company provides software and services in a timely manner, security, accuracy is not guaranteed, due to force majeure, Hong Sing factors beyond the control of the company (including hacker attacks, stopping power, etc.) caused by software and services Suspension or termination, and give your losses, you agree to Sing corporate responsibility waiver of all rights.</li>
<li>Hong Sing Company specifically draw your attention to Hong Sing Company in order to protect business development and adjustment of autonomy, Hong Sing Company has at any time with or without prior notice to modify the service content, suspend or terminate some or all of the rights of software and services , changes will be posted on the relevant pages of Sing website, including without notice. Hong Sing Company to modify or discontinue the exercise, termination of some or all of the rights of software and services resulting from the loss, without Hong Sing Company to you or any third party.
</li>
</ol>


<p>Hong Sing products on the end user license agreement, business license and technical services to the details provided by the Hong Sing exclusive. Sing the company has without prior notice, modify the license agreement and services price list right to the modified agreement or price list from the change of the date of the new authorized user to take effect.</p>

<p>Once you start the installation Hong Sing products, shall be deemed to fully understand and accept the terms of this Agreement, the terms in the enjoyment of the rights granted at the same time, by the relevant constraints and restrictions. Licensing agreement outside the scope of acts would be a direct violation of this License Agreement and constitute an infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and retain the power to investigate related responsibilities.</p>

<p>The interpretation of the terms of the license agreement, validity, and dispute resolution, applicable to the mainland People\'s Republic of law.</p>

<p>Between Hong Sing if you and any dispute or controversy, should first be settled through friendly consultations, the consultation fails, you hereby agree to submit the dispute or controversy Sing Haidian District People\'s Court where jurisdiction. Hong Sing Company has the right to interpret the above terms and discretion.</p>

<p align="right">康盛公司</p>

</div>',

	'uc_installed' => 'Bạn đã cài đặt UCenter, nếu bạn muốn cài đặt lại vui lòng xóa tập tin data/install.lock',
	'i_agree' => 'Tôi đã đọc và đồng ý với các điều khoản',
	'supportted' => 'Hỗ trợ',
	'unsupportted' => 'Ko hỗ trợ',
	'max_size' => 'Hỗ trợ/Tối đa',
	'project' => 'Dự án',
	'ucenter_required' => 'Yêu cầu',
	'ucenter_best' => 'Discuz! X2.0',
	'curr_server' => 'Hiện tại',
	'env_check' => 'Kiểm tra',
	'os' => 'OS',
	'php' => 'Bản PHP',
	'attachmentupload' => 'Đính kèm',
	'unlimit' => 'Không giới hạn',
	'version' => 'Phiên bản',
	'gdversion' => 'Bản GD',
	'allow' => 'Hỗ trợ',
	'unix' => 'Unix',
	'diskspace' => 'Đĩa cứng',
	'priv_check' => 'Thư mục, tập tin',
	'func_depend' => 'Kiểm tra',
	'func_name' => 'Tên',
	'check_result' => 'Kết quả',
	'suggestion' => 'Khuyến nghị',
	'advice_mysql' => 'Kiểm tra chắc chắn các module mysql ko bị lỗi',
	'advice_fopen' => 'Chức năng này yêu cầu mở hàm allow_url_fopen trong php.ini.',
	'advice_file_get_contents' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt',
	'advice_xml' => 'Chức năng này yêu cầu có hỗ trợ XML trong PHP',
	'none' => 'Không có gì',

	'dbhost' => 'Máy chủ CSDL',
	'dbuser' => 'Tài khoản CSDL',
	'dbpw' => 'Mật khẩu CSDL',
	'dbname' => 'Tên CSDL',
	'tablepre' => 'Tiền tố',

	'ucfounderpw' => 'Mật khẩu',
	'ucfounderpw2' => 'Nhập lại',

	'init_log' => 'Khởi tạo Log',
	'clear_dir' => 'Thư mục trống',
	'select_db' => 'Chọn CSDL',
	'create_table' => 'Tạo bảng',
	'succeed' => 'Thành công ',

	'install_data' => 'Dữ liệu đang được cài đặt',
	'install_test_data' => 'Các dữ liệu đang được cài đặt',

	'method_undefined' => 'Không xác định phương pháp',
	'database_nonexistence' => 'CSDL không tồn tại',
	'skip_current' => 'Bỏ qua bước này',
	'topic' => 'Chủ đề',

//---------------------------------------------------------------
// Added by Valery Votintsev
// 2 vars for language select:
	'welcome'			=> 'Welcome to Discuz! X Installation!',//'欢迎到Discuz！ X安装！',
	'select_language'		=> '<b>Select the installation language</b>:',//'<b>选择安装语言</b>',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',
	'mbstring'			=> 'MBstring Library',//'MBstring 库',

//---------------------------------------------------------------

);

$msglang = array(
	'config_nonexistence' => 'Tập tin cấu hình config.inc.php không tồn tại.',
);

