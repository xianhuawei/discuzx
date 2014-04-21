<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_member.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'member_name'				=> 'Пользовательские Задачи',
	'member_desc'				=> 'Добавление в Избранное, использование магии. Данные стимулируют активность пользователя на сайте и побуждают других участников к более активном действиям на сайте.',
	'member_complete_var_act'		=> 'Действие',
	'member_complete_var_act_favorite'	=> 'Добавление темы в избранное',
	'member_complete_var_act_magic'		=> 'Использование магии',
	'member_complete_var_act_userapp'	=> 'Добавить приложение',//'添加漫游应用',
	'member_complete_var_num'		=> 'Минимальное количество выполнений',
	'member_complete_var_num_comment'	=> 'Пользователь должен выполнить указанное действие не менее указанного количества раз.',
	'member_complete_var_time'		=> 'Лимит времени (в часах)',
	'member_complete_var_time_comment'	=> 'Укажите период времени, в течение которого необходимо выполнить указанные действия. Если пользователь не выполнил задачу в указанное время, то бонус ему не полагается, а задача помечается как "невыполненная". Укажите ноль (или пусто) для использования без временных ограничений.',

	'task_complete_time_start'		=> 'Время для выполнения задачи:',
	'task_complete_time_limit'		=> '{value} часов, ',
	'task_complete_act_favorite'		=> 'Добавлено в избранное: {value} тем.',
	'task_complete_act_magic'		=> 'Использована магия: {value} раз.',
	'task_complete_act_userapp'		=> 'Добавлено {value} приложений',//'添加 {value} 个漫游应用',
);

