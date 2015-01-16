<?php
/**
 *	[Bug反馈(bug_feedback.{modulename})] (C)2015-2099 Powered by xianhuawei.
 *	Version: 1.0
 *	Date: 2015-1-13 16:13
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_bug_feedback {

}

class threadplugin_bug_feedback {

	public $name = 'Bug反馈主题';			//主题类型名称
	public $iconfile = 'icon.gif';	//发布主题链接中的前缀图标
	public $buttontext = 'Bug反馈';	//发帖时按钮文字

	/**
     * 初始化扩展（数据字典，分类）
     */
	function __construct(){
		global $_G;
		$categoryList = C::t("common_category")->fetch_all_list();
        $basedataList = C::t("common_basedata")->fetch_all_list();
        $_G['category'] = (is_array($categoryList) &&!empty($categoryList))?$categoryList:array();
        $_G['basedata'] = (is_array($basedataList) &&!empty($basedataList))?$basedataList:array();
	}
	/**
	 * 发主题时页面新增的表单项目
	 * @param Integer $fid: 版块ID
	 * @return string 通过 return 返回即可输出到发帖页面中 
	 */
	public function newthread($fid) {
		require_once './function/bug.php';
        $typelist = getTypeList();
        $maxfilesize = 10;
        
		$probabilitylist = getProbability();
		$version = getVersion();
		$machine = getMachine();
		include template('diy:forum/post_bug:'.$fid);
	}

	/**
	 * 主题发布前的数据判断 
	 * @param Integer $fid: 版块ID
	 */
	public function newthread_submit($fid) {
		require_once './function/bug.php';
		
		$params["model"] =  dhtmlspecialchars(getgpc('model'));
        $params["rom_version"] =  dhtmlspecialchars(getgpc('rom_version'));
        $params["product_version"] =  dhtmlspecialchars(getgpc('product_version'));
        $params["contact"] =  dhtmlspecialchars(getgpc('contact'));
        $params["probability"] =  dhtmlspecialchars(getgpc('probability'));
        $params["description"] =  dhtmlspecialchars(getgpc('description'));
        $params["steps"] =  dhtmlspecialchars(getgpc('steps'));
        $params["snapshot"] =  getgpc('attachnew')?1:0;
		
	}

	/**
	 * 主题发布后的数据处理 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function newthread_submit_end($fid, $tid) {
		require_once './function/bug.php';
        insertbug(array(
            "tid"=>$tid,
            "feedback_status"=>20,
            "model"=> dhtmlspecialchars(getgpc('model')),
            "rom_version"=> dhtmlspecialchars(getgpc('rom_version')),
            "product_version"=> dhtmlspecialchars(getgpc('product_version')),
            "contact"=> dhtmlspecialchars(getgpc('contact')),
            "probability"=> dhtmlspecialchars(getgpc('probability')),
            "description"=> dhtmlspecialchars(getgpc('description')),
            "steps"=> dhtmlspecialchars(getgpc('steps')),
            "snapshot"=> getgpc('attachnew')?1:0,
            "logurl"=> '',//todo
            "support"=> 0
        ));
		
	}

	/**
	 * 编辑主题时页面新增的表单项目
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 * @return string 通过 return 返回即可输出到编辑主题页面中 
	 */
	public function editpost($fid, $tid) {
		require_once './function/bug.php';
	    $typelist = getTypeList();
	    $probabilitylist = getProbability();
	    $version = getVersion();
	    $machine = getMachine();
	    $thread["buginfo"] = getFeedback($tid,$fid);
	    $maxfilesize = 10;
	    include template('forum/post_bug');
	}

	/**
	 * 主题编辑前的数据判断 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function editpost_submit($fid, $tid) {
		$param["model"] =  dhtmlspecialchars(getgpc('model'));
        $param["rom_version"] =  dhtmlspecialchars(getgpc('rom_version'));
        $param["product_version"] =  dhtmlspecialchars(getgpc('product_version'));
        $param["contact"] =  dhtmlspecialchars(getgpc('contact'));
        $param["probability"] =  dhtmlspecialchars(getgpc('probability'));
        $param["description"] =  dhtmlspecialchars(getgpc('description'));
        $param["steps"] =  dhtmlspecialchars(getgpc('steps'));
        $param["snapshot"] =  getgpc('attachnew')?1:0;
		
	}

	/**
	 * 主题编辑后的数据处理 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function editpost_submit_end($fid, $tid) {
		require_once './function/bug.php';
        update_feedback_by_tid($tid, array(
            "model"=> dhtmlspecialchars(getgpc('model')),
            "rom_version"=> dhtmlspecialchars(getgpc('rom_version')),
            "product_version"=> dhtmlspecialchars(getgpc('product_version')),
            "contact"=> dhtmlspecialchars(getgpc('contact')),
            "probability"=> dhtmlspecialchars(getgpc('probability')),
            "description"=> dhtmlspecialchars(getgpc('description')),
            "steps"=> dhtmlspecialchars(getgpc('steps')),
            "snapshot"=> getgpc('attachnew')?1:0,
            "logurl"=> '',//todo
        ),$fid);
		
	}

	/**
	 * 回帖后的数据处理 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function newreply_submit_end($fid, $tid) {
		
	}

	/**
	 * 查看主题时页面新增的内容
	 * @param Integer $tid: 当前帖子ID
	 * @return string 通过 return 返回即可输出到主题首贴页面中
	 */
	public function viewthread($tid) {
		include template('forum/viewthread_node_bug');
	}
}

?>