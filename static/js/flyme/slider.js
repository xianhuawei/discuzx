/**
 * Created by yangjunxiong on 2014/12/9.
 */
jQuery.fn.Slider = function(option){
    var el = $j(this);
    if(!el || el.length<=0) return;
    var idName = el.attr("id"), imgs = el.find("a");
    var el2 = $j("#"+idName+"_copy"), origLeft = 0;
    var len = imgs.length;
    if(len<=4) return this;
    var imgW = $j(imgs[0]).width() + parseInt($j(imgs[0]).css("margin-right"),10), timer = null;
    var totalW = imgW * 7 + imgW;//len;
    var ie6 = navigator.userAgent.toUpperCase().indexOf("MSIE 6.0")!=-1;
    if(ie6) totalW+=6;
    el.css({"width":totalW});
    origLeft = el.position().left;
    el2.html(el.html()).css({"width":totalW,"left":totalW+(ie6?-6:0)});
    var opt = $j.extend({"time":4000},option);
    var animateNext = function(){
        var slider1Left = el.position().left, slider2Left = el2.position().left;
        el.animate({"left":slider1Left-imgW},1000,function(e){
            if(el.position().left<=origLeft-totalW+(ie6?6:0)){
                el.css("left",totalW+(ie6?-6:0));
            }
        });
        el2.animate({"left":slider2Left-imgW},1000,function(e){
            if(el2.position().left<=origLeft-totalW+(ie6?6:0)){
                el2.css("left",totalW+(ie6?-6:0));
            }
        });
    };
    var timerStart = function(){
        return setInterval(function(){
            animateNext();
        },opt.time);
    };
    timer = timerStart();
    el.on("mouseenter",function(e){
        clearInterval(timer);
    }).on("mouseleave",function(e){
        timer = timerStart();
    });
    el2.on("mouseenter",function(e){
        clearInterval(timer);
    }).on("mouseleave",function(e){
        timer = timerStart();
    });
};