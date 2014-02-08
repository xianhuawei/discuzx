<?php
loadcache('plugin');
$var = $_G['cache']['plugin']['nimba_newuser'];
$fid=$var['baodao'];
$tips=$var['tip'];
$style=$var['style'];
$sortid=$var['sortid'];
$refresh=$var['refresh'];
$lang=array(
'appname' => '新手报到',
'tip' => '提示信息',
'tiaozhuan'=>' 秒后将自动跳转',
'dianji'=>'立刻报到',
);
if(strtolower(CHARSET) == 'utf-8') $lang=auto_charset($lang,'GBK','UTF-8');
if($style==1){
	if($sortid) $action='forum.php?mod=forumdisplay&fid='.$fid.'&filter=sortid&sortid='.$sortid;
	else $action='forum.php?mod=forumdisplay&fid='.$fid;
}elseif($style==2){
	//$sortid 仅当上面设置进入“发帖页”时此参数有效
	if($sortid) $action='forum.php?mod=post&action=newthread&fid='.$fid.'&sortid='.$sortid;
	else $action='forum.php?mod=post&action=newthread&fid='.$fid;
}


function auto_charset($fContents, $from='gbk', $to='utf-8') {
    $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
    $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
    if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
        return $fContents;
    }
    if (is_string($fContents)) {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($fContents, $to, $from);
        } elseif (function_exists('iconv')) {
            return iconv($from, $to, $fContents);
        } else {
            return $fContents;
        }
    } elseif (is_array($fContents)) {
        foreach ($fContents as $key => $val) {
            $_key = auto_charset($key, $from, $to);
            $fContents[$_key] = auto_charset($val, $from, $to);
            if ($key != $_key)
                unset($fContents[$key]);
        }
        return $fContents;
    }
    else {
        return $fContents;
    }
	}
include template('nimba_newuser:ajax');
?>