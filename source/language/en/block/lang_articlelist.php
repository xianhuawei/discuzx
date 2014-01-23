<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_articlelist.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'articlelist_aids'			=> 'Specified articles',//'指定文章',
	'articlelist_aids_comment'		=> 'Please fill in specific articles ID (aid). Use comma (,) to separate articles',//'填入指定文章的ID(aid)，多篇文章之间用逗号(,)分隔',
	'articlelist_uids'			=> 'Author UID',//'作者UID',
	'articlelist_uids_comment'		=> 'Please fill in specific users ID (uid). Use a comma (,) to separate users',//'填入指定用户的ID(uid)，多个用户之间用逗号(,)分隔',
	'articlelist_startrow'			=> 'Start Row',//'起始数据行数',
	'articlelist_startrow_comment'		=> 'If you need to set start row, please enter a number. Set to 0 for the first row',//'如需设定起始的数据行数，请输入具体数值，0 为从第一行开始，以此类推',
	'articlelist_tag'			=> 'Aggregated Tags',//'聚合标签',
	'articlelist_tag_comment'		=> 'Specify the aggregated tags',//'指定要聚合的标签',
	'articlelist_titlelength'		=> 'Title length',//'标题长度',
	'articlelist_titlelength_comment'	=> 'Set the max length of title',//'设置标题最大长度',
	'articlelist_summarylength'		=> 'Summary length',//'简介长度',
	'articlelist_summarylength_comment'	=> 'Set the max length of summary',//'设置简介最大长度',
	'articlelist_starttime'			=> 'Publish time - start',//'发布时间-起始',
	'articlelist_starttime_comment'		=> 'For articles published after the specified period of time',//'文章的发布时间在指定时间之后',
	'articlelist_endtime'			=> 'Publish time - end',//'发布时间-结束',
	'articlelist_endtime_comment'		=> 'For articles published before the specified period of time',//'文章的发布时间在指定时间之前',
	'articlelist_catid'			=> 'Article category',//'文章栏目',
	'articlelist_catid_comment'		=> 'Select the article category',//'选择文章所属栏目',
	'articlelist_picrequired'		=> 'Image filter',//'过滤无封面文章',
	'articlelist_picrequired_comment'	=> 'Filter the article without a cover',//'是否过滤未设置封面图片的文章',
	'articlelist_orderby'			=> 'Ordered by',//'文章排序方式',
	'articlelist_orderby_comment'		=> 'Set the ordering of articles',//'设置以哪一字段或方式对文章进行排序',
	'articlelist_orderby_dateline'		=> 'Post time',//'按发布时间倒序',
	'articlelist_orderby_viewnum'		=> 'Views',//'按查看数倒序',
	'articlelist_orderby_commentnum'	=> 'Comments',//'按评论数倒序',
	'articlelist_orderby_click'		=> 'Number of "{clickname}", desc',//'按表态 {clickname} 数倒序',
	'articlelist_publishdateline'		=> 'Article Publish Time',//'文章发布时间',
	'articlelist_publishdateline_nolimit'	=> 'Any time',//'不限制',
	'articlelist_publishdateline_hour'	=> 'Last Hour',//'1小时内',
	'articlelist_publishdateline_day'	=> 'Last Day',//'24小时内',
	'articlelist_publishdateline_week'	=> 'Last Week',//'7天内',
	'articlelist_publishdateline_month'	=> 'Last Month',//'1个月内',
	'articlelist_keyword'			=> 'Article Keywords',//'标题关键字',
	'articlelist_keyword_comment'		=> 'Set the keywords contained in the title. Note: Leave blank for no filtering. Keywords can use wildcards *; For search keywords with "AND" condition, separate it by space or "AND". i.e. "win32 AND unix". For match keywords with "OR" condition use | or "OR" separator, i.e. "win32 OR unix"',//'设置标题包含的关键字。注意: 留空为不进行任何过滤； 关键字中可使用通配符 *； 匹配多个关键字全部，可用空格或 AND 连接。如 win32 AND unix； 匹配多个关键字其中部分，可用 | 或 OR 连接。如 win32 OR unix',
);

