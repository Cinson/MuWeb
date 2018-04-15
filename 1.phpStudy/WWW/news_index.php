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
<link href="../css/rxhw_main.css" rel="stylesheet" type="text/css"/>
    <link  type="text/css" rel="stylesheet" href="../css/login.css">
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

<div class="body">
    <div class="wrap cls">
        <div class="header">
            <div class="kv-top" id="kv-top">
    <script type="text/javascript" src="../js/c_top.js?v=1515154150"></script>
</div>
<a class="logo" title="<?php echo $site_name ?>" target="_blank"><?php echo $site_name ?></a>
<div class="top-nav">
    <ul id="nav" class="nav cls">
        <li><a href="/" target="_blank">官网首页</a></li>
        <li><a href="../news_index.php" target="_blank">游戏公告</a></li>
        <li><a href="<?php echo $pay_url ?>" target="_blank" rel="nofollow">游戏充值</a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&site=qq&menu=yes" target="_blank" rel="nofollow">联系管理</a></li>
        <li><a href="<?php echo $qdm ?>" target="_blank" rel="nofollow">加入Q群</a></li>
    </ul>
</div>

<p class="tips18">本游戏适合18岁以上的玩家进入</p>
<span class="qqgroup"><a href="<?php echo $qdm ?>" target="_blank"></a></span>        </div>
        <div class="side">
            <a class="start" href="../server_list.php?gid=1" target="_blank"><span></span></a>
<!--登录-->
<?php
		if (!isset($_SESSION['username'])){
		?>
<div id="loginframe" class="login">
    	<form name="myform" action="action" method="post">
            <input type="hidden" value="login" name="go" id="go" />	
    <div class="t"></div>
    <div class="log" id="log">
        <ul>
            <li class="user">
                <label>帐号:</label>
                <input type="text"  name="user_name" id="user_name" class="text" placeholder="帐号: ">
            </li>
            <li class="psw">
                <label>密码:</label>
                <input type="password" name="user_pwd" id="user_pwd" class="text" placeholder="密码: ">
            </li>
            <li class="remember">
                <input type="checkbox" checked="checked" id="remember">
                <label for="remember">下次自动登录</label>
            </li>
            <li class="get-psw" id="LoginShowTip"></li>
            <li class="log-btn">
                <a class="block-a" type="button" name="dosubmit" class="logBtn" tabindex="3" onclick="tologin();"></a>
            </li>
           
        </ul>
    </div>  
    <div class="login-t cls"  id="openRegisterWin">
        <a id="charge" target="_blank" title="帐号注册" href="javascript:void(0);" rel="nofollow">
            <i class="mark m1"></i><span>帐号注册</span>
        </a>
        <a id="btn-reg" target="_blank" title="游戏充值"  href="<?php echo $pay_url ?>" rel="nofollow">
            <i class="mark m2"></i><span>游戏充值</span>
        </a>
    </div>
        <?php } else { ?>
		<div id="loginframe" class="login">
		    <div class="t"></div>

<div class="loged">
<div class="loged-top">用户信息</div>
<div class="loged-panel">
<ul>
<li>您好，<span class="loged-highlight" title="<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username'] ?></span></li>
<li><span>你剩余的钻石数量为：<?php echo $rmb_user ?></span></li>
<li><?php echo $site_name ?>推荐您进入：</li>
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
                                               <?php } }?> 	

<li class="loged-usercenter f-ar"><a target="_blank" href="../home/">进入用户中心</a></li>
</ul>
</div>
    <div class="login-t cls">
        <a id="charge" target="_blank" title="游戏充值" href="<?php echo $pay_url ?>" rel="nofollow">
            <i class="mark m1"></i><span>游戏充值</span>
        </a>
        <a id="btn-reg" title="注销" href="../action.php?action=logout"  rel="nofollow">
            <i class="mark m2"></i><span>注销</span>
        </a>
    </div>
<div class="loged-bottom">
</div>
</div>
<?php } ?>
</div>
<!-- 服务器列表 -->
<div class="recom-server">
    <div class="t"></div>
    <div class="quick-ingame">
        <div class="select-type">
            选择<span></span>:
            <div class="select2">
                            <span class="select-dom">
                                <span class="select-con select-con-xz">正常服</span>
                                <span class="select-btn"></span>
                            </span>
                <div class="option-bg">
                    <ul class="option-dom" id="optFastName">
					</ul>
                </div>
            </div>
			<input name="" type="text" class="s-fastin" onKeyUp="var checkServer=function(event,t){ var e = event || window.event;if(e.keyCode==13){if(!/^[1-9][0-9]{0,4}$/.test(t.value)){t.blur();alert('请输入正确的服务器编号');return false;}else{var _u = '../game_login.php?gid=1&server_id='+t.value + '';window.location = _u;}}};checkServer(event,this);" value="如:1" onFocus="if (value =='如:1'){value =''}" onBlur="if (value ==''){value='如:1'}" id="sno"/>服
        						      <button class="Mjr submit" id="gotogame" value="" name="" onclick="var sno = document.getElementById('sno').value;if(!/^[1-9][0-9]{0,4}$/.test(sno)){alert('请输入正确的服务器编号');return false;}var _u = '../game_login.php?gid=1&server_id='+sno+'';this.name=_u;window.open(_u, '_blank');return true;" onfocus="this.blur();"><a id="btnFast" data-role="server" href="javascript:;" target="_blank">进入</a></button> 
            
        </div>
	<div class="choice-list" id="servers">
		<?php
                        date_default_timezone_set('Asia/Shanghai');
                        $gid = $_GET['gid'];
                        $result = mysql_query("select * from $database.server where gid = '1' and zuixin = '1' order by server_id LIMIT 4;",$conn);
                        while ($row = mysql_fetch_array($result)){
                            if (date('Y-m-d H:i:s',time()) < $row['start_time'] ){
								$d = date('m-d H:i',strtotime($row['start_time']));
								if(substr($row['start_time'],0,10) == date('Y-m-d')){
									$d = "今天".date('H:i',strtotime($row['start_time']));
								}
								 
                        ?>	
						<li><a  href="javascript:alert('<?php echo $row['start_time']?> 准时开启!')" target="_blank"><i></i><span>暂未开启</span><?php echo $row['server_name'] ?><i class="icon"></i></a></li>
                        <?php }else if ( time() < strtotime($row['start_time'])+24*3600 ){ ?>
                        	<li><a href="game_login.php?gid=1&server_id=<?php echo $row['server_id'] ?>" target="_blank"><i></i><span>火爆新区</span><?php echo $row['server_name'] ?><i class="icon"></i></a></li>
						<?php }else{ ?>
                        	<li><a href="game_login.php?gid=1&server_id=<?php echo $row['server_id'] ?>" target="_blank"><i></i><span>人气大区</span>        <?php echo $row['server_name'] ?>
<i class="icon"></i></a>
							</li>
                                               <?php } }?> 	
</div>
    </div>
    <a target="_blank" href="../server_list.php?gid=1" class="all-server" rel="nofollow"></a>
</div>     <!--客服中心-->
            <div class="service">
                <div class="t">
                </div>
                <div class="con">
                    <p>传真电话：</p>
                    <p>客服电话：</p>
                    <p>咨询时间：7*24小时</p>
                    <p>游戏咨询：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&site=qq&menu=yes" target="_blank" title="在线客服" rel="nofollow">在线客服</a> <br/>点我加群：<a href="<?php echo $qdm ?>" target="_blank" title="点我加群" rel="nofollow">点我加群</a>
                    </p>
                    <div class="qr"><i></i></div>
                    <div class="qr-des">
                        扫描二维码<br/>
                        即获取丰厚<br/>
                        <em>游戏礼包</em>哦！
                    </div>
                </div>
            </div>

        </div>
          <!--main-->
        <div class="main">
            <div class="content">
                <div class="article-top"> <p>全部新闻</p>
                    <div class="bread-nav">当前位置：<a href="/">传奇霸业</a> &gt; <a>全部新闻</a></div>
                </div>
                <div class="article-main">
                    <ul class="article-list">
                                             <?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news order by id desc ",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?>    <li>
                            <span class="time">[<?php echo date('y-m-d',strtotime($row['time'])) ?>]</span><a href="../news.php?id=<?php echo $row['id'] ?>" title="【<?php echo $row['type'] ?>】<?php echo $row['title'] ?>" target="_blank">【<?php echo $row['type'] ?>】<?php echo $row['title'] ?></a>
                        </li><?php } ?>
                                        
                                            </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end wrap -->
</div>





            <style>
    .g-footer {font-family:SimSun sans-serif;color:#555;}
    .g-footer-row1 {text-align:center;background:#DBDBDB;line-height:34px;border-top:1px solid #D0D0D0;font-family:"Microsoft Yahei";}
    .g-footer-row1 a {display:inline-block;vertical-align:top;width:100px;height:33px;margin-right:20px;overflow:hidden;text-indent:-999px;background:url(http://img1.37wanimg.com/www/css/images/game_site/bg-foot-logo.png) no-repeat 0 3px;_background-image:url(http://img1.37wanimg.com/www/css/images/game_site/bg-foot-logo-8.png);}
    .g-footer-row1 label, .g-footer-row1 span {display:inline-block;}
    .g-footer-row2 {background-color:#efefef;overflow:hidden;height:142px;*position:relative;width:100%;}
    .g-footer-row2-main {width:975px;margin-left:auto;margin-right:auto;text-align:center;padding-top:5px;padding-bottom:5px;position:relative;overflow:visible;}
    .g-footer-row2 dl {float:left;width:160px;border-right:1px solid #d8d8d8;}
    .g-footer-row2 dt, .g-footer-row2 dd {height:33px;line-height:33px;}
    .g-footer-row2 .f-noborder {border:none;}
    .g-footer-row2 dt {color:#496b7f;font-size:14px;font-weight:bold;}
    .g-footer-row2 a {color:#808080;}
    .g-footer-row3 {background-color:#333;background-image:url(about:blank);text-align:center;color:#b0afaf;padding-top:14px;padding-bottom:14px;border-top:1px solid #606060;*position:relative;}
    .g-footer-row3 p {width:1000px;margin:5px auto;overflow: hidden;}
    .g-footer-row3 a {color:#b0afaf;}
    .g-footer-row3-1 a {color:#fdfdfd;margin-left:20px;margin-right:20px;padding-bottom:5px;}
    .g-footer-row3-2 span {margin-right:10px;}
    .g-footer-row3-2 a, .g-footer-row3-3 span {margin-left:5px;margin-right:8px;white-space:nowrap;}
</style>
<div class="g-footer">
    <p class="g-footer-row1">
        <label>健康游戏公告：</label><span>抵制不良游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</span>
    </p>
    <div class="g-footer-row3">
      
            
       <div id="footer">
                <div class="fDiv fl">        
                   <p>游戏版权所有 Copyright (c) 2012 <?php echo strtoupper(substr($web_site,7)) ?> .  备案号： <?php echo $Bei_No?> <?php echo $protocol ?></p>
        <p>本游戏适合18岁以上用户，不含暴力、恐怖、残酷、色情等妨害未成年人身心健康等内容，属于绿色健康产品</p>
<p>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活。</p>
        <div class="ft-oths">
            <a href="http://webscan.360.cn/index/checkwebsite?url=<?php echo substr($web_site,7)?>" target="_blank">
                <img src="../images/360.png" alt="360安全认证" width="100" height="38">
            </a>
            <img src="http://static.602.com/www/statics/images/mycontent/foot_5.png"  alt="标底" width="100" height="38">
            <img src="http://static.602.com/www/statics/images/mycontent/foot_4.jpg"  alt="标底" width="100" height="38">
            <img src="http://static.602.com/www/statics/images/mycontent/foot_2.jpg"  alt="标底" width="100" height="38">
            <img src="http://static.602.com/www/statics/images/mycontent/foot_3.jpg"  alt="标底" width="100" height="38">
            <img src="http://static.602.com/www/statics/images/mycontent/foot_5.jpg"  alt="标底" width="100" height="38">
        </div>
                
    </p>
    
<script type="text/javascript" src="../js/rxhw_main.js?t=1515154150"></script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"right","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>


<script type="text/javascript" src="http://ptres.37.com/js/sq/plugin/swf-activate.min.js"></script>

</body>
</html>