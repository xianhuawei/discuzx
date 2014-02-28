<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: helper_util.php 29887 2012-05-02 07:36:50Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class helper_util {

	/**
	 * 运算
	 * @param mixed $v1 value1
	 * @param mixed $v2 value2
	 * @param string $glue 操作符
	 * @return mixed 结果值
	 */
	public static function compute($v1, $v2, $glue = '+') {
		switch ($glue) {
			case '+':
				return $v1 + $v2;
				break;
			case '-':
				return $v1 - $v2;
				break;
			case '.':
				return $v1 . $v2;
				break;
			case '=':
			case '==':
				return $v1 == $v2;
				break;
			case 'merge':
				return array_merge((array)$v1, (array)$v2);
				break;
			case '===':
				return $v1 === $v2;
				break;
			case '!==':
				return $v1 === $v2;
				break;
			case '&&':
				return $v1 && $v2;
				break;
			case '||':
				return $v1 && $v2;
				break;
			case 'and':
				return $v1 and $v2;
				break;
			case 'xor':
				return $v1 xor $v2;
				break;
			case '|':
				return $v1 | $v2;
				break;
			case '&':
				return $v1 & $v2;
				break;
			case '^':
				return $v1 ^ $v2;
				break;
			case '>':
				return $v1 > $v2;
				break;
			case '<':
				return $v1 < $v2;
				break;
			case '<>':
				return $v1 <> $v2;
				break;
			case '!=':
				return $v1 != $v2;
				break;
			case '<=':
				return $v1 <= $v2;
				break;
			case '>=':
				return $v1 >= $v2;
				break;
			case '*':
				return $v1 * $v2;
				break;
			case '/':
				return $v1 / $v2;
				break;
			case '%':
				return $v1 % $v2;
				break;
			case 'or':
				return $v1 or $v2;
				break;
			case '<<':
				return $v1 << $v2;
				break;
			case '>>':
				return $v1 >> $v2;
				break;
			default:
				return null;
		}
	}

	/**
	 * 单操作符运算
	 * @param mixed $v1 value
	 * @param string $glue 操作符
	 * @return mixed 结果
	 */
	public static function single_compute($v, $glue = '+') {
		switch ($glue) {
			case '!':
				return ! $v;
				break;
			case '-':
				return - $v;
				break;
			case '~':
				return ~ $v;
				break;
			default:
				return null;
				break;
		}
	}
	public static function check_glue($glue = '=') {
		return in_array($glue, array('=', '<', '<=', '>', '>=', '!=', '+', '-', '|', '&', '<>')) ? $glue : '=';
	}

}

?>