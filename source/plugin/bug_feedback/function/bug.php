<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_feed.php 28299 2012-02-27 08:48:36Z svn_project_zhangjie $
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

/**
 * 获取顶部节点
 * @return mixed
 */
function getFirstCategory()
{
    $first_category = C::t("#bug_feedback#common_category")->fetch_first_list();
    return $first_category;
}

/**
 * 获取子节点
 * @return mixed
 */
function  getLeafCategory()
{
    $leaf_category = C::t("#bug_feedback#common_category")->fetch_leaf_list();
    return $leaf_category;
}

/**
 * 获取product版本号
 * @return mixed
 */
function getVersion()
{
    $data = C::t("#bug_feedback#common_basedata")->fetch_by_type('VERSION_DATA');
    return $data;
}

/**
 * 获取机型
 * @return mixed
 */
function  getMachine()
{
    $data = C::t("#bug_feedback#common_basedata")->fetch_by_type('MODEL_DATA');
    return $data;
}

/**
 * 获取复现概率
 * @return mixed
 */
function  getProbability()
{
    $data = C::t("#bug_feedback#common_basedata")->fetch_by_type('PROBABILITY_DATA');
    return $data;
}

/**
 * 获取反馈分类的最后一级分类
 */
function getTypeList()
{
    $data = C::t("#bug_feedback#common_category")->fetch_leaf();
    return $data;
}

/**
 * 插入bug反馈的信息
 * @return mixed
 */
function insertbug($data)
{
    return C::t('#bug_feedback#feedback_bug')->insert($data);
}

function checkBugField($param)
{
    if (empty($param['contact'])) {
        $reault = array(-1, '联系方式不能为空');
        return $reault;
    }
    $param['contact'] = trim($param['contact']);
    if (!is_numeric($param['contact']) || strlen($param['contact']) > 15) {
        $reault = array(-2, '联系方式必须是整形且长度不超过15个数字');
        return $reault;
    }
    if (empty($param['description']) || dstrlen($param['description']) > 2000) {
        $reault = array(-3, '请输入问题描述且长度不大于1000');
        return $reault;
    }
    if (empty($param['steps']) || dstrlen($param['description']) > 2000) {
        $reault = array(-4, '请输入复现步骤');
        return $reault;
    }
    $reault = array(1, '成功');
    return $reault;
}

function checkProposalField($param)
{

    if (empty($param['contact'])) {
        $reault = array(-1, '联系方式不能为空');
        return $reault;
    }
    $param['contact'] = trim($param['contact']);
    if (!is_numeric($param['contact']) || strlen($param['contact']) > 15) {
        $reault = array(-2, '联系方式必须是整形且长度不超过15个数字');
        return $reault;
    }
    if (empty($param['funtions']) || dstrlen($param['funtions']) > 30) {
        $reault = array(-3, '请输入功能点且长度不大于15个中文字符');
        return $reault;
    }
    if (empty($param['backgrounds']) || dstrlen($param['backgrounds']) > 2000) {
        $reault = array(-4, '请输入需求背景且长度不大于1000');
        return $reault;
    }
    if (empty($param['description']) || dstrlen($param['description']) > 2000) {
        $reault = array(-5, '请输入功能描述且长度不大于1000');
        return $reault;
    }
    $reault = array(1, '成功');
    return $reault;
}

function update_feedback_by_tid($tid, $data, $fid)
{
  	return C::t('#bug_feedback#feedback_bug')->update_by_tid($tid, $data);
}

function checktypeid($typeid)
{
    $data = C::t("#bug_feedback#common_category")->fetch_by_id($typeid);
    return ($data) ? $data["id"] : 0;
}

function gettypebyid($typeid)
{
    $data = C::t("#bug_feedback#common_category")->fetch_by_id($typeid);
    return ($data) ? $data["name"] : "";
}

function getAttachlist($tid){
    $data = C::t("forum_attachment_n")->fetch_feedback_by_id("tid:".$tid,"tid",array($tid));
    return $data;
}

function getFeedbackStatus(){
    return array(10,20,30,40,50,60);
}

function getDataBycode($type,$code){
    return C::t("#bug_feedback#common_basedata")->fetch_name_by_type_code($type,$code);
}

function getFeedback($tid,$fid){
    $data = array();
    global $_G;
    $lastpostid = 0;
    if($_G['forum_thread']["author"]==$_G['forum_thread']["lastposter"]){
        $lastpostid = $_G['forum_thread']["authorid"];
    }else{
        $userarr =  C::t("common_member")->fetch_by_username($_G['forum_thread']["lastposter"]);
        if(is_array($userarr)&&!empty($userarr)){
            $lastpostid =$userarr["uid"];
        }
    }
    //$lastpostid == uid ?
    $_G['forum_thread']["lastpostid"]=$lastpostid;
    $_G['forum_thread']['lastpost'] = date("Y-m-d H:i",$_G['forum_thread']['lastpost']);
    $_G['forum_thread']['dateline'] = date("Y-m-d",$_G['forum_thread']['dateline']);
    $data = C::t('#bug_feedback#feedback_bug')->fetch_by_tid($tid);
    if($data["snapshot"]==1){
        $data["attachlist"] = getAttachlist($tid);
    }
    if($data["model"]){
        $data["model_name"] = getDataBycode('MODEL_DATA',$data["model"]);
    }
    if($data["product_version"]){
        $data["product_version_name"] = getDataBycode('VERSION_DATA',$data["product_version"]);
    }
    if($data["logurl"] ) {
        if(strpos($data["logurl"],'|')>-1){
            $logarr  = explode('|',$data["logurl"]);
            if(count($logarr)==2&&!empty($logarr[0])&&$logarr[0]!="''"&&!empty($logarr[1])&&$logarr[1]!="''"){
                $data["logname"] = $logarr[1];
                $data["logurl"] = $logarr[0];
            }
            unset($logarr);
        }
    }
    
    return $data;
}
?>