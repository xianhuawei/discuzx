function ct_yku_click()
{
	var post_msg='';
	var ct_yku_value = jq('#ct_yku_text').val();
	ct_yku_value = ct_yku_value;
	ct_yku_value = ct_yku_value.replace(/</g,'&lt;').replace(/\r?\n/g, '<br />');
	if(jq.trim(ct_yku_value) == ''){
		alert(url_empty);return  false;
	}
	if(ct_yku_value.toLowerCase().indexOf('youku.')<0 || ct_yku_value.toLowerCase().indexOf('id_')<0 ){
		alert(url_error);return  false;
	}
	if(ct_yku_value.length > '13'){
		var reg1 = new RegExp("[\.]","g");
		var reg2 = new RegExp("[_]","g");
		var finalstr;
		ct_yku_value = ct_yku_value.replace(reg1,"/");
		ct_yku_value = ct_yku_value.replace(reg2,"/");
		var arr = ct_yku_value.split("/");
		for(i=0;i<arr.length;i++){
			if(arr[i].length == '13')
				finalstr = arr[i];
		}
		post_msg = finalstr;
	}
	if(jq.trim(post_msg) !=""){
		post_msg = '[ct_yku]'+post_msg+'[/ct_yku]';
		insertText(post_msg);
		jq('#ct_yku_text').attr('value','');
	}else{
		alert(url_error);return false;	
	}
}