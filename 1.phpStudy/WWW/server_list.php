<?php
require 'action.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<title><?php echo $site_name ?></title>
<meta name="keywords" content="<?php echo $guanjianzi; ?>">
<meta name="description" content="<?php echo $miaoxu; ?>">
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<script language="javascript" type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/global.css"/>
	    <link  type="text/css" rel="stylesheet" href="../css/login.css">

<link href="../css/rxhw_main.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.mir.js"></script>
    <script type="text/javascript" src="../js/jquery.home.js"></script>

</head>
<body>

<!--网站头部部分--> 

 
<div id="bgMask"></div>
<?php
if (!isset($_SESSION['username'])){
?>
 
<div id="userRegister">
	<h3>注册帐号</h3>
    <form method="post" action="action.php?tid=<?php echo $_GET['tid']?$_GET['tid']:0;?>" name="myRegister" id="myRegister" class="loginform">
        <input type="hidden" value="reg" name="go"> 
        <div class="col-tip"></div>
        <p class="col-name"><input type="text" name="reg_account" id="reg_account" size="20" tabindex="10" placeholder="用户名" /></p>
        <p class="col-pwd"><input type="password" name="reg_password" id="reg_password" size="20" tabindex="11" placeholder="密码" /></p>
        <p class="col-pwd"><input type="password" name="reg_rpassword" id="reg_rpassword" size="20" tabindex="12" placeholder="确认密码" /></p>
        <p class="col-opt">
            <input name="zhuce" id="zhuce" checked="checked" value="" type="checkbox"> 我已经阅读并同意《用户注册协议》
        </p>
        <p class="col-submit">
            <button type="button" class="btn-submit" onclick="return toreg();" tabindex="13" >注册</button>
        </p>
        <div class="reg-link">已经有账号？<a href="../index.php" id="openLoginWin">立即登陆</a></div>
    	<a href="javascript:void(0);" id="userRegisterClose" class="layerClose" title="关闭"></a>
    </form>
    <script type="text/javascript">
	toRegCheck();
	</script>
</div>
<?php } ?>

<div class="s-body">
    <div class="s-wrap">
        <div class="s-header">
            <a class="s-logo" href="/" target="_blank" title="<?php echo $site_name ?>"><?php echo $site_name ?></a>
            <!-- nav -->
            <div class="s-nav">
                <a id="s-nav1" href="http://<?php echo $web_site ?>" target="_blank" title="返回首页">返回首页</a>
                <a id="s-nav2" href="<?php echo $pay_url ?>" target="_blank" class="coming" title="用户充值">用户充值</a>
                <a id="s-nav3" href="<?php echo $dlq ?>" target="_blank" title="微端下载">微端下载</a>
                <a id="s-nav4" href="javascript:;" target="_self" class="bookmark" title="收藏本页">收藏本页</a>
            </div>

            <!-- login -->    	<?php
		if (!isset($_SESSION['username'])){
		?>
    <form name="myform" action="action" method="post" class="s-loginframe">
            <input type="hidden" value="login" name="go" id="go" />	
                <ul id="log" class="log">
                    <li class="s-user">
                        <input placeholder="请输入帐号" type="text"  name="user_name" id="user_name" class="s-text">
                    </li>
                    <li class="s-psw">
                        <input placeholder="请输入密码" type="password" name="user_pwd" id="user_pwd" class="s-text">
                    </li>
                    <li class="s-log-btn">
                        <a type="button" name="dosubmit" tabindex="3" onclick="tologin();" class="block-a" title="登录">马上登录</a>
                    </li>
                    <li class="s-remember">
                        <input type="checkbox" checked="checked" id="remember">&nbsp;
                        <label for="remember">记住用户名</label> | <a rel="nofollow" id="openRegisterWin" href="javascript:void(0);" target="_blank" title="马上注册">注册</a> | 登录状态：<a><span id="LoginShowTip"></span></a>
                    </li>
                    
                </ul>        

       <?php } else { ?>
<div class="s-loginframe">
<DIV class=loged ><DIV class=loged-top>用户信息</DIV>
<DIV class=loged-panel >
<UL>
<LI>您好，<A class=loged-highlight title=<?php echo $_SESSION['username'] ?> href="../home/" target="_blank"><?php echo $_SESSION['username'] ?></A></LI>
<LI><A href="../home/" target=_blank>进入用户中心</A></li><LI>最后登录时间：<SPAN class=loged-highlight><?php echo $row['last_time'] ?></SPAN></LI>
<LI><?php echo $site_name ?>推荐您进入：</LI>
	<?php
                        date_default_timezone_set('Asia/Shanghai');
                        $gid = $_GET['gid'];
                        $result = mysql_query("select * from $database.server where gid = '1' and zuixin = '1' order by server_id LIMIT 1;",$conn);
                        while ($row = mysql_fetch_array($result)){
                            if (date('Y-m-d H:i:s',time()) < $row['start_time'] ){
								$d = date('m-d H:i',strtotime($row['start_time']));
								if(substr($row['start_time'],0,10) == date('Y-m-d')){
									$d = "今天".date('H:i',strtotime($row['start_time']));
								}
								 
                        ?>	<li><a  href="javascript:alert('<?php echo $row['start_time']?> 准时开启!')" target="_blank"><span style="margin-left:0px;"><?php echo $row['server_name'] ?></span><span style="margin-left:46px;"></span></a><var class="s4"></var></li>
                        <?php }else if ( time() < strtotime($row['start_time'])+24*3600 ){ ?>
                        	<li><a href="game_login.php?gid=1&server_id=<?php echo $row['server_id'] ?>" target="_blank"><span style="margin-left:0px;"><?php echo $row['server_name'] ?></span></a><var class="s5"></var></li>
						<?php }else{ ?>
                        	<li><a href="game_login.php?gid=1&server_id=<?php echo $row['server_id'] ?>" target="_blank"><span style="margin-left:0px;"><?php echo $row['server_name'] ?></span></a><var class="s7"></var></li>
                                               <?php } }?> 	<li  class="loged-usercenter f-ar"><A id=logout href="../action.php?action=logout">注销</A></LI></UL></DIV>
<DIV class=loged-bottom></DIV></DIV></DIV>

			
			
			<?php } ?>
        </div>

        <div class="s-content">
            <!-- recommend server -->
            <p class="s-name">推荐服务器:</p>
            <div class="s-server-list rec-server f-cf">
                <!--少一个模板-->
                <ul class="f-cf" ><?php
                        date_default_timezone_set('Asia/Shanghai');
                        $gid = $_GET['gid'];
                        $result = mysql_query("select * from $database.server where gid = '$gid' and zuixin = '1' order by server_id LIMIT 3",$conn);
                        while ($row = mysql_fetch_array($result)){
                            if (date('Y-m-d H:i:s',time()) < $row['start_time'] ){
								$d = date('m-d H:i',strtotime($row['start_time']));
								if(substr($row['start_time'],0,10) == date('Y-m-d')){
									$d = "今天".date('H:i',strtotime($row['start_time']));
								}
								 
                        ?>
					<li><a  class="s8" href="javascript:alert('<?php echo $row['start_time']?> 准时开启!')" target="_blank"><em><?php echo $row['server_name'] ?></em><span><?php echo $d; ?></span></a></li>
                        <?php }else if ( time() < strtotime($row['start_time'])+24*3600 ){ ?>
                        	<li><a class="s1" href="game_login.php?gid=<?php echo $gid ?>&server_id=<?php echo $row['server_id'] ?>&line=dx" target="_blank"><em><?php echo $row['server_name'] ?></em><span>刚开一秒</span></a></li>
						<?php }else{ ?>
                        	<li><a class="s7" href="game_login.php?gid=<?php echo $gid ?>&server_id=<?php echo $row['server_id'] ?>&line=dx" target="_blank"><em><?php echo $row['server_name'] ?></em><span>正常</span></a></li>
                                               <?php } }?>                   <div class="clear"></div>
                </ul>
            </div>
            <p class="s-name">选择服务器</p>
            <div class="type-choose">
                选择服类型：
                <span ></span>
                <div class="select2">
                    <span class="select-dom" >
                        <span class="select-con select-con-xz" >正常服</span>
                        <span class="select-btn"></span>
                    </span>
                    <div class="option-bg" >
                        <ul class="option-dom" id="optFastName">
                        </ul>
                    </div>
                </div>
                <input name="" type="text" class="s-fastin" onKeyUp="var checkServer=function(event,t){ var e = event || window.event;if(e.keyCode==13){if(!/^[1-9][0-9]{0,4}$/.test(t.value)){t.blur();alert('请输入正确的服务器编号');return false;}else{var _u = '../game_login.php?gid=1&server_id='+t.value + '';window.location = _u;}}};checkServer(event,this);" value="如:1" onFocus="if (value =='如:1'){value =''}" onBlur="if (value ==''){value='如:1'}" id="sno"/> 服
        						      <button class="Mjr submit" id="gotogame" value="" name="" onclick="var sno = document.getElementById('sno').value;if(!/^[1-9][0-9]{0,4}$/.test(sno)){alert('请输入正确的服务器编号');return false;}var _u = '../game_login.php?gid=1&server_id='+sno+'';this.name=_u;window.open(_u, '_blank');return true;" onfocus="this.blur();"><a id="btnFast" data-role="server" href="javascript:;" target="_blank">进入</a></button> 
            </div>
            <!-- all server-->
            <!-- 全部服务器 -->
               <div class="game_server">
        	            <div class="g_sort m_b_xs clearfix"></div>
            <div class="g_list clearfix">
                    <ul>                    	
						<?php
                        date_default_timezone_set('Asia/Shanghai');
                        $gid = $_GET['gid'];
                        $result = mysql_query("select * from $database.server where gid = '$gid' order by server_id desc",$conn);
                        while ($row = mysql_fetch_array($result)){
                            if (date('Y-m-d H:i:s',time()) < $row['start_time'] ){
								$d = date('m-d H:i',strtotime($row['start_time']));
								if(substr($row['start_time'],0,10) == date('Y-m-d')){
									$d = "今天".date('H:i',strtotime($row['start_time']));
								}
								 
                        ?>
 	<li class="the-new"><a  href="javascript:alert('<?php echo $row['start_time']?> 准时开启!')" class="listItem" target="_blank"><em><?php echo $row['server_name'] ?></em><span><?php echo $d; ?>开启</span></a></li>
                        <?php }else if ( time() < strtotime($row['start_time'])+24*3600 ){ ?>
                        	<li class="the-new"><a href="game_login.php?gid=<?php echo $gid ?>&server_id=<?php echo $row['server_id'] ?>&line=dx" class="listItem" target="_blank"><em><?php echo $row['server_name'] ?></em><span>刚开一秒</span></a></li>
						<?php }else{ ?>
                        	<li><a href="game_login.php?gid=<?php echo $gid ?>&server_id=<?php echo $row['server_id'] ?>&line=dx" class="listItem" target="_blank"><em><?php echo $row['server_name'] ?></em><span>正常</span></a></li>
                                               <?php } }?>
                    </ul>                    	

            </div>
        </div>
            </div>	

<script type="text/javascript">	
$(function () { 	
	var showNumer=24;
	var allSer = $(".g_list a").length;
	$(".g_sort").empty();
	for(i=0; i<Math.ceil(allSer/showNumer); i++)
	{		
		var ln = allSer - (i+1)*showNumer + 1;
		var rn = allSer - i*showNumer;
		var em = $("<a></a>").attr("href","javascript:void(0);").html((ln<1?1:ln) + "-" + rn + "服");
		$(".g_sort").append(em);
	}	
	$(".g_sort a").mouseover(function(){
		if(!$(this).hasClass("on")) showList($(".g_sort a").index($(this)));
	});
	function showList(index){		
		$(".g_sort a").removeClass("on").eq(index).addClass("on");
		$(".g_list a").hide().slice(index*showNumer,(index+1)*showNumer).show();
	}
	showList(0);
	$('#keleyi').addFavorite(document.title,location.href);
	
});	
</script>
<script type="text/javascript" src="../js/rxhw_main.js?v=1517018025"></script>
</body>
</html>