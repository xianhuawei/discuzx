<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
 +------------------------------------------------------------------------------
 * Post Model 文章内容
 +------------------------------------------------------------------------------
 * @author    CHEN <chen@disyo.com>
 * @version   $Id$
 +------------------------------------------------------------------------------
 */
class plugin_ukasky_livecontact {
	
	var $isopen;
	var $high;
	var $style;
	var $istyle;
	var $qqlist;
	var $wangwang;
	var $tel;
	var $email;
	var $feedback;
	var $online;
	var $charset;
	 
	
	/**
	 * 
	 * 变量初始化
	 */
	function plugin_ukasky_livecontact(){
		global $_G;
		$this->isopen = $_G['cache']['plugin']['ukasky_livecontact']['isopen'];
		$this->high = $_G['cache']['plugin']['ukasky_livecontact']['high'];
		$this->style = $_G['cache']['plugin']['ukasky_livecontact']['style'];
		$this->istyle = $_G['cache']['plugin']['ukasky_livecontact']['istyle'];
		$this->qqlist = $_G['cache']['plugin']['ukasky_livecontact']['qqlist'];
		$this->wangwang = $_G['cache']['plugin']['ukasky_livecontact']['wangwang'];
		$this->tel = $_G['cache']['plugin']['ukasky_livecontact']['tel'];
		$this->email = $_G['cache']['plugin']['ukasky_livecontact']['email'];
		$this->feedback = $_G['cache']['plugin']['ukasky_livecontact']['feedback'];
		$this->online = $_G['cache']['plugin']['ukasky_livecontact']['online'];
		$this->charset = $_G['charset'];
	}
	
	/**
	 * 
	 * 在global_footer嵌入
	 * Discuz!全局页面底部插件钩子
	 */
	function global_footer(){
		if($this->isopen){
			// 获取模板变量
			$high = $this->high;
			if(empty($this->qqlist)){
				$arrQQlist = false;
			}else{
				$arrQQlist = $this->_strToArr($this->qqlist);
			}
			if(empty($this->wangwang)){
				$arrWWlist = false;
			}else {
				$arrWWlist = $this->_strToArr($this->wangwang);
				// 循环处理中文旺旺用户
				foreach ($arrWWlist as $key => $value){
					$arrWWlist[$key][0] = urlencode($value[0]);
				}
				$charset = $this->charset;
			}
			$online = $this->online;
			$tel = $this->tel;
			$email = $this->email;
			$feedback = $this->feedback;
			// 导入模板
			if(empty($this->istyle)){
				$style = 'ukasky_livecontact:'.$this->style;
			}else{
				$style = 'ukasky_livecontact:'.$this->istyle;
			}
			include template($style);
			// 返回客服代码
			return $return;
		}else{
			return "";
		}
	}
	
	/**
	 * 
	 * 解析插件变量为数组模式
	 * @param string $str
	 */
	function _strToArr($str){
		$arr = array();
		$arr = explode("\n", $str);
		$arrList = array();
		foreach ($arr as $key => $value){
			$arrList[$key] = explode("|", $value);
		}
		return $arrList;
	}
	
}
?>