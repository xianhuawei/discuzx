<?php
/**
 * Created by PhpStorm.
 * User: zouzehua
 * Date: 2014/11/6
 * Time: 13:42
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_feedback_bug extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'pre_feedback_bug';
        $this->_allowmem = true;
        $this->_cache_ttl = 86400;
        parent::__construct();
    }

    /**
     * 用户数据插入
     * @param $data 用户数据
     * @return mixed
     */
    public function insert($data)
    {
        return DB::insert($this->_table, $data);
    }

    public function search_condition($conditions, $prefix = "pre_feedback_bug.")
    {
        $where = "1=1";
        if (isset($conditions['romversion']) && !empty($conditions['romversion'])) {
            $where .= " AND " . $prefix . "rom_version=" . $conditions['romversion'];
        }
        if (isset($conditions['machine']) && !empty($conditions['machine'])) {
            $where .= " AND " . $prefix . "model='" . $conditions['machine'] . "'";
        }
        if (isset($conditions['version']) && !empty($conditions['version'])) {
            $where .= " AND " . $prefix . "product_version='" . $conditions['version'] . "'";
        }
        if (isset($conditions['feedback_status']) && !empty($conditions['feedback_status'])) {
            if ($conditions['feedback_status'] == 10) {
                $where .= " AND " . $prefix . "feedback_status>" . $conditions['feedback_status'];
            } else {
                $where .= " AND " . $prefix . "feedback_status=" . $conditions['feedback_status'];
            }

        }
        return $where;
    }

    /**
     * 获取单条信息
     * @param $tid
     * @return array
     */
    public function fetch_by_tid($tid)
    {
        $data = $this->fetch_cache($tid, "feedback_");
        if ($data) {
            return $data;
        }
        $sql = sprintf("SELECT * FROM %s WHERE tid=%d", $this->_table, $tid);
        $data = DB::fetch_first($sql);
        if ($data) {
            $this->store_cache($tid, $data, $this->_cache_ttl, "feedback_");
        }
        return $data;
    }

    /**
     * 更新遇到人数数量
     * @param $tid
     * @param bool $getsetarr
     * @return array
     */
    function update_threadsupport($tid)
    {
        global $_G;
        $setarr = array();
        if ($_G['uid'] && $tid) {
            $partaked = C::t('forum_threadpartake')->fetch($tid, $_G['uid']);
            $partaked = $partaked['uid'];
            if (!$partaked) {
                C::t('forum_threadpartake')->insert(array('tid' => $tid, 'uid' => $_G['uid'], 'dateline' => TIMESTAMP));
            }
            $sql = sprintf("UPDATE %s SET support=support+1 WHERE tid=%s", $this->_table, $tid);
            $setarr = DB::query($sql);

        }
        if ($setarr) {
            $this->clear_cache($tid,"feedback_");
            return $setarr;
        }
    }

    /**
     * 更新bug反馈状态
     * @param $status 状态（20,30,40）
     * @param $tid 主题id
     * @return array
     */
    function update_feedback_status($status, $tid)
    {
        $setarr = array();
        if ($status && $tid) {
            if ($data = self::fetch_by_tid($tid)) {
                $sql = sprintf("UPDATE %s SET feedback_status=%d WHERE tid=%d", $this->_table, $status, $tid);
                $setarr = DB::query($sql);
                $this->clear_cache($tid,"feedback_");
            } else {
                return $setarr;
            }
        }
        return $setarr;
    }

    /**
     * 更新bug反馈表信息
     * @param $tid tid值
     * @param $data 传过来的数据
     * @return mixed 执行的状态，如果失败返回FALSE
     */
    public function update_by_tid($tid, $data)
    {
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($data as $key => $value) {
            if ($key == "logurl" && !empty($value)) {
                $sql .= "logurl='" . $value . "',";
            }
            if ($key == "model" && !empty($value)) {
                $sql .= "model='" . $value . "',";
            }
            if ($key == "rom_version" && !empty($value)) {
                $sql .= "rom_version=" . $value . ",";
            }
            if ($key == "product_version" && !empty($value)) {
                $sql .= "product_version='" . $value . "',";
            }
            if ($key == "contact" && !empty($value)) {
                $sql .= "contact='" . $value . "',";
            }
            if ($key == "probability" && !empty($value)) {
                $sql .= "probability=" . $value . ",";
            }
            if ($key == "description" && !empty($value)) {
                $sql .= "description='" . $value . "',";
            }
            if ($key == "steps" && !empty($value)) {
                $sql .= "steps='" . $value . "',";
            }
            if ($key == "snapshot" && !empty($value)) {
                $sql .= "snapshot='" . $value . "',";
            }
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE tid=" . $tid;
        $result = DB::query($sql);
        if ($result) {
            $this->clear_cache($tid, "feedback_");
        }
        return $result;
    }
} 