/**
 * Created by yangjunxiong on 2014/12/9.
 */
var ua = navigator.userAgent.toUpperCase(), isIE6 = false, ltIE10 = false;
var isIE = (ua.indexOf("MSIE")!=-1) || (ua.indexOf("TRIDENT")!=-1);
var isMoz = (ua.indexOf("FIREFOX/")!=-1);
var notWebkit = false;
if(ua.indexOf("RV:")!=-1 || ua.indexOf("MSIE")!=-1) notWebkit = true;
if(isIE) {
    isIE6 = ua.indexOf("MSIE 6.0")!=-1;
    ltIE10 = isIE6 || (ua.indexOf("MSIE 7.0")!=-1) || (ua.indexOf("MSIE 8.0")!=-1) || (ua.indexOf("MSIE 9.0")!=-1) || (ua.indexOf("MSIE 10.0")!=-1);
}
function scroll(scrollTo, time) {
    var scrollFrom = parseInt(notWebkit?document.documentElement.scrollTop:document.body.scrollTop), i = 0, runEvery = 5; // run every 5ms
    scrollTo = parseInt(scrollTo);
    time /= runEvery;
    if(ltIE10) time /= runEvery;
    var interval = setInterval(function () {
        i++;
        if(notWebkit){
            document.documentElement.scrollTop = (scrollTo - scrollFrom) / time * i + scrollFrom;
        }else{
            document.body.scrollTop = (scrollTo - scrollFrom) / time * i + scrollFrom;
        }
        if (i >= time) {clearInterval(interval);}
    }, runEvery);
};
;$j(function($){
    var Index = function(){
        this.init();
    };

    Index.prototype = {
        init:function(){
            $j("#jiang108Imgs").Carousel();
            $j("#recoArticleImgs").Carousel({"time":3000});
            $j("#rec_map_img").Carousel({"nav":".imgAni_nav"});
            $j(".notices .dxb_bc").Carousel({"direct":2,"refresh":"#notice .icon_refresh","time":1000});
            $j("#bnr_slider").Slider();
            //$j(".customMySelect").customSelect();
            $j('.header_search').datalist(".datalist");
            this.bindEvent();
        },
        bindEvent:function(){
            var noticePanel = $j("#notice_sharePanel"), notice = $j("#notice"), signedPanle = $j("#signedPanel"), acPanel = $j("#accountPanel");

            notice.find(".icon_share").on("mouseenter",function(e){
                window.clearTimeout(window.showTime);
                var $this = $j(this);
                var offset = $this.offset();
                noticePanel.css({"left":offset.left-noticePanel.width()+$this.width()*4/5,"top":offset.top+$this.height()+6}).fadeIn(300);
            }).on("mouseleave",function(e){
                window.showTime = window.setTimeout(function(){noticePanel.fadeOut(300);}, 500)

            });

            noticePanel.on("mouseenter",function(e){
                window.clearTimeout(window.showTime);
                noticePanel.fadeIn(300);
            }).on("mouseleave",function(e){
                window.showTime = window.setTimeout(function(){noticePanel.fadeOut(300);}, 500)
            });

            notice.on("mouseenter",function(e){
                notice.find(".notices").css("margin-left",0);
                notice.find(".icon_refresh").fadeIn(200);
            }).on("mouseleave",function(e){
                notice.find(".icon_refresh").fadeOut(200,function(e){
                    notice.find(".notices").css("margin-left",isIE6?16:0);
                });
            });



            //$j(".btn_signed").on("mouseenter",function(e){
            //    var $this = $j(this);
            //    var offset = $this.offset();
            //    signedPanle.css({"left":offset.left,"top":offset.top+$this.height()+8}).fadeIn(300);
            //}).on("mouseleave",function(e){
            //    signedPanle.fadeOut(300);
            //});

            //鼠标上移到用户弹出层
            acPanel.on("mouseenter",function(e){
                window.clearTimeout(window.showTime);
                acPanel.fadeIn(300);
            }).on("mouseleave",function(e){
                window.showTime = window.setTimeout(function(){acPanel.fadeOut(300);}, 500)
            });
            //鼠标上移到用户名和头像操作
            $j("#accountOpt").on("mouseenter",function(e){
                window.clearTimeout(window.showTime);
                var $this = $j(this);
                var offset = $this.offset();
                acPanel.css({"left":offset.left+$this.width()-acPanel.width(),"top":offset.top+$this.height()+8}).fadeIn(300);
            }).on("mouseleave",function(e){
                window.showTime = window.setTimeout(function(){acPanel.fadeOut(300);}, 500)
            });
            //客服代码点击
            $j("#service-online").on('click',function(e){
                window.open('http://bbs.meizu.cn/kf.php','_blank','height=575,width=1000,fullscreen=3,top=200,left=200,status=yes,toolbar=no,menubar=no,resizable=no,scrollbars=no,location=no,titlebar=no,fullscreen=no');
            });
            //上下滚动
            var winW = $j(window).width(), scrollTop = $j("#scrollTop");
            var scrollTop_right = (winW - 1000)/2 - scrollTop.width() - 18;
            if(scrollTop_right<0) scrollTop_right = 0;
            if(scrollTop.length>0){
                scrollTop.css({"right":scrollTop_right});
                $j(window).scroll(function(){
                    if($j(this).scrollTop()===0){
                        scrollTop.css({"display":"block"}).fadeOut(300);
                    }else{
                        if(!scrollTop.is(":visible")){
                            scrollTop.fadeIn(300);
                        }
                    }
                });
                scrollTop.find(".sclTop_goTop").on("click",function(e){
                    scroll(0,1000);
                    return;
                });
                $j(window).resize(function(e){
                    scrollTop_right = ($j(window).width() - 1000)/2 - scrollTop.width() - 18;
                    if(scrollTop_right<0) scrollTop_right = 0;
                    scrollTop.css({"right":scrollTop_right});
                });
            }

            var $weChat = $j('#footer-weChat');
            var $wechatPic = $j('#wechatPic');
            $j('#footer-weChat i').hover(function () {
                $wechatPic.css({
                    left: $weChat.offset().left - 140,
                    top: $weChat.offset().top - 276
                }).show();
            }, function () {
                $wechatPic.hide();
            }).click(function () {
                return false;
            });
        }
    };
    new Index();
});