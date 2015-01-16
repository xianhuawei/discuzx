<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_card.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class card{

	var $set = array();
	// @代表英文大写字符，#代表数字，*代表任意英文与数字
	var $rulekey = array("str"=>"\@", "num"=>"\#", "full"=>"\*");
	var $sysrule = '';
	var $rule = '';
	var $rulemap_str = "ABCDEFGHIJKLMNPQRSTUVWXYZ"; //英文字母取消O
	var $rulemap_num = "123456789";//数字取消0

	//解析完毕的规则
	var $rulereturn = array();
	//返回卡片列表，生成日志或单个生成返回卡片号时需要
	var $cardlist = array();

	//X 成功与重复失败记录数字
	var $succeed = 0;
	var $fail = 0;
	//最小重复数
	var $failmin = 1;
	//错误概率
	var $failrate = '0.1';


	function card() {
		$this->init();
	}

	function init() {
		global $_G;
		$this->set = &$_G['setting']['card'];
		$this->sysrule = "^[A-Z0-9".implode('|', $this->rulekey)."]+$";
	}

	/**
	* 卡片生成
	* @param $rule - 字符串 卡片生成规则
	* @param $num - 整数 卡片生成规则
	* $param $cardval - 数组 卡片的其他属性
	* @return 返回转义好的字符串
	* return:
	*        '-1' 规则不存在
	*        true 成功
	*/
	function make($rule = '', $num = 1, $cardval = array()) {
		global $_G;
		$this->rule = empty($rule) ? $this->set['rule'] : trim($rule) ;
		if(empty($this->rule)) {
			return -1;
		}
		$this->fail($num);
		$cardval['makeruid'] = $_G['uid'];
		$cardval['dateline'] = $_G['timestamp'];
		for($i = 0; $i < $num ; $i++) {
			//解析卡片随机规则生成卡片号码
			if($this->checkrule($this->rule)) {
				$card = $this->rule;
				foreach($this->rulereturn AS $key => $val) {
					$search = array();
					foreach($val AS $skey => $sval) {
						$search[] = '/'.$this->rulekey[$key].'/';
					}
					$card =  preg_replace($search, $val, $card, 1);
				}
			} else {
				return 0;
			}
			$cardval['id'] = $card;
			C::t('common_card')->insert($cardval, false, false, 'SILENT');
			if(($sqlerror = DB::error())) {
				if($sqlerror == 1062) {
					//存在重复卡片时，错误数累加
					$this->fail++;
					if($this->failmin > $this->fail) {
						$num++;
					} else {
						$num = $i - 1;
					}
				}/* else {
					DB::halt($sqlerror, $sql);
				}*/
			} else {
				//成功后，将卡片放入卡片列表
				$this->succeed += intval(DB::affected_rows());
				$this->cardlist[] = $card;
			}
		}
		return true;
	}


	/**
	* 卡片规则检查与随机字串生成
	* @param $rule - 字符串
	* @param $type - 验证模式 0:非验证模式，1:验证模式
	* @$this->rulereturn 返回生成好的随机串数组
	* return:
	*        '-2' 规则中有非法字符
	*/
	function checkrule($rule, $type = '0') {
		if(!preg_match("/($this->sysrule)/i", $rule)){
			return -2;
		}
		if($type == 0) {
		//卡片随机规则
			foreach($this->rulekey AS $key => $val) {
				$match = array();
				preg_match_all("/($val){1}/i", $rule, $match);
				$number[$key] = count($match[0]);
				if($number[$key] > 0) {
					for($i = 0; $i < $number[$key]; $i++) {
						switch($key) {
						case 'str':
							$rand = mt_rand(0, (strlen($this->rulemap_str) - 1));
							$this->rulereturn[$key][$i] = $this->rulemap_str[$rand];
							break;
						case 'num':
							$rand = mt_rand(0, (strlen($this->rulemap_num) - 1));
							$this->rulereturn[$key][$i] = $this->rulemap_num[$rand];
							break;
						case 'full':
							$fullstr = $this->rulemap_str.$this->rulemap_num;
							$rand = mt_rand(0,(strlen($fullstr) - 1));
							$this->rulereturn[$key][$i] = $fullstr[$rand];
							break;
						}
					}
				}
			}
		}
		return true;

	}

	/**
	* 卡片重复概率
	* @param $num - 整数 要生成的张数
	* $this->failmin 重复容忍张数
	*/
	function fail($num = 1) {
		$failrate = $this->failrate ? (float)$this->failrate : '0.1';
		$this->failmin = ceil($num * $failrate);
		$this->failmin = $this->failmin > 100 ? 100 : $this->failmin;
	}
};
?>