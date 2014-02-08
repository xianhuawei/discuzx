<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_baidusubmit_setting extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'baidusubmit_setting';
        parent::__construct();
    }

    public function fetch_all()
    {
        $query = DB::query('SELECT * FROM %t', array($this->_table));
        $ret = array();
        while ($row = DB::fetch($query)) {
            $ret[$row['skey']] = array('svalue' => $row['svalue'], 'stime' => $row['stime']);
        }
        return $ret;
    }

    public function key_exists($skey)
    {
        return DB::fetch_first('SELECT skey FROM %t WHERE skey=%s LIMIT 1', array($this->_table, $skey)) ? true : false;
    }

    public function update($skey, $svalue, $update_time=true, $is_increase=false)
    {
        $time = time();
        if ($this->key_exists($skey)) {
            $subsql = !$is_increase ? 'svalue=%s' : 'svalue=svalue+%d';
            if ($update_time) {
                return DB::query("UPDATE %t SET $subsql, stime=%d WHERE skey=%s", array($this->_table, $svalue, $time, $skey));
            } else {
                return DB::query("UPDATE %t SET $subsql  WHERE skey=%s", array($this->_table, $svalue, $skey));
            }
        } else {
            return DB::query('INSERT INTO %t(skey, svalue, stime) values(%s, %s, %d)', array($this->_table, $skey, $svalue, $time));
        }
    }

    public function remove_key($skey)
    {
        return DB::query('DELETE FROM %t WHERE skey=%s', array($this->_table, $skey));
    }
}