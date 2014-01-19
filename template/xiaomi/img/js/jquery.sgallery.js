/*
 *	sGallery 1.0 - simple gallery with jQuery
 *	made by bujichong 2009-11-25
 *	作者：不羁虫  2009-11-25
 * http://hi.baidu.com/bujichong/
 *	欢迎交流转载，但请尊重作者劳动成果，标明插件来源及作者
 */

(function (jQuery) {
jQuery.fn.sGallery = function (o) {
    return  new jQuerysG(this, o);
			//alert('do');
    };

	var settings = {
		thumbObj:null,//预览对象
		titleObj:null,//标题
		botLast:null,//按钮上一个
		botNext:null,//按钮下一个
		thumbNowClass:'now',//预览对象当前的class,默认为now
		slideTime:800,//平滑过渡时间
		autoChange:true,//是否自动切换
		changeTime:5000,//自动切换时间
		delayTime:100//鼠标经过时反应的延迟时间
	};

 jQuery.sGalleryLong = function(e, o) {
    this.options = jQuery.extend({}, settings, o || {});
	var _self = jQuery(e);
	var set = this.options;
	var thumb;
	var size = _self.size();
	var nowIndex = 0; //定义全局指针
	var index;//定义全局指针
	var startRun;//预定义自动运行参数
	var delayRun;//预定义延迟运行参数

//初始化
	_self.eq(0).show();

//主切换函数
function fadeAB () {
	if (nowIndex != index) {
		if (set.thumbObj!=null) {
		jQuery(set.thumbObj).removeClass().eq(index).addClass(set.thumbNowClass);}
		_self.eq(nowIndex).hide();
		_self.eq(index).stop(true,true).fadeIn(set.slideTime);
		jQuery(set.titleObj).eq(nowIndex).hide();//新增加title
		jQuery(set.titleObj).eq(index).show();//新增加title
		nowIndex = index;
		if (set.autoChange==true) {
		clearInterval(startRun);//重置自动切换函数
		startRun = setInterval(runNext,set.changeTime);}
		}
}

//切换到下一个
function runNext() {
	index =  (nowIndex+1)%size;
	fadeAB();
}

//点击任一图片
	if (set.thumbObj!=null) {
	thumb = jQuery(set.thumbObj);
//初始化
	thumb.eq(0).addClass(set.thumbNowClass);
		thumb.bind("mousemove",function(event){
			index = thumb.index(jQuery(this));
			fadeAB();
			delayRun = setTimeout(fadeAB,set.delayTime);
			clearTimeout(delayRun);
			event.stopPropagation();
		})
	}

//点击上一个
	if (set.botNext!=null) {
		var botNext = jQuery(set.botNext);
		botNext.mousemove(function () {
			runNext();
			return false;
		});
	}

//点击下一个
	if (set.botLast!=null) {
		var botLast = jQuery(set.botLast);
		botLast.mousemove(function () {
			index = (nowIndex+size-1)%size;
			fadeAB();
			return false;
	});
	}

//自动运行
	if (set.autoChange==true) {
	startRun = setInterval(runNext,set.changeTime);
	}

}

var jQuerysG = jQuery.sGalleryLong;

})(jQuery);

function slide(Name,Class,Width,Height,fun){
	jQuery(Name).width(Width);
	jQuery(Name).height(Height);
	
	if(fun == true){
		jQuery(Name).append('<div class="title-bg"></div><div class="title"></div><div class="change"></div>')
		var atr = jQuery(Name+' div.changeDiv a');
		var sum = atr.length;
		for(i=1;i<=sum;i++){
			var title = atr.eq(i-1).attr("title");
			var href = atr.eq(i-1).attr("href");
			jQuery(Name+' .change').append('<i>'+i+'</i>');
			jQuery(Name+' .title').append('<a href="'+href+'">'+title+'</a>');
		}
		jQuery(Name+' .change i').eq(0).addClass('cur');
	}
	jQuery(Name+' div.changeDiv a').sGallery({//对象指向层，层内包含图片及标题
		titleObj:Name+' div.title a',
		thumbObj:Name+' .change i',
		thumbNowClass:Class
	});
	jQuery(Name+" .title-bg").width(Width);
}

//缩略图
jQuery.fn.LoadImage=function(scaling,width,height,loadpic){
    if(loadpic==null)loadpic="../images/msg_img/loading.gif";
return this.each(function(){
   var t=jQuery(this);
   var src=jQuery(this).attr("src")
   var img=new Image();
   img.src=src;
   //自动缩放图片
   var autoScaling=function(){
    if(scaling){
     if(img.width>0 && img.height>0){ 
           if(img.width/img.height>=width/height){ 
               if(img.width>width){ 
                   t.width(width); 
                   t.height((img.height*width)/img.width); 
               }else{ 
                   t.width(img.width); 
                   t.height(img.height); 
               } 
           } 
           else{ 
               if(img.height>height){ 
                   t.height(height); 
                   t.width((img.width*height)/img.height); 
               }else{ 
                   t.width(img.width); 
                   t.height(img.height); 
               } 
           } 
       } 
    } 
   }
   //处理ff下会自动读取缓存图片
   if(img.complete){
    //autoScaling();
      return;
   }
   jQuery(this).attr("src","");
   var loading=jQuery("<img alt=\"加载中...\" title=\"图片加载中...\" src=\""+loadpic+"\" />");
  
   t.hide();
   t.after(loading);
   jQuery(img).load(function(){
    //autoScaling();
    loading.remove();
    t.attr("src",this.src);
    t.show();
	//jQuery('.photo_prev a,.photo_next a').height(jQuery('#big-pic img').height());
   });
  });
}

//向上滚动代码
function startmarquee(elementID,h,n,speed,delay){
 var t = null;
 var box = '#' + elementID;
 jQuery(box).hover(function(){
  clearInterval(t);
  }, function(){
  t = setInterval(start,delay);
 }).trigger('mouseout');
 function start(){
  jQuery(box).children('ul:first').animate({marginTop: '-='+h},speed,function(){
   jQuery(this).css({marginTop:'0'}).find('li').slice(0,n).appendTo(this);
  })
 }
}

//TAB切换
function SwapTab(name,title,content,Sub,cur){
  jQuery(name+' '+title).mouseover(function(){
	  jQuery(this).addClass(cur).siblings().removeClass(cur);
	  jQuery(content+" > "+Sub).eq(jQuery(name+' '+title).index(this)).show().siblings().hide();
  });
}
