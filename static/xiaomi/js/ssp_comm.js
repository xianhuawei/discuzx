/**
 * Created with IntelliJ IDEA.
 * User: tanyaoting
 * Date: 13-5-27
 * Time: 下午3:56
 * To change this template use File | Settings | File Templates.
 */

$.fn.focusShow = function () {
    var obj = $(this);
    var item = obj.find("a");

    item
        .mouseenter(function () {
//            obj.addClass("focusOn");
            item.not($(this)).find("> img").stop().animate({opacity: 0.6}, 1000)
        })
        .mouseleave(function () {
//            obj.removeClass("focusOn");
            item.find("> img").stop().animate({opacity: 1}, 1000)
        })
}
$.fn.picShow = function () {
    var obj = $(this);
    var item = obj.find("li");

    item.eq(0).addClass("current");

    item.mouseenter(function() {
        if (!$(this).hasClass("current")) {
            obj.find(".current").removeClass("current");
            $(this).addClass("current");
        }
    })
}

$.fn.initBbsNav = function () {
    var bbsNav = $(this);

//    var bbsToggle = bbsNav.find(".bbsToggle");

//    bbsToggle.click(function() {
//        $(this).parent(".bbsNav").addClass("bbsNav_show");
//        return
//    })
    var showFlag = 0;
    var bbsToggle = bbsNav.prev("a");

    var bbsNavHide = function() {
        if (showFlag == 0) {
            bbsNav.removeClass("bbsNav_show");
        }
    }

    bbsToggle
        .mouseover(function () {
            $(this).next(".bbsNav").addClass("bbsNav_show");
            showFlag = 1;
        })
        .mouseleave(function () {
            showFlag = 0;
            setTimeout(bbsNavHide, 100);
        })

    bbsNav
        .mouseover(function () {
            showFlag = 1;
        })
        .mouseleave(function () {
            showFlag = 0;
            bbsNavHide();
        })
}

$.fn.searchBar = function () {
    var obj = $(this);
    var str = obj.find("#indexTxtSearch");
    var type = obj.find("#search_type");

    var toggle = obj.find("dt");
    var options = obj.find("dd");

    str
        .keydown(function(e){
            if(e.keyCode == 13){
                iSearch.post();
            }
        })
    toggle.click(function() {
        options.show();
    })
    obj.mouseleave(function() {
        options.hide();
    })
    options
        .mouseenter(function() {
            $(this).addClass("hover");
        })
        .mouseleave(function() {
            $(this).removeClass("hover");
        })
        .click(function() {
            var typeText = $(this).attr("typeText");
            var typeVal = $(this).attr("typeVal");

            toggle.html(typeText + "<i></i>")
            type.val(typeVal);

            options.hide();
        })
}

// search
var iSearch = {
    init: function(){
        var iSearchObj = $("#indexSearch"),
            iSpan     =  iSearchObj.find("span"),
            iTxt      =  $("#indexTxtSearch"),
            spanHide  = function(){
                iSpan.hide();
                iTxt.focus();
            }

        iSpan.click(spanHide);
        iTxt.click(spanHide)
            .keydown(function(e){
                if(e.keyCode == 13){
                    iSearch.post();
                }
            })
        iTxt.val("");
    },
    post: function(){
        _gaq.push(['_trackEvent', 'CMS', '搜索']);

        var itext =  $("#indexTxtSearch"), txt = itext.val();
        if (txt.length === 0 ){
            alert("请您输入内容！");
            itext.focus();
            return;
        }
        var search_type = $("#search_type").val();
        if(search_type=='news'){
            window.open("http://www.xiaomi.cn/index.php?m=search&c=index&a=init&typeid=1&siteid=1&q=" + txt);
        }else{
            //location.href = "http://bbs.xiaomi.cn/search.php?srchtxt=" + txt;
            window.open("http://bbs.xiaomi.cn/search.php?srchtxt=" + txt);
        }
    }
}

$(document).ready(function () {
    $(".bbsNav").initBbsNav();
    $(".focus").focusShow();
    $(".picShow").picShow();
    $(".search").searchBar();
})
