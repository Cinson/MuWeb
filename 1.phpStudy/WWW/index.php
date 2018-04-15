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
        <a id="charge" target="_blank" title="帐号注册" rel="nofollow">
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
			<input name="" type="text" class="s-fastin" onKeyUp="var checkServer=function(event,t){ var e = event || window.event;if(e.keyCode==13){if(!/^[1-9][0-9]{0,4}$/.test(t.value)){t.blur();alert('请输入正确的服务器编号');return false;}else{var _u = '../game_login.php?gid=1&server_id='+t.value + '';window.location = _u;}}};checkServer(event,this);" value="如:1" onFocus="if (value =='如:1'){value =''}" onBlur="if (value ==''){value='如:1'}" id="sno"/> 服
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
</div><!-- 游戏截图 -->
<div class="jietu">
    <div class="t">
        <a class="more" target="_blank" rel="nofollow"></a>
    </div>
    <div class="jietu_pic">
       
                    <img src="../images/14973398384936.png" alt="游戏截图1" width="260" height="250" />
                   
    </div>
</div>            <!--客服中心-->
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
            <!-- 合作媒体 -->
            <div class="media">
                <div class="t"></div>
                <div class="con">
                    <div class="media-scroll">
                        <ul>
                                   <li><a rel="nofollow" title="<?php echo $site_name ?>"><img src="../images/logo.png" alt="<?php echo $site_name ?>" /></a></li>
                                                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <!--kv图-->
            <div class="kv" id="kv">
                <ul class="kv-img">
                    
                                        <li><a target="_blank" title="开服好礼" href="../news_index2.php" rel="nofollow"><img alt="开服好礼" src="../images/051018475F8i5.jpg" /></a></li>
                                    </ul>
                <ul class="kv-num">
                                        <li class="kv-num-1"></li>
                                    </ul>
            </div>
            <!-- 快捷连接 -->
            <div class="fast">
                <a class="f f1" href="<?php echo $dlq ?>" target="_blank" title="微端下载" rel="nofollow"><i>微端下载</i></a>
                <a class="f f2" href="../home/my_welfare.php" target="_blank" title="新手礼包" rel="nofollow"><i>新手礼包</i></a>
                <a class="f f3" title="VIP特权"><i>VIP特权</i></a>
            </div>
            <!-- 新闻公告 -->
            <div class="news fl">
                <div class="news_nav">
                    <a class="more" href="../news_index.php" title="更多" target="_blank"></a>
                    <ul>
                        <li class="current">
                            <a href="../news_index3.php" title="公告" target="_blank">公告</a><b class="line"></b>
                        </li>
						<li>
                            <a href="../news_index4.php" title="新闻" target="_blank">新闻</a><b class="line"></b>
                        </li>
                        <li>
                            <a href="../news_index2.php" title="活动" target="_blank">活动</a><b class="line"></b>
                        </li>
                        <li>
                            <a href="../news_index5.php" title="攻略" target="_blank">攻略</a><b class="line"></b>
                        </li>
                        <li>
                            <a href="../news_index1.php" title="热门" target="_blank">热门</a><b class="line"></b>
                        </li>
                    </ul>
                </div>

                <div class="news_top">
				 <?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news order by id desc LIMIT 1 ",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?>
				<a title="【<?php echo $row['type'] ?>】<?php echo $row['title'] ?>" target="_blank" href="../news.php?id=<?php echo $row['id'] ?>">【<?php echo $row['type'] ?>】<?php echo $row['title'] ?></a>
                                   <?php } ?> 

                </div>

                <div class="news_content">
                    <ul style="display: block;">
					<?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news where type = '公告' order by id desc LIMIT 5",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?><li> 
                            <span class="time fr"><?php echo date('m',strtotime($row['time'])) ?>/<?php echo date('d',strtotime($row['time'])) ?></span>
							<a class="a-link" href="../news.php?id=<?php echo $row['id'] ?>" style="color:#ff0000;" title="<?php echo $row['title'] ?>" target="_blank">
                            	
							<span>[<?php echo $row['type'] ?>]<?php echo $row['title'] ?></span>
                            </a>
                        </li><?php } ?>
						</ul>
                    <ul style="display: none;">
					<?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news where type = '新闻' order by id desc LIMIT 5",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?><li> 
                            <span class="time fr"><?php echo date('m',strtotime($row['time'])) ?>/<?php echo date('d',strtotime($row['time'])) ?></span>
							<a class="a-link" href="../news.php?id=<?php echo $row['id'] ?>" style="color:#ff0000;" title="<?php echo $row['title'] ?>" target="_blank">
                            	
							<span>[<?php echo $row['type'] ?>]<?php echo $row['title'] ?></span>
                            </a>
                        </li><?php } ?>                 </ul>
                    <ul style="display: none;">
					<?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news where type = '活动' order by id desc LIMIT 5",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?><li> 
                            <span class="time fr"><?php echo date('m',strtotime($row['time'])) ?>/<?php echo date('d',strtotime($row['time'])) ?></span>
							<a class="a-link" href="../news.php?id=<?php echo $row['id'] ?>" style="color:#ff0000;" title="<?php echo $row['title'] ?>" target="_blank">
                            	
							<span>[<?php echo $row['type'] ?>]<?php echo $row['title'] ?></span>
                            </a>
                        </li><?php } ?>                    </ul>
                    <ul style="display: none;">
					<?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news where type = '攻略' order by id desc LIMIT 5",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?><li> 
                            <span class="time fr"><?php echo date('m',strtotime($row['time'])) ?>/<?php echo date('d',strtotime($row['time'])) ?></span>
							<a class="a-link" href="../news.php?id=<?php echo $row['id'] ?>" style="color:#eaf70b;" title="<?php echo $row['title'] ?>" target="_blank">
                            	
							<span>[<?php echo $row['type'] ?>]<?php echo $row['title'] ?></span>
                            </a>
                        </li><?php } ?>                  </ul>
						 <ul style="display: none;">
					<?php
							date_default_timezone_set('Asia/Shanghai');							
							$p=empty($_GET['p'])?1:intval($_GET['p']);
							$totleq = mysql_query("select count(*) from $database.news;",$conn);
							$rowtotle = mysql_fetch_array($totleq);
							$totle=$rowtotle[0];
							
							
							$result = mysql_query("select * from $database.news where type = '热门' order by id desc LIMIT 5",$conn);
							while ($row = mysql_fetch_array($result)){
						
						?><li> 
                            <span class="time fr"><?php echo date('m',strtotime($row['time'])) ?>/<?php echo date('d',strtotime($row['time'])) ?></span>
							<a class="a-link" href="../news.php?id=<?php echo $row['id'] ?>" style="color:#ff0000;" title="<?php echo $row['title'] ?>" target="_blank">
                            	
							<span>[<?php echo $row['type'] ?>]<?php echo $row['title'] ?></span>
                            </a>
                        </li><?php } ?>                   </ul>
                </div>
            </div>

            <!-- 快捷连接2 -->
            <div class="fast2">
                <a class="fs fs1" href="../news_index2.php" target="_blank" title="精彩活动"><em></em><i></i></a>
                <a class="fs fs2" href="../gonglve_index.php" target="_blank" title="高手养成"><em></em><i></i></a>
            </div>
            <!-- 职业介绍 -->
            <div class="role">
                <div class="t"></div>
                <ul class="r-hd cls">
                    <li class="warrior cur">剑士</li>
                    <li class="magic">法师</li>
                    <li class="daoshi">弓箭手</li>
					<li class="mojianshi">魔剑士</li>
					<li class="shengdaoshi">圣导师</li>
					<li class="gadoujia">格斗家</li>
                </ul>
                <div class="role-con" id="rolePanel">
                    <!-- 战士-->
                    <div class="role-detail curElem" id="r1" style="display: block">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i></p>
                            <p class="description">
                                <b>角色特征：</b>
                                <br/> 对于近身格斗极其在行</b>
								<br/> 武器：</b>
								<br/> 剑
								<br/> 推荐人群：</b>
								<b> 新手，热血型玩家
                            </p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role1.png?t=2017" alt="战士">
                        </div>
                    </div>
                    <!-- 法师-->
                    <div class="role-detail" id="r2">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i></p>
                            <p class="description">
                                <b>角色特征：</b>
                                <br/> 擅长使用范围魔法
								<br/> 武器：</b>
								<br/> 法杖
								<br/> 推荐人群：</b>
								<b> 新手，热血型玩家
								</p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role2.png?t=2017" alt="法师">
                        </div>
                    </div>
                    <!-- 道士 -->
                    <div class="role-detail" id="r3">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i><i class="star star3"></i></p>
                            <p class="description">
                                                                <b>角色特征：</b>
                                <br/> 从想象不到的距离和角度攻击
								<br/> 武器：</b>
								<br/> 弓弩
								<br/> 推荐人群：</b>
								<b> 新手，热血型玩家
								</p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role3.png?t=2017" alt="道士">
                        </div>
                    </div>
                    <!-- 魔剑士-->
                    <div class="role-detail" id="r4">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i></p>
                            <p class="description">
                                <b>角色特征：</b>
                                <br/> 擅长双持武器，拥有强大攻击力
								<br/> 武器：</b>
								<br/> 剑，法杖
								<br/> 推荐人群：</b>
								<b> 高端玩家
								</p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role4.png?t=2017" alt="魔剑士">
                        </div>
                    </div>		
                    <!-- 圣导师-->
                    <div class="role-detail" id="r5">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i></p>
                            <p class="description">
                                <b>角色特征：</b>
                                <br/> 专属披风、战鹰、骑战
								<br/> 武器：</b>
								<br/> 权杖
								<br/> 推荐人群：</b>
								<b> 高端玩家
								</p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role5.png?t=2017" alt="圣导师">
                        </div>
                    </div>		
                    <!-- 格斗家-->
                    <div class="role-detail" id="r6">
                        <div class="r-desc" data-left="-468">
                            <p class="weapon"><b>上手难度：</b><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star star3"></i></p>
                            <p class="description">
                                <b>角色特征：</b>
                                <br/> 远程攻击 近身爆发
								<br/> 武器：</b>
								<br/> 拳套
								<br/> 推荐人群：</b>
								<b> 高端玩家
								</p>
                            <a class="readmore">了解职业<i></i></a>
                        </div>
                        <div class="r-per" data-right="-468">
                            <img src="../images/role6.png?t=2017" alt="格斗家">
                        </div>
                    </div>						
                </div>
            </div>
            <!-- 游戏资料 -->
            <div class="ziliao">
                <!-- 新手上路 -->
                <div class="zl show" id="zl-1">
                    <a class="zl-more" rel="nofollow">了解更多</a>
                    <div class="zl-con" data-role="新手上路">
                        <ul>
                            
                                                        <li>
                                <a>
                                    游戏背景
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    装备说明
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    装备获取
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    装备锻造
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    职业介绍
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    英雄系统
                                </a>
                            </li>
                                                    </ul>
                        <a class="zl-sys">了解系统</a>
                    </div>
                </div>
                <!-- 高手进阶 -->
                <div class="zl" id="zl-2">
                    <a class="zl-more" rel="nofollow">了解更多</a>
                    <div class="zl-con" data-role="高手进阶">
                        <ul>
                            
                                                        <li>
                                <a>
                                    石墓烧猪
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    每日必做
                                </a>
                            </li>
                                                        <li>
                                <ax>
                                    快速升级
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    礼券介绍
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    行会介绍
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    挂机功能
                                </a>
                            </li>
                                                    </ul>
                    </div>
                    <a class="zl-sys">了解系统</a>
                </div>
                <!-- 成就系统 -->
                <div class="zl" id="zl-3">
                    <a class="zl-more" rel="nofollow">了解更多</a>
                    <div class="zl-con" data-role="游戏系统">
                        <ul>
                            
                                                        <li>
                                <a>
                                    神炉系统
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    内功系统
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    技能系统
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    成就系统
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    VIP系统
                                </a>
                            </li>
                                                    </ul>
                        <a class="zl-sys">了解系统</a>
                    </div>
                </div>
                <!-- 特色玩法 -->
                <div class="zl" id="zl-4">
                    <a class="zl-more" rel="nofollow">了解更多</a>
                    <div class="zl-con" data-role="特色玩法">
                        <ul>
                            
                                                        <li>
                                <a>
                                    挑战BOSS
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    BOSS之家
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    背包介绍
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    翅膀升级
                                </a>
                            </li>
                                                        <li>
                                <a>
                                    功勋除魔
                                </a>
                            </li>
                                                    </ul>
                    </div>
                    <a class="zl-sys">了解系统</a>
                </div>
            </div>
            <!-- 友情链接 -->
            <div class="links">
                <div class="t"></div>
                <div class="con">
<?php
					$result = mysql_query("select * from $database.link where isshow=1 order by id asc ",$conn);
					while ($row = mysql_fetch_array($result)){
				?>
                                        <a href="<?php echo $row['link_url'] ?>" target="_blank">
                        <?php echo $row['link_name']; ?>
                    </a> <?php } ?>	
                                    </div>
            </div>
        </div>
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


<script type="text/javascript" src="http://ptres.37.com/js/sq/plugin/swf-activate.min.js"></script>

</body>
</html>