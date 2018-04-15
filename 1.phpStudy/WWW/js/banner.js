$(function() {
    banner();
    //关闭首页中央弹窗广告
    /*$(".swfLayer_pop").click(function(){
        swfTab(0);
    });
    setTimeout("swfTab(0)",15000);*/
    //签到
    $(".btn-sign").click(function(){
        var show=$(".btn-sign").attr("data-show");
        if(show==0){
            //调用后台签到功能
            $.get("shop/ajax_Calendar", function(data){
                if(data.data=="1"){
                    $(".btn-sign").attr('data-show',"1");
                    $('body').append(data.info);
                    $(".sign_pop").fadeIn(800);
                    $(".btn_sign_close").click(function(){
                        $(".sign_pop").fadeOut(800,function(){
                            $(".btn-sign").attr('data-show',"0");
                            $(".sign_pop").remove();
                        });                    
                    });
                }
            },'json'); 
        }                
    });
});
function autoWidth() {
    var winWide;
    winWide = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth;
    if (winWide <= 1360) {
        $("#css").attr("href", "http://www.86hud.com/Public/www/style/yueact1000.css");							   
    } else {
        var hcss = $("#css").attr("href");
        if(hcss!="http://www.86hud.com/Public/www/style/yueact1200.css"){
            $("#css").attr("href", "http://www.86hud.com/Public/www/style/yueact1200.css");
        }        			   
    }
}
window.onload=function(){
    window.onresize = autoWidth;   
}
function banner(){	
    var bn_id = 0;
    var bn_id2= 1;
    var speed33=10000;
    var qhjg = 1;
    var MyMar33;
    $("#banner .d1").hide();
    $("#banner .d1").eq(0).fadeIn("slow");
    if($("#banner .d1").length>1)
    {
        $("#banner_id li").eq(0).addClass("nuw");
        function Marquee33(){
            bn_id2 = bn_id+1;
            if(bn_id2>$("#banner .d1").length-1)
            {
                bn_id2 = 0;
            }
            $("#banner .d1").eq(bn_id).css("z-index","2");
            $("#banner .d1").eq(bn_id2).css("z-index","1");
            $("#banner .d1").eq(bn_id2).show();
            $("#banner .d1").eq(bn_id).fadeOut("slow");
            $("#banner_id li").removeClass("nuw");
            $("#banner_id li").eq(bn_id2).addClass("nuw");
            bn_id=bn_id2;
        };	
        MyMar33=setInterval(Marquee33,speed33);
        $("#banner_id li").click(function(){
            var bn_id3 = $("#banner_id li").index(this);
            if(bn_id3!=bn_id&&qhjg==1)
            {
                qhjg = 0;
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id3).css("z-index","1");
                $("#banner .d1").eq(bn_id3).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow",function(){
                    qhjg = 1;
                });
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id3).addClass("nuw");
                bn_id=bn_id3;
            }
        })
        $("#banner_id").hover(
            function(){
                clearInterval(MyMar33);
            }
            ,
            function(){
                MyMar33=setInterval(Marquee33,speed33);
            }
            )	
    }
    else
    {
        $("#banner_id").hide();
    }
}
