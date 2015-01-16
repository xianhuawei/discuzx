/**
 * 由于 jquery 的冲突，己把 jquery 的命名空间改为   $j
 */
//拓展阅读块 - 可能感兴趣的人 换一组功能
function turnMayLike(btn,box){
    $j(btn).click(function(){
        turnMayLikeFunc(btn,3,"table tr","#mayLikeBox");
    })
}
function turnMayLikeFunc(urlBox,count,turnItem,box){
    var _url = $j(urlBox).attr("data-href");
    var _formhash = $j(urlBox).attr("data-formhash");
    var uidItem = $j(box).find(".userhead_expand .avatar");
    var uidGroup = "";
    var uidNum = 0;
    uidItem.each(function(){
        var uid = $j(this).attr("data-uid");
        if(uidNum == 0){
            uidGroup += uid;
        }else{
            uidGroup += "_" + uid;
        }
        uidNum ++;
    });
    $j.ajax({
        type:"GET",
        url:_url + "&count=" + count + "&uidgroup=" + uidGroup,
        dataType:'json',
        success:function(data){
            var num = data.length;
            if(num == 0){return false;}
            var endCont = '';
            for(i=0;i<num;i++){
                var cont = ['<tr>',
                        '<th class="userhead_expand"><a href="home.php?mod=space&uid='+data[i].uid+'" class="avatar" data-uid="'+data[i].uid+'">'+data[i].avatar+'<span class="shadowbox_avatar"> </span></a></th>',
                        '<td class="userinfo_expand"><a href="home.php?mod=space&uid='+data[i].uid+'">'+data[i].username+'</a><p>'+data[i].reason+'</p></td>',
                        '<td class="attention_expand"><a href="javascript:;" data-href="home.php?mod=spacecp&ac=follow&op=add&hash='+ _formhash +'&fuid='+data[i].uid+'&infloat=yes&handlekey=followmod&inajax=1&ajaxtarget=fwin_content_followmod" >收听</a></td>',
                    '</tr>'];
                endCont += cont.join('');
            }
            $j(box).find(turnItem).remove();
            $j(box).find("table").append(endCont);
        }
    });
}
//pop框
function tipPop(btn,msg,closetime){
    var count = null;
    var tipContNum = $j("#tipBox").length;
    if(tipContNum == 0){
        var newNode = document.createElement("div");
        newNode.id = "tipBox";
        document.body.appendChild(newNode);
    }
    var tipCont = $j("#tipBox");
    tipCont.html(msg);
    var tipContH = tipCont.height() + 20;
    var offset = $j(btn).offset();
    var tipTop = offset.top - tipContH;
    var tipLeft = offset.left - tipCont.width() + 20;
    tipCont.css({top:tipTop,left:tipLeft}).show();
    var hideTip = function(){
        tipCont.hide();
    };
    if(!closetime){closetime = 3000}
    count = setTimeout(hideTip,closetime);
}

/*签到插件*/
function signinFunc(btn,tipBox){
	$j(btn).click(function(){
		var _url = $j(this).find("a").attr("attribute");
		var _tipCont = $j(tipBox).find(".tipcont_signin");
		var _btnCont = $j(btn).find(".btncont_signin");
		var _signin = $j(this).hasClass("hassignin_expand")?1:0;
		if(_signin == 1){return false;}//若已签到，跳出方法
		if(_url.match("login") != null){//若为登录链接，给出登录提示
			clearTimeout(counter);
			_tipCont.html("请先<a href='member.php?mod=logging&amp;action=login' target='_blank'>登录</a>");
			$j(tipBox).show();
			var hideTip = function(){$j(tipBox).hide()};
			var counter = setTimeout(hideTip,5000);
		}else{
			$j.ajax({
				url:_url,
				dataType:'json',
				type:"POST",
				success:function(data){
					var status = data.status,
					message = data.message,
					checkin = data.checkin;
					if(status == 1 && checkin == 1 && _signin == 0){
						$j(btn).addClass("hassignin_expand");
						_btnCont.text("已签到");
					}
					if(message){
						clearTimeout(counter);
						_tipCont.html(message);
						$j(tipBox).show();
						var hideTip = function(){$j(tipBox).hide()};
						var counter = setTimeout(hideTip,5000);
					}
				}
			})
		}
	})
}

/* 主题列表页 - 收听 */
function followmodFunc(btn){
	$j(btn).live('click',function(){
		var that = this;
		var btnItem = $j(that);
		var url = btnItem.attr("data-href");
		var count2;
		$j.ajax({
			type:'GET',
			url:url + '&block=maylike',
			dataType:'json',
			success:function(data){
				if(data.message){
					tipPop(that,data.message);
				}
				if(data.type == 1){
					turnItem = btnItem.parents("tr");
					turnMayLikeFunc(".turnbtn_maylike",1,turnItem,"#mayLikeBox");
				}
			}
		})
	})
}

// 首页刷新按钮
var refresh_click_look 	= false;
function refresh_click(){
	if(refresh_click_look==true){
		return ;
	}
	refresh_click_look 	= true;
    var rand =  Math.ceil(Math.random(1,10000)*100000);
    var start = new Date().getTime();
	$j.getJSON('newthread.php?start='+ start + '&_t='+ rand ,function(data){
		refresh_click_look 	= false;
		if( parseInt(data['status']) == 1){
			$j('#new_threadlist').html(data['data']);
			delete_bottom_line();
		}
	});
}

function delete_bottom_line(){
	tr 	= $j("#new_threadlist").find("table").find('tr').length;
	$j("#new_threadlist").find("table").find('tr').eq(tr-1).addClass('tr_threadlist_last');
	
	tr 	= $j("#index_threadlist").find("table").find('tr').length;
	$j("#index_threadlist").find("table").find('tr').eq(tr-1).addClass('tr_threadlist_last');
}