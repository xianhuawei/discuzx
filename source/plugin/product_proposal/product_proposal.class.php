<?php
/**
 *	[产品建议(product_proposal.{modulename})] (C)2015-2099 Powered by xianhuawei.
 *	Version: 1.0
 *	Date: 2015-1-13 16:17
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_product_proposal {
}

class threadplugin_product_proposal {

	public $name = '需求建议主题';			//主题类型名称
	public $iconfile = 'icon.gif';	//发布主题链接中的前缀图标
	public $buttontext = '需求建议';	//发帖时按钮文字

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
		require_once './function/feedback.php';
        $typelist = getTypeList();
        include template('diy:forum/post_proposal:'.$fid);
	}

	/**
	 * 主题发布前的数据判断 
	 * @param Integer $fid: 版块ID
	 */
	public function newthread_submit($fid) {
		require_once './function/feedback.php';
		$params["funtions"] =  dhtmlspecialchars(getgpc('funtions'));
        $params["backgrounds"] =  dhtmlspecialchars(getgpc('backgrounds'));
        $params["contact"] =  dhtmlspecialchars(getgpc('contact'));
        $params["description"] =  dhtmlspecialchars(getgpc('description'));
        $params["snapshot"] =  getgpc('attachnew')?1:0;
		
	}

	/**
	 * 主题发布后的数据处理 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function newthread_submit_end($fid, $tid) {
		require_once './function/feedback.php';
        insertproposal(array(
            "tid"=>$tid,
            "feedback_status"=>60,
            "funtion"=> dhtmlspecialchars(getgpc('funtion')),
            "description"=> dhtmlspecialchars(getgpc('description')),
            "background"=> dhtmlspecialchars(getgpc('background')),
            "snapshot"=> dhtmlspecialchars(getgpc('snapshot')),
            "contact"=> dhtmlspecialchars(getgpc('contact')),
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
		require_once './function/feedback.php';
	    $typelist = getTypeList();
	    $thread["proposalinfo"] = getFeedback($tid,$fid);
	    include template('forum/post_proposal');
	}

	/**
	 * 主题编辑前的数据判断 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function editpost_submit($fid, $tid) {
		// 建议反馈页面编辑提交
        $param["funtions"] =  dhtmlspecialchars(getgpc('funtions'));
        $param["backgrounds"] =  dhtmlspecialchars(getgpc('backgrounds'));
        $param["contact"] =  dhtmlspecialchars(getgpc('contact'));
        $param["description"] =  dhtmlspecialchars(getgpc('description'));
        $param["snapshot"] =  getgpc('attachnew')?1:0;
	}

	/**
	 * 主题编辑后的数据处理 
	 * @param Integer $fid: 版块ID
	 * @param Integer $tid: 当前帖子ID
	 */
	public function editpost_submit_end($fid, $tid) {
		require_once './function/feedback.php';
        update_feedback_by_tid($tid,array(
            "funtion"=> dhtmlspecialchars(getgpc('funtion')),
            "description"=> dhtmlspecialchars(getgpc('description')),
            "background"=> dhtmlspecialchars(getgpc('background')),
            "snapshot"=> dhtmlspecialchars(getgpc('snapshot')),
            "contact"=> dhtmlspecialchars(getgpc('contact'))
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
		include template('forum/viewthread_node_proposal');
	}
}

?>