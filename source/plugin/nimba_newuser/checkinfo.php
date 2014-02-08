<?php
$info=array();
$info['name']='nimba_newuser';
$info['version']='v2.7.1';
require_once DISCUZ_ROOT.'./source/discuz_version.php';
$info['siteversion']=DISCUZ_VERSION;
$info['siterelease']=DISCUZ_RELEASE;
$info['timestamp']=TIMESTAMP;
$info['nowurl']=$_G['siteurl'];
$info['siteurl']='http://127.0.0.1/';
$info['clienturl']='http://127.0.0.1/';
$info['siteid']='076EFF68-576A-551E-00B3-44849A003B12';
$info['sn']='20140206184PBd9C1G1g';
$info['adminemail']=$_G['setting']['adminemail'];
$infobase=base64_encode(serialize($info));
?>