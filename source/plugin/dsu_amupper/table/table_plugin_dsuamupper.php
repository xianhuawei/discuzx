<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');

}

//签到插件主表

class table_plugin_dsuamupper extends discuz_table
{
    public function __construct() {

        $this->_table = 'plugin_dsuamupper';
        $this->_pk    = 'uid';
        $this->_pre_cache_key = 'plugin_dsuamupper_';
        $this->_allowmem = true;

        parent::__construct();
    }

    //获取今天的主题id
    public function fetch_allow_by_today($today)
    {
        $today = intval($today);
        if(empty($today)){
            return array();
        }

        $mem_key = 'plugin_dsuamupper_fetch_allow_by_today'.$today;
        $data = memory('get',$mem_key);
        if($data){
            return $data;
        }

        $result = DB::fetch_first('SELECT allow FROM %t WHERE time=%d', array($this->_table, $today));

        memory('set',$mem_key,$result);

        return $result;
    }

    //更新今天的主题id
    public function update_allow_by_today($today,$allow){
        $today = intval($today);
        $allow = intval($allow);
        if(empty($today) || empty($allow)){
            return false;
        }

        $result = DB::query('UPDATE %t SET allow = %d WHERE time = %d', array($this->_table, $allow, $today));

        $mem_key = 'plugin_dsuamupper_fetch_allow_by_today'.$today;
        memory('rm',$mem_key);

        return $result;
    }

    //获取某个时间起的签到个数
    public function count_by_lasttime($lasttime,$glu='>='){
        $lasttime = intval($lasttime);
        if(empty($lasttime) || !in_array('>=','>','<','<=')){
            return 0;
        }

        $mem_key = 'plugin_dsuamupper::count_by_lasttime'.$lasttime.$glu;
        $data = memory('get',$mem_key);
        if($data){
            return $data;
        }
        $result = DB::result_first("SELECT COUNT(*) FROM ".$this->_table." WHERE lasttime $glu $lasttime");
        memory('set',$mem_key,$result);
        return $result;
    }
}
?>