<?php
!defined('IN_DISCUZ') && exit('Access Denied');
!defined('IN_ADMINCP') && exit('Access Denied');


if(file_exists(DISCUZ_ROOT.'./data/upgrade_amupper.lock')) {
	cpmsg('dsu_amupper:admin_ed', 'action=plugins&operation=config&identifier=dsu_amupper','succeed');
	exit;
} 

if(!$_GET['submit']){
	showtableheader(lang("plugin/dsu_amupper","upgrade_h1"));
	showformheader("plugins&operation=config&identifier=dsu_amupper&pmod=upgrade&submit=1", "");
	showsetting(lang('plugin/dsu_amupper','upgrade_f2'), 'reserve', '0', 'radio');
	echo '<input type="hidden" name="formhash" value="'.FORMHASH.'">';
	showsubmit('submit', "OK!");
	showformfooter();
	showtablefooter();
}elseif($_GET['submit'] && $_G['adminid']=='1' && $_GET['formhash']==FORMHASH){
	$formhash = FORMHASH;
	$limit = 400;
	$reserve = $_GET['reserve'];
	$amuppertable = DB::table('plugin_dsuampper');
	$amuppertablenew = DB::table('plugin_dsuamupper');
	$amuppertablenewc = DB::table('plugin_dsuamupperc');
	$sql = '';

	$queryn = DB::query("SHOW TABLES LIKE '$amuppertablenew'");
	
	$amuppertable_existn = 0;
	if(DB::num_rows($queryn) > 0){
		$amuppertable_existn = 1;
	}


	
	if($amuppertable_existn == 0){
$sql = <<<EOF
DROP TABLE IF EXISTS pre_plugin_dsuamupper;
CREATE TABLE  pre_plugin_dsuamupper (
`uid` int UNSIGNED NOT NULL ,
`uname` CHAR( 15 ) NOT NULL ,
`addup` INT UNSIGNED NOT NULL ,
`cons` INT UNSIGNED NOT NULL ,
`lasttime` INT( 10 ) UNSIGNED NOT NULL ,
`time` INT( 10 ) UNSIGNED NOT NULL ,
`allow` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`uid`)
) ENGINE=INNODB;
EOF;

runquery($sql);
	}

	$queryc = DB::query("SHOW TABLES LIKE '$amuppertablenewc'");
	
	$amuppertable_existc = 0;
	if(DB::num_rows($queryc) > 0){
		$amuppertable_existc = 1;
	}

	if($amuppertable_existc == 0){
$sql = <<<EOF
DROP TABLE IF EXISTS pre_plugin_dsuamupperc;
CREATE TABLE  pre_plugin_dsuampperc (
`id` INT UNSIGNED NOT NULL ,
`days` MEDIUMINT( 8 ) UNSIGNED NOT NULL ,
`usergid` SMALLINT( 6 ) UNSIGNED NOT NULL ,
`extcredits` TINYINT( 3 ) UNSIGNED NOT NULL ,
`reward` MEDIUMINT( 8 ) UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=INNODB;
EOF;

runquery($sql);
	}

	$query = DB::query("SHOW TABLES LIKE '$amuppertable'");
	
	$amuppertable_exist = 0;
	if(DB::num_rows($query) > 0){
		$amuppertable_exist = 1;
	}
	if($amuppertable_exist){
		$num = DB::result_first("SELECT COUNT(*) FROM ".$amuppertable);
		$page = max(1, intval($_GET['page']));
		$start_limit = ($page - 1) * $limit;
	    $maxpage = ceil($num/$limit);
		$nextpage = $page + 1;

		$query = DB::query("SELECT * FROM ".$amuppertable." LIMIT ".$start_limit." ,".$limit);
		$mrcs = array();
		while($mrc = DB::fetch($query)) {
			$mrc['time'] = dgmdate($mrc['lasttime'],'Ymd',$_G['setting']['timeoffset']);
			DB::query("REPLACE INTO ".$amuppertablenew." (uid, uname, lasttime, time, cons, addup, allow) VALUES ('$mrc[uid]', '$mrc[uname]', '$mrc[lasttime]', '$mrc[time]', '$mrc[continuous]', '$mrc[addup]', '0')");
		}

	}else{
		ends();
	}
	if($page<$maxpage){
		cpmsg(lang('plugin/dsu_amupper','admin_ing',array('jindu'=>$page.'/'.$maxpage)), 'action=plugins&operation=config&identifier=dsu_amupper&pmod=upgrade&reserve='.$reserve.'&submit=submit&formhash='.$formhash.'&page='.$nextpage,'loading');
	}else{
		if($reserve){
			$sql = 'DROP TABLE '.$amuppertable;
			DB::query($sql);
		}
		ends();
	}
}


function ends(){
	$queryn = DB::query("SHOW TABLES LIKE '$amuppertablenew'");$amuppertable_existn = 0;
	if(DB::num_rows($queryn) > 0){$amuppertable_existn = 1;	}
	$queryc = DB::query("SHOW TABLES LIKE '$amuppertablenewc'");$amuppertable_existc = 0;
	if(DB::num_rows($queryc) > 0){$amuppertable_existc = 1;	}
	if($amuppertable_existc == 1 && $amuppertable_existn == 1){
		touch(DISCUZ_ROOT.'./data/upgrade_amupper.lock');
		cpmsg('dsu_amupper:admin_c', 'action=plugins&operation=config&identifier=dsu_amupper&anchor=vars','succeed');
	}else{
		cpmsg('dsu_amupper:admin_s', 'action=plugins&operation=config&identifier=dsu_amupper&anchor=upgrade','succeed');
	}
}
?>