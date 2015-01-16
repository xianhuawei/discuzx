/**
 * Created by yangjunxiong on 2015/1/1.
 */
/*!
 * jquery.customSelect() - v0.5.1
 * http://adam.co/lab/jquery/customselect/
 * 2014-03-19
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License
 */

(function ($) {
    'use strict';

    $.fn.extend({
        customSelect: function (options) {
            // filter out <= IE6
            if (typeof document.body.style.maxHeight === 'undefined') {
                return this;
            }
            var defaults = {
                    customClass: 'customSelect',
                    mapClass:    true,
                    mapStyle:    true
                },
                options = $.extend(defaults, options),
                prefix = options.customClass,
                changed = function ($select,customSelectSpan) {
                    var currentSelected = $select.find(':selected'),
                        customSelectSpanInner = customSelectSpan.children(':first'),
                        html = currentSelected.html() || '&nbsp;';

                    customSelectSpanInner.html(html);

                    if (currentSelected.attr('disabled')) {
                        customSelectSpan.addClass(getClass('DisabledOption'));
                    } else {
                        customSelectSpan.removeClass(getClass('DisabledOption'));
                    }

                    setTimeout(function () {
                        customSelectSpan.removeClass(getClass('Open'));
                        $(document).off('mouseup.customSelect');
                    }, 60);
                },
                getClass = function(suffix){
                    return prefix + suffix;
                };

            return this.each(function () {
                var $select = $(this),
                    customSelectInnerSpan = $('<span />').addClass(getClass('Inner')),
                    customSelectSpan = $('<span />');

                $select.after(customSelectSpan.append(customSelectInnerSpan));

                customSelectSpan.addClass(prefix);

                if (options.mapClass) {
                    customSelectSpan.addClass($select.attr('class'));
                }
                if (options.mapStyle) {
                    customSelectSpan.attr('style', $select.attr('style'));
                }

                $select
                    .addClass('hasCustomSelect')
                    .on('render.customSelect', function () {
                        changed($select,customSelectSpan);
                        $select.css('width','');
                        var selectBoxWidth = parseInt($select.outerWidth(), 10) -
                            (parseInt(customSelectSpan.outerWidth(), 10) -
                            parseInt(customSelectSpan.width(), 10));

                        // Set to inline-block before calculating outerHeight
                        customSelectSpan.css({
                            display: 'inline-block'
                        });

                        var selectBoxHeight = customSelectSpan.outerHeight();

                        if ($select.attr('disabled')) {
                            customSelectSpan.addClass(getClass('Disabled'));
                        } else {
                            customSelectSpan.removeClass(getClass('Disabled'));
                        }

                        customSelectInnerSpan.css({
                            width:  40,//selectBoxWidth,
                            display: 'inline-block'
                        });

                        $select.css({
                            '-webkit-appearance': 'menulist-button',
                            width:                customSelectSpan.outerWidth(),
                            position:             'absolute',
                            opacity:              0,
                            height:               selectBoxHeight,
                            fontSize:             customSelectSpan.css('font-size')
                        });
                    })
                    .on('change.customSelect', function () {
                        customSelectSpan.addClass(getClass('Changed'));
                        // changed($select,customSelectSpan);
                    })
                    .on('keyup.customSelect', function (e) {
                        if(!customSelectSpan.hasClass(getClass('Open'))){
                            $select.trigger('blur.customSelect');
                            $select.trigger('focus.customSelect');
                        }else{
                            if(e.which==13||e.which==27){
                                // changed($select,customSelectSpan);
                            }
                        }
                    })
                    .on('mousedown.customSelect', function () {
                        customSelectSpan.removeClass(getClass('Changed'));
                    })
                    .on('mouseup.customSelect', function (e) {

                        if( !customSelectSpan.hasClass(getClass('Open'))){
                            // if FF and there are other selects open, just apply focus
                            if($('.'+getClass('Open')).not(customSelectSpan).length>0 && typeof InstallTrigger !== 'undefined'){
                                $select.trigger('focus.customSelect');
                            }else{
                                customSelectSpan.addClass(getClass('Open'));
                                e.stopPropagation();
                                $(document).one('mouseup.customSelect', function (e) {
                                    if( e.target != $select.get(0) && $.inArray(e.target,$select.find('*').get()) < 0 ){
                                        $select.trigger('blur.customSelect');
                                    }else{
                                        // changed($select,customSelectSpan);
                                    }
                                });
                            }
                        }
                    })
                    .on('focus.customSelect', function () {
                        customSelectSpan.removeClass(getClass('Changed')).addClass(getClass('Focus'));
                    })
                    .on('blur.customSelect', function () {
                        customSelectSpan.removeClass(getClass('Focus')+' '+getClass('Open'));
                    })
                    .on('mouseenter.customSelect', function () {
                        customSelectSpan.addClass(getClass('Hover'));
                    })
                    .on('mouseleave.customSelect', function () {
                        customSelectSpan.removeClass(getClass('Hover'));
                    })
                    .trigger('render.customSelect');
            });
        }
    });
})(jQuery);

$j.fn.datalist = function(control) {
    var $this = $j(this), datalist = $j(control);
    var offset = $this.offset();
    datalist.css({"position":"absolute","width":$this.width(),"top":offset.top+$this.height(),"left":offset.left})
    $this.on("focus",function(e){
        datalist.fadeIn(200);
    }).on("blur",function(e){
        datalist.fadeOut(200);
    });
    datalist.find("p").on("click",function(e){
        $this.val($j(this).text());
    })
};

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
                $(imgs[current]).stop(1,1).animate({"left":-slideW},800,function(e){
                    $(this).removeClass("imgAni_curr").css("left",slideW);//.addClass("imgAni_prev");
                });
                $(imgs[index]).stop(1,1).animate({"left":0},800,function(e){
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
            $j(".notices .dxb_bc").Carousel({"direct":2,"refresh":"#notice .icon_refresh","time":60000});
            $j("#bnr_slider").Slider();
            //$j(".customMySelect").customSelect();
            $j('.header_search').datalist(".datalist");
            this.bindEvent();
            this.acEvent();
        },
        acEvent:function(){
          var  acPanel = $j("#accountPanel");
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
        },
        bindEvent:function(){
            var noticePanel = $j("#notice_sharePanel"), notice = $j("#notice"), ua = navigator.userAgent.toLowerCase(), isMobile = 0;
            if(ua.indexOf("mobile")!=-1 || ua.indexOf("android")!=-1) isMobile = 1;

            notice.find(".icon_share").on("mouseenter",function(e){
                window.clearTimeout(window.showTime);
                var $this = $j(this);
                var offset = $this.offset();
                noticePanel.css({"left":offset.left-noticePanel.width()+$this.width()*4/5,"top":offset.top+$this.height()+6}).fadeIn(300);
                if(isMobile) {
                    var offset = $this.offset();
                    noticePanel.css({"left":offset.left-noticePanel.width()+$this.width()*4/5,"top":offset.top+$this.height()+6}).fadeIn(300);
                }
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

            $j(".slideUp").on("click",function(e){
               var body = $j(this).parents(".table").find(".tbody");
                if(body.is(":visible")){
                    body.slideUp(200);
                }else{
                    body.slideDown(200);
                }
            });


            //$j(".btn_signed").on("mouseenter",function(e){
            //    var $this = $j(this);
            //    var offset = $this.offset();
            //    signedPanle.css({"left":offset.left,"top":offset.top+$this.height()+8}).fadeIn(300);
            //}).on("mouseleave",function(e){
            //    signedPanle.fadeOut(300);
            //});


            //客服代码点击
            $j("#service-online").on('click',function(e){
                window.open('http://bbs.meizu.cn/kf.php','_blank','height=575,width=1000,fullscreen=3,top=200,left=200,status=yes,toolbar=no,menubar=no,resizable=no,scrollbars=no,location=no,titlebar=no,fullscreen=no');
            });

            var wechatQr = $j("#wechatPic"), wechatIcon = $j("#scrollTop").find(".sclTop_shareWX");
            wechatIcon.on("mouseenter",function(e){
                wechatQr.show();
            }).on("mouseleave",function(e){
                wechatQr.hide();
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

            //var $weChat = $j('#footer-weChat');
            //var $wechatPic = $j('#wechatPic');
            //$j('#footer-weChat i').hover(function () {
            //    $wechatPic.css({
            //        left: $weChat.offset().left - 140,
            //        top: $weChat.offset().top - 276
            //    }).show();
            //}, function () {
            //    $wechatPic.hide();
            //}).click(function () {
            //    return false;
            //});
        }
    };
    window.PageHome = new Index();
});