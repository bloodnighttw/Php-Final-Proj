$(function(){
    if($(".adbox").height() > 1 && $(".adbox").css("display") != "none"){
        console.log("no ad blocker");
    }else{
        $("#body").replaceWith('<div class="container" id="body"><h1>請關閉你的廣告阻擋器</h1></div>')
    }
})