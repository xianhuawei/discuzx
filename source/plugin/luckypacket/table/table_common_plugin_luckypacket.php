<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_plugin_luckypacket extends discuz_table {

	public function __construct() {
		$this->_table = 'plugin_luckypacket';
		$this->_pk    = 'packetid';
		parent::__construct();
	}

	public function fetch_all_allowed($originatorid, $onlySelf = false, $start = 0, $limit = 0) {
		$parameter = array($this->_table, $originatorid);
		$addSql = '';
		if(!$onlySelf) {
			$addSql = ' OR (status=1 AND ispass =1 AND (starttimeto=0 OR starttimeto>%d))';
			$parameter[] = TIMESTAMP;
		}
		$parameter[] = DB::limit($start, $limit);

		return DB::fetch_all("SELECT * FROM %t WHERE originatorid=%d AND status <> 4 $addSql ORDER BY status ASC, `pspecial` ASC, `ispass` DESC, `displayorder` ASC,`packetid` ASC %i", $parameter, $this->_pk);
	}

	public function count_allowed($originatorid, $onlySelf = false) {
		$parameter = array($this->_table, $originatorid);
		$addSql = '';
		if(!$onlySelf) {
			$addSql = ' OR (status=1 AND ispass =1 AND (starttimeto=0 OR starttimeto>%d))';
			$parameter[] = TIMESTAMP;
		}

		return DB::result_first("SELECT COUNT(*) FROM %t WHERE originatorid=%d AND status <> 4 $addSql", $parameter, $this->_pk);
	}

	public function fetch_all_allowed_by_pspecial($pspecial, $start = 0, $limit = 0, $showAll = false) {
		$parameter = array($this->_table, $pspecial);
		$sqlAdd = '';
		if($showAll) {
			$sqlAdd = 'AND status <> 4';
		} else {
			$sqlAdd = 'AND status = 1 AND ispass = 1';
		}
		$parameter[] = DB::limit($start, $limit);
		return DB::fetch_all("SELECT * FROM %t WHERE pspecial=%d $sqlAdd ORDER BY status ASC, `pspecial` ASC, `ispass` DESC, `displayorder` ASC,`packetid` ASC %i", $parameter, $this->_pk);
	}

	public function count_allowed_by_pspecial($pspecial, $showAll = false) {
		$parameter = array($this->_table, $pspecial);
		if($showAll) {
			$sqlAdd = 'AND status <> 4';
		} else {
			$sqlAdd = 'AND status = 1 AND ispass = 1';
		}
		return DB::result_first("SELECT COUNT(*) FROM %t WHERE pspecial=%d $sqlAdd", $parameter);
	}

	public function fetch_all_by_pass($isPass = 1, $start = 0, $limit = 0) {
		$parameter = array($this->_table, $isPass);
		$parameter[] = DB::limit($start, $limit);

		return DB::fetch_all("SELECT * FROM %t WHERE status<>4 AND ispass=%d ORDER BY status ASC, `pspecial` ASC, `ispass` DESC, `displayorder` ASC,`packetid` ASC %i", $parameter, $this->_pk);
	}

	public function count_by_pass($isPass = 1) {
		$parameter = array($this->_table, $isPass);

		return DB::result_first("SELECT COUNT(*) FROM %t WHERE status<>4 AND ispass=%d", $parameter);
	}

	public function fetch_all($start = 0, $limit = 0, $exceptDel = true) {
		$parameter = array($this->_table);
		if($exceptDel) {
			$whereSql = 'WHERE status != 4';
		}
		$parameter[] = DB::limit($start, $limit);
		return DB::fetch_all("SELECT * FROM %t $whereSql ORDER BY status ASC, `pspecial` ASC, `ispass` DESC, `displayorder` ASC,`packetid` ASC %i", $parameter, $this->_pk);
	}

	public function count_all($exceptDel = true) {
		$parameter = array($this->_table);
		if($exceptDel) {
			$whereSql = 'WHERE status != 4';
		}

		return DB::result_first("SELECT COUNT(*) FROM %t $whereSql", $parameter);
	}

	public function increase($packetid, $setarr) {
		$sql = array();
		$allowkey = array('inum', 'tnum');
		foreach($setarr as $key => $value) {
			if(($value = intval($value)) && in_array($key, $allowkey)) {
				$sql[] = "`$key`=`$key`+'$value'";
			}
		}
		$wheresql = DB::field('packetid', $packetid);
		if(!empty($sql)){
			return DB::query('UPDATE %t SET %i WHERE %i', array($this->_table, implode(',', $sql), $wheresql));
		}
	}

	public function update_by_pspecial($pspecial, $data) {
		if(($pspecial = dintval($pspecial, true)) && !empty($data) && is_array($data)) {
			return DB::update($this->_table, $data, DB::field('pspecial', $pspecial));
		}
		return false;
	}
}