<?php
class plugin_nimba_newuser{
	function common(){
	    loadcache('plugin');
		global $_G;	
		$f = $_G['cache']['plugin']['nimba_newuser']['fgs'];
		$fid=$_G['cache']['plugin']['nimba_newuser']['baodao'];
		$group=unserialize($_G['cache']['plugin']['nimba_newuser']['group']);
		if($f&&in_array($_G['groupid'],$group)){
			if($_G['uid']&&$fid){
				$isbaodao=$this->isbaodao($_G['uid'],$fid);//0未报到
			}
			if($isbaodao==0){//开启之后，跳过上传头像和邮箱验证
				$_G['setting']['need_avatar']='';
				$_G['setting']['need_email']='';
			}
		}	
	}
    function global_header(){
	    loadcache('plugin');
		global $_G;
		$var = $_G['cache']['plugin']['nimba_newuser'];
		$open=$var['open'];
		$fid=$var['baodao'];
		$group=unserialize($var['group']);
		if($open==1&&$fid&&$_G['uid']&&in_array($_G['groupid'],$group)){//避免版块未选择
			$fgs=$this->fgs();
			if($fgs==0&&$_G['fid']!=$fid&&$this->isbaodao($_G['uid'],$fid)==0){ 
				$refresh=$var['refresh'];
				$sortid=$var['sortid'];
				$style=$var['style'];
				if($style==1){
					if($sortid) $action='forum.php?mod=forumdisplay&fid='.$fid.'&filter=sortid&sortid='.$sortid;
					else $action='forum.php?mod=forumdisplay&fid='.$fid;
				}elseif($style==2){
					//$sortid 仅当上面设置进入“发帖页”时此参数有效
					if($sortid) $action='forum.php?mod=post&action=newthread&fid='.$fid.'&sortid='.$sortid;
					else $action='forum.php?mod=post&action=newthread&fid='.$fid;
				}			
				$return="<meta http-equiv=\"refresh\" content=\"$refresh;url=$action\">\n".'<script type="text/javascript">showWindow(\'nimba_newuser\', \'plugin.php?id=nimba_newuser:ajax&'.FORMHASH.'\');</script>';
			}else return '';
			return $return;
		}
	}
	
	function isbaodao($uid,$fid){
	    $querys = DB::query("SELECT tid FROM ".DB::table('forum_thread')." where authorid=$uid and fid=$fid");
		$tid=DB::fetch($querys);
		if(empty($tid)) return 0;
		else return 1;
	}
	
	function fgs(){//设置系统防灌水功能优先运行
	    global $_G;
		$ckuser = $_G['member'];
	    if($_G['setting']['need_avatar'] && !$ckuser['avatarstatus']) $avatar=1;
		else $avatar=0;
		if($_G['setting']['need_email'] && !$ckuser['emailstatus']) $email=1;
		else $email=0;
		$return=$avatar+$email;
		return $return;
	}
 }

class plugin_nimba_newuser_forum extends plugin_nimba_newuser{ 
} 
?>