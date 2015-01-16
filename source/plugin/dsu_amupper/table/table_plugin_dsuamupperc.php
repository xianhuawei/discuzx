<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

//这是签到配置扩展表 配置特殊奖励等等
class table_plugin_dsuamupperc extends discuz_table
{
    public function __construct() {

        $this->_table = 'plugin_dsuamupperc';
        $this->_pk    = 'id';
        $this->_pre_cache_key = 'plugin_dsuamupperc_';
        $this->_allowmem = true;

        parent::__construct();
    }

    //获取特殊配置情况
    public static function fetch_all_by_g_id()
    {
        $data = memory('get','plugin_dsuamupperc_fetch_all_by_g_id');

        if($data){
            return $data;
        }

        $result = DB::fetch_all("SELECT * FROM %t WHERE id>%d LIMIT %d", array('plugin_dsuamupperc', '-1', '100'), 'id');
        memory('set','plugin_dsuamupperc_fetch_all_by_g_id',$result,60);

        return $result;
    }
}
?>