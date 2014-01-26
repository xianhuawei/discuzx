<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_system.php 228 2013-06-25 06:57:20Z qingrongfu $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

/**
 * 检测插件状态是否正版 和新版
 */
function check_plugins() {
    $pluginarray = C::t('common_plugin')->fetch_all_data();
    $plugins = $errarry = $newarray = $nowarray = array();
    if(!$pluginarray) {
        cpmsg('plugin_not_found', '', 'error');
    }
    if(empty($_G['cookie']['addoncheck_plugin'])) {
	    $addonids = array();
	    foreach($pluginarray as $row) {
	        if(ispluginkey($row['identifier'])) {
	            $addonids[] = $row['identifier'].'.plugin';
	        }
	    }
	    $checkresult = dunserialize(cloudaddons_upgradecheck($addonids));
	    savecache('addoncheck_plugin', $checkresult);
	    dsetcookie('addoncheck_plugin', 1, 3600);
    }
    
    foreach($pluginarray as $row) {
    	$addonid = $row['identifier'].'.plugin';
    	if(isset($checkresult[$addonid])) {
    		list($return, $newver, $sysver) = explode(':', $checkresult[$addonid]);
    		$result[$row['identifier']]['result'] = $return;
    		if($sysver) {
    			if($sysver > $row['version']) {
    				$result[$row['identifier']]['result'] = 2;
    				$result[$row['identifier']]['newver'] = $sysver;
    			} else {
    				$result[$row['identifier']]['result'] = 1;
    			}
    		} elseif($newver) {
    			$result[$row['identifier']]['newver'] = $newver;
    		}
    	}
    	$plugins[$row['identifier']] = $row['name'].' '.$row['version'];
    }
    
	foreach($result as $id => $row) {
		if($row['result'] == 0) {
			$errarray[] = '<a href="'.ADMINSCRIPT.'?action=cloudaddons&id='.$id.'.plugin" target="_blank">'.$plugins[$id].'</a>';
		} elseif($row['result'] == 2) {
			$newarray[] = '<a href="'.ADMINSCRIPT.'?action=cloudaddons&id='.$id.'.plugin" target="_blank">'.$plugins[$id].($row['newver'] ? ' -> '.$row['newver'] : '').'</a>';
		}
	}
   	
	if(!$newarray && !$errarray) {
		cpmsg('plugins_validator_noupdate', '', 'error');
	} else {
		showtableheader();
		if($newarray) {
			showtitle('plugins_validator_newversion');
			foreach($newarray as $row) {
				showtablerow('class="hover"', array(), array($row));
			}
		}
		if($errarray) {
			showtitle('plugins_validator_error');
			foreach($errarray as $row) {
				showtablerow('class="hover"', array(), array($row));
			}
		}
		showtablefooter();
	}
}

/**
 * 检查目录php执行权限
 * @return int 0-读写错误；1-url可以执行php存在风险；2-url不可执行php不存在风险 
 */
function check_dir() {
	global $_G;
	$checkdir = DISCUZ_ROOT.'./data/';
	$checkfile = md5(TIMESTAMP).'.php';
	$checkpath = $checkdir.$checkfile;
	$checkurl = $_G['siteurl'].'/data/';
	$rand = rand(1,10);
	
	if($fp = @fopen($checkpath, 'a')) {
		@flock($fp, 2);
		fwrite($fp, "<?PHP echo $rand; exit;?>");
		fclose($fp);
		$num = dfsockopen($checkurl.$checkfile);
		if((int)$num == $rand) {
			$result = 1;
		} else {
			$result = 2;
		}
		@unlink($checkpath);
	} else {
		$result = 0;
	}
	return $result;
}

/**
 * 遍历目录
 * @param $filter array 遍历文件的扩展名。
 * @param $remove array 移除不遍历的文件夹名
 * @return array 文件列表 
 */
function list_dir($dir, $filter = '', $remove = '') {
	$result = array();
	if(is_dir($dir)) {
		$file_dir = scandir($dir);
		foreach($file_dir as $file) {
			if($file == '.'||$file == '..') {
				continue;
			} elseif(is_dir($dir.$file)) {
				if(!in_array($dir.$file, $remove)) {
					$result = array_merge($result, list_dir($dir.$file.'/', $filter, $remove));
				}
			} else {
				$ext = end(explode('.', $file));
				if(in_array($ext, $filter)) {
					array_push($result, $dir.$file);
				}
			}
		}
	}
	return $result;
}

function cdd_matchd($filepath) {
	$contents = file_get_contents($filepath);
	
	$rules = array();
	$ruledir =    DS_ROOT.'./misc/cdd_rule.php';
	$ruleadddir = DS_ROOT.'./misc/cdd_ruleext.php';
	$rules = array();
	$rules = cdd_getrule($ruledir);
	if(file_exists($ruleadddir)) {
		$ruleadd = cdd_getrule($ruleadddir);
		is_array($ruleadd) && $rules = array_merge($rules, $ruleadd);
	}

	$high_risk = false;
	foreach($rules as $key => $val) {
		foreach($val as $rule) {
			$val_tmp = $match = array();
			$func_match = 'preg_match';
			if($key == '2' && strpos($rule, '<==>') !== false) {
				$val_tmp = explode('<==>', $rule);
				$rule = $val_tmp['0'];
				$func_match = 'preg_match_all';
			}
			if($func_match(trim($rule), $contents, $match)) {
				if($key == '2' && $val_tmp['1']) {
					foreach($match['1'] as $val) {
						if(@preg_match(trim(str_replace('\\1', $val, $val_tmp['1'])), $contents, $match)) {
							$high_risk = true;
							runlog('cdd_scan_danger', "\t".$filepath."\t".date("Y-m-d H:i:s", filemtime($filepath))."\t".$match[0]."\t".$rule);
							break;
						} else {
							continue;
						}
					}
				} else {
					if(in_array($key, array('0', '1'))) {
						runlog('cdd_scan_danger', "\t".$filepath."\t".date("Y-m-d H:i:s", filemtime($filepath))."\t".$match[0]."\t".$rule);
						$high_risk = true;
						break;
					} else {
						runlog('cdd_scan_warning', "\t".$filepath."\t".date("Y-m-d H:i:s", filemtime($filepath))."\t".$match[0]."\t".$rule);
					}
				}
			}
		}
	}
	return $high_risk;
}

function cdd_getrule($ruledir) {
	$rules = $risks = array();
	$rules = file_get_contents($ruledir);
	empty($rules) ? exit('Can\'t find file: '.$ruledir.'.') : $rules = explode('<rule>', $rules);
	$rules = str_replace(array(",\r\n", ",\r"), ",\n", $rules);
	foreach($rules as $key => $val) {
		$risks[$key] = array_filter(explode(",\n", $val), 'trim');
	}
	return $risks;
}

function get_logs($logdir = '', $action) {
	$dir = opendir($logdir);
	$files = array();
	while($entry = readdir($dir)) {
		$files[] = $entry;
	}
	closedir($dir);

	if($files) {
		sort($files);
		$logfile = $action;
		$logfiles = array();
		$ym = '';
		foreach($files as $file) {
			if(strpos($file, $logfile) !== FALSE) {
				if(substr($file, 0, 6) != $ym) {
					$ym = substr($file, 0, 6);
				}
				$logfiles[$ym][] = $file;
			}
		}
		if($logfiles) {
			$lfs = array();
			foreach($logfiles as $ym => $lf) {
				$lastlogfile = $lf[0];
				unset($lf[0]);
				$lf[] = $lastlogfile;
				$lfs = array_merge($lfs, $lf);
			}
			$lastkey = count($lfs) - 1;
			$lastlog = $lfs[$lastkey];
			krsort($lfs);
			$logs = file($logdir.$lastlog);
			return $logs;
		}
		return False;
	}
	return False;
}

function fmt_logs($logs) {
	$logs = array_reverse($logs);
	$newlogs = array();
	foreach($logs as $logrow) {
		if(empty($logrow[1]))	continue;
		$newlogs[] = $logrow;
	}
	return $newlogs;
}

function today_logs($logs) {
	$newlogs = array();
	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		$date = explode(" ", $log[1]);
		$date = dmktime($date[0]);
		$now = time();
		if($now - $date < 86400) {
			$newlogs[] = $logrow;
		} else {
			break;
		}
	}
	return $newlogs;
}
?>