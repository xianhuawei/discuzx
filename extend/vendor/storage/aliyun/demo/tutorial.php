<?php
/**
 * 加载sdk包以及错误代码包
 */
require_once '../sdk.class.php';

$oss_sdk_service = new ALIOSS();

//设置是否打开curl调试模式
$oss_sdk_service->set_debug_mode(FALSE);

//设置开启三级域名，三级域名需要注意，域名不支持一些特殊符号，所以在创建bucket的时候若想使用三级域名，最好不要使用特殊字符
//$oss_sdk_service->set_enable_domain_style(TRUE);

/**
 * 测试程序
 */
try{
	/**
	 * Service相关操作
	 */
	//get_service($oss_sdk_service);
	
	/**
	 * Bucket相关操作
	 */
	//create_bucket($oss_sdk_service);
	//delete_bucket($oss_sdk_service);
	//set_bucket_acl($oss_sdk_service);
	//get_bucket_acl($oss_sdk_service);
	
	/**
	 * Object相关操作
	 */
	//list_object($oss_sdk_service);
	//create_directory($oss_sdk_service);
    //upload_by_content($oss_sdk_service);
   	//upload_by_file($oss_sdk_service);
	//copy_object($oss_sdk_service);
	//get_object_meta($oss_sdk_service);   
	//delete_object($oss_sdk_service);    
	//delete_objects($oss_sdk_service);   
	//get_object($oss_sdk_service);       
	//is_object_exist($oss_sdk_service);   
	//upload_by_multi_part($oss_sdk_service); 
	//upload_by_dir($oss_sdk_service); 
	//batch_upload_file($oss_sdk_service);
	
	/**
	 * 外链url相关
	 */
	//get_sign_url($oss_sdk_service);
	
}catch (Exception $ex){
	die($ex->getMessage());
}

/**
 * 函数定义
 */
/*%**************************************************************************************************************%*/
// Service 相关

//获取bucket列表
function get_service($obj){
	$response = $obj->list_bucket();
	_format($response);
}

/*%**************************************************************************************************************%*/
// Bucket 相关

//创建bucket
function create_bucket($obj){
	$bucket = 'phpsdk'.time();
	$acl = ALIOSS::OSS_ACL_TYPE_PRIVATE;
	//$acl = ALIOSS::OSS_ACL_TYPE_PUBLIC_READ;
	//$acl = ALIOSS::OSS_ACL_TYPE_PUBLIC_READ_WRITE;
	
	$response = $obj->create_bucket($bucket,$acl);
	_format($response);
}

//删除bucket
function delete_bucket($obj){
	$bucket = 'phpsdk1349849369';
	
	$response = $obj->delete_bucket($bucket);
	_format($response);
}

//设置bucket ACL
function set_bucket_acl($obj){
	$bucket = 'phpsdk1349849394';
	//$acl = ALIOSS::OSS_ACL_TYPE_PRIVATE;
	//$acl = ALIOSS::OSS_ACL_TYPE_PUBLIC_READ;
	$acl = ALIOSS::OSS_ACL_TYPE_PUBLIC_READ_WRITE;
	
	$response = $obj->set_bucket_acl($bucket,$acl);
	_format($response);
}

//获取bucket ACL
function get_bucket_acl($obj){
	$bucket = 'phpsdk1349849394';
	$options = array(
		ALIOSS::OSS_CONTENT_TYPE => 'text/xml',
	);
		
	$response = $obj->get_bucket_acl($bucket,$options);
	_format($response);	
}

/*%**************************************************************************************************************%*/
// Object 相关

//获取object列表
function list_object($obj){
	$bucket = 'phpsdk1349849394';
	$options = array(
		'delimiter' => '',
		'prefix' => '',
		'max-keys' => 100,
		//'marker' => 'myobject-1330850469.pdf',
	);
	
	$response = $obj->list_object($bucket,$options);	
	_format($response);
}

//创建目录
function create_directory($obj){
	$bucket = 'phpsdk1349849394';
	$dir = 'myfoloder-'.time();
	
	$response  = $obj->create_object_dir($bucket,$dir);
	_format($response);
}

//通过内容上传文件
function upload_by_content($obj){
	$bucket = 'phpsdk1349849394';
	$folder = 'object001/';
	
	for($index = 100;$index < 999;$index++){	
		
		$object = $folder.'myobj_'.$index.'.txt';
		
		$content  = 'uploadfile';
		/**
	    for($i = 1;$i<100;$i++){
			$content .= $i;
		}
		*/
	    
		$upload_file_options = array(
			'content' => $content,
			'length' => strlen($content),
			ALIOSS::OSS_HEADERS => array(
				'Expires' => '2012-10-01 08:00:00',
			),
		);
		
		$response = $obj->upload_file_by_content($bucket,$object,$upload_file_options);
		echo 'upload file {'.$object.'}'.($response->isOk()?'ok':'fail')."\n";
	}
	//_format($response);
}

//通过路径上传文件
function upload_by_file($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'netbeans-7.1.2-ml-cpp-linux.sh';	
	$file_path = "D:\\TDDOWNLOAD\\netbeans-7.1.2-ml-cpp-linux.sh";
	
	$response = $obj->upload_file_by_file($bucket,$object,$file_path);
	_format($response);
}

//拷贝object
function copy_object($obj){
		//copy object
		$from_bucket = 'phpsdk1349849394';
		$from_object = 'netbeans-7.1.2-ml-cpp-linux.sh';
		$to_bucket = 'phpsdk1349849394';
		$to_object = 'copy-netbeans-7.1.2-ml-cpp-linux-'.time().'.sh';

		$response = $obj->copy_object($from_bucket,$from_object,$to_bucket,$to_object);
		_format($response);
}

//获取object meta
function get_object_meta($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'netbeans-7.1.2-ml-cpp-linux.sh'; 

	$response = $obj->get_object_meta($bucket,$object);
	_format($response);
}

//删除object
function delete_object($obj){
	$bucket = 'phpsdk1349849394';	
	$object = 'myfoloder-1349850939/';
	$response = $obj->delete_object($bucket,$object);
	_format($response);
}

//删除objects
function delete_objects($obj){
	$bucket = 'phpsdk1349849394';
	$objects = array('myfoloder-1349850940/','myfoloder-1349850941/',);   
	
	$options = array(
		'quiet' => false,
		//ALIOSS::OSS_CONTENT_TYPE => 'text/xml',
	);
	
	$response = $obj->delete_objects($bucket,$objects,$options);
	_format($response);
}

//获取object
function get_object($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'netbeans-7.1.2-ml-cpp-linux.sh'; 
	
	$options = array(
		ALIOSS::OSS_FILE_DOWNLOAD => "d:\\cccccccccc.sh",
		//ALIOSS::OSS_CONTENT_TYPE => 'txt/html',
	);	
	
	$response = $obj->get_object($bucket,$object,$options);
	_format($response);
}

//检测object是否存在
function is_object_exist($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'netbeans-7.1.2-ml-cpp-linux.sh';  
							
	$response = $obj->is_object_exist($bucket,$object);
	_format($response);
}

//通过multipart上传文件
function upload_by_multi_part($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'Mining.the.Social.Web-'.time().'.pdf';  //英文
	$filepath = "D:\\Book\\Mining.the.Social.Web.pdf";  //英文
		
	$options = array(
		ALIOSS::OSS_FILE_UPLOAD => $filepath,
		'partSize' => 5242880,
	);

	$response = $obj->create_mpu_object($bucket, $object,$options);
	_format($response);
}

//通过multipart上传整个目录
function upload_by_dir($obj){
	$bucket = 'phpsdk1349849394';
	$dir = "D:\\alidata\\www\\logs\\aliyun.com\\oss\\";
	$recursive = false;
	
	$response = $obj->create_mtu_object_by_dir($bucket,$dir,$recursive);
	var_dump($response);	
}

//通过multi-part上传整个目录(新版)
function batch_upload_file($obj){
	$options = array(
		'bucket' 	=> 'phpsdk1349849394',
		'object'	=> 'picture',
		'directory' => 'D:\alidata\www\logs\aliyun.com\oss',
	);
	$response = $obj->batch_upload_file($options);
}



/*%**************************************************************************************************************%*/
// 签名url 相关

//生成签名url,主要用户私有权限下的访问控制
function get_sign_url($obj){
	$bucket = 'phpsdk1349849394';
	$object = 'netbeans-7.1.2-ml-cpp-linux.sh';
	$timeout = 3600;

	$response = $obj->get_sign_url($bucket,$object,$timeout);
	var_dump($response);
}

/*%**************************************************************************************************************%*/
// 结果 相关

//格式化返回结果
function _format($response) {
	echo '|-----------------------Start---------------------------------------------------------------------------------------------------'."\n";
	echo '|-Status:' . $response->status . "\n";
	echo '|-Body:' ."\n"; 
	echo $response->body . "\n";
	echo "|-Header:\n";
	print_r ( $response->header );
	echo '-----------------------End-----------------------------------------------------------------------------------------------------'."\n\n";
}




