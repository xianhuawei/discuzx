<?php

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_baidusubmit_urlstat extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'baidusubmit_urlstat';
        parent::__construct();
    }

    public function update($time, $num)
    {
        if (DB::fetch_first('SELECT 1 FROM %t WHERE ctime=%d LIMIT 1', array($this->_table, $time))) {
            return DB::query('UPDATE %t SET urlnum=urlnum+%d, urlcount=urlcount+%d WHERE ctime=%d', array($this->_table, $num, $num, $time));
        }
        $precount = DB::result_first('SELECT urlcount FROM %t ORDER BY ctime DESC LIMIT 1', array($this->_table));
        return DB::query('INSERT INTO %t(ctime, urlnum, urlcount) values(%d, %d, %d)', array($this->_table, $time, $num, $precount+$num));
    }

    public function delete($time)
    {
        return DB::query('DELETE FROM %t WHERE ctime<%d', array($this->_table, $time));
    }

    public function getall()
    {
        return DB::fetch_all('SELECT * FROM %t ORDER BY ctime DESC', array($this->_table));
    }
}