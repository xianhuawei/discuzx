<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_attachmentlist.php by Valery Votintsev at sources.ru
 *      Arabic by Khalid El-Nahhal, http://www.ar-discuz.com
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'attachmentlist_name'			=> 'قائمة المرفقات',//'论坛附件列表',
	'attachmentlist_desc'			=> 'إظهار قائمة المرفقات',//'论坛附件列表调用',
	'attachmentlist_fids'			=> 'المنتديات',//'所在版块',
	'attachmentlist_fids_comment'		=> 'أدخل المنتديات المستدعاه, يمكنك إستخدام زر CTRL للتحديد بشكل معتعدد',//'设置允许参与图片调用的版块，可以按住 CTRL 多选，全选或全不选均为不做限制',
	'attachmentlist_tids'			=> 'مواضيع محددة',//'指定主题',
	'attachmentlist_tids_comment'		=> 'حدد أرقام المواضيع, إستخدم علامة الفاصلة للمتعدد',//'指定主题ID，多个ID之间用逗号分隔',
	'attachmentlist_startrow'		=> 'صف البدء',//'起始数据行数',
	'attachmentlist_startrow_comment'	=> 'إذا كنت بحاجة لتعيين صف البدء,الرجاء إدخال الرقم, 0 هو الصف الأول',//'如需设定起始的数据行数，请输入具体数值，0 为从第一行开始，以此类推',
	'attachmentlist_items'			=> 'الصفوف',//'显示数据条数',
	'attachmentlist_items_comment'		=> 'حدد عدد الصفوف التي تريد عرضها , يجب أن تكون أكبر من 0',//'设置一次显示的图片主题条目数，请设置为大于 0 的整数',
	'attachmentlist_titlelength'		=> 'طول العنوان',//'标题长度',
	'attachmentlist_titlelength_comment'	=> 'حدد الحد الأقصى لطول عنوان الملف المرفق/المشاركة',//'设置当附件名称/帖子标题显示的最大长度',
	'attachmentlist_summarylength'		=> 'طول الملخص',//'内容长度',
	'attachmentlist_summarylength_comment'	=> 'الحد الأقصى لطول الملخص',//'设置附件介绍/帖子内容显示的最大长度',
	'attachmentlist_maxwidth'		=> 'الحد الأقصى من عرض الصورة, بالبيكسل',//'图片最大宽度(像素)',
	'attachmentlist_maxwidth_comment'	=> 'حدد الحد الأقصى من حجم الصورة لتقريب العرض تلقائي, ضع 0 لتعطيل التقريب',//'设置是否自动缩小或放大图片的尺寸到本设定的宽度，0 为不自动缩放',
	'attachmentlist_maxheight'		=> 'الحد الأقصى من طول الصورة, بالبيكسل',//'图片最大高度(像素)',
	'attachmentlist_maxheight_comment'	=> 'حدد الحد الأقصى من حجم الصورة لتقريب الطول تلقائياً , ضع 0 لتعطيل التقريب',//'设置是否自动缩小或放大图片的尺寸到本设定的高度，0 为不自动缩放',
	'attachmentlist_threadmethod'		=> 'وضع الموضوع',//'主题方式调用',
	'attachmentlist_threadmethod_comment'	=> 'ضع &quot;نعم&quot; لإظهار المرفقات في وضع موضوع (في كل موضوع مرفق واحد), أو &quot;لا&quot; لإظهار المرفقات في وضع المرفقات.',//'选择“是”将按照主题方式调用附件，一个主题显示一个附件；选择“否”将按照附件方式调用',
	'attachmentlist_digest'			=> 'تصفية حسب التمييز',//'精华帖过滤',
	'attachmentlist_digest_comment'		=> 'Select specific thread range. Note: Select All or None for disable filtering',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'attachmentlist_digest_0'		=> 'موضوع عادي',//'普通主题',
	'attachmentlist_digest_1'		=> 'مميز 1',//'精华 I',
	'attachmentlist_digest_2'		=> 'مميز 2',//'精华 II',
	'attachmentlist_digest_3'		=> 'مميز 3',//'精华 III',
	'attachmentlist_special'		=> 'تصفية حسب المواضيع الخاصة',//'特殊主题过滤',
	'attachmentlist_special_comment'	=> 'Select specific thread range. Note: Select All or None for disable filtering',//'设置特定的主题范围。注意: 全选或全不选均为不进行任何过滤',
	'attachmentlist_special_1'		=> 'موضوع إستطلاع',//'投票主题',
	'attachmentlist_special_2'		=> 'موضوع منتج',//'商品主题',
	'attachmentlist_special_3'		=> 'موضوع طلب',//'悬赏主题',
	'attachmentlist_special_4'		=> 'موضوع فعالية',//'活动主题',
	'attachmentlist_special_5'		=> 'موضوع تحدي',//'辩论主题',
	'attachmentlist_special_0'		=> 'موضوع عام',//'普通主题',
	'attachmentlist_special_reward'		=> 'تصفية حسب الطلب',//'悬赏主题过滤',
	'attachmentlist_special_reward_comment'	=> 'حدد حالة الطلب',//'设置特定类型的悬赏主题',
	'attachmentlist_special_reward_0'	=> 'الكل',//'全部',
	'attachmentlist_special_reward_1'	=> 'إنتهى',//'已解决',
	'attachmentlist_special_reward_2'	=> 'نشيط',//'未解决',
	'attachmentlist_dateline'		=> 'وقت الرفع',//'附件上传时间',
	'attachmentlist_dateline_nolimit'	=> 'غير محدد',//'不限制',
	'attachmentlist_dateline_hour'		=> 'منذ ساعة',//'最近1小时',
	'attachmentlist_dateline_day'		=> 'منذ يوم',//'最近24小时',
	'attachmentlist_dateline_week'		=> 'منذ أسبوع',//'最近1周',
	'attachmentlist_dateline_month'		=> 'منذ شهر',//'最近1月',
	'attachmentlist_highlight'		=> 'تسليط الضوء على القيمة التي تم الحصول عليها',

);

