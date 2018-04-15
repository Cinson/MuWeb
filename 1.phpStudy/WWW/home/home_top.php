
<link type="text/css" rel="stylesheet" href="../css/my.min.css">
<link rel="stylesheet" href="../css/common.min.css" type="text/css" />
<link href="../css/user.css" rel="stylesheet" type="text/css">
<link href="../css/pay.css" rel="stylesheet"type="text/css" />
<script type="text/javascript" src="../js/pay.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>

<div class="container cf">
	
	<div class="user-main" id="user-main">
		<div class="user-top cf">
			<div class="user-top-info">

                <div class="user-avatar-wrap">
                    <a class="user-avatar-close btn-close" title="关闭" href="javascript:;"></a>

                    
                </div>
			<img alt="头像" class="user-avatar" id="avatar" width="150" height="150" src="<?php echo $touxiang;?>" class="J_lazyloaded"><!--<![endif]-->
				<a href="../home/uploadimg.php" class="user-avatar-edit a9c"  title="修改头像">修改头像</a>

				<dl class="user-acc"><dt class="fl">上次登录时间：<?php echo $last_time; ?>	上次登录IP：<?php echo $last_ip; ?></span></dt><dd class="fl"><a class="btn-user-edit user-btn-password btn-orange" href="../home/change_pwd.php" title="修改密码">修改密码</a></dd></dl>
                

				<div id="progress" class="user-progress">
                    <span id="progress-vip" class="user-progress-vip u-level u-level-00"></span>
                    <div class="user-progress-groove cf">
                        <div class="user-progress-core-s fl"></div>
                        
                        <div style="width:0px;" id="progress-core" class="user-progress-core-m animated fl"></div>
                        <div class="user-progress-core-e fl"></div>
                    </div>
                    <div class="user-progress-source" ><?php echo $jifen; ?>/1000000</div>
                </div>
				                <dl class="user-nickname" ><dt class="fl" id="bbs-nickname"><?php echo $_SESSION['username'] ?></dt><dd class="fl">
                    </dd></dl>

                
				
				<a class="btn-sign btn-orange" href="../index.php" title="返回首页">返回首页</a>
				<div class="user-sign-box shadow2" id="signBox">
	
    <div class="sign-tip" id="signTip"></div>
    <span class="closed-sign" id="closedSign"></span>
</div>
				<ul class="user-shop-info">
					<li class="user-info-1">信息完整：<span class="orange" id="completeness">100%</span><br/><a class="a9c" title="无需完善信息">无需完善信息</a></li>
					<li class="user-info-2">剩余钻石：<span class="orange" id="userpoint"><?php echo $rmb_user; ?></span><br/><a class="a9c" href="<?php echo $pay_url ?>" target="_blank" title="充值">充值></a></li>
					<li class="user-info-3">会员级别：<span class="orange">VIP0</span><br/><a class="a9c" href="#" title="会员体系">开发中></a></li>
				</ul>
			</div>

		</div>
		<div class="user-content cf">
			<div class="fl user-left">
				<ul class="user-menu" >
					<li class="focus" id="userinfo"><a href="../home/index.php" class="user-menu-a" title="我的账号">我的账号</a><span  class="circle" style="width: 14px;"><span>•</span></span></li>
					<li id="mygame"><a href="../home/my_games.php" class="user-menu-a" title="我的游戏">我的游戏</a><span  class="circle" style="width: 14px;"><span>•</span></span></li>
					<!--<li id="daili"><a href="../home/daili.php" class="user-menu-a" title="代理平台">代理平台</a><span class="circle" style="width: 14px;"><span>•</span></span></li>-->
					<li id="welfare"><a href="../Home/my_welfare.php" class="user-menu-a" title="领取礼包">领取礼包</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
					<li id="userprotect"><a href="../Home/change_pwd.php" class="user-menu-a" title="帐号安全">帐号安全</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
                    <li id="exchange"><a href="../Home/my_exchange.php" class="user-menu-a" title="充值兑换">充值兑换</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
					<li id="exchangelog"><a href="../home/my_exchange_log.php" class="user-menu-a" title="兑换记录">兑换查询</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
					<li id="paylog"><a href="../home/my_pay_log.php" class="user-menu-a" title="充值记录">充值记录</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
					<li id="tuiguang"><a href="../Home/wanttg.php" class="user-menu-a" title="我要推广">我要推广</a><span class="circle" style="width: 14px;"><span>•</span></span></li>					<li id="Extension"><a href="../Home/my_Extension.php" class="user-menu-a" title="推广资源">推广资源</a><span class="circle" style="width: 14px;"><span>•</span></span></li>
				</ul>

			</div>
<script type="text/javascript">
			var urlstr=window.location.href;
			if (urlstr.indexOf("index.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#userinfo").addClass("focus");}
			if (urlstr.indexOf("uploadimg.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#userinfo").addClass("focus");}
			if (urlstr.indexOf("my_games.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#mygame").addClass("focus");}
			if (urlstr.indexOf("daili.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#daili").addClass("focus");}
			if (urlstr.indexOf("my_welfare.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#welfare").addClass("focus");}
			if (urlstr.indexOf("change_pwd.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#userprotect").addClass("focus");}
			if (urlstr.indexOf("my_exchange.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#exchange").addClass("focus");}
			if (urlstr.indexOf("my_exchange_log.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#exchangelog").addClass("focus");}
			if (urlstr.indexOf("my_pay_log.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#paylog").addClass("focus");}
			if (urlstr.indexOf("wanttg.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#tuiguang").addClass("focus");}
			if (urlstr.indexOf("my_Extension.php") >= 0) { $("#userinfo").removeClass("focus");$("#grzx").removeClass("focus");$("#Extension").addClass("focus");}
</script>