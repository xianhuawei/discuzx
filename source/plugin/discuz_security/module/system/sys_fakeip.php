<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sys_fakeip.php 205 2013-05-29 08:16:16Z qingrongfu $
 */
 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require_once DS_ROOT.'./class/class_ds_patch.php';

$oparray = array('patch','restore','index');
$op = in_array($_GET['op'], $oparray) ? $_GET['op'] : 'index';
$fakeipurl = PARAM_URL.'&cp=sys_fakeip&op=';

if ($op == 'patch') {
	if(submitcheck('patchsubmit')) {
		$rules = $rule = array();
		$rules['serial'] = 'sys_fackip';
		
		$rule1['filename'] = './source/class/discuz/discuz_application.php';
		$rule1['search'] = 'JGlwID0gJF9TRVJWRVJbJ1JFTU9URV9BRERSJ107';
		$rule1['replace'] = 'JHJlYWxpcCA9ICRfU0VSVkVSWydSRU1PVEVfQUREUiddOw==';
		$rule1['count'] = 1;
		$rule1['nums'] = array(1);
		
		$rule2['filename'] = './source/class/discuz/discuz_application.php';
		$rule2['search'] = 'cmV0dXJuICRpcDs=';
		$rule2['replace'] = 'cmV0dXJuICRyZWFsaXA7';
		$rule2['count'] = 1;
		$rule2['nums'] = array(1);
		
		$rules['rule'] = serialize(array($rule1, $rule2));
		
		$patch = new ds_patch();
		
		$result = $patch->fix_patch($rules);
		if($result < 0) {
			$msg = $csslang['sys_fakeip_error_'.abs($result)];
		} else {
			adminlog('FKIP', 1, 'radio');
			$msg = $csslang['sys_fakeip_success_'.abs($result)];
		}
	} elseif (submitcheck('restoresubmit')) {
		$rules = $rule = array();
		$rules['serial'] = 'sys_fackip';
		
		$rule1['filename'] = './source/class/discuz/discuz_application.php';
		$rule1['replace'] = 'JGlwID0gJF9TRVJWRVJbJ1JFTU9URV9BRERSJ107';
		$rule1['search'] = 'JHJlYWxpcCA9ICRfU0VSVkVSWydSRU1PVEVfQUREUiddOw==';
		$rule1['count'] = 1;
		$rule1['nums'] = array(1);
		
		$rule2['filename'] = './source/class/discuz/discuz_application.php';
		$rule2['replace'] = 'cmV0dXJuICRpcDs=';
		$rule2['search'] = 'cmV0dXJuICRyZWFsaXA7';
		$rule2['count'] = 1;
		$rule2['nums'] = array(1);
		
		$rules['rule'] = serialize(array($rule1, $rule2));
		
		$patch = new ds_patch();
		
		$result = $patch->fix_patch($rules);
		if($result < 0) {
			$msg = $csslang['sys_fakeip_error_'.abs($result)];
		} else {
			adminlog('FKIP', 0, 'radio');
			$msg = $csslang['sys_fakeip_restore_'.abs($result)];
		}
	} elseif (submitcheck('checksubmit')) {
		$rules = $rule = array();
		$rules['serial'] = 'sys_fackip';
		
		$rule1['filename'] = './source/class/discuz/discuz_application.php';
		$rule1['search'] = 'JGlwID0gJF9TRVJWRVJbJ1JFTU9URV9BRERSJ107';
		$rule1['replace'] = 'JHJlYWxpcCA9ICRfU0VSVkVSWydSRU1PVEVfQUREUiddOw==';
		$rule1['count'] = 1;
		$rule1['nums'] = array(1);
		
		$rule2['filename'] = './source/class/discuz/discuz_application.php';
		$rule2['search'] = 'cmV0dXJuICRpcDs=';
		$rule2['replace'] = 'cmV0dXJuICRyZWFsaXA7';
		$rule2['count'] = 1;
		$rule2['nums'] = array(1);
		
		$rules['rule'] = serialize(array($rule1, $rule2));
		
		$patch = new ds_patch();
		$result = $patch->test_patch($rules);
		if($result) {
			$msg = $csslang['sys_fakeip_success_2'];
		} else {
			$msg = $csslang['sys_fakeip_restore_2'];
		}
	}
	cpmsg($msg);
} else {
	showtableheader();
    showtitle($csslang['sys_fakeip']);
    showtablerow('', array(), array($csslang['sys_fakeip_tip']));
    showtablefooter();
    showformheader($fakeipurl.'patch');
    showsubmit('', '', '', 
			'<input type="submit" class="btn" name="patchsubmit" value="'.$csslang['sys_fakeip_patch'].'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
			'<input type="submit" class="btn" name="restoresubmit" value="'.$csslang['sys_fakeip_restore'].'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
    		'<input type="submit" class="btn" name="checksubmit" value="'.$csslang['sys_fakeip_check'].'" />'
    );
	showformfooter();
}

