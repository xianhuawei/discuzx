/**
 * Created by yangjunxiong on 2014/12/12.
 */
;$j(function(){
    var Medals = function(){
        this.init();
    };
    $j.extend(Medals.prototype,{
        medalEl:null,
        medals:null,
        init:function(){
            var _this = this;
            _this.medalEl = $j(".medals");
            if(_this.medalEl.length<=0) return;

            $j.each(_this.medalEl,function(index,val){
                var medals = $j(val).find(".medal");
                if(medals.length<=0) return;
                if(medals.length>=12){
                    $j(val).css({"height":192});
                    $j.each(medals,function(ind,va){
                        if(ind<11) return;
                        $j(va).hide();
                    });
                    if(medals.length==13){
                        $j(val).find(".medal:eq(11)").show();
                    }else if(medals.length>=14){
                        $j(val).find(".more").show();
                    }
                }
            });
            _this.bindEvent();
        },
        bindEvent:function(){
            var _this = this;
            $j(".medals").find(".more").on("mouseenter",function(e){
                _this.show($j(this));
            });
            $j(".medals").on("mouseleave",function(e){
                _this.hide($j(this).find(".more"));
            });
        },
        show:function(el){
            var _this = this, medalCollect = el.parents(".medals");
            var medals = medalCollect.find(".medal");
            var height = Math.ceil((medals.length-1)/3) * 48;
            $j.each(medals,function(i,v){
                if(i<11) return;
                $j(v).show();
            });
            medalCollect.stop(0,0).animate({"height":height},1000,function(e){
                medalCollect.find(".more").fadeOut(300)
            });
        },
        hide:function(el){
            var _this = this, medalCollect = el.parents(".medals");
            var medals = medalCollect.find(".medal");
            var height = 192;
            if(medals.length<12) return;
            medalCollect.stop(0,0).animate({"height":height},1000,function(e){
                $j.each(medals,function(i,v){
                    if(i<11) return;
                    $j(v).hide();
                    if(medals.length===13 && i===11){
                        $j(v).show();
                    }
                });
                if(medals.length>13) medalCollect.find(".more").fadeIn(300)
            });
        }
    });
    new Medals();
});