<?php
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_baidusubmit_sitemap extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'baidusubmit_sitemap';
        parent::__construct();
    }

    public function add($url, $type, $start, $end)
    {
        $create_time = time();
        return DB::query('INSERT INTO %t(url, type, create_time,start,end) values(%s, %d, %d, %d, %d)',
                 array($this->_table, $url, $type, $create_time, $start, $end));
    }

    public function get_max_end($type)
    {
        return DB::result_first('SELECT MAX(end) FROM %t WHERE type = %d', array($this->_table, $type));
    }

    public function get_sitemap_count($type)
    {
        return DB::result_first('SELECT COUNT(*) FROM %t WHERE type = %d', array($this->_table, $type));
    }

    public function get_sitemap_list($type, $offset=0, $limit=0)
    {
        if ($offset >= 0 && $limit > 0) {
            return DB::fetch_all('SELECT * FROM %t WHERE type=%d LIMIT %d, %d', array($this->_table, $type, $offset, $limit));
        }
        return DB::fetch_all('SELECT * FROM %t WHERE type=%d', array($this->_table, $type));
    }

    public function delete_history($time)
    {
        return DB::query('DELETE FROM %t WHERE type=2 and end<=%d', array($this->_table, $time));
    }

    public function get_by_start($type, $start, $end=0)
    {
        $sql = 'SELECT * FROM %t WHERE type=%d AND start=%d';
        $params = array($this->_table, $type, $start);
        if ($end > 0) {
            $sql .= ' AND end=%d';
            $params[] = $end;
        }
        return DB::fetch_first($sql, $params);
    }

    public function update_by_sid($sid, array $values)
    {
        $sql = 'UPDATE %t SET ';
        $params = array($this->_table);
        foreach ($values as $key => $val) {
            $sql .= ('url'===$key) ? "$key = %s," : "$key = %d,";
            $params[] = $val;
        }
        $params[] = $sid;
        DB::query(rtrim($sql, ', ').' WHERE sid=%d', $params);
    }

}