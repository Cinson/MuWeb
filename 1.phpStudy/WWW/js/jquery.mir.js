// JavaScript Document
//判断浏览器类型
$.browser ={};
$.browser.mozilla = /firefox/.test(navigator.userAgent.toLowerCase());
$.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
$.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
$.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());

/*----------------------------------------------------------------------------------------------------*/
     //for slider    各种切换（带箭头、带数字导航、带标题、带缩略图）    
/*----------------------------------------------------------------------------------------------------*/

/*========================================================
   运用：
   
   slider({
		sliderBox:"#slider",
		sliderList:"#slider ul li",
		showsize:1,
		arrow:
		{
			isBtn:true,
			leftBtn:".aleft",
			rightBtn:".aright"
		},
		isAutoPlay:true,   新增两个类：aleft和aright                                      
		showTime:3000,
		isSubNum:true,     单独开启数字导航（不带标题）新增两个id:#subNum(父级)，#subList(列表),当前状态类：subOn
		smallImg:true,     开启缩略图
		samllSize:3,       缩略图显示个数
		bind:"click",      
		effect:"fade"      三种切换模式可选 fade|left|top
		hasTitle:true      除了上面新增数字导航的东西还多了一个id：#subTitle   必须给img设置alt属性值
		});

   默认状态：左右箭头关闭，数字导航关闭，带标题关闭，自动播放关闭，显示个数为2；
   

========================================================*/

var slider=function(opt){
    //settings
    var settings=jQuery.extend({
        sliderBox:"#slider",//整个图片展示id
		sliderCon:"#slider ul",
        sliderList:"#slider ul li",//图片列表
		sliderele:"slider",
		scrollWay:false,
		specials:false,
		isLeftBtn:false,
        now:0,//默认选中标签下标
		arrow:{
				isBtn:false,//是否需要左右按钮
				leftBtn:"#",//左边按钮
				rightBtn:"#"//右边按钮
			},
		showsize:2,//主图显示个数
		isAutoPlay:false,//是否自动播放
		showTime:3000,//自动播放切换时间
		isSubNum:false,//是否增加数字导航
		hasTitle:false,//是否带标题
		smallImg:false,//是都带缩略图
		smallSize:3,//缩略图显示个数
		organWidth:0,//风琴效果---水平（宽度）
		organHeight:0,//风琴效果---垂直（高度）
		bind:"click",//鼠标事件
		effect:"fade",//大图切换效果 left,top,fade,organ
		noto:false,
		callBack:false//回调
		
    },opt);
    var 
        $now=settings.now,
		aBtn=settings.arrow,
		$showsize=settings.showsize,
		$scrollWay=settings.scrollWay,
		$specials=settings.specials,
		$isLeftBtn=settings.isLeftBtn,
		isBtn=aBtn.isBtn,
		$leftBtn=$(aBtn.leftBtn),
		$rightBtn=$(aBtn.rightBtn),
		$sliderBox=$(settings.sliderBox),
		$sliderCon=$(settings.sliderCon),
        $sliderList=$(settings.sliderList),
		isAutoPlay=settings.isAutoPlay,
		isSubNum=settings.isSubNum,
		hasTitle=settings.hasTitle,
		smallImg=settings.smallImg,
		$smallSize=settings.smallSize,
		$organWidth=settings.organWidth,
		$organHeight=settings.organHeight,
		$bind=settings.bind,
		$effect=settings.effect,
		$showTime=settings.showTime,
        callBack=settings.callBack,
		sliderele=settings.sliderele,
		noto=settings.noto;
		
		if($scrollWay)
		{
			$sliderList.parent().append($sliderList.parent().html());
			var maxSize=$sliderList.parent().children().size();
		}
		else
		{
			var maxSize=$sliderList.size();//列表总条数
		}
		
    
	var $liH=$sliderList.eq(0).outerHeight(true);
	var $liW=$sliderList.eq(0).outerWidth(true);//单张图片的宽度+（包括margin padding border的值）
	var $liW2=$sliderList.eq(0).outerWidth()//单张图片的宽度（包括padding border,不包括margin的值）
	var $liMargin=$liW-$liW2;//求出 margin 左右的值
	if($effect!="top")
	{
		//$sliderList.parent().parent().css("width",$liW*$showsize-$liMargin+'px');//图片展示区域尺寸
	}
	
	//$sliderList.parent().css("width",maxSize*$liW);//图片列表的总宽度
	imgEffect($now);
	
	function imgEffect(index)
	{
		switch($effect)
		{
			case "left":
			            if($specials)
			            {
			            	$sliderList.parent().css({"width":maxSize*$liW+'px',"height":$liH+'px'});

			            	if(!$isLeftBtn)
			            	{
			            		$sliderList.parent().stop(true).animate({"marginLeft":-$liW+'px'},function(){
			            		$sliderList.parent().css({"marginLeft":0}).append($sliderList.parent().children().eq(0));
			            		});
			            	}

			            	else
			            	{
			            		$sliderList.parent().prepend($sliderList.parent().children().eq(maxSize-1))
			            		$sliderList.parent().css({"marginLeft":-$liW+'px'}).animate({"marginLeft":0});
			            	}
			            }
			            else
			            {
            	            $sliderList.parent().css({position:"absolute",top:"0",width:maxSize*$liW+'px',height:$liH+'px'});
            				$sliderList.parent().children().css({"float":"left"});
            				$sliderList.parent().stop(true).animate({"left":-$liW*index+'px'},{duration:1000,easing:"easeInOutCubic"});
			            }
						break;
			case "top":	
			           $sliderList.parent().css({width:$liW+'px',height:maxSize*$liH+'px'});
					   $sliderList.parent().stop(true).animate({"marginTop":-$liH*index+'px'},{duration:500,easing:"easeInOutCubic"});
					   break;	
			case "fade": 
					   $sliderList.parent().css({position:"relative",width:$liW+'px',height:$liH+'px'});
					   $sliderList.css({"position":"absolute",left:0,top:0,zIndex:1});
					   $sliderList.eq(index).show().stop(true).css({zIndex:99}).animate({opacity:1},{duration:800,easing:"swing"}).siblings("li").animate({opacity:0},{duration:800,easing:"swing"}).hide();
					   break;
			case "organ":
					   $sliderList.find(".isHand").bind($bind,function(){
						  $(this).parent().addClass("isOn").siblings().removeClass("isOn");
						  $(this).parent().stop(true).animate({"width":"326px"}).siblings().stop(true).animate({"width":"40px"});
						  //$(this).siblings().show().stop(true).animate({width:$organWidth+'px'},{duration:500,easing:"easeOutQuad",queue:false});
						 // $(this).parent().siblings().find(".isSpread").stop(true).animate({width:0},{duration:500,easing:"easeOutQuad", queue:false,complete:function(){$(this).hide()}})
						  //$(this).siblings().show().css({width:$organWidth+'px'});
						  //$(this).parent().siblings().find(".isSpread").css({width:0,"display":"none"})
					   })
					   break;		   
		}
	}	
	
	
	if(hasTitle)
	{
		var subNumHtml='<div id="subTitle"></div>';
		$sliderBox.append(subNumHtml);
		var imgName=$sliderList.find("img").eq(0).attr("name"); 
		var imgLink=$sliderList.find("a").eq(0).attr("href"); 
		var titleListHtml='<span><a href="'+imgLink+'" target="_blank">'+imgName+'</a></span>';	
		$("#subTitle").append(titleListHtml);	
	}
	
	if(isSubNum)//判断如果有数字导航时执行
	{
		if(hasTitle)
		{
			var subNumHtml='<div id="subNum"><div id="subTitle"></div><div id="subList"></div></div>';
			$sliderBox.append(subNumHtml);
			var imgName=$sliderList.find("img").eq(0).attr("name"); 
			$("#subTitle").html(imgName);
		}
		else
		{
			var subNumHtml='<div id="subNum"><div id="subList"></div></div>';
			$sliderBox.append(subNumHtml);
		}
		
		for(var i=0;i<maxSize;i++)
			{
				var numListHtml='<span></span>'
				$("#subList").append(numListHtml);	
			}
			$("#subList").find("span").eq(0).addClass("sOn");
			
		$("#subList").find("span").bind($bind,
			function(){
				$(this).addClass("sOn").siblings().removeClass("sOn");
				var index=$("#subList span").index($(this))
				    $now=index;	
				    imgEffect($now);
					//$sliderList.parent().stop(true).animate({"left":-$liW*index+'px'},{duration:1000,easing:"easeInOutCubic"});
			});
	};
	
	
	if(smallImg)   //判断是否带缩略图
	{

		var smallImgHtml='<div id='+sliderele+'><ul></ul></div>'
		$sliderBox.append(smallImgHtml);
		
		$sliderList.each(function(){
			var bigSrc=$(this).find("img").attr("src");
			bigSrc=bigSrc.split(".");		
			var smallImgList='<li><a href="javascript:void(0)"><img src="'+bigSrc[0]+'b.png" /></a><span></span></li>';
			
		$("#"+sliderele).children("ul").append(smallImgList);
		
		});
		
		var smallUl=$("#"+sliderele).children("ul");
		var smallLi=$("#"+sliderele).children("ul").children("li");
		var smallLiW=$("#"+sliderele).children("ul").children("li").eq(0).outerWidth(true);
		var smallLiW2=$("#"+sliderele).children("ul").children("li").eq(0).outerWidth();
		var smallLiMargin=smallLiW-smallLiW2;
		var smallLiH=$("#"+sliderele).children("ul").children("li").eq(0).outerHeight(true);
		var smallLiH=$("#"+sliderele).children("ul").children("li").eq(0).addClass("lOn");
		if(noto)
		{
		}else{
        $("#smallImg").css({
			width:smallLiW*$smallSize-smallLiMargin+'px',
			height:smallLiH+"px",
			overflow:"hidden"
		});
		
		smallUl.css({
			width:maxSize*smallLiW+'px',
			height:smallLiH+"px",
			position:"absolute",
			left:0,
			top:0	
		});
		}
		smallLi.bind($bind,
			function(){
				var index=$(this).index();
				    smallLi.removeClass("lOn");
				    $(this).addClass("lOn");
					if(maxSize-$smallSize>index-1)
					{
						smallUl.stop(true).animate({"left":-smallLiW*index+'px'},{duration:1000,easing:"easeInOutCubic"});	
					}	
					else if(index>=maxSize-1)
					{
						smallUl.stop(true).animate({"left":-smallLiW*(maxSize-$smallSize)+'px'},{duration:1000,easing:"easeInOutCubic"});	
					}
					
					else if(index>maxSize)
					{
						smallUl.stop(true).animate({"left":0},{duration:1000,easing:"easeInOutCubic"});
					}

					if(hasTitle)
					{
						var imgName=$sliderList.find("img").eq(index).attr("name"); 
						var imgLink=$sliderList.find("a").eq(index).attr("href"); 
						var titleListHtml='<span><a href="'+imgLink+'" target="_blank">'+imgName+'</a></span>';	
						$("#subTitle").html(titleListHtml);
					}
					
						
					if($now!=index)
					{
						imgEffect(index);
					}
					if(noto)
					{
						
					}else{
					$sliderList.parent().stop(true).animate({"left":-$liW*index+'px'},{duration:1000,easing:"easeInOutCubic"});	
					}
					$now=index;	
					
			});
			
	}
	
	if(isBtn==true)//判断如果有左右箭头时执行
	{
		if(maxSize>$showsize)
		{
			var arrowHtml='<a class="aleft png" href="javascript:void(0)">向左</a><a class="aright png" href="javascript:void(0)">向右</a>';
			$sliderBox.append(arrowHtml);
			$leftBtn=$(aBtn.leftBtn);
			$rightBtn=$(aBtn.rightBtn);
			$rightBtn.click(clickRight);
			$leftBtn.click(clickLeft);
		}	
	}	
	
	
   //图片滚动的位置
	function imgPosition()
	{
		if(smallImg)
		{
			 smallLi.removeClass("lOn");
		     smallLi.eq($now).addClass("lOn");
			//if(maxSize-$smallSize>$now-1)
//			{
//				smallUl.stop(true).animate({"left":-smallLiW*$now+'px'},{duration:1000,easing:"easeInOutCubic"});	
//			}	
//
//			else if($now>=maxSize-1)
//			{
//				smallUl.stop(true).animate({"left":-smallLiW*(maxSize-$smallSize)+'px'},{duration:1000,easing:"easeInOutCubic"});	
//			}
//			
//			else if($now>maxSize)
//			{
//				smallUl.stop(true).animate({"left":0},{duration:1000,easing:"easeInOutCubic"});
//			}	
		}
		imgEffect($now);
		//$sliderList.parent().stop(true).animate({"left":-$liW*$now+'px'},{duration:1000,easing:"easeInOutCubic"});
	}
	
	//点击左箭头
	function clickLeft()
	{   $isLeftBtn=true;
	    if($sliderList.parent().is(":animated")){return;}
		$rightBtn.removeClass("rLast");
	   if($now<=0)
		{	
			$now=maxSize-$showsize;
		}
		else
		{
			$now--;
		}

		imgPosition();
	}
	
	
	//点击右箭头
	function clickRight()
	{   
		$isLeftBtn=false;
		if($sliderList.parent().is(":animated")){return;}
		//$leftBtn.removeClass("lLast");
		  $leftBtn && $leftBtn.removeClass("lLast");
		if($now>=maxSize-$showsize)
		{
			
			$now=0;	

		}
		else
		{
			$now++;
		}
		
		if(hasTitle)
		{
			var imgName=$sliderList.find("img").eq($now).attr("name"); 
			var imgLink=$sliderList.find("a").eq($now).attr("href"); 
		    var titleListHtml='<span><a href="'+imgLink+'" target="_blank">'+imgName+'</a></span>';	
			$("#subTitle").html(titleListHtml);
		}
		
		if(isSubNum==true)
		{
			if(hasTitle==true)
			{
				var imgName=$sliderList.find("img").eq($now).attr("name"); 
				$("#subTitle").html(imgName);
			}	
			$("#subList").find("span").removeClass("sOn").eq($now).addClass("sOn");	
		}
		
		imgPosition();
			
	}
	
	//自动播放
	var timer=null;
	function autoPlay()
	{
		clearInterval(timer);
		timer=setInterval(clickRight,$showTime);		
	}
	if(isAutoPlay)
	{
		autoPlay();
		$sliderBox.hover(
		function(){clearInterval(timer);},
		function(){autoPlay();})
	}
};

//普通tab切换标签
(function(){
    $.fn.extend({
		myTab:function(options, callback){
			var defaults={
				obj:"#tab",
				tabHand:"#tab h3",
				tabBox:"#tabBox ul",
				tabOn:"on",
				bind:"click",
				fades:"defaults",
				now:0,
				special:false,
				sp:false
			}; 
			var options = $.extend(defaults, options);
            var callback = callback || function(){};
            $(this).each(function(){
				 var $this = $(this);
				 var $obj=$this,
				 	 $tabHand=$(options.tabHand),
					 $tabBox=$(options.tabBox),
					 $tabOn=options.tabOn,
					 $bind=options.bind,
					 $fades=options.fades,
					 $h=$tabBox.outerHeight(true),
					 $w=$tabBox.outerWidth(true),
					 $len=$tabBox.length,
					 $now=options.now,
					 $special=options.special;
					 $sp=options.sp;
					 
					 $tabHand.find("a").bind($bind,(function(){
						 if(!$(this).hasClass($tabOn))
						 {
							 var index=$(this).index();
							 $now=$tabHand.find("."+$tabOn).index();
							 $(this).addClass($tabOn).siblings().removeClass($tabOn);
							 
							 if($sp)
							 {
								 //$(this).find("span").animate({"top":"18px"}).siblings("var").animate({"top":"65px"}).siblings("i").fadeOut();
								 $(this).siblings().find("span").animate({"top":"18px"}).siblings("var").animate({"top":"65px"})
								
							 }
							 if($special)
							 {
							 	 var $aW=$(this).outerWidth(true);
								 var $oSpan=$tabHand.find("span");
								     $oSpan.width($aW);
								 $oSpan.stop(true).animate({"left":$aW*index});	
							 }
							 switch($fades)
							 {
								case "defaults" :$tabBox.hide();$tabBox.eq(index).show(); break;
								case "top":
								if($now<index)
								{
									$tabBox.eq(index).css({"top":"100%"});
									$tabBox.eq($now).stop(true).animate({"top":"-100%"});
									$tabBox.eq(index).stop(true).animate({"top":0})
								}
								else
								{
									$tabBox.eq(index).css({"top":"-100%"});
									$tabBox.eq($now).stop(true).animate({"top":"100%"});
									$tabBox.eq(index).stop(true).animate({"top":0})
								};break;
								
								case "left":
								if($now<index)
								{
									$tabBox.eq(index).css({"left":"100%"});
									$tabBox.eq($now).stop(true).animate({"left":"-100%"});
									$tabBox.eq(index).stop(true).animate({"left":0})
								}
								else
								{
									$tabBox.eq(index).css({"left":"-100%"});
									$tabBox.eq($now).stop(true).animate({"left":"100%"});
									$tabBox.eq(index).stop(true).animate({"left":0})
								};break;
								
							 } 	 
						 }
						 
						 
					}))

			})
		}
	})
})(jQuery);


//图标切换效果

(function(){
    $.fn.extend({
		icoEffect:function(options, callback){
			var defaults={
				obj:"#box",
				hasI:false
				
			}; 
			var options = $.extend(defaults, options);
            var callback = callback || function(){};
            $(this).each(function(){
				 var $this = $(this),
                     $hasI=options.hasI;
			         
                var aW=$this.find("a").width(),
                    aH=$this.find("a").height(),
                    spanH=$this.find("a span").height(),
                    spanT=$this.find("a span").css("top"),
                    varH=$this.find("a var").height(),
                    varT=$this.find("a var").css("top");

                    $this.find("a").hover(
                    	function(){
                    		$(this).find("span").stop(true,true).animate({"top":-spanH}).siblings("var").stop(true,true).animate({"top":(aH-varH)/2});
                    		if($hasI)
                    		{
                    			$(this).find("i").stop(true,true).fadeIn();
                    		}
                    	},
                    	function(){
                    		$(this).find("span").stop(true,true).animate({"top":spanT}).siblings("var").stop(true,true).animate({"top":varT});
                    		if($hasI)
                    		{
                    			$(this).find("i").stop(true,true).fadeOut();
                    		}
                    	}

                    )


			})
		}
	})
})(jQuery);


/*----------------------------------------------------------------------------------------------------*/
     //for font scroll   文字单条上下滚动
/*----------------------------------------------------------------------------------------------------*/


	var scrollFont=function(opt){
	var settings=jQuery.extend({
		scrollBox:".box ul",
		scrollTime:3000,
		marginTop:"0px"
	},opt);
	
	var $scrollBox=$(settings.scrollBox),
	    $scrollTime=settings.scrollTime,
		$marginTop=settings.marginTop;
		
    function statrScroll()
	{
		$scrollBox.animate({"marginTop":$marginTop},500,function(){
		$scrollBox.append($scrollBox.find("li:first"));
		$scrollBox.css("marginTop","0");
		});
	}	
	var scrollTime=setInterval(function(){
		statrScroll();	
	},$scrollTime);		


	$scrollBox.hover(
		function(){clearInterval(scrollTime)},
		function(){
			scrollTime=setInterval(function(){
				statrScroll();	
			},$scrollTime);
		})
}



/*==================运行=========================*/
$(function(){
	
	//检查是否为 IE 6-9
    if ((!$.support.leadingWhitespace)||navigator.userAgent.indexOf("MSIE 9.0")>0) {
			$("body").addClass("IE");
		}
	
	$("button").hover(
		function(){$(this).addClass("bOn")},
		function(){$(this).removeClass("bOn")})
	
	//
	$(".sDiv p input").keyup(function() {
		if($(this).val() == '') {
			$(this).siblings("span").text("");
		} else {
			$span = $(this).siblings('span');
			if(!$span.hasClass('nohide')) {
				$span.text("");
			}
		}
	}).bind('change', function() {
		if($(this).val() == '') {
			$(this).siblings("span").text("请输入您要搜索的关键字");
		} else {
			$(this).siblings("span").text("");
		}
	});
	
	//导航经过em
	$(".navBox li a").hover(
		function(){
			if(!$(this).hasClass("aOn")){
				$(this).find(".el").stop(true).animate({"left":0,"opacity":1}).siblings(".er").stop(true).animate({"right":0,"opacity":1})
			}
		},
	    function(){
	    	if(!$(this).hasClass("aOn")){
	    		$(this).find(".el").stop(true).animate({"left":"-20px","opacity":0}).siblings(".er").stop(true).animate({"right":"-20","opacity":0})
	    	}
	    })
	//图片经过效果

		if($("a.chImg").length){
			$("a.chImg").hover(
				function(){$(this).find("span").stop(true).animate({"width":"100%"})},
				function(){$(this).find("span").stop(true).animate({"width":0})}
			);
		}
		

	//新闻列表

	if($(".listMain").length){
		$(".listMain ul li").hover(
			function(){$(this).addClass("liOn")},
			function(){$(this).removeClass("liOn")})
	}


	//截图壁纸


	//游戏资料

	
	//返回顶部
	 var oDiv=$("#backTop");
    $("#backTop").children("a").click(function(){
        var _this=$(this);
        $("body,html").animate({scrollTop:0},{duration:500,easing:"easeInOutQuart"});
    });

    $(window).bind("scroll resize",function (){
	    var	$winH=$(window).height(),
			$winW=$(window).width(),
			$docH=$(document).height(),
			$docW=$(document).width(),
            $scrollTop=$(window).scrollTop();	


		//显示隐藏返回顶部按钮
		var oDiv=$("#backTop");	
        if ($scrollTop>$winH/2) {
            oDiv.children("a").fadeIn();
        } else {
            oDiv.children("a").fadeOut();
        }
    });
	
})
