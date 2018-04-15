$(function () {
	$("#infoTab li").click(function(){
		var index = $("#infoTab li").removeClass("on").index(this);
		$(".info-panel").removeClass("on").eq(index).addClass("on");
		$(this).addClass("on");
	}).eq(0).trigger("click");
	
	var showNumer=18,
		allSer = $(".list a").length,
		chNumber = ["一","二","三","四","五","六","七","八","九","十"];
	$("#svrTags").empty();
	if(allSer>showNumer)
	{
		for(i=0; i<Math.ceil(allSer/showNumer); i++)
		{		
			var ln = allSer - (i+1)*showNumer + 1;
			var rn = allSer - i*showNumer;
			var em = $("<li></li>").html(chNumber[i]);//((ln<1?1:ln) + "-" + rn + "服");					
			$("#svrTags").append(em);
		}	
		$("#svrTags li").mouseover(function(){
			if(!$(this).hasClass("on")) showList($("#svrTags li").index($(this)));
		});
		showList(0);
	}
	function showList(index){		
		$("#svrTags li").removeClass("on").eq(index).addClass("on");
		$(".list a").hide().slice(index*showNumer,(index+1)*showNumer).show();
	}
	
	$("#showMoreUpdate").click(function(){
		$("<div id='divMask'></div>").hide().appendTo($("body")).fadeIn(200);
		$(".lay-intro").fadeIn(300);
		var ctop = $(window).scrollTop();
		$(window).scroll(function(){$(this).scrollTop(ctop);});
	});
	$(".lay-close").click(function(){		
		$("#divMask").fadeOut(200,function(){$(this).remove();});
		$(".lay-intro").fadeOut(200);
		$(window).unbind('scroll');
	});
	
	var limitLine = 6*20, gi = $("#GameIntro");
	if(gi.height()>limitLine)
	{
		var p = gi.find("p");
		$("<a href='#'></a>").click(function(){
			if(p.hasClass("show")){
				p.toggleClass("show").css("max-height","none");
				$(this).html("收起 &and;");				
			}else{
				p.toggleClass("show").css("max-height",limitLine+"px");
				$(this).html("展开全部 &or;");
			}
			return false;
		}).trigger("click").appendTo( gi );
	};
});

function addFavorite() {
	var url = window.location;
	var title = document.title;
	var ua = navigator.userAgent.toLowerCase();
	if (ua.indexOf("360se") > -1) {
		alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	}
	else if (ua.indexOf("msie 8") > -1) {
		window.external.AddToFavoritesBar(url, title); //IE8
	}
	else if (document.all) {
		try{
			window.external.addFavorite(url, title);
		}catch(e){
			alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
		}
	}
	else if (window.sidebar) {
		window.sidebar.addPanel(title, url, "");
	}
	else {
		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	}
}