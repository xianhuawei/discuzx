<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: discuz_patch.php 33628 2013-07-22 03:48:48Z jeffjzhang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/**
 *  安全漏洞补丁类
 */
class discuz_patch {

	/**
	 * 保存更新补丁设置
	 * @param array $settingnew 设置信息
	 * @return bool
	 */
	public function save_patch_setting($settingnew) {
		if($settingnew['patch']['autoopened'] && !$this->test_writable(DISCUZ_ROOT)) {
			return false;
		}
		C::t('common_setting')->update_batch($settingnew);
		include_once libfile('function/cache');
		updatecache('setting');
		return true;
	}

	/**
	 * 获取漏洞提示信息
	 * @global array $_G
	 * @return array
	 */
	public function fetch_patch_notice() {
		global $_G;

		$serials = $fixed_serials = $unfixed_serials = array();
		$showpatchnotice = 1;
		$serials = C::t('common_patch')->fetch_all();
		if($serials) {
			foreach($serials as $serial) {
				if($serial['status'] <= 0) {
					$showpatchnotice = 2;
					$unfixed_serials[] = $serial;
				} else {
					$fixed_serials[] = $serial;
				}
			}
		}

		if($showpatchnotice == 2) {
			$serials = $unfixed_serials;
		} else {
			C::t('common_setting')->delete('showpatchnotice');
			include_once libfile('function/cache');
			updatecache('setting');
		}
		return array('fixed' => (!empty($serials) && $showpatchnotice == 1) ? 1 : 0, 'data' => $serials);
	}

	/**
	 * 查找是否有新漏洞补丁发布
	 * @return bool
	 */
	public function check_patch($ignore = 0) {
		global $_G;

		if(!$ignore && $_G['cookie']['checkpatch']) {
			return false;
		}
		require_once DISCUZ_ROOT.'source/discuz_version.php';
		require_once libfile('class/xml');

		$versionpath = '';
		foreach(explode(' ', substr(DISCUZ_VERSION, 1)) as $unit) {
			$versionpath = $unit;
			break;
		}
		$patchdir = 'http://upgrade.discuz.com/DiscuzX/'.$versionpath.'/';

		$checkurl = $patchdir.'md5sums';
		$patchlist = dfsockopen($checkurl);

		if(defined('DISCUZ_FIXBUG')) {
			C::t('common_patch')->update_status_by_serial(1, DISCUZ_FIXBUG, '<=');
		}

		if($patchlist) {
			$serial_md5s = explode("\r\n", $patchlist);
			$bound = intval(substr($serial_md5s[count($serial_md5s)-2], 0, 8));//note 获取最大值
			$maxpatch = intval(C::t('common_patch')->fetch_max_serial());
			if(defined('DISCUZ_FIXBUG')) {
				$maxpatch = $maxpatch < DISCUZ_FIXBUG ? DISCUZ_FIXBUG : $maxpatch;
			}
			if($bound > $maxpatch) {
				$insertarrlist = array();
				foreach($serial_md5s as $serial_md5) {
					$downloadpatch = $patch = '';
					list($serial, $md5, $release) = explode(' ', $serial_md5);
					if($serial > $maxpatch && (!$release || in_array(DISCUZ_RELEASE, explode(',', $release)))) {
						$downloadpatch = $patchdir.$serial.'.xml';
						$patch = dfsockopen($downloadpatch);
						if(md5($patch) != $md5) {
							continue;
						}
						$patch = xml2array($patch);
						if(is_array($patch) && !empty($patch)) {
							$insertarr = array(
								'serial' => intval($patch['serial']),
								'rule' => serialize($patch['rule']),
								'note' => $patch['note'],
								'status' => 0,
								'dateline' => $patch['dateline'],//note 发布时间
							);
							C::t('common_patch')->insert($insertarr);

							$insertarrlist[$insertarr['serial']] = $insertarr;
						}
					}
				}
				if($insertarrlist && $_G['setting']['patch']['autoopened']) {
					foreach($insertarrlist as $key => $patch) {
						$this->fix_patch($patch);
					}
				}
				if($insertarrlist) {
					C::t('common_setting')->update('showpatchnotice', 1);
					include_once libfile('function/cache');
					updatecache('setting');
				}
			}
		}
		dsetcookie('checkpatch', 1, 60);
		return true;
	}

	/**
	 * 单个漏洞修复处理
	 * @global array $_G
	 * @param array $patch 漏洞补丁信息
	 * @param string $type file or ftp
	 * @return int
	 */
	public function fix_patch($patch, $type = 'file') {

		global $_G;
		$serial = $patch['serial'];
		if(!$serial) {
			return -1;//note 没有编号信息
		}

		$returnflag = 1;
		$trymax = 1000;//note 替换文件尝试次数
		$rules = dunserialize($patch['rule']);
		$tmpfiles = $bakfiles = array();

		if($type == 'ftp') {
			$siteftp = $_GET['siteftp'];
		}

		foreach($rules as $rule) {
			$filename = DISCUZ_ROOT.$rule['filename'];
			$search = base64_decode($rule['search']);
			$replace = base64_decode($rule['replace']);
			$count = $rule['count'];
			$nums = $rule['nums'];

			if(!$siteftp && !is_writable($filename)) {
				$returnflag = -2;//note 文件不可写或不存在
				break;
			}

			$str = file_get_contents($filename);
			$findcount = substr_count($str, $search);
			if($findcount != $count) {
				$returnflag = 2;//note 匹配数量不相符 认为已经修改过漏洞相关地方，提示用户未发现漏洞
				break;
			}

			$bakfile = basename($rule['filename']);
			$bakfile = '_'.$serial.'_'.substr($bakfile, 0, strrpos($bakfile, '.')).'_'.substr(md5($_G['config']['security']['authkey']), -6).'.bak.'.substr($bakfile, strrpos($bakfile, '.') +1);
			$bakfile = $siteftp ? dirname($rule['filename']).'/'.$bakfile : dirname($filename).'/'.$bakfile;
			$tmpfile = tempnam(DISCUZ_ROOT.'./data', 'patch');

			//note 生成临时的文件，再临时文件上替换
			$strarr = explode($search, $str);
			$replacestr = '';
			foreach($strarr as $key => $value) {
				if($key == $findcount) {
					$replacestr .= $value;
				} else {
					if(in_array(($key + 1), $nums)) {//note 判断是否为需要替换位置
						$replacestr .= $value.$replace;
					} else {
						$replacestr .= $value.$search;
					}
				}
			}

			if(!file_put_contents($tmpfile, $replacestr)) {
				$returnflag = -3;//note 写入临时文件错误
				break;
			}

			//note 替换文件
			if($siteftp) {
				if(!file_exists(DISCUZ_ROOT.$bakfile) && !$this->copy_file($filename, $bakfile, 'ftp')) {//note 如果已经存在备份文件，则跳过，可能多个替换规则同为一个文件
					$returnflag = -4;//note ftp无法使用
					break;
				}
				$i = 0;
				while(!$this->copy_file($tmpfile, $rule['filename'], 'ftp')) {
					if($i >= $trymax) {
						$returnflag = -4;//note ftp无法使用
						break;
					}
					$i++;
				}
			} else {
				if(!file_exists($bakfile) && !$this->copy_file($filename, $bakfile, 'file')) {//note 如果已经存在备份文件，则跳过，可能多个替换规则同为一个文件
					$returnflag = -5;//note 文件拷贝出错
					break;
				}
				$i = 0;
				while(!$this->copy_file($tmpfile, $filename, 'file')) {
					if($i >= $trymax) {
						$returnflag = -5;//note 文件拷贝出错
						break;
					}
					$i++;
				}
			}

			$tmpfiles[] = $tmpfile;
			$bakfiles[] = $bakfile;
		}

		if($returnflag < 0) {//note 如果有替换失败，全部回退
			if(!empty($bakfiles)) {
				foreach($bakfiles as $backfile) {
					if($siteftp) {
						$i = 0;
						while(!$this->copy_file($backfile, substr($backfile, -12), 'ftp')) {
							if($i >= $trymax) {
								$returnflag = -6;//note ftp无法使用 回退中出现问题
								break;
							}
							$i++;
						}
					} else {
						$i = 0;
						while(!$this->copy_file($backfile, substr($backfile, -12), 'file')) {
							if($i >= $trymax) {
								$returnflag = -6;//note 文件拷贝出错 回退中出现问题
								break;
							}
							$i++;
						}
					}
				}
			}
		}

		//note 删除临时文件
		if(!empty($tmpfiles)) {
			foreach($tmpfiles as $tmpfile) {
				@unlink($tmpfile);
			}
		}

		C::t('common_patch')->update($serial, array('status' => $returnflag));
		return $returnflag;
	}


	/**
	 * 测试目录及子目录是否可写
	 * @param string $sdir
	 * @return boolean
	 */
	public function test_writable($sdir) {

		$dir = opendir($sdir);
		while($entry = readdir($dir)) {
			$file = $sdir.$entry;
			if($entry != '.' && $entry != '..') {
				if(is_dir($file) && !strrpos($file.'/', '.svn')) {
					if(!self::test_writable($file.'/')) {
						return false;
					}
				}
			}
		}

		if($fp = @fopen("$sdir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$sdir/test.txt");
			$writeable = true;//note 可写
		} else {
			$writeable = false;//note 不可写
		}
		return $writeable;
	}

	/**
	 * 检测补丁修改文件是否可写
	 * @param array $patch 补丁
	 * @return bool
	 */
	public function test_patch_writable($patch) {
		$rules = dunserialize($patch['rule']);
		if($rules) {
			foreach($rules as $rule) {
				if(!is_writable(DISCUZ_ROOT.$rule['filename'])) {
					return false;
				}
			}
			return true;
		}
		return false;
	}

	/**
	 * 拷贝一个文件 直接拷贝或通过ftp
	 * @global  $_G
	 * @param string $srcfile 源文件
	 * @param string $desfile 目标文件
	 * @param string $type file or ftp
	 * @return bool
	 */
	public function copy_file($srcfile, $desfile, $type) {
		global $_G;

		if(!is_file($srcfile)) {
			return false;//note 文件丢失
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

	/**
	 * 创建一个目录及子目录
	 * @param string $dir
	 * @return bool
	 */
	public function mkdirs($dir) {
		if(!is_dir($dir)) {
			if(!self::mkdirs(dirname($dir))) {
				return false;
			}
			if(!mkdir($dir)) {
				return false;
			}
		}
		return true;
	}

	/**
	 * 测试漏洞是否还存在
	 * @param array $patch 一个漏洞补丁信息
	 * @return bool
	 */
	public function test_patch($patch) {
		$serial = $patch['serial'];
		$rules = dunserialize($patch['rule']);
		foreach($rules as $rule) {
			$filename = DISCUZ_ROOT.$rule['filename'];
			$search = base64_decode($rule['search']);
			$replace = base64_decode($rule['replace']);
			$count = $rule['count'];
			$nums = $rule['nums'];

			$str = file_get_contents($filename);
			$findcount = substr_count($str, $search);
			if($findcount != $count) {
				return true;//note 已修正
			}
			//note 增加代码的情况导致查找代码仍存在，则判断替换代码是否存在
			$replacefindcount = substr_count($str, $replace);
			if($replacefindcount == $count) {
				return true;
			}
		}
		return false;//还未修正
	}

	/**
	 * 重新扫描漏洞
	 * @return bool
	 */
	public function recheck_patch() {

		$updatestatus = array();
		$patchlist = C::t('common_patch')->fetch_patch_by_status(array(1,2));
		foreach($patchlist as $patch) {
			if(!$this->test_patch($patch)) {
				$updatestatus[] = $patch['serial'];
			}
		}
		if($updatestatus) {
			C::t('common_patch')->update_status_by_serial(0, $updatestatus);
		}
		return true;
	}
}
?>