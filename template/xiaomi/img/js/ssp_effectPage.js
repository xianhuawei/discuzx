/* ***************************************
name: advertisementSwitch
import: jquery1.4
***************************************** */
var effectPage = function (slider, options) {
    // 类变量
    
    this.list = jQuery(slider); // 列表
	this.slider = this.list.parent(); // 容器
    this.count = this.list.size(); // 合计
    this.index = 0; //数量
    this.prevIndex = 0; // 上一索引
    this.timer = null; // 计时器
	this.allowShow = true; // 切换频率显示
	this.playType  = "Next"; // 播放类型


    // 选项
    this.options = {//默认值
        Auto: true, //是否自动
        Duration: 800, //持续时间
        Time: 1000, //延时
        Pause: 3000, //停顿时间(Auto为true时有效),
        effect: "", //播放效果
        pageBind: "", // 切换绑定
		lazyLoad: false, // 延迟加载
		useMousePage: false, // 使用鼠标点击翻页
        pageSelectClass: "" //选中样式
    };

   

    jQuery.extend(this.options, options || {});
    //效果方法名
    this.effectName = this.options.effect; //效果名   
	if ( !this.options.autoSize) {// 父级自适应图片大小
		if ( this.options.useMousePage ) this.useMousePage();     //鼠标翻页
	};
	if ( this.options.keyboardPage ) this.useKeyboardPage();   //键盘翻页
};

effectPage.prototype = {
    PlayEffect: function () { // 效果切换
        switch (this.effectName) {
            case "fade":
                this.fadeInOut();
                break; 
            default:
                this.InOut();
                break;
        };
    },
    InOut: function () {//默认
        var index = this.index;
        if (this.list.length > 0 && index != this.prevIndex) {
            jQuery(this.list[index]).css({ "z-index": "1" }).show();
            jQuery(this.list[this.prevIndex]).css({ "z-index": "0" }).hide();
        }
    },
    fadeInOut: function () {//淡入淡出
        var index = this.index;
        if (this.list.length > 0 && index != this.prevIndex) {
            jQuery(this.list[index]).css({ "z-index": "1" }).fadeIn(this.options.Duration);
            jQuery(this.list[this.prevIndex]).css({ "z-index": "0" }).fadeOut(this.options.Duration); ;
        }
    },
    PageStyleSwitch: function () {
        var index = this.index;
        if (this.options.pageSelectClass.length > 0) {
            var pageList = jQuery("#" + this.options.pageBind).children();
            jQuery(pageList[this.index]).addClass(this.options.pageSelectClass);
            if (this.index != this.prevIndex) jQuery(pageList[this.prevIndex]).removeClass(this.options.pageSelectClass);  
        }
    },
    // 继承绑定
    Bind: function (object, fun) {
        var args = Array.prototype.slice.call(arguments).slice(2);
        return function () {
            return fun.apply(object, args.concat(Array.prototype.slice.call(arguments)));
        };
    },
	// 使用鼠标点击翻页
	useMousePage: function(){
		var that = this;
		// 获取父容器高度/宽度
		var parentWidth  = this.slider.width(), 
			parentHeight = this.slider.height();
		var divStyle = "position: absolute; display: block; opacity: 0; filter: Alpha(opacity=0)\9; top: 0; background: #ffffff; z-index: 9;"
		             + "width: " + parentWidth/2 + "px;" + "height: " + parentHeight + "px;";
					 

		// 建立翻转触发
		var leftDiv = document.createElement("DIV");
		leftDiv.style.cssText = divStyle + "left: 0";
		leftDiv.onclick =  function(){
			that.Prev();
		};
		this.slider.append(leftDiv);

		var rightDiv = document.createElement("DIV");
		rightDiv.style.cssText = divStyle + "left: " + parentWidth/2 + "px;";
		rightDiv.onclick = function(){
			that.Next();
		};
		this.slider.append(rightDiv);
	},
	// 使用键盘翻页
	useKeyboardPage: function(){
		var keyControl = this.options.keyboardPage || "",  keyString = ["updown","leftright"], that = this;
		keyControl = keyControl.toString().toLocaleLowerCase();
		if (keyControl.length === 0 || jQuery.inArray(keyControl, keyString) < 0) return;
		
		jQuery(document).keydown(function(e){
			var keyCode = keyControl === "updown" ? [38, 40] : [37, 39];
			if (e.keyCode === keyCode[0]) that.Prev();
			if (e.keyCode === keyCode[1]) that.Next();
		});

	},
	// 频率控制
	switchSpeed: function(){
		clearTimeout(this.allowShowTimer);
		this.allowShowTimer = null;
		this.allowShow = true;
		this.Run(this.index);
	},
	// 加载图片
	LoadImage: function( imgUrl, index ){
		var that = this,
			imgNew = new Image(),
			imgControl = that.list[index];
		imgControl.removeAttribute("lazysrc");
		imgNew.src	   	 = imgUrl;
		imgNew.index     = index;
		imgControl.src   = imgUrl;
		imgNew.onload = function () {
			that.Play(imgNew.index);
			that.allowShow = true;
			imgNew.onload = null;
			jQuery(".loading").css({"display": "none"});
		};
	},
    // 设置变量
    Run: function (index, t) {
    	this.playType = t;
        clearTimeout(this.timer);
        //修正index
        index == undefined && (index = this.index);
        index < 0 && (index = this.count - 1) || index >= this.count && (index = 0);
        this.index = index;
		var imgControl = this.list[index],
			imgUrl     = imgControl.getAttribute("lazysrc");

		if ( this.options.lazyLoad ){
			if (imgUrl){
				// 控制切换频率
				if(!this.allowShow) return;
				jQuery(".loading").css({"display": "block"});
				this.allowShow = false;
				this.LoadImage(imgUrl, index);
				
			}else{
				this.Play(index);	
			};

		}else{
			this.Play(index); //播放
		};
		
    },
	// Play
	Play: function (index){
		// ++pv
		// this.cnzzCount();
		this.index = index;
		this.PlayEffect(); //切换播放效果
        this.PageStyleSwitch(); //选择样式切换
        this.prevIndex = index;
        // 外部翻页触发事件
        if (this.options.flipPage) this.options.flipPage(index, this.playType);
        // 自动播放
        this.options.Auto && (this.timer = setTimeout(this.Bind(this, this.Next), this.options.Pause));
	},
	// cnzz count
	// cnzzCount: function(){
	// 	var imgV    = jQuery("img[src*='cnzz.com']"),
	// 		imgN    = document.createElement("IMG");
	// 	imgN.width  = 0;
	// 	imgN.height = 0;
	// 	imgN.border = 0;
	// 	imgN.src    = imgV.attr("src");
	// 	//delete
	// 	imgV.remove();
	// 	//create
	// 	document.body.appendChild(imgN);

	// },
	First: function (){ this.Run(0, "First"); },
	End : function () { this.Run(this.count-1, "End"); },
    Next: function () { this.Run(++this.index, "Next");  },
    Prev: function () { this.Run(--this.index, "Prev"); },
    Stop: function () { }
};


