function start_move(val) {
	for(i=1; i<=val; i++){
		moveid = document.getElementById('star_'+i);
		moveid.src='source/plugin/hsk_vcenter/images/star2.gif';
	}
	for(i=10; i>val; i--){
		moveid = document.getElementById('star_'+i);
		moveid.src='source/plugin/hsk_vcenter/images/star1.gif';
	}
}

function getout_star(val){
	for(i=1; i<=val; i++){
		moveid = document.getElementById('star_'+i);
		moveid.src='source/plugin/hsk_vcenter/images/star2.gif';
	}
	for(i=10; i>val; i--){
		moveid = document.getElementById('star_'+i);
		moveid.src='source/plugin/hsk_vcenter/images/star1.gif';
	}
}

function get_quote(str, val) {
	var get_id = 'vpost_'+val;
	var myval = $(get_id).value;
	var get_val = '[quote][size=2][color=#999999]'+str+'[/color][/size]\n'+myval+'[/quote]';
	$('fastpostmessage').value += get_val;
	$('fastpostmessage').focus();
}