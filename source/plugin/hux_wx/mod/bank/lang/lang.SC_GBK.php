<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$banklang = array
(
	'appcmdtxt' => '虚拟银行',
	'admincmd' => 0,
	'appver' => '1.0.1',
	'configs' => 'outmax:10000||hqfeilv:0.05',
	'outmax' => '每笔最高存取款数额',
	'hqfeilv' => '日利率',
	'tocun' => '存款',
	'toqu' => '取款',
	'tolixi' => '利息',
	'dateline' => '存款时间',
	'welcome' => "虚拟银行欢迎您，请选择业务\n1 查询\n2 存款\n3 取款",
	'ott' => '请输入业务ID',
	'nodata' => '没有存款数据，请先存款',
	'inputmsg' => '请输入操作数额(1~{outmax})',
	'nocunmsg' => '没有这么多存款，您的存款加利息总金额为',
);

?>