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
})
