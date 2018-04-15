//javascript
/******新闻tab******/
$(".news_nav ul li").mouseover(function() {
	var index = $(this).index();
	$(this).addClass("current").siblings().removeClass("current");
	$(".news_content").children("ul").hide().eq(index).css("display", "block");
});

/******角色tab******/
$(".r-hd li").mouseenter(function() {
	var index = $(this).index();
	$(this).addClass("cur").siblings().removeClass("cur");
	$("#rolePanel").children("div").addClass("curElem").siblings().removeClass("curElem");
	$("#rolePanel").children("div").hide().find(".r-desc").css("left", "-250px");
	$("#rolePanel").children("div").find(".r-per").css("right", "-468px");
	$("#rolePanel").children("div").eq(index).fadeIn(0).find(".r-desc").css("left", "10px")
	$("#rolePanel").children("div").eq(index).find(".r-per").css("right", "-13px")
});

/******资料tab******/
$(".ziliao .zl").mouseover(function() {
	var index = $(this).index();
	$(this).addClass("show").siblings().removeClass("show");
});

/******服务器tab******/
$(".tabTitle .tabs").mouseover(function() {
	var index = $(this).index();
	$(this).addClass("titleOn").siblings().removeClass("titleOn");
	$(".all-server").children("ul").hide().eq(index).css("display", "block");
});