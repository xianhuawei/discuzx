<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_common_plugin_luckypost extends discuz_table {

	public function __construct() {
		$this->_table = 'common_plugin_luckypost';
		$this->_pk = 'lid';

		parent::__construct();
	}

	public function fetch_all_by_tid_pids($tids, $pids, $start = 0, $limit = 0) {

		return ($pids = dintval($pids, true)) ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('tid', $tids).' AND '.DB::field('pid', $pids), null, 'pid') : array();
	}

	public function count_by_uid($uid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d', array($this->_table, $uid));
	}

	public function range_by_uid($uid, $start = 0, $limit = 0, $orderby = '', $sort = '') {

		$orderby = in_array($orderby, array($this->_pk, 'uid'), true) ? $orderby : '';

		return DB::fetch_all('SELECT * FROM %t WHERE uid = %d %i %i', array($this->_table, $uid, ($orderby ? ' ORDER BY '.DB::order($orderby, $sort) : ''), DB::limit($start, $limit)), $this->_pk);
	}


	//正则匹配,获取字段/索引/关键字信息
	public function getcolumn($creatsql) {

		$creatsql = preg_replace("/ COMMENT '.*?'/i", '', $creatsql);
		$matchs = array();
		preg_match("/\((.+)\)\s*(ENGINE|TYPE)\s*\=/is", $creatsql, $matchs);

		$cols = explode("\n", $matchs[1]);
		$newcols = array();
		foreach ($cols as $value) {
			$value = trim($value);
			if(empty($value)) continue;
			$value = $this->remakesql($value);//特使字符替换
			if(substr($value, -1) == ',') $value = substr($value, 0, -1);//去掉末尾逗号

			$vs = explode(' ', $value);
			$cname = $vs[0];

			if($cname == 'KEY' || $cname == 'INDEX' || $cname == 'UNIQUE') {

				$name_length = strlen($cname);
				if($cname == 'UNIQUE') $name_length = $name_length + 4;

				$subvalue = trim(substr($value, $name_length));
				$subvs = explode(' ', $subvalue);
				$subcname = $subvs[0];
				$newcols[$cname][$subcname] = trim(substr($value, ($name_length+2+strlen($subcname))));

			}  elseif($cname == 'PRIMARY') {

				$newcols[$cname] = trim(substr($value, 11));

			}  else {

				$newcols[$cname] = trim(substr($value, strlen($cname)));
			}
		}
		return $newcols;
	}

	//整理sql文
	private function remakesql($value) {
		$value = trim(preg_replace("/\s+/", ' ', $value));//空格标准化
		$value = str_replace(array('`',', ', ' ,', '( ' ,' )', 'mediumtext'), array('', ',', ',','(',')','text'), $value);//去掉无用符号
		return $value;
	}
}
