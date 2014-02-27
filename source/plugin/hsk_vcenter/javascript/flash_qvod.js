document.write('<div id="noplayid"><object classid="clsid:f3d0d36f-23f8-4682-a195-74c92b03d4af" width="'+ swf_width +'" height="'+ swf_height +'" id="qvodplayer" name="qvodplayer" onerror="return qvod_error();">');
document.write('<param name="showcontrol" value="1">');
document.write('<param name="url" value="'+swf_url+'">');
document.write('<param name="nextwebpage" value="'+swf_NextWebPage+'">');
document.write('<param name="autoplay" value="'+swf_autoplay+'">');
document.write('<param name="qvodadurl" value="">');
document.write('<embed id="qvodplayer2" name="qvodplayer2" width="'+ swf_width +'" height="'+ swf_height +'" url="'+swf_url+'" type="application/qvod-plugin" autoplay="'+swf_autoplay+'" qvodadurl="" showcontrol="1" ></embed></object></div>');


function qvod_error(){
	document.getElementById('noplayid').style.display='none';
	document.getElementById('iframe_down').style.display='';
	document.getElementById('iframe_down').src='source/plugin/hsk_vcenter/qvod/index.htm';
}