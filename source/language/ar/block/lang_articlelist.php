<?php

/**---
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_articlelist.php by Valery Votintsev at sources.ru
 *      Arabic by Khalid El-Nahhal, http://www.ar-discuz.com
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'articlelist_aids'			=> 'مقالات محددة',//'指定文章',
	'articlelist_aids_comment'		=> 'الرجاء إدخال أرقام المقالات المحددة (aid). إستخدم (,) للفصل بين المقالات',//'填入指定文章的ID(aid)，多篇文章之间用逗号(,)分隔',
	'articlelist_uids'			=> 'أرقام الكتاب',//'作者UID',
	'articlelist_uids_comment'		=> 'الرجاء تحديد ارقام الاعضاء المعينين (uid). إستخدم (,) للفصل بين الأعضاء',//'填入指定用户的ID(uid)，多个用户之间用逗号(,)分隔',
	'articlelist_startrow'			=> 'صف البدء',//'起始数据行数',
	'articlelist_startrow_comment'		=> 'إذا كنت بحاجة لتعيين صف البدء,الرجاء إدخال الرقم, 0 هو الصف الأول',//'如需设定起始的数据行数，请输入具体数值，0 为从第一行开始，以此类推',
	'articlelist_tag'			=> 'الكلمات الدلالية المتعلقة',//'聚合标签',
	'articlelist_tag_comment'		=> 'Specify the aggregated tags',//'指定要聚合的标签',
	'articlelist_titlelength'		=> 'طول العنوان',//'标题长度',
	'articlelist_titlelength_comment'	=> 'حدد الحد الأقصى من طول العنوان',//'设置标题最大长度',
	'articlelist_summarylength'		=> 'طول الملخص',//'简介长度',
	'articlelist_summarylength_comment'	=> 'حدد الحد الأقصى من طول الملخص',//'设置简介最大长度',
	'articlelist_starttime'			=> 'وقت النشر - البدء',//'发布时间-起始',
	'articlelist_starttime_comment'		=> 'For articles published after the specified period of time',//'文章的发布时间在指定时间之后',
	'articlelist_endtime'			=> 'وقت النشر - الإنتهاء',//'发布时间-结束',
	'articlelist_endtime_comment'		=> 'For articles published before the specified period of time',//'文章的发布时间在指定时间之前',
	'articlelist_catid'			=> 'قسم المقالة',//'文章栏目',
	'articlelist_catid_comment'		=> 'تحديد قسم المقالة',//'选择文章所属栏目',
	'articlelist_picrequired'		=> 'تصفية الصور',//'过滤无封面文章',
	'articlelist_picrequired_comment'	=> 'تصفية المقالات التي ليس لديها غلاف',//'是否过滤未设置封面图片的文章',
	'articlelist_orderby'			=> 'ترتيب حسب',//'文章排序方式',
	'articlelist_orderby_comment'		=> 'تعيين نوع الترتيب',//'设置以哪一字段或方式对文章进行排序',
	'articlelist_orderby_dateline'		=> 'وقت النشر',//'按发布时间倒序',
	'articlelist_orderby_viewnum'		=> 'المشاهدات',//'按查看数倒序',
	'articlelist_orderby_commentnum'	=> 'التعليقات',//'按评论数倒序',
	'articlelist_orderby_click'		=> 'عدد "{clickname}", الوصف',//'按表态 {clickname} 数倒序',
	'articlelist_publishdateline'		=> 'وقت نشر المقالة',//'文章发布时间',
	'articlelist_publishdateline_nolimit'	=> 'غير محدود',
	'articlelist_publishdateline_hour'	=> '1 ساعة',
	'articlelist_publishdateline_day'	=> 'يوم',
	'articlelist_publishdateline_week'	=> 'أسبوع',
	'articlelist_publishdateline_month'	=> 'شهر',
	'articlelist_keyword'			=> 'الكلمات الدلالية',
	'articlelist_keyword_comment'		=> 'حدد الكلمات دلالية المستعملة في العناوين. ملاحظة: أتركه فارغ لعدم التصفية. يمكنك استعمال  * ',//'设置标题包含的关键字。注意: 留空为不进行任何过滤； 关键字中可使用通配符 *； 匹配多个关键字全部，可用空格或 AND 连接。如 win32 AND unix； 匹配多个关键字其中部分，可用 | 或 OR 连接。如 win32 OR unix',
);

