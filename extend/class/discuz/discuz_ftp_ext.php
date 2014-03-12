<?php
/*
 *      $Id: 2013/8/22 15:27:25 discuz_ftp_ext.php Luca Shin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!defined('FTP_ERR_SERVER_DISABLED')) {
	define('FTP_ERR_SERVER_DISABLED', -100);
	define('FTP_ERR_CONFIG_OFF', -101);
	define('FTP_ERR_CONNECT_TO_SERVER', -102);
	define('FTP_ERR_USER_NO_LOGGIN', -103);
	define('FTP_ERR_CHDIR', -104);
	define('FTP_ERR_MKDIR', -105);
	define('FTP_ERR_SOURCE_READ', -106);
	define('FTP_ERR_TARGET_WRITE', -107);
}

class discuz_ftp_ext extends discuz_ftp
{

	var $enabled = false;
	var $config = array();
	var $config_ext = array();

	var $func;
	var $connectid;
	var $_error;

	var $curstorage = '';
	var $curobj;


	function __construct($config = array()) {
		global $_G;
		$this->set_error(0);
		$this->config = !$config ? getglobal('setting/ftp') : $config;
		$this->enabled = false;
		if(empty($this->config['on']) || (empty($this->config['host']) && empty($_G['config']['extend']['storage']['curstorage']))) {
			$this->set_error(FTP_ERR_CONFIG_OFF);
		} else {
			if($_G['config']['extend']['storage']['curstorage'] != '') {
				$this->curstorage = $_G['config']['extend']['storage']['curstorage'];
				$this->config_ext = $_G['config']['extend']['storage'][$this->curstorage];
				C::import('storage/'.$this->curstorage, 'vendor', true, true);

				switch($this->curstorage) {
					case 'upyun':
						$this->curobj = new UpYun($this->config_ext['bucket'], $this->config_ext['username'], $this->config_ext['password']);
						break;
					case 'aliyun':	
                    	$this->curobj = new ALIOSS($this->config_ext['access_id'], $this->config_ext['access_key'], $this->config_ext['hostname']);
                    	$this->curobj->set_debug_mode(FALSE);
						break;
					case 'qiniu':
						$GLOBALS['QINIU_UP_HOST'] = 'http://up.qiniu.com';
						$GLOBALS['QINIU_RS_HOST'] = 'http://rs.qbox.me';
						$GLOBALS['QINIU_RSF_HOST'] = 'http://rsf.qbox.me';
						Qiniu_setKeys($this->config_ext['accesskey'], $this->config_ext['secretkey']);
						$this->curobj = true;
						break;
					case 'grand':
						break;
				}
				!empty($this->curobj) && $this->enabled = true;
				return true;
			}

			$this->func = $this->config['ssl'] && function_exists('ftp_ssl_connect') ? 'ftp_ssl_connect' : 'ftp_connect';
			if($this->func == 'ftp_connect' && !function_exists('ftp_connect')) {
				$this->set_error(FTP_ERR_SERVER_DISABLED);
			} else {
				$this->config['host'] = discuz_ftp::clear($this->config['host']);
				$this->config['port'] = intval($this->config['port']);
				$this->config['ssl'] = intval($this->config['ssl']);
				$this->config['username'] = discuz_ftp::clear($this->config['username']);
				$this->config['password'] = authcode($this->config['password'], 'DECODE', md5(getglobal('config/security/authkey')));
				$this->config['timeout'] = intval($this->config['timeout']);
				$this->enabled = true;
			}
		}
	}

	function clear($str) {
		$rt = parent::clear($str);
		return str_replace(array("//"), array("/"), $rt);
	}

	function upload($source, $target) {
		if($this->error()) {
			return 0;
		}
		switch($this->curstorage) {
			case 'upyun':
				$fh = fopen($source, 'rb');
            	$target = substr($target, 0, 1) == "/" ? $target : '/'.$target;
	            $succeed = $this->curobj->writeFile($target, $fh, true);   // 上传图片，自动创建目录
                fclose($fh);
                return $succeed;
			case 'aliyun':
            	$return = $this->curobj->upload_file_by_file($this->config_ext['bucket'], substr($target, 0, 1) == "/" ? substr($target, 1) : $target, $source);
            	return substr((string)$return->status, 0, 1) == 2 ? 1 : 0; 
			case 'qiniu':
				$putPolicy = new Qiniu_RS_PutPolicy($this->config_ext['bucket']);
				$upToken = $putPolicy->Token(null);
				$putExtra = new Qiniu_PutExtra();
				$putExtra->Crc32 = 1;
				$target = substr($target, 0, 1) == '/' ? substr($target, 1) : (substr($target, 0, 2) == './' ? substr($target, 2) : $target);
				list($ret, $err) = Qiniu_PutFile($upToken, $target, $source, $putExtra);
				return $ret == null ? 0 : 1;		
			case 'grand':
				return 0;
		}

		$old_dir = $this->ftp_pwd();
		$dirname = dirname($target);
		$filename = basename($target);
		if(!$this->ftp_chdir($dirname)) {
			if($this->ftp_mkdir($dirname)) {
				$this->ftp_chmod($dirname);
				if(!$this->ftp_chdir($dirname)) {
					$this->set_error(FTP_ERR_CHDIR);
				}
				$this->ftp_put('index.htm', getglobal('setting/attachdir').'/index.htm', FTP_BINARY);
			} else {
				$this->set_error(FTP_ERR_MKDIR);
			}
		}

		$res = 0;
		if(!$this->error()) {
			if($fp = @fopen($source, 'rb')) {
				$res = $this->ftp_fput($filename, $fp, FTP_BINARY);
				@fclose($fp);
				!$res && $this->set_error(FTP_ERR_TARGET_WRITE);
			} else {
				$this->set_error(FTP_ERR_SOURCE_READ);
			}
		}

		$this->ftp_chdir($old_dir);

		return $res ? 1 : 0;
	}

	function connect() {//
		if(!$this->enabled || empty($this->config)) {
			return 0;
		} else {
			if($this->curstorage) return true;
			return $this->ftp_connect(
				$this->config['host'],
				$this->config['username'],
				$this->config['password'],
				$this->config['attachdir'],
				$this->config['port'],
				$this->config['timeout'],
				$this->config['ssl'],
				$this->config['pasv']
				);
		}

	}

	function ftp_close() {//
		if($this->curstorage) return true;
		return @ftp_close($this->connectid);
	}

	function ftp_delete($path) {//
		$path = discuz_ftp::clear($path);
		switch($this->curstorage) {
			case 'upyun':
            	$path = substr($path, 0, 1) == "/" ? $path : '/'.$path;
				return $this->curobj->delete($path);
			case 'aliyun':
            	$path = substr($path, 0, 1) == "/" ? substr($path, 1) : $path;
            	$return = $this->curobj->delete_object($this->config_ext['bucket'], $path);
            	return substr((string)$return->status, 0, 1) == 2 ? 1 : 0; 
			case 'qiniu':
				$this->curobj = new Qiniu_MacHttpClient(null);
				$path = substr($path, 0, 1) == '/' ? substr($path, 1) : (substr($path, 0, 2) == './' ? substr($path, 2) : $path);
				$err = Qiniu_RS_Delete($this->curobj, $this->config_ext['bucket'], $path);
				return $err === null ? 1 : 0;	
			case 'grand':
				return 0;
		}
		return @ftp_delete($this->connectid, $path);
	}

}
