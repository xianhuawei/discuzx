<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_plugin_luckypacketlog extends discuz_table {

	public function __construct() {
		$this->_table = 'common_plugin_luckypacketlog';

		parent::__construct();
	}

	public function fetch_sum_by_extcreditid($extcreditid) {
		$return = DB::fetch_all("SELECT uid, SUM(creditnum) AS gn FROM %t WHERE extcredit=%d group by uid order by gn DESC LIMIT 10", array($this->_table, $extcreditid));
		return $return;
	}

	public function fetch_count_group_by_uid() {
		return DB::fetch_all("SELECT uid, count(*) AS gn FROM %t group by uid order by gn DESC LIMIT 10", array($this->_table));
	}

	public function fetch_by_packetid_dateline($packetid, $dateline = '', $start = 0, $limit = 0) {
		return DB::fetch_all("SELECT * FROM %t WHERE packetid=%d AND dateline>=%d ORDER BY `dateline` DESC %i", array($this->_table, $packetid, $dateline, DB::limit($start, $limit)));
	}

	public function fetch_by_uid($uid, $starttime = 0, $start, $limit) {
		return DB::fetch_all("SELECT * FROM %t WHERE uid=%d AND %i ORDER BY `dateline` DESC %i", array($this->_table, $uid, DB::field('dateline', $starttime, '>='), DB::limit($start, $limit)));
	}

	public function range_by_dateline($dateline = 0, $start = 0, $limit = 0) {
		return DB::fetch_all("SELECT * FROM %t WHERE %i ORDER BY `dateline` DESC %i", array($this->_table, DB::field('dateline', $dateline, '>='), DB::limit($start, $limit)));
	}

	public function count_by_uid_dateline($uid = '', $dateline = 0) {

		$wherearr = array();
		$parameter = array($this->_table);
		if($uid) {
			$wherearr[] = 'uid=%d';
			$parameter[] = $uid;
		}
		if($dateline) {
			$wherearr[] = 'dateline>=%d';
			$parameter[] = $dateline;
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';

		return DB::result_first("SELECT COUNT(*) FROM %t $wheresql", $parameter);
	}

	public function count_by_packetid_uid($packetid, $uid, $dateline = 0) {

		$parameter = array($this->_table, $packetid, $uid);
		if($dateline) {
			$addsql = ' AND dateline>=%d';
			$parameter[] = $dateline;
		}
		return DB::result_first("SELECT COUNT(*) FROM %t WHERE packetid=%d AND uid=%d $addsql", $parameter);
	}

	public function count_by_packetid_dateline($packetid, $dateline) {
		return DB::result_first("SELECT COUNT(*) FROM %t WHERE packetid=%d AND dateline>=%d", array($this->_table, $packetid, $dateline));
	}

}

