<?php

/**
 * Created by PhpStorm.
 * User: zouzehua
 * Date: 2014/11/5
 * Time: 16:40
 */
class table_common_basedata extends discuz_table
{

    private   $fetch_by_type_sql ="SELECT * FROM %s WHERE type='%s' ORDER BY sort DESC";
    private   $fetch_by_type_code_sql ="SELECT * FROM %s WHERE type='%s'  AND code='%s' ORDER BY sort DESC";
    
    
    public function __construct()
    {
        $this->_table = 'pre_common_basedata';
        $this->_allowmem = memory('check');
        $this->_cache_ttl = 86400;
        parent::__construct();
    }

    /**
     * 根据type值获取数据字典里面列表
     * @param $type 表里面的type值
     * @return array 返回数组列表
     */
    public function fetch_by_type($type)
    {
        global $_G;
        $info = array();
        if($_G["basedata"]&&!empty($_G["basedata"])){
            foreach($_G["basedata"] as $k=>$v){
                if($v["type"]==$type){
                    $info[]=$v;
                }
            }
        }else{
            $info = DB::fetch_all(sprintf($this->fetch_by_type_sql,$this->_table ,$type));
        }
        return $info;
    }

    
    
    //@todo
    /**
     * 根据type和code获得单个数据字典的值
     * @param $type 数据表里面type值
     * @param $code 数据表的code值
     * @param string $field 需要返回的数组key对应值，默认返回数组，如果添加，则返回对应的值
     * @return array
     */
    public function fetch_by_type_code($type, $code)
    {
        global $_G;
        $result = array();
        if($_G["basedata"]&&!empty($_G["basedata"])){
            foreach($_G["basedata"] as $k=>$v){
                if($v["type"]==$type && $v["code"]==$code){
                    $result=$v;
                }
            }
        }else{
            $result = DB::fetch_first(sprintf($this->fetch_by_type_code_sql,$this->_table,$type,$code));
        }

        return $result;
    }

    public function fetch_name_by_type_code($type, $code){
        $info = $this->fetch_by_type_code($type,$code);
        if(!empty($info) && isset($info['value'])){
            return $info['value'];
        }
        return '';
    }

    /**
     * 获取所有数据字典的数据
     * @return array
     */
    public function fetch_all_list(){
        $sql = sprintf("SELECT * FROM %s ORDER BY sort DESC",$this->_table);
        $data =DB::fetch_all($sql);
        return $data;
    }
}