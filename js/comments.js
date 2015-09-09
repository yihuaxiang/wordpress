$(function(){
    $("#comment_form").on("submit",function(){
        return false;
    })

    $("#comments_submit_button").on("click",function(){
        var $form=$("#comment_form");
        var $items=$("input,textarea",$form);
        var flag=true;
        $items.each(function(i,item){
            var $item=$(item);
            if($item.val() == ""){
                flag=false;
                $item.addClass("error");
            }else{
                $item.removeClass("error");
            }
        })
        var email=$("[type='email']",$form).val();
          var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
          if(re.test(email)){

          }else{
            flag=false;
            $("[type='email']",$form).addClass("error");
          }

        if(flag == true){
            document.forms["comment_form"].submit()
        }else{
            return false;
        }
    })

    $("#comment_form input,#comment_form textarea").on("keydown",function(event){
        if(event.keyCode == "13" && event.ctrlKey == true){
            $("#comments_submit_button").trigger("click");
        }
    })

    var $textarea=$("#message_comment");
    var textarea=$textarea[0];

    function mousewheelCallback(event,delta,deltaX,deltaY){
        var scrollHeight=textarea.scrollHeight;
        //console.log(scrollHeight);
        if(scrollHeight < 177){
            $textarea.one("mousewheel",mousewheelCallback);
            return ;
        }else{
            if(deltaY < 0){
                event.preventDefault();
                var scrollTop=$textarea.scrollTop();
                //console.log(scrollTop);
                $textarea.scrollTo(Number(scrollTop)+140);
                window.setTimeout(function(){
                    $textarea.one("mousewheel",mousewheelCallback)
                },100)
            }else if(deltaY > 0){
                var scrollTop=$textarea.scrollTop();
                if(scrollTop == 0){
                    $textarea.one("mousewheel",mousewheelCallback)
                }else{
                    event.preventDefault();
                    //console.log(scrollTop);
                    var newScrollTop=scrollTop-140 < 0 ?0: (scrollTop-140) ;
                    $textarea.scrollTo(newScrollTop);
                    window.setTimeout(function(){
                        $textarea.one("mousewheel",mousewheelCallback);
                    },100)
                }
            }
        }
    }

    $textarea.one("mousewheel",mousewheelCallback);
    $textarea.on("mousewheel",function(event){
        var scrollHeight=textarea.scrollHeight;
        if(scrollHeight < 177){

        }else{
            event.preventDefault();
        }
    })
})
