/**
 * Created by yangjunxiong on 2014/10/23.
 */
jQuery.fn.tabs = function(control){
    var ele = $(this);
    var control = $(control);

    ele.delegate("li","click",function(){
        var tabName = $(this).attr("data-tab");
        ele.trigger("change.tabs", tabName);
    });

    ele.bind("change.tabs",function(e,tabName){
        ele.find("li").removeClass("active");
        ele.find(">[data-tab='"+tabName+"']").addClass("active");
    });

    ele.bind("change.tabs",function(e,tabName){
        control.find(">[data-tab]").removeClass("active");
        control.find(">[data-tab='"+tabName+"']").addClass("active");
    });

    var firstName = ele.find("li:last").attr("data-tab");
    ele.trigger("change.tabs",firstName);

    return this;
};