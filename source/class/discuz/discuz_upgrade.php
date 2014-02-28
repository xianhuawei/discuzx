<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_upgrade.php 31992 2012-10-30 05:44:15Z zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 *  版本升级类
 */
class discuz_upgrade {

	var $upgradeurl = 'http://upgrade.discuz.com/DiscuzX/';
	var $locale = 'SC';
	var $charset = 'GBK';

	/**
	 * 获取更新文件列表
	 * @param array $upgradeinfo 升级信息
	 * @return array
	 */
	public function fetch_updatefile_list($upgradeinfo) {

		$file = DISCUZ_ROOT.'./data/update/Discuz! X'.$upgradeinfo['latestversion'].' Release['.$upgradeinfo['latestrelease'].']/updatelist.tmp';
		$upgradedataflag = true;
		$upgradedata = @file_get_contents($file);
		if(!$upgradedata) {
			$upgradedata = dfsockopen($this->upgradeurl.substr($upgradeinfo['upgradelist'], 0, -4).strtolower('_'.$this->locale.'_'.$this->charset).'.txt');
			$upgradedataflag = false;
		}

		$return = array();
		$upgradedataarr = explode("\r\n", $upgradedata);
		foreach($upgradedataarr as $k => $v) {
			if(!$v) {
				continue;
			}
			$return['file'][$k] = trim(substr($v, 34));
			$return['md5'][$k] = substr($v, 0, 32);
			if(trim(substr($v, 32, 2)) != '*') {
				@unlink($file);
				return array();
			}

		}
		if(!$upgradedataflag) {
			$this->mkdirs(dirname($file));
			$fp = fopen($file, 'w');
			if(!$fp) {
				return array();
			}
			fwrite($fp, $upgradedata);
		}

		return $return;
	}

	/**
	 * 本地文件比较，返回文件是否修改过的状态
	 * @param array $upgradeinfo 升级信息
	 * @param array $upgradefilelist 升级需要修改的文件列表
	 * @return array
	 */
	public function compare_basefile($upgradeinfo, $upgradefilelist) {
		if(!$discuzfiles = @file('./source/admincp/discuzfiles.md5')) {
			return array();
		}

		$newupgradefilelist = array();
		foreach($upgradefilelist as $v) {
			$newupgradefilelist[$v] = md5_file(DISCUZ_ROOT.'./'.$v);
		}

		$modifylist = $showlist = $searchlist = array();
		foreach($discuzfiles as $line) {
			$file = trim(substr($line, 34));
			$md5datanew[$file] = substr($line, 0, 32);
			if(isset($newupgradefilelist[$file])) {
				if($md5datanew[$file] != $newupgradefilelist[$file]) {
					if(!$upgradeinfo['isupdatetemplate'] && preg_match('/\.htm$/i', $file)) {
						$ignorelist[$file] = $file;
						$searchlist[] = "\r\n".$file;
						continue;
					}
						$modifylist[$file] = $file;
				} else {
					$showlist[$file] = $file;
				}
			}
		}
		if($searchlist) {
			$file = DISCUZ_ROOT.'./data/update/Discuz! X'.$upgradeinfo['latestversion'].' Release['.$upgradeinfo['latestrelease'].']/updatelist.tmp';
			$upgradedata = file_get_contents($file);
			$upgradedata = str_replace($searchlist, '', $upgradedata);
			$fp = fopen($file, 'w');
			if($fp) {
				fwrite($fp, $upgradedata);
			}
		}

		return array($modifylist, $showlist, $ignorelist);
	}

	/**
	 * 去掉空白符之后，比较两个文件的内容是否一致
	 * @param string $file 本地文件
	 * @param string $remotefile 线上的原始文件
	 * @return bool
	 */
	public function compare_file_content($file, $remotefile) {
		if(!preg_match('/\.php$|\.htm$/i', $file)) {
			return false;
		}
		$content = preg_replace('/\s/', '', file_get_contents($file));
		$ctx = stream_context_create(array('http' => array('timeout' => 60)));//设置60秒的超时时间
		$remotecontent = preg_replace('/\s/', '', file_get_contents($remotefile, false, $ctx));
		if(strcmp($content, $remotecontent)) {
			return false;
		} else {
			return true;
		}
	}

	public function check_upgrade() {

		include_once libfile('class/xml');
		include_once libfile('function/cache');

		$return = false;
		$upgradefile = $this->upgradeurl.$this->versionpath().'/'.DISCUZ_RELEASE.'/upgrade.xml';
		$response = xml2array(dfsockopen($upgradefile));
		if(isset($response['cross']) || isset($response['patch'])) {
			C::t('common_setting')->update('upgrade', $response);
			$return = true;
		} else {
			C::t('common_setting')->update('upgrade', '');
			$return = false;
		}
		updatecache('setting');
		return $return;
	}

	/**
	 * 检查文件权限
	 * @param array $updatefilelist 更新文件列表
	 * @return bool
	 */
	public function check_folder_perm($updatefilelist) {
		foreach($updatefilelist as $file) {
			if(!file_exists(DISCUZ_ROOT.$file)) {
				if(!$this->test_writable(dirname(DISCUZ_ROOT.$file))) {
					return false;
				}
			} else {
				if(!is_writable(DISCUZ_ROOT.$file)) {
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * 检测目录是否可写
	 * @param string $dir 目录
	 * @return int
	 */
	public function test_writable($dir) {
		$writeable = 0;
		$this->mkdirs($dir);
		if(is_dir($dir)) {
			if($fp = @fopen("$dir/test.txt", 'w')) {
				@fclose($fp);
				@unlink("$dir/test.txt");
				$writeable = 1;
			} else {
				$writeable = 0;
			}
		}
		return $writeable;
	}

	/**
	 * 下载更新文件
	 * @param array $upgradeinfo 升级信息
	 * @param string $file 文件名
	 * @param string $folder 所在目录 upload or utility
	 * @return int
	 */
	public function download_file($upgradeinfo, $file, $folder = 'upload', $md5 = '', $position = 0, $offset = 0) {
		$dir = DISCUZ_ROOT.'./data/update/Discuz! X'.$upgradeinfo['latestversion'].' Release['.$upgradeinfo['latestrelease'].']/';
		$this->mkdirs(dirname($dir.$file));
		$downloadfileflag = true;

		if(!$position) {
			$mode = 'wb';
		} else {
			$mode = 'ab';
		}
		$fp = fopen($dir.$file, $mode);
		if(!$fp) {
			return 0;
		}
		$response = dfsockopen($this->upgradeurl.$upgradeinfo['latestversion'].'/'.$upgradeinfo['latestrelease'].'/'.$this->locale.'_'.$this->charset.'/'.$folder.'/'.$file.'sc', $offset, '', '', FALSE, '', 120, TRUE, 'URLENCODE', FALSE, $position);
		if($response) {
			if($offset && strlen($response) == $offset) {
				$downloadfileflag = false;
			}
			fwrite($fp, $response);
		}
		fclose($fp);

		if($downloadfileflag) {
			if(md5_file($dir.$file) == $md5) {
				return 2;
			} else {
				return 0;
			}
		} else {
			return 1;
		}
	}

	/**
	 * 创建目录及子目录
	 * @param string $dir
	 * @return bool
	 */
	public function mkdirs($dir) {
		if(!is_dir($dir)) {
			if(!self::mkdirs(dirname($dir))) {
				return false;
			}
			if(!@mkdir($dir, 0777)) {
				return false;
			}
			@touch($dir.'/index.htm'); @chmod($dir.'/index.htm', 0777);
		}
		return true;
	}

	/**
	 * 复制一个文件
	 * @global array $_G
	 * @param string $srcfile 源文件
	 * @param string $desfile 目标文件
	 * @param string $type file or ftp
	 * @return bool
	 */
	public function copy_file($srcfile, $desfile, $type) {
		global $_G;

		if(!is_file($srcfile)) {
			return false;//note 升级文件丢失
		}
		if($type == 'file') {
			$this->mkdirs(dirname($desfile));
			copy($srcfile, $desfile);
		} elseif($type == 'ftp') {
			$siteftp = $_GET['siteftp'];
			$siteftp['on'] = 1;
			$siteftp['password'] = authcode($siteftp['password'], 'ENCODE', md5($_G['config']['security']['authkey']));
			$ftp = & discuz_ftp::instance($siteftp);
			$ftp->connect();
			$ftp->upload($srcfile, $desfile);
			if($ftp->error()) {
				return false;
			}
		}
		return true;
	}

	public function versionpath() {
		$versionpath = '';
		foreach(explode(' ', substr(DISCUZ_VERSION, 1)) as $unit) {
			$versionpath = $unit;
			break;
		}
		return $versionpath;
	}

	/**
	 * 复制目录
	 * @param string $srcdir 源目录
	 * @param string $destdir 目标目录
	 */
	function copy_dir($srcdir, $destdir) {
		$dir = @opendir($srcdir);
		while($entry = @readdir($dir)) {
			$file = $srcdir.$entry;
			if($entry != '.' && $entry != '..') {
				if(is_dir($file)) {
					self::copy_dir($file.'/', $destdir.$entry.'/');
				} else {
					self::mkdirs(dirname($destdir.$entry));
					copy($file, $destdir.$entry);
				}
			}
		}
		closedir($dir);
	}
	
	/**
	 * 删除目录
	 * @param string $srcdir 目录
	 */
	function rmdirs($srcdir) {
		$dir = @opendir($srcdir);
		while($entry = @readdir($dir)) {
			$file = $srcdir.$entry;
			if($entry != '.' && $entry != '..') {
				if(is_dir($file)) {
					self::rmdirs($file.'/');
				} else {
					@unlink($file);
				}
			}
		}
		closedir($dir);
		rmdir($srcdir);
	}
}
?>