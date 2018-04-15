function slideTxt(){

	function slide_t(){

		var slide = $("#slide_box-w ul"),

			liHeight = -(slide.find("li:last").height());

		if($("#slide_box-w li").length>2){

			slide.stop().animate({marginTop : liHeight + "px"},800,function(){

				$("#slide_box-w li:first").insertAfter($("#slide_box-w ul li:last"));

				slide.css({marginTop:0});

			});

		}

	}

	var timer = setInterval(slide_t,4000);

	$("#slide_box-w ul").hover(function(){

		clearInterval(timer);

	},function(){

		timer = setInterval(slide_t,4000);

	});

}

slideTxt();



(function(){


	var __ua = navigator.userAgent,

		flash_cover_valid = /\bChrome\/(\d+)/i.exec(__ua);

	if(flash_cover_valid){

		flash_cover_valid = flash_cover_valid[1] >= 32;

	}else{

		flash_cover_valid = /\bMSIE\b|\bFirefox\b/i.test(__ua);

	}

	if(!flash_cover_valid){

		$("#card360").css("display","block").prev().hide();

		$(".nam_a-w,.tool_a,.kf_box-w a,.ser_box-w,.dj_em").css("background","none")

	}



	$("#ser_box-w,#tool_box-w,.nam_box-w,#kf_box-w,#dj_box-w").hover(function(){

		var pele = $(this).children("div"),

			width = pele.width(),

			height = pele.height(),

			top = pele.css("top"),

			right = pele.css("right");

		if(flash_cover_valid){

			$(this).addClass("showClass");

			$(this).append('<iframe class="iframebg" style="z-index:2;position:absolute;top:'+top+';right:'+right+';" width="'+width+'" height="'+height+'" scrolling="no" frameborder="0" src=""></iframe>');

		}

	},function(){

		$(this).removeClass("showClass").find(".iframebg").remove();

	});




	$(document).delegate("#card_box-w em","click",function(){

		var pele = $(".card_pop-w");

		if(pele.is(":visible")==false){
			var input = $(this);
			var sid = '1';
			var gid = $("#gid").val();
			var type = input.attr("card_type");
			if(sid){
	            	var width = pele.width(),

			            height = pele.height(),

			            top = pele.css("top"),

	        		    right = pele.css("right");

	        		if(flash_cover_valid){

		                input.parent().addClass("showClass2").append('<iframe class="iframebg" style="z-index:2;position:absolute;top:'+top+';right:'+right+';" width="'+width+'" height="'+height+'" scrolling="no" frameborder="0" src=""></iframe>');

				        $(".card_a-w").width(width);

				    }

				}
			$("#copy_tips-w").hide();
			
		}else{

			$(this).parent().removeClass("showClass2");

			$(".iframebg").remove();

		}
	});

	$("#card_sq-w").click(function(){

		$("#card_box-w").removeClass("showClass2");

		$(".iframebg").remove();

	});


	$(document).delegate("#global-zeroclipboard-flash-bridge",'mouseover',function(){
		
		$("#card_box-w").addClass("showClass2");

	});


	$(window).resize(function(){

		$("#frame-body").height($(window).height()-34);

		if($(window).width()<1370){

			$(".news_box-w").hide();

		}else{

			$(".news_box-w").show();

		}

		if($(window).width()<1070){

			$(".ser_box-w").hide();

		}else{

			$(".ser_box-w").show();

		}

	});

	$(window).trigger("resize");


	$("#addfav").click(function(){

		var url = window.location.href,

			tit = window.document.title,

			ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL';

		if(document.all && window.external){

			window.external.addFavorite(url,tit);

		}else{

			alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹!');

		}

	});


})();


	

