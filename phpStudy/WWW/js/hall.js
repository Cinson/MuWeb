$(function() {
    var game_type='0';//游戏类型
    var pinyin='0';//字母排序
    $("#game_type a").click(function(){
        game_type= $(this).attr("data-target");
        $("#game_type a").removeClass("curr");
        $(this).addClass("curr");
        getGameCode(game_type,pinyin);
    });
    $("#pinyin a").click(function(){
        pinyin= $(this).attr("data-target");
        $("#pinyin a").removeClass("curr");
        $(this).addClass("curr");
        getGameCode(game_type,pinyin);
    });
    function getGameCode(game_type,pinyin){
        //全部游戏
        if(game_type=="0" && pinyin=="0"){
            $(".listGames").hide();
            $(".allGames").show();
        }else{
            $(".listGames").show();
            $(".allGames").hide();
            $.ajax({
                type : "get",
                url : "/game.php",
                cache : false,
                data : {
                    game_type: game_type, 
                    pinyin: pinyin
                },
                dataType : "json",
                success : function (data) {
                    if (data.status == "1") {
                        $(".listGames").html(data.code);
                    } else if (data.status == "0") {//没有游戏
                        $(".listGames").html('<li>抱歉，找不到相关的结果！</li>');
                    }
                }
            });
        }
		
		
    }
	
});