$(function(){
    $("#sidebar > ul >li").on("mouseover",function(){


        $this=$(this);

        $this.siblings().each(function(index,one){
            $(one).height(45);
        })

        $hide_div=$this.find("h4").next();
        height=$hide_div.height();
        $this.height(Number(height)+Number(45));
    }).on("mouseout",function(){
        // $this=$(this);
        // $this.height(45);
    })

    // $("#sidebar > ul > li").eq(0).trigger("mouseover");
})
