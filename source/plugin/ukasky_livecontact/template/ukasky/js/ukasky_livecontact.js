jQuery(document).ready(function(){
	jQuery("#ukasky_livecontact").hover(function(){
		jQuery('#divFloatToolsView').stop(false,true).animate({width: 'show', opacity: 'show'}, 'normal',function(){ jQuery('#divFloatToolsView').show(); });
		jQuery('#aFloatTools_Show').attr('style','display:none');
		jQuery('#aFloatTools_Hide').attr('style','display:block');
  },function(){
	  jQuery('#divFloatToolsView').stop(false,true).animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ jQuery('#divFloatToolsView').hide(); });
	  jQuery('#aFloatTools_Hide').attr('style','display:none');
	  jQuery('#aFloatTools_Show').attr('style','display:block');
  });
});
