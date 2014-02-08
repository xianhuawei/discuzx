<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$Plang = $scriptlang['hux_wx'];
$param = array(
	'key' => 'wwevit',
);

ksort($param);
$params = '';
foreach($param as $k => $v) {
	$params .= '&'.$k.'='.rawurlencode($v);
}

$r = @implode('', file('http://open.discuz.net/api/getaddons?'.substr($params, 1)));
$r = unserialize($r);
$allappnum = $r['COUNT'];
$r_data = $r['DATA'];
foreach($r_data as $k => $v) {
	$allarr[] = $v['downloads'];
	$rr[$k] = $v;
}
$alldowns = array_sum($allarr);
showtableheader();
echo "<h2>".$Plang['huxapp_1'].$allappnum." ".$Plang['huxapp_2'].$alldowns."</h2><br><tr class='header'>".$Plang['huxapp_4']."</tr><tr>";
$i = 0;
foreach($rr as $k => $v) {
	if (CHARSET != 'gbk') {
		$v['name'] = diconv($v['name'],'GBK',CHARSET);
	}
	$vv = explode('.',$v['ID']);
	if ($vv[1] == 'plugin') {
		echo "<td width='45' height='60' valign='top'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><img src='".$v[logo]."' width='40' height='40' border='0' align='absmiddle' alt='".$v[name]."' /></a></td><td width='".$jppaiwidth."%' valign='top' style='padding:2px;'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><strong>$v[name]</strong></a><br>".$Plang['huxapp_3'].$v[downloads]."</td>";
		$i++;
		if (!($i % 4)) {
			echo "</tr><tr>";
		}
	}
}
echo "</tr>";
showtablefooter();
showtableheader();
echo "<br><tr class='header'>".$Plang['huxapp_5']."</tr><tr>";
$i = 0;
foreach($rr as $k => $v) {
	if (CHARSET != 'gbk') {
		$v['name'] = diconv($v['name'],'GBK',CHARSET);
	}
	$vv = explode('.',$v['ID']);
	if ($vv[1] == 'pack') {
		echo "<td width='45' height='60' valign='top'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><img src='".$v[logo]."' width='40' height='40' border='0' align='absmiddle' alt='".$v[name]."' /></a></td><td width='".$jppaiwidth."%' valign='top' style='padding:2px;'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><strong>$v[name]</strong></a><br>".$Plang['huxapp_3'].$v[downloads]."</td>";
		$i++;
		if (!($i % 4)) {
			echo "</tr><tr>";
		}
	}
}
echo "</tr>";
showtablefooter();
showtableheader();
echo "<br><tr class='header'>".$Plang['huxapp_6']."</tr><tr>";
$i = 0;
foreach($rr as $k => $v) {
	if (CHARSET != 'gbk') {
		$v['name'] = diconv($v['name'],'GBK',CHARSET);
	}
	$vv = explode('.',$v['ID']);
	if ($vv[1] == 'template') {
		echo "<td width='45' height='60' valign='top'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><img src='".$v[logo]."' width='40' height='40' border='0' align='absmiddle' alt='".$v[name]."' /></a></td><td width='".$jppaiwidth."%' valign='top' style='padding:2px;'><a href='http://addon.discuz.com/?@".$v[ID]."' target='_blank'><strong>$v[name]</strong></a><br>".$Plang['huxapp_3'].$v['downloads']."</td>";
		$i++;
		if (!($i % 4)) {
			echo "</tr><tr>";
		}
	}
}
echo "</tr>";
showtablefooter();
?>