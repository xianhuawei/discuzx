<?php
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_common_category extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'pre_common_category';
        parent::__construct();
    }

    /**
     * 根据typeid获取分类信息
     * @param $typeid
     * @return int
     */
    public function fetch_by_id($typeid)
    {
        if (isset($typeid) && $typeid > 0) {
            global $_G;
            $data = array();
            if($_G["category"]&&!empty($_G["category"])){
                foreach($_G["category"] as $k=>$v){
                    if($v["id"]==$typeid){
                        $data = $v;
                    }
                }
            }else{
                $sql = sprintf('SELECT * FROM %s WHERE id=%s ', $this->_table, $typeid);
                $query = DB::query($sql);
                if ($query) {
                    $data = array();
                    while ($value = DB::fetch($query)) {
                        $data = $value;
                    }
                }
            }
            return $data;
        }
        return 0;
    }

    /**
     * 返回第一级反馈列表。
     * @return array
     */
    public function fetch_first_list()
    {
        global $_G;
        $data = array();
        if($_G["category"]&&!empty($_G["category"])){
            foreach($_G["category"] as $k=>$v){
                if($v["parentid"]==0){
                    $data[$v['id']] = $v;
                    $data[$v['id']]["haschild"] = 0;
                }
            }
        }else {
            $sql = sprintf('SELECT * FROM %s WHERE parentid=0  ORDER BY sort DESC ', $this->_table);
            $query = DB::query($sql);
            if ($query) {
                $data = array();
                while ($value = DB::fetch($query)) {
                    $data[$value['id']] = $value;
                    $data[$value['id']]["haschild"] = 0;
                }
            }
        }
        if($data){
            $sql = sprintf('SELECT parentid, COUNT(id) as c FROM %s GROUP BY parentid', $this->_table);
            $query = DB::query($sql);
            if ($query) {
                while ($value = DB::fetch($query)) {
                    if (is_array($value) && !empty($value)) {
                        if($value['parentid']>0) {
                            $data[$value['parentid']]["haschild"] = 1;
                        }
                    }
                }
            }
        }
        return $data;
    }

    /**
     * 根据parentid分类获取叶子节点类别
     * @return array
     */
    public function fetch_leaf_list()
    {
        global $_G;
        $data = array();
        if($_G["category"]&&!empty($_G["category"])){
            foreach($_G["category"] as $k=>$v){
                if($v["isleaf"]==1){
                    $data[$v['parentid']][]=$v;
                }
            }
        }else {
            $sql = sprintf('SELECT * FROM %s WHERE isleaf=1 ORDER BY sort DESC ', $this->_table);
            $query = DB::query($sql);
            if ($query) {
                $data = array();
                while ($value = DB::fetch($query)) {
                    $data[$value["parentid"]][] = $value;
                }
            }
        }
        return $data;
    }

    /**
     *  获取叶子列表信息，主要在反馈页面提交下拉显示
     * @return array 返回列表
     */
    public function fetch_leaf()
    {
        global $_G;
        $data = array();
        if($_G["category"]&&!empty($_G["category"])){
            foreach($_G["category"] as $k=>$v){
                if($v["isleaf"]==1){
                    $data[]=$v;
                }
            }
        }else{
            $sql = sprintf('SELECT * FROM %s WHERE isleaf=1 ORDER BY sort DESC ', $this->_table);
            $query = DB::query($sql);
            if ($query) {
                $data = array();
                while ($value = DB::fetch($query)) {
                    $data[] = $value;
                }
            }
        }
        return $data;
    }

    /**
     * 获取所有分类数据
     * @return array
     */
    public function fetch_all_list(){
        $sql = sprintf("SELECT * FROM %s ORDER BY sort DESC",$this->_table);
        $data =DB::fetch_all($sql);
        return $data;
    }
}

?>