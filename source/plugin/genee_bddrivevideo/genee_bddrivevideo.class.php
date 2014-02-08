<?php
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
class plugin_genee_bddrivevideo {
	function global_footer() {
		global $_G;
		
		$geneecache = $_G ['cache'] ['plugin'] ['genee_bddrivevideo'];
		$geneelang = lang ( 'plugin/genee_bddrivevideo' );
		
		$return = '<script type="text/javascript">
		String.prototype.replaceAll = function (s1, s2) {
		    return this.replace(new RegExp(s1,"gm"),s2);
		}
		
		var Url = { 
 
        // public method for url encoding 
        encode : function (string) { 
                return escape(this._utf8_encode(string)); 
        }, 
 
        // public method for url decoding 
        decode : function (string) { 
                return this._utf8_decode(unescape(string)); 
        }, 
 
        // private method for UTF-8 encoding 
        _utf8_encode : function (string) { 
                string = string.replace(/\r\n/g,"\n"); 
                var utftext = ""; 
 
                for (var n = 0; n < string.length; n++) { 
 
                        var c = string.charCodeAt(n); 
 
                        if (c < 128) { 
                                utftext += String.fromCharCode(c); 
                        } 
                        else if((c > 127) && (c < 2048)) { 
                                utftext += String.fromCharCode((c >> 6) | 192); 
                                utftext += String.fromCharCode((c & 63) | 128); 
                        } 
                        else { 
                                utftext += String.fromCharCode((c >> 12) | 224); 
                                utftext += String.fromCharCode(((c >> 6) & 63) | 128); 
                                utftext += String.fromCharCode((c & 63) | 128); 
                        } 
 
                } 
 
                return utftext; 
        }, 
 
        // private method for UTF-8 decoding 
        _utf8_decode : function (utftext) { 
                var string = ""; 
                var i = 0; 
                var c = c1 = c2 = 0; 
 
                while ( i < utftext.length ) { 
 
                        c = utftext.charCodeAt(i); 
 
                        if (c < 128) { 
                                string += String.fromCharCode(c); 
                                i++; 
                        } 
                        else if((c > 191) && (c < 224)) { 
                                c2 = utftext.charCodeAt(i+1); 
                                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63)); 
                                i += 2; 
                        } 
                        else { 
                                c2 = utftext.charCodeAt(i+1); 
                                c3 = utftext.charCodeAt(i+2); 
                                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63)); 
                                i += 3; 
                        } 
 
                } 
 
                return string; 
        } 
 
		}
		function bddrivevideoSearch(position,msg){
		
			var content="";

			try{
				content=getEditorContents();
			}catch(_err){return;};
			
			content = content.replaceAll( "&amp;", "&" );

			start=content.indexOf("[flash]"+msg,position);
			
			end=content.indexOf("[/flash]",start+1);
			
			url1=content.substring(start+7,end);

			if(content.indexOf("[url=",0)!=-1){
		 		setTimeout("bddrivevideoSearch(0,\""+msg+"\")",5000);
		 		return;
		 	}
 		 
			param=content.substring(start+32,end);
			
			var frequest=null;
			 try {
				freequest = new XMLHttpRequest();
			} catch (m1) {
				try {
					freequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (m2) {
					try {
						freequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (failed) {
						freequest = false;
					}
				}
			} 
			
			var url2="plugin.php?id=genee_bddrivevideo:getbaiduurlname&"+param;
			
			freequest.open("POST", url2, true);
			
			freequest.send(null);
			
			freequest.onreadystatechange=function() {
		        if (freequest.readyState==4 && freequest.status==200) {
		        	try{
		        	  if(freequest.responseText!=""){
		        	  
		        	  
		        	  	var arr=Url.decode(freequest.responseText).split(".");
		        	  	
		        	  	var houzhui=arr[1];
							        	  	
		        	  	param+="."+houzhui;
		        	  	
		        	  	var url="plugin.php?id=genee_bdtranslink:getbaiduurl&"+param;
						var vparam=param.split("&");
						
						var vshare=vparam[0].split("=");
						
						var vuk=vparam[1].split("=");
						content=content.replace("[flash]"+url1+"[/flash]","[flash=400,300]http://www.genee.qlu.cc/plugin.php?id=genee_bdtranslink:swf&url=&lists=&context_menu=2&auto_play=1&src=http%3A%2F%2Fwww.genee.qlu.cc%2Fplugin.php%3Fid=genee_bdtranslink:bd%26shareid%3D"+vshare[1]+"%26uk%3D"+vuk[1]+"&skin=skins%2Fmini%2Fvplayer.zip[/flash]");
			        	writeEditorContents(content);
			        	
					    setTimeout("bddrivevideoSearch(0,\""+msg+"\")",5000);
		        	  }
		        	}catch(_err){}
		        }	
		      }
			  
			     setTimeout("bddrivevideoSearch(0,\""+msg+"\")",5000);
		 
		 	
		}
		bddrivevideoSearch(0,"http://pan.baidu.com/");
		</script>';
		return $return;
	}
}
 
?>