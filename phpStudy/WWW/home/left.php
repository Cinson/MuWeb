<?php 
//php获取当前url方法
$url =  "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
$currentPage = basename($url);
?>  

<div class="side">

    <div class="N-user">
        <ul>
            <li <?php if($currentPage == "index.php") echo "class='current'"; ?> ><a href="/home/index.php" class="pum-payList">帐户信息</a></li>
            <li <?php if($currentPage == "uploadimg.php") echo "class='current'"; ?> ><a href="/home/uploadimg.php" class="pum-info">上传头像</a></li>
			<li <?php if($currentPage == "change_pwd.php") echo "class='current'"; ?> ><a href="/home/change_pwd.php" class="pum-pwd">密码修改</a></li>
            <li <?php if($currentPage == "my_games.php") echo "class='current'"; ?> ><a href="/home/my_games.php" class="pum-welfare">游戏记录</a></li>
			<li <?php if($currentPage == "my_exchange.php") echo "class='current'"; ?> ><a href="/home/my_exchange.php" class="pum-excMoney">游戏币兑换</a></li>
            <li <?php if($currentPage == "my_exchange_log.php") echo "class='current'"; ?> ><a href="/home/my_exchange_log.php" class="pum-excList">兑换记录</a></li>
            <li <?php if($currentPage == "my_extension.php") echo "class='current'"; ?> ><a href="/home/my_extension.php" class="pum-spread">推广资源</a></li>
            <!--<li <?php if($currentPage == "my_pay_log.php") echo "class='current'"; ?> ><a href="/home/my_pay_log.php" class="pum-payList">充值记录</a></li>
      -->   <li <?php if($currentPage == "pay.php") echo "class='current'"; ?> ><a href="/home/pay.php"  class="pum-pay">我要充值</a></li>
            <li <?php if($currentPage == "my_welfare.php") echo "class='current'"; ?> ><a href="/home/my_welfare.php" class="pum-welfare">新手福利</a></li>

           <li><a href="../action.php?action=logout" class="pum-loginOut">退出</a></li>
        </ul>
    </div>
</div>
