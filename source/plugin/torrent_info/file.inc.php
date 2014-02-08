<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
define('NOROBOT', TRUE);

$cvars = $_G['cache']['plugin']['torrent_info'];
$cvars['safe_key'] = isset($cvars['safe_key']{0}) ? md5($cvars['safe_key']) : NULL;
$bt_setting = rawurlencode(authcode(json_encode(array('type' => 'get')), 'ENCODE', $cvars['safe_key']));
$torrent_URI = $cvars['remote_url'] ? $cvars['remote_url'] . '?setting='.$bt_setting.'&str=' : './plugin.php?id=torrent_info:get&str=';
$etag = md5($torrent_URI.'var=free');
dheader('ETag: '.$etag);
dheader('Pragma: cache');
dheader('Cache-Control: public, must-revalidate, max-age=0');
if($_SERVER['HTTP_IF_NONE_MATCH']==$etag) {
    dheader('HTTP/1.1 304 Not Modified');
} elseif($_G['gp_type']=='js') {
	dheader('Content-Type: application/javascript');
?>
var announce, aId = 0, btURI, aList;

function switchButton(e_id){
	$("e_btn_info").className = e_id=="info"?"current":"";
	$("e_btn_files").className = e_id=="files"?"current":"";
	$("e_info").style.display = e_id=="info"?"block":"none";
	$("e_files").style.display = e_id=="files"?"block":"none";
}
function bt_get(){
	aId = announce.length>aId?aId:0;
	$("bt_notice").className = "notice upnf bt_magnet bt_loading";
	$("bt_text").innerHTML = "Loading...";
	$("announce").innerHTML = aList[aId];
	$("announce").title = aList[aId];
	appendscript(btURI+announce[aId]+"&r="+Math.random());
	aId++;
}
function bt_callback(type, str){
	$("bt_notice").className = "notice upnf bt_magnet";
	switch (type) {
	case 0: str = "<?php echo lang('plugin/torrent_info', 'not_enable_curl'); ?>";break;
	case 1: str = "<?php echo lang('plugin/torrent_info', 'torrent_complete'); ?>&nbsp;<span class=\"xi1\">"+str["complete"]+"</span>,&nbsp;<?php echo lang('plugin/torrent_info', 'torrent_incomplete'); ?>&nbsp;<span class=\"xi1\">"+str["incomplete"]+"</span>,&nbsp;<?php echo lang('plugin/torrent_info', 'torrent_downloaded'); ?>&nbsp;<span class=\"xi1\">"+str["downloaded"]+"</span>&nbsp;<a href=\"javascript:;\" onclick=\"aId--;bt_get()\" title=\"<?php echo lang('plugin/torrent_info', 'click_refresh'); ?>\">[<?php echo lang('plugin/torrent_info', 'refresh'); ?>]</a>";break;
	case 2: str = "<?php echo lang('plugin/torrent_info', 'timeout'); ?> ("+str+" <?php echo lang('plugin/torrent_info', 'second'); ?>)&nbsp;<a href=\"javascript:;\" onclick=\"aId--;bt_get()\" title=\"<?php echo lang('plugin/torrent_info', 'click_retry'); ?>\">[<?php echo lang('plugin/torrent_info', 'retry'); ?>]</a>";break;
	case 3: str = "<?php echo lang('plugin/torrent_info', 'fail'); ?> (<?php echo lang('plugin/torrent_info', 'code'); ?> "+str+")&nbsp;<a href=\"javascript:;\" onclick=\"aId--;bt_get()\" title=\"<?php echo lang('plugin/torrent_info', 'click_retry'); ?>\">[<?php echo lang('plugin/torrent_info', 'retry'); ?>]</a>";break;
	default: str = "<?php echo lang('plugin/torrent_info', 'invalid'); ?>";break;
	}
	$("bt_text").innerHTML = str;
	$("bt_text").innerHTML+= type>0&&announce.length>1?"&nbsp;<a href=\"javascript:;\" onclick=\"bt_get()\" title=\"<?php echo lang('plugin/torrent_info', 'other'); ?>\">["+aId+"/"+announce.length+"]</a>":"";
}
<?php
} else {
	dheader('Content-Type: text/css');
?>.bt_right{height:28px;line-height:28px;width:440px;text-align:left;overflow:hidden;white-space:nowrap;margin:0 5px 0 0}
.bt_left{float:left;line-height:28px;width:60px;text-align:right;margin:0 5px 0 0}
.bt_top{width:520px}
.bt_magnet{margin:0;background-position:2px 5px}
.bt_magnet .bt_download,.bt_magnet .bt_copy{width:72px;height:19px;text-align:center;line-height:19px;text-indent:-9999px;overflow:hidden;display:inline-block;background:url(./source/plugin/torrent_info/images/magnet.gif) no-repeat}
.bt_magnet .bt_download:hover{background-position:-72px 0}
.bt_magnet .bt_copy{background-position:-144px 0;margin:0 5px}
.bt_magnet .bt_copy:hover{background-position:-216px 0}
.bt_loading{background-image:url(./static/image/common/loading.gif);background-position:2px 4px}
.upfl{margin-top:-1px;max-height:289px;overflow:auto;overflow-x:hidden}
.upfl table td{border-top:1px solid #CDCDCD}
.p_opt table td{height:28px;line-height:28px}
.p_opt table .tubiao{width:21px}
.p_opt table .tubiao div{background:url(./source/plugin/torrent_info/images/filetype.gif) no-repeat;height:28px;width:16px}
.p_opt table .tubiao .zip{background-position:0 center}
.p_opt table .tubiao .video{background-position:-16px center}
.p_opt table .tubiao .audio{background-position:-32px center}
.p_opt table .tubiao .image{background-position:-48px center}
.p_opt table .tubiao .exe{background-position:-64px center}
.p_opt table .tubiao .unknown{background-position:-80px center}
.p_opt table .name{width:auto;white-space:nowrap}
.p_opt table .name div{height:28px;line-height:28px;overflow:hidden;max-width:410px}
.p_opt table .size{width:85px}<?php } ?>