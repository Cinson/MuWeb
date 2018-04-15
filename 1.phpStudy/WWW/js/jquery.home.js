
 function inPosition(elem, e){
    	var w = elem.width(), h = elem.height(), direction=0, obj={};
    	/** 计算x和y得到一个角到elem的中心，得到相对于x和y值到div的中心 **/
    	var x = (e.pageX - elem.offset().left - (w / 2)) * (w > h ? (h / w) : 1);
    	var y = (e.pageY - elem.offset().top - (h / 2)) * (h > w ? (w / h) : 1);

    	/** 鼠标从哪里来 / 角度 和 方向出去顺时针（得出的结果是TRBL 0 1 2 3） **/
    	/**
    	   * 首先计算点的角度，
    	   * 再加上180度摆脱负值
    	   * 90初,一得到的象限（象限，又称象限角，意思就是一个圆之四分之一等份）
    	   * 加上3，做一个模（求模 求余数）4的象限转移到一个适当的顺时针 得出 TRBL 0 1 2 3（上/右/下/左）
    	   */
    	direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;

    	switch(direction)
    	{
    		case 0://from top
    			obj.left = 0;
    			obj.top = "-100%";
    			break;
    		case 1://from right
    			obj.left = "100%";
    			obj.top = 0;
    			break;
    		case 2://from bottom
    			obj.left = 0;
    			obj.top = "100%";
    			break;
    		case 3://from left
    			obj.left = "-100%";
    			obj.top = 0;
    			break;
    	}
    	return obj;
    };


  /*友情链接*/
;(function(){
	$.fn.friendLink = function(options){
		var defaults = {
			speed:30
		}
		var opts = $.extend(defaults,options);
		this.each(function(){
			var $timer;
			var scroll_top=0;
			var obj = $(this);
			var $height = obj.find("div").height();
			obj.find("div").clone().appendTo(obj);
			obj.hover(function(){
				clearInterval($timer);
			},function(){
				$timer = setInterval(function(){
					scroll_top++;
					if(scroll_top > $height){
						scroll_top = 0;
					}
					obj.find("div").first().css("margin-top",-scroll_top);
				},opts.speed);
			}).trigger("mouseleave");
		})
	}
})(jQuery);


$(function(){
	
	/*==================首页=========================*/
	//首页幻灯
	 if($("#slider").length)
	 {
		 slider({
			sliderBox:"#slider",
			sliderList:"#slider ul li",
			showsize:1,
			effect:"fade",
			bind:"mouseover",
			isAutoPlay:true,
			isSubNum:true
		});
	 }
	

	 //高手指南
	 $(".gList1 li a").hover(
	 	function(){$(this).find("img").stop(true).animate({"marginTop":"-60px"})},
	 	function(){$(this).find("img").stop(true).animate({"marginTop":0})})

	//特色玩法

    $(".fCon ul li a").hover(
    	function(e){
    		$(this).find("var").css(inPosition($(this),e)).stop(true).animate({"left":0,"top":0});
    	},

    	function(e){
    		$(this).find("var").stop(true).animate(inPosition($(this),e));
    	}
    )




	//首页TAB切换
	$("#ifmTab1").myTab({tabHand:"#ifmTab1 h4",tabBox:"#ifmTab1 .ifmDiv",fades:"top",bind:"mouseover",special:"true"});
	$("#ifmTab2").myTab({tabHand:"#ifmTab2 h4",tabBox:"#ifmTab2 .ifmDiv",fades:"top",bind:"mouseover",special:"true"});


	//友情链接
	$(".linkCon").friendLink({
		speed:80 //数值越大 速度越慢
	});


	//截图壁纸

	$(".paperCon a").mouseover(
		function(){
			var idx = $(this).index();
			if(!$(this).hasClass("iOn")){
				if(idx===1){
					$(this).addClass("iOn").siblings("a").removeClass("iOn").stop(true).animate({"height":"70px"})
					.find("i").stop(true).animate({"left":"-100px"},500)
					.siblings("var").css({"left":"-30px"}).stop(true).animate({"left":"-30px"},700)
					.siblings("span").stop(true).animate({"top":"25px"});

					$(this).find("span").stop(true).animate({"top":"-30px"});
					$(this).find("i").css({"left":"-100px"}).stop(true).animate({"left":"30px"},500)
					.siblings("var").css({"left":"-30px"}).stop(true).animate({"left":"30px"},700);
				}
				else{
					$(this).addClass("iOn").stop(true).animate({"height":"170px"}).siblings("a").removeClass("iOn")
					.find("i").stop(true).animate({"left":"-100px"},500)
					.siblings("var").css({"left":"-30px"}).stop(true).animate({"left":"-30px"},700)
					.siblings("span").stop(true).animate({"top":"25px"});


					$(this).find("span").stop(true).animate({"top":"-30px"});
					$(this).find("i").css({"left":"-100px"}).stop(true).animate({"left":"30px"},500)
					.siblings("var").css({"left":"-30px"}).stop(true).animate({"left":"30px"},700);



				}
			}
		}
	)

})