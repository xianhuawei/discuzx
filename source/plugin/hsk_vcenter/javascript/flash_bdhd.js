document.write('<object classid="clsid:02E2D748-67F8-48B4-8AB4-0A085374BB99" width="'+ swf_width +'" height="'+ swf_height +'" id="BaiduPlayer" name="BaiduPlayer" onerror="return bdhd_error(this);">');
document.write('<param name="URL" value="'+swf_url+'">');
document.write('<param name="LastWebPage" value="'+swf_LastWebPage+'"><param name="NextWebPage" value="'+swf_NextWebPage+'"><param name="OnPlay" value="onPlay"/><param name="OnPause" value="onPause"/><param name="OnFirstBufferingStart" value="onFirstBufferingStart"/><param name="OnFirstBufferingEnd" value="onFirstBufferingEnd"/><param name="OnPlayBufferingStart" value="onPlayBufferingStart"/><param name="OnPlayBufferingEnd" value="onPlayBufferingEnd"/><param name="OnComplete" value="onComplete"/><param name="Autoplay" value="1"/></object>');

function bdhd_error(theobj){
	theobj.style.display='none';
	document.getElementById('iframe_down').style.display='';
	document.getElementById('iframe_down').src='source/plugin/hsk_vcenter/bdhd/index.htm';
}