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