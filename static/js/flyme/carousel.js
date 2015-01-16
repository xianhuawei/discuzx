/**
 * Created by yangjunxiong on 2014/12/9.
 */
jQuery.fn.Carousel = function(option){
    var $ = $j;
    var ele = $(this);
    if(!ele || ele.length<=0) return;
    var imgs = ele.find("a");
    var len = imgs.length;
    if(len<=1) { //两张以下不做轮播
        if(len===1) $(imgs[0]).addClass("imgAni_curr");
        return this;
    }
    //opts参数{direct:1,2分别表示从左到右、从下到上；time为轮播间隔；dot为轮播控制点}
    var slideW = ele.width(), slideH = ele.height(), opts = $.extend({"direct":1, "time":6000},option);
    $(imgs[0]).addClass("imgAni_curr");
    $(imgs[1]).addClass("imgAni_next");
    var current = 0, next = current + 1, timer = null;
    if(opts.nav){
        var nav = $(opts.nav);
        for(var i=0; i<len; i++){
            $("<i class='carl_dot"+(i===0?" carl_dot_hover":"")+"' data-index='"+i+"'></i>").appendTo(nav);
        }
        nav.css({"left":(ele.width()-nav.width())/2});
    }
    var timerStart = function(){
        return setInterval(function(){
                    if(current>=len) current = 0;
                    next = current + 1;
                    if(next>=len) next = 0;
                    if(opts.nav){
                        nav.find(".carl_dot").removeClass("carl_dot_hover");
                        nav.find(".carl_dot:eq("+next+")").addClass("carl_dot_hover");
                    }
                    if(opts.direct===2){
                        $(imgs[current]).animate({"top":-slideH},800,function(e){
                            $(this).removeClass("imgAni_curr").css("top",slideH);//.addClass("imgAni_prev");
                        });
                        $(imgs[next]).animate({"top":0},800,function(e){
                            $(this).removeClass("imgAni_next").addClass("imgAni_curr");
                        });
                    }else{
                        $(imgs[current]).animate({"left":-slideW},800,function(e){
                            $(this).removeClass("imgAni_curr").css("left",slideW);//.addClass("imgAni_prev");
                        });
                        $(imgs[next]).animate({"left":0},800,function(e){
                            $(this).removeClass("imgAni_next").addClass("imgAni_curr");
                        });
                    }
                    current++;
                },opts.time);
    };
    timer = timerStart();
    imgs.on("mouseenter",function(e){
        if(timer) clearInterval(timer);
    }).on("mouseleave",function(e){
        timer = timerStart();
    });
    if(opts.nav){
        nav.find(".carl_dot").on("click",function(e){
            clearInterval(timer);
            var index = parseInt($(this).attr("data-index"),10);
            if(index===current) return;
            nav.find(".carl_dot").removeClass("carl_dot_hover");
            nav.find(".carl_dot:eq("+index+")").addClass("carl_dot_hover");
            if(opts.direct===2){
                $(imgs[index]).css("top",slideH);
                $(imgs[current]).animate({"top":-slideH},800,function(e){
                    $(this).removeClass("imgAni_curr").css("top",slideH);//.addClass("imgAni_prev");
                });
                $(imgs[index]).animate({"top":0},800,function(e){
                    $(this).removeClass("imgAni_next").addClass("imgAni_curr");
                    if(timer) clearInterval(timer);
                    timer = timerStart();
                });
            }else{
                $(imgs[index]).css("left",slideW);
                $(imgs[current]).animate({"left":-slideW},800,function(e){
                    $(this).removeClass("imgAni_curr").css("left",slideW);//.addClass("imgAni_prev");
                });
                $(imgs[index]).animate({"left":0},800,function(e){
                    $(this).removeClass("imgAni_next").addClass("imgAni_curr");
                    if(timer) clearInterval(timer);
                    timer = timerStart();
                });
            }
            current = index;
            if(current>=len) current = 0;
        });
    }
    if(opts.refresh){
        $(opts.refresh).on("click",function(e){
            if(current>=len) current = 0;
            next = current + 1;
            if(next>=len) next = 0;
            $(imgs[current]).animate({"top":-slideH},800,function(e){
                $(this).removeClass("imgAni_curr").css("top",slideH);//.addClass("imgAni_prev");
            });
            $(imgs[next]).animate({"top":0},800,function(e){
                $(this).removeClass("imgAni_next").addClass("imgAni_curr");
                if(timer) clearInterval(timer);
                timer = timerStart();
            });
            current++;
        });
    }
    return this;
};