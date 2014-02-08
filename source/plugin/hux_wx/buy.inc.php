<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$Plang = $scriptlang['hux_wx'];
$param = array(
	'key' => 'wwevit',
	'addonid' => 'hux_wx.plugin',
);

ksort($param);
$params = '';
foreach($param as $k => $v) {
	$params .= '&'.$k.'='.rawurlencode($v);
}

$r = @implode('', file('http://open.discuz.net/api/getaddons?'.substr($params, 1)));
$r = unserialize($r);
$r_data = $r['DATA'];
foreach($r_data as $k => $v) {
	$rr[$k] = $v;
}
$r_ver = $rr['revisions'];

foreach($r_ver as $k => $v) {
	$rrr[$k] = $v;
}
showtableheader();
$i = 0;
foreach($rrr as $k => $v) {
	$v['memo'] = cutstr($v['memo'],300);		
	if (CHARSET != 'gbk') {
		$v['version'] = diconv($v['version'],'GBK');
		$v['memo'] = diconv($v['memo'],'GBK');
	}
	if ($v['price'] == 0) {
		$v['price'] = "<font color='green'>".$Plang['free']."</font>";
	} else {
		$v['price'] = "<font color='#E67403'>".$Plang['rmbfuhao'].$v['price']."</span>";
	}
	if ($v['type'] == 'component') {
		echo "<td valign='top' style='padding:2px;' height='70'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td><a href='http://addon.discuz.com/?@hux_wx.plugin.".$k."' target='_blank' title='".$v['memo']."'><strong>".$v['version']."</strong></a></td></tr><tr><td>".$Plang['huxapp_3'].$v['downloads']."</td></tr><tr><td>".$Plang['price'].$v['price']."</td></tr></table></td>";
		$i++;
		if (!($i % 5)) {
			echo "</tr><tr>";
		}
	}
}
echo "</tr>";
showtablefooter();
?>