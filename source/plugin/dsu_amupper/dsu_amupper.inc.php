<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

if($_GET['formhash'] != FORMHASH) {
    exit(json_encode(array('status'=>0,'message'=>lang('undefined_action'),'checkin'=>0)));
}

if($_G['uid']){
    $thisvars = $_G['cache']['plugin']['dsu_amupper'];
    $thisvars['offset'] = $_G['setting']['timeoffset'];
    $thisvars['gids'] = (array)unserialize($thisvars['gids']);
    $thisvars['today'] = dgmdate($_G['timestamp'],'Ymd',$thisvars['offset']);
    $thisvars['uid'] = C::t('#dsu_amupper#plugin_dsuamupper')->fetch($_G['uid']);
    $this_time = istoday($thisvars['uid']['lasttime']);
    $this_Hs = isH($thisvars['uid']['lasttime']);
    $this_H = $this_Hs['return'];
    $ptjfname = $_G['setting']['extcredits'][$thisvars['ptjf']]['title'];
}else{
    exit(json_encode(array('status'=>0,'message'=>'没有登录!','checkin'=>0)));
}

if(!in_array($_G['groupid'],$thisvars['gids'])){
    exit(json_encode(array('status'=>0,'message'=>'你所在的组暂时不支持签到!','checkin'=>0)));
}

//普通奖励积分的计算与是否连续签到的判断
if($this_time == -1 || $thisvars['sz']){
    //昨天打卡了或者默认允许连续打卡
    $cons = $thisvars['uid']['cons']=="" ? 1 : $thisvars['uid']['cons'] + 1 ;
    $addup = $thisvars['uid']['addup'] + 1 ;
}elseif($this_time == 0){
    //今天打过卡了
    $cons = $thisvars['uid']['cons'];
    $addup = $thisvars['uid']['addup'];
}else{
    //断断续续打卡
    $cons = 1;
    $addup = $thisvars['uid']['addup'] + 1 ;
}

if ($this_time != 0) {
	if (dsucheckformulacredits ( $thisvars ['ptgs'] )) {
		$amu_formula = str_replace ( "leiji", $addup, $thisvars ['ptgs'] );
		$amu_formula = str_replace ( "lianxu", $cons, $amu_formula );
		@eval ( "\$pt = $amu_formula;" );
		$pt = empty ( $thisvars ['ptmax'] ) ? intval ( $pt ) : intval ( min ( $pt, $thisvars ['ptmax'] ) );
		$amu_formula_n = str_replace ( "leiji", $addup + 1, $thisvars ['ptgs'] );
		$amu_formula_n = str_replace ( "lianxu", $cons + 1, $amu_formula_n );
		@eval ( "\$pt_n = $amu_formula_n;" );
		$pt_n = empty ( $thisvars ['ptmax'] ) ? intval ( $pt_n ) : intval ( min ( $pt_n, $thisvars ['ptmax'] ) );
	} else {
		$pt = $pt_n = 1;
	}
	
	// 获取特殊奖励配置情况
	$tsarr = C::t ( '#dsu_amupper#plugin_dsuamupperc' )->fetch_all_by_g_id ();
	$data_f2a = dstripslashes ( $tsarr );
	$next_old = '';
	if ($tsarr && $thisvars ['ms'] == 3) {
		// 有特殊奖励（不循环）
		foreach ( $data_f2a as $id => $result ) {
			if (($_G ['groupid'] == $result ['usergid'] || $result ['usergid'] <= '0') && $cons == $result ['days']) {
				$teshu [$id] = $result;
				$tsmsg [] = array (
						'title' => $_G ['setting'] ['extcredits'] [$result ['extcredits']] ['title'],
						'reward' => $result ['reward'] 
				);
			}
		}
	}
	// 有特殊奖励（循环）
	if ($tsarr && $thisvars ['ms'] == 4) {
		foreach ( $data_f2a as $id => $result ) {
			$yushu = $cons % $result ['days'];
			if (($_G ['groupid'] == $result ['usergid'] || $result ['usergid'] <= '0') && $yushu == 0 && $cons > 0) {
				$teshu [$id] = $result;
				$tsmsg [] = array (
						'title' => $_G ['setting'] ['extcredits'] [$result ['extcredits']] ['title'],
						'reward' => $result ['reward'] 
				);
			}
			$next = $result ['days'] - ($cons % $result ['days']);
			$cons_next = $cons + $next;
		}
	}
	if (file_exists ( DISCUZ_ROOT . './data/tid_amupper.lock' )) {
		exit ( json_encode ( array (
				'status' => 0,
				'message' => '非法提交数据',
				'checkin' => 0 
		) ) );
	} else {
		$jiangliba = 0;
		if ($this_time < 0 && $thisvars ['uid'] ['time'] != dgmdate ( $_G ['timestamp'], 'Ymd', $_G ['setting'] ['timeoffset'] )) {
			switch ($thisvars ['ms']) {
				case 1 :
					
					// 关闭插件
					break;
				
				case 2 :
					
					// 无特殊奖励
					if ($addup == 1 && $cons == 0) {
						$return_msg = '签到成功 获得奖励' . $ptjfname . '+' . $pt . '，明日签到将获得' . $ptjfname . '+' . $pt_n;
					} else {
						$return_msg = '连续签到' . $cons . '天，获得奖励 ' . $ptjfname . '+' . $pt . '，明日签到将获得' . $ptjfname . '+' . $pt_n;
					}
					break;
				// 特殊奖励
				case 3 :
				case 4 :
					if ($tsmsg) {
						foreach ( $tsmsg as $v ) {
							$tsmsg2 .= $v ['title'] . '  +' . $v ['reward'];
						}
						$return_msg = '特殊奖励： 您已连续签到' . $cons . '天，获得特殊奖励 ' . $tsmsg2 . ',' . $ptjfname . ' +' . $pt . '。明日签到将获得' . $ptjfname . '+' . $pt_n;
					} else {
						if ($addup == 1 && $cons == 0) {
							$return_msg = '签到成功 获得奖励' . $ptjfname . ' +' . $pt . '，明日签到将获得' . $ptjfname . '+' . $pt_n;
						} else {
							$return_msg = '连续签到' . $cons . '天，获得奖励 ' . $ptjfname . ' +' . $pt . '，明日签到将获得' . $ptjfname . '+' . $pt_n;
						}
					}
					break;
			}
			// 关掉发帖功能
			// if($thisvars['ft']){
			// $subject = str_replace("time",dgmdate($_G['timestamp'],'Y-m-d',$thisvars['offset']),$thisvars['bt']);
			// $today = dgmdate($_G['timestamp'],'Ymd',$thisvars['offset']);
			//
			// $arr=C::t('#dsu_amupper#plugin_dsuamupper')->fetch_allow_by_today($today);
			// $thistid = C::t('forum_thread')->fetch($arr['allow']);
			//
			// if($arr['allow'] && $thistid['displayorder'] <> -1 && $thistid['closed'] == 1 ){
			// $arr['pid'] = addnewpid($thisvars['ft'],$arr['allow'],$subject,$return_msg);
			// }elseif($arr['allow'] && $thistid['displayorder'] == -1 && $thistid['closed'] == 1){
			// $id = addnewtid($thisvars['ft'], $subject, $return_msg, $thisvars['ztfn']);
			// $arr['pid'] = $id['pid'];$arr['allow'] = $id['tid'];
			// C::t('#dsu_amupper#plugin_dsuamupper')->update_allow_by_today($today,$arr['allow']);
			// }elseif(!$arr['allow'] || !$thistid){
			// $id = addnewtid($thisvars['ft'], $subject, $return_msg, $thisvars['ztfn']);
			// $arr['pid'] = $id['pid'];$arr['allow'] = $id['tid'];
			// C::t('#dsu_amupper#plugin_dsuamupper')->update_allow_by_today($today,$arr['allow']);
			// }
			//
			// if($arr['allow'] && $arr['pid']){
			//
			// if(!empty($thisvars['uid'])){
			// $update_data = array(
			// 'addup'=>intval($addup),
			// 'cons'=>intval($cons),
			// 'lasttime'=>intval($_G['timestamp']),
			// 'time'=>intval($today),
			// 'allow'=>intval($arr['allow']),
			// );
			// C::t('#dsu_amupper#plugin_dsuamupper')->update($_G['uid'],$update_data);
			// }else{
			// $insert_data = array(
			// 'uid'=>intval($_G['uid']),
			// 'uname'=>dhtmlspecialchars("'".addslashes($_G['username'])."'"),
			// 'addup'=>intval($addup),
			// 'cons'=>intval($cons),
			// 'lasttime'=>intval($_G['timestamp']),
			// 'time'=>intval($today),
			// 'allow'=>intval($arr['allow']),
			// );
			// C::t('#dsu_amupper#plugin_dsuamupper')->insert($insert_data);
			// }
			// $jiangliba = 1;
			//
			// }
			//
			// }
			if (! empty ( $thisvars ['uid'] )) {
				$update_data = array (
						'addup' => intval ( $addup ),
						'cons' => intval ( $cons ),
						'lasttime' => intval ( $_G ['timestamp'] ),
						'time' => intval ( $today ),
						'allow' => intval ( $arr ['allow'] ) 
				);
				C::t ( '#dsu_amupper#plugin_dsuamupper' )->update ( $_G ['uid'], $update_data );
			} else {
				$insert_data = array (
						'uid' => intval ( $_G ['uid'] ),
						'uname' => dhtmlspecialchars ( "'" . addslashes ( $_G ['username'] ) . "'" ),
						'addup' => intval ( $addup ),
						'cons' => intval ( $cons ),
						'lasttime' => intval ( $_G ['timestamp'] ),
						'time' => intval ( $today ),
						'allow' => intval ( $arr ['allow'] ) 
				);
				C::t ( '#dsu_amupper#plugin_dsuamupper' )->insert ( $insert_data );
			}
			$jiangliba = 1;
			
			// 删除统计缓存
			$nt1 = dgmdate ( $_G ['timestamp'], 'i', $_G ['setting'] ['timeoffset'] );
			$nt2 = dgmdate ( $_G ['timestamp'], 's', $_G ['setting'] ['timeoffset'] );
			$nt = $nt1 * 60 + $nt2;
			$Htime = $_G ['timestamp'] - $nt;
			$mem_key = 'plugin_dsuamupper::count_by_lasttime' . $Htime . '>=';
			memory ( 'rm', $mem_key );
			
			if ($jiangliba == 1) {
				switch ($thisvars ['ms']) {
					case 1 :
						
						// 关闭插件
						break;
					
					case 2 :
						
						// 无特殊奖励
						updatemembercount ( $_G ['uid'], array (
								"extcredits{$thisvars['ptjf']}" => $pt 
						), true, '', 0 );
						break;
					
					case 3 :
						
						// 特殊奖励(N)非循环
						if (is_array ( $teshu )) {
							foreach ( $teshu as $id => $result ) {
								updatemembercount ( $_G ['uid'], array (
										"extcredits{$result['extcredits']}" => $result ['reward'] 
								), true, '', 0 );
							}
						}
						updatemembercount ( $_G ['uid'], array (
								"extcredits{$thisvars['ptjf']}" => $pt 
						), true, '', 0 );
						break;
					
					case 4 :
						
						// 特殊奖励(Y)循环
						if (is_array ( $teshu )) {
							foreach ( $teshu as $id => $result ) {
								updatemembercount ( $_G ['uid'], array (
										"extcredits{$result['extcredits']}" => $result ['reward'] 
								), true, '', 0 );
							}
						}
						updatemembercount ( $_G ['uid'], array (
								"extcredits{$thisvars['ptjf']}" => $pt 
						), true, '', 0 );
						break;
				}
			}
		}
	}
}
//elseif($this_time == 0 && $this_H){
//    //今天连续打卡&整点打卡
//    $Hreward = rand($this_Hs['minreward'],$this_Hs['maxreward']);
//    $return_msg = '整点签到成功! 获得额外奖励'.$ptjfname.'+'.$Hreward;
//    C::t('#dsu_amupper#plugin_dsuamupper')->update($_G['uid'],array('lasttime'=> $_G['timestamp']));
//    updatemembercount($_G['uid'], array("extcredits{$thisvars['ptjf']}" => $Hreward), true,'',0);
//}

if($return_msg){
    if(defined('VIP_INITED')) vip::hooks('sign');
    dsetcookie('dsu_amuppered', $_G['uid'], 3600);
    dsetcookie('dsu_amupper', 0, 1);
    if($arr['allow'] && $arr['pid']){
        $url = "forum.php?mod=redirect&goto=findpost&ptid={$arr['allow']}&pid={$arr['pid']}";
        if($thisvars['autogo'] && empty($_GET['nojump'])){ //打卡后调到到指定位置
            exit(json_encode(array('status'=>1,'message'=>$return_msg,'checkin'=>1)));
        }else{
            exit(json_encode(array('status'=>1,'message'=>$return_msg,'checkin'=>1)));
        }

    }else{
        exit(json_encode(array('status'=>1,'message'=>$return_msg,'checkin'=>1)));
    }
}else{
    dsetcookie('dsu_amuppered', $_G['uid'], 600);
    dsetcookie('dsu_amupper', 0, 1);
    exit(json_encode(array('status'=>0,'message'=>'您已签到完毕，今日已无需再次签到！','checkin'=>0)));
}
///自定义函数区
function istoday($time){
    global $_G;
    $time = empty($time) ? 0 : $time ;
    $today = dgmdate($_G['timestamp'],'Ymd', $_G['setting']['timeoffset']);
    $yesterday = dgmdate($_G['timestamp']-3600*24,'Ymd',$_G['setting']['timeoffset']);
    $lastday = dgmdate($time,'Ymd',$_G['setting']['timeoffset']);
    $days = $lastday - $today;
    if($lastday == $yesterday){$days = -1;}
    return $days ;
}


function isH($time){
    global $_G;
    include_once 'source/plugin/dsu_amupper/config.php';
    if($pperconfig['max'] && $pperconfig['minreward'] && $pperconfig['maxreward']){
        $nt1 = dgmdate($_G['timestamp'],'i',$_G['setting']['timeoffset']);
        $nt2 = dgmdate($_G['timestamp'],'s',$_G['setting']['timeoffset']);
        $nt = $nt1*60 + $nt2;
        $Htime =$_G['timestamp'] - $nt;
        $Hnum = C::t('#dsu_amupper#plugin_dsuamupper')->count_by_lasttime($Htime);
        $time = empty($time) ? 0 : $time ;
        $nowtime = dgmdate($_G['timestamp'],'H',$_G['setting']['timeoffset']);
        $last = dgmdate($time,'H',$_G['setting']['timeoffset']);
        $H = $pperconfig;
        $H['ok'] = 1;
        $H['return'] = $last + 1 > $nowtime  ? 0 : 1;
        $H['return'] = $Hnum < $pperconfig['max'] ? $H['return'] : 0;
    }
    return $H;
}

function dsucheckformulsyntax($formula, $operators, $tokens) {
    $var = implode('|', $tokens);
    $operator = implode('', $operators);

    $operator = str_replace(
        array('+', '-', '*', '/', '(', ')', '{', '}', '\''),
        array('\+', '\-', '\*', '\/', '\(', '\)', '\{', '\}', '\\\''),
        $operator
    );

    if(!empty($formula)) {
        if(!preg_match("/^([$operator\.\d\(\)]|(($var)([$operator\(\)]|$)+))+$/", $formula) || !is_null(eval(preg_replace("/($var)/", "\$\\1", $formula).';'))){
            return false;
        }
    }
    return true;
}

function dsucheckformulacredits($formula) {
    return dsucheckformulsyntax(
        $formula,
        array('+', '-', '*', '/', ' '),
        array('lianxu', 'leiji')
    );
}

function addnewtid($fid,$subject,$message,$typeid=0){
    global $_G;
    if($_G['uid'] && $fid && $subject && $message){
        require_once libfile('function/forum');
        DB::insert('forum_thread', array(
            'fid'=>$fid,
            'author'=>$_G['username'],
            'authorid'=>$_G['uid'],
            'subject' =>$subject,
            'typeid' => $typeid,
            'dateline' => $_G['timestamp'],
            'lastpost' => $_G['timestamp'],
            'lastposter'=>$_G['username'],
            'closed'=>1));

        $id['tid'] = $tid = DB::insert_id();

        if($tid){
            $message = '[b]'.$_G['username'].'[/b],'.$message;
            $id['pid']=insertpost(array(
                'fid'=>$fid,
                'tid' => $tid,
                'first'=>'1',
                'author'=>$_G['username'],
                'authorid'=>$_G['uid'],
                'subject'=>$subject,
                'dateline'=>$_G['timestamp'],
                'message'=>$message,
                'useip'=>$_G['clientip']));
            $lastpost = "$tid\t".addslashes($subject)."\t$_G[timestamp]\t".addslashes($_G['username']);
            DB::query('UPDATE '.DB::table('forum_forum')." SET threads=threads+'1', todayposts=todayposts+1, lastpost='{$lastpost}' WHERE fid=".$fid);
        }
    }

    return $id;
}

function addnewpid($fid,$tid,$subject='',$message){
    global $_G;
    if($_G['uid'] && $fid && $tid && $message){
        require_once libfile('function/forum');
        $message = '[b]'.$_G['username'].'[/b],'.$message;
        $pid=insertpost(array(
            'fid'=>$fid,
            'tid'=>$tid,
            'first'=>'0',
            'author'=>$_G['username'],
            'authorid'=>$_G['uid'],
            'subject'=>'',
            'dateline'=>$_G['timestamp'],
            'message'=>$message,
            'useip'=>$_G['clientip']));
        if($pid){
            DB::query("UPDATE ".DB::table('forum_thread')." SET lastposter='".addslashes($_G['username'])."', lastpost='$_G[timestamp]', replies=replies+1 WHERE tid='$tid' AND fid='$fid'", 'UNBUFFERED');
            $lastpost = "$tid\t".addslashes($subject)."\t$_G[timestamp]\t".addslashes($_G['username']);
            DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', posts=posts+1, todayposts=todayposts+1 WHERE fid='$fid'", 'UNBUFFERED');
            return $pid;
        }
    }

}
?>


