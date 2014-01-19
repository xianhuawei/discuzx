/* ***************************************
name: photography.js
import: jquery1.4
***************************************** */

/* banner */
var po = jQuery("#photoFocus"),  pt = po.find("dd"), pl = pt.size() - 1;
	var focusAddJump = function(){
		var pol = document.createElement("ol"), polArray = [];
		for(var i=0; i<= pl; i++){
			polArray.push("<li><a href=\"javascript:void(0);\" onclick=\"ep.Run(" + i + ")\" >&nbsp;</a></li>");
		};
		jQuery(pol).append(polArray.join(''));
		po.append(pol);
		
};
	
var ep = new effectPage("#photoFocus img",{//默认值
		Auto: true, //是否自动
		Duration: 1000, //持续时间
		effect: "fade", //播放效果
		lazyLoad: true,   // 延尺加载
		Pause: 5000, //停顿时间(Auto为true时有效),
		flipPage: function( index ){	   			
		    var prevIndex = index === 0 ?  pl : index-1,
					pd = po.find("li");
					pt.hide();  pd.attr("class", "");
					pt.eq(index).show();      pd.eq(index).attr("class", "selected");
		   }
});

/* photo nav */
var photoNavSwitch = function(){
	var pitem = jQuery("#photoTopic");
	pitem.delegate("li", "mouseenter", function(){
		jQuery(this).addClass("selected");
	});
	
	pitem.delegate("li", "mouseleave", function(){
		jQuery(this).removeClass("selected");
	});
	
}

/* photo Image Control */

var photoImageArrow = function(){ 
	jQuery("#photoImageLeft").mouseenter(function(){
		jQuery(this).addClass("show");
	  // jQuery("#photoImage>.prev").show();
	}).mouseleave(function(){
		jQuery(this).removeClass("show");
		//jQuery("#photoImage>.prev").hide();
	});
	  
	jQuery("#photoImageRight").mouseenter(function(){
		jQuery(this).addClass("show");
		//jQuery("#photoImage>.next").show();
	}).mouseleave(function(){
		jQuery(this).removeClass("show");
		//jQuery("#photoImage>.next").hide();  
	});		
};

/* photo good */	 
var photoGood = function(pid){

	jQuery.ajax({
		url: "/paiApi/praise",
		type: "get",
		data: { pid: pid },
		dataType: "json",
		success: function(data){
			var header = data.header;
			if (header.status === 10000) {
				jQuery("#photoImageBtnAdd").show().animate({top: "0", opacity: "0"}, "slow");
				return;
			};
			alert(header.message);
			if (header.status === 10004) location.href = "http://pai.xiaomi.cn/user/login";
		}
	});
};

/* comment */
var photoComment = {
    page: 1,
    maxpage: 1,
	post: function(imageID){
		var pci = jQuery("#photoCommentInput"), txtArea = pci.find("textarea");
		if(txtArea.val().length === 0){
			alert("请您输入评论！");
			txtArea.focus();
			pci.find("span").hide();
			return;
		};
		
		if(txtArea.val().length > 100){
			alert("最多允许输入100个字！")
			return;
		};
		
		jQuery.ajax({
			url: "/paiApi/comment",
			type: "post",
			dataType: "json",
			data: {pid: imageID, comment: txtArea.val()},
			success: function(data){
				var header = data.header;
				
				if (header.status == 10000) {
					photoComment.getcomments(1, imageID);
					txtArea.val("");
					pci.find("span").show();
					return;
				};
				alert(header.message);
				if (header.status === 10004) location.href = "http://pai.xiaomi.cn/user/login";
			}
		});
	},
	getcomments: function(page, pid){
		
		jQuery.ajax({
			url: "/paiApi/getcomments",
			type: "get",
			dataType: "json",
			data: {pid: pid, page: page, limit: 5},
			success: function(data){
				var header = data.header;
				
				if (header.status == 10000) {
					photoComment.crate(data.body.data);
					photoComment.page = page;
					return;
				};
				alert(header.message);
				if (header.status === 10004) location.href = "http://pai.xiaomi.cn/user/login";
			}
		});
	}, 
	crate: function(data){
		var str = '<li>'
				 + '<img width="80" height="80" src="@avatar">'
			     + '<p>'
			     + '<strong>@username</strong> &nbsp;&nbsp; <ins>@date</ins> <br>'
			     + '<span>@content</span>'
				 + '</p>'
				 + '</li>';
		var i = 0, len = data.length, arr = []
		for(;i < len; i++){
			var tmpStr = str.replace("@avatar", data[i].avatar)
							 .replace("@username", data[i].username)
							 .replace("@date", data[i].date)
							 .replace("@content", data[i].content);
			arr.push(tmpStr);
		};
		
		jQuery("#commentList").html(arr.join(''));
           
	},
	prev: function(pid){
		if (photoComment.page === 1) return;
		this.getcomments(photoComment.page-1, pid);
	},
	next: function(pid){
		if (photoComment.page === photoComment.maxpage) return;
		this.getcomments(photoComment.page+1, pid);
	},
	go: function(){
		var pci = jQuery("#photoCommentInput"), txtArea = pci.find("textarea");
		//pci.find("span").show();
		txtArea.click().focus();
		
	}
};
