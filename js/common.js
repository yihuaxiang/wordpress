$(function(){
    $(window).on("scroll",function(){
        var $this=$("body");
        var scrollTop=$this.scrollTop();
        var $toTop=$("#to_top");


        if(scrollTop > 500){

            $toTop.addClass("show");
        }else{
            $toTop.removeClass("show");
        }
    })

    $("#to_top").on("click",function(){
        $("body").scrollTo(0);
    })
})
