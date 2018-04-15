<?php
error_reporting(0);
require 'action.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js" charset="utf-8"></script>
<style type="text/css">
body {
	background: #fff;
	font-family: "微软雅黑";
}
* {
	margin: 0;
	padding: 0;
	font-size:12px;
}
li {
	list-style: none;
}
a {
	text-decoration: none;
	color:#333;
}
img {
	border:none;
}
.top-nav {
	width:100%;
	height:31px;
	margin:0 auto;
}
.top-fl {width:335px;height:31px;float:left;}
.top-fl li {float:left;text-align:center;}
.top-logo {
	width:250px;
	height:31px;
	background:url('images/tip.png') no-repeat center;
}
.gg {
	width:16px;
	height:31px;
	background:url('images/gg.png') no-repeat 0 center;
	float: right;
	padding-right: 10px;
}
.gg-conter {
	overflow: hidden;
	width:320px;
	float:left;
	height:15px;
	margin-top:7px;
}
.gg-conter a {
	color:#333;
}
.top-rl { float:right; }
.top-rl li { float:left; line-height:31px; text-align: center; color:#333; border-right:1px solid #eee; padding: 0 13px; }
.top-rl li a {color:#333;}
.top-rl li em { font-weight: bold; font-style:normal; }
.cl {
	clear: both;
}
#demo2 li {
	list-style-type:none;
	height:22px;
	text-align:left;
}
#demo1 {
	height:auto;
	text-align:left;
}
#demo2 {
	height:auto;
	text-align:left;
}
#demo1 li {
	list-style-type:none;
	height:22px;
	text-align:left;
}
.xx-fl {
	width:180px;
	height:77px;
	position:absolute;
	top:7px;
	left:3px;
	line-height:25px;
	padding-left: 5px;
}
.xx-fl li {
	width:180px;
	color:#a68f6f;
	float:none;
	text-align:left;
	overflow: hidden;
}
.xx-fl li span {
	color:#6d3a0f;
}
.xx-fl li a {
	color:#2b5f86;
}
.yjbc {
	display:block;
	width:65px;
	height:77px;
	position:absolute;
	cursor:pointer;
	left:189px;
	top:7px;
}
#web-address, #game-name, #user-name, #web-address span, #game-name span, #user-name span, #web-address a, #game-name a, #user-name a {
	font-size:9px;
	overflow: hidden;
}
#web-address a {
	width:95px;
	overflow: hidden;
}
.allgame-bg {
	width:385px;
	height:206px;
	background:url('images/more.png') no-repeat;
	position:relative;
	padding:10px;
	float:right;
	margin-right:7px;
	z-index:9999;
}
.close {
	position:absolute;
	right:0;
	top:0;
}
.allgame-bg li {
	width: 125px;
	line-height: 30px;
	text-align: center;
	float:left;
}
.top-flash {
	width:31px;
	height:31px;
}
.save {
	width:243px;
	height:56px;
	background:url('images/save.jpg') no-repeat;
	padding:10px;
	position:relative;
	margin-left: 30px;
	z-index:9999;
}
.save span {
	color:#333;
}
.save li {
	line-height:19px;
}
.save ul {
	width:175px;
	float:left;
}
.save span.gamename {
	color:#333;
}
.save .save-btn {
	width:60px;
	height:60px;
	display:block;
	float:left;
}
#div1 {
	height:22px;
	overflow:hidden;
}
.navclose{font-weight:bold;}
</style>
</head>
<body>
<?php
	$gid = htmlspecialchars($_GET['gid']);
	$server_id = htmlspecialchars($_GET['server_id']);
	
	$result = mysql_query("select * from $database.game_list where gid = '$gid'",$conn);
	$row = mysql_fetch_array($result);
?>
<div class="top-nav" id="navhidden">
	<div class="top-fl">
		<ul>
			<li class="top-logo"></li>
		</ul>
	</div>
	<div class="gg-conter" id="div1">
      <ul id="demo1">
<!-- <li><a href="<?php echo $GLOBALS['PAY_PATH']?>" target="_blank">欢迎来到-<font color=red><?php echo $GLOBALS['SIT_TITLE']?></font>-游戏的世界、有你更精彩！！！</a></li>
<li><a href="<?php echo $GLOBALS['PAY_PATH']?>" target="_blank"><font color=red><?php echo $GLOBALS['SIT_TITLE']?></font>-海量稀有道具狂爆,时间就是金钱</a></li>
<li><a href="<?php echo $GLOBALS['PAY_PATH']?>" target="_blank"><font color=red><?php echo $GLOBALS['SIT_TITLE']?></font>-充值请点击游戏右上方的【游戏充值】→</a></li>
<li><a href="<?php echo $GLOBALS['PAY_PATH']?>" target="_blank"><font color=red><?php echo $GLOBALS['SIT_TITLE']?></font>-拒绝盗号,妥善保管帐号密码！</a></li>-->

      </ul> 
      <div id="demo2"></div> 
	</div>
	<div class="top-rl">
		<ul> 
        	<li>帐号：<em><?php echo $_SESSION['username'] ?></em></li>
			<li><a href="<?php echo $row['pay_url'] ?>" target="_blank"><font color="red">游戏充值</font></a></li>
			<li><a href="../home/my_exchange" target="_blank">游戏币兑换</a></li>
            <li>
            	客服QQ：<em><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $row['qq'] ?>&site=qq&menu=yes" title="在线咨询" target="_blank"><?php echo $row['qq'] ?></a></em><i>|</i>
                QQ群：<em><?php echo $row['qqq'] ?></em>
            </li>
            <!--<li><a href="javascript:;" onclick="CloseFrm()">关闭</a></li>-->			
		</ul>
	</div>
	<div class="cl"></div>
</div>
<script> 
var box=document.getElementById("div1"),can=true;
box.innerHTML+=box.innerHTML;
box.onmouseover=function(){can=false};
box.onmouseout=function(){can=true};
new function (){
var stop=box.scrollTop%22==0&&!can;
if(!stop)box.scrollTop==parseInt(box.scrollHeight/2)?box.scrollTop=0:box.scrollTop++;
setTimeout(arguments.callee,box.scrollTop%22?10:2000);
};
function showinf()
{
 $("#informck").css({"display":"block"});
}
function closeinf()
{
 $("#informck").css({"display":"none"});
}
function showins()
{
top.divframe.document.getElementById('save_usename').style.display='block';
 //$("#save_usename").css({"display":"block"});
}
function closeins()
{
 $("#save_usename").css({"display":"none"});
}
//function navhidden()
//{
// $("#navhidden").css({"display":"none"});
//}
function CloseFrm()
{  
  	mainBody = parent.document.getElementById('main_frame');
	mainBody.rows="0,*";
  }
</script>
</body>
</html>