$(function(){
    $("#sidebar > ul >li").on("mouseover",function(){
        $this=$(this);
        $hide_div=$this.find("h4").next();
        height=$hide_div.height();
        $this.height(Number(height)+Number(45));
    }).on("mouseout",function(){
        $this=$(this);
        $this.height(45);
    })
})
