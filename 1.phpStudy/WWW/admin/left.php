<?php require 'check_login.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>后台管理系统</title>
<meta name="description" content="后台管理系统" />
<meta name="keywords" content="后台管理系统" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/system.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/styleswitch.js"></script>

</head>
<body onload="windowW();">
<div class="header" style="width:auto;">
	<div class="logo lf"></div>
    <div class="rt">

        <div class="style_but"></div>
    </div>
    <div class="col-auto" style="overflow: visible">
    	<div class="log white cut_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好！admin (超级管理员) <span>|</span><a href="../Action.php?action=logout">[退出]</a>
    	</div>
        <ul class="nav white" id="top_menu">
			<li id="_M1000" class="on top_menu"><a href=""  onclick="" hidefocus="true" style="outline:none;">管理首页</a></li>
		</ul>
    </div>
</div>
<div id="content" style="width: auto; ">
	<div class="col-left left_menu">
    	<div id="leftMain">
    	</div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium; height: 539px; " hidefocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
    </div>
	<div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
	<div class="content">
        	</div>
        </div>
    <div class="col-auto mr8">
    <div class="crumbs">
    <div class="shortcut cu-span"><!--<a href="tohtml.php?file=html_index" target="right"><span>生成首页</span></a><a href="/" target="_blank" ><span>站点首页</span></a><a href="{:U('member/logout',array('act'=>'out'))}"><span>退出后台</span></a>--></div>
    当前位置：<span id="current_pos">管理首页</span></div>
    	<div class="col-1">
        	<div class="content" style="position:relative; overflow:hidden">
                <iframe name="right" id="rightMain" src="main.php" frameborder="false" scrolling="auto" style="border:none;" width="100%" height="470" allowtransparency="true"></iframe>
        	</div>
        </div>
    </div>
</div>


<div style="display:none;">
   <div id="DIV_M1000">

   	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>新闻管理</h3>
    <ul>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('news_add.php');" hidefocus="true" style="outline:none;">添加新闻</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('news.php');" hidefocus="true" style="outline:none;">新闻管理</a></li>
    </ul>
  <h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>游戏管理</h3>
    <ul>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('game_add.php');" hidefocus="true" style="outline:none;">添加游戏</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('game.php');" hidefocus="true" style="outline:none;">游戏管理</a></li>
        <li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('server_add.php');" hidefocus="true" style="outline:none;">添加服务器</a></li>
        <li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('server.php');" hidefocus="true" style="outline:none;">服务器管理</a></li>
    </ul>
	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>广告管理</h3>
    <ul>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('link_add.php');" hidefocus="true" style="outline:none;">添加广告</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('link.php');" hidefocus="true" style="outline:none;">广告管理</a></li>
    </ul>
	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>推广员系统</h3>
    <ul>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('link_add.php');" hidefocus="true" style="outline:none;">推广员添加</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('link.php');" hidefocus="true" style="outline:none;">推广员管理</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('link.php');" hidefocus="true" style="outline:none;">推广业绩查询</a></li>
    </ul>
	
	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>系统操作</h3>
    <ul>
    	<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('user.php');" hidefocus="true" style="outline:none;">帐号操作</a></li>
        <li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('countuser.php');" hidefocus="true" style="outline:none;">用户统计</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('gamelog.php');" hidefocus="true" style="outline:none;">游戏统计</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('send_money.php');" hidefocus="true" style="outline:none;">补发游戏币</a></li>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('recharge_search.php');" hidefocus="true" style="outline:none;">钻石兑换查询</a></li>
    </ul>
   	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>平台设置</h3>
    <ul>
		<li id="_MP0" class="sub_menu"><a href="javascript:" onclick="zairu('pt_add.php');" hidefocus="true" style="outline:none;">平台参数</a></li>
 
    </ul>   	
	
 <!--
	<h3 class="f14"><span class="switchs cu on" title="展开与收缩"></span>技术支持</h3>
    <ul>
    <li  class="sub_menu">技 术 QQ：<br /><a target="_blank" style="background:none;margin-left:-5px"  href="http://wpa.qq.com/msgrd?v=3&uin=79117112&site=qq&menu=yes">79117112<font color="#3399CC"></font></a></li>
    </ul> -->
	<script src="js/switch.js"></script>
	</div>
</div>
<script type="text/javascript"> 
function zairu(lujing)
{
document.getElementById('rightMain').src=lujing;
 }
function dakai()
{
}
</script>
<script type="text/javascript"> 
//左侧菜单
//clientHeight-0; 空白值 iframe自适应高度
$('#DIV_M1000').clone().appendTo('#leftMain');
function windowW(){
	if($(window).width()<980){
			$('.header').css('width',980+'px');
			$('#content').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();
$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
		$('.header').css('width','auto');
		$('#content').css('width','auto');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');
	}
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-150;document.getElementById('rightMain').height = heights+30;
	var openClose = $("#rightMain").height()+9;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose+30);	
}
window.onresize();
//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
	}
	return false;
});

function _M(menuid,targetUrl) {
	var nurl=ddurl(targetUrl);
	$("#menuid").val(menuid);
	$("#bigid").val(menuid);
	var menu="#DIV_M"+menuid;
	$('#leftMain').html("");
	$(menu).clone().appendTo($("#leftMain"));
	$('.top_menu').removeClass("on");
	$('#_M'+menuid).addClass("on");
	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$("#openClose").data('clicknum', 0);
	$("#current_pos").data('clicknum', 1);
	$("#rightMain").attr('src', nurl);
}
function _MP(menuid,targetUrl) {
    var nurl=ddurl(targetUrl);
	$("#menuid").val(menuid);
	$("#paneladd").html('<a class="panel-add" href="javascript:add_panel();"><em>添加</em></a>');
	$("#rightMain").attr('src', nurl);
	$('.sub_menu').removeClass("on fb blue");
	$('#_MP'+menuid).addClass("on fb blue");
	$.get(function(data){
		$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
	});
	$("#current_pos").data('clicknum', 1);
}
function ddurl(durl){
if(durl.indexOf("?")=="-1"){
 durl=durl+"?rd="+Math.random();
}
else{
 durl=durl+"&rd="+Math.random();
}
return durl;
}
function check_web(){
}
</script>
<div style="display: none">
</div>
</body>
</html>